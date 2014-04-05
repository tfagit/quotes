<?php
	$conn = db_connect($dbconf);

	if (isset($_GET['id'])){ // Checa se algum ID foi especificado
		// Checa se se trata de quote extendido ou padrão
		$extended = false;
		if (isset($_GET['ext'])){
			if ($_GET['ext'] == '1'){
				$extended = true;
			}
		}
		
		if ($extended) {
			$quote = get_single_quote($conn, 'largequotes', $_GET['id']);
		}
		else {
			$quote = get_single_quote($conn, 'smallquotes', $_GET['id']);
		}
		if ($quote['aprovado'] == '1')
			require 'views/single.view.php';
		else {
			require 'views/404.view.php';
		}
	}
	else {
		require 'views/404.view.php';
	}
 ?>