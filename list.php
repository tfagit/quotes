<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/reset.css"/>
		<link href='http://fonts.googleapis.com/css?family=Lato:300,700,300italic,700italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet/less" type="text/css" href="css/main.less"/>
		<script src="js/less-1.3.3.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="js/center.js"></script>
		<link rel="icon" type="image/png" href="assets/favicon.png" />
		<title>Lista de Quotes</title>
	</head>
	<body>
		<div id="wrapper" class="fullcenter">
			<header>
				<h1>Lista de Quotes</h1>
			</header>
			<ul id="nav">
				<li><a href="http://tfats.tk/misctfa">MiscTFA</a></li>
				<li><a href="envio.php">Enviar</a></li>
				<li><a href="random.php">Random</a></li>
				<li><a href="list.php">Lista</a></li>
				<li><a href="listlarge.php">Extendidos</a></li>
			</ul>
			<div id="content" class="left">
				<ol>
					<?php 
						$link = new mysqli('localhost', 'root', 'necropharus', 'misctfa');
						$link->query("SET NAMES 'utf8';SET character_set_connection=utf8;SET character_set_client=utf8;SET character_set_results=utf8;");
						$pedido = $link->query("SELECT * FROM  `smallquotes` LIMIT 0 , 120");
						while ($quote = $pedido->fetch_array()) {
							echo "<li>{$quote['conteudo']}<br><em>{$quote['legenda']}</em></li>";
						}
						$pedido->close();
						mysqli_close($link);
					?>
				</ol>
			</div>
			<footer>&copy; dotbdo, 2013</footer>
		</div>
	</body>
</html>