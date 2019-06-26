<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * file upload functions.
 */

namespace PhpMyAdmin;

/**
 * File wrapper class.
 *
 * @todo when uploading a file into a blob field, should we also consider using
 *       chunks like in import? UPDATE `table` SET `field` = `field` + [chunk]
 */
class File
{
    /**
     * @var string the temporary file name
     */
    public $_name = null;

    /**
     * @var string the content
     */
    public $_content = null;

    /**
     * @var Message|null the error message
     */
    public $_error_message = null;

    /**
     * @var bool whether the file is temporary or not
     */
    public $_is_temp = false;

    /**
     * @var string type of compression
     */
    public $_compression = null;

    /**
     * @var int
     */
    public $_offset = 0;

    /**
     * @var int size of chunk to read with every step
     */
    public $_chunk_size = 32768;

    /**
     * @var resource file handle
     */
    public $_handle = null;

    /**
     * @var bool whether to decompress content before returning
     */
    public $_decompress = false;

    /**
     * @var string charset of file
     */
    public $_charset = null;

    /**
     * @var ZipExtension
     */
    private $zipExtension;

    /**
     * constructor.
     *
     * @param bool|string $name file name or false
     */
    public function __construct($name = false)
    {
        if ($name && is_string($name)) {
            $this->setName($name);
        }

        if (extension_loaded('zip')) {
            $this->zipExtension = new ZipExtension();
        }
    }

    /**
     * destructor.
     *
     * @see     File::cleanUp()
     */
    public function __destruct()
    {
        $this->cleanUp();
    }

    /**
     * deletes file if it is temporary, usually from a moved upload file.
     *
     * @return bool success
     */
    public function cleanUp()
    {
        if ($this->isTemp()) {
            return $this->delete();
        }

        return true;
    }

    /**
     * deletes the file.
     *
     * @return bool success
     */
    public function delete()
    {
        return unlink($this->getName());
    }

    /**
     * checks or sets the temp flag for this file
     * file objects with temp flags are deleted with object destruction.
     *
     * @param bool $is_temp sets the temp flag
     *
     * @return bool File::$_is_temp
     */
    public function isTemp($is_temp = null)
    {
        if (null !== $is_temp) {
            $this->_is_temp = (bool) $is_temp;
        }

        return $this->_is_temp;
    }

    /**
     * accessor.
     *
     * @param string $name file name
     */
    public function setName($name)
    {
        $this->_name = trim($name);
    }

    /**
     * Gets file content.
     *
     * @return string|false the binary file content,
     *                      or false if no content
     */
    public function getRawContent()
    {
        if (null === $this->_content) {
            if ($this->isUploaded() && !$this->checkUploadedFile()) {
                return false;
            }

            if (!$this->isReadable()) {
                return false;
            }

            if (function_exists('file_get_contents')) {
                $this->_content = file_get_contents($this->getName());
            } elseif ($size = filesize($this->getName())) {
                $handle = fopen($this->getName(), 'rb');
                $this->_content = fread($handle, $size);
                fclose($handle);
            }
        }

        return $this->_content;
    }

    /**
     * Gets file content.
     *
     * @return string|false the binary file content as a string,
     *                      or false if no content
     */
    public function getContent()
    {
        $result = $this->getRawContent();
        if (false === $result) {
            return false;
        }
        return '0x'.bin2hex($result);
    }

    /**
     * Whether file is uploaded.
     *
     *
     * @return bool
     */
    public function isUploaded()
    {
        return is_uploaded_file($this->getName());
    }

    /**
     * accessor.
     *
     * @return string File::$_name
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Initializes object from uploaded file.
     *
     * @param string $name name of file uploaded
     *
     * @return bool success
     */
    public function setUploadedFile($name)
    {
        $this->setName($name);

        if (!$this->isUploaded()) {
            $this->setName(null);
            $this->_error_message = Message::error(__('File was not an uploaded file.'));
            return false;
        }

        return true;
    }

