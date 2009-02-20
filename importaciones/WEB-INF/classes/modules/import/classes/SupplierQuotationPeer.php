<?php

  // include base peer class
  require_once 'import/classes/om/BaseSupplierQuotationPeer.php';

  // include object class
  include_once 'import/classes/SupplierQuotation.php';


/**
 * Skeleton subclass for performing query and update operations on the 'import_supplierQuotation' table.
 *
 * Cotizacion de Proveedor
 *
 * This class was autogenerated by Propel on:
 *
 * Mon Feb  2 17:02:11 2009
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    anmaga
 */
class SupplierQuotationPeer extends BaseSupplierQuotationPeer {
	
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
  * Crea un supplier quotation nuevo.
  *
  * @param array $params Array asociativo con los atributos del objeto
  * @return boolean true si se creo correctamente, false sino
  */  
  function create($params) {
    try {
      $supplierquotationObj = new SupplierQuotation();
      foreach ($params as $key => $value) {
        $setMethod = "set".$key;
        if ( method_exists($supplierquotationObj,$setMethod) ) {          
          if (!empty($value))
            $supplierquotationObj->$setMethod($value);
          else
            $supplierquotationObj->$setMethod(null);
        }
      }
      $supplierquotationObj->save();
      return true;
    } catch (Exception $exp) {
      return false;
    }         
  }  
  
  /**
  * Actualiza la informacion de un supplier quotation.
  *
  * @param array $params Array asociativo con los atributos del objeto
  * @return boolean true si se actualizo la informacion correctamente, false sino
  */  
  function update($params) {
    try {
      $supplierquotationObj = SupplierQuotationPeer::retrieveByPK($params["id"]);    
      if (empty($supplierquotationObj))
        throw new Exception();
      foreach ($params as $key => $value) {
        $setMethod = "set".$key;
        if ( method_exists($supplierquotationObj,$setMethod) ) {          
          if (!empty($value))
            $supplierquotationObj->$setMethod($value);
          else
            $supplierquotationObj->$setMethod(null);
        }
      }
      $supplierquotationObj->save();
      return true;
    } catch (Exception $exp) {
      return false;
    }         
  }    

	/**
	* Elimina un supplier quotation a partir de los valores de la clave.
	*
  * @param int $id id del supplierquotation
	*	@return boolean true si se elimino correctamente el supplierquotation, false sino
	*/
  function delete($id) {
  	$supplierquotationObj = SupplierQuotationPeer::retrieveByPK($id);
    $supplierquotationObj->delete();
		return true;
  }

  /**
  * Obtiene la informacion de un supplier quotation.
  *
  * @param int $id id del supplierquotation
  * @return array Informacion del supplierquotation
  */
  function get($id) {
		$supplierquotationObj = SupplierQuotationPeer::retrieveByPK($id);
    return $supplierquotationObj;
  }

  /**
  * Obtiene todos los supplier quotations.
	*
	*	@return array Informacion sobre todos los supplierquotations
  */
	function getAll() {
		$cond = new Criteria();
		$alls = SupplierQuotationPeer::doSelect($cond);
		return $alls;
  }
  
  /**
  * Obtiene todos los supplier quotations paginados.
  *
  * @param int $page [optional] Numero de pagina actual
  * @param int $perPage [optional] Cantidad de filas por pagina
  *	@return array Informacion sobre todos los supplierquotations
  */
  function getAllPaginated($page=1,$perPage=-1) {  
    if ($perPage == -1)
      $perPage = 	SupplierQuotationPeer::getRowsPerPage();
    if (empty($page))
      $page = 1;
    require_once("propel/util/PropelPager.php");
    $cond = new Criteria();     
    $pager = new PropelPager($cond,"SupplierQuotationPeer", "doSelect",$page,$perPage);
    return $pager;
   }    	

   public function createFromClientQuotation($supplier,$incoterm,$port,$clientQuotation,$items) {
		
		try {
			
			$supplierQuotation = new SupplierQuotation();
			$supplierQuotation->setSupplier($supplier);
			$supplierQuotation->setClientQuotationId($clientQuotation->getId());
			$supplierQuotation->setCreatedAt(time());
			$supplierQuotation->setStatus(SupplierQuotation::STATUS_NEW);
			$supplierQuotation->setTimestampStatus(time());
			$supplierQuotation->setSupplierAccessToken(SupplierQuotationPeer::generateRandomSupplierAccessCode());

			foreach ($items as $clientQuotationItem) {

				$supplierQuotationItem = new SupplierQuotationItem();
				$supplierQuotationItem->setProductId($clientQuotationItem->getProductId());
				$supplierQuotationItem->setClientQuotationItem($clientQuotationItem);
				$supplierQuotationItem->setQuantity($clientQuotationItem->getQuantity());
				$supplierQuotationItem->setIncoterm($incoterm);
				$supplierQuotationItem->setPort($port);
				
				$supplierQuotation->addSupplierQuotationItem($supplierQuotationItem);
				
			}
			
			$supplierQuotation->save();
			
		} catch (PropelException $e) {

			return false;
		}
		
		return $supplierQuotation;
   }

	/**
	 * Generador de codigos de Acceso para proveedor
	 * @return string
	 */
	public function generateRandomSupplierAccessCode() {
		return sha1(time() . 'anmaga');
	}
	
	public function getByAccessToken($token) {
		
		$criteria = new Criteria();
		$criteria->add(SupplierQuotationPeer::SUPPLIERACCESSTOKEN,$token);
		$result = SupplierQuotationPeer::doSelect($criteria);
		
		return $result[0];
		
	}

} // SupplierQuotationPeer
