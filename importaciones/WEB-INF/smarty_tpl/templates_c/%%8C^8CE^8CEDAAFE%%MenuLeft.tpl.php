<?php /* Smarty version 2.6.16, created on 2007-11-30 11:00:48
         compiled from MenuLeft.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', 'MenuLeft.tpl', 9, false),)), $this); ?>
<?php if ($this->_tpl_vars['loginUser'] != ""): ?>
<table width="150" border="0" cellpadding="0" cellspacing="0" class="menuCell">
  <tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=usersWelcome">Ir al Inicio</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=catalogShow">Catálogo</a></td>
  </tr>
<?php if (((is_array($_tmp=$this->_tpl_vars['module'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)) == 'CATALOG'): ?>
	<tr> 
    <td class="menuCell"><div class="menuSection"><a class="menuSubButton" href="Main.php?do=catalogProductCategoriesList">Administrar Categorías de Productos</a>
		<a class="menuSubButton" href="Main.php?do=catalogProductsList">Administrar Productos</a>
		<a class="menuSubButton" href="Main.php?do=catalogUnitsList">Administrar Unidades</a>
		<a class="menuSubButton" href="Main.php?do=catalogMeasureUnitsList">Administrar Unidades de Medida</a>
		<a class="menuSubButton" href="Main.php?do=catalogAffiliateProductsImport">Administrar listas de precio por cliente</a></div>
	</td>
  </tr>
<?php endif; ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['module'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)) == 'CATALOG' || ((is_array($_tmp=$this->_tpl_vars['module'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)) == 'ORDERS'): ?>
	<tr> 
    <td class="menuCell"><div class="menuSection"><a class="menuSubButton" href="Main.php?do=ordersViewCart">Ver carrito de compras</a>
		<a class="menuSubButton" href="Main.php?do=ordersList">Ver ordenes</a>
		<a class="menuSubButton" href="Main.php?do=ordersTemplatesList">Ver plantillas de ordenes</a></div>
	</td>
  </tr>
<?php endif; ?>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=ordersList">Lista de Pedidos</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=ordersImport">Importar Pedidos</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=affiliatesList">Distribuidores / Mayoristas</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=affiliatesBranchsList">Sucursales de Distribuidores / Mayoristas</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=affiliatesUsersList">Usuarios de Distribuidores / Mayoristas</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=configView">Configuración</a></td>
  </tr>
<?php if (((is_array($_tmp=$this->_tpl_vars['module'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)) == 'CONFIG'): ?>
	<tr> 
    <td class="menuCell"><div class="menuSection"><a class="menuSubButton" href="Main.php?do=configSet">Cambiar Configuración</a>
		<a class="menuSubButton" href="Main.php?do=configEdit">Editar Configuración</a></div></td>
  </tr>
<?php endif; ?>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=usersList">Administración de Usuarios</a></td>
  </tr>
<?php if (((is_array($_tmp=$this->_tpl_vars['module'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)) == 'USERS'): ?>
	<tr> 
    <td class="menuCell"><div class="menuSection"><a class="menuSubButton" href="Main.php?do=usersLevelsList">Administrar Niveles de Usuario</a>
		<a class="menuSubButton" href="Main.php?do=usersGroupsList">Administrar Grupos de Usuarios</a></div>
	</td>
  </tr>
<?php endif; ?>	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=modulesList">Administrar módulos</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=usersDoLogout" onClick='return window.confirm("¿Esta seguro que quiere salir del sistema?")'>Salir del sistema</a></td>
  </tr>
</table>
<?php endif; ?>
<?php if ($this->_tpl_vars['loginAffiliateUser'] != ""): ?>
<table width="150" border="0" cellpadding="0" cellspacing="0" class="menuCell">
  <tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=usersByaffiliateWelcome">Ir al Inicio</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=catalogShow">Catálogo</a></td>
  </tr>
<?php if (((is_array($_tmp=$this->_tpl_vars['module'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)) == 'CATALOG' || ((is_array($_tmp=$this->_tpl_vars['module'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)) == 'ORDERS'): ?>
	<tr> 
    <td class="menuCell"><div class="menuSection"><a class="menuSubButton" href="Main.php?do=ordersViewCart">Ver carrito de compras</a>
		<a class="menuSubButton" href="Main.php?do=ordersList">Ver ordenes</a>
		<a class="menuSubButton" href="Main.php?do=ordersTemplatesList">Ver plantillas de ordenes</a></div>
	</td>
  </tr>
<?php endif; ?>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=ordersViewCart">Pedido en Proceso</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=ordersList">Pedidos Procesados</a></td>
  </tr>
	<tr>
    <td class="menuCell"><a class="menuButton" href="Main.php?do=ordersTemplatesList">Pedidos Almacenados</a></td>
  </tr>
	<tr>
    <td class="menuCell"><a class="menuButton" href="Main.php?do=affiliatesUsersList">Usuarios de Distribuidores / Mayoristas</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=affiliatesBranchsList">Sucursales</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=affiliatesUsersDoLogout" onClick='return window.confirm("¿Esta seguro que quiere salir del sistema?")'>Salir del sistema</a></td>
  </tr>
</table>
<?php endif; ?>