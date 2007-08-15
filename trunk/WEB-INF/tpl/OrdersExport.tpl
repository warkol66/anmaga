<?xml version = "1.0" standalone="yes"?>
<VFPData xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="F:\pedidos_xml\profit_Schema.xsd">
|-foreach from=$orders item=order name=for_orders-|
|-foreach from=$order->getOrderItems() item=item name=for_products-|
|-assign var=product value=$item->getProduct()-|
|-assign var=productNode value=$product->getNode()-|
|-assign var=unit value=$product->getUnit()-|
	<cursor_profit_xml>
		<co_cli>|-assign var=affiliate value=$order->getAffiliate()-||-if $affiliate-||-assign var=affiliateInfo value=$affiliate->getAffiliateInfo()-||-if $affiliateInfo-||-$affiliateInfo->getAffiliateInternalNumber()-||-/if-||-/if-|</co_cli>
		<fact_num>|-$order->getNumber()-|</fact_num>
		<reng_num>|-$smarty.foreach.for_products.iteration-|</reng_num>
		<co_art>|-$product->getcode()-|</co_art>
		<total_art>|-$item->getQuantity()|number_format:2:",":"."-|</total_art>
		<stotal_art>|-math equation="x / y" x=$item->getQuantity() y=$unit->getUnitQuantity() assign=totalQuantity-||-$totalQuantity|number_format:2:",":"."-|</stotal_art>
		<uni_venta>|-$unit->getName()-|</uni_venta>
		<prec_vta>|-$item->getprice()|number_format:2:",":"."-|</prec_vta>
		<reng_neto>|-math equation="x * y" x=$item->getPrice() y=$item->getQuantity() assign=totalItem-||-$totalItem|number_format:2:",":"."-|</reng_neto>
		<prec_vta2>|-$item->getprice()|number_format:2:",":"."-|</prec_vta2>
		<total_uni>|-$unit->getUnitQuantity()-|</total_uni>
	</cursor_profit_xml>
|-/foreach-|
|-/foreach-|
</VFPData>
