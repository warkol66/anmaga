<script type="text/javascript" src="Main.php?do=js&name=js&module=install&code=|-$currentLanguageCode-|"></script>

<h2>Configuración del Sistema</h2>
<h1>Instalación de Módulos del Sistema: Módulo <strong>|-$moduleName-|</strong>.</h1>
<fieldset>
	<legend>Cuarto Paso - Verificación de archivos</legend>
	<p>A continuación podrá verificar el resultado del proceso de instalación. La falta de alguno de los archivos no representa un error.</p>
	<div>
	<h4>Phpmvc-config.xml</h4>
	<p>El archivo phpmvc-config-|-$moduleName-|.xml |-if empty($phpConfigXMLContent)-|no se encontró en el directorio.|-else-|está presente.|-/if-|</p>
 	<h4>ModulePaths-|-$moduleName-|.php</h4>
 	<p>El archivo de path de módulo "ModulePath-|-$moduleName-|.php" |-if empty($modulePathsContent)-|no se encontró en el directorio.|-else-|está presente.|-/if-|</p>
	<h4>Archivos generados durante la instalación</h4>
	<h4>Primer Paso - Información del Módulo</h4>
		<pre>|-$information-|</pre>
		|-foreach from=$informations item=information key=languageCode-|		
		<h5>|-$languageCode-|</h5>		
		<pre>|-$information-|</pre>
		|-/foreach-|
	<h4>PSegundo Paso - Labels</h4>
		|-foreach from=$actionsLabel item=labels key=languageCode-|		
		<h5>|-$languageCode-|</h5>		
		<pre>|-$labels-|</pre>
		|-/foreach-|
	<h4>Segundo Paso - Configuración de Permisos</h4>
		<pre>|-$permissions-|</pre>
	<h4>Tercer Paso - Configuración de mensajes de log</h4>
		|-foreach from=$messages item=messages key=languageCode-|		
		<h5>|-$languageCode-|</h5>		
		<pre>|-$messages-|</pre>
		|-/foreach-|
</div>

<p>
<br />
<form method="post">
	<input type="hidden" name="moduleName" value="|-$moduleName-|" />
	<input type="hidden" name="do" value="installDoFileCheck" />
	|-foreach from=$languages item=language-|
	<input type="hidden" name="languages[]" value="|-$language->getCode()-|" />
	|-/foreach-|
	<input type="submit" value="Aceptar Configuración, sin ejecutar SQLs" />
	<input type="button" value="Aceptar Configuración y ejecutar SQLs" onClick="javascript:installExecuteSQL(this.form)"/>
</form>
</p>
</fieldset>
