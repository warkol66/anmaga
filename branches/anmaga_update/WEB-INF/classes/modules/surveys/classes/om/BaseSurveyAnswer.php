<?php


/**
 * Base class that represents a row from the 'surveys_answer' table.
 *
 * Respuesta seleccionada al realizar una encuesta por un usuario publico o registrado
 *
 * @package    propel.generator.surveys.classes.om
 */
abstract class BaseSurveyAnswer extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'SurveyAnswerPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SurveyAnswerPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the questionid field.
	 * @var        int
	 */
	protected $questionid;

	/**
	 * The value for the answeroptionid field.
	 * @var        int
	 */
	protected $answeroptionid;

	/**
	 * The value for the objectid field.
	 * @var        int
	 */
	protected $objectid;

	/**
	 * The value for the objecttype field.
	 * @var        string
	 */
	protected $objecttype;

	/**
	 * The value for the created_at field.
	 * @var        string
	 */
	protected $created_at;

	/**
	 * The value for the updated_at field.
	 * @var        string
	 */
	protected $updated_at;

	/**
	 * @var        SurveyQuestion
	 */
	protected $aSurveyQuestion;

	/**
	 * @var        SurveyAnswerOption
	 */
	protected $aSurveyAnswerOption;

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
	 * Get the [id] column value.
	 * Id Encuesta
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [questionid] column value.
	 * Id de Pregunta
	 * @return     int
	 */
	public function getQuestionid()
	{
		return $this->questionid;
	}

	/**
	 * Get the [answeroptionid] column value.
	 * Id de Respuesta Seleccionada
	 * @return     int
	 */
	public function getAnsweroptionid()
	{
		return $this->answeroptionid;
	}

	/**
	 * Get the [objectid] column value.
	 * Id del objeto que genero la respuesta
	 * @return     int
	 */
	public function getObjectid()
	{
		return $this->objectid;
	}

	/**
	 * Get the [objecttype] column value.
	 * Tipo de objeto que genero la respuesta
	 * @return     string
	 */
	public function getObjecttype()
	{
		return $this->objecttype;
	}

	/**
	 * Get the [optionally formatted] temporal [created_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->created_at === null) {
			return null;
		}


		if ($this->created_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->created_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [updated_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->updated_at === null) {
			return null;
		}


		if ($this->updated_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->updated_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Set the value of [id] column.
	 * Id Encuesta
	 * @param      int $v new value
	 * @return     SurveyAnswer The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SurveyAnswerPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [questionid] column.
	 * Id de Pregunta
	 * @param      int $v new value
	 * @return     SurveyAnswer The current object (for fluent API support)
	 */
	public function setQuestionid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->questionid !== $v) {
			$this->questionid = $v;
			$this->modifiedColumns[] = SurveyAnswerPeer::QUESTIONID;
		}

		if ($this->aSurveyQuestion !== null && $this->aSurveyQuestion->getId() !== $v) {
			$this->aSurveyQuestion = null;
		}

		return $this;
	} // setQuestionid()

	/**
	 * Set the value of [answeroptionid] column.
	 * Id de Respuesta Seleccionada
	 * @param      int $v new value
	 * @return     SurveyAnswer The current object (for fluent API support)
	 */
	public function setAnsweroptionid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->answeroptionid !== $v) {
			$this->answeroptionid = $v;
			$this->modifiedColumns[] = SurveyAnswerPeer::ANSWEROPTIONID;
		}

		if ($this->aSurveyAnswerOption !== null && $this->aSurveyAnswerOption->getId() !== $v) {
			$this->aSurveyAnswerOption = null;
		}

		return $this;
	} // setAnsweroptionid()

	/**
	 * Set the value of [objectid] column.
	 * Id del objeto que genero la respuesta
	 * @param      int $v new value
	 * @return     SurveyAnswer The current object (for fluent API support)
	 */
	public function setObjectid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->objectid !== $v) {
			$this->objectid = $v;
			$this->modifiedColumns[] = SurveyAnswerPeer::OBJECTID;
		}

		return $this;
	} // setObjectid()

	/**
	 * Set the value of [objecttype] column.
	 * Tipo de objeto que genero la respuesta
	 * @param      string $v new value
	 * @return     SurveyAnswer The current object (for fluent API support)
	 */
	public function setObjecttype($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->objecttype !== $v) {
			$this->objecttype = $v;
			$this->modifiedColumns[] = SurveyAnswerPeer::OBJECTTYPE;
		}

		return $this;
	} // setObjecttype()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     SurveyAnswer The current object (for fluent API support)
	 */
	public function setCreatedAt($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->created_at !== null || $dt !== null) {
			$currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->created_at = $newDateAsString;
				$this->modifiedColumns[] = SurveyAnswerPeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     SurveyAnswer The current object (for fluent API support)
	 */
	public function setUpdatedAt($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->updated_at !== null || $dt !== null) {
			$currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->updated_at = $newDateAsString;
				$this->modifiedColumns[] = SurveyAnswerPeer::UPDATED_AT;
			}
		} // if either are not null

		return $this;
	} // setUpdatedAt()

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
			$this->questionid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->answeroptionid = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->objectid = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->objecttype = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->created_at = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->updated_at = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 7; // 7 = SurveyAnswerPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating SurveyAnswer object", $e);
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

		if ($this->aSurveyQuestion !== null && $this->questionid !== $this->aSurveyQuestion->getId()) {
			$this->aSurveyQuestion = null;
		}
		if ($this->aSurveyAnswerOption !== null && $this->answeroptionid !== $this->aSurveyAnswerOption->getId()) {
			$this->aSurveyAnswerOption = null;
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
			$con = Propel::getConnection(SurveyAnswerPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SurveyAnswerPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aSurveyQuestion = null;
			$this->aSurveyAnswerOption = null;
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
			$con = Propel::getConnection(SurveyAnswerPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				SurveyAnswerQuery::create()
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
			$con = Propel::getConnection(SurveyAnswerPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// timestampable behavior
				if (!$this->isColumnModified(SurveyAnswerPeer::CREATED_AT)) {
					$this->setCreatedAt(time());
				}
				if (!$this->isColumnModified(SurveyAnswerPeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
			} else {
				$ret = $ret && $this->preUpdate($con);
				// timestampable behavior
				if ($this->isModified() && !$this->isColumnModified(SurveyAnswerPeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				SurveyAnswerPeer::addInstanceToPool($this);
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

			if ($this->aSurveyQuestion !== null) {
				if ($this->aSurveyQuestion->isModified() || $this->aSurveyQuestion->isNew()) {
					$affectedRows += $this->aSurveyQuestion->save($con);
				}
				$this->setSurveyQuestion($this->aSurveyQuestion);
			}

			if ($this->aSurveyAnswerOption !== null) {
				if ($this->aSurveyAnswerOption->isModified() || $this->aSurveyAnswerOption->isNew()) {
					$affectedRows += $this->aSurveyAnswerOption->save($con);
				}
				$this->setSurveyAnswerOption($this->aSurveyAnswerOption);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = SurveyAnswerPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(SurveyAnswerPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.SurveyAnswerPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += SurveyAnswerPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
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

			if ($this->aSurveyQuestion !== null) {
				if (!$this->aSurveyQuestion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSurveyQuestion->getValidationFailures());
				}
			}

			if ($this->aSurveyAnswerOption !== null) {
				if (!$this->aSurveyAnswerOption->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSurveyAnswerOption->getValidationFailures());
				}
			}


			if (($retval = SurveyAnswerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = SurveyAnswerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getQuestionid();
				break;
			case 2:
				return $this->getAnsweroptionid();
				break;
			case 3:
				return $this->getObjectid();
				break;
			case 4:
				return $this->getObjecttype();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getUpdatedAt();
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
		if (isset($alreadyDumpedObjects['SurveyAnswer'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['SurveyAnswer'][$this->getPrimaryKey()] = true;
		$keys = SurveyAnswerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getQuestionid(),
			$keys[2] => $this->getAnsweroptionid(),
			$keys[3] => $this->getObjectid(),
			$keys[4] => $this->getObjecttype(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getUpdatedAt(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aSurveyQuestion) {
				$result['SurveyQuestion'] = $this->aSurveyQuestion->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aSurveyAnswerOption) {
				$result['SurveyAnswerOption'] = $this->aSurveyAnswerOption->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
		$pos = SurveyAnswerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setQuestionid($value);
				break;
			case 2:
				$this->setAnsweroptionid($value);
				break;
			case 3:
				$this->setObjectid($value);
				break;
			case 4:
				$this->setObjecttype($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setUpdatedAt($value);
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
		$keys = SurveyAnswerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setQuestionid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAnsweroptionid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObjectid($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setObjecttype($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SurveyAnswerPeer::DATABASE_NAME);

		if ($this->isColumnModified(SurveyAnswerPeer::ID)) $criteria->add(SurveyAnswerPeer::ID, $this->id);
		if ($this->isColumnModified(SurveyAnswerPeer::QUESTIONID)) $criteria->add(SurveyAnswerPeer::QUESTIONID, $this->questionid);
		if ($this->isColumnModified(SurveyAnswerPeer::ANSWEROPTIONID)) $criteria->add(SurveyAnswerPeer::ANSWEROPTIONID, $this->answeroptionid);
		if ($this->isColumnModified(SurveyAnswerPeer::OBJECTID)) $criteria->add(SurveyAnswerPeer::OBJECTID, $this->objectid);
		if ($this->isColumnModified(SurveyAnswerPeer::OBJECTTYPE)) $criteria->add(SurveyAnswerPeer::OBJECTTYPE, $this->objecttype);
		if ($this->isColumnModified(SurveyAnswerPeer::CREATED_AT)) $criteria->add(SurveyAnswerPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(SurveyAnswerPeer::UPDATED_AT)) $criteria->add(SurveyAnswerPeer::UPDATED_AT, $this->updated_at);

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
		$criteria = new Criteria(SurveyAnswerPeer::DATABASE_NAME);
		$criteria->add(SurveyAnswerPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of SurveyAnswer (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setQuestionid($this->getQuestionid());
		$copyObj->setAnsweroptionid($this->getAnsweroptionid());
		$copyObj->setObjectid($this->getObjectid());
		$copyObj->setObjecttype($this->getObjecttype());
		$copyObj->setCreatedAt($this->getCreatedAt());
		$copyObj->setUpdatedAt($this->getUpdatedAt());
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
	 * @return     SurveyAnswer Clone of current object.
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
	 * @return     SurveyAnswerPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SurveyAnswerPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a SurveyQuestion object.
	 *
	 * @param      SurveyQuestion $v
	 * @return     SurveyAnswer The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSurveyQuestion(SurveyQuestion $v = null)
	{
		if ($v === null) {
			$this->setQuestionid(NULL);
		} else {
			$this->setQuestionid($v->getId());
		}

		$this->aSurveyQuestion = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SurveyQuestion object, it will not be re-added.
		if ($v !== null) {
			$v->addSurveyAnswer($this);
		}

		return $this;
	}


	/**
	 * Get the associated SurveyQuestion object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     SurveyQuestion The associated SurveyQuestion object.
	 * @throws     PropelException
	 */
	public function getSurveyQuestion(PropelPDO $con = null)
	{
		if ($this->aSurveyQuestion === null && ($this->questionid !== null)) {
			$this->aSurveyQuestion = SurveyQuestionQuery::create()->findPk($this->questionid, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aSurveyQuestion->addSurveyAnswers($this);
			 */
		}
		return $this->aSurveyQuestion;
	}

	/**
	 * Declares an association between this object and a SurveyAnswerOption object.
	 *
	 * @param      SurveyAnswerOption $v
	 * @return     SurveyAnswer The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSurveyAnswerOption(SurveyAnswerOption $v = null)
	{
		if ($v === null) {
			$this->setAnsweroptionid(NULL);
		} else {
			$this->setAnsweroptionid($v->getId());
		}

		$this->aSurveyAnswerOption = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SurveyAnswerOption object, it will not be re-added.
		if ($v !== null) {
			$v->addSurveyAnswer($this);
		}

		return $this;
	}


	/**
	 * Get the associated SurveyAnswerOption object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     SurveyAnswerOption The associated SurveyAnswerOption object.
	 * @throws     PropelException
	 */
	public function getSurveyAnswerOption(PropelPDO $con = null)
	{
		if ($this->aSurveyAnswerOption === null && ($this->answeroptionid !== null)) {
			$this->aSurveyAnswerOption = SurveyAnswerOptionQuery::create()->findPk($this->answeroptionid, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aSurveyAnswerOption->addSurveyAnswers($this);
			 */
		}
		return $this->aSurveyAnswerOption;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->questionid = null;
		$this->answeroptionid = null;
		$this->objectid = null;
		$this->objecttype = null;
		$this->created_at = null;
		$this->updated_at = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
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
		} // if ($deep)

		$this->aSurveyQuestion = null;
		$this->aSurveyAnswerOption = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(SurveyAnswerPeer::DEFAULT_STRING_FORMAT);
	}

	// timestampable behavior
	
	/**
	 * Mark the current object so that the update date doesn't get updated during next save
	 *
	 * @return     SurveyAnswer The current object (for fluent API support)
	 */
	public function keepUpdateDateUnchanged()
	{
		$this->modifiedColumns[] = SurveyAnswerPeer::UPDATED_AT;
		return $this;
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

} // BaseSurveyAnswer
