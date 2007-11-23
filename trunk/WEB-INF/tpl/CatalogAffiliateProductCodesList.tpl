				<h2>Codigos de Productos por Afiliado</h2>
				<div id="div_affiliateproductcodes">
					|-if $message eq "ok"-|<span class="message_ok">Codigo de Producto por Afiliado guardado correctamente</span>|-/if-|
					|-if $message eq "deleted_ok"-|<span class="message_ok">Codigo de Producto por Afiliado eliminado correctamente</span>|-/if-|
					<h3><a href="Main.php?do=catalogAffiliateProductCodesEdit">Agregar Codigo de Producto por Afiliado</a></h3>
					<table id="tabla-affiliateproductcodes" width='100%' border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'>
						<thead>
							<tr>
								<th>Afiliado</th>
								<th>Producto</th>
								<th>Codigo</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						|-foreach from=$affiliateproductcodes item=affiliateproductcode name=for_affiliateproductcodes-|
							<tr>
								<td>|-assign var=affiliate value=$affiliateproductcode->getAffiliate()-||-$affiliate->getName()-|</td>
								<td>|-if $affiliateproductcode->getproductId() ne ""-||-assign var=product value=$affiliateproductcode->getProduct()-||-assign var=productNode value=$product->getNode()-||- $product->getCode()-|, |- $productNode->getName()-||-/if-|</td>
								<td>|-$affiliateproductcode->getproductCodeAffiliate()-|</td>
								<td>
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="catalogAffiliateProductCodesEdit" />
										<input type="hidden" name="id" value="|-$affiliateproductcode->getid()-|" />
										<input type="submit" name="submit_go_edit_affiliateproductcode" value="Editar" class="boton" />
									</form>
									<form action="Main.php" method="post">
										<input type="hidden" name="do" value="catalogAffiliateProductCodesDoDel" />
										<input type="hidden" name="id" value="|-$affiliateproductcode->getid()-|" />
										<input type="submit" name="submit_go_delete_affiliateproductcode" value="Borrar" onclick="return confirm('Seguro que desea eliminar el affiliateproductcode?')" class="boton" />
									</form>
								</td>
							</tr>
						|-/foreach-|
						</tbody>
					</table>
				</div>
