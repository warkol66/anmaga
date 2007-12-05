<?php /* Smarty version 2.6.16, created on 2007-11-30 12:46:20
         compiled from ConfigViewInclude.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'is_array', 'ConfigViewInclude.tpl', 2, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element_name'] => $this->_tpl_vars['element']):
?>
<?php if (((is_array($_tmp=$this->_tpl_vars['element'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?>
<li><?php echo $this->_tpl_vars['element_name']; ?>

	<ul><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ConfigViewInclude.tpl", 'smarty_include_vars' => array('elements' => $this->_tpl_vars['element'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></ul>
</li>
<?php else: ?>
<li><?php echo $this->_tpl_vars['element_name']; ?>
: <?php echo $this->_tpl_vars['element']; ?>
</li>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>