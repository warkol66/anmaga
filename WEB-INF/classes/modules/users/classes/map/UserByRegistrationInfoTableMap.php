<?php



/**
 * This class defines the structure of the 'usersByRegistration_userInfo' table.
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
class UserByRegistrationInfoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'users.classes.map.UserByRegistrationInfoTableMap';

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
		$this->setName('usersByRegistration_userInfo');
		$this->setPhpName('UserByRegistrationInfo');
		$this->setClassname('UserByRegistrationInfo');
		$this->setPackage('users.classes');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('USERID', 'Userid', 'INTEGER' , 'usersByRegistration_user', 'ID', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 255, null);
		$this->addColumn('SURNAME', 'Surname', 'VARCHAR', false, 255, null);
		$this->addColumn('MAILADDRESS', 'Mailaddress', 'VARCHAR', false, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('UserByRegistrationRelatedByUserid', 'UserByRegistration', RelationMap::MANY_TO_ONE, array('userId' => 'id', ), null, null);
    $this->addRelation('UserByRegistrationRelatedById', 'UserByRegistration', RelationMap::ONE_TO_ONE, array('userId' => 'id', ), null, null);
	} // buildRelations()

} // UserByRegistrationInfoTableMap
