				<h2>Orders</h2>
				<div id="div_orders">
					|-if $message eq "ok"-|<span class="message_ok">Orden guardada correctamente</span>|-/if-|
					|-if $message eq "deleted_ok"-|<span class="message_ok">Orden eliminada correctamente</span>|-/if-|
					
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
																<td class="tdSize1">|-assign var=user value=$order->getUserByAffiliate()-||-if $user-||-$user->getUsername()-||-/if-|</td>
																|-if $all eq "1"-|<td class="tdSize1">|-assign var=affiliate value=$order->getAffiliate()-||-if $affiliate-||-$affiliate->getName()-||-/if-|</td>|-/if-|
																<td class="tdSize1">|-assign var=branch value=$order->getBranch()-||-if $branch-||-$branch->getName()-||-/if-|</td>
																<td class="tdSize1">|-$order->gettotal()|number_format:2:",":"."-|</td>
																<td class="tdSize1">|-$order->getStateName()-|</td>
																<td>
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="ordersView" />
										<input type="hidden" name="id" value="|-$order->getid()-|" />
										<input type="submit" name="submit_go_view_order" value="Ver" class="boton" />
									</form>
									|-if $all eq "0"-|
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="ordersDoAddToCart" />
										<input type="hidden" name="id" value="|-$order->getid()-|" />
										<input type="submit" name="submit_go_add_order" value="Add To Cart" class="boton" />
									</form>
									|-/if-|
								</td>
							</tr>
						|-/foreach-|
						
							<tr> 
								<td colspan="9">|-include file="PaginateInclude.tpl"-|</td> 
							</tr>

						</tbody>
					</table>
				</div>
