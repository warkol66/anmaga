<?php


/**
 * This class adds structure of 'affiliates_branch' table to 'application' DatabaseMap object.
 *
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    affiliates.classes.map
 */
class AffiliateBranchMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'affiliates.classes.map.AffiliateBranchMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(AffiliateBranchPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(AffiliateBranchPeer::TABLE_NAME);
		$tMap->setPhpName('AffiliateBranch');
		$tMap->setClassname('AffiliateBranch');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('AFFILIATEID', 'Affiliateid', 'INTEGER', 'affiliates_affiliate', 'ID', true, null);

		$tMap->addColumn('NUMBER', 'Number', 'INTEGER', true, null);

		$tMap->addColumn('CODE', 'Code', 'VARCHAR', false, 20);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', false, 255);

		$tMap->addColumn('PHONE', 'Phone', 'VARCHAR', false, 100);

		$tMap->addColumn('CONTACT', 'Contact', 'VARCHAR', false, 50);

		$tMap->addColumn('CONTACTEMAIL', 'Contactemail', 'VARCHAR', false, 100);

		$tMap->addColumn('MEMO', 'Memo', 'LONGVARCHAR', false, null);

	} // doBuild()

} // AffiliateBranchMapBuilder
