<?php



/**
 * This class defines the structure of the 'catalog_affiliateProductCode' table.
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
class AffiliateProductCodeTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'catalog.classes.map.AffiliateProductCodeTableMap';

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
		$this->setName('catalog_affiliateProductCode');
		$this->setPhpName('AffiliateProductCode');
		$this->setClassname('AffiliateProductCode');
		$this->setPackage('catalog.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('AFFILIATEID', 'Affiliateid', 'INTEGER', 'affiliates_affiliate', 'ID', true, null, null);
		$this->addColumn('PRODUCTCODE', 'Productcode', 'VARCHAR', false, 255, null);
		$this->addColumn('PRODUCTCODEAFFILIATE', 'Productcodeaffiliate', 'VARCHAR', false, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Affiliate', 'Affiliate', RelationMap::MANY_TO_ONE, array('affiliateId' => 'id', ), null, null);
	} // buildRelations()

} // AffiliateProductCodeTableMap
