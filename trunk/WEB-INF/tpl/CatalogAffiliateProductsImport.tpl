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
		<td class='backgroundTitle'>Lista de precios por afiliado </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>A continuación podrá cargar una lista de precios por afiliado </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>
|- if isset($rowsCreated)-|

<div id="resultado-importacion" >
	<p>Resultado de la importación</p>
	<p>Registros Creados: |- $rowsCreated-|</p>
	<p>Registros Leidos: |- $rowsReaded -|</p>
</div>	

|-else-|
<div id="menu-de-importacion" >
	<form id="consulta-form" method="post" class="cmxform" action="Main.php?do=catalogAffiliateProductsDoImport" enctype="multipart/form-data">
		<legend></legend>
		<fieldset style="width:550px;">
		Seleccione el archivo con los Precios a importar y el afiliado correspondiente, luego haga click en &quot;Importar&quot;.<br>
El archivo a importar debe tener los siguientes campos: <em>|-$importKey-|</em>
<ol>
				<li>
					<label>Afiliado al que se le cargaran los precios:</label>
					<select id="affiliate" name="affiliate" >
						|-foreach from=$affiliates item=affiliate -| 
						<option value="|- $affiliate->getId() -|" >|-$affiliate->getName()-|</option>
						|- /foreach -|
					</select>
				</li>
				<li>
					<label>Archivo de importación:</label>	
					<input name="fileImport" type="file" id="fileImport" size="50">
					</input>
				</li>
		</ol>
			<input type="submit" value="Importar" id="import-button" />
		</fieldset>

	</form>

</div>

|-/if-|

