<?php


/**
 * This class adds structure of 'security_action' table to 'application' DatabaseMap object.
 *
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    security.classes.map
 */
class SecurityActionMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'security.classes.map.SecurityActionMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(SecurityActionPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(SecurityActionPeer::TABLE_NAME);
		$tMap->setPhpName('SecurityAction');
		$tMap->setClassname('SecurityAction');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ACTION', 'Action', 'VARCHAR', true, 100);

		$tMap->addForeignKey('MODULE', 'Module', 'VARCHAR', 'security_module', 'MODULE', false, 100);

		$tMap->addColumn('SECTION', 'Section', 'VARCHAR', false, 100);

		$tMap->addColumn('ACCESS', 'Access', 'INTEGER', false, null);

		$tMap->addColumn('ACCESSAFFILIATEUSER', 'Accessaffiliateuser', 'INTEGER', false, null);

		$tMap->addColumn('ACCESSREGISTRATIONUSER', 'Accessregistrationuser', 'INTEGER', false, null);

		$tMap->addColumn('ACTIVE', 'Active', 'INTEGER', false, null);

		$tMap->addColumn('PAIR', 'Pair', 'VARCHAR', false, 100);

		$tMap->addColumn('NOCHECKLOGIN', 'Nochecklogin', 'BOOLEAN', false, null);

	} // doBuild()

} // SecurityActionMapBuilder
