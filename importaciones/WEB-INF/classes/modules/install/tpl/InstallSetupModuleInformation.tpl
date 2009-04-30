<script type="text/javascript" src="scripts/install.js"></script>

<h2>Configuración del Sistema</h2>
<h1>Instalación de Módulos del Sistema: Módulo <strong>|-$moduleName-|</strong>.</h1>
<form  method="post">
	<fieldset>
		<legend>Primer Paso - Información del Módulo</legend>
		<p>Ingrese la información correspondiente al módulo</p>
			<p>
				<label>Nombre del Módulo:</label>
				<input name="name_disabled" type="text" value="|-$moduleName-|" disabled="disabled" />
				<input name="name" type="hidden" value="|-$moduleName-|" />
			</p>
			<h4>Etiquetas</h4>	
			<p>Ingrese el nombre que aparecerá cuando se consulte el módulo <strong>|-$moduleName-|</strong></p>
			|-foreach from=$languages item=language-|
				|-assign var=languageCode value=$language->getCode()-|
				|-assign var=label value=$labels.$languageCode-|
			<p>
				<label>|-$language->getName()-|:</label>
				<input name="labels[|-$language->getCode()-|]" type="text" value="|-if $label-||-$label->getLabel()-||-/if-|" size="35"/>
			</p>
			|-/foreach-|
			<h4>Descripción</h4>
			<p>Ingrese un texto que describa al módulo <strong>|-$moduleName-|</strong></p>
			|-foreach from=$languages item=language-|
				|-assign var=languageCode value=$language->getCode()-|
				|-assign var=label value=$labels.$languageCode-|			
			<p>	
				<label>|-$language->getName()-|:</label>
				<input name="descriptions[|-$language->getCode()-|]" type="text" value="|-if $label-||-$label->getDescription()-||-/if-|" size="65"/>
			</p>
			|-/foreach-|
			<h4>
				Always Active</h4>
			<p>
				El módulo <strong>|-$moduleName-|</strong> está siempre activo:</p>
			<p>
				<label>No</label>
				<input type="radio" name="alwaysActive" value="0" |-if isset($module) and ($module->getAlwaysActive() eq 0)-|checked="checked"|-else-|checked="checked"|-/if-|/>
			</p>
			<p>
				<label>Si</label>
				<input type="radio" name="alwaysActive" value="1" |-if isset($module) and ($module->getAlwaysActive() eq 1)-|checked="checked"|-/if-|/>			
			</p>
			<h4>Categorías</h4>
			<p>El módulo <strong>|-$moduleName-|</strong> maneja categorías propias:</p>
			<p>
				<label>No</label>
				<input type="radio" name="hasCategories" value="0" |-if isset($module) and ($module->getHasCategories() eq 0)-|checked="checked"|-else-|checked="checked"|-/if-|/>
			</p>
			<p>
				<label>Si</label>
				<input type="radio" name="hasCategories" value="1" |-if isset($module) and ($module->getHasCategories() eq 1)-|checked="checked"|-/if-|/>			
			</p>			
			<h4>Dependencias</h4>
			<p>
				Indique aquellos módulos de los cuales depende el módulo <strong>|-$moduleName-|</strong>.
			</p>
			|-foreach from=$assignedDependencyModules item="dependency"-|
			<p>
				<label>|-$dependency->getName()-|</label> 
				<input type="checkbox" name="dependencies[]" value="|-$dependency->getName()-|" checked="checked"/>
			</p>
			|-/foreach-|
			|-foreach from=$dependencyModules item="dependency"-|
			<p>
				<label>|-$dependency->getName()-|</label> 
				<input type="checkbox" name="dependencies[]" value="|-$dependency->getName()-|"/>
			</p>
			|-/foreach-|
				
		<input type="hidden" name="moduleName" value="|-$moduleName-|" />
		<input type="hidden" name="do" value="installDoSetupModuleInformation" />
		|-foreach from=$languages item=language-|
		<input type="hidden" name="languages[]" value="|-$language->getId()-|" />
		|-/foreach-|
		|-if isset($mode)-|
		<input type="hidden" name="mode" value="|-$mode-|" id="mode">
		|-/if-|	
		<input type="submit" value="Guardar Cambios" />
		|-include file="InstallFormNavigationInclude.tpl"-|
	</fieldset>	
</form>
