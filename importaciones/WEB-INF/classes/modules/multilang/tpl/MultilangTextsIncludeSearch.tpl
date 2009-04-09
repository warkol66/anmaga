  <form action="Main.php" method="get">
    <label for="language_id">Language</label>
    <select name="languageId">
		|-foreach from=$appLanguages item=language name=for_languages-|
      <option value="|-$language->getId()-|">|-$language->getName()-|</option>
		|-/foreach-|
    </select>
  	<label for="name">Buscar</label>
  	<input type="text" id="search" name="search" value="|-$search-|" />
  	<input type="hidden" name="moduleName" value="|-$moduleName-|" />
  	<input type="hidden" name="do" value="multilangTextsList" />
  	<input type="submit" class="boton" value="Buscar" />
  </form>
