<?php

// The parent class
require_once 'anmaga/om/BaseAffiliateProductCodePeer.php';

// The object class
include_once 'anmaga/AffiliateProductCode.php';

/**
 * Class AffiliateProductCodePeer
 *
 * @package AffiliateProductCode
 */
class AffiliateProductCodePeer extends BaseAffiliateProductCodePeer {

  /**
  * Crea un codigo de producto por afiliado nuevo.
  *
  * @param int $affiliateId affiliateId del affiliateproductcode
  * @param int $productId productId del affiliateproductcode
  * @param string $productCodeAffiliate productCodeAffiliate del affiliateproductcode
  * @return boolean true si se creo el affiliateproductcode correctamente, false sino
	*/
	function create($affiliateId,$productId,$productCodeAffiliate) {
    try {
      $affiliateproductcodeObj = new AffiliateProductCode();
      $affiliateproductcodeObj->setaffiliateId($affiliateId);
      $affiliateproductcodeObj->setproductId($productId);
      $affiliateproductcodeObj->setproductCodeAffiliate($productCodeAffiliate);
      $affiliateproductcodeObj->save();
    }
    catch (Exception $e) {
      return false;
    }        
		return true;
	}

  /**
  * Actualiza la informacion de un codigo de producto por afiliado.
  *
  * @param int $id id del affiliateproductcode
  * @param int $affiliateId affiliateId del affiliateproductcode
  * @param int $productId productId del affiliateproductcode
  * @param string $productCodeAffiliate productCodeAffiliate del affiliateproductcode
  * @return boolean true si se actualizo la informacion correctamente, false sino
	*/
  function update($id,$affiliateId,$productId,$productCodeAffiliate) {
  	$affiliateproductcodeObj = AffiliateProductCodePeer::retrieveByPK($id);
    $affiliateproductcodeObj->setaffiliateId($affiliateId);
    $affiliateproductcodeObj->setproductId($productId);
    $affiliateproductcodeObj->setproductCodeAffiliate($productCodeAffiliate);    
    $affiliateproductcodeObj->save();
		return true;
  }

	/**
	* Elimina un codigo de producto por afiliado a partir de los valores de la clave.
	*
  * @param int $id id del affiliateproductcode
	*	@return boolean true si se elimino correctamente el affiliateproductcode, false sino
	*/
  function delete($id) {
  	$affiliateproductcodeObj = AffiliateProductCodePeer::retrieveByPK($id);
    $affiliateproductcodeObj->delete();
		return true;
  }

  /**
  * Obtiene la informacion de un codigo de producto por afiliado.
  *
  * @param int $id id del affiliateproductcode
  * @return AffiliateProductCode Informacion del affiliateproductcode
  */
  function get($id) {
		$affiliateproductcodeObj = AffiliateProductCodePeer::retrieveByPK($id);
    return $affiliateproductcodeObj;
  }
  
  /**
  * Obtiene la informacion de un codigo de producto por afiliado a partir de un afiliado y un affiliateProductCode.
  *
  * @param int $affiliateId Id del affiliate
  * @param String $code Codigo del producto para el afliado
  * @return AffiliateProductCode Informacion del affiliateproductcode
  */
  function getByAffiliateAndCode($affiliateId,$code) {  
    $cond = new Criteria();
    $cond->add(AffiliateProductCodePeer::AFFILIATEID, $affiliateId);
    $cond->add(AffiliateProductCodePeer::PRODUCTCODEAFFILIATE, $code);
    $alls = AffiliateProductCodePeer::doSelect($cond);
    return $alls[0];  
  }

  /**
  * Obtiene todos los codigos de productos por afiliado.
	*
	*	@return array Informacion sobre todos los affiliateproductcodes
  */
	function getAll() {
		$cond = new Criteria();
		$alls = AffiliateProductCodePeer::doSelect($cond);
		return $alls;
  }

}
?>
