<?php


/**
 * This class adds structure of 'import_supplierQuotation' table to 'application' DatabaseMap object.
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
class SupplierQuotationMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.SupplierQuotationMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(SupplierQuotationPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(SupplierQuotationPeer::TABLE_NAME);
		$tMap->setPhpName('SupplierQuotation');
		$tMap->setClassname('SupplierQuotation');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('CREATEDAT', 'Createdat', 'TIMESTAMP', true, null);

		$tMap->addForeignKey('SUPPLIERID', 'Supplierid', 'INTEGER', 'import_supplier', 'ID', true, null);

		$tMap->addColumn('STATUS', 'Status', 'INTEGER', true, null);

		$tMap->addColumn('TIMESTAMPSTATUS', 'Timestampstatus', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('CLIENTQUOTATIONID', 'Clientquotationid', 'INTEGER', 'import_clientQuotation', 'ID', false, null);

		$tMap->addColumn('SUPPLIERACCESSTOKEN', 'Supplieraccesstoken', 'VARCHAR', true, 255);

	} // doBuild()

} // SupplierQuotationMapBuilder
