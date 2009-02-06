<?php

/**
 * Base class that represents a row from the 'security_module' table.
 *
 * Modulos del sistema
 *
 * @package    security.classes.om
 */
abstract class BaseSecurityModule extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SecurityModulePeer
	 */
	protected static $peer;

	/**
	 * The value for the module field.
	 * @var        string
	 */
	protected $module;

	/**
	 * The value for the access field.
	 * @var        int
	 */
	protected $access;

	/**
	 * The value for the accessaffiliateuser field.
	 * @var        int
	 */
	protected $accessaffiliateuser;

	/**
	 * The value for the accessregistrationuser field.
	 * @var        int
	 */
	protected $accessregistrationuser;

	/**
	 * @var        array SecurityAction[] Collection to store aggregation of SecurityAction objects.
	 */
	protected $collSecurityActions;

	/**
	 * @var        Criteria The criteria used to select the current contents of collSecurityActions.
	 */
	private $lastSecurityActionCriteria = null;

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
	 * Initializes internal state of BaseSecurityModule object.
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
	}

	/**
	 * Get the [module] column value.
	 * Modulo
	 * @return     string
	 */
	public function getModule()
	{
		return $this->module;
	}

	/**
	 * Get the [access] column value.
	 * El acceso a ese modulo
	 * @return     int
	 */
	public function getAccess()
	{
		return $this->access;
	}

	/**
	 * Get the [accessaffiliateuser] column value.
	 * El acceso a ese modulo para los usuarios por afiliados
	 * @return     int
	 */
	public function getAccessaffiliateuser()
	{
		return $this->accessaffiliateuser;
	}

	/**
	 * Get the [accessregistrationuser] column value.
	 * El acceso a ese modulo para los usuarios por registracion
	 * @return     int
	 */
	public function getAccessregistrationuser()
	{
		return $this->accessregistrationuser;
	}

	/**
	 * Set the value of [module] column.
	 * Modulo
	 * @param      string $v new value
	 * @return     SecurityModule The current object (for fluent API support)
	 */
	public function setModule($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->module !== $v) {
			$this->module = $v;
			$this->modifiedColumns[] = SecurityModulePeer::MODULE;
		}

		return $this;
	} // setModule()

	/**
	 * Set the value of [access] column.
	 * El acceso a ese modulo
	 * @param      int $v new value
	 * @return     SecurityModule The current object (for fluent API support)
	 */
	public function setAccess($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->access !== $v) {
			$this->access = $v;
			$this->modifiedColumns[] = SecurityModulePeer::ACCESS;
		}

		return $this;
	} // setAccess()

	/**
	 * Set the value of [accessaffiliateuser] column.
	 * El acceso a ese modulo para los usuarios por afiliados
	 * @param      int $v new value
	 * @return     SecurityModule The current object (for fluent API support)
	 */
	public function setAccessaffiliateuser($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->accessaffiliateuser !== $v) {
			$this->accessaffiliateuser = $v;
			$this->modifiedColumns[] = SecurityModulePeer::ACCESSAFFILIATEUSER;
		}

		return $this;
	} // setAccessaffiliateuser()

	/**
	 * Set the value of [accessregistrationuser] column.
	 * El acceso a ese modulo para los usuarios por registracion
	 * @param      int $v new value
	 * @return     SecurityModule The current object (for fluent API support)
	 */
	public function setAccessregistrationuser($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->accessregistrationuser !== $v) {
			$this->accessregistrationuser = $v;
			$this->modifiedColumns[] = SecurityModulePeer::ACCESSREGISTRATIONUSER;
		}

		return $this;
	} // setAccessregistrationuser()

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
			if (array_diff($this->modifiedColumns, array())) {
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

			$this->module = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->access = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->accessaffiliateuser = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->accessregistrationuser = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 4; // 4 = SecurityModulePeer::NUM_COLUMNS - SecurityModulePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating SecurityModule object", $e);
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
			$con = Propel::getConnection(SecurityModulePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SecurityModulePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collSecurityActions = null;
			$this->lastSecurityActionCriteria = null;

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
			$con = Propel::getConnection(SecurityModulePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			SecurityModulePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(SecurityModulePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			SecurityModulePeer::addInstanceToPool($this);
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
					$pk = SecurityModulePeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setNew(false);
				} else {
					$affectedRows += SecurityModulePeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collSecurityActions !== null) {
				foreach ($this->collSecurityActions as $referrerFK) {
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


			if (($retval = SecurityModulePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collSecurityActions !== null) {
					foreach ($this->collSecurityActions as $referrerFK) {
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
		$criteria = new Criteria(SecurityModulePeer::DATABASE_NAME);

		if ($this->isColumnModified(SecurityModulePeer::MODULE)) $criteria->add(SecurityModulePeer::MODULE, $this->module);
		if ($this->isColumnModified(SecurityModulePeer::ACCESS)) $criteria->add(SecurityModulePeer::ACCESS, $this->access);
		if ($this->isColumnModified(SecurityModulePeer::ACCESSAFFILIATEUSER)) $criteria->add(SecurityModulePeer::ACCESSAFFILIATEUSER, $this->accessaffiliateuser);
		if ($this->isColumnModified(SecurityModulePeer::ACCESSREGISTRATIONUSER)) $criteria->add(SecurityModulePeer::ACCESSREGISTRATIONUSER, $this->accessregistrationuser);

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
		$criteria = new Criteria(SecurityModulePeer::DATABASE_NAME);

		$criteria->add(SecurityModulePeer::MODULE, $this->module);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     string
	 */
	public function getPrimaryKey()
	{
		return $this->getModule();
	}

	/**
	 * Generic method to set the primary key (module column).
	 *
	 * @param      string $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setModule($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of SecurityModule (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setModule($this->module);

		$copyObj->setAccess($this->access);

		$copyObj->setAccessaffiliateuser($this->accessaffiliateuser);

		$copyObj->setAccessregistrationuser($this->accessregistrationuser);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getSecurityActions() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSecurityAction($relObj->copy($deepCopy));
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
	 * @return     SecurityModule Clone of current object.
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
	 * @return     SecurityModulePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SecurityModulePeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collSecurityActions collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSecurityActions()
	 */
	public function clearSecurityActions()
	{
		$this->collSecurityActions = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSecurityActions collection (array).
	 *
	 * By default this just sets the collSecurityActions collection to an empty array (like clearcollSecurityActions());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSecurityActions()
	{
		$this->collSecurityActions = array();
	}

	/**
	 * Gets an array of SecurityAction objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this SecurityModule has previously been saved, it will retrieve
	 * related SecurityActions from storage. If this SecurityModule is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array SecurityAction[]
	 * @throws     PropelException
	 */
	public function getSecurityActions($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SecurityModulePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSecurityActions === null) {
			if ($this->isNew()) {
			   $this->collSecurityActions = array();
			} else {

				$criteria->add(SecurityActionPeer::MODULE, $this->module);

				SecurityActionPeer::addSelectColumns($criteria);
				$this->collSecurityActions = SecurityActionPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(SecurityActionPeer::MODULE, $this->module);

				SecurityActionPeer::addSelectColumns($criteria);
				if (!isset($this->lastSecurityActionCriteria) || !$this->lastSecurityActionCriteria->equals($criteria)) {
					$this->collSecurityActions = SecurityActionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSecurityActionCriteria = $criteria;
		return $this->collSecurityActions;
	}

	/**
	 * Returns the number of related SecurityAction objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SecurityAction objects.
	 * @throws     PropelException
	 */
	public function countSecurityActions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SecurityModulePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collSecurityActions === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(SecurityActionPeer::MODULE, $this->module);

				$count = SecurityActionPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(SecurityActionPeer::MODULE, $this->module);

				if (!isset($this->lastSecurityActionCriteria) || !$this->lastSecurityActionCriteria->equals($criteria)) {
					$count = SecurityActionPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collSecurityActions);
				}
			} else {
				$count = count($this->collSecurityActions);
			}
		}
		$this->lastSecurityActionCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a SecurityAction object to this object
	 * through the SecurityAction foreign key attribute.
	 *
	 * @param      SecurityAction $l SecurityAction
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSecurityAction(SecurityAction $l)
	{
		if ($this->collSecurityActions === null) {
			$this->initSecurityActions();
		}
		if (!in_array($l, $this->collSecurityActions, true)) { // only add it if the **same** object is not already associated
			array_push($this->collSecurityActions, $l);
			$l->setSecurityModule($this);
		}
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
			if ($this->collSecurityActions) {
				foreach ((array) $this->collSecurityActions as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collSecurityActions = null;
	}

} // BaseSecurityModule
