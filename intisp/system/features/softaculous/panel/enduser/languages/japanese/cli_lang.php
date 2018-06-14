<?php

//////////////////////////////////////////////////////////////
//===========================================================
// cli_lang.php
//===========================================================
// SOFTACULOUS 
// Version : 4.1.7
// Inspired by the DESIRE to be the BEST OF ALL
// ----------------------------------------------------------
// Started by: Alons
// Date:       10th Jan 2009
// Time:       21:00 hrs
// Site:       http://www.softaculous.com/ (SOFTACULOUS)
// ----------------------------------------------------------
// Please Read the Terms of use at http://www.softaculous.com
// ----------------------------------------------------------
//===========================================================
// (c)Softaculous Inc.
//===========================================================
//////////////////////////////////////////////////////////////

if(!defined('SOFTACULOUS')){
	die('Hacking Attempt');
}

$l['err_cannot_autoupgrade'] = "このコントロールパネルでは、自動アップグレードができません。\n";
$l['err_invalid_param'] = "無効な因数です。 &soft-1;\n詳細は資料をご参照下さい。:\nhttp://www.softaculous.com/docs/Upgrade_Script_from_CLI\n";
$l['err_no_input'] = "情報を入力して下さい。\n";
$l['err_no_insid'] = "インストールIDが入力されていません。\n";
$l['err_no_username'] = "ユーザー名が入力されていません。\n";
$l['err_no_such_user'] = "そのようなユーザーは発見されませんでした。\n";
$l['err_dont_provide_username'] = "ユーザー名は要求されていません。\n";
$l['err_no_softdir'] = "Softdirは発見されません&soft-1;\n";
$l['err_no_installation'] = " インストールIDのインストールは発見できませんでした。: &soft-1;\n";
$l['err_cant_upgrade'] = "このインスタレーションは既に最新バージョンか、もしくはこのスクリプトは自動アップグレードができません。\n";
$l['err_backup_fail'] = 'バックアップが成功しなかったため、アップグレードを中断しました。詳細は下記をご参照下さい。:';
$l['err_upgrade_restore_failed'] = 'インスタレーションのアップグレードおよびバックアップからの修復に失敗しました。詳細は下記をご参照下さい。:';
$l['err_upgrade_restore_success'] = 'インスタレーションのアップグレードに失敗しましたが、バックアップからの修復には成功しました。詳細は下記をご参照下さい。:';
$l['err_upgrade'] = 'インスタレーションのアップグレードに失敗しました。詳細は下記をご参照下さい。:';
$l['err_upgrade_req'] = ' このインスタレーションがアップグレードの要求に合致していないため、自動アップグレードができませんでした。詳細は下記をご参照下さい。:';
$l['err_could_not_posix'] = 'ユーザーを切り替えることができなかったため、プロセスを中断しました。';
$l['err_cant_upgrade_for_this_server'] = "allow_url_fopen() があなたのサーバーで無効になっているか、またはCURLがURLへのアクセスに失敗したことが原因の可能性があり、自動アップグレードは実行できません。外部のURLにアクセスできなかったため、プレアップグレードは失敗しました。\n ";
$l['err_auto_upgrade_req_fail'] = 'このインスタレーションは自動アップグレードの要求に合致しなかったため、自動アップグレードできませんでした。詳細は下記をご参照下さい。:';
$l['help'] = " Softaculousコマンド・ラインインターフェイスへようこそ。
Available Commands : \n\t
--install\t For Installing an application.
--upgrade\t For Upgrading an installed application.
--import\t For Importing an installed application in to Softaculous.\n
For Support Please Contact us at : support@softaculous.com
";
$l['err_no_script'] = "スクリプト名が入力されていません。\n";
$l['err_no_url'] = "インストールしたURLを入力して下さい。例：--url=DOMAIN.COM/testdir\n";
$l['err_no_such_script'] = "そのようなスクリプトは発見できませんでした。 - &soft-1;\n";
$l['import_success'] = "正常にインポートされました。\n";
$l['import_error'] = "下記のエラーが発生しています。: \n";
$l['err_no_path'] = "パスを入力して下さい。 --path=/home/USER/public_html/test\n";
$l['err_no_import'] = "インポートしたユーティリティはこのスクリプトでは利用できません。\n";
$l['err_user_not_allowed'] = " インポートしたユーティリティはエンドユーザーには利用できません。\n";
$l['err_cant_load_docroots'] = "ドメインへのパスがロードできませんでした。\n";
$l['ins_available_for'] = " インスタレーションは下記ディレクトリに利用できます。:\n";// Keep the space at the beginning
$l['ins_found_at_path'] = " インスタレーションは指定のパスで発見されました。インポートのため、以前のコマンドを実行して下さい。\n";
$l['imp_ins_exists'] = "このインスタレーションはすでに- &soft-1;のため、&soft-にインポートされています。;\n";
$l['upgraded_manually'] = "The installation is already up to date. Updated ".APP." records\n";
$l['upgraded_successfully'] = "アップグレードに成功しました。 \n";
$l['shellexec_disabled'] = 'shell_exec()は機能しません。';
$l['list_scripts'] = "下記のリストは、あなたのサーバーでは作動しないスクリプトのリストです。下記スクリプトは、最小限の要件を満たしていないため作動しません。";
$l['req_pass'] = "全てのスクリプトは、チェックに合格しなければなりません。";
$l['err_cannot_autobackup'] = "自動バックアップは、このコントロールパネルでは機能しません。\n";
$l['err_no_auto_backup'] = " 自動バックアップは、管理者により無効とされています。\n";
$l['err_update_record'] = ' '.APP." レコードのバージョンのアップデート中にエラーが発生しました。\n";
$l['suc_update_record'] = "".APP." レコードは&soft-1; から&soft-2; &soft-3;へ正常にアップデートされました。\n";
$l['show_real_version'] = "Real Version : &soft-1; -- Version as per ".APP." records : &soft-2; \n";
$l['no_outdated_ins'] = " 無効のインスタレーションは発見れませんでした。\n";
$l['edit_detail_options'] = "\n--show_outdated_version=1 For showing the outdated installation(s) of the specified user
--user=USER_NAME whose records you want to update
--sid=SCRIPT_ID Script ID of the script you want to update the records for
--update_records=1 This will update ".APP." records\n";
$l['only_au_ins_note'] = "Note : Only installations that can be auto upgraded will be listed here\n";
$l['err_restore_cli'] = "Restore via CLI can not be performed for this control panel.\n";
$l['err_no_backupfile'] = "The backup file does not exist.\n";
$l['err_wrongins'] = "The backup file is not for this installation.\n";
$l['err_no_file'] = "Backup filename not specified.\n";
$l['err_no_backupinfo'] = "Backup info file not found.\n";
$l['err_no_backup_file'] = "Backup file not found.\n";

