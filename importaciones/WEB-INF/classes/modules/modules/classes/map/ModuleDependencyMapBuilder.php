<?php


/**
 * This class adds structure of 'modules_dependency' table to 'application' DatabaseMap object.
 *
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    modules.classes.map
 */
class ModuleDependencyMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'modules.classes.map.ModuleDependencyMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(ModuleDependencyPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ModuleDependencyPeer::TABLE_NAME);
		$tMap->setPhpName('ModuleDependency');
		$tMap->setClassname('ModuleDependency');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('MODULENAME', 'Modulename', 'VARCHAR' , 'modules_module', 'NAME', true, 50);

		$tMap->addPrimaryKey('DEPENDENCE', 'Dependence', 'VARCHAR', true, 50);

	} // doBuild()

} // ModuleDependencyMapBuilder
