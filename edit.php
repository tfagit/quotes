<?php
	if (isset($_GET['id'])){ // Checa se algum ID foi especificado 
		$conn = db_connect($dbconf);

		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			print_r($_POST);
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
						if(mod_quote($conn, $table, (int)$quoteid, $conteudo, $legenda, $aprovado)){
							$alert = "Quote " . $quoteid . " moderado com sucesso.";
						}
					}
				}
			}
			if (!isset($alert)) {
				$alert = "Houve problemas ao moderar o quote.";
			}
		}

		$extended = false;
		if (isset($_GET['ext'])){
			if ($_GET['ext'] == '1'){
				$extended = true;
			}
		}
		
		$table = $extended ? 'largequotes' : 'smallquotes';

		$quote = get_single_quote($conn, $table, $_GET['id']);

		$quotelist = ''; // Gambiarra preguiçosa
		$quotelist .= '<li><form action="?page=admin';
		$quotelist .= $extended ? '&ext=1' : ''; // Apenas para quotes extendidos
		$quotelist .= '" method="post">ID: ' . $quote['id'] . '<br>Conte&uacutedo:<br>';
		$quotelist .= $extended ? 
				'<pre><textarea name="conteudolarge" rows="2" cols="60">' . str_replace('"', '&quot;', $quote['conteudo']) . '</textarea></pre>'
				: '<input type="text" name="conteudosmall" size="64" value="' . str_replace('"', '&quot;', $quote['conteudo']) . '"><br>';
		$quotelist .= 'Legenda:<br><input type="text" name="legenda" size="64" value="' . str_replace('"', '&quot;', $quote['legenda']) . '">';
		$quotelist .= '<br><input type="submit" name="rating" value="Aprovar"><input type="submit" name="rating" value="Reprovar"><input type="hidden" name="id" value="' . $quote['id'] . '"></form></li>';
		require 'views/edit.view.php';
	}
	else
		require 'views/404.view.php';

 ?>