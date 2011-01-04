<?php



/**
 * This class defines the structure of the 'catalog_productCategory' table.
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
class ProductCategoryTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'catalog.classes.map.ProductCategoryTableMap';

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
		$this->setName('catalog_productCategory');
		$this->setPhpName('ProductCategory');
		$this->setClassname('ProductCategory');
		$this->setPackage('catalog.classes');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('PRODUCTCODE', 'Productcode', 'VARCHAR' , 'product', 'CODE', true, 255, null);
		$this->addForeignPrimaryKey('CATEGORYID', 'Categoryid', 'INTEGER' , 'categories_category', 'ID', true, 5, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Category', 'Category', RelationMap::MANY_TO_ONE, array('categoryId' => 'id', ), 'CASCADE', null);
    $this->addRelation('Product', 'Product', RelationMap::MANY_TO_ONE, array('productCode' => 'code', ), 'CASCADE', null);
	} // buildRelations()

} // ProductCategoryTableMap
