<h2>Seguridad</h2>
<h1>Administración de permisos para usuarios por registro</h1>
|-if $message eq "saved"-|
	<div class="successMessage">Los cambios han sido guardados</div>
|-/if-|	
<p>Mediante esta aplicación puede modificar los permisos de los usuarios para acceder y ejecutar diferenctes acciones del sistema. Seleccione un módulo y marque o desmarque el nivel de usuario que desea modificar. 
<br />Si desea dar acceso a cualquer usuario, marque la opción "Todos".<fieldset title="Seleccion el módulo para definir sus permisos"></p>
	 <legend>Seleccione módulo</legend>
<form name="securityFilter" id="securityFilter" action="Main.php" method="get">
		 <p>Seleccione el módulo que desea modificar</p>
	<p>
		 <label for="module">Módulo</label>
				<select name="moduleSelected" onchange="if (this.options[this.selectedIndex].value) document.forms.securityFilter.submit()">
				<option value=''>Seleccione un módulo</option>
				|-foreach from=$modules item=eachModule-|
					<option value="|-$eachModule->getName()-|"|-if $eachModule->getName() eq $moduleSelected-| selected="selected" |-/if-|> |-$eachModule->getName()|multilang_get_translation:"common"-|</option>
				|-/foreach-|
				</select>
				<input type="hidden" name="do" value="SecurityRegistrationEdit" />
  </p>
</form>
</fieldset>
|-if $moduleSelected ne ""-|
<h3>Seguridad global del módulo |-$moduleSelected|multilang_get_translation:"common"-| para usuarios registrados</h3>
<p>Las acciones que no posean permisos específicos, heredan los permisos del módulo.</p>
<form name="security" action="Main.php" method="post">
	<table width="100%" border="0" cellpadding="4" cellspacing="0" class="tableTdBorders">
		<tr> 
			<th scope="col" width="80%">Módulo</th> 
			<th scope="col" width="80%">Permisos</th>
		</tr> 
		<tr>
			<td>
				<h3>|-$moduleObj->getLabel()-|</h3><h2>(|-$moduleSelected-|)</h2>
				<input type="hidden" name="module[]" value="1" />
			</td>
			<td>
				<ul>
				|-foreach from=$levels item=groupbit name=bitlevelgroup-|
					<li>
						<input type="checkbox" name="activeaction[1][]" value="|-$groupbit->getBitLevel()-|" |-checked_if_has_access first=$groupbit->getBitLevel() second=1-| />
						<input type=hidden name="bitaction[1][|-$smarty.foreach.contar.iteration-|]" value="|-$groupbit->getBitLevel()-|" />
						|-$groupbit->getName()-|
					</li>
				|-/foreach-|
					<li>
						<input type="checkbox" name="all[]" value="1"|-if $levelsave eq 1-|checked|-/if-| />
						Todos
					</li>
				</ul>	
			</td>				
	  </tr>		
	</table> 

<h3>Seguridad de las acciones del módulo |-$moduleSelected|multilang_get_translation:"common"-|</h3>
<p>Para permitir el acceso a una acción determinada, marque la casilla junto al nivel de usuario correspondiente.</p>
	<table width="100%" border="0" cellpadding="4" cellspacing="0" class="tableTdBorders">
		<tr> 
			<th scope="col" width="80%">Acciones</th> 
			<th scope="col" width="80%">Permisos</th>
		</tr> 
		|-foreach from=$actions item=action name=for_actions-|
		<tr>
			<td>
				<h3>|-$action->getLabel()-|</h3><h2>(|-$action->getAction()-|)</h2>
				<input type="hidden" name="actions[]" value="|-$action->getAction()-|" />
			</td>
			<td>
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
			<td colspan="2">
				<input type="submit" value="Guardar" />
				<input type="hidden" name="moduleSelected" value="|-$moduleSelected-|" />
				<input type="hidden" name="do" value="SecurityRegistrationDoEdit" />
			</td>
		</tr>	 
	</table> 
</form>
|-/if-|
