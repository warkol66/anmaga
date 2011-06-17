<h2>Configuración del Sistema</h2>
<h1>Administracion de Permisos</h1>
<form method="get" style="display:inline;"><p>Seleccione un módulo
		<input type="hidden" name="do" value="securityEditPermissions" />
	<select name="moduleName" onchange="this.form.submit();">
		<option value="modules">modules</option>
		<option value="">|-if $moduleName ne ""-|Seleccionar otro|-else-|Seleccionar|-/if-| módulo</option>
	|-foreach from=$modules item=eachModule name=for_modules-|
		<option value="|-$eachModule-|" |-$eachModule|selected:$moduleName-|>|-$eachModule|multilang_get_translation:"common"-|</option>
	|-/foreach-|
	</select>
	</p></form>
|-if $message eq "ok"-|
	<div class="successMessage">Modificación de permisos existosa</div>
|-elseif $message eq "failure"-|
	<div class="successMessage">Mo se pudo procesar su solicitud</div>
|-/if-|
|-if $moduleName eq ""-|
<h1>Administracion de Permisos: Módulo <strong>|-$moduleName|multilang_get_translation:"common"-|</strong>.</h1>
|-/if-|
<fieldset>
	<legend>Configuración de Permisos</legend>
	<p>Asigne los permisos correspondientes</p> 
	<form method="post">
		<p>
		<input type="submit" value="Modificar permisos" />
	</p>

	<input type="hidden" name="moduleName" value="|-$moduleName-|" />
		<h4>Permisos Generales del Módulo</h4>
		<p>El permiso generarl del módulo maneja el acceso a las acciones del mismo, siempre que no tengan permisos definidos en forma individual en la parte inferior.</p>
|-include file="SecurityEditPermissionsFormInclude.tpl"-|
<p>&nbsp;</p>
<p>
	<input type="hidden" name="do" value="securityDoEditPermissions" />
		<input type="submit" value="Guardar Permisos" />
	</p>
</form>
</fieldset>
