<table border='0' cellpadding='0' cellspacing='0' width='100%'>
	<tr>
  	<td class='titulo'>Configuraci&oacute;n del Sistema</td>
	</tr>
	<tr>
  	<td class='subrayatitulo'><img src="images/clear.gif" height='3' width='1'></td>
	</tr>
	<tr>
  	<td>&nbsp;</td>
	</tr>
	<tr>
  	<td class='fondotitulo'>Administraci&oacute;n de Afiliados</td>
	</tr>
	<tr>
  	<td>&nbsp;</td>
	</tr>
	<tr>
  	<td class='texto'>A continuaci&oacute;n podr&aacute; editar la lista de Usuarios por Afiliados del sistema.</td>
	</tr>
	<tr>
		<td class='texto'>&nbsp;</td>
	</tr>
</table>
|-if $message eq "deleted"-|
<div align='center' class='textoerror'>Usuario eliminado</div>
|-/if-|
|-if $message eq "errorUpdate"-|
<div align='center' class='textoerror'>Ha ocurrido un error al intentar guardar la información. Intente nuevamente.</div>
|-/if-|
|-if $message eq "saved"-|
<div align='center' class='textoerror'>##183,Usuario guardado##</div>
|-/if-|
|-if $login_user ne ''-|
<h3>Ver Usuarios por Afiliado</h3>
			<form name="affiliateFilter" action="Main.php" method="get">
			<select name="affiliateId">
					<option value="0">Seleccione un Afiliado</option>
					<option value="-1">Todos</option> 
				|-foreach from=$affiliates item=affiliate name=for_affiliate-|
					<option value="|-$affiliate->getId()-|">|-$affiliate->getName()-|</option> 
				|-/foreach-|
			</select> 
			<input type="hidden" name="do" value="usersByAffiliateList" />
			<input name="submit" type="submit" value="Consultar">
		</form>
|-/if-|
<table class='tableTdBorders' cellpadding='5' cellspacing='1' width='100%'>
	<tr>
		<th colspan='4'>Usuarios Afiliados del Sistema -  <a href='Main.php?do=usersByAffiliateAddUser&affiliateId=|-$affId-|'>Agregar usuario!</a> </th>
	</tr>
	<tr>
		<th width="5%" class="size4" scope="col">Nombre Usuario</th>
		<th width="5%" class="size4" scope="col">Usuario Activo</th> 
		<th width="5%" class="size4" scope="col">Nivel</th>
		<th width="5%" class="size4" scope="col">Operaciones</th>
	</tr>

	|-foreach from=$users item=user name=for_user-|
	<tr>
		<td class='celldato'><div>|-$user->getUsername()-|</div></td>
		<td class='celldato'><div class='titulo2'>|-if $user->getActive() eq 1-|Si|-else-|No |-/if-|</div></td>
		<td class='celldato'><div>|-$user->getLevelId()-|</div></td>
		<td class='cellopciones' nowrap>[ <a href='Main.php?do=usersByAffiliateEditUser&id=|-$user->getId()-|' class='edit'>##114,Editar##</a> ]
			[ <a href='Main.php?do=usersByAffiliateDoDelete&id=|-$user->getId()-|' class='elim' onclick="return confirm('##256,Esta opción elimina permanentemente a este Usuario. ¿Está seguro que desea eliminarlo?##');">##115,Eliminar##</a> ]</td>
	</tr>
	|-/foreach-|
</table>
