	<table width="75%" border="0" align="center" cellpadding="0" cellspacing="1" class="tablaborde"> 
		<tr> 
			<th scope="col">Modulos</th>
			<th scope="col">Activar</th> 
		</tr> 
		|-foreach from=$modules item=module name=modulef-|
		<form name="security" action="Main.php?do=modulesDoLoad" method="POST">
		<tr> 
			<td class="celldato">|-$module-|
				<input type=hidden name="module" value="|-$module-|" />
			</td>
			<td class="celldato">
				<input type="checkbox" name="activeModulo[|-$module-|]" value="|-$module-|"
				|-foreach from=$assignedModules item=asModule-|
				|-if $module[0] eq $asModule->getName()-|
				checked />
				<input type=hidden name="access[|-$action[0]-|]" value="|-$actionsecurity->getAccess()-|" /> 
				|-/if-|
				|-/foreach-|		<input type="submit" name="Activar!" /> 
			</td> 
		</tr>
		|-/foreach-| 
	</table> 
	
</form>
 