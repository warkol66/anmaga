<table border='0' cellpadding='0' cellspacing='0' width='100%'> 
	<tr> 
		 <td class='title'>Configuración del Sistema</td> 
	 </tr> 
	<tr> 
		 <td class='underlineTitle'><img src="images/clear.gif" height='3' width='1'></td> 
	 </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
	<tr> 
		 <td class='backgroundTitle'>Instalacion de Módulos del Sistema</td> 
	 </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
	<tr> 
		 <td class="tdSize2">Instalacion de modulo <strong>|-$moduleName-|</strong>.</td> 
	 </tr> 
	<tr> 
		 <td class="tdSize2">Cuarto Paso - Verificacion de archivos.</td> 
	 </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
</table> 

<div >
	<p>Archivo phpmvc-config-|-$moduleName-|.xml |-if empty($phpConfigXMLContent)-| inexistente |-else-|existente|-/if-|</p>
	<p>
	   |-if not empty($phpConfigXMLContent)-|
		<code>|-$phpConfigXMLContent-|</code>
	   |-/if-|
	 </p>
 	<p>Archivo Module Paths modulepaths-|-$moduleName-|.php |-if empty($modulePathsContent)-| inexistente |-else-|existente|-/if-|</p>
	<p>
	   |-if not empty($modulePathsContent)-|
		<code>|-$modulePathsContent-|</code>
	   |-/if-|
	 </p>
	<p>Archivo sql-|-$moduleName-|.sql |-if empty($sqlContent)-| inexistente |-else-|existente|-/if-|</p>
	<p>
	   |-if not empty($sqlContent)-|
		<code>|-$sqlContent-|</code>
	   |-/if-|
	 </p>

</div>

<form method="post">
<input type="hidden" name="moduleName" value="|-$moduleName-|" />
	<input type="hidden" name="do" value="installDoSetupMessage" />
	<p><input type="submit" value="Aceptar Configuracion" /></p>
</form>

