<h2>Importaciones</h2>
<h1>Cotizaciones de Proveedor</h1>
<p>A continuación puede ver el listado de sus pedidos de cotización a proveedores y sus correspondientes estados.</p>

<div id="div_messages">
	|-if $message eq "resent"-|
		<div class="successMessage">La cotización <a href="Main.php?do=importSupplierQuoteEdit&id=|-$supplierQuotationId-|" >|-$supplierQuotationId-|</a> ha sido reenviada correctamente al proveedor.
		</div>
	|-/if-|
	|-if $message eq "resent-multiple"-|
		<div class="successMessage">La cotización <a href="Main.php?do=importSupplierQuoteEdit&id=|-$supplierQuotationId-|" >|-$supplierQuotationId-|</a> ha sido reenviada a los mails validos indicados.
		</div>
	|-/if-|	
	|-if $message eq "resent-failed"-|
		<div class="successMessage">Ha ocurrido un error al reenviar la cotización <a href="Main.php?do=importSupplierQuoteEdit&id=|-$supplierQuotationId-|" >|-$supplierQuotationId-|</a>
		</div>
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
		<p>
			<input type="hidden" name="do" value="importSupplierQuoteList" />
			<input type="submit" value="Aplicar Filtro">
		</p>
		</fieldset>
	</form>
	
</div>

<div id="div_supplierQuotations">
	<table cellpadding="4" cellspacing="0" class="tableTdBorders" id="tabla-newsmedias">
		<thead>
			<tr>
				<th colspan="7" class="thFillTitle">
					<div class="rightLink">
					</div>
				</th>
			</tr>
			<tr>
				<th>Id</th>
				<th>Proveedor</th>
				<th>Fecha</th>
				<th>Estado</th>
				<th>Completar</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		|-foreach from=$quotations item=quotation name=for_quotations-|
			<tr>
				<td>|-$quotation->getId()-|</td>
				<td>
					|-assign var=supplier value=$quotation->getSupplier()-|
					|-$supplier->getName()-|
				</td>
				<td>|-$quotation->getCreatedAt()|change_timezone-|</td>
				<td>|-$quotation->getStatusName()-|</td>
				<td><a href="Main.php?do=importSupplierQuoteAccess&token=|-$quotation->getSupplierAccessToken()-|">Completar</a></td>
				<td>
					<form action="Main.php" method="get">						
						<input type="hidden" name="do" value="importSupplierQuoteEdit" />
						<input type="hidden" name="id" value="|-$quotation->getid()-|" />
						<input type="submit" name="submit_go_edit_quotation" value="Editar" class="buttonImageEdit" />
					</form>
					<form action="Main.php" method="post">	
						<input type="hidden" name="do" value="importSupplierQuoteResend" />
						<input type="hidden" name="id" value="|-$quotation->getid()-|" />
						<input type="submit" name="submit_go_resend_quotation" value="Reenviar" class="buttonImageEmail" alt="Reenviar a Destinatario Original"/>
					</form>					
					
					<form action="Main.php" method="get">						
						<input type="hidden" name="do" value="importSupplierQuoteHistory" />
						<input type="hidden" name="id" value="|-$quotation->getid()-|" />
						<input type="submit" name="submit_go_edit_quotation" value="Ver Historial" />
					</form>
					
					<input type="button" value="Reenviar" onClick="javascript:importShowDiv('resendDiv|-$quotation->getId()-|')" class="buttonImageEmail" alt="Enviar a Destinatario otros destinatarios"/>
					<div id="resendDiv|-$quotation->getId()-|" style="display: none;">

					<form action="Main.php" method="post">	
						<input type="hidden" name="do" value="importSupplierQuoteResend" />
						<input type="hidden" name="id" value="|-$quotation->getid()-|" />
						<label for="destinationEmails">Destinatarios (separados por coma):</label><br /><input type="text" name="destinationEmails" value="" />
						
						<input type="submit" name="submit_go_resend_quotation" value="Reenviar" />
						<input type="button" name="hide_resend_div" value="Cancelar" onClick="javascript:importHideDiv('resendDiv|-$quotation->getId()-|')" />
					</form>
						
					</div>
<!--					<form action="Main.php" method="post">
						<input type="hidden" name="do" value="importSupplierQuoteDelete" />
						<input type="hidden" name="id" value="|-$quotation->getid()-|" />
						<input type="submit" name="submit_go_delete_quotation" value="Borrar" onclick="return confirm('Seguro que desea eliminar la cotizacion?')" class="buttonImageDelete" />
					</form>
-->
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
