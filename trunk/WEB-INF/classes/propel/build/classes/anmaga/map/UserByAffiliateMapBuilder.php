<?php
		
require_once 'propel/map/MapBuilder.php';
include_once 'creole/CreoleTypes.php';


/**
 * This class adds structure of 'usersByAffiliate_user' table to 'anmaga' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel on:
 *
 * 05/23/07 12:20:27
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an 
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive 
 * (i.e. if it's a text column type).
 *
 * @package anmaga.map
 */	
class UserByAffiliateMapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'anmaga.map.UserByAffiliateMapBuilder';	

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
		
		$tMap = $this->dbMap->addTable('usersByAffiliate_user');
		$tMap->setPhpName('UserByAffiliate');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignPrimaryKey('ID', 'Id', 'int' , CreoleTypes::INTEGER, 'usersByAffiliate_userInfo', 'USERID', true, null);

		$tMap->addForeignKey('AFFILIATEID', 'Affiliateid', 'int', CreoleTypes::INTEGER, 'affiliate', 'ID', true, null);

		$tMap->addColumn('USERNAME', 'Username', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('PASSWORD', 'Password', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('ACTIVE', 'Active', 'boolean', CreoleTypes::BOOLEAN, true);

		$tMap->addColumn('CREATED', 'Created', 'int', CreoleTypes::TIMESTAMP, true);

		$tMap->addColumn('UPDATED', 'Updated', 'int', CreoleTypes::TIMESTAMP, true);

		$tMap->addForeignKey('LEVELID', 'Levelid', 'int', CreoleTypes::INTEGER, 'usersByAffiliate_level', 'ID', false, null);

		$tMap->addColumn('LASTLOGIN', 'Lastlogin', 'int', CreoleTypes::TIMESTAMP, false);
				
    } // doBuild()

} // UserByAffiliateMapBuilder
