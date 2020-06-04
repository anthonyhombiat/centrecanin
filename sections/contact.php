<article>
	<header>
		<h2>Nous contacter</h2>
	</header>
	<form id="form_contact" name="form_contact" method="post" action="utils/mailer.php">
		<table id="form_table">
			<tr><td colspan="2">&Eacute;crire un message au<br /> Centre canin de la Dent de Crolles</td></tr>
			<tr>
				<td><label for="name">Nom</label></td>
				<td><input type="text" name="name" id="name" value="" /></td>
			</tr>
			<tr>
				<td><label for="email">Mail</label></td>
				<td><input type="text" name="email" id="email" value="" /></td>
			</tr>
			<tr>
				<td><label for="message">Message</label></td>
				<td><textarea rows="5" id="message" name="message"></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><input name="form_contact_button" id="form_contact_button" type="button" value="Envoyer !" /></td>
			</tr>
		</table>
	</form>
</article>
