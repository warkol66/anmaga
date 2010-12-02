<?php



/**
 * This class defines the structure of the 'import_clientQuoteItem' table.
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
class ClientQuoteItemTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.ClientQuoteItemTableMap';

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
		$this->setName('import_clientQuoteItem');
		$this->setPhpName('ClientQuoteItem');
		$this->setClassname('ClientQuoteItem');
		$this->setPackage('import.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('CLIENTQUOTEID', 'Clientquoteid', 'INTEGER', 'import_clientQuote', 'ID', true, null, null);
		$this->addForeignKey('PRODUCTID', 'Productid', 'INTEGER', 'import_product', 'ID', true, null, null);
		$this->addColumn('PRICE', 'Price', 'FLOAT', false, null, null);
		$this->addColumn('QUANTITY', 'Quantity', 'INTEGER', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ClientQuote', 'ClientQuote', RelationMap::MANY_TO_ONE, array('clientQuoteId' => 'id', ), null, null);
    $this->addRelation('Product', 'Product', RelationMap::MANY_TO_ONE, array('productId' => 'id', ), null, null);
    $this->addRelation('SupplierQuoteItem', 'SupplierQuoteItem', RelationMap::ONE_TO_MANY, array('id' => 'clientQuoteItemId', ), null, null);
	} // buildRelations()

} // ClientQuoteItemTableMap
