<?php
require_once 'om/BaseProduct.php';
require_once('AffiliateProductPeer.php');

/** 
 * The skeleton for this class was autogenerated by Propel  on:
 *
 * [04/09/07 17:03:34]
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package anmaga 
 */
class Product extends BaseProduct {

	function getNode() {
		require_once("NodePeer.php");
		return NodePeer::getByObjectIdAndKind($this->getId(),"Product");
	}
	
	function getPrice() {
	
		if (Common::isAffiliatedUser() && AffiliateProductPeer::affiliateHasPriceList(Common::getAffiliatedId())) {
			
			$cond = new Criteria();
			$cond->add(AffiliateProductPeer::AFFILIATEID,Common::getAffiliatedId());
			$cond->add(AffiliateProductPeer::PRODUCTID,$this->getId());
			$todosObj = AffiliateProductPeer::doSelect($cond);
			$specialPrice= $todosObj[0];
			return $specialPrice->getPrice();
			
		}
		
		return parent::getPrice();
				
		
	}

}