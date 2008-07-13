<h2>Configuración del Sistema</h2>
	<h1>Variables de Configuración del Sistema</h1>
		<p>A continuación podrá editar las variables de configuración del sistema.</p>
|-if $message eq "ok"-|
		<div class="successMessage">Configuración Guardada!</div>
|-/if-|
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
|-if $selectedModule ne ""-|
<div id="boxVariables">
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
</div>
|-/if-|
