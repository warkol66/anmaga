<?php

require 'users/classes/om/BaseUser.php';

/**
 * Skeleton subclass for representing a row from the 'users_user' table.
 *
 * Users
 *
 * @package    users
 */
class User extends BaseUser {

	/**
	 * Initializes internal state of User object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}

	/*
	 * Obtiene los grupos a los que pertenece un usuario
	 * @returns todos los grupos.
	 */
	function getGroups() {
		require_once("GroupPeer.php");
		$cond = new Criteria();
		$cond->add(UserGroupPeer::USERID, $this->getId());
		$todosObj = UserGroupPeer::doSelectJoinGroup($cond);
		return $todosObj;
	}

	/*
	 * Indica si un usuario forma parte de un grupo
	 * @param array $groups array de grupos
	 * @returns true si pertenece al grupo, de lo contrario, false.
	 */
	function belongsToGroups($groups) {
		$groupsArray = explode(";",$groups);
		require_once("UserGroupPeer.php");
		$c = new Criteria();
		$c->add(UserGroupPeer::USERID, $this->getId());
		$all = UserGroupPeer::doSelect($c);
		foreach ($all as $userGroup) {
			if (in_array($userGroup->getGroupId(),$groupsArray))
				return true;
		}
		return false;
	}

	/*
	 * Indica si un usuario forma parte del grupo supervisor
	 * @returns true si pertenece al grupo, de lo contrario, false.
	 */
	function isSupervisor() {
  	$groups = $this->getGroups();
  	foreach ($groups as $group){
  		if ( $group->getGroupId() == 1 )
  			return true;
  	}
		return false;
	}

	/*
	 * Indica si un usuario forma parte del grupo supervisor
	 * @returns true si pertenece al grupo, de lo contrario, false.
	 */
	function isAdmin() {
  	$groups = $this->getGroups();
  	foreach ($groups as $group) {
  		if ( $group->getGroupId() == 2 )
  			return true;
  	}
		return false;
	}

	/*
	 * Indica si un usuario es un supplier dependiendo si el mismo tiene
	 * el nivel de usuario supplier
	 * @returns true si es un supplier, false sino.
	 */
	function isSupplier(){

		$result = false;

		if ($this->getLevelId() == 4)
			$result = true;

		return $result;
	}

 /**
  * Return an array with all the categories this user can access
  *
  * @return array of Catetegory
  */
  function getCategories(){
  	if ($this->isAdmin() || $this->isSupervisor())
  		return CategoryPeer::getAll();
		require_once("UserGroupPeer.php");
  	require_once("GroupCategoryPeer.php");
  	$sql = "SELECT ".CategoryPeer::TABLE_NAME.".* FROM ".UserGroupPeer::TABLE_NAME ." ,".
						GroupCategoryPeer::TABLE_NAME .", ".CategoryPeer::TABLE_NAME .
						" where ".UserGroupPeer::USERID ." = '".$this->getId()."' and ".
						UserGroupPeer::GROUPID ." = ".GroupCategoryPeer::GROUPID ." and ".
						GroupCategoryPeer::CATEGORYID ." = ".CategoryPeer::ID ." and ".
						CategoryPeer::ACTIVE ." = 1";

  	$con = Propel::getConnection(UserPeer::DATABASE_NAME);
	$stmt = $con->prepare($sql);
	$stmt->execute();
	return CategoryPeer::populateObjects($stmt);
  }

