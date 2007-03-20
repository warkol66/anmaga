			##160,Ingrese  la Identificación del usuario y la contraseña para el nuevo usuario,  luego haga click en Guardar para generar el nuevo usuario.##
<form method='post' action='Main.php?do=usersByAffiliateDoAddUser'>
	<table class='tablaborde' cellpadding='5' cellspacing='1' width='60%'>
		<tr>
			<td nowrap="nowrap" class='titulodato1'>##162,Identificación de Usuario##</td>
			<td class='celldato'><input name='username' type='text'  class='textodato' value='' size="70" /></td>
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
		|-if $affiliates|@count > 0-|
		<tr>
			<td class='titulodato1'>Afiliado</td>
			<td class='celldato'>
				<select name='affiliateId'>
					<option value="">Seleccionar afiliado</option>
					|-foreach from=$affiliates item=affiliate name=for_affiliates-|
					<option value="|-$affiliate->getId()-|"|-if $affiliate->getId() eq $affiliateId-| selected="selected"|-/if-|>|-$affiliate->getName()-|</option>
					|-/foreach-|
				</select>
			</td>
		</tr>
		|-/if-|
		<tr>
			<td class='cellboton' colspan='2'>
				<input type='submit' name='guardar' value='##97,Guardar##'  class='boton' />
				&nbsp;&nbsp;
				<input type='button' onClick='javascript:history.go(-1)' value='##104,Regresar##' class='boton'  />
			</td>
		</tr>
	</table>
</form>
