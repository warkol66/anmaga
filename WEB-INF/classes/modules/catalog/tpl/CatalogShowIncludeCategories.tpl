					<ul>
						|-foreach from=$productCategories item=node name=for_productCategories-|
							|-assign var=productCategory value=$node.node-|
							|-assign var=category value=$productCategory->getInfo()-|
							<li>
								<a href="Main.php?do=catalogShow&categoryId=|-$productCategory->getId()-|">|-$productCategory->getName()-|</a>
								|-if $node.childs|@count gt 0-|
									|-include file="CatalogShowIncludeCategories.tpl" productCategories=$node.childs-|
								|-/if-|
							</li>
						|-/foreach-|
					</ul>
