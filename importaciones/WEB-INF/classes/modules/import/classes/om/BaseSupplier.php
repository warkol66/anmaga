<?php

/**
 * Base class that represents a row from the 'import_supplier' table.
 *
 * Proveedores
 *
 * @package    import.classes.om
 */
abstract class BaseSupplier extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SupplierPeer
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
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the active field.
	 * @var        boolean
	 */
	protected $active;

	/**
	 * The value for the defaultincotermid field.
	 * @var        int
	 */
	protected $defaultincotermid;

	/**
	 * The value for the defaultportid field.
	 * @var        int
	 */
	protected $defaultportid;

	/**
	 * @var        Incoterm
	 */
	protected $aIncoterm;

	/**
	 * @var        Port
	 */
	protected $aPort;

	/**
	 * @var        array ProductSupplier[] Collection to store aggregation of ProductSupplier objects.
	 */
	protected $collProductSuppliers;

	/**
	 * @var        Criteria The criteria used to select the current contents of collProductSuppliers.
	 */
	private $lastProductSupplierCriteria = null;

	/**
	 * @var        array SupplierQuote[] Collection to store aggregation of SupplierQuote objects.
	 */
	protected $collSupplierQuotes;

	/**
	 * @var        Criteria The criteria used to select the current contents of collSupplierQuotes.
	 */
	private $lastSupplierQuoteCriteria = null;

	/**
	 * @var        array SupplierQuoteItemComment[] Collection to store aggregation of SupplierQuoteItemComment objects.
	 */
	protected $collSupplierQuoteItemComments;

	/**
	 * @var        Criteria The criteria used to select the current contents of collSupplierQuoteItemComments.
	 */
	private $lastSupplierQuoteItemCommentCriteria = null;

	/**
	 * @var        array SupplierPurchaseOrder[] Collection to store aggregation of SupplierPurchaseOrder objects.
	 */
	protected $collSupplierPurchaseOrders;

	/**
	 * @var        Criteria The criteria used to select the current contents of collSupplierPurchaseOrders.
	 */
	private $lastSupplierPurchaseOrderCriteria = null;

	/**
	 * @var        array Shipment[] Collection to store aggregation of Shipment objects.
	 */
	protected $collShipments;

	/**
	 * @var        Criteria The criteria used to select the current contents of collShipments.
	 */
	private $lastShipmentCriteria = null;

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
	 * Initializes internal state of BaseSupplier object.
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
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [name] column value.
	 * Nombre
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [email] column value.
	 * email
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Get the [active] column value.
	 * Is supplier active?
	 * @return     boolean
	 */
	public function getActive()
	{
		return $this->active;
	}

	/**
	 * Get the [defaultincotermid] column value.
	 * id de incoterm por default del proveedor
	 * @return     int
	 */
	public function getDefaultincotermid()
	{
		return $this->defaultincotermid;
	}

	/**
	 * Get the [defaultportid] column value.
	 * id de puerto por default del proveedor
	 * @return     int
	 */
	public function getDefaultportid()
	{
		return $this->defaultportid;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Supplier The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SupplierPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [name] column.
	 * Nombre
	 * @param      string $v new value
	 * @return     Supplier The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = SupplierPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [email] column.
	 * email
	 * @param      string $v new value
	 * @return     Supplier The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = SupplierPeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [active] column.
	 * Is supplier active?
	 * @param      boolean $v new value
	 * @return     Supplier The current object (for fluent API support)
	 */
	public function setActive($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->active !== $v) {
			$this->active = $v;
			$this->modifiedColumns[] = SupplierPeer::ACTIVE;
		}

		return $this;
	} // setActive()

	/**
	 * Set the value of [defaultincotermid] column.
	 * id de incoterm por default del proveedor
	 * @param      int $v new value
	 * @return     Supplier The current object (for fluent API support)
	 */
	public function setDefaultincotermid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->defaultincotermid !== $v) {
			$this->defaultincotermid = $v;
			$this->modifiedColumns[] = SupplierPeer::DEFAULTINCOTERMID;
		}

		if ($this->aIncoterm !== null && $this->aIncoterm->getId() !== $v) {
			$this->aIncoterm = null;
		}

		return $this;
	} // setDefaultincotermid()

	/**
	 * Set the value of [defaultportid] column.
	 * id de puerto por default del proveedor
	 * @param      int $v new value
	 * @return     Supplier The current object (for fluent API support)
	 */
	public function setDefaultportid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->defaultportid !== $v) {
			$this->defaultportid = $v;
			$this->modifiedColumns[] = SupplierPeer::DEFAULTPORTID;
		}

		if ($this->aPort !== null && $this->aPort->getId() !== $v) {
			$this->aPort = null;
		}

		return $this;
	} // setDefaultportid()

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

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->email = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->active = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
			$this->defaultincotermid = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->defaultportid = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 6; // 6 = SupplierPeer::NUM_COLUMNS - SupplierPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Supplier object", $e);
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

		if ($this->aIncoterm !== null && $this->defaultincotermid !== $this->aIncoterm->getId()) {
			$this->aIncoterm = null;
		}
		if ($this->aPort !== null && $this->defaultportid !== $this->aPort->getId()) {
			$this->aPort = null;
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
			$con = Propel::getConnection(SupplierPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SupplierPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aIncoterm = null;
			$this->aPort = null;
			$this->collProductSuppliers = null;
			$this->lastProductSupplierCriteria = null;

			$this->collSupplierQuotes = null;
			$this->lastSupplierQuoteCriteria = null;

			$this->collSupplierQuoteItemComments = null;
			$this->lastSupplierQuoteItemCommentCriteria = null;

			$this->collSupplierPurchaseOrders = null;
			$this->lastSupplierPurchaseOrderCriteria = null;

			$this->collShipments = null;
			$this->lastShipmentCriteria = null;

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
			$con = Propel::getConnection(SupplierPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			SupplierPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(SupplierPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			SupplierPeer::addInstanceToPool($this);
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

			if ($this->aIncoterm !== null) {
				if ($this->aIncoterm->isModified() || $this->aIncoterm->isNew()) {
					$affectedRows += $this->aIncoterm->save($con);
				}
				$this->setIncoterm($this->aIncoterm);
			}

			if ($this->aPort !== null) {
				if ($this->aPort->isModified() || $this->aPort->isNew()) {
					$affectedRows += $this->aPort->save($con);
				}
				$this->setPort($this->aPort);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = SupplierPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SupplierPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += SupplierPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collProductSuppliers !== null) {
				foreach ($this->collProductSuppliers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSupplierQuotes !== null) {
				foreach ($this->collSupplierQuotes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSupplierQuoteItemComments !== null) {
				foreach ($this->collSupplierQuoteItemComments as $referrerFK) {
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

			if ($this->collShipments !== null) {
				foreach ($this->collShipments as $referrerFK) {
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

			if ($this->aIncoterm !== null) {
				if (!$this->aIncoterm->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aIncoterm->getValidationFailures());
				}
			}

			if ($this->aPort !== null) {
				if (!$this->aPort->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPort->getValidationFailures());
				}
			}


			if (($retval = SupplierPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collProductSuppliers !== null) {
					foreach ($this->collProductSuppliers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSupplierQuotes !== null) {
					foreach ($this->collSupplierQuotes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSupplierQuoteItemComments !== null) {
					foreach ($this->collSupplierQuoteItemComments as $referrerFK) {
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

				if ($this->collShipments !== null) {
					foreach ($this->collShipments as $referrerFK) {
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
		$criteria = new Criteria(SupplierPeer::DATABASE_NAME);

		if ($this->isColumnModified(SupplierPeer::ID)) $criteria->add(SupplierPeer::ID, $this->id);
		if ($this->isColumnModified(SupplierPeer::NAME)) $criteria->add(SupplierPeer::NAME, $this->name);
		if ($this->isColumnModified(SupplierPeer::EMAIL)) $criteria->add(SupplierPeer::EMAIL, $this->email);
		if ($this->isColumnModified(SupplierPeer::ACTIVE)) $criteria->add(SupplierPeer::ACTIVE, $this->active);
		if ($this->isColumnModified(SupplierPeer::DEFAULTINCOTERMID)) $criteria->add(SupplierPeer::DEFAULTINCOTERMID, $this->defaultincotermid);
		if ($this->isColumnModified(SupplierPeer::DEFAULTPORTID)) $criteria->add(SupplierPeer::DEFAULTPORTID, $this->defaultportid);

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
		$criteria = new Criteria(SupplierPeer::DATABASE_NAME);

		$criteria->add(SupplierPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Supplier (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setName($this->name);

		$copyObj->setEmail($this->email);

		$copyObj->setActive($this->active);

		$copyObj->setDefaultincotermid($this->defaultincotermid);

		$copyObj->setDefaultportid($this->defaultportid);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getProductSuppliers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProductSupplier($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierQuotes() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierQuote($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierQuoteItemComments() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierQuoteItemComment($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierPurchaseOrders() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierPurchaseOrder($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getShipments() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addShipment($relObj->copy($deepCopy));
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
	 * @return     Supplier Clone of current object.
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
	 * @return     SupplierPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SupplierPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Incoterm object.
	 *
	 * @param      Incoterm $v
	 * @return     Supplier The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setIncoterm(Incoterm $v = null)
	{
		if ($v === null) {
			$this->setDefaultincotermid(NULL);
		} else {
			$this->setDefaultincotermid($v->getId());
		}

		$this->aIncoterm = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Incoterm object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplier($this);
		}

		return $this;
	}


	/**
	 * Get the associated Incoterm object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Incoterm The associated Incoterm object.
	 * @throws     PropelException
	 */
	public function getIncoterm(PropelPDO $con = null)
	{
		if ($this->aIncoterm === null && ($this->defaultincotermid !== null)) {
			$this->aIncoterm = IncotermPeer::retrieveByPK($this->defaultincotermid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aIncoterm->addSuppliers($this);
			 */
		}
		return $this->aIncoterm;
	}

	/**
	 * Declares an association between this object and a Port object.
	 *
	 * @param      Port $v
	 * @return     Supplier The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPort(Port $v = null)
	{
		if ($v === null) {
			$this->setDefaultportid(NULL);
		} else {
			$this->setDefaultportid($v->getId());
		}

		$this->aPort = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Port object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplier($this);
		}

		return $this;
	}


	/**
	 * Get the associated Port object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Port The associated Port object.
	 * @throws     PropelException
	 */
	public function getPort(PropelPDO $con = null)
	{
		if ($this->aPort === null && ($this->defaultportid !== null)) {
			$this->aPort = PortPeer::retrieveByPK($this->defaultportid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aPort->addSuppliers($this);
			 */
		}
		return $this->aPort;
	}

	/**
	 * Clears out the collProductSuppliers collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProductSuppliers()
	 */
	public function clearProductSuppliers()
	{
		$this->collProductSuppliers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProductSuppliers collection (array).
	 *
	 * By default this just sets the collProductSuppliers collection to an empty array (like clearcollProductSuppliers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProductSuppliers()
	{
		$this->collProductSuppliers = array();
	}

	/**
	 * Gets an array of ProductSupplier objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Supplier has previously been saved, it will retrieve
	 * related ProductSuppliers from storage. If this Supplier is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ProductSupplier[]
	 * @throws     PropelException
	 */
	public function getProductSuppliers($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProductSuppliers === null) {
			if ($this->isNew()) {
			   $this->collProductSuppliers = array();
			} else {

				$criteria->add(ProductSupplierPeer::SUPPLIERID, $this->id);

				ProductSupplierPeer::addSelectColumns($criteria);
				$this->collProductSuppliers = ProductSupplierPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ProductSupplierPeer::SUPPLIERID, $this->id);

				ProductSupplierPeer::addSelectColumns($criteria);
				if (!isset($this->lastProductSupplierCriteria) || !$this->lastProductSupplierCriteria->equals($criteria)) {
					$this->collProductSuppliers = ProductSupplierPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProductSupplierCriteria = $criteria;
		return $this->collProductSuppliers;
	}

	/**
	 * Returns the number of related ProductSupplier objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ProductSupplier objects.
	 * @throws     PropelException
	 */
	public function countProductSuppliers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collProductSuppliers === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ProductSupplierPeer::SUPPLIERID, $this->id);

				$count = ProductSupplierPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ProductSupplierPeer::SUPPLIERID, $this->id);

				if (!isset($this->lastProductSupplierCriteria) || !$this->lastProductSupplierCriteria->equals($criteria)) {
					$count = ProductSupplierPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collProductSuppliers);
				}
			} else {
				$count = count($this->collProductSuppliers);
			}
		}
		$this->lastProductSupplierCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a ProductSupplier object to this object
	 * through the ProductSupplier foreign key attribute.
	 *
	 * @param      ProductSupplier $l ProductSupplier
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProductSupplier(ProductSupplier $l)
	{
		if ($this->collProductSuppliers === null) {
			$this->initProductSuppliers();
		}
		if (!in_array($l, $this->collProductSuppliers, true)) { // only add it if the **same** object is not already associated
			array_push($this->collProductSuppliers, $l);
			$l->setSupplier($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Supplier is new, it will return
	 * an empty collection; or if this Supplier has previously
	 * been saved, it will retrieve related ProductSuppliers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Supplier.
	 */
	public function getProductSuppliersJoinProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProductSuppliers === null) {
			if ($this->isNew()) {
				$this->collProductSuppliers = array();
			} else {

				$criteria->add(ProductSupplierPeer::SUPPLIERID, $this->id);

				$this->collProductSuppliers = ProductSupplierPeer::doSelectJoinProduct($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProductSupplierPeer::SUPPLIERID, $this->id);

			if (!isset($this->lastProductSupplierCriteria) || !$this->lastProductSupplierCriteria->equals($criteria)) {
				$this->collProductSuppliers = ProductSupplierPeer::doSelectJoinProduct($criteria, $con, $join_behavior);
			}
		}
		$this->lastProductSupplierCriteria = $criteria;

		return $this->collProductSuppliers;
	}

	/**
	 * Clears out the collSupplierQuotes collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSupplierQuotes()
	 */
	public function clearSupplierQuotes()
	{
		$this->collSupplierQuotes = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSupplierQuotes collection (array).
	 *
	 * By default this just sets the collSupplierQuotes collection to an empty array (like clearcollSupplierQuotes());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierQuotes()
	{
		$this->collSupplierQuotes = array();
	}

	/**
	 * Gets an array of SupplierQuote objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Supplier has previously been saved, it will retrieve
	 * related SupplierQuotes from storage. If this Supplier is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array SupplierQuote[]
	 * @throws     PropelException
	 */
	public function getSupplierQuotes($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotes === null) {
			if ($this->isNew()) {
			   $this->collSupplierQuotes = array();
			} else {

				$criteria->add(SupplierQuotePeer::SUPPLIERID, $this->id);

				SupplierQuotePeer::addSelectColumns($criteria);
				$this->collSupplierQuotes = SupplierQuotePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(SupplierQuotePeer::SUPPLIERID, $this->id);

				SupplierQuotePeer::addSelectColumns($criteria);
				if (!isset($this->lastSupplierQuoteCriteria) || !$this->lastSupplierQuoteCriteria->equals($criteria)) {
					$this->collSupplierQuotes = SupplierQuotePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSupplierQuoteCriteria = $criteria;
		return $this->collSupplierQuotes;
	}

	/**
	 * Returns the number of related SupplierQuote objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SupplierQuote objects.
	 * @throws     PropelException
	 */
	public function countSupplierQuotes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collSupplierQuotes === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(SupplierQuotePeer::SUPPLIERID, $this->id);

				$count = SupplierQuotePeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(SupplierQuotePeer::SUPPLIERID, $this->id);

				if (!isset($this->lastSupplierQuoteCriteria) || !$this->lastSupplierQuoteCriteria->equals($criteria)) {
					$count = SupplierQuotePeer::doCount($criteria, $con);
				} else {
					$count = count($this->collSupplierQuotes);
				}
			} else {
				$count = count($this->collSupplierQuotes);
			}
		}
		$this->lastSupplierQuoteCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a SupplierQuote object to this object
	 * through the SupplierQuote foreign key attribute.
	 *
	 * @param      SupplierQuote $l SupplierQuote
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSupplierQuote(SupplierQuote $l)
	{
		if ($this->collSupplierQuotes === null) {
			$this->initSupplierQuotes();
		}
		if (!in_array($l, $this->collSupplierQuotes, true)) { // only add it if the **same** object is not already associated
			array_push($this->collSupplierQuotes, $l);
			$l->setSupplier($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Supplier is new, it will return
	 * an empty collection; or if this Supplier has previously
	 * been saved, it will retrieve related SupplierQuotes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Supplier.
	 */
	public function getSupplierQuotesJoinClientQuote($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotes === null) {
			if ($this->isNew()) {
				$this->collSupplierQuotes = array();
			} else {

				$criteria->add(SupplierQuotePeer::SUPPLIERID, $this->id);

				$this->collSupplierQuotes = SupplierQuotePeer::doSelectJoinClientQuote($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuotePeer::SUPPLIERID, $this->id);

			if (!isset($this->lastSupplierQuoteCriteria) || !$this->lastSupplierQuoteCriteria->equals($criteria)) {
				$this->collSupplierQuotes = SupplierQuotePeer::doSelectJoinClientQuote($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuoteCriteria = $criteria;

		return $this->collSupplierQuotes;
	}

	/**
	 * Clears out the collSupplierQuoteItemComments collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSupplierQuoteItemComments()
	 */
	public function clearSupplierQuoteItemComments()
	{
		$this->collSupplierQuoteItemComments = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSupplierQuoteItemComments collection (array).
	 *
	 * By default this just sets the collSupplierQuoteItemComments collection to an empty array (like clearcollSupplierQuoteItemComments());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierQuoteItemComments()
	{
		$this->collSupplierQuoteItemComments = array();
	}

	/**
	 * Gets an array of SupplierQuoteItemComment objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Supplier has previously been saved, it will retrieve
	 * related SupplierQuoteItemComments from storage. If this Supplier is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array SupplierQuoteItemComment[]
	 * @throws     PropelException
	 */
	public function getSupplierQuoteItemComments($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuoteItemComments === null) {
			if ($this->isNew()) {
			   $this->collSupplierQuoteItemComments = array();
			} else {

				$criteria->add(SupplierQuoteItemCommentPeer::SUPPLIERID, $this->id);

				SupplierQuoteItemCommentPeer::addSelectColumns($criteria);
				$this->collSupplierQuoteItemComments = SupplierQuoteItemCommentPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(SupplierQuoteItemCommentPeer::SUPPLIERID, $this->id);

				SupplierQuoteItemCommentPeer::addSelectColumns($criteria);
				if (!isset($this->lastSupplierQuoteItemCommentCriteria) || !$this->lastSupplierQuoteItemCommentCriteria->equals($criteria)) {
					$this->collSupplierQuoteItemComments = SupplierQuoteItemCommentPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSupplierQuoteItemCommentCriteria = $criteria;
		return $this->collSupplierQuoteItemComments;
	}

	/**
	 * Returns the number of related SupplierQuoteItemComment objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SupplierQuoteItemComment objects.
	 * @throws     PropelException
	 */
	public function countSupplierQuoteItemComments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collSupplierQuoteItemComments === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(SupplierQuoteItemCommentPeer::SUPPLIERID, $this->id);

				$count = SupplierQuoteItemCommentPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(SupplierQuoteItemCommentPeer::SUPPLIERID, $this->id);

				if (!isset($this->lastSupplierQuoteItemCommentCriteria) || !$this->lastSupplierQuoteItemCommentCriteria->equals($criteria)) {
					$count = SupplierQuoteItemCommentPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collSupplierQuoteItemComments);
				}
			} else {
				$count = count($this->collSupplierQuoteItemComments);
			}
		}
		$this->lastSupplierQuoteItemCommentCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a SupplierQuoteItemComment object to this object
	 * through the SupplierQuoteItemComment foreign key attribute.
	 *
	 * @param      SupplierQuoteItemComment $l SupplierQuoteItemComment
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSupplierQuoteItemComment(SupplierQuoteItemComment $l)
	{
		if ($this->collSupplierQuoteItemComments === null) {
			$this->initSupplierQuoteItemComments();
		}
		if (!in_array($l, $this->collSupplierQuoteItemComments, true)) { // only add it if the **same** object is not already associated
			array_push($this->collSupplierQuoteItemComments, $l);
			$l->setSupplier($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Supplier is new, it will return
	 * an empty collection; or if this Supplier has previously
	 * been saved, it will retrieve related SupplierQuoteItemComments from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Supplier.
	 */
	public function getSupplierQuoteItemCommentsJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuoteItemComments === null) {
			if ($this->isNew()) {
				$this->collSupplierQuoteItemComments = array();
			} else {

				$criteria->add(SupplierQuoteItemCommentPeer::SUPPLIERID, $this->id);

				$this->collSupplierQuoteItemComments = SupplierQuoteItemCommentPeer::doSelectJoinUser($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuoteItemCommentPeer::SUPPLIERID, $this->id);

			if (!isset($this->lastSupplierQuoteItemCommentCriteria) || !$this->lastSupplierQuoteItemCommentCriteria->equals($criteria)) {
				$this->collSupplierQuoteItemComments = SupplierQuoteItemCommentPeer::doSelectJoinUser($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuoteItemCommentCriteria = $criteria;

		return $this->collSupplierQuoteItemComments;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Supplier is new, it will return
	 * an empty collection; or if this Supplier has previously
	 * been saved, it will retrieve related SupplierQuoteItemComments from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Supplier.
	 */
	public function getSupplierQuoteItemCommentsJoinSupplierQuoteItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuoteItemComments === null) {
			if ($this->isNew()) {
				$this->collSupplierQuoteItemComments = array();
			} else {

				$criteria->add(SupplierQuoteItemCommentPeer::SUPPLIERID, $this->id);

				$this->collSupplierQuoteItemComments = SupplierQuoteItemCommentPeer::doSelectJoinSupplierQuoteItem($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuoteItemCommentPeer::SUPPLIERID, $this->id);

			if (!isset($this->lastSupplierQuoteItemCommentCriteria) || !$this->lastSupplierQuoteItemCommentCriteria->equals($criteria)) {
				$this->collSupplierQuoteItemComments = SupplierQuoteItemCommentPeer::doSelectJoinSupplierQuoteItem($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuoteItemCommentCriteria = $criteria;

		return $this->collSupplierQuoteItemComments;
	}

	/**
	 * Clears out the collSupplierPurchaseOrders collection (array).
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
	 * Initializes the collSupplierPurchaseOrders collection (array).
	 *
	 * By default this just sets the collSupplierPurchaseOrders collection to an empty array (like clearcollSupplierPurchaseOrders());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierPurchaseOrders()
	{
		$this->collSupplierPurchaseOrders = array();
	}

	/**
	 * Gets an array of SupplierPurchaseOrder objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Supplier has previously been saved, it will retrieve
	 * related SupplierPurchaseOrders from storage. If this Supplier is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array SupplierPurchaseOrder[]
	 * @throws     PropelException
	 */
	public function getSupplierPurchaseOrders($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
			   $this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERID, $this->id);

				SupplierPurchaseOrderPeer::addSelectColumns($criteria);
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERID, $this->id);

				SupplierPurchaseOrderPeer::addSelectColumns($criteria);
				if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
					$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;
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
		if ($criteria === null) {
			$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERID, $this->id);

				$count = SupplierPurchaseOrderPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERID, $this->id);

				if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
					$count = SupplierPurchaseOrderPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collSupplierPurchaseOrders);
				}
			} else {
				$count = count($this->collSupplierPurchaseOrders);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;
		return $count;
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
		if (!in_array($l, $this->collSupplierPurchaseOrders, true)) { // only add it if the **same** object is not already associated
			array_push($this->collSupplierPurchaseOrders, $l);
			$l->setSupplier($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Supplier is new, it will return
	 * an empty collection; or if this Supplier has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Supplier.
	 */
	public function getSupplierPurchaseOrdersJoinSupplierQuote($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinSupplierQuote($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinSupplierQuote($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;

		return $this->collSupplierPurchaseOrders;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Supplier is new, it will return
	 * an empty collection; or if this Supplier has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Supplier.
	 */
	public function getSupplierPurchaseOrdersJoinClientQuote($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinClientQuote($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinClientQuote($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;

		return $this->collSupplierPurchaseOrders;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Supplier is new, it will return
	 * an empty collection; or if this Supplier has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Supplier.
	 */
	public function getSupplierPurchaseOrdersJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinUser($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinUser($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;

		return $this->collSupplierPurchaseOrders;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Supplier is new, it will return
	 * an empty collection; or if this Supplier has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Supplier.
	 */
	public function getSupplierPurchaseOrdersJoinAffiliate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinAffiliate($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinAffiliate($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;

		return $this->collSupplierPurchaseOrders;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Supplier is new, it will return
	 * an empty collection; or if this Supplier has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Supplier.
	 */
	public function getSupplierPurchaseOrdersJoinAffiliateUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinAffiliateUser($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinAffiliateUser($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;

		return $this->collSupplierPurchaseOrders;
	}

	/**
	 * Clears out the collShipments collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addShipments()
	 */
	public function clearShipments()
	{
		$this->collShipments = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collShipments collection (array).
	 *
	 * By default this just sets the collShipments collection to an empty array (like clearcollShipments());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initShipments()
	{
		$this->collShipments = array();
	}

	/**
	 * Gets an array of Shipment objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Supplier has previously been saved, it will retrieve
	 * related Shipments from storage. If this Supplier is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Shipment[]
	 * @throws     PropelException
	 */
	public function getShipments($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collShipments === null) {
			if ($this->isNew()) {
			   $this->collShipments = array();
			} else {

				$criteria->add(ShipmentPeer::SUPPLIERID, $this->id);

				ShipmentPeer::addSelectColumns($criteria);
				$this->collShipments = ShipmentPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ShipmentPeer::SUPPLIERID, $this->id);

				ShipmentPeer::addSelectColumns($criteria);
				if (!isset($this->lastShipmentCriteria) || !$this->lastShipmentCriteria->equals($criteria)) {
					$this->collShipments = ShipmentPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastShipmentCriteria = $criteria;
		return $this->collShipments;
	}

	/**
	 * Returns the number of related Shipment objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Shipment objects.
	 * @throws     PropelException
	 */
	public function countShipments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collShipments === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ShipmentPeer::SUPPLIERID, $this->id);

				$count = ShipmentPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ShipmentPeer::SUPPLIERID, $this->id);

				if (!isset($this->lastShipmentCriteria) || !$this->lastShipmentCriteria->equals($criteria)) {
					$count = ShipmentPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collShipments);
				}
			} else {
				$count = count($this->collShipments);
			}
		}
		$this->lastShipmentCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a Shipment object to this object
	 * through the Shipment foreign key attribute.
	 *
	 * @param      Shipment $l Shipment
	 * @return     void
	 * @throws     PropelException
	 */
	public function addShipment(Shipment $l)
	{
		if ($this->collShipments === null) {
			$this->initShipments();
		}
		if (!in_array($l, $this->collShipments, true)) { // only add it if the **same** object is not already associated
			array_push($this->collShipments, $l);
			$l->setSupplier($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Supplier is new, it will return
	 * an empty collection; or if this Supplier has previously
	 * been saved, it will retrieve related Shipments from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Supplier.
	 */
	public function getShipmentsJoinSupplierPurchaseOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collShipments === null) {
			if ($this->isNew()) {
				$this->collShipments = array();
			} else {

				$criteria->add(ShipmentPeer::SUPPLIERID, $this->id);

				$this->collShipments = ShipmentPeer::doSelectJoinSupplierPurchaseOrder($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ShipmentPeer::SUPPLIERID, $this->id);

			if (!isset($this->lastShipmentCriteria) || !$this->lastShipmentCriteria->equals($criteria)) {
				$this->collShipments = ShipmentPeer::doSelectJoinSupplierPurchaseOrder($criteria, $con, $join_behavior);
			}
		}
		$this->lastShipmentCriteria = $criteria;

		return $this->collShipments;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Supplier is new, it will return
	 * an empty collection; or if this Supplier has previously
	 * been saved, it will retrieve related Shipments from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Supplier.
	 */
	public function getShipmentsJoinAffiliate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collShipments === null) {
			if ($this->isNew()) {
				$this->collShipments = array();
			} else {

				$criteria->add(ShipmentPeer::SUPPLIERID, $this->id);

				$this->collShipments = ShipmentPeer::doSelectJoinAffiliate($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ShipmentPeer::SUPPLIERID, $this->id);

			if (!isset($this->lastShipmentCriteria) || !$this->lastShipmentCriteria->equals($criteria)) {
				$this->collShipments = ShipmentPeer::doSelectJoinAffiliate($criteria, $con, $join_behavior);
			}
		}
		$this->lastShipmentCriteria = $criteria;

		return $this->collShipments;
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
			if ($this->collProductSuppliers) {
				foreach ((array) $this->collProductSuppliers as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierQuotes) {
				foreach ((array) $this->collSupplierQuotes as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierQuoteItemComments) {
				foreach ((array) $this->collSupplierQuoteItemComments as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierPurchaseOrders) {
				foreach ((array) $this->collSupplierPurchaseOrders as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collShipments) {
				foreach ((array) $this->collShipments as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collProductSuppliers = null;
		$this->collSupplierQuotes = null;
		$this->collSupplierQuoteItemComments = null;
		$this->collSupplierPurchaseOrders = null;
		$this->collShipments = null;
			$this->aIncoterm = null;
			$this->aPort = null;
	}

} // BaseSupplier
