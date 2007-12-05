<?php /* Smarty version 2.6.16, created on 2007-11-30 12:44:41
         compiled from CatalogProductsEdit.tpl */ ?>
				<div id="div_product">
					<form name="form_edit_product" id="form_edit_product" action="Main.php" method="post" enctype="multipart/form-data">
						<?php if ($this->_tpl_vars['message'] == 'error'): ?><span class="message_error">Ha ocurrido un error al intentar guardar el producto</span><?php endif; ?>
						<h3><?php if ($this->_tpl_vars['action'] == 'edit'): ?>Edit<?php else: ?>Create<?php endif; ?> Product</h3>
						<p>
							Ingrese los datos del producto.
						</p>
						<fieldset title="Formulario de edición de datos de un producto">
							<?php if ($this->_tpl_vars['action'] == 'edit'):  $this->assign('product', $this->_tpl_vars['node']->getInfo());  endif; ?>
							<p>
								<label for="code">code</label>
								<input type="text" id="code" name="code" value="<?php if ($this->_tpl_vars['action'] == 'edit'):  echo $this->_tpl_vars['product']->getcode();  endif; ?>" title="code" maxlength="255" />
							</p>
							<p>
								<label for="name">name</label>
								<input type="text" id="name" name="name" value="<?php if ($this->_tpl_vars['action'] == 'edit'):  echo $this->_tpl_vars['node']->getname();  endif; ?>" title="name" maxlength="255" />
							</p>
							<p>
								<label for="description">description</label>
								<textarea id="description" name="description"><?php if ($this->_tpl_vars['action'] == 'edit'):  echo $this->_tpl_vars['product']->getdescription();  endif; ?></textarea>
							</p>
							<p>
								<label for="price">price</label>
								<input type="text" id="price" name="price" value="<?php if ($this->_tpl_vars['action'] == 'edit'):  echo $this->_tpl_vars['product']->getprice();  endif; ?>" title="price" />
							</p>
							<?php if ($this->_tpl_vars['action'] == 'edit'): ?>
							<div>
								<img src="Main.php?do=catalogProductsGetImage&id=<?php echo $this->_tpl_vars['node']->getId(); ?>
" alt="<?php echo $this->_tpl_vars['node']->getname(); ?>
" />
							</div>
							<?php endif; ?>
							<p>
								<label for="image">image</label>
								<input type="file" id="image" name="image" title="image" />
							</p>
							<p>
								<label for="parentNodeId">Category</label>
								<select name="parentNodeId" id="parentNodeId">
									<option value="">Select Category</option>
									<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CatalogProductCategoriesIncludeOptions.tpl", 'smarty_include_vars' => array('productCategories' => $this->_tpl_vars['productCategories'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
								</select>
							</p>
							<p>
								<label for="unitId">Unidad</label>
								<select name="unitId" id="unitId">
									<option value="">Seleccionar Unidad</option>
									<?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['unit']):
?>
									<option value="<?php echo $this->_tpl_vars['unit']->getId(); ?>
"<?php if ($this->_tpl_vars['action'] == 'edit' && $this->_tpl_vars['unit']->getId() == $this->_tpl_vars['product']->getUnitId()): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['unit']->getName(); ?>
</option>
									<?php endforeach; endif; unset($_from); ?>
								</select>
							</p>
							<p>
								<label for="measureUnitId">Unidad de Medida</label>
								<select name="measureUnitId" id="measureUnitId">
									<option value="">Seleccionar Unidad de Medida</option>
									<?php $_from = $this->_tpl_vars['measureUnits']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['measureUnit']):
?>
									<option value="<?php echo $this->_tpl_vars['measureUnit']->getId(); ?>
"<?php if ($this->_tpl_vars['action'] == 'edit' && $this->_tpl_vars['measureUnit']->getId() == $this->_tpl_vars['product']->getMeasureUnitId()): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['measureUnit']->getName(); ?>
</option>
									<?php endforeach; endif; unset($_from); ?>
								</select>
							</p>
							<p>
								<?php if ($this->_tpl_vars['action'] == 'edit'): ?>
								<input type="hidden" name="id" id="id" value="<?php if ($this->_tpl_vars['action'] == 'edit'):  echo $this->_tpl_vars['node']->getid();  endif; ?>" />
								<?php endif; ?>
								<input type="hidden" name="action" id="action" value="<?php echo $this->_tpl_vars['action']; ?>
" />
								<input type="hidden" name="do" id="do" value="catalogProductsDoEdit" />
								<input type="submit" id="button_edit_product" name="button_edit_product" title="Aceptar" value="Aceptar" class="boton" />
							</p>
			      </fieldset>
					</form>
				</div>