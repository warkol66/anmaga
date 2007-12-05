<?php

require_once 'propel/map/MapBuilder.php';
include_once 'creole/CreoleTypes.php';


/**
 * This class adds structure of 'affiliates_affiliateInfo' table to 'anmaga' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel on:
 *
 * 12/05/07 13:19:18
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    anmaga.map
 */
class AffiliateInfoMapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'anmaga.map.AffiliateInfoMapBuilder';

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

		$tMap = $this->dbMap->addTable('affiliates_affiliateInfo');
		$tMap->setPhpName('AffiliateInfo');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('AFFILIATEID', 'Affiliateid', 'int' , CreoleTypes::INTEGER, 'affiliates_affiliate', 'ID', true, null);

		$tMap->addColumn('AFFILIATEINTERNALNUMBER', 'Affiliateinternalnumber', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ADDRESS', 'Address', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('PHONE', 'Phone', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CONTACT', 'Contact', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CONTACTEMAIL', 'Contactemail', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('WEB', 'Web', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('MEMO', 'Memo', 'string', CreoleTypes::LONGVARCHAR, false, null);

	} // doBuild()

} // AffiliateInfoMapBuilder
