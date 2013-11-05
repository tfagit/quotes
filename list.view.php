<div id="content" class="left">
	<ol>
		<?php 
			foreach($quote as $it){
				echo "<li>" . $it['conteudo'] . "<p class=\"subtitle\">" . $it['legenda'] . "</p></li>";
			}
		 ?>
	</ol>
</div>