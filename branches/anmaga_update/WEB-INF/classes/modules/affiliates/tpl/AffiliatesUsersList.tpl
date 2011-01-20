<h2>Configuración del Sistema</h2>
	<h1>Administración de Usuarios por Afiliados</h1>
	<p>A continuación podrá editar la lista de Usuarios por Afiliados del sistema.</p>
|-if $message eq "deleted"-|
<div align='center' class='successMessage'>Usuario eliminado</div>
|-/if-|
|-if $message eq "activated"-|
<div align='center' class='successMessage'>Usuario reactivado</div>
|-/if-|
|-if $message eq "ownerEdited"-|
<div align='center' class='successMessage'>El dueño ha sido modificado</div>
|-/if-|
|-if $message eq "ownerNotEdited"-|
<div align='center' class='errorMessage'>El dueño no ha sido modificado</div>
|-/if-|
|-if $message eq "wrongPassword"-|
<div align='center' class='errorMessage'>Las contraseñas deben coincidir</div>
|-/if-|
|-if $message eq "emptyAffiliate"-|
<div align='center' class='errorMessage'>Debe selecccionar un afiliado</div>
|-/if-|
|-if $message eq "errorUpdate"-|
<div align='center' class='errorMessage'>Ha ocurrido un error al intentar guardar la información del usuario</div>
|-/if-|
|-if $message eq "saved"-|
<div align='center' class='errorMessage'>Usuario guardado</div>
|-/if-|
|-if $message eq "notAddedToGroup"-|
<div align='center' class='errorMessage'>Ha ocurrido un error al intentar agregar el usuario al grupo</div>
|-/if-|
|-if $message eq "notRemovedFromGroup"-|
<div align='center' class='errorMessage'>Ha ocurrido un error al intentar eliminar el usuario al grupo</div>
|-/if-|
|-if $accion eq "creacion" or $accion eq "edicion"-|
	|-if $accion eq "creacion"-|
			Ingrese la Identificación del usuario y la contraseña para el nuevo usuario,  luego haga click en Guardar para generar el nuevo usuario.
	|-else-|
			Realice los cambios en el usuario y haga click en Aceptar para guardar las modificaciones.|-/if-| <br />
	<br />
<form method='post' action='Main.php?do=affiliatesUsersDoEditUser'>
	<input type='hidden' name='id' value='|-if $accion eq "edicion"-||-$currentAffiliateUser->getId()-||-/if-|' />
	<table width='100%' border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'>
		<tr>
			<td nowrap="nowrap" class='tdTitle'>Identificación de Usuario</td>
			<td><input name='username' type='text'  class='textodato' value='|-if $accion eq "edicion"-||-$currentAffiliateUser->getUsername()-||-/if-|' size="40" /></td>
		</tr>
		<tr>
			<td class='tdTitle'>Nombre</td>
			<td><input name='name' type='text'  class='textodato' value='|-if $accion eq "edicion"-||-$currentAffiliateUserInfo->getName()-||-/if-|' size="70" /></td>
		</tr>
		<tr>
			<td class='tdTitle'>Apellido</td>
			<td><input name='surname' type='text'  class='textodato' value='|-if $accion eq "edicion"-||-$currentAffiliateUserInfo->getSurname()-||-/if-|' size="70" /></td>
		</tr>
		<tr>
			<td class='tdTitle'>E-mail</td>
			<td><input name='mailAddress' type='text'  class='textodato' value='|-if $accion eq "edicion"-||-$currentAffiliateUserInfo->getMailAddress()-||-/if-|' size="70" /></td>
		</tr>
		<tr>
			<td class='tdTitle'>Contraseña</td>
			<td><input name='pass' type='password' class='textodato' value='' size="20" /></td>
		</tr>
		<tr>
			<td class='tdTitle'>Repetir Contraseña</td>
			<td><input name='pass2' type='password' class='textodato' value='' size="20" /></td>
		</tr>
		<tr>
			<td class='tdTitle'>Nivel de Usuario</td>
			<td>
        <select name='levelId'>
        	<option value="">Seleccionar nivel</option>
					|-foreach from=$levels item=level name=for_levels-|
        	<option value="|-$level->getId()-|"|-if $accion eq "edicion" and $level->getId() eq $currentAffiliateUser->getLevelId()-| selected="selected"|-/if-|>|-$level->getName()-|</option>
					|-/foreach-|
       	</select>
			</td>
		</tr>
		|-if $affiliates|@count > 0-|
		<tr>
			<td class='tdTitle'>Afiliado</td>
			<td>
				<select name='affiliateId'>
					|-foreach from=$affiliates item=affiliate name=for_affiliates-|
					<option value="|-$affiliate->getId()-|"|-if $affiliate->getId() eq $affiliateId-| selected="selected"|-/if-|>|-$affiliate->getName()-|</option>
					|-/foreach-|
				</select>
			</td>
		</tr>
		|-/if-|
		<tr>
			<td class='cellboton' colspan='2'> |-if $accion eq "edicion"-|
				<input type="hidden" name="accion" value="edicion" />
				|-/if-|
				<input type='submit' name='guardar' value='Guardar' class='button' />
				&nbsp;&nbsp;
				<input type='button' onClick='javascript:history.go(-1)' value='Regresar' class='button'  />
			</td>
		</tr>
	</table>
