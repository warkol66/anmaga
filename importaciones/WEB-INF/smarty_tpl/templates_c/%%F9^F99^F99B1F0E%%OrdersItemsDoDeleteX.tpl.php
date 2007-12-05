<?php /* Smarty version 2.6.16, created on 2007-11-20 11:25:34
         compiled from OrdersItemsDoDeleteX.tpl */ ?>
<script type="text/javascript">
        $('row<?php echo $this->_tpl_vars['itemId']; ?>
').remove();
        $('product_total_value').innerHTML = '<?php echo $this->_tpl_vars['order']->getTotalFormat(); ?>
';
</script>