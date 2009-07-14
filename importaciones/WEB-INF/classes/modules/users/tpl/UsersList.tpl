<h2>##40,Configuración del Sistema##</h2>
<h1>##151,Administración de Usuarios##</h1>
<!-- Link VOLVER -->
<!-- /Link VOLVER -->
<p>##152,A continuación podrá editar la lista de usuarios del sistema##</p>
|-if $message eq "deleted"-|
	<div class='successMessage'>##153,Usuario eliminado##</div>
|-elseif $message eq "activated"-|
	<div class='successMessage'>##154,Usuario reactivado##</div>
|-elseif $message eq "wrongPassword"-|
	<div class='errorMessage'>##155,Las contraseñas deben coincidir##</div>
|-elseif $message eq "errorUpdate"-|
	<div class='errorMessage'>##156,Ha ocurrido un error al intentar guardar la información del usuario##</div>
|-elseif $message eq "saved"-|
	<div class='successMessage'>##157,Usuario guardado##</div>
|-elseif $message eq "added"-|
	<div class='successMessage'>Usuario agregado</div>
|-elseif $message eq "notAddedToGroup"-|
	<div class='errorMessage'>##158,Ha ocurrido un error al intentar agregar el usuario al grupo##</div>
|-elseif $message eq "notRemovedFromGroup"-|
	<div class='errorMessage'>##159,Ha ocurrido un error al intentar eliminar el usuario al grupo##</div>
|-elseif $message eq "notLinkedWithSupplier"-|
	<div class='errorMessage'>##156,Ha ocurrido un error al relacionar el usuario con el correspondiente Supplier##</div>
|-/if-|
|-if $action eq "add" or $action eq "edit"-|
	|-if $action eq "add"-|
		<p>	##160,Ingrese la Identificación del usuario y la contraseña para el nuevo usuario, luego haga click en Guardar para generar el nuevo usuario.##</p>
	|-else-|
		<p>	##161,Realice los cambios en el usuario y haga click en Aceptar para guardar las modificaciones.## </p>
	|-/if-|
	<br />
|-if $action eq "edit"-||-assign var="currentUserInfo" value=$currentUser->getUserInfo()-||-/if-|



	|-include file="UsersEditInclude.tpl"-|




|-/if-|
<fieldset title="Lista de usuarios del sistema">
<legend>Usuarios del Sistema</legend>
<table class='tableTdBorders' cellpadding='5' cellspacing='0' width='100%'>
<!--	<tr>
		<td colspan='5' class="tdSearch"><a href="javascript:void(null);" onClick='switch_vis("divSearch");' class="tdTitSearch" style="display:inline;">Búsqueda por nombre</a>
			<div id="divSearch" style="display:|-if $name ne ''-|block|-else-|none|-/if-|;"><form action='Main.php' method='get' style="display:inline;">
				<input type="hidden" name="do" value="usersList" />
				Nombre: <input name="name" type="text" value="|-$name-|" size="30" />
				&nbsp;&nbsp;<input type='submit' value='Buscar' class='tdSearchButton' />
		</form></div></td>
	</tr>	-->
	|-if $licensesLeft gt 0-|
	<tr>
		<th colspan="5" class="thFillTitle"><div class="rightLink"><a href="Main.php?do=usersList&user=" class="addLink">Agregar Usuario</a></div></th>
	</tr>
	|-/if-|
	<tr>
		<th width="25%" nowrap class="thFillTitle">##162,Identificación de Usuario##</th>
		<th width="20%" class="thFillTitle">##163,Nombre##</th>
		<th width="30%" class="thFillTitle">##164,Apellido##</th>
		<th width="20%" class="thFillTitle">Email</th>
		<th width="5%" class="thFillTitle">&nbsp;</th>
	</tr>
	|-foreach from=$users item=user name=for_users-|
	|-assign var="userInfo" value=$user->getUserInfo()-|
	|-if $user->getUsername() neq 'system'-|<tr>
		<td>|-$user->getUsername()-|</td>
		<td>|-$userInfo->getName()-|</td>
		<td>|-$userInfo->getSurname()-|</td>
		<td>|-$userInfo->getMailAddress()-|</td>
		<td nowrap><a href='Main.php?do=usersList&user=|-$user->getId()-|' title="##114,Editar##"><img src="images/clear.png" class="linkImageEdit"></a>
