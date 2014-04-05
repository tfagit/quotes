<div id="content">
	<?= isset($alert) ? $alert : ''; ?>
	<p>Digite as credenciais necess&aacute;rias para ter acesso &agrave; p&aacute;gina de modera&ccedil;&atilde;o. Eu sou pregui&ccedil;oso, ent&atilde;o n&atilde;o vou implementar nenhum sistema de contas ou algo assim. Ou voc&ecirc; sabe ou voc&ecirc; n&atilde;o sabe.</p>
	<form action="?page=auth" id="auth" method="post">
		<input type="password" name="password"/><br>
		<input type="submit" value="Entrar"/>
	</form>
</div>