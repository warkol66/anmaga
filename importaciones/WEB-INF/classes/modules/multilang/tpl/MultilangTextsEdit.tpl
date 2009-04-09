<div id="div_text">
  <form name="form_edit_text" id="form_edit_text" action="Main.php" method="post">
    |-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar el text</span>|-/if-|
    <h3>|-if $action eq "edit"-|Edit|-else-|Create|-/if-| Text |-$moduleName-|</h3>
    <p> Ingrese los datos del text. </p>
    <fieldset title="Formulario de edición de datos de un texto">
    |-foreach from=$appLanguages item=language name=for_languages-|
    |-assign var="languageId" value=$language->getId()-|
    |-assign var="languageName" value=$language->getName()-|
    |-if $action eq "edit"-||-assign var="text" value=$texts[$languageId]-||-/if-|
    <p>
      <label for="text[|-$languageId-|]">|-$languageName-|</label>
      <br />
      <textarea name="text[|-$languageId-|]" cols="60" rows="4" wrap="virtual" />|-if $text ne ""-||-$text->gettext()-||-/if-|</textarea>
      |-if $action eq "edit" and $text ne ""-|
      <br />
			Codigo: #&#0035;|-$textId-|,|-$text->gettext()-|#&#0035;
      |-/if-| </p>
    |-/foreach-|
    <p>
    	<label>Modulo:</label><br/>
    	<select name="moduleId">
				<option value="">Sin Modulo Asignado</option>
		    |-foreach from=$modules item=module name=for_module-|
	    		<option value="|-$module->getName()-|" |-if (isset($text) and $text->getModuleName() eq $module->getName()) or ($module->getName() eq $moduleName)-|selected="selected"|-/if-|>|-$module->getName()-|</option>
    		|-/foreach-|
    	</select>
    </p>
    
    <p> |-if $action eq "edit"-|
      <input type="hidden" name="id" id="id" value="|-if $action eq "edit"-||-$textId-||-/if-|" />
      |-/if-|
      <input type="hidden" name="action" id="action" value="|-$action-|" />
      <input type="hidden" name="do" id="do" value="multilangTextsDoEdit" />
      <input type="hidden" name="moduleName" value="|-$moduleName-|" />
      <input type="hidden" name="currentPage" value="|-$currentPage-|" />
      <input type="submit" id="button_edit_text" name="button_edit_text" title="Aceptar" value="Aceptar" class="boton" />
    </p>
    </fieldset>
  </form>
</div>
