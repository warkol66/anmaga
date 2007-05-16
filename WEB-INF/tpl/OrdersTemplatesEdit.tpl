				<div id="div_ordertemplate">
					<form name="form_edit_ordertemplate" id="form_edit_ordertemplate" action="Main.php" method="post">
						|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar el order template</span>|-/if-|
						<h3>|-if $action eq "edit"-|Edit|-else-|Create|-/if-| Order Template</h3>
						<p>
							Ingrese los datos del order template.
						</p>
						<fieldset title="Formulario de edición de datos de un order template">
																																			<p>
								<label for="name">name</label>
																								<input type="text" id="name" name="name" value="|-if $action eq "edit"-||-$ordertemplate->getname()-||-/if-|" title="name" maxlength="255" />
																							</p>
														<p>
								<label for="created">created</label>
																								<input type="text" id="created" name="created" value="|-if $action eq "edit"-||-$ordertemplate->getcreated()-||-/if-|" title="created" />
																							</p>
														<p>
								<label for="userId">userId</label>
																								<input type="text" id="userId" name="userId" value="|-if $action eq "edit"-||-$ordertemplate->getuserId()-||-/if-|" title="userId" />
																							</p>
														<p>
								<label for="affiliateId">affiliateId</label>
																								<input type="text" id="affiliateId" name="affiliateId" value="|-if $action eq "edit"-||-$ordertemplate->getaffiliateId()-||-/if-|" title="affiliateId" />
																							</p>
														<p>
								<label for="branchId">branchId</label>
																								<input type="text" id="branchId" name="branchId" value="|-if $action eq "edit"-||-$ordertemplate->getbranchId()-||-/if-|" title="branchId" />
																							</p>
														<p>
								<label for="total">total</label>
																								<input type="text" id="total" name="total" value="|-if $action eq "edit"-||-$ordertemplate->gettotal()-||-/if-|" title="total" />
																							</p>
														<p>
																|-if $action eq "edit"-|
								<input type="hidden" name="id" id="id" value="|-if $action eq "edit"-||-$ordertemplate->getid()-||-/if-|" />
								|-/if-|
																<input type="hidden" name="action" id="action" value="|-$action-|" />
								<input type="hidden" name="do" id="do" value="ordersTemplatesDoEdit" />
								<input type="submit" id="button_edit_ordertemplate" name="button_edit_ordertemplate" title="Aceptar" value="Aceptar" class="boton" onmouseover="this.className='botono'" onmouseout="this.className='boton'" />
							</p>
			      </fieldset>
					</form>
				</div>
