				<div id="div_unit">
					<form name="form_edit_unit" id="form_edit_unit" action="Main.php" method="post">
						|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar la unidad</span>|-/if-|
						<h3>|-if $action eq "edit"-|Edit|-else-|Create|-/if-| Unit</h3>
						<p>
							Ingrese los datos de la unidad.
						</p>
						<fieldset title="Formulario de edición de datos de un unit">
							<p>
								<label for="name">Name</label>
								<input type="text" id="name" name="name" value="|-if $action eq "edit"-||-$unit->getname()-||-/if-|" title="name" maxlength="255" />
							</p>
							<p>
								|-if $action eq "edit"-|
								<input type="hidden" name="id" id="id" value="|-if $action eq "edit"-||-$unit->getid()-||-/if-|" />
								|-/if-|
								<input type="hidden" name="action" id="action" value="|-$action-|" />
								<input type="hidden" name="do" id="do" value="catalogUnitsDoEdit" />
								<input type="submit" id="button_edit_unit" name="button_edit_unit" title="Aceptar" value="Aceptar" />
							</p>
			      </fieldset>
					</form>
				</div>
