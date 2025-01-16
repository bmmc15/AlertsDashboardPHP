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

if(isset($_POST['indicator']))
{
	$indicator = new Indicators(array(
		'id' => null,
		'title' => htmlspecialchars($_POST['indicator'])
	));
	$indicatorsManager->add($indicator);

	header('Location: '.$q.'/../index.php?page=settings');

}