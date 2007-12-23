<div id="msgBox" style="display : none;">
	
</div>
<h3>Detalle del Pedido de Producto</h3>
|-if isset($productRequest) and isset($productInfo)-|
<table id="requestStatus" class='tableTdBorders' cellpadding='5' cellspacing='1' width='100%'>
	<tr>
		<td class='cellboton' colspan='4'>Informacion del Pedido:
			<p>Nombre del Producto: |-$productInfo->getName()-|<br />
			   Cantidad Pedida: |-$productRequest->getQuantity()-|<br />
			   Status: <span id="productRequestStatus">|-$productRequest->getStatus()-|</span><br />
			   |-if (($loginUser neq "") and ($loginUser->isAdmin() or $loginUser->isSupplier()))-|
			   Incoterm: <span id="productRequestIncoterm">|- assign var="incoterm" value=$incotermPeer->get($productRequest->getIncotermId())-||-if not empty($incoterm)-||-$incoterm->getName()-||-/if-|</span><br />
			   Port: <span id="productRequestPort">|-assign var="port" value=$portPeer->get($productRequest->getPortId())-||-if not empty($port)-||-$port->getName()-||-/if-|</span><br />
			   Precio Supplier: <span id="productRequestPriceSupplier">|-$productRequest->getPriceSupplier()-|</span><br />
			   |-/if-|
			   |-if ($loginAffiliateUser neq "" or ($loginUser neq "" and $loginUser->isAdmin()))-|
			   Precio: <span id="productRequestPriceClient">|-$productRequest->getPriceClient()-|</span><br />
			   |-/if-|
			</p>
		</td>

	</tr>

</table>
<br />
<input type=button value="Volver al Detalle de la Orden de Pedido" onclick="history.go(-1)"> <br />

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
				<p><form method="post">
					<label>Asignar precio unitario:</label><br/>
					<input type="text" name="priceClient" value="|-$productRequest->getClientPrice()-|" id="priceClient" />
					<input type="hidden" name="do" value="importDoEditProductRequestPriceX"  />
					<input type="hidden" name="productRequestId" value="|-$productRequest->getId()-|" />					
					<input type="button" name="Asignar Precio" onClick="javascript:importDoEditProductRequestPrice(this.form)" value="Asignar Precio"/>
					
				</form></p>
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
				<span id="supplierActionsText">				
				<p>Podra modificar las opciones hasta establecer el valor de precio, incoterm y puerto. Una vez establecidos los tres, la orden pasara a Quoted</p>
				<p><form method="post">
					<label>Asignar precio unitario:</label><br />
					<input type="text" name="priceSupplier" value="$productRequest->getSupplierPrice()" id="priceClient" />
					<input type="hidden" name="do" value="importDoEditProductRequestPriceX"  />
					<input type="hidden" name="productRequestId" value="|-$productRequest->getId()-|" />
					<input type="button" name="Asignar Precio" onClick="javascript:importDoEditProductRequestPrice(this.form)" value="Asignar Precio" />
				</form></p>
				<p>Asignar un Incoterm:
					<form method="post">
					<select name="incotermId">
					|- foreach from=$incoterms item=incoterm-|	
								<option name="incotermId" value="|-$incoterm->getId()-|" |-if ($productRequest->getIncotermId() == $incoterm->getId())-|selected="selected"|-/if-|>|-$incoterm->getName()-|</option>
	|-/foreach-|
</select>

						<input type="hidden" name="do" value="importDoAssignProductRequestTermsX"  />
		<input type="hidden" name="productRequestId" value="|-$productRequest->getId()-|" />
						<input type="button" value="Asignar Incoterm" onClick="javascript:importDoAssignProductRequestTerms(this.form)"/>
					</form>				
				</p>
				<p>Asignar un Puerto:
					<form method="post">
					<select name="portId">
					|- foreach from=$ports item=port-|	
								<option name="portId" value="|-$port->getId()-|" |-if ($productRequest->getPortId() == $port->getId())-|selected="selected"|-/if-|>|-$port->getName()-|</option>
					|-/foreach-|
</select>
						<input type="hidden" name="do" value="importDoAssignProductRequestTermsX"  />
		<input type="hidden" name="productRequestId" value="|-$productRequest->getId()-|" />
						<input type="button" value="Asignar Puerto" onClick="javascript:importDoAssignProductRequestTerms(this.form)"/>
					</form>				


				</p>
				</span>
				<br />
			|- /if-|

			|- if not $productRequest->isPending()-|
				<p>No hay acciones para realizar en este Estado</p>			
			|- /if-|


		</td>

	</tr>

</table>

|-/if-|


|-/if-|
