<h2>Edicion de Cotizacion</h2>
<h1>Informacion General de la cotizacion.</h1>

<div id="div_messages">
	|-if $message eq "supplier-quotation-created"-|<div class="successMessage">Cotizacion de Proveedor creada correctamente. Puedo consultarla accediendo a este <a href="Main.php?do=importSupplierQuoteEdit&amp;id=|-$supplierQuotation->getId()-|" >link</a></div>|-/if-|

</div>


<div id="div_clientQuotation">
	<p>Podra modificar la cotizacion mientra la misma este en estado New. Una vez que la misma haya sido confirmada podra generar los pedidos de cotizacion de productos para el proveedor.</p>
	<p>
		Fecha de Creacion: |-$clientQuotation->getCreatedAt()-|
	</p>
	<p>
		Estado: |-$clientQuotation->getStatusName()-|
	</p>
	|-if not $clientQuotation->isWaitingResponse()-|
	<p>

		<form action="Main.php" method="post">
			<input type="hidden" name="clientQuotationId" value="|-$clientQuotation->getId()-|" />
			<input type="hidden" name="do" value="importClientQuoteConfirm" />
			<input type="submit" value="Confirmar Cotizacion">
		</form>
	<p>
	|-/if-|
</div>

<h1>Productos de la cotizacion.</h1>

|-if not $clientQuotation->isWaitingResponse()-|
	<div id="clientQuotationItemAdder">
		|-include file='ImportClientQuoteAddItemInclude.tpl' clientQuotation=$clientQuotation affiliate=$affiliate-|
	</div>
|-/if-|

<div id="clientQuotationItemsHolder">
	|-if not $clientQuotation->isWaitingResponse()-|
		|-include file='ImportClientQuoteItemsAffiliateListInclude.tpl' clientQuotation=$clientQuotation-|
	|-else-|
		|-include file='ImportClientQuoteItemsAdminListInclude.tpl' clientQuotation=$clientQuotation-|
	|-/if-|
</div>