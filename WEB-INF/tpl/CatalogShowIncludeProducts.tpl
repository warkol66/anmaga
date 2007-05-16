<div id="div_products">
	
	<div id="messageCart">
	</div>

	<table width="100%" class="tableTdBorders" id="tabla-products"> 
		<thead> 
			<tr> 
				<th class="thFillTitle">code</th> 
				<th class="thFillTitle">name</th> 
				<th class="thFillTitle">description</th> 
				<th class="thFillTitle">price</th> 
				<th class="thFillTitle"></th>
			</tr>
		</thead>
		<tbody>  |-foreach from=$productNodes item=productNode name=for_products-| |-assign var=product value=$productNode->getInfo()-|
		<tr>
			<td width="15%" nowrap class="tdSize1">|-$product->getcode()-|</td>
			<td width="25%" class="tdSize1">|-$productNode->getname()-|</td>
			<td width="50%" class="tdSize1">|-$product->getdescription()-|</td>
			<td width="10%" align="right" nowrap class="tdSize1">|-$product->getprice()|number_format:2:",":"."-|</td>
			<td>
				<form>
					<label for="quantity">Quantity</label>
					<input type="text" name="quantity" value="1" size="3" />
					<input type="hidden" name="productId" value="|-$product->getId()-|" />
					<input type="hidden" name="do" value="ordersAddItemToCartX" />
					<input type="button" value="Add to Cart" class="boton" onclick="javascript:ordersAddItemToCartX(this.form)" />
				</form>
			</td>
		</tr>
		|-foreachelse-|
		<tr>
			<td colspan="5">Sin Productos</td>
		</tr>
		|-/foreach-|
		<tr>
			<td colspan="5">|-include file="PaginateInclude.tpl"-|</td>
		</tr> 
		</tbody> 
	</table> 
</div>
