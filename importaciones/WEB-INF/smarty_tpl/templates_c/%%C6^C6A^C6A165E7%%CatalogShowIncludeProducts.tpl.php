<?php /* Smarty version 2.6.16, created on 2007-11-27 00:24:51
         compiled from CatalogShowIncludeProducts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'CatalogShowIncludeProducts.tpl', 21, false),)), $this); ?>
<div id="div_products">
	
	<div id="messageCart">
	</div>

	<table width="100%" class="tableTdBorders" id="tabla-products"> 
		<thead> 
			<tr> 
				<th class="thFillTitle">code</th> 
				<th class="thFillTitle">name</th> 
				<th class="thFillTitle">description</th> 
				<th class="thFillTitle">price</th> 
				<th class="thFillTitle"></th>
			</tr>
		</thead>
		<tbody>  <?php $_from = $this->_tpl_vars['productNodes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['for_products'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['for_products']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['productNode']):
        $this->_foreach['for_products']['iteration']++;
?> <?php $this->assign('product', $this->_tpl_vars['productNode']->getInfo()); ?>
		<tr>
			<td width="15%" nowrap class="tdSize1"><?php echo $this->_tpl_vars['product']->getcode(); ?>
</td>
			<td width="25%" class="tdSize1"><?php echo $this->_tpl_vars['productNode']->getname(); ?>
</td>
			<td width="50%" class="tdSize1"><?php echo $this->_tpl_vars['product']->getdescription(); ?>
</td>
			<td width="10%" align="right" nowrap class="tdSize1"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']->getprice())) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ",", ".") : number_format($_tmp, 2, ",", ".")); ?>
</td>
			<td>
				<form>
					<label for="quantity">Quantity</label>
					<input type="text" name="quantity" value="1" size="3" />
					<input type="hidden" name="productId" value="<?php echo $this->_tpl_vars['product']->getId(); ?>
" />
					<input type="hidden" name="do" value="ordersAddItemToCartX" />
					<input type="button" value="Add to Cart" class="boton" onclick="javascript:ordersAddItemToCartX(this.form)" />
				</form>
			</td>
		</tr>
		<?php endforeach; else: ?>
		<tr>
			<td colspan="5">Sin Productos</td>
		</tr>
		<?php endif; unset($_from); ?>
		<tr>
			<td colspan="5"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "PaginateInclude.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
		</tr> 
		</tbody> 
	</table> 
</div>