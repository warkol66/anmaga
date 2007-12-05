<?php /* Smarty version 2.6.16, created on 2007-11-27 00:25:06
         compiled from CatalogProductCategoriesList.tpl */ ?>
				<h2>Product Categories</h2>
				<div id="div_productcategories">
					<?php if ($this->_tpl_vars['message'] == 'ok'): ?><span class="message_ok">Product Category guardado correctamente</span><?php endif; ?>
					<?php if ($this->_tpl_vars['message'] == 'deleted_ok'): ?><span class="message_ok">Product Category eliminado correctamente</span><?php endif; ?>
					<?php if ($this->_tpl_vars['loaded'] != ""): ?><span class="message_ok">Se han cargado <?php echo $this->_tpl_vars['loaded']; ?>
 productos</span><?php endif; ?>
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
							<input type="radio" name="mode" value="4">Solo Actualizar Precios</input>
						</p>
						<p>
							<input type="hidden" name="do" id="do" value="catalogProductsDoLoadWithCategory" />
							<input type="submit" value="Load" />
						</p>
					</form>

					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CatalogProductCategoriesIncludeList.tpl", 'smarty_include_vars' => array('productCategories' => $this->_tpl_vars['productCategories'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</div>