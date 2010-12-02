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
	 * @var        array AffiliateUser[] Collection to store aggregation of AffiliateUser objects.
	 */
	protected $collAffiliateUsers;

	/**
	 * @var        array AffiliateBranch[] Collection to store aggregation of AffiliateBranch objects.
	 */
	protected $collAffiliateBranchs;

	/**
	 * @var        array ClientQuote[] Collection to store aggregation of ClientQuote objects.
	 */
	protected $collClientQuotes;

	/**
	 * @var        array ClientPurchaseOrder[] Collection to store aggregation of ClientPurchaseOrder objects.
	 */
	protected $collClientPurchaseOrders;

	/**
	 * @var        array SupplierPurchaseOrder[] Collection to store aggregation of SupplierPurchaseOrder objects.
	 */
	protected $collSupplierPurchaseOrders;

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

			$this->collAffiliateUsers = null;

			$this->collAffiliateBranchs = null;

			$this->collClientQuotes = null;

			$this->collClientPurchaseOrders = null;

			$this->collSupplierPurchaseOrders = null;

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

			if ($this->collAffiliateUsers !== null) {
				foreach ($this->collAffiliateUsers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAffiliateBranchs !== null) {
				foreach ($this->collAffiliateBranchs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collClientQuotes !== null) {
				foreach ($this->collClientQuotes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collClientPurchaseOrders !== null) {
				foreach ($this->collClientPurchaseOrders as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSupplierPurchaseOrders !== null) {
				foreach ($this->collSupplierPurchaseOrders as $referrerFK) {
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


				if ($this->collAffiliateUsers !== null) {
					foreach ($this->collAffiliateUsers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAffiliateBranchs !== null) {
					foreach ($this->collAffiliateBranchs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClientQuotes !== null) {
					foreach ($this->collClientQuotes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClientPurchaseOrders !== null) {
					foreach ($this->collClientPurchaseOrders as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSupplierPurchaseOrders !== null) {
					foreach ($this->collSupplierPurchaseOrders as $referrerFK) {
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

			foreach ($this->getAffiliateUsers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAffiliateUser($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAffiliateBranchs() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAffiliateBranch($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClientQuotes() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClientQuote($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClientPurchaseOrders() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClientPurchaseOrder($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierPurchaseOrders() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierPurchaseOrder($relObj->copy($deepCopy));
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
	 * Clears out the collAffiliateBranchs collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAffiliateBranchs()
	 */
	public function clearAffiliateBranchs()
	{
		$this->collAffiliateBranchs = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAffiliateBranchs collection.
	 *
	 * By default this just sets the collAffiliateBranchs collection to an empty array (like clearcollAffiliateBranchs());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAffiliateBranchs()
	{
		$this->collAffiliateBranchs = new PropelObjectCollection();
		$this->collAffiliateBranchs->setModel('AffiliateBranch');
	}

	/**
	 * Gets an array of AffiliateBranch objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Affiliate is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AffiliateBranch[] List of AffiliateBranch objects
	 * @throws     PropelException
	 */
	public function getAffiliateBranchs($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateBranchs || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateBranchs) {
				// return empty collection
				$this->initAffiliateBranchs();
			} else {
				$collAffiliateBranchs = AffiliateBranchQuery::create(null, $criteria)
					->filterByAffiliate($this)
					->find($con);
				if (null !== $criteria) {
					return $collAffiliateBranchs;
				}
				$this->collAffiliateBranchs = $collAffiliateBranchs;
			}
		}
		return $this->collAffiliateBranchs;
	}

	/**
	 * Returns the number of related AffiliateBranch objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AffiliateBranch objects.
	 * @throws     PropelException
	 */
	public function countAffiliateBranchs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateBranchs || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateBranchs) {
				return 0;
			} else {
				$query = AffiliateBranchQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliate($this)
					->count($con);
			}
		} else {
			return count($this->collAffiliateBranchs);
		}
	}

	/**
	 * Method called to associate a AffiliateBranch object to this object
	 * through the AffiliateBranch foreign key attribute.
	 *
	 * @param      AffiliateBranch $l AffiliateBranch
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAffiliateBranch(AffiliateBranch $l)
	{
		if ($this->collAffiliateBranchs === null) {
			$this->initAffiliateBranchs();
		}
		if (!$this->collAffiliateBranchs->contains($l)) { // only add it if the **same** object is not already associated
			$this->collAffiliateBranchs[]= $l;
			$l->setAffiliate($this);
		}
	}

	/**
	 * Clears out the collClientQuotes collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClientQuotes()
	 */
	public function clearClientQuotes()
	{
		$this->collClientQuotes = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClientQuotes collection.
	 *
	 * By default this just sets the collClientQuotes collection to an empty array (like clearcollClientQuotes());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClientQuotes()
	{
		$this->collClientQuotes = new PropelObjectCollection();
		$this->collClientQuotes->setModel('ClientQuote');
	}

	/**
	 * Gets an array of ClientQuote objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Affiliate is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ClientQuote[] List of ClientQuote objects
	 * @throws     PropelException
	 */
	public function getClientQuotes($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collClientQuotes || null !== $criteria) {
			if ($this->isNew() && null === $this->collClientQuotes) {
				// return empty collection
				$this->initClientQuotes();
			} else {
				$collClientQuotes = ClientQuoteQuery::create(null, $criteria)
					->filterByAffiliate($this)
					->find($con);
				if (null !== $criteria) {
					return $collClientQuotes;
				}
				$this->collClientQuotes = $collClientQuotes;
			}
		}
		return $this->collClientQuotes;
	}

	/**
	 * Returns the number of related ClientQuote objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ClientQuote objects.
	 * @throws     PropelException
	 */
	public function countClientQuotes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collClientQuotes || null !== $criteria) {
			if ($this->isNew() && null === $this->collClientQuotes) {
				return 0;
			} else {
				$query = ClientQuoteQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliate($this)
					->count($con);
			}
		} else {
			return count($this->collClientQuotes);
		}
	}

	/**
	 * Method called to associate a ClientQuote object to this object
	 * through the ClientQuote foreign key attribute.
	 *
	 * @param      ClientQuote $l ClientQuote
	 * @return     void
	 * @throws     PropelException
	 */
	public function addClientQuote(ClientQuote $l)
	{
		if ($this->collClientQuotes === null) {
			$this->initClientQuotes();
		}
		if (!$this->collClientQuotes->contains($l)) { // only add it if the **same** object is not already associated
			$this->collClientQuotes[]= $l;
			$l->setAffiliate($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related ClientQuotes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ClientQuote[] List of ClientQuote objects
	 */
	public function getClientQuotesJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ClientQuoteQuery::create(null, $criteria);
		$query->joinWith('User', $join_behavior);

		return $this->getClientQuotes($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related ClientQuotes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ClientQuote[] List of ClientQuote objects
	 */
	public function getClientQuotesJoinAffiliateUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ClientQuoteQuery::create(null, $criteria);
		$query->joinWith('AffiliateUser', $join_behavior);

		return $this->getClientQuotes($query, $con);
	}

	/**
	 * Clears out the collClientPurchaseOrders collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClientPurchaseOrders()
	 */
	public function clearClientPurchaseOrders()
	{
		$this->collClientPurchaseOrders = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClientPurchaseOrders collection.
	 *
	 * By default this just sets the collClientPurchaseOrders collection to an empty array (like clearcollClientPurchaseOrders());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClientPurchaseOrders()
	{
		$this->collClientPurchaseOrders = new PropelObjectCollection();
		$this->collClientPurchaseOrders->setModel('ClientPurchaseOrder');
	}

	/**
	 * Gets an array of ClientPurchaseOrder objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Affiliate is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ClientPurchaseOrder[] List of ClientPurchaseOrder objects
	 * @throws     PropelException
	 */
	public function getClientPurchaseOrders($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collClientPurchaseOrders || null !== $criteria) {
			if ($this->isNew() && null === $this->collClientPurchaseOrders) {
				// return empty collection
				$this->initClientPurchaseOrders();
			} else {
				$collClientPurchaseOrders = ClientPurchaseOrderQuery::create(null, $criteria)
					->filterByAffiliate($this)
					->find($con);
				if (null !== $criteria) {
					return $collClientPurchaseOrders;
				}
				$this->collClientPurchaseOrders = $collClientPurchaseOrders;
			}
		}
		return $this->collClientPurchaseOrders;
	}

	/**
	 * Returns the number of related ClientPurchaseOrder objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ClientPurchaseOrder objects.
	 * @throws     PropelException
	 */
	public function countClientPurchaseOrders(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collClientPurchaseOrders || null !== $criteria) {
			if ($this->isNew() && null === $this->collClientPurchaseOrders) {
				return 0;
			} else {
				$query = ClientPurchaseOrderQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliate($this)
					->count($con);
			}
		} else {
			return count($this->collClientPurchaseOrders);
		}
	}

	/**
	 * Method called to associate a ClientPurchaseOrder object to this object
	 * through the ClientPurchaseOrder foreign key attribute.
	 *
	 * @param      ClientPurchaseOrder $l ClientPurchaseOrder
	 * @return     void
	 * @throws     PropelException
	 */
	public function addClientPurchaseOrder(ClientPurchaseOrder $l)
	{
		if ($this->collClientPurchaseOrders === null) {
			$this->initClientPurchaseOrders();
		}
		if (!$this->collClientPurchaseOrders->contains($l)) { // only add it if the **same** object is not already associated
			$this->collClientPurchaseOrders[]= $l;
			$l->setAffiliate($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related ClientPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ClientPurchaseOrder[] List of ClientPurchaseOrder objects
	 */
	public function getClientPurchaseOrdersJoinClientQuote($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ClientPurchaseOrderQuery::create(null, $criteria);
		$query->joinWith('ClientQuote', $join_behavior);

		return $this->getClientPurchaseOrders($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related ClientPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ClientPurchaseOrder[] List of ClientPurchaseOrder objects
	 */
	public function getClientPurchaseOrdersJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ClientPurchaseOrderQuery::create(null, $criteria);
		$query->joinWith('User', $join_behavior);

		return $this->getClientPurchaseOrders($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related ClientPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ClientPurchaseOrder[] List of ClientPurchaseOrder objects
	 */
	public function getClientPurchaseOrdersJoinAffiliateUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ClientPurchaseOrderQuery::create(null, $criteria);
		$query->joinWith('AffiliateUser', $join_behavior);

		return $this->getClientPurchaseOrders($query, $con);
	}

	/**
	 * Clears out the collSupplierPurchaseOrders collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSupplierPurchaseOrders()
	 */
	public function clearSupplierPurchaseOrders()
	{
		$this->collSupplierPurchaseOrders = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSupplierPurchaseOrders collection.
	 *
	 * By default this just sets the collSupplierPurchaseOrders collection to an empty array (like clearcollSupplierPurchaseOrders());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierPurchaseOrders()
	{
		$this->collSupplierPurchaseOrders = new PropelObjectCollection();
		$this->collSupplierPurchaseOrders->setModel('SupplierPurchaseOrder');
	}

	/**
	 * Gets an array of SupplierPurchaseOrder objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Affiliate is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SupplierPurchaseOrder[] List of SupplierPurchaseOrder objects
	 * @throws     PropelException
	 */
	public function getSupplierPurchaseOrders($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSupplierPurchaseOrders || null !== $criteria) {
			if ($this->isNew() && null === $this->collSupplierPurchaseOrders) {
				// return empty collection
				$this->initSupplierPurchaseOrders();
			} else {
				$collSupplierPurchaseOrders = SupplierPurchaseOrderQuery::create(null, $criteria)
					->filterByAffiliate($this)
					->find($con);
				if (null !== $criteria) {
					return $collSupplierPurchaseOrders;
				}
				$this->collSupplierPurchaseOrders = $collSupplierPurchaseOrders;
			}
		}
		return $this->collSupplierPurchaseOrders;
	}

	/**
	 * Returns the number of related SupplierPurchaseOrder objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SupplierPurchaseOrder objects.
	 * @throws     PropelException
	 */
	public function countSupplierPurchaseOrders(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSupplierPurchaseOrders || null !== $criteria) {
			if ($this->isNew() && null === $this->collSupplierPurchaseOrders) {
				return 0;
			} else {
				$query = SupplierPurchaseOrderQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliate($this)
					->count($con);
			}
		} else {
			return count($this->collSupplierPurchaseOrders);
		}
	}

	/**
	 * Method called to associate a SupplierPurchaseOrder object to this object
	 * through the SupplierPurchaseOrder foreign key attribute.
	 *
	 * @param      SupplierPurchaseOrder $l SupplierPurchaseOrder
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSupplierPurchaseOrder(SupplierPurchaseOrder $l)
	{
		if ($this->collSupplierPurchaseOrders === null) {
			$this->initSupplierPurchaseOrders();
		}
		if (!$this->collSupplierPurchaseOrders->contains($l)) { // only add it if the **same** object is not already associated
			$this->collSupplierPurchaseOrders[]= $l;
			$l->setAffiliate($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierPurchaseOrder[] List of SupplierPurchaseOrder objects
	 */
	public function getSupplierPurchaseOrdersJoinSupplierQuote($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierPurchaseOrderQuery::create(null, $criteria);
		$query->joinWith('SupplierQuote', $join_behavior);

		return $this->getSupplierPurchaseOrders($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierPurchaseOrder[] List of SupplierPurchaseOrder objects
	 */
	public function getSupplierPurchaseOrdersJoinClientQuote($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierPurchaseOrderQuery::create(null, $criteria);
		$query->joinWith('ClientQuote', $join_behavior);

		return $this->getSupplierPurchaseOrders($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierPurchaseOrder[] List of SupplierPurchaseOrder objects
	 */
	public function getSupplierPurchaseOrdersJoinSupplier($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierPurchaseOrderQuery::create(null, $criteria);
		$query->joinWith('Supplier', $join_behavior);

		return $this->getSupplierPurchaseOrders($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierPurchaseOrder[] List of SupplierPurchaseOrder objects
	 */
	public function getSupplierPurchaseOrdersJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierPurchaseOrderQuery::create(null, $criteria);
		$query->joinWith('User', $join_behavior);

		return $this->getSupplierPurchaseOrders($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierPurchaseOrder[] List of SupplierPurchaseOrder objects
	 */
	public function getSupplierPurchaseOrdersJoinAffiliateUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierPurchaseOrderQuery::create(null, $criteria);
		$query->joinWith('AffiliateUser', $join_behavior);

		return $this->getSupplierPurchaseOrders($query, $con);
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
			if ($this->collAffiliateUsers) {
				foreach ((array) $this->collAffiliateUsers as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAffiliateBranchs) {
				foreach ((array) $this->collAffiliateBranchs as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClientQuotes) {
				foreach ((array) $this->collClientQuotes as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClientPurchaseOrders) {
				foreach ((array) $this->collClientPurchaseOrders as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierPurchaseOrders) {
				foreach ((array) $this->collSupplierPurchaseOrders as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collAffiliateUsers = null;
		$this->collAffiliateBranchs = null;
		$this->collClientQuotes = null;
		$this->collClientPurchaseOrders = null;
		$this->collSupplierPurchaseOrders = null;
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
