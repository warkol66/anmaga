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
		 <td class="tdSize2">Primer Paso - Configuracion de Informacion del Modulo.</td> 
	 </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
</table> 
<form  method="post">

	<fieldset>
		<legend>Configuracion de Informacion del Modulo:</legend>
		<ol>
			<li>
				<label>Nombre del Modulo:</label>
				<p><input type="text" name="name" value="|-$moduleName-|"/></p>
			</li>
			<li>	
				<label>Etiquetas:</label><br />
				<p>
				<label>Castellano:</label><br />
				<input type="text" name="labelsSpanish" value=""/><br /><br />
				<label>Ingles:</label><br />
				<input type="text" name="labelsEnglish" value=""/><br />
				</p>
			</li>
			<li>
				<label>Descripcion:</label><br />
				<p>
					<label>Castellano:</label><br />
					<input type="input" name="descriptionSpanish" value=""/><br /><br />
					<label>Ingles:</label><br />
					<input type="input" name="descriptionEnglish" value=""/><br />
				</p>

			</li>
			<li>
				<label>Es un modulo Always Active:</label><br />
				<p>
					<label>No</label>
					<input type="radio" name="alwaysActive" value="0" checked="checked"/>
					<label>Si</label>
					<input type="radio" name="alwaysActive" value="1" />

				</p>
			</li>
			<li>
				<label>Dependencias:</label>
				<p>
					Indique aquellos modulos de los cuales depende el que esta siendo instalado.
				</p>
				<p>
				|-foreach from=$dependencyModules item="dependency"-|
					<label>|-$dependency->getName()-|</label> <input type="checkbox" name="dependencies[]" value="|-$dependency->getName()-|"/><br />
				|-/foreach-|
				</p>
			</li>
`		</ol>
	</fieldset>	
	<input type="hidden" name="moduleName" value="|-$moduleName-|" />
	<input type="hidden" name="do" value="installDoSetupModuleInformation" />
	<p><input type="submit" value="Guardar Cambios" /></p>
</form>

