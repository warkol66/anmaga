				<div id="div_measureunit">
					<form name="form_edit_measureunit" id="form_edit_measureunit" action="Main.php" method="post">
						|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar el measure unit</span>|-/if-|
						<h3>|-if $action eq "edit"-|Edit|-else-|Create|-/if-| Measure Unit</h3>
						<p>
							Ingrese los datos del measure unit.
						</p>
						<fieldset title="Formulario de edición de datos de un measure unit">
							<p>
								<label for="name">name</label>
								<input type="text" id="name" name="name" value="|-if $action eq "edit"-||-$measureunit->getname()-||-/if-|" title="name" maxlength="255" />
							</p>
							<p>
								|-if $action eq "edit"-|
								<input type="hidden" name="id" id="id" value="|-if $action eq "edit"-||-$measureunit->getid()-||-/if-|" />
								|-/if-|
								<input type="hidden" name="action" id="action" value="|-$action-|" />
								<input type="hidden" name="do" id="do" value="catalogMeasureUnitsDoEdit" />
								<input type="submit" id="button_edit_measureunit" name="button_edit_measureunit" title="Aceptar" value="Aceptar" class="boton" />
							</p>
			      </fieldset>
					</form>
				</div>
