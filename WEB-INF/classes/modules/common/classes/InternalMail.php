<?php



/**
 * Skeleton subclass for representing a row from the 'common_internalMail' table.
 *
 * Mensajes internos
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.common.classes
 */
class InternalMail extends BaseInternalMail {
	public function save(PropelPDO $con = null) {
		try {
			if ($this->validate()) { 
				parent::save($con);
				return true;
			} else {
				return false;
			}
		}
		catch (PropelException $exp) {
			if (ConfigModule::get("global","showPropelExceptions"))
				print_r($exp->getMessage());
			return false;
		}
	}
	
	/**
	 * Obtenemos un array asociativo con los datos de los destinatarios del mensaje (deserializamos).
	 *
	 * @return     resource
	 */
	public function getTo()
	{
		$array = parent::getTo();
		return unserialize($array);
	}
	
	/**
	 * Redefinimos este metodo para que serialize los datos
	 * 
	 * @param      resource $array array asociativo con los destinatarios. ej: array('type'=>'user', 'id'=>1)
	 * @return     InternalMail The current object (for fluent API support)
	 */
	public function setTo($array) {
		$array = serialize($array);
		return parent::setTo($array);
	}
	
	/**
	 * Obtiene el usuario remitente.
	 */
	public function getFrom() {
		$queryObjs = array(
			'user' => 'UserQuery',
			'affiliate' => 'AffiliateUserQuery'
		);
		
		$criteria = new $queryObjs[$this->getFromType()];
		return $criteria->findPk($this->getFromId());
	}
	
	public function hasBeenRead() {
		$readOn = $this->getReadOn();
		return !empty($readOn);
	}
} // InternalMail
