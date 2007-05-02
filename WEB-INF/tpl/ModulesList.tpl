<script>

function checkscript() {
		alert('No puede desactivar este modulo. Desactive manualmente la casilla alwaysActive en sql si en verdad desea desactivarlo');
		return false;
	}
</script><!--<script src="scripts/datePicker.js">-->
	<table width="90%" border="1" align="center" cellpadding="0" cellspacing="1" class="tablaborde"> 
		<tr> 
			<th scope="col">Modulos</th>
			<th scope="col">Descripcion</th>
			<th scope="col">Etiqueta</th>
			<th scope="col">Activar</th> 
		</tr> 
		|-foreach from=$assignedModules item=asModule name=modulef-|
			
			<form name="security" action="Main.php?do=modulesDoActivateX" method="POST">
		<tr> 
			<td class="celldato"><a href="Main.php?do=modulesEdit&moduleName=|-$asModule->getName()-|">|-$asModule->getName()-|</a href>
				<input type=hidden name="module" value="|-$module-|" />
			</td>
			<td class="celldato">
				|-$asModule->getDescription()-|
			</td>
			<td class="celldato">
				|-$asModule->getLabel()-|
			</td>
			<td class="celldato">
				<input type="checkbox" name="activeModule" value="1"
					|-if $asModule->getActive() eq 1-|			
				checked 
					|-/if-|
					|-if $asModule->getAlwaysActive() eq 1-|
						checked disabled
					|-/if-|
				/>

					|-if $asModule->getAlwaysActive() eq 1-|
						<img border="0"
src="images/help.png" name="b1" height=20 width=20 onmouseover="return checkscript()"/>
					|-/if-|
				

				<input type="submit" name="Activar" value ="Guardar"/> 
				<!-- esta linea iria en la linea 37 en reemplazo de disabled onClick="return checkscript()"   onmouseover="return checkscript()"-->
			</td> 
		</tr>
		
		</form>
			
		|-/foreach-| 
	</table> 
	

 