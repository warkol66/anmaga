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
|-if $message eq "ok"-|	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>
			Configuración Guardada!  </td>
	</tr>|-/if-|
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>A continuación podrá ver las variables de configuración del sistema.</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>
<div id="boxVariables">
<ul>
	|-foreach from=$config item=block name=for_blocks key=name-|
	  <li><span class='titulo2'>|-$name-|</span></li>
	<ul>
		|-include file=ConfigViewInclude.tpl elements=$block-|
	</ul>
	</li>
	|-/foreach-|
</ul>
</div>
<br />
<a href="Main.php?do=configEdit">Editar Config</a>
