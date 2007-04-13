<?php
/**
* The module paths
*
* $author modules Empresarios / Egytca
* @package phpMVCconfig
* @public
*/

class ModulePaths {

	/**
	* Return an array of global paths
	* 
	* @public
	* @returns array	
	*/
	function getModulePaths() {

		// Setup the main module include() directories here
		// Note: could be placed in an xml config file later !!
		$appDirs		= array();
		$appDirs[]	= ''; // starting with the sub-application home directory
		$appDirs[]	= 'WEB-INF';
		$appDirs[]	= 'WEB-INF/classes';
		$appDirs[]	= 'WEB-INF/configRules';
		$appDirs[]	= 'WEB-INF/tpl';
		$appDirs[]	= 'WEB-INF/scripts';
		$appDirs[]	= 'WEB-INF/classes/includes';

		// Users module
		$appDirs[]	= 'WEB-INF/classes/modules/users';
		$appDirs[]	= 'WEB-INF/classes/modules/users/actions';
		$appDirs[]	= 'WEB-INF/classes/modules/users/forms';
		$appDirs[]	= 'WEB-INF/classes/modules/users/classes';

		// Htmls module
		$appDirs[]	= 'WEB-INF/classes/modules/htmls';
		$appDirs[]	= 'WEB-INF/classes/modules/htmls/actions';
		$appDirs[]	= 'WEB-INF/classes/modules/htmls/forms';
		$appDirs[]	= 'WEB-INF/classes/modules/htmls/classes';
		
		// Config module
		$appDirs[]	= 'WEB-INF/classes/modules/config';
		$appDirs[]	= 'WEB-INF/classes/modules/config/actions';
		$appDirs[]	= 'WEB-INF/classes/modules/config/forms';
		$appDirs[]	= 'WEB-INF/classes/modules/config/classes';

		// Security module
		$appDirs[]	= 'WEB-INF/classes/modules/security';
		$appDirs[]	= 'WEB-INF/classes/modules/security/actions';
		$appDirs[]	= 'WEB-INF/classes/modules/security/forms';
		$appDirs[]	= 'WEB-INF/classes/modules/security/classes';

		// Affiliates module
		$appDirs[]	= 'WEB-INF/classes/modules/affiliates';
		$appDirs[]	= 'WEB-INF/classes/modules/affiliates/actions';
		$appDirs[]	= 'WEB-INF/classes/modules/affiliates/forms';
		$appDirs[]	= 'WEB-INF/classes/modules/affiliates/classes';

		// Users By Affiliate module
		$appDirs[]	= 'WEB-INF/classes/modules/usersByAffiliate';
		$appDirs[]	= 'WEB-INF/classes/modules/usersByAffiliate/actions';
		$appDirs[]	= 'WEB-INF/classes/modules/usersByAffiliate/forms';
		$appDirs[]	= 'WEB-INF/classes/modules/usersByAffiliate/classes';
		
		// Categories module
		$appDirs[]	= 'WEB-INF/classes/modules/categories';
		$appDirs[]	= 'WEB-INF/classes/modules/categories/actions';
		$appDirs[]	= 'WEB-INF/classes/modules/categories/forms';
		$appDirs[]	= 'WEB-INF/classes/modules/categories/classes';

		// Catalog module
		$appDirs[]	= 'WEB-INF/classes/modules/catalog';
		$appDirs[]	= 'WEB-INF/classes/modules/catalog/actions';
		$appDirs[]	= 'WEB-INF/classes/modules/catalog/forms';
		$appDirs[]	= 'WEB-INF/classes/modules/catalog/classes';

		return $appDirs;

	}

}
?>
