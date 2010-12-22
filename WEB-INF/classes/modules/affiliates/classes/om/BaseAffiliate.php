<?php


/**
 * Base class that represents a row from the 'affiliates_affiliate' table.
 *
 * Afiliados
 *
 * @package    propel.generator.affiliates.classes.om
 */
abstract class BaseAffiliate extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'AffiliatePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AffiliatePeer
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
	 * The value for the ownerid field.
	 * @var        int
	 */
	protected $ownerid;

	/**
	 * @var        AffiliateInfo one-to-one related AffiliateInfo object
	 */
	protected $singleAffiliateInfo;

	/**
	 * @var        array AffiliateUser[] Collection to store aggregation of AffiliateUser objects.
	 */
	protected $collAffiliateUsers;

	/**
	 * @var        array AffiliateProduct[] Collection to store aggregation of AffiliateProduct objects.
	 */
	protected $collAffiliateProducts;

	/**
	 * @var        array AffiliateProductCode[] Collection to store aggregation of AffiliateProductCode objects.
	 */
	protected $collAffiliateProductCodes;

	/**
	 * @var        array Branch[] Collection to store aggregation of Branch objects.
	 */
	protected $collBranchs;

	/**
	 * @var        array Order[] Collection to store aggregation of Order objects.
	 */
	protected $collOrders;

	/**
	 * @var        array OrderStateChange[] Collection to store aggregation of OrderStateChange objects.
	 */
	protected $collOrderStateChanges;

	/**
	 * @var        array OrderTemplate[] Collection to store aggregation of OrderTemplate objects.
	 */
	protected $collOrderTemplates;

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
	 * Id afiliado
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [name] column value.
	 * nombre afiliado
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [ownerid] column value.
	 * Id del usuario administrador del afiliado
	 * @return     int
	 */
	public function getOwnerid()
	{
		return $this->ownerid;
	}

	/**
	 * Set the value of [id] column.
	 * Id afiliado
	 * @param      int $v new value
	 * @return     Affiliate The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AffiliatePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [name] column.
	 * nombre afiliado
	 * @param      string $v new value
	 * @return     Affiliate The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = AffiliatePeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [ownerid] column.
	 * Id del usuario administrador del afiliado
	 * @param      int $v new value
	 * @return     Affiliate The current object (for fluent API support)
	 */
	public function setOwnerid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->ownerid !== $v) {
			$this->ownerid = $v;
			$this->modifiedColumns[] = AffiliatePeer::OWNERID;
		}

		return $this;
	} // setOwnerid()

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
			$this->ownerid = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 3; // 3 = AffiliatePeer::NUM_COLUMNS - AffiliatePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Affiliate object", $e);
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
			$con = Propel::getConnection(AffiliatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = AffiliatePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->singleAffiliateInfo = null;

			$this->collAffiliateUsers = null;

			$this->collAffiliateProducts = null;

			$this->collAffiliateProductCodes = null;

			$this->collBranchs = null;

			$this->collOrders = null;

			$this->collOrderStateChanges = null;

			$this->collOrderTemplates = null;

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
			$con = Propel::getConnection(AffiliatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				AffiliateQuery::create()
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
			$con = Propel::getConnection(AffiliatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				AffiliatePeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = AffiliatePeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(AffiliatePeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.AffiliatePeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = AffiliatePeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->singleAffiliateInfo !== null) {
				if (!$this->singleAffiliateInfo->isDeleted()) {
						$affectedRows += $this->singleAffiliateInfo->save($con);
				}
			}

			if ($this->collAffiliateUsers !== null) {
				foreach ($this->collAffiliateUsers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAffiliateProducts !== null) {
				foreach ($this->collAffiliateProducts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAffiliateProductCodes !== null) {
				foreach ($this->collAffiliateProductCodes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collBranchs !== null) {
				foreach ($this->collBranchs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collOrders !== null) {
				foreach ($this->collOrders as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collOrderStateChanges !== null) {
				foreach ($this->collOrderStateChanges as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collOrderTemplates !== null) {
				foreach ($this->collOrderTemplates as $referrerFK) {
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


			if (($retval = AffiliatePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->singleAffiliateInfo !== null) {
					if (!$this->singleAffiliateInfo->validate($columns)) {
						$failureMap = array_merge($failureMap, $this->singleAffiliateInfo->getValidationFailures());
					}
				}

				if ($this->collAffiliateUsers !== null) {
					foreach ($this->collAffiliateUsers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAffiliateProducts !== null) {
					foreach ($this->collAffiliateProducts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAffiliateProductCodes !== null) {
					foreach ($this->collAffiliateProductCodes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collBranchs !== null) {
					foreach ($this->collBranchs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collOrders !== null) {
					foreach ($this->collOrders as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collOrderStateChanges !== null) {
					foreach ($this->collOrderStateChanges as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collOrderTemplates !== null) {
					foreach ($this->collOrderTemplates as $referrerFK) {
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
		$pos = AffiliatePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getOwnerid();
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
		$keys = AffiliatePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getOwnerid(),
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
		$pos = AffiliatePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setOwnerid($value);
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
		$keys = AffiliatePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setOwnerid($arr[$keys[2]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);

		if ($this->isColumnModified(AffiliatePeer::ID)) $criteria->add(AffiliatePeer::ID, $this->id);
		if ($this->isColumnModified(AffiliatePeer::NAME)) $criteria->add(AffiliatePeer::NAME, $this->name);
		if ($this->isColumnModified(AffiliatePeer::OWNERID)) $criteria->add(AffiliatePeer::OWNERID, $this->ownerid);

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
		$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		$criteria->add(AffiliatePeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Affiliate (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setName($this->name);
		$copyObj->setOwnerid($this->ownerid);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			$relObj = $this->getAffiliateInfo();
			if ($relObj) {
				$copyObj->setAffiliateInfo($relObj->copy($deepCopy));
			}

			foreach ($this->getAffiliateUsers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAffiliateUser($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAffiliateProducts() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAffiliateProduct($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAffiliateProductCodes() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAffiliateProductCode($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getBranchs() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addBranch($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getOrders() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addOrder($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getOrderStateChanges() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addOrderStateChange($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getOrderTemplates() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addOrderTemplate($relObj->copy($deepCopy));
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
	 * @return     Affiliate Clone of current object.
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
	 * @return     AffiliatePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AffiliatePeer();
		}
		return self::$peer;
	}

	/**
	 * Gets a single AffiliateInfo object, which is related to this object by a one-to-one relationship.
	 *
	 * @param      PropelPDO $con optional connection object
	 * @return     AffiliateInfo
	 * @throws     PropelException
	 */
	public function getAffiliateInfo(PropelPDO $con = null)
	{

		if ($this->singleAffiliateInfo === null && !$this->isNew()) {
			$this->singleAffiliateInfo = AffiliateInfoQuery::create()->findPk($this->getPrimaryKey(), $con);
		}

		return $this->singleAffiliateInfo;
	}

	/**
	 * Sets a single AffiliateInfo object as related to this object by a one-to-one relationship.
	 *
	 * @param      AffiliateInfo $v AffiliateInfo
	 * @return     Affiliate The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setAffiliateInfo(AffiliateInfo $v = null)
	{
		$this->singleAffiliateInfo = $v;

		// Make sure that that the passed-in AffiliateInfo isn't already associated with this object
		if ($v !== null && $v->getAffiliate() === null) {
			$v->setAffiliate($this);
		}

		return $this;
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
	 * By default this just sets the collAffiliateUsers collection to an empty array (like clearcollAffiliateUsers());
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
	 * Gets an array of AffiliateUser objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Affiliate is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AffiliateUser[] List of AffiliateUser objects
	 * @throws     PropelException
	 */
	public function getAffiliateUsers($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateUsers || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateUsers) {
				// return empty collection
				$this->initAffiliateUsers();
			} else {
				$collAffiliateUsers = AffiliateUserQuery::create(null, $criteria)
					->filterByAffiliate($this)
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
	 * Returns the number of related AffiliateUser objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AffiliateUser objects.
	 * @throws     PropelException
	 */
	public function countAffiliateUsers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
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
					->filterByAffiliate($this)
					->count($con);
			}
		} else {
			return count($this->collAffiliateUsers);
		}
	}

	/**
	 * Method called to associate a AffiliateUser object to this object
	 * through the AffiliateUser foreign key attribute.
	 *
	 * @param      AffiliateUser $l AffiliateUser
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAffiliateUser(AffiliateUser $l)
	{
		if ($this->collAffiliateUsers === null) {
			$this->initAffiliateUsers();
		}
		if (!$this->collAffiliateUsers->contains($l)) { // only add it if the **same** object is not already associated
			$this->collAffiliateUsers[]= $l;
			$l->setAffiliate($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related AffiliateUsers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array AffiliateUser[] List of AffiliateUser objects
	 */
	public function getAffiliateUsersJoinAffiliateLevel($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AffiliateUserQuery::create(null, $criteria);
		$query->joinWith('AffiliateLevel', $join_behavior);

		return $this->getAffiliateUsers($query, $con);
	}

	/**
	 * Clears out the collAffiliateProducts collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAffiliateProducts()
	 */
	public function clearAffiliateProducts()
	{
		$this->collAffiliateProducts = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAffiliateProducts collection.
	 *
	 * By default this just sets the collAffiliateProducts collection to an empty array (like clearcollAffiliateProducts());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAffiliateProducts()
	{
		$this->collAffiliateProducts = new PropelObjectCollection();
		$this->collAffiliateProducts->setModel('AffiliateProduct');
	}

	/**
	 * Gets an array of AffiliateProduct objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Affiliate is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AffiliateProduct[] List of AffiliateProduct objects
	 * @throws     PropelException
	 */
	public function getAffiliateProducts($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateProducts || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateProducts) {
				// return empty collection
				$this->initAffiliateProducts();
			} else {
				$collAffiliateProducts = AffiliateProductQuery::create(null, $criteria)
					->filterByAffiliate($this)
					->find($con);
				if (null !== $criteria) {
					return $collAffiliateProducts;
				}
				$this->collAffiliateProducts = $collAffiliateProducts;
			}
		}
		return $this->collAffiliateProducts;
	}

	/**
	 * Returns the number of related AffiliateProduct objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AffiliateProduct objects.
	 * @throws     PropelException
	 */
	public function countAffiliateProducts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateProducts || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateProducts) {
				return 0;
			} else {
				$query = AffiliateProductQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliate($this)
					->count($con);
			}
		} else {
			return count($this->collAffiliateProducts);
		}
	}

	/**
	 * Method called to associate a AffiliateProduct object to this object
	 * through the AffiliateProduct foreign key attribute.
	 *
	 * @param      AffiliateProduct $l AffiliateProduct
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAffiliateProduct(AffiliateProduct $l)
	{
		if ($this->collAffiliateProducts === null) {
			$this->initAffiliateProducts();
		}
		if (!$this->collAffiliateProducts->contains($l)) { // only add it if the **same** object is not already associated
			$this->collAffiliateProducts[]= $l;
			$l->setAffiliate($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related AffiliateProducts from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array AffiliateProduct[] List of AffiliateProduct objects
	 */
	public function getAffiliateProductsJoinProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AffiliateProductQuery::create(null, $criteria);
		$query->joinWith('Product', $join_behavior);

		return $this->getAffiliateProducts($query, $con);
	}

	/**
	 * Clears out the collAffiliateProductCodes collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAffiliateProductCodes()
	 */
	public function clearAffiliateProductCodes()
	{
		$this->collAffiliateProductCodes = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAffiliateProductCodes collection.
	 *
	 * By default this just sets the collAffiliateProductCodes collection to an empty array (like clearcollAffiliateProductCodes());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAffiliateProductCodes()
	{
		$this->collAffiliateProductCodes = new PropelObjectCollection();
		$this->collAffiliateProductCodes->setModel('AffiliateProductCode');
	}

	/**
	 * Gets an array of AffiliateProductCode objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Affiliate is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AffiliateProductCode[] List of AffiliateProductCode objects
	 * @throws     PropelException
	 */
	public function getAffiliateProductCodes($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateProductCodes || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateProductCodes) {
				// return empty collection
				$this->initAffiliateProductCodes();
			} else {
				$collAffiliateProductCodes = AffiliateProductCodeQuery::create(null, $criteria)
					->filterByAffiliate($this)
					->find($con);
				if (null !== $criteria) {
					return $collAffiliateProductCodes;
				}
				$this->collAffiliateProductCodes = $collAffiliateProductCodes;
			}
		}
		return $this->collAffiliateProductCodes;
	}

	/**
	 * Returns the number of related AffiliateProductCode objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AffiliateProductCode objects.
	 * @throws     PropelException
	 */
	public function countAffiliateProductCodes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateProductCodes || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateProductCodes) {
				return 0;
			} else {
				$query = AffiliateProductCodeQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliate($this)
					->count($con);
			}
		} else {
			return count($this->collAffiliateProductCodes);
		}
	}

	/**
	 * Method called to associate a AffiliateProductCode object to this object
	 * through the AffiliateProductCode foreign key attribute.
	 *
	 * @param      AffiliateProductCode $l AffiliateProductCode
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAffiliateProductCode(AffiliateProductCode $l)
	{
		if ($this->collAffiliateProductCodes === null) {
			$this->initAffiliateProductCodes();
		}
		if (!$this->collAffiliateProductCodes->contains($l)) { // only add it if the **same** object is not already associated
			$this->collAffiliateProductCodes[]= $l;
			$l->setAffiliate($this);
		}
	}

	/**
	 * Clears out the collBranchs collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addBranchs()
	 */
	public function clearBranchs()
	{
		$this->collBranchs = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collBranchs collection.
	 *
	 * By default this just sets the collBranchs collection to an empty array (like clearcollBranchs());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initBranchs()
	{
		$this->collBranchs = new PropelObjectCollection();
		$this->collBranchs->setModel('Branch');
	}

	/**
	 * Gets an array of Branch objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Affiliate is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Branch[] List of Branch objects
	 * @throws     PropelException
	 */
	public function getBranchs($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collBranchs || null !== $criteria) {
			if ($this->isNew() && null === $this->collBranchs) {
				// return empty collection
				$this->initBranchs();
			} else {
				$collBranchs = BranchQuery::create(null, $criteria)
					->filterByAffiliate($this)
					->find($con);
				if (null !== $criteria) {
					return $collBranchs;
				}
				$this->collBranchs = $collBranchs;
			}
		}
		return $this->collBranchs;
	}

	/**
	 * Returns the number of related Branch objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Branch objects.
	 * @throws     PropelException
	 */
	public function countBranchs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collBranchs || null !== $criteria) {
			if ($this->isNew() && null === $this->collBranchs) {
				return 0;
			} else {
				$query = BranchQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliate($this)
					->count($con);
			}
		} else {
			return count($this->collBranchs);
		}
	}

	/**
	 * Method called to associate a Branch object to this object
	 * through the Branch foreign key attribute.
	 *
	 * @param      Branch $l Branch
	 * @return     void
	 * @throws     PropelException
	 */
	public function addBranch(Branch $l)
	{
		if ($this->collBranchs === null) {
			$this->initBranchs();
		}
		if (!$this->collBranchs->contains($l)) { // only add it if the **same** object is not already associated
			$this->collBranchs[]= $l;
			$l->setAffiliate($this);
		}
	}

	/**
	 * Clears out the collOrders collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addOrders()
	 */
	public function clearOrders()
	{
		$this->collOrders = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collOrders collection.
	 *
	 * By default this just sets the collOrders collection to an empty array (like clearcollOrders());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initOrders()
	{
		$this->collOrders = new PropelObjectCollection();
		$this->collOrders->setModel('Order');
	}

	/**
	 * Gets an array of Order objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Affiliate is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Order[] List of Order objects
	 * @throws     PropelException
	 */
	public function getOrders($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collOrders || null !== $criteria) {
			if ($this->isNew() && null === $this->collOrders) {
				// return empty collection
				$this->initOrders();
			} else {
				$collOrders = OrderQuery::create(null, $criteria)
					->filterByAffiliate($this)
					->find($con);
				if (null !== $criteria) {
					return $collOrders;
				}
				$this->collOrders = $collOrders;
			}
		}
		return $this->collOrders;
	}

	/**
	 * Returns the number of related Order objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Order objects.
	 * @throws     PropelException
	 */
	public function countOrders(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collOrders || null !== $criteria) {
			if ($this->isNew() && null === $this->collOrders) {
				return 0;
			} else {
				$query = OrderQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliate($this)
					->count($con);
			}
		} else {
			return count($this->collOrders);
		}
	}

	/**
	 * Method called to associate a Order object to this object
	 * through the Order foreign key attribute.
	 *
	 * @param      Order $l Order
	 * @return     void
	 * @throws     PropelException
	 */
	public function addOrder(Order $l)
	{
		if ($this->collOrders === null) {
			$this->initOrders();
		}
		if (!$this->collOrders->contains($l)) { // only add it if the **same** object is not already associated
			$this->collOrders[]= $l;
			$l->setAffiliate($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related Orders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Order[] List of Order objects
	 */
	public function getOrdersJoinAffiliateUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = OrderQuery::create(null, $criteria);
		$query->joinWith('AffiliateUser', $join_behavior);

		return $this->getOrders($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related Orders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Order[] List of Order objects
	 */
	public function getOrdersJoinBranch($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = OrderQuery::create(null, $criteria);
		$query->joinWith('Branch', $join_behavior);

		return $this->getOrders($query, $con);
	}

	/**
	 * Clears out the collOrderStateChanges collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addOrderStateChanges()
	 */
	public function clearOrderStateChanges()
	{
		$this->collOrderStateChanges = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collOrderStateChanges collection.
	 *
	 * By default this just sets the collOrderStateChanges collection to an empty array (like clearcollOrderStateChanges());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initOrderStateChanges()
	{
		$this->collOrderStateChanges = new PropelObjectCollection();
		$this->collOrderStateChanges->setModel('OrderStateChange');
	}

	/**
	 * Gets an array of OrderStateChange objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Affiliate is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array OrderStateChange[] List of OrderStateChange objects
	 * @throws     PropelException
	 */
	public function getOrderStateChanges($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collOrderStateChanges || null !== $criteria) {
			if ($this->isNew() && null === $this->collOrderStateChanges) {
				// return empty collection
				$this->initOrderStateChanges();
			} else {
				$collOrderStateChanges = OrderStateChangeQuery::create(null, $criteria)
					->filterByAffiliate($this)
					->find($con);
				if (null !== $criteria) {
					return $collOrderStateChanges;
				}
				$this->collOrderStateChanges = $collOrderStateChanges;
			}
		}
		return $this->collOrderStateChanges;
	}

	/**
	 * Returns the number of related OrderStateChange objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related OrderStateChange objects.
	 * @throws     PropelException
	 */
	public function countOrderStateChanges(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collOrderStateChanges || null !== $criteria) {
			if ($this->isNew() && null === $this->collOrderStateChanges) {
				return 0;
			} else {
				$query = OrderStateChangeQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliate($this)
					->count($con);
			}
		} else {
			return count($this->collOrderStateChanges);
		}
	}

	/**
	 * Method called to associate a OrderStateChange object to this object
	 * through the OrderStateChange foreign key attribute.
	 *
	 * @param      OrderStateChange $l OrderStateChange
	 * @return     void
	 * @throws     PropelException
	 */
	public function addOrderStateChange(OrderStateChange $l)
	{
		if ($this->collOrderStateChanges === null) {
			$this->initOrderStateChanges();
		}
		if (!$this->collOrderStateChanges->contains($l)) { // only add it if the **same** object is not already associated
			$this->collOrderStateChanges[]= $l;
			$l->setAffiliate($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related OrderStateChanges from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array OrderStateChange[] List of OrderStateChange objects
	 */
	public function getOrderStateChangesJoinOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = OrderStateChangeQuery::create(null, $criteria);
		$query->joinWith('Order', $join_behavior);

		return $this->getOrderStateChanges($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related OrderStateChanges from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array OrderStateChange[] List of OrderStateChange objects
	 */
	public function getOrderStateChangesJoinAffiliateUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = OrderStateChangeQuery::create(null, $criteria);
		$query->joinWith('AffiliateUser', $join_behavior);

		return $this->getOrderStateChanges($query, $con);
	}

	/**
	 * Clears out the collOrderTemplates collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addOrderTemplates()
	 */
	public function clearOrderTemplates()
	{
		$this->collOrderTemplates = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collOrderTemplates collection.
	 *
	 * By default this just sets the collOrderTemplates collection to an empty array (like clearcollOrderTemplates());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initOrderTemplates()
	{
		$this->collOrderTemplates = new PropelObjectCollection();
		$this->collOrderTemplates->setModel('OrderTemplate');
	}

	/**
	 * Gets an array of OrderTemplate objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Affiliate is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array OrderTemplate[] List of OrderTemplate objects
	 * @throws     PropelException
	 */
	public function getOrderTemplates($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collOrderTemplates || null !== $criteria) {
			if ($this->isNew() && null === $this->collOrderTemplates) {
				// return empty collection
				$this->initOrderTemplates();
			} else {
				$collOrderTemplates = OrderTemplateQuery::create(null, $criteria)
					->filterByAffiliate($this)
					->find($con);
				if (null !== $criteria) {
					return $collOrderTemplates;
				}
				$this->collOrderTemplates = $collOrderTemplates;
			}
		}
		return $this->collOrderTemplates;
	}

	/**
	 * Returns the number of related OrderTemplate objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related OrderTemplate objects.
	 * @throws     PropelException
	 */
	public function countOrderTemplates(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collOrderTemplates || null !== $criteria) {
			if ($this->isNew() && null === $this->collOrderTemplates) {
				return 0;
			} else {
				$query = OrderTemplateQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliate($this)
					->count($con);
			}
		} else {
			return count($this->collOrderTemplates);
		}
	}

	/**
	 * Method called to associate a OrderTemplate object to this object
	 * through the OrderTemplate foreign key attribute.
	 *
	 * @param      OrderTemplate $l OrderTemplate
	 * @return     void
	 * @throws     PropelException
	 */
	public function addOrderTemplate(OrderTemplate $l)
	{
		if ($this->collOrderTemplates === null) {
			$this->initOrderTemplates();
		}
		if (!$this->collOrderTemplates->contains($l)) { // only add it if the **same** object is not already associated
			$this->collOrderTemplates[]= $l;
			$l->setAffiliate($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related OrderTemplates from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array OrderTemplate[] List of OrderTemplate objects
	 */
	public function getOrderTemplatesJoinAffiliateUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = OrderTemplateQuery::create(null, $criteria);
		$query->joinWith('AffiliateUser', $join_behavior);

		return $this->getOrderTemplates($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related OrderTemplates from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array OrderTemplate[] List of OrderTemplate objects
	 */
	public function getOrderTemplatesJoinBranch($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = OrderTemplateQuery::create(null, $criteria);
		$query->joinWith('Branch', $join_behavior);

		return $this->getOrderTemplates($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->name = null;
		$this->ownerid = null;
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
			if ($this->singleAffiliateInfo) {
				$this->singleAffiliateInfo->clearAllReferences($deep);
			}
			if ($this->collAffiliateUsers) {
				foreach ((array) $this->collAffiliateUsers as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAffiliateProducts) {
				foreach ((array) $this->collAffiliateProducts as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAffiliateProductCodes) {
				foreach ((array) $this->collAffiliateProductCodes as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collBranchs) {
				foreach ((array) $this->collBranchs as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collOrders) {
				foreach ((array) $this->collOrders as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collOrderStateChanges) {
				foreach ((array) $this->collOrderStateChanges as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collOrderTemplates) {
				foreach ((array) $this->collOrderTemplates as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->singleAffiliateInfo = null;
		$this->collAffiliateUsers = null;
		$this->collAffiliateProducts = null;
		$this->collAffiliateProductCodes = null;
		$this->collBranchs = null;
		$this->collOrders = null;
		$this->collOrderStateChanges = null;
		$this->collOrderTemplates = null;
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

} // BaseAffiliate
