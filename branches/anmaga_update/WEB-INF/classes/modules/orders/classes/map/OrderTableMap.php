<?php



/**
 * This class defines the structure of the 'orders_order' table.
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
class OrderTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'orders.classes.map.OrderTableMap';

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
		$this->setName('orders_order');
		$this->setPhpName('Order');
		$this->setClassname('Order');
		$this->setPackage('orders.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NUMBER', 'Number', 'INTEGER', false, null, null);
		$this->addColumn('CREATED', 'Created', 'TIMESTAMP', true, null, null);
		$this->addForeignKey('USERID', 'Userid', 'INTEGER', 'affiliates_user', 'ID', true, null, null);
		$this->addForeignKey('AFFILIATEID', 'Affiliateid', 'INTEGER', 'affiliates_affiliate', 'ID', true, null, null);
		$this->addForeignKey('BRANCHID', 'Branchid', 'INTEGER', 'branch', 'ID', false, null, null);
		$this->addColumn('TOTAL', 'Total', 'FLOAT', false, null, null);
		$this->addColumn('STATE', 'State', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('AffiliateUser', 'AffiliateUser', RelationMap::MANY_TO_ONE, array('userId' => 'id', ), null, null);
    $this->addRelation('Affiliate', 'Affiliate', RelationMap::MANY_TO_ONE, array('affiliateId' => 'id', ), null, null);
    $this->addRelation('Branch', 'Branch', RelationMap::MANY_TO_ONE, array('branchId' => 'id', ), null, null);
    $this->addRelation('OrderItem', 'OrderItem', RelationMap::ONE_TO_MANY, array('id' => 'orderId', ), 'CASCADE', null);
    $this->addRelation('OrderStateChange', 'OrderStateChange', RelationMap::ONE_TO_MANY, array('id' => 'orderId', ), 'CASCADE', null);
	} // buildRelations()

} // OrderTableMap
