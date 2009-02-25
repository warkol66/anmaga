<h2>Solicitud de Cotización</h2>
<h1>Fijar Precio a Cliente</h1>
|-assign var=supplierQuotationItem value=$clientQuotationItem->getSupplierQuotationItem()-|
<fieldset>
<legend>Determinación de precio al cliente</legend>
<div id="div_clientQuotationItemLastQuotations">
	|-include file='ImportClientQuoteRelatedQuotationsInclude.tpl' lastClientQuotationItemsRelated=$lastClientQuotationItemsRelated-|
</div>
<div id="div_supplierQuotationReport">
	|-include file='ImportSupplierQuoteItemReportInclude.tpl' supplierQuotationItem=$supplierQuotationItem-|
</div>
<div id="div_clientQuotationPrice">
	<h3>Precio</h3>
	<form action="Main.php" method="post">
		<p><label for="precio_cotizado_proveedor">Precio Cotizado por Proveedor</label> 			
			<input name="supplierQuotationItemPrice" type="text" class="readOnly"  size="6" value="|-$supplierQuotationItem->getPrice()|number_format:2:",":"."-|" readonly="readonly" />
		</p>
		<p>
			<label for="precio">Precio a Cliente</label>
			<input name="clientQuotationItem[price]" type="text" value="|-$clientQuotationItem->getPrice()-|" size="8" />
			<input type="hidden" name="clientQuotationItem[id]" value="|-$clientQuotationItem->getId()-|" />
		</p>
		<p>
			<input type="hidden" name="do" value="importClientQuoteItemDoSetPrice" />
			<input type="submit" value="Fijar Precio">
		</p>
	</form>
</div>
</fieldset>
