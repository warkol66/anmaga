|-if $loginUser neq ""-|
	<ul>
		<li class="menuLink"><a href="Main.php?do=usersWelcome">Ir al Inicio</a></li>
	</ul>
	<ul>
		<li class="titleMenu"><a href="javascript:switch_vis('importMenu');" class="linkSwitchMenu">Exportaciones</a></li>
	</ul>
		<div id="importMenu" style="display:|-if $module|lower eq 'import' && ($section|lower neq 'products' && $section|lower neq 'suppliers' && $section|lower neq 'ports' && $section|lower neq 'incoterms')-|block|-else-|none|-/if-|;">
			<ul>
		|- if $loginUser->isAdmin()-|		
				<li class="menuLink"><a href="Main.php?do=importClientQuoteList">Cotizaciones de Clientes</a></li>
				<li class="menuLink"><a href="Main.php?do=importSupplierQuoteList">Cotizaciones de Proveedores</a></li>
		|-/if-|
			</ul>
		</div>
|- if $loginUser->isAdmin()-|		
	<ul>
		<li class="titleMenu"><a href="javascript:switch_vis('adminMenu');" class="linkSwitchMenu">Administración</a></li>
	</ul>
		<div id="adminMenu" style="display:|-if $module|lower eq 'users' || $module|lower eq 'security' || $module|lower eq 'backups' || $module|lower eq 'affiliates' || $module|lower eq 'categories' || ($module|lower eq 'import' && ($section|lower eq 'products' || $section|lower eq 'suppliers' || $section|lower eq 'ports' || $section|lower eq 'incoterms'))-|block|-else-|none|-/if-|;">
			<ul>
				<li class="menuLink"><a href="Main.php?do=affiliatesList">Administrar Clientes</a></li>
				<li class="menuLink"><a href="Main.php?do=importProductsList">Administrar Productos</a></li>
				<li class="menuLink"><a href="Main.php?do=importIncotermsList">Administrar Incoterms</a></li>
				<li class="menuLink"><a href="Main.php?do=importPortsList">Administrar Puertos</a></li>
				<li class="menuLink"><a href="Main.php?do=importSuppliersList">Administrar Proveedores </a></li>
				<li class="menuLink"><a href="Main.php?do=usersList">Usuarios</a></li>
				<li class="menuLink"><a href="Main.php?do=usersGroupsList">Grupos de Usuarios</a></li>
				<li class="menuLink"><a href="Main.php?do=usersLevelsList">Niveles Usuarios</a></li>
				<li class="menuLink"><a href="Main.php?do=categoriesList">Categorías</a></li>
				<li class="menuLink"><a href="Main.php?do=backupList">Respaldos</a></li>

			</ul>
		</div>
	<ul>
		<li class="titleMenu"><a href="javascript:switch_vis('configMenu');" class="linkSwitchMenu">Configuración</a></li>
	</ul>
		<div id="configMenu" style="display:|-if $module|lower eq 'config'-|block|-else-|none|-/if-|;">
			<ul>
				<li class="menuLink"><a href="Main.php?do=configView">Ver Configuración</a></li>
				<li class="menuLink"><a href="Main.php?do=configSet">Configurar Sistema</a></li>
				<li class="menuLink"><a href="Main.php?do=configEdit">Editar Configuración</a></li>
			</ul>
		</div>
|-/if-|
<a href="Main.php?do=usersDoLogout" onClick='return window.confirm("¿Esta seguro que quiere salir del sistema?")' id="logout"></a>
|-/if-|
|-if $loginAffiliateUser neq ""-|
  	<ul>
		<li class="menuLink"><a href="Main.php?do=affiliatesUsersWelcome">Ir al Inicio</a></li>
		<li class="menuLink"><a href="Main.php?do=importRequestList">Importaciones</a></li>
	</ul>
	<ul>
		<li class="titleMenu"><a href="javascript:switch_vis('importAffiliateMenu');" class="linkSwitchMenu">Importaciones</a></li>
  	</ul>
	<div id="importAffiliateMenu">
		<ul>
			<li class="menuLink"><a href="Main.php?do=importClientQuoteList">Cotizaciones</a></li>
		</ul>
	</div>

	<a href="Main.php?do=affiliatesUsersDoLogout" onClick='return window.confirm("¿Esta seguro que quiere salir del sistema?")' id="logout"></a>
|-/if-|
