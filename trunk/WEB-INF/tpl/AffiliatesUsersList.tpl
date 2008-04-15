<h2>Configuración del Sistema</h2>
	<h1>Administración de Usuarios por Afiliados</h1>
	<p>A continuación podrá editar la lista de Usuarios por Afiliados del sistema.</p>
|-if $message eq "deleted"-|
<div align='center' class='errorMessage'>##153,Usuario eliminado##</div>
|-/if-|
|-if $message eq "activated"-|
<div align='center' class='errorMessage'>##154,Usuario reactivado##</div>
|-/if-|
|-if $message eq "ownerEdited"-|
<div align='center' class='errorMessage'>El dueño ha sido modificado</div>
|-/if-|
|-if $message eq "ownerNotEdited"-|
<div align='center' class='errorMessage'>El dueño no ha sido modificado</div>
|-/if-|
|-if $message eq "wrongPassword"-|
<div align='center' class='errorMessage'>##155,Las contraseñas deben coincidir##</div>
|-/if-|
|-if $message eq "emptyAffiliate"-|
<div align='center' class='errorMessage'>##155,Debe selecccionar un afiliado##</div>
|-/if-|
|-if $message eq "errorUpdate"-|
<div align='center' class='errorMessage'>##156,Ha ocurrido un error al intentar guardar la información del usuario##</div>
|-/if-|
|-if $message eq "saved"-|
<div align='center' class='errorMessage'>##157,Usuario guardado##</div>
|-/if-|
|-if $message eq "notAddedToGroup"-|
<div align='center' class='errorMessage'>##158,Ha ocurrido un error al intentar agregar el usuario al grupo##</div>
|-/if-|
|-if $message eq "notRemovedFromGroup"-|
<div align='center' class='errorMessage'>##159,Ha ocurrido un error al intentar eliminar el usuario al grupo##</div>
|-/if-|
|-if $accion eq "creacion" or $accion eq "edicion"-|
	|-if $accion eq "creacion"-|
			##160,Ingrese  la Identificación del usuario y la contraseña para el nuevo usuario,  luego haga click en Guardar para generar el nuevo usuario.##
	|-else-|
			##161,Realice los cambios en el usuario y haga click en Aceptar para guardar las modificaciones.##|-/if-| <br />
	<br />
<form method='post' action='Main.php?do=affiliatesUsersDoEditUser'>
	<input type='hidden' name='id' value='|-if $accion eq "edicion"-||-$currentAffiliateUser->getId()-||-/if-|' />
	<table width='100%' border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'>
		<tr>
			<td nowrap="nowrap" class='tdTitle'>##162,Identificación de Usuario##</td>
			<td><input name='username' type='text'  class='textodato' value='|-if $accion eq "edicion"-||-$currentAffiliateUser->getUsername()-||-/if-|' size="40" /></td>
		</tr>
		<tr>
			<td class='tdTitle'>##163,Nombre##</td>
			<td><input name='name' type='text'  class='textodato' value='|-if $accion eq "edicion"-||-$currentAffiliateUserInfo->getName()-||-/if-|' size="70" /></td>
		</tr>
		<tr>
			<td class='tdTitle'>##164,Apellido##</td>
			<td><input name='surname' type='text'  class='textodato' value='|-if $accion eq "edicion"-||-$currentAffiliateUserInfo->getSurname()-||-/if-|' size="70" /></td>
		</tr>
		<tr>
			<td class='tdTitle'>E-mail</td>
			<td><input name='mailAddress' type='text'  class='textodato' value='|-if $accion eq "edicion"-||-$currentAffiliateUserInfo->getMailAddress()-||-/if-|' size="70" /></td>
		</tr>
		<tr>
			<td class='tdTitle'>##165,Contraseña##</td>
			<td><input name='pass' type='password' class='textodato' value='' size="20" /></td>
		</tr>
		<tr>
			<td class='tdTitle'>##166,Repetir Contraseña##</td>
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
				<input type='submit' name='guardar' value='##97,Guardar##' class='button' />
				&nbsp;&nbsp;
				<input type='button' onClick='javascript:history.go(-1)' value='##104,Regresar##' class='button'  />
			</td>
		</tr>
	</table>
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
		<th>##162,Identificación de Usuario##</th>
		<th>&nbsp;</th>
	</tr>
	|-foreach from=$users item=user name=for_users-|
	<tr>
		<td width="90%"><div class='titulo2'>|-$user->getUsername()-|</div></td>
		<td width="10%" class='cellTextOptions' nowrap>[ <form method="post"><input type="hidden" name="userId" value="|-$user->getId()-|" /><input type="hidden" name="affiliateId" value="|-$user->getAffiliateId()-|" /><input type="hidden" name="do" value="affiliatesSetOwner" /><a href="#" title="Set as Owner" onClick="javascript:this.parentNode.submit();">Set as Owner</a></form> ] [ <a href='Main.php?do=affiliatesUsersList&user=|-$user->getId()-|']' class='edit'>##114,Editar##</a> ]
			[ <a href='Main.php?do=affiliatesUsersDoDelete&id=|-$user->getId()-|']' class='delete'>##115,Eliminar##</a> ] </td>
	</tr>
	|-/foreach-|
	<tr>
		<td class='cellboton' colspan='4'><form action='Main.php' method='get'>
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
