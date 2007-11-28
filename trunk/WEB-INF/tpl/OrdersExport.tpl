<?xml version = "1.0" standalone="yes"?>
<VFPData xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="F:\pedidos_xml\profit_Schema.xsd">
|-foreach from=$orders item=order name=for_orders-|
|-foreach from=$order->getOrderItems() item=item name=for_products-|
|-assign var=product value=$item->getProduct()-|
|-assign var=productNode value=$product->getNode()-|
|-assign var=unit value=$product->getUnit()-|
|-assign var=branch value=$order->getBranch()-|
 <cursor_profit_xml>
  <nro_ord>|-$order->getNumber()-|</nro_ord>
  <co_cli>|-if $branch-||-$branch->getCode()-||-/if-|</co_cli>
  <fec_emis>|-$order->getCreated()-|</fec_emis>
  <fec_venc>|-$order->getCreated()-|</fec_venc>
  <reng_num>|-$smarty.foreach.for_products.iteration-|</reng_num>
  <co_art>|-$product->getcode()|replace:"-":"-|</co_art>
  <total_art>|-$item->getQuantity()|number_format:5:".":"-|</total_art>
  <uni_venta>|-if $unit-||-$unit->getName()-||-/if-|</uni_venta>
  <stotal_art>|-if $unit-||-math equation="x / y" x=$item->getQuantity() y=$unit->getUnitQuantity() assign=totalQuantity-||-$totalQuantity|number_format:2:".":"-||-/if-|</stotal_art>
  <prec_vta>|-$item->getprice()|number_format:5:".":"-|</prec_vta>
  <reng_neto>|-math equation="x * y" x=$item->getPrice() y=$item->getQuantity() assign=totalItem-||-$totalItem|number_format:2:".":"-|</reng_neto>
  <total_uni>|-if $unit-||-$unit->getUnitQuantity()-||-/if-|</total_uni>
 </cursor_profit_xml>
|-/foreach-|
|-/foreach-|
</VFPData>
