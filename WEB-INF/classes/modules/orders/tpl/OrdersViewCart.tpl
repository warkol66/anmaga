	<h2>Pedidos</h2>
	<h1>Carrito de compras</h1>
	<p>A continuación se muestra el contenido del carrito de compras.</p>
<div id="div_order">
	|-if $message eq "deleted_ok"-|<span class="message_ok">Carrito Vaciado!</span>|-/if-|
	<div id="messageCart">
	</div>
	<table width="100%" cellpadding="4" cellspacing="0" class="tableTdBorders" id="tabla-products">
		<thead>
			<tr>
				<th width="10%" nowrap class="thFillTitle">Código</th>
				<th width="45%" class="thFillTitle">Nombre</th>
				<th width="10%" class="thFillTitle">Precio Unitario</th> 
				<th width="15%" class="thFillTitle">Unidad de Venta</th>
				<th width="15%" class="thFillTitle">Precio por Empaque </th>
				<th width="5%" class="thFillTitle">Cantidad</th>
			</tr>
		</thead>
		|-assign var=total value=0-|
		<tbody>  |-foreach from=$orderItems item=item name=for_products-| |-assign var=product value=$item->getProduct()-| |-assign var=productNode value=$product->getNode()-|
		<tr id="product_|-$product->getId()-|">
			<td class="tdSize1">|-$product->getcode()-|</td>
			<td class="tdSize1">|-$productNode->getname()-|</td>
			<td nowrap class="tdSize1 right">|-$product->getprice()|system_numeric_format-|</td>
			<td align="center" nowrap class="tdSize1">|-$product->getSalesUnit()-|</td>
			<td nowrap class="tdSize1 right">
				|-math equation="x * y" x=$product->getprice() y=$product->getSalesUnit() assign=totalItem-||-$totalItem|system_numeric_format-|
				|-math equation="x + (y*z)" x=$total y=$totalItem z=$item->getQuantity() assign=total-|
			</td>
			<td nowrap>
				<form>
					<input type="text" name="quantity" value="|-$item->getQuantity()-|" size="3" />
					<input type="hidden" name="productId" value="|-$product->getId()-|" />
					<input type="hidden" name="do" value="ordersChangeItemCartX" />
					<input type="button" value="Cambiar" class="buttonImageEdit" onclick="javascript:ordersChangeItemCartX(this.form)" />
				</form>
				<form>
					<input type="hidden" name="productId" value="|-$product->getId()-|" />
					<input type="hidden" name="do" value="ordersRemoveItemCartX" />
					<input type="button" value="Eliminar" class="buttonImageDelete" onclick="javascript:ordersRemoveItemCartX(this.form)" />
				</form>
			</td>
		</tr>
		|-foreachelse-|
		<tr>
			<td colspan="7">Sin Productos</td>
		</tr>
		|-/foreach-|
		|-if $orderItems|@count neq 0-|<tr>
			<td colspan="4" align="right">Total</td>
			<td colspan="3" align="center" id="orderTotal">|-$total|system_numeric_format-|</td>
		</tr>
		|-/if-|
		</tbody>
	</table> 
</div>

|- if $orderItems|@count gt 0-|
<form action="Main.php" method="post">
	<input type="hidden" name="do" value="ordersCartDoDelete" />
	<input type="submit" value="Vaciar Carrito" class="boton" onclick="return confirm('Seguro que desea vaciar el carrito?')" />
</form>
<br>
<form action="Main.php" method="post">
	|-if $affiliates|@count gt 0-|
	<select name="affiliateId">
		<option value="">Seleccionar Afiliado&nbsp;&nbsp;&nbsp;</option>
		|-foreach from=$affiliates item=affiliate-|
		<option value="|-$affiliate->getId()-|">|-$affiliate->getName()-|</option>
		|-/foreach-|
	</select>
	|-/if-|
	<input type="hidden" name="do" value="ordersConfirm" />
	<input type="submit" value="Generar orden" class="boton" />
</form>
<br>
<form action="Main.php" method="post">
	|-if $affiliates|@count gt 0-|
	<select name="affiliateId">
		<option value="">Seleccionar Afiliado&nbsp;&nbsp;&nbsp;</option>
		|-foreach from=$affiliates item=affiliate-|
		<option value="|-$affiliate->getId()-|">|-$affiliate->getName()-|</option>
		|-/foreach-|
	</select>
	|-/if-|
	<input type="hidden" name="do" value="ordersDoSave" />
	<input type="hidden" name="name" id="name" value="" />
	<input type="submit" value="Guardar plantilla de pedido" class="boton" onclick="$('name').value = window.prompt('Nombre de la orden:','');" />
</form>
|-/if-|