</form>
|-if $accion eq "edicion"-|
<table width='100%' border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'>
	<caption>
	El usuario |-$currentAffiliateUser->getUsername()-| es miembro de los grupos:
	</caption>
	|-if $currentUserGroups|@count eq 0-|
	<tr>
		<th colspan="2">El usuario todavía no es miembro de ningún grupo.</th>
	</tr>
	|-else-|
	<tr>
		<th width="95%">Grupo</th>
		<th width="5%">&nbsp;</th>
	</tr>
	|-foreach from=$currentUserGroups item=userGroup name=for_user_group-|
	|-assign var="group" value=$userGroup->getAffiliateUserGroup()-|
	<tr>
		<td><div class='titulo2'>|-$group->getName()-|</div></td>
		<td class='cellopciones' nowrap><a href='Main.php?do=affiliatesUsersDoRemoveFromGroup&user=|-$currentAffiliateUser->getId()-|&group=|-$group->getId()-|' class='delete'><img src="images/clear.png" class='iconDelete'></a> </td>
	</tr>
	|-/foreach-|
	|-/if-|
	<tr>
		<td class='cellboton' colspan='4'>Agregar al Usuario en el Grupo:
			<form action='Main.php' method='post'>
				<input type="hidden" name="do" value="affiliatesUsersDoAddToGroup" />
				<select name="group">
					<option value="" selected="selected">Seleccionar grupo</option>
								|-foreach from=$groups item=group name=for_groups-|
					<option value="|-$group->getId()-|">|-$group->getName()-|</option>
								|-/foreach-|
				</select>
				<input type="hidden" name="user" value="|-$currentAffiliateUser->getId()-|" />
				<input type='submit' value='Agregar' class='button' />
			</form></td>
	</tr>
</table>
|-/if-|
|-/if-|


|-if $loginUser ne ''-|
<h3>Ver Usuarios por Afiliado</h3>
			<form name="affiliateFilter" action="Main.php" method="get">
			<select name="affiliateId">
					<option value="0">Seleccione un Afiliado</option>
					<option value="-1">Todos</option>
				|-foreach from=$affiliates item=affiliate name=for_affiliate-|
					<option value="|-$affiliate->getId()-|"|-if $affiliate->getId() eq $affiliateId-| selected="selected"|-/if-|>|-$affiliate->getName()-|</option>
				|-/foreach-|
			</select> 
			<input type="hidden" name="do" value="affiliatesUsersList" />
			<input name="submit" type="submit" value="Consultar" class="button" />
		</form>
|-/if-|

<table cellpadding='5' cellspacing='1' width='100%' class='tableTdBorders'>
	<tr>
		<th>Identificación de Usuario</th>
		<th>&nbsp;</th>
	</tr>
	|-foreach from=$users item=user name=for_users-|
	<tr>
		<td width="90%"><div class='titulo2'>|-$user->getUsername()-|</div></td>
		<td width="10%" class='cellTextOptions' nowrap>|-if $loginUser ne '' && $affiliateId gt 0-|[ 
			<form method="post"><input type="hidden" name="userId" value="|-$user->getId()-|" /><input type="hidden" name="affiliateId" value="|-$user->getAffiliateId()-|" /><input type="hidden" name="do" value="affiliatesSetOwner" /><a href="#" title="Set as Owner" onClick="javascript:this.parentNode.submit();">Set as Owner</a></form> ] |-/if-|<a href='Main.php?do=affiliatesUsersList&user=|-$user->getId()-|']'><img src="images/clear.png" class='iconEdit'></a>
			<a href='Main.php?do=affiliatesUsersDoDelete&id=|-$user->getId()-|'><img src="images/clear.png" class='iconDelete'></a></td>
	</tr>
	|-/foreach-|
	<tr>
		<td class='cellboton' colspan='4'><form action='Main.php' method='get'>
				<input type="hidden" name="do" value="affiliatesUsersList" />
				<input type="hidden" name="user" value="" />
				<input type="hidden" name="affiliateId" value="|-$affiliateId-|" />
				<input type='submit' value='Nuevo Usuario' class='button' />
			</form></td>
	</tr>
</table>

|-if $deletedUsers|@count gt 0-|
<br />
<table width='100%' border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'>
	<tr>
		<td colspan='4' class='celltitulo2'>Usuarios Eliminados&nbsp;<a href="javascript:void(null)" class='deta' onClick="alert('Si quiere dar de alta a un usuario que estuvo registrado alguna vez, debe reactivarlo desde esta opción. Si lo intenta desde un usuario nuevo el sistema le informará que ese usuario ya está en uso.')">Ayuda</a> </td>
	</tr>
	<tr>
		<th>Identificación de Usuario</th>
		<th>&nbsp;</th>
	</tr>
	|-foreach from=$deletedUsers item=user name=for_deleted_users-|
	<tr>
		<td width="90%"><div class='titulo2'>|-$user->getUsername()-|</div></td>
		<td width="10%" nowrap class='cellTextOptions'> [ <a href='Main.php?do=affiliatesUsersDoActivate&user=|-$user->getId()-|' class='edit'>Reactivar</a> ] </td>
	</tr>
	|-/foreach-|
</table>
|-/if-|
