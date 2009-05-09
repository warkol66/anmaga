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
	 * The value for the namechinese field.
	 * @var        string
	 */
	protected $namechinese;

	/**
	 * The value for the descriptionchinese field.
	 * @var        string
	 */
	protected $descriptionchinese;

	/**
	 * The value for the status field.
	 * @var        int
	 */
	protected $status;

	/**
	 * @var        ProductSupplier one-to-one related ProductSupplier object
	 */
	protected $singleProductSupplier;

	/**
	 * @var        array ClientQuoteItem[] Collection to store aggregation of ClientQuoteItem objects.
	 */
	protected $collClientQuoteItems;

	/**
	 * @var        Criteria The criteria used to select the current contents of collClientQuoteItems.
	 */
	private $lastClientQuoteItemCriteria = null;

	/**
	 * @var        array SupplierQuoteItem[] Collection to store aggregation of SupplierQuoteItem objects.
	 */
	protected $collSupplierQuoteItemsRelatedByProductid;

	/**
	 * @var        Criteria The criteria used to select the current contents of collSupplierQuoteItemsRelatedByProductid.
	 */
	private $lastSupplierQuoteItemRelatedByProductidCriteria = null;

	/**
	 * @var        array SupplierQuoteItem[] Collection to store aggregation of SupplierQuoteItem objects.
	 */
	protected $collSupplierQuoteItemsRelatedByReplacedproductid;

	/**
	 * @var        Criteria The criteria used to select the current contents of collSupplierQuoteItemsRelatedByReplacedproductid.
	 */
	private $lastSupplierQuoteItemRelatedByReplacedproductidCriteria = null;

	/**
	 * @var        array ClientPurchaseOrderItem[] Collection to store aggregation of ClientPurchaseOrderItem objects.
	 */
	protected $collClientPurchaseOrderItems;

	/**
	 * @var        Criteria The criteria used to select the current contents of collClientPurchaseOrderItems.
	 */
	private $lastClientPurchaseOrderItemCriteria = null;

	/**
	 * @var        array SupplierPurchaseOrderItem[] Collection to store aggregation of SupplierPurchaseOrderItem objects.
	 */
	protected $collSupplierPurchaseOrderItems;

	/**
	 * @var        Criteria The criteria used to select the current contents of collSupplierPurchaseOrderItems.
	 */
	private $lastSupplierPurchaseOrderItemCriteria = null;

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
	 * Get the [namechinese] column value.
	 * Nombre del producto en chino
	 * @return     string
	 */
	public function getNamechinese()
	{
		return $this->namechinese;
	}

	/**
	 * Get the [descriptionchinese] column value.
	 * Descripcion del producto en chino
	 * @return     string
	 */
	public function getDescriptionchinese()
	{
		return $this->descriptionchinese;
	}

	/**
	 * Get the [status] column value.
	 * product status
	 * @return     int
	 */
	public function getStatus()
	{
		return $this->status;
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
	 * Set the value of [namechinese] column.
	 * Nombre del producto en chino
	 * @param      string $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setNamechinese($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->namechinese !== $v) {
			$this->namechinese = $v;
			$this->modifiedColumns[] = ProductPeer::NAMECHINESE;
		}

		return $this;
	} // setNamechinese()

	/**
	 * Set the value of [descriptionchinese] column.
	 * Descripcion del producto en chino
	 * @param      string $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setDescriptionchinese($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descriptionchinese !== $v) {
			$this->descriptionchinese = $v;
			$this->modifiedColumns[] = ProductPeer::DESCRIPTIONCHINESE;
		}

		return $this;
	} // setDescriptionchinese()

	/**
	 * Set the value of [status] column.
	 * product status
	 * @param      int $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = ProductPeer::STATUS;
		}

		return $this;
	} // setStatus()

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
			$this->namechinese = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->descriptionchinese = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->status = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 9; // 9 = ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS).

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

			$this->collClientQuoteItems = null;
			$this->lastClientQuoteItemCriteria = null;

			$this->collSupplierQuoteItemsRelatedByProductid = null;
			$this->lastSupplierQuoteItemRelatedByProductidCriteria = null;

			$this->collSupplierQuoteItemsRelatedByReplacedproductid = null;
			$this->lastSupplierQuoteItemRelatedByReplacedproductidCriteria = null;

			$this->collClientPurchaseOrderItems = null;
			$this->lastClientPurchaseOrderItemCriteria = null;

			$this->collSupplierPurchaseOrderItems = null;
			$this->lastSupplierPurchaseOrderItemCriteria = null;

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

			if ($this->collClientQuoteItems !== null) {
				foreach ($this->collClientQuoteItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSupplierQuoteItemsRelatedByProductid !== null) {
				foreach ($this->collSupplierQuoteItemsRelatedByProductid as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSupplierQuoteItemsRelatedByReplacedproductid !== null) {
				foreach ($this->collSupplierQuoteItemsRelatedByReplacedproductid as $referrerFK) {
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

			if ($this->collSupplierPurchaseOrderItems !== null) {
				foreach ($this->collSupplierPurchaseOrderItems as $referrerFK) {
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

				if ($this->collClientQuoteItems !== null) {
					foreach ($this->collClientQuoteItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSupplierQuoteItemsRelatedByProductid !== null) {
					foreach ($this->collSupplierQuoteItemsRelatedByProductid as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSupplierQuoteItemsRelatedByReplacedproductid !== null) {
					foreach ($this->collSupplierQuoteItemsRelatedByReplacedproductid as $referrerFK) {
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

				if ($this->collSupplierPurchaseOrderItems !== null) {
					foreach ($this->collSupplierPurchaseOrderItems as $referrerFK) {
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
		if ($this->isColumnModified(ProductPeer::NAMECHINESE)) $criteria->add(ProductPeer::NAMECHINESE, $this->namechinese);
		if ($this->isColumnModified(ProductPeer::DESCRIPTIONCHINESE)) $criteria->add(ProductPeer::DESCRIPTIONCHINESE, $this->descriptionchinese);
		if ($this->isColumnModified(ProductPeer::STATUS)) $criteria->add(ProductPeer::STATUS, $this->status);

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

		$copyObj->setNamechinese($this->namechinese);

		$copyObj->setDescriptionchinese($this->descriptionchinese);

		$copyObj->setStatus($this->status);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			$relObj = $this->getProductSupplier();
			if ($relObj) {
				$copyObj->setProductSupplier($relObj->copy($deepCopy));
			}

			foreach ($this->getClientQuoteItems() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClientQuoteItem($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierQuoteItemsRelatedByProductid() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierQuoteItemRelatedByProductid($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierQuoteItemsRelatedByReplacedproductid() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierQuoteItemRelatedByReplacedproductid($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClientPurchaseOrderItems() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClientPurchaseOrderItem($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierPurchaseOrderItems() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierPurchaseOrderItem($relObj->copy($deepCopy));
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
	 * Clears out the collClientQuoteItems collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClientQuoteItems()
	 */
	public function clearClientQuoteItems()
	{
		$this->collClientQuoteItems = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClientQuoteItems collection (array).
	 *
	 * By default this just sets the collClientQuoteItems collection to an empty array (like clearcollClientQuoteItems());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClientQuoteItems()
	{
		$this->collClientQuoteItems = array();
	}

	/**
	 * Gets an array of ClientQuoteItem objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Product has previously been saved, it will retrieve
	 * related ClientQuoteItems from storage. If this Product is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ClientQuoteItem[]
	 * @throws     PropelException
	 */
	public function getClientQuoteItems($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientQuoteItems === null) {
			if ($this->isNew()) {
			   $this->collClientQuoteItems = array();
			} else {

				$criteria->add(ClientQuoteItemPeer::PRODUCTID, $this->id);

				ClientQuoteItemPeer::addSelectColumns($criteria);
				$this->collClientQuoteItems = ClientQuoteItemPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ClientQuoteItemPeer::PRODUCTID, $this->id);

				ClientQuoteItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastClientQuoteItemCriteria) || !$this->lastClientQuoteItemCriteria->equals($criteria)) {
					$this->collClientQuoteItems = ClientQuoteItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastClientQuoteItemCriteria = $criteria;
		return $this->collClientQuoteItems;
	}

	/**
	 * Returns the number of related ClientQuoteItem objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ClientQuoteItem objects.
	 * @throws     PropelException
	 */
	public function countClientQuoteItems(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
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

		if ($this->collClientQuoteItems === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ClientQuoteItemPeer::PRODUCTID, $this->id);

				$count = ClientQuoteItemPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ClientQuoteItemPeer::PRODUCTID, $this->id);

				if (!isset($this->lastClientQuoteItemCriteria) || !$this->lastClientQuoteItemCriteria->equals($criteria)) {
					$count = ClientQuoteItemPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collClientQuoteItems);
				}
			} else {
				$count = count($this->collClientQuoteItems);
			}
		}
		$this->lastClientQuoteItemCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a ClientQuoteItem object to this object
	 * through the ClientQuoteItem foreign key attribute.
	 *
	 * @param      ClientQuoteItem $l ClientQuoteItem
	 * @return     void
	 * @throws     PropelException
	 */
	public function addClientQuoteItem(ClientQuoteItem $l)
	{
		if ($this->collClientQuoteItems === null) {
			$this->initClientQuoteItems();
		}
		if (!in_array($l, $this->collClientQuoteItems, true)) { // only add it if the **same** object is not already associated
			array_push($this->collClientQuoteItems, $l);
			$l->setProduct($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related ClientQuoteItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getClientQuoteItemsJoinClientQuote($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientQuoteItems === null) {
			if ($this->isNew()) {
				$this->collClientQuoteItems = array();
			} else {

				$criteria->add(ClientQuoteItemPeer::PRODUCTID, $this->id);

				$this->collClientQuoteItems = ClientQuoteItemPeer::doSelectJoinClientQuote($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientQuoteItemPeer::PRODUCTID, $this->id);

			if (!isset($this->lastClientQuoteItemCriteria) || !$this->lastClientQuoteItemCriteria->equals($criteria)) {
				$this->collClientQuoteItems = ClientQuoteItemPeer::doSelectJoinClientQuote($criteria, $con, $join_behavior);
			}
		}
		$this->lastClientQuoteItemCriteria = $criteria;

		return $this->collClientQuoteItems;
	}

	/**
	 * Clears out the collSupplierQuoteItemsRelatedByProductid collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSupplierQuoteItemsRelatedByProductid()
	 */
	public function clearSupplierQuoteItemsRelatedByProductid()
	{
		$this->collSupplierQuoteItemsRelatedByProductid = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSupplierQuoteItemsRelatedByProductid collection (array).
	 *
	 * By default this just sets the collSupplierQuoteItemsRelatedByProductid collection to an empty array (like clearcollSupplierQuoteItemsRelatedByProductid());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierQuoteItemsRelatedByProductid()
	{
		$this->collSupplierQuoteItemsRelatedByProductid = array();
	}

	/**
	 * Gets an array of SupplierQuoteItem objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Product has previously been saved, it will retrieve
	 * related SupplierQuoteItemsRelatedByProductid from storage. If this Product is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array SupplierQuoteItem[]
	 * @throws     PropelException
	 */
	public function getSupplierQuoteItemsRelatedByProductid($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuoteItemsRelatedByProductid === null) {
			if ($this->isNew()) {
			   $this->collSupplierQuoteItemsRelatedByProductid = array();
			} else {

				$criteria->add(SupplierQuoteItemPeer::PRODUCTID, $this->id);

				SupplierQuoteItemPeer::addSelectColumns($criteria);
				$this->collSupplierQuoteItemsRelatedByProductid = SupplierQuoteItemPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(SupplierQuoteItemPeer::PRODUCTID, $this->id);

				SupplierQuoteItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastSupplierQuoteItemRelatedByProductidCriteria) || !$this->lastSupplierQuoteItemRelatedByProductidCriteria->equals($criteria)) {
					$this->collSupplierQuoteItemsRelatedByProductid = SupplierQuoteItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSupplierQuoteItemRelatedByProductidCriteria = $criteria;
		return $this->collSupplierQuoteItemsRelatedByProductid;
	}

	/**
	 * Returns the number of related SupplierQuoteItem objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SupplierQuoteItem objects.
	 * @throws     PropelException
	 */
	public function countSupplierQuoteItemsRelatedByProductid(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
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

		if ($this->collSupplierQuoteItemsRelatedByProductid === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(SupplierQuoteItemPeer::PRODUCTID, $this->id);

				$count = SupplierQuoteItemPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(SupplierQuoteItemPeer::PRODUCTID, $this->id);

				if (!isset($this->lastSupplierQuoteItemRelatedByProductidCriteria) || !$this->lastSupplierQuoteItemRelatedByProductidCriteria->equals($criteria)) {
					$count = SupplierQuoteItemPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collSupplierQuoteItemsRelatedByProductid);
				}
			} else {
				$count = count($this->collSupplierQuoteItemsRelatedByProductid);
			}
		}
		$this->lastSupplierQuoteItemRelatedByProductidCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a SupplierQuoteItem object to this object
	 * through the SupplierQuoteItem foreign key attribute.
	 *
	 * @param      SupplierQuoteItem $l SupplierQuoteItem
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSupplierQuoteItemRelatedByProductid(SupplierQuoteItem $l)
	{
		if ($this->collSupplierQuoteItemsRelatedByProductid === null) {
			$this->initSupplierQuoteItemsRelatedByProductid();
		}
		if (!in_array($l, $this->collSupplierQuoteItemsRelatedByProductid, true)) { // only add it if the **same** object is not already associated
			array_push($this->collSupplierQuoteItemsRelatedByProductid, $l);
			$l->setProductRelatedByProductid($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierQuoteItemsRelatedByProductid from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getSupplierQuoteItemsRelatedByProductidJoinSupplierQuote($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuoteItemsRelatedByProductid === null) {
			if ($this->isNew()) {
				$this->collSupplierQuoteItemsRelatedByProductid = array();
			} else {

				$criteria->add(SupplierQuoteItemPeer::PRODUCTID, $this->id);

				$this->collSupplierQuoteItemsRelatedByProductid = SupplierQuoteItemPeer::doSelectJoinSupplierQuote($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuoteItemPeer::PRODUCTID, $this->id);

			if (!isset($this->lastSupplierQuoteItemRelatedByProductidCriteria) || !$this->lastSupplierQuoteItemRelatedByProductidCriteria->equals($criteria)) {
				$this->collSupplierQuoteItemsRelatedByProductid = SupplierQuoteItemPeer::doSelectJoinSupplierQuote($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuoteItemRelatedByProductidCriteria = $criteria;

		return $this->collSupplierQuoteItemsRelatedByProductid;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierQuoteItemsRelatedByProductid from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getSupplierQuoteItemsRelatedByProductidJoinClientQuoteItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuoteItemsRelatedByProductid === null) {
			if ($this->isNew()) {
				$this->collSupplierQuoteItemsRelatedByProductid = array();
			} else {

				$criteria->add(SupplierQuoteItemPeer::PRODUCTID, $this->id);

				$this->collSupplierQuoteItemsRelatedByProductid = SupplierQuoteItemPeer::doSelectJoinClientQuoteItem($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuoteItemPeer::PRODUCTID, $this->id);

			if (!isset($this->lastSupplierQuoteItemRelatedByProductidCriteria) || !$this->lastSupplierQuoteItemRelatedByProductidCriteria->equals($criteria)) {
				$this->collSupplierQuoteItemsRelatedByProductid = SupplierQuoteItemPeer::doSelectJoinClientQuoteItem($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuoteItemRelatedByProductidCriteria = $criteria;

		return $this->collSupplierQuoteItemsRelatedByProductid;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierQuoteItemsRelatedByProductid from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getSupplierQuoteItemsRelatedByProductidJoinIncoterm($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuoteItemsRelatedByProductid === null) {
			if ($this->isNew()) {
				$this->collSupplierQuoteItemsRelatedByProductid = array();
			} else {

				$criteria->add(SupplierQuoteItemPeer::PRODUCTID, $this->id);

				$this->collSupplierQuoteItemsRelatedByProductid = SupplierQuoteItemPeer::doSelectJoinIncoterm($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuoteItemPeer::PRODUCTID, $this->id);

			if (!isset($this->lastSupplierQuoteItemRelatedByProductidCriteria) || !$this->lastSupplierQuoteItemRelatedByProductidCriteria->equals($criteria)) {
				$this->collSupplierQuoteItemsRelatedByProductid = SupplierQuoteItemPeer::doSelectJoinIncoterm($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuoteItemRelatedByProductidCriteria = $criteria;

		return $this->collSupplierQuoteItemsRelatedByProductid;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierQuoteItemsRelatedByProductid from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getSupplierQuoteItemsRelatedByProductidJoinPort($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuoteItemsRelatedByProductid === null) {
			if ($this->isNew()) {
				$this->collSupplierQuoteItemsRelatedByProductid = array();
			} else {

				$criteria->add(SupplierQuoteItemPeer::PRODUCTID, $this->id);

				$this->collSupplierQuoteItemsRelatedByProductid = SupplierQuoteItemPeer::doSelectJoinPort($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuoteItemPeer::PRODUCTID, $this->id);

			if (!isset($this->lastSupplierQuoteItemRelatedByProductidCriteria) || !$this->lastSupplierQuoteItemRelatedByProductidCriteria->equals($criteria)) {
				$this->collSupplierQuoteItemsRelatedByProductid = SupplierQuoteItemPeer::doSelectJoinPort($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuoteItemRelatedByProductidCriteria = $criteria;

		return $this->collSupplierQuoteItemsRelatedByProductid;
	}

	/**
	 * Clears out the collSupplierQuoteItemsRelatedByReplacedproductid collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSupplierQuoteItemsRelatedByReplacedproductid()
	 */
	public function clearSupplierQuoteItemsRelatedByReplacedproductid()
	{
		$this->collSupplierQuoteItemsRelatedByReplacedproductid = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSupplierQuoteItemsRelatedByReplacedproductid collection (array).
	 *
	 * By default this just sets the collSupplierQuoteItemsRelatedByReplacedproductid collection to an empty array (like clearcollSupplierQuoteItemsRelatedByReplacedproductid());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierQuoteItemsRelatedByReplacedproductid()
	{
		$this->collSupplierQuoteItemsRelatedByReplacedproductid = array();
	}

	/**
	 * Gets an array of SupplierQuoteItem objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Product has previously been saved, it will retrieve
	 * related SupplierQuoteItemsRelatedByReplacedproductid from storage. If this Product is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array SupplierQuoteItem[]
	 * @throws     PropelException
	 */
	public function getSupplierQuoteItemsRelatedByReplacedproductid($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuoteItemsRelatedByReplacedproductid === null) {
			if ($this->isNew()) {
			   $this->collSupplierQuoteItemsRelatedByReplacedproductid = array();
			} else {

				$criteria->add(SupplierQuoteItemPeer::REPLACEDPRODUCTID, $this->id);

				SupplierQuoteItemPeer::addSelectColumns($criteria);
				$this->collSupplierQuoteItemsRelatedByReplacedproductid = SupplierQuoteItemPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(SupplierQuoteItemPeer::REPLACEDPRODUCTID, $this->id);

				SupplierQuoteItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastSupplierQuoteItemRelatedByReplacedproductidCriteria) || !$this->lastSupplierQuoteItemRelatedByReplacedproductidCriteria->equals($criteria)) {
					$this->collSupplierQuoteItemsRelatedByReplacedproductid = SupplierQuoteItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSupplierQuoteItemRelatedByReplacedproductidCriteria = $criteria;
		return $this->collSupplierQuoteItemsRelatedByReplacedproductid;
	}

	/**
	 * Returns the number of related SupplierQuoteItem objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SupplierQuoteItem objects.
	 * @throws     PropelException
	 */
	public function countSupplierQuoteItemsRelatedByReplacedproductid(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
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

		if ($this->collSupplierQuoteItemsRelatedByReplacedproductid === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(SupplierQuoteItemPeer::REPLACEDPRODUCTID, $this->id);

				$count = SupplierQuoteItemPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(SupplierQuoteItemPeer::REPLACEDPRODUCTID, $this->id);

				if (!isset($this->lastSupplierQuoteItemRelatedByReplacedproductidCriteria) || !$this->lastSupplierQuoteItemRelatedByReplacedproductidCriteria->equals($criteria)) {
					$count = SupplierQuoteItemPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collSupplierQuoteItemsRelatedByReplacedproductid);
				}
			} else {
				$count = count($this->collSupplierQuoteItemsRelatedByReplacedproductid);
			}
		}
		$this->lastSupplierQuoteItemRelatedByReplacedproductidCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a SupplierQuoteItem object to this object
	 * through the SupplierQuoteItem foreign key attribute.
	 *
	 * @param      SupplierQuoteItem $l SupplierQuoteItem
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSupplierQuoteItemRelatedByReplacedproductid(SupplierQuoteItem $l)
	{
		if ($this->collSupplierQuoteItemsRelatedByReplacedproductid === null) {
			$this->initSupplierQuoteItemsRelatedByReplacedproductid();
		}
		if (!in_array($l, $this->collSupplierQuoteItemsRelatedByReplacedproductid, true)) { // only add it if the **same** object is not already associated
			array_push($this->collSupplierQuoteItemsRelatedByReplacedproductid, $l);
			$l->setProductRelatedByReplacedproductid($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierQuoteItemsRelatedByReplacedproductid from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getSupplierQuoteItemsRelatedByReplacedproductidJoinSupplierQuote($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuoteItemsRelatedByReplacedproductid === null) {
			if ($this->isNew()) {
				$this->collSupplierQuoteItemsRelatedByReplacedproductid = array();
			} else {

				$criteria->add(SupplierQuoteItemPeer::REPLACEDPRODUCTID, $this->id);

				$this->collSupplierQuoteItemsRelatedByReplacedproductid = SupplierQuoteItemPeer::doSelectJoinSupplierQuote($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuoteItemPeer::REPLACEDPRODUCTID, $this->id);

			if (!isset($this->lastSupplierQuoteItemRelatedByReplacedproductidCriteria) || !$this->lastSupplierQuoteItemRelatedByReplacedproductidCriteria->equals($criteria)) {
				$this->collSupplierQuoteItemsRelatedByReplacedproductid = SupplierQuoteItemPeer::doSelectJoinSupplierQuote($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuoteItemRelatedByReplacedproductidCriteria = $criteria;

		return $this->collSupplierQuoteItemsRelatedByReplacedproductid;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierQuoteItemsRelatedByReplacedproductid from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getSupplierQuoteItemsRelatedByReplacedproductidJoinClientQuoteItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuoteItemsRelatedByReplacedproductid === null) {
			if ($this->isNew()) {
				$this->collSupplierQuoteItemsRelatedByReplacedproductid = array();
			} else {

				$criteria->add(SupplierQuoteItemPeer::REPLACEDPRODUCTID, $this->id);

				$this->collSupplierQuoteItemsRelatedByReplacedproductid = SupplierQuoteItemPeer::doSelectJoinClientQuoteItem($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuoteItemPeer::REPLACEDPRODUCTID, $this->id);

			if (!isset($this->lastSupplierQuoteItemRelatedByReplacedproductidCriteria) || !$this->lastSupplierQuoteItemRelatedByReplacedproductidCriteria->equals($criteria)) {
				$this->collSupplierQuoteItemsRelatedByReplacedproductid = SupplierQuoteItemPeer::doSelectJoinClientQuoteItem($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuoteItemRelatedByReplacedproductidCriteria = $criteria;

		return $this->collSupplierQuoteItemsRelatedByReplacedproductid;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierQuoteItemsRelatedByReplacedproductid from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getSupplierQuoteItemsRelatedByReplacedproductidJoinIncoterm($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuoteItemsRelatedByReplacedproductid === null) {
			if ($this->isNew()) {
				$this->collSupplierQuoteItemsRelatedByReplacedproductid = array();
			} else {

				$criteria->add(SupplierQuoteItemPeer::REPLACEDPRODUCTID, $this->id);

				$this->collSupplierQuoteItemsRelatedByReplacedproductid = SupplierQuoteItemPeer::doSelectJoinIncoterm($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuoteItemPeer::REPLACEDPRODUCTID, $this->id);

			if (!isset($this->lastSupplierQuoteItemRelatedByReplacedproductidCriteria) || !$this->lastSupplierQuoteItemRelatedByReplacedproductidCriteria->equals($criteria)) {
				$this->collSupplierQuoteItemsRelatedByReplacedproductid = SupplierQuoteItemPeer::doSelectJoinIncoterm($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuoteItemRelatedByReplacedproductidCriteria = $criteria;

		return $this->collSupplierQuoteItemsRelatedByReplacedproductid;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierQuoteItemsRelatedByReplacedproductid from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getSupplierQuoteItemsRelatedByReplacedproductidJoinPort($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuoteItemsRelatedByReplacedproductid === null) {
			if ($this->isNew()) {
				$this->collSupplierQuoteItemsRelatedByReplacedproductid = array();
			} else {

				$criteria->add(SupplierQuoteItemPeer::REPLACEDPRODUCTID, $this->id);

				$this->collSupplierQuoteItemsRelatedByReplacedproductid = SupplierQuoteItemPeer::doSelectJoinPort($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuoteItemPeer::REPLACEDPRODUCTID, $this->id);

			if (!isset($this->lastSupplierQuoteItemRelatedByReplacedproductidCriteria) || !$this->lastSupplierQuoteItemRelatedByReplacedproductidCriteria->equals($criteria)) {
				$this->collSupplierQuoteItemsRelatedByReplacedproductid = SupplierQuoteItemPeer::doSelectJoinPort($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuoteItemRelatedByReplacedproductidCriteria = $criteria;

		return $this->collSupplierQuoteItemsRelatedByReplacedproductid;
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
	 * Clears out the collSupplierPurchaseOrderItems collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSupplierPurchaseOrderItems()
	 */
	public function clearSupplierPurchaseOrderItems()
	{
		$this->collSupplierPurchaseOrderItems = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSupplierPurchaseOrderItems collection (array).
	 *
	 * By default this just sets the collSupplierPurchaseOrderItems collection to an empty array (like clearcollSupplierPurchaseOrderItems());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierPurchaseOrderItems()
	{
		$this->collSupplierPurchaseOrderItems = array();
	}

	/**
	 * Gets an array of SupplierPurchaseOrderItem objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Product has previously been saved, it will retrieve
	 * related SupplierPurchaseOrderItems from storage. If this Product is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array SupplierPurchaseOrderItem[]
	 * @throws     PropelException
	 */
	public function getSupplierPurchaseOrderItems($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrderItems === null) {
			if ($this->isNew()) {
			   $this->collSupplierPurchaseOrderItems = array();
			} else {

				$criteria->add(SupplierPurchaseOrderItemPeer::PRODUCTID, $this->id);

				SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
				$this->collSupplierPurchaseOrderItems = SupplierPurchaseOrderItemPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(SupplierPurchaseOrderItemPeer::PRODUCTID, $this->id);

				SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastSupplierPurchaseOrderItemCriteria) || !$this->lastSupplierPurchaseOrderItemCriteria->equals($criteria)) {
					$this->collSupplierPurchaseOrderItems = SupplierPurchaseOrderItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSupplierPurchaseOrderItemCriteria = $criteria;
		return $this->collSupplierPurchaseOrderItems;
	}

	/**
	 * Returns the number of related SupplierPurchaseOrderItem objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SupplierPurchaseOrderItem objects.
	 * @throws     PropelException
	 */
	public function countSupplierPurchaseOrderItems(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
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

		if ($this->collSupplierPurchaseOrderItems === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(SupplierPurchaseOrderItemPeer::PRODUCTID, $this->id);

				$count = SupplierPurchaseOrderItemPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(SupplierPurchaseOrderItemPeer::PRODUCTID, $this->id);

				if (!isset($this->lastSupplierPurchaseOrderItemCriteria) || !$this->lastSupplierPurchaseOrderItemCriteria->equals($criteria)) {
					$count = SupplierPurchaseOrderItemPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collSupplierPurchaseOrderItems);
				}
			} else {
				$count = count($this->collSupplierPurchaseOrderItems);
			}
		}
		$this->lastSupplierPurchaseOrderItemCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a SupplierPurchaseOrderItem object to this object
	 * through the SupplierPurchaseOrderItem foreign key attribute.
	 *
	 * @param      SupplierPurchaseOrderItem $l SupplierPurchaseOrderItem
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSupplierPurchaseOrderItem(SupplierPurchaseOrderItem $l)
	{
		if ($this->collSupplierPurchaseOrderItems === null) {
			$this->initSupplierPurchaseOrderItems();
		}
		if (!in_array($l, $this->collSupplierPurchaseOrderItems, true)) { // only add it if the **same** object is not already associated
			array_push($this->collSupplierPurchaseOrderItems, $l);
			$l->setProduct($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierPurchaseOrderItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getSupplierPurchaseOrderItemsJoinSupplierPurchaseOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrderItems === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrderItems = array();
			} else {

				$criteria->add(SupplierPurchaseOrderItemPeer::PRODUCTID, $this->id);

				$this->collSupplierPurchaseOrderItems = SupplierPurchaseOrderItemPeer::doSelectJoinSupplierPurchaseOrder($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderItemPeer::PRODUCTID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderItemCriteria) || !$this->lastSupplierPurchaseOrderItemCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrderItems = SupplierPurchaseOrderItemPeer::doSelectJoinSupplierPurchaseOrder($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderItemCriteria = $criteria;

		return $this->collSupplierPurchaseOrderItems;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierPurchaseOrderItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getSupplierPurchaseOrderItemsJoinIncoterm($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrderItems === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrderItems = array();
			} else {

				$criteria->add(SupplierPurchaseOrderItemPeer::PRODUCTID, $this->id);

				$this->collSupplierPurchaseOrderItems = SupplierPurchaseOrderItemPeer::doSelectJoinIncoterm($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderItemPeer::PRODUCTID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderItemCriteria) || !$this->lastSupplierPurchaseOrderItemCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrderItems = SupplierPurchaseOrderItemPeer::doSelectJoinIncoterm($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderItemCriteria = $criteria;

		return $this->collSupplierPurchaseOrderItems;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierPurchaseOrderItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getSupplierPurchaseOrderItemsJoinPort($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrderItems === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrderItems = array();
			} else {

				$criteria->add(SupplierPurchaseOrderItemPeer::PRODUCTID, $this->id);

				$this->collSupplierPurchaseOrderItems = SupplierPurchaseOrderItemPeer::doSelectJoinPort($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderItemPeer::PRODUCTID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderItemCriteria) || !$this->lastSupplierPurchaseOrderItemCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrderItems = SupplierPurchaseOrderItemPeer::doSelectJoinPort($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderItemCriteria = $criteria;

		return $this->collSupplierPurchaseOrderItems;
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
			if ($this->collClientQuoteItems) {
				foreach ((array) $this->collClientQuoteItems as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierQuoteItemsRelatedByProductid) {
				foreach ((array) $this->collSupplierQuoteItemsRelatedByProductid as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierQuoteItemsRelatedByReplacedproductid) {
				foreach ((array) $this->collSupplierQuoteItemsRelatedByReplacedproductid as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClientPurchaseOrderItems) {
				foreach ((array) $this->collClientPurchaseOrderItems as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierPurchaseOrderItems) {
				foreach ((array) $this->collSupplierPurchaseOrderItems as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->singleProductSupplier = null;
		$this->collClientQuoteItems = null;
		$this->collSupplierQuoteItemsRelatedByProductid = null;
		$this->collSupplierQuoteItemsRelatedByReplacedproductid = null;
		$this->collClientPurchaseOrderItems = null;
		$this->collSupplierPurchaseOrderItems = null;
	}

} // BaseProduct
