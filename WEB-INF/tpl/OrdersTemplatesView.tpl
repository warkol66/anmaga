<div id="div_order">
	<h2>Order</h2>

	<p><strong>Name:</strong> |-$orderTemplate->getName()-|</p>
	<p><strong>Created:</strong> |-$orderTemplate->getCreated()-|</p>
	<p><strong>Affiliate:</strong> |-assign var=affiliate value=$orderTemplate->getAffiliate()-||-if $affiliate-||-$affiliate->getName()-||-/if-|</p>
	<p><strong>Branch:</strong> |-assign var=branch value=$orderTemplate->getBranch()-||-if $branch-||-$branch->getName()-||-/if-|</p>
	<p><strong>User:</strong> |-assign var=user value=$orderTemplate->getAffiliateUser()-||-if $user-||-$user->getUsername()-||-/if-|</p>


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
		<tbody>  |-foreach from=$orderTemplate->getOrderTemplateItems() item=item name=for_products-| |-assign var=product value=$item->getProduct()-| |-assign var=productNode value=$product->getNode()-|
		<tr>
			<td class="tdSize1">|-$product->getcode()-|</td>
			<td class="tdSize1">|-$productNode->getname()-|</td>
			<td class="tdSize1">|-$item->getprice()|number_format:2:",":"."-|</td>
			<td class="tdSize1">|-$item->getQuantity()-|</td>
			<td class="tdSize1">|-math equation="x * y" x=$item->getPrice() y=$item->getQuantity()-|</td>
		</tr>
		|-foreachelse-|
		<tr>
			<td colspan="5">Sin Productos</td>
		</tr>
		|-/foreach-|
		</tbody>
	</table> 
</div>

	<p><strong>Total:</strong> |-$orderTemplate->getTotal()-|</p>

|- if $orderTemplate->getOrderTemplateItems()|@count gt 0-|
<form action="Main.php" method="post">
	<input type="hidden" name="do" value="ordersTemplatesDoAddToCart" />
	<input type="hidden" name="id" value="|-$orderTemplate->getId()-|" />
	<input type="submit" value="Add To Cart" class="boton" />
</form>
|-/if-|


