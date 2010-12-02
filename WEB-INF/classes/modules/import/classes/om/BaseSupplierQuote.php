<?php


/**
 * Base class that represents a row from the 'import_supplierQuote' table.
 *
 * Cotizacion de Proveedor
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseSupplierQuote extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'SupplierQuotePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SupplierQuotePeer
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
	 * The value for the clientquoteid field.
	 * @var        int
	 */
	protected $clientquoteid;

	/**
	 * The value for the supplieraccesstoken field.
	 * @var        string
	 */
	protected $supplieraccesstoken;

	/**
	 * @var        ClientQuote
	 */
	protected $aClientQuote;

	/**
	 * @var        Supplier
	 */
	protected $aSupplier;

	/**
	 * @var        array SupplierQuoteHistory[] Collection to store aggregation of SupplierQuoteHistory objects.
	 */
	protected $collSupplierQuoteHistorys;

	/**
	 * @var        array SupplierQuoteItem[] Collection to store aggregation of SupplierQuoteItem objects.
	 */
	protected $collSupplierQuoteItems;

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
	 * Get the [clientquoteid] column value.
	 * id de cotizacion relacionada
	 * @return     int
	 */
	public function getClientquoteid()
	{
		return $this->clientquoteid;
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
	 * @return     SupplierQuote The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SupplierQuotePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Sets the value of [createdat] column to a normalized version of the date/time value specified.
	 * Creation date for
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     SupplierQuote The current object (for fluent API support)
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
				$this->modifiedColumns[] = SupplierQuotePeer::CREATEDAT;
			}
		} // if either are not null

		return $this;
	} // setCreatedat()

	/**
	 * Set the value of [supplierid] column.
	 * Supplier
	 * @param      int $v new value
	 * @return     SupplierQuote The current object (for fluent API support)
	 */
	public function setSupplierid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->supplierid !== $v) {
			$this->supplierid = $v;
			$this->modifiedColumns[] = SupplierQuotePeer::SUPPLIERID;
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
	 * @return     SupplierQuote The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = SupplierQuotePeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Sets the value of [timestampstatus] column to a normalized version of the date/time value specified.
	 * Fecha del ultimo cambio de status
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     SupplierQuote The current object (for fluent API support)
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
				$this->modifiedColumns[] = SupplierQuotePeer::TIMESTAMPSTATUS;
			}
		} // if either are not null

		return $this;
	} // setTimestampstatus()

	/**
	 * Set the value of [clientquoteid] column.
	 * id de cotizacion relacionada
	 * @param      int $v new value
	 * @return     SupplierQuote The current object (for fluent API support)
	 */
	public function setClientquoteid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->clientquoteid !== $v) {
			$this->clientquoteid = $v;
			$this->modifiedColumns[] = SupplierQuotePeer::CLIENTQUOTEID;
		}

		if ($this->aClientQuote !== null && $this->aClientQuote->getId() !== $v) {
			$this->aClientQuote = null;
		}

		return $this;
	} // setClientquoteid()

	/**
	 * Set the value of [supplieraccesstoken] column.
	 * token de validacion del acceso al proveedor a la orden
	 * @param      string $v new value
	 * @return     SupplierQuote The current object (for fluent API support)
	 */
	public function setSupplieraccesstoken($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->supplieraccesstoken !== $v) {
			$this->supplieraccesstoken = $v;
			$this->modifiedColumns[] = SupplierQuotePeer::SUPPLIERACCESSTOKEN;
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
			$this->clientquoteid = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->supplieraccesstoken = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 7; // 7 = SupplierQuotePeer::NUM_COLUMNS - SupplierQuotePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating SupplierQuote object", $e);
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
		if ($this->aClientQuote !== null && $this->clientquoteid !== $this->aClientQuote->getId()) {
			$this->aClientQuote = null;
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
			$con = Propel::getConnection(SupplierQuotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SupplierQuotePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aClientQuote = null;
			$this->aSupplier = null;
			$this->collSupplierQuoteHistorys = null;

			$this->collSupplierQuoteItems = null;

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
			$con = Propel::getConnection(SupplierQuotePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				SupplierQuoteQuery::create()
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
			$con = Propel::getConnection(SupplierQuotePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				SupplierQuotePeer::addInstanceToPool($this);
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

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aClientQuote !== null) {
				if ($this->aClientQuote->isModified() || $this->aClientQuote->isNew()) {
					$affectedRows += $this->aClientQuote->save($con);
				}
				$this->setClientQuote($this->aClientQuote);
			}

			if ($this->aSupplier !== null) {
				if ($this->aSupplier->isModified() || $this->aSupplier->isNew()) {
					$affectedRows += $this->aSupplier->save($con);
				}
				$this->setSupplier($this->aSupplier);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = SupplierQuotePeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(SupplierQuotePeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.SupplierQuotePeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += SupplierQuotePeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collSupplierQuoteHistorys !== null) {
				foreach ($this->collSupplierQuoteHistorys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSupplierQuoteItems !== null) {
				foreach ($this->collSupplierQuoteItems as $referrerFK) {
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

			if ($this->aClientQuote !== null) {
				if (!$this->aClientQuote->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aClientQuote->getValidationFailures());
				}
			}

			if ($this->aSupplier !== null) {
				if (!$this->aSupplier->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSupplier->getValidationFailures());
				}
			}


			if (($retval = SupplierQuotePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collSupplierQuoteHistorys !== null) {
					foreach ($this->collSupplierQuoteHistorys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSupplierQuoteItems !== null) {
					foreach ($this->collSupplierQuoteItems as $referrerFK) {
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
		$pos = SupplierQuotePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCreatedat();
				break;
			case 2:
				return $this->getSupplierid();
				break;
			case 3:
				return $this->getStatus();
				break;
			case 4:
				return $this->getTimestampstatus();
				break;
			case 5:
				return $this->getClientquoteid();
				break;
			case 6:
				return $this->getSupplieraccesstoken();
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
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $includeForeignObjects = false)
	{
		$keys = SupplierQuotePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCreatedat(),
			$keys[2] => $this->getSupplierid(),
			$keys[3] => $this->getStatus(),
			$keys[4] => $this->getTimestampstatus(),
			$keys[5] => $this->getClientquoteid(),
			$keys[6] => $this->getSupplieraccesstoken(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aClientQuote) {
				$result['ClientQuote'] = $this->aClientQuote->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aSupplier) {
				$result['Supplier'] = $this->aSupplier->toArray($keyType, $includeLazyLoadColumns, true);
			}
		}
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
		$pos = SupplierQuotePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCreatedat($value);
				break;
			case 2:
				$this->setSupplierid($value);
				break;
			case 3:
				$this->setStatus($value);
				break;
			case 4:
				$this->setTimestampstatus($value);
				break;
			case 5:
				$this->setClientquoteid($value);
				break;
			case 6:
				$this->setSupplieraccesstoken($value);
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
		$keys = SupplierQuotePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCreatedat($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSupplierid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStatus($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTimestampstatus($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setClientquoteid($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSupplieraccesstoken($arr[$keys[6]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SupplierQuotePeer::DATABASE_NAME);

		if ($this->isColumnModified(SupplierQuotePeer::ID)) $criteria->add(SupplierQuotePeer::ID, $this->id);
		if ($this->isColumnModified(SupplierQuotePeer::CREATEDAT)) $criteria->add(SupplierQuotePeer::CREATEDAT, $this->createdat);
		if ($this->isColumnModified(SupplierQuotePeer::SUPPLIERID)) $criteria->add(SupplierQuotePeer::SUPPLIERID, $this->supplierid);
		if ($this->isColumnModified(SupplierQuotePeer::STATUS)) $criteria->add(SupplierQuotePeer::STATUS, $this->status);
		if ($this->isColumnModified(SupplierQuotePeer::TIMESTAMPSTATUS)) $criteria->add(SupplierQuotePeer::TIMESTAMPSTATUS, $this->timestampstatus);
		if ($this->isColumnModified(SupplierQuotePeer::CLIENTQUOTEID)) $criteria->add(SupplierQuotePeer::CLIENTQUOTEID, $this->clientquoteid);
		if ($this->isColumnModified(SupplierQuotePeer::SUPPLIERACCESSTOKEN)) $criteria->add(SupplierQuotePeer::SUPPLIERACCESSTOKEN, $this->supplieraccesstoken);

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
		$criteria = new Criteria(SupplierQuotePeer::DATABASE_NAME);
		$criteria->add(SupplierQuotePeer::ID, $this->id);

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
	 * @param      object $copyObj An object of SupplierQuote (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setCreatedat($this->createdat);
		$copyObj->setSupplierid($this->supplierid);
		$copyObj->setStatus($this->status);
		$copyObj->setTimestampstatus($this->timestampstatus);
		$copyObj->setClientquoteid($this->clientquoteid);
		$copyObj->setSupplieraccesstoken($this->supplieraccesstoken);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getSupplierQuoteHistorys() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierQuoteHistory($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierQuoteItems() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierQuoteItem($relObj->copy($deepCopy));
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
	 * @return     SupplierQuote Clone of current object.
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
	 * @return     SupplierQuotePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SupplierQuotePeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a ClientQuote object.
	 *
	 * @param      ClientQuote $v
	 * @return     SupplierQuote The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setClientQuote(ClientQuote $v = null)
	{
		if ($v === null) {
			$this->setClientquoteid(NULL);
		} else {
			$this->setClientquoteid($v->getId());
		}

		$this->aClientQuote = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ClientQuote object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplierQuote($this);
		}

		return $this;
	}


	/**
	 * Get the associated ClientQuote object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ClientQuote The associated ClientQuote object.
	 * @throws     PropelException
	 */
	public function getClientQuote(PropelPDO $con = null)
	{
		if ($this->aClientQuote === null && ($this->clientquoteid !== null)) {
			$this->aClientQuote = ClientQuoteQuery::create()->findPk($this->clientquoteid, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aClientQuote->addSupplierQuotes($this);
			 */
		}
		return $this->aClientQuote;
	}

	/**
	 * Declares an association between this object and a Supplier object.
	 *
	 * @param      Supplier $v
	 * @return     SupplierQuote The current object (for fluent API support)
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
			$v->addSupplierQuote($this);
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
			$this->aSupplier = SupplierQuery::create()->findPk($this->supplierid, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aSupplier->addSupplierQuotes($this);
			 */
		}
		return $this->aSupplier;
	}

	/**
	 * Clears out the collSupplierQuoteHistorys collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSupplierQuoteHistorys()
	 */
	public function clearSupplierQuoteHistorys()
	{
		$this->collSupplierQuoteHistorys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSupplierQuoteHistorys collection.
	 *
	 * By default this just sets the collSupplierQuoteHistorys collection to an empty array (like clearcollSupplierQuoteHistorys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierQuoteHistorys()
	{
		$this->collSupplierQuoteHistorys = new PropelObjectCollection();
		$this->collSupplierQuoteHistorys->setModel('SupplierQuoteHistory');
	}

	/**
	 * Gets an array of SupplierQuoteHistory objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SupplierQuote is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SupplierQuoteHistory[] List of SupplierQuoteHistory objects
	 * @throws     PropelException
	 */
	public function getSupplierQuoteHistorys($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSupplierQuoteHistorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collSupplierQuoteHistorys) {
				// return empty collection
				$this->initSupplierQuoteHistorys();
			} else {
				$collSupplierQuoteHistorys = SupplierQuoteHistoryQuery::create(null, $criteria)
					->filterBySupplierQuote($this)
					->find($con);
				if (null !== $criteria) {
					return $collSupplierQuoteHistorys;
				}
				$this->collSupplierQuoteHistorys = $collSupplierQuoteHistorys;
			}
		}
		return $this->collSupplierQuoteHistorys;
	}

	/**
	 * Returns the number of related SupplierQuoteHistory objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SupplierQuoteHistory objects.
	 * @throws     PropelException
	 */
	public function countSupplierQuoteHistorys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSupplierQuoteHistorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collSupplierQuoteHistorys) {
				return 0;
			} else {
				$query = SupplierQuoteHistoryQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBySupplierQuote($this)
					->count($con);
			}
		} else {
			return count($this->collSupplierQuoteHistorys);
		}
	}

	/**
	 * Method called to associate a SupplierQuoteHistory object to this object
	 * through the SupplierQuoteHistory foreign key attribute.
	 *
	 * @param      SupplierQuoteHistory $l SupplierQuoteHistory
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSupplierQuoteHistory(SupplierQuoteHistory $l)
	{
		if ($this->collSupplierQuoteHistorys === null) {
			$this->initSupplierQuoteHistorys();
		}
		if (!$this->collSupplierQuoteHistorys->contains($l)) { // only add it if the **same** object is not already associated
			$this->collSupplierQuoteHistorys[]= $l;
			$l->setSupplierQuote($this);
		}
	}

	/**
	 * Clears out the collSupplierQuoteItems collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSupplierQuoteItems()
	 */
	public function clearSupplierQuoteItems()
	{
		$this->collSupplierQuoteItems = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSupplierQuoteItems collection.
	 *
	 * By default this just sets the collSupplierQuoteItems collection to an empty array (like clearcollSupplierQuoteItems());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierQuoteItems()
	{
		$this->collSupplierQuoteItems = new PropelObjectCollection();
		$this->collSupplierQuoteItems->setModel('SupplierQuoteItem');
	}

	/**
	 * Gets an array of SupplierQuoteItem objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SupplierQuote is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SupplierQuoteItem[] List of SupplierQuoteItem objects
	 * @throws     PropelException
	 */
	public function getSupplierQuoteItems($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSupplierQuoteItems || null !== $criteria) {
			if ($this->isNew() && null === $this->collSupplierQuoteItems) {
				// return empty collection
				$this->initSupplierQuoteItems();
			} else {
				$collSupplierQuoteItems = SupplierQuoteItemQuery::create(null, $criteria)
					->filterBySupplierQuote($this)
					->find($con);
				if (null !== $criteria) {
					return $collSupplierQuoteItems;
				}
				$this->collSupplierQuoteItems = $collSupplierQuoteItems;
			}
		}
		return $this->collSupplierQuoteItems;
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
	public function countSupplierQuoteItems(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSupplierQuoteItems || null !== $criteria) {
			if ($this->isNew() && null === $this->collSupplierQuoteItems) {
				return 0;
			} else {
				$query = SupplierQuoteItemQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBySupplierQuote($this)
					->count($con);
			}
		} else {
			return count($this->collSupplierQuoteItems);
		}
	}

	/**
	 * Method called to associate a SupplierQuoteItem object to this object
	 * through the SupplierQuoteItem foreign key attribute.
	 *
	 * @param      SupplierQuoteItem $l SupplierQuoteItem
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSupplierQuoteItem(SupplierQuoteItem $l)
	{
		if ($this->collSupplierQuoteItems === null) {
			$this->initSupplierQuoteItems();
		}
		if (!$this->collSupplierQuoteItems->contains($l)) { // only add it if the **same** object is not already associated
			$this->collSupplierQuoteItems[]= $l;
			$l->setSupplierQuote($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierQuote is new, it will return
	 * an empty collection; or if this SupplierQuote has previously
	 * been saved, it will retrieve related SupplierQuoteItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuote.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierQuoteItem[] List of SupplierQuoteItem objects
	 */
	public function getSupplierQuoteItemsJoinClientQuoteItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierQuoteItemQuery::create(null, $criteria);
		$query->joinWith('ClientQuoteItem', $join_behavior);

		return $this->getSupplierQuoteItems($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierQuote is new, it will return
	 * an empty collection; or if this SupplierQuote has previously
	 * been saved, it will retrieve related SupplierQuoteItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuote.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierQuoteItem[] List of SupplierQuoteItem objects
	 */
	public function getSupplierQuoteItemsJoinProductRelatedByProductid($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierQuoteItemQuery::create(null, $criteria);
		$query->joinWith('ProductRelatedByProductid', $join_behavior);

		return $this->getSupplierQuoteItems($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierQuote is new, it will return
	 * an empty collection; or if this SupplierQuote has previously
	 * been saved, it will retrieve related SupplierQuoteItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuote.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierQuoteItem[] List of SupplierQuoteItem objects
	 */
	public function getSupplierQuoteItemsJoinProductRelatedByReplacedproductid($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierQuoteItemQuery::create(null, $criteria);
		$query->joinWith('ProductRelatedByReplacedproductid', $join_behavior);

		return $this->getSupplierQuoteItems($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierQuote is new, it will return
	 * an empty collection; or if this SupplierQuote has previously
	 * been saved, it will retrieve related SupplierQuoteItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuote.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierQuoteItem[] List of SupplierQuoteItem objects
	 */
	public function getSupplierQuoteItemsJoinIncoterm($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierQuoteItemQuery::create(null, $criteria);
		$query->joinWith('Incoterm', $join_behavior);

		return $this->getSupplierQuoteItems($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierQuote is new, it will return
	 * an empty collection; or if this SupplierQuote has previously
	 * been saved, it will retrieve related SupplierQuoteItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuote.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierQuoteItem[] List of SupplierQuoteItem objects
	 */
	public function getSupplierQuoteItemsJoinPort($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierQuoteItemQuery::create(null, $criteria);
		$query->joinWith('Port', $join_behavior);

		return $this->getSupplierQuoteItems($query, $con);
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
	 * If this SupplierQuote is new, it will return
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
					->filterBySupplierQuote($this)
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
					->filterBySupplierQuote($this)
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
			$l->setSupplierQuote($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierQuote is new, it will return
	 * an empty collection; or if this SupplierQuote has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuote.
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
	 * Otherwise if this SupplierQuote is new, it will return
	 * an empty collection; or if this SupplierQuote has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuote.
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
	 * Otherwise if this SupplierQuote is new, it will return
	 * an empty collection; or if this SupplierQuote has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuote.
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
	 * Otherwise if this SupplierQuote is new, it will return
	 * an empty collection; or if this SupplierQuote has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuote.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierPurchaseOrder[] List of SupplierPurchaseOrder objects
	 */
	public function getSupplierPurchaseOrdersJoinAffiliate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierPurchaseOrderQuery::create(null, $criteria);
		$query->joinWith('Affiliate', $join_behavior);

		return $this->getSupplierPurchaseOrders($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierQuote is new, it will return
	 * an empty collection; or if this SupplierQuote has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuote.
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
		$this->createdat = null;
		$this->supplierid = null;
		$this->status = null;
		$this->timestampstatus = null;
		$this->clientquoteid = null;
		$this->supplieraccesstoken = null;
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
			if ($this->collSupplierQuoteHistorys) {
				foreach ((array) $this->collSupplierQuoteHistorys as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierQuoteItems) {
				foreach ((array) $this->collSupplierQuoteItems as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierPurchaseOrders) {
				foreach ((array) $this->collSupplierPurchaseOrders as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collSupplierQuoteHistorys = null;
		$this->collSupplierQuoteItems = null;
		$this->collSupplierPurchaseOrders = null;
		$this->aClientQuote = null;
		$this->aSupplier = null;
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

} // BaseSupplierQuote
