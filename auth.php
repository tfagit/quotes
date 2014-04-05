<?php 

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['password'])){
			if (md5($_POST['password']) == $siteconf['authpwd']){
				$_SESSION['logged_in'] = true;
			}
			else {
				$alert = '<div class="error">Senha errada.</div>';
			}
		}
		else if (isset($_POST['logout'])) {
			session_destroy();
		}
	}

	if(isset($_SESSION['logged_in'])){
		require 'views/logout.view.php';
	}
	else {
		require 'views/login.view.php';
	}
 ?>