|-popup_init src="scripts/overlib.js"-|
<h3>Solictudes de clientes que requieren acción</h3>
	<table cellpadding="4" cellspacing="0" class="tableTdBorders" id="tabla-newsmedias">
			<tr>
				<th>Id</th>
				<th>&nbsp;</th>
				<th>Cliente</th>
				<th>Fecha</th>
				<th>Estado</th>
				<th>Productos</th>
				<th></th>
			</tr>
		</thead>
		|-foreach from=$result item=quote name=for_quotes-|
	|-if $smarty.foreach.for_quotes.iteration is odd by 3-|
			<tr valign="top">
				<td>|-$quote->getId()-|</td>
				<td><img src="images/clear.gif" class="aqua|-*$smarty.foreach.for_quotes.iteration*-||-php-|echo rand(1,10);|-/php-|" /></td>
				<td>
					|-assign var=client value=$quote->getAffiliate()-|
					|-$client->getName()-|
				</td>
				<td>|-$quote->getCreatedAt()|change_timezone|date_format:"%d-%m-%Y"-|</td>
				<td>|-$quote->getStatusNameAdmin()-|</td>
				<td>|-assign var=items value=$quote->getClientQuoteItems()-|
					|-if $items|@count eq 0-|
						No hay productos en la solicitud
					|-else-|
					|-foreach from=$items item=item name=for_orders_item-|
						|-assign var=product value=$item->getProduct()-|
						|-$product->getName()-|
						|-if not $smarty.foreach.for_orders_item.last-|<br />|-/if-|
					|-/foreach-|
					|-/if-|
				</td>
				<td nowrap="nowrap">
					<form action="Main.php" method="get">						
						<input type="hidden" name="do" value="importClientQuoteEdit" />
						<input type="hidden" name="id" value="|-$quote->getid()-|" />
						<input type="submit" name="submit_go_edit_quote" value="Editar" class="buttonImageEdit" title="Editar" alt="Editar" />
					</form>
					<form action="Main.php" method="get">						
						<input type="hidden" name="do" value="importClientQuoteHistory" />
						<input type="hidden" name="id" value="|-$quote->getid()-|" />
						<input type="submit" name="submit_go_edit_quote" value="Ver Historial" class="buttonImageHistory" title="Ver Historial" alt="Ver Historial" />
					</form>
<!--					<form action="Main.php" method="post">
						<input type="hidden" name="do" value="importClientQuoteDelete" />
						<input type="hidden" name="id" value="|-$quote->getid()-|" />
						<input type="submit" name="submit_go_delete_quote" value="Borrar" onclick="return confirm('Seguro que desea eliminar la cotizacion?')" class="buttonImageDelete" />
					</form>
-->
				</td>
			</tr>
			|-/if-|
		|-/foreach-|				
		</tbody>
	</table>



<h3>Solictudes de cotización que requieren acción</h3>
	<table cellpadding="4" cellspacing="0" class="tableTdBorders" id="tabla-newsmedias">
			<tr>
				<th>Id</th>
				<th>&nbsp;</th>
				<th>Cliente</th>
				<th>Fecha</th>
				<th>Estado</th>
				<th>Productos</th>
				<th></th>
			</tr>
		</thead>
		|-foreach from=$result item=quote name=for_quotes-|
	|-if $smarty.foreach.for_quotes.iteration is div by 6-|
			<tr valign="top">
				<td>|-$quote->getId()-|</td>
				<td><img src="images/clear.gif" class="aqua|-*$smarty.foreach.for_quotes.iteration*-||-php-|echo rand(1,10);|-/php-|" /></td>
				<td>
					|-assign var=client value=$quote->getAffiliate()-|
					|-$client->getName()-|
				</td>
				<td>|-$quote->getCreatedAt()|change_timezone|date_format:"%d-%m-%Y"-|</td>
				<td>|-$quote->getStatusNameAdmin()-|</td>
				<td>|-assign var=items value=$quote->getClientQuoteItems()-|
					|-if $items|@count eq 0-|
						No hay productos en la solicitud
					|-else-|
					|-foreach from=$items item=item name=for_orders_item-|
						|-assign var=product value=$item->getProduct()-|
						|-$product->getName()-|
						|-if not $smarty.foreach.for_orders_item.last-|<br />|-/if-|
					|-/foreach-|
					|-/if-|
				</td>

				<td nowrap="nowrap">
					<form action="Main.php" method="get">						
						<input type="hidden" name="do" value="importClientQuoteEdit" />
						<input type="hidden" name="id" value="|-$quote->getid()-|" />
						<input type="submit" name="submit_go_edit_quote" value="Editar" class="buttonImageEdit" title="Editar" alt="Editar" />
					</form>
					<form action="Main.php" method="get">						
						<input type="hidden" name="do" value="importClientQuoteHistory" />
						<input type="hidden" name="id" value="|-$quote->getid()-|" />
						<input type="submit" name="submit_go_edit_quote" value="Ver Historial" class="buttonImageHistory" title="Ver Historial" alt="Ver Historial" />
					</form>
<!--					<form action="Main.php" method="post">
						<input type="hidden" name="do" value="importClientQuoteDelete" />
						<input type="hidden" name="id" value="|-$quote->getid()-|" />
						<input type="submit" name="submit_go_delete_quote" value="Borrar" onclick="return confirm('Seguro que desea eliminar la cotizacion?')" class="buttonImageDelete" />
					</form>
-->
				</td>
			</tr>
			|-/if-|
		|-/foreach-|				
		</tbody>
	</table>
