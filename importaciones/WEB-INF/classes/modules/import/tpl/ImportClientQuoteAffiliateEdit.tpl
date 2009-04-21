<h2>Solicitud de Cotización</h2>
<h1>Informacion General de la solicitud</h1>

<div id="messages">
	|-if $message eq "created"-|
		<div class="successMessage">Cotización creada correctamente.</div>
	|-/if-|
	|-if $message eq "accepted"-|
		<div class="successMessage">Se aceptado la cotizacion.|-if isset($notProcessed)-| No se han procesado |-$notProcessed-| items por falta de cantidad.|-/if-|</div>
	|-/if-|	
</div>

<div id="div_clientQuotation">
	<p>Podra modificar la cotización mientras la misma este en estado "New". Una vez que haya confirmado la misma, será procesada por el personal de la empresa y no podra hacer modificaciones.</p>
	<p>
		Fecha de Creación: |-$clientQuotation->getCreatedAt()-|
	</p>
	<p>
		Estado: |-$clientQuotation->getStatusNameClient()-|
	</p>

</div>

<h1>Productos de la solicitud</h1>

|-if $clientQuotation->isNewStatus()-|
		|-include file='ImportClientQuoteAddItemInclude.tpl' clientQuotation=$clientQuotation affiliate=$affiliate-|
|-/if-|

<div id="clientQuotationItemsHolder">
	|-include file='ImportClientQuoteItemsAffiliateListInclude.tpl' clientQuotation=$clientQuotation-|
</div>

<div id="clientQuotationReject">
	|-if $clientQuotation->isQuoted()-|
	<p>
		<form action="Main.php" method="post">
			<input type="hidden" name="clientQuotationId" value="|-$clientQuotation->getId()-|" />
			<input type="hidden" name="do" value="importClientQuotationReject" />
			<input type="submit" value="Rechazar Cotización" />
		</form>
	<p>
	|-/if-|
</div>

|-if $clientQuotation->isNewStatus()-|
<div id="ClientQuotationConfirm">

	<form action="Main.php" method="post">
		<input type="hidden" name="clientQuotationId" value="|-$clientQuotation->getId()-|" />
		<input type="hidden" name="do" value="importClientQuoteConfirm" />
		<input type="submit" value="Confirmar Solicitud de Cotización">
	</form>
</div>
|-/if-|

<div id="clientQuotationCancel"=>
	<input type="button" name="cancel" value="Cancelar" onClick="javascript:window.history.go(-1)">
</div>