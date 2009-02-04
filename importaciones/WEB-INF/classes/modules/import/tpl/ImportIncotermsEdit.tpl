				<div id="div_incoterm">
					<form name="form_edit_incoterm" id="form_edit_incoterm" action="Main.php" method="post">
						|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar el incoterm</span>|-/if-|
						<h3>|-if $action eq "edit"-|Edit|-else-|Create|-/if-| Incoterm</h3>
						<p>
							Ingrese los datos del incoterm.
						</p>
						<fieldset title="Formulario de edición de datos de un incoterm">
																																			<p>
								<label for="name">name</label>
																								<input type="text" id="name" name="name" value="|-if $action eq "edit"-||-$incoterm->getname()-||-/if-|" title="name" maxlength="255" />
																							</p>
														<p>
								<label for="description">description</label>
																								<input type="text" id="description" name="description" value="|-if $action eq "edit"-||-$incoterm->getdescription()-||-/if-|" title="description" maxlength="255" />
																							</p>
														<p>
																|-if $action eq "edit"-|
								<input type="hidden" name="id" id="id" value="|-if $action eq "edit"-||-$incoterm->getid()-||-/if-|" />
								|-/if-|
																<input type="hidden" name="action" id="action" value="|-$action-|" />
								<input type="hidden" name="do" id="do" value="importIncotermsDoEdit" />
								<input type="submit" id="button_edit_incoterm" name="button_edit_incoterm" title="Aceptar" value="Aceptar" class="boton" />
							</p>
			      </fieldset>
					</form>
				</div>
