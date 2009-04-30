<h2>Seguridad</h2>
<h1>Permisos de Acceso Global a Módulos</h1>
|-if $moduleSelected eq ""-|
<p>A continuación podrá seleccionar un módulo y consultar los permisos globales del módulo que seleccione.</p>
|-else-|
<p>Para modificar los permisos del módulo |-$moduleSelected-| marque o desmarque las casillas junto al tipo de usuario. Haga click en guardar para consevar los cambios.</p>
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
					<option value="|-$moduleName->getName()-|" |-if $moduleSelected->getModule() eq $moduleName->getName()-|selected="selected"|-/if-|>|-$moduleName->getName()-|</option>
				|-/foreach-|
				</select>
				<input type="hidden" name="do" value="securityModuleUsersList" />
		</p>
	</fieldset>
</form>

|-if $moduleSelected ne ""-|
<form name="security2" action="Main.php" method="post">
	<fieldset>
		<legend>Módulo |-$moduleSelected->getModule()|capitalize-|</legend>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableTdBorders"> 
		<tr> 
			<th class="thFillTitle">Módulo</th> 
			<th class="thFillTitle">Permisos</th>
		</tr> 
		<tr>
			<td>
				|-$moduleSelected->getModule()-|
			</td> 
			<td>			
				<ul>
				|-foreach from=$levels item=groupbit name=bitlevelgroup-|
					<li>
						<input type="checkbox" name="levels[]" value="|-$groupbit->getBitLevel()-|" |-checked_if_has_access first=$groupbit->getBitLevel() second=$moduleSelected->getAccess()-| />
						|-$groupbit->getName()-|
					</li>
				|-/foreach-|
					<li>
						<input type="checkbox" name="all" value="|-$moduleSelected->getModule()-|"|-if $levelsave eq $moduleSelected->getAccess()-| checked="checked"|-/if-| />
						Todos
					</li>
				</ul>
			</td>
		</tr>		
	</table>
	<p>
				<input type="submit" value="Guardar" />
				<input type="hidden" name="module" value="|-$moduleSelected->getModule()-|" />
				<input type="hidden" name="do" value="securityModuleUsersDoSave" />			    
	</p>
	</fieldset>		    
</form>
|-/if-|

