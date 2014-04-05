<div id="content" class="left">
	<ol>
		<?php 
			foreach($quote as $it){
				echo "<a href=\"?page=single&id=" . $it['id'] . "\"><li>" . $it['conteudo'] . "<p class=\"subtitle\">" . $it['legenda'] . "</p></li></a>";
			}
		 ?>
	</ol>
</div>