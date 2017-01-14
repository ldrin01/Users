<?php
$db_type = 'mysql';		// DB type
$host = '127.0.0.1'; 	// DB server (localhost)
$username = 'root';		// DB username
$password = '';	// DB password
$datab = 'myuser';		// DB name
// DSN = Data Source Name
$dsn = "{$db_type}:host={$host};dbname={$datab}";
$pdo = null;
try {
	$pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
	echo $e->getMessage();
	die();
}
?>