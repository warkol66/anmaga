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
				
	$('clientQuotationAdderMsgBox').innerHTML = 'agregando item...';
	
	return true;
}