<?php


/**
 * This class adds structure of 'import_bankAccount' table to 'application' DatabaseMap object.
 *
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    import.classes.map
 */
class BankAccountMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.BankAccountMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(BankAccountPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(BankAccountPeer::TABLE_NAME);
		$tMap->setPhpName('BankAccount');
		$tMap->setClassname('BankAccount');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('ACCOUNTNUMBER', 'Accountnumber', 'VARCHAR', true, 255);

		$tMap->addColumn('BANK', 'Bank', 'VARCHAR', true, 255);

		$tMap->addColumn('ACTIVE', 'Active', 'BOOLEAN', true, null);

	} // doBuild()

} // BankAccountMapBuilder
