				<h2>Catalogo de Productos</h2>
				<div id="div_productcategories">
				
					<a href="Main.php?do=catalogShow">Productos sin Categoria</a>				

					|-include file="CatalogShowIncludeCategories.tpl" productCategories=$productCategories-|
					
					|-if $categoryNode-|
						<h3>Productos de la Categoria |-$categoryNode->getName()-|</h3>
					|-else-|
          	<h3>Productos sin Categoria Asignada</h3>
					|-/if-|

					|-include file="CatalogShowIncludeProducts.tpl" productNodes=$productNodes-|

				</div>
