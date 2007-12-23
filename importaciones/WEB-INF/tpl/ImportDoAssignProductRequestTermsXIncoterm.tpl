<script language="JavaScript" type="text/javascript">
// <![CDATA[
	var message = "Incoterm " |-if isset($statusChanged)-| + "y estado " |-/if-| + "Actualizado";
	$('msgBox').innerHTML = message;
	$('msgBox').show();
	$('productRequestIncoterm').innerHTML = "|-assign var="incoterm" value=$incotermPeer->get($productRequest->getIncotermId())-||- $incoterm->getName()-|";
	$('productRequestStatus').innerHTML = "|-$productRequest->getStatus()-|";
	|- if isset($statusChanged)-| $('supplierActionsText').innerHTML = '<p>No hay acciones para realizar en este Estado</p>';|-/if-|
// ]]>
</script>
