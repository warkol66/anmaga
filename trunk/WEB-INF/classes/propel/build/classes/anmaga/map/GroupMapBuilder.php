<?php
require_once 'propel/map/MapBuilder.php';
include_once 'creole/CreoleTypes.php';

/**
 * This class adds structure of 'users_group' table to 'anmaga' DatabaseMap object.
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an 
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive 
 * (i.e. if it's a text column type).
 *
 *  This class was autogenerated by Propel on:
 *
 * [03/16/07 16:42:35]
 *
 * @see BasePeer
 * @see DatabaseMap
 * @package anmaga.map
 */
class GroupMapBuilder implements MapBuilder {

    /**
     * The name of this class
     */
    const CLASS_NAME = "anmaga.map.GroupMapBuilder";
	
    /**
     * The database map.
     */
    private $dbMap = null;

    /**
     * Tells us if this DatabaseMapBuilder is built so that we
     * don't have to re-build it every time.
     *
     * @return true if this DatabaseMapBuilder is built
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
		$this->dbMap = Propel::getDatabaseMap("anmaga");
		
		$tMap = $this->dbMap->addTable("users_group");
		$tMap->setPhpName("Group");
		
         
		$tMap->setUseIdGenerator(true);
		 
						
		 
		
		// Add columns to map
		$tMap->addPrimaryKey("ID", "Id", "int", CreoleTypes::INTEGER, true);
		$tMap->addColumn("NAME", "Name", "string", CreoleTypes::VARCHAR, true, 255);
		$tMap->addColumn("CREATED", "Created", "int", CreoleTypes::TIMESTAMP, true, null);
		$tMap->addColumn("UPDATED", "Updated", "int", CreoleTypes::TIMESTAMP, true, null);
		$tMap->addColumn("BITLEVEL", "Bitlevel", "int", CreoleTypes::INTEGER, false, null);
				
    }
}
