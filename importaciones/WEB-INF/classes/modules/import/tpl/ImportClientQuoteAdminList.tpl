|-popup_init src="scripts/overlib.js"-|
<h2>Importaciones</h2>
<h1>Cotizaciones de Clientes</h1>
<p>A continuación puede ver el listado de sus solicitudes de cotización y sus correspondiente estado.</p>

<div id="div_messages">
	|-if $message eq "create-failed"-|
		<div class="successMessage">Se ha producido un error al crear la cotización</div>
	|-elseif $message eq "confirmed"-|
		<div class="successMessage">Cotización confirmada correctamente. Puedo ver su detalle accediendo a este <a href="Main.php?do=importClientQuoteEdit&id=|-$clientQuotationId-|" >link</a></div>
	|-elseif $message eq "quoted"-|
		<div class="successMessage">Cotización cerrada. Se han confirmado los precios al cliente. Puedo ver su detalle accediendo a este <a href="Main.php?do=importClientQuoteEdit&id=|-$clientQuotationId-|" >link</a></div>
	|-/if-|
</div>

<div id="div_filters">
	<form action="Main.php" method="get">
		<fieldset>
		<p>
			<label for="filters[affiliateId]">Cliente</label>
			<select name="filters[affiliateId]">
					<option value="">Seleccione Un Cliente</option>
				|-foreach from=$affiliates item=client name=for_suppliers-|
					<option value="|-$client->getId()-|" |-if $filters neq '' and $filters.affiliateId eq $client->getId() -|selected="selected"|-/if-|>|-$client->getName()-|</option>
				|-/foreach-|
			</select>
		</p>
		<p>
			<input type="hidden" name="do" value="importClientQuoteList" />
			<input type="submit" value="Aplicar Filtro"/>
		</p>
		</fieldset>
	</form>
	
</div>
<div id="div_newsmedias">
	<table cellpadding="4" cellspacing="0" class="tableTdBorders" id="tabla-newsmedias">
		<thead>
			<tr>
				<th colspan="7" class="thFillTitle">
						<form action="Main.php" method="post" >
							<select name="clientQuotation[affiliateId]">
									<option value="">Seleccione un cliente</option>
								|-foreach from=$affiliates item=affiliate name=for_affiliates-|
									<option value="|-$affiliate->getId()-|">|-$affiliate->getName()-|</option>
								|-/foreach-|
							</select>
							<input type="hidden" name="do" value="importClientQuoteCreate" />
							<input type="submit" value="Crear Nueva Cotización" />
						</form>
				</th>
			</tr>
			<tr>
				<th>Id</th>
				<th>&nbsp;</th>
				<th>Cliente</th>
				<th>Fecha</th>
				<th>Estado</th>
				<th>Productos</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		|-foreach from=$quotations item=quotation name=for_quotations-|
			<tr>
				<td>|-$quotation->getId()-|</td>
				<td><img src="images/clear.gif" class="aqua|-*$smarty.foreach.for_quotations.iteration*-||-php-|echo rand(1,10);|-/php-|" /></td>
				<td>
					|-assign var=client value=$quotation->getAffiliate()-|
					|-$client->getName()-|
				</td>
				<td>|-$quotation->getCreatedAt()|change_timezone|date_format:"%d-%m-%Y"-|</td>
				<td>|-$quotation->getStatusNameAdmin()-|</td>
				<td>|-assign var=products value=''-|
					|-assign var=items value=$quotation->getClientQuotationItems()-|
					|-if $items|@count eq 0-|
						|-assign var=products value='No hay productos en la solicitud'-|
					|-else-|
					|-foreach from=$items item=item name=for_quotations_item-|
						|-assign var=product value=$item->getProduct()-|
						|-assign var=product value=$product->getName()-|
						|-assign var=products value=$products$product<br/>-|
					|-/foreach-|
					|-/if-|
 				Ver detalle <a href="#" |-popup  sticky=true fgcolor="#ffffff" bgcolor="#ffffff" closecolor="#cdcdcd" closetext='Cerrar' closetitle='Cerrar' capcolor='#ffffff' bgcolor='#006699' width=350 caption="Detalle de Productos" trigger="onMouseOver" text="$products"-|  title="Ver Productos" alt="Ver Productos"><img src="images/clear.png" class="linkImageInfo"></a>
				</td>
				<td nowrap="nowrap">
					<form action="Main.php" method="get">						
						<input type="hidden" name="do" value="importClientQuoteEdit" />
						<input type="hidden" name="id" value="|-$quotation->getid()-|" />
						<input type="submit" name="submit_go_edit_quotation" value="Editar" class="buttonImageEdit" title="Editar" alt="Editar" />
					</form>
					<form action="Main.php" method="get">						
						<input type="hidden" name="do" value="importClientQuoteHistory" />
						<input type="hidden" name="id" value="|-$quotation->getid()-|" />
						<input type="submit" name="submit_go_edit_quotation" value="Ver Historial" class="buttonImageHistory" title="Ver Historial" alt="Ver Historial" />
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
