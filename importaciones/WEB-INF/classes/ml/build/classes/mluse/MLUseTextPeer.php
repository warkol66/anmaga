<?php
// The parent class
require_once 'mluse/om/BaseMLUseTextPeer.php';

// The object class
include_once 'mluse/MLUseText.php';

require_once 'mluse/MLUseLanguagePeer.php';

/** 
 * The skeleton for this class was autogenerated by Propel on:
 *
 * [09/27/06 00:15:53]
 *
 *  You should add additional methods to this class to meet the
 *  application requirements.  This class will only be generated as
 *  long as it does not already exist in the output directory.
 *
 * @package mluse 
 */
class MLUseTextPeer extends BaseMLUseTextPeer {

	function getByLanguage($language) {
		$cond = new Criteria();
		$cond->add(MLUseLanguagePeer::CODE, $language);
		$languages = MLUseLanguagePeer::doSelect($cond);
		$languageObj = $languages[0];
		$texts = array();
		if (!empty($languageObj)) {
			$cond = new Criteria();
			$cond->add(MLUseTextPeer::LANGUAGEID, $languageObj->getId());
			$texts = MLUseTextPeer::doSelect($cond);
		}
		return $texts;
	}

}
