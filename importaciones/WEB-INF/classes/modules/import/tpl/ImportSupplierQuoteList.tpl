<h2>Importaciones</h2>
<h1>Cotizaciones de Proveedor</h1>
<p>A continuación puede ver el listado de sus pedidos de cotización a proveedores y sus correspondientes estados.</p>

<div id="div_messages">
	|-if $message eq "resent"-|
		<div class="successMessage">La cotización <a href="Main.php?do=importSupplierQuoteEdit&id=|-$supplierQuotationId-|" >|-$supplierQuotationId-|</a> ha sido reenviada correctamente al proveedor.
		</div>
	|-/if-|
	|-if $message eq "resent-failed"-|
		<div class="successMessage">Ha ocurrido un error al reenviar la cotización <a href="Main.php?do=importSupplierQuoteEdit&id=|-$supplierQuotationId-|" >|-$supplierQuotationId-|</a>
		</div>
	|-/if-|
</div>

<div id="div_newsmedias">
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
				<td>|-$quotation->getCreatedAt()-|</td>
				<td>|-$quotation->getStatusName()-|</td>
				<td><a href="Main.php?do=importSupplierQuoteAccess&token=|-$quotation->getSupplierAccessToken()-|">Completar</a></td>
				<td>
					<form action="Main.php" method="get">						
						<input type="hidden" name="do" value="importSupplierQuoteEdit" />
						<input type="hidden" name="id" value="|-$quotation->getid()-|" />
						<input type="submit" name="submit_go_edit_quotation" value="Editar" class="buttonImageEdit" />
					</form>
					<form action="Main.php" method="get">	
						<input type="hidden" name="do" value="importSupplierQuoteResend" />
						<input type="hidden" name="id" value="|-$quotation->getid()-|" />
						<input type="submit" name="submit_go_resend_quotation" value="Reenviar" class="buttonImageEmail" />
					</form>					
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
