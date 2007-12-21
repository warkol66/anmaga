<div id="msgBox" style="display : none;">
	
</div>
<h3>Detalle del Pedido de Producto</h3>
|-if isset($productRequest) and isset($productInfo)-|
<table class='tableTdBorders' cellpadding='5' cellspacing='1' width='100%'>
	<tr>
		<td class='cellboton' colspan='4'>Informacion del Pedido:
			<p>Cantidad: |-$productRequest->getQuantity()-|</p>
			<p >Status: <span id="productRequestStatus">|-$productRequest->getStatus()-|</span></p>
		</td>

	</tr>

</table>
|-if $loginAffiliateUser neq ""-|
<br />
<table id="affiliateActions" class='tableTdBorders' cellpadding='5' cellspacing='1' width='100%'>
	<tr>
		<td class='cellboton' colspan='4'>Acciones Usuario Afiliado:
			<span id="affiliateActionsText">	
			|- if $productRequest->isWaiting()-|
				<p><p><a class='delete' onClick="javascript:importConfirmProductRequest(|-$productRequest->getId()-|,true)">Aceptar Cotizacion</a></p></p>
				<p><p><a class='delete' onClick="javascript:importConfirmProductRequest(|-$productRequest->getId()-|,false)">Rechazar Cotizacion</a></p></p>
			|-else-|
				<p>No hay acciones para realizar en este Estado<p>					
			|- /if-|
			</span>
						

		</td>

	</tr>

</table>

|-/if-|

|-if ($loginUser neq "" and $loginUser->isAdmin())-|
<br />
<table id="adminActions" class='tableTdBorders' cellpadding='5' cellspacing='1' width='100%'>
	<tr>
		<td class='cellboton' colspan='4'>Acciones Usuario Admin:
			<span id="adminActionsText">			
			|- if $productRequest->isNew()-|
				<p><a class='delete' onClick="javascript:importAssignSupplierToProductRequest(|-$productRequest->getId()-|)">Asignar Product Request a Supplier</a></p>
			|- /if-|
		
			|- if $productRequest->isQuoted()-|
				<p>Puedo Asignar un Precio</p>
			|- /if-|

			|- if (not $productRequest->isNew()) and (not $productRequest->isQuoted())-|
				<p>No hay acciones para realizar en este Estado</p>			
			|- /if-|
			</span>

		</td>

	</tr>

</table>

|-/if-|


|-if ($loginUser neq "" and $loginUser->isSupplier())-|
<br />
<table class='tableTdBorders' cellpadding='5' cellspacing='1' width='100%'>
	<tr>
		<td class='cellboton' colspan='4'>Acciones Usuario Supplier:

			|- if $productRequest->isPending()-|
				<p>Puedo Asignar un Precio</p>
				<p>Puedo Asignar un Incoterm</p>
				<p>Puedo Asignar un Puerto</p>
			|- /if-|

		</td>

	</tr>

</table>

|-/if-|


<br />
<table class='tableTdBorders' cellpadding='5' cellspacing='1' width='100%'>
	<tr>
		<td class='cellboton' colspan='4'>Informacion del Producto: 
			<p>Nombre: |-$productInfo->getName()-|</p>

		</td>
		

	</tr>
	
</table>
|-/if-|

