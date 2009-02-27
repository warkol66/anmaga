<script type="text/javascript" src="scripts/install.js"></script>

<h2>Configuración del Sistema</h2>
<h1>Instalación de Módulos del Sistema: Módulo <strong>|-$moduleName-|</strong>.</h1>
<fieldset>
	<legend>Segundo Paso - Configuración de Permisos</legend>
	<p>Asigne los permisos correspondientes</p> 
	<form method="post">
	<input type="hidden" name="moduleName" value="|-$moduleName-|" />
		<h4>Permisos Generales del Módulo</h4>
		<p>Asignar permisos generales al módulo</p>
<table width="100%" cellpadding="5" cellspacing="0" class="tableTdBorders"> 
	<tr> 
		<th width="20%" scope="col" class="thFillTitle">Módulo</th>
		<th width="10%" scope="col" class="thFillTitle">Usuarios</th> 
		<th width="10%" scope="col" class="thFillTitle">Usuarios Por Afiliado</th>
		<th width="10%" scope="col" class="thFillTitle">Usuarios Por Registro</th>
	</tr> 
	<tr> 
		<td>|-$moduleName-|</td>
		<td nowrap>
			<input type="hidden" name="permissionGeneral[access][]" value="0" />
			<input type="checkbox" name="permissionGeneral[access][]" value="1" checked="checked" />supervisor<br>
			<input type="checkbox" name="permissionGeneral[access][]" value="2" |-if $generalAccess.permissionGeneral.2-|checked="checked"|-/if-|>admin<br>
			<input type="checkbox" name="permissionGeneral[access][]" value="4" |-if $generalAccess.permissionGeneral.4-|checked="checked"|-/if-|>user<br>
			<input type="checkbox" name="permissionGeneral[access][]" value="8" |-if $generalAccess.permissionGeneral.4-|checked="checked"|-/if-|>Presidente<br>
			<input type="checkbox" name="permissionGeneral[access][]" value="16" |-if $generalAccess.permissionGeneral.4-|checked="checked"|-/if-|>user.cn<br>
			<input type="checkbox" name="permissionGeneral[all]" value="true" |-if $generalAccess.permissionGeneral.all-|checked="checked"|-/if-|>todos<br>
		</td>
				<td nowrap>
			<input type="hidden" name="permissionAffiliateGeneral[[access][]" value="0" />
			<input type="checkbox" name="permissionAffiliateGeneral[access][]" value="1" |-if $generalAccess.permissionAffiliateGeneral.1-|checked="checked"|-/if-|>owner<br>
			<input type="checkbox" name="permissionAffiliateGeneral[access][]" value="2" |-if $generalAccess.permissionAffiliateGeneral.2-|checked="checked"|-/if-|>manager<br>
			<input type="checkbox" name="permissionAffiliateGeneral[access][]" value="4" |-if $generalAccess.permissionAffiliateGeneral.4-|checked="checked"|-/if-|>user<br>
			<input type="checkbox" name="permissionAffiliateGeneral[all]" value="true" |-if $generalAccess.permissionAffiliateGeneral.all-|checked="checked"|-/if-|>todos<br>
		</td> 
		<td>
			<input type="checkbox" name="permissionRegistrationGeneral" value="1" |-if $generalAccess.permissionRegistrationGeneral-|checked="checked"|-/if-|/>
		</td>
	</tr> 
</table>


<br />
<h4>Permisos de Actions</h4>
<p>Dejar vacios aquellos actions que hereden permisos del módulo.</p>

