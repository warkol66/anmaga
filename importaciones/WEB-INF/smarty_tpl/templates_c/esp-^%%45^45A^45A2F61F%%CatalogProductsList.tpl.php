<?php /* Smarty version 2.6.16, created on 2007-11-30 12:44:10
         compiled from CatalogProductsList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'CatalogProductsList.tpl', 28, false),array('modifier', 'number_format', 'CatalogProductsList.tpl', 68, false),)), $this); ?>
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
		<td class='backgroundTitle'>Administrar productos del sistema </td>
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
</table>
<div id="div_products"> <?php if ($this->_tpl_vars['message'] == 'ok'): ?><span class="message_ok">Producto guardado correctamente</span><?php endif; ?> <?php if ($this->_tpl_vars['message'] == 'deleted_ok'): ?><span class="message_ok">Producto eliminado correctamente</span><?php endif; ?>
	<div> 
		<form action="Main.php" method="get"> 
			<p> 
<?php if (count($this->_tpl_vars['productCategories']) != 0): ?>
				<label for="parentNodeId">Categor&iacute;a</label> 
				<select name="parentNodeId" id="parentNodeId"> 
					<option value="">Select Category</option> 
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CatalogProductCategoriesIncludeOptions.tpl", 'smarty_include_vars' => array('productCategories' => $this->_tpl_vars['productCategories'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</select> 
			</p> <?php endif; ?>
			<p> 
				<label>Rango de precio desde: </label>
				<input type="text" name="priceFrom" value="<?php echo $this->_tpl_vars['priceFrom']; ?>
" /> 
				<label>hasta:</label> 
				<input type="text" name="priceTo" value="<?php echo $this->_tpl_vars['priceTo']; ?>
" /> 
			</p> 
			<p> 
				<input type="hidden" name="do" value="catalogProductsList" /> 
				<input type="submit" class="button" value="Buscar" /> <a href="Main.php?do=catalogProductsList">Eliminar Filtros</a>
			</p> 
		</form> 
		 </div> 
	<h3><a href="Main.php?do=catalogProductsEdit">Agregar Producto</a>&nbsp;&nbsp;&nbsp;<a href="Main.php?do=catalogProductsList&amp;csv=1">Exportar Productos a CSV</a></h3> 
	<table width="100%" border="0" cellpadding="4" cellspacing="0" class="tableTdBorders" id="tabla-products"> 
		<thead> 
			<tr> 
				<th class="thFillTitle">id</th> 
				<th class="thFillTitle">Código</th> 
				<th class="thFillTitle">Nombre</th> 
				<th class="thFillTitle">Descripción</th> 
				<th class="thFillTitle">Precio</th> 
				<th class="thFillTitle">Categoría</th> 
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
			<td class="tdSize1 right"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']->getprice())) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ",", ".") : number_format($_tmp, 2, ",", ".")); ?>
</td> 
			<td class="tdSize1"><?php if ($this->_tpl_vars['parentNode']):  echo $this->_tpl_vars['parentNode']->getName();  endif; ?></td> 
			<td class="tdSize1 center"><?php if ($this->_tpl_vars['unit']):  echo $this->_tpl_vars['unit']->getName();  endif; ?></td> 
			<td class="tdSize1 center"><?php if ($this->_tpl_vars['measureUnit']):  echo $this->_tpl_vars['measureUnit']->getName();  endif; ?></td> 
			<td class="tdSize1" nowrap> <form action="Main.php" method="get" style="display:inline;"> 
					<input type="hidden" name="do" value="catalogProductsEdit" /> 
					<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['node']->getid(); ?>
" /> 
					<input type="submit" name="submit_go_edit_product" value="Editar" class="smallButton" /> 
				</form> 
				<form action="Main.php" method="post" style="display:inline;"> 
					<input type="hidden" name="do" value="catalogProductsDoDelete" /> 
					<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['product']->getid(); ?>
" /> 
					<input type="submit" name="submit_go_delete_product" value="Borrar" onclick="return confirm('Seguro que desea eliminar el producto?')" class="smallButton" /> 
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