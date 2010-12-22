<?php


/**
 * Base class that represents a row from the 'modules_module' table.
 *
 *  Registro de modulos
 *
 * @package    propel.generator.modules.classes.om
 */
abstract class BaseModule extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ModulePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ModulePeer
	 */
	protected static $peer;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the active field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $active;

	/**
	 * The value for the alwaysactive field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $alwaysactive;

	/**
	 * @var        array ModuleDependency[] Collection to store aggregation of ModuleDependency objects.
	 */
	protected $collModuleDependencys;

	/**
	 * @var        array ModuleLabel[] Collection to store aggregation of ModuleLabel objects.
	 */
	protected $collModuleLabels;

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
		$this->active = false;
		$this->alwaysactive = false;
	}

	/**
	 * Initializes internal state of BaseModule object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [name] column value.
	 * nombre del modulo
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [active] column value.
	 * Estado del modulo
	 * @return     boolean
	 */
	public function getActive()
	{
		return $this->active;
	}

	/**
	 * Get the [alwaysactive] column value.
	 * Modulo siempre activo
	 * @return     boolean
	 */
	public function getAlwaysactive()
	{
		return $this->alwaysactive;
	}

	/**
	 * Set the value of [name] column.
	 * nombre del modulo
	 * @param      string $v new value
	 * @return     Module The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = ModulePeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [active] column.
	 * Estado del modulo
	 * @param      boolean $v new value
	 * @return     Module The current object (for fluent API support)
	 */
	public function setActive($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->active !== $v || $this->isNew()) {
			$this->active = $v;
			$this->modifiedColumns[] = ModulePeer::ACTIVE;
		}

		return $this;
	} // setActive()

	/**
	 * Set the value of [alwaysactive] column.
	 * Modulo siempre activo
	 * @param      boolean $v new value
	 * @return     Module The current object (for fluent API support)
	 */
	public function setAlwaysactive($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->alwaysactive !== $v || $this->isNew()) {
			$this->alwaysactive = $v;
			$this->modifiedColumns[] = ModulePeer::ALWAYSACTIVE;
		}

		return $this;
	} // setAlwaysactive()

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
			if ($this->active !== false) {
				return false;
			}

			if ($this->alwaysactive !== false) {
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

			$this->name = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->active = ($row[$startcol + 1] !== null) ? (boolean) $row[$startcol + 1] : null;
			$this->alwaysactive = ($row[$startcol + 2] !== null) ? (boolean) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 3; // 3 = ModulePeer::NUM_COLUMNS - ModulePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Module object", $e);
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
			$con = Propel::getConnection(ModulePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ModulePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collModuleDependencys = null;

			$this->collModuleLabels = null;

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
			$con = Propel::getConnection(ModulePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ModuleQuery::create()
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
			$con = Propel::getConnection(ModulePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ModulePeer::addInstanceToPool($this);
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


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setNew(false);
				} else {
					$affectedRows = ModulePeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collModuleDependencys !== null) {
				foreach ($this->collModuleDependencys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collModuleLabels !== null) {
				foreach ($this->collModuleLabels as $referrerFK) {
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


			if (($retval = ModulePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collModuleDependencys !== null) {
					foreach ($this->collModuleDependencys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collModuleLabels !== null) {
					foreach ($this->collModuleLabels as $referrerFK) {
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
		$pos = ModulePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getName();
				break;
			case 1:
				return $this->getActive();
				break;
			case 2:
				return $this->getAlwaysactive();
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
		$keys = ModulePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getName(),
			$keys[1] => $this->getActive(),
			$keys[2] => $this->getAlwaysactive(),
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
		$pos = ModulePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setName($value);
				break;
			case 1:
				$this->setActive($value);
				break;
			case 2:
				$this->setAlwaysactive($value);
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
		$keys = ModulePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setName($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setActive($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAlwaysactive($arr[$keys[2]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ModulePeer::DATABASE_NAME);

		if ($this->isColumnModified(ModulePeer::NAME)) $criteria->add(ModulePeer::NAME, $this->name);
		if ($this->isColumnModified(ModulePeer::ACTIVE)) $criteria->add(ModulePeer::ACTIVE, $this->active);
		if ($this->isColumnModified(ModulePeer::ALWAYSACTIVE)) $criteria->add(ModulePeer::ALWAYSACTIVE, $this->alwaysactive);

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
		$criteria = new Criteria(ModulePeer::DATABASE_NAME);
		$criteria->add(ModulePeer::NAME, $this->name);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     string
	 */
	public function getPrimaryKey()
	{
		return $this->getName();
	}

	/**
	 * Generic method to set the primary key (name column).
	 *
	 * @param      string $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setName($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getName();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Module (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setName($this->name);
		$copyObj->setActive($this->active);
		$copyObj->setAlwaysactive($this->alwaysactive);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getModuleDependencys() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addModuleDependency($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getModuleLabels() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addModuleLabel($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);
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
	 * @return     Module Clone of current object.
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
	 * @return     ModulePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ModulePeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collModuleDependencys collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addModuleDependencys()
	 */
	public function clearModuleDependencys()
	{
		$this->collModuleDependencys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collModuleDependencys collection.
	 *
	 * By default this just sets the collModuleDependencys collection to an empty array (like clearcollModuleDependencys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initModuleDependencys()
	{
		$this->collModuleDependencys = new PropelObjectCollection();
		$this->collModuleDependencys->setModel('ModuleDependency');
	}

	/**
	 * Gets an array of ModuleDependency objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Module is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ModuleDependency[] List of ModuleDependency objects
	 * @throws     PropelException
	 */
	public function getModuleDependencys($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collModuleDependencys || null !== $criteria) {
			if ($this->isNew() && null === $this->collModuleDependencys) {
				// return empty collection
				$this->initModuleDependencys();
			} else {
				$collModuleDependencys = ModuleDependencyQuery::create(null, $criteria)
					->filterByModule($this)
					->find($con);
				if (null !== $criteria) {
					return $collModuleDependencys;
				}
				$this->collModuleDependencys = $collModuleDependencys;
			}
		}
		return $this->collModuleDependencys;
	}

	/**
	 * Returns the number of related ModuleDependency objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ModuleDependency objects.
	 * @throws     PropelException
	 */
	public function countModuleDependencys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collModuleDependencys || null !== $criteria) {
			if ($this->isNew() && null === $this->collModuleDependencys) {
				return 0;
			} else {
				$query = ModuleDependencyQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByModule($this)
					->count($con);
			}
		} else {
			return count($this->collModuleDependencys);
		}
	}

	/**
	 * Method called to associate a ModuleDependency object to this object
	 * through the ModuleDependency foreign key attribute.
	 *
	 * @param      ModuleDependency $l ModuleDependency
	 * @return     void
	 * @throws     PropelException
	 */
	public function addModuleDependency(ModuleDependency $l)
	{
		if ($this->collModuleDependencys === null) {
			$this->initModuleDependencys();
		}
		if (!$this->collModuleDependencys->contains($l)) { // only add it if the **same** object is not already associated
			$this->collModuleDependencys[]= $l;
			$l->setModule($this);
		}
	}

	/**
	 * Clears out the collModuleLabels collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addModuleLabels()
	 */
	public function clearModuleLabels()
	{
		$this->collModuleLabels = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collModuleLabels collection.
	 *
	 * By default this just sets the collModuleLabels collection to an empty array (like clearcollModuleLabels());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initModuleLabels()
	{
		$this->collModuleLabels = new PropelObjectCollection();
		$this->collModuleLabels->setModel('ModuleLabel');
	}

	/**
	 * Gets an array of ModuleLabel objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Module is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ModuleLabel[] List of ModuleLabel objects
	 * @throws     PropelException
	 */
	public function getModuleLabels($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collModuleLabels || null !== $criteria) {
			if ($this->isNew() && null === $this->collModuleLabels) {
				// return empty collection
				$this->initModuleLabels();
			} else {
				$collModuleLabels = ModuleLabelQuery::create(null, $criteria)
					->filterByModule($this)
					->find($con);
				if (null !== $criteria) {
					return $collModuleLabels;
				}
				$this->collModuleLabels = $collModuleLabels;
			}
		}
		return $this->collModuleLabels;
	}

	/**
	 * Returns the number of related ModuleLabel objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ModuleLabel objects.
	 * @throws     PropelException
	 */
	public function countModuleLabels(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collModuleLabels || null !== $criteria) {
			if ($this->isNew() && null === $this->collModuleLabels) {
				return 0;
			} else {
				$query = ModuleLabelQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByModule($this)
					->count($con);
			}
		} else {
			return count($this->collModuleLabels);
		}
	}

	/**
	 * Method called to associate a ModuleLabel object to this object
	 * through the ModuleLabel foreign key attribute.
	 *
	 * @param      ModuleLabel $l ModuleLabel
	 * @return     void
	 * @throws     PropelException
	 */
	public function addModuleLabel(ModuleLabel $l)
	{
		if ($this->collModuleLabels === null) {
			$this->initModuleLabels();
		}
		if (!$this->collModuleLabels->contains($l)) { // only add it if the **same** object is not already associated
			$this->collModuleLabels[]= $l;
			$l->setModule($this);
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->name = null;
		$this->active = null;
		$this->alwaysactive = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
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
			if ($this->collModuleDependencys) {
				foreach ((array) $this->collModuleDependencys as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collModuleLabels) {
				foreach ((array) $this->collModuleLabels as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collModuleDependencys = null;
		$this->collModuleLabels = null;
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

} // BaseModule
