<script type="text/javascript" src="scripts/install.js"></script>

<h2>Configuración del Sistema</h2>
<h1>Instalación de Módulos del Sistema: Módulo <strong>|-$moduleName-|</strong>.</h1>
<fieldset>
	<legend>Tercer Paso - Configuracion de mensajes de log</legend>
	<p>Asigne los mensajes del log correspondientes</p> 
</fieldset>

<form method="post">
<input type="hidden" name="moduleName" value="|-$moduleName-|" />
|-foreach from=$actions item=action -|
	<fieldset> 
		<legend>|-$action-|</legend>
		|-assign var="actionMessages" value=$messages[$action]-|
		|-foreach from=$actionMessages item=message-|
		
			<h4>|-$message|capitalize-|</h4>
			|-foreach from=$languages item=language-|
				|-assign var=languageCode value=$language->getCode()-|
				<p>
					<label for="message[|-$action-|][|-$message-|][|-$languageCode-|]">|-$language->getName()-|</label>
					<input name="message[|-$action-|][|-$message-|][|-$languageCode-|]" type="text" value="|-if isset($actualMessages)-||-$actualMessages.$action.$message.$languageCode-||-/if-|" size="65">
				</p>
			|-/foreach-|
			
		|-/foreach-|
	</fieldset>
	|-/foreach-|
	
	<input type="hidden" name="moduleName" value="|-$moduleName-|" />
	<input type="hidden" name="do" value="installDoSetupMessages" />
	|-if isset($mode)-|
		<input type="hidden" name="mode" value="|-$mode-|" id="mode">
	|-/if-|
	<p>
		<input type="submit" value="Guardar Mensajes" />
		|-include file="InstallFormNavigationInclude.tpl"-|
	</p>
</form>
