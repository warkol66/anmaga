<table border='0' cellpadding='0' cellspacing='0' width='100%'>
	<tr>
		<td class='title'>Configuración del Sistema</td>
	</tr>
	<tr>
		<td class='underlineTitle'><img src="images/clear.gif" height='3' width='1'></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class='backgroundTitle'>Códigos de Productos por Afiliado</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>A continuación podrá editar los códigos de producto de los clientes y su código equivalente.</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>
				<div id="div_affiliateproductcodes">
					|-if $message eq "ok"-|<span class="message_ok">Código de Producto por Afiliado guardado correctamente</span>|-/if-|
					|-if $message eq "deleted_ok"-|<span class="message_ok">Código de Producto por Afiliado eliminado correctamente</span>|-/if-|
					<h3><a href="Main.php?do=catalogAffiliateProductCodesEdit">Agregar Código de Producto por Afiliado</a></h3>
					<table id="tabla-affiliateproductcodes" width='100%' border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'>
						<thead>
							<tr>
								<th class="thFillTitle">Afiliado</th>
								<th class="thFillTitle">Código</th>
								<th class="thFillTitle">C&oacute;digo Anmaga, Producto</th>
								<th class="thFillTitle">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						|-foreach from=$affiliateproductcodes item=affiliateproductcode name=for_affiliateproductcodes-|
							<tr>
								<td class="tdSize1">|-assign var=affiliate value=$affiliateproductcode->getAffiliate()-||-$affiliate->getName()-|</td>
								<td class="tdSize1 right">|-$affiliateproductcode->getproductCodeAffiliate()-|</td>
								<td class="tdSize1">|-if $affiliateproductcode->getproductId() ne ""-||-assign var=product value=$affiliateproductcode->getProduct()-||-assign var=productNode value=$product->getNode()-||- $product->getCode()-|, |- $productNode->getName()-||-/if-|</td>
								<td nowrap>
									<form action="Main.php" method="get" style="display:inline;">
										<input type="hidden" name="do" value="catalogAffiliateProductCodesEdit" />
										<input type="hidden" name="id" value="|-$affiliateproductcode->getid()-|" />
										<input type="submit" name="submit_go_edit_affiliateproductcode" value="Editar" class="smallButton" />
									</form>
									<form action="Main.php" method="post" style="display:inline;">
										<input type="hidden" name="do" value="catalogAffiliateProductCodesDoDel" />
										<input type="hidden" name="id" value="|-$affiliateproductcode->getid()-|" />
										<input type="submit" name="submit_go_delete_affiliateproductcode" value="Borrar" onclick="return confirm('Seguro que desea eliminar el affiliateproductcode?')" class="smallButton" />
									</form>								</td>
							</tr>
						|-/foreach-|
						</tbody>
					</table>
				</div>
