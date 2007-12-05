<?php /* Smarty version 2.6.16, created on 2007-11-20 11:21:08
         compiled from OrdersItemsDoEditX.tpl */ ?>
<?php if (isset ( $this->_tpl_vars['value'] )): ?>
<?php echo $this->_tpl_vars['value']; ?>

<?php endif; ?>

<script type="text/javascript">
    
    	$('totalItem<?php echo $this->_tpl_vars['item']->getId(); ?>
').innerHTML = '<?php echo $this->_tpl_vars['itemTotal']; ?>
';
        $('product_total_value').innerHTML = '<?php echo $this->_tpl_vars['order']->getTotalFormat(); ?>
';
    
</script>