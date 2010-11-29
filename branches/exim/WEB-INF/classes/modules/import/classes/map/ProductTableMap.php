<?php



/**
 * This class defines the structure of the 'import_product' table.
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
class ProductTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.ProductTableMap';

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
		$this->setName('import_product');
		$this->setPhpName('Product');
		$this->setClassname('Product');
		$this->setPackage('import.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('CODE', 'Code', 'VARCHAR', false, 255, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 255, null);
		$this->addColumn('NAMESPANISH', 'Namespanish', 'VARCHAR', false, 255, null);
		$this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
		$this->addColumn('DESCRIPTIONSPANISH', 'Descriptionspanish', 'LONGVARCHAR', false, null, null);
		$this->addColumn('NAMECHINESE', 'Namechinese', 'VARCHAR', false, 255, null);
		$this->addColumn('DESCRIPTIONCHINESE', 'Descriptionchinese', 'LONGVARCHAR', false, null, null);
		$this->addColumn('STATUS', 'Status', 'INTEGER', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ProductSupplier', 'ProductSupplier', RelationMap::ONE_TO_ONE, array('id' => 'productId', ), null, null);
    $this->addRelation('ClientQuoteItem', 'ClientQuoteItem', RelationMap::ONE_TO_MANY, array('id' => 'productId', ), null, null);
    $this->addRelation('SupplierQuoteItemRelatedByProductid', 'SupplierQuoteItem', RelationMap::ONE_TO_MANY, array('id' => 'productId', ), null, null);
    $this->addRelation('SupplierQuoteItemRelatedByReplacedproductid', 'SupplierQuoteItem', RelationMap::ONE_TO_MANY, array('id' => 'replacedProductId', ), null, null);
    $this->addRelation('ClientPurchaseOrderItem', 'ClientPurchaseOrderItem', RelationMap::ONE_TO_MANY, array('id' => 'productId', ), null, null);
    $this->addRelation('SupplierPurchaseOrderItem', 'SupplierPurchaseOrderItem', RelationMap::ONE_TO_MANY, array('id' => 'productId', ), null, null);
	} // buildRelations()

} // ProductTableMap
