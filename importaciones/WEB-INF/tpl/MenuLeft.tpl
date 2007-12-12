|-if $loginUser neq ""-|
<table width="150" border="0" cellpadding="0" cellspacing="0" class="menuCell">
  <tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=usersWelcome">Ir al Inicio</a></td>
  </tr>
  <tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=importProductsList">Importaciones</a></td>
  </tr>
|-if $module|upper eq "IMPORT"-|
	<tr> 
    <td class="menuCell"><div class="menuSection"><a class="menuSubButton" href="Main.php?do=importProductsList">Administrar Productos</a>
		<a class="menuSubButton" href="Main.php?do=importIncotermsList">Administrar Incoterms</a>
		<a class="menuSubButton" href="Main.php?do=importPortsList">Administrar Puertos</a>
		<a class="menuSubButton" href="Main.php?do=importSuppliersList">Administrar Suppliers</a></div>
	</td>
  </tr>
|-/if-|

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
|-if $loginAffiliateUser neq ""-|
<table width="150" border="0" cellpadding="0" cellspacing="0" class="menuCell">
  <tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=usersByaffiliateWelcome">Ir al Inicio</a></td>
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
|-/if-|
