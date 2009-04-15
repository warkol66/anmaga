<h2>Cotización de Proveedor</h2>
<h1>Negociacion de Condiciones de Item</h1>

<h3>Detalle de Cotizacion sobre el item</h3>

<div id="div_supplierQuotation">
	<p>
		|-assign var=product value=$supplierQuotationItem->getProduct()-|
		Producto: |-$product->getCode()-|
	</p>
	<p>
		Precio Cotizado: |-$supplierQuotationItem->getPrice()-|
	</p>
	<p>
		Dias de Entrega Cotizados: |-$supplierQuotationItem->getDelivery()-|
	</p>
	
</div>

<div id="supplierQuotationItemNegociate">
	<form action="Main.php" method="post" >
		<fieldset>
			<legend>Pedido de Negociacion</legend>		
			<p><strong>Comentarios:</strong></p>
			<p>Historial de comentarios:</p>
			<p>|-include file="ImportSupplierQuotationItemCommentsInclude.tpl" supplierQuotationItem=$supplierQuotationItem-|</p>
			<p></p>
			<p>A continuacion podra indicar un comentario en el historial de esta cotizacion respecto a las razones por la que pide negociacion sobre el item</p>
			<p>
				<label>Comentario Pedido de Negociacion</label>
				<textarea name="comments" cols="60" rows="8" wrap="virtual">|-$supplierQuotationItem->getSupplierComments()-|</textarea>
			</p>
			<p>
				<input type="hidden" name="supplierQuotationItemId" value="|-$supplierQuotationItem->getId()-|" />
				<input type="hidden" name="do" value="importSupplierQuoteItemsDoNegociate" />
				<input type="submit" value="Pedir Negociacion" />
				<input type="button" name="Cancelar" value="Cancelar" onClick='javascript:history.go(-1)' />
			</p>
		</fieldset>
	</form>
</div>