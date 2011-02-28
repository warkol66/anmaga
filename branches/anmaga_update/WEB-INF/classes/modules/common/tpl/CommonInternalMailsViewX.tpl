<h2>Mensajería Interna</h2>
<h1>Asunto: |-$internalMail->getSubject()-|</h1>
<div id="div_internalMail">
	<fieldset>
		<legend>Datos del mensaje</legend>
		<p class="textAfterLabel">
			<label>Fecha: </label>
			|-$internalMail->getCreatedAt()|change_timezone|date_format:"%d-%m-%Y %H:%M:%S"-|
		</p>
		<p class="textAfterLabel">
			<label>De: </label>
			|-assign var=userFrom value=$internalMail->getFrom()-|
			|-$userFrom->getName()-|
		</p>
		<p class="textAfterLabel">
			<label>Para: </label>
			|-foreach from=$internalMail->getRecipients() item=recipient-|
				<span>|-$recipient->getName()-|</span><br />
			|-/foreach-|
		</p>		
	</fieldset>
		<p class="textAfterLabel">
			<label>Mensaje: </label>
		</p>
			|-$internalMail->getBody()-|
			<p>&nbsp;</p>
			<p>&nbsp;</p>
	<hr />	
			<p>&nbsp;</p>
	<form method="GET" action="Main.php">
			<p>
				<input type="hidden" name="do" id="do" value="commonInternalMailsEdit" />
				<input type="hidden" name="replyId" id="replyId" value="|-$internalMail->getId()-|" />
				<input type="hidden" name="page" id="page" value="|-$page-|" />
				<input type="submit" id="button_reply_internalMail" name="button_reply_internalMail" title="Responder a todos" value="Responder a todos" />
			</p>
	</form>
</div>
