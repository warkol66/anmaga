<?php /* Smarty version 2.6.16, created on 2007-11-30 15:25:47
         compiled from AffiliatesUsersList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'AffiliatesUsersList.tpl', 92, false),)), $this); ?>
<table border='0' cellpadding='0' cellspacing='0' width='100%'>
	<tr>
  	<td class='title'>Configuración del Sistema</td>
	</tr>
	<tr>
  	<td class='underlineTitle'><img src="images/clear.gif" height='3' width='1'></td>
	</tr>
	<tr>
  	<td>&nbsp;</td>
	</tr>
	<tr>
  	<td class='backgroundTitle'>Administraci&oacute;n de Usuarios por Afiliados</td>
	</tr>
	<tr>
  	<td>&nbsp;</td>
	</tr>
	<tr>
  	<td>A continuaci&oacute;n podr&aacute; editar la lista de Usuarios por Afiliados del sistema.</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>
<?php if ($this->_tpl_vars['message'] == 'deleted'): ?>
<div align='center' class='errorMessage'>##153,Usuario eliminado##</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['message'] == 'activated'): ?>
<div align='center' class='errorMessage'>##154,Usuario reactivado##</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['message'] == 'wrongPassword'): ?>
<div align='center' class='errorMessage'>##155,Las contraseñas deben coincidir##</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['message'] == 'emptyAffiliate'): ?>
<div align='center' class='errorMessage'>##155,Debe selecccionar un afiliado##</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['message'] == 'errorUpdate'): ?>
<div align='center' class='errorMessage'>##156,Ha ocurrido un error al intentar guardar la información del usuario##</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['message'] == 'saved'): ?>
<div align='center' class='errorMessage'>##157,Usuario guardado##</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['message'] == 'notAddedToGroup'): ?>
<div align='center' class='errorMessage'>##158,Ha ocurrido un error al intentar agregar el usuario al grupo##</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['message'] == 'notRemovedFromGroup'): ?>
<div align='center' class='errorMessage'>##159,Ha ocurrido un error al intentar eliminar el usuario al grupo##</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['accion'] == 'creacion' || $this->_tpl_vars['accion'] == 'edicion'): ?>
	<?php if ($this->_tpl_vars['accion'] == 'creacion'): ?>
			##160,Ingrese  la Identificación del usuario y la contraseña para el nuevo usuario,  luego haga click en Guardar para generar el nuevo usuario.##
	<?php else: ?>
			##161,Realice los cambios en el usuario y haga click en Aceptar para guardar las modificaciones.##<?php endif; ?> <br />
	<br />
<form method='post' action='Main.php?do=affiliatesUsersDoEditUser'>
	<input type='hidden' name='id' value='<?php if ($this->_tpl_vars['accion'] == 'edicion'):  echo $this->_tpl_vars['currentAffiliateUser']->getId();  endif; ?>' />
	<table width='100%' border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'>
		<tr>
			<td nowrap="nowrap" class='tdTitle'>##162,Identificación de Usuario##</td>
			<td><input name='username' type='text'  class='textodato' value='<?php if ($this->_tpl_vars['accion'] == 'edicion'):  echo $this->_tpl_vars['currentAffiliateUser']->getUsername();  endif; ?>' size="40" /></td>
		</tr>
		<tr>
			<td class='tdTitle'>##163,Nombre##</td>
			<td><input name='name' type='text'  class='textodato' value='<?php if ($this->_tpl_vars['accion'] == 'edicion'):  echo $this->_tpl_vars['currentAffiliateUserInfo']->getName();  endif; ?>' size="70" /></td>
		</tr>
		<tr>
			<td class='tdTitle'>##164,Apellido##</td>
			<td><input name='surname' type='text'  class='textodato' value='<?php if ($this->_tpl_vars['accion'] == 'edicion'):  echo $this->_tpl_vars['currentAffiliateUserInfo']->getSurname();  endif; ?>' size="70" /></td>
		</tr>
		<tr>
			<td class='tdTitle'>E-mail</td>
			<td><input name='mailAddress' type='text'  class='textodato' value='<?php if ($this->_tpl_vars['accion'] == 'edicion'):  echo $this->_tpl_vars['currentAffiliateUserInfo']->getMailAddress();  endif; ?>' size="70" /></td>
		</tr>
		<tr>
			<td class='tdTitle'>##165,Contraseña##</td>
			<td><input name='pass' type='password' class='textodato' value='' size="20" /></td>
		</tr>
		<tr>
			<td class='tdTitle'>##166,Repetir Contraseña##</td>
			<td><input name='pass2' type='password' class='textodato' value='' size="20" /></td>
		</tr>
		<tr>
			<td class='tdTitle'>Nivel de Usuario</td>
			<td>
        <select name='levelId'>
        	<option value="">Seleccionar nivel</option>
					<?php $_from = $this->_tpl_vars['levels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['for_levels'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['for_levels']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['level']):
        $this->_foreach['for_levels']['iteration']++;
?>
        	<option value="<?php echo $this->_tpl_vars['level']->getId(); ?>
"<?php if ($this->_tpl_vars['accion'] == 'edicion' && $this->_tpl_vars['level']->getId() == $this->_tpl_vars['currentAffiliateUser']->getLevelId()): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['level']->getName(); ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
       	</select>
			</td>
		</tr>
		<?php if (count($this->_tpl_vars['affiliates']) > 0): ?>
		<tr>
			<td class='tdTitle'>Afiliado</td>
			<td>
				<select name='affiliateId'>
					<option value="">Seleccionar afiliado</option>
					<?php $_from = $this->_tpl_vars['affiliates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['for_affiliates'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['for_affiliates']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['affiliate']):
        $this->_foreach['for_affiliates']['iteration']++;
?>
					<option value="<?php echo $this->_tpl_vars['affiliate']->getId(); ?>
"<?php if ($this->_tpl_vars['affiliate']->getId() == $this->_tpl_vars['affiliateId']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['affiliate']->getName(); ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</td>
		</tr>
		<?php endif; ?>
		<tr>
			<td class='cellboton' colspan='2'> <?php if ($this->_tpl_vars['accion'] == 'edicion'): ?>
				<input type="hidden" name="accion" value="edicion" />
				<?php endif; ?>
				<input type='submit' name='guardar' value='##97,Guardar##' class='button' />
				&nbsp;&nbsp;
				<input type='button' onClick='javascript:history.go(-1)' value='##104,Regresar##' class='button'  />
			</td>
		</tr>
	</table>
</form>
<?php if ($this->_tpl_vars['accion'] == 'edicion'): ?>
<table width='100%' border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'>
	<caption>
	##167,El usuario ## <?php echo $this->_tpl_vars['currentAffiliateUser']->getUsername(); ?>
 ##168,es miembro de los grupos:##
	</caption>
	<?php if (count($this->_tpl_vars['currentUserGroups']) == 0): ?>
	<tr>
		<th colspan="2">##169,El usuario todavía no es miembro de ningún grupo##.</th>
	</tr>
	<?php else: ?>
	<tr>
		<th width="95%">##170,Grupo##</th>
		<th width="5%">&nbsp;</th>
	</tr>
	<?php $_from = $this->_tpl_vars['currentUserGroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['for_user_group'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['for_user_group']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['userGroup']):
        $this->_foreach['for_user_group']['iteration']++;
?>
	<?php $this->assign('group', $this->_tpl_vars['userGroup']->getAffiliateUserGroup()); ?>
	<tr>
		<td><div class='titulo2'><?php echo $this->_tpl_vars['group']->getName(); ?>
</div></td>
		<td class='cellopciones' nowrap> [ <a href='Main.php?do=affiliatesUsersDoRemoveFromGroup&user=<?php echo $this->_tpl_vars['currentAffiliateUser']->getId(); ?>
&group=<?php echo $this->_tpl_vars['group']->getId(); ?>
' class='delete'>##115,Eliminar##</a> ] </td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
	<tr>
		<td class='cellboton' colspan='4'>##171,Agregar al Usuario en el Grupo##:
			<form action='Main.php' method='post'>
				<input type="hidden" name="do" value="affiliatesUsersDoAddToGroup" />
				<select name="group">
					<option value="" selected="selected">##172,Seleccionar grupo##</option>
								<?php $_from = $this->_tpl_vars['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['for_groups'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['for_groups']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group']):
        $this->_foreach['for_groups']['iteration']++;
?>
					<option value="<?php echo $this->_tpl_vars['group']->getId(); ?>
"><?php echo $this->_tpl_vars['group']->getName(); ?>
</option>
								<?php endforeach; endif; unset($_from); ?>
				</select>
				<input type="hidden" name="user" value="<?php echo $this->_tpl_vars['currentAffiliateUser']->getId(); ?>
" />
				<input type='submit' value='##123,Agregar##' class='button' />
			</form></td>
	</tr>
</table>
<?php endif; ?>
<?php endif; ?>


<?php if ($this->_tpl_vars['loginUser'] != ''): ?>
<h3>Ver Usuarios por Afiliado</h3>
			<form name="affiliateFilter" action="Main.php" method="get">
			<select name="affiliateId">
					<option value="0">Seleccione un Afiliado</option>
					<option value="-1">Todos</option>
				<?php $_from = $this->_tpl_vars['affiliates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['for_affiliate'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['for_affiliate']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['affiliate']):
        $this->_foreach['for_affiliate']['iteration']++;
?>
					<option value="<?php echo $this->_tpl_vars['affiliate']->getId(); ?>
"<?php if ($this->_tpl_vars['affiliate']->getId() == $this->_tpl_vars['affiliateId']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['affiliate']->getName(); ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
			</select> 
			<input type="hidden" name="do" value="affiliatesUsersList" />
			<input name="submit" type="submit" value="Consultar" class="button" />
		</form>
<?php endif; ?>

<table cellpadding='5' cellspacing='1' width='100%' class='tableTdBorders'>
	<tr>
		<th>##162,Identificación de Usuario##</th>
		<th>&nbsp;</th>
	</tr>
	<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['for_users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['for_users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['user']):
        $this->_foreach['for_users']['iteration']++;
?>
	<tr>
		<td width="90%"><div class='titulo2'><?php echo $this->_tpl_vars['user']->getUsername(); ?>
</div></td>
		<td width="10%" class='cellTextOptions' nowrap> [ <a href='Main.php?do=affiliatesUsersList&user=<?php echo $this->_tpl_vars['user']->getId(); ?>
']' class='edit'>##114,Editar##</a> ]
			[ <a href='Main.php?do=affiliatesUsersDoDelete&id=<?php echo $this->_tpl_vars['user']->getId(); ?>
']' class='delete'>##115,Eliminar##</a> ] </td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	<tr>
		<td class='cellboton' colspan='4'><form action='Main.php' method='get'>
				<input type="hidden" name="do" value="affiliatesUsersList" />
				<input type="hidden" name="user" value="" />
				<input type="hidden" name="affiliateId" value="<?php echo $this->_tpl_vars['affiliateId']; ?>
" />
				<input type='submit' value='##173,Nuevo Usuario##' class='button' />
			</form></td>
	</tr>
</table>

<?php if (count($this->_tpl_vars['deletedUsers']) > 0): ?>
<br />
<table width='100%' border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'>
	<tr>
		<td colspan='4' class='celltitulo2'>##175,Usuarios Eliminados##&nbsp;<a href="javascript:void(null)" class='deta' onClick="alert('##174,Si quiere dar de alta a un usuario que estuvo registrado alguna vez, debe reactivarlo desde esta opción. Si lo intenta desde un usuario nuevo el sistema le informará que ese usuario ya está en uso.##')">##38,Ayuda##</a> </td>
	</tr>
	<tr>
		<th>##162,Identificación de Usuario##</th>
		<th>&nbsp;</th>
	</tr>
	<?php $_from = $this->_tpl_vars['deletedUsers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['for_deleted_users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['for_deleted_users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['user']):
        $this->_foreach['for_deleted_users']['iteration']++;
?>
	<tr>
		<td width="90%"><div class='titulo2'><?php echo $this->_tpl_vars['user']->getUsername(); ?>
</div></td>
		<td width="10%" nowrap class='cellTextOptions'> [ <a href='Main.php?do=affiliatesUsersDoActivate&user=<?php echo $this->_tpl_vars['user']->getId(); ?>
' class='edit'>##176,Reactivar##</a> ] </td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<?php endif; ?>