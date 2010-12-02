<?php


/**
 * Base class that represents a row from the 'import_clientQuote' table.
 *
 * Cotizacion a Cliente
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseClientQuote extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ClientQuotePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ClientQuotePeer
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
	 * @var        array ClientQuoteHistory[] Collection to store aggregation of ClientQuoteHistory objects.
	 */
	protected $collClientQuoteHistorys;

	/**
	 * @var        array ClientQuoteItem[] Collection to store aggregation of ClientQuoteItem objects.
	 */
	protected $collClientQuoteItems;

	/**
	 * @var        array SupplierQuote[] Collection to store aggregation of SupplierQuote objects.
	 */
	protected $collSupplierQuotes;

	/**
	 * @var        array ClientPurchaseOrder[] Collection to store aggregation of ClientPurchaseOrder objects.
	 */
	protected $collClientPurchaseOrders;

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
	 * @return     ClientQuote The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ClientQuotePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Sets the value of [createdat] column to a normalized version of the date/time value specified.
	 * Creation date for
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     ClientQuote The current object (for fluent API support)
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
				$this->modifiedColumns[] = ClientQuotePeer::CREATEDAT;
			}
		} // if either are not null

		return $this;
	} // setCreatedat()

	/**
	 * Set the value of [affiliateid] column.
	 * Afiliado
	 * @param      int $v new value
	 * @return     ClientQuote The current object (for fluent API support)
	 */
	public function setAffiliateid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->affiliateid !== $v) {
			$this->affiliateid = $v;
			$this->modifiedColumns[] = ClientQuotePeer::AFFILIATEID;
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
	 * @return     ClientQuote The current object (for fluent API support)
	 */
	public function setAffiliateuserid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->affiliateuserid !== $v) {
			$this->affiliateuserid = $v;
			$this->modifiedColumns[] = ClientQuotePeer::AFFILIATEUSERID;
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
	 * @return     ClientQuote The current object (for fluent API support)
	 */
	public function setUserid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->userid !== $v) {
			$this->userid = $v;
			$this->modifiedColumns[] = ClientQuotePeer::USERID;
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
	 * @return     ClientQuote The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = ClientQuotePeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Sets the value of [timestampstatus] column to a normalized version of the date/time value specified.
	 * Fecha del ultimo cambio de status
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     ClientQuote The current object (for fluent API support)
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
				$this->modifiedColumns[] = ClientQuotePeer::TIMESTAMPSTATUS;
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

			return $startcol + 7; // 7 = ClientQuotePeer::NUM_COLUMNS - ClientQuotePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating ClientQuote object", $e);
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
			$con = Propel::getConnection(ClientQuotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ClientQuotePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
			$this->collClientQuoteHistorys = null;

			$this->collClientQuoteItems = null;

			$this->collSupplierQuotes = null;

			$this->collClientPurchaseOrders = null;

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
			$con = Propel::getConnection(ClientQuotePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ClientQuoteQuery::create()
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
			$con = Propel::getConnection(ClientQuotePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ClientQuotePeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = ClientQuotePeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(ClientQuotePeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.ClientQuotePeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += ClientQuotePeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collClientQuoteHistorys !== null) {
				foreach ($this->collClientQuoteHistorys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collClientQuoteItems !== null) {
				foreach ($this->collClientQuoteItems as $referrerFK) {
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


			if (($retval = ClientQuotePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collClientQuoteHistorys !== null) {
					foreach ($this->collClientQuoteHistorys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClientQuoteItems !== null) {
					foreach ($this->collClientQuoteItems as $referrerFK) {
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
		$pos = ClientQuotePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getAffiliateid();
				break;
			case 3:
				return $this->getAffiliateuserid();
				break;
			case 4:
				return $this->getUserid();
				break;
			case 5:
				return $this->getStatus();
				break;
			case 6:
				return $this->getTimestampstatus();
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
		$keys = ClientQuotePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCreatedat(),
			$keys[2] => $this->getAffiliateid(),
			$keys[3] => $this->getAffiliateuserid(),
			$keys[4] => $this->getUserid(),
			$keys[5] => $this->getStatus(),
			$keys[6] => $this->getTimestampstatus(),
		);
		if ($includeForeignObjects) {
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
		$pos = ClientQuotePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setAffiliateid($value);
				break;
			case 3:
				$this->setAffiliateuserid($value);
				break;
			case 4:
				$this->setUserid($value);
				break;
			case 5:
				$this->setStatus($value);
				break;
			case 6:
				$this->setTimestampstatus($value);
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
		$keys = ClientQuotePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCreatedat($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAffiliateid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAffiliateuserid($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUserid($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStatus($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTimestampstatus($arr[$keys[6]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ClientQuotePeer::DATABASE_NAME);

		if ($this->isColumnModified(ClientQuotePeer::ID)) $criteria->add(ClientQuotePeer::ID, $this->id);
		if ($this->isColumnModified(ClientQuotePeer::CREATEDAT)) $criteria->add(ClientQuotePeer::CREATEDAT, $this->createdat);
		if ($this->isColumnModified(ClientQuotePeer::AFFILIATEID)) $criteria->add(ClientQuotePeer::AFFILIATEID, $this->affiliateid);
		if ($this->isColumnModified(ClientQuotePeer::AFFILIATEUSERID)) $criteria->add(ClientQuotePeer::AFFILIATEUSERID, $this->affiliateuserid);
		if ($this->isColumnModified(ClientQuotePeer::USERID)) $criteria->add(ClientQuotePeer::USERID, $this->userid);
		if ($this->isColumnModified(ClientQuotePeer::STATUS)) $criteria->add(ClientQuotePeer::STATUS, $this->status);
		if ($this->isColumnModified(ClientQuotePeer::TIMESTAMPSTATUS)) $criteria->add(ClientQuotePeer::TIMESTAMPSTATUS, $this->timestampstatus);

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
		$criteria = new Criteria(ClientQuotePeer::DATABASE_NAME);
		$criteria->add(ClientQuotePeer::ID, $this->id);

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
	 * @param      object $copyObj An object of ClientQuote (or compatible) type.
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

			foreach ($this->getClientQuoteHistorys() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClientQuoteHistory($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClientQuoteItems() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClientQuoteItem($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierQuotes() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierQuote($relObj->copy($deepCopy));
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
	 * @return     ClientQuote Clone of current object.
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
	 * @return     ClientQuotePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ClientQuotePeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     ClientQuote The current object (for fluent API support)
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
			$v->addClientQuote($this);
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
				 $this->aUser->addClientQuotes($this);
			 */
		}
		return $this->aUser;
	}

	/**
	 * Declares an association between this object and a Affiliate object.
	 *
	 * @param      Affiliate $v
	 * @return     ClientQuote The current object (for fluent API support)
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
			$v->addClientQuote($this);
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
				 $this->aAffiliate->addClientQuotes($this);
			 */
		}
		return $this->aAffiliate;
	}

	/**
	 * Declares an association between this object and a AffiliateUser object.
	 *
	 * @param      AffiliateUser $v
	 * @return     ClientQuote The current object (for fluent API support)
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
			$v->addClientQuote($this);
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
				 $this->aAffiliateUser->addClientQuotes($this);
			 */
		}
		return $this->aAffiliateUser;
	}

	/**
	 * Clears out the collClientQuoteHistorys collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClientQuoteHistorys()
	 */
	public function clearClientQuoteHistorys()
	{
		$this->collClientQuoteHistorys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClientQuoteHistorys collection.
	 *
	 * By default this just sets the collClientQuoteHistorys collection to an empty array (like clearcollClientQuoteHistorys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClientQuoteHistorys()
	{
		$this->collClientQuoteHistorys = new PropelObjectCollection();
		$this->collClientQuoteHistorys->setModel('ClientQuoteHistory');
	}

	/**
	 * Gets an array of ClientQuoteHistory objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this ClientQuote is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ClientQuoteHistory[] List of ClientQuoteHistory objects
	 * @throws     PropelException
	 */
	public function getClientQuoteHistorys($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collClientQuoteHistorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collClientQuoteHistorys) {
				// return empty collection
				$this->initClientQuoteHistorys();
			} else {
				$collClientQuoteHistorys = ClientQuoteHistoryQuery::create(null, $criteria)
					->filterByClientQuote($this)
					->find($con);
				if (null !== $criteria) {
					return $collClientQuoteHistorys;
				}
				$this->collClientQuoteHistorys = $collClientQuoteHistorys;
			}
		}
		return $this->collClientQuoteHistorys;
	}

	/**
	 * Returns the number of related ClientQuoteHistory objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ClientQuoteHistory objects.
	 * @throws     PropelException
	 */
	public function countClientQuoteHistorys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collClientQuoteHistorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collClientQuoteHistorys) {
				return 0;
			} else {
				$query = ClientQuoteHistoryQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByClientQuote($this)
					->count($con);
			}
		} else {
			return count($this->collClientQuoteHistorys);
		}
	}

	/**
	 * Method called to associate a ClientQuoteHistory object to this object
	 * through the ClientQuoteHistory foreign key attribute.
	 *
	 * @param      ClientQuoteHistory $l ClientQuoteHistory
	 * @return     void
	 * @throws     PropelException
	 */
	public function addClientQuoteHistory(ClientQuoteHistory $l)
	{
		if ($this->collClientQuoteHistorys === null) {
			$this->initClientQuoteHistorys();
		}
		if (!$this->collClientQuoteHistorys->contains($l)) { // only add it if the **same** object is not already associated
			$this->collClientQuoteHistorys[]= $l;
			$l->setClientQuote($this);
		}
	}

	/**
	 * Clears out the collClientQuoteItems collection
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
	 * Initializes the collClientQuoteItems collection.
	 *
	 * By default this just sets the collClientQuoteItems collection to an empty array (like clearcollClientQuoteItems());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClientQuoteItems()
	{
		$this->collClientQuoteItems = new PropelObjectCollection();
		$this->collClientQuoteItems->setModel('ClientQuoteItem');
	}

	/**
	 * Gets an array of ClientQuoteItem objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this ClientQuote is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ClientQuoteItem[] List of ClientQuoteItem objects
	 * @throws     PropelException
	 */
	public function getClientQuoteItems($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collClientQuoteItems || null !== $criteria) {
			if ($this->isNew() && null === $this->collClientQuoteItems) {
				// return empty collection
				$this->initClientQuoteItems();
			} else {
				$collClientQuoteItems = ClientQuoteItemQuery::create(null, $criteria)
					->filterByClientQuote($this)
					->find($con);
				if (null !== $criteria) {
					return $collClientQuoteItems;
				}
				$this->collClientQuoteItems = $collClientQuoteItems;
			}
		}
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
		if(null === $this->collClientQuoteItems || null !== $criteria) {
			if ($this->isNew() && null === $this->collClientQuoteItems) {
				return 0;
			} else {
				$query = ClientQuoteItemQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByClientQuote($this)
					->count($con);
			}
		} else {
			return count($this->collClientQuoteItems);
		}
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
		if (!$this->collClientQuoteItems->contains($l)) { // only add it if the **same** object is not already associated
			$this->collClientQuoteItems[]= $l;
			$l->setClientQuote($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ClientQuote is new, it will return
	 * an empty collection; or if this ClientQuote has previously
	 * been saved, it will retrieve related ClientQuoteItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ClientQuote.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ClientQuoteItem[] List of ClientQuoteItem objects
	 */
	public function getClientQuoteItemsJoinProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ClientQuoteItemQuery::create(null, $criteria);
		$query->joinWith('Product', $join_behavior);

		return $this->getClientQuoteItems($query, $con);
	}

	/**
	 * Clears out the collSupplierQuotes collection
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
	 * Initializes the collSupplierQuotes collection.
	 *
	 * By default this just sets the collSupplierQuotes collection to an empty array (like clearcollSupplierQuotes());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierQuotes()
	{
		$this->collSupplierQuotes = new PropelObjectCollection();
		$this->collSupplierQuotes->setModel('SupplierQuote');
	}

	/**
	 * Gets an array of SupplierQuote objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this ClientQuote is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SupplierQuote[] List of SupplierQuote objects
	 * @throws     PropelException
	 */
	public function getSupplierQuotes($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSupplierQuotes || null !== $criteria) {
			if ($this->isNew() && null === $this->collSupplierQuotes) {
				// return empty collection
				$this->initSupplierQuotes();
			} else {
				$collSupplierQuotes = SupplierQuoteQuery::create(null, $criteria)
					->filterByClientQuote($this)
					->find($con);
				if (null !== $criteria) {
					return $collSupplierQuotes;
				}
				$this->collSupplierQuotes = $collSupplierQuotes;
			}
		}
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
		if(null === $this->collSupplierQuotes || null !== $criteria) {
			if ($this->isNew() && null === $this->collSupplierQuotes) {
				return 0;
			} else {
				$query = SupplierQuoteQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByClientQuote($this)
					->count($con);
			}
		} else {
			return count($this->collSupplierQuotes);
		}
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
		if (!$this->collSupplierQuotes->contains($l)) { // only add it if the **same** object is not already associated
			$this->collSupplierQuotes[]= $l;
			$l->setClientQuote($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ClientQuote is new, it will return
	 * an empty collection; or if this ClientQuote has previously
	 * been saved, it will retrieve related SupplierQuotes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ClientQuote.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierQuote[] List of SupplierQuote objects
	 */
	public function getSupplierQuotesJoinSupplier($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierQuoteQuery::create(null, $criteria);
		$query->joinWith('Supplier', $join_behavior);

		return $this->getSupplierQuotes($query, $con);
	}

	/**
	 * Clears out the collClientPurchaseOrders collection
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
	 * Initializes the collClientPurchaseOrders collection.
	 *
	 * By default this just sets the collClientPurchaseOrders collection to an empty array (like clearcollClientPurchaseOrders());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClientPurchaseOrders()
	{
		$this->collClientPurchaseOrders = new PropelObjectCollection();
		$this->collClientPurchaseOrders->setModel('ClientPurchaseOrder');
	}

	/**
	 * Gets an array of ClientPurchaseOrder objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this ClientQuote is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ClientPurchaseOrder[] List of ClientPurchaseOrder objects
	 * @throws     PropelException
	 */
	public function getClientPurchaseOrders($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collClientPurchaseOrders || null !== $criteria) {
			if ($this->isNew() && null === $this->collClientPurchaseOrders) {
				// return empty collection
				$this->initClientPurchaseOrders();
			} else {
				$collClientPurchaseOrders = ClientPurchaseOrderQuery::create(null, $criteria)
					->filterByClientQuote($this)
					->find($con);
				if (null !== $criteria) {
					return $collClientPurchaseOrders;
				}
				$this->collClientPurchaseOrders = $collClientPurchaseOrders;
			}
		}
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
		if(null === $this->collClientPurchaseOrders || null !== $criteria) {
			if ($this->isNew() && null === $this->collClientPurchaseOrders) {
				return 0;
			} else {
				$query = ClientPurchaseOrderQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByClientQuote($this)
					->count($con);
			}
		} else {
			return count($this->collClientPurchaseOrders);
		}
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
		if (!$this->collClientPurchaseOrders->contains($l)) { // only add it if the **same** object is not already associated
			$this->collClientPurchaseOrders[]= $l;
			$l->setClientQuote($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ClientQuote is new, it will return
	 * an empty collection; or if this ClientQuote has previously
	 * been saved, it will retrieve related ClientPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ClientQuote.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ClientPurchaseOrder[] List of ClientPurchaseOrder objects
	 */
	public function getClientPurchaseOrdersJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ClientPurchaseOrderQuery::create(null, $criteria);
		$query->joinWith('User', $join_behavior);

		return $this->getClientPurchaseOrders($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ClientQuote is new, it will return
	 * an empty collection; or if this ClientQuote has previously
	 * been saved, it will retrieve related ClientPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ClientQuote.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ClientPurchaseOrder[] List of ClientPurchaseOrder objects
	 */
	public function getClientPurchaseOrdersJoinAffiliate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ClientPurchaseOrderQuery::create(null, $criteria);
		$query->joinWith('Affiliate', $join_behavior);

		return $this->getClientPurchaseOrders($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ClientQuote is new, it will return
	 * an empty collection; or if this ClientQuote has previously
	 * been saved, it will retrieve related ClientPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ClientQuote.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ClientPurchaseOrder[] List of ClientPurchaseOrder objects
	 */
	public function getClientPurchaseOrdersJoinAffiliateUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ClientPurchaseOrderQuery::create(null, $criteria);
		$query->joinWith('AffiliateUser', $join_behavior);

		return $this->getClientPurchaseOrders($query, $con);
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
	 * If this ClientQuote is new, it will return
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
					->filterByClientQuote($this)
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
					->filterByClientQuote($this)
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
			$l->setClientQuote($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ClientQuote is new, it will return
	 * an empty collection; or if this ClientQuote has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ClientQuote.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierPurchaseOrder[] List of SupplierPurchaseOrder objects
	 */
	public function getSupplierPurchaseOrdersJoinSupplierQuote($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierPurchaseOrderQuery::create(null, $criteria);
		$query->joinWith('SupplierQuote', $join_behavior);

		return $this->getSupplierPurchaseOrders($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ClientQuote is new, it will return
	 * an empty collection; or if this ClientQuote has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ClientQuote.
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
	 * Otherwise if this ClientQuote is new, it will return
	 * an empty collection; or if this ClientQuote has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ClientQuote.
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
	 * Otherwise if this ClientQuote is new, it will return
	 * an empty collection; or if this ClientQuote has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ClientQuote.
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
	 * Otherwise if this ClientQuote is new, it will return
	 * an empty collection; or if this ClientQuote has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ClientQuote.
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
		$this->affiliateid = null;
		$this->affiliateuserid = null;
		$this->userid = null;
		$this->status = null;
		$this->timestampstatus = null;
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
			if ($this->collClientQuoteHistorys) {
				foreach ((array) $this->collClientQuoteHistorys as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClientQuoteItems) {
				foreach ((array) $this->collClientQuoteItems as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierQuotes) {
				foreach ((array) $this->collSupplierQuotes as $o) {
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

		$this->collClientQuoteHistorys = null;
		$this->collClientQuoteItems = null;
		$this->collSupplierQuotes = null;
		$this->collClientPurchaseOrders = null;
		$this->collSupplierPurchaseOrders = null;
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

} // BaseClientQuote
