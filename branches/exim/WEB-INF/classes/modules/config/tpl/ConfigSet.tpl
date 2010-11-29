<h2>##40,Configuración del Sistema##</h2>
<h1>Variables de Configuración del Sistema</h1>
<p>A continuación podrá editar las variables de configuración del sistema.</p>
|-if $message eq "ok"-|
	<div class='successMessage'>Configuración Guardada</div>
|-/if-|
<form action="Main.php" method="get">
<p>|-if $selectedModule ne ""-|Sección: |-$selectedModule|multilang_get_translation:"config"-|&nbsp;&nbsp;&nbsp;&nbsp;|-else-|Seleccione la sección a configurar|-/if-|
	<select name="module" onchange="this.form.submit();">
		<option value="">|-if $selectedModule ne ""-|Seleccionar otra|-else-|Seleccionar|-/if-| sección</option>
	|-foreach from=$modules item=blcok name=for_block key=block_name-|
		<option value="|-$block_name-|">|-$block_name|multilang_get_translation:"config"-|</option>
	|-/foreach-|
	</select></p>
	<input type="hidden" name="do" value="configSet" />
</form>
|-if $selectedModule ne ""-|
<!-- BOX VARIABLES ------------------------------->
<div id="boxVariables">
<form method="post" action="Main.php">
	<ul id="config_ul">
		<li id="config[|-$selectedModule-|]"><span class='titulo2'>|-$selectedModule|multilang_get_translation:"config"-|</span>
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
