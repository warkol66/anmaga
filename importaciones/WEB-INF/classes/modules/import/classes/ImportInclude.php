<?php

require_once('import/classes/ClientQuotation.php');

/**
 *
 *
 * @package    import
 */
class ImportInclude extends ClientQuotation {

	function getClientQuoteList($options) {

		require_once("ClientQuotationPeer.php");

		$result = ClientQuotationPeer::getAll();

		return $result;

	}


} // ClientQuotationInclude
