<table border='0' cellpadding='0' cellspacing='0' width='100%'>
	<tr>
		<td class='titulo'>Configuraci&oacute;n del Sistema</td>
	</tr>
	<tr>
		<td class='subrayatitulo'><img src="images/clear.gif" height='3' width='1'></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class='fondotitulo'>Administraci&oacute;n de Afiliados</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class='texto'>A continuaci&oacute;n podr&aacute; editar la lista de Afiliados del sistema.</td>
	</tr>
	<tr>
		<td class='texto'>&nbsp;</td>
	</tr>
</table>
	<form method="post" action="Main.php?do=affiliatesDoEdit">
	<input type="hidden" value="|-$affiliate->getId()-|" name="id">
	<table width="100%" border="0" cellpadding="4" cellspacing="1" class="tableTdBorders">
		<tr>
			<td colspan="2" class="size2">Realice los cambios y para guardar haga click en &quot;Guardar Cambios&quot;</td>
		</tr>
		 <tr> 
			 <td nowrap class="style6">ID</td>
			 <td> 
				 <input name="affiliateId" type="text" value="|-$affiliate->getId()-|" size="4" disabled>
		   </td>
		 </tr>
		 <tr> 
			 <td class="style6">Nombre:</td>
			 <td><input name="name" type="text" value="|-$affiliate->getName()-|" size="60"></td>
		 </tr>
		 <tr align="right"> 
			 <td colspan="2"> <input name="save" type="submit" class="botonchico" value="Guardar Cambios"> 
			 </td>
		 </tr>
		 <tr>
			<td class='cellopciones' nowrap> [ <a href='Main.php?do=affiliatesEdit&id=|-$affiliate->getId()-|&editInfo=1' class='edit'>Editar datos Internos</a> ]
			</td>
		 </tr>
	</table>
	</form>
	|-if $editInfo eq 1 -|
	<form method="post" action="Main.php?do=affiliatesDoEditInfo">	
	<table>		 
		<input name="id" type="hidden" value="|-$affiliate->getId()-|">
		<input name="flag" type="hidden" value="|-$flag-|">
		<tr class="row_even">
			<td nowrap class="style6">ID interno :&nbsp;</td>
			<td> 
				<input name="internalId" type="text" value="|-if $flag ne 1-| |-$affiliateInfo->getAffiliateInternalNumber()-||-/if-|" size="10"> 
			</td>
		</tr>
		<tr class="row_even">
			<td nowrap class="style6">Direccion :&nbsp;</td>
			<td> 
				<input name="address" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getAddress()-||-/if-|" size="10"> 
			</td>
		</tr>
		<tr class="row_even">
			<td nowrap class="style6">Telefono :&nbsp;</td>
			<td> 
				<input name="phone" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getPhone()-||-/if-|" size="10"> 
			</td>
		</tr>
		<tr class="row_even">
			<td nowrap class="style6">E-mail :&nbsp;</td>
			<td> 
				<input name="mail" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getEmail()-||-/if-|" size="10"> 
			</td>
		</tr>
		<tr class="row_even">
			<td nowrap class="style6">Persona contacto :&nbsp;</td>
			<td> 
				<input name="contact" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getContact()-||-/if-|" size="10"> 
			</td>
		</tr>
		
		 <tr align="right"> 
			 <td colspan="2"> <input name="save" type="submit" class="botonchico" value="Editar Datos Internos"> 
			 </td>
		 </tr>
	 </table>
	 </form>


	 |-/if-|
</table>

 