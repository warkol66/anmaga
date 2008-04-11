<h2>Configuración del Sistema</h2>
<h1>|-if $action eq 'edit'-|Editar|-else-|Crear|-/if-| Código de Producto por Afiliado</h1>
<p>Ingrese los datos del código de producto por afiliado.</p>
<div id="div_affiliateproductcode"> 
	<form name="form_edit_affiliateproductcode" id="form_edit_affiliateproductcode" action="Main.php" method="post">
 		|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar el código de producto por afiliado</span>|-/if-|
		<fieldset title="Formulario de edición de códigos de producto de afiliado">
     <legend>Editor de códigos</legend>
     <p>Ingrese los datos del código equivalente</p>
		 <p><label for="affiliateId">Afiliado</label>
				<select id="affiliateId" name="affiliateId" title="affiliateId"> 
						|-foreach from=$affiliates item=affiliate name=for_affiliates-|
					<option value="|-$affiliate->getId()-|"|-if $affiliateproductcode->getAffiliateId() eq $affiliate->getId()-| selected="selected"|-/if-|>|-$affiliate->getName()-|&nbsp;&nbsp;&nbsp;</option> 
						|-/foreach-|
				</select>
			</p>
		 <p><label for="productCode">Producto</label>
				<select name="productCode"> 
					|- foreach from=$products item=product -|
						|-assign var=productNode value=$product->getNode()-| 
					<option value="|-$product->getCode()-|"|-if $affiliateproductcode->getProductCode() eq $product->getCode()-| selected="selected"|-/if-|>|- $product->getCode()-|, |- $productNode->getName()-|</option> 
					|-/foreach-|
				</select>
			</p>
		 <p><label for="productCodeAffiliate">Código Afiliado</label>
				<input type="text" id="productCodeAffiliate" name="productCodeAffiliate" value="|-if $action eq 'edit'-||-$affiliateproductcode->getproductCodeAffiliate()-||-/if-|" title="productCodeAffiliate" maxlength="255" />
			</p>
				<p> |-if $action eq 'edit'-|
					<input type="hidden" name="id" id="id" value="|-if $action eq 'edit'-||-$affiliateproductcode->getid()-||-/if-|" /> 
					|-/if-|
					<input type="hidden" name="action" id="action" value="|-$action-|" /> 
					<input type="hidden" name="do" id="do" value="catalogAffiliateProductCodesDoEdit" /> 
					<input type="hidden" name="page" id="page" value="|-$page-|" /> 
					<input type="submit" id="button_edit_affiliateproductcode" name="button_edit_affiliateproductcode" title="Aceptar" value="Aceptar" class="boton" /> </td> 
	</p>
	</fieldset>
	</form> 
	<input type="button" onclick="javascript:window.location.href='Main.php?do=catalogAffiliateProductCodesList&page=|-$page-|'" value="Regresar" class="button" /> 
</div>
