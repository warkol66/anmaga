				<div id="div_port">
					<form name="form_edit_port" id="form_edit_port" action="Main.php" method="post">
						|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar el port</span>|-/if-|
						<h3>|-if $action eq "edit"-|Edit|-else-|Create|-/if-| Port</h3>
						<p>
							Ingrese los datos del port.
						</p>
						<fieldset title="Formulario de edición de datos de un port">
																																			<p>
								<label for="code">code</label>
																								<input type="text" id="code" name="code" value="|-if $action eq "edit"-||-$port->getcode()-||-/if-|" title="code" maxlength="255" />
																							</p>
														<p>
								<label for="name">name</label>
																								<input type="text" id="name" name="name" value="|-if $action eq "edit"-||-$port->getname()-||-/if-|" title="name" maxlength="255" />
																							</p>
														<p>
																|-if $action eq "edit"-|
								<input type="hidden" name="id" id="id" value="|-if $action eq "edit"-||-$port->getid()-||-/if-|" />
								|-/if-|
																<input type="hidden" name="action" id="action" value="|-$action-|" />
								<input type="hidden" name="do" id="do" value="importPortsDoEdit" />
								<input type="submit" id="button_edit_port" name="button_edit_port" title="Aceptar" value="Aceptar" class="boton" />
							</p>
			      </fieldset>
					</form>
				</div>
