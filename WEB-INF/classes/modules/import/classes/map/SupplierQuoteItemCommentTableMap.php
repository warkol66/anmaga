<?php



/**
 * This class defines the structure of the 'import_supplierQuoteItemComment' table.
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
class SupplierQuoteItemCommentTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.SupplierQuoteItemCommentTableMap';

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
		$this->setName('import_supplierQuoteItemComment');
		$this->setPhpName('SupplierQuoteItemComment');
		$this->setClassname('SupplierQuoteItemComment');
		$this->setPackage('import.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('SUPPLIERQUOTEITEMID', 'Supplierquoteitemid', 'INTEGER', 'import_supplierQuoteItem', 'ID', true, null, null);
		$this->addForeignKey('SUPPLIERID', 'Supplierid', 'INTEGER', 'import_supplier', 'ID', true, null, null);
		$this->addForeignKey('USERID', 'Userid', 'INTEGER', 'users_user', 'ID', false, null, null);
		$this->addColumn('PRICE', 'Price', 'FLOAT', false, null, null);
		$this->addColumn('COMMENTS', 'Comments', 'VARCHAR', false, 255, null);
		$this->addColumn('DELIVERY', 'Delivery', 'INTEGER', false, null, null);
		$this->addColumn('CREATEDAT', 'Createdat', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('userId' => 'id', ), null, null);
    $this->addRelation('Supplier', 'Supplier', RelationMap::MANY_TO_ONE, array('supplierId' => 'id', ), null, null);
    $this->addRelation('SupplierQuoteItem', 'SupplierQuoteItem', RelationMap::MANY_TO_ONE, array('supplierQuoteItemId' => 'id', ), null, null);
	} // buildRelations()

} // SupplierQuoteItemCommentTableMap
