<?php


/**
 * This class adds structure of 'import_supplierQuote' table to 'application' DatabaseMap object.
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
class SupplierQuoteMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.SupplierQuoteMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(SupplierQuotePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(SupplierQuotePeer::TABLE_NAME);
		$tMap->setPhpName('SupplierQuote');
		$tMap->setClassname('SupplierQuote');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('CREATEDAT', 'Createdat', 'TIMESTAMP', true, null);

		$tMap->addForeignKey('SUPPLIERID', 'Supplierid', 'INTEGER', 'import_supplier', 'ID', true, null);

		$tMap->addColumn('STATUS', 'Status', 'INTEGER', true, null);

		$tMap->addColumn('TIMESTAMPSTATUS', 'Timestampstatus', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('CLIENTQUOTEID', 'Clientquoteid', 'INTEGER', 'import_clientQuote', 'ID', false, null);

		$tMap->addColumn('SUPPLIERACCESSTOKEN', 'Supplieraccesstoken', 'VARCHAR', true, 255);

	} // doBuild()

} // SupplierQuoteMapBuilder
