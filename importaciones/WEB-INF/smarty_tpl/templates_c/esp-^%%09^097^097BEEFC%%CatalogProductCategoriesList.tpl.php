<?php /* Smarty version 2.6.16, created on 2007-11-30 12:51:35
         compiled from CatalogProductCategoriesList.tpl */ ?>
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
	<?php if ($this->_tpl_vars['message'] == 'ok'): ?><span class="message_ok">Product Category guardado correctamente</span><?php endif; ?>
	<?php if ($this->_tpl_vars['message'] == 'deleted_ok'): ?><span class="message_ok">Product Category eliminado correctamente</span><?php endif; ?>
	<?php if ($this->_tpl_vars['loaded'] != ""): ?><span class="message_ok">Se han cargado <?php echo $this->_tpl_vars['loaded']; ?>
 productos</span><?php endif; ?>
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
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CatalogProductCategoriesIncludeList.tpl", 'smarty_include_vars' => array('productCategories' => $this->_tpl_vars['productCategories'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>