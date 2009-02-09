<form action="Main.php" method="post" >
	<fieldset>
		<legend>Agregar elementos a la cotizacion</legend>
		<p>
			<label>Producto</label>
			<select name="clientQuotationItem[productId]">
				|-foreach from=$products item=product name=for_product-|
					<option value="|-$product->getId()-|">|-$product->getName()-|</option>
				|-/foreach-|
			</select>
		</p>
		<p>
			<label>Cantidad: </label>
			<input type="text" name="clientQuotationItem[quantity]" value="" id="clientQuotationItem[quantity]" />
			<input type="hidden" name="do" value="importClientQuoteAddItemX" id="do">
			<input type="hidden" name="clientQuotationItem[clientQuotationId]" value="|-$clientQuotation->getId()-|" id="clientQuotationItem[clientQuotationId]"/>
		</p>
		<p><input type="button" value="Agregar item" onClick="javascript:importAddItemToClientQuotationX(this.form)"> <span id="clientQuotationAdderMsgBox"></span></p> 
	</fieldset>
</form>