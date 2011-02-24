<script type="text/javascript" src="scripts/lightbox.js"></script> 			
<div id="lightbox1" class="leightbox">
	<p align="right">				
		<a href="#" class="lbAction blackNoDecoration" rel="deactivate">Cerrar<input type="button" class="iconDelete" /></a> 
	</p> 
	<div id="affiliatesViewWorking"></div>
	<div class="innerLighbox">
		<div id="affiliatesViewDiv"></div>
	</div>
</div> 
<h2>Configuración del Sistema</h2>
	<h1>Administración de Afiliados</h1>
	<p>A continuación podrá editar la lista de Afiliados del sistema.</p>
|-if $message eq "deleted"-|
	<div align='center' class='successMessage'>Afiliado eliminado</div>
|-elseif $message eq "errorUpdate"-|
	<div align='center' class='errorMessage'>Ha ocurrido un error al intentar guardar la información. Intente nuevamente.</div>
|-elseif $message eq "saved"-|
	<div align='center' class='successMessage'>Grupo de Usuarios guardado</div>
|-elseif $message eq "edited"-|
	<div align='center' class='successMessage'>Afiliado guardado</div>
|-elseif $message eq "blankName"-|
	<div align='center' class='errorMessage'>El Grupo de Usuarios debe tener un Nombre</div>
|-elseif $message eq "notAddedToGroup"-|
	<div align='center' class='errorMessage'>Ha ocurrido un error al intentar agregar la categoría al grupo</div>
|-elseif $message eq "notRemovedFromGroup"-|
	<div align='center' class='errorMessage'>Ha ocurrido un error al intentar eliminar la categoría del grupo</div>
|-/if-|
<table width='100%' border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'>
	<tr>
		<td colspan='3'><a href="javascript:void(null);" onClick='switch_vis("divSearch");' class="searchLink">Busqueda por nombre</a><div id="divSearch" style="display:|-if $filters|@count gt 0-|block|-else-|none|-/if-|;"><form action='Main.php' method='get'>
				<input type="hidden" name="do" value="affiliatesList" />
				Nombre: <input name="filters[searchName]" type="text" value="|-$filters.searchName-|" size="30" />
				&nbsp;&nbsp;<input type='submit' value='Buscar' class='boton' />
				|-if $filters|@count gt 0-|<input name="rmoveFilters" type="button" value="Quitar filtros" onclick="location.href='Main.php?do=affiliatesList'" class='boton' />|-/if-|
			</form></div></td>
	</tr>
	<tr>
		<th colspan='3'>Distribuidores Mayoristas</th>
	</tr>
	<tr>
		<th colspan="3"><div class="rightLink"><a href="Main.php?do=affiliatesEdit" class="addLink">Agregar Mayorista</a></div></th>
	</tr>
	|-foreach from=$affiliates item=affiliate name=for_affiliate-|
	<tr>
		<td width="5%">|-$affiliate->getId()-|</td>
		<td width="85%">|-$affiliate->getName()-| |-if $affiliate->getOwnerId() neq "" -||-assign var=owner value=$affiliate->getOwner()-| [ Usuario Dueño: |-$owner->getUsername()-| ] |-/if-|</td>
		<td width="10%" nowrap>
					<form action="Main.php" method="get" style="display:inline;">
						
						<input type="hidden" name="do" value="affiliatesViewX" />
						<input type="hidden" name="id" value="|-$affiliate->getId()-|" />
						<a href="#lightbox1" rel="lightbox1" class="lbOn"><input type="button" class="iconView" onClick='{new Ajax.Updater("affiliatesViewDiv", "Main.php?do=affiliatesViewX&id=|-$affiliate->getId()-|", { method: "post", parameters: { id: "|-$affiliate->getId()-|"}, evalScripts: true})};$("affiliatesViewWorking").innerHTML = "<span class=\"inProgress\">buscando información...</span>";' value="Ver detalle" name="submit_go_show_project" /></a>
					</form>
			<form action="Main.php" method="get" style="display:inline;"> 
			  <input type="hidden" name="do" value="affiliatesEdit" /> 
			  <input type="hidden" name="id" value="|-$affiliate->getId()-|" /> 
			  <input type="submit" name="submit_go_edit_affiliate" value="Editar" class="iconEdit" /> 
			</form>
			<form action="Main.php" method="post" style="display:inline;"> 
			  <input type="hidden" name="do" value="affiliatesDoDelete" /> 
			  <input type="hidden" name="id" value="|-$affiliate->getId()-|" /> 
			  <input type="submit" name="submit_go_delete_affiliate" value="Borrar" onclick="return confirm('Seguro que desea eliminar el afiliado?')" class="iconDelete" /> 
			</form>
    </td>
	</tr>
	|-/foreach-|
		|-if isset($pager) && ($pager->getTotalPages() gt 1)-|
	<tr>
		<td colspan="3" class="pages">|-include file="PaginateInclude.tpl"-|</td>
	</tr>
	|-/if-|
</table>