<?php



/**
 * This class defines the structure of the 'catalog_affiliateProduct' table.
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
class AffiliateProductTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'catalog.classes.map.AffiliateProductTableMap';

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
		$this->setName('catalog_affiliateProduct');
		$this->setPhpName('AffiliateProduct');
		$this->setClassname('AffiliateProduct');
		$this->setPackage('catalog.classes');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('PRODUCTID', 'Productid', 'INTEGER' , 'catalog_product', 'ID', true, null, null);
		$this->addForeignPrimaryKey('AFFILIATEID', 'Affiliateid', 'INTEGER' , 'affiliates_affiliate', 'ID', true, null, null);
		$this->addColumn('PRICE', 'Price', 'FLOAT', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Product', 'Product', RelationMap::MANY_TO_ONE, array('productId' => 'id', ), null, null);
    $this->addRelation('Affiliate', 'Affiliate', RelationMap::MANY_TO_ONE, array('affiliateId' => 'id', ), null, null);
	} // buildRelations()

} // AffiliateProductTableMap
