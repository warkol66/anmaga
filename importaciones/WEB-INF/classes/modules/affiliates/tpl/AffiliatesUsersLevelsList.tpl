<h2>##40,Configuración del Sistema##</h2>
<h1>Administración de Niveles de Usuarios</h1>
<!-- Link VOLVER -->
<!-- /Link VOLVER -->
|-if $action eq "edit"-|
	<p class='paragraphEdit'>Realice los cambios en el nivel de usuarios y haga click en "Aceptar" para guardar las modificaciones.</p>
|-else-|
	<p>A continuación podrá editar la lista de niveles de usuarios.</p>
|-/if-|

|-if $message eq "deleted"-|
	<div class='successMessage'>##181,Nivel de Usuarios eliminado##</div>
|-elseif $message eq "errorUpdate"-|
	<div class='errorMessage'>##182,Ha ocurrido un error al intentar guardar la información del nivel de usuarios##</div>
|-elseif $message eq "saved"-|
	<div class='successMessage'>##183,Nivel de Usuarios guardado##</div>
|-elseif $message eq "blankName"-|
	<div class='errorMessage'>##184,El Nivel de Usuarios debe tener un Nombre##</div>
|-/if-|
|-if $action eq "edit"-|
<form method='post' action='Main.php?do=affiliatesUsersLevelsDoEdit'>
	<input type='hidden' name='id' value='|-$currentLevel->getId()-|' />
<fieldset title="Formulario de edición de niveles de usuarios del sistema">
<legend>Editar nivel de usuario</legend>
	<p>##187,Editar nombre del Nivel ##</p>
	<p><label for="name">##196,Nombre##</label>
			<input name='name' type='text'  class='textodato' value='|-$currentLevel->getName()-|' size="70" />
			</p>
			<input type="hidden" name="action" value="edit" />
	<p><input type='submit' name='guardar' value='##97,Guardar##'  class='button' />
				&nbsp;&nbsp;
		<input type='button' onClick='javascript:history.go(-1)' value='##104,Regresar##' class='button'  />
	</p>
</fieldset>
</form>
|-/if-| <br />
<table class='tableTdBorders' cellpadding='5' cellspacing='0' width='100%'>
	<tr>
		<th width="90%" nowrap="nowrap">##194,Niveles de Usuarios del Sistema ##</th>
		<th width="10%" nowrap="nowrap">&nbsp;</th>
	</tr>
	|-foreach from=$levels item=level name=for_levels-|
	<tr>
		<td><div class='titulo2'>|-$level->getName()-|</div></td>
		<td nowrap><a href='Main.php?do=affiliatesUsersLevelsList&level=|-$level->getId()-|' alt='##114,Editar##' title='##114,Editar##'><img src="images/clear.png" class="linkImageEdit"></a>
			<a href='Main.php?do=affiliatesUsersLevelsDoDelete&level=|-$level->getId()-|' title='##115,Eliminar##' alt='##115,Eliminar##' onclick="return confirm('##256,Esta opción elimina permanentemente a este Nivel. ¿Está seguro que desea eliminarlo?##');"><img src="images/clear.png" class="linkImageDelete"></a></td>
	</tr>
	|-/foreach-|
	<tr>
		<td colspan='2'><form action='Main.php' method='post'>
				##195,Agregar Nivel de Usuarios##&nbsp;&nbsp;
				<input type="hidden" name="do" value="affiliatesUsersLevelsDoEdit" />
				<input type="text" name="name" value="" />
				<input type='submit' value='##123,Agregar##' class='button' />
			</form></td>
	</tr>
</table>
