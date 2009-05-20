<h2>Seguridad</h2>
<h1>Administración de permisos por usuario</h1>
|-if $message eq "saved"-|
	<div class="resultSuccess">Los cambios han sido guardados</div>
|-/if-|	
<p>Mediante esta aplicación puede modificar lso permisos de lso usuarios a acceder y ejecutar diferenctes acciones del sistema. Seleccione un módulo y marque o desmarque el nivel de usuario que desea modificar.
<br />Si desea dar acceso a cualquer usuario, marque la opción "Todos".</p>
	<fieldset title="Seleccion el módulo para definir sus permisos">
	 <legend>Seleccione módulo</legend>
		<form name="securityFilter" id="securityFilter" action="Main.php" method="get">
		 <p>Seleccione el módulo que desea modificar</p>
			 <p><label for="module">Módulo</label>
				<select name="module" onchange="if (this.options[this.selectedIndex].value) document.forms.securityFilter.submit()">
				<option value='todos'>Seleccione un módulo</option>
				|-foreach from=$modulesName item=moduleName-|
					<option value="|-$moduleName->getName()-|"> |-$moduleName->getName()-|</option>
				|-/foreach-|
				</select>
				<input type="hidden" name="do" value="securityUsersEdit" />
			 </p>
		</form>
	</fieldset>
|-if $moduleView ne ""-|
<h3>Seguridad global del módulo |-$moduleView-|</h3>
<p>Las acciones que no posean permisos específicos, heredan los permisos del módulo.</p>
<form name="security" action="Main.php" method="post">
	<table width="100%" border="0" cellpadding="4" cellspacing="0" class="tableTdBorders"> 
		<tr> 
			<th scope="col" width="80%">Módulo</th> 
			<th scope="col" width="80%">Permisos</th>
		</tr> 
		<tr>
			<td>
				<h3>|-$moduleView-|</h3>|-$moduleName->getLabel()-|
				<input type=hidden name="module[]" value="|-$moduleView-|" />
			</td> 
			<td>
				<ul>
				|-foreach from=$levels item=groupbit name=bitlevelgroup-|
					<li>
						<input type="checkbox" name="activeaction[1][]" value="|-$groupbit->getBitLevel()-|" |-checked_if_has_access first=$groupbit->getBitLevel() second=1-| />
						<input type="hidden" name="bitaction[1][|-$smarty.foreach.contar.iteration-|]" value="|-$groupbit->getBitLevel()-|" />
						|-$groupbit->getName()-|
					</li>
				|-/foreach-|
					<li>
						<input type="checkbox" name="all[]" value="1"|-if $levelsave eq 1-| checked="checked"|-/if-| /> Todos
					</li>
					<li>
						<input type="checkbox" name="noCheckLogin[]" value="1"|-if $levelsave eq 1-| checked="checked"|-/if-| /> No requiere login
						<input type="hidden" name="bitaction[1][|-$smarty.foreach.contar.iteration-|]" value="|-$groupbit->getBitLevel()-|" />
					</li>
				</ul>	
			</td>		
		</tr>		
	</table>
<h3>Seguridad de las acciones del módulo |-$moduleView-|</h3>
<p>Para permitir el acceso a una acción determinada, marque la casilla junto al nivel de usuario correspondiente.</p>
 <table width="100%" border="0" cellpadding="4" cellspacing="0" class="tableTdBorders"> 
		<tr> 
			<th scope="col" width="80%">Acciones</th> 
			<th scope="col" width="80%">Permisos</th>
		</tr> 
		|-foreach from=$actions item=action name=for_actions-|
		<tr>
			<td>
				<h3>|-$action->getAction()-|</h3>|-$action->getLabel()-|
				<input type=hidden name="actions[]" value="|-$action->getAction()-|" />
			</td> 
			<td>
				<ul>
				|-foreach from=$levels item=groupbit name=bitlevelgroup-|
					<li>
						<input type="checkbox" name="activeaction[|-$action->getAction()-|][]" value="|-$groupbit->getBitLevel()-|" |-checked_if_has_access first=$groupbit->getBitLevel() second=$action->getAccess()-| />
						<input type="hidden" name="bitaction[|-$action->getAction()-|][|-$smarty.foreach.contar.iteration-|]" value="|-$groupbit->getBitLevel()-|" />
						|-$groupbit->getName()-|
					</li>
				|-/foreach-|
					<li>
						<input type="checkbox" name="all[]" value="|-$action->getAction()-|"|-if $levelsave eq $action->getAccess()-| checked="checked"|-/if-| /> Todos
					</li>
					<li>
						<input type="checkbox" name="noCheckLogin[]" value="|-$action->getAction()-|"|-if $levelsave eq $action->getAccess()-| checked="checked"|-/if-| /> No requiere login
						<input type="hidden" name="bitaction[|-$action->getAction()-|][|-$smarty.foreach.contar.iteration-|]" value="|-$groupbit->getBitLevel()-|" />
					</li>
				</ul>	
			</td>		
		</tr>		
		|-/foreach-|
		<tr>
			<td colspan="2">
				<input type="submit" value="Guardar" />
				<input type="hidden" name="module" value="|-$moduleView-|" />
				<input type="hidden" name="do" value="securityUsersDoEdit" />			    
			</td>
		</tr>
	</table>
</form>
|-/if-|