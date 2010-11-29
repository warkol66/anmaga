|- if (isset($currentUser) and ($currentUser->isSupplier())) -|
<table class='tableTdBorders' cellpadding='5' cellspacing='1' width='100%'>
	<tr>
		<td colspan='4' class='celltitulo2'>Relacionar cuenta de usuario con proveedor del Sistema</td>
	</tr>
</table>
<form action='Main.php' method='post'>
<input type="hidden" name="do" value="usersDoLinkToSupplier" />
<table width='100%' border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'>
		<tr>
			<td nowrap="nowrap" class='tdTitle'>Supplier Relacionado</td>
			<td><select name='supplierId'>
				<option value="">Seleccionar Supplier</option>
				|-foreach from=$suppliers item=supplier name=for_suppliers-|
				<option value="|-$supplier->getId()-|" |-if (isset($userSupplier)) and ($userSupplier->getSupplierId() eq $supplier->getId())-|selected="selected"|-/if-|>|-$supplier->getName()-|</option>
				|-/foreach-|
			</select>
			</td>
		</tr>		
		<tr>
			<td class='cellboton' colspan='2'>
				<input type="hidden" name="userId" value="|-$currentUser->getId()-|" />
				<input type='submit' value='Relacionar' class='button' />
			</td>
		</tr>
</table>
</form>

|-/if-|