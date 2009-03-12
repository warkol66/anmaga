<?php


/**
 * This class adds structure of 'import_supplierPurchaseOrderHistory' table to 'application' DatabaseMap object.
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
class SupplierPurchaseOrderHistoryMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.SupplierPurchaseOrderHistoryMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(SupplierPurchaseOrderHistoryPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(SupplierPurchaseOrderHistoryPeer::TABLE_NAME);
		$tMap->setPhpName('SupplierPurchaseOrderHistory');
		$tMap->setClassname('SupplierPurchaseOrderHistory');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('SUPPLIERPURCHASEORDERID', 'Supplierpurchaseorderid', 'INTEGER', 'import_supplierPurchaseOrder', 'ID', true, null);

		$tMap->addColumn('STATUSCODE', 'Statuscode', 'INTEGER', true, null);

		$tMap->addColumn('COMMENTS', 'Comments', 'VARCHAR', false, 255);

		$tMap->addColumn('CREATEDAT', 'Createdat', 'TIMESTAMP', true, null);

	} // doBuild()

} // SupplierPurchaseOrderHistoryMapBuilder
