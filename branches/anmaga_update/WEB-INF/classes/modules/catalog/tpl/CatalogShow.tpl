<h2>Catálogo de Productos</h2>
	<h1>Ver Catálogo</h1>
	<p>A continuación podrá ver los productos disponibles en el sistema </p>
|-if $productCategories|@count neq 0-|<div id="div_productcategories">
	<a href="Main.php?do=catalogShow">Productos sin Categoría</a>				
	|-include file="CatalogShowIncludeCategories.tpl" productCategories=$productCategories-|
		|-if $category-|
			<h3>Productos de la Categoría |-$category->getName()-|</h3>
		|-else-|
			<h3>Productos sin Categoría Asignada</h3>
		|-/if-|
	|-/if-|
	|-include file="CatalogShowIncludeProducts.tpl" products=$products-|
</div>