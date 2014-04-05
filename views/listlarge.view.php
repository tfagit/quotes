<div id="content" class="left">
	<ol>
		<?php 
			foreach($quote as $it){
				echo "<a href=\"?page=single&ext=1&id=" . $it['id'] . "\"><li>" . $it['legenda'] . "<pre>" . $it['conteudo'] . "</pre></li></a>";
			}
		 ?>
	</ol>
</div>