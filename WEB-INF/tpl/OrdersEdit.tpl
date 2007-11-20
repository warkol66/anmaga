﻿<script language="JavaScript" type="text/javascript" src="scripts/order-edit-functions.js"></script>


<table border='0' cellpadding='0' cellspacing='0' width='100%'> 
	<tr> 
		<td class='title'>Pedidos</td> 
	</tr> 
	<tr> 
		<td class='underlineTitle'><img src="images/clear.gif" height='3' width='1'></td> 
	</tr> 
	<tr> 
		<td>&nbsp;</td> 
	</tr> 
	<tr> 
		<td class='backgroundTitle'>Administraci&oacute;n de Pedidos </td> 
	</tr> 
	<tr> 
		<td>&nbsp;</td> 
	</tr> 
	<tr> 
		<td class="tdSize2">Administrar pedido: <strong>|-$order->getId()-|</strong></td> 
	</tr> 
	<tr> 
		<td>&nbsp;</td> 
	</tr> 
</table>
<div id="div_order"> 
	<h2>Order</h2> 
	
	<h3>Edicion de Opciones Generales</h3>
	<form action="Main.php" method="post"> 
		<strong>Numero:</strong> <input type="text" name="number" value="|-$order->getNumber()-|" /><br />
		<strong>Creada:</strong> 
			<input name="created" type="text" value="|-$order->getDateCreated()-|" size="10">&nbsp;&nbsp;
			<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('created', false, 'ymd', '-');" title="Seleccione la fecha">&nbsp;&nbsp;		
		<br /> 
		<strong>Mayorista:</strong> |-assign var=affiliate value=$order->getAffiliate()-||-if $affiliate-||-$affiliate->getName()-||-/if-|<br> 
		|-assign var=currentBranch value=$order->getBranch()-|
		<strong>Sucursal:</strong> <select name="branch">
   
		|-assign var=currentBranch value=$order->getBranch()-|
		|- foreach from=$branches item=aBranch -|
				<option value="|-$aBranch->getId()-|" |-if $currentBranch and ($currentBranch->getId() eq $aBranch->getId()) -||-assign var=selected value="0"-|selected="selected"|-/if-| >|-$aBranch->getName()-|</option>
		|-/foreach-|
				<option value="" |-if not $selected eq "0" -|selected="selected"|-/if-|>Sin Asignar</option>
		</select><br>
		<strong>Usuario:</strong> |-assign var=user value=$order->getAffiliateUser()-||-if $user-||-$user->getUsername()-||-/if-|<br> 
		<input type="submit" value="Modificar" class="button" /> 
		<input type="hidden" "name="do" value="ordersDoEdit" /> 
		<input type="hidden" name="orderId" value="|-$order->getId()-|" /> 

	</form>
	<h3>Edicion de Estado</h3>
	<p> <strong>Estado Actual:</strong> <span id="state_actual">|-$order->getStateName()-|</span> </p> 
	<table width="100%" border="0" cellpadding="5" cellspacing="0"> 
		<caption>
 		Cambios de Estados y Observaciones 
		</caption> 
		<thead> 
			<tr> 
				<th width="15%" class="thFillTitle">Fecha</th> 
				<th width="20%" class="thFillTitle">Afiliado</th> 
				<th width="15%" class="thFillTitle">Usuario</th> 
				<th width="10%" class="thFillTitle">Estado</th> 
				<th width="40%" class="thFillTitle">Observación</th> 
			</tr> 
		</thead> 
		<tbody id="stateChanges">  |-foreach from=$order->getOrderStateChanges() item=stateChange-|
		<tr> 
			<td class="tdSize1 center top">|-$stateChange->getCreated()-|</td> 
			<td class="tdSize1 top">|-assign var=affiliate value=$stateChange->getAffiliate()-||-if $affiliate-||-$affiliate->getName()-||-/if-|</td> 
			<td class="tdSize1 top">|-assign var=user value=$stateChange->getUser()-||-if $user-||-$user->getUsername()-||-/if-|</td> 
			<td class="tdSize1 top">|-$stateChange->getStateName()-|</td> 
			<td class="tdSize1 top">|-$stateChange->getComment()-|</td> 
		</tr> 
		|-/foreach-|
		</tbody> 
  </table> 
	</p> 
	<form action="Main.php" method="post"> 
		<label for="state">Nuevo Estado:</label> 
		<select name="state" id="state"> 
			<option value="0"|-if $order->getState() eq 0-| selected="selected"|-/if-|>|-$stateTexts.new-|</option> 
			<option value="1"|-if $order->getState() eq 1-| selected="selected"|-/if-|>|-$stateTexts.accepted-|</option> 
			<option value="2"|-if $order->getState() eq 2-| selected="selected"|-/if-|>|-$stateTexts.pendingApproval-|</option> 
			<option value="3"|-if $order->getState() eq 3-| selected="selected"|-/if-|>|-$stateTexts.inProcess-|</option> 
			<option value="4"|-if $order->getState() eq 4-| selected="selected"|-/if-|>|-$stateTexts.completed-|</option> 
			<option value="5"|-if $order->getState() eq 5-| selected="selected"|-/if-|>|-$stateTexts.cancelled-|</option> 
		</select> <br>

		<label for="comment">Observación:</label> 
		<textarea name="comment" cols="60" rows="4" wrap="VIRTUAL" id="comment"></textarea> 
		<input type="button" value="Agregar" onclick="javascript:ordersStateDoChangeX(this.form)" class="button" /> 
		<input type="hidden" name="do" value="ordersStateDoChangeX" /> 
		<input type="hidden" name="orderId" value="|-$order->getId()-|" /> 
		<span id="messageState"></span> 
	</form> 
	</p>
	
	<h3>Edicion del Detalle de la Orden</h3>
	
	<table width="100%" border="0" cellpadding="5" cellspacing="0" class="tableTdBorders" > 
		<thead> 
			<tr> 
				<th width="10%" class="thFillTitle">C&oacute;digo</th> 
				<th width="40%" class="thFillTitle">Producto</th> 
				<th width="15%" class="thFillTitle">Precio</th> 
				<th width="10%" class="thFillTitle">Cantidad</th> 
				<th width="15%" class="thFillTitle">Total</th>
				<th width="10%" class="thFillTitle">Actions</th>
			</tr> 
		</thead> 
		<tbody id="productsTable">  |-foreach from=$order->getOrderItems() item=item name=for_products-|
		|-assign var=product value=$item->getProduct()-|
		|-assign var=productNode value=$product->getNode()-|
		<tr id="row|-$item->getId()-|"> 
			<td nowrap class="tdSize1 top center">|-$product->getcode()-|</td> 
			<td class="tdSize1 top">|-$productNode->getname()-|</td> 
			<td class="tdSize1 bottom right">|-$item->getprice()|number_format:2:",":"."-|</td>
			<td class="tdSize1 bottom right"><span id="quantity|-$item->getId()-|">|-$item->getQuantity()-|</span></td> 
			<script type="text/javascript">
				var editor|-$item->getId()-| = new Ajax.InPlaceEditor("quantity|-$item->getId()-|", 'Main.php?do=ordersItemsDoEditX&itemId=|-$item->getId()-|&orderId=|-$order->getId()-|', { clickToEditText : 'Editar Cantidad' });
			</script>
			<td class="tdSize1 bottom right">|-math equation="x * y" x=$item->getPrice() y=$item->getQuantity() assign=totalItem-|<span id="totalItem|-$item->getId()-|">|-$totalItem|number_format:2:",":"."-|</span></td> 
			<td class="tdSize1 bottom right">
			    <input id="editButton|-$item->getId()-|"type="button" onclick="editor|-$item->getId()-|.enterEditMode();" value="Editar" class="boton" />
				<form method="post" action="Main.php" id="formRemove|-$item->getId()-|">
					<input type="hidden" name="itemId" value="|-$item->getId()-|" />
					<input type="hidden" name="orderId" value="|-$order->getId()-|" />
					<input type="hidden" name="do" value="ordersItemsDoDeleteX" />
					<input type="button" value="Remove" class="boton" onclick="ordersItemsDoDeleteX('|-$item->getId()-|')" />
				</form>
				<span  id="messageRemove|-$item->getId()-|"></span>

			</td>
		</tr> 
		|-foreachelse-|
		<tr> 
			<td colspan="5">Sin Productos</td> 
		</tr> 
		|-/foreach-|
		|-if $order->getOrderItems()|@count gt 0-|
		<tr id="product-total"> 
			<td colspan="5" class="tdTitle right">Total:&nbsp;&nbsp;<span id="product_total_value">|-$order->getTotal()|number_format:2:",":"."-|</span></td> 
		</tr> 
		|-/if-|
		</tbody> 
  </table>
  	<div id="test" class="test">
	    <a title="product-add-link" id="product-add-link" onclick="showProductAdd()" >Agregar un Producto</a>
	</div>
	<span id="messageAdd"></span>
  	<div id="product-add-box" style="display: none;">
		<form method="post" action="Main.php">
			<label for="product">Producto: </label>
			<select name="productId">
			|- foreach from=$products item=product -|
				|-assign var=productNode value=$product->getNode()-| 
					<option value="|-$product->getId()-|">|- $product->getCode()-|, |- $productNode->getName()-|</option>
			|-/foreach-|
			</select><br />
			<label>Cantidad: </label><input type="text" id="productQuantity" name="productQuantity" value="1" /><br />
			
			<input type="button" onclick="javascript:ordersItemsDoAddX(this.form)" value="Agregar" class="boton" /> 
			<input type="hidden" name="do" value="ordersItemsDoAddX" /> 
			<input type="hidden" name="orderId" value="|-$order->getId()-|" /> 		
			<input type="button" onclick="cancelProductAdd()" value="Cancelar" class="boton" />
		</form>
	</div>

</div>
|-if $all eq "0" and $order->getOrderItems()|@count gt 0-|
<form action="Main.php" method="post"> 
	<input type="hidden" name="do" value="ordersDoAddToCart" /> 
	<input type="hidden" name="id" value="|-$order->getId()-|" /> 
	<input type="submit" value="Add To Cart" class="button" /> 
</form>
|-/if-|  
