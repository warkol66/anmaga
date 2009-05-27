<script>
function checkscript() {
		alert('El sistema requiere que este módulo siempre esté activo.');
		return false;
	}
</script>
<h2>Configuración del Sistema</h2>
<h1>Administración de Módulos del Sistema</h1>
<p>A continuación podrá administrar los módulos disponibles en el sistema. Para activar o desactivar módulos, debe tener en cuenta las dependencias de los mismos.</p> 
<div id="systemWorking" style="display:none;"></div>
<table width="70%" border="0" align="center" cellpadding="5" cellspacing="0"> 
	<tr> 
		<td class="tdSize2" id="message"></td> 
		<td class="tdSize2" id="messageMod"></td> 
	</tr> 
	|-if $modulesNumber gt 0-|
	<tr> 
		<td colspan="2" class="tdSize2">Se cargarón en el sistema el siguiente número de módulos nuevos: |-$modulesNumber-| módulo(s) </td> 
	</tr> 
	<tr> 
		<td colspan="2" class="tdSize2">Detalle de módulos instalados:</td> 
	</tr> 
	|-/if-|
	|-foreach from=$modules item=module name=modu-|
	<tr> 
		<td class="tdSize1">|-$module.module-|</td> 
		<td class="tdSize1">|-$module.active-|</td> 
	</tr> 
	|-/foreach-|
	<tr> 
		<td colspan="2">&nbsp;</td> 
	</tr> 
</table> 
<table width="100%" cellpadding="5" cellspacing="0" class="tableTdBorders"> 
	<tr> 
		<th width="15%" scope="col" class="thFillTitle">Módulo</th> 
		<th width="70%" scope="col" class="thFillTitle">Descripción</th> 
		<th width="5%" scope="col" class="thFillTitle">Activar</th> 
	</tr> 
	|-foreach from=$installedModules item=eachModule name=foreachModule-|
	<tr> 
		<td class="tdSize1"> <a href="Main.php?do=modulesEdit&moduleName=|-$eachModule->getName()-|">|-if $eachModule->getLabel() neq ''-||-$eachModule->getLabel()-||-else-||-$eachModule->getName()-||-/if-|</a> </td> 
		<td class="tdSize1"> |-$eachModule->getDescription()-| </td> 
		<td class="tdSize1" nowrap> <form id="form_|-$eachModule->getName()-|"> 
				<input type="hidden" name="module" value="|-$eachModule->getName()-|" /> 
				<input type="hidden" name="do" value="modulesDoActivateX" /> 
				|-if $eachModule->getAlwaysActive() eq 1-|
				<input type="checkbox" name="activeModule" value="1" checked="checked" disabled="disabled" /> 
				<img src="images/clear.png" class="linkImageInfo" height="16" width="16" title="Información" alt="Información" onClick="return checkscript()"/> |-else-|
				<input type="checkbox" id="active_|-$eachModule->getName()-|" name="activeModule" value="1" |-if $eachModule->getActive() eq 1-|checked="checked"|-/if-| onclick="modulesDoActivateX(this.form)" /> |-/if-|
		</form></td> 
	</tr> 
	|-/foreach-|
</table> 
