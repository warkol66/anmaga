<?php


/**
 * This class adds structure of 'users_user' table to 'application' DatabaseMap object.
 *
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    users.classes.map
 */
class UserMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'users.classes.map.UserMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(UserPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(UserPeer::TABLE_NAME);
		$tMap->setPhpName('User');
		$tMap->setClassname('User');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('USERNAME', 'Username', 'VARCHAR', true, 255);

		$tMap->addColumn('PASSWORD', 'Password', 'VARCHAR', true, 255);

		$tMap->addColumn('ACTIVE', 'Active', 'BOOLEAN', true, null);

		$tMap->addColumn('CREATED', 'Created', 'TIMESTAMP', true, null);

		$tMap->addColumn('UPDATED', 'Updated', 'TIMESTAMP', true, null);

		$tMap->addForeignKey('LEVELID', 'Levelid', 'INTEGER', 'users_level', 'ID', false, null);

		$tMap->addColumn('LASTLOGIN', 'Lastlogin', 'TIMESTAMP', false, null);

		$tMap->addColumn('TIMEZONE', 'Timezone', 'VARCHAR', false, 100);

	} // doBuild()

} // UserMapBuilder
