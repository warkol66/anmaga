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
  	<td class='texto'>A continuaci&oacute;n podr&aacute; editar la lista de Afiliados del sistema.</td>
	</tr>
	<tr>
		<td class='texto'>&nbsp;</td>
	</tr>
	|-if $accion eq "edicion"-|
	<tr>
		<td class='texto'>##180,Realice los cambios en el grupo de usuarios y haga click en "Aceptar" para guardar las modificaciones. ##</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	|-/if-|
</table>
|-if $message eq "deleted"-|
<div align='center' class='textoerror'>Afiliado eliminado</div>
|-/if-|
|-if $message eq "errorUpdate"-|
<div align='center' class='textoerror'>Ha ocurrido un error al intentar guardar la información. Intente nuevamente.</div>
|-/if-|
|-if $message eq "saved"-|
<div align='center' class='textoerror'>##183,Grupo de Usuarios guardado##</div>
|-/if-|
|-if $message eq "edited"-|
<div align='center' class='textoerror'>##183,Afiliado guardado##</div>
|-/if-|
|-if $message eq "blankName"-|
<div align='center' class='textoerror'>##184,El Grupo de Usuarios debe tener un Nombre##</div>
|-/if-|
|-if $message eq "notAddedToGroup"-|
<div align='center' class='textoerror'>##185,Ha ocurrido un error al intentar agregar la categoría al grupo##</div>
|-/if-|
|-if $message eq "notRemovedFromGroup"-|
<div align='center' class='textoerror'>##186,Ha ocurrido un error al intentar eliminar la categoría del grupo##</div>
|-/if-|
<table class='tableTdBorders' cellpadding='5' cellspacing='1' width='100%'>
	<tr>
		<td colspan='3'><h3><a href="javascript:void(null);" onClick='switch_vis("divSearch");'>Busqueda por nombre</a></h3><div id="divSearch" style="display:none;"><form action='Main.php' method='get'>
				<input type="hidden" name="do" value="affiliatesList" />
				Nombre: <input name="name" type="text" value="" size="30" />
				&nbsp;&nbsp;<input type='submit' value='Buscar' class='boton' />
			</form></div></td>
		
	</tr>
	|-if $allFlag eq 1-|
	<tr>
		<th colspan='3'><a href='Main.php?do=affiliatesList'>Volver a la seleccion de afiliados</a></th>
	</tr>
	|-/if-|
	<tr>
		<th colspan='3'>Afiliados del Sistema <a href='Main.php?do=affiliatesAddAffiliate'>Agregar Afiliado!</a></th>
	</tr>
	|-foreach from=$affiliates item=affiliate name=for_affiliate-|
	<tr>
		<td class='celldato'><div>|-$affiliate->getId()-|</div></td>
		<td class='celldato'><div class='titulo2'>|-$affiliate->getName()-|</div></td>

		<td class='cellopciones' nowrap>[ <a href='Main.php?do=affiliatesViewAffiliate&id=|-$affiliate->getId()-|'>Ver datos</a> ] [ <a href='Main.php?do=affiliatesEdit&id=|-$affiliate->getId()-|' class='edit'>##114,Editar##</a> ]
			[ <a href='Main.php?do=affiliatesDoDelete&affiliate=|-$affiliate->getId()-|' class='elim' onclick="return confirm('##256,Esta opción eliminar permanentemente a este Grupo. ¿Está seguro que desea eliminarlo?##');">##115,Eliminar##</a> ] </td>

	</tr>
	|-/foreach-|
	<tr>
		<td colspan="3">|-include file="IncludePaginate.tpl"-|</td>
	</tr>
	<tr>
		<td colspan="3"><form action='Main.php' method='post'>
				<h3>Agregar Afiliado &nbsp;&nbsp;</h3>
				<input type="hidden" name="do" value="affiliatesDoAddAffiliate" />
				Nombre: <input type="text" name="name" value="" />&nbsp;&nbsp;<input type='submit' value='Agregar' class='boton' />
			</form></td>
	</tr>
</table>
