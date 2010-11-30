<?php

require_once 'import/classes/om/BaseIncoterm.php';


/**
 * Skeleton subclass for representing a row from the 'incoterm' table.
 *
 * Incoterm
 *
 * This class was autogenerated by Propel on:
 *
 * 12/05/07 16:36:03
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    anmaga
 */
class Incoterm extends BaseIncoterm {

	/**
	 * Redefinimos delete para evitar que se haga borrado real cuando 
	 * se elimina desde el objeto. sin usar la clase peer.
	 */
	function delete (PropelPDO $con = null) {
		$this->setactive('0');
		$this->save();
	}


} // Incoterm