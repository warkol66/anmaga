<?php


/**
 * Base class that represents a row from the 'import_supplierPurchaseOrder' table.
 *
 * Orden de Pedido a Proveedor
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseSupplierPurchaseOrder extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
  const PEER = 'SupplierPurchaseOrderPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SupplierPurchaseOrderPeer
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
	 * The value for the supplierquoteid field.
	 * @var        int
	 */
	protected $supplierquoteid;

	/**
	 * The value for the clientquoteid field.
	 * @var        int
	 */
	protected $clientquoteid;

	/**
	 * The value for the affiliateid field.
	 * @var        int
	 */
	protected $affiliateid;

	/**
	 * The value for the affiliateuserid field.
	 * @var        int
	 */
	protected $affiliateuserid;

	/**
	 * The value for the userid field.
	 * @var        int
	 */
	protected $userid;

	/**
	 * @var        SupplierQuote
	 */
	protected $aSupplierQuote;

	/**
	 * @var        ClientQuote
	 */
	protected $aClientQuote;

	/**
	 * @var        Supplier
	 */
	protected $aSupplier;

	/**
	 * @var        User
	 */
	protected $aUser;

	/**
	 * @var        Affiliate
	 */
	protected $aAffiliate;

	/**
	 * @var        AffiliateUser
	 */
	protected $aAffiliateUser;

	/**
	 * @var        array SupplierPurchaseOrderItem[] Collection to store aggregation of SupplierPurchaseOrderItem objects.
	 */
	protected $collSupplierPurchaseOrderItems;

	/**
	 * @var        array SupplierPurchaseOrderHistory[] Collection to store aggregation of SupplierPurchaseOrderHistory objects.
	 */
	protected $collSupplierPurchaseOrderHistorys;

	/**
	 * @var        array SupplierPurchaseOrderBankTransfer[] Collection to store aggregation of SupplierPurchaseOrderBankTransfer objects.
	 */
	protected $collSupplierPurchaseOrderBankTransfers;

	/**
	 * @var        array Shipment[] Collection to store aggregation of Shipment objects.
	 */
	protected $collShipments;

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
	 * Id de Orden de Pedido de Cliente
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
	 * Get the [supplierquoteid] column value.
	 * id de cotizacion de proveedor relacionada
	 * @return     int
	 */
	public function getSupplierquoteid()
	{
		return $this->supplierquoteid;
	}

	/**
	 * Get the [clientquoteid] column value.
	 * id de cotizacion a cliente relacionada
	 * @return     int
	 */
	public function getClientquoteid()
	{
		return $this->clientquoteid;
	}

	/**
	 * Get the [affiliateid] column value.
	 * Afiliado
	 * @return     int
	 */
	public function getAffiliateid()
	{
		return $this->affiliateid;
	}

	/**
	 * Get the [affiliateuserid] column value.
	 * usuario del afiliado si creo la cotizacion
	 * @return     int
	 */
	public function getAffiliateuserid()
	{
		return $this->affiliateuserid;
	}

	/**
	 * Get the [userid] column value.
	 * Usuario de anmaga si creo la cotizacion
	 * @return     int
	 */
	public function getUserid()
	{
		return $this->userid;
	}

	/**
	 * Set the value of [id] column.
	 * Id de Orden de Pedido de Cliente
	 * @param      int $v new value
	 * @return     SupplierPurchaseOrder The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Sets the value of [createdat] column to a normalized version of the date/time value specified.
	 * Creation date for
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     SupplierPurchaseOrder The current object (for fluent API support)
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
				$this->modifiedColumns[] = SupplierPurchaseOrderPeer::CREATEDAT;
			}
		} // if either are not null

		return $this;
	} // setCreatedat()

	/**
	 * Set the value of [supplierid] column.
	 * Supplier
	 * @param      int $v new value
	 * @return     SupplierPurchaseOrder The current object (for fluent API support)
	 */
	public function setSupplierid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->supplierid !== $v) {
			$this->supplierid = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderPeer::SUPPLIERID;
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
	 * @return     SupplierPurchaseOrder The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderPeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Sets the value of [timestampstatus] column to a normalized version of the date/time value specified.
	 * Fecha del ultimo cambio de status
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     SupplierPurchaseOrder The current object (for fluent API support)
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
				$this->modifiedColumns[] = SupplierPurchaseOrderPeer::TIMESTAMPSTATUS;
			}
		} // if either are not null

		return $this;
	} // setTimestampstatus()

	/**
	 * Set the value of [supplierquoteid] column.
	 * id de cotizacion de proveedor relacionada
	 * @param      int $v new value
	 * @return     SupplierPurchaseOrder The current object (for fluent API support)
	 */
	public function setSupplierquoteid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->supplierquoteid !== $v) {
			$this->supplierquoteid = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderPeer::SUPPLIERQUOTEID;
		}

		if ($this->aSupplierQuote !== null && $this->aSupplierQuote->getId() !== $v) {
			$this->aSupplierQuote = null;
		}

		return $this;
	} // setSupplierquoteid()

	/**
	 * Set the value of [clientquoteid] column.
	 * id de cotizacion a cliente relacionada
	 * @param      int $v new value
	 * @return     SupplierPurchaseOrder The current object (for fluent API support)
	 */
	public function setClientquoteid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->clientquoteid !== $v) {
			$this->clientquoteid = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderPeer::CLIENTQUOTEID;
		}

		if ($this->aClientQuote !== null && $this->aClientQuote->getId() !== $v) {
			$this->aClientQuote = null;
		}

		return $this;
	} // setClientquoteid()

	/**
	 * Set the value of [affiliateid] column.
	 * Afiliado
	 * @param      int $v new value
	 * @return     SupplierPurchaseOrder The current object (for fluent API support)
	 */
	public function setAffiliateid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->affiliateid !== $v) {
			$this->affiliateid = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderPeer::AFFILIATEID;
		}

		if ($this->aAffiliate !== null && $this->aAffiliate->getId() !== $v) {
			$this->aAffiliate = null;
		}

		return $this;
	} // setAffiliateid()

	/**
	 * Set the value of [affiliateuserid] column.
	 * usuario del afiliado si creo la cotizacion
	 * @param      int $v new value
	 * @return     SupplierPurchaseOrder The current object (for fluent API support)
	 */
	public function setAffiliateuserid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->affiliateuserid !== $v) {
			$this->affiliateuserid = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderPeer::AFFILIATEUSERID;
		}

		if ($this->aAffiliateUser !== null && $this->aAffiliateUser->getId() !== $v) {
			$this->aAffiliateUser = null;
		}

		return $this;
	} // setAffiliateuserid()

	/**
	 * Set the value of [userid] column.
	 * Usuario de anmaga si creo la cotizacion
	 * @param      int $v new value
	 * @return     SupplierPurchaseOrder The current object (for fluent API support)
	 */
	public function setUserid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->userid !== $v) {
			$this->userid = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderPeer::USERID;
		}

		if ($this->aUser !== null && $this->aUser->getId() !== $v) {
			$this->aUser = null;
		}

		return $this;
	} // setUserid()

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
			$this->supplierquoteid = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->clientquoteid = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->affiliateid = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->affiliateuserid = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->userid = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 10; // 10 = SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating SupplierPurchaseOrder object", $e);
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
		if ($this->aSupplierQuote !== null && $this->supplierquoteid !== $this->aSupplierQuote->getId()) {
			$this->aSupplierQuote = null;
		}
		if ($this->aClientQuote !== null && $this->clientquoteid !== $this->aClientQuote->getId()) {
			$this->aClientQuote = null;
		}
		if ($this->aAffiliate !== null && $this->affiliateid !== $this->aAffiliate->getId()) {
			$this->aAffiliate = null;
		}
		if ($this->aAffiliateUser !== null && $this->affiliateuserid !== $this->aAffiliateUser->getId()) {
			$this->aAffiliateUser = null;
		}
		if ($this->aUser !== null && $this->userid !== $this->aUser->getId()) {
			$this->aUser = null;
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
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SupplierPurchaseOrderPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aSupplierQuote = null;
			$this->aClientQuote = null;
			$this->aSupplier = null;
			$this->aUser = null;
			$this->aAffiliate = null;
			$this->aAffiliateUser = null;
			$this->collSupplierPurchaseOrderItems = null;

			$this->collSupplierPurchaseOrderHistorys = null;

			$this->collSupplierPurchaseOrderBankTransfers = null;

			$this->collShipments = null;

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
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				SupplierPurchaseOrderQuery::create()
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
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				SupplierPurchaseOrderPeer::addInstanceToPool($this);
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

			if ($this->aSupplierQuote !== null) {
				if ($this->aSupplierQuote->isModified() || $this->aSupplierQuote->isNew()) {
					$affectedRows += $this->aSupplierQuote->save($con);
				}
				$this->setSupplierQuote($this->aSupplierQuote);
			}

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

			if ($this->aUser !== null) {
				if ($this->aUser->isModified() || $this->aUser->isNew()) {
					$affectedRows += $this->aUser->save($con);
				}
				$this->setUser($this->aUser);
			}

			if ($this->aAffiliate !== null) {
				if ($this->aAffiliate->isModified() || $this->aAffiliate->isNew()) {
					$affectedRows += $this->aAffiliate->save($con);
				}
				$this->setAffiliate($this->aAffiliate);
			}

			if ($this->aAffiliateUser !== null) {
				if ($this->aAffiliateUser->isModified() || $this->aAffiliateUser->isNew()) {
					$affectedRows += $this->aAffiliateUser->save($con);
				}
				$this->setAffiliateUser($this->aAffiliateUser);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = SupplierPurchaseOrderPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(SupplierPurchaseOrderPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.SupplierPurchaseOrderPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += SupplierPurchaseOrderPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collSupplierPurchaseOrderItems !== null) {
				foreach ($this->collSupplierPurchaseOrderItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSupplierPurchaseOrderHistorys !== null) {
				foreach ($this->collSupplierPurchaseOrderHistorys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSupplierPurchaseOrderBankTransfers !== null) {
				foreach ($this->collSupplierPurchaseOrderBankTransfers as $referrerFK) {
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

			if ($this->aSupplierQuote !== null) {
				if (!$this->aSupplierQuote->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSupplierQuote->getValidationFailures());
				}
			}

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

			if ($this->aUser !== null) {
				if (!$this->aUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
				}
			}

			if ($this->aAffiliate !== null) {
				if (!$this->aAffiliate->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAffiliate->getValidationFailures());
				}
			}

			if ($this->aAffiliateUser !== null) {
				if (!$this->aAffiliateUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAffiliateUser->getValidationFailures());
				}
			}


			if (($retval = SupplierPurchaseOrderPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collSupplierPurchaseOrderItems !== null) {
					foreach ($this->collSupplierPurchaseOrderItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSupplierPurchaseOrderHistorys !== null) {
					foreach ($this->collSupplierPurchaseOrderHistorys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSupplierPurchaseOrderBankTransfers !== null) {
					foreach ($this->collSupplierPurchaseOrderBankTransfers as $referrerFK) {
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
		$pos = SupplierPurchaseOrderPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getSupplierquoteid();
				break;
			case 6:
				return $this->getClientquoteid();
				break;
			case 7:
				return $this->getAffiliateid();
				break;
			case 8:
				return $this->getAffiliateuserid();
				break;
			case 9:
				return $this->getUserid();
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
		$keys = SupplierPurchaseOrderPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCreatedat(),
			$keys[2] => $this->getSupplierid(),
			$keys[3] => $this->getStatus(),
			$keys[4] => $this->getTimestampstatus(),
			$keys[5] => $this->getSupplierquoteid(),
			$keys[6] => $this->getClientquoteid(),
			$keys[7] => $this->getAffiliateid(),
			$keys[8] => $this->getAffiliateuserid(),
			$keys[9] => $this->getUserid(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aSupplierQuote) {
				$result['SupplierQuote'] = $this->aSupplierQuote->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aClientQuote) {
				$result['ClientQuote'] = $this->aClientQuote->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aSupplier) {
				$result['Supplier'] = $this->aSupplier->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aUser) {
				$result['User'] = $this->aUser->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aAffiliate) {
				$result['Affiliate'] = $this->aAffiliate->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aAffiliateUser) {
				$result['AffiliateUser'] = $this->aAffiliateUser->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = SupplierPurchaseOrderPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setSupplierquoteid($value);
				break;
			case 6:
				$this->setClientquoteid($value);
				break;
			case 7:
				$this->setAffiliateid($value);
				break;
			case 8:
				$this->setAffiliateuserid($value);
				break;
			case 9:
				$this->setUserid($value);
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
		$keys = SupplierPurchaseOrderPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCreatedat($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSupplierid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStatus($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTimestampstatus($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSupplierquoteid($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setClientquoteid($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAffiliateid($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAffiliateuserid($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUserid($arr[$keys[9]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SupplierPurchaseOrderPeer::DATABASE_NAME);

		if ($this->isColumnModified(SupplierPurchaseOrderPeer::ID)) $criteria->add(SupplierPurchaseOrderPeer::ID, $this->id);
		if ($this->isColumnModified(SupplierPurchaseOrderPeer::CREATEDAT)) $criteria->add(SupplierPurchaseOrderPeer::CREATEDAT, $this->createdat);
		if ($this->isColumnModified(SupplierPurchaseOrderPeer::SUPPLIERID)) $criteria->add(SupplierPurchaseOrderPeer::SUPPLIERID, $this->supplierid);
		if ($this->isColumnModified(SupplierPurchaseOrderPeer::STATUS)) $criteria->add(SupplierPurchaseOrderPeer::STATUS, $this->status);
		if ($this->isColumnModified(SupplierPurchaseOrderPeer::TIMESTAMPSTATUS)) $criteria->add(SupplierPurchaseOrderPeer::TIMESTAMPSTATUS, $this->timestampstatus);
		if ($this->isColumnModified(SupplierPurchaseOrderPeer::SUPPLIERQUOTEID)) $criteria->add(SupplierPurchaseOrderPeer::SUPPLIERQUOTEID, $this->supplierquoteid);
		if ($this->isColumnModified(SupplierPurchaseOrderPeer::CLIENTQUOTEID)) $criteria->add(SupplierPurchaseOrderPeer::CLIENTQUOTEID, $this->clientquoteid);
		if ($this->isColumnModified(SupplierPurchaseOrderPeer::AFFILIATEID)) $criteria->add(SupplierPurchaseOrderPeer::AFFILIATEID, $this->affiliateid);
		if ($this->isColumnModified(SupplierPurchaseOrderPeer::AFFILIATEUSERID)) $criteria->add(SupplierPurchaseOrderPeer::AFFILIATEUSERID, $this->affiliateuserid);
		if ($this->isColumnModified(SupplierPurchaseOrderPeer::USERID)) $criteria->add(SupplierPurchaseOrderPeer::USERID, $this->userid);

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
		$criteria = new Criteria(SupplierPurchaseOrderPeer::DATABASE_NAME);
		$criteria->add(SupplierPurchaseOrderPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of SupplierPurchaseOrder (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setCreatedat($this->createdat);
		$copyObj->setSupplierid($this->supplierid);
		$copyObj->setStatus($this->status);
		$copyObj->setTimestampstatus($this->timestampstatus);
		$copyObj->setSupplierquoteid($this->supplierquoteid);
		$copyObj->setClientquoteid($this->clientquoteid);
		$copyObj->setAffiliateid($this->affiliateid);
		$copyObj->setAffiliateuserid($this->affiliateuserid);
		$copyObj->setUserid($this->userid);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getSupplierPurchaseOrderItems() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierPurchaseOrderItem($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierPurchaseOrderHistorys() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierPurchaseOrderHistory($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierPurchaseOrderBankTransfers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierPurchaseOrderBankTransfer($relObj->copy($deepCopy));
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
	 * @return     SupplierPurchaseOrder Clone of current object.
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
	 * @return     SupplierPurchaseOrderPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SupplierPurchaseOrderPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a SupplierQuote object.
	 *
	 * @param      SupplierQuote $v
	 * @return     SupplierPurchaseOrder The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSupplierQuote(SupplierQuote $v = null)
	{
		if ($v === null) {
			$this->setSupplierquoteid(NULL);
		} else {
			$this->setSupplierquoteid($v->getId());
		}

		$this->aSupplierQuote = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SupplierQuote object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplierPurchaseOrder($this);
		}

		return $this;
	}


	/**
	 * Get the associated SupplierQuote object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     SupplierQuote The associated SupplierQuote object.
	 * @throws     PropelException
	 */
	public function getSupplierQuote(PropelPDO $con = null)
	{
		if ($this->aSupplierQuote === null && ($this->supplierquoteid !== null)) {
			$this->aSupplierQuote = SupplierQuoteQuery::create()->findPk($this->supplierquoteid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aSupplierQuote->addSupplierPurchaseOrders($this);
			 */
		}
		return $this->aSupplierQuote;
	}

	/**
	 * Declares an association between this object and a ClientQuote object.
	 *
	 * @param      ClientQuote $v
	 * @return     SupplierPurchaseOrder The current object (for fluent API support)
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
			$v->addSupplierPurchaseOrder($this);
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
			   $this->aClientQuote->addSupplierPurchaseOrders($this);
			 */
		}
		return $this->aClientQuote;
	}

	/**
	 * Declares an association between this object and a Supplier object.
	 *
	 * @param      Supplier $v
	 * @return     SupplierPurchaseOrder The current object (for fluent API support)
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
			$v->addSupplierPurchaseOrder($this);
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
			   $this->aSupplier->addSupplierPurchaseOrders($this);
			 */
		}
		return $this->aSupplier;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     SupplierPurchaseOrder The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUser(User $v = null)
	{
		if ($v === null) {
			$this->setUserid(NULL);
		} else {
			$this->setUserid($v->getId());
		}

		$this->aUser = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the User object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplierPurchaseOrder($this);
		}

		return $this;
	}


	/**
	 * Get the associated User object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     User The associated User object.
	 * @throws     PropelException
	 */
	public function getUser(PropelPDO $con = null)
	{
		if ($this->aUser === null && ($this->userid !== null)) {
			$this->aUser = UserQuery::create()->findPk($this->userid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aUser->addSupplierPurchaseOrders($this);
			 */
		}
		return $this->aUser;
	}

	/**
	 * Declares an association between this object and a Affiliate object.
	 *
	 * @param      Affiliate $v
	 * @return     SupplierPurchaseOrder The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setAffiliate(Affiliate $v = null)
	{
		if ($v === null) {
			$this->setAffiliateid(NULL);
		} else {
			$this->setAffiliateid($v->getId());
		}

		$this->aAffiliate = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Affiliate object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplierPurchaseOrder($this);
		}

		return $this;
	}


	/**
	 * Get the associated Affiliate object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Affiliate The associated Affiliate object.
	 * @throws     PropelException
	 */
	public function getAffiliate(PropelPDO $con = null)
	{
		if ($this->aAffiliate === null && ($this->affiliateid !== null)) {
			$this->aAffiliate = AffiliateQuery::create()->findPk($this->affiliateid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aAffiliate->addSupplierPurchaseOrders($this);
			 */
		}
		return $this->aAffiliate;
	}

	/**
	 * Declares an association between this object and a AffiliateUser object.
	 *
	 * @param      AffiliateUser $v
	 * @return     SupplierPurchaseOrder The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setAffiliateUser(AffiliateUser $v = null)
	{
		if ($v === null) {
			$this->setAffiliateuserid(NULL);
		} else {
			$this->setAffiliateuserid($v->getId());
		}

		$this->aAffiliateUser = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the AffiliateUser object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplierPurchaseOrder($this);
		}

		return $this;
	}


	/**
	 * Get the associated AffiliateUser object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     AffiliateUser The associated AffiliateUser object.
	 * @throws     PropelException
	 */
	public function getAffiliateUser(PropelPDO $con = null)
	{
		if ($this->aAffiliateUser === null && ($this->affiliateuserid !== null)) {
			$this->aAffiliateUser = AffiliateUserQuery::create()->findPk($this->affiliateuserid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aAffiliateUser->addSupplierPurchaseOrders($this);
			 */
		}
		return $this->aAffiliateUser;
	}

	/**
	 * Clears out the collSupplierPurchaseOrderItems collection
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
	 * Initializes the collSupplierPurchaseOrderItems collection.
	 *
	 * By default this just sets the collSupplierPurchaseOrderItems collection to an empty array (like clearcollSupplierPurchaseOrderItems());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierPurchaseOrderItems()
	{
		$this->collSupplierPurchaseOrderItems = new PropelObjectCollection();
		$this->collSupplierPurchaseOrderItems->setModel('SupplierPurchaseOrderItem');
	}

	/**
	 * Gets an array of SupplierPurchaseOrderItem objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SupplierPurchaseOrder is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SupplierPurchaseOrderItem[] List of SupplierPurchaseOrderItem objects
	 * @throws     PropelException
	 */
	public function getSupplierPurchaseOrderItems($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSupplierPurchaseOrderItems || null !== $criteria) {
			if ($this->isNew() && null === $this->collSupplierPurchaseOrderItems) {
				// return empty collection
				$this->initSupplierPurchaseOrderItems();
			} else {
				$collSupplierPurchaseOrderItems = SupplierPurchaseOrderItemQuery::create(null, $criteria)
					->filterBySupplierPurchaseOrder($this)
					->find($con);
				if (null !== $criteria) {
					return $collSupplierPurchaseOrderItems;
				}
				$this->collSupplierPurchaseOrderItems = $collSupplierPurchaseOrderItems;
			}
		}
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
		if(null === $this->collSupplierPurchaseOrderItems || null !== $criteria) {
			if ($this->isNew() && null === $this->collSupplierPurchaseOrderItems) {
				return 0;
			} else {
				$query = SupplierPurchaseOrderItemQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBySupplierPurchaseOrder($this)
					->count($con);
			}
		} else {
			return count($this->collSupplierPurchaseOrderItems);
		}
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
		if (!$this->collSupplierPurchaseOrderItems->contains($l)) { // only add it if the **same** object is not already associated
			$this->collSupplierPurchaseOrderItems[]= $l;
			$l->setSupplierPurchaseOrder($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierPurchaseOrder is new, it will return
	 * an empty collection; or if this SupplierPurchaseOrder has previously
	 * been saved, it will retrieve related SupplierPurchaseOrderItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierPurchaseOrder.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierPurchaseOrderItem[] List of SupplierPurchaseOrderItem objects
	 */
	public function getSupplierPurchaseOrderItemsJoinProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierPurchaseOrderItemQuery::create(null, $criteria);
		$query->joinWith('Product', $join_behavior);

		return $this->getSupplierPurchaseOrderItems($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierPurchaseOrder is new, it will return
	 * an empty collection; or if this SupplierPurchaseOrder has previously
	 * been saved, it will retrieve related SupplierPurchaseOrderItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierPurchaseOrder.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierPurchaseOrderItem[] List of SupplierPurchaseOrderItem objects
	 */
	public function getSupplierPurchaseOrderItemsJoinIncoterm($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierPurchaseOrderItemQuery::create(null, $criteria);
		$query->joinWith('Incoterm', $join_behavior);

		return $this->getSupplierPurchaseOrderItems($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierPurchaseOrder is new, it will return
	 * an empty collection; or if this SupplierPurchaseOrder has previously
	 * been saved, it will retrieve related SupplierPurchaseOrderItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierPurchaseOrder.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierPurchaseOrderItem[] List of SupplierPurchaseOrderItem objects
	 */
	public function getSupplierPurchaseOrderItemsJoinPort($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierPurchaseOrderItemQuery::create(null, $criteria);
		$query->joinWith('Port', $join_behavior);

		return $this->getSupplierPurchaseOrderItems($query, $con);
	}

	/**
	 * Clears out the collSupplierPurchaseOrderHistorys collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSupplierPurchaseOrderHistorys()
	 */
	public function clearSupplierPurchaseOrderHistorys()
	{
		$this->collSupplierPurchaseOrderHistorys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSupplierPurchaseOrderHistorys collection.
	 *
	 * By default this just sets the collSupplierPurchaseOrderHistorys collection to an empty array (like clearcollSupplierPurchaseOrderHistorys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierPurchaseOrderHistorys()
	{
		$this->collSupplierPurchaseOrderHistorys = new PropelObjectCollection();
		$this->collSupplierPurchaseOrderHistorys->setModel('SupplierPurchaseOrderHistory');
	}

	/**
	 * Gets an array of SupplierPurchaseOrderHistory objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SupplierPurchaseOrder is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SupplierPurchaseOrderHistory[] List of SupplierPurchaseOrderHistory objects
	 * @throws     PropelException
	 */
	public function getSupplierPurchaseOrderHistorys($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSupplierPurchaseOrderHistorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collSupplierPurchaseOrderHistorys) {
				// return empty collection
				$this->initSupplierPurchaseOrderHistorys();
			} else {
				$collSupplierPurchaseOrderHistorys = SupplierPurchaseOrderHistoryQuery::create(null, $criteria)
					->filterBySupplierPurchaseOrder($this)
					->find($con);
				if (null !== $criteria) {
					return $collSupplierPurchaseOrderHistorys;
				}
				$this->collSupplierPurchaseOrderHistorys = $collSupplierPurchaseOrderHistorys;
			}
		}
		return $this->collSupplierPurchaseOrderHistorys;
	}

	/**
	 * Returns the number of related SupplierPurchaseOrderHistory objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SupplierPurchaseOrderHistory objects.
	 * @throws     PropelException
	 */
	public function countSupplierPurchaseOrderHistorys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSupplierPurchaseOrderHistorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collSupplierPurchaseOrderHistorys) {
				return 0;
			} else {
				$query = SupplierPurchaseOrderHistoryQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBySupplierPurchaseOrder($this)
					->count($con);
			}
		} else {
			return count($this->collSupplierPurchaseOrderHistorys);
		}
	}

	/**
	 * Method called to associate a SupplierPurchaseOrderHistory object to this object
	 * through the SupplierPurchaseOrderHistory foreign key attribute.
	 *
	 * @param      SupplierPurchaseOrderHistory $l SupplierPurchaseOrderHistory
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSupplierPurchaseOrderHistory(SupplierPurchaseOrderHistory $l)
	{
		if ($this->collSupplierPurchaseOrderHistorys === null) {
			$this->initSupplierPurchaseOrderHistorys();
		}
		if (!$this->collSupplierPurchaseOrderHistorys->contains($l)) { // only add it if the **same** object is not already associated
			$this->collSupplierPurchaseOrderHistorys[]= $l;
			$l->setSupplierPurchaseOrder($this);
		}
	}

	/**
	 * Clears out the collSupplierPurchaseOrderBankTransfers collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSupplierPurchaseOrderBankTransfers()
	 */
	public function clearSupplierPurchaseOrderBankTransfers()
	{
		$this->collSupplierPurchaseOrderBankTransfers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSupplierPurchaseOrderBankTransfers collection.
	 *
	 * By default this just sets the collSupplierPurchaseOrderBankTransfers collection to an empty array (like clearcollSupplierPurchaseOrderBankTransfers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierPurchaseOrderBankTransfers()
	{
		$this->collSupplierPurchaseOrderBankTransfers = new PropelObjectCollection();
		$this->collSupplierPurchaseOrderBankTransfers->setModel('SupplierPurchaseOrderBankTransfer');
	}

	/**
	 * Gets an array of SupplierPurchaseOrderBankTransfer objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SupplierPurchaseOrder is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SupplierPurchaseOrderBankTransfer[] List of SupplierPurchaseOrderBankTransfer objects
	 * @throws     PropelException
	 */
	public function getSupplierPurchaseOrderBankTransfers($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSupplierPurchaseOrderBankTransfers || null !== $criteria) {
			if ($this->isNew() && null === $this->collSupplierPurchaseOrderBankTransfers) {
				// return empty collection
				$this->initSupplierPurchaseOrderBankTransfers();
			} else {
				$collSupplierPurchaseOrderBankTransfers = SupplierPurchaseOrderBankTransferQuery::create(null, $criteria)
					->filterBySupplierPurchaseOrder($this)
					->find($con);
				if (null !== $criteria) {
					return $collSupplierPurchaseOrderBankTransfers;
				}
				$this->collSupplierPurchaseOrderBankTransfers = $collSupplierPurchaseOrderBankTransfers;
			}
		}
		return $this->collSupplierPurchaseOrderBankTransfers;
	}

	/**
	 * Returns the number of related SupplierPurchaseOrderBankTransfer objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SupplierPurchaseOrderBankTransfer objects.
	 * @throws     PropelException
	 */
	public function countSupplierPurchaseOrderBankTransfers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSupplierPurchaseOrderBankTransfers || null !== $criteria) {
			if ($this->isNew() && null === $this->collSupplierPurchaseOrderBankTransfers) {
				return 0;
			} else {
				$query = SupplierPurchaseOrderBankTransferQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBySupplierPurchaseOrder($this)
					->count($con);
			}
		} else {
			return count($this->collSupplierPurchaseOrderBankTransfers);
		}
	}

	/**
	 * Method called to associate a SupplierPurchaseOrderBankTransfer object to this object
	 * through the SupplierPurchaseOrderBankTransfer foreign key attribute.
	 *
	 * @param      SupplierPurchaseOrderBankTransfer $l SupplierPurchaseOrderBankTransfer
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSupplierPurchaseOrderBankTransfer(SupplierPurchaseOrderBankTransfer $l)
	{
		if ($this->collSupplierPurchaseOrderBankTransfers === null) {
			$this->initSupplierPurchaseOrderBankTransfers();
		}
		if (!$this->collSupplierPurchaseOrderBankTransfers->contains($l)) { // only add it if the **same** object is not already associated
			$this->collSupplierPurchaseOrderBankTransfers[]= $l;
			$l->setSupplierPurchaseOrder($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierPurchaseOrder is new, it will return
	 * an empty collection; or if this SupplierPurchaseOrder has previously
	 * been saved, it will retrieve related SupplierPurchaseOrderBankTransfers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierPurchaseOrder.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierPurchaseOrderBankTransfer[] List of SupplierPurchaseOrderBankTransfer objects
	 */
	public function getSupplierPurchaseOrderBankTransfersJoinBankAccount($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierPurchaseOrderBankTransferQuery::create(null, $criteria);
		$query->joinWith('BankAccount', $join_behavior);

		return $this->getSupplierPurchaseOrderBankTransfers($query, $con);
	}

	/**
	 * Clears out the collShipments collection
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
	 * Initializes the collShipments collection.
	 *
	 * By default this just sets the collShipments collection to an empty array (like clearcollShipments());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initShipments()
	{
		$this->collShipments = new PropelObjectCollection();
		$this->collShipments->setModel('Shipment');
	}

	/**
	 * Gets an array of Shipment objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SupplierPurchaseOrder is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Shipment[] List of Shipment objects
	 * @throws     PropelException
	 */
	public function getShipments($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collShipments || null !== $criteria) {
			if ($this->isNew() && null === $this->collShipments) {
				// return empty collection
				$this->initShipments();
			} else {
				$collShipments = ShipmentQuery::create(null, $criteria)
					->filterBySupplierPurchaseOrder($this)
					->find($con);
				if (null !== $criteria) {
					return $collShipments;
				}
				$this->collShipments = $collShipments;
			}
		}
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
		if(null === $this->collShipments || null !== $criteria) {
			if ($this->isNew() && null === $this->collShipments) {
				return 0;
			} else {
				$query = ShipmentQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBySupplierPurchaseOrder($this)
					->count($con);
			}
		} else {
			return count($this->collShipments);
		}
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
		if (!$this->collShipments->contains($l)) { // only add it if the **same** object is not already associated
			$this->collShipments[]= $l;
			$l->setSupplierPurchaseOrder($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierPurchaseOrder is new, it will return
	 * an empty collection; or if this SupplierPurchaseOrder has previously
	 * been saved, it will retrieve related Shipments from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierPurchaseOrder.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Shipment[] List of Shipment objects
	 */
	public function getShipmentsJoinSupplier($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ShipmentQuery::create(null, $criteria);
		$query->joinWith('Supplier', $join_behavior);

		return $this->getShipments($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierPurchaseOrder is new, it will return
	 * an empty collection; or if this SupplierPurchaseOrder has previously
	 * been saved, it will retrieve related Shipments from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierPurchaseOrder.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Shipment[] List of Shipment objects
	 */
	public function getShipmentsJoinAffiliate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ShipmentQuery::create(null, $criteria);
		$query->joinWith('Affiliate', $join_behavior);

		return $this->getShipments($query, $con);
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
		$this->supplierquoteid = null;
		$this->clientquoteid = null;
		$this->affiliateid = null;
		$this->affiliateuserid = null;
		$this->userid = null;
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
			if ($this->collSupplierPurchaseOrderItems) {
				foreach ((array) $this->collSupplierPurchaseOrderItems as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierPurchaseOrderHistorys) {
				foreach ((array) $this->collSupplierPurchaseOrderHistorys as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierPurchaseOrderBankTransfers) {
				foreach ((array) $this->collSupplierPurchaseOrderBankTransfers as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collShipments) {
				foreach ((array) $this->collShipments as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collSupplierPurchaseOrderItems = null;
		$this->collSupplierPurchaseOrderHistorys = null;
		$this->collSupplierPurchaseOrderBankTransfers = null;
		$this->collShipments = null;
		$this->aSupplierQuote = null;
		$this->aClientQuote = null;
		$this->aSupplier = null;
		$this->aUser = null;
		$this->aAffiliate = null;
		$this->aAffiliateUser = null;
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

} // BaseSupplierPurchaseOrder
