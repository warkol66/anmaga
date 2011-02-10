<?php

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
		$orderTemplateItem = new OrderTemplateItem();
    $orderTemplateItem->setProductId($this->getProductId());
    $orderTemplateItem->setPrice($this->getPrice());
    $orderTemplateItem->setQuantity($this->getQuantity());
    return $orderTemplateItem;
	}

	function getOrderCode() {
		$criteria = new Criteria();
    $criteria->addJoin(OrderItemPeer::PRODUCTID,ProductPeer::ID);
    $criteria->add(ProductPeer::ID,$this->getProductId());
    $item = ProductPeer::doSelectOne($criteria);
    $orderCode = $item->getOrderCode();                  
		return $orderCode;
	}

	function getCode() {
		$criteria = new Criteria();
    $criteria->addJoin(OrderItemPeer::PRODUCTID,ProductPeer::ID);
    $criteria->add(ProductPeer::ID,$this->getProductId());
    $item = ProductPeer::doSelectOne($criteria);
    $orderCode = $item->getCode();                  
		return $orderCode;
	}

	function getUnit() {
		$criteria = new Criteria();
    $criteria->addJoin(OrderItemPeer::PRODUCTID,ProductPeer::ID);
    $criteria->add(ProductPeer::ID,$this->getProductId());
    $item = ProductPeer::doSelectOne($criteria);
    $orderCode = $item->getUnit();                  
		return $orderCode;
	}

}
