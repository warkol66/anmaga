<h2>Solicitud de Cotización</h2>
<h1>Fijado de Precio a Cliente</h1>

|-assign var=supplierQuotationItem value=$clientQuotationItem->getSupplierQuotationItem()-|

<div id="div_clientQuotationItemLastQuotations">
	
	|-include file='ImportClientQuoteRelatedQuotationsInclude.tpl' lastClientQuotationItemsRelated=$lastClientQuotationItemsRelated-|
	
</div>

<div id="div_supplierQuotationReport">
	|-include file='ImportSupplierQuoteItemReportInclude.tpl' supplierQuotationItem=$supplierQuotationItem-|
</div>

<div id="div_clientQuotationPrice">
	<h3>Precio</h3>
	<form action="Main.php" method="post">
		<p><label for="precio_cotizado_proveedor">Precio Cotizado por Proveedor</strong> |-$supplierQuotationItem->getPrice()-|</p>
		<p>
			<label for="precio">Precio a Cliente</label>
			<input type="text" name="clientQuotationItem[price]" value="|-$clientQuotationItem->getPrice()-|" />
			<input type="hidden" name="clientQuotationItem[id]" value="|-$clientQuotationItem->getId()-|" />
		</p>
		<p>
			<input type="hidden" name="do" value="importClientQuoteItemDoSetPrice" />
			<input type="submit" value="Fijar Precio">
		</p>
	</form>
</div>
