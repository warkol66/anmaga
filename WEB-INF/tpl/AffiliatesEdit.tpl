<h2>Configuración del Sistema</h2>
	<h1>Administración de Afiliados</h1>
	<p>A continuación podrá editar la lista de Afiliados del sistema.</p>
	<form method="post" action="Main.php?do=affiliatesDoEdit">
	<input type="hidden" value="|-$affiliate->getId()-|" name="id">
		<fieldset title="Formulario de edición de sucursales de afiliado">
     <legend>Afiliado</legend>
		<p>Realice los cambios y para guardar haga click en "Guardar Cambios"</p>
		<p><label for="affiliateId">ID</label>
		<input name="affiliateId" type="text" value="|-$affiliate->getId()-|" size="4" disabled>
		 </p>
		 <p><label for="name">Nombre</label>
			<input name="name" type="text" value="|-$affiliate->getName()-|" size="60">
		 </p>
		 <p> <input name="save" type="submit" class="botonchico" value="Guardar Cambios"> 
			 </p>
			 </fieldset>
<br />
 [ <a href='Main.php?do=affiliatesEdit&id=|-$affiliate->getId()-|&editInfo=1' class='edit'>Editar datos Internos</a> ]	</form>
<br />
<br />
	|-if $editInfo eq 1 -|
	<form method="post" action="Main.php?do=affiliatesDoEditInfo">	
		<input name="id" type="hidden" value="|-$affiliate->getId()-|">
		<input name="flag" type="hidden" value="|-$flag-|">
		<fieldset title="Formulario de edición de sucursales de afiliado">
     <legend>Ingrese los datos de la sucursal</legend>
		 <p><label for="internalId">ID interno</label>
			<input name="internalId" type="text" value="|-if $flag ne 1-| |-$affiliateInfo->getAffiliateInternalNumber()-||-/if-|" size="8"> 
			</p>
		 <p><label for="address">Dirección</label>
				<input name="address" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getAddress()-||-/if-|" size="50"> 
			</p>
		 <p><label for="phone">Teléfono</label>
				<input name="phone" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getPhone()-||-/if-|" size="25"> 
			</p>
		 <p><label for="mail">E-mail</label>
				<input name="mail" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getEmail()-||-/if-|" size="30"> 
			</p>
		 <p><label for="contact">Persona contacto</label>
				<input name="contact" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getContact()-||-/if-|" size="40"> 
			</p>
		 <p><label for="contactEmail">Email persona contacto</label>
				<input name="contactEmail" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getContactEmail()-||-/if-|" size="40">
			</p>
		 <p><label for="web">Sitio WEB</label>
				<input name="web" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getWeb()-||-/if-|" size="40">
			</p>
		 <p><label for="memo">Información</label>
				<textarea name="memo" cols="45" rows="6" wrap="VIRTUAL">|-if $flag ne 1-||-$affiliateInfo->getMemo()-||-/if-|</textarea>
			</p>
		 <p><input name="save" type="submit" class="botonchico" value="Guardar Cambios"> 
			 </p>
		</fieldset>
</form>


	 |-/if-|


 
