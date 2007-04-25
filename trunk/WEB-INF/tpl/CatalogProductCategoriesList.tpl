				<h2>Product Categories</h2>
				<div id="div_productcategories">
					|-if $message eq "ok"-|<span class="message_ok">Product Category guardado correctamente</span>|-/if-|
					|-if $message eq "deleted_ok"-|<span class="message_ok">Product Category eliminado correctamente</span>|-/if-|
					|-if $loaded ne ""-|<span class="message_ok">Se han cargado |-$loaded-| productos</span>|-/if-|
					<h3><a href="Main.php?do=catalogProductCategoriesEdit">Agregar Product Category</a></h3>
					
					<form name="form_load_products" id="form_load_products" action="Main.php" method="post" enctype="multipart/form-data">
						<p>
							<label for="csv">Archivo CSV de productos a cargar:</label>
							<input type="file" name="csv" id="csv" />
						</p>
						<p>
							<input type="radio" name="mode" value="1">Reemplazar Catalogo</input>
							<input type="radio" name="mode" value="2">Reemplazar Codigos Existentes</input>
							<input type="radio" name="mode" value="3" checked="checked">Solo Agregar Nuevos</input>
						</p>
						<p>
							<input type="hidden" name="do" id="do" value="catalogProductsDoLoadWithCategory" />
							<input type="submit" value="Load" />
						</p>
					</form>

					|-include file="CatalogProductCategoriesIncludeList.tpl" productCategories=$productCategories-|
				</div>
