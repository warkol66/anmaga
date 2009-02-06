<?php


/**
 * This class adds structure of 'security_module' table to 'application' DatabaseMap object.
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
class SecurityModuleMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'security.classes.map.SecurityModuleMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(SecurityModulePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(SecurityModulePeer::TABLE_NAME);
		$tMap->setPhpName('SecurityModule');
		$tMap->setClassname('SecurityModule');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('MODULE', 'Module', 'VARCHAR', true, 100);

		$tMap->addColumn('ACCESS', 'Access', 'INTEGER', false, null);

		$tMap->addColumn('ACCESSAFFILIATEUSER', 'Accessaffiliateuser', 'INTEGER', false, null);

		$tMap->addColumn('ACCESSREGISTRATIONUSER', 'Accessregistrationuser', 'INTEGER', false, null);

	} // doBuild()

} // SecurityModuleMapBuilder