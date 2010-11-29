<?php



/**
 * This class defines the structure of the 'categories_category' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.categories.classes.map
 */
class CategoryTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'categories.classes.map.CategoryTableMap';

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
		$this->setName('categories_category');
		$this->setPhpName('Category');
		$this->setClassname('Category');
		$this->setPackage('categories.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('PARENTID', 'Parentid', 'INTEGER', true, null, 0);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('MODULE', 'Module', 'VARCHAR', false, 255, '');
		$this->addColumn('ACTIVE', 'Active', 'BOOLEAN', true, null, null);
		$this->addColumn('ISPUBLIC', 'Ispublic', 'BOOLEAN', true, null, false);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('GroupCategory', 'GroupCategory', RelationMap::ONE_TO_MANY, array('id' => 'categoryId', ), null, null);
    $this->addRelation('AffiliateGroupCategory', 'AffiliateGroupCategory', RelationMap::ONE_TO_MANY, array('id' => 'categoryId', ), null, null);
	} // buildRelations()

} // CategoryTableMap