  function getCategoriesByModule($module){
  	if ($this->isAdmin() || $this->isSupervisor())
  		return CategoryPeer::getAllByModule($module);
		require_once("UserGroupPeer.php");
  	require_once("GroupCategoryPeer.php");
  	$sql = "SELECT ".CategoryPeer::TABLE_NAME.".* FROM ".UserGroupPeer::TABLE_NAME ." ,".
						GroupCategoryPeer::TABLE_NAME .", ".CategoryPeer::TABLE_NAME .
						" where ".UserGroupPeer::USERID ." = '".$this->getId()."' and ".
						UserGroupPeer::GROUPID ." = ".GroupCategoryPeer::GROUPID ." and ".
						GroupCategoryPeer::CATEGORYID ." = ".CategoryPeer::ID ." and ".
						CategoryPeer::ACTIVE ." = 1" . " and " .
						CategoryPeer::MODULE . " = '$module'";

  	$con = Propel::getConnection(UserPeer::DATABASE_NAME);
		$stmt = $con->prepare($sql);
		$stmt->execute();
		return CategoryPeer::populateObjects($stmt);
  }

  function getParentCategoriesByModule($module){
  	if ($this->isAdmin() || $this->isSupervisor())
  		return CategoryPeer::getAllParentsByModule($module);
		require_once("UserGroupPeer.php");
  	require_once("GroupCategoryPeer.php");
  	$sql = "SELECT ".CategoryPeer::TABLE_NAME.".* FROM ".UserGroupPeer::TABLE_NAME ." ,".
						GroupCategoryPeer::TABLE_NAME .", ".CategoryPeer::TABLE_NAME .
						" where ".UserGroupPeer::USERID ." = '".$this->getId()."' and ".
						UserGroupPeer::GROUPID ." = ".GroupCategoryPeer::GROUPID ." and ".
						GroupCategoryPeer::CATEGORYID ." = ".CategoryPeer::ID ." and ".
						CategoryPeer::ACTIVE ." = 1" . " and " .
						CategoryPeer::PARENTID ." = 0" . " and " .
						CategoryPeer::MODULE . " = '$module'";

  	$con = Propel::getConnection(UserPeer::DATABASE_NAME);
		$stmt = $con->prepare($sql);
		$stmt->execute();
		return CategoryPeer::populateObjects($stmt);
  }

  function getChildrenCategories($categoryId) {
  	if ($this->isAdmin() || $this->isSupervisor())
  		return CategoryPeer::getAllParentsByModule($module);
		require_once("UserGroupPeer.php");
  	require_once("GroupCategoryPeer.php");
  	$sql = "SELECT ".CategoryPeer::TABLE_NAME.".* FROM ".UserGroupPeer::TABLE_NAME ." ,".
						GroupCategoryPeer::TABLE_NAME .", ".CategoryPeer::TABLE_NAME .
						" where ".UserGroupPeer::USERID ." = '".$this->getId()."' and ".
						UserGroupPeer::GROUPID ." = ".GroupCategoryPeer::GROUPID ." and ".
						GroupCategoryPeer::CATEGORYID ." = ".CategoryPeer::ID ." and ".
						CategoryPeer::ACTIVE ." = 1" . " and " .
						CategoryPeer::PARENTID . " = $categoryId" ;

  	$con = Propel::getConnection(UserPeer::DATABASE_NAME);
		$stmt = $con->prepare($sql);
		$stmt->execute();
		return CategoryPeer::populateObjects($stmt);
  }

  function getParentCategories(){
		return $this->getChildrenCategories(0);
  }

  function getDocumentsChildrenCategories($categoryId) {

		require_once('CategoryPeer.php');
		require_once('DocumentPeer.php');
		require_once("UserGroupPeer.php");
		require_once("GroupCategoryPeer.php");

		$criteria = new Criteria();

		$criteria->addJoin(UserGroupPeer::GROUPID,GroupCategoryPeer::GROUPID,Criteria::INNER_JOIN);
		$criteria->addJoin(GroupCategoryPeer::CATEGORYID,CategoryPeer::ID,Criteria::INNER_JOIN);
		$criteria->add(UserGroupPeer::USERID,$this->getId());
		$criteria->add(CategoryPeer::ACTIVE,1);
		$criteria->add(CategoryPeer::PARENTID,$categoryId);
		$criteria->setDistinct();

		if (!DocumentPeer::usesGlobalCategories()) {
			//solo del modulo de documentos

			$criteria->add(CategoryPeer::MODULE,'documents');
		}
		else {
			$criterion = $criteria->getNewCriterion(CategoryPeer::MODULE,'documents', Criteria::EQUAL);
			$criterion->addOr($criteria->getNewCriterion(CategoryPeer::MODULE, '', Criteria::EQUAL));
			$criteria->add($criterion);
		}

		$result = CategoryPeer::doSelect($criteria);
		return $result;
  }

