<?php


/**
 * This class adds structure of 'multilang_text' table to 'application' DatabaseMap object.
 *
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    multilang.classes.map
 */
class MultilangTextMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'multilang.classes.map.MultilangTextMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(MultilangTextPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(MultilangTextPeer::TABLE_NAME);
		$tMap->setPhpName('MultilangText');
		$tMap->setClassname('MultilangText');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignPrimaryKey('MODULENAME', 'Modulename', 'VARCHAR' , 'modules_module', 'NAME', true, 255);

		$tMap->addForeignPrimaryKey('LANGUAGEID', 'Languageid', 'INTEGER' , 'multilang_language', 'ID', true, null);

		$tMap->addColumn('TEXT', 'Text', 'LONGVARCHAR', true, null);

	} // doBuild()

} // MultilangTextMapBuilder
