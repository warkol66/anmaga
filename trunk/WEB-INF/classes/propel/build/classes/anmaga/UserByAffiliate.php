<?php

require_once 'om/BaseUserByAffiliate.php';


/**
 * Skeleton subclass for representing a row from the 'users_userbyaffiliate' table.
 *
 * Usuarios de afiliado
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
class UserByAffiliate extends BaseUserByAffiliate {

	function getGroups() {
		require_once("UsersByAffiliateGroupPeer.php");
		$cond = new Criteria();
		$cond->add(UsersByAffiliateUserGroupPeer::USERID, $this->getId());
		$todosObj = UsersByAffiliateUserGroupPeer::doSelectJoinGroup($cond);
		return $todosObj;
	}
	
   /**
    * Return an array with all the categories this user can access
    *
    * @return array of Catetegory
    */
  function getCategories(){
		require_once("UsersByAffiliateUserGroupPeer.php");
  	require_once("UsersByAffiliateGroupCategoryPeer.php");
  	$sql = "SELECT ".UsersByAffiliateCategoryPeer::TABLE_NAME.".* FROM ".UsersByAffiliateUserGroupPeer::TABLE_NAME ." ,".
						UsersByAffiliateGroupCategoryPeer::TABLE_NAME .", ".UsersByAffiliateCategoryPeer::TABLE_NAME .
						" where ".UsersByAffiliateUserGroupPeer::USERID ." = '".$this->getId()."' and ".
						UsersByAffiliateUserGroupPeer::GROUPID ." = ".UsersByAffiliateGroupCategoryPeer::GROUPID ." and ".
						UsersByAffiliateGroupCategoryPeer::CATEGORYID ." = ".UsersByAffiliateCategoryPeer::ID ." and ".
						UsersByAffiliateCategoryPeer::ACTIVE ." = 1";
  	
  	$con = Propel::getConnection(UserByAffiliatePeer::DATABASE_NAME);
    $stmt = $con->createStatement();
    $rs = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);    
    return BaseCategoryPeer::populateObjects($rs);
  }
  
  /**
  * Asigna los grupos del usuario a una categoria.
  *
  * @param int $categoryId Id de la categoria
  * @return void
  */
  function setGroupsToCategory($categoryId) {
		require_once("UsersByAffiliateGroupCategoryPeer.php");                                            	
		foreach ($this->getGroups() as $group) {
			$groupCategory = new UsersByAffiliateGroupCategory();
			$groupCategory->setGroupId($group->getGroupId());
			$groupCategory->setCategoryId($categoryId);
			$groupCategory->save();
		}
		return;
	}

} // UserByAffiliate
