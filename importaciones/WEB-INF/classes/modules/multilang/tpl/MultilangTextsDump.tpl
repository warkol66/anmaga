<h2>##multilang,1,Multi-idioma##</h2>
<h1>##multilang,20,Administrar Traducciones##</h1>
<fieldset title="##multilang,22,Formulario para selecci�n de m�dulo##">
<legend>##multilang,23,Selecci�n de M�dulo##</legend>
<form method="get" action="Main.php"> 
	<input type="hidden" name="do" value="multilangTextsDoDump" /> 
			<p><label for="moduleName">##multilang,24,M�dulos disponibles##</label> 
				
					<!--<select name="moduleName" onchange="if (this.options[this.selectedIndex].value) this.form.submit()" > -->
					<select name="moduleName"> 
						<option value="">##multilang,25,Seleccione un m�dulo##</option>
						 
		    		|-foreach from=$modules item=moduleObj name=for_module-|
						<option value="|-$moduleObj->getName()-|" |-if $moduleName eq $moduleObj->getName()-|selected="selected"|-/if-|>|-$moduleObj->getName()-|</option>
    				|-/foreach-|					
				
					</select>
	</p>
					    |-foreach from=$appLanguages item=language name=for_languages-|
							<p><label for="|-$language->getCode()-|">|-$language->getName()-|</label>
							<input type="checkbox" name="languageCodes[|-$language->getCode()-|]" value="|-$language->getCode()-|" id="languageCode[|-$language->getCode()-|]" |-if $languageCodes[i] ne ''-|checked="checked"|-/if-| />
					   </p> |-/foreach-|
	<p>
		<input name="Submit" type="submit" class="button" value="Generar dump con textos" />
	</p>
</form>
</fieldset> 
