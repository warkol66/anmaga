<div id="div_order">
	<h2>Order</h2>
	
	|-if $message eq "deleted_ok"-|<span class="message_ok">Carrito Vaciado!</span>|-/if-|

	<div id="messageCart">
	</div>

	<table width="100%" class="tableTdBorders" id="tabla-products">
		<thead>
			<tr>
				<th class="thFillTitle">code</th>
				<th class="thFillTitle">name</th>
				<th class="thFillTitle">price</th>
				<th class="thFillTitle">quantity</th>
			</tr>
		</thead>
		<tbody>  |-foreach from=$orderItems item=item name=for_products-| |-assign var=product value=$item->getProduct()-| |-assign var=productNode value=$product->getNode()-|
		<tr id="product_|-$product->getId()-|">
			<td class="tdSize1">|-$product->getcode()-|</td>
			<td class="tdSize1">|-$productNode->getname()-|</td>
			<td class="tdSize1">|-$item->getprice()|number_format:2:",":"."-|</td>
			<td>
				<form>
					<input type="text" name="quantity" value="|-$item->getQuantity()-|" size="3" />
					<input type="hidden" name="productId" value="|-$product->getId()-|" />
					<input type="hidden" name="do" value="ordersChangeItemCartX" />
					<input type="button" value="Change" class="boton" onclick="javascript:ordersChangeItemCartX(this.form)" />
				</form>
				<form>
					<input type="hidden" name="productId" value="|-$product->getId()-|" />
					<input type="hidden" name="do" value="ordersRemoveItemCartX" />
					<input type="button" value="Remove" class="boton" onclick="javascript:ordersRemoveItemCartX(this.form)" />
				</form>
			</td>
		</tr>
		|-foreachelse-|
		<tr>
			<td colspan="5">Sin Productos</td>
		</tr>
		|-/foreach-|
		</tbody>
	</table> 
</div>

|- if $orderItems|@count gt 0-|
<form action="Main.php" method="post">
	<input type="hidden" name="do" value="ordersCartDoDelete" />
	<input type="submit" value="Empty Cart" class="boton" onclick="return confirm('Seguro que desea vaciar el carrito?')" />
</form>
<form action="Main.php" method="post">
	<input type="hidden" name="do" value="ordersDoSave" />
	<input type="hidden" name="name" id="name" value="" />
	<input type="submit" value="Save Order" class="boton" onclick="$('name').value = window.prompt('Nombre de la orden:','');" />
</form>
<form action="Main.php" method="post">
	<input type="hidden" name="do" value="ordersConfirm" />
	<input type="submit" value="Generate Order" class="boton" />
</form>
|-/if-|


