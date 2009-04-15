<?php

/**
 * Base class that represents a row from the 'import_supplierQuotationItemComment' table.
 *
 * Feedback entre supplier y usuario admin de anmaga sobre un Item
 *
 * @package    import.classes.om
 */
abstract class BaseSupplierQuotationItemComment extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SupplierQuotationItemCommentPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the supplierquotationitemid field.
	 * @var        int
	 */
	protected $supplierquotationitemid;

	/**
	 * The value for the supplierid field.
	 * @var        int
	 */
	protected $supplierid;

	/**
	 * The value for the userid field.
	 * @var        int
	 */
	protected $userid;

	/**
	 * The value for the price field.
	 * @var        double
	 */
	protected $price;

	/**
	 * The value for the comments field.
	 * @var        string
	 */
	protected $comments;

	/**
	 * The value for the delivery field.
	 * @var        int
	 */
	protected $delivery;

	/**
	 * The value for the createdat field.
	 * @var        string
	 */
	protected $createdat;

	/**
	 * @var        User
	 */
	protected $aUser;

	/**
	 * @var        Supplier
	 */
	protected $aSupplier;

	/**
	 * @var        SupplierQuotationItem
	 */
	protected $aSupplierQuotationItem;

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
	 * Initializes internal state of BaseSupplierQuotationItemComment object.
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
	 * Id
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [supplierquotationitemid] column value.
	 * Id del item de la cotizacion de proveedor
	 * @return     int
	 */
	public function getSupplierquotationitemid()
	{
		return $this->supplierquotationitemid;
	}

	/**
	 * Get the [supplierid] column value.
	 * Supplier que comento
	 * @return     int
	 */
	public function getSupplierid()
	{
		return $this->supplierid;
	}

	/**
	 * Get the [userid] column value.
	 * Usuario de anmaga que comento
	 * @return     int
	 */
	public function getUserid()
	{
		return $this->userid;
	}

	/**
	 * Get the [price] column value.
	 * precio de producto
	 * @return     double
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * Get the [comments] column value.
	 * Comentarios
	 * @return     string
	 */
	public function getComments()
	{
		return $this->comments;
	}

	/**
	 * Get the [delivery] column value.
	 * Tiempo en dias para la entrega del producto.
	 * @return     int
	 */
	public function getDelivery()
	{
		return $this->delivery;
	}

	/**
	 * Get the [optionally formatted] temporal [createdat] column value.
	 * Fecha del cambio de status
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
	 * Set the value of [id] column.
	 * Id
	 * @param      int $v new value
	 * @return     SupplierQuotationItemComment The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SupplierQuotationItemCommentPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [supplierquotationitemid] column.
	 * Id del item de la cotizacion de proveedor
	 * @param      int $v new value
	 * @return     SupplierQuotationItemComment The current object (for fluent API support)
	 */
	public function setSupplierquotationitemid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->supplierquotationitemid !== $v) {
			$this->supplierquotationitemid = $v;
			$this->modifiedColumns[] = SupplierQuotationItemCommentPeer::SUPPLIERQUOTATIONITEMID;
		}

		if ($this->aSupplierQuotationItem !== null && $this->aSupplierQuotationItem->getId() !== $v) {
			$this->aSupplierQuotationItem = null;
		}

		return $this;
	} // setSupplierquotationitemid()

	/**
	 * Set the value of [supplierid] column.
	 * Supplier que comento
	 * @param      int $v new value
	 * @return     SupplierQuotationItemComment The current object (for fluent API support)
	 */
	public function setSupplierid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->supplierid !== $v) {
			$this->supplierid = $v;
			$this->modifiedColumns[] = SupplierQuotationItemCommentPeer::SUPPLIERID;
		}

		if ($this->aSupplier !== null && $this->aSupplier->getId() !== $v) {
			$this->aSupplier = null;
		}

		return $this;
	} // setSupplierid()

	/**
	 * Set the value of [userid] column.
	 * Usuario de anmaga que comento
	 * @param      int $v new value
	 * @return     SupplierQuotationItemComment The current object (for fluent API support)
	 */
	public function setUserid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->userid !== $v) {
			$this->userid = $v;
			$this->modifiedColumns[] = SupplierQuotationItemCommentPeer::USERID;
		}

		if ($this->aUser !== null && $this->aUser->getId() !== $v) {
			$this->aUser = null;
		}

		return $this;
	} // setUserid()

	/**
	 * Set the value of [price] column.
	 * precio de producto
	 * @param      double $v new value
	 * @return     SupplierQuotationItemComment The current object (for fluent API support)
	 */
	public function setPrice($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->price !== $v) {
			$this->price = $v;
			$this->modifiedColumns[] = SupplierQuotationItemCommentPeer::PRICE;
		}

		return $this;
	} // setPrice()

	/**
	 * Set the value of [comments] column.
	 * Comentarios
	 * @param      string $v new value
	 * @return     SupplierQuotationItemComment The current object (for fluent API support)
	 */
	public function setComments($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->comments !== $v) {
			$this->comments = $v;
			$this->modifiedColumns[] = SupplierQuotationItemCommentPeer::COMMENTS;
		}

		return $this;
	} // setComments()

	/**
	 * Set the value of [delivery] column.
	 * Tiempo en dias para la entrega del producto.
	 * @param      int $v new value
	 * @return     SupplierQuotationItemComment The current object (for fluent API support)
	 */
	public function setDelivery($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->delivery !== $v) {
			$this->delivery = $v;
			$this->modifiedColumns[] = SupplierQuotationItemCommentPeer::DELIVERY;
		}

		return $this;
	} // setDelivery()

	/**
	 * Sets the value of [createdat] column to a normalized version of the date/time value specified.
	 * Fecha del cambio de status
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     SupplierQuotationItemComment The current object (for fluent API support)
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
				$this->modifiedColumns[] = SupplierQuotationItemCommentPeer::CREATEDAT;
			}
		} // if either are not null

		return $this;
	} // setCreatedat()

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
			$this->supplierquotationitemid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->supplierid = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->userid = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->price = ($row[$startcol + 4] !== null) ? (double) $row[$startcol + 4] : null;
			$this->comments = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->delivery = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->createdat = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 8; // 8 = SupplierQuotationItemCommentPeer::NUM_COLUMNS - SupplierQuotationItemCommentPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating SupplierQuotationItemComment object", $e);
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

		if ($this->aSupplierQuotationItem !== null && $this->supplierquotationitemid !== $this->aSupplierQuotationItem->getId()) {
			$this->aSupplierQuotationItem = null;
		}
		if ($this->aSupplier !== null && $this->supplierid !== $this->aSupplier->getId()) {
			$this->aSupplier = null;
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
			$con = Propel::getConnection(SupplierQuotationItemCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SupplierQuotationItemCommentPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aUser = null;
			$this->aSupplier = null;
			$this->aSupplierQuotationItem = null;
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
			$con = Propel::getConnection(SupplierQuotationItemCommentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			SupplierQuotationItemCommentPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(SupplierQuotationItemCommentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			SupplierQuotationItemCommentPeer::addInstanceToPool($this);
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

			if ($this->aSupplier !== null) {
				if ($this->aSupplier->isModified() || $this->aSupplier->isNew()) {
					$affectedRows += $this->aSupplier->save($con);
				}
				$this->setSupplier($this->aSupplier);
			}

			if ($this->aSupplierQuotationItem !== null) {
				if ($this->aSupplierQuotationItem->isModified() || $this->aSupplierQuotationItem->isNew()) {
					$affectedRows += $this->aSupplierQuotationItem->save($con);
				}
				$this->setSupplierQuotationItem($this->aSupplierQuotationItem);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = SupplierQuotationItemCommentPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SupplierQuotationItemCommentPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += SupplierQuotationItemCommentPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
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

			if ($this->aSupplier !== null) {
				if (!$this->aSupplier->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSupplier->getValidationFailures());
				}
			}

			if ($this->aSupplierQuotationItem !== null) {
				if (!$this->aSupplierQuotationItem->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSupplierQuotationItem->getValidationFailures());
				}
			}


			if (($retval = SupplierQuotationItemCommentPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$criteria = new Criteria(SupplierQuotationItemCommentPeer::DATABASE_NAME);

		if ($this->isColumnModified(SupplierQuotationItemCommentPeer::ID)) $criteria->add(SupplierQuotationItemCommentPeer::ID, $this->id);
		if ($this->isColumnModified(SupplierQuotationItemCommentPeer::SUPPLIERQUOTATIONITEMID)) $criteria->add(SupplierQuotationItemCommentPeer::SUPPLIERQUOTATIONITEMID, $this->supplierquotationitemid);
		if ($this->isColumnModified(SupplierQuotationItemCommentPeer::SUPPLIERID)) $criteria->add(SupplierQuotationItemCommentPeer::SUPPLIERID, $this->supplierid);
		if ($this->isColumnModified(SupplierQuotationItemCommentPeer::USERID)) $criteria->add(SupplierQuotationItemCommentPeer::USERID, $this->userid);
		if ($this->isColumnModified(SupplierQuotationItemCommentPeer::PRICE)) $criteria->add(SupplierQuotationItemCommentPeer::PRICE, $this->price);
		if ($this->isColumnModified(SupplierQuotationItemCommentPeer::COMMENTS)) $criteria->add(SupplierQuotationItemCommentPeer::COMMENTS, $this->comments);
		if ($this->isColumnModified(SupplierQuotationItemCommentPeer::DELIVERY)) $criteria->add(SupplierQuotationItemCommentPeer::DELIVERY, $this->delivery);
		if ($this->isColumnModified(SupplierQuotationItemCommentPeer::CREATEDAT)) $criteria->add(SupplierQuotationItemCommentPeer::CREATEDAT, $this->createdat);

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
		$criteria = new Criteria(SupplierQuotationItemCommentPeer::DATABASE_NAME);

		$criteria->add(SupplierQuotationItemCommentPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of SupplierQuotationItemComment (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setSupplierquotationitemid($this->supplierquotationitemid);

		$copyObj->setSupplierid($this->supplierid);

		$copyObj->setUserid($this->userid);

		$copyObj->setPrice($this->price);

		$copyObj->setComments($this->comments);

		$copyObj->setDelivery($this->delivery);

		$copyObj->setCreatedat($this->createdat);


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
	 * @return     SupplierQuotationItemComment Clone of current object.
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
	 * @return     SupplierQuotationItemCommentPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SupplierQuotationItemCommentPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     SupplierQuotationItemComment The current object (for fluent API support)
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
			$v->addSupplierQuotationItemComment($this);
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
			   $this->aUser->addSupplierQuotationItemComments($this);
			 */
		}
		return $this->aUser;
	}

	/**
	 * Declares an association between this object and a Supplier object.
	 *
	 * @param      Supplier $v
	 * @return     SupplierQuotationItemComment The current object (for fluent API support)
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
			$v->addSupplierQuotationItemComment($this);
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
			   $this->aSupplier->addSupplierQuotationItemComments($this);
			 */
		}
		return $this->aSupplier;
	}

	/**
	 * Declares an association between this object and a SupplierQuotationItem object.
	 *
	 * @param      SupplierQuotationItem $v
	 * @return     SupplierQuotationItemComment The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSupplierQuotationItem(SupplierQuotationItem $v = null)
	{
		if ($v === null) {
			$this->setSupplierquotationitemid(NULL);
		} else {
			$this->setSupplierquotationitemid($v->getId());
		}

		$this->aSupplierQuotationItem = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SupplierQuotationItem object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplierQuotationItemComment($this);
		}

		return $this;
	}


	/**
	 * Get the associated SupplierQuotationItem object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     SupplierQuotationItem The associated SupplierQuotationItem object.
	 * @throws     PropelException
	 */
	public function getSupplierQuotationItem(PropelPDO $con = null)
	{
		if ($this->aSupplierQuotationItem === null && ($this->supplierquotationitemid !== null)) {
			$this->aSupplierQuotationItem = SupplierQuotationItemPeer::retrieveByPK($this->supplierquotationitemid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aSupplierQuotationItem->addSupplierQuotationItemComments($this);
			 */
		}
		return $this->aSupplierQuotationItem;
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
		} // if ($deep)

			$this->aUser = null;
			$this->aSupplier = null;
			$this->aSupplierQuotationItem = null;
	}

} // BaseSupplierQuotationItemComment
