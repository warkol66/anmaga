<?php

require_once 'import/classes/SupplierQuotationItemCommentPeer.php';
require_once 'import/classes/om/BaseSupplierQuotationItem.php';


/**
 * Skeleton subclass for representing a row from the 'import_supplierQuotationItem' table.
 *
 * Elemento de Cotizacion de Proveedor
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
class SupplierQuotationItem extends BaseSupplierQuotationItem {

	const STATUS_NEW = 1;
	const STATUS_QUOTED = 2;
	const STATUS_FEEDBACK = 3;
	
	private $statusNames = array(
								SupplierQuotationItem::STATUS_NEW => 'New',
								SupplierQuotationItem::STATUS_QUOTED => 'Quoted',
								SupplierQuotationItem::STATUS_FEEDBACK => 'Feedback'								
							);	
	
	const PACKAGE_BY_UNIT = 1;
	const PACKAGE_BY_CARTON = 2;
	
	/**
	 * Calcula el volumen en m3 segun la informacion ingresada en la cotizacion sobre la unidad
	 * @return float
	 */
	public function getUnitVolume() {
		return ($this->getUnitWidth() * $this->getUnitHeight() * $this->getUnitLength() / 1000000);
	}

	/**
	 * Calcula el volumen en m3 segun la informacion ingresada en la cotizacion sobre el bulto
	 * @return float
	 */	
	public function getCartonVolume() {
		return ($this->getCartonWidth() * $this->getCartonHeight() * $this->getCartonLength() / 1000000);		
	}
	
	/**
	 * Calcula la densidad segun la informacion ingresada en la cotizacion sobre la unidad
	 */
	function getUnitDensity() {
		
		if ($this->getUnitVolume() == 0)
			return 0;
		
		return ($this->getUnitGrossWeigth() / $this->getUnitVolume());
	}
	
	/**
	 * Calcula la densidad segun la informacion ingresada en la cotizacion sobre la unidad
	 */
	function getCartonDensity() {

		if ($this->getCartonVolume() == 0)
			return 0;
		
		return ($this->getCartonGrossWeigth() / $this->getCartonVolume());

	}
	
	/**
	 * Calcula el volumen segun la informacion ingresada en la cotizacion sobre el bulto
	 * @return float
	 */	
	public function getTotalVolume() {
		return ($this->getUnitVolume() * $this->getQuantity());		
	}

	/**
	 * Calcula el volumen segun la informacion ingresada en la cotizacion sobre el bulto
	 * @return float
	 */	
	public function getTotalWeigth() {
		return ($this->getUnitGrossWeigth() * $this->getQuantity());		
	}

	/**
	 * Devuelve el nombre del status actual del item de la cotizacion
	 * @return string
	 */
	public function getStatusName() {
		return $this->statusNames[$this->getStatus()];
	}
	
	/**
	 * Indica si la cotizacion del item se encuentra contestada
	 * @return boolean
	 */
	public function isQuoted() {
		return ($this->getStatus() == SupplierQuotationItem::STATUS_QUOTED);
	}
	
	/**
	 * Indica si la cotizacion del item se encuentra en espera de respuesta por negociacion
	 * @return boolean
	 */
	public function isOnFeedback() {
		return ($this->getStatus() == SupplierQuotationItem::STATUS_FEEDBACK);
	}
	
	/**
	 * Realiza una peticion de Feedback sobre un item
	 * @param $user User instancia de usuario que pide el feedback
	 * @param $comment String comentario del usuario que pide el feedback donde indica la razon del mismo
	 */
	public function askFeedback($user,$comment) {
		
		try {

			$this->setStatus(SupplierQuotationITem::STATUS_FEEDBACK);

			require_once('SupplierQuotationItemCommentPeer.php');
			//creamos el comentario relacionado a la actualizacion
			$commentParams = array();
			$commentParams['supplierQuotationItemComment']['price'] = $this->getPrice();
			$commentParams['supplierQuotationItemComment']['delivery'] = $this->getDelivery();
			$commentParams['supplierQuotationItemComment']['comments'] = $comment;
			$commentParams['supplierQuotationItemComment']['userId'] = $user->getId();

			$comment = SupplierQuotationItemCommentPeer::createComment($commentParams['supplierQuotationItemComment']);
			$this->addSupplierQuotationItemComment($comment);

			$this->save();

			//actualizamos el estado general de la cotizacion
			$supplierQuotation = $this->getSupplierQuotation();

			if (!$supplierQuotation->isOnFeedback()) {
				$supplierQuotation->setStatus(SupplierQuotation::STATUS_FEEDBACK);
				$supplierQuotation->save();
				$supplierQuotation->saveCurrentStatusOnHistory();
			}
	
		} catch (PropelException $e) {
			return false;
		}
		
	}

} // SupplierQuotationItem
