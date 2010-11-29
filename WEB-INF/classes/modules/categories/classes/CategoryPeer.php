<?php
// The parent class
require_once 'om/BaseCategoryPeer.php';

// The object class
include_once 'Category.php';

/** 
 *
 * @package category 
 */
class CategoryPeer extends BaseCategoryPeer {

  /**
  * Crea una categoria nueva.
  *
  * @param string $name Nombre de la categoria
  * @return boolean true si se creo la categoria correctamente, false sino
	*/
	function create($name,$isPublic,$module='',$parentId=0) {
		$category = new Category();
		$category->setName($name);
		//una categoria hija tiene como modulo al modulo de su padre
		if ($parentId > 0) {
			$parent = CategoryPeer::get($parentId);
			$module = $parent->getModule();
		}
		
		$category->setIsPublic($isPublic);
		$category->setModule($module);
		$category->setParentId($parentId);
		$category->setActive(1);
		$category->save();
		
		//regla de negocio, agregar siempre a grupo usuarios
		$groupPeer = new GroupPeer();
		$group = $groupPeer->getByName('usuarios');
		
		if (empty($group)) {
			//creamos el grupo usuarios
			;
		}
		
		$groupPeer->addCategoryToGroup($category->getId(),$group->getId());
		
		return $category->getId();
		
	}

  /**
  * Actualiza la informacion de una categoria.
  *
  * @param int $id Id de la categoria
  * @param string $name Nombre de la categoria
  * @return boolean true si se actualizo la informacion correctamente, false sino
	*/
  function update($id,$isPublic,$name,$module='',$parentId=0) {
		$category = CategoryPeer::retrieveByPK($id);
		$category->setName($name);
		$category->setIsPublic($isPublic);
		//una categoria hija tiene como modulo al modulo de su padre
		if ($parentId > 0) {
			$parent = CategoryPeer::get($parentId);
			$module = $parent->getModule();
		}
		$category->setModule($module);
		$category->setParentId($parentId);
		$category->save();
		return true;
  }

	/**
	* Indica si existe un categoria con un id especifico.
	*
  * @param int $id Id del category
	*	@return boolean true si existe la category, false sino
	*/
  function exists($id) {
		$obj = CategoryPeer::retrieveByPK($id);
		if (empty($obj))
			return false;
		else return true;
  }
  
	/**
	* Elimina una categoria a partir del id.
	*
  * @param int $id Id del category
	*	@return boolean true si se elimino correctamente el category, false sino
	*/
  function delete($id) {
		$category = CategoryPeer::retrieveByPk($id);
		$category->setActive(0);
		$category->save();
		return true;
  }

  /**
  * Obtiene la informacion de un categoria.
  *
  * @param int $id Id de la categoria
  * @return Category Informacion de la categoria
  */
  function get($id) {
   	$obj = CategoryPeer::retrieveByPK($id);
		return $obj;
  }

  /**
  * Obtiene todas las categorias.
	*
	*	@return array Informacion sobre todas las categories
  */
	function getAll() {
		$cond = new Criteria();
		$cond->add(CategoryPeer::ACTIVE, 1);
		$todosObj = CategoryPeer::doSelect($cond);
		return $todosObj;
  }
  
  /**
  * Obtiene todas las categorias públicas.
	*
	*	@return array Informacion sobre todas las categories
  */
	function getAllPublic() {
		$cond = new Criteria();
		$cond->add(CategoryPeer::ACTIVE, 1);
		$cond->add(CategoryPeer::ISPUBLIC, 1);
		$todosObj = CategoryPeer::doSelect($cond);
		return $todosObj;
  }  

  /**
  * Obtiene todas las categorias.
	*
	*	@return array Informacion sobre todas las categories
  */
	function getAllByModule($module='') {
		$cond = new Criteria();
		$cond->add(CategoryPeer::ACTIVE, 1);
		$cond->add(CategoryPeer::MODULE,$module);
		$todosObj = CategoryPeer::doSelect($cond);
		return $todosObj;
  }
  
  /**
  * Obtiene todas las categorias públicas de un módulo.
	*
	*	@return array Informacion sobre todas las categories
  */
	function getAllPublicByModule($module='') {
		$cond = new Criteria();
		$cond->add(CategoryPeer::ACTIVE, 1);
		$cond->add(CategoryPeer::MODULE,$module);
		$cond->add(CategoryPeer::ISPUBLIC, 1);
		$todosObj = CategoryPeer::doSelect($cond);
		return $todosObj;
  }  

  /**
  * Obtiene todas las categorias para un modulo.
	*
	*	@return array Informacion sobre todas las categories
  */
	function getAllParentsByModule($module='') {
		$cond = new Criteria();
		$cond->add(CategoryPeer::ACTIVE, 1);
		$cond->add(CategoryPeer::MODULE,$module);
		$cond->add(CategoryPeer::PARENTID,0);
		$todosObj = CategoryPeer::doSelect($cond);
		return $todosObj;
  }

  /**
  * Obtiene todas las categorias.
	*
	*	@return array Informacion sobre todas las categories
  */
	function getAllParents() {
		$cond = new Criteria();
		$cond->add(CategoryPeer::ACTIVE, 1);
		$cond->add(CategoryPeer::PARENTID,0);
		$todosObj = CategoryPeer::doSelect($cond);
		return $todosObj;
  }

   /**
    * Return an array with all the categories this user can access
    *
    * @param User $user
    * @return array of Actor
    */
  function getUserCategories($user){
  	if ($user->isAdmin() || $user->isSupervisor())
  		return CategoryPeer::getAll();
		require_once("UserGroupPeer.php");
  	require_once("GroupCategoryPeer.php");
  	$sql = "SELECT ".CategoryPeer::TABLE_NAME.".* FROM ".UserGroupPeer::TABLE_NAME ." ,".
						GroupCategoryPeer::TABLE_NAME .", ".CategoryPeer::TABLE_NAME .
						" where ".UserGroupPeer::USERID ." = '".$user->getId()."' and ".
						UserGroupPeer::GROUPID ." = ".GroupCategoryPeer::GROUPID ." and ".
						GroupCategoryPeer::CATEGORYID ." = ".CategoryPeer::ID ." and ".
						CategoryPeer::ACTIVE ." = 1";
  	
  	$con = Propel::getConnection(parent::DATABASE_NAME);
	$stmt = $con->prepare($sql);
	$stmt->execute();
	return CategoryPeer::populateObjects($stmt);	  	
  }
	
	/**
	 * Obtiene aquellas categorias que pueden ser base para un modulo.
	 * Si no se indica modulo, se devuelven aquella categorias generales es decir sin modulo.
	 * 
	 * @param string module
	 * @return array de instancias de categoria
	 *
	 */
	public function getBaseCategories($module='') {
		
		$cond = new Criteria();
		$cond->add(CategoryPeer::ACTIVE, 1);
		$cond->add(CategoryPeer::PARENTID, 0);		
		
		if (empty($module))
			$cond->add(CategoryPeer::MODULE,'');
		else
			$cond->add(CategoryPeer::MODULE,$module);
		
		$todosObj = CategoryPeer::doSelect($cond);
		return $todosObj;
		
	}
	
	/**
	 * Obtiene todas las categoria hijas de un padre
	 *
	 * @param integer id de padre
	 * @return array instancias de category
	 */
	public function getByParent($parentId) {

		$cond = new Criteria();
		$cond->add(CategoryPeer::ACTIVE, 1);
		$cond->add(CategoryPeer::PARENTID, $parentId);		
		$todosObj = CategoryPeer::doSelect($cond);
		return $todosObj;
		
	}

}