    /**
     * Loads uploaded file from table change request.
     *
     * @param string $key       the md5 hash of the column name
     * @param string $rownumber number of row to process
     *
     * @return bool success
     */
    public function setUploadedFromTblChangeRequest($key, $rownumber)
    {
        if (!isset($_FILES['fields_upload'])
            || empty($_FILES['fields_upload']['name']['multi_edit'][$rownumber][$key])
        ) {
            return false;
        }
        $file = File::fetchUploadedFromTblChangeRequestMultiple(
            $_FILES['fields_upload'],
            $rownumber,
            $key
        );

        // check for file upload errors
        switch ($file['error']) {
        // we do not use the PHP constants here cause not all constants
        // are defined in all versions of PHP - but the correct constants names
        // are given as comment
        case 0: //UPLOAD_ERR_OK:
            return $this->setUploadedFile($file['tmp_name']);
        case 4: //UPLOAD_ERR_NO_FILE:
            break;
        case 1: //UPLOAD_ERR_INI_SIZE:
            $this->_error_message = Message::error(__(
                'The uploaded file exceeds the upload_max_filesize directive in '
                .'php.ini.'
            ));
            break;
        case 2: //UPLOAD_ERR_FORM_SIZE:
            $this->_error_message = Message::error(__(
                'The uploaded file exceeds the MAX_FILE_SIZE directive that was '
                .'specified in the HTML form.'
            ));
            break;
        case 3: //UPLOAD_ERR_PARTIAL:
            $this->_error_message = Message::error(__(
                'The uploaded file was only partially uploaded.'
            ));
            break;
        case 6: //UPLOAD_ERR_NO_TMP_DIR:
            $this->_error_message = Message::error(__('Missing a temporary folder.'));
            break;
        case 7: //UPLOAD_ERR_CANT_WRITE:
            $this->_error_message = Message::error(__('Failed to write file to disk.'));
            break;
        case 8: //UPLOAD_ERR_EXTENSION:
            $this->_error_message = Message::error(__('File upload stopped by extension.'));
            break;
        default:
            $this->_error_message = Message::error(__('Unknown error in file upload.'));
        } // end switch

        return false;
    }

    /**
     * strips some dimension from the multi-dimensional array from $_FILES.
     *
     * <code>
     * $file['name']['multi_edit'][$rownumber][$key] = [value]
     * $file['type']['multi_edit'][$rownumber][$key] = [value]
     * $file['size']['multi_edit'][$rownumber][$key] = [value]
     * $file['tmp_name']['multi_edit'][$rownumber][$key] = [value]
     * $file['error']['multi_edit'][$rownumber][$key] = [value]
     *
     * // becomes:
     *
     * $file['name'] = [value]
     * $file['type'] = [value]
     * $file['size'] = [value]
     * $file['tmp_name'] = [value]
     * $file['error'] = [value]
     * </code>
     *
     * @param array  $file      the array
     * @param string $rownumber number of row to process
     * @param string $key       key to process
     *
     * @return array
     * @static
     */
    public function fetchUploadedFromTblChangeRequestMultiple(
        array $file,
        $rownumber,
        $key
    ) {
        $new_file = array(
            'name' => $file['name']['multi_edit'][$rownumber][$key],
            'type' => $file['type']['multi_edit'][$rownumber][$key],
            'size' => $file['size']['multi_edit'][$rownumber][$key],
            'tmp_name' => $file['tmp_name']['multi_edit'][$rownumber][$key],
            'error' => $file['error']['multi_edit'][$rownumber][$key],
        );

        return $new_file;
    }

    /**
     * sets the name if the file to the one selected in the tbl_change form.
     *
     * @param string $key       the md5 hash of the column name
     * @param string $rownumber number of row to process
     *
     * @return bool success
     */
    public function setSelectedFromTblChangeRequest($key, $rownumber = null)
    {
        if (!empty($_REQUEST['fields_uploadlocal']['multi_edit'][$rownumber][$key])
            && is_string($_REQUEST['fields_uploadlocal']['multi_edit'][$rownumber][$key])
        ) {
            // ... whether with multiple rows ...
            return $this->setLocalSelectedFile(
                $_REQUEST['fields_uploadlocal']['multi_edit'][$rownumber][$key]
            );
        }

        return false;
    }

    /**
     * Returns possible error message.
     *
     * @return Message|null error message
     */
    public function getError()
    {
        return $this->_error_message;
    }

    /**
     * Checks whether there was any error.
     *
     * @return bool whether an error occurred or not
     */
    public function isError()
    {
        return !is_null($this->_error_message);
    }

