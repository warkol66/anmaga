<?php



/**
 * This class defines the structure of the 'import_supplierQuote' table.
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
class SupplierQuoteTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.SupplierQuoteTableMap';

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
		$this->setName('import_supplierQuote');
		$this->setPhpName('SupplierQuote');
		$this->setClassname('SupplierQuote');
		$this->setPackage('import.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('CREATEDAT', 'Createdat', 'TIMESTAMP', true, null, null);
		$this->addForeignKey('SUPPLIERID', 'Supplierid', 'INTEGER', 'import_supplier', 'ID', true, null, null);
		$this->addColumn('STATUS', 'Status', 'INTEGER', true, null, null);
		$this->addColumn('TIMESTAMPSTATUS', 'Timestampstatus', 'TIMESTAMP', false, null, null);
		$this->addForeignKey('CLIENTQUOTEID', 'Clientquoteid', 'INTEGER', 'import_clientQuote', 'ID', false, null, null);
		$this->addColumn('SUPPLIERACCESSTOKEN', 'Supplieraccesstoken', 'VARCHAR', true, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ClientQuote', 'ClientQuote', RelationMap::MANY_TO_ONE, array('clientQuoteId' => 'id', ), null, null);
    $this->addRelation('Supplier', 'Supplier', RelationMap::MANY_TO_ONE, array('supplierId' => 'id', ), null, null);
    $this->addRelation('SupplierQuoteHistory', 'SupplierQuoteHistory', RelationMap::ONE_TO_MANY, array('id' => 'supplierQuoteId', ), null, null);
    $this->addRelation('SupplierQuoteItem', 'SupplierQuoteItem', RelationMap::ONE_TO_MANY, array('id' => 'supplierQuoteId', ), null, null);
    $this->addRelation('SupplierPurchaseOrder', 'SupplierPurchaseOrder', RelationMap::ONE_TO_MANY, array('id' => 'supplierQuoteId', ), null, null);
	} // buildRelations()

} // SupplierQuoteTableMap
