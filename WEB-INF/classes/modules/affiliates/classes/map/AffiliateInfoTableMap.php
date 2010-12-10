<?php



/**
 * This class defines the structure of the 'affiliates_affiliateInfo' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.affiliates.classes.map
 */
class AffiliateInfoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'affiliates.classes.map.AffiliateInfoTableMap';

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
		$this->setName('affiliates_affiliateInfo');
		$this->setPhpName('AffiliateInfo');
		$this->setClassname('AffiliateInfo');
		$this->setPackage('affiliates.classes');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('AFFILIATEID', 'Affiliateid', 'INTEGER' , 'affiliates_affiliate', 'ID', true, null, null);
		$this->addColumn('AFFILIATEINTERNALNUMBER', 'Affiliateinternalnumber', 'INTEGER', true, null, null);
		$this->addColumn('ADDRESS', 'Address', 'VARCHAR', false, 255, null);
		$this->addColumn('PHONE', 'Phone', 'VARCHAR', false, 50, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 50, null);
		$this->addColumn('CONTACT', 'Contact', 'VARCHAR', false, 50, null);
		$this->addColumn('CONTACTEMAIL', 'Contactemail', 'VARCHAR', false, 100, null);
		$this->addColumn('WEB', 'Web', 'VARCHAR', false, 255, null);
		$this->addColumn('MEMO', 'Memo', 'LONGVARCHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Affiliate', 'Affiliate', RelationMap::MANY_TO_ONE, array('affiliateId' => 'id', ), 'CASCADE', null);
	} // buildRelations()

} // AffiliateInfoTableMap
