<div id="content" class="left">
	<ol>
		<?php 
			foreach($quote as $it){
				echo "<li>" . $it['legenda'] . "<pre>" . $it['conteudo'] . "</pre></li>";
			}
		 ?>
	</ol>
</div>