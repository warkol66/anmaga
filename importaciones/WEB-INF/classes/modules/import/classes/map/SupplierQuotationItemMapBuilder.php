<?php


/**
 * This class adds structure of 'import_supplierQuotationItem' table to 'application' DatabaseMap object.
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
class SupplierQuotationItemMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.SupplierQuotationItemMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(SupplierQuotationItemPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(SupplierQuotationItemPeer::TABLE_NAME);
		$tMap->setPhpName('SupplierQuotationItem');
		$tMap->setClassname('SupplierQuotationItem');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('SUPPLIERQUOTATIONID', 'Supplierquotationid', 'INTEGER', 'import_supplierQuotation', 'ID', true, null);

		$tMap->addForeignKey('PRODUCTID', 'Productid', 'INTEGER', 'import_product', 'ID', true, null);

		$tMap->addForeignKey('REPLACEDPRODUCTID', 'Replacedproductid', 'INTEGER', 'import_product', 'ID', false, null);

		$tMap->addForeignKey('CLIENTQUOTATIONITEMID', 'Clientquotationitemid', 'INTEGER', 'import_clientQuotationItem', 'ID', true, null);

		$tMap->addColumn('STATUS', 'Status', 'INTEGER', true, null);

		$tMap->addColumn('QUANTITY', 'Quantity', 'INTEGER', true, null);

		$tMap->addForeignKey('PORTID', 'Portid', 'INTEGER', 'import_port', 'ID', true, null);

		$tMap->addForeignKey('INCOTERMID', 'Incotermid', 'INTEGER', 'import_incoterm', 'ID', true, null);

		$tMap->addColumn('PRICE', 'Price', 'FLOAT', false, null);

		$tMap->addColumn('SUPPLIERCOMMENTS', 'Suppliercomments', 'VARCHAR', false, 255);

		$tMap->addColumn('DELIVERY', 'Delivery', 'INTEGER', false, null);

		$tMap->addColumn('PACKAGE', 'Package', 'INTEGER', false, null);

		$tMap->addColumn('UNITLENGTH', 'Unitlength', 'FLOAT', false, null);

		$tMap->addColumn('UNITWIDTH', 'Unitwidth', 'FLOAT', false, null);

		$tMap->addColumn('UNITHEIGHT', 'Unitheight', 'FLOAT', false, null);

		$tMap->addColumn('UNITGROSSWEIGTH', 'Unitgrossweigth', 'FLOAT', false, null);

		$tMap->addColumn('UNITSPERCARTON', 'Unitspercarton', 'INTEGER', false, null);

		$tMap->addColumn('CARTONS', 'Cartons', 'INTEGER', false, null);

		$tMap->addColumn('CARTONLENGTH', 'Cartonlength', 'FLOAT', false, null);

		$tMap->addColumn('CARTONWIDTH', 'Cartonwidth', 'FLOAT', false, null);

		$tMap->addColumn('CARTONHEIGHT', 'Cartonheight', 'FLOAT', false, null);

		$tMap->addColumn('CARTONGROSSWEIGTH', 'Cartongrossweigth', 'FLOAT', false, null);

	} // doBuild()

} // SupplierQuotationItemMapBuilder
