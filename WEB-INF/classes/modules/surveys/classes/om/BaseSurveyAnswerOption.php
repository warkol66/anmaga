<?php


/**
 * Base class that represents a row from the 'surveys_answerOption' table.
 *
 * Opciones de respuesta para una determinada Pregunta
 *
 * @package    propel.generator.surveys.classes.om
 */
abstract class BaseSurveyAnswerOption extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'SurveyAnswerOptionPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SurveyAnswerOptionPeer
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
	 * The value for the answer field.
	 * @var        string
	 */
	protected $answer;

	/**
	 * @var        SurveyQuestion
	 */
	protected $aSurveyQuestion;

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
	 * Get the [id] column value.
	 * Id de pregunta de encuesta
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
	 * Get the [answer] column value.
	 * Respuesta de la encuesta
	 * @return     string
	 */
	public function getAnswer()
	{
		return $this->answer;
	}

	/**
	 * Set the value of [id] column.
	 * Id de pregunta de encuesta
	 * @param      int $v new value
	 * @return     SurveyAnswerOption The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SurveyAnswerOptionPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [questionid] column.
	 * Id de Pregunta
	 * @param      int $v new value
	 * @return     SurveyAnswerOption The current object (for fluent API support)
	 */
	public function setQuestionid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->questionid !== $v) {
			$this->questionid = $v;
			$this->modifiedColumns[] = SurveyAnswerOptionPeer::QUESTIONID;
		}

		if ($this->aSurveyQuestion !== null && $this->aSurveyQuestion->getId() !== $v) {
			$this->aSurveyQuestion = null;
		}

		return $this;
	} // setQuestionid()

	/**
	 * Set the value of [answer] column.
	 * Respuesta de la encuesta
	 * @param      string $v new value
	 * @return     SurveyAnswerOption The current object (for fluent API support)
	 */
	public function setAnswer($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->answer !== $v) {
			$this->answer = $v;
			$this->modifiedColumns[] = SurveyAnswerOptionPeer::ANSWER;
		}

		return $this;
	} // setAnswer()

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
			$this->answer = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 3; // 3 = SurveyAnswerOptionPeer::NUM_COLUMNS - SurveyAnswerOptionPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating SurveyAnswerOption object", $e);
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
			$con = Propel::getConnection(SurveyAnswerOptionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SurveyAnswerOptionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aSurveyQuestion = null;
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
			$con = Propel::getConnection(SurveyAnswerOptionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				SurveyAnswerOptionQuery::create()
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
			$con = Propel::getConnection(SurveyAnswerOptionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				SurveyAnswerOptionPeer::addInstanceToPool($this);
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

			if ($this->isNew() ) {
				$this->modifiedColumns[] = SurveyAnswerOptionPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(SurveyAnswerOptionPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.SurveyAnswerOptionPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += SurveyAnswerOptionPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
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

			if ($this->aSurveyQuestion !== null) {
				if (!$this->aSurveyQuestion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSurveyQuestion->getValidationFailures());
				}
			}


			if (($retval = SurveyAnswerOptionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = SurveyAnswerOptionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getAnswer();
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
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $includeForeignObjects = false)
	{
		$keys = SurveyAnswerOptionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getQuestionid(),
			$keys[2] => $this->getAnswer(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aSurveyQuestion) {
				$result['SurveyQuestion'] = $this->aSurveyQuestion->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = SurveyAnswerOptionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setAnswer($value);
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
		$keys = SurveyAnswerOptionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setQuestionid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAnswer($arr[$keys[2]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SurveyAnswerOptionPeer::DATABASE_NAME);

		if ($this->isColumnModified(SurveyAnswerOptionPeer::ID)) $criteria->add(SurveyAnswerOptionPeer::ID, $this->id);
		if ($this->isColumnModified(SurveyAnswerOptionPeer::QUESTIONID)) $criteria->add(SurveyAnswerOptionPeer::QUESTIONID, $this->questionid);
		if ($this->isColumnModified(SurveyAnswerOptionPeer::ANSWER)) $criteria->add(SurveyAnswerOptionPeer::ANSWER, $this->answer);

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
		$criteria = new Criteria(SurveyAnswerOptionPeer::DATABASE_NAME);
		$criteria->add(SurveyAnswerOptionPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of SurveyAnswerOption (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setQuestionid($this->questionid);
		$copyObj->setAnswer($this->answer);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getSurveyAnswers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSurveyAnswer($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);
		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     SurveyAnswerOption Clone of current object.
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
	 * @return     SurveyAnswerOptionPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SurveyAnswerOptionPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a SurveyQuestion object.
	 *
	 * @param      SurveyQuestion $v
	 * @return     SurveyAnswerOption The current object (for fluent API support)
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
			$v->addSurveyAnswerOption($this);
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
				 $this->aSurveyQuestion->addSurveyAnswerOptions($this);
			 */
		}
		return $this->aSurveyQuestion;
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
	 * @return     void
	 */
	public function initSurveyAnswers()
	{
		$this->collSurveyAnswers = new PropelObjectCollection();
		$this->collSurveyAnswers->setModel('SurveyAnswer');
	}

	/**
	 * Gets an array of SurveyAnswer objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SurveyAnswerOption is new, it will return
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
					->filterBySurveyAnswerOption($this)
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
					->filterBySurveyAnswerOption($this)
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
			$l->setSurveyAnswerOption($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SurveyAnswerOption is new, it will return
	 * an empty collection; or if this SurveyAnswerOption has previously
	 * been saved, it will retrieve related SurveyAnswers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SurveyAnswerOption.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SurveyAnswer[] List of SurveyAnswer objects
	 */
	public function getSurveyAnswersJoinSurveyQuestion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SurveyAnswerQuery::create(null, $criteria);
		$query->joinWith('SurveyQuestion', $join_behavior);

		return $this->getSurveyAnswers($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->questionid = null;
		$this->answer = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collSurveyAnswers) {
				foreach ((array) $this->collSurveyAnswers as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collSurveyAnswers = null;
		$this->aSurveyQuestion = null;
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

} // BaseSurveyAnswerOption
