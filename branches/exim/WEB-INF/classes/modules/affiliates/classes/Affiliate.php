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

	/**
	 * Obtiene el usuario administrador del afiliado.
	 *
	 */
  function getOwner() {
		require_once("AffiliateUserPeer.php");
		return AffiliateUserPeer::get($this->getOwnerId());
  }

/* ---- Integración con Wikimedia ---- */
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
	
/* ---- Fin Integración con Wikimedia ---- */

/* ---- Integración módulo Import/Export ---- */
	/**
	 * Obtiene una cotizacion creada por el afiliado.
	 * @param integer $id id de la cotizacion
	 */
	public function getClientQuote($id) {

		if (file_exists("WEB-INF/classes/modules/import/classes/ClientQuotePeer.php")) {
			require_once("ClientQuotePeer.php");
			$criteria = new Criteria();
			$criteria->add(ClientQuotePeer::ID,$id);
			$criteria->add(ClientQuotePeer::AFFILIATEID,$this->getId());
			$result = ClientQuotePeer::doSelectOne($criteria);
			return $result;
		}
	else
    return;
	}

	/**
	 * Obtiene un Pedido creado por el afiliado.
	 * @param integer $id id de la cotizacion
	 */
	public function getClientPurchaseOrder($id) {

		if (file_exists("WEB-INF/classes/modules/import/classes/ClientPurchaseOrderPeer.php")) {
			require_once("ClientPurchaseOrderPeer.php");

			$criteria = new Criteria();
			$criteria->add(ClientPurchaseOrderPeer::ID,$id);
			$criteria->add(ClientPurchaseOrderPeer::AFFILIATEID,$this->getId());
			$result = ClientPurchaseOrderPeer::doSelectOne($criteria);

			return $result;
		}
		else return;
	}

/* ---- Fin Integración módulo Import/Export ---- */

} // Affiliate
