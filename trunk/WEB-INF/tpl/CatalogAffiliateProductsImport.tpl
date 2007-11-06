|- if isset($rowsCreated)-|

<div id="resultado-importacion" >
	<p>Resultado de la importacion</p>
	<p>Registros Creados: |- $rowsCreated-|</p>
	<p>Registros Leidos: |- $rowsReaded -|</p>
</div>	

|-else-|
<div class="contentTitle">Importacion de Precios Diferenciales a Afiliados desde CSV</div>
<div id="menu-de-importacion" >

	<form id="consulta-form" method="post" class="cmxform" action="Main.php?do=catalogAffiliateProductsDoImport" enctype="multipart/form-data">
		<legend></legend>
		<fieldset style="width:500px;">
		Seleccione el archivo con los Precios a importar y un afiliado , luego haga click en &quot;Importar&quot;.<br>
El	archivo	a importar debe tener los siguientes campos: |-$importKey-|
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
					<label>Archivo de importacion:</label>	
					<input name="fileImport" type="file" id="fileImport" size="50">
					</input>
				</li>
		</ol>
			<input type="submit" value="Importar" id="import-button" />
		</fieldset>

	</form>

</div>

|-/if-|

