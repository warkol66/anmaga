<?php /* Smarty version 2.6.16, created on 2007-11-27 00:24:50
         compiled from CatalogShow.tpl */ ?>
				<h2>Catalogo de Productos</h2>
				<div id="div_productcategories">
				
					<a href="Main.php?do=catalogShow">Productos sin Categoria</a>				

					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CatalogShowIncludeCategories.tpl", 'smarty_include_vars' => array('productCategories' => $this->_tpl_vars['productCategories'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					
					<?php if ($this->_tpl_vars['categoryNode']): ?>
						<h3>Productos de la Categoria <?php echo $this->_tpl_vars['categoryNode']->getName(); ?>
</h3>
					<?php else: ?>
          	<h3>Productos sin Categoria Asignada</h3>
					<?php endif; ?>

					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CatalogShowIncludeProducts.tpl", 'smarty_include_vars' => array('productNodes' => $this->_tpl_vars['productNodes'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

				</div>