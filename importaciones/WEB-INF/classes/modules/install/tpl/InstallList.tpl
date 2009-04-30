<script type="text/javascript" src="scripts/install.js"></script>

<h2>Configuración</h2>
<h1>Instalación de Módulos del Sistema</h1>
<p>A continuación podrá instalar nuevos módulos o reinstalar aquellos que se encuentran en el sistema.</p>
|- if $message eq "success" -|
	<div class='successMessage'>El Módulo Ha sido instalado Correctamente</div>
|-/if-|
|- if $message eq "success-sql" -|
	<div class='successMessage'>El Módulo Ha sido instalado Correctamente. Los Scripts de SQL se han cargado a la base de datos.</div>
|-/if-|
|- if $message eq "step-success" -|
	<div class='successMessage'>El paso de instalacion ha sido ejecutado correctamente.</div>
|-/if-|
	<h4>Módulos disponibles para instalar</h4>
	<p>
<table cellpadding="5" cellspacing="0" class="tableTdBorders"> 
	<tr> 
		<th width="50%" scope="col" class="thFillTitle">Nombre del Nuevo Módulo</th> 
		<th width="10%" scope="col" class="thFillTitle">Acción</th>
		<th width="40%" scope="col" class="thFillTitle">Pasos Especificos del proceso de instalacion</th> 
	</tr> 
	|-foreach from=$modulesToInstall item=module name=modulef-|
	<tr> 
		<td>|-$module-|</td> 
		<td nowrap>
			<form method="get">
				<input type="hidden" name="do" value="installSetupSelectLanguages" />
				<input type="hidden" name="moduleName" value="|-$module-|" />
				<input type="submit" value="Instalar" />
			</form>		
		</td>
		<td nowrap>
			<form method="post">
				<input type="hidden" name="do" value="installSetupModuleInformation" />
				<input type="hidden" name="moduleName" value="|-$module-|" />
				<input type="submit" value="Setup de Informacion del Modulo" />
			</form>
			<form method="get">
				<input type="hidden" name="do" value="installSetupPermissions" />
				<input type="hidden" name="moduleName" value="|-$module-|" />
				<input type="submit" value="Setup de Permisos del Modulo" />
			</form>
			<form method="get">
				<input type="hidden" name="do" value="installSetupMessages" />
				<input type="hidden" name="moduleName" value="|-$module-|" />
				<input type="submit" value="Setup de Mensajes de Log del Modulo" />
			</form>
		</td> 
	</tr> 
	|-/foreach-|
</table>
<h4>Módulos Instalados</h4> 
<table cellpadding="5" cellspacing="0" class="tableTdBorders"> 
	<tr> 
		<th width="50%" scope="col" class="thFillTitle">Nombre del Módulo</th> 
		<th width="10%" scope="col" class="thFillTitle">Acción</th>
		<th width="40%" scope="col" class="thFillTitle">Pasos Especificos del proceso de instalacion</th>		 
	</tr> 
	|-foreach from=$modulesInstalled item=module name=modulef-|
	<tr> 
		<td>|-$module->getName()-|</td> 
		<td nowrap>
			<form method="get">
				<input type="hidden" name="do" value="installSetupSelectLanguages" />
				<input type="hidden" name="moduleName" value="|-$module->getName()-|" />
				<input type="hidden" name="mode" value="reinstall">
				<input type="submit" value="Reinstalar" />
			</form>		
		</td>
		<td nowrap>
			<form method="post">
				<input type="hidden" name="do" value="installSetupModuleInformation" />
				<input type="hidden" name="moduleName" value="|-$module->getName()-|" />
				<input type="hidden" name="mode" value="reinstall">
				<input type="submit" value="Setup de Informacion del Modulo" />
			</form>
			<form method="get">
				<input type="hidden" name="do" value="installSetupPermissions" />
				<input type="hidden" name="moduleName" value="|-$module->getName()-|" />
				<input type="hidden" name="mode" value="reinstall">
				<input type="submit" value="Setup de Permisos del Modulo" />
			</form>
			<form method="get">
				<input type="hidden" name="do" value="installSetupMessages" />
				<input type="hidden" name="moduleName" value="|-$module->getName()-|" />
				<input type="hidden" name="mode" value="reinstall">
				<input type="submit" value="Setup de Mensajes de Log del Modulo" />
			</form>
		</td> 
	</tr> 
	|-/foreach-|
</table>
