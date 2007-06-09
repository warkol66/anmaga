<table border='0' cellpadding='0' cellspacing='0' width='100%'>
	<tr>
		<td class='title'>Pedidos</td>
	</tr>
	<tr>
		<td class='underlineTitle'><img src="images/clear.gif" height='3' width='1'></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class='backgroundTitle'>Administraci&oacute;n de Pedidos </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Administrar pedido: <strong>|-$order->getId()-|</strong></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>
<div id="div_order">
	<h2>Order</h2>
<strong>Creada:</strong> |-$order->getCreated()-|<br>
	<strong>Mayorista:</strong> |-assign var=affiliate value=$order->getAffiliate()-||-if $affiliate-||-$affiliate->getName()-||-/if-|<br>
	<strong>Sucursal:</strong> |-assign var=branch value=$order->getBranch()-||-if $branch-||-$branch->getName()-||-/if-|<br>
	<strong>Usuario:</strong> |-assign var=user value=$order->getUserByAffiliate()-||-if $user-||-$user->getUsername()-||-/if-|<br>
	<p>
		<strong>Estado Actual:</strong> <span id="state_actual">|-$order->getState()-|</span>
	</p>
	<p>
	<table>
			<caption>Cambios de Estados y Observaciones</caption>
			<thead>
				<tr>
					<th>Fecha</th><th>Afiliado</th><th>Usuario</th><th>Estado</th><th>Observación</th>
				</tr>
			</thead>
			<tbody id="stateChanges">
				|-foreach from=$order->getOrderStateChanges() item=stateChange-|				
				<tr>
					<td>|-$stateChange->getCreated()-|</td>
					<td>|-assign var=affiliate value=$stateChange->getAffiliate()-||-if $affiliate-||-$affiliate->getName()-||-/if-|</td>
					<td>|-assign var=user value=$stateChange->getUser()-||-if $user-||-$user->getUsername()-||-/if-|</td>
					<td>|-$stateChange->getState()-|</td>
					<td>|-$stateChange->getComment()-|</td>
				</tr>
				|-/foreach-|
			</tbody>
	</table>
	</p>
		<form action="Main.php" method="post">
			<label for="state">Nuevo Estado:</label>
			<select name="state" id="state">
				<option value="0"|-if $order->getState() eq 0-| selected="selected"|-/if-|>Emitida</option>
				<option value="1"|-if $order->getState() eq 1-| selected="selected"|-/if-|>Aceptada</option>
				<option value="2"|-if $order->getState() eq 2-| selected="selected"|-/if-|>Pendiente Aprobación</option>
				<option value="3"|-if $order->getState() eq 3-| selected="selected"|-/if-|>En Proceso</option>
				<option value="4"|-if $order->getState() eq 4-| selected="selected"|-/if-|>Completa</option>
				<option value="5"|-if $order->getState() eq 5-| selected="selected"|-/if-|>Cancelada</option>
			</select>
			<label for="comment">Observación:</label>
			<textarea name="comment" id="comment"></textarea>	
			<input type="button" value="Agregar" onclick="javascript:ordersStateDoChangeX(this.form)" class="boton" />
			<input type="hidden" name="do" value="ordersStateDoChangeX" />
			<input type="hidden" name="orderId" value="|-$order->getId()-|" />
			<span id="messageState"></span>
		</form>
	</p>

	<table width="100%" class="tableTdBorders" id="tabla-products">
		<thead>
			<tr>
				<th class="thFillTitle">code</th>
				<th class="thFillTitle">name</th>
				<th class="thFillTitle">price</th>
				<th class="thFillTitle">quantity</th>
				<th class="thFillTitle">Total</th>
			</tr>
		</thead>
		<tbody>  |-foreach from=$order->getOrderItems() item=item name=for_products-| |-assign var=product value=$item->getProduct()-| |-assign var=productNode value=$product->getNode()-|
		<tr>
			<td class="tdSize1">|-$product->getcode()-|</td>
			<td class="tdSize1">|-$productNode->getname()-|</td>
			<td align="right" class="tdSize1">|-$item->getprice()|number_format:2:",":"."-|</td>
			<td align="right" class="tdSize1">|-$item->getQuantity()|number_format:2:",":"."-|</td>
			<td align="right" class="tdSize1">|-math equation="x * y" x=$item->getPrice() y=$item->getQuantity() assign=totalItem-||-$totalItem|number_format:2:",":"."-|</td>
		</tr>
		|-foreachelse-|
		<tr>
			<td colspan="5">Sin Productos</td>
		</tr>
		|-/foreach-|
		</tbody>
	</table> 
</div>

	<p><strong>Total:</strong> |-$order->getTotal()|number_format:2:",":"."-|</p>


|- if $order->getOrderItems()|@count gt 0-|
<form action="Main.php" method="post">
	<input type="hidden" name="do" value="ordersDoAddToCart" />
	<input type="hidden" name="id" value="|-$order->getId()-|" />
	<input type="submit" value="Add To Cart" class="boton" />
</form>
|-/if-|




