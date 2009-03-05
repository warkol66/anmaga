<h2>Importaciones</h2>
<h1>Cotizaciones</h1>
<p>A continuación puede ver el listado de sus pedidos de cotización y sus correspondientes estados.</p>

<div id="div_messages">
	|-if $message eq "create-failed"-|
		<div class="successMessage">Se ha producido un error al crear la cotización</div>
	|-elseif $message eq "confirmed"-|
		<div class="successMessage">Cotización confirmada correctamente. Puedo ver su detalle accediendo a este <a href="Main.php?do=importClientQuoteEdit&id=|-$clientQuotationId-|" >link</a></div>
	|-/if-|
</div>

<div id="div_newsmedias">
	<table cellpadding="4" cellspacing="0" class="tableTdBorders" id="tabla-newsmedias">
		<thead>
			<tr>
				<th colspan="7" class="thFillTitle">
					<div class="rightLink">
						<form action="Main.php" method="post" >
							<input type="hidden" name="clientQuotation[userId]" value="|-$affiliate->getId()-|" id="userId" />
							<input type="hidden" name="do" value="importClientQuoteCreate" />
							<input type="submit" value="Crear Nueva Cotización" />
						</form>
					</div>
				</th>
			</tr>
			<tr>
				<th>Id</th>
				<th>Fecha</th>
				<th>Estado</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		|-foreach from=$quotations item=quotation name=for_quotations-|
			<tr>
				<td>|-$quotation->getId()-|</td>
				<td>|-$quotation->getCreatedAt()-|</td>
				<td>|-$quotation->getStatusNameClient()-|</td>
				<td>
					<form action="Main.php" method="get">						
						<input type="hidden" name="do" value="importClientQuoteEdit" />
						<input type="hidden" name="id" value="|-$quotation->getid()-|" />
						<input type="submit" name="submit_go_edit_quotation" value="Editar" class="buttonImageEdit" />
					</form>
<!--					<form action="Main.php" method="post">
						<input type="hidden" name="do" value="importClientQuoteDelete" />
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
