<table width="100%" border="0" cellpadding="4" cellspacing="0" class="tableTdBorders"> 
	<tr> 
		<td width="20%" nowrap class="tdTitle">ID Afiliado:</td> 
		<td> |-$affiliate->getId()-| </td> 
	</tr> 
	<tr> 
		<td width="20%" nowrap class="tdTitle">Nombre:</td> 
		<td>|-$affiliate->getName()-|</td> 
	</tr> 
	|-if $flag ne 1 -|
	<tr> 
		<td width="20%" nowrap class="tdTitle">ID interno</td> 
		<td> |-$affiliateInfo->getAffiliateInternalNumber()-| </td> 
	</tr> 
	<tr> 
		<td width="20%" nowrap class="tdTitle">Dirección</td> 
		<td> |-$affiliateInfo->getAddress()-| </td> 
	</tr> 
	<tr> 
		<td width="20%" nowrap class="tdTitle">Teléfono</td> 
		<td> |-$affiliateInfo->getPhone()-| </td> 
	</tr> 
	<tr> 
		<td width="20%" nowrap class="tdTitle">E-mail</td> 
		<td> |-$affiliateInfo->getEmail()-| </td> 
	</tr> 
	<tr> 
		<td width="20%" nowrap class="tdTitle">Persona contacto</td> 
		<td> |-$affiliateInfo->getContact()-| </td> 
	</tr> 
	|-/if-|
	<tr align="right"> 
		<td colspan="2"><a href='Main.php?do=affiliatesList'>Volver</a></td> 
	</tr> 
</table>
