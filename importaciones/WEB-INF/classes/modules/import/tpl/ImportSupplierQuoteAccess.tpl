<h2>Pedido de Cotizacion</h2>
<h1>Edicion de Pedido de Cotizacion</h1>

<div id="div_messages">
	|-if $message eq "quoted"-|
	<div class="successMessage">Se ha guardado la cotizacion del item.</div>
	|-/if-|
	|-if $message eq "confirmed"-|
	<div class="successMessage">Se ha confirmado la cotizacion.</div>
	|-/if-|
	
</div>

<div id="div_supplierQuotation">
	<p>
		Fecha de Creacion: |-$supplierQuotation->getCreatedAt()-|
	</p>
	<p>
		<strong>
		Sr. Proveedor<br />
		Solicitamos al cotización de:
		</strong>
	</p>
</div>

<div id="supplierQuotationItemsHolder">
		|-include file='ImportSupplierQuoteItemsSupplierListInclude.tpl' token=$token supplierQuotation=$supplierQuotation-|
</div>

|-if not $supplierQuotation->isConfirmed() -|
	<div id="supplierQuotationConfirmation">
		<p>A continuzacion podra confirma la cotizacion. Tenga en cuenta que una vez confirmada, no podra hacerle modificaciones.</p>
		<form action="Main.php" method="post">
			<p><input type="hidden" name="token" value="|-$token-|" ></p>
			<p><input type="hidden" name="do" value="importSupplierQuoteConfirm" id="do"></p>
			<p><input type="submit" value="Confirmar Cotizacion" /></p>
		</form>
	</div>
|-/if-|