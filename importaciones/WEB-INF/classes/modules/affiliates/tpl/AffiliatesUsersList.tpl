<h2>##40,Configuración del Sistema##</h2>
<h1>Administración de Usuarios de Clientes </h1>
<!-- Link VOLVER -->
<!-- /Link VOLVER -->
|-if $accion eq "edicion"-|
	<p class='paragraphEdit'>##180,Realice los cambios en el usuario y haga click en "Guardar Cambios" para guardar las modificaciones. ##</p>
|-else-|
	<p class='paragraphEdit'>A continuación podrá editar la lista de Usuarios de Clientes guardados en el Sistema.</p>
|-/if-|
|-if $message eq "deleted"-|
<div class='successMessage'>##153,Usuario eliminado##</div>
|-elseif $message eq "activated"-|
<div class='successMessage'>##154,Usuario reactivado##</div>
|-elseif $message eq "wrongPassword"-|
<div class='errorMessage'>##155,Las contraseñas deben coincidir##</div>
|-elseif $message eq "emptyAffiliate"-|
<div class='errorMessage'>##155,Debe selecccionar un afiliado##</div>
|-elseif $message eq "emptyUsername"-|
<div class='errorMessage'>##155,Debe completar el nombre de usuario##</div>
|-elseif $message eq "errorUpdate"-|
<div class='errorMessage'>##156,Ha ocurrido un error al intentar guardar la información del usuario##</div>
|-elseif $message eq "saved"-|
<div class='successMessage'>##157,Usuario guardado##</div>
|-elseif $message eq "notAddedToGroup"-|
<div class='errorMessage'>##158,Ha ocurrido un error al intentar agregar el usuario al grupo##</div>
|-elseif $message eq "notRemovedFromGroup"-|
<div class='errorMessage'>##159,Ha ocurrido un error al intentar eliminar el usuario al grupo##</div>
|-/if-|
|-if $accion eq "creacion" or $accion eq "edicion"-|
	|-if $accion eq "creacion"-|
			##160,Ingrese  la Identificación del usuario y la contraseña para el nuevo usuario,  luego haga click en Guardar para generar el nuevo usuario.##
	|-else-|
			##161,Realice los cambios en el usuario y haga click en Aceptar para guardar las modificaciones.##|-/if-| <br />
	<br />
<form method='post' action='Main.php?do=affiliatesUsersDoEditUser'>
	<input type='hidden' name='id' value='|-$currentAffiliateUser->getId()-|' />
<fieldset title="Formulario de edición de Usuarios de Clientes">
<legend>Datos del Usuario</legend>
	<p>Ingrese los datos del usuario; para guardar, haga click en "Guardar Cambios"</p>
	<p><label for="affiliateUser[username]">##162,Identificación de Usuario##</label>
		<input name='affiliateUser[username]' type='text'  class='textodato' value='|-$currentAffiliateUser->getUsername()-|' size="40" />
	</p>
	<p><label for="affiliateUser[name]">##163,Nombre##</label>
			<input name='affiliateUserInfo[name]' type='text'  class='textodato' value='|-$currentAffiliateUserInfo->getName()-|' size="60" />
	</p>
	<p><label for="affiliateUser[surname]">##164,Apellido##</label>
			<input name='affiliateUserInfo[surname]' type='text'  class='textodato' value='|-$currentAffiliateUserInfo->getSurname()-|' size="60" />
	</p>
	<p><label for="affiliateUser[mailAddress]">E-mail</label>
			<input name='affiliateUserInfo[mailAddress]' type='text'  class='textodato' value='|-$currentAffiliateUserInfo->getMailAddress()-|' size="60" />
	</p>
	<p><label for="affiliateUser[password]">##165,Contraseña##</label>
			<input name='affiliateUser[password]' type='password' class='textodato' value='' size="20" />
	</p>
	<p><label for="affiliateUser[pass2]">##166,Repetir Contraseña##</label>
			<input name='affiliateUser[pass2]' type='password' class='textodato' value='' size="20" />
	</p>
	<p><label for="affiliateUser[levelId]">Nivel de Usuario</label>
        <select name='affiliateUser[levelId]'>
        	<option value="">Seleccionar nivel</option>
					|-foreach from=$levels item=level name=for_levels-|
        	<option value="|-$level->getId()-|"|-if $level->getId() eq $currentAffiliateUser->getLevelId()-| selected="selected"|-/if-|>|-$level->getName()-|</option>
					|-/foreach-|
       	</select>

	</p>
	<p><label for="affiliateUser[timezone]">Huso Horario (GMT) del Usuario</label>
				<select name='affiliateUser[timezone]'>
					<option value="">seleccione una zona horaria (opcional)</option>
					|-foreach from=$timezones item=timezone name=for_timezones-|
					<option value="|-$timezone->getCode()-|" |-if $currentAffiliateUser->getTimezone() eq $timezone->getCode()-|selected="selected"|-/if-|>|-$timezone->getDescription()-|</option>
					|-/foreach-|
				</select>
		</p>
	|-if $affiliates|@count > 0-|
	<p><label for="affiliateId">Cliente</label>
				<select name='affiliateId'>
					<option value="">Seleccionar Cliente</option>
					|-foreach from=$affiliates item=affiliate name=for_affiliates-|
					<option value="|-$affiliate->getId()-|"|-if $affiliate->getId() eq $affiliateId-| selected="selected"|-/if-|>|-$affiliate->getName()-|</option>
					|-/foreach-|
				</select>
			</p>
		|-/if-|
		<p> |-if $accion eq "edicion"-|
				<input type="hidden" name="accion" value="edicion" />
				|-/if-|
				<input type='submit' name='guardar' value='##97,Guardar##' class='button' />
				&nbsp;&nbsp;
				<input type='button' onClick='javascript:history.go(-1)' value='##104,Regresar##' class='button'  />
			</p>
