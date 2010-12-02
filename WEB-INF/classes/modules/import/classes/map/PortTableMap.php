<?php



/**
 * This class defines the structure of the 'import_port' table.
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
class PortTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.PortTableMap';

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
		$this->setName('import_port');
		$this->setPhpName('Port');
		$this->setClassname('Port');
		$this->setPackage('import.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('CODE', 'Code', 'VARCHAR', false, 255, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 255, null);
		$this->addColumn('ACTIVE', 'Active', 'BOOLEAN', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Supplier', 'Supplier', RelationMap::ONE_TO_MANY, array('id' => 'defaultPortId', ), null, null);
    $this->addRelation('SupplierQuoteItem', 'SupplierQuoteItem', RelationMap::ONE_TO_MANY, array('id' => 'portId', ), null, null);
    $this->addRelation('SupplierPurchaseOrderItem', 'SupplierPurchaseOrderItem', RelationMap::ONE_TO_MANY, array('id' => 'portId', ), null, null);
	} // buildRelations()

} // PortTableMap
