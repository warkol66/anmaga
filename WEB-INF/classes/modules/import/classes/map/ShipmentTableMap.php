<?php



/**
 * This class defines the structure of the 'import_shipment' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.import.classes.map
 */
class ShipmentTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.ShipmentTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('import_shipment');
		$this->setPhpName('Shipment');
		$this->setClassname('Shipment');
		$this->setPackage('import.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('CREATEDAT', 'Createdat', 'TIMESTAMP', true, null, null);
		$this->addForeignKey('SUPPLIERPURCHASEORDERID', 'Supplierpurchaseorderid', 'INTEGER', 'import_supplierPurchaseOrder', 'ID', true, null, null);
		$this->addColumn('CONTAINERSREALCOUNT', 'Containersrealcount', 'INTEGER', false, null, null);
		$this->addColumn('CONTAINERSNUMBERS', 'Containersnumbers', 'LONGVARCHAR', false, null, null);
		$this->addColumn('PICKUPDATE', 'Pickupdate', 'DATE', false, null, null);
		$this->addColumn('SHIPMENTDATE', 'Shipmentdate', 'DATE', false, null, null);
		$this->addColumn('BLNUMBER', 'Blnumber', 'INTEGER', false, null, null);
		$this->addColumn('VESSELNAME', 'Vesselname', 'VARCHAR', false, 255, null);
		$this->addColumn('ESTIMATEDDEPARTUREDATE', 'Estimateddeparturedate', 'DATE', false, null, null);
		$this->addColumn('DEPARTUREDATE', 'Departuredate', 'DATE', false, null, null);
		$this->addColumn('ARRIVALPORTNAME', 'Arrivalportname', 'VARCHAR', false, 255, null);
		$this->addColumn('ARRIVALTOPANAMADATE', 'Arrivaltopanamadate', 'DATE', false, null, null);
		$this->addColumn('TRANSSHIPMENTDATE', 'Transshipmentdate', 'DATE', false, null, null);
		$this->addColumn('TELEXRELEASE', 'Telexrelease', 'TINYINT', false, null, null);
		$this->addColumn('ESTIMATEDARRIVALDATE', 'Estimatedarrivaldate', 'DATE', false, null, null);
		$this->addColumn('ARRIVALDATE', 'Arrivaldate', 'DATE', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('SupplierPurchaseOrder', 'SupplierPurchaseOrder', RelationMap::MANY_TO_ONE, array('supplierPurchaseOrderId' => 'id', ), null, null);
    $this->addRelation('ShipmentRelease', 'ShipmentRelease', RelationMap::ONE_TO_MANY, array('id' => 'shipmentId', ), null, null);
	} // buildRelations()

} // ShipmentTableMap
