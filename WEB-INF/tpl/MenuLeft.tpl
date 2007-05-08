Menu Users
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
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=affiliatesList">Distribuidores / Mayoristas</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=usersByAffiliateList">Usuarios de Distribuidores / Mayoristas</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=configView">Ver Configuracion</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=configEdit">Editar Configuración</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=usersList">Editar Usuarios</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=modulesLoad">Administrar módulos</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=usersDoLogout" onClick='return window.confirm("¿Esta seguro que quiere salir del sistema?")'>Salir del sistema</a></td>
  </tr>
</table>
Menu UsersByAffiliate
<table width="150" border="0" cellpadding="0" cellspacing="0" class="menuCell">
  <tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=usersByaffiliateWelcome">Ir al Inicio</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=catalogShow">Catálogo</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=usersByAffiliateList">Usuarios de Distribuidores / Mayoristas</a></td>
  </tr>
	<tr> 
    <td class="menuCell"><a class="menuButton" href="Main.php?do=usersByAffiliateDoLogout" onClick='return window.confirm("¿Esta seguro que quiere salir del sistema?")'>Salir del sistema</a></td>
  </tr>
</table>



