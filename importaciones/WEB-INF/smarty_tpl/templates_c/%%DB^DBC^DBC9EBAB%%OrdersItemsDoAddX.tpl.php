<?php /* Smarty version 2.6.16, created on 2007-11-20 11:28:03
         compiled from OrdersItemsDoAddX.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'OrdersItemsDoAddX.tpl', 5, false),array('function', 'math', 'OrdersItemsDoAddX.tpl', 10, false),)), $this); ?>
<?php $this->assign('productNode', $this->_tpl_vars['product']->getNode()); ?> 
<tr id="row<?php echo $this->_tpl_vars['item']->getId(); ?>
"> 
	<td nowrap class="tdSize1 top center"><?php echo $this->_tpl_vars['product']->getcode(); ?>
</td> 
	<td class="tdSize1 top"><?php echo $this->_tpl_vars['productNode']->getname(); ?>
</td> 
	<td class="tdSize1 bottom right"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']->getprice())) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ",", ".") : number_format($_tmp, 2, ",", ".")); ?>
</td>
	<td class="tdSize1 bottom right"><span id="quantity<?php echo $this->_tpl_vars['item']->getId(); ?>
"><?php echo $this->_tpl_vars['item']->getQuantity(); ?>
</span></td> 
	<script type="text/javascript">
		editor<?php echo $this->_tpl_vars['item']->getId(); ?>
 = new Ajax.InPlaceEditor("quantity<?php echo $this->_tpl_vars['item']->getId(); ?>
", 'Main.php?do=ordersItemsDoEditX&itemId=<?php echo $this->_tpl_vars['item']->getId(); ?>
&orderId=<?php echo $this->_tpl_vars['order']->getId(); ?>
', { clickToEditText : 'Editar Cantidad' });
	</script>
	<td class="tdSize1 bottom right"><?php echo smarty_function_math(array('equation' => "x * y",'x' => $this->_tpl_vars['item']->getPrice(),'y' => $this->_tpl_vars['item']->getQuantity(),'assign' => 'totalItem'), $this);?>
<span id="totalItem<?php echo $this->_tpl_vars['item']->getId(); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['totalItem'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ",", ".") : number_format($_tmp, 2, ",", ".")); ?>
</span></td> 
	<td class="tdSize1 bottom right">
		<input id="editButton<?php echo $this->_tpl_vars['item']->getId(); ?>
"type="button" onclick="editor<?php echo $this->_tpl_vars['item']->getId(); ?>
.enterEditMode();" value="Editar" class="boton" />
		<form method="post" action="Main.php" id="formRemove<?php echo $this->_tpl_vars['item']->getId(); ?>
">
			<input type="hidden" name="itemId" value="<?php echo $this->_tpl_vars['item']->getId(); ?>
" />
			<input type="hidden" name="orderId" value="<?php echo $this->_tpl_vars['order']->getId(); ?>
" />
			<input type="hidden" name="do" value="ordersItemsDoDeleteX" />
			<input type="button" value="Remove" class="boton" onclick="ordersItemsDoDeleteX('<?php echo $this->_tpl_vars['item']->getId(); ?>
')" />
		</form>
		<span  id="messageRemove<?php echo $this->_tpl_vars['item']->getId(); ?>
"></span>

	</td>
</tr> 

<script type="text/javascript">
    //<![CDATA[
    $('messageAdd').innerHTML = "";
	$('product_total_value').innerHTML = '<?php echo $this->_tpl_vars['order']->getTotalFormat(); ?>
';
    //]]>
</script>