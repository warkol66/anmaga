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
	$('msgBox').hide();
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
	$('msgBox').hide();
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

	$('msgBox').hide();
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

	$('msgBox').hide();
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
	$('messageActivitySupplier').innerHTML = "guardando terminos...";	
	return true;

}

function importSendMessageX(form) {

 	var destination = 'commentTableBody';
 	var option = $('selectMessageTo');
 	if (option != null) {
 		if (option.options[option.selectedIndex].value == "supplier")
 		destination = destination + "Supplier";
 	}
	var fields = Form.serialize(form);
	var myAjax = new Ajax.Updater(
				{success: destination},
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

