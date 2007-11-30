				<h2>Importar Orden</h2>
				
				|-if $results ne ""-|
					<ul>
						<li>Ordenes Creadas: |-$results.ordersCreated-|</li>
						<li>Ordenes No Creadas: |-$results.ordersNotCreated-|</li>
						<li>Ordenes Duplicadas: |-$results.duplicatedOrdersCount-|</li>
						<li>Productos Encontrados: |-$results.productsFound-|</li>
						<li>Productos No Encontrados: |-$results.productsNotFound-|</li>
					</ul>					
					|-if $results.productsCodesNotFounds ne ""-|
					<a href="#" onclick="$('productsNotFound').toggle();">Mostar Códigos de Productos No Encontrados</a>
					<div id="productsNotFound" style="display:none;">
						<h3>Códigos de Productos no Encontrados</h3>
						<ul>
							|-foreach from=$results.productsCodesNotFoundsUnique item=code-|
							<li>|-$code-|</li>
							|-/foreach-|
						</ul>
					</div>
					|-/if-|
					<br />
					|-if $results.duplicatedOrders ne ""-|
					<a href="#" onclick="$('duplicatedOrders').toggle();">Mostar Números de Ordenes Duplicadas</a>
					<div id="duplicatedOrders" style="display:none;">
						<h3>Números de Ordenes Duplicadas</h3>
						<ul>
							|-foreach from=$results.duplicatedOrders item=order-|
							<li>|-$order-|</li>
							|-/foreach-|
						</ul>
					</div>
					|-/if-|
					<br />					
					|-if $results.ordersReport ne ""-|
					<a href="#" onclick="$('ordersReport').toggle();">Mostar Detalle de las Ordenes con Productos no Encontrados</a>
					<div id="ordersReport" style="display:none;">					
						<h3>Detalle de las Ordenes con Productos no Encontrados</h3>
						<ul>
							|-foreach from=$results.ordersReport item=order key=orderId-|
							<li>Id Orden: |-$orderId-|
								<table>
									<caption>Productos</caption>
									<tr>
										<th>Code</th>
										<th>Cantidad</th>
									</tr>
								|-foreach from=$order item=product-|
									<tr>
										<td>|-$product.code-|</td>
										<td>|-$product.quantity-|</td>
									</tr>
								|-/foreach-|
								</table>
							</li>
							|-/foreach-|
						</ul>
					</div>
					|-/if-|					
				|-/if-|
					
				<div>
					<form action="Main.php" method="post" enctype="multipart/form-data">
						|-if $affiliates|@count gt 0-|
						<p>
							<label for="affiliateId">Affiliate:</label>
							<select name="affiliateId">
								<option value="" selected="selected">Seleccionar</option>
								|-foreach from=$affiliates item=affiliate-|
								<option value="|-$affiliate->getId()-|">|-$affiliate->getName()-|</option>
								|-/foreach-|
							</select>
						</p>						
						|-/if-|
						<p>
							<label for="csv">Archivo CSV de ordenes:</label>
							<input type="file" name="csv" id="csv" />
						</p>
						<p>
							<input type="hidden" name="do" id="do" value="ordersDoImport" />
							<input type="submit" value="Import" />
						</p>
					</form>
				</div>
