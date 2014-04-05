<?php 
	$conn = db_connect($dbconf);

	// Checa se se trata de quote extendido ou padrão
	$extended = false;
	if (isset($_GET['ext'])){
		if ($_GET['ext'] == '1'){
			$extended = true;
		}
	}

	if ($extended) {
		$quote = get_quote_list($conn, "largequotes");
		require 'views/listlarge.view.php';
	}
	else {
		$quote = get_quote_list($conn, "smallquotes");
		require 'views/list.view.php';
	}
	
 ?>