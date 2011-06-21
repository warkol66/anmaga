<?php


/**
 * Base class that represents a row from the 'orders_order' table.
 *
 * Pedido de Productos
 *
 * @package    propel.generator.orders.classes.om
 */
abstract class BaseOrder extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'OrderPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        OrderPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the number field.
	 * @var        int
	 */
	protected $number;

	/**
	 * The value for the created field.
	 * @var        string
	 */
	protected $created;

	/**
	 * The value for the userid field.
	 * @var        int
	 */
	protected $userid;

	/**
	 * The value for the affiliateid field.
	 * @var        int
	 */
	protected $affiliateid;

	/**
	 * The value for the branchid field.
	 * @var        int
	 */
	protected $branchid;

	/**
	 * The value for the total field.
	 * @var        double
	 */
	protected $total;

	/**
	 * The value for the state field.
	 * @var        int
	 */
	protected $state;

	/**
	 * @var        AffiliateUser
	 */
	protected $aAffiliateUser;

	/**
	 * @var        Affiliate
	 */
	protected $aAffiliate;

	/**
	 * @var        AffiliateBranch
	 */
	protected $aAffiliateBranch;

	/**
	 * @var        array OrderItem[] Collection to store aggregation of OrderItem objects.
	 */
	protected $collOrderItems;

	/**
	 * @var        array OrderStateChange[] Collection to store aggregation of OrderStateChange objects.
	 */
	protected $collOrderStateChanges;

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
	 * Id del pedido
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [number] column value.
	 * Numero interno del pedido
	 * @return     int
	 */
	public function getNumber()
	{
		return $this->number;
	}

	/**
	 * Get the [optionally formatted] temporal [created] column value.
	 * Fecha en que se creo el pedido
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCreated($format = 'Y-m-d H:i:s')
	{
		if ($this->created === null) {
			return null;
		}


		if ($this->created === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->created);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created, true), $x);
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
	 * Get the [userid] column value.
	 * Id del usuario
	 * @return     int
	 */
	public function getUserid()
	{
		return $this->userid;
	}

	/**
	 * Get the [affiliateid] column value.
	 * Id del afiliado
	 * @return     int
	 */
	public function getAffiliateid()
	{
		return $this->affiliateid;
	}

	/**
	 * Get the [branchid] column value.
	 * Id de la sucursal
	 * @return     int
	 */
	public function getBranchid()
	{
		return $this->branchid;
	}

	/**
	 * Get the [total] column value.
	 * Precio total del pedido
	 * @return     double
	 */
	public function getTotal()
	{
		return $this->total;
	}

	/**
	 * Get the [state] column value.
	 * Estado del pedido
	 * @return     int
	 */
	public function getState()
	{
		return $this->state;
	}

	/**
	 * Set the value of [id] column.
	 * Id del pedido
	 * @param      int $v new value
	 * @return     Order The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OrderPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [number] column.
	 * Numero interno del pedido
	 * @param      int $v new value
	 * @return     Order The current object (for fluent API support)
	 */
	public function setNumber($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->number !== $v) {
			$this->number = $v;
			$this->modifiedColumns[] = OrderPeer::NUMBER;
		}

		return $this;
	} // setNumber()

	/**
	 * Sets the value of [created] column to a normalized version of the date/time value specified.
	 * Fecha en que se creo el pedido
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Order The current object (for fluent API support)
	 */
	public function setCreated($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->created !== null || $dt !== null) {
			$currentDateAsString = ($this->created !== null && $tmpDt = new DateTime($this->created)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->created = $newDateAsString;
				$this->modifiedColumns[] = OrderPeer::CREATED;
			}
		} // if either are not null

		return $this;
	} // setCreated()

	/**
	 * Set the value of [userid] column.
	 * Id del usuario
	 * @param      int $v new value
	 * @return     Order The current object (for fluent API support)
	 */
	public function setUserid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->userid !== $v) {
			$this->userid = $v;
			$this->modifiedColumns[] = OrderPeer::USERID;
		}

		if ($this->aAffiliateUser !== null && $this->aAffiliateUser->getId() !== $v) {
			$this->aAffiliateUser = null;
		}

		return $this;
	} // setUserid()

	/**
	 * Set the value of [affiliateid] column.
	 * Id del afiliado
	 * @param      int $v new value
	 * @return     Order The current object (for fluent API support)
	 */
	public function setAffiliateid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->affiliateid !== $v) {
			$this->affiliateid = $v;
			$this->modifiedColumns[] = OrderPeer::AFFILIATEID;
		}

		if ($this->aAffiliate !== null && $this->aAffiliate->getId() !== $v) {
			$this->aAffiliate = null;
		}

		return $this;
	} // setAffiliateid()

	/**
	 * Set the value of [branchid] column.
	 * Id de la sucursal
	 * @param      int $v new value
	 * @return     Order The current object (for fluent API support)
	 */
	public function setBranchid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->branchid !== $v) {
			$this->branchid = $v;
			$this->modifiedColumns[] = OrderPeer::BRANCHID;
		}

		if ($this->aAffiliateBranch !== null && $this->aAffiliateBranch->getId() !== $v) {
			$this->aAffiliateBranch = null;
		}

		return $this;
	} // setBranchid()

	/**
	 * Set the value of [total] column.
	 * Precio total del pedido
	 * @param      double $v new value
	 * @return     Order The current object (for fluent API support)
	 */
	public function setTotal($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->total !== $v) {
			$this->total = $v;
			$this->modifiedColumns[] = OrderPeer::TOTAL;
		}

		return $this;
	} // setTotal()

	/**
	 * Set the value of [state] column.
	 * Estado del pedido
	 * @param      int $v new value
	 * @return     Order The current object (for fluent API support)
	 */
	public function setState($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->state !== $v) {
			$this->state = $v;
			$this->modifiedColumns[] = OrderPeer::STATE;
		}

		return $this;
	} // setState()

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
			$this->number = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->created = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->userid = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->affiliateid = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->branchid = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->total = ($row[$startcol + 6] !== null) ? (double) $row[$startcol + 6] : null;
			$this->state = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 8; // 8 = OrderPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Order object", $e);
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

		if ($this->aAffiliateUser !== null && $this->userid !== $this->aAffiliateUser->getId()) {
			$this->aAffiliateUser = null;
		}
		if ($this->aAffiliate !== null && $this->affiliateid !== $this->aAffiliate->getId()) {
			$this->aAffiliate = null;
		}
		if ($this->aAffiliateBranch !== null && $this->branchid !== $this->aAffiliateBranch->getId()) {
			$this->aAffiliateBranch = null;
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
			$con = Propel::getConnection(OrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = OrderPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aAffiliateUser = null;
			$this->aAffiliate = null;
			$this->aAffiliateBranch = null;
			$this->collOrderItems = null;

			$this->collOrderStateChanges = null;

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
			$con = Propel::getConnection(OrderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				OrderQuery::create()
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
			$con = Propel::getConnection(OrderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				OrderPeer::addInstanceToPool($this);
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

			if ($this->aAffiliateUser !== null) {
				if ($this->aAffiliateUser->isModified() || $this->aAffiliateUser->isNew()) {
					$affectedRows += $this->aAffiliateUser->save($con);
				}
				$this->setAffiliateUser($this->aAffiliateUser);
			}

			if ($this->aAffiliate !== null) {
				if ($this->aAffiliate->isModified() || $this->aAffiliate->isNew()) {
					$affectedRows += $this->aAffiliate->save($con);
				}
				$this->setAffiliate($this->aAffiliate);
			}

			if ($this->aAffiliateBranch !== null) {
				if ($this->aAffiliateBranch->isModified() || $this->aAffiliateBranch->isNew()) {
					$affectedRows += $this->aAffiliateBranch->save($con);
				}
				$this->setAffiliateBranch($this->aAffiliateBranch);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = OrderPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(OrderPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.OrderPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += OrderPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collOrderItems !== null) {
				foreach ($this->collOrderItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collOrderStateChanges !== null) {
				foreach ($this->collOrderStateChanges as $referrerFK) {
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

			if ($this->aAffiliateUser !== null) {
				if (!$this->aAffiliateUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAffiliateUser->getValidationFailures());
				}
			}

			if ($this->aAffiliate !== null) {
				if (!$this->aAffiliate->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAffiliate->getValidationFailures());
				}
			}

			if ($this->aAffiliateBranch !== null) {
				if (!$this->aAffiliateBranch->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAffiliateBranch->getValidationFailures());
				}
			}


			if (($retval = OrderPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collOrderItems !== null) {
					foreach ($this->collOrderItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collOrderStateChanges !== null) {
					foreach ($this->collOrderStateChanges as $referrerFK) {
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
		$pos = OrderPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getNumber();
				break;
			case 2:
				return $this->getCreated();
				break;
			case 3:
				return $this->getUserid();
				break;
			case 4:
				return $this->getAffiliateid();
				break;
			case 5:
				return $this->getBranchid();
				break;
			case 6:
				return $this->getTotal();
				break;
			case 7:
				return $this->getState();
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
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
	{
		if (isset($alreadyDumpedObjects['Order'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Order'][$this->getPrimaryKey()] = true;
		$keys = OrderPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNumber(),
			$keys[2] => $this->getCreated(),
			$keys[3] => $this->getUserid(),
			$keys[4] => $this->getAffiliateid(),
			$keys[5] => $this->getBranchid(),
			$keys[6] => $this->getTotal(),
			$keys[7] => $this->getState(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aAffiliateUser) {
				$result['AffiliateUser'] = $this->aAffiliateUser->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aAffiliate) {
				$result['Affiliate'] = $this->aAffiliate->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aAffiliateBranch) {
				$result['AffiliateBranch'] = $this->aAffiliateBranch->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collOrderItems) {
				$result['OrderItems'] = $this->collOrderItems->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collOrderStateChanges) {
				$result['OrderStateChanges'] = $this->collOrderStateChanges->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = OrderPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setNumber($value);
				break;
			case 2:
				$this->setCreated($value);
				break;
			case 3:
				$this->setUserid($value);
				break;
			case 4:
				$this->setAffiliateid($value);
				break;
			case 5:
				$this->setBranchid($value);
				break;
			case 6:
				$this->setTotal($value);
				break;
			case 7:
				$this->setState($value);
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
		$keys = OrderPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumber($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCreated($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUserid($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAffiliateid($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setBranchid($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTotal($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setState($arr[$keys[7]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(OrderPeer::DATABASE_NAME);

		if ($this->isColumnModified(OrderPeer::ID)) $criteria->add(OrderPeer::ID, $this->id);
		if ($this->isColumnModified(OrderPeer::NUMBER)) $criteria->add(OrderPeer::NUMBER, $this->number);
		if ($this->isColumnModified(OrderPeer::CREATED)) $criteria->add(OrderPeer::CREATED, $this->created);
		if ($this->isColumnModified(OrderPeer::USERID)) $criteria->add(OrderPeer::USERID, $this->userid);
		if ($this->isColumnModified(OrderPeer::AFFILIATEID)) $criteria->add(OrderPeer::AFFILIATEID, $this->affiliateid);
		if ($this->isColumnModified(OrderPeer::BRANCHID)) $criteria->add(OrderPeer::BRANCHID, $this->branchid);
		if ($this->isColumnModified(OrderPeer::TOTAL)) $criteria->add(OrderPeer::TOTAL, $this->total);
		if ($this->isColumnModified(OrderPeer::STATE)) $criteria->add(OrderPeer::STATE, $this->state);

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
		$criteria = new Criteria(OrderPeer::DATABASE_NAME);
		$criteria->add(OrderPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Order (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setNumber($this->getNumber());
		$copyObj->setCreated($this->getCreated());
		$copyObj->setUserid($this->getUserid());
		$copyObj->setAffiliateid($this->getAffiliateid());
		$copyObj->setBranchid($this->getBranchid());
		$copyObj->setTotal($this->getTotal());
		$copyObj->setState($this->getState());

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getOrderItems() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addOrderItem($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getOrderStateChanges() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addOrderStateChange($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
		}
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
	 * @return     Order Clone of current object.
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
	 * @return     OrderPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new OrderPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a AffiliateUser object.
	 *
	 * @param      AffiliateUser $v
	 * @return     Order The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setAffiliateUser(AffiliateUser $v = null)
	{
		if ($v === null) {
			$this->setUserid(NULL);
		} else {
			$this->setUserid($v->getId());
		}

		$this->aAffiliateUser = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the AffiliateUser object, it will not be re-added.
		if ($v !== null) {
			$v->addOrder($this);
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
		if ($this->aAffiliateUser === null && ($this->userid !== null)) {
			$this->aAffiliateUser = AffiliateUserQuery::create()->findPk($this->userid, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aAffiliateUser->addOrders($this);
			 */
		}
		return $this->aAffiliateUser;
	}

	/**
	 * Declares an association between this object and a Affiliate object.
	 *
	 * @param      Affiliate $v
	 * @return     Order The current object (for fluent API support)
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
			$v->addOrder($this);
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
				$this->aAffiliate->addOrders($this);
			 */
		}
		return $this->aAffiliate;
	}

	/**
	 * Declares an association between this object and a AffiliateBranch object.
	 *
	 * @param      AffiliateBranch $v
	 * @return     Order The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setAffiliateBranch(AffiliateBranch $v = null)
	{
		if ($v === null) {
			$this->setBranchid(NULL);
		} else {
			$this->setBranchid($v->getId());
		}

		$this->aAffiliateBranch = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the AffiliateBranch object, it will not be re-added.
		if ($v !== null) {
			$v->addOrder($this);
		}

		return $this;
	}


	/**
	 * Get the associated AffiliateBranch object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     AffiliateBranch The associated AffiliateBranch object.
	 * @throws     PropelException
	 */
	public function getAffiliateBranch(PropelPDO $con = null)
	{
		if ($this->aAffiliateBranch === null && ($this->branchid !== null)) {
			$this->aAffiliateBranch = AffiliateBranchQuery::create()->findPk($this->branchid, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aAffiliateBranch->addOrders($this);
			 */
		}
		return $this->aAffiliateBranch;
	}

	/**
	 * Clears out the collOrderItems collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addOrderItems()
	 */
	public function clearOrderItems()
	{
		$this->collOrderItems = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collOrderItems collection.
	 *
	 * By default this just sets the collOrderItems collection to an empty array (like clearcollOrderItems());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initOrderItems($overrideExisting = true)
	{
		if (null !== $this->collOrderItems && !$overrideExisting) {
			return;
		}
		$this->collOrderItems = new PropelObjectCollection();
		$this->collOrderItems->setModel('OrderItem');
	}

	/**
	 * Gets an array of OrderItem objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Order is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array OrderItem[] List of OrderItem objects
	 * @throws     PropelException
	 */
	public function getOrderItems($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collOrderItems || null !== $criteria) {
			if ($this->isNew() && null === $this->collOrderItems) {
				// return empty collection
				$this->initOrderItems();
			} else {
				$collOrderItems = OrderItemQuery::create(null, $criteria)
					->filterByOrder($this)
					->find($con);
				if (null !== $criteria) {
					return $collOrderItems;
				}
				$this->collOrderItems = $collOrderItems;
			}
		}
		return $this->collOrderItems;
	}

	/**
	 * Returns the number of related OrderItem objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related OrderItem objects.
	 * @throws     PropelException
	 */
	public function countOrderItems(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collOrderItems || null !== $criteria) {
			if ($this->isNew() && null === $this->collOrderItems) {
				return 0;
			} else {
				$query = OrderItemQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByOrder($this)
					->count($con);
			}
		} else {
			return count($this->collOrderItems);
		}
	}

	/**
	 * Method called to associate a OrderItem object to this object
	 * through the OrderItem foreign key attribute.
	 *
	 * @param      OrderItem $l OrderItem
	 * @return     void
	 * @throws     PropelException
	 */
	public function addOrderItem(OrderItem $l)
	{
		if ($this->collOrderItems === null) {
			$this->initOrderItems();
		}
		if (!$this->collOrderItems->contains($l)) { // only add it if the **same** object is not already associated
			$this->collOrderItems[]= $l;
			$l->setOrder($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Order is new, it will return
	 * an empty collection; or if this Order has previously
	 * been saved, it will retrieve related OrderItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Order.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array OrderItem[] List of OrderItem objects
	 */
	public function getOrderItemsJoinProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = OrderItemQuery::create(null, $criteria);
		$query->joinWith('Product', $join_behavior);

		return $this->getOrderItems($query, $con);
	}

	/**
	 * Clears out the collOrderStateChanges collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addOrderStateChanges()
	 */
	public function clearOrderStateChanges()
	{
		$this->collOrderStateChanges = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collOrderStateChanges collection.
	 *
	 * By default this just sets the collOrderStateChanges collection to an empty array (like clearcollOrderStateChanges());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initOrderStateChanges($overrideExisting = true)
	{
		if (null !== $this->collOrderStateChanges && !$overrideExisting) {
			return;
		}
		$this->collOrderStateChanges = new PropelObjectCollection();
		$this->collOrderStateChanges->setModel('OrderStateChange');
	}

	/**
	 * Gets an array of OrderStateChange objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Order is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array OrderStateChange[] List of OrderStateChange objects
	 * @throws     PropelException
	 */
	public function getOrderStateChanges($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collOrderStateChanges || null !== $criteria) {
			if ($this->isNew() && null === $this->collOrderStateChanges) {
				// return empty collection
				$this->initOrderStateChanges();
			} else {
				$collOrderStateChanges = OrderStateChangeQuery::create(null, $criteria)
					->filterByOrder($this)
					->find($con);
				if (null !== $criteria) {
					return $collOrderStateChanges;
				}
				$this->collOrderStateChanges = $collOrderStateChanges;
			}
		}
		return $this->collOrderStateChanges;
	}

	/**
	 * Returns the number of related OrderStateChange objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related OrderStateChange objects.
	 * @throws     PropelException
	 */
	public function countOrderStateChanges(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collOrderStateChanges || null !== $criteria) {
			if ($this->isNew() && null === $this->collOrderStateChanges) {
				return 0;
			} else {
				$query = OrderStateChangeQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByOrder($this)
					->count($con);
			}
		} else {
			return count($this->collOrderStateChanges);
		}
	}

	/**
	 * Method called to associate a OrderStateChange object to this object
	 * through the OrderStateChange foreign key attribute.
	 *
	 * @param      OrderStateChange $l OrderStateChange
	 * @return     void
	 * @throws     PropelException
	 */
	public function addOrderStateChange(OrderStateChange $l)
	{
		if ($this->collOrderStateChanges === null) {
			$this->initOrderStateChanges();
		}
		if (!$this->collOrderStateChanges->contains($l)) { // only add it if the **same** object is not already associated
			$this->collOrderStateChanges[]= $l;
			$l->setOrder($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Order is new, it will return
	 * an empty collection; or if this Order has previously
	 * been saved, it will retrieve related OrderStateChanges from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Order.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array OrderStateChange[] List of OrderStateChange objects
	 */
	public function getOrderStateChangesJoinAffiliateUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = OrderStateChangeQuery::create(null, $criteria);
		$query->joinWith('AffiliateUser', $join_behavior);

		return $this->getOrderStateChanges($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Order is new, it will return
	 * an empty collection; or if this Order has previously
	 * been saved, it will retrieve related OrderStateChanges from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Order.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array OrderStateChange[] List of OrderStateChange objects
	 */
	public function getOrderStateChangesJoinAffiliate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = OrderStateChangeQuery::create(null, $criteria);
		$query->joinWith('Affiliate', $join_behavior);

		return $this->getOrderStateChanges($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->number = null;
		$this->created = null;
		$this->userid = null;
		$this->affiliateid = null;
		$this->branchid = null;
		$this->total = null;
		$this->state = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collOrderItems) {
				foreach ($this->collOrderItems as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collOrderStateChanges) {
				foreach ($this->collOrderStateChanges as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collOrderItems instanceof PropelCollection) {
			$this->collOrderItems->clearIterator();
		}
		$this->collOrderItems = null;
		if ($this->collOrderStateChanges instanceof PropelCollection) {
			$this->collOrderStateChanges->clearIterator();
		}
		$this->collOrderStateChanges = null;
		$this->aAffiliateUser = null;
		$this->aAffiliate = null;
		$this->aAffiliateBranch = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(OrderPeer::DEFAULT_STRING_FORMAT);
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

} // BaseOrder