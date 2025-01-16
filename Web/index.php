<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');

session_set_cookie_params(2592000);
session_start();

include dirname(__FILE__).'/../Views/htmlhead.php';

if(!(isset($_GET['page'])) || $_GET['page'] != 'administrator')
	include dirname(__FILE__).'/../Views/menu.php';

if (!empty($_GET['page']) && is_file(dirname(__FILE__).'/../Controlers/'.$_GET['page'].'.php'))
{
    include dirname(__FILE__).'/../Controlers/'.$_GET['page'].'.php';
}
else
{
    include dirname(__FILE__).'/../Controlers/home.php';
}

if(!(isset($_GET['page'])) || $_GET['page'] != 'administrator')
	include dirname(__FILE__).'/../Views/footer.php';

ob_end_flush();
?>