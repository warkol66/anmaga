<h2>Seguridad</h2>
<h1>Administración de permisos para Usuarios de Afiliados</h1>
|-if $message eq "saved"-|
	<div class="resultSuccess">Los cambios han sido guardados</div>
|-/if-|	
<p>Mediante esta aplicación puede modificar lso permisos de lso usuarios a acceder y ejecutar diferenctes acciones del sistema. Seleccione un módulo y marque o desmarque el nivel de usuario que desea modificar.
<br />Si desea dar acceso a cualquer usuario, marque la opción "Todos".</p>
	<fieldset title="Seleccion el módulo para definir sus permisos">
	 <legend>Seleccione módulo</legend>
<form name="securityFilter" id="securityFilter" action="Main.php" method="get">
		 <p>Seleccione el módulo que desea modificar</p>
	<p>
		 <label for="module">Módulo</label>
				<select name="module" onchange="if (this.options[this.selectedIndex].value) document.forms.securityFilter.submit()">
				<option value='todos'>Seleccione un módulo</option>
				|-foreach from=$modulesName item=moduleName-|
					<option value="|-$moduleName->getName()-|"> |-$moduleName->getName()-|</option>
				|-/foreach-|
				</select>
				<input type="hidden" name="do" value="securityModuleAffiliateUsersList" />
			 </p>
	</form>
</fieldset>
|-if $moduleSelected ne ""-|
<h3>Seguridad global del módulo |-$moduleSelected->getModule()-|</h3>
<p>Las acciones que no posean permisos específicos, heredan los permisos del módulo</p>
<form name="security" action="Main.php" method="post">
	<table width="100%" border="0" cellpadding="0" cellspacing="1" class="tablaborde"> 
		<tr> 
			<th scope="col">Módulo</th> 
			<th scope="col">Permisos</th>
		</tr> 
		<tr>
			<th scope="row">
				|-$moduleSelected->getModule()-|
			</th> 
			<td>			
				<ul>
				|-foreach from=$levels item=groupbit name=bitlevelgroup-|
					<li>
						<input type="checkbox" name="levels[]" value="|-$groupbit->getBitLevel()-|" |-checked_if_has_access first=$groupbit->getBitLevel() second=$moduleSelected->getAccessAffiliateUser()-| />
						|-$groupbit->getName()-|
					</li>
				|-/foreach-|
					<li>
						<input type="checkbox" name="all" value="|-$moduleSelected->getModule()-|"|-if $levelsave eq $moduleSelected->getAccessAffiliateUser()-| checked="checked"|-/if-| />
						Todos
					</li>
				</ul>
			</td>
		</tr>		
		<tr>
			<td>
				<input type="submit" value="Guardar" />
				<input type="hidden" name="module" value="|-$moduleSelected->getModule()-|" />
				<input type="hidden" name="do" value="securityModuleAffiliateUsersDoSave" />			    
			</td>
		</tr>
	</table>
</form>
|-/if-|

