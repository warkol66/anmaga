<?php

/**
 * Base class that represents a row from the 'modules_module' table.
 *
 *  Registro de modulos
 *
 * @package    modules.classes.om
 */
abstract class BaseModule extends BaseObject  implements Persistent {


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
	 * The value for the hascategories field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $hascategories;

	/**
	 * @var        array ModuleDependency[] Collection to store aggregation of ModuleDependency objects.
	 */
	protected $collModuleDependencys;

	/**
	 * @var        Criteria The criteria used to select the current contents of collModuleDependencys.
	 */
	private $lastModuleDependencyCriteria = null;

	/**
	 * @var        array ModuleLabel[] Collection to store aggregation of ModuleLabel objects.
	 */
	protected $collModuleLabels;

	/**
	 * @var        Criteria The criteria used to select the current contents of collModuleLabels.
	 */
	private $lastModuleLabelCriteria = null;

	/**
	 * @var        array MultilangText[] Collection to store aggregation of MultilangText objects.
	 */
	protected $collMultilangTexts;

	/**
	 * @var        Criteria The criteria used to select the current contents of collMultilangTexts.
	 */
	private $lastMultilangTextCriteria = null;

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
	 * Initializes internal state of BaseModule object.
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
		$this->active = false;
		$this->alwaysactive = false;
		$this->hascategories = false;
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
	 * Get the [hascategories] column value.
	 * El Modulo tiene categorias relacionadas?
	 * @return     boolean
	 */
	public function getHascategories()
	{
		return $this->hascategories;
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

		if ($this->active !== $v || $v === false) {
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

		if ($this->alwaysactive !== $v || $v === false) {
			$this->alwaysactive = $v;
			$this->modifiedColumns[] = ModulePeer::ALWAYSACTIVE;
		}

		return $this;
	} // setAlwaysactive()

	/**
	 * Set the value of [hascategories] column.
	 * El Modulo tiene categorias relacionadas?
	 * @param      boolean $v new value
	 * @return     Module The current object (for fluent API support)
	 */
	public function setHascategories($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->hascategories !== $v || $v === false) {
			$this->hascategories = $v;
			$this->modifiedColumns[] = ModulePeer::HASCATEGORIES;
		}

		return $this;
	} // setHascategories()

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
			if (array_diff($this->modifiedColumns, array(ModulePeer::ACTIVE,ModulePeer::ALWAYSACTIVE,ModulePeer::HASCATEGORIES))) {
				return false;
			}

			if ($this->active !== false) {
				return false;
			}

			if ($this->alwaysactive !== false) {
				return false;
			}

