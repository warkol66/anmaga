<?php /* Smarty version 2.6.16, created on 2007-11-30 12:44:42
         compiled from CatalogProductCategoriesIncludeOptions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'CatalogProductCategoriesIncludeOptions.tpl', 4, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['productCategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['for_productCategories'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['for_productCategories']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['node']):
        $this->_foreach['for_productCategories']['iteration']++;
?>
	<?php $this->assign('productCategory', $this->_tpl_vars['node']['node']); ?>
	<option value="<?php echo $this->_tpl_vars['productCategory']->getId(); ?>
"<?php if ($this->_tpl_vars['productCategory']->getId() == $this->_tpl_vars['parentNodeId']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['productCategory']->getName(); ?>
</option>
	<?php if (count($this->_tpl_vars['node']['childs']) > 0): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CatalogProductCategoriesIncludeOptions.tpl", 'smarty_include_vars' => array('productCategories' => $this->_tpl_vars['node']['childs'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>