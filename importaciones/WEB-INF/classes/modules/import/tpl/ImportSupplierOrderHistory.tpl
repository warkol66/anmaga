<h2>Exportaciones</h2>
<h1>Historial Cotización de Proveedor: |-$supplierPurchaseOrder->getId()-|</h1>


<div id="div_status">
	<table cellpadding="4" cellspacing="0" class="tableTdBorders" id="tabla-newsmedias">
		<thead>
			<tr>
				<th>Fecha</th>
				<th>Estado</th>

			</tr>
		</thead>
		<tbody>
		|-foreach from=$supplierPurchaseOrder->getSupplierPurchaseOrderHistorys() item=history name=for_quotation_histories-|
			<tr>
				<td>|-$history->getCreatedAt()|change_timezone|date_format:"%d-%m-%Y"-|</td>
				<td>|-$history->getStatusName()-|</td>
			</tr>
		|-/foreach-|						
		</tbody>
	</table>
</div>

<input type="button" name="cancel" value="Volver" onClick="javascript:history.go(-1)"/>
