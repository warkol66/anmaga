<?php



/**
 * This class defines the structure of the 'orders_orderTemplate' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.orders.classes.map
 */
class OrderTemplateTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'orders.classes.map.OrderTemplateTableMap';

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
		$this->setName('orders_orderTemplate');
		$this->setPhpName('OrderTemplate');
		$this->setClassname('OrderTemplate');
		$this->setPackage('orders.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('CREATED', 'Created', 'TIMESTAMP', true, null, null);
		$this->addForeignKey('USERID', 'Userid', 'INTEGER', 'affiliates_user', 'ID', true, null, null);
		$this->addForeignKey('AFFILIATEID', 'Affiliateid', 'INTEGER', 'affiliates_affiliate', 'ID', true, null, null);
		$this->addForeignKey('BRANCHID', 'Branchid', 'INTEGER', 'affiliates_branch', 'ID', false, null, null);
		$this->addColumn('TOTAL', 'Total', 'FLOAT', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('AffiliateUser', 'AffiliateUser', RelationMap::MANY_TO_ONE, array('userId' => 'id', ), null, null);
    $this->addRelation('Affiliate', 'Affiliate', RelationMap::MANY_TO_ONE, array('affiliateId' => 'id', ), null, null);
    $this->addRelation('AffiliateBranch', 'AffiliateBranch', RelationMap::MANY_TO_ONE, array('branchId' => 'id', ), null, null);
    $this->addRelation('OrderTemplateItem', 'OrderTemplateItem', RelationMap::ONE_TO_MANY, array('id' => 'orderTemplateId', ), 'CASCADE', null);
	} // buildRelations()

} // OrderTemplateTableMap
