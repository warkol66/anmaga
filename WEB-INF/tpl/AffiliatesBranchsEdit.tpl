<table border='0' cellpadding='0' cellspacing='0' width='100%'> 
	<tr> 
		<td class='title'>Clientes y Distribuidores Mayoristas </td> 
	</tr> 
	<tr> 
		<td class='underlineTitle'><img src="images/clear.gif" height='3' width='1'></td> 
	</tr> 
	<tr> 
		<td>&nbsp;</td> 
	</tr> 
	<tr> 
		<td class='backgroundTitle'>|-if $action eq "edit"-|Editar|-else-|Crear|-/if-| Sucursales|-if $action eq "edit"-| - |-$branch->getname()-||-/if-|</td> 
	</tr> 
	<tr> 
		<td>&nbsp;</td> 
	</tr> 
	<tr> 
		<td>A continuación podrá editar la información de las sucursales.</td> 
	</tr> 
	<tr> 
		<td>&nbsp;</td> 
	</tr> 
</table>
 <div id="div_branch"> 
	<form name="form_edit_branch" id="form_edit_branch" action="Main.php" method="post">
		|-if $action eq "edit"-|
			<input type="hidden" name="id" id="id" value="|-if $action eq 'edit'-||-$branch->getid()-||-/if-|" />
		|-/if-|
		<input type="hidden" name="action" id="action" value="|-$action-|" /> 
		<input type="hidden" name="do" id="do" value="affiliatesBranchsDoEdit" /> 
 		|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar la sucursal</span>|-/if-|
		<p> Ingrese los datos de la sucursal.</p> 
	<table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableTdBorders">
 		|-if $all eq "1"-|
	<tr>
		<td class="tdTitle">Afiliado</td>
		<td class="tdSize1"><select id="affiliateId" name="affiliateId"> 
				<option value="">Seleccionar Afiliado</option> 
									|-foreach from=$affiliates item=affiliate-|
				<option value="|-$affiliate->getId()-|"|-if $action eq "edit" and $branch->getAffiliateId() eq $affiliate->getId()-| selected="selected"|-/if-|>|-$affiliate->getName()-|</option> 
									|-/foreach-|									
			</select> 
</td>
	</tr>
		|-/if-|
	<tr>
		<td class="tdTitle">Número de Sucursal </td>
		<td class="tdSize1"><input type="text" id="number" name="number" value="|-if $action eq 'edit'-||-$branch->getnumber()-||-/if-|" size="15" title="number" /></td>
	</tr>
	<tr>
		<td class="tdTitle">Nombre de Sucursal</td>
		<td class="tdSize1"><input type="text" id="name" name="name" value="|-if $action eq 'edit'-||-$branch->getname()-||-/if-|" title="name" size="45" maxlength="255" /></td>
	</tr>
	<tr>
		<td class="tdTitle">Teléfono</td>
		<td class="tdSize1"><input type="text" id="phone" name="phone" value="|-if $action eq 'edit'-||-$branch->getphone()-||-/if-|" title="phone" size="45" maxlength="100" /></td>
	</tr>
	<tr>
		<td class="tdTitle">Contacto</td>
		<td class="tdSize1"><input type="text" id="contact" name="contact" value="|-if $action eq 'edit'-||-$branch->getcontact()-||-/if-|" title="contact" size="55" maxlength="50" /></td>
	</tr>
	<tr>
		<td class="tdTitle">Email contacto</td>
		<td class="tdSize1"><input type="text" id="contactEmail" name="contactEmail" value="|-if $action eq 'edit'-||-$branch->getcontactEmail()-||-/if-|" title="contactEmail" size="45" maxlength="100" /></td>
	</tr>
	<tr>
		<td class="tdTitle">Memo</td>
		<td class="tdSize1"><textarea name="memo" cols="60" rows="5" wrap="VIRTUAL" id="memo">|-if $action eq 'edit'-||-$branch->getmemo()-||-/if-|</textarea></td>
	</tr>
	<tr>
		<td colspan="2" class="buttonCell"><input type="submit" id="button_edit_branch" name="button_edit_branch" title="Aceptar" value="Aceptar" class="button" /></td>
		</tr>
</table>
	</form> 
</div>
