<?php

/**
 * Base class that represents a row from the 'import_product' table.
 *
 * Productos
 *
 * @package    import.classes.om
 */
abstract class BaseProduct extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ProductPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the code field.
	 * @var        string
	 */
	protected $code;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the namespanish field.
	 * @var        string
	 */
	protected $namespanish;

	/**
	 * The value for the description field.
	 * @var        string
	 */
	protected $description;

	/**
	 * The value for the descriptionspanish field.
	 * @var        string
	 */
	protected $descriptionspanish;

	/**
	 * The value for the active field.
	 * @var        boolean
	 */
	protected $active;

	/**
	 * @var        ProductSupplier one-to-one related ProductSupplier object
	 */
	protected $singleProductSupplier;

	/**
	 * @var        array ClientQuotationItem[] Collection to store aggregation of ClientQuotationItem objects.
	 */
	protected $collClientQuotationItems;

	/**
	 * @var        Criteria The criteria used to select the current contents of collClientQuotationItems.
	 */
	private $lastClientQuotationItemCriteria = null;

	/**
	 * @var        array SupplierQuotationItem[] Collection to store aggregation of SupplierQuotationItem objects.
	 */
	protected $collSupplierQuotationItems;

	/**
	 * @var        Criteria The criteria used to select the current contents of collSupplierQuotationItems.
	 */
	private $lastSupplierQuotationItemCriteria = null;

	/**
	 * @var        array ClientPurchaseOrderItem[] Collection to store aggregation of ClientPurchaseOrderItem objects.
	 */
	protected $collClientPurchaseOrderItems;

	/**
	 * @var        Criteria The criteria used to select the current contents of collClientPurchaseOrderItems.
	 */
	private $lastClientPurchaseOrderItemCriteria = null;

	/**
	 * @var        array PurchaseOrderItem[] Collection to store aggregation of PurchaseOrderItem objects.
	 */
	protected $collPurchaseOrderItems;

	/**
	 * @var        Criteria The criteria used to select the current contents of collPurchaseOrderItems.
	 */
	private $lastPurchaseOrderItemCriteria = null;

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
	 * Initializes internal state of BaseProduct object.
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
	 * Product Id
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [code] column value.
	 * Codigo del producto
	 * @return     string
	 */
	public function getCode()
	{
		return $this->code;
	}

	/**
	 * Get the [name] column value.
	 * Nombre del producto en ingles
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [namespanish] column value.
	 * Nombre del producto en espaniol
	 * @return     string
	 */
	public function getNamespanish()
	{
		return $this->namespanish;
	}

	/**
	 * Get the [description] column value.
	 * Descripcion del producto en ingles
	 * @return     string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Get the [descriptionspanish] column value.
	 * Descripcion del producto en espaniol
	 * @return     string
	 */
	public function getDescriptionspanish()
	{
		return $this->descriptionspanish;
	}

	/**
	 * Get the [active] column value.
	 * Is product active?
	 * @return     boolean
	 */
	public function getActive()
	{
		return $this->active;
	}

	/**
	 * Set the value of [id] column.
	 * Product Id
	 * @param      int $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ProductPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [code] column.
	 * Codigo del producto
	 * @param      string $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setCode($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->code !== $v) {
			$this->code = $v;
			$this->modifiedColumns[] = ProductPeer::CODE;
		}

		return $this;
	} // setCode()

	/**
	 * Set the value of [name] column.
	 * Nombre del producto en ingles
	 * @param      string $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = ProductPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [namespanish] column.
	 * Nombre del producto en espaniol
	 * @param      string $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setNamespanish($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->namespanish !== $v) {
			$this->namespanish = $v;
			$this->modifiedColumns[] = ProductPeer::NAMESPANISH;
		}

		return $this;
	} // setNamespanish()

	/**
	 * Set the value of [description] column.
	 * Descripcion del producto en ingles
	 * @param      string $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setDescription($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = ProductPeer::DESCRIPTION;
		}

		return $this;
	} // setDescription()

	/**
	 * Set the value of [descriptionspanish] column.
	 * Descripcion del producto en espaniol
	 * @param      string $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setDescriptionspanish($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descriptionspanish !== $v) {
			$this->descriptionspanish = $v;
			$this->modifiedColumns[] = ProductPeer::DESCRIPTIONSPANISH;
		}

		return $this;
	} // setDescriptionspanish()

	/**
	 * Set the value of [active] column.
	 * Is product active?
	 * @param      boolean $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setActive($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->active !== $v) {
			$this->active = $v;
			$this->modifiedColumns[] = ProductPeer::ACTIVE;
		}

		return $this;
	} // setActive()

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
			$this->code = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->namespanish = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->description = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->descriptionspanish = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->active = ($row[$startcol + 6] !== null) ? (boolean) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 7; // 7 = ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Product object", $e);
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
			$con = Propel::getConnection(ProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ProductPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->singleProductSupplier = null;

			$this->collClientQuotationItems = null;
			$this->lastClientQuotationItemCriteria = null;

			$this->collSupplierQuotationItems = null;
			$this->lastSupplierQuotationItemCriteria = null;

			$this->collClientPurchaseOrderItems = null;
			$this->lastClientPurchaseOrderItemCriteria = null;

			$this->collPurchaseOrderItems = null;
			$this->lastPurchaseOrderItemCriteria = null;

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
			$con = Propel::getConnection(ProductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			ProductPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ProductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			ProductPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = ProductPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ProductPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ProductPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->singleProductSupplier !== null) {
				if (!$this->singleProductSupplier->isDeleted()) {
						$affectedRows += $this->singleProductSupplier->save($con);
				}
			}

			if ($this->collClientQuotationItems !== null) {
				foreach ($this->collClientQuotationItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSupplierQuotationItems !== null) {
				foreach ($this->collSupplierQuotationItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collClientPurchaseOrderItems !== null) {
				foreach ($this->collClientPurchaseOrderItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPurchaseOrderItems !== null) {
				foreach ($this->collPurchaseOrderItems as $referrerFK) {
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


			if (($retval = ProductPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->singleProductSupplier !== null) {
					if (!$this->singleProductSupplier->validate($columns)) {
						$failureMap = array_merge($failureMap, $this->singleProductSupplier->getValidationFailures());
					}
				}

				if ($this->collClientQuotationItems !== null) {
					foreach ($this->collClientQuotationItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSupplierQuotationItems !== null) {
					foreach ($this->collSupplierQuotationItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClientPurchaseOrderItems !== null) {
					foreach ($this->collClientPurchaseOrderItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPurchaseOrderItems !== null) {
					foreach ($this->collPurchaseOrderItems as $referrerFK) {
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
		$criteria = new Criteria(ProductPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProductPeer::ID)) $criteria->add(ProductPeer::ID, $this->id);
		if ($this->isColumnModified(ProductPeer::CODE)) $criteria->add(ProductPeer::CODE, $this->code);
		if ($this->isColumnModified(ProductPeer::NAME)) $criteria->add(ProductPeer::NAME, $this->name);
		if ($this->isColumnModified(ProductPeer::NAMESPANISH)) $criteria->add(ProductPeer::NAMESPANISH, $this->namespanish);
		if ($this->isColumnModified(ProductPeer::DESCRIPTION)) $criteria->add(ProductPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(ProductPeer::DESCRIPTIONSPANISH)) $criteria->add(ProductPeer::DESCRIPTIONSPANISH, $this->descriptionspanish);
		if ($this->isColumnModified(ProductPeer::ACTIVE)) $criteria->add(ProductPeer::ACTIVE, $this->active);

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
		$criteria = new Criteria(ProductPeer::DATABASE_NAME);

		$criteria->add(ProductPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Product (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCode($this->code);

		$copyObj->setName($this->name);

		$copyObj->setNamespanish($this->namespanish);

		$copyObj->setDescription($this->description);

		$copyObj->setDescriptionspanish($this->descriptionspanish);

		$copyObj->setActive($this->active);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			$relObj = $this->getProductSupplier();
			if ($relObj) {
				$copyObj->setProductSupplier($relObj->copy($deepCopy));
			}

			foreach ($this->getClientQuotationItems() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClientQuotationItem($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierQuotationItems() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierQuotationItem($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClientPurchaseOrderItems() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClientPurchaseOrderItem($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPurchaseOrderItems() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPurchaseOrderItem($relObj->copy($deepCopy));
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
	 * @return     Product Clone of current object.
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
	 * @return     ProductPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ProductPeer();
		}
		return self::$peer;
	}

	/**
	 * Gets a single ProductSupplier object, which is related to this object by a one-to-one relationship.
	 *
	 * @param      PropelPDO $con
	 * @return     ProductSupplier
	 * @throws     PropelException
	 */
	public function getProductSupplier(PropelPDO $con = null)
	{

		if ($this->singleProductSupplier === null && !$this->isNew()) {
			$this->singleProductSupplier = ProductSupplierPeer::retrieveByPK($this->id, $con);
		}

		return $this->singleProductSupplier;
	}

	/**
	 * Sets a single ProductSupplier object as related to this object by a one-to-one relationship.
	 *
	 * @param      ProductSupplier $l ProductSupplier
	 * @return     Product The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setProductSupplier(ProductSupplier $v)
	{
		$this->singleProductSupplier = $v;

		// Make sure that that the passed-in ProductSupplier isn't already associated with this object
		if ($v->getProduct() === null) {
			$v->setProduct($this);
		}

		return $this;
	}

	/**
	 * Clears out the collClientQuotationItems collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClientQuotationItems()
	 */
	public function clearClientQuotationItems()
	{
		$this->collClientQuotationItems = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClientQuotationItems collection (array).
	 *
	 * By default this just sets the collClientQuotationItems collection to an empty array (like clearcollClientQuotationItems());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClientQuotationItems()
	{
		$this->collClientQuotationItems = array();
	}

	/**
	 * Gets an array of ClientQuotationItem objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Product has previously been saved, it will retrieve
	 * related ClientQuotationItems from storage. If this Product is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ClientQuotationItem[]
	 * @throws     PropelException
	 */
	public function getClientQuotationItems($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientQuotationItems === null) {
			if ($this->isNew()) {
			   $this->collClientQuotationItems = array();
			} else {

				$criteria->add(ClientQuotationItemPeer::PRODUCTID, $this->id);

				ClientQuotationItemPeer::addSelectColumns($criteria);
				$this->collClientQuotationItems = ClientQuotationItemPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ClientQuotationItemPeer::PRODUCTID, $this->id);

				ClientQuotationItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastClientQuotationItemCriteria) || !$this->lastClientQuotationItemCriteria->equals($criteria)) {
					$this->collClientQuotationItems = ClientQuotationItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastClientQuotationItemCriteria = $criteria;
		return $this->collClientQuotationItems;
	}

	/**
	 * Returns the number of related ClientQuotationItem objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ClientQuotationItem objects.
	 * @throws     PropelException
	 */
	public function countClientQuotationItems(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collClientQuotationItems === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ClientQuotationItemPeer::PRODUCTID, $this->id);

				$count = ClientQuotationItemPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ClientQuotationItemPeer::PRODUCTID, $this->id);

				if (!isset($this->lastClientQuotationItemCriteria) || !$this->lastClientQuotationItemCriteria->equals($criteria)) {
					$count = ClientQuotationItemPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collClientQuotationItems);
				}
			} else {
				$count = count($this->collClientQuotationItems);
			}
		}
		$this->lastClientQuotationItemCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a ClientQuotationItem object to this object
	 * through the ClientQuotationItem foreign key attribute.
	 *
	 * @param      ClientQuotationItem $l ClientQuotationItem
	 * @return     void
	 * @throws     PropelException
	 */
	public function addClientQuotationItem(ClientQuotationItem $l)
	{
		if ($this->collClientQuotationItems === null) {
			$this->initClientQuotationItems();
		}
		if (!in_array($l, $this->collClientQuotationItems, true)) { // only add it if the **same** object is not already associated
			array_push($this->collClientQuotationItems, $l);
			$l->setProduct($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related ClientQuotationItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getClientQuotationItemsJoinClientQuotation($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientQuotationItems === null) {
			if ($this->isNew()) {
				$this->collClientQuotationItems = array();
			} else {

				$criteria->add(ClientQuotationItemPeer::PRODUCTID, $this->id);

				$this->collClientQuotationItems = ClientQuotationItemPeer::doSelectJoinClientQuotation($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientQuotationItemPeer::PRODUCTID, $this->id);

			if (!isset($this->lastClientQuotationItemCriteria) || !$this->lastClientQuotationItemCriteria->equals($criteria)) {
				$this->collClientQuotationItems = ClientQuotationItemPeer::doSelectJoinClientQuotation($criteria, $con, $join_behavior);
			}
		}
		$this->lastClientQuotationItemCriteria = $criteria;

		return $this->collClientQuotationItems;
	}

	/**
	 * Clears out the collSupplierQuotationItems collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSupplierQuotationItems()
	 */
	public function clearSupplierQuotationItems()
	{
		$this->collSupplierQuotationItems = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSupplierQuotationItems collection (array).
	 *
	 * By default this just sets the collSupplierQuotationItems collection to an empty array (like clearcollSupplierQuotationItems());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierQuotationItems()
	{
		$this->collSupplierQuotationItems = array();
	}

	/**
	 * Gets an array of SupplierQuotationItem objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Product has previously been saved, it will retrieve
	 * related SupplierQuotationItems from storage. If this Product is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array SupplierQuotationItem[]
	 * @throws     PropelException
	 */
	public function getSupplierQuotationItems($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotationItems === null) {
			if ($this->isNew()) {
			   $this->collSupplierQuotationItems = array();
			} else {

				$criteria->add(SupplierQuotationItemPeer::PRODUCTID, $this->id);

				SupplierQuotationItemPeer::addSelectColumns($criteria);
				$this->collSupplierQuotationItems = SupplierQuotationItemPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(SupplierQuotationItemPeer::PRODUCTID, $this->id);

				SupplierQuotationItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastSupplierQuotationItemCriteria) || !$this->lastSupplierQuotationItemCriteria->equals($criteria)) {
					$this->collSupplierQuotationItems = SupplierQuotationItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSupplierQuotationItemCriteria = $criteria;
		return $this->collSupplierQuotationItems;
	}

	/**
	 * Returns the number of related SupplierQuotationItem objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SupplierQuotationItem objects.
	 * @throws     PropelException
	 */
	public function countSupplierQuotationItems(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collSupplierQuotationItems === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(SupplierQuotationItemPeer::PRODUCTID, $this->id);

				$count = SupplierQuotationItemPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(SupplierQuotationItemPeer::PRODUCTID, $this->id);

				if (!isset($this->lastSupplierQuotationItemCriteria) || !$this->lastSupplierQuotationItemCriteria->equals($criteria)) {
					$count = SupplierQuotationItemPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collSupplierQuotationItems);
				}
			} else {
				$count = count($this->collSupplierQuotationItems);
			}
		}
		$this->lastSupplierQuotationItemCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a SupplierQuotationItem object to this object
	 * through the SupplierQuotationItem foreign key attribute.
	 *
	 * @param      SupplierQuotationItem $l SupplierQuotationItem
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSupplierQuotationItem(SupplierQuotationItem $l)
	{
		if ($this->collSupplierQuotationItems === null) {
			$this->initSupplierQuotationItems();
		}
		if (!in_array($l, $this->collSupplierQuotationItems, true)) { // only add it if the **same** object is not already associated
			array_push($this->collSupplierQuotationItems, $l);
			$l->setProduct($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierQuotationItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getSupplierQuotationItemsJoinSupplierQuotation($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotationItems === null) {
			if ($this->isNew()) {
				$this->collSupplierQuotationItems = array();
			} else {

				$criteria->add(SupplierQuotationItemPeer::PRODUCTID, $this->id);

				$this->collSupplierQuotationItems = SupplierQuotationItemPeer::doSelectJoinSupplierQuotation($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuotationItemPeer::PRODUCTID, $this->id);

			if (!isset($this->lastSupplierQuotationItemCriteria) || !$this->lastSupplierQuotationItemCriteria->equals($criteria)) {
				$this->collSupplierQuotationItems = SupplierQuotationItemPeer::doSelectJoinSupplierQuotation($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuotationItemCriteria = $criteria;

		return $this->collSupplierQuotationItems;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierQuotationItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getSupplierQuotationItemsJoinClientQuotationItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotationItems === null) {
			if ($this->isNew()) {
				$this->collSupplierQuotationItems = array();
			} else {

				$criteria->add(SupplierQuotationItemPeer::PRODUCTID, $this->id);

				$this->collSupplierQuotationItems = SupplierQuotationItemPeer::doSelectJoinClientQuotationItem($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuotationItemPeer::PRODUCTID, $this->id);

			if (!isset($this->lastSupplierQuotationItemCriteria) || !$this->lastSupplierQuotationItemCriteria->equals($criteria)) {
				$this->collSupplierQuotationItems = SupplierQuotationItemPeer::doSelectJoinClientQuotationItem($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuotationItemCriteria = $criteria;

		return $this->collSupplierQuotationItems;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierQuotationItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getSupplierQuotationItemsJoinIncoterm($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotationItems === null) {
			if ($this->isNew()) {
				$this->collSupplierQuotationItems = array();
			} else {

				$criteria->add(SupplierQuotationItemPeer::PRODUCTID, $this->id);

				$this->collSupplierQuotationItems = SupplierQuotationItemPeer::doSelectJoinIncoterm($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuotationItemPeer::PRODUCTID, $this->id);

			if (!isset($this->lastSupplierQuotationItemCriteria) || !$this->lastSupplierQuotationItemCriteria->equals($criteria)) {
				$this->collSupplierQuotationItems = SupplierQuotationItemPeer::doSelectJoinIncoterm($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuotationItemCriteria = $criteria;

		return $this->collSupplierQuotationItems;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierQuotationItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getSupplierQuotationItemsJoinPort($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotationItems === null) {
			if ($this->isNew()) {
				$this->collSupplierQuotationItems = array();
			} else {

				$criteria->add(SupplierQuotationItemPeer::PRODUCTID, $this->id);

				$this->collSupplierQuotationItems = SupplierQuotationItemPeer::doSelectJoinPort($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuotationItemPeer::PRODUCTID, $this->id);

			if (!isset($this->lastSupplierQuotationItemCriteria) || !$this->lastSupplierQuotationItemCriteria->equals($criteria)) {
				$this->collSupplierQuotationItems = SupplierQuotationItemPeer::doSelectJoinPort($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuotationItemCriteria = $criteria;

		return $this->collSupplierQuotationItems;
	}

	/**
	 * Clears out the collClientPurchaseOrderItems collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClientPurchaseOrderItems()
	 */
	public function clearClientPurchaseOrderItems()
	{
		$this->collClientPurchaseOrderItems = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClientPurchaseOrderItems collection (array).
	 *
	 * By default this just sets the collClientPurchaseOrderItems collection to an empty array (like clearcollClientPurchaseOrderItems());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClientPurchaseOrderItems()
	{
		$this->collClientPurchaseOrderItems = array();
	}

	/**
	 * Gets an array of ClientPurchaseOrderItem objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Product has previously been saved, it will retrieve
	 * related ClientPurchaseOrderItems from storage. If this Product is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ClientPurchaseOrderItem[]
	 * @throws     PropelException
	 */
	public function getClientPurchaseOrderItems($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientPurchaseOrderItems === null) {
			if ($this->isNew()) {
			   $this->collClientPurchaseOrderItems = array();
			} else {

				$criteria->add(ClientPurchaseOrderItemPeer::PRODUCTID, $this->id);

				ClientPurchaseOrderItemPeer::addSelectColumns($criteria);
				$this->collClientPurchaseOrderItems = ClientPurchaseOrderItemPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ClientPurchaseOrderItemPeer::PRODUCTID, $this->id);

				ClientPurchaseOrderItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastClientPurchaseOrderItemCriteria) || !$this->lastClientPurchaseOrderItemCriteria->equals($criteria)) {
					$this->collClientPurchaseOrderItems = ClientPurchaseOrderItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastClientPurchaseOrderItemCriteria = $criteria;
		return $this->collClientPurchaseOrderItems;
	}

	/**
	 * Returns the number of related ClientPurchaseOrderItem objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ClientPurchaseOrderItem objects.
	 * @throws     PropelException
	 */
	public function countClientPurchaseOrderItems(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collClientPurchaseOrderItems === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ClientPurchaseOrderItemPeer::PRODUCTID, $this->id);

				$count = ClientPurchaseOrderItemPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ClientPurchaseOrderItemPeer::PRODUCTID, $this->id);

				if (!isset($this->lastClientPurchaseOrderItemCriteria) || !$this->lastClientPurchaseOrderItemCriteria->equals($criteria)) {
					$count = ClientPurchaseOrderItemPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collClientPurchaseOrderItems);
				}
			} else {
				$count = count($this->collClientPurchaseOrderItems);
			}
		}
		$this->lastClientPurchaseOrderItemCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a ClientPurchaseOrderItem object to this object
	 * through the ClientPurchaseOrderItem foreign key attribute.
	 *
	 * @param      ClientPurchaseOrderItem $l ClientPurchaseOrderItem
	 * @return     void
	 * @throws     PropelException
	 */
	public function addClientPurchaseOrderItem(ClientPurchaseOrderItem $l)
	{
		if ($this->collClientPurchaseOrderItems === null) {
			$this->initClientPurchaseOrderItems();
		}
		if (!in_array($l, $this->collClientPurchaseOrderItems, true)) { // only add it if the **same** object is not already associated
			array_push($this->collClientPurchaseOrderItems, $l);
			$l->setProduct($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related ClientPurchaseOrderItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getClientPurchaseOrderItemsJoinClientPurchaseOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientPurchaseOrderItems === null) {
			if ($this->isNew()) {
				$this->collClientPurchaseOrderItems = array();
			} else {

				$criteria->add(ClientPurchaseOrderItemPeer::PRODUCTID, $this->id);

				$this->collClientPurchaseOrderItems = ClientPurchaseOrderItemPeer::doSelectJoinClientPurchaseOrder($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientPurchaseOrderItemPeer::PRODUCTID, $this->id);

			if (!isset($this->lastClientPurchaseOrderItemCriteria) || !$this->lastClientPurchaseOrderItemCriteria->equals($criteria)) {
				$this->collClientPurchaseOrderItems = ClientPurchaseOrderItemPeer::doSelectJoinClientPurchaseOrder($criteria, $con, $join_behavior);
			}
		}
		$this->lastClientPurchaseOrderItemCriteria = $criteria;

		return $this->collClientPurchaseOrderItems;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related ClientPurchaseOrderItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getClientPurchaseOrderItemsJoinClientQuotationItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientPurchaseOrderItems === null) {
			if ($this->isNew()) {
				$this->collClientPurchaseOrderItems = array();
			} else {

				$criteria->add(ClientPurchaseOrderItemPeer::PRODUCTID, $this->id);

				$this->collClientPurchaseOrderItems = ClientPurchaseOrderItemPeer::doSelectJoinClientQuotationItem($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientPurchaseOrderItemPeer::PRODUCTID, $this->id);

			if (!isset($this->lastClientPurchaseOrderItemCriteria) || !$this->lastClientPurchaseOrderItemCriteria->equals($criteria)) {
				$this->collClientPurchaseOrderItems = ClientPurchaseOrderItemPeer::doSelectJoinClientQuotationItem($criteria, $con, $join_behavior);
			}
		}
		$this->lastClientPurchaseOrderItemCriteria = $criteria;

		return $this->collClientPurchaseOrderItems;
	}

	/**
	 * Clears out the collPurchaseOrderItems collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPurchaseOrderItems()
	 */
	public function clearPurchaseOrderItems()
	{
		$this->collPurchaseOrderItems = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPurchaseOrderItems collection (array).
	 *
	 * By default this just sets the collPurchaseOrderItems collection to an empty array (like clearcollPurchaseOrderItems());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initPurchaseOrderItems()
	{
		$this->collPurchaseOrderItems = array();
	}

	/**
	 * Gets an array of PurchaseOrderItem objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Product has previously been saved, it will retrieve
	 * related PurchaseOrderItems from storage. If this Product is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array PurchaseOrderItem[]
	 * @throws     PropelException
	 */
	public function getPurchaseOrderItems($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPurchaseOrderItems === null) {
			if ($this->isNew()) {
			   $this->collPurchaseOrderItems = array();
			} else {

				$criteria->add(PurchaseOrderItemPeer::PRODUCTID, $this->id);

				PurchaseOrderItemPeer::addSelectColumns($criteria);
				$this->collPurchaseOrderItems = PurchaseOrderItemPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(PurchaseOrderItemPeer::PRODUCTID, $this->id);

				PurchaseOrderItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastPurchaseOrderItemCriteria) || !$this->lastPurchaseOrderItemCriteria->equals($criteria)) {
					$this->collPurchaseOrderItems = PurchaseOrderItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPurchaseOrderItemCriteria = $criteria;
		return $this->collPurchaseOrderItems;
	}

	/**
	 * Returns the number of related PurchaseOrderItem objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related PurchaseOrderItem objects.
	 * @throws     PropelException
	 */
	public function countPurchaseOrderItems(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collPurchaseOrderItems === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(PurchaseOrderItemPeer::PRODUCTID, $this->id);

				$count = PurchaseOrderItemPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(PurchaseOrderItemPeer::PRODUCTID, $this->id);

				if (!isset($this->lastPurchaseOrderItemCriteria) || !$this->lastPurchaseOrderItemCriteria->equals($criteria)) {
					$count = PurchaseOrderItemPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collPurchaseOrderItems);
				}
			} else {
				$count = count($this->collPurchaseOrderItems);
			}
		}
		$this->lastPurchaseOrderItemCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a PurchaseOrderItem object to this object
	 * through the PurchaseOrderItem foreign key attribute.
	 *
	 * @param      PurchaseOrderItem $l PurchaseOrderItem
	 * @return     void
	 * @throws     PropelException
	 */
	public function addPurchaseOrderItem(PurchaseOrderItem $l)
	{
		if ($this->collPurchaseOrderItems === null) {
			$this->initPurchaseOrderItems();
		}
		if (!in_array($l, $this->collPurchaseOrderItems, true)) { // only add it if the **same** object is not already associated
			array_push($this->collPurchaseOrderItems, $l);
			$l->setProduct($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related PurchaseOrderItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getPurchaseOrderItemsJoinSupplierPurchaseOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPurchaseOrderItems === null) {
			if ($this->isNew()) {
				$this->collPurchaseOrderItems = array();
			} else {

				$criteria->add(PurchaseOrderItemPeer::PRODUCTID, $this->id);

				$this->collPurchaseOrderItems = PurchaseOrderItemPeer::doSelectJoinSupplierPurchaseOrder($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(PurchaseOrderItemPeer::PRODUCTID, $this->id);

			if (!isset($this->lastPurchaseOrderItemCriteria) || !$this->lastPurchaseOrderItemCriteria->equals($criteria)) {
				$this->collPurchaseOrderItems = PurchaseOrderItemPeer::doSelectJoinSupplierPurchaseOrder($criteria, $con, $join_behavior);
			}
		}
		$this->lastPurchaseOrderItemCriteria = $criteria;

		return $this->collPurchaseOrderItems;
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
			if ($this->singleProductSupplier) {
				$this->singleProductSupplier->clearAllReferences($deep);
			}
			if ($this->collClientQuotationItems) {
				foreach ((array) $this->collClientQuotationItems as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierQuotationItems) {
				foreach ((array) $this->collSupplierQuotationItems as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClientPurchaseOrderItems) {
				foreach ((array) $this->collClientPurchaseOrderItems as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPurchaseOrderItems) {
				foreach ((array) $this->collPurchaseOrderItems as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->singleProductSupplier = null;
		$this->collClientQuotationItems = null;
		$this->collSupplierQuotationItems = null;
		$this->collClientPurchaseOrderItems = null;
		$this->collPurchaseOrderItems = null;
	}

} // BaseProduct