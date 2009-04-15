<h2>Cotización de Proveedor</h2>
<h1>Informacion General de la cotización de proveedor</h1>

<div id="div_messages">
	|-if $message eq "negociate"-|
		<div class="successMessage">Se ha pedido la negociacion del item y se ha notificado al proveedor.</div>
	|-/if-|
	
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
		Codigo de acceso del Proveedor: |-$supplierQuotation->getSupplierAccessToken()-|
	</p>	
	<p>
		|-assign var=clientQuotation value=$supplierQuotation->getClientQuotation()-|
		Solicitud de Cotización de Cliente Relacionada: <a href="Main.php?do=importClientQuoteEdit&amp;id=|-$clientQuotation->getId()-|">|-$clientQuotation->getId()-|</a>
	</p>
</div>

<h1>Productos a cotizar por el proveedor</h1>

<div id="supplierQuotationItemsHolder">
		|-include file='ImportSupplierQuoteItemsAdminListInclude.tpl' supplierQuotation=$supplierQuotation-|
</div>