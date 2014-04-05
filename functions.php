<?php 
	require 'config.php';
	require 'pages.php';

	// Cria o menu de navegação, usado no header
	function print_nav($pagelist, $siteconf){
		foreach ($pagelist as $key => $page) {
			if ($key != '404' && $key != 'single' && $key != 'edit') {
				echo '<li><a href="/'. $siteconf['location'] .'?page=' . $key . '">' . $page['nav'] . '</a></li>';
			}
		}
		return true;
	}

	// DATABASE
	// (usando PDO, fuck yeah)
	function db_connect($dbconf){
		try {
			$conn = new PDO('mysql:host=' . $dbconf["host"] . ';dbname=' . $dbconf["db"],
							$dbconf['username'],
							$dbconf['password']);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
			return $conn;
		} catch (Exception $e) {
			//echo $e;
			echo "O MySQLd t&aacute; derpando de novo. Fale com o Blek.";
			return false;
		}
	}

	function get_random_quote($conn, $table) {
		//$query = $conn->prepare("SELECT conteudo, legenda FROM :table WHERE id >= ( SELECT FLOOR ((MAX(id) + 1) * RAND()) FROM :table ) ORDER BY id LIMIT 1");
		//$query->bindParam('table', $table, PDO::PARAM_STR);
		//$query->execute();
		$query = $conn->query("SELECT id, conteudo, legenda FROM `" . $table . "` WHERE aprovado = 1 AND id >= (SELECT FLOOR((MAX(id) + 1) * RAND()) FROM `" . $table . "`) ORDER BY id LIMIT 1;");
		$result = $query->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	function get_single_quote($conn, $table, $id) {
		$content = "SELECT id, conteudo, legenda, aprovado FROM `" . $table . "` WHERE id = :id ORDER BY id LIMIT 1;";
		$query = $conn->prepare($content);
		$query->bindParam("id", $id, PDO::PARAM_INT);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_ASSOC);

		return $result;
	}

	function get_quote_list($conn, $table) {
		$query = $conn->prepare("SELECT id, conteudo, legenda FROM " . $table . " WHERE aprovado = 1;");
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	function get_unapproved_quotes($conn, $table) {
		$query = $conn->prepare("SELECT id, conteudo, legenda FROM " . $table . " WHERE aprovado = 0;");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	function mod_quote($conn, $table, $id, $conteudo, $legenda, $aprovado) {
		try {
			$content = "UPDATE " . $table . " SET conteudo = :conteudo, legenda = :legenda, aprovado = :aprovado WHERE id = :id;";
			$query = $conn->prepare($content);
			$query->bindParam("conteudo", $conteudo, PDO::PARAM_STR);
			$query->bindParam("legenda", $legenda, PDO::PARAM_STR);
			$query->bindParam("aprovado", $aprovado, PDO::PARAM_INT);
			$query->bindParam("id", $id, PDO::PARAM_INT);
			$query->execute();
			return true;
		} catch (Exception $e) {
			echo $content;
			var_dump($e);
			return false;
		}
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

	function admin_mod_quote_check($conn){
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(isset($_POST['legenda'])){
				if (isset($_POST['conteudolarge'])){
					$table = 'largequotes';
					$conteudo = $_POST['conteudolarge'];
				} else if (isset($_POST['conteudosmall'])) {
					$table = 'smallquotes';
					$conteudo = $_POST['conteudosmall'];
				}
				else {
					$table = false;
				}
				if ($table) {
					$legenda = $_POST['legenda'];
					$quoteid = $_POST['id'];
					$aprovado = $_POST['rating'] == "Aprovar" ? 1 : 2;
					if (check_quote($conteudo, $legenda)){
						return mod_quote($conn, $table, (int)$quoteid, $conteudo, $legenda, $aprovado);
					}
				}
			}
		}
		return false;
	}

 ?>