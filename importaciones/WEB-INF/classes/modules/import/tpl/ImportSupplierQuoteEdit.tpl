<h2>Cotización de Proveedor</h2>
<h1>Informacion General de la cotización de proveedor</h1>

<div id="div_messages">
</div>

<div id="div_supplierQuotation">
	<p>
		Fecha de Creación: |-$supplierQuotation->getCreatedAt()|change_timezone|date_format:"%d-%m-%Y %R"-|
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
		Solicitud de Cotización de Cliente Relacionada: <a href="Main.php?do=importClientQuoteEdit&amp;id=|-$clientQuotation->getId()-|">|-$clientQuotation->getId()-|</a>
	</p>
</div>

<h1>Productos a cotizar por el proveedor</h1>

<div id="supplierQuotationItemsHolder">
		|-include file='ImportSupplierQuoteItemsListInclude.tpl' supplierQuotation=$supplierQuotation-|
</div>