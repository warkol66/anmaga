				<div id="div_productcategory">
					<form name="form_edit_productcategory" id="form_edit_productcategory" action="Main.php" method="post" enctype="multipart/form-data">
						|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar la categoria de producto</span>|-/if-|
						|-if $loaded ne ""-|<span class="message_ok">Se han cargado |-$loaded-| productos en esta categoria</span>|-/if-|
						<h3>|-if $action eq "edit"-|Edit|-else-|Create|-/if-| Product Category</h3>
						<p>
							Ingrese los datos de la categoria de producto.
						</p>
						<fieldset title="Formulario de edición de datos de una categoria de producto">
							|-if $action eq "edit"-||-assign var=category value=$node->getInfo()-||-/if-|
							<p>
								<label for="name">Name</label>
								<input type="text" id="name" name="name" value="|-if $action eq "edit"-||-$node->getname()-||-/if-|" title="name" maxlength="255" />
							</p>
							<p>
								<label for="description">Description</label>
								<textarea id="description" name="description">|-if $action eq "edit"-||-$category->getdescription()-||-/if-|</textarea>
							</p>
							|-if $action eq "edit"-|
							<div>
								<img src="Main.php?do=productCategoriesGetImage&id=|-$category->getId()-|" alt="|-$node->getname()-|" />
							</div>
							|-/if-|
							<p>
								<label for="image">Image</label>
								<input type="file" id="image" name="image" title="image" />
							</p>
							<p>
								|-if $action eq "edit"-|
								<input type="hidden" name="id" id="id" value="|-if $action eq "edit"-||-$node->getid()-||-/if-|" />
								|-/if-|
								<input type="hidden" name="parentNodeId" id="parentNodeId" value="|-$parentNodeId-|" />
								<input type="hidden" name="action" id="action" value="|-$action-|" />
								<input type="hidden" name="do" id="do" value="catalogProductCategoriesDoEdit" />
								<input type="submit" id="button_edit_productcategory" name="button_edit_productcategory" title="Aceptar" value="Aceptar" class="boton" />
							</p>
			      </fieldset>
					</form>
					
					
					|-if $action eq "edit"-|
					<form name="form_load_products" id="form_load_products" action="Main.php" method="post" enctype="multipart/form-data">
						<p>
							<label for="csv">Archivo CSV de productos a cargar en esta categoria:</label>
							<input type="file" name="csv" id="csv" />
						</p>
						<p>
							<input type="radio" name="mode" value="1">Reemplazar Catalogo de la Categoria</input>
							<input type="radio" name="mode" value="2">Reemplazar Codigos Existentes</input>
							<input type="radio" name="mode" value="3" checked="checked">Solo Agregar Nuevos</input>
							<input type="radio" name="mode" value="4">Solo Actualizar Precios</input>
						</p>
						<p>
							<input type="hidden" name="parentNodeId" id="parentNodeId" value="|-$node->getId()-|" />
							<input type="hidden" name="do" id="do" value="catalogProductsDoLoadInCategory" />
							<input type="submit" value="Load" />
						</p>
					</form>
					|-/if-|

				</div>


