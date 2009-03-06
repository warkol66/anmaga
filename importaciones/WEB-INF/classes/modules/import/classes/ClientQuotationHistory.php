<?php

require_once('import/classes/ClientQuotationHistoryPeer.php');
require_once('import/classes/map/ClientQuotationHistoryMapBuilder.php');
require 'import/classes/om/BaseClientQuotationHistory.php';


/**
 * Skeleton subclass for representing a row from the 'import_clientQuotationHistory' table.
 *
 * Historial de Cotizacion a Cliente
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    import.classes
 */
class ClientQuotationHistory extends BaseClientQuotationHistory {

	/**
	 * Initializes internal state of ClientQuotationHistory object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}
	
	/**
	 * Devuelve el nombre del status actual de la cotizacion para un administrador
	 * @return string
	 */
	public function getStatusNameAdmin() {
		
		$clientQuotation = $this->getClientQuotation();
		$statusNames = $clientQuotation->getStatusNamesAdmin();
		return $statusNames[$this->getStatus()];
	}

	/**
	 * Devuelve el nombre del status actual de la cotizacion para un cliente
	 * @return string
	 */
	public function getStatusNameClient() {
		$clientQuotation = $this->getClientQuotation();
		$statusNames = $clientQuotation->getStatusNamesClient();
		return $statusNames[$this->getStatus()];
	}	

} // ClientQuotationHistory
