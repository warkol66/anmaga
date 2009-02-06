<?php

require 'mluse/classes/om/BaseMLUseTextPeer.php';


/**
 * Skeleton subclass for performing query and update operations on the 'MLUSE_Text' table.
 *
 * @package    mluse
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

} // MLUseTextPeer
