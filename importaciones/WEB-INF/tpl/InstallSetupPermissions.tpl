 <table border='0' cellpadding='0' cellspacing='0' width='100%'> 
	<tr> 
		 <td class='title'>Configuración del Sistema</td> 
	 </tr> 
	<tr> 
		 <td class='underlineTitle'><img src="images/clear.gif" height='3' width='1'></td> 
	 </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
	<tr> 
		 <td class='backgroundTitle'>Instalacion de Módulos del Sistema</td> 
	 </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
	<tr> 
		 <td class="tdSize2">Instalacion de modulo <strong>|-$moduleName-|</strong>.</td> 
	 </tr> 
	<tr> 
		 <td class="tdSize2">Segundo Paso - Configuracion de Permisos de los Actions.</td> 
	 </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
</table> 
<form method="post">
<input type="hidden" name="moduleName" value="|-$moduleName-|" />
<p>Permisos Generales del Modulo</p>
<table width="100%" cellpadding="5" cellspacing="0" class="tableTdBorders"> 
	<tr> 
		<th width="20%" scope="col" class="thFillTitle">Modulo</th> 		<th width="10%" scope="col" class="thFillTitle">Permisos Usuario</th> 
		<th width="10%" scope="col" class="thFillTitle">Permisos Usuario Afiliado</th>
	</tr> 
	<tr> 
		<td class="tdSize1">|-$moduleName-|</td> 		<td class="tdSize1" nowrap>
			<input type="hidden" name="permissionGeneral[access][]" value="0" />
			<input type="checkbox" name="permissionGeneral[access][]" value="1">supervisor<br>
			<input type="checkbox" name="permissionGeneral[access][]" value="2">admin<br>
			<input type="checkbox" name="permissionGeneral[access][]" value="4">user<br>
			<input type="checkbox" name="permissionGeneral[all]" value="true">todos<br></td>
		</td>
				<td class="tdSize1" nowrap>
			<input type="hidden" name="permissionAffiliateGeneral[[access][]" value="0" />
			<input type="checkbox" name="permissionAffiliateGeneral[access][]" value="1">supervisor<br>
			<input type="checkbox" name="permissionAffiliateGeneral[access][]" value="2">admin<br>
			<input type="checkbox" name="permissionAffiliateGeneral[access][]" value="4">user<br>
			<input type="checkbox" name="permissionAffiliateGeneral[all]" value="true">todos<br></td>
		</td> 

	</tr> 
</table>
<br />
<p>Permisos de Actions</p>
<table width="100%" cellpadding="5" cellspacing="0" class="tableTdBorders"> 
	<tr> 
		<th width="20%" scope="col" class="thFillTitle">Action</th> 		<th width="10%" scope="col" class="thFillTitle">Permisos Usuario</th> 
		<th width="10%" scope="col" class="thFillTitle">Permisos Usuario Afiliado</th>
	</tr> 
	
	|-foreach from=$actions item=action name=modulef-|
	<tr> 
		<td class="tdSize1">|-$action-|</td> 		<td class="tdSize1" nowrap>
			<input type="hidden" name="permission[|-$action-|][access][]" value="0" />
			<input type="checkbox" name="permission[|-$action-|][access][]" value="1">supervisor<br>
			<input type="checkbox" name="permission[|-$action-|][access][]" value="2">admin<br>
			<input type="checkbox" name="permission[|-$action-|][access][]" value="4">user<br>
			<input type="checkbox" name="permission[|-$action-|][all]" value="true">todos<br></td>
		</td>
				<td class="tdSize1" nowrap>
			<input type="hidden" name="permissionAffiliate[|-$action-|][access][]" value="0" />
			<input type="checkbox" name="permissionAffiliate[|-$action-|][access][]" value="1">supervisor<br>
			<input type="checkbox" name="permissionAffiliate[|-$action-|][access][]" value="2">admin<br>
			<input type="checkbox" name="permissionAffiliate[|-$action-|][access][]" value="4">user<br>
			<input type="checkbox" name="permissionAffiliate[|-$action-|][all]" value="true">todos<br></td>
		</td> 

	</tr> 
	|-/foreach-|

		|-foreach from=$withPair item=action name=modulef-|
	<tr> 
		<td class="tdSize1">|-$action-|</td> 		<td class="tdSize1" nowrap>
			<input type="hidden" name="permission[|-$action-|][pair]" value="|-$pairActions[$action]-|" />
			<input type="hidden" name="permission[|-$action-|][access][]" value="0" />
			<input type="checkbox" name="permission[|-$action-|][access][]" value="1">supervisor<br>
			<input type="checkbox" name="permission[|-$action-|][access][]" value="2">admin<br>
			<input type="checkbox" name="permission[|-$action-|][access][]" value="4">user<br>
			<input type="checkbox" name="permission[|-$action-|][all]" value="true">todos<br></td>
		</td>
				<td class="tdSize1" nowrap>
			<input type="hidden" name="permissionAffiliate[|-$action-|][access][]" value="0" />
			<input type="checkbox" name="permissionAffiliate[|-$action-|][access][]" value="1">supervisor<br>
			<input type="checkbox" name="permissionAffiliate[|-$action-|][access][]" value="2">admin<br>
			<input type="checkbox" name="permissionAffiliate[|-$action-|][access][]" value="4">user<br>
			<input type="checkbox" name="permissionAffiliate[|-$action-|][all]" value="true">todos<br></td>
		</td> 

	</tr> 
	|-/foreach-|
	
</table> 
	<input type="hidden" name="do" value="installDoSetupPermissions" />
	<p><input type="submit" value="Generar Permisos" /></p>
</form>

