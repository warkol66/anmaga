//agrega un producto a una cotidzacion de cliente
function importAddItemToClientQuotationX(form) {
	
	var fields = Form.serialize(form);
	var myAjax = new Ajax.Updater(
				{success: 'clientQuotationItemList'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true,
					insertion: Insertion.Bottom
				});
	if ($('productSearchMsgBox'))
		$('productSearchMsgBox').innerHTML = '<span class="inProgress">... agregando producto ...</span>';
	
	return true;
}

function importSearchProductsX(form) {
	
	var fields = Form.serialize(form);
	var myAjax = new Ajax.Updater(
				{success: 'productAdder'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true,
				});

	if ($('productSearchMsgBox'))
		$('productSearchMsgBox').innerHTML = '<span class="inProgress">... buscando ...</span>';

	return true;
	
}

function importShowDiv(id) {
	
	if ($(id)) {
		$(id).show();
	}
	
}

function importHideDiv(id) {
	
	if ($(id)) {
		$(id).hide();
	}
	
}

function importUpdateItemsBySupplier(supplierId,clientQuotationId) {
	if (supplierId == '') {
		return false;
	}
	
	var fields = 'do=importClientQuoteItemsSupplierX&supplierId=' + supplierId + '&clientQuotationId=' + clientQuotationId;
	var myAjax = new Ajax.Updater(
				{success: 'assignmentMsgBox'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true,
				});

	if ($('assignmentMsgBox'))
		$('assignmentMsgBox').innerHTML = '<span class="inProgress">... procesando, cargando valores por default de incoterm y puerto para el proveedor ...</span>';

	return true;	

}

function importSelectAllByName(name) {
	var elements = document.getElementsByName(name);
	
	for (var i=0; i < elements.length; i++) {
		elements[i].checked = 'checked';
	};
	
	return true;
}

function importSelectAllByTagName(name) {
	var elements = document.getElementsByTagName(name);
	
	for (var i=0; i < elements.length; i++) {
		elements[i].checked = 'checked';
	};
	
	return true;
}

function importDeleteItemFromClientQuotationX(form) {
	
	var fields = Form.serialize(form);
	var myAjax = new Ajax.Updater(
				{success: 'productSearchMsgBox'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true,

				});
	if ($('productSearchMsgBox'))
		$('productSearchMsgBox').innerHTML = '<span class="inProgress">... eliminando producto ...</span>';
	
	return true;
}

function importGetSupplierPurchaseOrdersX(select) {
	
	var supplierId = select.value;
	var query = 'do=importSupplierOrderGetX&id=' + supplierId;
	
	var myAjax = new Ajax.Updater(
				{success: 'bankTransfer[supplierPurchaseOrderId]'},
				url,
				{
					method: 'post',
					postBody: query,
					evalScripts: true,

				});
	if ($('msgBox'))
		$('msgBox').innerHTML = '<span class="inProgress">... cargando ordenes ...</span>';
	
	return true;
	
}