$l['soft_license'] = APP." ライセンス";
$l['lic_type'] = "タイプ";
$l['num_users'] = "ユーザー数";
$l['licexpires'] = "失効日";
$l['primary_ip'] = "ライセンスIP";
$l['free'] = "無料";
$l['premium'] = "プレミアム";
$l['expired'] = "期限切れ";
$l['never'] = "Never";

// Remove installation
$l['no_panels'] = "Removing scripts from CLI is possible only on cPanel or Webuzo.\n";
$l['no_input'] = "Please provide required input.\n";
$l['invalid_par'] = 'Invalid parameter ';
$l['no_scripts'] = 'Scripts were not loaded.';
$l['remove'] = 'Removed';
$l['heading'] = "Script Name \t Script Installation ID \n";
$l['no_installation'] = "No installations were found on your server.\n";
$l['err_remove'] = "Remove installation Failed.\n";
$l['note_by_automated_backup'] = 'Backup created by automated backups';
$l['note_by_automated_upgrade'] = 'Backup created by automated upgrade';
$l['sql_db'] = 'Could not find database file';
$l['err_query'] = 'Could not execute the query';
$l['sqlfile_err'] = 'Could not create sql file';
$l['fetching_remote_files'] = 'Importing files from remote server';
$l['import_complete'] = 'Import Completed';
$l['import_script'] = 'Importing';
$l['export_db'] = 'Exporting database from remote server';
$l['fetch_datadir'] = 'Fetching data directory from remote server';
$l['import_db'] = 'Propagating the database';
$l['insid_missing'] = 'Please provide installation ID';
$l['insid_incorrect'] = 'Installation ID is incorrect';
$l['read_file'] = 'Could not read the import data file';
$l['no_remote_import'] = 'Remote Import is not supported for this script';
$l['wrong_ftp_path'] = 'Specified FTP path is incorrect';

