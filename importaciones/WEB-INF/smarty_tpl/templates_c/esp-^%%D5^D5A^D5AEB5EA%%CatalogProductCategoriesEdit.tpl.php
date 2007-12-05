<?php /* Smarty version 2.6.16, created on 2007-11-30 12:40:01
         compiled from CatalogProductCategoriesEdit.tpl */ ?>
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
		<td class='backgroundTitle'>Administrar Categorías de Productos </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>A continuación podrá editar las categorías de productos disponibles en el sistema </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>
<div id="div_productcategory">
	<form name="form_edit_productcategory" id="form_edit_productcategory" action="Main.php" method="post" enctype="multipart/form-data">
		<?php if ($this->_tpl_vars['message'] == 'error'): ?><span class="message_error">Ha ocurrido un error al intentar guardar la categoría de producto</span><?php endif; ?>
		<?php if ($this->_tpl_vars['loaded'] != ""): ?><span class="message_ok">Se han cargado <?php echo $this->_tpl_vars['loaded']; ?>
 productos en esta categoría</span><?php endif; ?>
		<h3><?php if ($this->_tpl_vars['action'] == 'edit'): ?>Editar<?php else: ?>Crear<?php endif; ?> Categorías de Productos</h3>
		<p>
			Ingrese los datos de la categoría de producto.
		</p>
		<fieldset title="Formulario de edicin de datos de una categoria de producto">
			<?php if ($this->_tpl_vars['action'] == 'edit'):  $this->assign('category', $this->_tpl_vars['node']->getInfo());  endif; ?>
			<p>
				<label for="name">Categoría: </label>
				<input type="text" id="name" name="name" value="<?php if ($this->_tpl_vars['action'] == 'edit'):  echo $this->_tpl_vars['node']->getname();  endif; ?>" title="name" size="45" maxlength="255" />
			</p>
			<p>
				<label for="description">Descripción:</label>
				<textarea id="description" name="description" rows="5" wrap="virtual" size="38"><?php if ($this->_tpl_vars['action'] == 'edit'):  echo $this->_tpl_vars['category']->getdescription();  endif; ?></textarea>
			</p>
			<?php if ($this->_tpl_vars['action'] == 'edit'): ?>
			<div>
				<img src="Main.php?do=productCategoriesGetImage&id=<?php echo $this->_tpl_vars['category']->getId(); ?>
" alt="<?php echo $this->_tpl_vars['node']->getname(); ?>
" />
			</div>
			<?php endif; ?>
			<p>
				<label for="image">Imagen:</label>
				<input type="file" id="image" name="image" title="image" />
			</p>
			<p>
				<?php if ($this->_tpl_vars['action'] == 'edit'): ?>
				<input type="hidden" name="id" id="id" value="<?php if ($this->_tpl_vars['action'] == 'edit'):  echo $this->_tpl_vars['node']->getid();  endif; ?>" />
				<?php endif; ?>
				<input type="hidden" name="parentNodeId" id="parentNodeId" value="<?php echo $this->_tpl_vars['parentNodeId']; ?>
" />
				<input type="hidden" name="action" id="action" value="<?php echo $this->_tpl_vars['action']; ?>
" />
				<input type="hidden" name="do" id="do" value="catalogProductCategoriesDoEdit" />
				<input type="submit" id="button_edit_productcategory" name="button_edit_productcategory" title="Aceptar" value="Aceptar" class="button" />
			</p>
		</fieldset>
	</form>
	
	
	<?php if ($this->_tpl_vars['action'] == 'edit'): ?>
	<form name="form_load_products" id="form_load_products" action="Main.php" method="post" enctype="multipart/form-data">
		<p>
			<label for="csv">Archivo CSV de productos a cargar en esta categoría:</label>
			<input type="file" name="csv" id="csv" />
		</p>
		<p>
			<input type="radio" name="mode" value="1">Reemplazar Catálogo de la Categoría</input>
			<input type="radio" name="mode" value="2">Reemplazar Códigos Existentes</input>
			<input type="radio" name="mode" value="3" checked="checked">Solo Agregar Nuevos</input>
			<input type="radio" name="mode" value="4">Solo Actualizar Precios</input>
		</p>
		<p>
			<input type="hidden" name="parentNodeId" id="parentNodeId" value="<?php echo $this->_tpl_vars['node']->getId(); ?>
" />
			<input type="hidden" name="do" id="do" value="catalogProductsDoLoadInCategory" />
			<input type="submit" value="Cargar" class="button" />
		</p>
	</form>
	<?php endif; ?>

</div>

