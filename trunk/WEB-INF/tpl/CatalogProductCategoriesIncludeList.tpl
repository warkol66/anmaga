<table width="100%" cellpadding="4" cellspacing="0" id="tabla-productcategories" class="tableTdBorders">
	<thead>
		<tr>
				<th class"thFillTitle">Id</th>
				<th class"thFillTitle">Nombre</th>
				<th class"thFillTitle">Descripci&oacute;n</th>
				<th class"thFillTitle">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	|-foreach from=$productCategories item=node name=for_productCategories-|
		|-assign var=productCategory value=$node.node-|
		|-assign var=category value=$productCategory->getInfo()-|
		<tr>
			<td>|-$productCategory->getId()-|</td>
			<td>|-$productCategory->getName()-|</td>
			<td>|-$category->getDescription()-|</td>
			<td nowrap>
				<form action="Main.php" method="get">
					<input type="hidden" name="do" value="catalogProductCategoriesEdit" />
					<input type="hidden" name="id" value="|-$productCategory->getid()-|" />
					<input type="submit" name="submit_go_edit_productcategory" value="Editar" class="buttonImageEdit" />
				</form>
				<form action="Main.php" method="post">
					<input type="hidden" name="do" value="catalogProductCategoriesDoDelete" />
					<input type="hidden" name="id" value="|-$productCategory->getid()-|" />
					<input type="submit" name="submit_go_delete_productcategory" value="Borrar" onclick="return confirm('Seguro que desea eliminar el productcategory?')" class="buttonImageDelete" />
				</form>
				<form action="Main.php" method="get">
					<input type="hidden" name="do" value="catalogProductCategoriesEdit" />
					<input type="hidden" name="parentNodeId" value="|-$productCategory->getid()-|" />
					<input type="submit" name="submit_go_add_productcategory" value="Agregar Subcategoria" class="smallButton" />
				</form>								</td>
		</tr>
		|-if $node.childs|@count gt 0-|
		<tr>
			<td>Subcategor&iacute;as</td>
			<td colspan="3">|-include file="CatalogProductCategoriesIncludeList.tpl" productCategories=$node.childs-|</td>
		</tr>
		|-/if-|
	|-/foreach-|
	</tbody>
</table>
