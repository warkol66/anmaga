<?php



/**
 * This class defines the structure of the 'import_shipmentRelease' table.
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
class ShipmentReleaseTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.ShipmentReleaseTableMap';

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
		$this->setName('import_shipmentRelease');
		$this->setPhpName('ShipmentRelease');
		$this->setClassname('ShipmentRelease');
		$this->setPackage('import.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('CREATEDAT', 'Createdat', 'TIMESTAMP', true, null, null);
		$this->addForeignKey('SHIPMENTID', 'Shipmentid', 'INTEGER', 'import_shipment', 'ID', true, null, null);
		$this->addColumn('STATUS', 'Status', 'INTEGER', true, null, null);
		$this->addColumn('DOCUMENTSPRESENTATIONDATE', 'Documentspresentationdate', 'DATE', false, null, null);
		$this->addColumn('BANKTARIFFSPAYMENTDATE', 'Banktariffspaymentdate', 'DATE', false, null, null);
		$this->addColumn('PHYSICALRECOGNITIONDATE', 'Physicalrecognitiondate', 'DATE', false, null, null);
		$this->addColumn('DOCUMENTSVALIDATIONDATE', 'Documentsvalidationdate', 'DATE', false, null, null);
		$this->addColumn('EXPENSESPAYMENTDATE', 'Expensespaymentdate', 'DATE', false, null, null);
		$this->addColumn('LOADINGORDERDATE', 'Loadingorderdate', 'DATE', false, null, null);
		$this->addColumn('CONTAINERSLOADINGDATE', 'Containersloadingdate', 'TINYINT', false, null, null);
		$this->addColumn('ESTIMATEDMOVEMENTTOSTOREHOUSEDATE', 'Estimatedmovementtostorehousedate', 'DATE', false, null, null);
		$this->addColumn('ARRIVALTOSTOREHOUSETIMESTAMP', 'Arrivaltostorehousetimestamp', 'TIMESTAMP', false, null, null);
		$this->addColumn('CONTAINTERRECEIPTONSTOREHOUSEDATE', 'Containterreceiptonstorehousedate', 'DATE', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Shipment', 'Shipment', RelationMap::MANY_TO_ONE, array('shipmentId' => 'id', ), 'CASCADE', null);
	} // buildRelations()

} // ShipmentReleaseTableMap
