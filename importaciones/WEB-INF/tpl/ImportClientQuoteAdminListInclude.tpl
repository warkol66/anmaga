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
			<tr>
				<td>|-$quotation->getId()-|</td>
				<td><img src="images/clear.gif" class="aqua|-*$smarty.foreach.for_quotations.iteration*-||-php-|echo rand(1,10);|-/php-|" /></td>
				<td>
					|-assign var=client value=$quotation->getAffiliate()-|
					|-$client->getName()-|
				</td>
				<td>|-$quotation->getCreatedAt()|change_timezone|date_format:"%d-%m-%Y"-|</td>
				<td>|-$quotation->getStatusNameAdmin()-|</td>
				<td>|-assign var=products value=''-|
					|-assign var=items value=$quotation->getClientQuotationItems()-|
					|-if $items|@count eq 0-|
						|-assign var=products value='No hay productos en la solicitud'-|
					|-else-|
					|-foreach from=$items item=item name=for_quotations_item-|
						|-assign var=product value=$item->getProduct()-|
						|-assign var=product value=$product->getName()-|
						|-assign var=products value=$products$product<br/>-|
					|-/foreach-|
					|-/if-|
 				Ver detalle <a href="#" |-popup  sticky=true fgcolor="#ffffff" bgcolor="#ffffff" closecolor="#cdcdcd" closetext='Cerrar' closetitle='Cerrar' capcolor='#ffffff' bgcolor='#006699' width=350 caption="Detalle de Productos" trigger="onMouseOver" text="$products"-|  title="Ver Productos" alt="Ver Productos"><img src="images/clear.png" class="linkImageInfo"></a>
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
			<tr>
				<td>|-$quotation->getId()-|</td>
				<td><img src="images/clear.gif" class="aqua|-*$smarty.foreach.for_quotations.iteration*-||-php-|echo rand(1,10);|-/php-|" /></td>
				<td>
					|-assign var=client value=$quotation->getAffiliate()-|
					|-$client->getName()-|
				</td>
				<td>|-$quotation->getCreatedAt()|change_timezone|date_format:"%d-%m-%Y"-|</td>
				<td>|-$quotation->getStatusNameAdmin()-|</td>
				<td>|-assign var=products value=''-|
					|-assign var=items value=$quotation->getClientQuotationItems()-|
					|-if $items|@count eq 0-|
						|-assign var=products value='No hay productos en la solicitud'-|
					|-else-|
					|-foreach from=$items item=item name=for_quotations_item-|
						|-assign var=product value=$item->getProduct()-|
						|-assign var=product value=$product->getName()-|
						|-assign var=products value=$products$product<br/>-|
					|-/foreach-|
					|-/if-|
 				Ver detalle <a href="#" |-popup  sticky=true fgcolor="#ffffff" bgcolor="#ffffff" closecolor="#cdcdcd" closetext='Cerrar' closetitle='Cerrar' capcolor='#ffffff' bgcolor='#006699' width=350 caption="Detalle de Productos" trigger="onMouseOver" text="$products"-|  title="Ver Productos" alt="Ver Productos"><img src="images/clear.png" class="linkImageInfo"></a>
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
