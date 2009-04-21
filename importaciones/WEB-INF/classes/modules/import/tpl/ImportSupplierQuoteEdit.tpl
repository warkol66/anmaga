<h2>##import,1,Exportaciones##</h2>
<h1>##import,26,Informacion General de la cotización de proveedor##</h1>

<div id="div_messages">
	|-if $message eq "negociate"-|
		<div class="successMessage">##import,38,Se ha pedido la negociacion del item y se ha notificado al proveedor.##</div>
	|-/if-|
	
</div>

<div id="div_supplierQuotation">
	<p>
		##import,10,Fecha##: |-$supplierQuotation->getCreatedAt()|change_timezone|date_format:"%d-%m-%Y %R"-|
	</p>
	<p>
		##import,11,Estado##: |-$supplierQuotation->getStatusName()-|
	</p>
	<p>
		|-assign var=supplier value=$supplierQuotation->getSupplier()-|
		##import,6,Proveedor##: |-$supplier->getName()-|
	</p>
	<p>
		##import,27,Código de acceso del Proveedor##: |-$supplierQuotation->getSupplierAccessToken()-|
	</p>	
	<p>
		|-assign var=clientQuotation value=$supplierQuotation->getClientQuotation()-|
		##import,28,Solicitud de Cotización de Cliente Relacionada##: <a href="Main.php?do=importClientQuoteEdit&amp;id=|-$clientQuotation->getId()-|">|-$clientQuotation->getId()-|</a>
	</p>
</div>

<h1>##import,29,Productos a cotizar por el proveedor##</h1>

<div id="supplierQuotationItemsHolder">
		|-include file='ImportSupplierQuoteItemsAdminListInclude.tpl' supplierQuotation=$supplierQuotation-|
</div>