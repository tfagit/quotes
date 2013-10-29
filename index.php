<?php include 'include/functions.php';
include 'include/header.php'; ?>
			<div id="content" class="left">
				<ol>
					<?php 
						$link = new mysqli('localhost', 'root', 'necropharus', 'misctfa');
						$link->query("SET NAMES 'utf8';SET character_set_connection=utf8;SET character_set_client=utf8;SET character_set_results=utf8;");
						$pedido = $link->query("SELECT * FROM  `smallquotes` LIMIT 0 , 120");
						while ($quote = $pedido->fetch_array()) {
							echo "<li>{$quote['conteudo']}<br><em>{$quote['legenda']}</em></li>";
						}
						$pedido->close();
						mysqli_close($link);
					?>
				</ol>
			</div>
<?php include 'include/footer.php'; ?>