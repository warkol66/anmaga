<?php


/**
 * This class adds structure of 'import_clientQuotationItem' table to 'application' DatabaseMap object.
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
class ClientQuotationItemMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'import.classes.map.ClientQuotationItemMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(ClientQuotationItemPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ClientQuotationItemPeer::TABLE_NAME);
		$tMap->setPhpName('ClientQuotationItem');
		$tMap->setClassname('ClientQuotationItem');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('CLIENTQUOTATIONID', 'Clientquotationid', 'INTEGER', 'import_clientQuotation', 'ID', true, null);

		$tMap->addForeignKey('PRODUCTID', 'Productid', 'INTEGER', 'import_product', 'ID', true, null);

		$tMap->addColumn('PRICE', 'Price', 'INTEGER', false, null);

		$tMap->addColumn('QUANTITY', 'Quantity', 'INTEGER', false, null);

	} // doBuild()

} // ClientQuotationItemMapBuilder
