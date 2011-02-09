|-foreach from=$productCategories item=productCategory name=for_productCategories-|
	<option value="|-$productCategory->getId()-|"|-$productCategory->getId()|selected:$filters.categoryId-|>|-$productCategory->getName()-|</option>
	|-if $productCategory->hasChildren() -|
	|-include file="CatalogProductCategoriesIncludeOptions.tpl" productCategories=$productCategory->getChildren()-|
	|-/if-|
|-/foreach-|
