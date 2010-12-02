<?php


/**
 * Base class that represents a row from the 'import_product' table.
 *
 * Productos
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseProduct extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ProductPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ProductPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the code field.
	 * @var        string
	 */
	protected $code;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the namespanish field.
	 * @var        string
	 */
	protected $namespanish;

	/**
	 * The value for the description field.
	 * @var        string
	 */
	protected $description;

	/**
	 * The value for the descriptionspanish field.
	 * @var        string
	 */
	protected $descriptionspanish;

	/**
	 * The value for the namechinese field.
	 * @var        string
	 */
	protected $namechinese;

	/**
	 * The value for the descriptionchinese field.
	 * @var        string
	 */
	protected $descriptionchinese;

	/**
	 * The value for the status field.
	 * @var        int
	 */
	protected $status;

	/**
	 * @var        ProductSupplier one-to-one related ProductSupplier object
	 */
	protected $singleProductSupplier;

	/**
	 * @var        array ClientQuoteItem[] Collection to store aggregation of ClientQuoteItem objects.
	 */
	protected $collClientQuoteItems;

	/**
	 * @var        array SupplierQuoteItem[] Collection to store aggregation of SupplierQuoteItem objects.
	 */
	protected $collSupplierQuoteItemsRelatedByProductid;

	/**
	 * @var        array SupplierQuoteItem[] Collection to store aggregation of SupplierQuoteItem objects.
	 */
	protected $collSupplierQuoteItemsRelatedByReplacedproductid;

	/**
	 * @var        array ClientPurchaseOrderItem[] Collection to store aggregation of ClientPurchaseOrderItem objects.
	 */
	protected $collClientPurchaseOrderItems;

	/**
	 * @var        array SupplierPurchaseOrderItem[] Collection to store aggregation of SupplierPurchaseOrderItem objects.
	 */
	protected $collSupplierPurchaseOrderItems;

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
	 * Product Id
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [code] column value.
	 * Codigo del producto
	 * @return     string
	 */
	public function getCode()
	{
		return $this->code;
	}

	/**
	 * Get the [name] column value.
	 * Nombre del producto en ingles
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [namespanish] column value.
	 * Nombre del producto en espaniol
	 * @return     string
	 */
	public function getNamespanish()
	{
		return $this->namespanish;
	}

	/**
	 * Get the [description] column value.
	 * Descripcion del producto en ingles
	 * @return     string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Get the [descriptionspanish] column value.
	 * Descripcion del producto en espaniol
	 * @return     string
	 */
	public function getDescriptionspanish()
	{
		return $this->descriptionspanish;
	}

	/**
	 * Get the [namechinese] column value.
	 * Nombre del producto en chino
	 * @return     string
	 */
	public function getNamechinese()
	{
		return $this->namechinese;
	}

	/**
	 * Get the [descriptionchinese] column value.
	 * Descripcion del producto en chino
	 * @return     string
	 */
	public function getDescriptionchinese()
	{
		return $this->descriptionchinese;
	}

	/**
	 * Get the [status] column value.
	 * product status
	 * @return     int
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Set the value of [id] column.
	 * Product Id
	 * @param      int $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ProductPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [code] column.
	 * Codigo del producto
	 * @param      string $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setCode($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->code !== $v) {
			$this->code = $v;
			$this->modifiedColumns[] = ProductPeer::CODE;
		}

		return $this;
	} // setCode()

	/**
	 * Set the value of [name] column.
	 * Nombre del producto en ingles
	 * @param      string $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = ProductPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [namespanish] column.
	 * Nombre del producto en espaniol
	 * @param      string $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setNamespanish($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->namespanish !== $v) {
			$this->namespanish = $v;
			$this->modifiedColumns[] = ProductPeer::NAMESPANISH;
		}

		return $this;
	} // setNamespanish()

	/**
	 * Set the value of [description] column.
	 * Descripcion del producto en ingles
	 * @param      string $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setDescription($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = ProductPeer::DESCRIPTION;
		}

		return $this;
	} // setDescription()

	/**
	 * Set the value of [descriptionspanish] column.
	 * Descripcion del producto en espaniol
	 * @param      string $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setDescriptionspanish($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descriptionspanish !== $v) {
			$this->descriptionspanish = $v;
			$this->modifiedColumns[] = ProductPeer::DESCRIPTIONSPANISH;
		}

		return $this;
	} // setDescriptionspanish()

	/**
	 * Set the value of [namechinese] column.
	 * Nombre del producto en chino
	 * @param      string $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setNamechinese($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->namechinese !== $v) {
			$this->namechinese = $v;
			$this->modifiedColumns[] = ProductPeer::NAMECHINESE;
		}

		return $this;
	} // setNamechinese()

	/**
	 * Set the value of [descriptionchinese] column.
	 * Descripcion del producto en chino
	 * @param      string $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setDescriptionchinese($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descriptionchinese !== $v) {
			$this->descriptionchinese = $v;
			$this->modifiedColumns[] = ProductPeer::DESCRIPTIONCHINESE;
		}

		return $this;
	} // setDescriptionchinese()

	/**
	 * Set the value of [status] column.
	 * product status
	 * @param      int $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = ProductPeer::STATUS;
		}

		return $this;
	} // setStatus()

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
			$this->code = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->namespanish = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->description = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->descriptionspanish = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->namechinese = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->descriptionchinese = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->status = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 9; // 9 = ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Product object", $e);
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
			$con = Propel::getConnection(ProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ProductPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->singleProductSupplier = null;

			$this->collClientQuoteItems = null;

			$this->collSupplierQuoteItemsRelatedByProductid = null;

			$this->collSupplierQuoteItemsRelatedByReplacedproductid = null;

			$this->collClientPurchaseOrderItems = null;

			$this->collSupplierPurchaseOrderItems = null;

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
			$con = Propel::getConnection(ProductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ProductQuery::create()
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
			$con = Propel::getConnection(ProductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ProductPeer::addInstanceToPool($this);
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

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ProductPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(ProductPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProductPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = ProductPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->singleProductSupplier !== null) {
				if (!$this->singleProductSupplier->isDeleted()) {
						$affectedRows += $this->singleProductSupplier->save($con);
				}
			}

			if ($this->collClientQuoteItems !== null) {
				foreach ($this->collClientQuoteItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSupplierQuoteItemsRelatedByProductid !== null) {
				foreach ($this->collSupplierQuoteItemsRelatedByProductid as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSupplierQuoteItemsRelatedByReplacedproductid !== null) {
				foreach ($this->collSupplierQuoteItemsRelatedByReplacedproductid as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collClientPurchaseOrderItems !== null) {
				foreach ($this->collClientPurchaseOrderItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSupplierPurchaseOrderItems !== null) {
				foreach ($this->collSupplierPurchaseOrderItems as $referrerFK) {
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


			if (($retval = ProductPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->singleProductSupplier !== null) {
					if (!$this->singleProductSupplier->validate($columns)) {
						$failureMap = array_merge($failureMap, $this->singleProductSupplier->getValidationFailures());
					}
				}

				if ($this->collClientQuoteItems !== null) {
					foreach ($this->collClientQuoteItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSupplierQuoteItemsRelatedByProductid !== null) {
					foreach ($this->collSupplierQuoteItemsRelatedByProductid as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSupplierQuoteItemsRelatedByReplacedproductid !== null) {
					foreach ($this->collSupplierQuoteItemsRelatedByReplacedproductid as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClientPurchaseOrderItems !== null) {
					foreach ($this->collClientPurchaseOrderItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSupplierPurchaseOrderItems !== null) {
					foreach ($this->collSupplierPurchaseOrderItems as $referrerFK) {
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
		$pos = ProductPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCode();
				break;
			case 2:
				return $this->getName();
				break;
			case 3:
				return $this->getNamespanish();
				break;
			case 4:
				return $this->getDescription();
				break;
			case 5:
				return $this->getDescriptionspanish();
				break;
			case 6:
				return $this->getNamechinese();
				break;
			case 7:
				return $this->getDescriptionchinese();
				break;
			case 8:
				return $this->getStatus();
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
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = ProductPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCode(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getNamespanish(),
			$keys[4] => $this->getDescription(),
			$keys[5] => $this->getDescriptionspanish(),
			$keys[6] => $this->getNamechinese(),
			$keys[7] => $this->getDescriptionchinese(),
			$keys[8] => $this->getStatus(),
		);
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
		$pos = ProductPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCode($value);
				break;
			case 2:
				$this->setName($value);
				break;
			case 3:
				$this->setNamespanish($value);
				break;
			case 4:
				$this->setDescription($value);
				break;
			case 5:
				$this->setDescriptionspanish($value);
				break;
			case 6:
				$this->setNamechinese($value);
				break;
			case 7:
				$this->setDescriptionchinese($value);
				break;
			case 8:
				$this->setStatus($value);
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
		$keys = ProductPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCode($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNamespanish($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescription($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDescriptionspanish($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNamechinese($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDescriptionchinese($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStatus($arr[$keys[8]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ProductPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProductPeer::ID)) $criteria->add(ProductPeer::ID, $this->id);
		if ($this->isColumnModified(ProductPeer::CODE)) $criteria->add(ProductPeer::CODE, $this->code);
		if ($this->isColumnModified(ProductPeer::NAME)) $criteria->add(ProductPeer::NAME, $this->name);
		if ($this->isColumnModified(ProductPeer::NAMESPANISH)) $criteria->add(ProductPeer::NAMESPANISH, $this->namespanish);
		if ($this->isColumnModified(ProductPeer::DESCRIPTION)) $criteria->add(ProductPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(ProductPeer::DESCRIPTIONSPANISH)) $criteria->add(ProductPeer::DESCRIPTIONSPANISH, $this->descriptionspanish);
		if ($this->isColumnModified(ProductPeer::NAMECHINESE)) $criteria->add(ProductPeer::NAMECHINESE, $this->namechinese);
		if ($this->isColumnModified(ProductPeer::DESCRIPTIONCHINESE)) $criteria->add(ProductPeer::DESCRIPTIONCHINESE, $this->descriptionchinese);
		if ($this->isColumnModified(ProductPeer::STATUS)) $criteria->add(ProductPeer::STATUS, $this->status);

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
		$criteria = new Criteria(ProductPeer::DATABASE_NAME);
		$criteria->add(ProductPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Product (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setCode($this->code);
		$copyObj->setName($this->name);
		$copyObj->setNamespanish($this->namespanish);
		$copyObj->setDescription($this->description);
		$copyObj->setDescriptionspanish($this->descriptionspanish);
		$copyObj->setNamechinese($this->namechinese);
		$copyObj->setDescriptionchinese($this->descriptionchinese);
		$copyObj->setStatus($this->status);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			$relObj = $this->getProductSupplier();
			if ($relObj) {
				$copyObj->setProductSupplier($relObj->copy($deepCopy));
			}

			foreach ($this->getClientQuoteItems() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClientQuoteItem($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierQuoteItemsRelatedByProductid() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierQuoteItemRelatedByProductid($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierQuoteItemsRelatedByReplacedproductid() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierQuoteItemRelatedByReplacedproductid($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClientPurchaseOrderItems() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClientPurchaseOrderItem($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierPurchaseOrderItems() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierPurchaseOrderItem($relObj->copy($deepCopy));
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
	 * @return     Product Clone of current object.
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
	 * @return     ProductPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ProductPeer();
		}
		return self::$peer;
	}

	/**
	 * Gets a single ProductSupplier object, which is related to this object by a one-to-one relationship.
	 *
	 * @param      PropelPDO $con optional connection object
	 * @return     ProductSupplier
	 * @throws     PropelException
	 */
	public function getProductSupplier(PropelPDO $con = null)
	{

		if ($this->singleProductSupplier === null && !$this->isNew()) {
			$this->singleProductSupplier = ProductSupplierQuery::create()->findPk($this->getPrimaryKey(), $con);
		}

		return $this->singleProductSupplier;
	}

	/**
	 * Sets a single ProductSupplier object as related to this object by a one-to-one relationship.
	 *
	 * @param      ProductSupplier $v ProductSupplier
	 * @return     Product The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setProductSupplier(ProductSupplier $v = null)
	{
		$this->singleProductSupplier = $v;

		// Make sure that that the passed-in ProductSupplier isn't already associated with this object
		if ($v !== null && $v->getProduct() === null) {
			$v->setProduct($this);
		}

		return $this;
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
	 * If this Product is new, it will return
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
					->filterByProduct($this)
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
					->filterByProduct($this)
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
			$l->setProduct($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related ClientQuoteItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ClientQuoteItem[] List of ClientQuoteItem objects
	 */
	public function getClientQuoteItemsJoinClientQuote($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ClientQuoteItemQuery::create(null, $criteria);
		$query->joinWith('ClientQuote', $join_behavior);

		return $this->getClientQuoteItems($query, $con);
	}

	/**
	 * Clears out the collSupplierQuoteItemsRelatedByProductid collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSupplierQuoteItemsRelatedByProductid()
	 */
	public function clearSupplierQuoteItemsRelatedByProductid()
	{
		$this->collSupplierQuoteItemsRelatedByProductid = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSupplierQuoteItemsRelatedByProductid collection.
	 *
	 * By default this just sets the collSupplierQuoteItemsRelatedByProductid collection to an empty array (like clearcollSupplierQuoteItemsRelatedByProductid());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierQuoteItemsRelatedByProductid()
	{
		$this->collSupplierQuoteItemsRelatedByProductid = new PropelObjectCollection();
		$this->collSupplierQuoteItemsRelatedByProductid->setModel('SupplierQuoteItem');
	}

	/**
	 * Gets an array of SupplierQuoteItem objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Product is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SupplierQuoteItem[] List of SupplierQuoteItem objects
	 * @throws     PropelException
	 */
	public function getSupplierQuoteItemsRelatedByProductid($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSupplierQuoteItemsRelatedByProductid || null !== $criteria) {
			if ($this->isNew() && null === $this->collSupplierQuoteItemsRelatedByProductid) {
				// return empty collection
				$this->initSupplierQuoteItemsRelatedByProductid();
			} else {
				$collSupplierQuoteItemsRelatedByProductid = SupplierQuoteItemQuery::create(null, $criteria)
					->filterByProductRelatedByProductid($this)
					->find($con);
				if (null !== $criteria) {
					return $collSupplierQuoteItemsRelatedByProductid;
				}
				$this->collSupplierQuoteItemsRelatedByProductid = $collSupplierQuoteItemsRelatedByProductid;
			}
		}
		return $this->collSupplierQuoteItemsRelatedByProductid;
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
	public function countSupplierQuoteItemsRelatedByProductid(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSupplierQuoteItemsRelatedByProductid || null !== $criteria) {
			if ($this->isNew() && null === $this->collSupplierQuoteItemsRelatedByProductid) {
				return 0;
			} else {
				$query = SupplierQuoteItemQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByProductRelatedByProductid($this)
					->count($con);
			}
		} else {
			return count($this->collSupplierQuoteItemsRelatedByProductid);
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
	public function addSupplierQuoteItemRelatedByProductid(SupplierQuoteItem $l)
	{
		if ($this->collSupplierQuoteItemsRelatedByProductid === null) {
			$this->initSupplierQuoteItemsRelatedByProductid();
		}
		if (!$this->collSupplierQuoteItemsRelatedByProductid->contains($l)) { // only add it if the **same** object is not already associated
			$this->collSupplierQuoteItemsRelatedByProductid[]= $l;
			$l->setProductRelatedByProductid($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierQuoteItemsRelatedByProductid from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierQuoteItem[] List of SupplierQuoteItem objects
	 */
	public function getSupplierQuoteItemsRelatedByProductidJoinSupplierQuote($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierQuoteItemQuery::create(null, $criteria);
		$query->joinWith('SupplierQuote', $join_behavior);

		return $this->getSupplierQuoteItemsRelatedByProductid($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierQuoteItemsRelatedByProductid from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierQuoteItem[] List of SupplierQuoteItem objects
	 */
	public function getSupplierQuoteItemsRelatedByProductidJoinClientQuoteItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierQuoteItemQuery::create(null, $criteria);
		$query->joinWith('ClientQuoteItem', $join_behavior);

		return $this->getSupplierQuoteItemsRelatedByProductid($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierQuoteItemsRelatedByProductid from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierQuoteItem[] List of SupplierQuoteItem objects
	 */
	public function getSupplierQuoteItemsRelatedByProductidJoinIncoterm($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierQuoteItemQuery::create(null, $criteria);
		$query->joinWith('Incoterm', $join_behavior);

		return $this->getSupplierQuoteItemsRelatedByProductid($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierQuoteItemsRelatedByProductid from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierQuoteItem[] List of SupplierQuoteItem objects
	 */
	public function getSupplierQuoteItemsRelatedByProductidJoinPort($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierQuoteItemQuery::create(null, $criteria);
		$query->joinWith('Port', $join_behavior);

		return $this->getSupplierQuoteItemsRelatedByProductid($query, $con);
	}

	/**
	 * Clears out the collSupplierQuoteItemsRelatedByReplacedproductid collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSupplierQuoteItemsRelatedByReplacedproductid()
	 */
	public function clearSupplierQuoteItemsRelatedByReplacedproductid()
	{
		$this->collSupplierQuoteItemsRelatedByReplacedproductid = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSupplierQuoteItemsRelatedByReplacedproductid collection.
	 *
	 * By default this just sets the collSupplierQuoteItemsRelatedByReplacedproductid collection to an empty array (like clearcollSupplierQuoteItemsRelatedByReplacedproductid());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierQuoteItemsRelatedByReplacedproductid()
	{
		$this->collSupplierQuoteItemsRelatedByReplacedproductid = new PropelObjectCollection();
		$this->collSupplierQuoteItemsRelatedByReplacedproductid->setModel('SupplierQuoteItem');
	}

	/**
	 * Gets an array of SupplierQuoteItem objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Product is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SupplierQuoteItem[] List of SupplierQuoteItem objects
	 * @throws     PropelException
	 */
	public function getSupplierQuoteItemsRelatedByReplacedproductid($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSupplierQuoteItemsRelatedByReplacedproductid || null !== $criteria) {
			if ($this->isNew() && null === $this->collSupplierQuoteItemsRelatedByReplacedproductid) {
				// return empty collection
				$this->initSupplierQuoteItemsRelatedByReplacedproductid();
			} else {
				$collSupplierQuoteItemsRelatedByReplacedproductid = SupplierQuoteItemQuery::create(null, $criteria)
					->filterByProductRelatedByReplacedproductid($this)
					->find($con);
				if (null !== $criteria) {
					return $collSupplierQuoteItemsRelatedByReplacedproductid;
				}
				$this->collSupplierQuoteItemsRelatedByReplacedproductid = $collSupplierQuoteItemsRelatedByReplacedproductid;
			}
		}
		return $this->collSupplierQuoteItemsRelatedByReplacedproductid;
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
	public function countSupplierQuoteItemsRelatedByReplacedproductid(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSupplierQuoteItemsRelatedByReplacedproductid || null !== $criteria) {
			if ($this->isNew() && null === $this->collSupplierQuoteItemsRelatedByReplacedproductid) {
				return 0;
			} else {
				$query = SupplierQuoteItemQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByProductRelatedByReplacedproductid($this)
					->count($con);
			}
		} else {
			return count($this->collSupplierQuoteItemsRelatedByReplacedproductid);
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
	public function addSupplierQuoteItemRelatedByReplacedproductid(SupplierQuoteItem $l)
	{
		if ($this->collSupplierQuoteItemsRelatedByReplacedproductid === null) {
			$this->initSupplierQuoteItemsRelatedByReplacedproductid();
		}
		if (!$this->collSupplierQuoteItemsRelatedByReplacedproductid->contains($l)) { // only add it if the **same** object is not already associated
			$this->collSupplierQuoteItemsRelatedByReplacedproductid[]= $l;
			$l->setProductRelatedByReplacedproductid($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierQuoteItemsRelatedByReplacedproductid from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierQuoteItem[] List of SupplierQuoteItem objects
	 */
	public function getSupplierQuoteItemsRelatedByReplacedproductidJoinSupplierQuote($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierQuoteItemQuery::create(null, $criteria);
		$query->joinWith('SupplierQuote', $join_behavior);

		return $this->getSupplierQuoteItemsRelatedByReplacedproductid($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierQuoteItemsRelatedByReplacedproductid from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierQuoteItem[] List of SupplierQuoteItem objects
	 */
	public function getSupplierQuoteItemsRelatedByReplacedproductidJoinClientQuoteItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierQuoteItemQuery::create(null, $criteria);
		$query->joinWith('ClientQuoteItem', $join_behavior);

		return $this->getSupplierQuoteItemsRelatedByReplacedproductid($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierQuoteItemsRelatedByReplacedproductid from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierQuoteItem[] List of SupplierQuoteItem objects
	 */
	public function getSupplierQuoteItemsRelatedByReplacedproductidJoinIncoterm($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierQuoteItemQuery::create(null, $criteria);
		$query->joinWith('Incoterm', $join_behavior);

		return $this->getSupplierQuoteItemsRelatedByReplacedproductid($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierQuoteItemsRelatedByReplacedproductid from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierQuoteItem[] List of SupplierQuoteItem objects
	 */
	public function getSupplierQuoteItemsRelatedByReplacedproductidJoinPort($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierQuoteItemQuery::create(null, $criteria);
		$query->joinWith('Port', $join_behavior);

		return $this->getSupplierQuoteItemsRelatedByReplacedproductid($query, $con);
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
	 * If this Product is new, it will return
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
					->filterByProduct($this)
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
					->filterByProduct($this)
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
			$l->setProduct($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related ClientPurchaseOrderItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ClientPurchaseOrderItem[] List of ClientPurchaseOrderItem objects
	 */
	public function getClientPurchaseOrderItemsJoinClientPurchaseOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ClientPurchaseOrderItemQuery::create(null, $criteria);
		$query->joinWith('ClientPurchaseOrder', $join_behavior);

		return $this->getClientPurchaseOrderItems($query, $con);
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
	 * If this Product is new, it will return
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
					->filterByProduct($this)
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
					->filterByProduct($this)
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
			$l->setProduct($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierPurchaseOrderItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierPurchaseOrderItem[] List of SupplierPurchaseOrderItem objects
	 */
	public function getSupplierPurchaseOrderItemsJoinSupplierPurchaseOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierPurchaseOrderItemQuery::create(null, $criteria);
		$query->joinWith('SupplierPurchaseOrder', $join_behavior);

		return $this->getSupplierPurchaseOrderItems($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierPurchaseOrderItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
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
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related SupplierPurchaseOrderItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
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
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->code = null;
		$this->name = null;
		$this->namespanish = null;
		$this->description = null;
		$this->descriptionspanish = null;
		$this->namechinese = null;
		$this->descriptionchinese = null;
		$this->status = null;
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
			if ($this->singleProductSupplier) {
				$this->singleProductSupplier->clearAllReferences($deep);
			}
			if ($this->collClientQuoteItems) {
				foreach ((array) $this->collClientQuoteItems as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierQuoteItemsRelatedByProductid) {
				foreach ((array) $this->collSupplierQuoteItemsRelatedByProductid as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierQuoteItemsRelatedByReplacedproductid) {
				foreach ((array) $this->collSupplierQuoteItemsRelatedByReplacedproductid as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClientPurchaseOrderItems) {
				foreach ((array) $this->collClientPurchaseOrderItems as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierPurchaseOrderItems) {
				foreach ((array) $this->collSupplierPurchaseOrderItems as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->singleProductSupplier = null;
		$this->collClientQuoteItems = null;
		$this->collSupplierQuoteItemsRelatedByProductid = null;
		$this->collSupplierQuoteItemsRelatedByReplacedproductid = null;
		$this->collClientPurchaseOrderItems = null;
		$this->collSupplierPurchaseOrderItems = null;
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

} // BaseProduct