//Webuzo Backups and Restore
$l['not_permitted'] = 'This User is not permitted to run the script';
$l['no_option'] = 'Nothing to do';
$l['no_backup_dir'] = 'Backup Directory not present';
$l['backup_filename'] = 'Backup file name';
$l['create_tar'] = 'Creating the tar file';
$l['tar_error'] = 'There were some errors while creating the tar file';
$l['tar_created'] = 'tar file created';
$l['create_db'] = 'Creating DB backup';
$l['no_dbback_func'] = 'Backup function is not available';
$l['db_back_fail'] = 'Utility could not backup the DB';
$l['compress_sql'] = 'Compressing the SQL file';
$l['db_backup_filename'] = 'DB backup file name is';
$l['no_mysql'] = 'MySQL is not installed';
$l['skip_db_files'] = 'Skipping Database backup process';
$l['tar_extract'] = 'Extracting the tar file';
$l['err_tar_xtrct'] = 'There were some errors while extracting the tar file';
$l['db_restore_file'] = 'Restoring DB file';
$l['db_restore_err'] = 'Utility could not restore the DB';
$l['db_restore_done'] = 'Database successfully restored';
$l['skip_db_restore'] = 'Skipping Database restore process';
$l['no_exim'] = 'Exim is not installed';
$l['skip_exim_files'] = 'Skipping Exim files';
$l['no_bind'] = 'BIND is not installed';
$l['skip_bind_files'] = 'Skipping BIND files';
$l['no_backup_type'] = 'Backup type not specified';
$l['wrng_backup_type'] = 'Incorrect backup type specified';
$l['wrng_back_file'] = 'File specified is not a Backup file';
$l['strt_backup'] = 'Starting the Backup process';
$l['success_backup'] = 'Backup process completed';
$l['error_backup'] = 'Backup process completed with errors';
$l['exit_cli'] = 'Exiting CLI';
$l['no_file2restore'] = 'No File specified to restore';
$l['no_db_backup'] = 'DB backup file not found';
$l['chck_backup_exits'] = 'Checking if Backup file exists';
$l['strt_restore'] = 'Starting the Restore process';
$l['success_restore'] = 'Restore process completed';
$l['error_restore'] = 'Restore process completed with errors';
$l['send_email'] = 'Sending email to user';
$l['only_for_premium'] = 'This feature is only available to Premium license users';
$l['err_no_owner'] = "Owner is not provided.\n";
$l['err_invalid_file'] = "Invalid file name\n";
$l['acl_saved'] = 'Setting saved successfully';
$l['acl_errr'] = 'Could not save the setting';
$l['err_unzipping'] = 'Error occured while unzipping the files';
$l['invalid_import_file'] = 'Please provide a valid file to import settings';
$l['no_access_url'] = 'Could not access the source settings file';
$l['no_write_tmpfile'] = 'Could not write the temporary file';
$l['file_not_exist'] = 'File does not exist, please provide correct path';
$l['no_root_user'] = 'Only root user can import the admin settings';
$l['successfully_imported'] = 'Settings imported successfully';
$l['no_ins_found'] = 'No installation(s) found';

$l['cli_ftp_error'] = 'Error connectng to FTP server';
$l['err_fetch_file'] = 'Could not access the file uploaded to the domain';
$l['err_fetch_path'] = 'Could not fetch path from the data received';
$l['cli_no_remote_import'] = 'CLI Remote Import is not supported for this script';
$l['cli_wrong_ftp_path'] = 'FTP path is incorrect';
$l['cli_ftp_error-1'] = 'Unable to resolve Domain Name';
$l['cli_ftp_error-2'] = 'Unable to login with specified FTP details';
$l['cli_ftp_error-3'] = 'FTP Path does not exist';
$l['invalid_backup_location'] = 'Backup location submitted does not exist';
$l['invalid_access_token'] = 'Invalid Access Token. Please Re-Authorize '.APP.' Dropbox APP from the Edit Backup location page in '.APP.' enduser panel';
$l['insufficient_space'] = 'Your Dropbox account is full. Please free some space and attempt the backup after sometime';

$l['gdrive_err_init'] = 'There were some errors while initiating the backup on Google Drive!!';
$l['gdrive_err_end'] = 'There were some errors while committing backup to your Google Drive account!!';
$l['pass_decrpyt_fail'] = 'Password decryption failed.';
$l['ssh_conn_fail'] = 'SSH connection to the remote server failed';
$l['delete_temp_file'] = 'Deleting temporary backup file';
$l['ssh_conn_success'] = 'SSH connection successful';
$l['bckp_dir_notfound'] = 'Backup directory not found, creating';
$l['fail_bckp_dir'] = 'Failed to create remote backup directory';
$l['ssh_upload_start'] = 'Starting SSH upload of the backup file';
$l['ssh_upload_fail'] = 'SSH upload failed';
$l['ssh_upload_success'] = 'SSH upload successful';
$l['ssh_conn_close'] = 'Closing SSH connection';
$l['ftp_conn_fail'] = 'FTP connection failed';
$l['ftp_conn_success'] = 'FTP connection successful';
$l['ftp_change_dir'] = 'Changing to the FTP directory';
$l['ftp_upload_fail'] = 'FTP upload failed';
$l['ftp_upload_success'] = 'FTP upload successful';
$l['ftp_conn_close'] = 'Closing FTP connection';
$l['empty_server_list'] = 'Unable to get backup server list';
$l['ftp_upload_start'] = 'Starting FTP upload of the backup file';
$l['dwnlod_restore_fail'] = 'Unable to download the file for Restore';
$l['remote_del_fail'] = 'Unable to Delete the file on Remote Server';
$l['remote_del_success'] = 'Remote Backup file Deleted Successfully';
$l['no_server_id_filename'] = 'Backup Server ID and Filename not provided !';
$l['cd_backup_location_fail'] = 'Unable to change directory to the specified location';