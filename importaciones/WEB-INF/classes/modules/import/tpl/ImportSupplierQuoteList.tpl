<h2>##import,1,Exportaciones##</h2>
<h1>##import,2,Cotizaciones de Proveedor##</h1>
<p>##import,3,A continuación puede ver el listado de sus pedidos de cotización a proveedores y sus correspondientes estados.##</p>

<div id="div_filters">
	<form action="Main.php" method="get">
		<fieldset title="##import,4,Para ver las solicitudes de cotización a un proveedor een particular, seleccione dicho proveedor de la lista##">
		<legend>##import,5,Filtrar por proveedores##</legend>
		<p>
			<label for="filters[supplierId]">##import,6,Proveedor##</label>
			<select name="filters[supplierId]">
					<option value="">##import,7,Seleccione Un Proveedor##</option>
				|-foreach from=$suppliers item=supplier name=for_suppliers-|
					<option value="|-$supplier->getId()-|" |-if $filters neq '' and $filters.supplierId eq $supplier->getId() -|selected="selected"|-/if-|>|-$supplier->getName()-|</option>
				|-/foreach-|
			</select>
		</p>
		<p>
			<input type="hidden" name="do" value="importSupplierQuoteList" />
			<input type="submit" value="##import,8,Aplicar Filtro##">
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
				<th>##import,9,Id##</th>
				<th>##import,6,Proveedor##</th>
				<th>##import,10,Fecha##</th>
				<th>##import,11,Estado##</th>
				<th>##import,12,Completar##</th>
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
				<td><a href="Main.php?do=importSupplierQuoteAccess&token=|-$quotation->getSupplierAccessToken()-|" title="##import,13,Completar la solicitud con los datos suministrados por el proveedor##">##import,12,Completar##</a></td>
				<td nowrap="nowrap">
					<form action="Main.php" method="get">						
						<input type="hidden" name="do" value="importSupplierQuoteEdit" />
						<input type="hidden" name="id" value="|-$quotation->getid()-|" />
						<input type="submit" name="submit_go_edit_quotation" value="##import,14,Editar##" class="buttonImageEdit" title="##import,15,Editar Solicitud de Cotización##" />
					</form>
					<form action="Main.php" method="post">	
						<input type="hidden" name="do" value="importSupplierQuoteResend" />
						<input type="hidden" name="id" value="|-$quotation->getid()-|" />
						<input type="submit" name="submit_go_resend_quotation" value="##import,16,Reenviar##" class="buttonImageEmail" title="##import,17,Reenviar a Destinatario Original##" />
					</form>					
					<form action="Main.php" method="get">						
						<input type="hidden" name="do" value="importSupplierQuoteHistory" />
						<input type="hidden" name="id" value="|-$quotation->getid()-|" />
						<input type="submit" name="submit_go_edit_quotation" value="##import,18,Ver Historial##" class="buttonImageHistory" title="##import,19,Consultar histórico de solicitud##" />
					</form>
					
					<input type="button" value="##import,20,Reenviar a otros destinatarios##" onClick="javascript:importShowDiv('resendDiv|-$quotation->getId()-|')" class="buttonImageSendMultiple" title="##import,21,Enviar la solicitud a otros destinatarios##"/>
					<div id="resendDiv|-$quotation->getId()-|" style="display: none;">

					<form action="Main.php" method="post">	
						<input type="hidden" name="do" value="importSupplierQuoteResend" />
						<input type="hidden" name="id" value="|-$quotation->getid()-|" />
						<label for="destinationEmails">##import,22,Destinatarios (separados por coma):##</label><br /><input type="text" name="destinationEmails" value="" />
						
						<input type="submit" name="submit_go_resend_quotation" value="##import,16,Reenviar##" />
						<input type="button" name="hide_resend_div" value="Cancelar" onClick="javascript:importHideDiv('resendDiv|-$quotation->getId()-|')" />
					</form>
						
					</div>
<!--					<form action="Main.php" method="post">
						<input type="hidden" name="do" value="importSupplierQuoteDelete"  />
						<input type="hidden" name="id" value="|-$quotation->getid()-|" />
						<input type="submit" name="submit_go_delete_quotation" value="##import,23,Eliminar##" title="##import,24,Eliminar solicitud de cotización##" onclick="return confirm('##import,25,¿Está seguro que desea eliminar la cotizacion?##')" class="buttonImageDelete" />
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
