<h2>Products</h2>
<div id="div_products"> |-if $message eq "ok"-|<span class="message_ok">Producto guardado correctamente</span>|-/if-| |-if $message eq "deleted_ok"-|<span class="message_ok">Producto eliminado correctamente</span>|-/if-|
	<div> 
		<form action="Main.php" method="get"> 
			<p> 
				<label for="parentNodeId">Category</label> 
				<select name="parentNodeId" id="parentNodeId"> 
					<option value="">Select Category</option> 
					
									|-include file="CatalogProductCategoriesIncludeOptions.tpl" productCategories=$productCategories-|
								 
				</select> 
			</p> 
			<p> 
				<label>Price From:</label> 
				<input type="text" name="priceFrom" value="|-$priceFrom-|" /> 
				<label>To:</label> 
				<input type="text" name="priceTo" value="|-$priceTo-|" /> 
			</p> 
			<p> 
				<input type="hidden" name="do" value="catalogProductsList" /> 
				<input type="submit" class="boton" value="Buscar" /> 
			</p> 
		</form> 
		<a href="Main.php?do=catalogProductsList">Sin Filtros</a> </div> 
	<h3><a href="Main.php?do=catalogProductsEdit">Agregar Product</a></h3> 
	<h3><a href="Main.php?do=catalogProductsList&amp;csv=1">Exportar Productos a CSV</a></h3> 
	<table width="100%" border="0" cellpadding="4" cellspacing="0" class="tableTdBorders" id="tabla-products"> 
		<thead> 
			<tr> 
				<th class="thFillTitle">id</th> 
				<th class="thFillTitle">code</th> 
				<th class="thFillTitle">name</th> 
				<th class="thFillTitle">description</th> 
				<th class="thFillTitle">price</th> 
				<th class="thFillTitle">Categoria</th> 
				<th class="thFillTitle">Unidad</th> 
				<th class="thFillTitle">Unidad de Medida</th> 
				<th class="thFillTitle">&nbsp;</th> 
			</tr> 
		</thead> 
		<tbody>  |-foreach from=$products item=node name=for_products-| |-assign var=product value=$node->getInfo()-| |-assign var=parentNode value=$node->getParentNode()-| |-assign var=unit value=$product->getUnit()-| |-assign var=measureUnit value=$product->getMeasureUnit()-|
		<tr> 
			<td class="tdSize1">|-$node->getid()-|</td> 
			<td class="tdSize1">|-$product->getcode()-|</td> 
			<td class="tdSize1">|-$node->getname()-|</td> 
			<td class="tdSize1">|-$product->getdescription()-|</td> 
			<td class="tdSize1">|-$product->getprice()-|</td> 
			<td class="tdSize1">|-if $parentNode-||-$parentNode->getName()-||-/if-|</td> 
			<td class="tdSize1">|-if $unit-||-$unit->getName()-||-/if-|</td> 
			<td class="tdSize1">|-if $measureUnit-||-$measureUnit->getName()-||-/if-|</td> 
			<td> <form action="Main.php" method="get"> 
					<input type="hidden" name="do" value="catalogProductsEdit" /> 
					<input type="hidden" name="id" value="|-$node->getid()-|" /> 
					<input type="submit" name="submit_go_edit_product" value="Editar" class="button" /> 
				</form> 
				<form action="Main.php" method="post"> 
					<input type="hidden" name="do" value="catalogProductsDoDelete" /> 
					<input type="hidden" name="id" value="|-$product->getid()-|" /> 
					<input type="submit" name="submit_go_delete_product" value="Borrar" onclick="return confirm('Seguro que desea eliminar el producto?')" class="button" /> 
				</form></td> 
		</tr> 
		|-/foreach-|
		<tr> 
			<td colspan="9">|-include file="PaginateInclude.tpl"-|</td> 
		</tr> 
		</tbody> 
  </table> 
</div>
