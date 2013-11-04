<?php
	$conn = db_connect($dbconf);
	$quote = get_random($conn, 'smallquotes');
	require 'random.view.php';
 ?>