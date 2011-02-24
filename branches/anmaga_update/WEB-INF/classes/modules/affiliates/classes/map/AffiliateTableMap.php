<?php



/**
 * This class defines the structure of the 'affiliates_affiliate' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.affiliates.classes.map
 */
class AffiliateTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'affiliates.classes.map.AffiliateTableMap';

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
		$this->setName('affiliates_affiliate');
		$this->setPhpName('Affiliate');
		$this->setClassname('Affiliate');
		$this->setPackage('affiliates.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addForeignKey('OWNERID', 'Ownerid', 'INTEGER', 'affiliates_user', 'ID', false, null, null);
		$this->addColumn('INTERNALNUMBER', 'Internalnumber', 'VARCHAR', false, 12, null);
		$this->addColumn('ADDRESS', 'Address', 'VARCHAR', false, 255, null);
		$this->addColumn('PHONE', 'Phone', 'VARCHAR', false, 50, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 50, null);
		$this->addColumn('CONTACT', 'Contact', 'VARCHAR', false, 50, null);
		$this->addColumn('CONTACTEMAIL', 'Contactemail', 'VARCHAR', false, 100, null);
		$this->addColumn('WEB', 'Web', 'VARCHAR', false, 255, null);
		$this->addColumn('MEMO', 'Memo', 'LONGVARCHAR', false, null, null);
		$this->addColumn('DELETED_AT', 'DeletedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('AffiliateUserRelatedByOwnerid', 'AffiliateUser', RelationMap::MANY_TO_ONE, array('ownerId' => 'id', ), null, null);
    $this->addRelation('AffiliateUserRelatedByAffiliateid', 'AffiliateUser', RelationMap::ONE_TO_MANY, array('id' => 'affiliateId', ), null, null);
    $this->addRelation('AffiliateBranch', 'AffiliateBranch', RelationMap::ONE_TO_MANY, array('id' => 'affiliateId', ), null, null);
    $this->addRelation('AffiliateProduct', 'AffiliateProduct', RelationMap::ONE_TO_MANY, array('id' => 'affiliateId', ), null, null);
    $this->addRelation('AffiliateProductCode', 'AffiliateProductCode', RelationMap::ONE_TO_MANY, array('id' => 'affiliateId', ), null, null);
    $this->addRelation('Order', 'Order', RelationMap::ONE_TO_MANY, array('id' => 'affiliateId', ), null, null);
    $this->addRelation('OrderStateChange', 'OrderStateChange', RelationMap::ONE_TO_MANY, array('id' => 'affiliateId', ), null, null);
    $this->addRelation('OrderTemplate', 'OrderTemplate', RelationMap::ONE_TO_MANY, array('id' => 'affiliateId', ), null, null);
    $this->addRelation('Product', 'Product', RelationMap::MANY_TO_MANY, array(), null, null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'soft_delete' => array('deleted_column' => 'deleted_at', ),
			'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
		);
	} // getBehaviors()

} // AffiliateTableMap