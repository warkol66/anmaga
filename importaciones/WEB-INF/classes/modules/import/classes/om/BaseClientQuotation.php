<?php

/**
 * Base class that represents a row from the 'import_clientQuotation' table.
 *
 * Cotizacion a Cliente
 *
 * @package    import.classes.om
 */
abstract class BaseClientQuotation extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ClientQuotationPeer
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
	 * @var        array ClientQuotationHistory[] Collection to store aggregation of ClientQuotationHistory objects.
	 */
	protected $collClientQuotationHistorys;

	/**
	 * @var        Criteria The criteria used to select the current contents of collClientQuotationHistorys.
	 */
	private $lastClientQuotationHistoryCriteria = null;

	/**
	 * @var        array ClientQuotationItem[] Collection to store aggregation of ClientQuotationItem objects.
	 */
	protected $collClientQuotationItems;

	/**
	 * @var        Criteria The criteria used to select the current contents of collClientQuotationItems.
	 */
	private $lastClientQuotationItemCriteria = null;

	/**
	 * @var        array SupplierQuotation[] Collection to store aggregation of SupplierQuotation objects.
	 */
	protected $collSupplierQuotations;

	/**
	 * @var        Criteria The criteria used to select the current contents of collSupplierQuotations.
	 */
	private $lastSupplierQuotationCriteria = null;

	/**
	 * @var        array ClientPurchaseOrder[] Collection to store aggregation of ClientPurchaseOrder objects.
	 */
	protected $collClientPurchaseOrders;

	/**
	 * @var        Criteria The criteria used to select the current contents of collClientPurchaseOrders.
	 */
	private $lastClientPurchaseOrderCriteria = null;

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
	 * Initializes internal state of BaseClientQuotation object.
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
	 * Id de cotizacion de cliente
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
	 * Set the value of [id] column.
	 * Id de cotizacion de cliente
	 * @param      int $v new value
	 * @return     ClientQuotation The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ClientQuotationPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Sets the value of [createdat] column to a normalized version of the date/time value specified.
	 * Creation date for
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     ClientQuotation The current object (for fluent API support)
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
				$this->modifiedColumns[] = ClientQuotationPeer::CREATEDAT;
			}
		} // if either are not null

		return $this;
	} // setCreatedat()

	/**
	 * Set the value of [affiliateid] column.
	 * Afiliado
	 * @param      int $v new value
	 * @return     ClientQuotation The current object (for fluent API support)
	 */
	public function setAffiliateid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->affiliateid !== $v) {
			$this->affiliateid = $v;
			$this->modifiedColumns[] = ClientQuotationPeer::AFFILIATEID;
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
	 * @return     ClientQuotation The current object (for fluent API support)
	 */
	public function setAffiliateuserid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->affiliateuserid !== $v) {
			$this->affiliateuserid = $v;
			$this->modifiedColumns[] = ClientQuotationPeer::AFFILIATEUSERID;
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
	 * @return     ClientQuotation The current object (for fluent API support)
	 */
	public function setUserid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->userid !== $v) {
			$this->userid = $v;
			$this->modifiedColumns[] = ClientQuotationPeer::USERID;
		}

		if ($this->aUser !== null && $this->aUser->getId() !== $v) {
			$this->aUser = null;
		}

		return $this;
	} // setUserid()

	/**
	 * Set the value of [status] column.
	 * Status de Cotizacion
	 * @param      int $v new value
	 * @return     ClientQuotation The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = ClientQuotationPeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Sets the value of [timestampstatus] column to a normalized version of the date/time value specified.
	 * Fecha del ultimo cambio de status
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     ClientQuotation The current object (for fluent API support)
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
				$this->modifiedColumns[] = ClientQuotationPeer::TIMESTAMPSTATUS;
			}
		} // if either are not null

		return $this;
	} // setTimestampstatus()

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
			$this->affiliateid = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->affiliateuserid = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->userid = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->status = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->timestampstatus = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 7; // 7 = ClientQuotationPeer::NUM_COLUMNS - ClientQuotationPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating ClientQuotation object", $e);
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
			$con = Propel::getConnection(ClientQuotationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ClientQuotationPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aUser = null;
			$this->aAffiliate = null;
			$this->aAffiliateUser = null;
			$this->collClientQuotationHistorys = null;
			$this->lastClientQuotationHistoryCriteria = null;

			$this->collClientQuotationItems = null;
			$this->lastClientQuotationItemCriteria = null;

			$this->collSupplierQuotations = null;
			$this->lastSupplierQuotationCriteria = null;

			$this->collClientPurchaseOrders = null;
			$this->lastClientPurchaseOrderCriteria = null;

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
			$con = Propel::getConnection(ClientQuotationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			ClientQuotationPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ClientQuotationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			ClientQuotationPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = ClientQuotationPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ClientQuotationPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ClientQuotationPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collClientQuotationHistorys !== null) {
				foreach ($this->collClientQuotationHistorys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collClientQuotationItems !== null) {
				foreach ($this->collClientQuotationItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSupplierQuotations !== null) {
				foreach ($this->collSupplierQuotations as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collClientPurchaseOrders !== null) {
				foreach ($this->collClientPurchaseOrders as $referrerFK) {
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


			if (($retval = ClientQuotationPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collClientQuotationHistorys !== null) {
					foreach ($this->collClientQuotationHistorys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClientQuotationItems !== null) {
					foreach ($this->collClientQuotationItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSupplierQuotations !== null) {
					foreach ($this->collSupplierQuotations as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClientPurchaseOrders !== null) {
					foreach ($this->collClientPurchaseOrders as $referrerFK) {
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
		$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);

		if ($this->isColumnModified(ClientQuotationPeer::ID)) $criteria->add(ClientQuotationPeer::ID, $this->id);
		if ($this->isColumnModified(ClientQuotationPeer::CREATEDAT)) $criteria->add(ClientQuotationPeer::CREATEDAT, $this->createdat);
		if ($this->isColumnModified(ClientQuotationPeer::AFFILIATEID)) $criteria->add(ClientQuotationPeer::AFFILIATEID, $this->affiliateid);
		if ($this->isColumnModified(ClientQuotationPeer::AFFILIATEUSERID)) $criteria->add(ClientQuotationPeer::AFFILIATEUSERID, $this->affiliateuserid);
		if ($this->isColumnModified(ClientQuotationPeer::USERID)) $criteria->add(ClientQuotationPeer::USERID, $this->userid);
		if ($this->isColumnModified(ClientQuotationPeer::STATUS)) $criteria->add(ClientQuotationPeer::STATUS, $this->status);
		if ($this->isColumnModified(ClientQuotationPeer::TIMESTAMPSTATUS)) $criteria->add(ClientQuotationPeer::TIMESTAMPSTATUS, $this->timestampstatus);

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
		$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);

		$criteria->add(ClientQuotationPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of ClientQuotation (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCreatedat($this->createdat);

		$copyObj->setAffiliateid($this->affiliateid);

		$copyObj->setAffiliateuserid($this->affiliateuserid);

		$copyObj->setUserid($this->userid);

		$copyObj->setStatus($this->status);

		$copyObj->setTimestampstatus($this->timestampstatus);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getClientQuotationHistorys() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClientQuotationHistory($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClientQuotationItems() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClientQuotationItem($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierQuotations() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierQuotation($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClientPurchaseOrders() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClientPurchaseOrder($relObj->copy($deepCopy));
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
	 * @return     ClientQuotation Clone of current object.
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
	 * @return     ClientQuotationPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ClientQuotationPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     ClientQuotation The current object (for fluent API support)
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
			$v->addClientQuotation($this);
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
			$this->aUser = UserPeer::retrieveByPK($this->userid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aUser->addClientQuotations($this);
			 */
		}
		return $this->aUser;
	}

	/**
	 * Declares an association between this object and a Affiliate object.
	 *
	 * @param      Affiliate $v
	 * @return     ClientQuotation The current object (for fluent API support)
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
			$v->addClientQuotation($this);
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
			$this->aAffiliate = AffiliatePeer::retrieveByPK($this->affiliateid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aAffiliate->addClientQuotations($this);
			 */
		}
		return $this->aAffiliate;
	}

	/**
	 * Declares an association between this object and a AffiliateUser object.
	 *
	 * @param      AffiliateUser $v
	 * @return     ClientQuotation The current object (for fluent API support)
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
			$v->addClientQuotation($this);
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
			$this->aAffiliateUser = AffiliateUserPeer::retrieveByPK($this->affiliateuserid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aAffiliateUser->addClientQuotations($this);
			 */
		}
		return $this->aAffiliateUser;
	}

	/**
	 * Clears out the collClientQuotationHistorys collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClientQuotationHistorys()
	 */
	public function clearClientQuotationHistorys()
	{
		$this->collClientQuotationHistorys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClientQuotationHistorys collection (array).
	 *
	 * By default this just sets the collClientQuotationHistorys collection to an empty array (like clearcollClientQuotationHistorys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClientQuotationHistorys()
	{
		$this->collClientQuotationHistorys = array();
	}

	/**
	 * Gets an array of ClientQuotationHistory objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this ClientQuotation has previously been saved, it will retrieve
	 * related ClientQuotationHistorys from storage. If this ClientQuotation is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ClientQuotationHistory[]
	 * @throws     PropelException
	 */
	public function getClientQuotationHistorys($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientQuotationHistorys === null) {
			if ($this->isNew()) {
			   $this->collClientQuotationHistorys = array();
			} else {

				$criteria->add(ClientQuotationHistoryPeer::CLIENTQUOTATIONID, $this->id);

				ClientQuotationHistoryPeer::addSelectColumns($criteria);
				$this->collClientQuotationHistorys = ClientQuotationHistoryPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ClientQuotationHistoryPeer::CLIENTQUOTATIONID, $this->id);

				ClientQuotationHistoryPeer::addSelectColumns($criteria);
				if (!isset($this->lastClientQuotationHistoryCriteria) || !$this->lastClientQuotationHistoryCriteria->equals($criteria)) {
					$this->collClientQuotationHistorys = ClientQuotationHistoryPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastClientQuotationHistoryCriteria = $criteria;
		return $this->collClientQuotationHistorys;
	}

	/**
	 * Returns the number of related ClientQuotationHistory objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ClientQuotationHistory objects.
	 * @throws     PropelException
	 */
	public function countClientQuotationHistorys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collClientQuotationHistorys === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ClientQuotationHistoryPeer::CLIENTQUOTATIONID, $this->id);

				$count = ClientQuotationHistoryPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ClientQuotationHistoryPeer::CLIENTQUOTATIONID, $this->id);

				if (!isset($this->lastClientQuotationHistoryCriteria) || !$this->lastClientQuotationHistoryCriteria->equals($criteria)) {
					$count = ClientQuotationHistoryPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collClientQuotationHistorys);
				}
			} else {
				$count = count($this->collClientQuotationHistorys);
			}
		}
		$this->lastClientQuotationHistoryCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a ClientQuotationHistory object to this object
	 * through the ClientQuotationHistory foreign key attribute.
	 *
	 * @param      ClientQuotationHistory $l ClientQuotationHistory
	 * @return     void
	 * @throws     PropelException
	 */
	public function addClientQuotationHistory(ClientQuotationHistory $l)
	{
		if ($this->collClientQuotationHistorys === null) {
			$this->initClientQuotationHistorys();
		}
		if (!in_array($l, $this->collClientQuotationHistorys, true)) { // only add it if the **same** object is not already associated
			array_push($this->collClientQuotationHistorys, $l);
			$l->setClientQuotation($this);
		}
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
	 * Otherwise if this ClientQuotation has previously been saved, it will retrieve
	 * related ClientQuotationItems from storage. If this ClientQuotation is new, it will return
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
			$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientQuotationItems === null) {
			if ($this->isNew()) {
			   $this->collClientQuotationItems = array();
			} else {

				$criteria->add(ClientQuotationItemPeer::CLIENTQUOTATIONID, $this->id);

				ClientQuotationItemPeer::addSelectColumns($criteria);
				$this->collClientQuotationItems = ClientQuotationItemPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ClientQuotationItemPeer::CLIENTQUOTATIONID, $this->id);

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
			$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);
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

				$criteria->add(ClientQuotationItemPeer::CLIENTQUOTATIONID, $this->id);

				$count = ClientQuotationItemPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ClientQuotationItemPeer::CLIENTQUOTATIONID, $this->id);

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
			$l->setClientQuotation($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ClientQuotation is new, it will return
	 * an empty collection; or if this ClientQuotation has previously
	 * been saved, it will retrieve related ClientQuotationItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ClientQuotation.
	 */
	public function getClientQuotationItemsJoinProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientQuotationItems === null) {
			if ($this->isNew()) {
				$this->collClientQuotationItems = array();
			} else {

				$criteria->add(ClientQuotationItemPeer::CLIENTQUOTATIONID, $this->id);

				$this->collClientQuotationItems = ClientQuotationItemPeer::doSelectJoinProduct($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientQuotationItemPeer::CLIENTQUOTATIONID, $this->id);

			if (!isset($this->lastClientQuotationItemCriteria) || !$this->lastClientQuotationItemCriteria->equals($criteria)) {
				$this->collClientQuotationItems = ClientQuotationItemPeer::doSelectJoinProduct($criteria, $con, $join_behavior);
			}
		}
		$this->lastClientQuotationItemCriteria = $criteria;

		return $this->collClientQuotationItems;
	}

	/**
	 * Clears out the collSupplierQuotations collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSupplierQuotations()
	 */
	public function clearSupplierQuotations()
	{
		$this->collSupplierQuotations = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSupplierQuotations collection (array).
	 *
	 * By default this just sets the collSupplierQuotations collection to an empty array (like clearcollSupplierQuotations());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierQuotations()
	{
		$this->collSupplierQuotations = array();
	}

	/**
	 * Gets an array of SupplierQuotation objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this ClientQuotation has previously been saved, it will retrieve
	 * related SupplierQuotations from storage. If this ClientQuotation is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array SupplierQuotation[]
	 * @throws     PropelException
	 */
	public function getSupplierQuotations($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotations === null) {
			if ($this->isNew()) {
			   $this->collSupplierQuotations = array();
			} else {

				$criteria->add(SupplierQuotationPeer::CLIENTQUOTATIONID, $this->id);

				SupplierQuotationPeer::addSelectColumns($criteria);
				$this->collSupplierQuotations = SupplierQuotationPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(SupplierQuotationPeer::CLIENTQUOTATIONID, $this->id);

				SupplierQuotationPeer::addSelectColumns($criteria);
				if (!isset($this->lastSupplierQuotationCriteria) || !$this->lastSupplierQuotationCriteria->equals($criteria)) {
					$this->collSupplierQuotations = SupplierQuotationPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSupplierQuotationCriteria = $criteria;
		return $this->collSupplierQuotations;
	}

	/**
	 * Returns the number of related SupplierQuotation objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SupplierQuotation objects.
	 * @throws     PropelException
	 */
	public function countSupplierQuotations(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collSupplierQuotations === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(SupplierQuotationPeer::CLIENTQUOTATIONID, $this->id);

				$count = SupplierQuotationPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(SupplierQuotationPeer::CLIENTQUOTATIONID, $this->id);

				if (!isset($this->lastSupplierQuotationCriteria) || !$this->lastSupplierQuotationCriteria->equals($criteria)) {
					$count = SupplierQuotationPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collSupplierQuotations);
				}
			} else {
				$count = count($this->collSupplierQuotations);
			}
		}
		$this->lastSupplierQuotationCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a SupplierQuotation object to this object
	 * through the SupplierQuotation foreign key attribute.
	 *
	 * @param      SupplierQuotation $l SupplierQuotation
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSupplierQuotation(SupplierQuotation $l)
	{
		if ($this->collSupplierQuotations === null) {
			$this->initSupplierQuotations();
		}
		if (!in_array($l, $this->collSupplierQuotations, true)) { // only add it if the **same** object is not already associated
			array_push($this->collSupplierQuotations, $l);
			$l->setClientQuotation($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ClientQuotation is new, it will return
	 * an empty collection; or if this ClientQuotation has previously
	 * been saved, it will retrieve related SupplierQuotations from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ClientQuotation.
	 */
	public function getSupplierQuotationsJoinSupplier($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotations === null) {
			if ($this->isNew()) {
				$this->collSupplierQuotations = array();
			} else {

				$criteria->add(SupplierQuotationPeer::CLIENTQUOTATIONID, $this->id);

				$this->collSupplierQuotations = SupplierQuotationPeer::doSelectJoinSupplier($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuotationPeer::CLIENTQUOTATIONID, $this->id);

			if (!isset($this->lastSupplierQuotationCriteria) || !$this->lastSupplierQuotationCriteria->equals($criteria)) {
				$this->collSupplierQuotations = SupplierQuotationPeer::doSelectJoinSupplier($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuotationCriteria = $criteria;

		return $this->collSupplierQuotations;
	}

	/**
	 * Clears out the collClientPurchaseOrders collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClientPurchaseOrders()
	 */
	public function clearClientPurchaseOrders()
	{
		$this->collClientPurchaseOrders = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClientPurchaseOrders collection (array).
	 *
	 * By default this just sets the collClientPurchaseOrders collection to an empty array (like clearcollClientPurchaseOrders());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClientPurchaseOrders()
	{
		$this->collClientPurchaseOrders = array();
	}

	/**
	 * Gets an array of ClientPurchaseOrder objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this ClientQuotation has previously been saved, it will retrieve
	 * related ClientPurchaseOrders from storage. If this ClientQuotation is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ClientPurchaseOrder[]
	 * @throws     PropelException
	 */
	public function getClientPurchaseOrders($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientPurchaseOrders === null) {
			if ($this->isNew()) {
			   $this->collClientPurchaseOrders = array();
			} else {

				$criteria->add(ClientPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

				ClientPurchaseOrderPeer::addSelectColumns($criteria);
				$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ClientPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

				ClientPurchaseOrderPeer::addSelectColumns($criteria);
				if (!isset($this->lastClientPurchaseOrderCriteria) || !$this->lastClientPurchaseOrderCriteria->equals($criteria)) {
					$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastClientPurchaseOrderCriteria = $criteria;
		return $this->collClientPurchaseOrders;
	}

	/**
	 * Returns the number of related ClientPurchaseOrder objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ClientPurchaseOrder objects.
	 * @throws     PropelException
	 */
	public function countClientPurchaseOrders(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collClientPurchaseOrders === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ClientPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

				$count = ClientPurchaseOrderPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ClientPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

				if (!isset($this->lastClientPurchaseOrderCriteria) || !$this->lastClientPurchaseOrderCriteria->equals($criteria)) {
					$count = ClientPurchaseOrderPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collClientPurchaseOrders);
				}
			} else {
				$count = count($this->collClientPurchaseOrders);
			}
		}
		$this->lastClientPurchaseOrderCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a ClientPurchaseOrder object to this object
	 * through the ClientPurchaseOrder foreign key attribute.
	 *
	 * @param      ClientPurchaseOrder $l ClientPurchaseOrder
	 * @return     void
	 * @throws     PropelException
	 */
	public function addClientPurchaseOrder(ClientPurchaseOrder $l)
	{
		if ($this->collClientPurchaseOrders === null) {
			$this->initClientPurchaseOrders();
		}
		if (!in_array($l, $this->collClientPurchaseOrders, true)) { // only add it if the **same** object is not already associated
			array_push($this->collClientPurchaseOrders, $l);
			$l->setClientQuotation($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ClientQuotation is new, it will return
	 * an empty collection; or if this ClientQuotation has previously
	 * been saved, it will retrieve related ClientPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ClientQuotation.
	 */
	public function getClientPurchaseOrdersJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collClientPurchaseOrders = array();
			} else {

				$criteria->add(ClientPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

				$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelectJoinUser($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

			if (!isset($this->lastClientPurchaseOrderCriteria) || !$this->lastClientPurchaseOrderCriteria->equals($criteria)) {
				$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelectJoinUser($criteria, $con, $join_behavior);
			}
		}
		$this->lastClientPurchaseOrderCriteria = $criteria;

		return $this->collClientPurchaseOrders;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ClientQuotation is new, it will return
	 * an empty collection; or if this ClientQuotation has previously
	 * been saved, it will retrieve related ClientPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ClientQuotation.
	 */
	public function getClientPurchaseOrdersJoinAffiliate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collClientPurchaseOrders = array();
			} else {

				$criteria->add(ClientPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

				$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelectJoinAffiliate($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

			if (!isset($this->lastClientPurchaseOrderCriteria) || !$this->lastClientPurchaseOrderCriteria->equals($criteria)) {
				$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelectJoinAffiliate($criteria, $con, $join_behavior);
			}
		}
		$this->lastClientPurchaseOrderCriteria = $criteria;

		return $this->collClientPurchaseOrders;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ClientQuotation is new, it will return
	 * an empty collection; or if this ClientQuotation has previously
	 * been saved, it will retrieve related ClientPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ClientQuotation.
	 */
	public function getClientPurchaseOrdersJoinAffiliateUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collClientPurchaseOrders = array();
			} else {

				$criteria->add(ClientPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

				$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelectJoinAffiliateUser($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

			if (!isset($this->lastClientPurchaseOrderCriteria) || !$this->lastClientPurchaseOrderCriteria->equals($criteria)) {
				$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelectJoinAffiliateUser($criteria, $con, $join_behavior);
			}
		}
		$this->lastClientPurchaseOrderCriteria = $criteria;

		return $this->collClientPurchaseOrders;
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
	 * Otherwise if this ClientQuotation has previously been saved, it will retrieve
	 * related SupplierPurchaseOrders from storage. If this ClientQuotation is new, it will return
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
			$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
			   $this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

				SupplierPurchaseOrderPeer::addSelectColumns($criteria);
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(SupplierPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

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
			$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);
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

				$criteria->add(SupplierPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

				$count = SupplierPurchaseOrderPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(SupplierPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

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
			$l->setClientQuotation($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ClientQuotation is new, it will return
	 * an empty collection; or if this ClientQuotation has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ClientQuotation.
	 */
	public function getSupplierPurchaseOrdersJoinSupplierQuotation($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinSupplierQuotation($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinSupplierQuotation($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;

		return $this->collSupplierPurchaseOrders;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ClientQuotation is new, it will return
	 * an empty collection; or if this ClientQuotation has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ClientQuotation.
	 */
	public function getSupplierPurchaseOrdersJoinSupplier($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinSupplier($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

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
	 * Otherwise if this ClientQuotation is new, it will return
	 * an empty collection; or if this ClientQuotation has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ClientQuotation.
	 */
	public function getSupplierPurchaseOrdersJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinUser($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

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
	 * Otherwise if this ClientQuotation is new, it will return
	 * an empty collection; or if this ClientQuotation has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ClientQuotation.
	 */
	public function getSupplierPurchaseOrdersJoinAffiliate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinAffiliate($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

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
	 * Otherwise if this ClientQuotation is new, it will return
	 * an empty collection; or if this ClientQuotation has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ClientQuotation.
	 */
	public function getSupplierPurchaseOrdersJoinAffiliateUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientQuotationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinAffiliateUser($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::CLIENTQUOTATIONID, $this->id);

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
			if ($this->collClientQuotationHistorys) {
				foreach ((array) $this->collClientQuotationHistorys as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClientQuotationItems) {
				foreach ((array) $this->collClientQuotationItems as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierQuotations) {
				foreach ((array) $this->collSupplierQuotations as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClientPurchaseOrders) {
				foreach ((array) $this->collClientPurchaseOrders as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierPurchaseOrders) {
				foreach ((array) $this->collSupplierPurchaseOrders as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collClientQuotationHistorys = null;
		$this->collClientQuotationItems = null;
		$this->collSupplierQuotations = null;
		$this->collClientPurchaseOrders = null;
		$this->collSupplierPurchaseOrders = null;
			$this->aUser = null;
			$this->aAffiliate = null;
			$this->aAffiliateUser = null;
	}

} // BaseClientQuotation
