|-foreach from=$productCategories item=node name=for_productCategories-|
	|-assign var=productCategory value=$node.node-|
	<option value="|-$productCategory->getId()-|"|-if $productCategory->getId() eq $parentNodeId-| selected="selected"|-/if-|>|-$productCategory->getName()-|</option>
	|-if $node.childs|@count gt 0-|
	|-include file="CatalogProductCategoriesIncludeOptions.tpl" productCategories=$node.childs-|
	|-/if-|
|-/foreach-|
