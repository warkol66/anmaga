<table border='0' cellpadding='0' cellspacing='0' width='100%'>
	<tr>
		<td class='title'>##40,Configuración del Sistema##</td>
	</tr>
	<tr>
		<td class='underlineTitle'><img src="images/clear.gif" height='3' width='1'></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class='backgroundTitle'>##151,Administración de Usuarios Registrados##</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>##152,A continuación podrá editar la lista de usuarios por registracion##</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>
|-if $message eq "deleted"-|
<div align='center' class='errorMessage'>##153,Usuario eliminado##</div>
|-/if-|
|-if $message eq "saved"-|
<div align='center' class='errorMessage'>##157,Usuario guardado##</div>
|-/if-|
|-if $message eq "created"-|
<div align='center' class='errorMessage'>##157,Usuario creado##</div>
|-/if-|

<div align='center' ><a href="Main.php?do=usersByRegistrationEdit">Crear Nuevo Usuario</a></div>

	<table>
	<tr>
		<th>Nombre de Usuario</th>
		<th>Apellido</th>
		<th>Nombre</th>
		<th>Email</th>
		<th>Opciones</th>
	</tr>
	
	|- foreach from=$users item=user -|
	<tr>	
		|-assign var="userinfo" value=$user->getUserInfo()-|
		<th>|-	$user->getUsername() -|</th>
		<th>|-	$userinfo->getSurname() -|</th>
		<th>|-	$userinfo->getName() -|</th>
		<th>|-	$userinfo->getMailAddress() -|</th>
		<th><a href="Main.php?do=usersByRegistrationEdit&id_registered_user=|- $user->getId() -|">Editar</a> <a href="Main.php?do=usersByRegistrationDoDelete&id_registered_user=|- $user->getId() -|">Eliminar</a></th>

	</tr>
	|- /foreach -|
	</table>
	
