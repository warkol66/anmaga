<?php

/**
 * Base class that represents a row from the 'security_action' table.
 *
 * Actions del sistema
 *
 * @package    security.classes.om
 */
abstract class BaseSecurityAction extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SecurityActionPeer
	 */
	protected static $peer;

	/**
	 * The value for the action field.
	 * @var        string
	 */
	protected $action;

	/**
	 * The value for the module field.
	 * @var        string
	 */
	protected $module;

	/**
	 * The value for the section field.
	 * @var        string
	 */
	protected $section;

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
	 * The value for the active field.
	 * @var        int
	 */
	protected $active;

	/**
	 * The value for the pair field.
	 * @var        string
	 */
	protected $pair;

	/**
	 * The value for the nochecklogin field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $nochecklogin;

	/**
	 * @var        SecurityModule
	 */
	protected $aSecurityModule;

	/**
	 * @var        array ActionLog[] Collection to store aggregation of ActionLog objects.
	 */
	protected $collActionLogs;

	/**
	 * @var        Criteria The criteria used to select the current contents of collActionLogs.
	 */
	private $lastActionLogCriteria = null;

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
	 * Initializes internal state of BaseSecurityAction object.
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
		$this->nochecklogin = false;
	}

	/**
	 * Get the [action] column value.
	 * Action pagina
	 * @return     string
	 */
	public function getAction()
	{
		return $this->action;
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
	 * Get the [section] column value.
	 * Seccion
	 * @return     string
	 */
	public function getSection()
	{
		return $this->section;
	}

	/**
	 * Get the [access] column value.
	 * El acceso a ese action
	 * @return     int
	 */
	public function getAccess()
	{
		return $this->access;
	}

	/**
	 * Get the [accessaffiliateuser] column value.
	 * El acceso a ese action para los usuarios por afiliados
	 * @return     int
	 */
	public function getAccessaffiliateuser()
	{
		return $this->accessaffiliateuser;
	}

	/**
	 * Get the [accessregistrationuser] column value.
	 * El acceso a ese action para los usuarios por registracion
	 * @return     int
	 */
	public function getAccessregistrationuser()
	{
		return $this->accessregistrationuser;
	}

	/**
	 * Get the [active] column value.
	 * Si el action esta activo o no
	 * @return     int
	 */
	public function getActive()
	{
		return $this->active;
	}

	/**
	 * Get the [pair] column value.
	 * Par del Action
	 * @return     string
	 */
	public function getPair()
	{
		return $this->pair;
	}

	/**
	 * Get the [nochecklogin] column value.
	 * Si no se chequea login ese action
	 * @return     boolean
	 */
	public function getNochecklogin()
	{
		return $this->nochecklogin;
	}

	/**
	 * Set the value of [action] column.
	 * Action pagina
	 * @param      string $v new value
	 * @return     SecurityAction The current object (for fluent API support)
	 */
	public function setAction($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->action !== $v) {
			$this->action = $v;
			$this->modifiedColumns[] = SecurityActionPeer::ACTION;
		}

		return $this;
	} // setAction()

	/**
	 * Set the value of [module] column.
	 * Modulo
	 * @param      string $v new value
	 * @return     SecurityAction The current object (for fluent API support)
	 */
	public function setModule($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->module !== $v) {
			$this->module = $v;
			$this->modifiedColumns[] = SecurityActionPeer::MODULE;
		}

		if ($this->aSecurityModule !== null && $this->aSecurityModule->getModule() !== $v) {
			$this->aSecurityModule = null;
		}

		return $this;
	} // setModule()

	/**
	 * Set the value of [section] column.
	 * Seccion
	 * @param      string $v new value
	 * @return     SecurityAction The current object (for fluent API support)
	 */
	public function setSection($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->section !== $v) {
			$this->section = $v;
			$this->modifiedColumns[] = SecurityActionPeer::SECTION;
		}

		return $this;
	} // setSection()

	/**
	 * Set the value of [access] column.
	 * El acceso a ese action
	 * @param      int $v new value
	 * @return     SecurityAction The current object (for fluent API support)
	 */
	public function setAccess($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->access !== $v) {
			$this->access = $v;
			$this->modifiedColumns[] = SecurityActionPeer::ACCESS;
		}

		return $this;
	} // setAccess()

	/**
	 * Set the value of [accessaffiliateuser] column.
	 * El acceso a ese action para los usuarios por afiliados
	 * @param      int $v new value
	 * @return     SecurityAction The current object (for fluent API support)
	 */
	public function setAccessaffiliateuser($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->accessaffiliateuser !== $v) {
			$this->accessaffiliateuser = $v;
			$this->modifiedColumns[] = SecurityActionPeer::ACCESSAFFILIATEUSER;
		}

		return $this;
	} // setAccessaffiliateuser()

	/**
	 * Set the value of [accessregistrationuser] column.
	 * El acceso a ese action para los usuarios por registracion
	 * @param      int $v new value
	 * @return     SecurityAction The current object (for fluent API support)
	 */
	public function setAccessregistrationuser($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->accessregistrationuser !== $v) {
			$this->accessregistrationuser = $v;
			$this->modifiedColumns[] = SecurityActionPeer::ACCESSREGISTRATIONUSER;
		}

		return $this;
	} // setAccessregistrationuser()

	/**
	 * Set the value of [active] column.
	 * Si el action esta activo o no
	 * @param      int $v new value
	 * @return     SecurityAction The current object (for fluent API support)
	 */
	public function setActive($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->active !== $v) {
			$this->active = $v;
			$this->modifiedColumns[] = SecurityActionPeer::ACTIVE;
		}

		return $this;
	} // setActive()

	/**
	 * Set the value of [pair] column.
	 * Par del Action
	 * @param      string $v new value
	 * @return     SecurityAction The current object (for fluent API support)
	 */
	public function setPair($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->pair !== $v) {
			$this->pair = $v;
			$this->modifiedColumns[] = SecurityActionPeer::PAIR;
		}

		return $this;
	} // setPair()

	/**
	 * Set the value of [nochecklogin] column.
	 * Si no se chequea login ese action
	 * @param      boolean $v new value
	 * @return     SecurityAction The current object (for fluent API support)
	 */
	public function setNochecklogin($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->nochecklogin !== $v || $v === false) {
			$this->nochecklogin = $v;
			$this->modifiedColumns[] = SecurityActionPeer::NOCHECKLOGIN;
		}

		return $this;
	} // setNochecklogin()

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
			if (array_diff($this->modifiedColumns, array(SecurityActionPeer::NOCHECKLOGIN))) {
				return false;
			}

			if ($this->nochecklogin !== false) {
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

			$this->action = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->module = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->section = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->access = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->accessaffiliateuser = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->accessregistrationuser = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->active = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->pair = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->nochecklogin = ($row[$startcol + 8] !== null) ? (boolean) $row[$startcol + 8] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 9; // 9 = SecurityActionPeer::NUM_COLUMNS - SecurityActionPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating SecurityAction object", $e);
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

		if ($this->aSecurityModule !== null && $this->module !== $this->aSecurityModule->getModule()) {
			$this->aSecurityModule = null;
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
			$con = Propel::getConnection(SecurityActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SecurityActionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aSecurityModule = null;
			$this->collActionLogs = null;
			$this->lastActionLogCriteria = null;

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
			$con = Propel::getConnection(SecurityActionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			SecurityActionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(SecurityActionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			SecurityActionPeer::addInstanceToPool($this);
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

			if ($this->aSecurityModule !== null) {
				if ($this->aSecurityModule->isModified() || $this->aSecurityModule->isNew()) {
					$affectedRows += $this->aSecurityModule->save($con);
				}
				$this->setSecurityModule($this->aSecurityModule);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SecurityActionPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setNew(false);
				} else {
					$affectedRows += SecurityActionPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collActionLogs !== null) {
				foreach ($this->collActionLogs as $referrerFK) {
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

			if ($this->aSecurityModule !== null) {
				if (!$this->aSecurityModule->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSecurityModule->getValidationFailures());
				}
			}


			if (($retval = SecurityActionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collActionLogs !== null) {
					foreach ($this->collActionLogs as $referrerFK) {
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
		$criteria = new Criteria(SecurityActionPeer::DATABASE_NAME);

		if ($this->isColumnModified(SecurityActionPeer::ACTION)) $criteria->add(SecurityActionPeer::ACTION, $this->action);
		if ($this->isColumnModified(SecurityActionPeer::MODULE)) $criteria->add(SecurityActionPeer::MODULE, $this->module);
		if ($this->isColumnModified(SecurityActionPeer::SECTION)) $criteria->add(SecurityActionPeer::SECTION, $this->section);
		if ($this->isColumnModified(SecurityActionPeer::ACCESS)) $criteria->add(SecurityActionPeer::ACCESS, $this->access);
		if ($this->isColumnModified(SecurityActionPeer::ACCESSAFFILIATEUSER)) $criteria->add(SecurityActionPeer::ACCESSAFFILIATEUSER, $this->accessaffiliateuser);
		if ($this->isColumnModified(SecurityActionPeer::ACCESSREGISTRATIONUSER)) $criteria->add(SecurityActionPeer::ACCESSREGISTRATIONUSER, $this->accessregistrationuser);
		if ($this->isColumnModified(SecurityActionPeer::ACTIVE)) $criteria->add(SecurityActionPeer::ACTIVE, $this->active);
		if ($this->isColumnModified(SecurityActionPeer::PAIR)) $criteria->add(SecurityActionPeer::PAIR, $this->pair);
		if ($this->isColumnModified(SecurityActionPeer::NOCHECKLOGIN)) $criteria->add(SecurityActionPeer::NOCHECKLOGIN, $this->nochecklogin);

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
		$criteria = new Criteria(SecurityActionPeer::DATABASE_NAME);

		$criteria->add(SecurityActionPeer::ACTION, $this->action);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     string
	 */
	public function getPrimaryKey()
	{
		return $this->getAction();
	}

	/**
	 * Generic method to set the primary key (action column).
	 *
	 * @param      string $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setAction($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of SecurityAction (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setAction($this->action);

		$copyObj->setModule($this->module);

		$copyObj->setSection($this->section);

		$copyObj->setAccess($this->access);

		$copyObj->setAccessaffiliateuser($this->accessaffiliateuser);

		$copyObj->setAccessregistrationuser($this->accessregistrationuser);

		$copyObj->setActive($this->active);

		$copyObj->setPair($this->pair);

		$copyObj->setNochecklogin($this->nochecklogin);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getActionLogs() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addActionLog($relObj->copy($deepCopy));
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
	 * @return     SecurityAction Clone of current object.
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
	 * @return     SecurityActionPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SecurityActionPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a SecurityModule object.
	 *
	 * @param      SecurityModule $v
	 * @return     SecurityAction The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSecurityModule(SecurityModule $v = null)
	{
		if ($v === null) {
			$this->setModule(NULL);
		} else {
			$this->setModule($v->getModule());
		}

		$this->aSecurityModule = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SecurityModule object, it will not be re-added.
		if ($v !== null) {
			$v->addSecurityAction($this);
		}

		return $this;
	}


	/**
	 * Get the associated SecurityModule object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     SecurityModule The associated SecurityModule object.
	 * @throws     PropelException
	 */
	public function getSecurityModule(PropelPDO $con = null)
	{
		if ($this->aSecurityModule === null && (($this->module !== "" && $this->module !== null))) {
			$this->aSecurityModule = SecurityModulePeer::retrieveByPK($this->module, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aSecurityModule->addSecurityActions($this);
			 */
		}
		return $this->aSecurityModule;
	}

	/**
	 * Clears out the collActionLogs collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addActionLogs()
	 */
	public function clearActionLogs()
	{
		$this->collActionLogs = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collActionLogs collection (array).
	 *
	 * By default this just sets the collActionLogs collection to an empty array (like clearcollActionLogs());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initActionLogs()
	{
		$this->collActionLogs = array();
	}

	/**
	 * Gets an array of ActionLog objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this SecurityAction has previously been saved, it will retrieve
	 * related ActionLogs from storage. If this SecurityAction is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ActionLog[]
	 * @throws     PropelException
	 */
	public function getActionLogs($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SecurityActionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActionLogs === null) {
			if ($this->isNew()) {
			   $this->collActionLogs = array();
			} else {

				$criteria->add(ActionLogPeer::ACTION, $this->action);

				ActionLogPeer::addSelectColumns($criteria);
				$this->collActionLogs = ActionLogPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ActionLogPeer::ACTION, $this->action);

				ActionLogPeer::addSelectColumns($criteria);
				if (!isset($this->lastActionLogCriteria) || !$this->lastActionLogCriteria->equals($criteria)) {
					$this->collActionLogs = ActionLogPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastActionLogCriteria = $criteria;
		return $this->collActionLogs;
	}

	/**
	 * Returns the number of related ActionLog objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ActionLog objects.
	 * @throws     PropelException
	 */
	public function countActionLogs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SecurityActionPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collActionLogs === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ActionLogPeer::ACTION, $this->action);

				$count = ActionLogPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ActionLogPeer::ACTION, $this->action);

				if (!isset($this->lastActionLogCriteria) || !$this->lastActionLogCriteria->equals($criteria)) {
					$count = ActionLogPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collActionLogs);
				}
			} else {
				$count = count($this->collActionLogs);
			}
		}
		$this->lastActionLogCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a ActionLog object to this object
	 * through the ActionLog foreign key attribute.
	 *
	 * @param      ActionLog $l ActionLog
	 * @return     void
	 * @throws     PropelException
	 */
	public function addActionLog(ActionLog $l)
	{
		if ($this->collActionLogs === null) {
			$this->initActionLogs();
		}
		if (!in_array($l, $this->collActionLogs, true)) { // only add it if the **same** object is not already associated
			array_push($this->collActionLogs, $l);
			$l->setSecurityAction($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SecurityAction is new, it will return
	 * an empty collection; or if this SecurityAction has previously
	 * been saved, it will retrieve related ActionLogs from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SecurityAction.
	 */
	public function getActionLogsJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SecurityActionPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActionLogs === null) {
			if ($this->isNew()) {
				$this->collActionLogs = array();
			} else {

				$criteria->add(ActionLogPeer::ACTION, $this->action);

				$this->collActionLogs = ActionLogPeer::doSelectJoinUser($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ActionLogPeer::ACTION, $this->action);

			if (!isset($this->lastActionLogCriteria) || !$this->lastActionLogCriteria->equals($criteria)) {
				$this->collActionLogs = ActionLogPeer::doSelectJoinUser($criteria, $con, $join_behavior);
			}
		}
		$this->lastActionLogCriteria = $criteria;

		return $this->collActionLogs;
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
			if ($this->collActionLogs) {
				foreach ((array) $this->collActionLogs as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collActionLogs = null;
			$this->aSecurityModule = null;
	}

} // BaseSecurityAction
