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
		<td class="tdSize2">Administrar pedido: <strong>|-$order->getId()-|</strong></td> 
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
	<p> <strong>Estado Actual:</strong> <span id="state_actual">|-$order->getStateName()-|</span> </p> 
	<p>  
	<table width="100%" border="0" cellpadding="5" cellspacing="0"> 
		<caption>
 		Cambios de Estados y Observaciones 
		</caption> 
		<thead> 
			<tr> 
				<th width="15%" class="thFillTitle">Fecha</th> 
				<th width="20%" class="thFillTitle">Afiliado</th> 
				<th width="15%" class="thFillTitle">Usuario</th> 
				<th width="10%" class="thFillTitle">Estado</th> 
				<th width="40%" class="thFillTitle">Observación</th> 
			</tr> 
		</thead> 
		<tbody id="stateChanges">  |-foreach from=$order->getOrderStateChanges() item=stateChange-|
		<tr> 
			<td class="tdSize1 center top">|-$stateChange->getCreated()-|</td> 
			<td class="tdSize1 top">|-assign var=affiliate value=$stateChange->getAffiliate()-||-if $affiliate-||-$affiliate->getName()-||-/if-|</td> 
			<td class="tdSize1 top">|-assign var=user value=$stateChange->getUser()-||-if $user-||-$user->getUsername()-||-/if-|</td> 
			<td class="tdSize1 top">|-$stateChange->getStateName()-|</td> 
			<td class="tdSize1 top">|-$stateChange->getComment()-|</td> 
		</tr> 
		|-/foreach-|
		</tbody> 
  </table> 
	</p> 
	<form action="Main.php" method="post"> 
		<label for="state">Nuevo Estado:</label> 
		<select name="state" id="state"> 
			<option value="0"|-if $order->getState() eq 0-| selected="selected"|-/if-|>|-$stateTexts.new-|</option> 
			<option value="1"|-if $order->getState() eq 1-| selected="selected"|-/if-|>|-$stateTexts.accepted-|</option> 
			<option value="2"|-if $order->getState() eq 2-| selected="selected"|-/if-|>|-$stateTexts.pendingApproval-|</option> 
			<option value="3"|-if $order->getState() eq 3-| selected="selected"|-/if-|>|-$stateTexts.inProcess-|</option> 
			<option value="4"|-if $order->getState() eq 4-| selected="selected"|-/if-|>|-$stateTexts.completed-|</option> 
			<option value="5"|-if $order->getState() eq 5-| selected="selected"|-/if-|>|-$stateTexts.cancelled-|</option> 
		</select> <br>

		<label for="comment">Observación:</label> 
		<textarea name="comment" cols="60" rows="4" wrap="VIRTUAL" id="comment"></textarea> 
		<input type="button" value="Agregar" onclick="javascript:ordersStateDoChangeX(this.form)" class="button" /> 
		<input type="hidden" name="do" value="ordersStateDoChangeX" /> 
		<input type="hidden" name="orderId" value="|-$order->getId()-|" /> 
		<span id="messageState"></span> 
	</form> 
	</p> 
	<table width="100%" border="0" cellpadding="5" cellspacing="0" class="tableTdBorders" id="tabla-products"> 
		<thead> 
			<tr> 
				<th width="10%" class="thFillTitle">C&oacute;digo</th> 
				<th width="50%" class="thFillTitle">Producto</th> 
				<th width="15%" class="thFillTitle">Precio</th> 
				<th width="10%" class="thFillTitle">Cantidad</th> 
				<th width="15%" class="thFillTitle">Total</th> 
			</tr> 
		</thead> 
		<tbody>  |-foreach from=$order->getOrderItems() item=item name=for_products-|
		|-assign var=product value=$item->getProduct()-|
		|-assign var=productNode value=$product->getNode()-|
		<tr> 
			<td nowrap class="tdSize1 top center">|-$product->getcode()-|</td> 
			<td class="tdSize1 top">|-$productNode->getname()-|</td> 
			<td class="tdSize1 bottom right">|-$item->getprice()|number_format:2:",":"."-|</td> 
			<td class="tdSize1 bottom right">|-$item->getQuantity()|number_format:2:",":"."-|</td> 
			<td class="tdSize1 bottom right">|-math equation="x * y" x=$item->getPrice() y=$item->getQuantity() assign=totalItem-||-$totalItem|number_format:2:",":"."-|</td> 
		</tr> 
		|-foreachelse-|
		<tr> 
			<td colspan="5">Sin Productos</td> 
		</tr> 
		|-/foreach-|
		|-if $order->getOrderItems()|@count gt 0-|
		<tr> 
			<td colspan="5" class="tdTitle right">Total:&nbsp;&nbsp;|-$order->getTotal()|number_format:2:",":"."-|</td> 
		</tr> 
		|-/if-|
		</tbody> 
  </table> 
</div>
|- if $order->getOrderItems()|@count gt 0-|
<form action="Main.php" method="post"> 
	<input type="hidden" name="do" value="ordersDoAddToCart" /> 
	<input type="hidden" name="id" value="|-$order->getId()-|" /> 
	<input type="submit" value="Add To Cart" class="button" /> 
</form>
|-/if-| 