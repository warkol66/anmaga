<?php /* Smarty version 2.6.16, created on 2007-11-30 11:00:47
         compiled from UsersWelcome.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'UsersWelcome.tpl', 13, false),)), $this); ?>
<table border='0' cellpadding='0' cellspacing='0' width='100%'>
	<tr>
		<td class='title'><?php $this->assign('userInfo', $this->_tpl_vars['loginUser']->getUserInfo()); ?>
<?php echo $this->_tpl_vars['userInfo']->getName(); ?>
, <?php echo $this->_tpl_vars['userInfo']->getSurname(); ?>
 - Bienvenido al Sistema <?php echo $this->_tpl_vars['parameters']['siteName']; ?>
</td>
	</tr>
	<tr>
		<td class='underlineTitle'><img src="images/clear.gif" height='3' width='1'></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Su último ingreso al sistema fue el <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['loginUser']->getLastLogin())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%Y a las %R") : smarty_modifier_date_format($_tmp, "%d-%m-%Y a las %R")); ?>
</strong></td>
	</tr>
<?php if ($this->_tpl_vars['parameters']['news'] != ''): ?>	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?php echo $this->_tpl_vars['parameters']['news']; ?>
</td>
	</tr>
<?php endif; ?>
</table>

	