	<h2>Pedidos</h2>
	<h1>Confirmar Pedido</h1>
<div id="div_order">

	<div id="messageCart">
	</div>

	<table width="100%" class="tableTdBorders" id="tabla-products">
		<thead>
			<tr>
				<th class="thFillTitle">Código</th>
				<th class="thFillTitle">Nombre</th>
				<th class="thFillTitle">Precio</th>
				<th class="thFillTitle">Cantidad</th>
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
	<input type="submit" value="Editar Pedido" class="boton" />
</form>

<br />

|- if $orderItems|@count gt 0-|
<form action="Main.php" method="post">
	<label for="number">Número:</label>
	<input type="text" name="number" />
	|-if $branchs|@count gt 0-|
	<select name="branchId">
		<option value="">Seleccionar sucursal</option>
		|-foreach from=$branchs item=branch-|
		<option value="|-$branch->getId()-|">|-$branch->getName()-| (|-$branch->getNumber()-|)</option>
		|-/foreach-|
	</select>
	|-/if-|
	<input type="hidden" name="do" value="ordersDoGenerate" />
	<input type="submit" value="Confirmar pedido" class="boton" />
</form>
|-/if-|
