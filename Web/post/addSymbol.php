<?php

ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'error_log.txt');

include_once(dirname(__FILE__).'/../../Models/Core/mysqlconnection.php');
include_once(dirname(__FILE__).'/../../Models/Core/Manager.php');
include_once(dirname(__FILE__).'/../../Models/Core/ObjectModel.php');
include_once(dirname(__FILE__).'/../../Models/Symbols.php');
include_once(dirname(__FILE__).'/../../Models/SymbolsManager.php');

$symbolsManager = new symbolsManager($db);

$q =".";

if(isset($_POST['symbol']))
{
	$symbol = new Symbols(array(
		'id' => null,
		'title' => htmlspecialchars($_POST['symbol'])
	));
	$symbolsManager->add($symbol);

	header('Location: '.$q.'/../index.php?page=settings');

}