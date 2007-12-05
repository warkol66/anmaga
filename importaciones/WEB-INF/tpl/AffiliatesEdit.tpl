<table border='0' cellpadding='0' cellspacing='0' width='100%'>
	<tr>
		<td class='title'>Configuraci&oacute;n del Sistema</td>
	</tr>
	<tr>
		<td class='underlineTitle'><img src="images/clear.gif" height='3' width='1'></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class='backgroundTitle'>Administraci&oacute;n de Afiliados</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>A continuaci&oacute;n podr&aacute; editar la lista de Afiliados del sistema.</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>
	<form method="post" action="Main.php?do=affiliatesDoEdit">
	<input type="hidden" value="|-$affiliate->getId()-|" name="id">
	<table width="100%" border="0" cellpadding="4" cellspacing="1" class="tableTdBorders">
		<tr>
			<td colspan="2" class="size2">Realice los cambios y para guardar haga click en &quot;Guardar Cambios&quot;</td>
		</tr>
		 <tr> 
			 <td width="20%" nowrap class="tdTitle">ID</td>
			<td width="80%"> 
				 <input name="affiliateId" type="text" value="|-$affiliate->getId()-|" size="4" disabled>
		   </td>
		 </tr>
		 <tr> 
			 <td class="tdTitle">Nombre:</td>
			 <td><input name="name" type="text" value="|-$affiliate->getName()-|" size="60"></td>
		 </tr>
		 <tr align="right"> 
			 <td colspan="2"> <input name="save" type="submit" class="botonchico" value="Guardar Cambios"> 
			 </td>
		 </tr>
	</table>
<br />
 [ <a href='Main.php?do=affiliatesEdit&id=|-$affiliate->getId()-|&editInfo=1' class='edit'>Editar datos Internos</a> ]	</form>
<br />
<br />
	|-if $editInfo eq 1 -|
	<form method="post" action="Main.php?do=affiliatesDoEditInfo">	
		<input name="id" type="hidden" value="|-$affiliate->getId()-|">
		<input name="flag" type="hidden" value="|-$flag-|">
	<table width="100%" border="0" cellpadding="4" cellspacing="0" class="tableTdBorders">		 
		<tr>
			<td width="20%" nowrap class="tdTitle">ID interno</td>
			<td width="80%"> 
				<input name="internalId" type="text" value="|-if $flag ne 1-| |-$affiliateInfo->getAffiliateInternalNumber()-||-/if-|" size="8"> 
			</td>
		</tr>
		<tr>
			<td width="20%" nowrap class="tdTitle">Dirección</td>
			<td width="80%"> 
				<input name="address" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getAddress()-||-/if-|" size="50"> 
			</td>
		</tr>
		<tr>
			<td width="20%" nowrap class="tdTitle">Teléfono</td>
			<td width="80%"> 
				<input name="phone" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getPhone()-||-/if-|" size="25"> 
			</td>
		</tr>
		<tr>
			<td width="20%" nowrap class="tdTitle">E-mail</td>
			<td width="80%"> 
				<input name="mail" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getEmail()-||-/if-|" size="30"> 
			</td>
		</tr>
		<tr>
			<td width="20%" nowrap class="tdTitle">Persona contacto</td>
			<td width="80%"> 
				<input name="contact" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getContact()-||-/if-|" size="40"> 
			</td>
		</tr>
		<tr>
			<td width="20%" nowrap class="tdTitle">Email persona contacto</td>
			<td width="80%"> 
				<input name="contactEmail" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getContactEmail()-||-/if-|" size="40">
			</td>
		</tr>
		<tr>
			<td width="20%" nowrap class="tdTitle">Sitio WEB</td>
			<td width="80%">
				<input name="web" type="text" value="|-if $flag ne 1-||-$affiliateInfo->getWeb()-||-/if-|" size="40">
			</td>
		</tr>
		<tr>
			<td width="20%" nowrap class="tdTitle">Información</td>
			<td width="80%"> 
				<textarea name="memo">|-if $flag ne 1-||-$affiliateInfo->getMemo()-||-/if-|</textarea>
			</td>
		</tr>

		 <tr align="right"> 
			 <td colspan="2"> <input name="save" type="submit" class="botonchico" value="Guardar Cambios"> 
			 </td>
		 </tr>
	 </table>
</form>


	 |-/if-|
</table>

 
