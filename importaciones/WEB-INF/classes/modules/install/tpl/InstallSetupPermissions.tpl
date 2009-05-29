<script type="text/javascript" src="Main.php?do=js&name=js&module=install&code=|-$currentLanguageCode-|"></script>

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
		<th width="10%" scope="col" class="thFillTitle">No verifica login</th>
		<th width="10%" scope="col" class="thFillTitle">Usuarios</th> 
		<th width="10%" scope="col" class="thFillTitle">Usuarios Por Afiliado</th>
		<th width="10%" scope="col" class="thFillTitle">Usuarios Por Registro</th>
	</tr> 
	<tr> 
		<td>|-$moduleName-|</td>
		<td>
			<input type="checkbox" name="noCheckLoginModule" value="1" |-if $moduleSelected && $moduleSelected->getNoCheckLogin()-|checked="checked"|-/if-|/><br>
		</td>
		<td nowrap>
				|-foreach from=$levels item=groupbit name=bitlevelgroup-|
					<input type="checkbox" name="permissionGeneral[access][]" value="|-$groupbit->getBitLevel()-|" |-checked_if_has_access first=$groupbit->getBitLevel() second=$moduleSelected->getAccess()-| />
					|-$groupbit->getName()-|<br />
				|-/foreach-|		
				<input type="checkbox" name="permissionGeneral[all]" value="true" |-if $levelsave eq $moduleSelected->getAccess()-| checked="checked"|-/if-| /> Todos<br />
		</td>
		<td nowrap>
			|-foreach from=$affiliateLevels item=groupbit name=bitlevelgroup-|
				<input type="checkbox" name="permissionAffiliateGeneral[access][]" value="|-$groupbit->getBitLevel()-|" |-checked_if_has_access first=$groupbit->getBitLevel() second=$moduleSelected->getAccessAffiliateUser()-| />
				|-$groupbit->getName()-|<br />
			|-/foreach-|					
			<input type="checkbox" name="permissionAffiliateGeneral[all]" value="true" |-if $levelsave eq $moduleSelected->getAccessAffiliateUser()-| checked="checked"|-/if-| /> Todos<br>
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
			|-foreach from=$levels item=groupbit name=bitlevelgroup-|
				<input type="checkbox" name="permission[|-$action-|][access][]" value="|-$groupbit->getBitLevel()-|" |-checked_if_has_access first=$groupbit->getBitLevel() second=$action-| |-if $groupbit->getBitLevel()  eq 1-| checked="checked" onClick="return readOnlyCheckBox()"|-/if-| />
				|-$groupbit->getName()-|<br />
			|-/foreach-|		
			<input type="checkbox" name="permission[|-$action-|][all]" value="true" |-if $withoutPairAccess.$action.permission.all-|checked="checked"|-/if-|> Todos<br>
		</td>
		<td nowrap>
			|-foreach from=$affiliateLevels item=groupbit name=bitlevelgroup-|
				<input type="checkbox" name="permissionAffiliate[|-$action-|][access][]" value="|-$groupbit->getBitLevel()-|" |-checked_if_has_access first=$groupbit->getBitLevel() second=$action-| />
				|-$groupbit->getName()-| <br />
			|-/foreach-|		
			<input type="checkbox" name="permissionAffiliate[|-$action-|][all]" value="true" |-if $withoutPairAccess.$action.permissionAffiliate.all-|checked="checked"|-/if-|> Todos<br>
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

			|-foreach from=$levels item=groupbit name=bitlevelgroup-|
				<input type="checkbox" name="permission[|-$action-|][access][]" value="|-$groupbit->getBitLevel()-|" |-checked_if_has_access first=$groupbit->getBitLevel() second=$action-| |-if $groupbit->getBitLevel()  eq 1-| checked="checked" onClick="return readOnlyCheckBox()"|-/if-| />
				|-$groupbit->getName()-|<br />
			|-/foreach-|		
			<input type="checkbox" name="permission[|-$action-|][all]" value="true" |-if $withoutPairAccess.$action.permission.all-|checked="checked"|-/if-|> Todos<br>


			<input type="hidden" name="permission[|-$action-|][pair]" value="|-$pairActions[$action]-|" />
			<input type="hidden" name="permission[|-$action-|][access][]" value="0" />
		</td>
		<td nowrap>

			|-foreach from=$affiliateLevels item=groupbit name=bitlevelgroup-|
				<input type="checkbox" name="permissionAffiliate[|-$action-|][access][]" value="|-$groupbit->getBitLevel()-|" |-checked_if_has_access first=$groupbit->getBitLevel() second=$action-| />
				|-$groupbit->getName()-| <br />
			|-/foreach-|		
			<input type="checkbox" name="permissionAffiliate[|-$action-|][all]" value="true" |-if $withoutPairAccess.$action.permissionAffiliate.all-|checked="checked"|-/if-|> Todos<br>

			<input type="hidden" name="permissionAffiliate[|-$action-|][access][]" value="0" />
		</td> 
		<td>
			<input type="checkbox" name="permissionRegistration[|-$action-|]" value="1" |-if $withPairAccess.$action.permissionRegistration-|checked="checked"|-/if-|/><br>
		</td>		
	</tr> 
	|-/foreach-|
	
</table> 
	<input type="hidden" name="do" value="installDoSetupPermissions" />
	|-foreach from=$languages item=language-|
	<input type="hidden" name="languages[]" value="|-$language->getCode()-|" />
	|-/foreach-|	
	|-if isset($mode)-|
		<input type="hidden" name="mode" value="|-$mode-|" id="mode">
	|-/if-|
	<p>
		<input type="submit" value="Generar Permisos" />
		|-include file="InstallFormNavigationInclude.tpl"-|
	</p>
</form>
</fieldset>
