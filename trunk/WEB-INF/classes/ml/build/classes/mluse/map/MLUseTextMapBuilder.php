<?php
require_once 'propel/map/MapBuilder.php';
include_once 'creole/CreoleTypes.php';

/**
 * This class adds structure of 'MLUSE_Text' table to 'mluse' DatabaseMap object.
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an 
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive 
 * (i.e. if it's a text column type).
 *
 *  This class was autogenerated by Propel on:
 *
 * [09/27/06 18:29:52]
 *
 * @see BasePeer
 * @see DatabaseMap
 * @package mluse.map
 */
class MLUseTextMapBuilder implements MapBuilder {

    /**
     * The name of this class
     */
    const CLASS_NAME = "mluse.map.MLUseTextMapBuilder";
	
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
		$this->dbMap = Propel::getDatabaseMap("mluse");
		
		$tMap = $this->dbMap->addTable("MLUSE_Text");
		$tMap->setPhpName("MLUseText");
		
         
		$tMap->setUseIdGenerator(true);
		 
						
		 
		
		// Add columns to map
		$tMap->addPrimaryKey("ID", "Id", "int", CreoleTypes::INTEGER, true);
		$tMap->addForeignPrimaryKey("LANGUAGEID", "Languageid", "int" , CreoleTypes::INTEGER, "MLUSE_Language", "ID", true);
		$tMap->addColumn("TEXT", "Text", "string", CreoleTypes::LONGVARCHAR, true, null);
				
    }
}
