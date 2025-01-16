<?php
$host= 'localhost';
$dbname = "alertdashboard";
$user = 'root';
$password = '';
try {
	$db = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$db->exec("SET CHARACTER SET utf8mb4");
	date_default_timezone_set('Europe/Paris');
	
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>