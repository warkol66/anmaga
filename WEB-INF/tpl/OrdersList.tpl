				<h2>Orders</h2>
				<div id="div_orders">
					|-if $message eq "ok"-|<span class="message_ok">Orden guardada correctamente</span>|-/if-|
					|-if $message eq "deleted_ok"-|<span class="message_ok">Orden eliminada correctamente</span>|-/if-|
					|-if $message eq "orders_deleted_ok"-|<span class="message_ok">Ordenes eliminadas correctamente</span>|-/if-|
					
					<div class="filter">
						<form action="Main.php" method="get">
							<p>
								<label>Desde:</label>&nbsp;<span class="size4">(mm-dd-aaaa)</span>
								<input name="dateFrom" type="text" value="|-$dateFrom-|" size="10">&nbsp;&nbsp;
								<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('dateFrom', false, 'dmy', '-');" title="Seleccione la fecha">&nbsp;&nbsp;
								<label>Hasta:</label>&nbsp;<span class="size4">(mm-dd-aaaa)</span>
								<input name="dateTo" type="text" value="|-$dateTo-|" size="10">&nbsp;&nbsp;
								<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('dateTo', false, 'dmy', '-');" title="Seleccione la fecha">
							</p>
							<p>
								<label for="state">Estado</label>
								<select name="state">
									<option value="" selected="selected">Todos</option>
									<option value="0">Emitida</option>
									<option value="1">Aceptada</option>
									<option value="2">Pendiente Aprobación</option>
									<option value="3">En Proceso</option>
									<option value="4">Completa</option>
									<option value="5">Cancelada</option>
									<option value="6">A Verificar</option>
								</select>
							</p>							
							|-if $all eq "1"-|
							<p>
								<label for="affiliateId">Affiliate</label>
								<select name="affiliateId">
									<option value="" selected="selected">Todos</option>
									|-foreach from=$affiliates item=affiliate-|
									<option value="|-$affiliate->getId()-|">|-$affiliate->getName()-|</option>
									|-/foreach-|
								</select>
							</p>
							|-/if-|
							<p>
								<input type="hidden" name="do" value="ordersList" />
								<input type="submit" value="Buscar" class="boton" />
							</p>
						</form>
					</div>

					<form action="Main.php" method="get">
					
						<table id="tabla-orders" width="100%" class="tableTdBorders">
							<thead>
								<tr>
													<th class="thFillTitle">id</th>
																	<th class="thFillTitle">created</th>
																	<th class="thFillTitle">user</th>
																	|-if $all eq "1"-|<th class="thFillTitle">affiliate</th>|-/if-|
																	<th class="thFillTitle">branch</th>
																	<th class="thFillTitle">total</th>
																	<th class="thFillTitle">state</th>
																	<th class="thFillTitle">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
							|-foreach from=$orders item=order name=for_orders-|
								<tr>
																	<td class="tdSize1">|-$order->getid()-|</td>
																	<td class="tdSize1">|-$order->getcreated()-|</td>
																	<td class="tdSize1">|-assign var=user value=$order->getAffiliateUser()-||-if $user-||-$user->getUsername()-||-/if-|</td>
																	|-if $all eq "1"-|<td class="tdSize1">|-assign var=affiliate value=$order->getAffiliate()-||-if $affiliate-||-$affiliate->getName()-||-/if-|</td>|-/if-|
																	<td class="tdSize1">|-assign var=branch value=$order->getBranch()-||-if $branch-||-$branch->getName()-||-/if-|</td>
																	<td class="tdSize1">|-$order->gettotal()|number_format:2:",":"."-|</td>
																	<td class="tdSize1">|-$order->getStateName()-|</td>
																	<td>
										<input type="button" onclick="javascript:window.location.href='Main.php?do=ordersView&id=|-$order->getid()-|'" value="Ver" class="boton" />
										<input type="button" onclick="javascript:window.location.href='Main.php?do=ordersEdit&id=|-$order->getid()-|'" value="Editar" class="boton" />
										|-if $all eq "0"-|
										<input type="button" onclick="javascript:window.location.href='Main.php?do=ordersDoAddToCart&id=|-$order->getid()-|'" value="Add To Cart" class="boton" />
										|-/if-|
										<input type="checkbox" name="orders[]" value="|-$order->getid()-|" />
									</td>
								</tr>
							|-/foreach-|
							
								<tr> 
									<td colspan="9">|-include file="PaginateInclude.tpl"-|</td> 
								</tr>
	
							</tbody>
						</table>
						
						<input type="hidden" name="do" id="do" value="" />
						
						<input type="button" onclick="ordersSendOrdersExport(this.form)"value="Exportar ordenes seleccionadas" class="boton" /><br />
						<input type="button" onclick="ordersSendOrdersDelete(this.form)" value="Eliminar ordenes Seleccionadas" class="boton" />

						
					</form>
						
				</div>
