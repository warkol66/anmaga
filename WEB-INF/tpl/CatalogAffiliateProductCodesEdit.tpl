				<div id="div_affiliateproductcode">
					<form name="form_edit_affiliateproductcode" id="form_edit_affiliateproductcode" action="Main.php" method="post">
						|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar el codigo de producto por afiliado</span>|-/if-|
						<h3>|-if $action eq "edit"-|Editar|-else-|Crear|-/if-| Codigo de Producto por Afiliado</h3>
						<p>
							Ingrese los datos del codigo de producto por afiliado.
						</p>
						<table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableTdBorders">					
							<tr>
								<td class="tdTitle">Afiliado:</td>
								<td class="tdSize1">
									<select id="affiliateId" name="affiliateId" title="affiliateId">
									|-foreach from=$affiliates item=affiliate name=for_affiliates-|
										<option value="|-$affiliate->getId()-|"|-if $affiliateproductcode->getAffiliateId() eq $affiliate->getId()-| selected="selected"|-/if-|>|-$affiliate->getName()-|</option>
									|-/foreach-|
									</select>
								</td>
							</tr>
							<tr>
								<td class="tdTitle">Producto: </td>
								<td class="tdSize1">
									<select name="productCode">
									|- foreach from=$products item=product -|
										|-assign var=productNode value=$product->getNode()-| 
										<option value="|-$product->getCode()-|"|-if $affiliateproductcode->getProductCode() eq $product->getCode()-| selected="selected"|-/if-|>|- $product->getCode()-|, |- $productNode->getName()-|</option>
									|-/foreach-|
									</select>
								</td>
							</tr>
							<tr>
								<td class="tdTitle">Codigo para el Afiliado: </td>
								<td class="tdSize1">
									<input type="text" id="productCodeAffiliate" name="productCodeAffiliate" value="|-if $action eq "edit"-||-$affiliateproductcode->getproductCodeAffiliate()-||-/if-|" title="productCodeAffiliate" maxlength="255" />
								</td>
							</tr>
							<tr>
								<td colspan="2" class="buttonCell">
									|-if $action eq "edit"-|
									<input type="hidden" name="id" id="id" value="|-if $action eq "edit"-||-$affiliateproductcode->getid()-||-/if-|" />
									|-/if-|
									<input type="hidden" name="action" id="action" value="|-$action-|" />
									<input type="hidden" name="do" id="do" value="catalogAffiliateProductCodesDoEdit" />
									<input type="submit" id="button_edit_affiliateproductcode" name="button_edit_affiliateproductcode" title="Aceptar" value="Aceptar" class="boton" />
								</td>
							</tr>
			      		</table>
					</form>
				</div>
