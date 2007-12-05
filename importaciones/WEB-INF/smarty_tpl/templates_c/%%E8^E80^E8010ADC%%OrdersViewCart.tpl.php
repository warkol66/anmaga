<?php /* Smarty version 2.6.16, created on 2007-11-19 14:38:10
         compiled from OrdersViewCart.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'OrdersViewCart.tpl', 22, false),array('modifier', 'count', 'OrdersViewCart.tpl', 46, false),)), $this); ?>
<div id="div_order">
	<h2>Order</h2>
	
	<?php if ($this->_tpl_vars['message'] == 'deleted_ok'): ?><span class="message_ok">Carrito Vaciado!</span><?php endif; ?>

	<div id="messageCart">
	</div>

	<table width="100%" class="tableTdBorders" id="tabla-products">
		<thead>
			<tr>
				<th class="thFillTitle">code</th>
				<th class="thFillTitle">name</th>
				<th class="thFillTitle">price</th>
				<th class="thFillTitle">quantity</th>
			</tr>
		</thead>
		<tbody>  <?php $_from = $this->_tpl_vars['orderItems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['for_products'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['for_products']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['for_products']['iteration']++;
?> <?php $this->assign('product', $this->_tpl_vars['item']->getProduct()); ?> <?php $this->assign('productNode', $this->_tpl_vars['product']->getNode()); ?>
		<tr id="product_<?php echo $this->_tpl_vars['product']->getId(); ?>
">
			<td class="tdSize1"><?php echo $this->_tpl_vars['product']->getcode(); ?>
</td>
			<td class="tdSize1"><?php echo $this->_tpl_vars['productNode']->getname(); ?>
</td>
			<td class="tdSize1"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']->getprice())) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ",", ".") : number_format($_tmp, 2, ",", ".")); ?>
</td>
			<td>
				<form>
					<input type="text" name="quantity" value="<?php echo $this->_tpl_vars['item']->getQuantity(); ?>
" size="3" />
					<input type="hidden" name="productId" value="<?php echo $this->_tpl_vars['product']->getId(); ?>
" />
					<input type="hidden" name="do" value="ordersChangeItemCartX" />
					<input type="button" value="Change" class="boton" onclick="javascript:ordersChangeItemCartX(this.form)" />
				</form>
				<form>
					<input type="hidden" name="productId" value="<?php echo $this->_tpl_vars['product']->getId(); ?>
" />
					<input type="hidden" name="do" value="ordersRemoveItemCartX" />
					<input type="button" value="Remove" class="boton" onclick="javascript:ordersRemoveItemCartX(this.form)" />
				</form>
			</td>
		</tr>
		<?php endforeach; else: ?>
		<tr>
			<td colspan="5">Sin Productos</td>
		</tr>
		<?php endif; unset($_from); ?>
		</tbody>
	</table> 
</div>

<?php if (count($this->_tpl_vars['orderItems']) > 0): ?>
<form action="Main.php" method="post">
	<input type="hidden" name="do" value="ordersCartDoDelete" />
	<input type="submit" value="Empty Cart" class="boton" onclick="return confirm('Seguro que desea vaciar el carrito?')" />
</form>
<form action="Main.php" method="post">
	<input type="hidden" name="do" value="ordersDoSave" />
	<input type="hidden" name="name" id="name" value="" />
	<input type="submit" value="Save Order" class="boton" onclick="$('name').value = window.prompt('Nombre de la orden:','');" />
</form>
<form action="Main.php" method="post">
	<input type="hidden" name="do" value="ordersConfirm" />
	<input type="submit" value="Generate Order" class="boton" />
</form>
<?php endif; ?>

