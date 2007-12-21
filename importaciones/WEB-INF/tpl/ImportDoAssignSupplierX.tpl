<script type="text/javascript" language="javascript" charset="utf-8">
// <![CDATA[
	var message = "Se ha realizado la asignacion al Supplier y se ha modificado el estado de la Product Request";
	$('msgBox').innerHTML = message;
	$('msgBox').show();
	$('productRequestStatus').innerHTML = '|- $productRequest->getStatus()-|';
	$('adminActionsText').innerHTML = '<p>No hay acciones para realizar en este Estado</p>';
// ]]>
</script>