</fieldset>
</form>
|-if $accion eq "edicion"-|
<table width='100%' border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'>
	<caption>
	##167,El usuario ## |-$currentAffiliateUser->getUsername()-| ##168,es miembro de los grupos:##
	</caption>
	|-if $currentUserGroups|@count eq 0-|
	<tr>
		<th colspan="2">##169,El usuario todavía no es miembro de ningún grupo##.</th>
	</tr>
	|-else-|
	<tr>
		<th width="95%">##170,Grupo##</th>
		<th width="5%">&nbsp;</th>
	</tr>
	|-foreach from=$currentUserGroups item=userGroup name=for_user_group-|
	|-assign var="group" value=$userGroup->getAffiliateUserGroup()-|
	<tr>
		<td><div class='titulo2'>|-$group->getName()-|</div></td>
		<td class='cellopciones' nowrap> [ <a href='Main.php?do=affiliatesUsersDoRemoveFromGroup&user=|-$currentAffiliateUser->getId()-|&group=|-$group->getId()-|' class='delete'>##115,Eliminar##</a> ] </td>
	</tr>
	|-/foreach-|
	|-/if-|
	<tr>
		<td class='cellboton' colspan='4'>##171,Agregar al Usuario en el Grupo##:
			<form action='Main.php' method='post'>
				<input type="hidden" name="do" value="affiliatesUsersDoAddToGroup" />
				<select name="group">
					<option value="" selected="selected">##172,Seleccionar grupo##</option>
								|-foreach from=$groups item=group name=for_groups-|
					<option value="|-$group->getId()-|">|-$group->getName()-|</option>
								|-/foreach-|
				</select>
				<input type="hidden" name="user" value="|-$currentAffiliateUser->getId()-|" />
				<input type='submit' value='##123,Agregar##' class='button' />
			</form></td>
	</tr>
</table>
|-/if-|
|-/if-|


|-if $showList-|

|-if $loginUser ne ''-|
<h3>Ver Usuarios por Cliente</h3>
			<form name="affiliateFilter" action="Main.php" method="get">
<p>			<select name="affiliateId">
					<option value="0">Seleccione una Cliente</option>
					<option value="-1">Todas</option>
				|-foreach from=$affiliates item=affiliate name=for_affiliate-|
					<option value="|-$affiliate->getId()-|"|-if $affiliate->getId() eq $affiliateId-| selected="selected"|-/if-|>|-$affiliate->getName()-|</option>
				|-/foreach-|
			</select> 
			<input type="hidden" name="do" value="affiliatesUsersList" />
			<input name="submit" type="submit" value="Consultar" class="button" />
		</p>
		</form>
|-/if-|

<table cellpadding='5' cellspacing='1' width='100%' class='tableTdBorders'>
	<tr>
		<th>##162,Identificación de Usuario##</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Email</th>
		<th>&nbsp;</th>
	</tr>
	|-foreach from=$users item=user name=for_users-|
	<tr>
		<td width="45%">|-$user->getUsername()-|</td>
			|-assign var="userInfo" value=$user->getAffiliateUserInfo()-|
		<td width="45%">|-$userInfo->getName()-|</td>
		<td width="45%">|-$userInfo->getSurname()-|</td>
		<td width="45%">|-$userInfo->getMailAddress()-|</td>
		<td width="10%" nowrap><a href='Main.php?do=affiliatesUsersList&user=|-$user->getId()-|' title="##114,Editar##"><img src="images/clear.png" class="linkImageEdit"></a>
		<a href='Main.php?do=affiliatesUsersDoDelete&id=|-$user->getId()-|' title="##115,Eliminar##"><img src="images/clear.png" class="linkImageDelete"></a></td>
	</tr>
	|-/foreach-|
	<tr>
		<td class='cellboton' colspan='5'><form action='Main.php' method='get'>
				<input type="hidden" name="do" value="affiliatesUsersList" />
				<input type="hidden" name="user" value="" />
				<input type="hidden" name="affiliateId" value="|-$affiliateId-|" />
				<input type='submit' value='##173,Nuevo Usuario##' class='button' />
			</form></td>
	</tr>
</table>

|-if $deletedUsers|@count gt 0-|
<br />
<table width='100%' border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'>
	<tr>
		<td colspan='4' class='celltitulo2'>##175,Usuarios Eliminados##&nbsp;<a href="javascript:void(null)" class='deta' onClick="alert('##174,Si quiere dar de alta a un usuario que estuvo registrado alguna vez, debe reactivarlo desde esta opción. Si lo intenta desde un usuario nuevo el sistema le informará que ese usuario ya está en uso.##')">##38,Ayuda##</a> </td>
	</tr>
	<tr>
		<th>##162,Identificación de Usuario##</th>
		<th>&nbsp;</th>
	</tr>
	|-foreach from=$deletedUsers item=user name=for_deleted_users-|
	<tr>
		<td width="90%"><div class='titulo2'>|-$user->getUsername()-|</div></td>
		<td width="10%" nowrap class='cellTextOptions'> [ <a href='Main.php?do=affiliatesUsersDoActivate&user=|-$user->getId()-|' class='edit'>##176,Reactivar##</a> ] </td>
	</tr>
	|-/foreach-|
</table>
|-/if-|

|-/if-|