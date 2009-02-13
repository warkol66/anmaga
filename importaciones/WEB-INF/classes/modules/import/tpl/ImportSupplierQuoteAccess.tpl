<h2>Pedido de Cotizacion</h2>
<h1>Edicion de Pedido de Cotizacion</h1>

<div id="div_messages">
	|-if $message eq "quoted"-|
	<div class="successMessage">Se ha guardado la cotizacion del item.</div>
	|-/if-|
	
</div>

<div id="div_supplierQuotation">
	<p>
		Fecha de Creacion: |-$supplierQuotation->getCreatedAt()-|
	</p>
	<p>
		<strong>
		Sr. Proveedor<br />
		Solicitamos al cotización de:
		</strong>
	</p>
</div>

<div id="supplierQuotationItemsHolder">
		|-include file='ImportSupplierQuoteItemsSupplierListInclude.tpl' token=$token supplierQuotation=$supplierQuotation-|
</div>