<?php


/**
 * This class adds structure of 'affiliates_groupCategory' table to 'application' DatabaseMap object.
 *
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    categories.classes.map
 */
class AffiliateGroupCategoryMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'categories.classes.map.AffiliateGroupCategoryMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(AffiliateGroupCategoryPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(AffiliateGroupCategoryPeer::TABLE_NAME);
		$tMap->setPhpName('AffiliateGroupCategory');
		$tMap->setClassname('AffiliateGroupCategory');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('GROUPID', 'Groupid', 'INTEGER' , 'affiliates_group', 'ID', true, null);

		$tMap->addForeignPrimaryKey('CATEGORYID', 'Categoryid', 'INTEGER' , 'categories_category', 'ID', true, null);

	} // doBuild()

} // AffiliateGroupCategoryMapBuilder
