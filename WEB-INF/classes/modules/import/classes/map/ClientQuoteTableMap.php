<?php



/**
 * This class defines the structure of the 'import_clientQuote' table.
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
class ClientQuoteTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.ClientQuoteTableMap';

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
		$this->setName('import_clientQuote');
		$this->setPhpName('ClientQuote');
		$this->setClassname('ClientQuote');
		$this->setPackage('import.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('CREATEDAT', 'Createdat', 'TIMESTAMP', true, null, null);
		$this->addForeignKey('AFFILIATEID', 'Affiliateid', 'INTEGER', 'affiliates_affiliate', 'ID', true, null, null);
		$this->addForeignKey('AFFILIATEUSERID', 'Affiliateuserid', 'INTEGER', 'affiliates_user', 'ID', false, null, null);
		$this->addForeignKey('USERID', 'Userid', 'INTEGER', 'users_user', 'ID', false, null, null);
		$this->addColumn('STATUS', 'Status', 'INTEGER', true, null, null);
		$this->addColumn('TIMESTAMPSTATUS', 'Timestampstatus', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('userId' => 'id', ), null, null);
    $this->addRelation('Affiliate', 'Affiliate', RelationMap::MANY_TO_ONE, array('affiliateId' => 'id', ), null, null);
    $this->addRelation('AffiliateUser', 'AffiliateUser', RelationMap::MANY_TO_ONE, array('affiliateUserId' => 'id', ), null, null);
    $this->addRelation('ClientQuoteHistory', 'ClientQuoteHistory', RelationMap::ONE_TO_MANY, array('id' => 'clientQuoteId', ), null, null);
    $this->addRelation('ClientQuoteItem', 'ClientQuoteItem', RelationMap::ONE_TO_MANY, array('id' => 'clientQuoteId', ), null, null);
    $this->addRelation('SupplierQuote', 'SupplierQuote', RelationMap::ONE_TO_MANY, array('id' => 'clientQuoteId', ), null, null);
    $this->addRelation('ClientPurchaseOrder', 'ClientPurchaseOrder', RelationMap::ONE_TO_MANY, array('id' => 'clientQuoteId', ), null, null);
    $this->addRelation('SupplierPurchaseOrder', 'SupplierPurchaseOrder', RelationMap::ONE_TO_MANY, array('id' => 'clientQuoteId', ), null, null);
	} // buildRelations()

} // ClientQuoteTableMap
