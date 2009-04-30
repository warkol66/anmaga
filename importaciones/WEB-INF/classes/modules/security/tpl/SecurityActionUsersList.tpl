<h2>Seguridad</h2>
<h1>Permisos de tipos de usuario</h1>
|-if $moduleView eq ""-|
<p>A continuación podrá seleccionar un módulo y consultar los permisos de para cada tipo de usuario para las acciones del módulo que seleccione.</p>
|-else-|
<p>Para modificar los permisos del módulo |-$moduleView-| marque o desmarque las casillas junto al tipo de usuario. Haga click en guardar para consevar los cambios.</p>
|-/if-|
|-if $message eq "saved"-|
	<div class="resultSuccess">Cambios guardados</div>
|-/if-|	
<form name="securityFilter" id="securityFilter" action="Main.php" method="get">
	<fieldset>
		<legend>Permisos</legend>
		<p>
			<label for="module">Módulo:</label>
			<select name="module" onchange="if (this.options[this.selectedIndex].value) document.forms.securityFilter.submit()">
			<option value='todos'>Seleccione</option>
				|-foreach from=$modulesName item=moduleName-|
					<option value="|-$moduleName->getName()-|" |-if $moduleView eq $moduleName->getName()-|selected="selected"|-/if-|>|-$moduleName->getName()-|</option>
				|-/foreach-|
			</select>
			<input type="hidden" name="do" value="securityActionUsersList" />
		</p>
	</fieldset>
</form>

|-if $moduleView ne ""-|
<form name="security2" action="Main.php" method="post">
	<fieldset>
		<legend>Acciones del Módulo |-$moduleView|capitalize-|</legend>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableTdBorders"> 
		<tr> 
			<th class="thFillTitle">Acciones</th> 
			<th class="thFillTitle">Descripción</th> 
			<th class="thFillTitle">Permisos</th>
		</tr> 
		|-foreach from=$actions item=action name=for_actions-|
		<tr>
			<td>
				|-$action->getAction()-|
				<input type=hidden name="actions[]" value="|-$action->getAction()-|" />
			</td> 
			<td>|-$action->getLabel()-|</td>
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
						<input type="checkbox" name="all[]" value="|-$action->getAction()-|"|-if $levelsave eq $action->getAccess()-| checked="checked"|-/if-| />
						Todos
					</li>
				</ul>	
			</td>		
		</tr>		
		|-/foreach-|
	</table>
	<p><input type="submit" value="Guardar" />
	<input type="hidden" name="module" value="|-$moduleView-|" />
	<input type="hidden" name="do" value="securityActionUsersDoSave" />
	</p>
	</fieldset>		    
</form>
|-/if-|