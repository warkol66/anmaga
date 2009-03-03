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
		$('productSearchMsgBox').innerHTML = 'agregando item ...';
	
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
		$('productSearchMsgBox').innerHTML = 'buscando...';

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