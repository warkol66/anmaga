<?php

require_once('import/classes/SupplierQuotationItemComment.php');
require 'import/classes/om/BaseSupplierQuotationItemCommentPeer.php';


/**
 * Skeleton subclass for performing query and update operations on the 'import_supplierQuotationItemComment' table.
 *
 * Feedback entre supplier y usuario admin de anmaga sobre un Item
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    import.classes
 */
class SupplierQuotationItemCommentPeer extends BaseSupplierQuotationItemCommentPeer {
	
	/**
	 * Factory Method que crea un Comentario sin asociarlo a un item
	 * 
	 */
	public function createComment($params) {
		$comment = new SupplierQuotationItemComment();
		$comment->setPrice($params['price']);
		$comment->setDelivery($params['delivery']);
		$comment->setComments($params['comments']);
		if (!empty($params['supplierId'])) {
			$comment->setSupplierId($params['supplierId']);
		}
		if (!empty($params['userId'])) {
			$comment->setUserId($params['userId']);
		}
		$comment->setCreatedAt(time());
		
		return $comment;
	}

} // SupplierQuotationItemCommentPeer
