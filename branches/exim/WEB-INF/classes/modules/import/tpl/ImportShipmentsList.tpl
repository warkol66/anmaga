<h2>Exportaciones</h2>
<h1>Productos sujetos al trámite de transporte</h1>
<p>A continuación puede ver el listado de productos sujetos al trámite de transporte.</p>

<div id="div_messages">
	|-if $message eq "tracked"-|
		<div class="successMessage">Se ha guardado el comentario de seguimiento exitosamente.</div>
	|-/if-|
</div>

<div id="div_filters">
	<form action="Main.php" method="get">
		<fieldset>
		<p>
			<label for="filters[supplierId]">Proveedor</label>
			<select name="filters[supplierId]">
					<option value="">Seleccione Un Proveedor</option>
				|-foreach from=$suppliers item=supplier name=for_suppliers-|
					<option value="|-$supplier->getId()-|" |-if $filters neq '' and $filters.supplierId eq $supplier->getId() -|selected="selected"|-/if-|>|-$supplier->getName()-|</option>
				|-/foreach-|
			</select>
		</p>
		<!-- Falta implementar para que funcione esto
		<p>
			<label for="filters[adminStatus]">Estado</label>
			<select name="filters[adminStatus]">
					<option value="">Seleccione Un Estado</option>
				|-foreach from=$status item=stat name=for_status-|
					<option value="|-$stat-|" |-if $filters neq '' and $filters.adminStatus eq $stat -|selected="selected"|-/if-|>|-$stat|multilang_get_translation:"import"-|</option>
				|-/foreach-|
			</select>
		</p> -->
		<p>
			<input type="hidden" name="do" value="importShipmentsList" />
			<input type="submit" value="Aplicar Filtro"/>
		</p>
		</fieldset>
	</form>
</div>

<div id="div_orders">
	<table cellpadding="4" cellspacing="0" class="tableTdBorders" id="table-shipments">
		<thead>
			<tr>
				<th colspan="7" class="thFillTitle">
				</th>
			</tr>
			<tr>
				<th>Id</th>
				<th>Número de Orden</th>
				<th>Proveedor</th>
				<th>Productos</th>
				<th>Estado</th>
				<th>Autorización</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		|-foreach from=$shipments item=shipment name=for_orders-|
			|-assign var=supplierPurchaseOrder value=$shipment->getSupplierPurchaseOrder()-|
			<tr valign="top">
				<td>|-$shipment->getId()-|</td>
				<td>|-$shipment->getSupplierPurchaseOrderId()-|</td>
				<td>
					|-assign var=supplier value=$supplierPurchaseOrder->getSupplier()-|
					|-$supplier->getName()-|
				</td>
				<td>
					|-assign var=items value=$supplierPurchaseOrder->getSupplierPurchaseOrderItems()-|
					|-if $items|@count eq 0-|
						No hay productos en la solicitud
					|-else-|
					|-foreach from=$items item=item name=for_shipments_item-|
						|-assign var=product value=$item->getProduct()-|
						|-$product->getName()-|
						|-if not $smarty.foreach.for_shipments_item.last-|<br />|-/if-|
					|-/foreach-|
					|-/if-|
				</td>
				<td>|-$shipment->getStatusName()|multilang_get_translation:"import"-|</td>
				<td><!-- TODO: ver que va acá --></td>
				<td nowrap="nowrap">
					<form action="Main.php" method="get">						
						<input type="hidden" name="do" value="importShipmentsEdit" />
						<input type="hidden" name="id" value="|-$shipment->getid()-|" />
						<input type="submit" name="submit_go_edit_shipment" value="Editar" class="buttonImageEdit" title="Editar" alt="Editar" />
					</form>
					<form action="Main.php" method="post">						
						<input type="hidden" name="do" value="importShipmentsDoDelete" />
						<input type="hidden" name="id" value="|-$shipment->getid()-|" />
						<input type="submit" name="submit_go_delete_shipment" value="Eliminar" class="buttonImageDelete" title="Eliminar" alt="Eliminar" onClick="return confirm('¿Está seguro que desea eliminar la información de embarque?');" />
					</form>
				</td>
			</tr>
		|-/foreach-|						
		|-if $pager->getTotalPages() gt 1-|
			<tr> 
				<td colspan="7" class="pages">|-include file="PaginateInclude.tpl"-|</td> 
			</tr>							
		|-/if-|						
		</tbody>
	</table>
</div>