<?php

require 'actionLogs/classes/om/BaseActionLog.php';

/**
 * Skeleton subclass for representing a row from the 'actionLogs_log' table.
 *
 * logs del sistema
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    actionLogs.classes
 */
class ActionLog extends BaseActionLog {

	/**
	 * Initializes internal state of ActionLog object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}

} // ActionLog
