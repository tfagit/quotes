<?php 
	$conn = db_connect($dbconf);
	$extended = false;
	if (isset($_GET['ext'])){
		if ($_GET['ext'] == '1'){
			$extended = true;
		}
	}
	if ($extended) {
		$quote = get_quote_list($conn, "largequotes");
		require 'listlarge.view.php';
	}
	else {
		$quote = get_quote_list($conn, "smallquotes");
		require 'list.view.php';
	}
	
 ?>