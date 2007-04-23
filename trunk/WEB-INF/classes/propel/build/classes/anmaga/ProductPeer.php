<?php

// The parent class
require_once 'om/BaseProductPeer.php';

// The object class
include_once 'Product.php';

/**
 * Class ProductPeer
 *
 * @package Product
 */
class ProductPeer extends BaseProductPeer {

  /**
  * Crea un product nuevo.
  *
  * @param string $code code del product
  * @param string $name name del product
  * @param string $description description del product
  * @param float $price price del product
  * @param array $image image del product
  * @param integer $parentNodeId Id del nodo padre
  * @return int Id del nodo creado
	*/
	function create($code,$name,$description,$price,$image,$parentNodeId=0) {
    $productObj = new Product();
    $productObj->setcode($code);
		$productObj->setdescription($description);
		$productObj->setprice($price);
		$productObj->save();

		$uploadfile = 'WEB-INF/products/' . $productObj->getId();

		if (!empty($image['tmp_name']))
			move_uploaded_file($image['tmp_name'], $uploadfile);
		
    require_once("NodePeer.php");
    return NodePeer::create($name,"Product",$productObj->getId(),$parentNodeId,0);
	}

  /**
  * Actualiza la informacion de un product.
  *
  * @param int $id id del nodo del product
  * @param string $code code del product
  * @param string $name name del product
  * @param string $description description del product
  * @param float $price price del product
  * @param array $image image del product
  * @param integer $parentNodeId Id del nodo padre
  * @return boolean true si se actualizo la informacion correctamente, false sino
	*/
  function update($id,$code,$name,$description,$price,$image,$parentNodeId=0) {
    require_once("NodePeer.php");
		$node = NodePeer::get($id);
		$node->setName($name);
		$node->setParentId($parentNodeId);
		$node->save();

  	$productObj = $node->getInfo();
    $productObj->setcode($code);
		$productObj->setdescription($description);
		$productObj->setprice($price);
		if (!empty($image)) {
			$uploadfile = 'WEB-INF/products/' . $productObj->getId();
  		move_uploaded_file($image['tmp_name'], $uploadfile);
  	}
		$productObj->save();
		return true;
  }

	/**
	* Elimina un product a partir de los valores de la clave.
	*
  * @param int $id id del product
	*	@return boolean true si se elimino correctamente el product, false sino
	*/
  function delete($id) {
  	$productObj = ProductPeer::retrieveByPK($id);
    $productObj->delete();
		return true;
  }

  /**
  * Obtiene la informacion de un product.
  *
  * @param int $id id del product
  * @return array Informacion del product
  */
  function get($id) {
		$productObj = ProductPeer::retrieveByPK($id);
    return $productObj;
  }

  /**
  * Obtiene todos los productos.
	*
	*	@return array Informacion sobre todos los products
  */
	function getAll() {
		$cond = new Criteria();
		$alls = ProductPeer::doSelect($cond);
		return $alls;
  }
  
  /**
  * Obtiene todos los productos paginados.
	*
	*	@return array Informacion sobre los productos
  */
	function getAllPaginated($page=1,$perPage=10) {
		if (empty($page))
			$page = 1;
		require_once("propel/util/PropelPager.php");
		$cond = new Criteria();
		$cond->addAscendingOrderByColumn(ProductPeer::CODE);

		$pager = new PropelPager($cond,"ProductPeer", "doSelect",$page,$perPage);
		return $pager;
	 }

}
?>
