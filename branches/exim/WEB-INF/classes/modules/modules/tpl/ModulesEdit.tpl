<h2>Configuración del Sistema</h2>
<h1>Administración de Módulos - |-$module->getName()|capitalize-|</h1>
<p>A continuación podrá cambiar la etiqueta del nombre del módulo y su descripción. Estos cambios no alteran la funcionalidad de los módulos, son sólo los nombres y descripciones que se le  mostrarán al usuario.</p> 
<form name="moduleEdit" action="Main.php?do=modulesDoEdit" method="POST">
<input type=hidden name="moduleName" value="|-$module->getName()-|" />
<fieldset title="Formulario de informaciónd el módulo"> 
	<legend>Información del módulo</legend>
		<p><label for="moduleName">Módulo</label>
			<input type="text" value="|-$module->getName()|capitalize-|" size="25" readonly="readonly" />
	</p>			
		<p><label for="label">Etiqueta</label>
			<input name="label" type="text" value="|-$module->getLabel()-|" size="50" /></td>
		</p>
		<p><label for="description">Descripción</label>
				<textarea cols="60" rows="5" wrap="VIRTUAL">|-$module->getDescription()-|</textarea>
	</p>
		<p>
				<input type="submit" name="Activar" value="Guardar Cambios" class="button"/>
			</p> 
</fieldset> 
</form>