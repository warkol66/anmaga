<script type="text/javascript" src="Main.php?do=js&name=js&module=install&code=|-$currentLanguageCode-|"></script>

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
<table width="100%" cellpadding="5" cellspacing="0" class="tableTdBorders"> 
	<tr> 
		<th width="20%" scope="col" class="thFillTitle">Nombre del  Módulo</th> 
		<th width="20%" scope="col" class="thFillTitle">Acción</th>
		<th width="60%" scope="col" class="thFillTitle">Pasos Específicos del proceso de instalación</th> 
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
				<input type="submit" value="Información" />
			</form>
			<form method="get">
				<input type="hidden" name="do" value="installSetupPermissions" />
				<input type="hidden" name="moduleName" value="|-$module-|" />
				<input type="submit" value="Permisos" />
			</form>
			<form method="get">
				<input type="hidden" name="do" value="installSetupMessages" />
				<input type="hidden" name="moduleName" value="|-$module-|" />
				<input type="submit" value="Mensajes de Log" />
			</form>
		</td> 
	</tr> 
	|-/foreach-|
</table>
<h4>Módulos Instalados</h4> 
<table width="100%" cellpadding="5" cellspacing="0" class="tableTdBorders"> 
	<tr> 
		<th width="20%" class="thFillTitle" scope="col">Nombre del Módulo</th> 
		<th width="20%" class="thFillTitle" scope="col">Acción</th>
		<th width="60%" class="thFillTitle" scope="col">Pasos Específicos del proceso de instalación</th>		 
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
				<input type="submit" value="Información" />
			</form>
			<form method="get">
				<input type="hidden" name="do" value="installSetupPermissions" />
				<input type="hidden" name="moduleName" value="|-$module->getName()-|" />
				<input type="hidden" name="mode" value="reinstall">
				<input type="submit" value="Permisos" />
			</form>
			<form method="get">
				<input type="hidden" name="do" value="installSetupMessages" />
				<input type="hidden" name="moduleName" value="|-$module->getName()-|" />
				<input type="hidden" name="mode" value="reinstall">
				<input type="submit" value="Mensajes de Log" />
			</form>
		</td> 
	</tr> 
	|-/foreach-|
</table>
