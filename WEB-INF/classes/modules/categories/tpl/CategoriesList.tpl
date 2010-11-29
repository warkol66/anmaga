<h2>##40,Configuración del Sistema##</h2>
<h1>##139,Editar categorías##</h1>
|-if $message eq "notdeleted"-|<div class='errorMessage'>##140,No se pudo eliminar la categoría porque posee datos asociados##.</div>|-/if-|
<p>##141,A continuación podrá editar la lista de categorías disponibles. Podrá Agregar, Modificar o Eliminar categorías de la lista de categorías disponibles. Sólo podrá eliminar las categorías que no tengan ningún dato asignado.##</p>

<fieldset title="Edición de categorías del sistema">
<legend>Categorías del Sistema</legend>
		<form method='get' action="Main.php" id="form_category_add" style="display:inline;">
				<p>Módulo
				<select name="module">
					<option value='' selected="selected">General</option>
				|-foreach from=$modules item=module-|
					<option value="|-$module->getName()-|" |-if isset($selectedModule) and ($module->getName() eq $selectedModule->getName())-|selected="selected"|-/if-|>|-$module->getName()-|</option>
				|-/foreach-|
				</select>
				<input type="hidden" name="do" value="categoriesList" />
				<input type='submit' name="ncat" value="Mostrar categorias" class='smallButton' />
			</form></p>
<br />

<div id="categoriesListPlaceHolder">
|-if $parentUserCategories|@count gt 0-|
	<p>Categorías del módulo</p>
	|-include file="CategoriesListInclude.tpl" categories=$parentUserCategories-|
|-else-|
	<ul>
	<li>El módulo no tiene categorías asociadas
	</li>
	</ul>
|-/if-|
</div>
	</fieldset>
<br />

<fieldset title="Formulario de categorías del sistema">
<legend>Agregar Categorías</legend>
<p>##143,Agregar Nueva Categoría##</p>
	
			<form method='post' action="Main.php" id="form_category_add" style="display:inline;">
				<p><label>Nombre Categoría</label>
				<input type="text" name="name" id="name" value='' size="50" class='textodato' />
				<br /><br /></p>
				<input type="hidden" name="module" value="|-if isset($module) and $selectedModule neq ''-||-$selectedModule->getName()-||-else-||-/if-|" id="module">
				<p><label>Dentro de </label>
				<select name="parentId" id="selectAddCategory">
					<option value="0">Ninguna</option>
				|-foreach from=$userCategories item=category-|
					<option value="|-$category->getId()-|">|-$category->getName()-|</option>
				|-/foreach-|
				</select></p>
				<p>
					<label>Publica</label>
					<input type="hidden" name="isPublic" value="0" />
					<input type="checkbox" name="isPublic" value="1" />
				</p>
				<br /><br />

				<input type="hidden" name="do" value="categoriesDoEditX" />
				<input type="hidden" name="catid" value='<?=$catid?>' />
				<input type='button' onclick="categoriesDoEditX(this.form)" name="ncat" value="##143,Agregar##" class='smallButton' /><span id="systemWorking" style="display:none;">Agregando Categoría...</span>
			</form>
</fieldset>
<br />
|-if $userCategories|@count gt 0-|

<fieldset title="Formulario para modificar o eliminar de categorías del sistema">
<legend>##144,Modificar o Eliminar Categoría##</legend>
			<form method='get' action="Main.php" style="display:inline;">
		<label for="id">Categorías disponibles</label>
				<select name='id' id="selectModifyCategory" onchange="javascript:document.getElementById('select_modificar_categoria').value=this.value">
 					<option value='' selected>Seleccione ...</option>
         |-foreach from=$userCategories item=category name=for_categories-|
					<option value='|-$category->getId()-|'>|-$category->getName()-|</option>
          |-/foreach-|
				</select>
				&nbsp;&nbsp;
				<input type='submit' name="mcat" value="##145,Modificar##" class='smallButton' />
				<input type="hidden" name="do" value="categoriesEdit" />
			</form>
			<form method='post' action="Main.php" style="display:inline;">
				&nbsp;&nbsp;
				<input type="hidden" name="id" value="|-$userCategories[0]->getId()-|" id="select_modificar_categoria" />
				<input type='submit' name="dcat" value="##115,Eliminar##" class='smallButton' onclick="return confirm('##255,Esta opción elimina permanentemente esta Categoría. ¿Está seguro que desea eliminarla?##');" />
				<input type="hidden" name="do" value="categoriesDoDelete" />
				<input type="hidden" name="module" value="|-if isset($module) and $selectedModule neq ''-||-$selectedModule->getName()-||-else-||-/if-|" id="module">
				
		</form>
</fieldset>
|-/if-|
