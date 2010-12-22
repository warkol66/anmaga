<?php



/**
 * This class defines the structure of the 'usersByRegistration_user' table.
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
class UserByRegistrationTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'users.classes.map.UserByRegistrationTableMap';

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
		$this->setName('usersByRegistration_user');
		$this->setPhpName('UserByRegistration');
		$this->setClassname('UserByRegistration');
		$this->setPackage('users.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'usersByRegistration_userInfo', 'USERID', true, null, null);
		$this->addColumn('USERNAME', 'Username', 'VARCHAR', true, 255, null);
		$this->addColumn('PASSWORD', 'Password', 'VARCHAR', true, 255, null);
		$this->addColumn('ACTIVE', 'Active', 'BOOLEAN', true, null, null);
		$this->addColumn('CREATED', 'Created', 'TIMESTAMP', true, null, null);
		$this->addColumn('UPDATED', 'Updated', 'TIMESTAMP', true, null, null);
		$this->addColumn('IP', 'Ip', 'VARCHAR', true, 255, null);
		$this->addColumn('LASTLOGIN', 'Lastlogin', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('UserByRegistrationInfoRelatedById', 'UserByRegistrationInfo', RelationMap::MANY_TO_ONE, array('id' => 'userId', ), null, null);
    $this->addRelation('UserByRegistrationInfoRelatedByUserid', 'UserByRegistrationInfo', RelationMap::ONE_TO_ONE, array('id' => 'userId', ), null, null);
	} // buildRelations()

} // UserByRegistrationTableMap
