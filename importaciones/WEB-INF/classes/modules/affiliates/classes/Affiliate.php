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
        

} // Affiliate
