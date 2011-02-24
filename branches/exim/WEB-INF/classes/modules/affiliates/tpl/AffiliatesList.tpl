<h2>##40,Configuración del Sistema##</h2>
<h1>Administración de Clientes</h1>
<!-- Link VOLVER -->
<!-- /Link VOLVER -->
|-if $action eq "edit"-|
	<p class='paragraphEdit'>##180,Realice los cambios en la cliente y haga click en "Aceptar" para guardar las modificaciones.##</p>
|-else-|
	<p>A continuación podrá editar la lista de Clientes del sistema.</p>
|-/if-|
|-if $message eq "deleted"-|
 <div class='successMessage'>Cliente eliminada</div>
|-elseif $message eq "errorUpdate"-|
 <div class='errorMessage'>Ha ocurrido un error al intentar guardar la información. Intente nuevamente.</div>
|-elseif $message eq "saved"-|
 <div class='successMessage'>Cliente guardada</div>
|-elseif $message eq "edited"-|
 <div class='successMessage'>##183,Cliente guardada##</div>
|-elseif $message eq "blankName"-|
 <div class='errorMessage'>##184,La cliente debe tener un Nombre##</div>
|-elseif $message eq "notAddedToGroup"-|
 <div class='errorMessage'>##185,Ha ocurrido un error al intentar agregar la categoría al grupo##</div>
|-elseif $message eq "notRemovedFromGroup"-|
 <div class='errorMessage'>##186,Ha ocurrido un error al intentar eliminar la categoría del grupo##</div>
|-/if-|
<table class='tableTdBorders' cellpadding='5' cellspacing='0' width='100%'>
	<tr>
		<td colspan='3' class="tdSearch"><a href="javascript:void(null);" onClick='switch_vis("divSearch");' class="tdTitSearch" style="display:inline;">Búsqueda por nombre</a>
			<div id="divSearch" style="display:|-if $name ne ''-|block|-else-|none|-/if-|;"><form action='Main.php' method='get' style="display:inline;">
				<input type="hidden" name="do" value="affiliatesList" />
				Nombre: <input name="name" type="text" value="|-$name-|" size="30" />
				&nbsp;&nbsp;<input type='submit' value='Buscar' class='tdSearchButton' />
		</form></div></td>
		
	</tr>
	|-if $allFlag eq 1-|
	<tr>
		<th colspan='3'><a href='Main.php?do=affiliatesList'>Volver a la selección de Clientes</a></th>
	</tr>
	|-/if-|
	<tr>
		 <th colspan="3" class="thFillTitle"><div class="rightLink"><a href="Main.php?do=affiliatesAddAffiliate" class="addLink">Agregar Cliente</a></div></th>
	</tr>
	|-foreach from=$affiliates item=affiliate name=for_affiliate-|
	<tr>
		<td width="5%">|-$affiliate->getId()-|</td>
		<td width="85%">|-$affiliate->getName()-||-if $affiliate->getOwnerId() neq ""-||-assign var=owner value=$affiliate->getOwner()-| [ Usuario administrador: |-$owner->getUsername()-| ] |-/if-|</td>
		<td width="10%" nowrap>
		<a href='Main.php?do=affiliatesViewAffiliate&id=|-$affiliate->getId()-|' title="Ver"><img src="images/clear.png" class="iconView"></a>
		<a href='Main.php?do=affiliatesEdit&id=|-$affiliate->getId()-|' title="##114,Editar##"><img src="images/clear.png" class="iconEdit"></a>
		<a href='Main.php?do=affiliatesDoDelete&affiliate=|-$affiliate->getId()-|' onclick="return confirm('##256,Esta opción eliminar permanentemente a esta Institución. ¿Está seguro que desea eliminarla?##');" title="##115,Eliminar##"><img src="images/clear.png" class="iconDelete"></a>
		</td>
	</tr>
	|-/foreach-|
		|-if $pager->getTotalPages() gt 1-|
			<tr> 
				<td colspan="3" class="pages">|-include file="PaginateInclude.tpl"-|</td> 
			</tr>							
		|-/if-|						
	<tr>
		 <th colspan="3" class="thFillTitle"><div class="rightLink"><a href="Main.php?do=affiliatesAddAffiliate" class="addLink">Agregar Cliente</a></div></th>
	</tr>
</table>