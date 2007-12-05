<?php /* Smarty version 2.6.16, created on 2007-12-01 17:28:20
         compiled from CatalogShow.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'CatalogShow.tpl', 24, false),)), $this); ?>
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
		<td class='backgroundTitle'>Ver Catálogo </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>A continuación podrá ver los productos disponibles en el sistema </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>
<?php if (count($this->_tpl_vars['productCategories']) != 0): ?><div id="div_productcategories">
	<a href="Main.php?do=catalogShow">Productos sin Categoria</a>				
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CatalogShowIncludeCategories.tpl", 'smarty_include_vars' => array('productCategories' => $this->_tpl_vars['productCategories'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php if ($this->_tpl_vars['categoryNode']): ?>
			<h3>Productos de la Categoría <?php echo $this->_tpl_vars['categoryNode']->getName(); ?>
</h3>
		<?php else: ?>
			<h3>Productos sin Categoría Asignada</h3>
		<?php endif; ?>
	<?php endif; ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CatalogShowIncludeProducts.tpl", 'smarty_include_vars' => array('productNodes' => $this->_tpl_vars['productNodes'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>