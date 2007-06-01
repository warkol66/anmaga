<?php
		
require_once 'propel/map/MapBuilder.php';
include_once 'creole/CreoleTypes.php';


/**
 * This class adds structure of 'orders_order' table to 'anmaga' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel on:
 *
 * 06/01/07 14:39:24
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an 
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive 
 * (i.e. if it's a text column type).
 *
 * @package anmaga.map
 */	
class OrderMapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'anmaga.map.OrderMapBuilder';	

    /**
     * The database map.
     */
    private $dbMap;

	/**
     * Tells us if this DatabaseMapBuilder is built so that we
     * don't have to re-build it every time.
     *
     * @return boolean true if this DatabaseMapBuilder is built, false otherwise.
     */
    public function isBuilt()
    {
        return ($this->dbMap !== null);
    }

	/**
     * Gets the databasemap this map builder built.
     *
     * @return the databasemap
     */
    public function getDatabaseMap()
    {
        return $this->dbMap;
    }

    /**
     * The doBuild() method builds the DatabaseMap
     *
	 * @return void
     * @throws PropelException
     */
    public function doBuild()
    {
		$this->dbMap = Propel::getDatabaseMap('anmaga');
		
		$tMap = $this->dbMap->addTable('orders_order');
		$tMap->setPhpName('Order');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED', 'Created', 'int', CreoleTypes::TIMESTAMP, true);

		$tMap->addForeignKey('USERID', 'Userid', 'int', CreoleTypes::INTEGER, 'usersByAffiliate_user', 'ID', true, null);

		$tMap->addForeignKey('AFFILIATEID', 'Affiliateid', 'int', CreoleTypes::INTEGER, 'affiliate', 'ID', true, null);

		$tMap->addForeignKey('BRANCHID', 'Branchid', 'int', CreoleTypes::INTEGER, 'branch', 'ID', false, null);

		$tMap->addColumn('PROCESSED', 'Processed', 'int', CreoleTypes::TIMESTAMP, false);

		$tMap->addColumn('TOTAL', 'Total', 'double', CreoleTypes::FLOAT, false);

		$tMap->addColumn('STATE', 'State', 'int', CreoleTypes::INTEGER, false);
				
    } // doBuild()

} // OrderMapBuilder
