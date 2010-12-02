<?php



/**
 * This class defines the structure of the 'import_clientPurchaseOrderItem' table.
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
class ClientPurchaseOrderItemTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.ClientPurchaseOrderItemTableMap';

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
		$this->setName('import_clientPurchaseOrderItem');
		$this->setPhpName('ClientPurchaseOrderItem');
		$this->setClassname('ClientPurchaseOrderItem');
		$this->setPackage('import.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('PRODUCTID', 'Productid', 'INTEGER', 'import_product', 'ID', true, null, null);
		$this->addForeignKey('CLIENTPURCHASEORDERID', 'Clientpurchaseorderid', 'INTEGER', 'import_clientPurchaseOrder', 'ID', true, null, null);
		$this->addColumn('QUANTITY', 'Quantity', 'INTEGER', true, null, null);
		$this->addColumn('PRICE', 'Price', 'FLOAT', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Product', 'Product', RelationMap::MANY_TO_ONE, array('productId' => 'id', ), null, null);
    $this->addRelation('ClientPurchaseOrder', 'ClientPurchaseOrder', RelationMap::MANY_TO_ONE, array('clientPurchaseOrderId' => 'id', ), null, null);
	} // buildRelations()

} // ClientPurchaseOrderItemTableMap
