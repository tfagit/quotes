<?php include 'include/functions.php';
include 'include/header.php'; ?>
			<div id="content" class="left">
				<ol>
					<?php 
						$link = new mysqli('localhost', 'root', 'necropharus', 'misctfa');
						$link->query("SET NAMES 'utf8';SET character_set_connection=utf8;SET character_set_client=utf8;SET character_set_results=utf8;");
						$pedido = $link->query("SELECT * FROM  `largequotes` LIMIT 0 , 120");
						$i = 1;
						while ($quote = $pedido->fetch_array()) {
							echo "<li>{$quote['legenda']}<pre>{$quote['conteudo']}</pre></li>";
							$i++;
						}
						$pedido->close();
						mysqli_close($link);
					?>
				</ol>
			</div>
<?php include 'include/footer.php'; ?>