<h2>Catálogo</h2>
<h1>|-if $action eq 'edit'-|Editar|-else-|Crear|-/if-| Producto</h1>
<div id="div_product"> 
	<form name="form_edit_product" id="form_edit_product" action="Main.php" method="post" enctype="multipart/form-data">
 		|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar el producto</span>|-/if-|
		<p>Ingrese los datos del producto.</p> 
		<fieldset title="Formulario de edición de datos de un producto">
		<p> 
			<label for="product[code]">Código</label> 
			<input name="product[code]" type="text" id="code" title="code" value="|-$product->getcode()-|" size="20" maxlength="255" /> 
		</p> 
		<p> 
			<label for="product[orderCode]">Código de Ordenamiento</label> 
			<input name="product[orderCode]" type="text" id="orderCode" title="orderCode" value="|-$product->getOrderCode()-|" size="20" maxlength="255" /> 
		</p> 
		<p> 
			<label for="product[name]">Nombre</label> 
			<input name="product[name]" type="text" id="name" title="name" value="|-$product->getname()|escape-|" size="60" maxlength="255" /> 
			</p> 
		<p> 
			<label for="product[description]">Descripción</label> 
			<textarea name="product[description]" cols="60" rows="4" wrap="VIRTUAL" id="description">|-$product->getdescription()|escape-|</textarea> 
		</p> 
		<p> 
			<label for="product[price]">Precio</label> 
			<input name="product[price]" type="text" id="price" title="price" value="|-$product->getprice()|system_numeric_format-|" size="15" /> 
		</p> 
		|-if $action eq 'edit'-|
			<label for="actualImage">Imagen</label> 
		<div id="actualImage"> <img src="Main.php?do=catalogProductsGetImage&code=|-$product->getCode()-|" alt="|-$product->getname()|escape-|" /> </div> 
		|-/if-|
		<p> 
			<label for="image">Cargar Imagen</label> 
			<input type="file" id="image" name="image" title="image" /> 
		</p> 
		|-if $product->getId() eq ''-|
		<p> 
			<label for="categoryId">Categoría</label> 
			<select name="product[categoryId]" id="categoryId"> 
				<option value="">Seleccione Categoría</option> 
									|-include file="CatalogProductCategoriesIncludeOptions.tpl" productCategories=$productCategories-|
			</select> 
		</p>
		|-/if-|
		<p> 
			<label for="unitId">Unidad</label> 
			<select name="product[unitId]" id="unitId"> 
				<option value="">Seleccionar Unidad</option> 
									|-foreach from=$units item=unit-|
				<option value="|-$unit->getId()-|"|-if $unit->getId() eq $product->getUnitId()-| selected="selected"|-/if-|>|-$unit->getName()-|</option> 
									|-/foreach-|
			</select> 
		</p> 
		<p> 
			<label for="measureUnitId">Unidad de Medida</label> 
			<select name="product[measureUnitId]" id="measureUnitId"> 
				<option value="">Seleccionar Unidad de Medida</option> 
									|-foreach from=$measureUnits item=measureUnit-|
				<option value="|-$measureUnit->getId()-|"|-if $measureUnit->getId() eq $product->getMeasureUnitId()-| selected="selected"|-/if-|>|-$measureUnit->getName()-|</option> 
									|-/foreach-|
			</select> 
		</p> 
		<p> 
			<label for="salesUnit">Unidad de Venta</label> 
			<input name="product[salesUnit]" type="text" id="salesUnit" value="|-$product->getSalesUnit()-|" size="8" maxlength="4" /> 
		</p> 		
		<p> 
			<label for="stock01">Stock 01</label> 
			<input name="product[stock01]" type="text" id="stock01" value="|-$product->getStock01()-|" size="12" maxlength="6" /> 
		</p> 		
		<p> 
			<label for="stock02">Stock 02</label> 
			<input name="product[stock02]" type="text" id="stock02" value="|-$product->getStock02()-|" size="12" maxlength="6" /> 
		</p> 		
		<p> 
			<label for="stock03">Stock 03</label> 
			<input name="product[stock03]" type="text" id="stock03" value="|-$product->getStock03()-|" size="12" maxlength="6" /> 
		</p> 		
		<p> 
			<label for="stockAlert">Alerta Stock</label> 
			<select name="product[stockAlert]" id="stockAlert"> 
				<option value="">Seleccionar</option> 
				<option value="1"|-$product->getStockAlert()|selected:1-|>Bajo</option> 
				<option value="2"|-$product->getStockAlert()|selected:2-|>Medio</option> 
				<option value="3"|-$product->getStockAlert()|selected:3-|>alto</option> 
			</select> 
		</p> 		
		<p> |-if $action eq 'edit'-|
			<input type="hidden" name="id" id="id" value="|-if $action eq 'edit'-||-$product->getid()-||-/if-|" /> |-/if-|
			<input type="hidden" name="action" id="action" value="|-$action-|" /> 
			<input type="hidden" name="do" id="do" value="catalogProductsDoEdit" /> 
			<input type="submit" id="button_edit_product" name="button_edit_product" title="Aceptar" value="Aceptar" class="boton" /> 
		</p> 
		</fieldset> 
	</form> 
</div>
|-if $product->getId() ne ''-|
|-include file="CatalogProductsEditCategoriesInclude.tpl"-|
|-/if-|
