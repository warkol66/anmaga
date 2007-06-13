|-if $loginUser neq ""-|
<table width="150" border="0" cellpadding="0" cellspacing="0" class="menuCell">
  <tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=usersWelcome">Ir al Inicio</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=catalogShow">Catálogo</a></td>
  </tr>
|-if $module|upper eq "CATALOG"-|
	<tr> 
    <td class="menuCell"><div class="menuSection"><a class="menuSubButton" href="Main.php?do=catalogProductCategoriesList">Administrar Categorías de Productos</a>
		<a class="menuSubButton" href="Main.php?do=catalogProductsList">Administrar Productos</a>
		<a class="menuSubButton" href="Main.php?do=catalogUnitsList">Administrar Unidades</a>
		<a class="menuSubButton" href="Main.php?do=catalogMeasureUnitsList">Administrar Unidades de Medida</a></div>
	</td>
  </tr>
|-/if-|
|-if $module|upper eq "CATALOG" || $module|upper eq "ORDERS" -|
	<tr> 
    <td class="menuCell"><div class="menuSection"><a class="menuSubButton" href="Main.php?do=ordersViewCart">Ver carrito de compras</a>
		<a class="menuSubButton" href="Main.php?do=ordersList">Ver ordenes</a>
		<a class="menuSubButton" href="Main.php?do=ordersTemplatesList">Ver plantillas de ordenes</a></div>
	</td>
  </tr>
|-/if-|
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
    <td class="menuCell"><a class="menuButton" href="Main.php?do=usersByAffiliateList">Usuarios de Distribuidores / Mayoristas</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=configView">Configuración</a></td>
  </tr>
|-if $module|upper eq "CONFIG"-|
	<tr> 
    <td class="menuCell"><div class="menuSection"><a class="menuSubButton" href="Main.php?do=configSet">Cambiar Configuración</a>
		<a class="menuSubButton" href="Main.php?do=configEdit">Editar Configuración</a></div></td>
  </tr>
|-/if-|
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=usersList">Administración de Usuarios</a></td>
  </tr>
|-if $module|upper eq "USERS"-|
	<tr> 
    <td class="menuCell"><div class="menuSection"><a class="menuSubButton" href="Main.php?do=usersLevelsList">Administrar Niveles de Usuario</a>
		<a class="menuSubButton" href="Main.php?do=usersGroupsList">Administrar Grupos de Usuarios</a></div>
	</td>
  </tr>
|-/if-|	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=modulesList">Administrar módulos</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=usersDoLogout" onClick='return window.confirm("¿Esta seguro que quiere salir del sistema?")'>Salir del sistema</a></td>
  </tr>
</table>
|-/if-|
|-if $loginUserByAffiliate neq ""-|
<table width="150" border="0" cellpadding="0" cellspacing="0" class="menuCell">
  <tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=usersByaffiliateWelcome">Ir al Inicio</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=catalogShow">Catálogo</a></td>
  </tr>
|-if $module|upper eq "CATALOG" || $module|upper eq "ORDERS" -|
	<tr> 
    <td class="menuCell"><div class="menuSection"><a class="menuSubButton" href="Main.php?do=ordersViewCart">Ver carrito de compras</a>
		<a class="menuSubButton" href="Main.php?do=ordersList">Ver ordenes</a>
		<a class="menuSubButton" href="Main.php?do=ordersTemplatesList">Ver plantillas de ordenes</a></div>
	</td>
  </tr>
|-/if-|
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
    <td class="menuCell"><a class="menuButton" href="Main.php?do=usersByAffiliateList">Usuarios de Distribuidores / Mayoristas</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=affiliatesBranchsList">Sucursales</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=usersByAffiliateDoLogout" onClick='return window.confirm("¿Esta seguro que quiere salir del sistema?")'>Salir del sistema</a></td>
  </tr>
</table>
|-/if-|