<script type="text/javascript" language="javascript">
// <![CDATA[
	function showBackupLoader() {
		
		$('backupLoader').show();
	}
	
	function hideBackupLoader() {
		
		$('backupLoader').hide();
		$('backupLoaderForm').reset();
	}
// ]]>
</script>

<h2>Respaldos del Sistema</h2>
<h1>Administrción de Respaldos</h1>
<div id="div_addresses">
	|-if $message eq "created"-|
		<div class="successMessage">Backup creado correctamente.</div>
	|-elseif $message eq "create_error"-|
		<div class="successMessage">Se ha producido un error al crear el backup.</div>
	|-elseif $message eq "restored"-|
		<div class="successMessage">Se ha restaurado el backup seleccionado.</div>
	|-elseif $message eq "restore_error"-|
		<div class="successMessage">Se ha producido un error al restaurar el backup.</div>
	|-elseif $message eq "deleted"-|
		<div class="successMessage">Se ha eliminado el backup seleccionado.</div>
	|-elseif $message eq "delete_error"-|
		<div class="successMessage">Se ha producido un error al eliminar el backup.</div>
	|-elseif $message eq "not_exists"-|
		<div class="successMessage">El archivo de backup pedido no existe.</div>
	|-/if-|
	<p>Esta herramienta le permite generar y restaurar respaldos de la información contenida en el sistema. Puede guardar los respaldos en el servidor o en su equipo.</p>
	<p>Recuerde que al resutaurar un respaldo toda la información existente se reemplazará por la información que está en el respaldo</p>
	<fieldset class='nestedFieldset' title='Administrador de Respaldos'>
	<legend>Administrar Respaldos</legend>
	<p>Generar respaldo almacenado en el servidor <a href='Main.php?do=backupCreate' title='Generar respaldo en servidor'><img src="images/clear.png"  class='linkImageStoreInServer' /></a></p>
	<p>Generar respaldo para descargar <a href='Main.php?do=backupCreateToFile' title='Generar respaldo para descargar'><img src="images/clear.png"  class='linkImageStoreLocal' /></a></p>
	<p>Restaurar respaldo desde una copia local <a href='javascript:showBackupLoader()' title='Seleccionar archivo local para restaurar'><img src="images/clear.png"  class='linkImageRestore' /></a></p>
		<div id="backupLoader" style="display: none;">
		<br />
			<fieldset title='Formulario de carga de archivo de respaldo local'>
			<legend>Restaurar respaldo desde copia local</legend>
			<form id="backupLoaderForm" action="Main.php" method="post" enctype="multipart/form-data">
				<p>A continuacion indique el archivo local a restaurar en el sistema:</p>
				<p><label>Archivo: </label>
					<input type="file" name="backup" value="" size="60" /></p>		
				<input type="hidden" name="do" value="backupRestoreFromFile" />
				<p>
					<input type="submit" value="Restaurar Backup Local" accept="txt/sql" onclick="return confirm('Esta opción reemplazará la información en el sistema por la información en este respaldo. ¿Está seguro que desea continuar?');"/>
					<input type="button" value="Cancelar" onClick="hideBackupLoader()"/>
				</p>
			</form>
			</fieldset>
		</div>
	<table id="tabla-backups" border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'>
		<thead>
			<tr>
				<th width="1%">&nbsp;</th>
				<th width="60%">Nombre de Archivo</th>
				<th width="20%">Fecha y hora</th>
				<th width="15%">Tamaño</th>
				<th width="4%">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		|-if empty($filenames)-|
			<tr>
				<th colspan="5" class="thFillTitle">No hay respaldos disponibles</th>
			</tr>
		|-/if-|
		|-foreach from=$filenames item=filename name=for_filenames-|
			<tr>
				<td><a href="Main.php?do=backupDownload&filename=|-$filename.name-|"><img src="images/clear.png"  class='linkImageDownload' /></a></td>
				<td>|-$filename.name-|</td>
				<td align="right">|-$filename.time|date_format:"%Y-%m-%d %H:%M:%S"|change_timezone|date_format:"%d-%m-%Y %H:%M:%S"-|</td>
				<td align="right">|-$filename.size|number_format:3:",":"."-| kb</td>
				<td nowrap>
					<form action="Main.php" method="post">
						<input type="hidden" name="filename" value="|-$filename.name-|"  />
						<input type="hidden" name="do" value="backupRestore" />
						<input type="submit" value="Restaurar Backup" class="buttonImageRestoreFromServer" title='Restaurar este respaldo' onclick="return confirm('Esta opción reemplazará la información en el sistema por la información en este respaldo. ¿Está seguro que desea continuar?');" />
					</form>
					<form action="Main.php" method="post">
						<input type="hidden" name="filename" value="|-$filename.name-|"  />
						<input type="hidden" name="do" value="backupDelete" />
						<input type="submit" value="Eliminar Backup" class="buttonImageDelete" title='Eliminar este respaldo' onclick="return confirm('Esta opción elimina permanentemente este respaldo. ¿Está seguro que desea eliminarlo?');" />
					</form>				
				</td>
			</tr>
		|-/foreach-|						
		</tbody>
	</table>
	</fieldset>
</div>
