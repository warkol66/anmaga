<?php

require 'mluse/classes/om/BaseMLUseText.php';


/**
 * Skeleton subclass for representing a row from the 'MLUSE_Text' table.
 *
 * @package    mluse
 */
class MLUseText extends BaseMLUseText {

	/**
	 * Initializes internal state of MLUseText object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}

} // MLUseText
