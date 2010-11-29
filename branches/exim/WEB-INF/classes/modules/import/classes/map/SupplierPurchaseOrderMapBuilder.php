<?php


/**
 * This class adds structure of 'import_supplierPurchaseOrder' table to 'application' DatabaseMap object.
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
class SupplierPurchaseOrderMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.SupplierPurchaseOrderMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(SupplierPurchaseOrderPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(SupplierPurchaseOrderPeer::TABLE_NAME);
		$tMap->setPhpName('SupplierPurchaseOrder');
		$tMap->setClassname('SupplierPurchaseOrder');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('CREATEDAT', 'Createdat', 'TIMESTAMP', true, null);

		$tMap->addForeignKey('SUPPLIERID', 'Supplierid', 'INTEGER', 'import_supplier', 'ID', true, null);

		$tMap->addColumn('STATUS', 'Status', 'INTEGER', true, null);

		$tMap->addColumn('TIMESTAMPSTATUS', 'Timestampstatus', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('SUPPLIERQUOTEID', 'Supplierquoteid', 'INTEGER', 'import_supplierQuote', 'ID', true, null);

		$tMap->addForeignKey('CLIENTQUOTEID', 'Clientquoteid', 'INTEGER', 'import_clientQuote', 'ID', true, null);

		$tMap->addForeignKey('AFFILIATEID', 'Affiliateid', 'INTEGER', 'affiliates_affiliate', 'ID', true, null);

		$tMap->addForeignKey('AFFILIATEUSERID', 'Affiliateuserid', 'INTEGER', 'affiliates_user', 'ID', false, null);

		$tMap->addForeignKey('USERID', 'Userid', 'INTEGER', 'users_user', 'ID', false, null);

	} // doBuild()

} // SupplierPurchaseOrderMapBuilder
