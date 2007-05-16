				<h2>Orders</h2>
				<div id="div_orders">
					|-if $message eq "ok"-|<span class="message_ok">Orden guardada correctamente</span>|-/if-|
					|-if $message eq "deleted_ok"-|<span class="message_ok">Orden eliminada correctamente</span>|-/if-|
					<table id="tabla-orders" width="100%" class="tableTdBorders">
						<thead>
							<tr>
                								<th class="thFillTitle">id</th>
																<th class="thFillTitle">created</th>
																<th class="thFillTitle">userId</th>
																|-if $all eq "1"-|<th class="thFillTitle">affiliateId</th>|-/if-|
																<th class="thFillTitle">branchId</th>
																<th class="thFillTitle">processed</th>
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
																<td class="tdSize1">|-$order->getprocessed()-|</td>
																<td class="tdSize1">|-$order->gettotal()|number_format:2:",":"."-|</td>
																<td class="tdSize1">|-$order->getstate()-|</td>
																<td>
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="ordersView" />
										<input type="hidden" name="id" value="|-$order->getid()-|" />
										<input type="submit" name="submit_go_view_order" value="Ver" class="boton" />
									</form>
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="ordersDoAddToCart" />
										<input type="hidden" name="id" value="|-$order->getid()-|" />
										<input type="submit" name="submit_go_add_order" value="Add To Cart" class="boton" />
									</form>
									<form action="Main.php" method="post">
										<input type="hidden" name="do" value="ordersDoDelete" />
										<input type="hidden" name="id" value="|-$order->getid()-|" />
										<input type="submit" name="submit_go_delete_order" value="Borrar" onclick="return confirm('Seguro que desea eliminar el order?')" class="boton" />
									</form>
								</td>
							</tr>
						|-/foreach-|
						
							<tr> 
								<td colspan="9">|-include file="PaginateInclude.tpl"-|</td> 
							</tr>

						</tbody>
					</table>
				</div>
