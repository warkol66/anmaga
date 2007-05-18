<?php

  // include base peer class
  require_once 'om/BaseAffiliatePeer.php';
  
  // include object class
  include_once 'Affiliate.php';


/**
 * Skeleton subclass for performing query and update operations on the 'renal_affiliate' table.
 *
 * Usuarios afiliados
 *
 * This class was autogenerated by Propel on:
 *
 * 12/18/06 12:56:58
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package mer
 */	
class AffiliatePeer extends BaseAffiliatePeer {


	function getAll() {
		$cond = new Criteria();
		$todosObj = AffiliatePeer::doSelect($cond);
		return $todosObj;
  }

	function getAllPaginated($page=1,$perPage=10) {
		if (empty($page))
			$page = 1;
		require_once("propel/util/PropelPager.php");
		$cond = new Criteria();
		$cond->addAscendingOrderByColumn(AffiliatePeer::ID);

		$pager = new PropelPager($cond,"AffiliatePeer", "doSelect",$page,$perPage);
		return $pager;
	 }

	function getByNamePaginated($name,$page=1,$perPage=10) {
		if (empty($page))
			$page = 1;
		require_once("propel/util/PropelPager.php");
		$cond = new Criteria();
		$cond->add(AffiliatePeer::NAME,"%".$name."%",Criteria::LIKE);
		$cond->addAscendingOrderByColumn(AffiliatePeer::ID);

		$pager = new PropelPager($cond,"AffiliatePeer", "doSelect",$page,$perPage);
		return $pager;
	 }

  function get($id) {
		$cond = new Criteria();
		$cond->add(AffiliatePeer::ID,$id);
		$todosObj = AffiliatePeer::doSelect($cond);
		return $todosObj[0];
  }


  function update($id,$name) {
		$affiliate = AffiliatePeer::retrieveByPK($id);
		$affiliate->setName($name);
		$affiliate->save();
		return true;
  }

  function delete($id) {
		$affiliate = AffiliatePeer::retrieveByPk($id);
		$affiliate->delete();
		return true;
  }


  function add($name) {
		$affiliate = new Affiliate();		
		$affiliate->setName($name);
		$affiliate->save();
		return $affiliate->getId();
  }

} // AffiliatePeer