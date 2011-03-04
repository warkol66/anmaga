<?php



/**
 * This class defines the structure of the 'surveys_answerOption' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.surveys.classes.map
 */
class SurveyAnswerOptionTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'surveys.classes.map.SurveyAnswerOptionTableMap';

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
		$this->setName('surveys_answerOption');
		$this->setPhpName('SurveyAnswerOption');
		$this->setClassname('SurveyAnswerOption');
		$this->setPackage('surveys.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('QUESTIONID', 'Questionid', 'INTEGER', 'surveys_question', 'ID', true, null, null);
		$this->addColumn('ANSWER', 'Answer', 'VARCHAR', true, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('SurveyQuestion', 'SurveyQuestion', RelationMap::MANY_TO_ONE, array('questionId' => 'id', ), 'CASCADE', null);
    $this->addRelation('SurveyAnswer', 'SurveyAnswer', RelationMap::ONE_TO_MANY, array('id' => 'answerOptionId', ), 'CASCADE', null);
	} // buildRelations()

} // SurveyAnswerOptionTableMap