|-if $loginUser->getUsername() eq $user->getUsername()-|
			<img src="images/clear.png" class="linkImageDeleteDisabled" title="No puede eliminar su propio usuario" alt="No puede eliminar su propio usuario">
|-elseif $user->getLevelId() lt 3 -|
			<img src="images/clear.png" class="linkImageDeleteDisabled" title="No se puede eliminar. Para eliminar este usuario, debe tener nivel inferior a administrador" alt="No se puede eliminar. Para eliminar este usuario, debe tener nivel inferior a administrador">
|-else-|
			<a href='Main.php?do=usersDoDelete&user=|-$user->getId()-|' title="##115,Eliminar##"><img src="images/clear.png" class="linkImageDelete">
|-/if-|
		</td>
	</tr>|-/if-|
	|-/foreach-|
	|-if $licensesLeft gt 0-|
	<tr>
		<th colspan="5" class="thFillTitle"><div class="rightLink"><a href="Main.php?do=usersList&user=" class="addLink">Agregar Usuario</a></div></th>
	</tr>
	|-else-|
	<tr>
		<td class='buttonCell' colspan='5'><input type='submit' value='##173,Nuevo Usuario##' class='button' onClick="return alert('Todas las licencias se encuentran en uso. Si desea dar de alta un nuevo usuario debe eliminar alguno de los existentes.');"/></td>
	</tr>
	|-/if-|
		|-if $pager->getTotalPages() gt 1-|
			<tr> 
				<td colspan="5" class="pages">|-include file="PaginateInclude.tpl"-|</td> 
			</tr>							
		|-/if-|						
</table>

</fieldset>
<br />

|-if $deletedUsers|@count gt 0-|
<fieldset>
<legend>##175,Usuarios Eliminados##</legend>
<table class='tableTdBorders' cellpadding='5' cellspacing='0' width='100%'>
	<tr>
		<th colspan='4'>Los siguientes usuarios fueron eliminados <a href="javascript:void(null)" onClick="alert('##174,Si quiere dar de alta a un usuario que estuvo registrado alguna vez, debe reactivarlo desde esta opción. Si lo intenta desde un usuario nuevo el sistema le informará que ese usuario ya está en uso.##')"><img src="images/clear.png" class="linkImageInfo"></a> </th>
	</tr>
	<tr>
		<th width="35%">##162,Identificación de Usuario##</th>
		<th width="25%">##163,Nombre##</th>
		<th width="38%">##164,Apellido##</th>
		<th width="2%">&nbsp;</th>
	</tr>
	|-foreach from=$deletedUsers item=user name=for_deleted_users-|
	|-assign var="userInfo" value=$user->getUserInfo()-|
	<tr>
		<td>|-$user->getUsername()-|</td>
		<td>|-$userInfo->getName()-|</td>
		<td>|-$userInfo->getSurname()-|</td>
		<td nowrap="nowrap"><a href='Main.php?do=usersDoActivate&user=|-$user->getId()-|'
|-if $licensesLeft lt 1-|
onClick="alert('##177,Todas las licencias se encuentran en uso. Si desea dar de alta un nuevo usuario debe eliminar alguno de los existentes.##');return false;"
alt='##176,Reactivar##' title='##176,Reactivar##'><img src="images/clear.png" class="linkImageActivateDisabled">
|-else-|
alt='##176,Reactivar##' title='##176,Reactivar##'><img src="images/clear.png" class="linkImageActivate">
|-/if-|
</a>
		</td>
	</tr>
	|-/foreach-|
</table>
|-/if-|
</fieldset>