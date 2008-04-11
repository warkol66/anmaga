<h2>Clientes y Distribuidores Mayoristas </h2> 
	<h1>|-if $action eq "edit"-|Editar|-else-|Crear|-/if-| Sucursales|-if $action eq "edit"-| - |-$branch->getname()-||-/if-|</h1> 
	<p>A continuación podrá editar la información de las sucursales</p> 
 <div id="div_branch"> 
	<form name="form_edit_branch" id="form_edit_branch" action="Main.php" method="post">
		|-if $action eq "edit"-|
			<input type="hidden" name="id" id="id" value="|-if $action eq 'edit'-||-$branch->getid()-||-/if-|" />
		|-/if-|
		<input type="hidden" name="action" id="action" value="|-$action-|" /> 
		<input type="hidden" name="do" id="do" value="affiliatesBranchsDoEdit" /> 
 		|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar la sucursal</span>|-/if-|
		<fieldset title="Formulario de edición de sucursales de afiliado">
     <legend>Sucursal</legend>
		<p> Ingrese los datos de la sucursal</p> 
		 |-if $all eq "1"-|
	<p>
	<label for="affiliateId">Afiliado</label>
		<select id="affiliateId" name="affiliateId"> 
			<option value="">Seleccionar Afiliado</option> 
				|-foreach from=$affiliates item=affiliate-|
			<option value="|-$affiliate->getId()-|"|-if $action eq 'edit' and $branch->getAffiliateId() eq $affiliate->getId()-| selected="selected"|-/if-|>|-$affiliate->getName()-|</option> 
				|-/foreach-|									
		</select> 
	</p>
		|-/if-|
	<p>
	<label for="number">Sucursal No. </label>
			<input type="text" id="number" name="number" value="|-if $action eq 'edit'-||-$branch->getnumber()-||-/if-|" size="15" title="number" />
	</p>
	<p>
		<label for="code">Código</label>
		<input type="text" id="code" name="code" value="|-if $action eq 'edit'-||-$branch->getCode()-||-/if-|" size="15" title="code" />
	</p>
	<p>
		<label for="name">Nombre </label>
		<input type="text" id="name" name="name" value="|-if $action eq 'edit'-||-$branch->getname()-||-/if-|" title="name" size="45" maxlength="255" />
	</p>
	<p>
		<label for="phone">Teléfono</label>
		<input type="text" id="phone" name="phone" value="|-if $action eq 'edit'-||-$branch->getphone()-||-/if-|" title="phone" size="35" maxlength="100" />
	</p>
	<p>
		<label for="contact">Contacto</label>
		<input type="text" id="contact" name="contact" value="|-if $action eq 'edit'-||-$branch->getcontact()-||-/if-|" title="contact" size="45" maxlength="50" />
	</p>
	<p>
		<label for="contactEmail">Email contacto</label>
		<input type="text" id="contactEmail" name="contactEmail" value="|-if $action eq 'edit'-||-$branch->getcontactEmail()-||-/if-|" title="contactEmail" size="35" maxlength="100" />
	</p>
	<p>
		<label for="memo">Memo</label>
		<textarea name="memo" cols="60" rows="5" wrap="VIRTUAL" id="memo">|-if $action eq 'edit'-||-$branch->getmemo()-||-/if-|</textarea>
	</p>
	<p>
		<input type="submit" id="button_edit_branch" name="button_edit_branch" title="Aceptar" value="Aceptar" class="button" />
	</p>
	</fieldset>
	</form> 
</div>
