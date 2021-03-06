﻿<h2>Pedidos</h2> 
	<h1>Lista de Pedidos</h1> 
	<p>Seleccione alguna opción para filtrar el listado de pedidos. Puede Ediar o Ver los pedidos.<br>
	Para exportar ordenes, seleccione los pedidos a exportar y haga click en "Exportar órdenes seleccionadas".<br>
	Para eliminar pedidos, seleccione los pedidos a eliminar y haga click en "Eliminar órdenes seleccionadas".</p> 
<div id="div_orders">
|-if $message eq "ok"-|
	<div class="successMessage">Orden guardada correctamente</div>
|-elseif $message eq "deleted_ok"-|
	<div class="successMessage">Orden eliminada correctamente</div>
|-elseif $message eq "orders_deleted_ok"-|
	<div class="successMessage">Ordenes eliminadas correctamente</div>
|-/if-|
	<div class="filter">
		<form action="Main.php" method="get">
<table  border="0" cellspacing="0" cellpadding="5">
	<tr>
		<td nowrap><label>Desde:</label>&nbsp;<span class="size4">(dd-mm-aaaa)</span>
								<input name="dateFrom" type="text" value="|-$selectedDateFrom-|" size="10">&nbsp;&nbsp;
								<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('dateFrom', false, 'dmy', '-');" title="Seleccione la fecha">&nbsp;&nbsp;
								<label>Hasta:</label>&nbsp;<span class="size4">(dd-mm-aaaa)</span>
								<input name="dateTo" type="text" value="|-$selectedDateTo-|" size="10">&nbsp;&nbsp;
					<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('dateTo', false, 'dmy', '-');" title="Seleccione la fecha"></td>
		</tr>
	<tr>
		<td>							
				<label for="state">Estado</label>
					<select name="state">
						<option value="" selected="selected">Todos</option>
						<option value="0"|-if $selectedState neq '' && $selectedState eq 0-| "selected"|-/if-|>Emitida</option>
						<option value="1"|-if $selectedState eq 1-| "selected"|-/if-|>Aceptada</option>
						<option value="2"|-if $selectedState eq 2-| "selected"|-/if-|>Pendiente Aprobación</option>
						<option value="3"|-if $selectedState eq 3-| "selected"|-/if-|>En Proceso</option>
						<option value="4"|-if $selectedState eq 4-| "selected"|-/if-|>Completa</option>
						<option value="5"|-if $selectedState eq 5-| "selected"|-/if-|>Cancelada</option>
						<option value="6"|-if $selectedState eq 6-| "selected"|-/if-|>A Verificar</option>
						<option value="7"|-if $selectedState eq 7-| "selected"|-/if-|>Exportada</option>
					</select>
					|-if $all eq "1"-|&nbsp;&nbsp;&nbsp;<label for="affiliateId">Mayorista</label>
					<select name="affiliateId">
						<option value="" selected="selected">Todos</option>
						|-foreach from=$affiliates item=affiliate-|
						<option value="|-$affiliate->getId()-|"|-if $affiliate->getId() eq $selectedAffiliateId-| "selected"|-/if-|>|-$affiliate->getName()-|</option>
						|-/foreach-|
					</select>|-/if-|</td>
				</tr>
				<tr>
					<td><input type="hidden" name="do" id="doList" value="ordersList" />
					<input type="submit" value="Buscar" class="boton" />
					<input type="reset" value="Quitar filtros" class="boton" onclick="window.location='Main.php?do=ordersList'">
					</td>
				</tr>
			</table>
		</form>
	</div>
<form action="Main.php" method="get">
	<table width="100%" cellpadding="3" cellspacing="0" class="tableTdBorders" id="tabla-orders">
		<thead>
			<tr>
				<th width="5%" class="thFillTitle">id</th>
				|-if $all eq "1"-|<th width="10%" class="thFillTitle">Mayorista</th>|-/if-|
				<th width="10%" class="thFillTitle">Fecha</th>
				<th width="10%" class="thFillTitle">Número</th>
				<th width="10%" class="thFillTitle">Usuario</th>
				<th width="25%" class="thFillTitle">Sucursal</th>
				<th width="10%" class="thFillTitle">Total</th>
				<th width="15%" class="thFillTitle">Estado</th>
				<th width="5%" class="thFillTitle">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		|-foreach from=$orders item=order name=for_orders-|
			<tr>
				<td class="tdSize1 right">|-$order->getid()-|</td>
				|-if $all eq "1"-|<td class="tdSize1">|-assign var=affiliate value=$order->getAffiliate()-||-if $affiliate-||-$affiliate->getName()-||-/if-|</td>|-/if-|
				<td nowrap class="tdSize1">|-$order->getcreated()|date_format:"%d-%m-%Y"-|</td>
				<td nowrap class="tdSize1 right">|-if $order->getNumber() eq 0-||-$order->getId()-||-else-||-$order->getNumber()-||-/if-|</td>
				<td class="tdSize1">|-assign var=user value=$order->getAffiliateUser()-||-if $user-||-$user->getUsername()-||-/if-|</td>
				<td class="tdSize1">|-assign var=branch value=$order->getBranch()-||-if $branch-||-$branch->getName()-||-/if-|</td>
				<td align="right" class="tdSize1">|-$order->gettotal()|system_numeric_format-|</td>
				<td nowrap class="tdSize1">|-$order->getStateName()-|</td>
				<td nowrap>
					<input type="button" onclick="javascript:window.location.href='Main.php?do=ordersView&id=|-$order->getid()-|&page=|-$page-|'" value="Ver" class="buttonImageView" />
					<input type="button" onclick="javascript:window.location.href='Main.php?do=ordersEdit&id=|-$order->getid()-|&page=|-$page-|'" value="Editar" class="buttonImageEdit" />
					|-if $all eq "0"-|
					<input type="button" onclick="javascript:window.location.href='Main.php?do=ordersDoAddToCart&id=|-$order->getid()-|'" value="Add To Cart" class="smallButton" />
					|-/if-|
				<input type="checkbox" name="orders[]" value="|-$order->getid()-|" />									</td>
			</tr>
		|-/foreach-|
			<tr>
				<td colspan="9" class="tdSize1 right"><label for="selectAllBoxes">Seleccionar todo</label> 
		<input name="allbox" onclick="javascript:CheckAllBoxes(this.form)" type="checkbox"></td>
			</tr>
			<tr> 
				<td colspan="9" class="pages">|-include file="PaginateInclude.tpl"-|</td> 
			</tr>
		</tbody>
	</table>
	<input type="hidden" name="do" id="doActions" value="" />
	<input type="button" onclick="ordersSendOrdersExport(this.form)" value="Exportar órdenes seleccionadas" class="button" />&nbsp;&nbsp;&nbsp;
	<input type="button" onclick="ordersSendOrdersExportSaf(this.form)" value="Consolidar órdenes seleccionadas" class="button" />&nbsp;&nbsp;&nbsp;
	<input type="button" onclick="ordersSendOrdersDelete(this.form)" value="Eliminar órdenes seleccionadas" class="button" />
</form>
</div>
