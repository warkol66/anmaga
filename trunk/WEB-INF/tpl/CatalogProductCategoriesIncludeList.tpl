					<table id="tabla-productcategories">
						<thead>
							<tr>
                								<th>Id</th>
																<th>Name</th>
																<th>Description</th>
																<th>&nbsp;</th>
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
																<td>
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="catalogProductCategoriesEdit" />
																				<input type="hidden" name="id" value="|-$productCategory->getid()-|" />
																				<input type="submit" name="submit_go_edit_productcategory" value="Editar" class="boton" />
									</form>
									<form action="Main.php" method="post">
										<input type="hidden" name="do" value="catalogProductCategoriesDoDelete" />
																				<input type="hidden" name="id" value="|-$productCategory->getid()-|" />
																				<input type="submit" name="submit_go_delete_productcategory" value="Borrar" onclick="return confirm('Seguro que desea eliminar el productcategory?')" class="boton" />
									</form>
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="catalogProductCategoriesEdit" />
																				<input type="hidden" name="parentNodeId" value="|-$productCategory->getid()-|" />
																				<input type="submit" name="submit_go_add_productcategory" value="Agregar Subcategoria" class="boton" />
									</form>
								</td>
							</tr>
							|-if $node.childs|@count gt 0-|
							<tr>
								<td>Childs</td><td colspan="3">|-include file="CatalogProductCategoriesIncludeList.tpl" productCategories=$node.childs-|</td>
							</tr>
							|-/if-|
						|-/foreach-|
						</tbody>
					</table>
