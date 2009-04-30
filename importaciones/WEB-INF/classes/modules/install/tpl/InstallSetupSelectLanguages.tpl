<form method="GET" action="Main.php">
	|-foreach from=$languages item=language-|
	<p>
		<label>|-$language->getName()-|</label>
		<input type="checkbox" name="languages[]" value="|-$language->getId()-|" />
	</p>
	|-/foreach-|
	<p>
		<input type="hidden" name="do" value="installSetupModuleInformation" />
		<input type="hidden" name="moduleName" value="|-$moduleName-|" />
		|-if isset($mode)-|
		<input type="hidden" name="mode" value="|-$mode-|" id="mode">
		|-/if-|			
		<input type="submit" value="Instalar" />
	</p>
</form>