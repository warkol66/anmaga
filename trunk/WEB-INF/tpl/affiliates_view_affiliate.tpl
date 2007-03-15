	<table>		 
		<tr class="row_even"> 
			 <td nowrap class="style6">ID Afiliado:</td>
			 <td> 
				 |-$affiliate->getId()-|
		   </td>
		</tr>
		<tr class="row_even"> 
			 <td class="style6">Nombre:</td>
			 <td>|-$affiliate->getName()-|</td>
		</tr>
		|-if $flag ne 1 -|
		<tr class="row_even">
			<td nowrap class="style6">ID interno :&nbsp;</td>
			<td> 
				|-$affiliateInfo->getAffiliateInternalNumber()-|
			</td>
		</tr>
		<tr class="row_even">
			<td nowrap class="style6">Direccion :&nbsp;</td>
			<td> 
				|-$affiliateInfo->getAddress()-| 
			</td>
		</tr>
		<tr class="row_even">
			<td nowrap class="style6">Telefono :&nbsp;</td>
			<td> 
				|-$affiliateInfo->getPhone()-|
			</td>
		</tr>
		<tr class="row_even">
			<td nowrap class="style6">E-mail :&nbsp;</td>
			<td> 
				|-$affiliateInfo->getEmail()-| 
			</td>
		</tr>
		<tr class="row_even">
			<td nowrap class="style6">Persona contacto :&nbsp;</td>
			<td> 
				|-$affiliateInfo->getContact()-| 
			</td>
		</tr>
		|-/if-|
		 <tr align="right"> 
			 <td colspan="2"><a href='Main.php?do=affiliatesList'>Volver</a>
			 </td>
		 </tr>
	 </table>