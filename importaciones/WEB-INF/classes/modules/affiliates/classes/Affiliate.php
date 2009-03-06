<?php

require_once 'affiliates/classes/om/BaseAffiliate.php';

/**
 * Skeleton subclass for representing a row from the 'affiliates_affiliate' table.
 *
 * Afiliados
 *
 * @package affiliates
 */	
class Affiliate extends BaseAffiliate {

	public function save(PropelPDO $con = null) {
		
		parent::save($con);
		
		global $system;
		$mediaWikiIntegration = $system["config"]["affiliates"]["mediaWikiIntegration"]["value"];

		if ($mediaWikiIntegration == "YES")		
			AffiliatePeer::generateMediawikiPermissions();	
	}
	
	public function delete(PropelPDO $con = null) {
		
		parent::delete($con);	
		
		global $system;
		$mediaWikiIntegration = $system["config"]["affiliates"]["mediaWikiIntegration"]["value"];

		if ($mediaWikiIntegration == "YES")			
			AffiliatePeer::generateMediawikiPermissions();
	}	

	/**
	 * Obtiene una cotizacion creada por el afiliado.
	 * @param integer $id id de la cotizacion 
	 */
	public function getClientQuotation($id) {
		
		require_once('ClientQuotationPeer.php');
		
		$criteria = new Criteria();
		$criteria->add(ClientQuotationPeer::ID,$id);
		$criteria->add(ClientQuotationPeer::AFFILIATEID,$this->getId());
		$result = ClientQuotationPeer::doSelect($criteria);
	    
		return $result[0];
	}        

} // Affiliate