  function getDocumentsParentCategories() {
		return $this->getDocumentsChildrenCategories(0);
  }

	function getParentsCategories() {
  	if ($this->isAdmin() || $this->isSupervisor())
  		return CategoryPeer::getAllParentsByModule($module);
		require_once("UserGroupPeer.php");
  	require_once("GroupCategoryPeer.php");
  	$sql = "SELECT ".CategoryPeer::TABLE_NAME.".* FROM ".UserGroupPeer::TABLE_NAME ." ,".
						GroupCategoryPeer::TABLE_NAME .", ".CategoryPeer::TABLE_NAME .
						" where ".UserGroupPeer::USERID ." = '".$this->getId()."' and ".
						UserGroupPeer::GROUPID ." = ".GroupCategoryPeer::GROUPID ." and ".
						GroupCategoryPeer::CATEGORYID ." = ".CategoryPeer::ID ." and ".
						CategoryPeer::ACTIVE ." = 1" . " and " .
						CategoryPeer::MODULE . " = '$module' and " .
						CategoryPeer::PARENTID . " = 0" ;

  	$con = Propel::getConnection(UserPeer::DATABASE_NAME);
		$stmt = $con->prepare($sql);
		$stmt->execute();
		return CategoryPeer::populateObjects($stmt);
	}

  /**
  * Asigna los grupos del usuario a una categoria.
  *
  * @param int $categoryId Id de la categoria
  * @return void
  */
  function setGroupsToCategory($categoryId) {
  	require_once("GroupCategoryPeer.php");
		foreach ($this->getGroups() as $group) {

			//verificamos si la relacion no existe
			$criteria = new Criteria();
			$criteria->add(GroupCategoryPeer::GROUPID,$group->getGroupId());
			$criteria->add(GroupCategoryPeer::CATEGORYID,$categoryId);
			$result = GroupCategoryPeer::doSelect($criteria);
			if (empty($result)) {
				$groupCategory = new GroupCategory();
				$groupCategory->setGroupId($group->getGroupId());
				$groupCategory->setCategoryId($categoryId);
				$groupCategory->save();
			}

		}
		return;
	}

	function getAffiliateId(){
		return 0;
	}

	/**
	 * Obtiene las categorias padres generales.
	 *
	 * @return array instancias de Category
	 */
	function getDocumentsGeneralParentCategories() {

		require_once('DocumentPeer.php');

		//solo se usan las categorias del modulo documentos
		//no se usan generales
		if (!DocumentPeer::usesGlobalCategories()) {
			return array();
		}
		$criteria = new Criteria();

		$criteria->addJoin(UserGroupPeer::GROUPID,GroupCategoryPeer::GROUPID,Criteria::INNER_JOIN);
		$criteria->addJoin(GroupCategoryPeer::CATEGORYID,CategoryPeer::ID,Criteria::INNER_JOIN);
		$criteria->add(UserGroupPeer::USERID,$this->getId());
		$criteria->add(CategoryPeer::ACTIVE,1);
		$criteria->add(CategoryPeer::PARENTID,0);
		$criteria->add(CategoryPeer::MODULE,'');

		$result = CategoryPeer::doSelect($criteria);
		return $result;

	}

	function getTotalAccess() {
		$userLevel = $this->getLevelId();
		$baseLevel = 1;
		while ($userLevel > 1) {
			$baseLevel += $userLevel;
			$userLevel = $userLevel / 2;
		}
		return $baseLevel;
	}

} // User
