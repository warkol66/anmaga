<h2>Clientes y Distribuidores Mayoristas </h2> 
	<h1>|-if $action eq "edit"-|Editar|-else-|Crear|-/if-| Sucursales|-if $action eq "edit"-| - |-$branch->getname()-||-/if-|</h1> 
	<p>A continuación podrá editar la información de las sucursales</p> 
 <div id="div_branch"> 
	<form name="form_edit_branch" id="form_edit_branch" action="Main.php" method="post">
		<input type="hidden" name="id" id="id" value="|-$branch->getid()-|" />
		<input type="hidden" name="action" id="action" value="|-$action-|" /> 
		<input type="hidden" name="do" id="do" value="affiliatesBranchsDoEdit" /> 
 		|-if $message eq "error"-|
			<div class="failureMessage">Ha ocurrido un error al intentar guardar la sucursal</div>
		|-/if-|
		<fieldset title="Formulario de edición de sucursales de afiliado">
     <legend>Sucursal</legend>
		<p>Ingrese los datos de la sucursal</p> 
		 |-if $affiliates|@count gt 0-|
	<p>
	<label for="affiliateId">Afiliado</label>
		<select id="affiliateId" name="affiliateId"> 
			<option value="">Seleccionar Afiliado</option> 
				|-foreach from=$affiliates item=affiliate-|
			<option value="|-$affiliate->getId()-|" |-$branch->getAffiliateId()|selected:$affiliate->getId()-|>|-$affiliate->getName()-|</option> 
				|-/foreach-|									
		</select> 
	</p>
		|-/if-|
	<p>
	<label for="number">Sucursal No. </label>
			<input type="text" id="number" name="number" value="|-$branch->getnumber()-|" size="15" title="number" />
	</p>
	<p>
		<label for="code">Código</label>
		<input type="text" id="code" name="code" value="|-$branch->getCode()-|" size="15" title="code" />
	</p>
	<p>
		<label for="name">Nombre </label>
		<input type="text" id="name" name="name" value="|-$branch->getname()-|" title="name" size="45" maxlength="255" />
	</p>
	<p>
		<label for="phone">Teléfono</label>
		<input type="text" id="phone" name="phone" value="|-$branch->getphone()-|" title="phone" size="35" maxlength="100" />
	</p>
	<p>
		<label for="contact">Contacto</label>
		<input type="text" id="contact" name="contact" value="|-$branch->getcontact()-|" title="contact" size="45" maxlength="50" />
	</p>
	<p>
		<label for="contactEmail">Email contacto</label>
		<input type="text" id="contactEmail" name="contactEmail" value="|-$branch->getcontactEmail()-|" title="contactEmail" size="35" maxlength="100" />
	</p>
	<p>
		<label for="memo">Memo</label>
		<textarea name="memo" cols="40" rows="5" wrap="VIRTUAL" id="memo">|-if $action eq 'edit'-||-$branch->getmemo()-||-/if-|</textarea>
	</p>
	<p>
		<input type="submit" id="button_edit_branch" name="button_edit_branch" title="Aceptar" value="Aceptar" class="button" />
		<input name="rmoveFilters" type="button" value="Cancelar" onclick="location.href='Main?do=affiliatesBranchsList|-include file="FiltersRedirectUrlInclude.tpl" filters=$filters-||-if isset($page)-|&page=|-$page-||-/if-|'" class='boton' />	</p>
	</fieldset>
	</form> 
</div>
