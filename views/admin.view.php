<div id="content">
	<p>Avalie os quotes pendentes</p>
	<ul id="modlist">
		<?php 
			if(!count($quotes))
				echo "N&atilde;o h&aacute; quotes pendentes.";
			else
				foreach($quotes as $quote)
					require 'views/modquote.view.php';
		?>
	</ul>
	<?= $extended ? '<a href="?page=admin">Quotes comuns</a>' : '<a href="?page=admin&ext=1">Quotes extendidos</a>'; ?>
</div>