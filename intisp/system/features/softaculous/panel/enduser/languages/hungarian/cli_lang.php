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

$l['err_cannot_autoupgrade'] = "Az automatikus frissítés nem teljesíthető ezen a control panelen.\n";
$l['err_invalid_param'] = "Érvénytelen paraméter  &soft-1;\nKérjük, olvassa el a dokumentációt további részletekért:\nhttp://www.softaculous.com/docs/Upgrade_Script_from_CLI\n";
$l['err_no_input'] = "Kérjük, adjon meg bemenetet.\n";
$l['err_no_insid'] = "Telepítési azonosító nem lett megadva.\n";
$l['err_no_username'] = "Felhasználó név nem lett megadva.\n";
$l['err_no_such_user'] = "Nincs ilyen felhasználó.\n";
$l['err_dont_provide_username'] = "Felhasználó név nem kötelező.\n";
$l['err_no_softdir'] = "Softdir nem található a felhasználóhoz &soft-1;\n";
$l['err_no_installation'] = "A telepítési azonosítóhoz nem található telepítés:  &soft-1;\n";
$l['err_cant_upgrade'] = "Ez a telepítés már egy régebbi verzió VAGY Ez a szkript nem frissül automatikusan. \n";
$l['err_backup_fail'] = 'A biztonsági mentés nem volt sikeres, így a frissítési folyamat megszakadt. Részletek:';
$l['err_upgrade_restore_failed'] = 'Nem sikerült frissíteni a telepítést ÉS visszaállítani a biztonsági mentésből. Részletek:';
$l['err_upgrade_restore_success'] = 'Nem sikerült frissíteni a telepítést DE vissza lehetett állítani a biztonsági mentésből. Részletek:';
$l['err_upgrade'] = 'Failed to upgrade the installation. Following are the details :';
$l['err_upgrade_req'] = 'Ez a telepítés nem felel meg a frissítéshez szükséges követelményeknek. Ezért nem frissült automatikusan. Részletek:';
$l['err_could_not_posix'] = 'Nem lehetett átváltani a felhasználóra, ezért a folyamat megszakad…';
$l['err_cant_upgrade_for_this_server'] = "Az előfrissítés ellenőrzés SIKERTELEN, mivel a külső URL(ek) nem elérhetőek.\n Ez lehet az oka, hogy az allow_url_fopen() tiltva van a szerverén vagy a CURL nem tudta elérni az URL-t. Ezért az automatikus frissítés nem végezhető el.";
$l['err_auto_upgrade_req_fail'] = 'This installation does not meet the Auto Upgrade requirements. Hence it cannot be auto upgraded. Following are the details :';
$l['help'] = "Welcome to Softaculous Command-line Interface.
Available Commands : \n\t
--install\t For Installing an application.
--upgrade\t For Upgrading an installed application.
--import\t For Importing an installed application in to Softaculous.\n
For Support Please Contact us at : support@softaculous.com
";
$l['err_no_script'] = "Szkript nem lett megadva.\n";
$l['err_no_url'] = "Kérjük, adja meg az URL-t, ahol egy telepítés történt, például:  --url=DOMAIN.COM/testdir\n";
$l['err_no_such_script'] = "Upsz! Nincs ilyen szkript - &soft-1;\n";
$l['import_success'] = "Sikeresen importálva!\n";
$l['import_error'] = "Következő hiba történt: \n";
$l['err_no_path'] = "Kérjük adja meg az útvonalat. Például:  --path=/home/USER/public_html/test\n";
$l['err_no_import'] = "Az importálás segédprogram nem elérhető ehhez a szkripthez\n";
$l['err_user_not_allowed'] = "Az importálás segédprogram nem elérhető a Végfelhasználónak\n";
$l['err_cant_load_docroots'] = "Nem sikerült betölteni az útvonalat a domain(ek)hez\n";
$l['ins_available_for'] = " telepítés(ek) elérhető(k) a következő könyvtárban:\n";// Keep the space at the beginning
$l['ins_found_at_path'] = " telepítés található a meghatározott útvonalon. \n Hajtsa végre az előző parancsot a --r paranccsal, hogy importálja azt.\n";
$l['imp_ins_exists'] = "Ez a telepítés már importálva van - &soft-1; ide &soft-2;\n";
$l['upgraded_manually'] = "The installation is already up to date. Updated ".APP." records\n";
$l['upgraded_successfully'] = "A frissítés sikeres volt \n";
$l['shellexec_disabled'] = 'shell_exec() le van tiltva';
$l['list_scripts'] = "\nA következő szkriptek nem működnek a szerverén.\nUgyanis nem felelnek meg a szkriptek minimális követelményeinek";
$l['req_pass'] = "Az automatikus biztonsági mentések nem végezhetőek el erre a control panelre.\n";
$l['err_cannot_autobackup'] = "Az automatikus biztonsági mentések nem végezhetőek el erre a control panelre.\n";
$l['err_no_auto_backup'] = "Az automatikus biztonsági mentéseket az admin letiltotta.\n";
$l['err_update_record'] = 'Hiba történt a '.APP.' records verzió frissítése közben\n';
$l['suc_update_record'] = "Bejegyzések ".APP." sikeresen frissítve innen: &soft-1;  &soft-2;  &soft-3;\n";
$l['show_real_version'] = "Valódi Verzió:  &soft-1; -- Verzió per ".APP." rekordok : &soft-2; \n";
$l['no_outdated_ins'] = "Nincs régi telepítés.\n";
$l['edit_detail_options'] = "\n--show_outdated_version=1 For showing the outdated installation(s) of the specified user
--user=USER_NAME whose records you want to update
--sid=SCRIPT_ID Script ID of the script you want to update the records for
--update_records=1 This will update ".APP." records\n";
$l['only_au_ins_note'] = "Megjegyzés: Csak azok a telepítések kerülnek ide felsorolásra, amelyek automatikusan frissítésre kerültek\n";
$l['err_restore_cli'] = "Restore via CLI can not be performed for this control panel.\n";
$l['err_no_backupfile'] = "The backup file does not exist.\n";
$l['err_wrongins'] = "The backup file is not for this installation.\n";
$l['err_no_file'] = "Backup filename not specified.\n";
$l['err_no_backupinfo'] = "Backup info file not found.\n";
$l['err_no_backup_file'] = "Backup file not found.\n";

$l['soft_license'] = APP." License";
$l['lic_type'] = "Type";
$l['num_users'] = "Number of users";
$l['licexpires'] = "Expires";
$l['primary_ip'] = "License IP";
$l['free'] = "Free";
$l['premium'] = "Premium";
$l['expired'] = "Expired";
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