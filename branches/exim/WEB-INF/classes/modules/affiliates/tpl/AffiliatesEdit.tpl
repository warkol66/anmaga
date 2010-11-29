<h2>##40,Configuración del Sistema##</h2>
<h1>Administración de Clientes </h1>
|-if $message eq "emptyAffiliateName"-|
	<div class='errorMessage'>##185,El nombre del Cliente es obligatorio##</div>
|-elseif $message eq "error"-|
	<div class='errorMessage'>##185,Ha ocurrido un error##</div>
|-/if-|
<p class='paragraphEdit'>##180,Realice los cambios enl Cliente y haga click en "Guardar Cambios" para guardar las modificaciones. ##</p>
<form method="post" action="Main.php?do=affiliatesDoEdit">
	<input type="hidden" value="|-$affiliate->getId()-|" name="id">

<fieldset title="Formulario de edición de Clientes">
<legend>Datos del Cliente</legend>

	<p>Ingrese los datos del Cliente; para guardar, haga click en "Guardar Cambios"</p>
	<p><label for="id">ID</label>
				 <input name="id" type="text" value="|-$affiliate->getId()-|" size="4" disabled />
		  </p>
		|-include file="AffiliatesInfoInclude.tpl"-|	
		 <p><input name="save" type="submit" value="Guardar Cambios" /> 
		 </p>
	</fieldset>