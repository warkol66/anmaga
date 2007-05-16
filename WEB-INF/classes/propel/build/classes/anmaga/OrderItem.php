<?php
require_once 'anmaga/om/BaseOrderItem.php';

/** 
 * The skeleton for this class was autogenerated by Propel  on:
 *
 * [05/04/07 12:39:42]
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package anmaga 
 */
class OrderItem extends BaseOrderItem {

	function getOrderTemplateItem() {
		require_once("OrderTemplateItem.php");
		$orderTemplateItem = new OrderTemplateItem();
    $orderTemplateItem->setProductId($this->getProductId());
    $orderTemplateItem->setPrice($this->getPrice());
    $orderTemplateItem->setQuantity($this->getQuantity());
    return $orderTemplateItem;
	}

}
