<?php


/**
 * Base class that represents a row from the 'import_clientPurchaseOrder' table.
 *
 * Orden de Pedido a Cliente
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseClientPurchaseOrder extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ClientPurchaseOrderPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ClientPurchaseOrderPeer
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
	 * @var        ClientQuote
	 */
	protected $aClientQuote;

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
	 * @var        array ClientPurchaseOrderItem[] Collection to store aggregation of ClientPurchaseOrderItem objects.
	 */
	protected $collClientPurchaseOrderItems;

	/**
	 * @var        array ClientPurchaseOrderHistory[] Collection to store aggregation of ClientPurchaseOrderHistory objects.
	 */
	protected $collClientPurchaseOrderHistorys;

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
	 * id de cotizacion de proveedor relacionada
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
	 * @return     ClientPurchaseOrder The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ClientPurchaseOrderPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Sets the value of [createdat] column to a normalized version of the date/time value specified.
	 * Creation date for
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     ClientPurchaseOrder The current object (for fluent API support)
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
				$this->modifiedColumns[] = ClientPurchaseOrderPeer::CREATEDAT;
			}
		} // if either are not null

		return $this;
	} // setCreatedat()

	/**
	 * Set the value of [status] column.
	 * Status de Cotizacion
	 * @param      int $v new value
	 * @return     ClientPurchaseOrder The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = ClientPurchaseOrderPeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Sets the value of [timestampstatus] column to a normalized version of the date/time value specified.
	 * Fecha del ultimo cambio de status
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     ClientPurchaseOrder The current object (for fluent API support)
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
				$this->modifiedColumns[] = ClientPurchaseOrderPeer::TIMESTAMPSTATUS;
			}
		} // if either are not null

		return $this;
	} // setTimestampstatus()

	/**
	 * Set the value of [clientquoteid] column.
	 * id de cotizacion de proveedor relacionada
	 * @param      int $v new value
	 * @return     ClientPurchaseOrder The current object (for fluent API support)
	 */
	public function setClientquoteid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->clientquoteid !== $v) {
			$this->clientquoteid = $v;
			$this->modifiedColumns[] = ClientPurchaseOrderPeer::CLIENTQUOTEID;
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
	 * @return     ClientPurchaseOrder The current object (for fluent API support)
	 */
	public function setAffiliateid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->affiliateid !== $v) {
			$this->affiliateid = $v;
			$this->modifiedColumns[] = ClientPurchaseOrderPeer::AFFILIATEID;
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
	 * @return     ClientPurchaseOrder The current object (for fluent API support)
	 */
	public function setAffiliateuserid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->affiliateuserid !== $v) {
			$this->affiliateuserid = $v;
			$this->modifiedColumns[] = ClientPurchaseOrderPeer::AFFILIATEUSERID;
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
	 * @return     ClientPurchaseOrder The current object (for fluent API support)
	 */
	public function setUserid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->userid !== $v) {
			$this->userid = $v;
			$this->modifiedColumns[] = ClientPurchaseOrderPeer::USERID;
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
			$this->status = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->timestampstatus = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->clientquoteid = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->affiliateid = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->affiliateuserid = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->userid = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 8; // 8 = ClientPurchaseOrderPeer::NUM_COLUMNS - ClientPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating ClientPurchaseOrder object", $e);
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
			$con = Propel::getConnection(ClientPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ClientPurchaseOrderPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aClientQuote = null;
			$this->aUser = null;
			$this->aAffiliate = null;
			$this->aAffiliateUser = null;
			$this->collClientPurchaseOrderItems = null;

			$this->collClientPurchaseOrderHistorys = null;

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
			$con = Propel::getConnection(ClientPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ClientPurchaseOrderQuery::create()
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
			$con = Propel::getConnection(ClientPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ClientPurchaseOrderPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = ClientPurchaseOrderPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(ClientPurchaseOrderPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.ClientPurchaseOrderPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += ClientPurchaseOrderPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collClientPurchaseOrderItems !== null) {
				foreach ($this->collClientPurchaseOrderItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collClientPurchaseOrderHistorys !== null) {
				foreach ($this->collClientPurchaseOrderHistorys as $referrerFK) {
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


			if (($retval = ClientPurchaseOrderPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collClientPurchaseOrderItems !== null) {
					foreach ($this->collClientPurchaseOrderItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClientPurchaseOrderHistorys !== null) {
					foreach ($this->collClientPurchaseOrderHistorys as $referrerFK) {
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
		$pos = ClientPurchaseOrderPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getStatus();
				break;
			case 3:
				return $this->getTimestampstatus();
				break;
			case 4:
				return $this->getClientquoteid();
				break;
			case 5:
				return $this->getAffiliateid();
				break;
			case 6:
				return $this->getAffiliateuserid();
				break;
			case 7:
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
		$keys = ClientPurchaseOrderPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCreatedat(),
			$keys[2] => $this->getStatus(),
			$keys[3] => $this->getTimestampstatus(),
			$keys[4] => $this->getClientquoteid(),
			$keys[5] => $this->getAffiliateid(),
			$keys[6] => $this->getAffiliateuserid(),
			$keys[7] => $this->getUserid(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aClientQuote) {
				$result['ClientQuote'] = $this->aClientQuote->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = ClientPurchaseOrderPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setStatus($value);
				break;
			case 3:
				$this->setTimestampstatus($value);
				break;
			case 4:
				$this->setClientquoteid($value);
				break;
			case 5:
				$this->setAffiliateid($value);
				break;
			case 6:
				$this->setAffiliateuserid($value);
				break;
			case 7:
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
		$keys = ClientPurchaseOrderPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCreatedat($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStatus($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTimestampstatus($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setClientquoteid($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAffiliateid($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAffiliateuserid($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUserid($arr[$keys[7]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ClientPurchaseOrderPeer::DATABASE_NAME);

		if ($this->isColumnModified(ClientPurchaseOrderPeer::ID)) $criteria->add(ClientPurchaseOrderPeer::ID, $this->id);
		if ($this->isColumnModified(ClientPurchaseOrderPeer::CREATEDAT)) $criteria->add(ClientPurchaseOrderPeer::CREATEDAT, $this->createdat);
		if ($this->isColumnModified(ClientPurchaseOrderPeer::STATUS)) $criteria->add(ClientPurchaseOrderPeer::STATUS, $this->status);
		if ($this->isColumnModified(ClientPurchaseOrderPeer::TIMESTAMPSTATUS)) $criteria->add(ClientPurchaseOrderPeer::TIMESTAMPSTATUS, $this->timestampstatus);
		if ($this->isColumnModified(ClientPurchaseOrderPeer::CLIENTQUOTEID)) $criteria->add(ClientPurchaseOrderPeer::CLIENTQUOTEID, $this->clientquoteid);
		if ($this->isColumnModified(ClientPurchaseOrderPeer::AFFILIATEID)) $criteria->add(ClientPurchaseOrderPeer::AFFILIATEID, $this->affiliateid);
		if ($this->isColumnModified(ClientPurchaseOrderPeer::AFFILIATEUSERID)) $criteria->add(ClientPurchaseOrderPeer::AFFILIATEUSERID, $this->affiliateuserid);
		if ($this->isColumnModified(ClientPurchaseOrderPeer::USERID)) $criteria->add(ClientPurchaseOrderPeer::USERID, $this->userid);

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
		$criteria = new Criteria(ClientPurchaseOrderPeer::DATABASE_NAME);
		$criteria->add(ClientPurchaseOrderPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of ClientPurchaseOrder (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setCreatedat($this->createdat);
		$copyObj->setStatus($this->status);
		$copyObj->setTimestampstatus($this->timestampstatus);
		$copyObj->setClientquoteid($this->clientquoteid);
		$copyObj->setAffiliateid($this->affiliateid);
		$copyObj->setAffiliateuserid($this->affiliateuserid);
		$copyObj->setUserid($this->userid);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getClientPurchaseOrderItems() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClientPurchaseOrderItem($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClientPurchaseOrderHistorys() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClientPurchaseOrderHistory($relObj->copy($deepCopy));
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
	 * @return     ClientPurchaseOrder Clone of current object.
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
	 * @return     ClientPurchaseOrderPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ClientPurchaseOrderPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a ClientQuote object.
	 *
	 * @param      ClientQuote $v
	 * @return     ClientPurchaseOrder The current object (for fluent API support)
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
			$v->addClientPurchaseOrder($this);
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
				 $this->aClientQuote->addClientPurchaseOrders($this);
			 */
		}
		return $this->aClientQuote;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     ClientPurchaseOrder The current object (for fluent API support)
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
			$v->addClientPurchaseOrder($this);
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
				 $this->aUser->addClientPurchaseOrders($this);
			 */
		}
		return $this->aUser;
	}

	/**
	 * Declares an association between this object and a Affiliate object.
	 *
	 * @param      Affiliate $v
	 * @return     ClientPurchaseOrder The current object (for fluent API support)
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
			$v->addClientPurchaseOrder($this);
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
				 $this->aAffiliate->addClientPurchaseOrders($this);
			 */
		}
		return $this->aAffiliate;
	}

	/**
	 * Declares an association between this object and a AffiliateUser object.
	 *
	 * @param      AffiliateUser $v
	 * @return     ClientPurchaseOrder The current object (for fluent API support)
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
			$v->addClientPurchaseOrder($this);
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
				 $this->aAffiliateUser->addClientPurchaseOrders($this);
			 */
		}
		return $this->aAffiliateUser;
	}

	/**
	 * Clears out the collClientPurchaseOrderItems collection
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
	 * Initializes the collClientPurchaseOrderItems collection.
	 *
	 * By default this just sets the collClientPurchaseOrderItems collection to an empty array (like clearcollClientPurchaseOrderItems());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClientPurchaseOrderItems()
	{
		$this->collClientPurchaseOrderItems = new PropelObjectCollection();
		$this->collClientPurchaseOrderItems->setModel('ClientPurchaseOrderItem');
	}

	/**
	 * Gets an array of ClientPurchaseOrderItem objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this ClientPurchaseOrder is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ClientPurchaseOrderItem[] List of ClientPurchaseOrderItem objects
	 * @throws     PropelException
	 */
	public function getClientPurchaseOrderItems($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collClientPurchaseOrderItems || null !== $criteria) {
			if ($this->isNew() && null === $this->collClientPurchaseOrderItems) {
				// return empty collection
				$this->initClientPurchaseOrderItems();
			} else {
				$collClientPurchaseOrderItems = ClientPurchaseOrderItemQuery::create(null, $criteria)
					->filterByClientPurchaseOrder($this)
					->find($con);
				if (null !== $criteria) {
					return $collClientPurchaseOrderItems;
				}
				$this->collClientPurchaseOrderItems = $collClientPurchaseOrderItems;
			}
		}
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
		if(null === $this->collClientPurchaseOrderItems || null !== $criteria) {
			if ($this->isNew() && null === $this->collClientPurchaseOrderItems) {
				return 0;
			} else {
				$query = ClientPurchaseOrderItemQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByClientPurchaseOrder($this)
					->count($con);
			}
		} else {
			return count($this->collClientPurchaseOrderItems);
		}
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
		if (!$this->collClientPurchaseOrderItems->contains($l)) { // only add it if the **same** object is not already associated
			$this->collClientPurchaseOrderItems[]= $l;
			$l->setClientPurchaseOrder($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ClientPurchaseOrder is new, it will return
	 * an empty collection; or if this ClientPurchaseOrder has previously
	 * been saved, it will retrieve related ClientPurchaseOrderItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ClientPurchaseOrder.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ClientPurchaseOrderItem[] List of ClientPurchaseOrderItem objects
	 */
	public function getClientPurchaseOrderItemsJoinProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ClientPurchaseOrderItemQuery::create(null, $criteria);
		$query->joinWith('Product', $join_behavior);

		return $this->getClientPurchaseOrderItems($query, $con);
	}

	/**
	 * Clears out the collClientPurchaseOrderHistorys collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClientPurchaseOrderHistorys()
	 */
	public function clearClientPurchaseOrderHistorys()
	{
		$this->collClientPurchaseOrderHistorys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClientPurchaseOrderHistorys collection.
	 *
	 * By default this just sets the collClientPurchaseOrderHistorys collection to an empty array (like clearcollClientPurchaseOrderHistorys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClientPurchaseOrderHistorys()
	{
		$this->collClientPurchaseOrderHistorys = new PropelObjectCollection();
		$this->collClientPurchaseOrderHistorys->setModel('ClientPurchaseOrderHistory');
	}

	/**
	 * Gets an array of ClientPurchaseOrderHistory objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this ClientPurchaseOrder is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ClientPurchaseOrderHistory[] List of ClientPurchaseOrderHistory objects
	 * @throws     PropelException
	 */
	public function getClientPurchaseOrderHistorys($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collClientPurchaseOrderHistorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collClientPurchaseOrderHistorys) {
				// return empty collection
				$this->initClientPurchaseOrderHistorys();
			} else {
				$collClientPurchaseOrderHistorys = ClientPurchaseOrderHistoryQuery::create(null, $criteria)
					->filterByClientPurchaseOrder($this)
					->find($con);
				if (null !== $criteria) {
					return $collClientPurchaseOrderHistorys;
				}
				$this->collClientPurchaseOrderHistorys = $collClientPurchaseOrderHistorys;
			}
		}
		return $this->collClientPurchaseOrderHistorys;
	}

	/**
	 * Returns the number of related ClientPurchaseOrderHistory objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ClientPurchaseOrderHistory objects.
	 * @throws     PropelException
	 */
	public function countClientPurchaseOrderHistorys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collClientPurchaseOrderHistorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collClientPurchaseOrderHistorys) {
				return 0;
			} else {
				$query = ClientPurchaseOrderHistoryQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByClientPurchaseOrder($this)
					->count($con);
			}
		} else {
			return count($this->collClientPurchaseOrderHistorys);
		}
	}

	/**
	 * Method called to associate a ClientPurchaseOrderHistory object to this object
	 * through the ClientPurchaseOrderHistory foreign key attribute.
	 *
	 * @param      ClientPurchaseOrderHistory $l ClientPurchaseOrderHistory
	 * @return     void
	 * @throws     PropelException
	 */
	public function addClientPurchaseOrderHistory(ClientPurchaseOrderHistory $l)
	{
		if ($this->collClientPurchaseOrderHistorys === null) {
			$this->initClientPurchaseOrderHistorys();
		}
		if (!$this->collClientPurchaseOrderHistorys->contains($l)) { // only add it if the **same** object is not already associated
			$this->collClientPurchaseOrderHistorys[]= $l;
			$l->setClientPurchaseOrder($this);
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->createdat = null;
		$this->status = null;
		$this->timestampstatus = null;
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
			if ($this->collClientPurchaseOrderItems) {
				foreach ((array) $this->collClientPurchaseOrderItems as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClientPurchaseOrderHistorys) {
				foreach ((array) $this->collClientPurchaseOrderHistorys as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collClientPurchaseOrderItems = null;
		$this->collClientPurchaseOrderHistorys = null;
		$this->aClientQuote = null;
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

} // BaseClientPurchaseOrder
