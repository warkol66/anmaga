<h2>Exportaciones</h2>
<h1>Informacion General de la cotización</h1>

<div id="div_messages">
	|-if $message eq "created"-|
		<div class="successMessage">Cotización creada correctamente.</div>
	|-/if-|
	|-if $message eq "supplier-quotation-created"-|
		<div class="successMessage">Cotización de Proveedor creada correctamente. Puede consultarla accediendo a este <a href="Main.php?do=importSupplierQuoteEdit&amp;id=|-$supplierQuotation->getId()-|" >link</a></div>
	|-/if-|
	|-if $message eq "price-set"-|
		<div class="successMessage">Se ha fijado un nuevo precio para el cliente.</div>
	|-/if-|
	|-if $message eq "accepted"-|
		<div class="successMessage">Se aceptado la cotizacion.</div>
	|-/if-|
</div>


<div id="div_clientQuotation">
	<p>Podra modificar la cotización mientra la misma este en estado "New". Una vez que la misma haya sido confirmada podrá generar las solicitudes de cotización de productos para el proveedor.</p>
	<p>
		Fecha de Creación: |-$clientQuotation->getCreatedAt()|change_timezone|date_format:"%d-%m-%Y"-|
	</p>
	<p>
		Estado: |-$clientQuotation->getStatusNameAdmin()-|
	</p>
</div>


|-if $clientQuotation->isNewStatus()-|
	|-include file='ImportClientQuoteAddItemInclude.tpl' clientQuotation=$clientQuotation affiliate=$affiliate-|
|-/if-|


<div id="clientQuotationItemsHolder">
	|-if $clientQuotation->isNewStatus()-|
<h1>Detalle de cotización a provedor</h1>
		|-include file='ImportClientQuoteItemsAffiliateListInclude.tpl' clientQuotation=$clientQuotation-|
	|-else-|
<h1>Solicitud de cotización a provedor</h1>
		|-include file='ImportClientQuoteItemsAdminListInclude.tpl' clientQuotation=$clientQuotation-|
	|-/if-|
</div>

<div id="clientQuotationConfirmation">
	|-if $clientQuotation->isNewStatus()-|
	<p>

		<form action="Main.php" method="post">
			<input type="hidden" name="clientQuotationId" value="|-$clientQuotation->getId()-|" />
			<input type="hidden" name="do" value="importClientQuoteConfirm" />
			<input type="submit" value="Confirmar Cotización">
		</form>
	<p>
	|-/if-|
</div>

<div id="clientQuotationAdminConfirmation">
	|-if $clientQuotation->isPartiallyQuoted()-|
	<p>

		<form action="Main.php" method="post">
			<input type="hidden" name="clientQuotationId" value="|-$clientQuotation->getId()-|" />
			<input type="hidden" name="do" value="importClientQuoteAdminConfirm" />
			<input type="submit" value="Cerrar Cotización (confirma precios ingresados)">
		</form>
	<p>
	|-/if-|
</div>