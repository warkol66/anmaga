<?php



/**
 * This class defines the structure of the 'import_supplierPurchaseOrderItem' table.
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
class SupplierPurchaseOrderItemTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.SupplierPurchaseOrderItemTableMap';

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
		$this->setName('import_supplierPurchaseOrderItem');
		$this->setPhpName('SupplierPurchaseOrderItem');
		$this->setClassname('SupplierPurchaseOrderItem');
		$this->setPackage('import.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('PRODUCTID', 'Productid', 'INTEGER', 'import_product', 'ID', true, null, null);
		$this->addForeignKey('SUPPLIERPURCHASEORDERID', 'Supplierpurchaseorderid', 'INTEGER', 'import_supplierPurchaseOrder', 'ID', true, null, null);
		$this->addColumn('QUANTITY', 'Quantity', 'INTEGER', true, null, null);
		$this->addForeignKey('PORTID', 'Portid', 'INTEGER', 'import_port', 'ID', true, null, null);
		$this->addForeignKey('INCOTERMID', 'Incotermid', 'INTEGER', 'import_incoterm', 'ID', true, null, null);
		$this->addColumn('PRICE', 'Price', 'FLOAT', true, null, null);
		$this->addColumn('DELIVERY', 'Delivery', 'INTEGER', true, null, null);
		$this->addColumn('PACKAGE', 'Package', 'INTEGER', true, null, null);
		$this->addColumn('UNITLENGTH', 'Unitlength', 'FLOAT', false, null, null);
		$this->addColumn('UNITWIDTH', 'Unitwidth', 'FLOAT', false, null, null);
		$this->addColumn('UNITHEIGHT', 'Unitheight', 'FLOAT', false, null, null);
		$this->addColumn('UNITGROSSWEIGTH', 'Unitgrossweigth', 'FLOAT', false, null, null);
		$this->addColumn('UNITSPERCARTON', 'Unitspercarton', 'INTEGER', false, null, null);
		$this->addColumn('CARTONS', 'Cartons', 'INTEGER', false, null, null);
		$this->addColumn('CARTONLENGTH', 'Cartonlength', 'FLOAT', false, null, null);
		$this->addColumn('CARTONWIDTH', 'Cartonwidth', 'FLOAT', false, null, null);
		$this->addColumn('CARTONHEIGHT', 'Cartonheight', 'FLOAT', false, null, null);
		$this->addColumn('CARTONGROSSWEIGTH', 'Cartongrossweigth', 'FLOAT', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Product', 'Product', RelationMap::MANY_TO_ONE, array('productId' => 'id', ), null, null);
    $this->addRelation('SupplierPurchaseOrder', 'SupplierPurchaseOrder', RelationMap::MANY_TO_ONE, array('supplierPurchaseOrderId' => 'id', ), null, null);
    $this->addRelation('Incoterm', 'Incoterm', RelationMap::MANY_TO_ONE, array('incotermId' => 'id', ), null, null);
    $this->addRelation('Port', 'Port', RelationMap::MANY_TO_ONE, array('portId' => 'id', ), null, null);
	} // buildRelations()

} // SupplierPurchaseOrderItemTableMap
