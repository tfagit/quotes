<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/reset.css"/>
		<link href='http://fonts.googleapis.com/css?family=Lato:300,700,300italic,700italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet/less" type="text/css" href="css/main.less"/>
		<script src="js/less-1.3.3.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="js/center.js"></script>
		<link rel="icon" type="image/png" href="assets/favicon.png" />
		<title><?= $pages[$current]['title'] . ' | ' . $siteconf['title'] ?></title>
	</head>
	<body>
		<div id="wrapper" class="fullcenter">
			<header>
				<h1><?= $pages[$current]['title'] . ' | ' . $siteconf['title'] ?></h1>
			</header>
			<ul id="nav">
				<?php print_nav($pages, $siteconf); ?>
			</ul>