<?php include 'include/functions.php';
include 'include/header.php'; ?>
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
			</div>
<?php include 'include/footer.php'; ?>