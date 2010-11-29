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
			<input type="hidden" name="do" value="securityActionRegUsersList" />
		 </td>
	 </tr>
	</table>
</form>

|-if $moduleView ne ""-|
<h3>Seguridad de los actions del módulo |-$moduleView-| para usuarios por registración</h3>

|-if $message eq "saved"-|
<p class="ok">Cambios guardados.</p>
|-/if-|

<form name="security2" action="Main.php" method="post">
	<table width="100%" border="0" cellpadding="0" cellspacing="1" class="tablaborde"> 
		<tr> 
			<th scope="col">Actions</th> 
			<th scope="col">Descripcion</th> 
			<th scope="col">Acceso Habilitado a Usuarios por Registración?</th>
		</tr> 
		|-foreach from=$actions item=action name=for_actions-|
		<tr>
			<th scope="row">
				|-$action->getAction()-|
				<input type="hidden" name="actions[]" value="|-$action->getAction()-|" />
			</th> 
			<td>|-$action->getLabel()-|</td>
			<td class="celldato">
				<input type="checkbox" name="access[|-$action->getAction()-|]" value="1"|-if $action->getAccessRegistrationUser() eq "1"-| checked="checked"|-/if-| />
			</td>
		</tr>		
		|-/foreach-|
		<tr>
			<td>
				<input type="submit" value="Guardar" />
				<input type="hidden" name="module" value="|-$moduleView-|" />
				<input type="hidden" name="do" value="securityActionRegUsersDoSave" />
			</td>
		</tr>
	</table>
</form>
|-/if-|
