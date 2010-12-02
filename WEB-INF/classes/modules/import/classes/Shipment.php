<?php



/**
 * Skeleton subclass for representing a row from the 'import_shipment' table.
 *
 * Datos de envio
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.import.classes
 */
class Shipment extends BaseShipment {
	
	const STATUS_WAITING_FOR_TRANSPORT = 1;
	const STATUS_ON_ROUTE = 2;
	const STATUS_ARRIVED = 3;
	
	//nombre de los estados para los clientes
	private $statusNames = array(
		Shipment::STATUS_WAITING_FOR_TRANSPORT => 'Waiting for Transport',
		Shipment::STATUS_ON_ROUTE => 'On Route',
		Shipment::STATUS_ARRIVED => 'Arrived'
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

} // Shipment
