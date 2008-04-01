<h2>Catálogo</h2>
<h1>|-if $action eq 'edit'-|Editar|-else-|Crear|-/if-| Producto</h1>
<div id="div_product"> 
	<form name="form_edit_product" id="form_edit_product" action="Main.php" method="post" enctype="multipart/form-data">
 		|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar el producto</span>|-/if-|
		<p>Ingrese los datos del producto.</p> 
		<fieldset title="Formulario de edición de datos de un producto">
 		|-if $action eq 'edit'-||-assign var=product value=$node->getInfo()-||-/if-|
		<p> 
			<label for="code">Código</label> 
			<input name="code" type="text" id="code" title="code" value="|-if $action eq 'edit'-||-$product->getcode()-||-/if-|" size="40" maxlength="255" /> 
			</p> 
		<br clear="all">
		<p> 
			<label for="name">Nombre</label> 
			<input name="name" type="text" id="name" title="name" value="|-if $action eq 'edit'-||-$node->getname()-||-/if-|" size="60" maxlength="255" /> 
			</p> 
		<br clear="all">
		<p> 
			<label for="description">Descripción</label> 
			<textarea name="description" cols="60" rows="6" wrap="VIRTUAL" id="description">|-if $action eq 'edit'-||-$product->getdescription()-||-/if-|</textarea> 
		</p> 
		<br clear="all">
		<p> 
			<label for="price">Precio</label> 
			<input name="price" type="text" id="price" title="price" value="|-if $action eq 'edit'-||-$product->getprice()-||-/if-|" size="20" /> 
			</p> 
		<br clear="all">
		|-if $action eq 'edit'-|
		<div> <img src="Main.php?do=catalogProductsGetImage&id=|-$node->getId()-|" alt="|-$node->getname()-|" /> </div> 
		|-/if-|
		<p> 
			<label for="image">Imagen</label> 
			<input type="file" id="image" name="image" title="image" /> 
		</p> 
		<br clear="all">
		<p> 
			<label for="parentNodeId">Categoría</label> 
			<select name="parentNodeId" id="parentNodeId"> 
				<option value="">Seleccione Categoría</option> 
									|-include file="CatalogProductCategoriesIncludeOptions.tpl" productCategories=$productCategories-|
			</select> 
		</p>
		<br clear="all">
		<p> 
			<label for="unitId">Unidad</label> 
			<select name="unitId" id="unitId"> 
				<option value="">Seleccionar Unidad</option> 
									|-foreach from=$units item=unit-|
				<option value="|-$unit->getId()-|"|-if $action eq 'edit' and $unit->getId() eq $product->getUnitId()-| selected="selected"|-/if-|>|-$unit->getName()-|</option> 
									|-/foreach-|
			</select> 
		</p> 
		<br clear="all">
		<p> 
			<label for="measureUnitId">Unidad de Medida</label> 
			<select name="measureUnitId" id="measureUnitId"> 
				<option value="">Seleccionar Unidad de Medida</option> 
									|-foreach from=$measureUnits item=measureUnit-|
				<option value="|-$measureUnit->getId()-|"|-if $action eq 'edit' and $measureUnit->getId() eq $product->getMeasureUnitId()-| selected="selected"|-/if-|>|-$measureUnit->getName()-|</option> 
									|-/foreach-|
			</select> 
		</p> 
		<br clear="all">
		<p> |-if $action eq 'edit'-|
			<input type="hidden" name="id" id="id" value="|-if $action eq 'edit'-||-$node->getid()-||-/if-|" /> |-/if-|
			<input type="hidden" name="action" id="action" value="|-$action-|" /> 
			<input type="hidden" name="do" id="do" value="catalogProductsDoEdit" /> 
			<input type="submit" id="button_edit_product" name="button_edit_product" title="Aceptar" value="Aceptar" class="boton" /> 
		</p> 
		</fieldset> 
	</form> 
</div>
