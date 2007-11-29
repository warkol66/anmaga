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
		<td class='backgroundTitle'>Variables de Configuración del Sistema</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
|-if $message eq "ok"-|	<tr>
		<td class="errorMessage">Configuración Guardada!</td>
	</tr>
<tr>
	<td>&nbsp;</td>
</tr>
|-/if-|	<tr>
		<td>A continuación podrá editar las variables de configuración del sistema.</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>
			|-if $selectedModule ne ""-|Modulo: |-$selectedModule|capitalize-|&nbsp;&nbsp;&nbsp;&nbsp;|-/if-|
      	<form action="Main.php" method="get">
					<select name="module" onchange="this.parentNode.submit();">
						<option value="">|-if $selectedModule ne ""-|Seleccionar otro|-else-|Seleccionar|-/if-| Módulo</option>
					|-foreach from=$modules item=blcok name=for_block key=block_name-|
						<option value="|-$block_name-|">|-$block_name|capitalize-|</option>
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
		<li id="config[|-$selectedModule-|]"><span class='titulo2'>|-$selectedModule-|</span>
			<ul id="config[|-$selectedModule-|]_ul">
				|-include file=ConfigSetInclude.tpl elements=$config name=[$selectedModule]-|
			</ul>
		</li>
	</ul>
	<input type="hidden" name="do" value="configDoSet" />
	<input type="hidden" name="module" value="|-$selectedModule-|" />
	<input type="submit" value="Guardar" class="button" />
</form>
|-/if-|