<table width="100%" cellpadding="5" cellspacing="0" class="tableTdBorders"> 
	<tr> 
		<th width="20%" scope="col" class="thFillTitle">Action</th>
		<th width="10%" scope="col" class="thFillTitle">No verifica login</th>
		<th width="10%" scope="col" class="thFillTitle">Usuarios</th> 
		<th width="10%" scope="col" class="thFillTitle">Usuarios por Afiliado</th>
		<th width="10%" scope="col" class="thFillTitle">Usuarios por Registro</th>
	</tr> 
	
	|-foreach from=$withoutPair item=action name=modulef-|
	<tr> 
		<td>|-$action-|</td>
		<td>
			<input type="checkbox" name="noCheckLogin[|-$action-|]" value="1" |-if $withoutPairAccess.$action.noCheckLogin-|checked="checked"|-/if-|/><br>
		</td>
		<td nowrap>
			<input type="hidden" name="permission[|-$action-|][access][]" value="0" />
			<input type="checkbox" name="permission[|-$action-|][access][]" value="1" checked="checked" />supervisor<br>
			<input type="checkbox" name="permission[|-$action-|][access][]" value="2" |-if $withoutPairAccess.$action.permission.2-|checked="checked"|-/if-|>admin<br>
			<input type="checkbox" name="permission[|-$action-|][access][]" value="4" |-if $withoutPairAccess.$action.permission.4-|checked="checked"|-/if-|>user<br>
			<input type="checkbox" name="permission[|-$action-|][access][]" value="8" |-if $withoutPairAccess.$action.permission.4-|checked="checked"|-/if-|>Presidente<br>
			<input type="checkbox" name="permission[|-$action-|][access][]" value="16" |-if $withoutPairAccess.$action.permission.4-|checked="checked"|-/if-|>user.cn<br>
			<input type="checkbox" name="permission[|-$action-|][all]" value="true" |-if $withoutPairAccess.$action.permission.all-|checked="checked"|-/if-|>todos<br>
		</td>
				<td nowrap>
			<input type="hidden" name="permissionAffiliate[|-$action-|][access][]" value="0" />
			<input type="checkbox" name="permissionAffiliate[|-$action-|][access][]" value="1" |-if $withoutPairAccess.$action.permissionAffiliate.1-|checked="checked"|-/if-|>owner<br>
			<input type="checkbox" name="permissionAffiliate[|-$action-|][access][]" value="2" |-if $withoutPairAccess.$action.permissionAffiliate.2-|checked="checked"|-/if-|>manager<br>
			<input type="checkbox" name="permissionAffiliate[|-$action-|][access][]" value="4" |-if $withoutPairAccess.$action.permissionAffiliate.4-|checked="checked"|-/if-|>user<br>
			<input type="checkbox" name="permissionAffiliate[|-$action-|][all]" value="true" |-if $withoutPairAccess.$action.permissionAffiliate.all-|checked="checked"|-/if-|>todos<br>
		</td> 
		<td>
			<input type="checkbox" name="permissionRegistration[|-$action-|]" value="1" |-if $withoutPairAccess.$action.permissionRegistration-|checked="checked"|-/if-|/><br>
		</td>

	</tr> 
	|-/foreach-|

	|-foreach from=$withPair item=action name=modulef-|
	<tr> 
		<td>|-$action-|</td> 
		<td>
			<input type="checkbox" name="noCheckLogin[|-$action-|]" value="1" |-if $withPairAccess.$action.noCheckLogin-|checked="checked"|-/if-|/><br>
		</td>
		<td nowrap>
			<input type="hidden" name="permission[|-$action-|][pair]" value="|-$pairActions[$action]-|" />
			<input type="hidden" name="permission[|-$action-|][access][]" value="0" />
			<input type="checkbox" name="permission[|-$action-|][access][]" value="1" checked="checked" />supervisor<br>
			<input type="checkbox" name="permission[|-$action-|][access][]" value="2" |-if $withPairAccess.$action.permission.2-|checked="checked"|-/if-|>admin<br>
			<input type="checkbox" name="permission[|-$action-|][access][]" value="4" |-if $withPairAccess.$action.permission.4-|checked="checked"|-/if-|>user<br>
			<input type="checkbox" name="permission[|-$action-|][access][]" value="8" |-if $withPairAccess.$action.permission.4-|checked="checked"|-/if-|>Presidente<br>
			<input type="checkbox" name="permission[|-$action-|][access][]" value="16" |-if $withPairAccess.$action.permission.4-|checked="checked"|-/if-|>user.cn<br>
			<input type="checkbox" name="permission[|-$action-|][all]" value="true" |-if $withPairAccess.$action.permission.all-|checked="checked"|-/if-|>todos<br>
		</td>
		<td nowrap>
			<input type="hidden" name="permissionAffiliate[|-$action-|][access][]" value="0" />
			<input type="checkbox" name="permissionAffiliate[|-$action-|][access][]" value="1" |-if $withPairAccess.$action.permissionAffiliate.1-|checked="checked"|-/if-|>owner<br>
			<input type="checkbox" name="permissionAffiliate[|-$action-|][access][]" value="2" |-if $withPairAccess.$action.permissionAffiliate.2-|checked="checked"|-/if-|>manager<br>
			<input type="checkbox" name="permissionAffiliate[|-$action-|][access][]" value="4" |-if $withPairAccess.$action.permissionAffiliate.4-|checked="checked"|-/if-|>user<br>
			<input type="checkbox" name="permissionAffiliate[|-$action-|][all]" value="true" |-if $withPairAccess.$action.permissionAffiliate.all-|checked="checked"|-/if-|>todos<br>
		</td> 
		<td>
			<input type="checkbox" name="permissionRegistration[|-$action-|]" value="1" |-if $withPairAccess.$action.permissionRegistration-|checked="checked"|-/if-|/><br>
		</td>		
	</tr> 
	|-/foreach-|
	
</table> 
	<input type="hidden" name="do" value="installDoSetupPermissions" />
	|-if isset($mode)-|
		<input type="hidden" name="mode" value="|-$mode-|" id="mode">
	|-/if-|
	<p>
		<input type="submit" value="Generar Permisos" />
		|-include file="InstallFormNavigationInclude.tpl"-|
	</p>
</form>
</fieldset>
