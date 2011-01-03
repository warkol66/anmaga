<?php

/**
 * Skeleton subclass for performing query and update operations on the 'renal_affiliateinfo' table.
 *
 * Informacion del afiliado
 *
 * This class was autogenerated by Propel on:
 *
 * 12/27/06 11:08:05
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package mer
 */	
class AffiliateInfoPeer extends BaseAffiliateInfoPeer {


  function get($id) {
		$cond = new Criteria();
		$cond->add(AffiliateInfoPeer::AFFILIATEID, $id);
		$todosObj = AffiliateInfoPeer::doSelect($cond);
		return $todosObj[0];
  }

 function update($id,$internalNumber,$address,$phone,$email,$contact,$contactEmail,$web,$memo) {
		$affiliate = AffiliateInfoPeer::retrieveByPK($id);		
		//$affiliate->setAffiliateId($id);		
		$affiliate->setAffiliateInternalNumber($internalNumber);
		$affiliate->setAddress($address);
		$affiliate->setPhone($phone);
		$affiliate->setEmail($email);
		$affiliate->setContact($contact);
		$affiliate->setContactEmail($contactEmail);		
		$affiliate->setWeb($web);
		$affiliate->setMemo($memo);
		$affiliate->save();
		return true;
  }

	 function add($affiliateId,$internalNumber,$address,$phone,$email,$contact,$contactEmail,$web,$memo) {
		$affiliate = new AffiliateInfo();		
		$affiliate->setAffiliateId($affiliateId);		
		$affiliate->setAffiliateInternalNumber($internalNumber);
		$affiliate->setAddress($address);
		$affiliate->setPhone($phone);
		$affiliate->setEmail($email);
		$affiliate->setContact($contact);
		$affiliate->setContactEmail($contactEmail);		
		$affiliate->setWeb($web);
		$affiliate->setMemo($memo);		
		$affiliate->save();
		return true;
  }

  function getByInternalNumber($internalNumber) {
		$criteria = new Criteria();
		$criteria->setIgnoreCase(true);
		$criteria->add(AffiliateInfoPeer::AFFILIATEINTERNALNUMBER, $internalNumber);
		$affiliateInfo = AffiliateInfoPeer::doSelectOne($criteria);
		return $affiliateInfo;
  }

} // AffiliateInfoPeer