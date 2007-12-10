				<div id="div_supplier">
					<form name="form_edit_supplier" id="form_edit_supplier" action="Main.php" method="post">
						|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar el supplier</span>|-/if-|
						<h3>|-if $action eq "edit"-|Edit|-else-|Create|-/if-| Supplier</h3>
						<p>
							Ingrese los datos del supplier.
						</p>
						<fieldset title="Formulario de edición de datos de un supplier">
																																			<p>
								<label for="name">name</label>
																								<input type="text" id="name" name="name" value="|-if $action eq "edit"-||-$supplier->getname()-||-/if-|" title="name" maxlength="255" />
																							</p>
														<p>
																|-if $action eq "edit"-|
								<input type="hidden" name="id" id="id" value="|-if $action eq "edit"-||-$supplier->getid()-||-/if-|" />
								|-/if-|
																<input type="hidden" name="action" id="action" value="|-$action-|" />
								<input type="hidden" name="do" id="do" value="importSuppliersDoEdit" />
								<input type="submit" id="button_edit_supplier" name="button_edit_supplier" title="Aceptar" value="Aceptar" class="boton" />
							</p>
			      </fieldset>
					</form>
				</div>
