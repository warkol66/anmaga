				<h2>Products</h2>
				<div id="div_products">
					|-if $message eq "ok"-|<span class="message_ok">Producto guardado correctamente</span>|-/if-|
					|-if $message eq "deleted_ok"-|<span class="message_ok">Producto eliminado correctamente</span>|-/if-|
					
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
						<a href="Main.php?do=catalogProductsList">Sin Filtros</a>

					</div>

					<h3><a href="Main.php?do=catalogProductsEdit">Agregar Product</a></h3>
					<table id="tabla-products">
						<thead>
							<tr>
                								<th>id</th>
																<th>code</th>
																<th>name</th>
																<th>description</th>
																<th>price</th>
																<th>Categoria</th>
																<th>Unidad</th>
																<th>Unidad de Medida</th>
																<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						|-foreach from=$products item=node name=for_products-|
							|-assign var=product value=$node->getInfo()-|
							|-assign var=parentNode value=$node->getParentNode()-|
							|-assign var=unit value=$product->getUnit()-|
							|-assign var=measureUnit value=$product->getMeasureUnit()-|
							<tr>
																<td>|-$node->getid()-|</td>
																<td>|-$product->getcode()-|</td>
																<td>|-$node->getname()-|</td>
																<td>|-$product->getdescription()-|</td>
																<td>|-$product->getprice()-|</td>
																<td>|-if $parentNode-||-$parentNode->getName()-||-/if-|</td>
																<td>|-if $unit-||-$unit->getName()-||-/if-|</td>
																<td>|-if $measureUnit-||-$measureUnit->getName()-||-/if-|</td>
																<td>
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="catalogProductsEdit" />
																				<input type="hidden" name="id" value="|-$node->getid()-|" />
																				<input type="submit" name="submit_go_edit_product" value="Editar" class="boton" />
									</form>
									<form action="Main.php" method="post">
										<input type="hidden" name="do" value="catalogProductsDoDelete" />
																				<input type="hidden" name="id" value="|-$node->getid()-|" />
																				<input type="submit" name="submit_go_delete_product" value="Borrar" onclick="return confirm('Seguro que desea eliminar el producto?')" class="boton" />
									</form>
								</td>
							</tr>
						|-/foreach-|
						
							<tr>
								<td colspan="7">|-include file="IncludePaginate.tpl"-|</td>
							</tr>

						</tbody>
					</table>
				</div>
