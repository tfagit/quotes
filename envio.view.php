<div id="content">
	<p>At&eacute; 256 caracteres para quotes pequenos e 4096 para quotes extendidos.</p>
	<p>Tudo &eacute; moderado antes de ser de fato adicionado &agrave; MiscTFA e &agrave; p&aacute;gina de quotes aleat&oacute;rios.</p>

	<input type="submit" id="toggleform" value="Quote grande"><br>

	<form action="?page=envio" id="smallquotes" name="smallquotes" method="post">
		<span>Conte&uacute;do</span><br>
		<input type="text" name="conteudosmall" size="64"><br>
		<span>Legenda</span><br>
		<input type="text" name="legenda" size="64"><br>
		<input type="submit" value="Enviar">
	</form>
	<form action="?page=envio" id="largequotes" name="largequotes" method="post">
		<span>Conte&uacute;do</span><br>
		<pre><textarea name="conteudolarge" rows="15" cols="55"></textarea></pre><br>
		<span>Legenda</span><br>
		<input type="text" name="legenda" size="64"><br>
		<input type="submit" value="Enviar">
	</form>
	<?php if (isset($feedback)) echo '<div class="success">' . $feedback . '</div>'; ?>
</div>