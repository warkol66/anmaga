<h2>Solicitud de Cotización</h2>
<h1>Edición de Pedido de Cotización</h1>

<div id="div_messages">
	|-if $message eq "quoted"-|
	<div class="successMessage">Se ha guardado la cotización del item.</div>
	|-/if-|
	|-if $message eq "confirmed"-|
	<div class="successMessage">Se ha confirmado la cotización.</div>
	|-/if-|
	
</div>

<div id="div_supplierQuotation">
	<p>
		Fecha de Creación: |-$supplierQuotation->getCreatedAt()|change_timezone|date_format:"%d-%m-%Y"-|
	</p>
	<p>
		<strong>
		Sr. Proveedor	</strong><br />
		Solicitamos al cotización de:
	</p>
</div>

<div id="supplierQuotationItemsHolder">
		|-include file='ImportSupplierQuoteItemsSupplierListInclude.tpl' token=$token supplierQuotation=$supplierQuotation-|
</div>



|-if not $supplierQuotation->isConfirmed()-|
		
	|-if $supplierQuotation->hasItemsOnFeedback() -|
		<div id="supplierQuotationConfirmation">
			<p>Antes de poder confirmar nuevamente la cotizacion, debera responder a todos los items que se encuentran esperando feedback.</p>
		</div>
	|-else-|
		<div id="supplierQuotationConfirmation">
			<p>A continuación podra confirma la cotización. Tenga en cuenta que una vez confirmada, no podra hacerle modificaciones.</p>
			<form action="Main.php" method="post">
				<p><input type="hidden" name="token" value="|-$token-|" ></p>
				<p><input type="hidden" name="do" value="importSupplierQuoteConfirm" id="do"></p>
				<p><input type="submit" value="Confirmar Cotización" /></p>
			</form>
		</div>
	|-/if-|
|-/if-|