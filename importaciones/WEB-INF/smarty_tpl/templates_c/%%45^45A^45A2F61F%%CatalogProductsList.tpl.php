<?php /* Smarty version 2.6.16, created on 2007-11-27 00:25:12
         compiled from CatalogProductsList.tpl */ ?>
<h2>Products</h2>
<div id="div_products"> <?php if ($this->_tpl_vars['message'] == 'ok'): ?><span class="message_ok">Producto guardado correctamente</span><?php endif; ?> <?php if ($this->_tpl_vars['message'] == 'deleted_ok'): ?><span class="message_ok">Producto eliminado correctamente</span><?php endif; ?>
	<div> 
		<form action="Main.php" method="get"> 
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
				<label>Price From:</label> 
				<input type="text" name="priceFrom" value="<?php echo $this->_tpl_vars['priceFrom']; ?>
" /> 
				<label>To:</label> 
				<input type="text" name="priceTo" value="<?php echo $this->_tpl_vars['priceTo']; ?>
" /> 
			</p> 
			<p> 
				<input type="hidden" name="do" value="catalogProductsList" /> 
				<input type="submit" class="boton" value="Buscar" /> 
			</p> 
		</form> 
		<a href="Main.php?do=catalogProductsList">Sin Filtros</a> </div> 
	<h3><a href="Main.php?do=catalogProductsEdit">Agregar Product</a></h3> 
	<h3><a href="Main.php?do=catalogProductsList&amp;csv=1">Exportar Productos a CSV</a></h3> 
	<table width="100%" border="0" cellpadding="4" cellspacing="0" class="tableTdBorders" id="tabla-products"> 
		<thead> 
			<tr> 
				<th class="thFillTitle">id</th> 
				<th class="thFillTitle">code</th> 
				<th class="thFillTitle">name</th> 
				<th class="thFillTitle">description</th> 
				<th class="thFillTitle">price</th> 
				<th class="thFillTitle">Categoria</th> 
				<th class="thFillTitle">Unidad</th> 
				<th class="thFillTitle">Unidad de Medida</th> 
				<th class="thFillTitle">&nbsp;</th> 
			</tr> 
		</thead> 
		<tbody>  <?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['for_products'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['for_products']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['node']):
        $this->_foreach['for_products']['iteration']++;
?> <?php $this->assign('product', $this->_tpl_vars['node']->getInfo()); ?> <?php $this->assign('parentNode', $this->_tpl_vars['node']->getParentNode()); ?> <?php $this->assign('unit', $this->_tpl_vars['product']->getUnit()); ?> <?php $this->assign('measureUnit', $this->_tpl_vars['product']->getMeasureUnit()); ?>
		<tr> 
			<td class="tdSize1"><?php echo $this->_tpl_vars['node']->getid(); ?>
</td> 
			<td class="tdSize1"><?php echo $this->_tpl_vars['product']->getcode(); ?>
</td> 
			<td class="tdSize1"><?php echo $this->_tpl_vars['node']->getname(); ?>
</td> 
			<td class="tdSize1"><?php echo $this->_tpl_vars['product']->getdescription(); ?>
</td> 
			<td class="tdSize1"><?php echo $this->_tpl_vars['product']->getprice(); ?>
</td> 
			<td class="tdSize1"><?php if ($this->_tpl_vars['parentNode']):  echo $this->_tpl_vars['parentNode']->getName();  endif; ?></td> 
			<td class="tdSize1"><?php if ($this->_tpl_vars['unit']):  echo $this->_tpl_vars['unit']->getName();  endif; ?></td> 
			<td class="tdSize1"><?php if ($this->_tpl_vars['measureUnit']):  echo $this->_tpl_vars['measureUnit']->getName();  endif; ?></td> 
			<td> <form action="Main.php" method="get"> 
					<input type="hidden" name="do" value="catalogProductsEdit" /> 
					<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['node']->getid(); ?>
" /> 
					<input type="submit" name="submit_go_edit_product" value="Editar" class="button" /> 
				</form> 
				<form action="Main.php" method="post"> 
					<input type="hidden" name="do" value="catalogProductsDoDelete" /> 
					<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['product']->getid(); ?>
" /> 
					<input type="submit" name="submit_go_delete_product" value="Borrar" onclick="return confirm('Seguro que desea eliminar el producto?')" class="button" /> 
				</form></td> 
		</tr> 
		<?php endforeach; endif; unset($_from); ?>
		<tr> 
			<td colspan="9"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "PaginateInclude.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td> 
		</tr> 
		</tbody> 
  </table> 
</div>