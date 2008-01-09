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
		 <td class='backgroundTitle'>Instalacion de Módulos del Sistema</td> 
	 </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
	<tr> 
		 <td class="tdSize2">Instalacion de modulo <strong>|-$moduleName-|</strong>.</td> 
	 </tr> 
	<tr> 
		 <td class="tdSize2">Primer Paso - Configuracion de Permisos de los Actions.</td> 
	 </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
</table> 
<form method="post">

<table width="100%" cellpadding="5" cellspacing="0" class="tableTdBorders"> 
	<tr> 
		<th width="20%" scope="col" class="thFillTitle">Nuevo Módulo</th> 		<th width="10%" scope="col" class="thFillTitle">Permisos</th> 
	</tr> 
	
	|-foreach from=$actions item=action name=modulef-|
	<tr> 
		<td class="tdSize1">|-$action-|</td> 		<td class="tdSize1" nowrap>
			<input type="checkbox" name="permission[|-$action-|][supervisor]" value="true">supervisor<br>
			<input type="checkbox" name="permission[|-$action-|][admin]" value="true">admin<br>
			<input type="checkbox" name="permission[|-$action-|][user]" value="true">user<br>
			<input type="checkbox" name="permission[|-$action-|][all]" value="true">todos<br></td>
		</td> 
	</tr> 
	|-/foreach-|
	
</table> 
	<input type="hidden" name="do" value="installDoSetupPermissions" />
	<p><input type="submit" value="Generar Permisos" /></p>
</form>

