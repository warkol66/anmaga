<?php



/**
 * This class defines the structure of the 'affiliates_user' table.
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
class AffiliateUserTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'affiliates.classes.map.AffiliateUserTableMap';

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
		$this->setName('affiliates_user');
		$this->setPhpName('AffiliateUser');
		$this->setClassname('AffiliateUser');
		$this->setPackage('affiliates.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('AFFILIATEID', 'Affiliateid', 'INTEGER', 'affiliates_affiliate', 'ID', true, null, null);
		$this->addColumn('USERNAME', 'Username', 'VARCHAR', true, 255, null);
		$this->addColumn('PASSWORD', 'Password', 'VARCHAR', true, 255, null);
		$this->addColumn('PASSWORDUPDATED', 'Passwordupdated', 'DATE', false, null, null);
		$this->addForeignKey('LEVELID', 'Levelid', 'INTEGER', 'affiliates_level', 'ID', false, null, null);
		$this->addColumn('LASTLOGIN', 'Lastlogin', 'TIMESTAMP', false, null, null);
		$this->addColumn('TIMEZONE', 'Timezone', 'VARCHAR', false, 25, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 255, null);
		$this->addColumn('SURNAME', 'Surname', 'VARCHAR', false, 255, null);
		$this->addColumn('MAILADDRESS', 'Mailaddress', 'VARCHAR', false, 255, null);
		$this->addColumn('MAILADDRESSALT', 'Mailaddressalt', 'VARCHAR', false, 90, null);
		$this->addColumn('RECOVERYHASH', 'Recoveryhash', 'VARCHAR', false, 255, null);
		$this->addColumn('RECOVERYHASHCREATEDON', 'Recoveryhashcreatedon', 'TIMESTAMP', false, null, null);
		$this->addColumn('DELETED_AT', 'DeletedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
		$this->addValidator('AFFILIATEID', 'required', 'propel.validator.RequiredValidator', '', 'El usuario debe asociarse a un afiliado.');
		$this->addValidator('USERNAME', 'unique', 'propel.validator.UniqueValidator', '', 'El nombre de usuario debe ser unico.');
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('AffiliateLevel', 'AffiliateLevel', RelationMap::MANY_TO_ONE, array('levelId' => 'id', ), null, null);
    $this->addRelation('AffiliateRelatedByAffiliateid', 'Affiliate', RelationMap::MANY_TO_ONE, array('affiliateId' => 'id', ), null, null);
    $this->addRelation('AffiliateRelatedByOwnerid', 'Affiliate', RelationMap::ONE_TO_MANY, array('id' => 'ownerId', ), null, null);
    $this->addRelation('AffiliateUserGroup', 'AffiliateUserGroup', RelationMap::ONE_TO_MANY, array('id' => 'userId', ), null, null);
    $this->addRelation('Order', 'Order', RelationMap::ONE_TO_MANY, array('id' => 'userId', ), null, null);
    $this->addRelation('OrderStateChange', 'OrderStateChange', RelationMap::ONE_TO_MANY, array('id' => 'userId', ), null, null);
    $this->addRelation('OrderTemplate', 'OrderTemplate', RelationMap::ONE_TO_MANY, array('id' => 'userId', ), null, null);
    $this->addRelation('AffiliateGroup', 'AffiliateGroup', RelationMap::MANY_TO_MANY, array(), null, null);
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

} // AffiliateUserTableMap
