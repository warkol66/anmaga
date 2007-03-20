			##160,Ingrese  la Identificación del usuario y la contraseña para el nuevo usuario,  luego haga click en Guardar para editar el nuevo usuario.##
<form method='post' action='Main.php?do=usersByAffiliateDoEditUser'>
	<input type='hidden' name='affiliateId' value='|-$user->getAffiliateId()-|' />
	<input type='hidden' name='id' value='|-$user->getId()-|' />
	<table class='tablaborde' cellpadding='5' cellspacing='1' width='60%'>
		<tr>
			<td nowrap="nowrap" class='titulodato1'>##162,Identificación de Usuario##</td>
			<td class='celldato'><input name='username' type='text'  class='textodato' value='|-$user->getUsername()-|' size="70" /></td>
		</tr>
		<tr>
			<td class='titulodato1'>##165,Contraseña##</td>
			<td class='celldato'><input name='password' type='password' class='textodato' value='' size="50" /></td>
		</tr>
		<tr>
			<td class='titulodato1'>##166,Repetir Contraseña##</td>
			<td class='celldato'><input name='passwordCompare' type='password' class='textodato' value='' size="50" /></td>
		</tr>
		<tr>
			<td class='titulodato1'>Nivel de Usuario</td>
			<td class='celldato'>
				<select name='levelId'>
					<option value="">Seleccionar nivel</option>
					|-foreach from=$levels item=level name=for_levels-|
					<option value="|-$level->getId()-|">|-$level->getName()-|</option>
					|-/foreach-|
				</select>
			</td>
		</tr>
		<tr>
			<td class='cellboton' colspan='2'>
				<input type='submit' name='guardar' value='##97,Guardar##'  class='boton' />
				&nbsp;&nbsp;
				<input type='button' onClick='javascript:history.go(-1)' value='##104,Regresar##' class='boton'  />
			</td>
		</tr>
	</table>
</form>

<table class='tablaborde' cellpadding='5' cellspacing='1' width='100%'>
	<caption>
	##167,El usuario ## |-$user->getUsername()-| ##168,es miembro de los grupos:##
	</caption>
	|-if $currentUserGroups|@count eq 0-|
	<tr>
		<th>##169,El usuario todavÃ­a no es miembro de ningÃºn grupo##.</th>
	</tr>
	|-else-|
	<tr>
		<th width="95%">##170,Grupo##</th>
		<th width="5%">&nbsp;</th>
	</tr>
	|-foreach from=$currentUserGroups item=userGroup name=for_user_group-|
	|-assign var="group" value=$userGroup->getUsersByAffiliateGroup()-|
	<tr>
		<td class='celldato'><div class='titulo2'>|-$group->getName()-|</div></td>
		<td class='cellopciones' nowrap> [ <a href='Main.php?do=usersByAffiliateDoRemoveFromGroup&user=|-$user->getId()-|&group=|-$group->getId()-|' class='elim'>##115,Eliminar##</a> ] </td>
	</tr>
	|-/foreach-|
	|-/if-|
	<tr>
		<td class='cellboton' colspan='4'>##171,Agregar al Usuario en el Grupo##:
			<form action='Main.php' method='post'>
				<input type="hidden" name="do" value="usersByAffiliateDoAddToGroup" />
				<select name="group">
					<option value="" selected="selected">##172,Seleccionar grupo##</option>
								|-foreach from=$groups item=group name=for_groups-|
					<option value="|-$group->getId()-|">|-$group->getName()-|</option>
								|-/foreach-|
				</select>
				<input type="hidden" name="user" value="|-$user->getId()-|" />
				<input type='submit' value='##123,Agregar##' class='boton' />
			</form></td>
	</tr>
</table>
