<?php

/**
 * Base class that represents a row from the 'categories_category' table.
 *
 * Categorias
 *
 * @package    categories.classes.om
 */
abstract class BaseCategory extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        CategoryPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the parentid field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $parentid;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the module field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $module;

	/**
	 * The value for the active field.
	 * @var        boolean
	 */
	protected $active;

	/**
	 * The value for the ispublic field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $ispublic;

	/**
	 * @var        array GroupCategory[] Collection to store aggregation of GroupCategory objects.
	 */
	protected $collGroupCategorys;

	/**
	 * @var        Criteria The criteria used to select the current contents of collGroupCategorys.
	 */
	private $lastGroupCategoryCriteria = null;

	/**
	 * @var        array AffiliateGroupCategory[] Collection to store aggregation of AffiliateGroupCategory objects.
	 */
	protected $collAffiliateGroupCategorys;

	/**
	 * @var        Criteria The criteria used to select the current contents of collAffiliateGroupCategorys.
	 */
	private $lastAffiliateGroupCategoryCriteria = null;

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
	 * Initializes internal state of BaseCategory object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->parentid = 0;
		$this->module = '';
		$this->ispublic = false;
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [parentid] column value.
	 * Parent Category if it has
	 * @return     int
	 */
	public function getParentid()
	{
		return $this->parentid;
	}

	/**
	 * Get the [name] column value.
	 * Category name
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [module] column value.
	 * Module name if it is for a module
	 * @return     string
	 */
	public function getModule()
	{
		return $this->module;
	}

	/**
	 * Get the [active] column value.
	 * Is category active?
	 * @return     boolean
	 */
	public function getActive()
	{
		return $this->active;
	}

	/**
	 * Get the [ispublic] column value.
	 * Is category public?
	 * @return     boolean
	 */
	public function getIspublic()
	{
		return $this->ispublic;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CategoryPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [parentid] column.
	 * Parent Category if it has
	 * @param      int $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setParentid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->parentid !== $v || $v === 0) {
			$this->parentid = $v;
			$this->modifiedColumns[] = CategoryPeer::PARENTID;
		}

		return $this;
	} // setParentid()

	/**
	 * Set the value of [name] column.
	 * Category name
	 * @param      string $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = CategoryPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [module] column.
	 * Module name if it is for a module
	 * @param      string $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setModule($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->module !== $v || $v === '') {
			$this->module = $v;
			$this->modifiedColumns[] = CategoryPeer::MODULE;
		}

		return $this;
	} // setModule()

	/**
	 * Set the value of [active] column.
	 * Is category active?
	 * @param      boolean $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setActive($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->active !== $v) {
			$this->active = $v;
			$this->modifiedColumns[] = CategoryPeer::ACTIVE;
		}

		return $this;
	} // setActive()

	/**
	 * Set the value of [ispublic] column.
	 * Is category public?
	 * @param      boolean $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setIspublic($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->ispublic !== $v || $v === false) {
			$this->ispublic = $v;
			$this->modifiedColumns[] = CategoryPeer::ISPUBLIC;
		}

		return $this;
	} // setIspublic()

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
			// First, ensure that we don't have any columns that have been modified which aren't default columns.
			if (array_diff($this->modifiedColumns, array(CategoryPeer::PARENTID,CategoryPeer::MODULE,CategoryPeer::ISPUBLIC))) {
				return false;
			}

			if ($this->parentid !== 0) {
				return false;
			}

			if ($this->module !== '') {
				return false;
			}

			if ($this->ispublic !== false) {
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
			$this->parentid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->module = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->active = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
			$this->ispublic = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 6; // 6 = CategoryPeer::NUM_COLUMNS - CategoryPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Category object", $e);
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
			$con = Propel::getConnection(CategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = CategoryPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collGroupCategorys = null;
			$this->lastGroupCategoryCriteria = null;

			$this->collAffiliateGroupCategorys = null;
			$this->lastAffiliateGroupCategoryCriteria = null;

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
			$con = Propel::getConnection(CategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			CategoryPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
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
			$con = Propel::getConnection(CategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			CategoryPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = CategoryPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CategoryPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += CategoryPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collGroupCategorys !== null) {
				foreach ($this->collGroupCategorys as $referrerFK) {
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


			if (($retval = CategoryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collGroupCategorys !== null) {
					foreach ($this->collGroupCategorys as $referrerFK) {
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
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(CategoryPeer::DATABASE_NAME);

		if ($this->isColumnModified(CategoryPeer::ID)) $criteria->add(CategoryPeer::ID, $this->id);
		if ($this->isColumnModified(CategoryPeer::PARENTID)) $criteria->add(CategoryPeer::PARENTID, $this->parentid);
		if ($this->isColumnModified(CategoryPeer::NAME)) $criteria->add(CategoryPeer::NAME, $this->name);
		if ($this->isColumnModified(CategoryPeer::MODULE)) $criteria->add(CategoryPeer::MODULE, $this->module);
		if ($this->isColumnModified(CategoryPeer::ACTIVE)) $criteria->add(CategoryPeer::ACTIVE, $this->active);
		if ($this->isColumnModified(CategoryPeer::ISPUBLIC)) $criteria->add(CategoryPeer::ISPUBLIC, $this->ispublic);

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
		$criteria = new Criteria(CategoryPeer::DATABASE_NAME);

		$criteria->add(CategoryPeer::ID, $this->id);

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
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Category (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setParentid($this->parentid);

		$copyObj->setName($this->name);

		$copyObj->setModule($this->module);

		$copyObj->setActive($this->active);

		$copyObj->setIspublic($this->ispublic);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getGroupCategorys() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addGroupCategory($relObj->copy($deepCopy));
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
	 * @return     Category Clone of current object.
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
	 * @return     CategoryPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CategoryPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collGroupCategorys collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addGroupCategorys()
	 */
	public function clearGroupCategorys()
	{
		$this->collGroupCategorys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collGroupCategorys collection (array).
	 *
	 * By default this just sets the collGroupCategorys collection to an empty array (like clearcollGroupCategorys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initGroupCategorys()
	{
		$this->collGroupCategorys = array();
	}

	/**
	 * Gets an array of GroupCategory objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Category has previously been saved, it will retrieve
	 * related GroupCategorys from storage. If this Category is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array GroupCategory[]
	 * @throws     PropelException
	 */
	public function getGroupCategorys($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGroupCategorys === null) {
			if ($this->isNew()) {
			   $this->collGroupCategorys = array();
			} else {

				$criteria->add(GroupCategoryPeer::CATEGORYID, $this->id);

				GroupCategoryPeer::addSelectColumns($criteria);
				$this->collGroupCategorys = GroupCategoryPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(GroupCategoryPeer::CATEGORYID, $this->id);

				GroupCategoryPeer::addSelectColumns($criteria);
				if (!isset($this->lastGroupCategoryCriteria) || !$this->lastGroupCategoryCriteria->equals($criteria)) {
					$this->collGroupCategorys = GroupCategoryPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastGroupCategoryCriteria = $criteria;
		return $this->collGroupCategorys;
	}

	/**
	 * Returns the number of related GroupCategory objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related GroupCategory objects.
	 * @throws     PropelException
	 */
	public function countGroupCategorys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collGroupCategorys === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(GroupCategoryPeer::CATEGORYID, $this->id);

				$count = GroupCategoryPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(GroupCategoryPeer::CATEGORYID, $this->id);

				if (!isset($this->lastGroupCategoryCriteria) || !$this->lastGroupCategoryCriteria->equals($criteria)) {
					$count = GroupCategoryPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collGroupCategorys);
				}
			} else {
				$count = count($this->collGroupCategorys);
			}
		}
		$this->lastGroupCategoryCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a GroupCategory object to this object
	 * through the GroupCategory foreign key attribute.
	 *
	 * @param      GroupCategory $l GroupCategory
	 * @return     void
	 * @throws     PropelException
	 */
	public function addGroupCategory(GroupCategory $l)
	{
		if ($this->collGroupCategorys === null) {
			$this->initGroupCategorys();
		}
		if (!in_array($l, $this->collGroupCategorys, true)) { // only add it if the **same** object is not already associated
			array_push($this->collGroupCategorys, $l);
			$l->setCategory($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Category is new, it will return
	 * an empty collection; or if this Category has previously
	 * been saved, it will retrieve related GroupCategorys from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Category.
	 */
	public function getGroupCategorysJoinGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGroupCategorys === null) {
			if ($this->isNew()) {
				$this->collGroupCategorys = array();
			} else {

				$criteria->add(GroupCategoryPeer::CATEGORYID, $this->id);

				$this->collGroupCategorys = GroupCategoryPeer::doSelectJoinGroup($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(GroupCategoryPeer::CATEGORYID, $this->id);

			if (!isset($this->lastGroupCategoryCriteria) || !$this->lastGroupCategoryCriteria->equals($criteria)) {
				$this->collGroupCategorys = GroupCategoryPeer::doSelectJoinGroup($criteria, $con, $join_behavior);
			}
		}
		$this->lastGroupCategoryCriteria = $criteria;

		return $this->collGroupCategorys;
	}

	/**
	 * Clears out the collAffiliateGroupCategorys collection (array).
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
	 * Initializes the collAffiliateGroupCategorys collection (array).
	 *
	 * By default this just sets the collAffiliateGroupCategorys collection to an empty array (like clearcollAffiliateGroupCategorys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAffiliateGroupCategorys()
	{
		$this->collAffiliateGroupCategorys = array();
	}

	/**
	 * Gets an array of AffiliateGroupCategory objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Category has previously been saved, it will retrieve
	 * related AffiliateGroupCategorys from storage. If this Category is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array AffiliateGroupCategory[]
	 * @throws     PropelException
	 */
	public function getAffiliateGroupCategorys($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAffiliateGroupCategorys === null) {
			if ($this->isNew()) {
			   $this->collAffiliateGroupCategorys = array();
			} else {

				$criteria->add(AffiliateGroupCategoryPeer::CATEGORYID, $this->id);

				AffiliateGroupCategoryPeer::addSelectColumns($criteria);
				$this->collAffiliateGroupCategorys = AffiliateGroupCategoryPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(AffiliateGroupCategoryPeer::CATEGORYID, $this->id);

				AffiliateGroupCategoryPeer::addSelectColumns($criteria);
				if (!isset($this->lastAffiliateGroupCategoryCriteria) || !$this->lastAffiliateGroupCategoryCriteria->equals($criteria)) {
					$this->collAffiliateGroupCategorys = AffiliateGroupCategoryPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAffiliateGroupCategoryCriteria = $criteria;
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
		if ($criteria === null) {
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collAffiliateGroupCategorys === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(AffiliateGroupCategoryPeer::CATEGORYID, $this->id);

				$count = AffiliateGroupCategoryPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(AffiliateGroupCategoryPeer::CATEGORYID, $this->id);

				if (!isset($this->lastAffiliateGroupCategoryCriteria) || !$this->lastAffiliateGroupCategoryCriteria->equals($criteria)) {
					$count = AffiliateGroupCategoryPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collAffiliateGroupCategorys);
				}
			} else {
				$count = count($this->collAffiliateGroupCategorys);
			}
		}
		$this->lastAffiliateGroupCategoryCriteria = $criteria;
		return $count;
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
		if (!in_array($l, $this->collAffiliateGroupCategorys, true)) { // only add it if the **same** object is not already associated
			array_push($this->collAffiliateGroupCategorys, $l);
			$l->setCategory($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Category is new, it will return
	 * an empty collection; or if this Category has previously
	 * been saved, it will retrieve related AffiliateGroupCategorys from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Category.
	 */
	public function getAffiliateGroupCategorysJoinAffiliateGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAffiliateGroupCategorys === null) {
			if ($this->isNew()) {
				$this->collAffiliateGroupCategorys = array();
			} else {

				$criteria->add(AffiliateGroupCategoryPeer::CATEGORYID, $this->id);

				$this->collAffiliateGroupCategorys = AffiliateGroupCategoryPeer::doSelectJoinAffiliateGroup($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AffiliateGroupCategoryPeer::CATEGORYID, $this->id);

			if (!isset($this->lastAffiliateGroupCategoryCriteria) || !$this->lastAffiliateGroupCategoryCriteria->equals($criteria)) {
				$this->collAffiliateGroupCategorys = AffiliateGroupCategoryPeer::doSelectJoinAffiliateGroup($criteria, $con, $join_behavior);
			}
		}
		$this->lastAffiliateGroupCategoryCriteria = $criteria;

		return $this->collAffiliateGroupCategorys;
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
			if ($this->collGroupCategorys) {
				foreach ((array) $this->collGroupCategorys as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAffiliateGroupCategorys) {
				foreach ((array) $this->collAffiliateGroupCategorys as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collGroupCategorys = null;
		$this->collAffiliateGroupCategorys = null;
	}

} // BaseCategory
