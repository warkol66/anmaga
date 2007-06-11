#code;name;description;price;category;unit;measureUnit
|-foreach from=$products item=node name=for_products-||-assign var=product value=$node->getInfo()-||-assign var=parentNode value=$node->getParentNode()-||-assign var=unit value=$product->getUnit()-||-assign var=measureUnit value=$product->getMeasureUnit()-|
|-$product->getcode()-|,|-$node->getname()-|,|-$product->getdescription()-|,|-$product->getprice()-|,|-if $parentNode-||-$parentNode->getName()-||-/if-|,|-if $unit-||-$unit->getName()-||-/if-|,|-if $measureUnit-||-$measureUnit->getName()-||-/if-|

|-/foreach-|
