<?php


/**
 * This class adds structure of 'import_clientQuotationHistory' table to 'application' DatabaseMap object.
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
class ClientQuotationHistoryMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.ClientQuotationHistoryMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(ClientQuotationHistoryPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ClientQuotationHistoryPeer::TABLE_NAME);
		$tMap->setPhpName('ClientQuotationHistory');
		$tMap->setClassname('ClientQuotationHistory');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('CLIENTQUOTATIONID', 'Clientquotationid', 'INTEGER', 'import_clientQuotation', 'ID', true, null);

		$tMap->addColumn('STATUS', 'Status', 'INTEGER', true, null);

		$tMap->addColumn('CREATEDAT', 'Createdat', 'TIMESTAMP', false, null);

	} // doBuild()

} // ClientQuotationHistoryMapBuilder
