				<div id="div_product">
					<form name="form_edit_product" id="form_edit_product" action="Main.php" method="post" enctype="multipart/form-data">
						|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar el producto</span>|-/if-|
						<h3>|-if $action eq "edit"-|Edit|-else-|Create|-/if-| Product</h3>
						<p>
							Ingrese los datos del producto.
						</p>
						<fieldset title="Formulario de edición de datos de un producto">
							|-if $action eq "edit"-||-assign var=product value=$node->getInfo()-||-/if-|
							<p>
								<label for="code">code</label>
								<input type="text" id="code" name="code" value="|-if $action eq "edit"-||-$product->getcode()-||-/if-|" title="code" maxlength="255" />
							</p>
							<p>
								<label for="name">name</label>
								<input type="text" id="name" name="name" value="|-if $action eq "edit"-||-$node->getname()-||-/if-|" title="name" maxlength="255" />
							</p>
							<p>
								<label for="description">description</label>
								<textarea id="description" name="description">|-if $action eq "edit"-||-$product->getdescription()-||-/if-|</textarea>
							</p>
							<p>
								<label for="price">price</label>
								<input type="text" id="price" name="price" value="|-if $action eq "edit"-||-$product->getprice()-||-/if-|" title="price" />
							</p>
							|-if $action eq "edit"-|
							<div>
								<img src="Main.php?do=catalogProductsGetImage&id=|-$node->getId()-|" alt="|-$node->getname()-|" />
							</div>
							|-/if-|
							<p>
								<label for="image">image</label>
								<input type="file" id="image" name="image" title="image" />
							</p>
							<p>
								<label for="parentNodeId">Category</label>
								<select name="parentNodeId" id="parentNodeId">
									<option value="">Select Category</option>
									|-include file="CatalogProductCategoriesIncludeOptions.tpl" productCategories=$productCategories-|
								</select>
							</p>
							<p>
								<label for="unitId">Unidad</label>
								<select name="unitId" id="unitId">
									<option value="">Seleccionar Unidad</option>
									|-foreach from=$units item=unit-|
									<option value="|-$unit->getId()-|"|-if $action eq "edit" and $unit->getId() eq $product->getUnitId()-| selected="selected"|-/if-|>|-$unit->getName()-|</option>
									|-/foreach-|
								</select>
							</p>
							<p>
								<label for="measureUnitId">Unidad de Medida</label>
								<select name="measureUnitId" id="measureUnitId">
									<option value="">Seleccionar Unidad de Medida</option>
									|-foreach from=$measureUnits item=measureUnit-|
									<option value="|-$measureUnit->getId()-|"|-if $action eq "edit" and $measureUnit->getId() eq $product->getMeasureUnitId()-| selected="selected"|-/if-|>|-$measureUnit->getName()-|</option>
									|-/foreach-|
								</select>
							</p>
							<p>
								|-if $action eq "edit"-|
								<input type="hidden" name="id" id="id" value="|-if $action eq "edit"-||-$node->getid()-||-/if-|" />
								|-/if-|
								<input type="hidden" name="action" id="action" value="|-$action-|" />
								<input type="hidden" name="do" id="do" value="catalogProductsDoEdit" />
								<input type="submit" id="button_edit_product" name="button_edit_product" title="Aceptar" value="Aceptar" class="boton" />
							</p>
			      </fieldset>
					</form>
				</div>
