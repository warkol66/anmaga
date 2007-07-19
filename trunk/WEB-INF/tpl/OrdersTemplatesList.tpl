				<h2>Ordenes</h2>
				<div id="div_orderTemplates">
					|-if $message eq "ok"-|<span class="message_ok">Orden guardada correctamente</span>|-/if-|
					|-if $message eq "deleted_ok"-|<span class="message_ok">Orden eliminada correctamente</span>|-/if-|
					<table id="tabla-orderTemplates" width="100%" class="tableTdBorders">
						<thead>
							<tr>
                								<th class="thFillTitle">id</th>
																<th class="thFillTitle">name</th>
																<th class="thFillTitle">created</th>
																<th class="thFillTitle">userId</th>
																|-if $all eq "1"-|<th class="thFillTitle">affiliateId</th>|-/if-|
																<th class="thFillTitle">branchId</th>
																<th class="thFillTitle">total</th>
																<th class="thFillTitle">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						|-foreach from=$orderTemplates item=orderTemplate name=for_orderTemplates-|
							<tr>
																<td class="tdSize1">|-$orderTemplate->getid()-|</td>
																<td class="tdSize1">|-$orderTemplate->getname()-|</td>
																<td class="tdSize1">|-$orderTemplate->getcreated()-|</td>
																<td class="tdSize1">|-assign var=user value=$orderTemplate->getAffiliateUser()-||-if $user-||-$user->getUsername()-||-/if-|</td>
																|-if $all eq "1"-|<td class="tdSize1">|-assign var=affiliate value=$orderTemplate->getAffiliate()-||-if $affiliate-||-$affiliate->getName()-||-/if-|</td>|-/if-|
																<td class="tdSize1">|-assign var=branch value=$orderTemplate->getBranch()-||-if $branch-||-$branch->getName()-||-/if-|</td>
																<td class="tdSize1">|-$orderTemplate->gettotal()-|</td>
																<td>
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="ordersTemplatesView" />
										<input type="hidden" name="id" value="|-$orderTemplate->getid()-|" />
										<input type="submit" name="submit_go_view_orderTemplate" value="Ver" class="boton" />
									</form>
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="ordersTemplatesDoAddToCart" />
										<input type="hidden" name="id" value="|-$orderTemplate->getid()-|" />
										<input type="submit" name="submit_go_add_orderTemplate" value="Add To Cart" class="boton" />
									</form>
									<form action="Main.php" method="post">
										<input type="hidden" name="do" value="ordersTemplatesDoDelete" />
										<input type="hidden" name="id" value="|-$orderTemplate->getid()-|" />
										<input type="submit" name="submit_go_delete_orderTemplate" value="Borrar" onclick="return confirm('Seguro que desea eliminar la orden?')" class="boton" />
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
