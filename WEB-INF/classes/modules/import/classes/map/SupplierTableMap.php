<?php



/**
 * This class defines the structure of the 'import_supplier' table.
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
class SupplierTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.SupplierTableMap';

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
		$this->setName('import_supplier');
		$this->setPhpName('Supplier');
		$this->setClassname('Supplier');
		$this->setPackage('import.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('ADDRESS', 'Address', 'VARCHAR', false, 255, null);
		$this->addColumn('PHONENUMBER', 'Phonenumber', 'VARCHAR', false, 25, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 255, null);
		$this->addColumn('CONTACTNAME', 'Contactname', 'VARCHAR', false, 255, null);
		$this->addColumn('ACTIVE', 'Active', 'BOOLEAN', true, null, null);
		$this->addForeignKey('DEFAULTINCOTERMID', 'Defaultincotermid', 'INTEGER', 'import_incoterm', 'ID', false, null, null);
		$this->addForeignKey('DEFAULTPORTID', 'Defaultportid', 'INTEGER', 'import_port', 'ID', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Incoterm', 'Incoterm', RelationMap::MANY_TO_ONE, array('defaultIncotermId' => 'id', ), null, null);
    $this->addRelation('Port', 'Port', RelationMap::MANY_TO_ONE, array('defaultPortId' => 'id', ), null, null);
    $this->addRelation('ProductSupplier', 'ProductSupplier', RelationMap::ONE_TO_MANY, array('id' => 'supplierId', ), null, null);
    $this->addRelation('SupplierQuote', 'SupplierQuote', RelationMap::ONE_TO_MANY, array('id' => 'supplierId', ), null, null);
    $this->addRelation('SupplierQuoteItemComment', 'SupplierQuoteItemComment', RelationMap::ONE_TO_MANY, array('id' => 'supplierId', ), null, null);
    $this->addRelation('SupplierPurchaseOrder', 'SupplierPurchaseOrder', RelationMap::ONE_TO_MANY, array('id' => 'supplierId', ), null, null);
	} // buildRelations()

} // SupplierTableMap
