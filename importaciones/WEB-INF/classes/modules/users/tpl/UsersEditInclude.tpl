<fieldset title="Formulario de edición de usuarios">
<legend>Datos del Usuario</legend>
<form method='post' action='Main.php?do=usersDoEdit'>
	<input type='hidden' name='id' value='|-if $action eq "edit"-||-$currentUser->getId()-||-/if-|' />
	<p><label for="username">##162,Identificación de Usuario##</label>
			<input name='username' type='text' value='|-if $action eq "edit"-||-$currentUser->getUsername()-||-/if-|' size="40" />
	</p>
		<p><label for="username">##163,Nombre##</label>
			<input name='name' type='text' value='|-if $action eq "edit"-||-$currentUserInfo->getName()-||-/if-|' size="50" />
		</p>
		<p><label for="username">##164,Apellido##</label>
			<input name='surname' type='text' value='|-if $action eq "edit"-||-$currentUserInfo->getSurname()-||-/if-|' size="50" />
		</p>
		<p><label for="username">E-mail</label>
			<input name='mailAddress' type='text' value='|-if $action eq "edit"-||-$currentUserInfo->getMailAddress()-||-/if-|' size="40" />
		</p>
		<p><label for="username">##165,Contraseña##</label>
			<input name='pass' type='password' value='' size="20" />
		</p>
		<p><label for="username">##166,Repetir Contraseña##</label>
			<input name='pass2' type='password' value='' size="20" />
		</p>
		<p><label for="username">Nivel de Usuario</label>
				|-if $action eq 'edit' and $currentUser->getId() lt 3-|
				<input name="levelId" type="hidden" value="|-$currentUser->getLevelId()-|" />
				<select name='levelIdDisabled' disabled="disabled">
				|-else-|
				<select name='levelId'>
				|-/if-|
					<option value="">Seleccionar nivel</option>
					|-foreach from=$levels item=level name=for_levels-|
					<option value="|-$level->getId()-|"|-if $action eq "edit" and $level->getId() eq $currentUser->getLevelId()-| selected="selected"|-/if-|>|-$level->getName()-|</option>
					|-/foreach-|
				</select>
			</p>
		<p><label for="username">Huso Horario</label>
				<select name='timezone'>
					<option value="">Seleccione una zona horaria (opcional)</option>
					|-foreach from=$timezones item=timezone name=for_timezones-|
					<option value="|-$timezone->getCode()-|" |-if isset($currentUser) and $currentUser->getTimezone() eq $timezone->getCode()-|selected="selected"|-/if-|>|-$timezone->getDescription()-|</option>
					|-/foreach-|
				</select>
			</p>
		<p> |-if $action eq "edit"-|
				<input type="hidden" name="accion" value="edit" />
				|-/if-|
				<input type='submit' name='guardar' value='##97,Guardar##'/>
				&nbsp;&nbsp;
				<input type='button' onClick='javascript:history.go(-1)' value='##104,Regresar##'/>
			</p>

</form>
</fieldset>

|-if $action eq "edit"-|
<fieldset title="Formulario de edición de grupos de usuarios">
<legend>Grupos de Usuarios</legend>
	<p>##167,El usuario ## |-$currentUser->getUsername()-| ##168,es miembro de los grupos:##</p>
		|-if $currentUserGroups|@count eq 0-|
		<p>##169,El usuario todavía no es miembro de ningún grupo##.</p>
			|-else-|
		<ul>
			|-foreach from=$currentUserGroups item=userGroup name=for_user_group-|
				|-assign var="group" value=$userGroup->getGroup()-|
					<li><span class="textOptionMove" style="float:left;width:40%;">|-$group->getName()-|</span>			
					|-if $currentUser->isSupplier() -|
						[ <span class='deactivated'>##115,Eliminar##</span> ] 
					|-else-|
						[ <a href='Main.php?do=usersDoRemoveFromGroup&user=|-$currentUser->getId()-|&group=|-$group->getId()-|' class='delete'>##115,Eliminar##</a> ] </li>
					|-/if-|
			|-/foreach-|
			</ul>
		|-/if-|
		|-if not ($currentUser->isSupplier()) -|
				<label for="group">##171,Agregar a Grupo##</label>
					<form action='Main.php' method='post'>
						<input type="hidden" name="do" value="usersDoAddToGroup" />
						<select name="group">
							<option value="" selected="selected">##172,Seleccionar grupo##</option>
								|-foreach from=$groups item=group name=for_groups-|
							<option value="|-$group->getId()-|">|-$group->getName()-|</option>
								|-/foreach-|
						</select>
						<input type="hidden" name="user" value="|-$currentUser->getId()-|" />
						<input type='submit' value='##123,Agregar##'/>
					</form>
			
		|-/if-|
	</fieldset>	
|-/if-|


|-include file="UsersEditAddonInclude.tpl"-|
