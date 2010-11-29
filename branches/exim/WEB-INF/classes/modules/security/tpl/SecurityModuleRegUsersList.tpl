<form name="securityFilter" id="securityFilter" action="Main.php" method="get">
	<table>
	 <tr class="row_even">
		 <td nowrap class="style6">Seleccion de módulo:&nbsp;</td>
		 <td>
			<select name="module" size="1"  class="TXTnormal" onchange="if (this.options[this.selectedIndex].value) document.forms.securityFilter.submit()">
			<option value='todos'>Seleccione</option>
			|-foreach from=$modulesName item=moduleName-|
				<option value="|-$moduleName->getName()-|"> |-$moduleName->getName()-|</option>
			|-/foreach-|
			</select>
			<input type="hidden" name="do" value="securityModuleRegUsersList" />
		 </td>
	 </tr>
	</table>
</form>

|-if $moduleSelected ne ""-|
<h3>Seguridad del módulo |-$moduleSelected->getModule()-| para usuarios por registración</h3>

|-if $message eq "saved"-|
<p class="ok">Cambios guardados.</p>
|-/if-|

<form name="security2" action="Main.php" method="post">
	<table width="100%" border="0" cellpadding="0" cellspacing="1" class="tablaborde"> 
		<tr> 
			<th scope="col">Módulo</th> 
			<th scope="col">Acceso Habilitado a Usuarios por Registración?</th>
		</tr> 
		<tr>
			<th scope="row">
				|-$moduleSelected->getModule()-|
			</th> 
			<td class="celldato">
				<input type="checkbox" name="access" value="1"|-if $moduleSelected->getAccessRegistrationUser() eq "1"-| checked="checked"|-/if-| />
			</td>
		</tr>		
		<tr>
			<td>
				<input type="submit" value="Guardar" />
				<input type="hidden" name="module" value="|-$moduleSelected->getModule()-|" />
				<input type="hidden" name="do" value="securityModuleRegUsersDoSave" />	
			</td>
		</tr>
	</table>
</form>
|-/if-|
