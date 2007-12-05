<?php /* Smarty version 2.6.16, created on 2007-11-20 13:21:14
         compiled from OrdersExport.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'OrdersExport.tpl', 19, false),array('function', 'math', 'OrdersExport.tpl', 21, false),)), $this); ?>
﻿<?php echo '<?xml'; ?>
 version = "1.0" standalone="yes"<?php echo '?>'; ?>

<VFPData xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="F:\pedidos_xml\profit_Schema.xsd">
<?php $_from = $this->_tpl_vars['orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['for_orders'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['for_orders']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['order']):
        $this->_foreach['for_orders']['iteration']++;
?>
<?php $_from = $this->_tpl_vars['order']->getOrderItems(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['for_products'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['for_products']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['for_products']['iteration']++;
?>
<?php $this->assign('product', $this->_tpl_vars['item']->getProduct()); ?>
<?php $this->assign('productNode', $this->_tpl_vars['product']->getNode()); ?>
<?php $this->assign('unit', $this->_tpl_vars['product']->getUnit()); ?>
<?php $this->assign('branch', $this->_tpl_vars['order']->getBranch()); ?>
 <cursor_profit_xml>
 	<nro_ord><?php if ($this->_tpl_vars['branch']):  echo $this->_tpl_vars['branch']->getNumber();  endif; ?>-<?php echo $this->_tpl_vars['order']->getNumber(); ?>
</nro_ord>
  <co_cli><?php if ($this->_tpl_vars['branch']):  echo $this->_tpl_vars['branch']->getCode();  endif; ?></co_cli>
  <fec_emis><?php echo $this->_tpl_vars['order']->getCreated(); ?>
</fec_emis>
  <fec_venc><?php echo $this->_tpl_vars['order']->getCreated(); ?>
</fec_venc>
  <co_sucu><?php if ($this->_tpl_vars['branch']):  echo $this->_tpl_vars['branch']->getNumber();  endif; ?></co_sucu>
  <reng_num><?php echo $this->_foreach['for_products']['iteration']; ?>
</reng_num>
  <co_art><?php echo $this->_tpl_vars['product']->getcode(); ?>
</co_art>
  <total_art><?php echo ((is_array($_tmp=$this->_tpl_vars['item']->getQuantity())) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ",", ".") : number_format($_tmp, 2, ",", ".")); ?>
</total_art>
  <uni_venta><?php if ($this->_tpl_vars['unit']):  echo $this->_tpl_vars['unit']->getName();  endif; ?></uni_venta>
  <stotal_art><?php if ($this->_tpl_vars['unit']):  echo smarty_function_math(array('equation' => "x / y",'x' => $this->_tpl_vars['item']->getQuantity(),'y' => $this->_tpl_vars['unit']->getUnitQuantity(),'assign' => 'totalQuantity'), $this); echo ((is_array($_tmp=$this->_tpl_vars['totalQuantity'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ",", ".") : number_format($_tmp, 2, ",", "."));  endif; ?></stotal_art>
  <prec_vta><?php echo ((is_array($_tmp=$this->_tpl_vars['item']->getprice())) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ",", ".") : number_format($_tmp, 2, ",", ".")); ?>
</prec_vta>
  <reng_neto><?php echo smarty_function_math(array('equation' => "x * y",'x' => $this->_tpl_vars['item']->getPrice(),'y' => $this->_tpl_vars['item']->getQuantity(),'assign' => 'totalItem'), $this); echo ((is_array($_tmp=$this->_tpl_vars['totalItem'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ",", ".") : number_format($_tmp, 2, ",", ".")); ?>
</reng_neto>
  <total_uni><?php if ($this->_tpl_vars['unit']):  echo $this->_tpl_vars['unit']->getUnitQuantity();  endif; ?></total_uni>
 </cursor_profit_xml>
<?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>
</VFPData>