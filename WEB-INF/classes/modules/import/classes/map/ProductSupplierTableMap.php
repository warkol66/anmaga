<?php



/**
 * This class defines the structure of the 'import_productSupplier' table.
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
class ProductSupplierTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.ProductSupplierTableMap';

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
		$this->setName('import_productSupplier');
		$this->setPhpName('ProductSupplier');
		$this->setClassname('ProductSupplier');
		$this->setPackage('import.classes');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('PRODUCTID', 'Productid', 'INTEGER' , 'import_product', 'ID', true, null, null);
		$this->addForeignKey('SUPPLIERID', 'Supplierid', 'VARCHAR', 'import_supplier', 'ID', false, 255, null);
		$this->addColumn('CODE', 'Code', 'VARCHAR', false, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Product', 'Product', RelationMap::MANY_TO_ONE, array('productId' => 'id', ), null, null);
    $this->addRelation('Supplier', 'Supplier', RelationMap::MANY_TO_ONE, array('supplierId' => 'id', ), null, null);
	} // buildRelations()

} // ProductSupplierTableMap
