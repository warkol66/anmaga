<table border='0' cellpadding='0' cellspacing='0' width='100%'>
	<tr>
		<td class='title'>Catálogo de Productos </td>
	</tr>
	<tr>
		<td class='underlineTitle'><img src="images/clear.gif" height='3' width='1'></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class='backgroundTitle'>Ver Catálogo </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>A continuación podrá ver los productos disponibles en el sistema </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>
|-if $productCategories|@count neq 0-|<div id="div_productcategories">
	<a href="Main.php?do=catalogShow">Productos sin Categoria</a>				
	|-include file="CatalogShowIncludeCategories.tpl" productCategories=$productCategories-|
		|-if $categoryNode-|
			<h3>Productos de la Categoría |-$categoryNode->getName()-|</h3>
		|-else-|
			<h3>Productos sin Categoría Asignada</h3>
		|-/if-|
	|-/if-|
	|-include file="CatalogShowIncludeProducts.tpl" productNodes=$productNodes-|
</div>