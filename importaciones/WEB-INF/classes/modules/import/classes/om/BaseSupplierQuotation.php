<?php

/**
 * Base class that represents a row from the 'import_supplierQuotation' table.
 *
 * Cotizacion de Proveedor
 *
 * @package    import.classes.om
 */
abstract class BaseSupplierQuotation extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SupplierQuotationPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the createdat field.
	 * @var        string
	 */
	protected $createdat;

	/**
	 * The value for the supplierid field.
	 * @var        int
	 */
	protected $supplierid;

	/**
	 * The value for the status field.
	 * @var        int
	 */
	protected $status;

	/**
	 * The value for the timestampstatus field.
	 * @var        string
	 */
	protected $timestampstatus;

	/**
	 * The value for the clientquotationid field.
	 * @var        int
	 */
	protected $clientquotationid;

	/**
	 * The value for the supplieraccesstoken field.
	 * @var        string
	 */
	protected $supplieraccesstoken;

	/**
	 * @var        ClientQuotation
	 */
	protected $aClientQuotation;

	/**
	 * @var        Supplier
	 */
	protected $aSupplier;

	/**
	 * @var        array SupplierQuotationHistory[] Collection to store aggregation of SupplierQuotationHistory objects.
	 */
	protected $collSupplierQuotationHistorys;

	/**
	 * @var        Criteria The criteria used to select the current contents of collSupplierQuotationHistorys.
	 */
	private $lastSupplierQuotationHistoryCriteria = null;

	/**
	 * @var        array SupplierQuotationItem[] Collection to store aggregation of SupplierQuotationItem objects.
	 */
	protected $collSupplierQuotationItems;

	/**
	 * @var        Criteria The criteria used to select the current contents of collSupplierQuotationItems.
	 */
	private $lastSupplierQuotationItemCriteria = null;

	/**
	 * @var        array SupplierPurchaseOrder[] Collection to store aggregation of SupplierPurchaseOrder objects.
	 */
	protected $collSupplierPurchaseOrders;

	/**
	 * @var        Criteria The criteria used to select the current contents of collSupplierPurchaseOrders.
	 */
	private $lastSupplierPurchaseOrderCriteria = null;

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
	 * Initializes internal state of BaseSupplierQuotation object.
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
	 * Id de cotizacion de proveedor
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [optionally formatted] temporal [createdat] column value.
	 * Creation date for
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCreatedat($format = 'Y-m-d H:i:s')
	{
		if ($this->createdat === null) {
			return null;
		}


		if ($this->createdat === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->createdat);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->createdat, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [supplierid] column value.
	 * Supplier
	 * @return     int
	 */
	public function getSupplierid()
	{
		return $this->supplierid;
	}

	/**
	 * Get the [status] column value.
	 * Status de Cotizacion
	 * @return     int
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Get the [optionally formatted] temporal [timestampstatus] column value.
	 * Fecha del ultimo cambio de status
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getTimestampstatus($format = 'Y-m-d H:i:s')
	{
		if ($this->timestampstatus === null) {
			return null;
		}


		if ($this->timestampstatus === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->timestampstatus);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->timestampstatus, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [clientquotationid] column value.
	 * id de cotizacion relacionada
	 * @return     int
	 */
	public function getClientquotationid()
	{
		return $this->clientquotationid;
	}

	/**
	 * Get the [supplieraccesstoken] column value.
	 * token de validacion del acceso al proveedor a la orden
	 * @return     string
	 */
	public function getSupplieraccesstoken()
	{
		return $this->supplieraccesstoken;
	}

	/**
	 * Set the value of [id] column.
	 * Id de cotizacion de proveedor
	 * @param      int $v new value
	 * @return     SupplierQuotation The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SupplierQuotationPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Sets the value of [createdat] column to a normalized version of the date/time value specified.
	 * Creation date for
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     SupplierQuotation The current object (for fluent API support)
	 */
	public function setCreatedat($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->createdat !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->createdat !== null && $tmpDt = new DateTime($this->createdat)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->createdat = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = SupplierQuotationPeer::CREATEDAT;
			}
		} // if either are not null

		return $this;
	} // setCreatedat()

	/**
	 * Set the value of [supplierid] column.
	 * Supplier
	 * @param      int $v new value
	 * @return     SupplierQuotation The current object (for fluent API support)
	 */
	public function setSupplierid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->supplierid !== $v) {
			$this->supplierid = $v;
			$this->modifiedColumns[] = SupplierQuotationPeer::SUPPLIERID;
		}

		if ($this->aSupplier !== null && $this->aSupplier->getId() !== $v) {
			$this->aSupplier = null;
		}

		return $this;
	} // setSupplierid()

	/**
	 * Set the value of [status] column.
	 * Status de Cotizacion
	 * @param      int $v new value
	 * @return     SupplierQuotation The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = SupplierQuotationPeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Sets the value of [timestampstatus] column to a normalized version of the date/time value specified.
	 * Fecha del ultimo cambio de status
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     SupplierQuotation The current object (for fluent API support)
	 */
	public function setTimestampstatus($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->timestampstatus !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->timestampstatus !== null && $tmpDt = new DateTime($this->timestampstatus)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->timestampstatus = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = SupplierQuotationPeer::TIMESTAMPSTATUS;
			}
		} // if either are not null

		return $this;
	} // setTimestampstatus()

	/**
	 * Set the value of [clientquotationid] column.
	 * id de cotizacion relacionada
	 * @param      int $v new value
	 * @return     SupplierQuotation The current object (for fluent API support)
	 */
	public function setClientquotationid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->clientquotationid !== $v) {
			$this->clientquotationid = $v;
			$this->modifiedColumns[] = SupplierQuotationPeer::CLIENTQUOTATIONID;
		}

		if ($this->aClientQuotation !== null && $this->aClientQuotation->getId() !== $v) {
			$this->aClientQuotation = null;
		}

		return $this;
	} // setClientquotationid()

	/**
	 * Set the value of [supplieraccesstoken] column.
	 * token de validacion del acceso al proveedor a la orden
	 * @param      string $v new value
	 * @return     SupplierQuotation The current object (for fluent API support)
	 */
	public function setSupplieraccesstoken($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->supplieraccesstoken !== $v) {
			$this->supplieraccesstoken = $v;
			$this->modifiedColumns[] = SupplierQuotationPeer::SUPPLIERACCESSTOKEN;
		}

		return $this;
	} // setSupplieraccesstoken()

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
			$this->createdat = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->supplierid = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->status = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->timestampstatus = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->clientquotationid = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->supplieraccesstoken = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 7; // 7 = SupplierQuotationPeer::NUM_COLUMNS - SupplierQuotationPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating SupplierQuotation object", $e);
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

		if ($this->aSupplier !== null && $this->supplierid !== $this->aSupplier->getId()) {
			$this->aSupplier = null;
		}
		if ($this->aClientQuotation !== null && $this->clientquotationid !== $this->aClientQuotation->getId()) {
			$this->aClientQuotation = null;
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
			$con = Propel::getConnection(SupplierQuotationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SupplierQuotationPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aClientQuotation = null;
			$this->aSupplier = null;
			$this->collSupplierQuotationHistorys = null;
			$this->lastSupplierQuotationHistoryCriteria = null;

			$this->collSupplierQuotationItems = null;
			$this->lastSupplierQuotationItemCriteria = null;

			$this->collSupplierPurchaseOrders = null;
			$this->lastSupplierPurchaseOrderCriteria = null;

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
			$con = Propel::getConnection(SupplierQuotationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			SupplierQuotationPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(SupplierQuotationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			SupplierQuotationPeer::addInstanceToPool($this);
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

			if ($this->aClientQuotation !== null) {
				if ($this->aClientQuotation->isModified() || $this->aClientQuotation->isNew()) {
					$affectedRows += $this->aClientQuotation->save($con);
				}
				$this->setClientQuotation($this->aClientQuotation);
			}

			if ($this->aSupplier !== null) {
				if ($this->aSupplier->isModified() || $this->aSupplier->isNew()) {
					$affectedRows += $this->aSupplier->save($con);
				}
				$this->setSupplier($this->aSupplier);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = SupplierQuotationPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SupplierQuotationPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += SupplierQuotationPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collSupplierQuotationHistorys !== null) {
				foreach ($this->collSupplierQuotationHistorys as $referrerFK) {
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


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aClientQuotation !== null) {
				if (!$this->aClientQuotation->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aClientQuotation->getValidationFailures());
				}
			}

			if ($this->aSupplier !== null) {
				if (!$this->aSupplier->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSupplier->getValidationFailures());
				}
			}


			if (($retval = SupplierQuotationPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collSupplierQuotationHistorys !== null) {
					foreach ($this->collSupplierQuotationHistorys as $referrerFK) {
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
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SupplierQuotationPeer::DATABASE_NAME);

		if ($this->isColumnModified(SupplierQuotationPeer::ID)) $criteria->add(SupplierQuotationPeer::ID, $this->id);
		if ($this->isColumnModified(SupplierQuotationPeer::CREATEDAT)) $criteria->add(SupplierQuotationPeer::CREATEDAT, $this->createdat);
		if ($this->isColumnModified(SupplierQuotationPeer::SUPPLIERID)) $criteria->add(SupplierQuotationPeer::SUPPLIERID, $this->supplierid);
		if ($this->isColumnModified(SupplierQuotationPeer::STATUS)) $criteria->add(SupplierQuotationPeer::STATUS, $this->status);
		if ($this->isColumnModified(SupplierQuotationPeer::TIMESTAMPSTATUS)) $criteria->add(SupplierQuotationPeer::TIMESTAMPSTATUS, $this->timestampstatus);
		if ($this->isColumnModified(SupplierQuotationPeer::CLIENTQUOTATIONID)) $criteria->add(SupplierQuotationPeer::CLIENTQUOTATIONID, $this->clientquotationid);
		if ($this->isColumnModified(SupplierQuotationPeer::SUPPLIERACCESSTOKEN)) $criteria->add(SupplierQuotationPeer::SUPPLIERACCESSTOKEN, $this->supplieraccesstoken);

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
		$criteria = new Criteria(SupplierQuotationPeer::DATABASE_NAME);

		$criteria->add(SupplierQuotationPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of SupplierQuotation (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCreatedat($this->createdat);

		$copyObj->setSupplierid($this->supplierid);

		$copyObj->setStatus($this->status);

		$copyObj->setTimestampstatus($this->timestampstatus);

		$copyObj->setClientquotationid($this->clientquotationid);

		$copyObj->setSupplieraccesstoken($this->supplieraccesstoken);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getSupplierQuotationHistorys() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierQuotationHistory($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierQuotationItems() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierQuotationItem($relObj->copy($deepCopy));
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
	 * @return     SupplierQuotation Clone of current object.
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
	 * @return     SupplierQuotationPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SupplierQuotationPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a ClientQuotation object.
	 *
	 * @param      ClientQuotation $v
	 * @return     SupplierQuotation The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setClientQuotation(ClientQuotation $v = null)
	{
		if ($v === null) {
			$this->setClientquotationid(NULL);
		} else {
			$this->setClientquotationid($v->getId());
		}

		$this->aClientQuotation = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ClientQuotation object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplierQuotation($this);
		}

		return $this;
	}


	/**
	 * Get the associated ClientQuotation object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ClientQuotation The associated ClientQuotation object.
	 * @throws     PropelException
	 */
	public function getClientQuotation(PropelPDO $con = null)
	{
		if ($this->aClientQuotation === null && ($this->clientquotationid !== null)) {
			$this->aClientQuotation = ClientQuotationPeer::retrieveByPK($this->clientquotationid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aClientQuotation->addSupplierQuotations($this);
			 */
		}
		return $this->aClientQuotation;
	}

	/**
	 * Declares an association between this object and a Supplier object.
	 *
	 * @param      Supplier $v
	 * @return     SupplierQuotation The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSupplier(Supplier $v = null)
	{
		if ($v === null) {
			$this->setSupplierid(NULL);
		} else {
			$this->setSupplierid($v->getId());
		}

		$this->aSupplier = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Supplier object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplierQuotation($this);
		}

		return $this;
	}


	/**
	 * Get the associated Supplier object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Supplier The associated Supplier object.
	 * @throws     PropelException
	 */
	public function getSupplier(PropelPDO $con = null)
	{
		if ($this->aSupplier === null && ($this->supplierid !== null)) {
			$this->aSupplier = SupplierPeer::retrieveByPK($this->supplierid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aSupplier->addSupplierQuotations($this);
			 */
		}
		return $this->aSupplier;
	}

	/**
	 * Clears out the collSupplierQuotationHistorys collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSupplierQuotationHistorys()
	 */
	public function clearSupplierQuotationHistorys()
	{
		$this->collSupplierQuotationHistorys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSupplierQuotationHistorys collection (array).
	 *
	 * By default this just sets the collSupplierQuotationHistorys collection to an empty array (like clearcollSupplierQuotationHistorys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierQuotationHistorys()
	{
		$this->collSupplierQuotationHistorys = array();
	}

	/**
	 * Gets an array of SupplierQuotationHistory objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this SupplierQuotation has previously been saved, it will retrieve
	 * related SupplierQuotationHistorys from storage. If this SupplierQuotation is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array SupplierQuotationHistory[]
	 * @throws     PropelException
	 */
	public function getSupplierQuotationHistorys($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotationHistorys === null) {
			if ($this->isNew()) {
			   $this->collSupplierQuotationHistorys = array();
			} else {

				$criteria->add(SupplierQuotationHistoryPeer::SUPPLIERQUOTATIONID, $this->id);

				SupplierQuotationHistoryPeer::addSelectColumns($criteria);
				$this->collSupplierQuotationHistorys = SupplierQuotationHistoryPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(SupplierQuotationHistoryPeer::SUPPLIERQUOTATIONID, $this->id);

				SupplierQuotationHistoryPeer::addSelectColumns($criteria);
				if (!isset($this->lastSupplierQuotationHistoryCriteria) || !$this->lastSupplierQuotationHistoryCriteria->equals($criteria)) {
					$this->collSupplierQuotationHistorys = SupplierQuotationHistoryPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSupplierQuotationHistoryCriteria = $criteria;
		return $this->collSupplierQuotationHistorys;
	}

	/**
	 * Returns the number of related SupplierQuotationHistory objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SupplierQuotationHistory objects.
	 * @throws     PropelException
	 */
	public function countSupplierQuotationHistorys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierQuotationPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collSupplierQuotationHistorys === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(SupplierQuotationHistoryPeer::SUPPLIERQUOTATIONID, $this->id);

				$count = SupplierQuotationHistoryPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(SupplierQuotationHistoryPeer::SUPPLIERQUOTATIONID, $this->id);

				if (!isset($this->lastSupplierQuotationHistoryCriteria) || !$this->lastSupplierQuotationHistoryCriteria->equals($criteria)) {
					$count = SupplierQuotationHistoryPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collSupplierQuotationHistorys);
				}
			} else {
				$count = count($this->collSupplierQuotationHistorys);
			}
		}
		$this->lastSupplierQuotationHistoryCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a SupplierQuotationHistory object to this object
	 * through the SupplierQuotationHistory foreign key attribute.
	 *
	 * @param      SupplierQuotationHistory $l SupplierQuotationHistory
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSupplierQuotationHistory(SupplierQuotationHistory $l)
	{
		if ($this->collSupplierQuotationHistorys === null) {
			$this->initSupplierQuotationHistorys();
		}
		if (!in_array($l, $this->collSupplierQuotationHistorys, true)) { // only add it if the **same** object is not already associated
			array_push($this->collSupplierQuotationHistorys, $l);
			$l->setSupplierQuotation($this);
		}
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
	 * Otherwise if this SupplierQuotation has previously been saved, it will retrieve
	 * related SupplierQuotationItems from storage. If this SupplierQuotation is new, it will return
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
			$criteria = new Criteria(SupplierQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotationItems === null) {
			if ($this->isNew()) {
			   $this->collSupplierQuotationItems = array();
			} else {

				$criteria->add(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID, $this->id);

				SupplierQuotationItemPeer::addSelectColumns($criteria);
				$this->collSupplierQuotationItems = SupplierQuotationItemPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID, $this->id);

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
			$criteria = new Criteria(SupplierQuotationPeer::DATABASE_NAME);
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

				$criteria->add(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID, $this->id);

				$count = SupplierQuotationItemPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID, $this->id);

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
			$l->setSupplierQuotation($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierQuotation is new, it will return
	 * an empty collection; or if this SupplierQuotation has previously
	 * been saved, it will retrieve related SupplierQuotationItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuotation.
	 */
	public function getSupplierQuotationItemsJoinClientQuotationItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotationItems === null) {
			if ($this->isNew()) {
				$this->collSupplierQuotationItems = array();
			} else {

				$criteria->add(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID, $this->id);

				$this->collSupplierQuotationItems = SupplierQuotationItemPeer::doSelectJoinClientQuotationItem($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID, $this->id);

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
	 * Otherwise if this SupplierQuotation is new, it will return
	 * an empty collection; or if this SupplierQuotation has previously
	 * been saved, it will retrieve related SupplierQuotationItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuotation.
	 */
	public function getSupplierQuotationItemsJoinProductRelatedByProductid($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotationItems === null) {
			if ($this->isNew()) {
				$this->collSupplierQuotationItems = array();
			} else {

				$criteria->add(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID, $this->id);

				$this->collSupplierQuotationItems = SupplierQuotationItemPeer::doSelectJoinProductRelatedByProductid($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID, $this->id);

			if (!isset($this->lastSupplierQuotationItemCriteria) || !$this->lastSupplierQuotationItemCriteria->equals($criteria)) {
				$this->collSupplierQuotationItems = SupplierQuotationItemPeer::doSelectJoinProductRelatedByProductid($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuotationItemCriteria = $criteria;

		return $this->collSupplierQuotationItems;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierQuotation is new, it will return
	 * an empty collection; or if this SupplierQuotation has previously
	 * been saved, it will retrieve related SupplierQuotationItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuotation.
	 */
	public function getSupplierQuotationItemsJoinProductRelatedByReplacedproductid($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotationItems === null) {
			if ($this->isNew()) {
				$this->collSupplierQuotationItems = array();
			} else {

				$criteria->add(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID, $this->id);

				$this->collSupplierQuotationItems = SupplierQuotationItemPeer::doSelectJoinProductRelatedByReplacedproductid($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID, $this->id);

			if (!isset($this->lastSupplierQuotationItemCriteria) || !$this->lastSupplierQuotationItemCriteria->equals($criteria)) {
				$this->collSupplierQuotationItems = SupplierQuotationItemPeer::doSelectJoinProductRelatedByReplacedproductid($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuotationItemCriteria = $criteria;

		return $this->collSupplierQuotationItems;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierQuotation is new, it will return
	 * an empty collection; or if this SupplierQuotation has previously
	 * been saved, it will retrieve related SupplierQuotationItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuotation.
	 */
	public function getSupplierQuotationItemsJoinIncoterm($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotationItems === null) {
			if ($this->isNew()) {
				$this->collSupplierQuotationItems = array();
			} else {

				$criteria->add(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID, $this->id);

				$this->collSupplierQuotationItems = SupplierQuotationItemPeer::doSelectJoinIncoterm($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID, $this->id);

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
	 * Otherwise if this SupplierQuotation is new, it will return
	 * an empty collection; or if this SupplierQuotation has previously
	 * been saved, it will retrieve related SupplierQuotationItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuotation.
	 */
	public function getSupplierQuotationItemsJoinPort($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotationItems === null) {
			if ($this->isNew()) {
				$this->collSupplierQuotationItems = array();
			} else {

				$criteria->add(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID, $this->id);

				$this->collSupplierQuotationItems = SupplierQuotationItemPeer::doSelectJoinPort($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID, $this->id);

			if (!isset($this->lastSupplierQuotationItemCriteria) || !$this->lastSupplierQuotationItemCriteria->equals($criteria)) {
				$this->collSupplierQuotationItems = SupplierQuotationItemPeer::doSelectJoinPort($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuotationItemCriteria = $criteria;

		return $this->collSupplierQuotationItems;
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
	 * Otherwise if this SupplierQuotation has previously been saved, it will retrieve
	 * related SupplierPurchaseOrders from storage. If this SupplierQuotation is new, it will return
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
			$criteria = new Criteria(SupplierQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
			   $this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID, $this->id);

				SupplierPurchaseOrderPeer::addSelectColumns($criteria);
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID, $this->id);

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
			$criteria = new Criteria(SupplierQuotationPeer::DATABASE_NAME);
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

				$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID, $this->id);

				$count = SupplierPurchaseOrderPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID, $this->id);

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
			$l->setSupplierQuotation($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierQuotation is new, it will return
	 * an empty collection; or if this SupplierQuotation has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuotation.
	 */
	public function getSupplierPurchaseOrdersJoinClientQuotation($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinClientQuotation($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinClientQuotation($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;

		return $this->collSupplierPurchaseOrders;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierQuotation is new, it will return
	 * an empty collection; or if this SupplierQuotation has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuotation.
	 */
	public function getSupplierPurchaseOrdersJoinSupplier($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinSupplier($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinSupplier($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;

		return $this->collSupplierPurchaseOrders;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierQuotation is new, it will return
	 * an empty collection; or if this SupplierQuotation has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuotation.
	 */
	public function getSupplierPurchaseOrdersJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinUser($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID, $this->id);

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
	 * Otherwise if this SupplierQuotation is new, it will return
	 * an empty collection; or if this SupplierQuotation has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuotation.
	 */
	public function getSupplierPurchaseOrdersJoinAffiliate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinAffiliate($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID, $this->id);

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
	 * Otherwise if this SupplierQuotation is new, it will return
	 * an empty collection; or if this SupplierQuotation has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuotation.
	 */
	public function getSupplierPurchaseOrdersJoinAffiliateUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinAffiliateUser($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinAffiliateUser($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;

		return $this->collSupplierPurchaseOrders;
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
			if ($this->collSupplierQuotationHistorys) {
				foreach ((array) $this->collSupplierQuotationHistorys as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierQuotationItems) {
				foreach ((array) $this->collSupplierQuotationItems as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierPurchaseOrders) {
				foreach ((array) $this->collSupplierPurchaseOrders as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collSupplierQuotationHistorys = null;
		$this->collSupplierQuotationItems = null;
		$this->collSupplierPurchaseOrders = null;
			$this->aClientQuotation = null;
			$this->aSupplier = null;
	}

} // BaseSupplierQuotation
