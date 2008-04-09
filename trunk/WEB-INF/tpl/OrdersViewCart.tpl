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
				<th class="thFillTitle">Código</th>
				<th class="thFillTitle">Nombre</th>
				<th class="thFillTitle">Precio</th>
				<th class="thFillTitle">Cantidad</th>
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
			<td colspan="5">Sin Productos</td>
		</tr>
		|-/foreach-|
		</tbody>
	</table> 
</div>

|- if $orderItems|@count gt 0-|
<form action="Main.php" method="post">
	<input type="hidden" name="do" value="ordersCartDoDelete" />
	<input type="submit" value="Vaciar Carrito" class="boton" onclick="return confirm('Seguro que desea vaciar el carrito?')" />
</form>
<form action="Main.php" method="post">
	<input type="hidden" name="do" value="ordersDoSave" />
	<input type="hidden" name="name" id="name" value="" />
	<input type="submit" value="Guardar pedido" class="boton" onclick="$('name').value = window.prompt('Nombre de la orden:','');" />
</form>
<form action="Main.php" method="post">
	<input type="hidden" name="do" value="ordersConfirm" />
	<input type="submit" value="Generar orden" class="boton" />
</form>
|-/if-|

