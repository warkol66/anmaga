<?php



/**
 * This class defines the structure of the 'surveys_question' table.
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
class SurveyQuestionTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'surveys.classes.map.SurveyQuestionTableMap';

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
		$this->setName('surveys_question');
		$this->setPhpName('SurveyQuestion');
		$this->setClassname('SurveyQuestion');
		$this->setPackage('surveys.classes');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('SURVEYID', 'Surveyid', 'INTEGER', 'surveys_survey', 'ID', true, null, null);
		$this->addColumn('QUESTION', 'Question', 'VARCHAR', true, 255, null);
		$this->addColumn('MULTIPLEANSWER', 'Multipleanswer', 'BOOLEAN', false, null, false);
		// validators
		$this->addValidator('QUESTION', 'required', 'propel.validator.RequiredValidator', '', 'La pregunta es requerida.');
		$this->addValidator('SURVEYID', 'required', 'propel.validator.RequiredValidator', '', 'La pregunta necesita una encuesta asociada.');
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Survey', 'Survey', RelationMap::MANY_TO_ONE, array('surveyId' => 'id', ), 'CASCADE', null);
    $this->addRelation('SurveyAnswerOption', 'SurveyAnswerOption', RelationMap::ONE_TO_MANY, array('id' => 'questionId', ), 'CASCADE', null);
    $this->addRelation('SurveyAnswer', 'SurveyAnswer', RelationMap::ONE_TO_MANY, array('id' => 'questionId', ), 'CASCADE', null);
	} // buildRelations()

} // SurveyQuestionTableMap
