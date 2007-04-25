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
  * @param integer $unitId Id de la unidad  
  * @param integer $measureUnitId Id de la unidad de medida
  * @return int Id del nodo creado
	*/
	function create($code,$name,$description,$price,$image,$parentNodeId=0,$unitId,$measureUnitId) {
    try {
			$productObj = new Product();
  	  $productObj->setCode($code);
			$productObj->setDescription($description);
			$productObj->setPrice($price);
			$productObj->setUnitId($unitId);
			$productObj->setMeasureUnitId($measureUnitId);
			$productObj->save();

			$uploadfile = 'WEB-INF/products/' . $productObj->getId();

			if (!empty($image['tmp_name']))
				move_uploaded_file($image['tmp_name'], $uploadfile);

	    require_once("NodePeer.php");
  	  return NodePeer::create($name,"Product",$productObj->getId(),$parentNodeId,0);
  	}
		catch (PropelException $e) {
			return false;
		}
	}
	
  /**
  * Crea un product nuevo, reemplazando al producto de igual codigo, si existia.
  *
  * @param string $code code del product
  * @param string $name name del product
  * @param string $description description del product
  * @param float $price price del product
  * @param array $image image del product
  * @param integer $parentNodeId Id del nodo padre
  * @param integer $unitId Id de la unidad  
  * @param integer $measureUnitId Id de la unidad de medida
  * @return int Id del nodo creado
	*/
	function createAndReplace($code,$name,$description,$price,$image,$parentNodeId=0,$unitId,$measureUnitId) {
    try {
			$oldProduct = ProductPeer::getByCode($code);
			if (!empty($oldProduct))
				$productObj = $oldProduct;
			else
				$productObj = new Product();
  	  $productObj->setCode($code);
			$productObj->setDescription($description);
			$productObj->setPrice($price);
			$productObj->setUnitId($unitId);
			$productObj->setMeasureUnitId($measureUnitId);
			$productObj->save();

			$uploadfile = 'WEB-INF/products/' . $productObj->getId();

			if (!empty($image['tmp_name']))
				move_uploaded_file($image['tmp_name'], $uploadfile);

			if (!empty($oldProduct)) {
			  $node = $productObj->getNode();
			  $node->setName($name);
			  $node->setParentId($parentNodeId);
			  $node->save();
				return $node->getId();
			}
			else {
		    require_once("NodePeer.php");
  		  return NodePeer::create($name,"Product",$productObj->getId(),$parentNodeId,0);
  		}
  	}
		catch (PropelException $e) {
			return false;
		}
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
  * @param integer $unitId Id de la unidad  
  * @param integer $measureUnitId Id de la unidad de medida    
  * @return boolean true si se actualizo la informacion correctamente, false sino
	*/
  function update($id,$code,$name,$description,$price,$image,$parentNodeId=0,$unitId,$measureUnitId) {
    require_once("NodePeer.php");
		$node = NodePeer::get($id);
		$node->setName($name);
		$node->setParentId($parentNodeId);
		$node->save();

  	$productObj = $node->getInfo();
    $productObj->setcode($code);
		$productObj->setdescription($description);
		$productObj->setprice($price);
		$productObj->setUnitId($unitId);
		$productObj->setMeasureUnitId($measureUnitId);
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
	 
  /**
  * Obtiene un producto en base a su codigo.
	*
	* @param string $code Codigo del producto
	*	@return Product Producto con el codigo pasado como parametro
  */
	function getByCode($code) {
		$cond = new Criteria();
		$cond->add(ProductPeer::CODE, $code);
		$alls = ProductPeer::doSelect($cond);
		return $alls[0];
  }

}
?>
