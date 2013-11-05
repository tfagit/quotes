<?php 
	require 'config.php';
	

	// Cria o menu de navegação, usado no header
	function print_nav($pagelist, $siteconf){
		foreach ($pagelist as $key => $page) {
			if ($key != '404') {
				echo '<li><a href="/'. $siteconf['location'] .'?page=' . $key . '">' . $page['nav'] . '</a></li>';
			}
		}
		return true;
	}

	// DATABASE
	// (usando DBO, fuck yeah)
	function db_connect($dbconf){
		try {
			$conn = new PDO('mysql:host=' . $dbconf["host"] . ';dbname=' . $dbconf["db"],
							$dbconf['username'],
							$dbconf['password']);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
		} catch (Exception $e) {
			echo $e;
			return false;
		}
	}

	function get_random_quote($conn, $table) {
		//$query = $conn->prepare("SELECT conteudo, legenda FROM :table WHERE id >= ( SELECT FLOOR ((MAX(id) + 1) * RAND()) FROM :table ) ORDER BY id LIMIT 1");
		//$query->bindParam('table', $table, PDO::PARAM_STR);
		//$query->execute();
		$query = $conn->query("SELECT conteudo, legenda FROM `" . $table . "` WHERE id >= (SELECT FLOOR((MAX(id) + 1) * RAND()) FROM `" . $table . "`) ORDER BY id LIMIT 1");
		$result = $query->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	function get_quote_list($conn, $table) {
		$query = $conn->prepare("SELECT conteudo, legenda FROM " . $table . " LIMIT 100;");
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	function envio_quote($conn, $conteudo, $legenda, $tabela) {
		// Prepared statement pra inserir na tabela
		try {
			$query = $conn->prepare("INSERT INTO " . $tabela . "(conteudo,legenda) VALUES (:conteudo, :legenda);");
			$query->bindParam('conteudo', $conteudo, PDO::PARAM_STR);
			$query->bindParam('legenda', $legenda, PDO::PARAM_STR);
			$query->execute();
			return true;	
		} catch (Exception $e) {
			return false;
		}
	}

	function check_quote($conteudo, $legenda) {
		$conlen = strlen($conteudo);
		$leglen = strlen($legenda);
		if ($conlen >= 4 && $conlen <= 4096 && $leglen >= 4 && $leglen <= 256) return true;
		else return false;
	}

 ?>