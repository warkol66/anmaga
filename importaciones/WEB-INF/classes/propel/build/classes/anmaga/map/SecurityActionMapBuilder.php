<?php

require_once 'propel/map/MapBuilder.php';
include_once 'creole/CreoleTypes.php';


/**
 * This class adds structure of 'security_action' table to 'anmaga' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel on:
 *
 * Mon Feb  2 17:30:39 2009
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    anmaga.map
 */
class SecurityActionMapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'anmaga.map.SecurityActionMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap('anmaga');

		$tMap = $this->dbMap->addTable('security_action');
		$tMap->setPhpName('SecurityAction');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ACTION', 'Action', 'string' , CreoleTypes::VARCHAR, 'security_actionLabel', 'ACTION', true, 100);

		$tMap->addColumn('MODULE', 'Module', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('SECTION', 'Section', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ACCESS', 'Access', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ACCESSAFFILIATEUSER', 'Accessaffiliateuser', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ACTIVE', 'Active', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PAIR', 'Pair', 'string', CreoleTypes::VARCHAR, false, 100);

	} // doBuild()

} // SecurityActionMapBuilder
