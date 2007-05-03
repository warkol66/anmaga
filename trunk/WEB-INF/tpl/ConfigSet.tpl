|-include file="header.tpl"-|
<table border='0' cellpadding='0' cellspacing='0' width='100%'>
	<tr>
		<td class='titulo'>Configuración del Sistema</td>
	</tr>
	<tr>
		<td class='subrayatitulo'><img src="images/clear.gif" height='3' width='1'></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class='fondotitulo'>Variables de Configuración del Sistema</td>
	</tr>
	<tr>
		<td>|-if $message eq "ok"-|Configuración Guardada!&nbsp;|-/if-|</td>
	</tr>
	<tr>
		<td class='texto'>A continuaci&oacute;n podr&aacute; editar las variables de configuración del sistema.</td>
	</tr>
	<tr>
		<td>
			|-if $selectedModule ne ""-|
				Modulo: |-$selectedModule-|
			|-/if-|&nbsp;
      	<form action="Main.php" method="get">
					<select name="module" onchange="this.parentNode.submit();">
						<option value="">Seleccionar Modulo</option>
					|-foreach from=$modules item=module name=for_modules key=module_name-|
						<option value="|-$module_name-|">|-$module_name-|</option>
					|-/foreach-|
					</select>
					<input type="hidden" name="do" value="configSet" />
				</form>
		</td>
	</tr>
</table>
|-if $selectedModule ne ""-|
<form method="post" action="Main.php">
			<ul id="config_ul">
				|-foreach from=$config item=module name=for_modules key=module_name-|
				<li id="config[|-$module_name-|]"><span class='titulo2'>|-$module_name-|</span>
					<ul id="config[|-$module_name-|]_ul">
						|-include file=ConfigSetInclude.tpl elements=$module name=[$module_name]-|
					</ul>
				</li>
				|-/foreach-|
			</ul>
	<input type="hidden" name="do" value="configDoSet" />
	<input type="hidden" name="module" value="|-$selectedModule-|" />
	<input type="submit" value="Guardar" class="boton" />
</form>
|-/if-|
