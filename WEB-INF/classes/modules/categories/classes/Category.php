<?php
require_once 'om/BaseCategory.php';

require_once 'GroupPeer.php';

/** 
 *
 * @package category 
 */
class Category extends BaseCategory {

	function hasAccessUser($user) {
			foreach ($user->getGroups() as $groupUser) {
				if ( $this->hasAccessGroup($groupUser->getGroup()) )
					return true;
			}
			return false;
	}

	function hasAccessGroup($group) {
  	$groupCategory = GroupCategoryPeer::retrieveByPK($group->getId(),$this->getId());
  	if ( !empty($groupCategory) )
  		return true;
  	return false;
	}
	
	/**
	 * indica si es una categoria padre
	 * @return boolean
	 */
	public function isParent() {
		if ($this->getParentId() == 0)
			return true;
		return false;
	}
	
	/**
	 * indica si es una categoria hija
	 * @return boolean
	 */
	public function isChildren() {
		
		return (!$this->isParent());
	}
	
	/**
	 * Obtiene el modulo de la categoria
	 * Se sobrecargo dado que de esta forma siempre nos aseguramos que si es una
	 * categoria hija, traiga el modulo del padre.
	 */
	public function getModule() {
	
		if ($this->isChildren()) {
			$parentId = $this->getParentId();
			$parent = CategoryPeer::get($parentId);
			return $parent->getModule();
		}
		
		return parent::getModule();
		
		
	}
	
	/**
	 * Obtiene todas las categorias hijas
	 * @return array de instancias de Category
	 */
	public function getChildrenCategories() {
		
		$categories = CategoryPeer::getByParent($this->getId());
		return $categories;
		
	}
	
	/**
	 * Devuelve la cantidad de documentos que hay en la categoria
	 * @return integer
	 */
	public function getDocumentsCount() {
		return DocumentPeer::getDocumentsByCategoryCount($this);
	}

}
