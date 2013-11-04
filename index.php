<?php 
	require 'functions.php';
	if (isset($_GET['page'])){
		if (isset($pages[$_GET['page']])){
			$current = $_GET['page'];
		}
		else {
			$current = '404';
		}
	} else {
		$current = 'main';
	}

	require 'header.php';

	require $pages[$current]['url'];

	require 'footer.php';
 ?>