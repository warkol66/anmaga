<?php


/**
 * This class adds structure of 'actionLogs_label' table to 'application' DatabaseMap object.
 *
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    actionLogs.classes.map
 */
class ActionLogLabelMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'actionLogs.classes.map.ActionLogLabelMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(ActionLogLabelPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ActionLogLabelPeer::TABLE_NAME);
		$tMap->setPhpName('ActionLogLabel');
		$tMap->setClassname('ActionLogLabel');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addPrimaryKey('ACTION', 'Action', 'VARCHAR', true, 100);

		$tMap->addColumn('LABEL', 'Label', 'VARCHAR', true, 100);

		$tMap->addColumn('LANGUAGE', 'Language', 'VARCHAR', false, 100);

		$tMap->addColumn('FORWARD', 'Forward', 'VARCHAR', false, 100);

	} // doBuild()

} // ActionLogLabelMapBuilder
