<?php 
	require 'functions.php';
	session_start();

	// Checa que página deve ser aberta
	if (isset($_GET['page'])){
		if (isset($pages[$_GET['page']])){
			$current = $_GET['page'];
		}
		else {
			// 404 se $_GET['page'] foi definido mas não referencia nenhuma pg válida
			$current = '404';
		}
	} else {
		// Se nenhuma página foi definida, mandar para index
		$current = 'main';
	}

	if (($current == 'admin' || $current == 'edit') && (!isset($_SESSION['logged_in']))){
		$current = 'auth';
	}

	require 'header.php';

	require $pages[$current]['url'];

	require 'views/footer.view.php';
 ?>