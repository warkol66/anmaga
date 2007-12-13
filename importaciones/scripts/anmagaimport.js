//agrega un producto
function importAddProductToRequestX(form) {
	
	var quantity = $('quantity');
	if ((quantity == "")) {
		alert('Quantity must be a valid value');
		return false;
	}
	

	var fields = Form.serialize(form);
	var myAjax = new Ajax.Updater(
				{success: 'productsTable'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true,
					insertion: Insertion.Bottom
				});
	
	return true;
}

function importDeleteProductFromRequest(productReqId) {

	var action = "Main.php";
	var pars = "do=importDoDeleteProductFromRequestX&productReqId=" + productReqId; 
	var myAjax = new Ajax.Updater(
				{success: 'productsTable'},
				url,
				{
					method: 'get',
					parameters: pars,
					evalScripts: true,
					insertion : Insertion.Bottom
				});
	
	return true;
}

