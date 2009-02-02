<?php

require_once 'propel/map/MapBuilder.php';
include_once 'creole/CreoleTypes.php';


/**
 * This class adds structure of 'affiliates_user' table to 'anmaga' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel on:
 *
 * Mon Feb  2 17:30:39 2009
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    anmaga.map
 */
class AffiliateUserMapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'anmaga.map.AffiliateUserMapBuilder';

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

		$tMap = $this->dbMap->addTable('affiliates_user');
		$tMap->setPhpName('AffiliateUser');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignPrimaryKey('ID', 'Id', 'int' , CreoleTypes::INTEGER, 'affiliates_userInfo', 'USERID', true, null);

		$tMap->addForeignKey('AFFILIATEID', 'Affiliateid', 'int', CreoleTypes::INTEGER, 'affiliates_affiliate', 'ID', true, null);

		$tMap->addColumn('USERNAME', 'Username', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('PASSWORD', 'Password', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('ACTIVE', 'Active', 'boolean', CreoleTypes::BOOLEAN, true, null);

		$tMap->addColumn('CREATED', 'Created', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED', 'Updated', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addForeignKey('LEVELID', 'Levelid', 'int', CreoleTypes::INTEGER, 'affiliates_level', 'ID', false, null);

		$tMap->addColumn('LASTLOGIN', 'Lastlogin', 'int', CreoleTypes::TIMESTAMP, false, null);

	} // doBuild()

} // AffiliateUserMapBuilder
