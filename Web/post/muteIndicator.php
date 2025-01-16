<?php

ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'error_log.txt');

include_once(dirname(__FILE__).'/../../Models/Core/mysqlconnection.php');
include_once(dirname(__FILE__).'/../../Models/Core/Manager.php');
include_once(dirname(__FILE__).'/../../Models/Core/ObjectModel.php');
include_once(dirname(__FILE__).'/../../Models/Indicators.php');
include_once(dirname(__FILE__).'/../../Models/IndicatorsManager.php');

$indicatorsManager = new IndicatorsManager($db);

$q =".";

// var_dump($_POST);
// die;
if(isset($_POST['id']))
{
	$indicator = $indicatorsManager->getById($_POST['id']);
	$indicatorFields = $indicator->getFields();
	$indicatorFields[$_POST['mute']] = isset($_POST['is_muted']) ? 1 : 0;
	$indicator->setFields($indicatorFields);
	$indicatorsManager->update($indicator);

	header('Location: '.$q.'/../index.php?page=settings');

}