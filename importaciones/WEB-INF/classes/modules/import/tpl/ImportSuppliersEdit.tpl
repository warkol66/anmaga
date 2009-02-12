<h2>##40,Configuración del Sistema##</h2>
<h1>|-if $action eq 'edit'-|Editar|-else-|Crear|-/if-| Proveedor</h1>
<div id="div_supplier">
	<form name="form_edit_supplier" id="form_edit_supplier" action="Main.php" method="post">
		|-if $message eq "error"-|
			<div class="failureMessage">Ha ocurrido un error al intentar guardar el proveedor</div>
		|-/if-|
		<p>|-if $action eq 'edit'-|Modifique los datos del Proveedor y haga click en "Aceptar" para guardar el cambio|-else-|Ingrese los datos del Proveedor y haga click en "Aceptar" para guardar el Proveedor|-/if-|.
		</p>
		<fieldset title="Formulario de edición de datos de un proveedor">
			<legend>Proveedores</legend>
			<p>
				<label for="name">Nombre</label>
				<input name="name" type="text" id="name" title="name" value="|-if $action eq 'edit'-||-$supplier->getname()-||-/if-|" size="75" maxlength="255" />
			</p>
			<p>
				<label for="name">E-mail</label>
				<input name="email" type="text" id="email" title="name" value="|-if $action eq 'edit'-||-$supplier->getEmail()-||-/if-|" size="60" maxlength="255" />
			</p>
			<p>
				|-if $action eq 'edit'-|
				<input type="hidden" name="id" id="id" value="|-if $action eq 'edit'-||-$supplier->getid()-||-/if-|" />
				|-/if-|
				<input type="hidden" name="action" id="action" value="|-$action-|" />
				<input type="hidden" name="do" id="do" value="importSuppliersDoEdit" />
				<input type="submit" id="button_edit_supplier" name="button_edit_supplier" title="Aceptar" value="Aceptar" class="button" />
			</p>
		</fieldset>
	</form>
</div>
