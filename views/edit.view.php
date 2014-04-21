<div id="content">
	<p><?= $_SERVER['REQUEST_METHOD'] == 'POST' && isset($alert) ? $alert : 'Edite um quote'?></p>
	<ul id="modlist">
		<?php
			if (empty($quote))
				echo "Esse quote n&atildeo existe.";
			else
				require 'modquote.view.php';
		?>
	</ul>
</div>