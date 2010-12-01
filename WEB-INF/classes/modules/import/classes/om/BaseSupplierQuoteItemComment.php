<?php


/**
 * Base class that represents a row from the 'import_supplierQuoteItemComment' table.
 *
 * Feedback entre supplier y usuario admin de anmaga sobre un Item
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseSupplierQuoteItemComment extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
  const PEER = 'SupplierQuoteItemCommentPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SupplierQuoteItemCommentPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the supplierquoteitemid field.
	 * @var        int
	 */
	protected $supplierquoteitemid;

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
	 * @var        SupplierQuoteItem
	 */
	protected $aSupplierQuoteItem;

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
	 * Id
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [supplierquoteitemid] column value.
	 * Id del item de la cotizacion de proveedor
	 * @return     int
	 */
	public function getSupplierquoteitemid()
	{
		return $this->supplierquoteitemid;
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
	 * @return     SupplierQuoteItemComment The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SupplierQuoteItemCommentPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [supplierquoteitemid] column.
	 * Id del item de la cotizacion de proveedor
	 * @param      int $v new value
	 * @return     SupplierQuoteItemComment The current object (for fluent API support)
	 */
	public function setSupplierquoteitemid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->supplierquoteitemid !== $v) {
			$this->supplierquoteitemid = $v;
			$this->modifiedColumns[] = SupplierQuoteItemCommentPeer::SUPPLIERQUOTEITEMID;
		}

		if ($this->aSupplierQuoteItem !== null && $this->aSupplierQuoteItem->getId() !== $v) {
			$this->aSupplierQuoteItem = null;
		}

		return $this;
	} // setSupplierquoteitemid()

	/**
	 * Set the value of [supplierid] column.
	 * Supplier que comento
	 * @param      int $v new value
	 * @return     SupplierQuoteItemComment The current object (for fluent API support)
	 */
	public function setSupplierid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->supplierid !== $v) {
			$this->supplierid = $v;
			$this->modifiedColumns[] = SupplierQuoteItemCommentPeer::SUPPLIERID;
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
	 * @return     SupplierQuoteItemComment The current object (for fluent API support)
	 */
	public function setUserid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->userid !== $v) {
			$this->userid = $v;
			$this->modifiedColumns[] = SupplierQuoteItemCommentPeer::USERID;
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
	 * @return     SupplierQuoteItemComment The current object (for fluent API support)
	 */
	public function setPrice($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->price !== $v) {
			$this->price = $v;
			$this->modifiedColumns[] = SupplierQuoteItemCommentPeer::PRICE;
		}

		return $this;
	} // setPrice()

	/**
	 * Set the value of [comments] column.
	 * Comentarios
	 * @param      string $v new value
	 * @return     SupplierQuoteItemComment The current object (for fluent API support)
	 */
	public function setComments($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->comments !== $v) {
			$this->comments = $v;
			$this->modifiedColumns[] = SupplierQuoteItemCommentPeer::COMMENTS;
		}

		return $this;
	} // setComments()

	/**
	 * Set the value of [delivery] column.
	 * Tiempo en dias para la entrega del producto.
	 * @param      int $v new value
	 * @return     SupplierQuoteItemComment The current object (for fluent API support)
	 */
	public function setDelivery($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->delivery !== $v) {
			$this->delivery = $v;
			$this->modifiedColumns[] = SupplierQuoteItemCommentPeer::DELIVERY;
		}

		return $this;
	} // setDelivery()

	/**
	 * Sets the value of [createdat] column to a normalized version of the date/time value specified.
	 * Fecha del cambio de status
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     SupplierQuoteItemComment The current object (for fluent API support)
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
				$this->modifiedColumns[] = SupplierQuoteItemCommentPeer::CREATEDAT;
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
			$this->supplierquoteitemid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
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

			return $startcol + 8; // 8 = SupplierQuoteItemCommentPeer::NUM_COLUMNS - SupplierQuoteItemCommentPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating SupplierQuoteItemComment object", $e);
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

		if ($this->aSupplierQuoteItem !== null && $this->supplierquoteitemid !== $this->aSupplierQuoteItem->getId()) {
			$this->aSupplierQuoteItem = null;
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
			$con = Propel::getConnection(SupplierQuoteItemCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SupplierQuoteItemCommentPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aUser = null;
			$this->aSupplier = null;
			$this->aSupplierQuoteItem = null;
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
			$con = Propel::getConnection(SupplierQuoteItemCommentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				SupplierQuoteItemCommentQuery::create()
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
			$con = Propel::getConnection(SupplierQuoteItemCommentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				SupplierQuoteItemCommentPeer::addInstanceToPool($this);
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

			if ($this->aSupplier !== null) {
				if ($this->aSupplier->isModified() || $this->aSupplier->isNew()) {
					$affectedRows += $this->aSupplier->save($con);
				}
				$this->setSupplier($this->aSupplier);
			}

			if ($this->aSupplierQuoteItem !== null) {
				if ($this->aSupplierQuoteItem->isModified() || $this->aSupplierQuoteItem->isNew()) {
					$affectedRows += $this->aSupplierQuoteItem->save($con);
				}
				$this->setSupplierQuoteItem($this->aSupplierQuoteItem);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = SupplierQuoteItemCommentPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(SupplierQuoteItemCommentPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.SupplierQuoteItemCommentPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += SupplierQuoteItemCommentPeer::doUpdate($this, $con);
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

			if ($this->aSupplierQuoteItem !== null) {
				if (!$this->aSupplierQuoteItem->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSupplierQuoteItem->getValidationFailures());
				}
			}


			if (($retval = SupplierQuoteItemCommentPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = SupplierQuoteItemCommentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getSupplierquoteitemid();
				break;
			case 2:
				return $this->getSupplierid();
				break;
			case 3:
				return $this->getUserid();
				break;
			case 4:
				return $this->getPrice();
				break;
			case 5:
				return $this->getComments();
				break;
			case 6:
				return $this->getDelivery();
				break;
			case 7:
				return $this->getCreatedat();
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
		$keys = SupplierQuoteItemCommentPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getSupplierquoteitemid(),
			$keys[2] => $this->getSupplierid(),
			$keys[3] => $this->getUserid(),
			$keys[4] => $this->getPrice(),
			$keys[5] => $this->getComments(),
			$keys[6] => $this->getDelivery(),
			$keys[7] => $this->getCreatedat(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aUser) {
				$result['User'] = $this->aUser->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aSupplier) {
				$result['Supplier'] = $this->aSupplier->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aSupplierQuoteItem) {
				$result['SupplierQuoteItem'] = $this->aSupplierQuoteItem->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = SupplierQuoteItemCommentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setSupplierquoteitemid($value);
				break;
			case 2:
				$this->setSupplierid($value);
				break;
			case 3:
				$this->setUserid($value);
				break;
			case 4:
				$this->setPrice($value);
				break;
			case 5:
				$this->setComments($value);
				break;
			case 6:
				$this->setDelivery($value);
				break;
			case 7:
				$this->setCreatedat($value);
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
		$keys = SupplierQuoteItemCommentPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSupplierquoteitemid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSupplierid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUserid($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPrice($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setComments($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDelivery($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedat($arr[$keys[7]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SupplierQuoteItemCommentPeer::DATABASE_NAME);

		if ($this->isColumnModified(SupplierQuoteItemCommentPeer::ID)) $criteria->add(SupplierQuoteItemCommentPeer::ID, $this->id);
		if ($this->isColumnModified(SupplierQuoteItemCommentPeer::SUPPLIERQUOTEITEMID)) $criteria->add(SupplierQuoteItemCommentPeer::SUPPLIERQUOTEITEMID, $this->supplierquoteitemid);
		if ($this->isColumnModified(SupplierQuoteItemCommentPeer::SUPPLIERID)) $criteria->add(SupplierQuoteItemCommentPeer::SUPPLIERID, $this->supplierid);
		if ($this->isColumnModified(SupplierQuoteItemCommentPeer::USERID)) $criteria->add(SupplierQuoteItemCommentPeer::USERID, $this->userid);
		if ($this->isColumnModified(SupplierQuoteItemCommentPeer::PRICE)) $criteria->add(SupplierQuoteItemCommentPeer::PRICE, $this->price);
		if ($this->isColumnModified(SupplierQuoteItemCommentPeer::COMMENTS)) $criteria->add(SupplierQuoteItemCommentPeer::COMMENTS, $this->comments);
		if ($this->isColumnModified(SupplierQuoteItemCommentPeer::DELIVERY)) $criteria->add(SupplierQuoteItemCommentPeer::DELIVERY, $this->delivery);
		if ($this->isColumnModified(SupplierQuoteItemCommentPeer::CREATEDAT)) $criteria->add(SupplierQuoteItemCommentPeer::CREATEDAT, $this->createdat);

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
		$criteria = new Criteria(SupplierQuoteItemCommentPeer::DATABASE_NAME);
		$criteria->add(SupplierQuoteItemCommentPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of SupplierQuoteItemComment (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setSupplierquoteitemid($this->supplierquoteitemid);
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
	 * @return     SupplierQuoteItemComment Clone of current object.
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
	 * @return     SupplierQuoteItemCommentPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SupplierQuoteItemCommentPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     SupplierQuoteItemComment The current object (for fluent API support)
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
			$v->addSupplierQuoteItemComment($this);
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
			   $this->aUser->addSupplierQuoteItemComments($this);
			 */
		}
		return $this->aUser;
	}

	/**
	 * Declares an association between this object and a Supplier object.
	 *
	 * @param      Supplier $v
	 * @return     SupplierQuoteItemComment The current object (for fluent API support)
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
			$v->addSupplierQuoteItemComment($this);
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
			   $this->aSupplier->addSupplierQuoteItemComments($this);
			 */
		}
		return $this->aSupplier;
	}

	/**
	 * Declares an association between this object and a SupplierQuoteItem object.
	 *
	 * @param      SupplierQuoteItem $v
	 * @return     SupplierQuoteItemComment The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSupplierQuoteItem(SupplierQuoteItem $v = null)
	{
		if ($v === null) {
			$this->setSupplierquoteitemid(NULL);
		} else {
			$this->setSupplierquoteitemid($v->getId());
		}

		$this->aSupplierQuoteItem = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SupplierQuoteItem object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplierQuoteItemComment($this);
		}

		return $this;
	}


	/**
	 * Get the associated SupplierQuoteItem object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     SupplierQuoteItem The associated SupplierQuoteItem object.
	 * @throws     PropelException
	 */
	public function getSupplierQuoteItem(PropelPDO $con = null)
	{
		if ($this->aSupplierQuoteItem === null && ($this->supplierquoteitemid !== null)) {
			$this->aSupplierQuoteItem = SupplierQuoteItemQuery::create()->findPk($this->supplierquoteitemid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aSupplierQuoteItem->addSupplierQuoteItemComments($this);
			 */
		}
		return $this->aSupplierQuoteItem;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->supplierquoteitemid = null;
		$this->supplierid = null;
		$this->userid = null;
		$this->price = null;
		$this->comments = null;
		$this->delivery = null;
		$this->createdat = null;
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
		} // if ($deep)

		$this->aUser = null;
		$this->aSupplier = null;
		$this->aSupplierQuoteItem = null;
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

} // BaseSupplierQuoteItemComment