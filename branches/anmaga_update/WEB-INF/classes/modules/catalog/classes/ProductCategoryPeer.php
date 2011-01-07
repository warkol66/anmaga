<?php

/**
 * Class ProductCategoryPeer
 *
 * @package ProductCategory
 */
class ProductCategoryPeer extends BaseProductCategoryPeer {

  /**
  * Crea un product category nuevo.
  *
  * @param string $description Descripcion de la categoria
  * @param string $name Nombre de la categoria
  * @param array $image image del product
  * @param int $parentNodeId Id del nodo padre
  * @return boolean true si se creo el productcategory correctamente, false sino
	*/
	function create($description,$name,$image,$parentNodeId=0) {
    $productCategoryObj = new ProductCategory();
    $productCategoryObj->setdescription($description);
		$productCategoryObj->save();

		$uploadfile = 'WEB-INF/productCategories/' . $productCategoryObj->getId();

		move_uploaded_file($image['tmp_name'], $uploadfile);

    require_once("NodePeer.php");
    return NodePeer::create($name,"ProductCategory",$productCategoryObj->getId(),$parentNodeId,0);
	}

  /**
  * Actualiza la informacion de un product category.
  *
  * @param int $id id del productcategory
  * @param string $description description del productcategory
  * @param string $name Nombre de la categoria
  * @param array $image image del product
  * @return boolean true si se actualizo la informacion correctamente, false sino
	*/
  function update($id,$description,$name,$image) {
    require_once("NodePeer.php");
		$node = NodePeer::get($id);
		$node->setName($name);
		$node->save();

  	$productCategoryObj = $node->getInfo();
    $productCategoryObj->setdescription($description);
		if (!empty($image)) {
			$uploadfile = 'WEB-INF/productCategories/' . $productCategoryObj->getId();
  		move_uploaded_file($image['tmp_name'], $uploadfile);
  	}
		$productCategoryObj->save();
		return true;
  }

	/**
	* Elimina un product category a partir de los valores de la clave.
	*
  * @param int $id id del productcategory
	*	@return boolean true si se elimino correctamente el productcategory, false sino
	*/
  function delete($id) {
  	$productcategoryObj = ProductCategoryPeer::retrieveByPK($id);
    $productcategoryObj->delete();
		return true;
  }

  /**
  * Obtiene la informacion de un product category.
  *
  * @param int $id id del productcategory
  * @return array Informacion del productcategory
  */
  function get($id) {
		$productCategoryObj = ProductCategoryPeer::retrieveByPK($id);
    return $productCategoryObj;
  }
  
  /**
  * Obtiene si existe un product category.
  *
  * @param int $id id del productcategory
  * @return boolean true si existe la categoria con ese id, false sino
  */
  function exists($id) {
    require_once("NodePeer.php");
		$node = NodePeer::get($id);
		if ( !empty($node) and $node->getKind() == "ProductCategory" )
			return true;
		return false;
  }

  /**
  * Obtiene todos los product categories.
	*
	*	@return array Informacion sobre todos los productcategories
  */
	function getAll() {
		$cond = new Criteria();
		$alls = ProductCategoryPeer::doSelect($cond);
		return $alls;
  }
  
  /**
  * Obtiene una categoria en base a su nombre.
	*
	* @param string $name Nombre de la categoria
	*	@return Node Nodo de la categoria con el nombre pasado como parametro
  */
	function getByName($name) {
		return CategoryQuery::create()->filterByModule('catalog')->filterByName($name)->findOne();
  }
  


}
