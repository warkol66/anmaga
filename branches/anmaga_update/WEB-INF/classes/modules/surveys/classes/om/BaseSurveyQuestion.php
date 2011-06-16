<?php


/**
 * Base class that represents a row from the 'surveys_question' table.
 *
 * Pregunta a Encuesta
 *
 * @package    propel.generator.surveys.classes.om
 */
abstract class BaseSurveyQuestion extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'SurveyQuestionPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SurveyQuestionPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the surveyid field.
	 * @var        int
	 */
	protected $surveyid;

	/**
	 * The value for the question field.
	 * @var        string
	 */
	protected $question;

	/**
	 * The value for the multipleanswer field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $multipleanswer;

	/**
	 * @var        Survey
	 */
	protected $aSurvey;

	/**
	 * @var        array SurveyAnswerOption[] Collection to store aggregation of SurveyAnswerOption objects.
	 */
	protected $collSurveyAnswerOptions;

	/**
	 * @var        array SurveyAnswer[] Collection to store aggregation of SurveyAnswer objects.
	 */
	protected $collSurveyAnswers;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->multipleanswer = false;
	}

	/**
	 * Initializes internal state of BaseSurveyQuestion object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [id] column value.
	 * Id Encuesta
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [surveyid] column value.
	 * Id Encuesta
	 * @return     int
	 */
	public function getSurveyid()
	{
		return $this->surveyid;
	}

	/**
	 * Get the [question] column value.
	 * Pregunta de la encuesta
	 * @return     string
	 */
	public function getQuestion()
	{
		return $this->question;
	}

	/**
	 * Get the [multipleanswer] column value.
	 * Soporta seleccion de multiples respuestas?
	 * @return     boolean
	 */
	public function getMultipleanswer()
	{
		return $this->multipleanswer;
	}

	/**
	 * Set the value of [id] column.
	 * Id Encuesta
	 * @param      int $v new value
	 * @return     SurveyQuestion The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SurveyQuestionPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [surveyid] column.
	 * Id Encuesta
	 * @param      int $v new value
	 * @return     SurveyQuestion The current object (for fluent API support)
	 */
	public function setSurveyid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->surveyid !== $v) {
			$this->surveyid = $v;
			$this->modifiedColumns[] = SurveyQuestionPeer::SURVEYID;
		}

		if ($this->aSurvey !== null && $this->aSurvey->getId() !== $v) {
			$this->aSurvey = null;
		}

		return $this;
	} // setSurveyid()

	/**
	 * Set the value of [question] column.
	 * Pregunta de la encuesta
	 * @param      string $v new value
	 * @return     SurveyQuestion The current object (for fluent API support)
	 */
	public function setQuestion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->question !== $v) {
			$this->question = $v;
			$this->modifiedColumns[] = SurveyQuestionPeer::QUESTION;
		}

		return $this;
	} // setQuestion()

	/**
	 * Sets the value of the [multipleanswer] column. 
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * Soporta seleccion de multiples respuestas?
	 * @param      boolean|integer|string $v The new value
	 * @return     SurveyQuestion The current object (for fluent API support)
	 */
	public function setMultipleanswer($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->multipleanswer !== $v || $this->isNew()) {
			$this->multipleanswer = $v;
			$this->modifiedColumns[] = SurveyQuestionPeer::MULTIPLEANSWER;
		}

		return $this;
	} // setMultipleanswer()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->multipleanswer !== false) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->surveyid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->question = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->multipleanswer = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 4; // 4 = SurveyQuestionPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating SurveyQuestion object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aSurvey !== null && $this->surveyid !== $this->aSurvey->getId()) {
			$this->aSurvey = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SurveyQuestionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SurveyQuestionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aSurvey = null;
			$this->collSurveyAnswerOptions = null;

			$this->collSurveyAnswers = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SurveyQuestionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				SurveyQuestionQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SurveyQuestionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				SurveyQuestionPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aSurvey !== null) {
				if ($this->aSurvey->isModified() || $this->aSurvey->isNew()) {
					$affectedRows += $this->aSurvey->save($con);
				}
				$this->setSurvey($this->aSurvey);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = SurveyQuestionPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(SurveyQuestionPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.SurveyQuestionPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += SurveyQuestionPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collSurveyAnswerOptions !== null) {
				foreach ($this->collSurveyAnswerOptions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSurveyAnswers !== null) {
				foreach ($this->collSurveyAnswers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aSurvey !== null) {
				if (!$this->aSurvey->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSurvey->getValidationFailures());
				}
			}


			if (($retval = SurveyQuestionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collSurveyAnswerOptions !== null) {
					foreach ($this->collSurveyAnswerOptions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSurveyAnswers !== null) {
					foreach ($this->collSurveyAnswers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SurveyQuestionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getSurveyid();
				break;
			case 2:
				return $this->getQuestion();
				break;
			case 3:
				return $this->getMultipleanswer();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
	{
		if (isset($alreadyDumpedObjects['SurveyQuestion'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['SurveyQuestion'][$this->getPrimaryKey()] = true;
		$keys = SurveyQuestionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getSurveyid(),
			$keys[2] => $this->getQuestion(),
			$keys[3] => $this->getMultipleanswer(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aSurvey) {
				$result['Survey'] = $this->aSurvey->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collSurveyAnswerOptions) {
				$result['SurveyAnswerOptions'] = $this->collSurveyAnswerOptions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collSurveyAnswers) {
				$result['SurveyAnswers'] = $this->collSurveyAnswers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SurveyQuestionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setSurveyid($value);
				break;
			case 2:
				$this->setQuestion($value);
				break;
			case 3:
				$this->setMultipleanswer($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SurveyQuestionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSurveyid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setQuestion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMultipleanswer($arr[$keys[3]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SurveyQuestionPeer::DATABASE_NAME);

		if ($this->isColumnModified(SurveyQuestionPeer::ID)) $criteria->add(SurveyQuestionPeer::ID, $this->id);
		if ($this->isColumnModified(SurveyQuestionPeer::SURVEYID)) $criteria->add(SurveyQuestionPeer::SURVEYID, $this->surveyid);
		if ($this->isColumnModified(SurveyQuestionPeer::QUESTION)) $criteria->add(SurveyQuestionPeer::QUESTION, $this->question);
		if ($this->isColumnModified(SurveyQuestionPeer::MULTIPLEANSWER)) $criteria->add(SurveyQuestionPeer::MULTIPLEANSWER, $this->multipleanswer);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SurveyQuestionPeer::DATABASE_NAME);
		$criteria->add(SurveyQuestionPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of SurveyQuestion (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setSurveyid($this->getSurveyid());
		$copyObj->setQuestion($this->getQuestion());
		$copyObj->setMultipleanswer($this->getMultipleanswer());

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getSurveyAnswerOptions() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSurveyAnswerOption($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSurveyAnswers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSurveyAnswer($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
		}
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     SurveyQuestion Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     SurveyQuestionPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SurveyQuestionPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Survey object.
	 *
	 * @param      Survey $v
	 * @return     SurveyQuestion The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSurvey(Survey $v = null)
	{
		if ($v === null) {
			$this->setSurveyid(NULL);
		} else {
			$this->setSurveyid($v->getId());
		}

		$this->aSurvey = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Survey object, it will not be re-added.
		if ($v !== null) {
			$v->addSurveyQuestion($this);
		}

		return $this;
	}


	/**
	 * Get the associated Survey object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Survey The associated Survey object.
	 * @throws     PropelException
	 */
	public function getSurvey(PropelPDO $con = null)
	{
		if ($this->aSurvey === null && ($this->surveyid !== null)) {
			$this->aSurvey = SurveyQuery::create()->findPk($this->surveyid, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aSurvey->addSurveyQuestions($this);
			 */
		}
		return $this->aSurvey;
	}

	/**
	 * Clears out the collSurveyAnswerOptions collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSurveyAnswerOptions()
	 */
	public function clearSurveyAnswerOptions()
	{
		$this->collSurveyAnswerOptions = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSurveyAnswerOptions collection.
	 *
	 * By default this just sets the collSurveyAnswerOptions collection to an empty array (like clearcollSurveyAnswerOptions());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initSurveyAnswerOptions($overrideExisting = true)
	{
		if (null !== $this->collSurveyAnswerOptions && !$overrideExisting) {
			return;
		}
		$this->collSurveyAnswerOptions = new PropelObjectCollection();
		$this->collSurveyAnswerOptions->setModel('SurveyAnswerOption');
	}

	/**
	 * Gets an array of SurveyAnswerOption objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SurveyQuestion is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SurveyAnswerOption[] List of SurveyAnswerOption objects
	 * @throws     PropelException
	 */
	public function getSurveyAnswerOptions($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSurveyAnswerOptions || null !== $criteria) {
			if ($this->isNew() && null === $this->collSurveyAnswerOptions) {
				// return empty collection
				$this->initSurveyAnswerOptions();
			} else {
				$collSurveyAnswerOptions = SurveyAnswerOptionQuery::create(null, $criteria)
					->filterBySurveyQuestion($this)
					->find($con);
				if (null !== $criteria) {
					return $collSurveyAnswerOptions;
				}
				$this->collSurveyAnswerOptions = $collSurveyAnswerOptions;
			}
		}
		return $this->collSurveyAnswerOptions;
	}

	/**
	 * Returns the number of related SurveyAnswerOption objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SurveyAnswerOption objects.
	 * @throws     PropelException
	 */
	public function countSurveyAnswerOptions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSurveyAnswerOptions || null !== $criteria) {
			if ($this->isNew() && null === $this->collSurveyAnswerOptions) {
				return 0;
			} else {
				$query = SurveyAnswerOptionQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBySurveyQuestion($this)
					->count($con);
			}
		} else {
			return count($this->collSurveyAnswerOptions);
		}
	}

	/**
	 * Method called to associate a SurveyAnswerOption object to this object
	 * through the SurveyAnswerOption foreign key attribute.
	 *
	 * @param      SurveyAnswerOption $l SurveyAnswerOption
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSurveyAnswerOption(SurveyAnswerOption $l)
	{
		if ($this->collSurveyAnswerOptions === null) {
			$this->initSurveyAnswerOptions();
		}
		if (!$this->collSurveyAnswerOptions->contains($l)) { // only add it if the **same** object is not already associated
			$this->collSurveyAnswerOptions[]= $l;
			$l->setSurveyQuestion($this);
		}
	}

	/**
	 * Clears out the collSurveyAnswers collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSurveyAnswers()
	 */
	public function clearSurveyAnswers()
	{
		$this->collSurveyAnswers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSurveyAnswers collection.
	 *
	 * By default this just sets the collSurveyAnswers collection to an empty array (like clearcollSurveyAnswers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initSurveyAnswers($overrideExisting = true)
	{
		if (null !== $this->collSurveyAnswers && !$overrideExisting) {
			return;
		}
		$this->collSurveyAnswers = new PropelObjectCollection();
		$this->collSurveyAnswers->setModel('SurveyAnswer');
	}

	/**
	 * Gets an array of SurveyAnswer objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SurveyQuestion is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SurveyAnswer[] List of SurveyAnswer objects
	 * @throws     PropelException
	 */
	public function getSurveyAnswers($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSurveyAnswers || null !== $criteria) {
			if ($this->isNew() && null === $this->collSurveyAnswers) {
				// return empty collection
				$this->initSurveyAnswers();
			} else {
				$collSurveyAnswers = SurveyAnswerQuery::create(null, $criteria)
					->filterBySurveyQuestion($this)
					->find($con);
				if (null !== $criteria) {
					return $collSurveyAnswers;
				}
				$this->collSurveyAnswers = $collSurveyAnswers;
			}
		}
		return $this->collSurveyAnswers;
	}

	/**
	 * Returns the number of related SurveyAnswer objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SurveyAnswer objects.
	 * @throws     PropelException
	 */
	public function countSurveyAnswers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSurveyAnswers || null !== $criteria) {
			if ($this->isNew() && null === $this->collSurveyAnswers) {
				return 0;
			} else {
				$query = SurveyAnswerQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBySurveyQuestion($this)
					->count($con);
			}
		} else {
			return count($this->collSurveyAnswers);
		}
	}

	/**
	 * Method called to associate a SurveyAnswer object to this object
	 * through the SurveyAnswer foreign key attribute.
	 *
	 * @param      SurveyAnswer $l SurveyAnswer
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSurveyAnswer(SurveyAnswer $l)
	{
		if ($this->collSurveyAnswers === null) {
			$this->initSurveyAnswers();
		}
		if (!$this->collSurveyAnswers->contains($l)) { // only add it if the **same** object is not already associated
			$this->collSurveyAnswers[]= $l;
			$l->setSurveyQuestion($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SurveyQuestion is new, it will return
	 * an empty collection; or if this SurveyQuestion has previously
	 * been saved, it will retrieve related SurveyAnswers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SurveyQuestion.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SurveyAnswer[] List of SurveyAnswer objects
	 */
	public function getSurveyAnswersJoinSurveyAnswerOption($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SurveyAnswerQuery::create(null, $criteria);
		$query->joinWith('SurveyAnswerOption', $join_behavior);

		return $this->getSurveyAnswers($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->surveyid = null;
		$this->question = null;
		$this->multipleanswer = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collSurveyAnswerOptions) {
				foreach ($this->collSurveyAnswerOptions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSurveyAnswers) {
				foreach ($this->collSurveyAnswers as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collSurveyAnswerOptions instanceof PropelCollection) {
			$this->collSurveyAnswerOptions->clearIterator();
		}
		$this->collSurveyAnswerOptions = null;
		if ($this->collSurveyAnswers instanceof PropelCollection) {
			$this->collSurveyAnswers->clearIterator();
		}
		$this->collSurveyAnswers = null;
		$this->aSurvey = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(SurveyQuestionPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		if (preg_match('/get(\w+)/', $name, $matches)) {
			$virtualColumn = $matches[1];
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
			// no lcfirst in php<5.3...
			$virtualColumn[0] = strtolower($virtualColumn[0]);
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
		}
		return parent::__call($name, $params);
	}

} // BaseSurveyQuestion
