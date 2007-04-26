				<div id="div_products">
					<table id="tabla-products">
						<thead>
							<tr>
																<th>code</th>
																<th>name</th>
																<th>description</th>
																<th>price</th>
							</tr>
						</thead>
						<tbody>
						|-foreach from=$productNodes item=productNode name=for_products-|
							|-assign var=product value=$productNode->getInfo()-|
							<tr>
																<td>|-$product->getcode()-|</td>
																<td>|-$productNode->getname()-|</td>
																<td>|-$product->getdescription()-|</td>
																<td>|-$product->getprice()-|</td>
							</tr>
						|-foreachelse-|
							<tr><td colspan="4">Sin Productos</td></tr>
						|-/foreach-|

							<tr>
								<td colspan="3">|-include file="IncludePaginate.tpl"-|</td>
							</tr>

						</tbody>
					</table>
				</div>
