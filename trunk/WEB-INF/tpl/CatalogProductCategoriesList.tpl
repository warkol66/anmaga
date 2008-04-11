<h2>Catálogo de Productos </h2>
	<h1>Administrar Productos y Categorías de Productos </h1>
	<p>A continuación podrá editar los productos disponibles en el sistema </p>

<div id="div_productcategories">
	|-if $message eq "ok"-|<span class="message_ok">Product Category guardado correctamente</span>|-/if-|
	|-if $message eq "deleted_ok"-|<span class="message_ok">Product Category eliminado correctamente</span>|-/if-|
	|-if $loaded ne ""-|<span class="message_ok">Se han cargado |-$loaded-| productos</span>|-/if-|
	<h3><a href="Main.php?do=catalogProductCategoriesEdit">Agregar Categoría de Producto</a></h3>
<br>
	<hr>
	<form name="form_load_products" id="form_load_products" action="Main.php" method="post" enctype="multipart/form-data">
		<p>
			<label for="csv">Cargar Productos a partir de Archivo CSV </label>
			<input name="csv" type="file" id="csv" size="45" />
			<br><br>
			<input type="radio" name="mode" value="1">Reemplazar Catálogo</input><br>
			<input type="radio" name="mode" value="2">Reemplazar Información de Productos con Códigos Existentes</input><br>
			<input type="radio" name="mode" value="3" checked="checked">Solo Agregar Productos Nuevos</input><br>
			<input type="radio" name="mode" value="4">Solo Actualizar Precios</input>
		</p>
		<p>
			<input type="hidden" name="do" id="do" value="catalogProductsDoLoadWithCategory" />
			<input type="submit" value="Cargar" class="button" />
		</p>
	</form>
	|-if $productCategories|@count gt 0-|
	|-include file="CatalogProductCategoriesIncludeList.tpl" productCategories=$productCategories-|
	|-/if-|
</div>
