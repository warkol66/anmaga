<?php


/**
 * This class adds structure of 'affiliates_affiliateInfo' table to 'application' DatabaseMap object.
 *
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    affiliates.classes.map
 */
class AffiliateInfoMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'affiliates.classes.map.AffiliateInfoMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(AffiliateInfoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(AffiliateInfoPeer::TABLE_NAME);
		$tMap->setPhpName('AffiliateInfo');
		$tMap->setClassname('AffiliateInfo');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('AFFILIATEID', 'Affiliateid', 'INTEGER', true, null);

		$tMap->addColumn('AFFILIATEINTERNALNUMBER', 'Affiliateinternalnumber', 'INTEGER', true, null);

		$tMap->addColumn('ADDRESS', 'Address', 'VARCHAR', false, 255);

		$tMap->addColumn('PHONE', 'Phone', 'VARCHAR', false, 50);

		$tMap->addColumn('EMAIL', 'Email', 'VARCHAR', false, 50);

		$tMap->addColumn('CONTACT', 'Contact', 'VARCHAR', false, 50);

		$tMap->addColumn('CONTACTEMAIL', 'Contactemail', 'VARCHAR', false, 100);

		$tMap->addColumn('WEB', 'Web', 'VARCHAR', false, 255);

		$tMap->addColumn('MEMO', 'Memo', 'LONGVARCHAR', false, null);

	} // doBuild()

} // AffiliateInfoMapBuilder
