<h2>Precios Por Afiliado</h2>
<h1>Listado de Precios Por Afiliado</h1>
	<p>Seleccione una afiliado para buscar su lista de precios.</p>
<p>			<form method="get" >
				<select name="affiliateId">
					<option value="" selected="selected">Seleccione un Afiliado</option>
				|-foreach from=$affiliates item=affiliate name=for_affiliates-|
					<option value="|-$affiliate->getId()-|" selected="selected">|-$affiliate->getName()-|&nbsp;&nbsp;&nbsp;</option>
				|-/foreach-|
				</select>
				<input type="hidden" name="do" value="catalogAffiliateProductList" />
				<input type="submit" name="search" value="Ver Lista de Precios" />
			</form>
</p>
|-if isset($productNodes)-|
	<table width="100%" cellpadding="4" cellspacing="0" class="tableTdBorders" id="tabla-products"> 
		<thead> 
			<tr> 
				<th width="5%" class="thFillTitle">Código Producto</th> 
				<th width="5%" class="thFillTitle">Código Producto Para Afiliado</th>
				<th width="35%" class="thFillTitle">Nombre</th> 
				<th width="50%" class="thFillTitle">Descripción</th> 
				<th width="5%" class="thFillTitle">Precio</th> 
			</tr>
		</thead>
		<tbody>  |-foreach from=$productNodes item=productNode name=for_products-| |-assign var=product value=$productNode->getInfo()-|
		<tr>
			<td nowrap class="tdSize1 right">|-$product->getcode()-|</td>
			<td nowrap class="tdSize1 right">|-$product->getAffiliateCode($affiliateId)-| </td>
			<td class="tdSize1">|-$productNode->getname()-|</td>
			<td class="tdSize1">|-$product->getdescription()-|</td>
			<td nowrap class="tdSize1 right">|-if $product->getAffiliatePrice($affiliateId) neq 0-||-$product->getAffiliatePrice($affiliateId)|system_numeric_format-||-/if-|</td>
		</tr>
		|-foreachelse-|
		<tr>
			<td colspan="5">Sin Lista de Productos</td>
		</tr>
		|-/foreach-|
		<tr>
			<td colspan="5" class="pages">|-include file="PaginateInclude.tpl"-|</td>
		</tr> 
		</tbody> 
</table> 
|-/if-|
</div>