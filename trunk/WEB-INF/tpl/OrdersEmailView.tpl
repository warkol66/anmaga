	<h1>Pedido: |-$order->getId()-|</h1>
	
<div id="div_order"> 

<table width="100%"  border="0" cellspacing="0" cellpadding="5">
	<tr>
		<td><strong>Pedido: |-$order->getId()-|</strong></td>
		<td><strong>Creada: |-$order->getDateCreated()-|</strong></td>
		<td><strong>Número Pedido del Cliente: |-$order->getNumber()-|</strong></td>
	</tr>
	<tr>
		<td><strong>Mayorista: |-assign var=affiliate value=$order->getAffiliate()-||-if $affiliate-||-$affiliate->getName()-||-/if-|</strong></td>
		<td><strong>Usuario: |-assign var=user value=$order->getAffiliateUser()-||-if $user-||-$user->getUsername()-||-/if-|</strong></td>
		<td><strong>Sucursal: |-assign var=branch value=$order->getBranch()-||-if $branch-||-$branch->getName()-||-/if-|</strong></td>
	</tr>
	<tr>
		<td><strong>Estado Actual: <span id="state_actual">|-$order->getStateName()-|</span></strong></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table> 
<hr />
	<table width="100%" border="0" cellpadding="5" cellspacing="0" class="tableTdBorders" id="tabla-products"> 
		<caption>
 		Detalle del Pedido 
		</caption> 
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
			<td class="tdSize1 bottom right">|-$item->getprice()|system_numeric_format-|</td> 
			<td class="tdSize1 bottom right">|-$item->getQuantity()|system_numeric_format-|</td> 
			<td class="tdSize1 bottom right">|-math equation="x * y" x=$item->getPrice() y=$item->getQuantity() assign=totalItem-||-$totalItem|system_numeric_format-|</td> 
		</tr> 
		|-foreachelse-|
		<tr> 
			<td colspan="5">Sin Productos</td> 
		</tr> 
		|-/foreach-|
		|-if $order->getOrderItems()|@count gt 0-|
		<tr> 
			<td colspan="5" class="tdTitle right">Total:&nbsp;&nbsp;|-$order->getTotal()|system_numeric_format-|</td> 
		</tr> 
		|-/if-|
		</tbody> 
  </table> 
</div>

