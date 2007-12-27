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

function importAssignSupplierToProductRequest(productRequestId) {

	var action = "Main.php";
	var pars = "do=importDoAssignSupplierX&productRequestId=" + productRequestId; 
	var myAjax = new Ajax.Updater(
				{success: 'adminActions'},
				url,
				{
					method: 'get',
					parameters: pars,
					evalScripts: true,
					insertion : Insertion.Bottom
				});
	
	return true;



}

function importConfirmProductRequest(productRequestId,confirm) {

	var action = "Main.php";
	var pars = "do=importUserConfirmationX&productRequestId=" + productRequestId + "&confirm=" + confirm; 
	var myAjax = new Ajax.Updater(
				{success: 'affiliateActions'},
				url,
				{
					method: 'get',
					parameters: pars,
					evalScripts: true,
					insertion : Insertion.Bottom
				});
	
	return true;



}

function importDoEditProductRequestPrice(form) {


	var fields = Form.serialize(form);
	var myAjax = new Ajax.Updater(
				{success: 'requestStatus'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true,
					insertion: Insertion.Bottom
				});
	
	return true;

}

function importDoAssignProductRequestTerms(form) {


	var fields = Form.serialize(form);
	var myAjax = new Ajax.Updater(
				{success: 'requestStatus'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true,
					insertion: Insertion.Bottom
				});
	
	return true;

}

function importSendMessageX(form) {


	var fields = Form.serialize(form);
	var myAjax = new Ajax.Updater(
				{success: 'commentTableBody'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true,
					insertion: Insertion.Bottom
				});
	
	form.reset();
	return true;


}

