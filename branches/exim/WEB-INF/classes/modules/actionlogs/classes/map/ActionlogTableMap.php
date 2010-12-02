<?php



/**
 * This class defines the structure of the 'actionlogs_log' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.actionlogs.classes.map
 */
class ActionlogTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'actionlogs.classes.map.ActionlogTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('actionlogs_log');
		$this->setPhpName('Actionlog');
		$this->setClassname('Actionlog');
		$this->setPackage('actionlogs.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('USERID', 'Userid', 'INTEGER', 'users_user', 'ID', true, null, null);
		$this->addColumn('AFFILIATEID', 'Affiliateid', 'INTEGER', true, null, null);
		$this->addColumn('DATETIME', 'Datetime', 'TIMESTAMP', true, null, null);
		$this->addForeignKey('ACTION', 'Action', 'VARCHAR', 'security_action', 'ACTION', true, 100, null);
		$this->addColumn('OBJECT', 'Object', 'VARCHAR', true, 100, null);
		$this->addColumn('FORWARD', 'Forward', 'VARCHAR', false, 100, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('userId' => 'id', ), null, null);
    $this->addRelation('SecurityAction', 'SecurityAction', RelationMap::MANY_TO_ONE, array('action' => 'action', ), null, null);
	} // buildRelations()

} // ActionlogTableMap
