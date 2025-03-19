<?php

// ensure DataTables.php was included
// this file must not be included when installed using composer
if (!defined('DATATABLES')) {
	exit(1);
}

// Enable error reporting for debugging (remove for production)
error_reporting(\E_ALL);
ini_set('display_errors', '1');

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Database user / pass
 */
$sql_details2 = [
	'type' => 'Mysql',     // Database type: "Mysql", "Postgres", "Sqlserver", "Sqlite" or "Oracle"
	'user' => 'd3tablesdata',          // Database user name
	'pass' => '8pt52s5I*',          // Database password
	'host' => 'localhost', // Database host
	'port' => '3306',          // Database connection port (can be left empty for default)
	'db' => 'd3_datatables',          // Database name
	'dsn' => 'charset=utf8mb4',          // PHP DSN extra information. Set as `charset=utf8mb4` if you are using MySQL
	'pdoAttr' => [],   // PHP PDO attributes array. See the PHP documentation for all options
];

$sql_details = [
	'type' => 'Mysql',     // Database type: "Mysql", "Postgres", "Sqlserver", "Sqlite" or "Oracle"
	'user' => 'DBAdmin',          // Database user name
	'pass' => '3v0E@bd71!!',          // Database password
	'host' => 'localhost', // Database host
	'port' => '3306',          // Database connection port (can be left empty for default)
	'db' => 'd3_projects',          // Database name
	'dsn' => 'charset=utf8mb4',          // PHP DSN extra information. Set as `charset=utf8mb4` if you are using MySQL
	'pdoAttr' => [],   // PHP PDO attributes array. See the PHP documentation for all options
]; 

// This is included for the development and deploy environment used on the DataTables
// server. You can delete this block - it just includes my own user/pass without making
// them public!
if (is_file($_SERVER['DOCUMENT_ROOT'] . '/datatables/pdo.php')) {
	include $_SERVER['DOCUMENT_ROOT'] . '/datatables/pdo.php';
}
// /End development include
