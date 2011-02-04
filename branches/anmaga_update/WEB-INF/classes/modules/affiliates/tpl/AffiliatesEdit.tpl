<h2>Configuración del Sistema</h2>
	<h1>Administración de Afiliados</h1>
	<p>A continuación podrá editar la lista de Afiliados del sistema.</p>
	<form method="post" action="Main.php?do=affiliatesDoEdit">
	<input type="hidden" value="|-$action-|" name="action">
	<input type="hidden" value="|-$affiliate->getId()-|" name="id">
		<fieldset title="Formulario de edición de nombre del Afiliado">
     <legend>Afiliado</legend>
		<p>Realice los cambios y para guardar haga click en "Guardar Cambios"</p>
		<p><label for="params[affiliateId]">ID</label>
		<input name="params[affiliateId]" type="text" value="|-$affiliate->getId()-|" size="4" disabled>
		 </p>
		 <p><label for="params[name]">Nombre</label>
			<input name="params[name]" type="text" value="|-$affiliate->getName()-|" size="60">
		 </p>
		 <p><label for="params[internalId]">ID interno</label>
			<input name="params[internalId]" type="text" value="|-$affiliate->getInternalNumber()-|" size="15"> 
		</p>
		 <p><label for="params[address]">Dirección</label>
				<input name="params[address]" type="text" value="|-$affiliate->getAddress()-|" size="55"> 
		</p>
		 <p><label for="params[phone]">Teléfono</label>
				<input name="params[phone]" type="text" value="|-$affiliate->getPhone()-|" size="25"> 
			</p>
		 <p><label for="params[mail]">E-mail</label>
				<input name="params[mail]" type="text" value="|-$affiliate->getEmail()-|" size="30"> 
			</p>
		 <p><label for="params[contact]">Persona contacto</label>
				<input name="params[contact]" type="text" value="|-$affiliate->getContact()-|" size="40"> 
			</p>
		 <p><label for="params[contactEmail]">Email persona contacto</label>
				<input name="params[contactEmail]" type="text" value="|-$affiliate->getContactEmail()-|" size="40">
			</p>
		 <p><label for="params[web]">Sitio WEB</label>
				<input name="params[web]" type="text" value="|-$affiliate->getWeb()-|" size="40">
			</p>
		 <p><label for="params[memo]">Información</label>
				<textarea name="params[memo]" cols="45" rows="6" wrap="VIRTUAL">|-$affiliate->getMemo()-|</textarea>
			</p>
		 <p><input name="save" type="submit" class="botonchico" value="Guardar Cambios"> 
			 </p>
		</fieldset>
</form>




 
