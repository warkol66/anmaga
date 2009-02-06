<?php

// The parent class
require_once 'import/classes/om/BaseProductPeer.php';

// The object class
include_once 'import/classes/Product.php';

/**
 * Class ProductPeer
 *
 * @package Product
 */
class ProductPeer extends BaseProductPeer {

  /**
  * Obtiene la cantidad de filas por pagina por defecto en los listado paginados.
  *
  * @return int Cantidad de filas por pagina
  */
  function getRowsPerPage() {
    global $system;
    return $system["config"]["system"]["rowsPerPage"];
  }

  /**
   * Valida los parametros necesarios para la creacion de un producto
   *
   */
  private function validateParams($params,$productSupplierParams) {

  	$productVal = (!empty($params['code']) && !empty($params['name']));
  	$productSupplierVal = (!empty($productSupplierParams['supplierId']) && !empty($productSupplierParams['code']));

	return ($productVal && $productSupplierVal);

  }

  /**
  * Crea un product nueva.
  *
  * @param array $params Array asociativo con los atributos del objeto product
  * @param array $productSupplierParams Array asociativo con los atributos del objeto productSupplier
  * @return boolean true si se creo correctamente, false sino
  */  
  function create($params,$productSupplierParams) {

	if (!ProductPeer::validateParams($params,$productSupplierParams)) {
		return false;
	}

	try {
      $productObj = new Product();
      foreach ($params as $key => $value) {
        $setMethod = "set".$key;
        if ( method_exists($productObj,$setMethod) ) {          
          if (!empty($value))
            $productObj->$setMethod($value);
          else
            $productObj->$setMethod(null);
        }
      }

	  $productObj->setActive(1);

      $productObj->save();
	
	  $productSupplierParams['productId'] = $productObj->getId();
	  
	 require_once('ProductSupplier.php');
	
	  $productSupplierObj = new ProductSupplier();
      foreach ($productSupplierParams as $key => $value) {
        $setMethod = "set".$key;
        if ( method_exists($productSupplierObj,$setMethod) ) {          
          if (!empty($value))
            $productSupplierObj->$setMethod($value);
          else
            $productSupplierObj->$setMethod(null);
        }
      }

	  $productSupplierObj->save();
      return true;

    } catch (Exception $exp) {
      return false;
    }         
  }
	
	/**
	* Actualiza la informacion de un product.
	*
    * @param array $params Array asociativo con los atributos del objeto product
    * @param array $productSupplierParams Array asociativo con los atributos del objeto productSupplier
	* @return boolean true si se actualizo la informacion correctamente, false sino
	*/  
	function update($params,$productSupplierParams) {
	
		if (!ProductPeer::validateParams($params,$productSupplierParams)) {
			return false;
		}

	
	    try {
		  $productObj = ProductPeer::retrieveByPK($params["id"]);
	      foreach ($params as $key => $value) {
	        $setMethod = "set".$key;
	        if ( method_exists($productObj,$setMethod) ) {          
	          if (!empty($value))
	            $productObj->$setMethod($value);
	          else
	            $productObj->$setMethod(null);
	        }
	      }

		  $productObj->setActive(1);

	      $productObj->save();

		  $productSupplierParams['productId'] = $productObj->getId();

          require_once('ProductSupplierPeer.php');

          $criteria = new Criteria();
          $criteria->add(ProductSupplierPeer::PRODUCTID,$productObj->getId());
          $result = ProductSupplierPeer::doSelect($criteria);
          $productSupplierObj = $result[0];

	      foreach ($productSupplierParams as $key => $value) {
	        $setMethod = "set".$key;
	        if ( method_exists($productSupplierObj,$setMethod) ) {          
			  if (!empty($value))
	            $productSupplierObj->$setMethod($value);
	          else
	            $productSupplierObj->$setMethod(null);
	        }
	      }
	
		  $productSupplierObj->save();

	      return true;

	    } catch (Exception $exp) {
	      return false;
	    }


	}    


	/**
	* Elimina un product a partir de los valores de la clave.
	*
  * @param int $id id del product
	*	@return boolean true si se elimino correctamente el product, false sino
	*/
  function delete($id) {
  	$productObj = ProductPeer::retrieveByPK($id);
	$productObj->setactive('0');
	try {
		$productObj->save();
	}
	catch (Exception $exp) {
		return false;
	}

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
  * Obtiene todos los products.
	*
	*	@return array Informacion sobre todos los products
  */
	function getAll() {
		$cond = new Criteria();
		$cond->add(ProductPeer::ACTIVE,'1');
		$alls = ProductPeer::doSelect($cond);
		return $alls;
  }
  
  /**
  * Obtiene todos los products paginados.
  *
  * @param int $page [optional] Numero de pagina actual
  * @param int $perPage [optional] Cantidad de filas por pagina
  *	@return array Informacion sobre todos los products
  */
  function getAllPaginated($page=1,$perPage=-1) {  
    if ($perPage == -1)
      $perPage = 	ProductPeer::getRowsPerPage();
    if (empty($page))
      $page = 1;
    require_once("propel/util/PropelPager.php");
    $cond = new Criteria();     
    $cond->add(ProductPeer::ACTIVE,'1');
    $pager = new PropelPager($cond,"ProductPeer", "doSelect",$page,$perPage);
    return $pager;
   }    

	/**
	* Obtiene todos los products inactivos.
	*
	*	@return array Informacion sobre todos los products
	*/
	function getAllInactive() {
		$cond = new Criteria();
		$cond->add(ProductPeer::ACTIVE,'0');
		$alls = ProductPeer::doSelect($cond);
		return $alls;
	}
	
	/**
	* Activa un product.
	*
	* @param int $id id del product
	* @return true si fue exitosa, false sino.
	*/
	function activate($id) {
		$product = ProductPeer::retrieveByPK($id);
		$product->setActive('1');
		try {
			$product->save();
		}
		catch(PropelException $exp) {
			return false;
		}
		
		return true;

	}	

}
?>
