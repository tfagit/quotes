<!-- comentário daora -->
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
		<title>Mande seu quote</title>
	</head>
	<body>
		<div id="wrapper" class="fullcenter">
			<header>
				<h1>Mande seu quote</h1>
			</header>
			<ul id="nav">
				<li><a href="http://tfats.tk/misctfa">MiscTFA</a></li>
				<li><a href="envio.php">Enviar</a></li>
				<li><a href="random.php">Random</a></li>
				<li><a href="list.php">Lista</a></li>
				<li><a href="listlarge.php">Extendidos</a></li>
			</ul>
			<div id="content">
				<p>At&eacute; 256 caracteres para quotes pequenos e 4096 para quotes extendidos.</p>
				<p>Tudo &eacute; moderado antes de ser de fato adicionado &agrave; MiscTFA e &agrave; p&aacute;gina de quotes aleat&oacute;rios.</p>

				<input type="submit" id="toggleform" value="Quote grande"><br>

				<form action="envio.php" id="smallquotes" name="smallquotes" method="post">
					<span>Conte&uacute;do</span><br>
					<input type="text" name="conteudosmall" size="64"><br>
					<span>Legenda</span><br>
					<input type="text" name="legenda" size="64"><br>
					<input type="submit" value="Enviar">
				</form>
				<form action="envio.php" id="largequotes" name="largequotes" method="post"
>					<span>Conte&uacute;do</span><br>
					<pre><textarea name="conteudolarge" rows="15" cols="55"></textarea></pre><br>
					<span>Legenda</span><br>
					<input type="text" name="legenda" size="64"><br>
					<input type="submit" value="Enviar">
				</form>
			</div>
			<?php
				if(isset($_POST['legenda'])){
					if((strlen($_POST['legenda']) <= 256) && (strlen($_POST['legenda']) >= 4)){
						$link = new mysqli('localhost', 'root', 'necropharus', 'misctfa');
						$link->query("SET NAMES 'utf8';SET character_set_connection=utf8;SET character_set_client=utf8;SET character_set_results=utf8;");
						if(isset($_POST['conteudosmall'])){
							if (strlen($_POST['conteudosmall']) >= 4 && strlen($_POST['conteudosmall']) <= 256) {
								$inserto = "INSERT INTO misctfa.smallquotes (conteudo, legenda) VALUES ('".$_POST['conteudosmall']."','".$_POST['legenda']."');";
							}
							else {
								echo "<div class=\"error\">Conte&uacute;do inv&aacute;lido (4 a 256 caracteres)</div>";
							}
						}
						if(isset($_POST['conteudolarge'])){
							if (strlen($_POST['conteudolarge']) >= 4 && strlen($_POST['conteudolarge']) <= 4096) {
								$inserto = "INSERT INTO misctfa.largequotes (conteudo, legenda) VALUES ('".$_POST['conteudolarge']."','".$_POST['legenda']."');";
							}
							else {
								echo "<div class=\"error\">Conte&uacute;do inv&aacute;lido (4 a 4096 caracteres)</div>";
							}
						}
						if (isset($inserto)){
							$link->query($inserto);
							echo "<div class=\"success\">Quote enviado com sucesso</div>";
						}
						else {
							echo "query incerta";
						}
						mysqli_close($link);
					}
					else {
						echo "<div class=\"error\">Legenda inv&aacute;lida (4 a 256 caracteres)</div>";
					}
				}
			?>
			<footer>&copy; dotbdo, 2013</footer>
		</div>
	</body>
</html>