<div id="div_order">
	<h2>Confirm Order</h2>

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
		<tr>
			<td class="tdSize1">|-$product->getcode()-|</td>
			<td class="tdSize1">|-$productNode->getname()-|</td>
			<td class="tdSize1">|-$item->getprice()|number_format:2:",":"."-|</td>
			<td class="tdSize1">|-$item->getQuantity()-|</td>
		</tr>
		|-foreachelse-|
		<tr>
			<td colspan="5">Sin Productos</td>
		</tr>
		|-/foreach-|
		</tbody>
	</table> 
</div>

<form action="Main.php" method="post">
	<input type="hidden" name="do" value="ordersViewCart" />
	<input type="submit" value="Edit Order" class="boton" />
</form>

|- if $orderItems|@count gt 0-|
<form action="Main.php" method="post">
	<input type="hidden" name="do" value="ordersDoGenerate" />
	<input type="submit" value="Confirm Order" class="boton" />
</form>
|-/if-|
