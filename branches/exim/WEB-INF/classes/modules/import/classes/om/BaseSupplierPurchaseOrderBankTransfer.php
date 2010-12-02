<?php


/**
 * Base class that represents a row from the 'import_supplierPurchaseOrderBankTransfer' table.
 *
 * Transferencias bancarias realizadas a esa orden de pedido a proveedor
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseSupplierPurchaseOrderBankTransfer extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'SupplierPurchaseOrderBankTransferPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SupplierPurchaseOrderBankTransferPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the supplierpurchaseorderid field.
	 * @var        int
	 */
	protected $supplierpurchaseorderid;

	/**
	 * The value for the banktransfernumber field.
	 * @var        string
	 */
	protected $banktransfernumber;

	/**
	 * The value for the amount field.
	 * @var        double
	 */
	protected $amount;

	/**
	 * The value for the accountnumber field.
	 * @var        string
	 */
	protected $accountnumber;

	/**
	 * The value for the bankaccountid field.
	 * @var        int
	 */
	protected $bankaccountid;

	/**
	 * The value for the createdat field.
	 * @var        string
	 */
	protected $createdat;

	/**
	 * @var        SupplierPurchaseOrder
	 */
	protected $aSupplierPurchaseOrder;

	/**
	 * @var        BankAccount
	 */
	protected $aBankAccount;

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
	 * Get the [supplierpurchaseorderid] column value.
	 * Id de orden de pedido a proveedor
	 * @return     int
	 */
	public function getSupplierpurchaseorderid()
	{
		return $this->supplierpurchaseorderid;
	}

	/**
	 * Get the [banktransfernumber] column value.
	 * numero de transferencia bancaria.
	 * @return     string
	 */
	public function getBanktransfernumber()
	{
		return $this->banktransfernumber;
	}

	/**
	 * Get the [amount] column value.
	 * monto de la transferencia bancaria.
	 * @return     double
	 */
	public function getAmount()
	{
		return $this->amount;
	}

	/**
	 * Get the [accountnumber] column value.
	 * Numero de cuenta bancaria destino
	 * @return     string
	 */
	public function getAccountnumber()
	{
		return $this->accountnumber;
	}

	/**
	 * Get the [bankaccountid] column value.
	 * Cuenta bancaria origen
	 * @return     int
	 */
	public function getBankaccountid()
	{
		return $this->bankaccountid;
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
	 * Set the value of [id] column.
	 * Id
	 * @param      int $v new value
	 * @return     SupplierPurchaseOrderBankTransfer The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderBankTransferPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [supplierpurchaseorderid] column.
	 * Id de orden de pedido a proveedor
	 * @param      int $v new value
	 * @return     SupplierPurchaseOrderBankTransfer The current object (for fluent API support)
	 */
	public function setSupplierpurchaseorderid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->supplierpurchaseorderid !== $v) {
			$this->supplierpurchaseorderid = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderBankTransferPeer::SUPPLIERPURCHASEORDERID;
		}

		if ($this->aSupplierPurchaseOrder !== null && $this->aSupplierPurchaseOrder->getId() !== $v) {
			$this->aSupplierPurchaseOrder = null;
		}

		return $this;
	} // setSupplierpurchaseorderid()

	/**
	 * Set the value of [banktransfernumber] column.
	 * numero de transferencia bancaria.
	 * @param      string $v new value
	 * @return     SupplierPurchaseOrderBankTransfer The current object (for fluent API support)
	 */
	public function setBanktransfernumber($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->banktransfernumber !== $v) {
			$this->banktransfernumber = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderBankTransferPeer::BANKTRANSFERNUMBER;
		}

		return $this;
	} // setBanktransfernumber()

	/**
	 * Set the value of [amount] column.
	 * monto de la transferencia bancaria.
	 * @param      double $v new value
	 * @return     SupplierPurchaseOrderBankTransfer The current object (for fluent API support)
	 */
	public function setAmount($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->amount !== $v) {
			$this->amount = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderBankTransferPeer::AMOUNT;
		}

		return $this;
	} // setAmount()

	/**
	 * Set the value of [accountnumber] column.
	 * Numero de cuenta bancaria destino
	 * @param      string $v new value
	 * @return     SupplierPurchaseOrderBankTransfer The current object (for fluent API support)
	 */
	public function setAccountnumber($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->accountnumber !== $v) {
			$this->accountnumber = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderBankTransferPeer::ACCOUNTNUMBER;
		}

		return $this;
	} // setAccountnumber()

	/**
	 * Set the value of [bankaccountid] column.
	 * Cuenta bancaria origen
	 * @param      int $v new value
	 * @return     SupplierPurchaseOrderBankTransfer The current object (for fluent API support)
	 */
	public function setBankaccountid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->bankaccountid !== $v) {
			$this->bankaccountid = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderBankTransferPeer::BANKACCOUNTID;
		}

		if ($this->aBankAccount !== null && $this->aBankAccount->getId() !== $v) {
			$this->aBankAccount = null;
		}

		return $this;
	} // setBankaccountid()

	/**
	 * Sets the value of [createdat] column to a normalized version of the date/time value specified.
	 * Creation date for
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     SupplierPurchaseOrderBankTransfer The current object (for fluent API support)
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
				$this->modifiedColumns[] = SupplierPurchaseOrderBankTransferPeer::CREATEDAT;
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
			$this->supplierpurchaseorderid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->banktransfernumber = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->amount = ($row[$startcol + 3] !== null) ? (double) $row[$startcol + 3] : null;
			$this->accountnumber = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->bankaccountid = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->createdat = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 7; // 7 = SupplierPurchaseOrderBankTransferPeer::NUM_COLUMNS - SupplierPurchaseOrderBankTransferPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating SupplierPurchaseOrderBankTransfer object", $e);
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

		if ($this->aSupplierPurchaseOrder !== null && $this->supplierpurchaseorderid !== $this->aSupplierPurchaseOrder->getId()) {
			$this->aSupplierPurchaseOrder = null;
		}
		if ($this->aBankAccount !== null && $this->bankaccountid !== $this->aBankAccount->getId()) {
			$this->aBankAccount = null;
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
			$con = Propel::getConnection(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SupplierPurchaseOrderBankTransferPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aSupplierPurchaseOrder = null;
			$this->aBankAccount = null;
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
			$con = Propel::getConnection(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				SupplierPurchaseOrderBankTransferQuery::create()
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
			$con = Propel::getConnection(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				SupplierPurchaseOrderBankTransferPeer::addInstanceToPool($this);
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

			if ($this->aSupplierPurchaseOrder !== null) {
				if ($this->aSupplierPurchaseOrder->isModified() || $this->aSupplierPurchaseOrder->isNew()) {
					$affectedRows += $this->aSupplierPurchaseOrder->save($con);
				}
				$this->setSupplierPurchaseOrder($this->aSupplierPurchaseOrder);
			}

			if ($this->aBankAccount !== null) {
				if ($this->aBankAccount->isModified() || $this->aBankAccount->isNew()) {
					$affectedRows += $this->aBankAccount->save($con);
				}
				$this->setBankAccount($this->aBankAccount);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = SupplierPurchaseOrderBankTransferPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(SupplierPurchaseOrderBankTransferPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.SupplierPurchaseOrderBankTransferPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += SupplierPurchaseOrderBankTransferPeer::doUpdate($this, $con);
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

			if ($this->aSupplierPurchaseOrder !== null) {
				if (!$this->aSupplierPurchaseOrder->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSupplierPurchaseOrder->getValidationFailures());
				}
			}

			if ($this->aBankAccount !== null) {
				if (!$this->aBankAccount->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aBankAccount->getValidationFailures());
				}
			}


			if (($retval = SupplierPurchaseOrderBankTransferPeer::doValidate($this, $columns)) !== true) {
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
		$pos = SupplierPurchaseOrderBankTransferPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getSupplierpurchaseorderid();
				break;
			case 2:
				return $this->getBanktransfernumber();
				break;
			case 3:
				return $this->getAmount();
				break;
			case 4:
				return $this->getAccountnumber();
				break;
			case 5:
				return $this->getBankaccountid();
				break;
			case 6:
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
		$keys = SupplierPurchaseOrderBankTransferPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getSupplierpurchaseorderid(),
			$keys[2] => $this->getBanktransfernumber(),
			$keys[3] => $this->getAmount(),
			$keys[4] => $this->getAccountnumber(),
			$keys[5] => $this->getBankaccountid(),
			$keys[6] => $this->getCreatedat(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aSupplierPurchaseOrder) {
				$result['SupplierPurchaseOrder'] = $this->aSupplierPurchaseOrder->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aBankAccount) {
				$result['BankAccount'] = $this->aBankAccount->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = SupplierPurchaseOrderBankTransferPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setSupplierpurchaseorderid($value);
				break;
			case 2:
				$this->setBanktransfernumber($value);
				break;
			case 3:
				$this->setAmount($value);
				break;
			case 4:
				$this->setAccountnumber($value);
				break;
			case 5:
				$this->setBankaccountid($value);
				break;
			case 6:
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
		$keys = SupplierPurchaseOrderBankTransferPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSupplierpurchaseorderid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setBanktransfernumber($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAmount($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAccountnumber($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setBankaccountid($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedat($arr[$keys[6]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME);

		if ($this->isColumnModified(SupplierPurchaseOrderBankTransferPeer::ID)) $criteria->add(SupplierPurchaseOrderBankTransferPeer::ID, $this->id);
		if ($this->isColumnModified(SupplierPurchaseOrderBankTransferPeer::SUPPLIERPURCHASEORDERID)) $criteria->add(SupplierPurchaseOrderBankTransferPeer::SUPPLIERPURCHASEORDERID, $this->supplierpurchaseorderid);
		if ($this->isColumnModified(SupplierPurchaseOrderBankTransferPeer::BANKTRANSFERNUMBER)) $criteria->add(SupplierPurchaseOrderBankTransferPeer::BANKTRANSFERNUMBER, $this->banktransfernumber);
		if ($this->isColumnModified(SupplierPurchaseOrderBankTransferPeer::AMOUNT)) $criteria->add(SupplierPurchaseOrderBankTransferPeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(SupplierPurchaseOrderBankTransferPeer::ACCOUNTNUMBER)) $criteria->add(SupplierPurchaseOrderBankTransferPeer::ACCOUNTNUMBER, $this->accountnumber);
		if ($this->isColumnModified(SupplierPurchaseOrderBankTransferPeer::BANKACCOUNTID)) $criteria->add(SupplierPurchaseOrderBankTransferPeer::BANKACCOUNTID, $this->bankaccountid);
		if ($this->isColumnModified(SupplierPurchaseOrderBankTransferPeer::CREATEDAT)) $criteria->add(SupplierPurchaseOrderBankTransferPeer::CREATEDAT, $this->createdat);

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
		$criteria = new Criteria(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME);
		$criteria->add(SupplierPurchaseOrderBankTransferPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of SupplierPurchaseOrderBankTransfer (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setSupplierpurchaseorderid($this->supplierpurchaseorderid);
		$copyObj->setBanktransfernumber($this->banktransfernumber);
		$copyObj->setAmount($this->amount);
		$copyObj->setAccountnumber($this->accountnumber);
		$copyObj->setBankaccountid($this->bankaccountid);
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
	 * @return     SupplierPurchaseOrderBankTransfer Clone of current object.
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
	 * @return     SupplierPurchaseOrderBankTransferPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SupplierPurchaseOrderBankTransferPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a SupplierPurchaseOrder object.
	 *
	 * @param      SupplierPurchaseOrder $v
	 * @return     SupplierPurchaseOrderBankTransfer The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSupplierPurchaseOrder(SupplierPurchaseOrder $v = null)
	{
		if ($v === null) {
			$this->setSupplierpurchaseorderid(NULL);
		} else {
			$this->setSupplierpurchaseorderid($v->getId());
		}

		$this->aSupplierPurchaseOrder = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SupplierPurchaseOrder object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplierPurchaseOrderBankTransfer($this);
		}

		return $this;
	}


	/**
	 * Get the associated SupplierPurchaseOrder object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     SupplierPurchaseOrder The associated SupplierPurchaseOrder object.
	 * @throws     PropelException
	 */
	public function getSupplierPurchaseOrder(PropelPDO $con = null)
	{
		if ($this->aSupplierPurchaseOrder === null && ($this->supplierpurchaseorderid !== null)) {
			$this->aSupplierPurchaseOrder = SupplierPurchaseOrderQuery::create()->findPk($this->supplierpurchaseorderid, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aSupplierPurchaseOrder->addSupplierPurchaseOrderBankTransfers($this);
			 */
		}
		return $this->aSupplierPurchaseOrder;
	}

	/**
	 * Declares an association between this object and a BankAccount object.
	 *
	 * @param      BankAccount $v
	 * @return     SupplierPurchaseOrderBankTransfer The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setBankAccount(BankAccount $v = null)
	{
		if ($v === null) {
			$this->setBankaccountid(NULL);
		} else {
			$this->setBankaccountid($v->getId());
		}

		$this->aBankAccount = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the BankAccount object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplierPurchaseOrderBankTransfer($this);
		}

		return $this;
	}


	/**
	 * Get the associated BankAccount object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     BankAccount The associated BankAccount object.
	 * @throws     PropelException
	 */
	public function getBankAccount(PropelPDO $con = null)
	{
		if ($this->aBankAccount === null && ($this->bankaccountid !== null)) {
			$this->aBankAccount = BankAccountQuery::create()->findPk($this->bankaccountid, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aBankAccount->addSupplierPurchaseOrderBankTransfers($this);
			 */
		}
		return $this->aBankAccount;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->supplierpurchaseorderid = null;
		$this->banktransfernumber = null;
		$this->amount = null;
		$this->accountnumber = null;
		$this->bankaccountid = null;
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

		$this->aSupplierPurchaseOrder = null;
		$this->aBankAccount = null;
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

} // BaseSupplierPurchaseOrderBankTransfer
