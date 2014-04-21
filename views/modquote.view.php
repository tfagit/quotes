<li>
	<form action="?page=admin<?= $extended ? "&ext=1" : '' ?>" method="post">
		ID: <?=$quote['id']?><br>
		Conte&uacute;do:<br>
		<?= $extended ? 
			'<pre><textarea name="conteudolarge" rows="2" cols="60">' . str_replace('"', '&quot;', $quote['conteudo']) . '</textarea></pre>'
			: '<input type="text" name="conteudosmall" size="64" value="' . str_replace('"', '&quot;', $quote['conteudo']) . '"><br>'
		?>
		Legenda:<br><input type="text" name="legenda" size="64" value="<?=str_replace('"', '&quot;', $quote['legenda'])?>"><br>
		<input type="submit" name="rating" value="Aprovar"><input type="submit" name="rating" value="Reprovar"><input type="hidden" name="id" value="<?=$quote['id']?>">
	</form>
</li>