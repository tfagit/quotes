<div id="content">
	<?php 
		echo '<pre class="quote">' . $quote['conteudo'] . "</pre><p class=\"subtitle\">". htmlspecialchars($quote['legenda'])
		. "</p><p class=\"permalink\"><a href=\"?page=single&id=" . $quote['id'] . "\">permalink</a></p>";
	 ?>
	<a href="?page=random"><input type="submit" value="Try again"></a><a href="?page=random&amp;ext=1"><input type="submit" value="Extendidos"></a>
</div>