    /**
     * checks the superglobals provided if the tbl_change form is submitted
     * and uses the submitted/selected file.
     *
     * @param string $key       the md5 hash of the column name
     * @param string $rownumber number of row to process
     *
     * @return bool success
     */
    public function checkTblChangeForm($key, $rownumber)
    {
        if ($this->setUploadedFromTblChangeRequest($key, $rownumber)) {
            // well done ...
            $this->_error_message = null;
            return true;
        } elseif ($this->setSelectedFromTblChangeRequest($key, $rownumber)) {
            // well done ...
            $this->_error_message = null;
            return true;
        }
        // all failed, whether just no file uploaded/selected or an error

        return false;
    }

    /**
     * Sets named file to be read from UploadDir.
     *
     * @param string $name file name
     *
     * @return bool success
     */
    public function setLocalSelectedFile($name)
    {
        if (empty($GLOBALS['cfg']['UploadDir'])) {
            return false;
        }

        $this->setName(
            Util::userDir($GLOBALS['cfg']['UploadDir']).Core::securePath($name)
        );
        if (@is_link($this->getName())) {
            $this->_error_message = __('File is a symbolic link');
            $this->setName(null);
            return false;
        }
        if (!$this->isReadable()) {
            $this->_error_message = Message::error(__('File could not be read!'));
            $this->setName(null);
            return false;
        }

        return true;
    }

    /**
     * Checks whether file can be read.
     *
     * @return bool whether the file is readable or not
     */
    public function isReadable()
    {
        // suppress warnings from being displayed, but not from being logged
        // any file access outside of open_basedir will issue a warning
        return @is_readable($this->getName());
    }

    /**
     * If we are on a server with open_basedir, we must move the file
     * before opening it. The FAQ 1.11 explains how to create the "./tmp"
     * directory - if needed.
     *
     * @todo move check of $cfg['TempDir'] into Config?
     *
     * @return bool whether uploaded file is fine or not
     */
    public function checkUploadedFile()
    {
        if ($this->isReadable()) {
            return true;
        }

        $tmp_subdir = $GLOBALS['PMA_Config']->getUploadTempDir();
        if (is_null($tmp_subdir)) {
            // cannot create directory or access, point user to FAQ 1.11
            $this->_error_message = Message::error(__(
                'Error moving the uploaded file, see [doc@faq1-11]FAQ 1.11[/doc].'
            ));
            return false;
        }

        $new_file_to_upload = tempnam(
            $tmp_subdir,
            basename($this->getName())
        );

        // suppress warnings from being displayed, but not from being logged
        // any file access outside of open_basedir will issue a warning
        ob_start();
        $move_uploaded_file_result = move_uploaded_file(
            $this->getName(),
            $new_file_to_upload
        );
        ob_end_clean();
        if (!$move_uploaded_file_result) {
            $this->_error_message = Message::error(__('Error while moving uploaded file.'));
            return false;
        }

        $this->setName($new_file_to_upload);
        $this->isTemp(true);

        if (!$this->isReadable()) {
            $this->_error_message = Message::error(__('Cannot read uploaded file.'));
            return false;
        }

        return true;
    }

    /**
     * Detects what compression the file uses.
     *
     * @todo    move file read part into readChunk() or getChunk()
     * @todo    add support for compression plugins
     *
     * @return string|false false on error, otherwise string MIME type of
     *                      compression, none for none
     */
    protected function detectCompression()
    {
        // suppress warnings from being displayed, but not from being logged
        // f.e. any file access outside of open_basedir will issue a warning
        ob_start();
        $file = fopen($this->getName(), 'rb');
        ob_end_clean();

        if (!$file) {
            $this->_error_message = Message::error(__('File could not be read!'));
            return false;
        }

        $this->_compression = Util::getCompressionMimeType($file);
        return $this->_compression;
    }

    /**
     * Sets whether the content should be decompressed before returned.
     *
     * @param bool $decompress whether to decompress
     */
    public function setDecompressContent($decompress)
    {
        $this->_decompress = (bool) $decompress;
    }

    /**
     * Returns the file handle.
     *
     * @return resource file handle
     */
    public function getHandle()
    {
        if (null === $this->_handle) {
            $this->open();
        }
        return $this->_handle;
    }

    /**
     * Sets the file handle.
     *
     * @param object $handle file handle
     */
    public function setHandle($handle)
    {
        $this->_handle = $handle;
    }

