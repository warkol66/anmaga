<?php


/**
 * Base class that represents a row from the 'import_supplier' table.
 *
 * Proveedores
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseSupplier extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'SupplierPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SupplierPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the active field.
	 * @var        boolean
	 */
	protected $active;

	/**
	 * The value for the defaultincotermid field.
	 * @var        int
	 */
	protected $defaultincotermid;

	/**
	 * The value for the defaultportid field.
	 * @var        int
	 */
	protected $defaultportid;

	/**
	 * @var        Incoterm
	 */
	protected $aIncoterm;

	/**
	 * @var        Port
	 */
	protected $aPort;

	/**
	 * @var        array ProductSupplier[] Collection to store aggregation of ProductSupplier objects.
	 */
	protected $collProductSuppliers;

	/**
	 * @var        array SupplierQuote[] Collection to store aggregation of SupplierQuote objects.
	 */
	protected $collSupplierQuotes;

	/**
	 * @var        array SupplierQuoteItemComment[] Collection to store aggregation of SupplierQuoteItemComment objects.
	 */
	protected $collSupplierQuoteItemComments;

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
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [name] column value.
	 * Nombre
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [email] column value.
	 * email
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Get the [active] column value.
	 * Is supplier active?
	 * @return     boolean
	 */
	public function getActive()
	{
		return $this->active;
	}

	/**
	 * Get the [defaultincotermid] column value.
	 * id de incoterm por default del proveedor
	 * @return     int
	 */
	public function getDefaultincotermid()
	{
		return $this->defaultincotermid;
	}

	/**
	 * Get the [defaultportid] column value.
	 * id de puerto por default del proveedor
	 * @return     int
	 */
	public function getDefaultportid()
	{
		return $this->defaultportid;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Supplier The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SupplierPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [name] column.
	 * Nombre
	 * @param      string $v new value
	 * @return     Supplier The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = SupplierPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [email] column.
	 * email
	 * @param      string $v new value
	 * @return     Supplier The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = SupplierPeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [active] column.
	 * Is supplier active?
	 * @param      boolean $v new value
	 * @return     Supplier The current object (for fluent API support)
	 */
	public function setActive($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->active !== $v) {
			$this->active = $v;
			$this->modifiedColumns[] = SupplierPeer::ACTIVE;
		}

		return $this;
	} // setActive()

	/**
	 * Set the value of [defaultincotermid] column.
	 * id de incoterm por default del proveedor
	 * @param      int $v new value
	 * @return     Supplier The current object (for fluent API support)
	 */
	public function setDefaultincotermid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->defaultincotermid !== $v) {
			$this->defaultincotermid = $v;
			$this->modifiedColumns[] = SupplierPeer::DEFAULTINCOTERMID;
		}

		if ($this->aIncoterm !== null && $this->aIncoterm->getId() !== $v) {
			$this->aIncoterm = null;
		}

		return $this;
	} // setDefaultincotermid()

	/**
	 * Set the value of [defaultportid] column.
	 * id de puerto por default del proveedor
	 * @param      int $v new value
	 * @return     Supplier The current object (for fluent API support)
	 */
	public function setDefaultportid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->defaultportid !== $v) {
			$this->defaultportid = $v;
			$this->modifiedColumns[] = SupplierPeer::DEFAULTPORTID;
		}

		if ($this->aPort !== null && $this->aPort->getId() !== $v) {
			$this->aPort = null;
		}

		return $this;
	} // setDefaultportid()

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
			$this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->email = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->active = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
			$this->defaultincotermid = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->defaultportid = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 6; // 6 = SupplierPeer::NUM_COLUMNS - SupplierPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Supplier object", $e);
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

		if ($this->aIncoterm !== null && $this->defaultincotermid !== $this->aIncoterm->getId()) {
			$this->aIncoterm = null;
		}
		if ($this->aPort !== null && $this->defaultportid !== $this->aPort->getId()) {
			$this->aPort = null;
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
			$con = Propel::getConnection(SupplierPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SupplierPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aIncoterm = null;
			$this->aPort = null;
			$this->collProductSuppliers = null;

			$this->collSupplierQuotes = null;

			$this->collSupplierQuoteItemComments = null;

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
			$con = Propel::getConnection(SupplierPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				SupplierQuery::create()
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
			$con = Propel::getConnection(SupplierPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				SupplierPeer::addInstanceToPool($this);
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

			if ($this->aIncoterm !== null) {
				if ($this->aIncoterm->isModified() || $this->aIncoterm->isNew()) {
					$affectedRows += $this->aIncoterm->save($con);
				}
				$this->setIncoterm($this->aIncoterm);
			}

			if ($this->aPort !== null) {
				if ($this->aPort->isModified() || $this->aPort->isNew()) {
					$affectedRows += $this->aPort->save($con);
				}
				$this->setPort($this->aPort);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = SupplierPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(SupplierPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.SupplierPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += SupplierPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collProductSuppliers !== null) {
				foreach ($this->collProductSuppliers as $referrerFK) {
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

			if ($this->collSupplierQuoteItemComments !== null) {
				foreach ($this->collSupplierQuoteItemComments as $referrerFK) {
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

			if ($this->aIncoterm !== null) {
				if (!$this->aIncoterm->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aIncoterm->getValidationFailures());
				}
			}

			if ($this->aPort !== null) {
				if (!$this->aPort->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPort->getValidationFailures());
				}
			}


			if (($retval = SupplierPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collProductSuppliers !== null) {
					foreach ($this->collProductSuppliers as $referrerFK) {
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

				if ($this->collSupplierQuoteItemComments !== null) {
					foreach ($this->collSupplierQuoteItemComments as $referrerFK) {
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
		$pos = SupplierPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getName();
				break;
			case 2:
				return $this->getEmail();
				break;
			case 3:
				return $this->getActive();
				break;
			case 4:
				return $this->getDefaultincotermid();
				break;
			case 5:
				return $this->getDefaultportid();
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
		$keys = SupplierPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getEmail(),
			$keys[3] => $this->getActive(),
			$keys[4] => $this->getDefaultincotermid(),
			$keys[5] => $this->getDefaultportid(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aIncoterm) {
				$result['Incoterm'] = $this->aIncoterm->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aPort) {
				$result['Port'] = $this->aPort->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = SupplierPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setName($value);
				break;
			case 2:
				$this->setEmail($value);
				break;
			case 3:
				$this->setActive($value);
				break;
			case 4:
				$this->setDefaultincotermid($value);
				break;
			case 5:
				$this->setDefaultportid($value);
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
		$keys = SupplierPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEmail($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setActive($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDefaultincotermid($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDefaultportid($arr[$keys[5]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SupplierPeer::DATABASE_NAME);

		if ($this->isColumnModified(SupplierPeer::ID)) $criteria->add(SupplierPeer::ID, $this->id);
		if ($this->isColumnModified(SupplierPeer::NAME)) $criteria->add(SupplierPeer::NAME, $this->name);
		if ($this->isColumnModified(SupplierPeer::EMAIL)) $criteria->add(SupplierPeer::EMAIL, $this->email);
		if ($this->isColumnModified(SupplierPeer::ACTIVE)) $criteria->add(SupplierPeer::ACTIVE, $this->active);
		if ($this->isColumnModified(SupplierPeer::DEFAULTINCOTERMID)) $criteria->add(SupplierPeer::DEFAULTINCOTERMID, $this->defaultincotermid);
		if ($this->isColumnModified(SupplierPeer::DEFAULTPORTID)) $criteria->add(SupplierPeer::DEFAULTPORTID, $this->defaultportid);

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
		$criteria = new Criteria(SupplierPeer::DATABASE_NAME);
		$criteria->add(SupplierPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Supplier (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setName($this->name);
		$copyObj->setEmail($this->email);
		$copyObj->setActive($this->active);
		$copyObj->setDefaultincotermid($this->defaultincotermid);
		$copyObj->setDefaultportid($this->defaultportid);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getProductSuppliers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProductSupplier($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierQuotes() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierQuote($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierQuoteItemComments() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierQuoteItemComment($relObj->copy($deepCopy));
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
	 * @return     Supplier Clone of current object.
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
	 * @return     SupplierPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SupplierPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Incoterm object.
	 *
	 * @param      Incoterm $v
	 * @return     Supplier The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setIncoterm(Incoterm $v = null)
	{
		if ($v === null) {
			$this->setDefaultincotermid(NULL);
		} else {
			$this->setDefaultincotermid($v->getId());
		}

		$this->aIncoterm = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Incoterm object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplier($this);
		}

		return $this;
	}


	/**
	 * Get the associated Incoterm object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Incoterm The associated Incoterm object.
	 * @throws     PropelException
	 */
	public function getIncoterm(PropelPDO $con = null)
	{
		if ($this->aIncoterm === null && ($this->defaultincotermid !== null)) {
			$this->aIncoterm = IncotermQuery::create()->findPk($this->defaultincotermid, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aIncoterm->addSuppliers($this);
			 */
		}
		return $this->aIncoterm;
	}

	/**
	 * Declares an association between this object and a Port object.
	 *
	 * @param      Port $v
	 * @return     Supplier The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPort(Port $v = null)
	{
		if ($v === null) {
			$this->setDefaultportid(NULL);
		} else {
			$this->setDefaultportid($v->getId());
		}

		$this->aPort = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Port object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplier($this);
		}

		return $this;
	}


	/**
	 * Get the associated Port object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Port The associated Port object.
	 * @throws     PropelException
	 */
	public function getPort(PropelPDO $con = null)
	{
		if ($this->aPort === null && ($this->defaultportid !== null)) {
			$this->aPort = PortQuery::create()->findPk($this->defaultportid, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aPort->addSuppliers($this);
			 */
		}
		return $this->aPort;
	}

	/**
	 * Clears out the collProductSuppliers collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProductSuppliers()
	 */
	public function clearProductSuppliers()
	{
		$this->collProductSuppliers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProductSuppliers collection.
	 *
	 * By default this just sets the collProductSuppliers collection to an empty array (like clearcollProductSuppliers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProductSuppliers()
	{
		$this->collProductSuppliers = new PropelObjectCollection();
		$this->collProductSuppliers->setModel('ProductSupplier');
	}

	/**
	 * Gets an array of ProductSupplier objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Supplier is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ProductSupplier[] List of ProductSupplier objects
	 * @throws     PropelException
	 */
	public function getProductSuppliers($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collProductSuppliers || null !== $criteria) {
			if ($this->isNew() && null === $this->collProductSuppliers) {
				// return empty collection
				$this->initProductSuppliers();
			} else {
				$collProductSuppliers = ProductSupplierQuery::create(null, $criteria)
					->filterBySupplier($this)
					->find($con);
				if (null !== $criteria) {
					return $collProductSuppliers;
				}
				$this->collProductSuppliers = $collProductSuppliers;
			}
		}
		return $this->collProductSuppliers;
	}

	/**
	 * Returns the number of related ProductSupplier objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ProductSupplier objects.
	 * @throws     PropelException
	 */
	public function countProductSuppliers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collProductSuppliers || null !== $criteria) {
			if ($this->isNew() && null === $this->collProductSuppliers) {
				return 0;
			} else {
				$query = ProductSupplierQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBySupplier($this)
					->count($con);
			}
		} else {
			return count($this->collProductSuppliers);
		}
	}

	/**
	 * Method called to associate a ProductSupplier object to this object
	 * through the ProductSupplier foreign key attribute.
	 *
	 * @param      ProductSupplier $l ProductSupplier
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProductSupplier(ProductSupplier $l)
	{
		if ($this->collProductSuppliers === null) {
			$this->initProductSuppliers();
		}
		if (!$this->collProductSuppliers->contains($l)) { // only add it if the **same** object is not already associated
			$this->collProductSuppliers[]= $l;
			$l->setSupplier($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Supplier is new, it will return
	 * an empty collection; or if this Supplier has previously
	 * been saved, it will retrieve related ProductSuppliers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Supplier.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ProductSupplier[] List of ProductSupplier objects
	 */
	public function getProductSuppliersJoinProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ProductSupplierQuery::create(null, $criteria);
		$query->joinWith('Product', $join_behavior);

		return $this->getProductSuppliers($query, $con);
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
	 * If this Supplier is new, it will return
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
					->filterBySupplier($this)
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
					->filterBySupplier($this)
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
			$l->setSupplier($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Supplier is new, it will return
	 * an empty collection; or if this Supplier has previously
	 * been saved, it will retrieve related SupplierQuotes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Supplier.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierQuote[] List of SupplierQuote objects
	 */
	public function getSupplierQuotesJoinClientQuote($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierQuoteQuery::create(null, $criteria);
		$query->joinWith('ClientQuote', $join_behavior);

		return $this->getSupplierQuotes($query, $con);
	}

	/**
	 * Clears out the collSupplierQuoteItemComments collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSupplierQuoteItemComments()
	 */
	public function clearSupplierQuoteItemComments()
	{
		$this->collSupplierQuoteItemComments = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSupplierQuoteItemComments collection.
	 *
	 * By default this just sets the collSupplierQuoteItemComments collection to an empty array (like clearcollSupplierQuoteItemComments());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierQuoteItemComments()
	{
		$this->collSupplierQuoteItemComments = new PropelObjectCollection();
		$this->collSupplierQuoteItemComments->setModel('SupplierQuoteItemComment');
	}

	/**
	 * Gets an array of SupplierQuoteItemComment objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Supplier is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SupplierQuoteItemComment[] List of SupplierQuoteItemComment objects
	 * @throws     PropelException
	 */
	public function getSupplierQuoteItemComments($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSupplierQuoteItemComments || null !== $criteria) {
			if ($this->isNew() && null === $this->collSupplierQuoteItemComments) {
				// return empty collection
				$this->initSupplierQuoteItemComments();
			} else {
				$collSupplierQuoteItemComments = SupplierQuoteItemCommentQuery::create(null, $criteria)
					->filterBySupplier($this)
					->find($con);
				if (null !== $criteria) {
					return $collSupplierQuoteItemComments;
				}
				$this->collSupplierQuoteItemComments = $collSupplierQuoteItemComments;
			}
		}
		return $this->collSupplierQuoteItemComments;
	}

	/**
	 * Returns the number of related SupplierQuoteItemComment objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SupplierQuoteItemComment objects.
	 * @throws     PropelException
	 */
	public function countSupplierQuoteItemComments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSupplierQuoteItemComments || null !== $criteria) {
			if ($this->isNew() && null === $this->collSupplierQuoteItemComments) {
				return 0;
			} else {
				$query = SupplierQuoteItemCommentQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBySupplier($this)
					->count($con);
			}
		} else {
			return count($this->collSupplierQuoteItemComments);
		}
	}

	/**
	 * Method called to associate a SupplierQuoteItemComment object to this object
	 * through the SupplierQuoteItemComment foreign key attribute.
	 *
	 * @param      SupplierQuoteItemComment $l SupplierQuoteItemComment
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSupplierQuoteItemComment(SupplierQuoteItemComment $l)
	{
		if ($this->collSupplierQuoteItemComments === null) {
			$this->initSupplierQuoteItemComments();
		}
		if (!$this->collSupplierQuoteItemComments->contains($l)) { // only add it if the **same** object is not already associated
			$this->collSupplierQuoteItemComments[]= $l;
			$l->setSupplier($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Supplier is new, it will return
	 * an empty collection; or if this Supplier has previously
	 * been saved, it will retrieve related SupplierQuoteItemComments from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Supplier.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierQuoteItemComment[] List of SupplierQuoteItemComment objects
	 */
	public function getSupplierQuoteItemCommentsJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierQuoteItemCommentQuery::create(null, $criteria);
		$query->joinWith('User', $join_behavior);

		return $this->getSupplierQuoteItemComments($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Supplier is new, it will return
	 * an empty collection; or if this Supplier has previously
	 * been saved, it will retrieve related SupplierQuoteItemComments from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Supplier.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierQuoteItemComment[] List of SupplierQuoteItemComment objects
	 */
	public function getSupplierQuoteItemCommentsJoinSupplierQuoteItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierQuoteItemCommentQuery::create(null, $criteria);
		$query->joinWith('SupplierQuoteItem', $join_behavior);

		return $this->getSupplierQuoteItemComments($query, $con);
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
	 * If this Supplier is new, it will return
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
					->filterBySupplier($this)
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
					->filterBySupplier($this)
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
			$l->setSupplier($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Supplier is new, it will return
	 * an empty collection; or if this Supplier has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Supplier.
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
	 * Otherwise if this Supplier is new, it will return
	 * an empty collection; or if this Supplier has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Supplier.
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
	 * Otherwise if this Supplier is new, it will return
	 * an empty collection; or if this Supplier has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Supplier.
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
	 * Otherwise if this Supplier is new, it will return
	 * an empty collection; or if this Supplier has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Supplier.
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
	 * Otherwise if this Supplier is new, it will return
	 * an empty collection; or if this Supplier has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Supplier.
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
		$this->name = null;
		$this->email = null;
		$this->active = null;
		$this->defaultincotermid = null;
		$this->defaultportid = null;
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
			if ($this->collProductSuppliers) {
				foreach ((array) $this->collProductSuppliers as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierQuotes) {
				foreach ((array) $this->collSupplierQuotes as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierQuoteItemComments) {
				foreach ((array) $this->collSupplierQuoteItemComments as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierPurchaseOrders) {
				foreach ((array) $this->collSupplierPurchaseOrders as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collProductSuppliers = null;
		$this->collSupplierQuotes = null;
		$this->collSupplierQuoteItemComments = null;
		$this->collSupplierPurchaseOrders = null;
		$this->aIncoterm = null;
		$this->aPort = null;
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

} // BaseSupplier
