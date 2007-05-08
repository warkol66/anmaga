<script>

function checkscript() {
		alert('No puede desactivar este modulo. Desactive manualmente la casilla alwaysActive en sql si en verdad desea desactivarlo');
		return false;
	}
</script>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="tablaborde"> 
	<tr>
		<th>Activaci&oacute;n de m&oacute;dulos del sistema</th>
	</tr>
	<tr>
		<td>Aqui puede activar o desactivar los m&oacute;dulos del sistema. Recuerde que hay ciertos m&oacute;dulos que dependen de otros, y que solo podr&aacute;n ser activados si su dependiente esta activado.
		</td>
	</tr>
</table>

<table width="60%" border="0" align="center" cellpadding="0" cellspacing="0" class="tablaborde"> 
	|-if $message eq "errorDependencyOff"-|
	<tr>
		<td>Error: Ha intentado activar un m&oacute;dulo que necesita la activaci&oacute;n de otro(s) m&oacute;dulo(s)
		</td>
	</tr>
	|-elseif $message eq "errorDependencyOn"-|
	<tr>
		<td>Error: Ha intentado activar un m&oacute;dulo que necesita la desactivaci&oacute;n de otro(s) m&oacute;dulo(s)
		</td>
	</tr>
	|-/if-|
	|-if $modulesNumber > 1-|
	<tr>
		<td> Se han cargado |- $modulesNumber-| nuevos m&oacute;dulos:</td>
	</tr>
	|-elseif $modulesNumber eq 1-|
	<tr>
		<td>Se ha cargado |- $modulesNumber-| nuevo m&oacute;dulo:</td>
	</tr>
	|-/if-|
	|-foreach from=$modules item=module name=modu-|
	<tr>
		<td>|-$module.module-|</td>
		<td>|-$module.active-|</td>
	</tr>
	|-/foreach-|
</table>
	<br><br>
<table width="90%" border="1" align="center" cellpadding="0" cellspacing="1" class="tablaborde" id="table_modulesaaaa_list"> 
		<tr> 
			<th scope="col">Modulos</th>
			<th scope="col">Descripcion</th>
			<th scope="col">Etiqueta</th>
			<th scope="col">Activar</th> 
		</tr>
		|-foreach from=$assignedModules item=asModule name=modulef-|
			
	<form name="modules" action="Main.php" method="POST" id="form_modulesActivate">
		<tr id="testId">
			<input type="hidden" name="do" value="modulesDoActivateX" />
			<td class="celldato"><a href="Main.php?do=modulesEdit&moduleName=|-$asModule->getName()-|">|-$asModule->getName()-|</a href>
				<input type=hidden name="module" value="|-$asModule->getName()-|" />
			</td>
			<td class="celldato">
				|-$asModule->getDescription()-|
			</td>
			<td class="celldato">
				|-$asModule->getLabel()-|
			</td>
			<td class="celldato">
			|-if $asModule->getAlwaysActive() eq 1-|
				<input type="checkbox" name="activeModule" value="1" checked disabled />
				<img border="0" src="images/help.png" name="b1" height=20 width=20 onClick="return checkscript()"/>	
			|-else-| 		
				<input type="checkbox" id="active" name="activeModule" value="1" |-if $asModule->getActive() eq 1-|checked|-/if-| onclick="modulesDoActivateX()"/>	
			<input type="submit" name="activar" value ="Guardar"/><span id="systemWorking" style="display:none;">Actualizando sistema...</span>
			|-/if-|
			</td> 
		</tr>
		
	</form>
			
		|-/foreach-| 
</table> 
	

 