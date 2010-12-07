<h2>Exportaciones</h2>
<h1>Información de Nacionalización</h1>

<div id="div_shipment">
	<form name="form_edit_shipment" id="form_edit_shipment" action="Main.php" method="post">
		|-if $message eq "error"-|
			<div class="failureMessage">Ha ocurrido un error al intentar guardar la información de nacionalización.</div>
		|-/if-|
		<p>|-if $action eq 'edit'-|Modifique los datos de nacionalización y haga click en "Aceptar" para guardar el cambio|-else-|Ingrese los datos de nacionalización y haga click en "Aceptar"|-/if-|.
		</p>
		<fieldset title="Formulario de edición de datos de nacionalización">
		<legend>Nacionalizacion</legend>
			|-assign var=shipment value=$shipmentRelease->getShipment()-|
			|-assign var=supplierPurchaseOrder value=$shipment->getSupplierPurchaseOrder()-|
			<p>
				<label for="bl_numer">Número de BL</label>
				<span id="bl_numer" title="Número de BL" >|-$shipment->getBlNumber()-|</span>
			</p>
			
			|-foreach from=$supplierPurchaseOrder->getSupplierPurchaseOrderItems() item=item-|
				|-assign var=product value=$item->getProduct()-|
				|-assign var=port value=$item->getPort()-|
				<div id="item_|-$item->getId()-|" class="item">
					<p>
						<label for="product">Producto</label>
						<span id="product" title="Producto" >|-$product->getName()-|</span>
						<a href="#" onClick="$$('#item_|-$item->getId()-| > div.itemInfo')[0].toggle(); return false;">Ver Detalle</a>
					</p>
					<div class="itemInfo" style="display: none;">
						<p>
							<label for="weight">Peso</label>
							<span id="weight" title="Peso" >|-$item->getUnitGrossWeigth()-|</span>
						</p>
						<p>
							<label for="volume">Volumen</label>
							<span id="volume" title="Volumen" >|-$item->getVolume()-|</span>
						</p>	
					</div>
				</div>
			|-/foreach-|
			
			<p>
				<label for="supplier_purchase_order">Factura</label>
				<span id="supplier_purchase_order" title="Factura" >|-$supplierPurchaseOrder->getId()-|</span>
			</p>
			
			<p>
				<label for="estimatedArrivalDate">Fecha estimada de llegada del container a puerto</label>
				<span id="estimatedArrivalDate" title="Fecha estimada de llegada del container a puerto">|-$shipment->getEstimatedArrivalDate()|date_format:"%d-%m-%Y"-|</span>
			</p>
			<p>
				<label for="arrivalDate">Fecha de llegada del container a puerto</label>
				<span id="arrivalDate" title="Fecha de llegada del container a puerto">|-$shipment->getArrivalDate()|date_format:"%d-%m-%Y"-|</span>
			</p>
			
			<p>
				<label for="documentsPresentationDate">Presentación de documentos aduanales</label>
				<input type="text" name="shipmentRelease[documentsPresentationDate]" cols="70" rows="7" wrap="virtual" id="documentsPresentationDate" title="Presentación de documentos aduanales" value="|-$shipmentRelease->getDocumentsPresentationDate()|date_format:"%d-%m-%Y"-|"/>
				<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('shipmentRelease[documentsPresentationDate]', false, '|-$parameters.dateFormat.value|lower|replace:'-':''-|', '-');" title="Seleccione la fecha">
			</p>
			<p>
				<label for="bankTariffsPaymentDate">Pago al banco de aranceles</label>
				<input type="text" name="shipmentRelease[bankTariffsPaymentDate]" cols="70" rows="7" wrap="virtual" id="bankTariffsPaymentDate" title="Pago al banco de aranceles" value="|-$shipmentRelease->getBankTariffsPaymentDate()|date_format:"%d-%m-%Y"-|"/>
				<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('shipmentRelease[bankTariffsPaymentDate]', false, '|-$parameters.dateFormat.value|lower|replace:'-':''-|', '-');" title="Seleccione la fecha">
			</p>
			<p>
				<label for="physicalRecognitionDate">Reconocimiento físico de la mercancía</label>
				<input type="text" name="shipmentRelease[physicalRecognitionDate]" cols="70" rows="7" wrap="virtual" id="physicalRecognitionDate" title="Reconocimiento físico de la mercancía" value="|-$shipmentRelease->getPhysicalRecognitionDate()|date_format:"%d-%m-%Y"-|"/>
				<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('shipmentRelease[physicalRecognitionDate]', false, '|-$parameters.dateFormat.value|lower|replace:'-':''-|', '-');" title="Seleccione la fecha">
			</p>
			<p>
				<label for="documentsValidationDate">Validación de los documentos</label>
				<input type="text" name="shipmentRelease[documentsValidationDate]" cols="70" rows="7" wrap="virtual" id="documentsValidationDate" title="Validación de los documentos" value="|-$shipmentRelease->getDocumentsValidationDate()|date_format:"%d-%m-%Y"-|"/>
				<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('shipmentRelease[documentsValidationDate]', false, '|-$parameters.dateFormat.value|lower|replace:'-':''-|', '-');" title="Seleccione la fecha">
			</p>
			<p>
				<label for="expensesPaymentDate">Pago de gastos (almacenes, manejo, etc)</label>
				<input type="text" name="shipmentRelease[expensesPaymentDate]" cols="70" rows="7" wrap="virtual" id="expensesPaymentDate" title="Pago de gastos (almacenes, manejo, etc)" value="|-$shipmentRelease->getExpensesPaymentDate()|date_format:"%d-%m-%Y"-|"/>
				<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('shipmentRelease[expensesPaymentDate]', false, '|-$parameters.dateFormat.value|lower|replace:'-':''-|', '-');" title="Seleccione la fecha">
			</p>
			
			<p>
				<label for="loadingOrderDate">Orden de carga</label>
				<input type="text" name="shipmentRelease[loadingOrderDate]" cols="70" rows="7" wrap="virtual" id="loadingOrderDate" title="Orden de carga" value="|-$shipmentRelease->getLoadingOrderDate()|date_format:"%d-%m-%Y"-|"/>
				<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('shipmentRelease[loadingOrderDate]', false, '|-$parameters.dateFormat.value|lower|replace:'-':''-|', '-');" title="Seleccione la fecha">
			</p>
			<p>
				<label for="containersLoadingDate">Carga de los containers</label>
				<input type="text" name="shipmentRelease[containersLoadingDate]" cols="70" rows="7" wrap="virtual" id="containersLoadingDate" title="Carga de los containers" value="|-$shipmentRelease->getContainersLoadingDate()|date_format:"%d-%m-%Y"-|"/>
				<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('shipmentRelease[containersLoadingDate]', false, '|-$parameters.dateFormat.value|lower|replace:'-':''-|', '-');" title="Seleccione la fecha">
			</p>

			<p>
				<label for="estimatedMovementToStorehouseDate">Fecha estimada de Transporte desde la aduana al almacén</label>
				<input type="text" name="shipmentRelease[estimatedMovementToStorehouseDate]" cols="70" rows="7" wrap="virtual" id="estimatedMovementToStorehouseDate" title="Fecha estimada de Transporte desde la aduana al almacén" value="|-$shipmentRelease->getEstimatedMovementToStorehouseDate()|date_format:"%d-%m-%Y"-|"/>
				<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('shipmentRelease[estimatedMovementToStorehouseDate]', false, '|-$parameters.dateFormat.value|lower|replace:'-':''-|', '-');" title="Seleccione la fecha">
			</p>

			<p>
				<label for="arrivalToStorehouseTimestamp">Fecha y hora de llegada del container al almacen</label>
				<input type="text" name="shipmentRelease[arrivalToStorehouseTimestamp]" cols="70" rows="7" wrap="virtual" id="arrivalToStorehouseTimestamp" title="Fecha y hora de llegada del container al almacen" value="|-$shipmentRelease->getArrivalToStorehouseTimestamp()|date_format:"%d-%m-%Y %T"-|"/>
				<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('shipmentRelease[arrivalToStorehouseTimestamp]', false, '|-$parameters.dateFormat.value|lower|replace:'-':''-|', '-');" title="Seleccione la fecha">
			</p>
			<p>
				<label for="containterReceiptOnStorehouseDate">Recepción del container en almacén</label>
				<input type="text" name="shipmentRelease[containterReceiptOnStorehouseDate]" cols="70" rows="7" wrap="virtual" id="containterReceiptOnStorehouseDate" title="Recepción del container en almacén" value="|-$shipmentRelease->getContainterReceiptOnStorehouseDate()|date_format:"%d-%m-%Y"-|"/>
				<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('shipmentRelease[containterReceiptOnStorehouseDate]', false, '|-$parameters.dateFormat.value|lower|replace:'-':''-|', '-');" title="Seleccione la fecha">
			</p>

			<p>
				<input type="hidden" name="id" id="id" value="|-$shipmentRelease->getid()-|" />
				<input type="hidden" name="shipmentRelease[shipmentId]" id="shipmentRelease[shipmentId]" value="|-$shipmentRelease->getShipmentId()-|" />
				<input type="hidden" name="do" id="do" value="importShipmentReleasesDoEdit" />
				<input type="submit" id="button_edit_shipment_release" name="button_edit_shipment_release" title="Aceptar" value="Aceptar" />
			</p>
		</fieldset>
	</form>
</div>