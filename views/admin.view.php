<div id="content">
	<p>Avalie os quotes pendentes</p>
	<ul id="modlist">
		<?= empty($quotelist) ? "N&atilde;o h&aacute; quotes pendentes." : $quotelist; ?>
	</ul>
	<?= $extended ? '<a href="?page=admin">Quotes comuns</a>' : '<a href="?page=admin&ext=1">Quotes extendidos</a>'; ?>
</div>