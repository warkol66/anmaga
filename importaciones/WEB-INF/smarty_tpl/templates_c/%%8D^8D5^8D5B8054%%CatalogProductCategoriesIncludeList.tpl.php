<?php /* Smarty version 2.6.16, created on 2007-11-27 00:25:06
         compiled from CatalogProductCategoriesIncludeList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'CatalogProductCategoriesIncludeList.tpl', 36, false),)), $this); ?>
					<table id="tabla-productcategories">
						<thead>
							<tr>
                								<th>Id</th>
																<th>Name</th>
																<th>Description</th>
																<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						<?php $_from = $this->_tpl_vars['productCategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['for_productCategories'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['for_productCategories']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['node']):
        $this->_foreach['for_productCategories']['iteration']++;
?>
							<?php $this->assign('productCategory', $this->_tpl_vars['node']['node']); ?>
							<?php $this->assign('category', $this->_tpl_vars['productCategory']->getInfo()); ?>
							<tr>
																<td><?php echo $this->_tpl_vars['productCategory']->getId(); ?>
</td>
																<td><?php echo $this->_tpl_vars['productCategory']->getName(); ?>
</td>
																<td><?php echo $this->_tpl_vars['category']->getDescription(); ?>
</td>
																<td>
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="catalogProductCategoriesEdit" />
																				<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['productCategory']->getid(); ?>
" />
																				<input type="submit" name="submit_go_edit_productcategory" value="Editar" class="boton" />
									</form>
									<form action="Main.php" method="post">
										<input type="hidden" name="do" value="catalogProductCategoriesDoDelete" />
																				<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['productCategory']->getid(); ?>
" />
																				<input type="submit" name="submit_go_delete_productcategory" value="Borrar" onclick="return confirm('Seguro que desea eliminar el productcategory?')" class="boton" />
									</form>
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="catalogProductCategoriesEdit" />
																				<input type="hidden" name="parentNodeId" value="<?php echo $this->_tpl_vars['productCategory']->getid(); ?>
" />
																				<input type="submit" name="submit_go_add_productcategory" value="Agregar Subcategoria" class="boton" />
									</form>
								</td>
							</tr>
							<?php if (count($this->_tpl_vars['node']['childs']) > 0): ?>
							<tr>
								<td>Childs</td><td colspan="3"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CatalogProductCategoriesIncludeList.tpl", 'smarty_include_vars' => array('productCategories' => $this->_tpl_vars['node']['childs'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
							</tr>
							<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
						</tbody>
					</table>