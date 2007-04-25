<script>

function checkscript() {
		alert('No puede desactivar este modulo. Desactive manualmente la casilla alwaysActive en sql si en verdad desea desactivarlo');
		return false;
	}
</script><!--<script src="scripts/datePicker.js">-->
	<table width="75%" border="0" align="center" cellpadding="0" cellspacing="1" class="tablaborde"> 
		<tr> 
			<th scope="col">Modulos</th>
			<th scope="col">Descripcion</th>
			<th scope="col">Etiqueta</th>
			<th scope="col">Activar</th> 
		</tr> 
		|-foreach from=$modules item=module name=modulef-|
			
			<form name="security" action="Main.php?do=modulesDoLoad" method="POST">
		<tr> 
			<td class="celldato">|-$module-|
				<input type=hidden name="module" value="|-$module-|" />
			</td>
			<td class="celldato">
				<textarea rows="2" cols="20" name="description">|-foreach from=$assignedModules item=asModule-||-if $module eq $asModule->getName()-||-$asModule->getDescription()-||-/if-||-/foreach-|</textarea>
			</td>
			<td class="celldato">
				<input type="text" name="label" value="|-foreach from=$assignedModules item=asModule-||-if $module eq $asModule->getName()-||-$asModule->getLabel()-||-/if-||-/foreach-|" />
			</td>
			<td class="celldato">
				<input type="checkbox" name="activeModule" value="1"
				|-foreach from=$assignedModules item=asModule-|
				|-if $module eq $asModule->getName()-|
					|-if $asModule->getActive() eq 1-|			
				checked 
					|-/if-|
					|-if $asModule->getAlwaysActive() eq 1-|
						disabled
					|-/if-|
				|-/if-|
				|-/foreach-|
				/>


				|-foreach from=$assignedModules item=asModule-|
				|-if $module eq $asModule->getName()-|
					|-if $asModule->getAlwaysActive() eq 1-|
						<img border="0"
src="images/help.png" name="b1" height=20 width=20 onmouseover="return checkscript()"/>
					|-/if-|
				|-/if-|
				|-/foreach-|

				<input type="submit" name="Activar!" /> 
				<!-- esta linea iria en la linea 37 en reemplazo de disabled onClick="return checkscript()"   onmouseover="return checkscript()"-->
			</td> 
		</tr>
		
		</form>
			
		|-/foreach-| 
	</table> 
	

 