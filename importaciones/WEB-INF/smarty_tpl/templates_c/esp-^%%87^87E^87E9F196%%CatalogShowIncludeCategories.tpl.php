<?php /* Smarty version 2.6.16, created on 2007-12-01 17:28:21
         compiled from CatalogShowIncludeCategories.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'CatalogShowIncludeCategories.tpl', 7, false),)), $this); ?>
					<ul>
						<?php $_from = $this->_tpl_vars['productCategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['for_productCategories'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['for_productCategories']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['node']):
        $this->_foreach['for_productCategories']['iteration']++;
?>
							<?php $this->assign('productCategory', $this->_tpl_vars['node']['node']); ?>
							<?php $this->assign('category', $this->_tpl_vars['productCategory']->getInfo()); ?>
							<li>
								<a href="Main.php?do=catalogShow&categoryId=<?php echo $this->_tpl_vars['productCategory']->getId(); ?>
"><?php echo $this->_tpl_vars['productCategory']->getName(); ?>
</a>
								<?php if (count($this->_tpl_vars['node']['childs']) > 0): ?>
									<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CatalogShowIncludeCategories.tpl", 'smarty_include_vars' => array('productCategories' => $this->_tpl_vars['node']['childs'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
								<?php endif; ?>
							</li>
						<?php endforeach; endif; unset($_from); ?>
					</ul>