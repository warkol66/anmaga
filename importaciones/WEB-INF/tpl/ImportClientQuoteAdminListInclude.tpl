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
		|-foreach from=$result item=quotation name=for_quotations-|
	|-if $smarty.foreach.for_quotations.iteration is odd by 3-|
			<tr valign="top">
				<td>|-$quotation->getId()-|</td>
				<td><img src="images/clear.gif" class="aqua|-*$smarty.foreach.for_quotations.iteration*-||-php-|echo rand(1,10);|-/php-|" /></td>
				<td>
					|-assign var=client value=$quotation->getAffiliate()-|
					|-$client->getName()-|
				</td>
				<td>|-$quotation->getCreatedAt()|change_timezone|date_format:"%d-%m-%Y"-|</td>
				<td>|-$quotation->getStatusNameAdmin()-|</td>
				<td>|-assign var=items value=$quotation->getClientQuotationItems()-|
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
						<input type="hidden" name="id" value="|-$quotation->getid()-|" />
						<input type="submit" name="submit_go_edit_quotation" value="Editar" class="buttonImageEdit" title="Editar" alt="Editar" />
					</form>
					<form action="Main.php" method="get">						
						<input type="hidden" name="do" value="importClientQuoteHistory" />
						<input type="hidden" name="id" value="|-$quotation->getid()-|" />
						<input type="submit" name="submit_go_edit_quotation" value="Ver Historial" class="buttonImageHistory" title="Ver Historial" alt="Ver Historial" />
					</form>
<!--					<form action="Main.php" method="post">
						<input type="hidden" name="do" value="importClientQuoteDelete" />
						<input type="hidden" name="id" value="|-$quotation->getid()-|" />
						<input type="submit" name="submit_go_delete_quotation" value="Borrar" onclick="return confirm('Seguro que desea eliminar la cotizacion?')" class="buttonImageDelete" />
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
		|-foreach from=$result item=quotation name=for_quotations-|
	|-if $smarty.foreach.for_quotations.iteration is div by 6-|
			<tr valign="top">
				<td>|-$quotation->getId()-|</td>
				<td><img src="images/clear.gif" class="aqua|-*$smarty.foreach.for_quotations.iteration*-||-php-|echo rand(1,10);|-/php-|" /></td>
				<td>
					|-assign var=client value=$quotation->getAffiliate()-|
					|-$client->getName()-|
				</td>
				<td>|-$quotation->getCreatedAt()|change_timezone|date_format:"%d-%m-%Y"-|</td>
				<td>|-$quotation->getStatusNameAdmin()-|</td>
				<td>|-assign var=items value=$quotation->getClientQuotationItems()-|
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
						<input type="hidden" name="id" value="|-$quotation->getid()-|" />
						<input type="submit" name="submit_go_edit_quotation" value="Editar" class="buttonImageEdit" title="Editar" alt="Editar" />
					</form>
					<form action="Main.php" method="get">						
						<input type="hidden" name="do" value="importClientQuoteHistory" />
						<input type="hidden" name="id" value="|-$quotation->getid()-|" />
						<input type="submit" name="submit_go_edit_quotation" value="Ver Historial" class="buttonImageHistory" title="Ver Historial" alt="Ver Historial" />
					</form>
<!--					<form action="Main.php" method="post">
						<input type="hidden" name="do" value="importClientQuoteDelete" />
						<input type="hidden" name="id" value="|-$quotation->getid()-|" />
						<input type="submit" name="submit_go_delete_quotation" value="Borrar" onclick="return confirm('Seguro que desea eliminar la cotizacion?')" class="buttonImageDelete" />
					</form>
-->
				</td>
			</tr>
			|-/if-|
		|-/foreach-|				
		</tbody>
	</table>
