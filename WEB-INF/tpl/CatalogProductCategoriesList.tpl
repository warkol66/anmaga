<table border='0' cellpadding='0' cellspacing='0' width='100%'>
	<tr>
		<td class='title'>Catálogo de Productos </td>
	</tr>
	<tr>
		<td class='underlineTitle'><img src="images/clear.gif" height='3' width='1'></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class='backgroundTitle'>Administrar Productos y Categorías de Productos </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>A continuación podrá editar los productos disponibles en el sistema </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table><div id="div_productcategories">
	|-if $message eq "ok"-|<span class="message_ok">Product Category guardado correctamente</span>|-/if-|
	|-if $message eq "deleted_ok"-|<span class="message_ok">Product Category eliminado correctamente</span>|-/if-|
	|-if $loaded ne ""-|<span class="message_ok">Se han cargado |-$loaded-| productos</span>|-/if-|
	<h3><a href="Main.php?do=catalogProductCategoriesEdit">Agregar Categoría de Producto</a></h3>
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
	|-include file="CatalogProductCategoriesIncludeList.tpl" productCategories=$productCategories-|
</div>
