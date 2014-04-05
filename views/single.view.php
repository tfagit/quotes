<div id="content">
	<?php 
		echo '<pre class="quote">' . $quote['conteudo'] . "</pre><p class=\"subtitle\">". $quote['legenda']
			. "</p><p class=\"permalink\"><a href=\"?page=single";
		if ($extended) echo '&ext=1';
		echo "&id=" . $quote['id'] . "\">permalink</a>";
		if (isset($_SESSION['logged_in'])){
			echo " | <a href=\"?page=edit";
			if ($extended) echo '&ext=1';
			echo "&id=" . $quote['id'] . "\">editar</a>";
		}
		echo "</p>";
	 ?>
</div>