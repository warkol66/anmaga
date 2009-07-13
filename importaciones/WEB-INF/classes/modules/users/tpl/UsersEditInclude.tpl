<!-- inclusion de validación de javascript -->
|-include file='ValidationJavascriptInclude.tpl'-|

<fieldset title="Formulario de edición de usuarios">
<legend>Datos del Usuario</legend>
<form method='post' action='Main.php?do=usersDoEdit'>
	<input type='hidden' name='id' value='|-if $action eq "edit"-||-$currentUser->getId()-||-/if-|' />
	<p><label for="username">##162,Identificación de Usuario##</label>
			<input id='username' name='username' type='text' value='|-if $action eq "edit"-||-$currentUser->getUsername()-||-/if-|' size="30" |-ajax_onchange_validation_attribute actionName=usersValidationUsernameX-| />|-validation_msg_box idField=username-|
	</p>
		<p><label for="name">##163,Nombre##</label>
			<input id='name' name='name' type='text' value='|-if $action eq "edit"-||-$currentUserInfo->getName()|escape-||-/if-|' size="50" />|-validation_msg_box idField=name-|
		</p>
		<p><label for="surname">##164,Apellido##</label>
			<input id='surname' name='surname' type='text' value='|-if $action eq "edit"-||-$currentUserInfo->getSurname()|escape-||-/if-|' size="50" />|-validation_msg_box idField=surname-|
		</p>
		<p><label for="mailAddress">E-mail</label>
			<input id='mailAddress' name='mailAddress' type='text' value='|-if $action eq "edit"-||-$currentUserInfo->getMailAddress()-||-/if-|' size="40" class="mailValidation" onchange="javascript:validationValidateFieldClienSide('mailAddress');" /> |-validation_msg_box idField=mailAddress-|
		</p>
		<p><label for="pass">##165,Contraseña##</label>
			<input id='pass' name='pass' type='password' value='' size="20" class="emptyValidation" onchange="javascript:validationValidateFieldClienSide('pass');" /> |-validation_msg_box idField=pass-|
		</p>
		<p><label for="pass2">##166,Repetir Contraseña##</label>
			<input id='pass2' name='pass2' type='password' value='' size="20" class="emptyValidation" onchange="javascript:validationValidateFieldClienSide('pass2');" /> |-validation_msg_box idField=pass2-|
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
						|-javascript_form_validation_button value=Guardar-|
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
