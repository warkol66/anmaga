<?php

require_once 'import/classes/om/BaseClientQuoteItem.php';
require_once('SupplierQuoteItemPeer.php');


/**
 * Skeleton subclass for representing a row from the 'import_clientQuoteItem' table.
 *
 * Elemento de Cotizacion Cliente
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
class ClientQuoteItem extends BaseClientQuoteItem {
	
	/**
	 * Obtiene el elemento de cotizacion del proveedor
	 * @return SupplierQuoteItem instancia de Supplier QuoteItem o vacio en caso de que aun no se haya asignado
	 */
	public function getSupplierQuoteItem() {
		
		$criteria = new Criteria();
		$criteria->add(SupplierQuoteItemPeer::CLIENTQUOTEITEMID,$this->getId());
		$result = SupplierQuoteItemPeer::doSelect($criteria);
		return $result[0];
		
	}
	
	/**
	 * Indica si este elemento ya ha sido designado para cotizacion.
	 * @return boolean
	 */
	public function hasASupplierQuoteRelated() {
		$supplierQuoteItem = $this->getSupplierQuoteItem();
		return (!empty($supplierQuoteItem));
	}
	
	/**
	 * Obtiene las ultimas cotizaciones realizadas al cliente sobre este item
	 * que hayan tenido fijado un precio
	 */
	public function getLastClientQuoteItemsRelated() {
		$criteria = new Criteria();
		$criteria->add(ClientQuoteItemPeer::PRODUCTID,$this->getProductId());
		$criteria->add(ClientQuoteItemPeer::ID,$this->getId(),Criteria::NOT_EQUAL);
		$criteria->add(ClientQuoteItemPeer::PRICE,'',Criteria::NOT_EQUAL);
		$result = ClientQuoteItemPeer::doSelect($criteria);
		return $result;
	}

} // ClientQuoteItem