    /**
     * Sets error message for unsupported compression.
     */
    public function errorUnsupported()
    {
        $this->_error_message = Message::error(sprintf(
            __(
                'You attempted to load file with unsupported compression (%s). '
                .'Either support for it is not implemented or disabled by your '
                .'configuration.'
            ),
            $this->getCompression()
        ));
    }

    /**
     * Attempts to open the file.
     *
     * @return bool
     */
    public function open()
    {
        if (!$this->_decompress) {
            $this->_handle = @fopen($this->getName(), 'r');
        }

        switch ($this->getCompression()) {
        case false:
            return false;
        case 'application/bzip2':
            if ($GLOBALS['cfg']['BZipDump'] && function_exists('bzopen')) {
                $this->_handle = @bzopen($this->getName(), 'r');
            } else {
                $this->errorUnsupported();
                return false;
            }
            break;
        case 'application/gzip':
            if ($GLOBALS['cfg']['GZipDump'] && function_exists('gzopen')) {
                $this->_handle = @gzopen($this->getName(), 'r');
            } else {
                $this->errorUnsupported();
                return false;
            }
            break;
        case 'application/zip':
            if ($GLOBALS['cfg']['ZipDump'] && function_exists('zip_open')) {
                return $this->openZip();
            }

            $this->errorUnsupported();
            return false;
        case 'none':
            $this->_handle = @fopen($this->getName(), 'r');
            break;
        default:
            $this->errorUnsupported();
            return false;
        }

        return false !== $this->_handle;
    }

    /**
     * Opens file from zip.
     *
     * @param string|null $specific_entry Entry to open
     *
     * @return bool
     */
    public function openZip($specific_entry = null)
    {
        $result = $this->zipExtension->getContents($this->getName(), $specific_entry);
        if (!empty($result['error'])) {
            $this->_error_message = Message::rawError($result['error']);
            return false;
        }
        $this->_content = $result['data'];
        $this->_offset = 0;
        return true;
    }

    /**
     * Checks whether we've reached end of file.
     *
     * @return bool
     */
    public function eof()
    {
        if (!is_null($this->_handle)) {
            return feof($this->_handle);
        }
        return $this->_offset == strlen($this->_content);
    }

    /**
     * Closes the file.
     */
    public function close()
    {
        if (!is_null($this->_handle)) {
            fclose($this->_handle);
            $this->_handle = null;
        } else {
            $this->_content = '';
            $this->_offset = 0;
        }
        $this->cleanUp();
    }

    /**
     * Reads data from file.
     *
     * @param int $size Number of bytes to read
     *
     * @return string
     */
    public function read($size)
    {
        switch ($this->_compression) {
        case 'application/bzip2':
            return bzread($this->_handle, $size);
        case 'application/gzip':
            return gzread($this->_handle, $size);
        case 'application/zip':
            $result = mb_strcut($this->_content, $this->_offset, $size);
            $this->_offset += strlen($result);
            return $result;
        case 'none':
        default:
            return fread($this->_handle, $size);
        }
    }

    /**
     * Returns the character set of the file.
     *
     * @return string character set of the file
     */
    public function getCharset()
    {
        return $this->_charset;
    }

    /**
     * Sets the character set of the file.
     *
     * @param string $charset character set of the file
     */
    public function setCharset($charset)
    {
        $this->_charset = $charset;
    }

    /**
     * Returns compression used by file.
     *
     * @return string MIME type of compression, none for none
     */
    public function getCompression()
    {
        if (null === $this->_compression) {
            return $this->detectCompression();
        }

        return $this->_compression;
    }

    /**
     * Returns the offset.
     *
     * @return int the offset
     */
    public function getOffset()
    {
        return $this->_offset;
    }

    /**
     * Returns the chunk size.
     *
     * @return int the chunk size
     */
    public function getChunkSize()
    {
        return $this->_chunk_size;
    }

    /**
     * Sets the chunk size.
     *
     * @param int $chunk_size the chunk size
     */
    public function setChunkSize($chunk_size)
    {
        $this->_chunk_size = (int) $chunk_size;
    }

    /**
     * Returns the length of the content in the file.
     *
     * @return int the length of the file content
     */
    public function getContentLength()
    {
        return strlen($this->_content);
    }
}
