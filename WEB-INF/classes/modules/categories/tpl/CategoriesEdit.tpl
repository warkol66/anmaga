<h2>##40,Configuración del Sistema##</h2>
<h1>##139,Editar categorías##</h1>
<p>A continuación podrá editar las propiedades de la categoría. Para cambiar el nombre modifique el texto y presione aceptar. 
|-if $category->isParent()-|
	Para modificar el módulo al que pertenece la categoría, seleccione el módulo en la lista y haga click en &quot;Aceptar&quot; para guardar los cambios.
|-elseif $category->isChildren()-|
	Para modificar la dependencia de la categoría, seleccione una de la lista y haga click en &quot;Aceptar&quot; para guardar los cambios.
|-/if-|
</p>
<fieldset title="Edición de categorías del sistema">
<legend>Editar Categoría</legend>
<form method='post'>
		<label for="name">Nombre</label>
		<input type="text" name="name" id="name" value='|-$category->getName()-|' size="50" class='textodato'/>
		<br />
		<br />
	|-if $category->isParent()-|
		<label for="module">Módulo</label>
		<select name="module">
			<option value='' |-if $category->getModule() eq ''-|selected="selected"|-/if-|>General</option>
		|-foreach from=$modules item=module-|
			<option value="|-$module->getName()-|" |-if $category->getModule() eq $module->getName()-|selected="selected"|-/if-|>|-$module->getName()-|</option>
		|-/foreach-|
		</select>
		<br /><br />
	|-else-|
		<input type="hidden" name="module" value="|-$category->getModule()-|" id="module">
	|-/if-|

	|-if $category->isChildren()-|
		<label>Categoría de </label>
		<select name="parentId">
			<option value="" |-if $category->getParentId() eq 0-|selected="selected"|-/if-|>Ninguna</option>
		|-foreach from=$categories item=acategory-|
			<option value="|-$acategory->getId()-|" |-if $category->getParentId() eq $acategory->getId()-|selected="selected"|-/if-|>|-$acategory->getName()-|</option>
		|-/foreach-|
		</select>
		<br /><br />
	|-else-|
		<input type="hidden" name="parentId" value="|-$category->getParentId()-|" id="parentId">
	|-/if-|
		<input type="hidden" name="id" id="id" value="|-$category->getId()-|" />
		<input type="hidden" name="accion" id="accion" value="edicion" />
		<input type="hidden" name="do" id="do" value="categoriesDoEdit" />
		<input type='submit' name="ncat" value="##149,Aceptar##" class='button' />
</form>

</fieldset>