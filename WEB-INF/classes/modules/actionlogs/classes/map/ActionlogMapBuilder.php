<?php


/**
 * This class adds structure of 'actionlogs_log' table to 'application' DatabaseMap object.
 *
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    actionlogs.classes.map
 */
class ActionlogMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'actionlogs.classes.map.ActionlogMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(ActionlogPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ActionlogPeer::TABLE_NAME);
		$tMap->setPhpName('Actionlog');
		$tMap->setClassname('Actionlog');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('USERID', 'Userid', 'INTEGER', 'users_user', 'ID', true, null);

		$tMap->addColumn('AFFILIATEID', 'Affiliateid', 'INTEGER', true, null);

		$tMap->addColumn('DATETIME', 'Datetime', 'TIMESTAMP', true, null);

		$tMap->addForeignKey('ACTION', 'Action', 'VARCHAR', 'security_action', 'ACTION', true, 100);

		$tMap->addColumn('OBJECT', 'Object', 'VARCHAR', true, 100);

		$tMap->addColumn('FORWARD', 'Forward', 'VARCHAR', false, 100);

	} // doBuild()

} // ActionlogMapBuilder
