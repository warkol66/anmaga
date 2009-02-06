<?php

require 'users/classes/om/BaseUserInfo.php';


/**
 * Skeleton subclass for representing a row from the 'users_userInfo' table.
 *
 * Information about users
 *
 * @package    users
 */
class UserInfo extends BaseUserInfo {

	/**
	 * Initializes internal state of UserInfo object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}

} // UserInfo
