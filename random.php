<?php include 'include/functions.php';
include 'include/header.php'; ?>
			<div id="content">
				<?php
					$link = new mysqli('localhost', 'root', 'necropharus', 'misctfa');
					$link->query("SET NAMES 'utf8';SET character_set_connection=utf8;SET character_set_client=utf8;SET character_set_results=utf8;");
					$pedido = $link->query("SELECT * FROM `smallquotes` WHERE id >= (SELECT FLOOR( (MAX(id) + 1) * RAND()) FROM `smallquotes` ) ORDER BY id LIMIT 1");
					$i = 1;
					$quote = $pedido->fetch_array();
					echo "<h1>\"{$quote['conteudo']}\"</h1><p class='subtitle'>{$quote['legenda']}</p>";
					$pedido->close();
					mysqli_close($link);
				?>
				<a href="random.php"><input type="submit" value="Try again"></a><a href="randomlarge.php"><input type="submit" value="Extendidos"></a>
			</div>
<?php include 'include/footer.php'; ?>