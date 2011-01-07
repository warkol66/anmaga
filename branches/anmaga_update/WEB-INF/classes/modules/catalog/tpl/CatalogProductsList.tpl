<h2>Catálogo de Productos </h2>
	<h1>Administrar productos del sistema </h1>
	<p>A continuación podrá editar los productos disponibles en el sistema </p>
<div id="div_products"> 
|-if $message eq "ok"-|<span class="message_ok">Producto guardado correctamente</span>|-/if-|
|-if $message eq "deleted_ok"-|<span class="message_ok">Producto eliminado correctamente</span>|-/if-|
	<div> 
		<form action="Main.php" method="get"> 
			<p> 
|-if $productCategories|@count neq 0-|
				<label for="categoryId">Categor&iacute;a</label> 
				<select name="filters[categoryId]" id="categoryId"> 
					<option value="all">Seleccione una categoria</option> 
					<option value="">Sin categoria</option> 
						|-include file="CatalogProductCategoriesIncludeOptions.tpl" productCategories=$productCategories-|
				</select> 
			</p> |-/if-|
			<p> 
				<label>Rango de precio desde: </label>
				<input type="text" name="filters[priceFrom]" value="|-$filters.priceFrom-|" /> 
				<label>hasta:</label> 
				<input type="text" name="filters[priceTo]" value="|-$filters.priceTo-|" /> 
			</p> 
			<p> 
				<label>Código: </label>
				<input type="text" name="filters[code]" value="|-$filters.code-|" /> 
			</p> 
			<p> 
				<input type="hidden" name="do" value="catalogProductsList" /> 
				<input type="submit" class="button" value="Buscar" /> <a href="Main.php?do=catalogProductsList">Eliminar Filtros</a>
			</p> 
		</form> 
  </div> 
	<h3><a href="Main.php?do=catalogProductsList&amp;csv=1">Exportar Productos a CSV</a></h3> 
	<table width="100%" border="0" cellpadding="4" cellspacing="0" class="tableTdBorders" id="tabla-products"> 
		<thead> 
			<tr>
				<th colspan="9"><div class="rightLink"><a href="Main.php?do=catalogProductsEdit" class="agregarNueva">Agregar Producto</a></div></th>
			</tr>
			<tr> 
				<th class="thFillTitle">id</th> 
				<th class="thFillTitle">Código</th> 
				<th class="thFillTitle">Nombre</th> 
				<th class="thFillTitle">Descripción</th> 
				<th class="thFillTitle">Precio</th> 
				<th class="thFillTitle">Unidad</th> 
				<th class="thFillTitle">Unidad de Medida</th> 
				<th class="thFillTitle">&nbsp;</th> 
			</tr> 
		</thead> 
		<tbody>  |-foreach from=$products item=product name=for_products-|  |-assign var=unit value=$product->getUnit()-| |-assign var=measureUnit value=$product->getMeasureUnit()-|
		<tr> 
			<td class="tdSize1">|-$product->getid()-|</td> 
			<td class="tdSize1">|-$product->getcode()-|</td> 
			<td class="tdSize1">|-$product->getname()-|</td> 
			<td class="tdSize1">|-$product->getdescription()-|</td> 
			<td class="tdSize1 right">|-$product->getprice()|system_numeric_format-|</td> 
			<td class="tdSize1 center">|-if $unit-||-$unit->getName()-||-/if-|</td> 
			<td class="tdSize1 center">|-if $measureUnit-||-$measureUnit->getName()-||-/if-|</td> 
			<td class="tdSize1" nowrap> <form action="Main.php" method="get" style="display:inline;"> 
					<input type="hidden" name="do" value="catalogProductsEdit" /> 
					<input type="hidden" name="id" value="|-$product->getid()-|" /> 
					<input type="submit" name="submit_go_edit_product" value="Editar" class="buttonImageEdit" /> 
				</form> 
				<form action="Main.php" method="post" style="display:inline;"> 
					<input type="hidden" name="do" value="catalogProductsDoDelete" /> 
					<input type="hidden" name="id" value="|-$product->getid()-|" /> 
					<input type="submit" name="submit_go_delete_product" value="Borrar" onclick="return confirm('Seguro que desea eliminar el producto?')" class="buttonImageDelete" /> 
				</form></td> 
		</tr> 
		|-/foreach-|
		|-if isset($pager) && ($pager->getTotalPages() gt 1)-|
  		<tr> 
  			<td colspan="9" class="pages">|-include file="PaginateInclude.tpl"-|</td> 
  		</tr> 
		|-/if-|
    <tr class="thFillTitle">
      <th colspan="8"><div class="rightLink"><a href="Main.php?do=projectsEdit|-include file="FiltersRedirectUrlInclude.tpl" filters=$filters-||-if isset($pager) && ($pager->getPage() ne 1)-|&page=|-$pager->getPage()-||-/if-|" class="addNew">Agregar ##projects,1,Proyecto##</a></div></th>
    </tr>
		</tbody> 
  </table> 
</div>
