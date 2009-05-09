<?php


/**
 * This class adds structure of 'import_supplierQuoteItemComment' table to 'application' DatabaseMap object.
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
class SupplierQuoteItemCommentMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.SupplierQuoteItemCommentMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(SupplierQuoteItemCommentPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(SupplierQuoteItemCommentPeer::TABLE_NAME);
		$tMap->setPhpName('SupplierQuoteItemComment');
		$tMap->setClassname('SupplierQuoteItemComment');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('SUPPLIERQUOTEITEMID', 'Supplierquoteitemid', 'INTEGER', 'import_supplierQuoteItem', 'ID', true, null);

		$tMap->addForeignKey('SUPPLIERID', 'Supplierid', 'INTEGER', 'import_supplier', 'ID', true, null);

		$tMap->addForeignKey('USERID', 'Userid', 'INTEGER', 'users_user', 'ID', false, null);

		$tMap->addColumn('PRICE', 'Price', 'FLOAT', false, null);

		$tMap->addColumn('COMMENTS', 'Comments', 'VARCHAR', false, 255);

		$tMap->addColumn('DELIVERY', 'Delivery', 'INTEGER', false, null);

		$tMap->addColumn('CREATEDAT', 'Createdat', 'TIMESTAMP', false, null);

	} // doBuild()

} // SupplierQuoteItemCommentMapBuilder
