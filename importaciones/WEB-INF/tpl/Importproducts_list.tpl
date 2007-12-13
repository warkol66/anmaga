				<h2>Products</h2>
				<div id="div_products">
					|-if $message eq "ok"-|<span class="message_ok">Product guardado correctamente</span>|-/if-|
					|-if $message eq "deleted_ok"-|<span class="message_ok">Product eliminado correctamente</span>|-/if-|
					<h3><a href="Main.php?do=productsEdit">Agregar Product</a></h3>
					<table id="tabla-products">
						<thead>
							<tr>
                								<th>id</th>
																<th>code</th>
																<th>name</th>
																<th>description</th>
																<th>price</th>
																<th>image</th>
																<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						|-foreach from=$products item=product name=for_products-|
							<tr>
																<td>|-$product->getid()-|</td>
																<td>|-$product->getcode()-|</td>
																<td>|-$product->getname()-|</td>
																<td>|-$product->getdescription()-|</td>
																<td>|-$product->getprice()-|</td>
																<td>|-$product->getimage()-|</td>
																<td>
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="productsEdit" />
																				<input type="hidden" name="id" value="|-$product->getid()-|" />
																				<input type="submit" name="submit_go_edit_product" value="Editar" class="boton" onmouseover="this.className='botono'" onmouseout="this.className='boton'" />
									</form>
									<form action="Main.php" method="post">
										<input type="hidden" name="do" value="productsDoDelete" />
																				<input type="hidden" name="id" value="|-$product->getid()-|" />
																				<input type="submit" name="submit_go_delete_product" value="Borrar" onclick="return confirm('Seguro que desea eliminar el product?')" class="boton" onmouseover="this.className='botono'" onmouseout="this.className='boton'" />
									</form>
								</td>
							</tr>
						|-/foreach-|
						</tbody>
					</table>
				</div>
|-include file="footer.tpl"-|