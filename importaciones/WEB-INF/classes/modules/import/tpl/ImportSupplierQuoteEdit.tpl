<h2>Edicion de Pedido de Cotizacion de Proveedor</h2>
<h1>Informacion General de la cotizacion de proveedor.</h1>

<div id="div_messages">
</div>

<div id="div_supplierQuotation">
	<p>
		Fecha de Creacion: |-$supplierQuotation->getCreatedAt()-|
	</p>
	<p>
		Estado: |-$supplierQuotation->getStatusName()-|
	</p>
	<p>
		|-assign var=supplier value=$supplierQuotation->getSupplier()-|
		Proveedor Asignado: |-$supplier->getName()-|
	</p>
	<p>
		|-assign var=clientQuotation value=$supplierQuotation->getClientQuotation()-|
		Cotizacion de Cliente Relacionada: <a href="Main.php?do=importClientQuoteEdit&amp;id=|-$clientQuotation->getId()-|">|-$clientQuotation->getId()-|</a>
	</p>
</div>

<h1>Productos a cotizar por el proveedor.</h1>

<div id="supplierQuotationItemsHolder">
		|-include file='ImportSupplierQuoteItemsListInclude.tpl' supplierQuotation=$supplierQuotation-|
</div>