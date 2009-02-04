<?php

require_once 'propel/map/MapBuilder.php';
include_once 'creole/CreoleTypes.php';


/**
 * This class adds structure of 'import_clientPurchaseOrderItem' table to 'anmaga' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel on:
 *
 * Wed Feb  4 14:12:35 2009
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    anmaga.map
 */
class ClientPurchaseOrderItemMapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'anmaga.map.ClientPurchaseOrderItemMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap('anmaga');

		$tMap = $this->dbMap->addTable('import_clientPurchaseOrderItem');
		$tMap->setPhpName('ClientPurchaseOrderItem');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignPrimaryKey('CLIENTPURCHASEORDERID', 'Clientpurchaseorderid', 'int' , CreoleTypes::INTEGER, 'import_clientPurchaseOrder', 'ID', true, null);

		$tMap->addForeignKey('CLIENTQUOTATIONITEMID', 'Clientquotationitemid', 'int', CreoleTypes::INTEGER, 'import_clientQuotationItem', 'ID', true, null);

		$tMap->addForeignPrimaryKey('PRODUCTID', 'Productid', 'int' , CreoleTypes::INTEGER, 'import_product', 'ID', true, null);

		$tMap->addColumn('PRICE', 'Price', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('QUANTITY', 'Quantity', 'int', CreoleTypes::INTEGER, false, null);

	} // doBuild()

} // ClientPurchaseOrderItemMapBuilder
