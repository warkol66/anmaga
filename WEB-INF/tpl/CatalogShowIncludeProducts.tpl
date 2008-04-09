<div id="div_products">
	
	<div id="messageCart">
	</div>

	<table width="100%" cellpadding="4" cellspacing="0" class="tableTdBorders" id="tabla-products"> 
		<thead> 
			<tr> 
				<th width="5%" class="thFillTitle">Código</th> 
				<th width="35%" class="thFillTitle">Nombre</th> 
				<th width="50%" class="thFillTitle">Descripción</th> 
				<th width="5%" class="thFillTitle">Precio</th> 
				<th width="5%" class="thFillTitle">&nbsp;</th>
			</tr>
		</thead>
		<tbody>  |-foreach from=$productNodes item=productNode name=for_products-| |-assign var=product value=$productNode->getInfo()-|
		<tr>
			<td nowrap class="tdSize1 right">|-$product->getcode()-|</td>
			<td class="tdSize1">|-$productNode->getname()-|</td>
			<td class="tdSize1">|-$product->getdescription()-|</td>
			<td nowrap class="tdSize1 right">|-if $product->getprice() neq 0-||-$product->getprice()|number_format:2:",":"."-||-/if-|</td>
			<td class="tdSize1">|-if $product->getprice() neq 0-|
				<form>
					<label for="quantity">Cantidad</label>
					<input type="text" name="quantity" value="0" size="5" />
					<input type="hidden" name="productId" value="|-$product->getId()-|" />
					<input type="hidden" name="do" value="ordersAddItemToCartX" />
					<input type="button" value="Agregar" class="smallButton" onclick="javascript:ordersAddItemToCartX(this.form)" />
				</form>|-/if-|
			</td>
		</tr>
		|-foreachelse-|
		<tr>
			<td colspan="5">Sin Productos</td>
		</tr>
		|-/foreach-|
		<tr>
			<td colspan="5" class="pages">|-include file="PaginateInclude.tpl"-|</td>
		</tr> 
		</tbody> 
	</table> 
</div>
