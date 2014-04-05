<?php 
	if (isset($_POST['legenda'])) {
		$tabela = 'smallquotes';
		if (isset($_POST['conteudolarge'])){
			$conteudo = $_POST['conteudolarge'];
			$tabela = 'largequotes';
		}
		else $conteudo = $_POST['conteudosmall'];
		$legenda = $_POST['legenda'];

		if (check_quote($conteudo, $legenda)){
			$conn = db_connect($dbconf);
			if(envio_quote($conn, $conteudo, $legenda, $tabela))
				$feedback = "Quote enviado com sucesso.";
			else $feedback = "Problema no envio.";
		}
		else {
			$feedback = "Legenda/conteúdo inválido.";
		}
	}

	require 'views/envio.view.php';
 ?>