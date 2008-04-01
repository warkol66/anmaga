<h2>Pedidos</h2> 
	<h1>Lista de Pedidos</h1> 
	<p>Seleccione alguna opción para filtrar el listado de pedidos. Puede Ediar o Ver los pedidos. <br>
	Para exportar pedidos selecciones los pedidos a exportar, y haga click en Exportar órdenes Seleccionados. <br>
	Para eliminar, seleccione los pedidos a eliminar y haga click en "Eliminar órdenes seleccionadas".</p> 
<div id="div_orders">
	|-if $message eq "ok"-|<span class="message_ok">Orden guardada correctamente</span>|-/if-|
	|-if $message eq "deleted_ok"-|<span class="message_ok">Orden eliminada correctamente</span>|-/if-|
	|-if $message eq "orders_deleted_ok"-|<span class="message_ok">Ordenes eliminadas correctamente</span>|-/if-|
	<div class="filter">
		<form action="Main.php" method="get">
<table  border="0" cellspacing="0" cellpadding="5">
	<tr>
		<td nowrap><label>Desde:</label>&nbsp;<span class="size4">(mm-dd-aaaa)</span>
								<input name="dateFrom" type="text" value="|-$dateFrom-|" size="10">&nbsp;&nbsp;
								<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('dateFrom', false, 'dmy', '-');" title="Seleccione la fecha">&nbsp;&nbsp;
								<label>Hasta:</label>&nbsp;<span class="size4">(mm-dd-aaaa)</span>
								<input name="dateTo" type="text" value="|-$dateTo-|" size="10">&nbsp;&nbsp;
					<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('dateTo', false, 'dmy', '-');" title="Seleccione la fecha"></td>
		<td nowrap>								<label for="state">Estado</label>
								<select name="state">
									<option value="" selected="selected">Todos&nbsp;&nbsp;&nbsp;</option>
									<option value="0">Emitida</option>
									<option value="1">Aceptada</option>
									<option value="2">Pendiente Aprobación&nbsp;&nbsp;&nbsp;</option>
									<option value="3">En Proceso</option>
									<option value="4">Completa</option>
									<option value="5">Cancelada</option>
									<option value="6">A Verificar</option>
					</select></td>
	</tr>
|-if $all eq "1"-|	<tr>
		<td colspan="2">							
								<label for="affiliateId">Mayorista</label>
								<select name="affiliateId">
									<option value="" selected="selected">Todos&nbsp;&nbsp;&nbsp;</option>
									|-foreach from=$affiliates item=affiliate-|
									<option value="|-$affiliate->getId()-|">|-$affiliate->getName()-|&nbsp;&nbsp;&nbsp;</option>
									|-/foreach-|
								</select></td>
	</tr>
							|-/if-|
	<tr>
		<td>								<input type="hidden" name="do" value="ordersList" />
								<input type="submit" value="Buscar" class="boton" />
</td>
		<td>&nbsp;</td>
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
																	<th width="25%" class="thFillTitle">Usuario</th>
																	<th width="25%" class="thFillTitle">Sucursal</th>
																	<th width="10%" class="thFillTitle">Total</th>
																	<th width="15%" class="thFillTitle">Estado</th>
																	<th width="15%" class="thFillTitle">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
							|-foreach from=$orders item=order name=for_orders-|
								<tr>
																	<td class="tdSize1">|-$order->getid()-|</td>
																	|-if $all eq "1"-|<td class="tdSize1">|-assign var=affiliate value=$order->getAffiliate()-||-if $affiliate-||-$affiliate->getName()-||-/if-|</td>|-/if-|
																	<td nowrap class="tdSize1">|-$order->getcreated()-|</td>
																	<td nowrap class="tdSize1 right">|-$order->getNumber()-|</td>
																	<td class="tdSize1">|-assign var=user value=$order->getAffiliateUser()-||-if $user-||-$user->getUsername()-||-/if-|</td>
																	<td class="tdSize1">|-assign var=branch value=$order->getBranch()-||-if $branch-||-$branch->getName()-||-/if-|</td>
																	<td class="tdSize1">|-$order->gettotal()|number_format:2:",":"."-|</td>
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
									<td colspan="9">|-include file="PaginateInclude.tpl"-|</td> 
								</tr>
							</tbody>
						</table>
						<input type="hidden" name="do" id="do" value="" />
						<input type="button" onclick="ordersSendOrdersExport(this.form)" value="Exportar órdenes seleccionadas" class="button" />&nbsp;&nbsp;&nbsp;
						<input type="button" onclick="ordersSendOrdersDelete(this.form)" value="Eliminar órdenes seleccionadas" class="button" />
					</form>
</div>
