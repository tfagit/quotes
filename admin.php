<?php 
	$conn = db_connect($dbconf);

	$alert = admin_mod_quote_check($conn) ? "Quote moderado com sucesso." : "Houve um problema em moderar o quote.";

	$extended = false;
	if (isset($_GET['ext'])){
		if ($_GET['ext'] == '1'){
			$extended = true;
		}
	}
	
	$table = $extended ? 'largequotes' : 'smallquotes';

	$quotes = get_unapproved_quotes($conn, $table);

	require 'views/admin.view.php';
 ?>

