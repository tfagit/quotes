<?php 
	function print_title(){
		$pagenames = array(
			"envio" => "Envio",
			"index" => "Lista de Quotes",
			"listlarge" => "Lista de Quotes Extendidos",
			"random" => "Quote Aleat&oacute;rio",
			"randomlarge" => "Quote Extendido Aleat&oacute;rio"
		);
		$basename = basename($_SERVER['REQUEST_URI']);
		$basename = explode('.php',$basename)[0];
		if (isset($pagenames[$basename])) {
			echo "{$pagenames[$basename]} | misctfa";
		}
		else {
			echo "$basename | misctfa";
		}
		return 1;
	}
 ?>