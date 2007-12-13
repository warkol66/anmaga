<div id="msgBox" style="display : none;">
	
</div>

<table class='tableTdBorders' cellpadding='5' cellspacing='1' width='100%'>
	<caption>
		Orden de Pedido. 
	</caption>
	<tr>
		<td class='cellboton' colspan='4'>Seleccione un producto a agregar a su Pedido: <br /><br />
			<form id="adder" action='Main.php' method='post'>
				<input type="hidden" name="do" value="importDoAddProductToRequestX" />
				<label>Producto:</label>
				<select name="productId" id="product_name">
					<option value="" selected="selected">Seleccionar Producto</option>
					|-foreach from=$products item=product name=for_products-|
						<option value="|-$product->getId()-|">|-$product->getName()-|</option>
					|-/foreach-|
				</select><br />
				<label>Cantidad:</label>
				<input type="text" name="quantity" value="" id="quantity" />
				<input id="addRequestId"type="hidden" name="requestId" value="|-if isset($request) -||-$request->getId()-||-/if-|" id="requestId"/> 
			</form>
			<input type='button' value='Agregar' class='button' onClick="javascript:importAddProductToRequestX($('adder'))" />
		</td>
	</tr>
</table>

<table class='tableTdBorders' cellpadding='5' cellspacing='1' width='100%'>
	<thead>
		<th width="70%" nowrap class="thFillTitle">Nombre de Producto</th>
		<th width="20%" class="thFillTitle">Cantidad</th>
		<th width="10%" class="thFillTitle">&nbsp;</th>
	</head>
	<tbody id="productsTable">
	|-foreach from=$productRequests item=productReq name=for_requestProducts-|
		|-assign var="product" value=$productPeer->get($productReq->getProductId())-|
	<tr id="productRequest_|-$productReq->getId()-|">	
		<td class="size2"><div class='titulo2'></div>|-$product->getName()-|</td>
		<td class="size2">|-$productReq->getQuantity()-|</td>
		<td class='tdSize1 center cellTextOptions' nowrap> [ <a class='delete' onClick="javascript:importDeleteProductFromRequest(|-$productReq->getId()-|)">##115,Eliminar##</a> ]

		</td>
	</tr>
	|-/foreach-|
	</tbody>

</table>

