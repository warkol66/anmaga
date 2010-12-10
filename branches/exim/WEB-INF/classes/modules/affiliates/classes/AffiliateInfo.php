<?php

require_once 'affiliates/classes/om/BaseAffiliateInfo.php';


/**
 * Skeleton subclass for representing a row from the 'affiliates_affiliateInfo' table.
 *
 * Informacion del afiliado
 *
 * @package affiliates
 */	
class AffiliateInfo extends BaseAffiliateInfo {
	public function getName() {
		return $this->getAffiliate()->getName();
	}
} // AffiliateInfo
