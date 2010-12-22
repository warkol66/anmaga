<?php



/**
 * This class defines the structure of the 'orders_orderTemplateItem' table.
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
class OrderTemplateItemTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'orders.classes.map.OrderTemplateItemTableMap';

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
		$this->setName('orders_orderTemplateItem');
		$this->setPhpName('OrderTemplateItem');
		$this->setClassname('OrderTemplateItem');
		$this->setPackage('orders.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('ORDERTEMPLATEID', 'Ordertemplateid', 'INTEGER', 'orders_orderTemplate', 'ID', true, null, null);
		$this->addForeignKey('PRODUCTID', 'Productid', 'INTEGER', 'product', 'ID', true, null, null);
		$this->addColumn('PRICE', 'Price', 'FLOAT', false, null, null);
		$this->addColumn('QUANTITY', 'Quantity', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('OrderTemplate', 'OrderTemplate', RelationMap::MANY_TO_ONE, array('orderTemplateId' => 'id', ), 'CASCADE', null);
    $this->addRelation('Product', 'Product', RelationMap::MANY_TO_ONE, array('productId' => 'id', ), null, null);
	} // buildRelations()

} // OrderTemplateItemTableMap
