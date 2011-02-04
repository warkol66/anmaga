<?php


/**
 * Base class that represents a row from the 'affiliates_group' table.
 *
 * Groups
 *
 * @package    propel.generator.affiliates.classes.om
 */
abstract class BaseAffiliateGroup extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'AffiliateGroupPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AffiliateGroupPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the created field.
	 * @var        string
	 */
	protected $created;

	/**
	 * The value for the updated field.
	 * @var        string
	 */
	protected $updated;

	/**
	 * The value for the bitlevel field.
	 * @var        int
	 */
	protected $bitlevel;

	/**
	 * @var        array AffiliateUserGroup[] Collection to store aggregation of AffiliateUserGroup objects.
	 */
	protected $collAffiliateUserGroups;

	/**
	 * @var        array AffiliateGroupCategory[] Collection to store aggregation of AffiliateGroupCategory objects.
	 */
	protected $collAffiliateGroupCategorys;

	/**
	 * @var        array AffiliateUser[] Collection to store aggregation of AffiliateUser objects.
	 */
	protected $collAffiliateUsers;

	/**
	 * @var        array Category[] Collection to store aggregation of Category objects.
	 */
	protected $collCategorys;

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
	 * Group ID
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [name] column value.
	 * Group Name
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [optionally formatted] temporal [created] column value.
	 * Creation date for
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCreated($format = 'Y-m-d H:i:s')
	{
		if ($this->created === null) {
			return null;
		}


		if ($this->created === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->created);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created, true), $x);
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
	 * Get the [optionally formatted] temporal [updated] column value.
	 * Last update date
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getUpdated($format = 'Y-m-d H:i:s')
	{
		if ($this->updated === null) {
			return null;
		}


		if ($this->updated === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->updated);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated, true), $x);
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
	 * Get the [bitlevel] column value.
	 * Nivel
	 * @return     int
	 */
	public function getBitlevel()
	{
		return $this->bitlevel;
	}

	/**
	 * Set the value of [id] column.
	 * Group ID
	 * @param      int $v new value
	 * @return     AffiliateGroup The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AffiliateGroupPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [name] column.
	 * Group Name
	 * @param      string $v new value
	 * @return     AffiliateGroup The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = AffiliateGroupPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Sets the value of [created] column to a normalized version of the date/time value specified.
	 * Creation date for
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     AffiliateGroup The current object (for fluent API support)
	 */
	public function setCreated($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->created !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->created !== null && $tmpDt = new DateTime($this->created)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->created = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = AffiliateGroupPeer::CREATED;
			}
		} // if either are not null

		return $this;
	} // setCreated()

	/**
	 * Sets the value of [updated] column to a normalized version of the date/time value specified.
	 * Last update date
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     AffiliateGroup The current object (for fluent API support)
	 */
	public function setUpdated($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->updated !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->updated !== null && $tmpDt = new DateTime($this->updated)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->updated = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = AffiliateGroupPeer::UPDATED;
			}
		} // if either are not null

		return $this;
	} // setUpdated()

	/**
	 * Set the value of [bitlevel] column.
	 * Nivel
	 * @param      int $v new value
	 * @return     AffiliateGroup The current object (for fluent API support)
	 */
	public function setBitlevel($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->bitlevel !== $v) {
			$this->bitlevel = $v;
			$this->modifiedColumns[] = AffiliateGroupPeer::BITLEVEL;
		}

		return $this;
	} // setBitlevel()

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
			$this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->created = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->updated = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->bitlevel = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 5; // 5 = AffiliateGroupPeer::NUM_COLUMNS - AffiliateGroupPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating AffiliateGroup object", $e);
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
			$con = Propel::getConnection(AffiliateGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = AffiliateGroupPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collAffiliateUserGroups = null;

			$this->collAffiliateGroupCategorys = null;

			$this->collAffiliateUsers = null;
			$this->collCategorys = null;
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
			$con = Propel::getConnection(AffiliateGroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				AffiliateGroupQuery::create()
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
			$con = Propel::getConnection(AffiliateGroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				AffiliateGroupPeer::addInstanceToPool($this);
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

			if ($this->isNew() ) {
				$this->modifiedColumns[] = AffiliateGroupPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(AffiliateGroupPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.AffiliateGroupPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = AffiliateGroupPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collAffiliateUserGroups !== null) {
				foreach ($this->collAffiliateUserGroups as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAffiliateGroupCategorys !== null) {
				foreach ($this->collAffiliateGroupCategorys as $referrerFK) {
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


			if (($retval = AffiliateGroupPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAffiliateUserGroups !== null) {
					foreach ($this->collAffiliateUserGroups as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAffiliateGroupCategorys !== null) {
					foreach ($this->collAffiliateGroupCategorys as $referrerFK) {
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
		$pos = AffiliateGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getName();
				break;
			case 2:
				return $this->getCreated();
				break;
			case 3:
				return $this->getUpdated();
				break;
			case 4:
				return $this->getBitlevel();
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
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = AffiliateGroupPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getCreated(),
			$keys[3] => $this->getUpdated(),
			$keys[4] => $this->getBitlevel(),
		);
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
		$pos = AffiliateGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setName($value);
				break;
			case 2:
				$this->setCreated($value);
				break;
			case 3:
				$this->setUpdated($value);
				break;
			case 4:
				$this->setBitlevel($value);
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
		$keys = AffiliateGroupPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCreated($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUpdated($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setBitlevel($arr[$keys[4]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(AffiliateGroupPeer::DATABASE_NAME);

		if ($this->isColumnModified(AffiliateGroupPeer::ID)) $criteria->add(AffiliateGroupPeer::ID, $this->id);
		if ($this->isColumnModified(AffiliateGroupPeer::NAME)) $criteria->add(AffiliateGroupPeer::NAME, $this->name);
		if ($this->isColumnModified(AffiliateGroupPeer::CREATED)) $criteria->add(AffiliateGroupPeer::CREATED, $this->created);
		if ($this->isColumnModified(AffiliateGroupPeer::UPDATED)) $criteria->add(AffiliateGroupPeer::UPDATED, $this->updated);
		if ($this->isColumnModified(AffiliateGroupPeer::BITLEVEL)) $criteria->add(AffiliateGroupPeer::BITLEVEL, $this->bitlevel);

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
		$criteria = new Criteria(AffiliateGroupPeer::DATABASE_NAME);
		$criteria->add(AffiliateGroupPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of AffiliateGroup (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setName($this->name);
		$copyObj->setCreated($this->created);
		$copyObj->setUpdated($this->updated);
		$copyObj->setBitlevel($this->bitlevel);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getAffiliateUserGroups() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAffiliateUserGroup($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAffiliateGroupCategorys() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAffiliateGroupCategory($relObj->copy($deepCopy));
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
	 * @return     AffiliateGroup Clone of current object.
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
	 * @return     AffiliateGroupPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AffiliateGroupPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collAffiliateUserGroups collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAffiliateUserGroups()
	 */
	public function clearAffiliateUserGroups()
	{
		$this->collAffiliateUserGroups = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAffiliateUserGroups collection.
	 *
	 * By default this just sets the collAffiliateUserGroups collection to an empty array (like clearcollAffiliateUserGroups());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAffiliateUserGroups()
	{
		$this->collAffiliateUserGroups = new PropelObjectCollection();
		$this->collAffiliateUserGroups->setModel('AffiliateUserGroup');
	}

	/**
	 * Gets an array of AffiliateUserGroup objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this AffiliateGroup is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AffiliateUserGroup[] List of AffiliateUserGroup objects
	 * @throws     PropelException
	 */
	public function getAffiliateUserGroups($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateUserGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateUserGroups) {
				// return empty collection
				$this->initAffiliateUserGroups();
			} else {
				$collAffiliateUserGroups = AffiliateUserGroupQuery::create(null, $criteria)
					->filterByAffiliateGroup($this)
					->find($con);
				if (null !== $criteria) {
					return $collAffiliateUserGroups;
				}
				$this->collAffiliateUserGroups = $collAffiliateUserGroups;
			}
		}
		return $this->collAffiliateUserGroups;
	}

	/**
	 * Returns the number of related AffiliateUserGroup objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AffiliateUserGroup objects.
	 * @throws     PropelException
	 */
	public function countAffiliateUserGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateUserGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateUserGroups) {
				return 0;
			} else {
				$query = AffiliateUserGroupQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliateGroup($this)
					->count($con);
			}
		} else {
			return count($this->collAffiliateUserGroups);
		}
	}

	/**
	 * Method called to associate a AffiliateUserGroup object to this object
	 * through the AffiliateUserGroup foreign key attribute.
	 *
	 * @param      AffiliateUserGroup $l AffiliateUserGroup
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAffiliateUserGroup(AffiliateUserGroup $l)
	{
		if ($this->collAffiliateUserGroups === null) {
			$this->initAffiliateUserGroups();
		}
		if (!$this->collAffiliateUserGroups->contains($l)) { // only add it if the **same** object is not already associated
			$this->collAffiliateUserGroups[]= $l;
			$l->setAffiliateGroup($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AffiliateGroup is new, it will return
	 * an empty collection; or if this AffiliateGroup has previously
	 * been saved, it will retrieve related AffiliateUserGroups from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AffiliateGroup.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array AffiliateUserGroup[] List of AffiliateUserGroup objects
	 */
	public function getAffiliateUserGroupsJoinAffiliateUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AffiliateUserGroupQuery::create(null, $criteria);
		$query->joinWith('AffiliateUser', $join_behavior);

		return $this->getAffiliateUserGroups($query, $con);
	}

	/**
	 * Clears out the collAffiliateGroupCategorys collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAffiliateGroupCategorys()
	 */
	public function clearAffiliateGroupCategorys()
	{
		$this->collAffiliateGroupCategorys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAffiliateGroupCategorys collection.
	 *
	 * By default this just sets the collAffiliateGroupCategorys collection to an empty array (like clearcollAffiliateGroupCategorys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAffiliateGroupCategorys()
	{
		$this->collAffiliateGroupCategorys = new PropelObjectCollection();
		$this->collAffiliateGroupCategorys->setModel('AffiliateGroupCategory');
	}

	/**
	 * Gets an array of AffiliateGroupCategory objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this AffiliateGroup is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AffiliateGroupCategory[] List of AffiliateGroupCategory objects
	 * @throws     PropelException
	 */
	public function getAffiliateGroupCategorys($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateGroupCategorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateGroupCategorys) {
				// return empty collection
				$this->initAffiliateGroupCategorys();
			} else {
				$collAffiliateGroupCategorys = AffiliateGroupCategoryQuery::create(null, $criteria)
					->filterByAffiliateGroup($this)
					->find($con);
				if (null !== $criteria) {
					return $collAffiliateGroupCategorys;
				}
				$this->collAffiliateGroupCategorys = $collAffiliateGroupCategorys;
			}
		}
		return $this->collAffiliateGroupCategorys;
	}

	/**
	 * Returns the number of related AffiliateGroupCategory objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AffiliateGroupCategory objects.
	 * @throws     PropelException
	 */
	public function countAffiliateGroupCategorys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateGroupCategorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateGroupCategorys) {
				return 0;
			} else {
				$query = AffiliateGroupCategoryQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliateGroup($this)
					->count($con);
			}
		} else {
			return count($this->collAffiliateGroupCategorys);
		}
	}

	/**
	 * Method called to associate a AffiliateGroupCategory object to this object
	 * through the AffiliateGroupCategory foreign key attribute.
	 *
	 * @param      AffiliateGroupCategory $l AffiliateGroupCategory
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAffiliateGroupCategory(AffiliateGroupCategory $l)
	{
		if ($this->collAffiliateGroupCategorys === null) {
			$this->initAffiliateGroupCategorys();
		}
		if (!$this->collAffiliateGroupCategorys->contains($l)) { // only add it if the **same** object is not already associated
			$this->collAffiliateGroupCategorys[]= $l;
			$l->setAffiliateGroup($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AffiliateGroup is new, it will return
	 * an empty collection; or if this AffiliateGroup has previously
	 * been saved, it will retrieve related AffiliateGroupCategorys from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AffiliateGroup.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array AffiliateGroupCategory[] List of AffiliateGroupCategory objects
	 */
	public function getAffiliateGroupCategorysJoinCategory($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AffiliateGroupCategoryQuery::create(null, $criteria);
		$query->joinWith('Category', $join_behavior);

		return $this->getAffiliateGroupCategorys($query, $con);
	}

	/**
	 * Clears out the collAffiliateUsers collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAffiliateUsers()
	 */
	public function clearAffiliateUsers()
	{
		$this->collAffiliateUsers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAffiliateUsers collection.
	 *
	 * By default this just sets the collAffiliateUsers collection to an empty collection (like clearAffiliateUsers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAffiliateUsers()
	{
		$this->collAffiliateUsers = new PropelObjectCollection();
		$this->collAffiliateUsers->setModel('AffiliateUser');
	}

	/**
	 * Gets a collection of AffiliateUser objects related by a many-to-many relationship
	 * to the current object by way of the affiliates_userGroup cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this AffiliateGroup is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array AffiliateUser[] List of AffiliateUser objects
	 */
	public function getAffiliateUsers($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateUsers || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateUsers) {
				// return empty collection
				$this->initAffiliateUsers();
			} else {
				$collAffiliateUsers = AffiliateUserQuery::create(null, $criteria)
					->filterByAffiliateGroup($this)
					->find($con);
				if (null !== $criteria) {
					return $collAffiliateUsers;
				}
				$this->collAffiliateUsers = $collAffiliateUsers;
			}
		}
		return $this->collAffiliateUsers;
	}

	/**
	 * Gets the number of AffiliateUser objects related by a many-to-many relationship
	 * to the current object by way of the affiliates_userGroup cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related AffiliateUser objects
	 */
	public function countAffiliateUsers($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateUsers || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateUsers) {
				return 0;
			} else {
				$query = AffiliateUserQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliateGroup($this)
					->count($con);
			}
		} else {
			return count($this->collAffiliateUsers);
		}
	}

	/**
	 * Associate a AffiliateUser object to this object
	 * through the affiliates_userGroup cross reference table.
	 *
	 * @param      AffiliateUser $affiliateUser The AffiliateUserGroup object to relate
	 * @return     void
	 */
	public function addAffiliateUser($affiliateUser)
	{
		if ($this->collAffiliateUsers === null) {
			$this->initAffiliateUsers();
		}
		if (!$this->collAffiliateUsers->contains($affiliateUser)) { // only add it if the **same** object is not already associated
			$affiliateUserGroup = new AffiliateUserGroup();
			$affiliateUserGroup->setAffiliateUser($affiliateUser);
			$this->addAffiliateUserGroup($affiliateUserGroup);

			$this->collAffiliateUsers[]= $affiliateUser;
		}
	}

	/**
	 * Clears out the collCategorys collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCategorys()
	 */
	public function clearCategorys()
	{
		$this->collCategorys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCategorys collection.
	 *
	 * By default this just sets the collCategorys collection to an empty collection (like clearCategorys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCategorys()
	{
		$this->collCategorys = new PropelObjectCollection();
		$this->collCategorys->setModel('Category');
	}

	/**
	 * Gets a collection of Category objects related by a many-to-many relationship
	 * to the current object by way of the affiliates_groupCategory cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this AffiliateGroup is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Category[] List of Category objects
	 */
	public function getCategorys($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCategorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collCategorys) {
				// return empty collection
				$this->initCategorys();
			} else {
				$collCategorys = CategoryQuery::create(null, $criteria)
					->filterByAffiliateGroup($this)
					->find($con);
				if (null !== $criteria) {
					return $collCategorys;
				}
				$this->collCategorys = $collCategorys;
			}
		}
		return $this->collCategorys;
	}

	/**
	 * Gets the number of Category objects related by a many-to-many relationship
	 * to the current object by way of the affiliates_groupCategory cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Category objects
	 */
	public function countCategorys($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCategorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collCategorys) {
				return 0;
			} else {
				$query = CategoryQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliateGroup($this)
					->count($con);
			}
		} else {
			return count($this->collCategorys);
		}
	}

	/**
	 * Associate a Category object to this object
	 * through the affiliates_groupCategory cross reference table.
	 *
	 * @param      Category $category The AffiliateGroupCategory object to relate
	 * @return     void
	 */
	public function addCategory($category)
	{
		if ($this->collCategorys === null) {
			$this->initCategorys();
		}
		if (!$this->collCategorys->contains($category)) { // only add it if the **same** object is not already associated
			$affiliateGroupCategory = new AffiliateGroupCategory();
			$affiliateGroupCategory->setCategory($category);
			$this->addAffiliateGroupCategory($affiliateGroupCategory);

			$this->collCategorys[]= $category;
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->name = null;
		$this->created = null;
		$this->updated = null;
		$this->bitlevel = null;
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
			if ($this->collAffiliateUserGroups) {
				foreach ((array) $this->collAffiliateUserGroups as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAffiliateGroupCategorys) {
				foreach ((array) $this->collAffiliateGroupCategorys as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collAffiliateUserGroups = null;
		$this->collAffiliateGroupCategorys = null;
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

} // BaseAffiliateGroup
