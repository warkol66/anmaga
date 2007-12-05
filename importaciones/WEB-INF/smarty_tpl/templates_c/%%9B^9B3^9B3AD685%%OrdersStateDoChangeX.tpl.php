<?php /* Smarty version 2.6.16, created on 2007-11-15 17:38:40
         compiled from OrdersStateDoChangeX.tpl */ ?>
<tr>
	<td><?php echo $this->_tpl_vars['stateChange']->getCreated(); ?>
</td>
	<td><?php $this->assign('affiliate', $this->_tpl_vars['stateChange']->getAffiliate());  if ($this->_tpl_vars['affiliate']):  echo $this->_tpl_vars['affiliate']->getName();  endif; ?></td>
	<td><?php $this->assign('user', $this->_tpl_vars['stateChange']->getUser());  if ($this->_tpl_vars['user']):  echo $this->_tpl_vars['user']->getUsername();  endif; ?></td>
	<td><?php echo $this->_tpl_vars['stateChange']->getStateName(); ?>
</td>
	<td><?php echo $this->_tpl_vars['stateChange']->getComment(); ?>
</td>
</tr>

<script language="JavaScript" type="text/javascript">
	$('state_actual').innerHTML = "<?php echo $this->_tpl_vars['stateName']; ?>
";
	$('messageState').innerHTML = "State Changed";
	$('comment').value = "";
</script>