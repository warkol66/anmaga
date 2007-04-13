				<h2>Products</h2>
				<div id="div_products">
					|-if $message eq "ok"-|<span class="message_ok">Producto guardado correctamente</span>|-/if-|
					|-if $message eq "deleted_ok"-|<span class="message_ok">Producto eliminado correctamente</span>|-/if-|
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
																<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						|-foreach from=$products item=product name=for_products-|
							|-assign var=node value=$product->getNode()-|
							|-assign var=parentNode value=$node->getParentNode()-|
							<tr>
																<td>|-$node->getid()-|</td>
																<td>|-$product->getcode()-|</td>
																<td>|-$node->getname()-|</td>
																<td>|-$product->getdescription()-|</td>
																<td>|-$product->getprice()-|</td>
																<td>|-if $parentNode-||-$parentNode->getName()-||-/if-|</td>
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
						</tbody>
					</table>
				</div>
