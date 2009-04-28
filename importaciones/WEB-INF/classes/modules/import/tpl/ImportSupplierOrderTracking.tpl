<h2>Exportaciones</h2>
<h1>Seguimiento de Pedido</h1>

<div id="div_general_information">
	<p>
		Fecha de Creación del Pedido: |-$supplierPurchaseOrder->getCreatedAt()|change_timezone|date_format:"%d-%m-%Y"-|
	</p>
	<p>
		Estado Actual: |-$supplierPurchaseOrder->getStatusName()-|
	</p>
</div>

<div id="supplierQuotationTracking">
	<form action="Main.php" method="post">
		<fieldset>
		<legend>Seguimiento</legend>
		<p>
			<label for="status">Proximo Estado</label>
			<select name="status" id="status">
				|-foreach from=$status key=key item=stat name=for_possible_status-|
				<option value="|-$key-|">|-$stat-|</option>
				|-/foreach-|
			</select>
		</p>
		<p>
			<label for="comment">Informacion sobre el Cambio de Estado</label>
			<textarea name="comment" rows="8" cols="40"></textarea>
		</p>
		<p>
			<input type="hidden" name="id" value="|-$supplierPurchaseOrder->getId()-|" />
			<input type="hidden" name="do" value="importSupplierOrderDoTracking" />
			<input type="submit" value="Realizar Seguimiento" />
		</p>
		</fieldset>
	</form>
</div>