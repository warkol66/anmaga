<?php

require 'import/classes/om/BaseClientPurchaseOrderHistory.php';


/**
 * Skeleton subclass for representing a row from the 'import_clientPurchaseOrderHistory' table.
 *
 * Historial de Estados por los que fue pasando la Orden de Pedido a Cliente
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    import.classes
 */
class ClientPurchaseOrderHistory extends BaseClientPurchaseOrderHistory {

	/**
	 * Initializes internal state of ClientPurchaseOrderHistory object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}

} // ClientPurchaseOrderHistory
