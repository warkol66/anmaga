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
		$('assignmentMsgBox').innerHTML = '<span class="inProgress">... procesando ...</span>';

	return true;	

}