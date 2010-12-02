<?php



/**
 * This class defines the structure of the 'import_supplierQuoteItem' table.
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
class SupplierQuoteItemTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.SupplierQuoteItemTableMap';

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
		$this->setName('import_supplierQuoteItem');
		$this->setPhpName('SupplierQuoteItem');
		$this->setClassname('SupplierQuoteItem');
		$this->setPackage('import.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('SUPPLIERQUOTEID', 'Supplierquoteid', 'INTEGER', 'import_supplierQuote', 'ID', true, null, null);
		$this->addForeignKey('PRODUCTID', 'Productid', 'INTEGER', 'import_product', 'ID', true, null, null);
		$this->addForeignKey('REPLACEDPRODUCTID', 'Replacedproductid', 'INTEGER', 'import_product', 'ID', false, null, null);
		$this->addForeignKey('CLIENTQUOTEITEMID', 'Clientquoteitemid', 'INTEGER', 'import_clientQuoteItem', 'ID', true, null, null);
		$this->addColumn('STATUS', 'Status', 'INTEGER', true, null, null);
		$this->addColumn('QUANTITY', 'Quantity', 'INTEGER', true, null, null);
		$this->addForeignKey('PORTID', 'Portid', 'INTEGER', 'import_port', 'ID', true, null, null);
		$this->addForeignKey('INCOTERMID', 'Incotermid', 'INTEGER', 'import_incoterm', 'ID', true, null, null);
		$this->addColumn('PRICE', 'Price', 'FLOAT', false, null, null);
		$this->addColumn('SUPPLIERCOMMENTS', 'Suppliercomments', 'VARCHAR', false, 255, null);
		$this->addColumn('DELIVERY', 'Delivery', 'INTEGER', false, null, null);
		$this->addColumn('PACKAGE', 'Package', 'INTEGER', false, null, null);
		$this->addColumn('UNITLENGTH', 'Unitlength', 'FLOAT', false, null, null);
		$this->addColumn('UNITWIDTH', 'Unitwidth', 'FLOAT', false, null, null);
		$this->addColumn('UNITHEIGHT', 'Unitheight', 'FLOAT', false, null, null);
		$this->addColumn('UNITGROSSWEIGTH', 'Unitgrossweigth', 'FLOAT', false, null, null);
		$this->addColumn('UNITSPERCARTON', 'Unitspercarton', 'INTEGER', false, null, null);
		$this->addColumn('CARTONS', 'Cartons', 'INTEGER', false, null, null);
		$this->addColumn('CARTONLENGTH', 'Cartonlength', 'FLOAT', false, null, null);
		$this->addColumn('CARTONWIDTH', 'Cartonwidth', 'FLOAT', false, null, null);
		$this->addColumn('CARTONHEIGHT', 'Cartonheight', 'FLOAT', false, null, null);
		$this->addColumn('CARTONGROSSWEIGTH', 'Cartongrossweigth', 'FLOAT', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('SupplierQuote', 'SupplierQuote', RelationMap::MANY_TO_ONE, array('supplierQuoteId' => 'id', ), null, null);
    $this->addRelation('ClientQuoteItem', 'ClientQuoteItem', RelationMap::MANY_TO_ONE, array('clientQuoteItemId' => 'id', ), null, null);
    $this->addRelation('ProductRelatedByProductid', 'Product', RelationMap::MANY_TO_ONE, array('productId' => 'id', ), null, null);
    $this->addRelation('ProductRelatedByReplacedproductid', 'Product', RelationMap::MANY_TO_ONE, array('replacedProductId' => 'id', ), null, null);
    $this->addRelation('Incoterm', 'Incoterm', RelationMap::MANY_TO_ONE, array('incotermId' => 'id', ), null, null);
    $this->addRelation('Port', 'Port', RelationMap::MANY_TO_ONE, array('portId' => 'id', ), null, null);
    $this->addRelation('SupplierQuoteItemComment', 'SupplierQuoteItemComment', RelationMap::ONE_TO_MANY, array('id' => 'supplierQuoteItemId', ), null, null);
	} // buildRelations()

} // SupplierQuoteItemTableMap
