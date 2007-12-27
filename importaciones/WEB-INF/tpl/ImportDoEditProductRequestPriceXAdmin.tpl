<script language="JavaScript" type="text/javascript">

	var message = "Precio a Consumidor Asignado";
	$('msgBox').innerHTML = message;
	$('msgBox').show();
	$('productRequestStatus').innerHTML = '|- $productRequest->getStatus()-|';
	$('productRequestPriceClient').innerHTML = '|- $productRequest->getPriceClient() -|';
	$('adminActionsText').innerHTML = '<p>No hay acciones para realizar en este Estado</p>';

</script>
