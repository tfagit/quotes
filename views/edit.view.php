<div id="content">
	<p>Edite um quote</p>
	<ul id="modlist">
		<?php
			if (empty($quote))
				echo "Esse quote n&atildeo existe.";
			else
				require 'modquote.view.php';
		?>
	</ul>
</div>