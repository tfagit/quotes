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
		$quote = get_random_quote($conn, 'largequotes');
	}
	else {
		$quote = get_random_quote($conn, 'smallquotes');
	}
	require 'views/random.view.php';
 ?>