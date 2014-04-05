<?php
	if (isset($_GET['id'])){ // Checa se algum ID foi especificado 
		$conn = db_connect($dbconf);

		$alert = admin_mod_quote_check($conn) ? "Quote moderado com sucesso." : "Houve um problema em moderar o quote.";

		$extended = false;
		if (isset($_GET['ext'])){
			if ($_GET['ext'] == '1'){
				$extended = true;
			}
		}
		
		$table = $extended ? 'largequotes' : 'smallquotes';
		$quote = get_single_quote($conn, $table, $_GET['id']);
		require 'views/edit.view.php';
	}
	else
		require 'views/404.view.php';

 ?>