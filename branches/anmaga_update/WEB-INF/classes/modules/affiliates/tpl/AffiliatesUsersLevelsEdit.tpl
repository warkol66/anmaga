<h2>##40,Configuración del Sistema##</h2>
	<h1>Administración de Niveles de Usuarios</h1>
	<p>A continuación podrá editar un nivel usuario.</p>
	|-if $currentLevel->getId() ne ''-|
	  <p>Realice los cambios en el nivel de usuario y haga click en "Guardar" para guardar las modificaciones.</p>
	|-else-|
	  <p>Ingrese los datos del nuevo nivel de usuario y haga click en "Guardar".</p>
	|-/if-|
	
|-if $message eq "errorUpdate"-|
<div align="center" class="errorMessage">##182,Ha ocurrido un error al intentar guardar la información del nivel de usuarios##</div>
|-/if-|
|-if $currentLevel->getValidationFailures()|@count > 0-|
	<div class="errorMessage">
		<ul>
			|-foreach from=$currentLevel->getValidationFailures() item=error-|
				<li>|-$error->getMessage()-|</li>
			|-/foreach-|
		</ul>
	</div>
|-/if-|

<form method="post" action="Main.php">
	<input type="hidden" name="id" value="|-$currentLevel->getId()-|" />
	<table class="tablaborde" cellpadding="5" cellspacing="1">
		<tr>
			<th colspan="2">##187,Editar nombre del Nivel ##</th>
		</tr>
		<tr>
			<td nowrap="nowrap" class="titulodato1">##196,Nombre del Nivel##</td>
			<td class="celldato">
				<input name="levelParams[name]" type="text"  class="textodato" value="|-$currentLevel->getName()-|" size="70" />
			</td>
		</tr>
		<tr>
			<td class="cellboton" colspan="2">
			    <input type="hidden" name="do" value="affiliatesUsersLevelsDoEdit" />
			    <input type="hidden" name="id" value="|-$currentLevel->getId()-|" />
				<input type="submit" name="guardar" value="##97,Guardar##"  class="boton" />
				&nbsp;&nbsp;
				<input type="button" onClick="javascript:history.go(-1)" value="##104,Regresar##" class="boton"  />
			</td>
		</tr>
	</table>
</form>
