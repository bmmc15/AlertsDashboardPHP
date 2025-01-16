<?php

ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'error_log.txt');

include_once(dirname(__FILE__).'/../../Models/Core/mysqlconnection.php');
include_once(dirname(__FILE__).'/../../Models/Core/Manager.php');
include_once(dirname(__FILE__).'/../../Models/Core/ObjectModel.php');
include_once(dirname(__FILE__).'/../../Models/Alerts.php');
include_once(dirname(__FILE__).'/../../Models/AlertsManager.php');

date_default_timezone_set('Europe/Paris');

$alertsManager = new AlertsManager($db);

// Set headers to accept JSON payload
header("Content-Type: application/json");

// Get the raw POST data
$input = file_get_contents('php://input');

if (!$input) {
    http_response_code(400); // Bad Request
    echo json_encode(["error" => "No data received"]);
    exit;
}

$data = json_decode($input, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400); // Bad Request
    echo json_encode(["error" => "Invalid JSON"]);
    exit;
}

$alert = new Alerts(array(
	'payload' => json_encode($data)
));

// Insert the data into the database
try {
	$alertsManager->add($alert);
} catch (PDOException $e) {
    http_response_code(500); // Internal Server Error
    echo json_encode(["error" => "Database insertion failed: " . $e->getMessage()]);
}