			if ($this->hascategories !== false) {
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
			$this->hascategories = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 4; // 4 = ModulePeer::NUM_COLUMNS - ModulePeer::NUM_LAZY_LOAD_COLUMNS).

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
			$this->lastModuleDependencyCriteria = null;

			$this->collModuleLabels = null;
			$this->lastModuleLabelCriteria = null;

			$this->collMultilangTexts = null;
			$this->lastMultilangTextCriteria = null;

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
			ModulePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ModulePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			ModulePeer::addInstanceToPool($this);
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
					$pk = ModulePeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setNew(false);
				} else {
					$affectedRows += ModulePeer::doUpdate($this, $con);
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

			if ($this->collMultilangTexts !== null) {
				foreach ($this->collMultilangTexts as $referrerFK) {
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

				if ($this->collMultilangTexts !== null) {
					foreach ($this->collMultilangTexts as $referrerFK) {
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
		$criteria = new Criteria(ModulePeer::DATABASE_NAME);

		if ($this->isColumnModified(ModulePeer::NAME)) $criteria->add(ModulePeer::NAME, $this->name);
		if ($this->isColumnModified(ModulePeer::ACTIVE)) $criteria->add(ModulePeer::ACTIVE, $this->active);
		if ($this->isColumnModified(ModulePeer::ALWAYSACTIVE)) $criteria->add(ModulePeer::ALWAYSACTIVE, $this->alwaysactive);
		if ($this->isColumnModified(ModulePeer::HASCATEGORIES)) $criteria->add(ModulePeer::HASCATEGORIES, $this->hascategories);

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

		$copyObj->setHascategories($this->hascategories);


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

			foreach ($this->getMultilangTexts() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addMultilangText($relObj->copy($deepCopy));
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
	 * Clears out the collModuleDependencys collection (array).
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
	 * Initializes the collModuleDependencys collection (array).
	 *
	 * By default this just sets the collModuleDependencys collection to an empty array (like clearcollModuleDependencys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initModuleDependencys()
	{
		$this->collModuleDependencys = array();
	}

	/**
	 * Gets an array of ModuleDependency objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Module has previously been saved, it will retrieve
	 * related ModuleDependencys from storage. If this Module is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ModuleDependency[]
	 * @throws     PropelException
	 */
	public function getModuleDependencys($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ModulePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collModuleDependencys === null) {
			if ($this->isNew()) {
			   $this->collModuleDependencys = array();
			} else {

				$criteria->add(ModuleDependencyPeer::MODULENAME, $this->name);

				ModuleDependencyPeer::addSelectColumns($criteria);
				$this->collModuleDependencys = ModuleDependencyPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ModuleDependencyPeer::MODULENAME, $this->name);

				ModuleDependencyPeer::addSelectColumns($criteria);
				if (!isset($this->lastModuleDependencyCriteria) || !$this->lastModuleDependencyCriteria->equals($criteria)) {
					$this->collModuleDependencys = ModuleDependencyPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastModuleDependencyCriteria = $criteria;
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
		if ($criteria === null) {
			$criteria = new Criteria(ModulePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collModuleDependencys === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ModuleDependencyPeer::MODULENAME, $this->name);

				$count = ModuleDependencyPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ModuleDependencyPeer::MODULENAME, $this->name);

				if (!isset($this->lastModuleDependencyCriteria) || !$this->lastModuleDependencyCriteria->equals($criteria)) {
					$count = ModuleDependencyPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collModuleDependencys);
				}
			} else {
				$count = count($this->collModuleDependencys);
			}
		}
		$this->lastModuleDependencyCriteria = $criteria;
		return $count;
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
		if (!in_array($l, $this->collModuleDependencys, true)) { // only add it if the **same** object is not already associated
			array_push($this->collModuleDependencys, $l);
			$l->setModule($this);
		}
	}

	/**
	 * Clears out the collModuleLabels collection (array).
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
	 * Initializes the collModuleLabels collection (array).
	 *
	 * By default this just sets the collModuleLabels collection to an empty array (like clearcollModuleLabels());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initModuleLabels()
	{
		$this->collModuleLabels = array();
	}

	/**
	 * Gets an array of ModuleLabel objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Module has previously been saved, it will retrieve
	 * related ModuleLabels from storage. If this Module is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ModuleLabel[]
	 * @throws     PropelException
	 */
	public function getModuleLabels($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ModulePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collModuleLabels === null) {
			if ($this->isNew()) {
			   $this->collModuleLabels = array();
			} else {

				$criteria->add(ModuleLabelPeer::NAME, $this->name);

				ModuleLabelPeer::addSelectColumns($criteria);
				$this->collModuleLabels = ModuleLabelPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ModuleLabelPeer::NAME, $this->name);

				ModuleLabelPeer::addSelectColumns($criteria);
				if (!isset($this->lastModuleLabelCriteria) || !$this->lastModuleLabelCriteria->equals($criteria)) {
					$this->collModuleLabels = ModuleLabelPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastModuleLabelCriteria = $criteria;
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
		if ($criteria === null) {
			$criteria = new Criteria(ModulePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collModuleLabels === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ModuleLabelPeer::NAME, $this->name);

				$count = ModuleLabelPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ModuleLabelPeer::NAME, $this->name);

				if (!isset($this->lastModuleLabelCriteria) || !$this->lastModuleLabelCriteria->equals($criteria)) {
					$count = ModuleLabelPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collModuleLabels);
				}
			} else {
				$count = count($this->collModuleLabels);
			}
		}
		$this->lastModuleLabelCriteria = $criteria;
		return $count;
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
		if (!in_array($l, $this->collModuleLabels, true)) { // only add it if the **same** object is not already associated
			array_push($this->collModuleLabels, $l);
			$l->setModule($this);
		}
	}

	/**
	 * Clears out the collMultilangTexts collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addMultilangTexts()
	 */
	public function clearMultilangTexts()
	{
		$this->collMultilangTexts = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collMultilangTexts collection (array).
	 *
	 * By default this just sets the collMultilangTexts collection to an empty array (like clearcollMultilangTexts());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initMultilangTexts()
	{
		$this->collMultilangTexts = array();
	}

	/**
	 * Gets an array of MultilangText objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Module has previously been saved, it will retrieve
	 * related MultilangTexts from storage. If this Module is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array MultilangText[]
	 * @throws     PropelException
	 */
	public function getMultilangTexts($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ModulePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMultilangTexts === null) {
			if ($this->isNew()) {
			   $this->collMultilangTexts = array();
			} else {

				$criteria->add(MultilangTextPeer::MODULENAME, $this->name);

				MultilangTextPeer::addSelectColumns($criteria);
				$this->collMultilangTexts = MultilangTextPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(MultilangTextPeer::MODULENAME, $this->name);

				MultilangTextPeer::addSelectColumns($criteria);
				if (!isset($this->lastMultilangTextCriteria) || !$this->lastMultilangTextCriteria->equals($criteria)) {
					$this->collMultilangTexts = MultilangTextPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMultilangTextCriteria = $criteria;
		return $this->collMultilangTexts;
	}

	/**
	 * Returns the number of related MultilangText objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related MultilangText objects.
	 * @throws     PropelException
	 */
	public function countMultilangTexts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ModulePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collMultilangTexts === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(MultilangTextPeer::MODULENAME, $this->name);

				$count = MultilangTextPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(MultilangTextPeer::MODULENAME, $this->name);

				if (!isset($this->lastMultilangTextCriteria) || !$this->lastMultilangTextCriteria->equals($criteria)) {
					$count = MultilangTextPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collMultilangTexts);
				}
			} else {
				$count = count($this->collMultilangTexts);
			}
		}
		$this->lastMultilangTextCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a MultilangText object to this object
	 * through the MultilangText foreign key attribute.
	 *
	 * @param      MultilangText $l MultilangText
	 * @return     void
	 * @throws     PropelException
	 */
	public function addMultilangText(MultilangText $l)
	{
		if ($this->collMultilangTexts === null) {
			$this->initMultilangTexts();
		}
		if (!in_array($l, $this->collMultilangTexts, true)) { // only add it if the **same** object is not already associated
			array_push($this->collMultilangTexts, $l);
			$l->setModule($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Module is new, it will return
	 * an empty collection; or if this Module has previously
	 * been saved, it will retrieve related MultilangTexts from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Module.
	 */
	public function getMultilangTextsJoinMultilangLanguage($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ModulePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMultilangTexts === null) {
			if ($this->isNew()) {
				$this->collMultilangTexts = array();
			} else {

				$criteria->add(MultilangTextPeer::MODULENAME, $this->name);

				$this->collMultilangTexts = MultilangTextPeer::doSelectJoinMultilangLanguage($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(MultilangTextPeer::MODULENAME, $this->name);

			if (!isset($this->lastMultilangTextCriteria) || !$this->lastMultilangTextCriteria->equals($criteria)) {
				$this->collMultilangTexts = MultilangTextPeer::doSelectJoinMultilangLanguage($criteria, $con, $join_behavior);
			}
		}
		$this->lastMultilangTextCriteria = $criteria;

		return $this->collMultilangTexts;
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
			if ($this->collMultilangTexts) {
				foreach ((array) $this->collMultilangTexts as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collModuleDependencys = null;
		$this->collModuleLabels = null;
		$this->collMultilangTexts = null;
	}

} // BaseModule
