<div id="div_products">
	
	<div id="messageCart">
	</div>

	<table width="100%" class="tableTdBorders" id="tabla-products"> 
		<thead> 
			<tr> 
				<th class="thFillTitle">Código</th> 
				<th class="thFillTitle">Nombre</th> 
				<th class="thFillTitle">Descripción</th> 
				<th class="thFillTitle">Precio</th> 
				<th class="thFillTitle"></th>
			</tr>
		</thead>
		<tbody>  |-foreach from=$productNodes item=productNode name=for_products-| |-assign var=product value=$productNode->getInfo()-|
		<tr>
			<td width="15%" nowrap class="tdSize1">|-$product->getcode()-|</td>
			<td width="25%" class="tdSize1">|-$productNode->getname()-|</td>
			<td width="50%" class="tdSize1">|-$product->getdescription()-|</td>
			<td width="10%" nowrap class="tdSize1 right">|-$product->getprice()|number_format:2:",":"."-|</td>
			<td class="tdSize1">
				<form>
					<label for="quantity">Cantidad</label>
					<input type="text" name="quantity" value="1" size="2" />
					<input type="hidden" name="productId" value="|-$product->getId()-|" />
					<input type="hidden" name="do" value="ordersAddItemToCartX" />
					<input type="button" value="Agregar" class="smallButton" onclick="javascript:ordersAddItemToCartX(this.form)" />
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
