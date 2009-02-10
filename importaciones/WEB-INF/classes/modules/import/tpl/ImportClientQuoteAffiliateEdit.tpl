<h2>Edicion de Cotizacion</h2>
<h1>Informacion General de la cotizacion.</h1>

<div id="div_clientQuotation">
	<p>Podra modificar la cotizacion mientra la misma este en estado New. Una vez que haya confirmado la misma, la misma sera procesada por el personal de la empresa y no podra hacer modificaciones. En esos casos le recomendamos abrir una nueva cotizacion.</p>
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
	|-include file='ImportClientQuoteItemsAffiliateListInclude.tpl' clientQuotation=$clientQuotation-|
</div>

