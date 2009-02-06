<?php

require 'mluse/classes/om/BaseMLUseLanguage.php';


/**
 * Skeleton subclass for representing a row from the 'MLUSE_Language' table.
 *
 * @package    mluse
 */
class MLUseLanguage extends BaseMLUseLanguage {

	/**
	 * Initializes internal state of MLUseLanguage object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}

} // MLUseLanguage
