<script language="JavaScript" type="text/javascript">
// <![CDATA[
	var message = "Puerto " |-if isset($statusChanged)-| + "y Estado " |-/if-| + "Actualizado";
	$('msgBox').innerHTML = message;
	$('msgBox').show();
	$('productRequestPort').innerHTML = "|- assign var="port" value=$portPeer->get($productRequest->getPortId())-||-$port->getName()-|";
	$('productRequestStatus').innerHTML = "|-$productRequest->getStatus()-|";
	|- if isset($statusChanged)-| $('supplierActionsText').innerHTML = '<p>No hay acciones para realizar en este Estado</p>';|-/if-|
// ]]>
</script>
