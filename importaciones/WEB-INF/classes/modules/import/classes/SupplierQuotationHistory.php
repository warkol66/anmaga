<?php

require 'import/classes/om/BaseSupplierQuotationHistory.php';


/**
 * Skeleton subclass for representing a row from the 'import_supplierQuotationHistory' table.
 *
 * Historial de Cotizacion a Proveedor
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    import.classes
 */
class SupplierQuotationHistory extends BaseSupplierQuotationHistory {

	/**
	 * Initializes internal state of SupplierQuotationHistory object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}

} // SupplierQuotationHistory
