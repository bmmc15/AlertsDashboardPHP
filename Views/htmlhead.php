<?php
require_once(dirname(__FILE__).'/includes.php');


?>

<!DOCTYPE html>
<html lang="fr-fr">
<head xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta property="og:type" content="website"/>
	<meta property="og:url" content="<?php echo $_SERVER['REQUEST_URI']; ?>"/> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Alert Dashboard</title>
	<link rel="icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

	<?php if(!isset($_GET['page']) || $_GET['page'] != 'administrator')
	{ ?>
		<link rel="preload" href="./css/global.css?v=1" as="style" onload="this.onload=null;this.rel='stylesheet'">
		<noscript><link rel="stylesheet" href="./css/global.css?v=1"></noscript>
		
<!-- 	<link rel="stylesheet" type="text/css" href="<?php echo $q; ?>/css/menu.css?v=1">
	<link rel="stylesheet" type="text/css" href="<?php echo $q; ?>/css/stylesheet_mobile.css?v=1"> -->
	
	<?php 
	} ?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans|Lato|Montserrat|Poppins|Source+Sans Pro|Roboto+Condensed|Oswald|Roboto+Mono|Raleway|Dancing+Script|Sofia|Trirong|Audiowide">
</head>
<body>
