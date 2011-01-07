|-foreach from=$productCategories item=productCategory name=for_productCategories-|
	<option value="|-$productCategory->getId()-|"|-if $productCategory->getId() eq $filters.categoryId-| selected="selected"|-/if-|>|-$productCategory->getName()-|</option>
	|-if $productCategory->hasChildren() -|
	|-include file="CatalogProductCategoriesIncludeOptions.tpl" productCategories=$productCategory->getChildren()-|
	|-/if-|
|-/foreach-|
