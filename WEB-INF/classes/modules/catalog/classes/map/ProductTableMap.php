<?php



/**
 * This class defines the structure of the 'product' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.catalog.classes.map
 */
class ProductTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'catalog.classes.map.ProductTableMap';

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
		$this->setName('product');
		$this->setPhpName('Product');
		$this->setClassname('Product');
		$this->setPackage('catalog.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('CODE', 'Code', 'VARCHAR', false, 255, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('DESCRIPTION', 'Description', 'VARCHAR', false, 255, null);
		$this->addColumn('PRICE', 'Price', 'FLOAT', false, null, null);
		$this->addForeignKey('UNITID', 'Unitid', 'INTEGER', 'unit', 'ID', false, null, null);
		$this->addForeignKey('MEASUREUNITID', 'Measureunitid', 'INTEGER', 'measureUnit', 'ID', false, null, null);
		$this->addColumn('ACTIVE', 'Active', 'BOOLEAN', true, null, true);
		$this->addColumn('ORDERCODE', 'Ordercode', 'VARCHAR', false, 255, null);
		$this->addColumn('SALESUNIT', 'Salesunit', 'INTEGER', false, null, 1);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Unit', 'Unit', RelationMap::MANY_TO_ONE, array('unitId' => 'id', ), null, null);
    $this->addRelation('MeasureUnit', 'MeasureUnit', RelationMap::MANY_TO_ONE, array('measureUnitId' => 'id', ), null, null);
    $this->addRelation('AffiliateProduct', 'AffiliateProduct', RelationMap::ONE_TO_MANY, array('id' => 'productId', ), null, null);
    $this->addRelation('ProductCategory', 'ProductCategory', RelationMap::ONE_TO_MANY, array('code' => 'productCode', ), 'CASCADE', null);
    $this->addRelation('OrderItem', 'OrderItem', RelationMap::ONE_TO_MANY, array('code' => 'productCode', ), null, null);
    $this->addRelation('OrderTemplateItem', 'OrderTemplateItem', RelationMap::ONE_TO_MANY, array('code' => 'productCode', ), null, null);
    $this->addRelation('Affiliate', 'Affiliate', RelationMap::MANY_TO_MANY, array(), null, null);
    $this->addRelation('Category', 'Category', RelationMap::MANY_TO_MANY, array(), null, null);
	} // buildRelations()

} // ProductTableMap
