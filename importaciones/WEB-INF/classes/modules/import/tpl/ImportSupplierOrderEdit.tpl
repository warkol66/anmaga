<h2>Exportaciones</h2>
<h1>Información General del Pedido</h1>

<div id="div_general_information">
	<p>
		Fecha de Creación: |-$supplierPurchaseOrder->getCreatedAt()|change_timezone|date_format:"%d-%m-%Y"-|
	</p>
	<p>
		Estado: |-$supplierPurchaseOrder->getStatusName()-|
	</p>
</div>

<div id="supplierQuotationItemsHolder">
		|-include file='ImportSupplierOrdertemsListInclude.tpl' supplierPurchaseOrder=$supplierPurchaseOrder-|
</div>