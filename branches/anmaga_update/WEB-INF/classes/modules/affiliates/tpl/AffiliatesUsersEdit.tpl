<h2>Configuración del Sistema</h2>
	<h1>Administración de Usuarios por Afiliados</h1>
	<p>A continuación podrá |-if $currentAffiliateUser->getId() eq ''-|crear|-else-|editar|-/if-| el Usuario por Afiliado del sistema.</p>
	|-if $currentAffiliateUser->getId() eq ''-|
			Ingrese la Identificación del usuario y la contraseña para el nuevo usuario,  luego haga click en Guardar para generar el nuevo usuario.
	|-else-|
			Realice los cambios en el usuario y haga click en Aceptar para guardar las modificaciones.
	|-/if-| 
	<br />
	<br />
<form method="post" action="Main.php?do=affiliatesUsersDoEdit">
	<input type="hidden" name="id" value="|-$currentAffiliateUser->getId()-|" />
	<table width="100%" border="0" cellpadding="5" cellspacing="0" class="tableTdBorders">
		<tr>
			<td nowrap="nowrap" class="tdTitle">Identificación de Usuario</td>
			<td><input name="affiliateUser[username]" type="text"  class="textodato" value="|-$currentAffiliateUser->getUsername()-|" size="40" /></td>
		</tr>
		<tr>
			<td class="tdTitle">Nombre</td>
			<td><input name="affiliateUserInfo[name]" type="text"  class="textodato" value="|-$currentAffiliateUserInfo->getName()-|" size="70" /></td>
		</tr>
		<tr>
			<td class="tdTitle">Apellido</td>
			<td><input name="affiliateUserInfo[surname]" type="text"  class="textodato" value="|-$currentAffiliateUserInfo->getSurname()-|" size="70" /></td>
		</tr>
		<tr>
			<td class="tdTitle">E-mail</td>
			<td><input name="affiliateUserInfo[mailAddress]" type="text"  class="textodato" value="|-$currentAffiliateUserInfo->getMailAddress()-|" size="70" /></td>
		</tr>
		<tr>
			<td class="tdTitle">Contraseña</td>
			<td><input name="affiliateUserInfo[pass]" type="password" class="textodato" value="" size="20" /></td>
		</tr>
		<tr>
			<td class="tdTitle">Repetir Contraseña</td>
			<td><input name="affiliateUserInfo[pass2]" type="password" class="textodato" value="" size="20" /></td>
		</tr>
		<tr>
			<td class="tdTitle">Nivel de Usuario</td>
			<td>
        <select name="affiliateUser[levelId]">
        	<option value="">Seleccionar nivel</option>
			|-foreach from=$levels item=level name=for_levels-|
        		<option value="|-$level->getId()-|"|-if $level->getId() eq $currentAffiliateUser->getLevelId()-| selected="selected"|-/if-|>|-$level->getName()-|</option>
			|-/foreach-|
       	</select>
			</td>
		</tr>
		|-if $affiliates|@count > 0-|
		<tr>
			<td class="tdTitle">Afiliado</td>
			<td>
				<select name="affiliateUser[affiliateId]">
					|-foreach from=$affiliates item=affiliate name=for_affiliates-|
					<option value="|-$affiliate->getId()-|"|-if $affiliate->getId() eq $currentAffiliateUser->getAffiliateId()-| selected="selected"|-/if-|>|-$affiliate->getName()-|</option>
					|-/foreach-|
				</select>
			</td>
		</tr>
		|-/if-|
		<tr>
			<td class="cellboton" colspan="2"> 
			    |-if $accion eq "edicion"-|
				<input type="hidden" name="accion" value="edicion" />
				|-/if-|
				<input type="submit" name="guardar" value="Guardar" class="button" />
				&nbsp;&nbsp;
				<input type="button" onClick="javascript:history.go(-1)" value="Regresar" class="button"  />
			</td>
		</tr>
	</table>
</form>
|-if $currentAffiliateUser->getId() ne ''-|
	<table width="100%" border="0" cellpadding="5" cellspacing="0" class="tableTdBorders">
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
				<td><div class="titulo2">|-$group->getName()-|</div></td>
				<td class="cellopciones" nowrap><a href="Main.php?do=affiliatesUsersDoRemoveFromGroup&user=|-$currentAffiliateUser->getId()-|&group=|-$group->getId()-|" class="delete"><img src="images/clear.png" class="iconDelete"></a> </td>
			</tr>
			|-/foreach-|
		|-/if-|
		<tr>
			<td class="cellboton" colspan="4">Agregar al Usuario en el Grupo:
				<form action="Main.php" method="post">
					<input type="hidden" name="do" value="affiliatesUsersDoAddToGroup" />
					<select name="group">
						<option value="" selected="selected">Seleccionar grupo</option>
						|-foreach from=$groups item=group name=for_groups-|
							<option value="|-$group->getId()-|">|-$group->getName()-|</option>
						|-/foreach-|
					</select>
					<input type="hidden" name="user" value="|-$currentAffiliateUser->getId()-|" />
					<input type="submit" value="Agregar" class="button" />
				</form>
			</td>
		</tr>
	</table>
|-/if-|