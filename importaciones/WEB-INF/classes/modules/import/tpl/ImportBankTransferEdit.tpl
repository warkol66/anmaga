<h2>Transferencias Bancarias</h2>
<h1>|-if $action eq 'edit'-|Editar|-else-|Crear|-/if-| Transferencia Bancaria</h1>
<div id="div_product">
	<form name="form_edit_product" id="form_edit_product" action="Main.php" method="post">
		|-if $message eq "error"-|
			<div class="failureMessage">Ha ocurrido un error al intentar guardar el producto</div>
		|-/if-|
		<p>|-if $action eq 'edit'-|Modifique los datos de la transferencia bancaria y haga click en "Aceptar" para guardar el cambio|-else-|Ingrese los datos de la transferencia y haga click en "Aceptar" para guardar el Producto|-/if-|.
		</p>
		<fieldset title="Formulario de edición de datos de una transferencia bancaria">
		<legend>Transferencia Bancaria</legend>
			<p>
				<label for="bankTransferNumber">Numero de Transferencia Bancaria</label>
				<input type="text" id="bankTransferNumber" name="bankTransfer[bankTransferNumber]" value="|-if $action eq 'edit'-||-$transfer->getBankTransferNumber()-||-/if-|" title="code" maxlength="255" />
			</p>
			<p>
				<label for="amount">Orden de Proveedor Relacionada</label>
				<select name="bankTransfer[supplierPurchaseOrderId]" id="bankTransfer[supplierPurchaseOrderId]">
					|-foreach from=$supplierOrders item=order name=for_orders-|
						<option value="|-$order->getId()-|" |-if $transfer->getSupplierPurchaseOrderId() eq $order->getId()-|selected="selected"|-/if-|>|-$order->getId()-|</option>
					|-/foreach-|
				</select>
			</p>
			<p>
				<label for="amount">Monto</label>
				<input name="bankTransfer[amount]" type="text" id="amount" title="amount" value="|-if $action eq 'edit'-||-$transfer->getAmount()-||-/if-|" />
			</p>
			<p>
				|-if $action eq 'edit'-|
				<input type="hidden" name="bankTransfer[id]" id="bankTransfer[id]" value="|-if $action eq 'edit'-||-$transfer->getid()-||-/if-|" />
				|-/if-|
				<input type="hidden" name="action" id="action" value="|-$action-|" />
				<input type="hidden" name="do" id="do" value="importBankTransferDoEdit" />
				<input type="submit" id="button_edit_product" name="button_edit_product" title="Aceptar" value="Aceptar" />
			</p>			
		</fieldset>
	</form>
</div>
