<?php



/**
 * This class defines the structure of the 'import_supplierPurchaseOrderHistory' table.
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
class SupplierPurchaseOrderHistoryTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.SupplierPurchaseOrderHistoryTableMap';

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
		$this->setName('import_supplierPurchaseOrderHistory');
		$this->setPhpName('SupplierPurchaseOrderHistory');
		$this->setClassname('SupplierPurchaseOrderHistory');
		$this->setPackage('import.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('SUPPLIERPURCHASEORDERID', 'Supplierpurchaseorderid', 'INTEGER', 'import_supplierPurchaseOrder', 'ID', true, null, null);
		$this->addColumn('STATUS', 'Status', 'INTEGER', true, null, null);
		$this->addColumn('COMMENTS', 'Comments', 'VARCHAR', false, 255, null);
		$this->addColumn('CREATEDAT', 'Createdat', 'TIMESTAMP', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('SupplierPurchaseOrder', 'SupplierPurchaseOrder', RelationMap::MANY_TO_ONE, array('supplierPurchaseOrderId' => 'id', ), null, null);
	} // buildRelations()

} // SupplierPurchaseOrderHistoryTableMap
