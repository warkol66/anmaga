<h2>Catálogo de Productos </h2>
	<h1>Administrar Categorías de Productos </h1>
	<p>A continuación podrá editar las categorías de productos disponibles en el sistema </p>
<div id="div_productcategory">
	<form name="form_edit_productcategory" id="form_edit_productcategory" action="Main.php" method="post" enctype="multipart/form-data">
		|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar la categoría de producto</span>|-/if-|
		|-if $loaded ne ""-|<span class="message_ok">Se han cargado |-$loaded-| productos en esta categoría</span>|-/if-|
		<p>Ingrese los datos de la categoría de producto</p>
		<fieldset title="Formulario de edicin de datos de una categoria de producto">
     <legend>Categoría de Producto</legend>
		 		<p>|-if $action eq "edit"-|Editar|-else-|Crear|-/if-| Categorías de Productos</p>
			|-if $action eq "edit"-||-assign var=category value=$node->getInfo()-||-/if-|
			<p>
				<label for="name">Categoría</label>
				<input type="text" id="name" name="name" value="|-if $action eq 'edit'-||-$node->getname()-||-/if-|" title="name" size="45" maxlength="255" />
			</p>
			<p>
				<label for="description">Descripción</label>
				<textarea name="description" cols="45" rows="5" wrap="virtual" id="description">|-if $action eq "edit"-||-$category->getdescription()-||-/if-|</textarea>
			</p>
			|-if $action eq "edit"-|
			<div>
				<img src="Main.php?do=productCategoriesGetImage&id=|-$category->getId()-|" alt="|-$node->getname()-|" />
			</div>
			|-/if-|
			<p>
				<label for="image">Imagen</label>
				<input type="file" id="image" name="image" title="image" />
			</p>
			<p>
				|-if $action eq "edit"-|
				<input type="hidden" name="id" id="id" value="|-if $action eq "edit"-||-$node->getid()-||-/if-|" />
				|-/if-|
				<input type="hidden" name="parentNodeId" id="parentNodeId" value="|-$parentNodeId-|" />
				<input type="hidden" name="action" id="action" value="|-$action-|" />
				<input type="hidden" name="do" id="do" value="catalogProductCategoriesDoEdit" />
				<input type="submit" id="button_edit_productcategory" name="button_edit_productcategory" title="Aceptar" value="Aceptar" class="button" />
			</p>
		</fieldset>
	</form>
	
	
	|-if $action eq "edit"-|
	<form name="form_load_products" id="form_load_products" action="Main.php" method="post" enctype="multipart/form-data">
		<p>
			<label for="csv">Cargar Archivo CSV en esta categoría:</label>
			<input type="file" name="csv" id="csv" />
		</p><br />
<br />
<br />
<br />

		<p>
			<input type="radio" name="mode" value="1">Reemplazar Catálogo de la Categoría</input>
			<input type="radio" name="mode" value="2">Reemplazar Información de Productos con Códigos Existentes</input>
			<input type="radio" name="mode" value="3" checked="checked">Solo Agregar Nuevos</input>
			<input type="radio" name="mode" value="4">Solo Actualizar Precios (Código;precio)</input>
		</p>
		<p>
			<input type="hidden" name="parentNodeId" id="parentNodeId" value="|-$node->getId()-|" />
			<input type="hidden" name="do" id="do" value="catalogProductsDoLoadInCategory" />
			<input type="submit" value="Cargar" class="button" />
		</p>
	</form>
	|-/if-|

</div>


