<?php

  // include base peer class
  require_once 'import/classes/om/BaseProductRequestPeer.php';

  // include object class
  include_once 'import/classes/ProductRequest.php';
  require_once('import/classes/CommentPeer.php');

/**
 * Skeleton subclass for performing query and update operations on the 'productRequest' table.
 *
 * Products of each request
 *
 * This class was autogenerated by Propel on:
 *
 * 12/05/07 13:19:20
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    anmaga
 */
class ProductRequestPeer extends BaseProductRequestPeer {

	/*
	 * Crea una nueva Product Request
	 * 
	 *
	 * @param $requestId id del request
	 * @param $productId id del product
	 * @param $quantity cantidad del producto
	 * @returns el objeto product request creado, o false en caso de error.
	 */
	function create($requestId,$productId,$quantity) {
		
		$productRequest = new ProductRequest();
		$productRequest->setRequestId($requestId);
		$productRequest->setProductId($productId);
		$productRequest->setQuantity($quantity);
		$productRequest->setNewStatus();
		$datetime = date("Y-m-d H:i:s");
		$productRequest->setTimestampStatus($datetime);
		try {
			$productRequest->save();
		}
		catch(PropelException $exp) {
			return false;
		}

		return $productRequest;

	}

	/**
	* Obtiene la informacion de un product Request.
	*
	* @param int $id id del product request
	* @return instancia de product request
	*/
	function get($id) {
		$productReqObj = ProductRequestPeer::retrieveByPK($id);
		return $productReqObj;
	}
	
	/*
	 * Elimina un productRequest
	 * 
	 *
	 * @param $productRequestId id del product request
	 * @returns true en caso de exito, o false en caso de error.
	 */
	function delete($productRequestId){

		$productRequest = ProductRequestPeer::get($productRequestId);
		if (!$productRequest)
			return false;

		try {
			$productRequest->delete();
		}
		catch (PropelException $exp) {
			return false;
		}

		//eliminamos los comentarios asociados.
		$comments = CommentPeer::getAllFromProductRequest($productRequestId);
		foreach( $comments as $comment ) {
			$comment->delete();
		}

		return true;
			

	}

} // ProductRequestPeer
