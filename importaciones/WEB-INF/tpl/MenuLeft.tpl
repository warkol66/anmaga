|-if $loginUser neq ""-|
	<ul>
		<li class="menuLink"><a href="Main.php?do=usersWelcome">Ir al Inicio</a></li>
	</ul>
	<ul>
		<li class="titleMenu"><a href="javascript:switch_vis('importMenu');" class="linkSwitchMenu">Importaciones</a></li>
	</ul>
		<div id="importMenu" style="display:|-if $module|lower eq 'import'-|block|-else-|none|-/if-|;">
			<ul>
				<li class="menuLink"><a href="Main.php?do=importProductsList">Importaciones</a></li>
		|- if $loginUser->isAdmin()-|		
				<li class="menuLink"><a href="Main.php?do=importProductsList">Administrar Productos</a></li>
				<li class="menuLink"><a href="Main.php?do=importIncotermsList">Administrar Incoterms</a></li>
				<li class="menuLink"><a href="Main.php?do=importPortsList">Administrar Puertos</a></li>
				<li class="menuLink"><a href="Main.php?do=importSuppliersList">Administrar Suppliers</a></li>
		|-/if-|
			</ul>
		</div>
|- if $loginUser->isAdmin()-|		
	<ul>
		<li class="titleMenu"><a href="javascript:switch_vis('adminMenu');" class="linkSwitchMenu">Administración</a></li>
	</ul>
		<div id="adminMenu" style="display:|-if $module|lower eq 'users' || $module|lower eq 'security' || $module|lower eq 'backups' || $module|lower eq 'registration' || $module|lower eq 'categories'-|block|-else-|none|-/if-|;">
			<ul>
				<li class="menuLink"><a href="Main.php?do=usersList">Usuarios</a></li>
				<li class="menuLink"><a href="Main.php?do=usersGroupsList">Grupos de Usuarios</a></li>
				<li class="menuLink"><a href="Main.php?do=usersLevelsList">Niveles Usuarios</a></li>
				<li class="menuLink"><a href="Main.php?do=categoriesList">Categorías</a></li>
				<li class="menuLink"><a href="Main.php?do=securityActionUsersList">Permisos de usuarios</a></li>
				<li class="menuLink"><a href="Main.php?do=securityModuleList">Permisos de módulos</a></li>
				<li class="menuLink"><a href="Main.php?do=backupList">Respaldos</a></li>
				<li class="menuLink"><a href="Main.php?do=affiliatesList">Clientes</a></li>

			</ul>
		</div>
|-/if-|
<a href="Main.php?do=usersDoLogout" onClick='return window.confirm("¿Esta seguro que quiere salir del sistema?")' id="logout"></a>
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
    <td class="menuCell"><a class="menuButton" href="Main.php?do=importRequestList">Importaciones</a></td>
  </tr>
|-if $module|upper eq "IMPORT"-|
	<tr> 
    <td class="menuCell"><div class="menuSection"><a class="menuSubButton" href="Main.php?do=importRequestList">Ordenes de Pedido</a>
	</td>
  </tr>
|-/if-|

	<a href="Main.php?do=usersDoLogout" onClick='return window.confirm("¿Esta seguro que quiere salir del sistema?")' id="logout"></a>
|-/if-|
