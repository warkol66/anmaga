 |- if $message eq "success" -|
 	<div align='center' class='errorMessage'>El Modulo Ha sido instalado Correctamente</div>
 |-/if-|
 
 <table border='0' cellpadding='0' cellspacing='0' width='100%'> 
	<tr> 
		 <td class='title'>Configuración del Sistema</td> 
	 </tr> 
	<tr> 
		 <td class='underlineTitle'><img src="images/clear.gif" height='3' width='1'></td> 
	 </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
	<tr> 
		 <td class='backgroundTitle'>Instalacion de Módulos del Sistema </td> 
	 </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
	<tr> 
		 <td class="tdSize2">A continuación podrá instalar nuevos módulos en el sistema. </td> 
	 </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
</table> 
<table width="100%" cellpadding="5" cellspacing="0" class="tableTdBorders"> 
	<tr> 
		<th width="20%" scope="col" class="thFillTitle">Nuevo Módulo</th> 		<th width="10%" scope="col" class="thFillTitle">Accion</th> 
	</tr> 
	|-foreach from=$modulesToInstall item=module name=modulef-|
	<tr> 
		<td class="tdSize1">|-$module-|</td> 		<td class="tdSize1" nowrap><form method="post">
			<input type="hidden" name="do" value="installSetupModuleInformation" />
			<input type="hidden" name="moduleName" value="|-$module-|" />
			<input type="submit" value="Instalar" />
		</form></td> 
	</tr> 
	|-/foreach-|
</table> 
