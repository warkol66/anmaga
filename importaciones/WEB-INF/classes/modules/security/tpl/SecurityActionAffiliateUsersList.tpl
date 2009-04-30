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
				<input type="hidden" name="do" value="securityActionAffiliateUsersList" />
			 </td>
		 </tr>
	</table>
</form>

|-if $moduleView ne ""-|
<h3>Seguridad de los actions del módulo |-$moduleView-| para usuarios afiliados</h3>

|-if $message eq "saved"-|
<p class="ok">Cambios guardados.</p>
|-/if-|	

<form name="security2" action="Main.php" method="post">
	<table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableTdBorders">
		<tr> 
			<th scope="col">Actions</th> 
			<th scope="col">Descripcion</th> 
			<th scope="col">Permisos</th>
		</tr> 
		|-foreach from=$actions item=action name=for_actions-|
		<tr>
			<th scope="row">
				|-$action->getAction()-|
				<input type="hidden" name="actions[]" value="|-$action->getAction()-|" />
			</th> 
			<td>|-$action->getLabel()-|</td>
			<td class="celldato">
				<ul>
				|-foreach from=$levels item=groupbit name=bitlevelgroup-|
					<li>
						<input type="checkbox" name="activeaction[|-$action->getAction()-|][]" value="|-$groupbit->getBitLevel()-|" |-checked_if_has_access first=$groupbit->getBitLevel() second=$action->getAccessAffiliateUser()-| />
						<input type=hidden name="bitaction[|-$action->getAction()-|][|-$smarty.foreach.contar.iteration-|]" value="|-$groupbit->getBitLevel()-|" />
						|-$groupbit->getName()-|
					</li>
				|-/foreach-|
					<li>
						<input type="checkbox" name="all[]" value="|-$action->getAction()-|"|-if $levelsave eq $action->getAccessAffiliateUser()-|checked|-/if-| />
						Todos
					</li>
				</ul>	
			</td>				
		 </tr>		
		 |-/foreach-|
		<tr>
			<td colspan="3">
				<input type="submit" value="Guardar" />
				<input type="hidden" name="module" value="|-$moduleView-|" />
				<input type="hidden" name="do" value="securityActionAffiliateUsersDoSave" />
			</td>
		</tr>	 
	</table> 
</form>
|-/if-|
