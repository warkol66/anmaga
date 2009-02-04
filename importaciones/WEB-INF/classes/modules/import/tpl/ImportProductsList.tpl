				<h2>Products</h2>
				<div id="div_products">
					|-if $message eq "ok"-|<span class="message_ok">Product guardado correctamente</span>|-/if-|
					|-if $message eq "deleted_ok"-|<span class="message_ok">Product eliminado correctamente</span>|-/if-|
					|-if $message eq "activated_ok"-|<span class="message_ok">Product activado correctamente</span>|-/if-|

					<h3><a href="Main.php?do=importProductsEdit">Agregar Product</a></h3>
					<table id="tabla-products" class='tableTdBorders' cellpadding='5' cellspacing='1' width='100%'>
						<thead>
							<tr>
																<th class="thFillTitle">code</th>
																<th class="thFillTitle">name</th>
																<th class="thFillTitle">description</th>
																<th class="thFillTitle">Supplier</th>
																																<th class="thFillTitle">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						|-foreach from=$products item=product name=for_products-|
							<tr>
																<td>|-$product->getcode()-|</td>
																<td>|-$product->getname()-|</td>
																<td>|-$product->getdescription()-|</td>
																<td>|-assign var=supplier value=$supplierPeer->get($product->getsupplierId())-||-if $supplier neq ''-||- $supplier->getName() -||-/if-|</td>
																<td>
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="importProductsEdit" />
																				<input type="hidden" name="id" value="|-$product->getid()-|" />
																				<input type="submit" name="submit_go_edit_product" value="Editar" class="boton" />
									</form>
									<form action="Main.php" method="post">
										<input type="hidden" name="do" value="importProductsDoDelete" />
																				<input type="hidden" name="id" value="|-$product->getid()-|" />
																				<input type="submit" name="submit_go_delete_product" value="Borrar" onclick="return confirm('Seguro que desea eliminar el product?')" class="boton" />
									</form>
								</td>
							</tr>
						|-/foreach-|						
							<tr> 
								<td colspan="9">|-include file="PaginateInclude.tpl"-|</td> 
							</tr>							
						
						</tbody>
					</table>
				</div>

<div >
						<table id="tabla-products" class='tableTdBorders' cellpadding='5' cellspacing='1' width='100%'>
						<thead>
							<tr>
																<th class="thFillTitle">code</th>
																<th class="thFillTitle">name</th>
																<th class="thFillTitle">description</th>
																<th class="thFillTitle">Supplier</th>
																																<th class="thFillTitle">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						|-foreach from=$inactiveProducts item=product name=for_products-|
							<tr>
																<td>|-$product->getcode()-|</td>
																<td>|-$product->getname()-|</td>
																<td>|-$product->getdescription()-|</td>
																<td>|-assign var=supplier value=$supplierPeer->get($product->getsupplierId())-||-if $supplier neq ''-||- $supplier->getName() -||-/if-|</td>
																<td>


									<form action="Main.php" method="post">
										<input type="hidden" name="do" value="importProductsDoActivate" />
																				<input type="hidden" name="id" value="|-$product->getid()-|" />
																				<input type="submit" name="submit_go_delete_product" value="Activar" class="boton" />
									</form>
								</td>
							</tr>
						|-/foreach-|						
						
						</tbody>
					</table>

</div>
