				<div id="div_order">
					<form name="form_edit_order" id="form_edit_order" action="Main.php" method="post">
						|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar el order</span>|-/if-|
						<h3>|-if $action eq "edit"-|Edit|-else-|Create|-/if-| Order</h3>
						<p>
							Ingrese los datos del order.
						</p>
						<fieldset title="Formulario de edición de datos de un order">
																																			<p>
								<label for="created">created</label>
																								<input type="text" id="created" name="created" value="|-if $action eq "edit"-||-$order->getcreated()-||-/if-|" title="created" />
																							</p>
														<p>
								<label for="userId">userId</label>
																								<input type="text" id="userId" name="userId" value="|-if $action eq "edit"-||-$order->getuserId()-||-/if-|" title="userId" />
																							</p>
														<p>
								<label for="affiliateId">affiliateId</label>
																								<input type="text" id="affiliateId" name="affiliateId" value="|-if $action eq "edit"-||-$order->getaffiliateId()-||-/if-|" title="affiliateId" />
																							</p>
														<p>
								<label for="branchId">branchId</label>
																								<input type="text" id="branchId" name="branchId" value="|-if $action eq "edit"-||-$order->getbranchId()-||-/if-|" title="branchId" />
																							</p>
														<p>
								<label for="processed">processed</label>
																								<input type="text" id="processed" name="processed" value="|-if $action eq "edit"-||-$order->getprocessed()-||-/if-|" title="processed" />
																							</p>
														<p>
								<label for="total">total</label>
																								<input type="text" id="total" name="total" value="|-if $action eq "edit"-||-$order->gettotal()-||-/if-|" title="total" />
																							</p>
														<p>
								<label for="state">state</label>
																								<input type="text" id="state" name="state" value="|-if $action eq "edit"-||-$order->getstate()-||-/if-|" title="state" />
																							</p>
														<p>
																|-if $action eq "edit"-|
								<input type="hidden" name="id" id="id" value="|-if $action eq "edit"-||-$order->getid()-||-/if-|" />
								|-/if-|
																<input type="hidden" name="action" id="action" value="|-$action-|" />
								<input type="hidden" name="do" id="do" value="ordersDoEdit" />
								<input type="submit" id="button_edit_order" name="button_edit_order" title="Aceptar" value="Aceptar" class="boton" onmouseover="this.className='botono'" onmouseout="this.className='boton'" />
							</p>
			      </fieldset>
					</form>
				</div>
