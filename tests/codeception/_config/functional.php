<?php
$_SERVER['SCRIPT_FILENAME'] = YII_TEST_ENTRY_FILE;
$_SERVER['SCRIPT_NAME'] = YII_TEST_ENTRY_URL;
$_SERVER['SERVER_NAME'] = 'localhost';
$_SERVER['REQUEST_TIME '] = time();

return require(__DIR__ . '/../_app/config/web.php');
