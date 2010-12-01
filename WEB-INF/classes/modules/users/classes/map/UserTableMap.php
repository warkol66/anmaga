<?php



/**
 * This class defines the structure of the 'users_user' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.users.classes.map
 */
class UserTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'users.classes.map.UserTableMap';

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
		$this->setName('users_user');
		$this->setPhpName('User');
		$this->setClassname('User');
		$this->setPackage('users.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('USERNAME', 'Username', 'VARCHAR', true, 255, null);
		$this->addColumn('PASSWORD', 'Password', 'VARCHAR', true, 255, null);
		$this->addColumn('ACTIVE', 'Active', 'BOOLEAN', true, null, null);
		$this->addColumn('CREATED', 'Created', 'TIMESTAMP', true, null, null);
		$this->addColumn('UPDATED', 'Updated', 'TIMESTAMP', true, null, null);
		$this->addForeignKey('LEVELID', 'Levelid', 'INTEGER', 'users_level', 'ID', false, null, null);
		$this->addColumn('LASTLOGIN', 'Lastlogin', 'TIMESTAMP', false, null, null);
		$this->addColumn('TIMEZONE', 'Timezone', 'VARCHAR', false, 100, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Level', 'Level', RelationMap::MANY_TO_ONE, array('levelId' => 'id', ), null, null);
    $this->addRelation('ClientQuote', 'ClientQuote', RelationMap::ONE_TO_MANY, array('id' => 'userId', ), null, null);
    $this->addRelation('SupplierQuoteItemComment', 'SupplierQuoteItemComment', RelationMap::ONE_TO_MANY, array('id' => 'userId', ), null, null);
    $this->addRelation('ClientPurchaseOrder', 'ClientPurchaseOrder', RelationMap::ONE_TO_MANY, array('id' => 'userId', ), null, null);
    $this->addRelation('SupplierPurchaseOrder', 'SupplierPurchaseOrder', RelationMap::ONE_TO_MANY, array('id' => 'userId', ), null, null);
    $this->addRelation('UserInfo', 'UserInfo', RelationMap::ONE_TO_ONE, array('id' => 'userId', ), null, null);
    $this->addRelation('UserGroup', 'UserGroup', RelationMap::ONE_TO_MANY, array('id' => 'userId', ), null, null);
    $this->addRelation('Actionlog', 'Actionlog', RelationMap::ONE_TO_MANY, array('id' => 'userId', ), null, null);
	} // buildRelations()

} // UserTableMap