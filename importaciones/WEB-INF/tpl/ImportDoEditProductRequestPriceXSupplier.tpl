<script language="JavaScript" type="text/javascript">
// <![CDATA[
	var message = "Precio Actualizado";
	$('msgBox').innerHTML = message;
	$('msgBox').show();
	$('productRequestStatus').innerHTML = "|-$productRequest->getStatus()-|";
	$('productRequestPriceSupplier').innerHTML = "|- $productRequest->getPriceSupplier()-|";
	|- if isset($statusChanged)-| $('supplierActionsText').innerHTML = '<p>No hay acciones para realizar en este Estado</p>';|-/if-|

// ]]>
</script>