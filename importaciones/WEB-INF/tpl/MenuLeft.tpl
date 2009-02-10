|-if $loginUser neq ""-|
	<ul>
		<li class="menuLink"><a href="Main.php?do=usersWelcome">Ir al Inicio</a></li>
	</ul>
	<ul>
		<li class="titleMenu"><a href="javascript:switch_vis('importMenu');" class="linkSwitchMenu">Importaciones</a></li>
	</ul>
		<div id="importMenu" style="display:|-if $module|lower eq 'import'-|block|-else-|none|-/if-|;">
			<ul>
				<li class="menuLink"><a href="Main.php?do=importClientQuoteList">Cotizaciones de Cliente</a></li>
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
  	<ul>
		<li class="menuLink"><a href="Main.php?do=affiliatesUsersWelcome">Ir al Inicio</a></li>
		<li class="menuLink"><a href="Main.php?do=affiliatesUsersList">Usuarios de Distribuidores / Mayoristas</a></li>
		<li class="menuLink"><a href="Main.php?do=affiliatesBranchsList">Sucursales</a></li>
		<li class="menuLink"><a href="Main.php?do=importRequestList">Importaciones</a></li>
	</ul>
	<ul>
		<li class="titleMenu"><a href="javascript:switch_vis('importAffiliateMenu');" class="linkSwitchMenu">Importaciones</a></li>
  	</ul>
	<div id="importAffiliateMenu">
		<ul>
			<li class="menuLink"><a href="		Main.php?do=importClientQuoteList">Cotizaciones</a></li>
		</ul>
	</div>

	<a href="Main.php?do=affiliatesUsersDoLogout" onClick='return window.confirm("¿Esta seguro que quiere salir del sistema?")' id="logout"></a>
|-/if-|
