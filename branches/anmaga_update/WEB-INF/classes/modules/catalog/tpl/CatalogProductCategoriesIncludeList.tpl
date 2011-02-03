<table width="100%" cellpadding="4" cellspacing="0" id="tabla-productcategories" class="tableTdBorders">
	<thead>
		<tr>
				<th>Nombre</th>
				<th>Descripci&oacute;n</th>
				<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	|-foreach from=$productCategories item=productCategory name=for_productCategories-|
		<tr>
			<td width="35%">|-$productCategory->getName()-|</td>
			<td width="64%">|-$productCategory->getDescription()-|</td>
			<td nowrap width="1%">
				<form action="Main.php" method="get">
					<input type="hidden" name="do" value="catalogProductCategoriesEdit" />
					<input type="hidden" name="id" value="|-$productCategory->getid()-|" />
					<input type="submit" name="submit_go_edit_productcategory" value="Editar" class="iconEdit" />
				</form>
				<form action="Main.php" method="post">
					<input type="hidden" name="do" value="catalogProductCategoriesDoDelete" />
					<input type="hidden" name="id" value="|-$productCategory->getid()-|" />
					<input type="submit" name="submit_go_delete_productcategory" value="Borrar" onclick="return confirm('Seguro que desea eliminar el productcategory?')" class="iconDelete" />
				</form>
				<form action="Main.php" method="get">
					<input type="hidden" name="do" value="catalogProductCategoriesEdit" />
					<input type="hidden" name="parentCategoryId" value="|-$productCategory->getid()-|" />
					<input type="submit" name="submit_go_add_productcategory" value="Agregar Subcategoria" class="iconAdd" />
				</form>								</td>
		</tr>
		|-if $productCategory->hasChildren()-|
		<tr>
			<td>Subcategor&iacute;as</td>
			<td colspan="2">|-include file="CatalogProductCategoriesIncludeList.tpl" productCategories=$productCategory->getChildren()-|</td>
		</tr>
		|-/if-|
	|-/foreach-|
	</tbody>
</table>
