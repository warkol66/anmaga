<?php



/**
 * Skeleton subclass for representing a row from the 'import_shipmentRelease' table.
 *
 * Datos de nacionalizacion
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.import.classes
 */
class ShipmentRelease extends BaseShipmentRelease {
	const STATUS_PENDING = 1;
	const STATUS_COMPLETE = 2;
	
	//nombre de los estados para los clientes
	private $statusNames = array(
		ShipmentRelease::STATUS_PENDING => 'Pending',
		ShipmentRelease::STATUS_COMPLETE => 'Complete',
	);
	
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
	
	public function getStatusName() {
		//TODO implementar esto
	}
} // ShipmentRelease
