<?php


/**
 * Base class that represents a row from the 'product' table.
 *
 * Producto
 *
 * @package    propel.generator.catalog.classes.om
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
	 * The value for the description field.
	 * @var        string
	 */
	protected $description;

	/**
	 * The value for the price field.
	 * @var        double
	 */
	protected $price;

	/**
	 * The value for the unitid field.
	 * @var        int
	 */
	protected $unitid;

	/**
	 * The value for the measureunitid field.
	 * @var        int
	 */
	protected $measureunitid;

	/**
	 * The value for the active field.
	 * Note: this column has a database default value of: true
	 * @var        boolean
	 */
	protected $active;

	/**
	 * The value for the ordercode field.
	 * @var        string
	 */
	protected $ordercode;

	/**
	 * The value for the salesunit field.
	 * Note: this column has a database default value of: 1
	 * @var        int
	 */
	protected $salesunit;

	/**
	 * @var        Unit
	 */
	protected $aUnit;

	/**
	 * @var        MeasureUnit
	 */
	protected $aMeasureUnit;

	/**
	 * @var        array AffiliateProduct[] Collection to store aggregation of AffiliateProduct objects.
	 */
	protected $collAffiliateProducts;

	/**
	 * @var        array ProductCategory[] Collection to store aggregation of ProductCategory objects.
	 */
	protected $collProductCategorys;

	/**
	 * @var        array OrderItem[] Collection to store aggregation of OrderItem objects.
	 */
	protected $collOrderItems;

	/**
	 * @var        array OrderTemplateItem[] Collection to store aggregation of OrderTemplateItem objects.
	 */
	protected $collOrderTemplateItems;

	/**
	 * @var        array Affiliate[] Collection to store aggregation of Affiliate objects.
	 */
	protected $collAffiliates;

	/**
	 * @var        array Category[] Collection to store aggregation of Category objects.
	 */
	protected $collCategorys;

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
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->active = true;
		$this->salesunit = 1;
	}

	/**
	 * Initializes internal state of BaseProduct object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [id] column value.
	 * Id del producto
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
	 * Nombre del producto
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [description] column value.
	 * Descripcion
	 * @return     string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Get the [price] column value.
	 * Precio del producto
	 * @return     double
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * Get the [unitid] column value.
	 * Unidades
	 * @return     int
	 */
	public function getUnitid()
	{
		return $this->unitid;
	}

	/**
	 * Get the [measureunitid] column value.
	 * Unidad de Medida
	 * @return     int
	 */
	public function getMeasureunitid()
	{
		return $this->measureunitid;
	}

	/**
	 * Get the [active] column value.
	 * Is product active?
	 * @return     boolean
	 */
	public function getActive()
	{
		return $this->active;
	}

	/**
	 * Get the [ordercode] column value.
	 * Codigo de ordenamiento del producto
	 * @return     string
	 */
	public function getOrdercode()
	{
		return $this->ordercode;
	}

	/**
	 * Get the [salesunit] column value.
	 * Multiplo de la unidad de medida en que se puede ordenar el producto
	 * @return     int
	 */
	public function getSalesunit()
	{
		return $this->salesunit;
	}

	/**
	 * Set the value of [id] column.
	 * Id del producto
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
	 * Nombre del producto
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
	 * Set the value of [description] column.
	 * Descripcion
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
	 * Set the value of [price] column.
	 * Precio del producto
	 * @param      double $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setPrice($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->price !== $v) {
			$this->price = $v;
			$this->modifiedColumns[] = ProductPeer::PRICE;
		}

		return $this;
	} // setPrice()

	/**
	 * Set the value of [unitid] column.
	 * Unidades
	 * @param      int $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setUnitid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->unitid !== $v) {
			$this->unitid = $v;
			$this->modifiedColumns[] = ProductPeer::UNITID;
		}

		if ($this->aUnit !== null && $this->aUnit->getId() !== $v) {
			$this->aUnit = null;
		}

		return $this;
	} // setUnitid()

	/**
	 * Set the value of [measureunitid] column.
	 * Unidad de Medida
	 * @param      int $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setMeasureunitid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->measureunitid !== $v) {
			$this->measureunitid = $v;
			$this->modifiedColumns[] = ProductPeer::MEASUREUNITID;
		}

		if ($this->aMeasureUnit !== null && $this->aMeasureUnit->getId() !== $v) {
			$this->aMeasureUnit = null;
		}

		return $this;
	} // setMeasureunitid()

	/**
	 * Set the value of [active] column.
	 * Is product active?
	 * @param      boolean $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setActive($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->active !== $v || $this->isNew()) {
			$this->active = $v;
			$this->modifiedColumns[] = ProductPeer::ACTIVE;
		}

		return $this;
	} // setActive()

	/**
	 * Set the value of [ordercode] column.
	 * Codigo de ordenamiento del producto
	 * @param      string $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setOrdercode($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->ordercode !== $v) {
			$this->ordercode = $v;
			$this->modifiedColumns[] = ProductPeer::ORDERCODE;
		}

		return $this;
	} // setOrdercode()

	/**
	 * Set the value of [salesunit] column.
	 * Multiplo de la unidad de medida en que se puede ordenar el producto
	 * @param      int $v new value
	 * @return     Product The current object (for fluent API support)
	 */
	public function setSalesunit($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->salesunit !== $v || $this->isNew()) {
			$this->salesunit = $v;
			$this->modifiedColumns[] = ProductPeer::SALESUNIT;
		}

		return $this;
	} // setSalesunit()

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
			if ($this->active !== true) {
				return false;
			}

			if ($this->salesunit !== 1) {
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
			$this->code = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->description = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->price = ($row[$startcol + 4] !== null) ? (double) $row[$startcol + 4] : null;
			$this->unitid = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->measureunitid = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->active = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
			$this->ordercode = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->salesunit = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 10; // 10 = ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS).

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

		if ($this->aUnit !== null && $this->unitid !== $this->aUnit->getId()) {
			$this->aUnit = null;
		}
		if ($this->aMeasureUnit !== null && $this->measureunitid !== $this->aMeasureUnit->getId()) {
			$this->aMeasureUnit = null;
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

			$this->aUnit = null;
			$this->aMeasureUnit = null;
			$this->collAffiliateProducts = null;

			$this->collProductCategorys = null;

			$this->collOrderItems = null;

			$this->collOrderTemplateItems = null;

			$this->collAffiliates = null;
			$this->collCategorys = null;
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

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aUnit !== null) {
				if ($this->aUnit->isModified() || $this->aUnit->isNew()) {
					$affectedRows += $this->aUnit->save($con);
				}
				$this->setUnit($this->aUnit);
			}

			if ($this->aMeasureUnit !== null) {
				if ($this->aMeasureUnit->isModified() || $this->aMeasureUnit->isNew()) {
					$affectedRows += $this->aMeasureUnit->save($con);
				}
				$this->setMeasureUnit($this->aMeasureUnit);
			}

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
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += ProductPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collAffiliateProducts !== null) {
				foreach ($this->collAffiliateProducts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProductCategorys !== null) {
				foreach ($this->collProductCategorys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collOrderItems !== null) {
				foreach ($this->collOrderItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collOrderTemplateItems !== null) {
				foreach ($this->collOrderTemplateItems as $referrerFK) {
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

			if ($this->aUnit !== null) {
				if (!$this->aUnit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUnit->getValidationFailures());
				}
			}

			if ($this->aMeasureUnit !== null) {
				if (!$this->aMeasureUnit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aMeasureUnit->getValidationFailures());
				}
			}


			if (($retval = ProductPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAffiliateProducts !== null) {
					foreach ($this->collAffiliateProducts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProductCategorys !== null) {
					foreach ($this->collProductCategorys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collOrderItems !== null) {
					foreach ($this->collOrderItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collOrderTemplateItems !== null) {
					foreach ($this->collOrderTemplateItems as $referrerFK) {
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
				return $this->getDescription();
				break;
			case 4:
				return $this->getPrice();
				break;
			case 5:
				return $this->getUnitid();
				break;
			case 6:
				return $this->getMeasureunitid();
				break;
			case 7:
				return $this->getActive();
				break;
			case 8:
				return $this->getOrdercode();
				break;
			case 9:
				return $this->getSalesunit();
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
		$keys = ProductPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCode(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getDescription(),
			$keys[4] => $this->getPrice(),
			$keys[5] => $this->getUnitid(),
			$keys[6] => $this->getMeasureunitid(),
			$keys[7] => $this->getActive(),
			$keys[8] => $this->getOrdercode(),
			$keys[9] => $this->getSalesunit(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aUnit) {
				$result['Unit'] = $this->aUnit->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aMeasureUnit) {
				$result['MeasureUnit'] = $this->aMeasureUnit->toArray($keyType, $includeLazyLoadColumns, true);
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
				$this->setDescription($value);
				break;
			case 4:
				$this->setPrice($value);
				break;
			case 5:
				$this->setUnitid($value);
				break;
			case 6:
				$this->setMeasureunitid($value);
				break;
			case 7:
				$this->setActive($value);
				break;
			case 8:
				$this->setOrdercode($value);
				break;
			case 9:
				$this->setSalesunit($value);
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
		if (array_key_exists($keys[3], $arr)) $this->setDescription($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPrice($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUnitid($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMeasureunitid($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setActive($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setOrdercode($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSalesunit($arr[$keys[9]]);
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
		if ($this->isColumnModified(ProductPeer::DESCRIPTION)) $criteria->add(ProductPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(ProductPeer::PRICE)) $criteria->add(ProductPeer::PRICE, $this->price);
		if ($this->isColumnModified(ProductPeer::UNITID)) $criteria->add(ProductPeer::UNITID, $this->unitid);
		if ($this->isColumnModified(ProductPeer::MEASUREUNITID)) $criteria->add(ProductPeer::MEASUREUNITID, $this->measureunitid);
		if ($this->isColumnModified(ProductPeer::ACTIVE)) $criteria->add(ProductPeer::ACTIVE, $this->active);
		if ($this->isColumnModified(ProductPeer::ORDERCODE)) $criteria->add(ProductPeer::ORDERCODE, $this->ordercode);
		if ($this->isColumnModified(ProductPeer::SALESUNIT)) $criteria->add(ProductPeer::SALESUNIT, $this->salesunit);

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
		$copyObj->setDescription($this->description);
		$copyObj->setPrice($this->price);
		$copyObj->setUnitid($this->unitid);
		$copyObj->setMeasureunitid($this->measureunitid);
		$copyObj->setActive($this->active);
		$copyObj->setOrdercode($this->ordercode);
		$copyObj->setSalesunit($this->salesunit);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getAffiliateProducts() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAffiliateProduct($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getProductCategorys() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProductCategory($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getOrderItems() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addOrderItem($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getOrderTemplateItems() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addOrderTemplateItem($relObj->copy($deepCopy));
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
	 * Declares an association between this object and a Unit object.
	 *
	 * @param      Unit $v
	 * @return     Product The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUnit(Unit $v = null)
	{
		if ($v === null) {
			$this->setUnitid(NULL);
		} else {
			$this->setUnitid($v->getId());
		}

		$this->aUnit = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Unit object, it will not be re-added.
		if ($v !== null) {
			$v->addProduct($this);
		}

		return $this;
	}


	/**
	 * Get the associated Unit object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Unit The associated Unit object.
	 * @throws     PropelException
	 */
	public function getUnit(PropelPDO $con = null)
	{
		if ($this->aUnit === null && ($this->unitid !== null)) {
			$this->aUnit = UnitQuery::create()->findPk($this->unitid, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aUnit->addProducts($this);
			 */
		}
		return $this->aUnit;
	}

	/**
	 * Declares an association between this object and a MeasureUnit object.
	 *
	 * @param      MeasureUnit $v
	 * @return     Product The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setMeasureUnit(MeasureUnit $v = null)
	{
		if ($v === null) {
			$this->setMeasureunitid(NULL);
		} else {
			$this->setMeasureunitid($v->getId());
		}

		$this->aMeasureUnit = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the MeasureUnit object, it will not be re-added.
		if ($v !== null) {
			$v->addProduct($this);
		}

		return $this;
	}


	/**
	 * Get the associated MeasureUnit object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     MeasureUnit The associated MeasureUnit object.
	 * @throws     PropelException
	 */
	public function getMeasureUnit(PropelPDO $con = null)
	{
		if ($this->aMeasureUnit === null && ($this->measureunitid !== null)) {
			$this->aMeasureUnit = MeasureUnitQuery::create()->findPk($this->measureunitid, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aMeasureUnit->addProducts($this);
			 */
		}
		return $this->aMeasureUnit;
	}

	/**
	 * Clears out the collAffiliateProducts collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAffiliateProducts()
	 */
	public function clearAffiliateProducts()
	{
		$this->collAffiliateProducts = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAffiliateProducts collection.
	 *
	 * By default this just sets the collAffiliateProducts collection to an empty array (like clearcollAffiliateProducts());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAffiliateProducts()
	{
		$this->collAffiliateProducts = new PropelObjectCollection();
		$this->collAffiliateProducts->setModel('AffiliateProduct');
	}

	/**
	 * Gets an array of AffiliateProduct objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Product is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AffiliateProduct[] List of AffiliateProduct objects
	 * @throws     PropelException
	 */
	public function getAffiliateProducts($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateProducts || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateProducts) {
				// return empty collection
				$this->initAffiliateProducts();
			} else {
				$collAffiliateProducts = AffiliateProductQuery::create(null, $criteria)
					->filterByProduct($this)
					->find($con);
				if (null !== $criteria) {
					return $collAffiliateProducts;
				}
				$this->collAffiliateProducts = $collAffiliateProducts;
			}
		}
		return $this->collAffiliateProducts;
	}

	/**
	 * Returns the number of related AffiliateProduct objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AffiliateProduct objects.
	 * @throws     PropelException
	 */
	public function countAffiliateProducts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateProducts || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateProducts) {
				return 0;
			} else {
				$query = AffiliateProductQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByProduct($this)
					->count($con);
			}
		} else {
			return count($this->collAffiliateProducts);
		}
	}

	/**
	 * Method called to associate a AffiliateProduct object to this object
	 * through the AffiliateProduct foreign key attribute.
	 *
	 * @param      AffiliateProduct $l AffiliateProduct
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAffiliateProduct(AffiliateProduct $l)
	{
		if ($this->collAffiliateProducts === null) {
			$this->initAffiliateProducts();
		}
		if (!$this->collAffiliateProducts->contains($l)) { // only add it if the **same** object is not already associated
			$this->collAffiliateProducts[]= $l;
			$l->setProduct($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related AffiliateProducts from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array AffiliateProduct[] List of AffiliateProduct objects
	 */
	public function getAffiliateProductsJoinAffiliate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AffiliateProductQuery::create(null, $criteria);
		$query->joinWith('Affiliate', $join_behavior);

		return $this->getAffiliateProducts($query, $con);
	}

	/**
	 * Clears out the collProductCategorys collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProductCategorys()
	 */
	public function clearProductCategorys()
	{
		$this->collProductCategorys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProductCategorys collection.
	 *
	 * By default this just sets the collProductCategorys collection to an empty array (like clearcollProductCategorys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProductCategorys()
	{
		$this->collProductCategorys = new PropelObjectCollection();
		$this->collProductCategorys->setModel('ProductCategory');
	}

	/**
	 * Gets an array of ProductCategory objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Product is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ProductCategory[] List of ProductCategory objects
	 * @throws     PropelException
	 */
	public function getProductCategorys($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collProductCategorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collProductCategorys) {
				// return empty collection
				$this->initProductCategorys();
			} else {
				$collProductCategorys = ProductCategoryQuery::create(null, $criteria)
					->filterByProduct($this)
					->find($con);
				if (null !== $criteria) {
					return $collProductCategorys;
				}
				$this->collProductCategorys = $collProductCategorys;
			}
		}
		return $this->collProductCategorys;
	}

	/**
	 * Returns the number of related ProductCategory objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ProductCategory objects.
	 * @throws     PropelException
	 */
	public function countProductCategorys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collProductCategorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collProductCategorys) {
				return 0;
			} else {
				$query = ProductCategoryQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByProduct($this)
					->count($con);
			}
		} else {
			return count($this->collProductCategorys);
		}
	}

	/**
	 * Method called to associate a ProductCategory object to this object
	 * through the ProductCategory foreign key attribute.
	 *
	 * @param      ProductCategory $l ProductCategory
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProductCategory(ProductCategory $l)
	{
		if ($this->collProductCategorys === null) {
			$this->initProductCategorys();
		}
		if (!$this->collProductCategorys->contains($l)) { // only add it if the **same** object is not already associated
			$this->collProductCategorys[]= $l;
			$l->setProduct($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related ProductCategorys from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ProductCategory[] List of ProductCategory objects
	 */
	public function getProductCategorysJoinCategory($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ProductCategoryQuery::create(null, $criteria);
		$query->joinWith('Category', $join_behavior);

		return $this->getProductCategorys($query, $con);
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
	 * @return     void
	 */
	public function initOrderItems()
	{
		$this->collOrderItems = new PropelObjectCollection();
		$this->collOrderItems->setModel('OrderItem');
	}

	/**
	 * Gets an array of OrderItem objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Product is new, it will return
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
					->filterByProduct($this)
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
					->filterByProduct($this)
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
			$l->setProduct($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related OrderItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array OrderItem[] List of OrderItem objects
	 */
	public function getOrderItemsJoinOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = OrderItemQuery::create(null, $criteria);
		$query->joinWith('Order', $join_behavior);

		return $this->getOrderItems($query, $con);
	}

	/**
	 * Clears out the collOrderTemplateItems collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addOrderTemplateItems()
	 */
	public function clearOrderTemplateItems()
	{
		$this->collOrderTemplateItems = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collOrderTemplateItems collection.
	 *
	 * By default this just sets the collOrderTemplateItems collection to an empty array (like clearcollOrderTemplateItems());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initOrderTemplateItems()
	{
		$this->collOrderTemplateItems = new PropelObjectCollection();
		$this->collOrderTemplateItems->setModel('OrderTemplateItem');
	}

	/**
	 * Gets an array of OrderTemplateItem objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Product is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array OrderTemplateItem[] List of OrderTemplateItem objects
	 * @throws     PropelException
	 */
	public function getOrderTemplateItems($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collOrderTemplateItems || null !== $criteria) {
			if ($this->isNew() && null === $this->collOrderTemplateItems) {
				// return empty collection
				$this->initOrderTemplateItems();
			} else {
				$collOrderTemplateItems = OrderTemplateItemQuery::create(null, $criteria)
					->filterByProduct($this)
					->find($con);
				if (null !== $criteria) {
					return $collOrderTemplateItems;
				}
				$this->collOrderTemplateItems = $collOrderTemplateItems;
			}
		}
		return $this->collOrderTemplateItems;
	}

	/**
	 * Returns the number of related OrderTemplateItem objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related OrderTemplateItem objects.
	 * @throws     PropelException
	 */
	public function countOrderTemplateItems(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collOrderTemplateItems || null !== $criteria) {
			if ($this->isNew() && null === $this->collOrderTemplateItems) {
				return 0;
			} else {
				$query = OrderTemplateItemQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByProduct($this)
					->count($con);
			}
		} else {
			return count($this->collOrderTemplateItems);
		}
	}

	/**
	 * Method called to associate a OrderTemplateItem object to this object
	 * through the OrderTemplateItem foreign key attribute.
	 *
	 * @param      OrderTemplateItem $l OrderTemplateItem
	 * @return     void
	 * @throws     PropelException
	 */
	public function addOrderTemplateItem(OrderTemplateItem $l)
	{
		if ($this->collOrderTemplateItems === null) {
			$this->initOrderTemplateItems();
		}
		if (!$this->collOrderTemplateItems->contains($l)) { // only add it if the **same** object is not already associated
			$this->collOrderTemplateItems[]= $l;
			$l->setProduct($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related OrderTemplateItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array OrderTemplateItem[] List of OrderTemplateItem objects
	 */
	public function getOrderTemplateItemsJoinOrderTemplate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = OrderTemplateItemQuery::create(null, $criteria);
		$query->joinWith('OrderTemplate', $join_behavior);

		return $this->getOrderTemplateItems($query, $con);
	}

	/**
	 * Clears out the collAffiliates collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAffiliates()
	 */
	public function clearAffiliates()
	{
		$this->collAffiliates = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAffiliates collection.
	 *
	 * By default this just sets the collAffiliates collection to an empty collection (like clearAffiliates());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAffiliates()
	{
		$this->collAffiliates = new PropelObjectCollection();
		$this->collAffiliates->setModel('Affiliate');
	}

	/**
	 * Gets a collection of Affiliate objects related by a many-to-many relationship
	 * to the current object by way of the catalog_affiliateProduct cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Product is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Affiliate[] List of Affiliate objects
	 */
	public function getAffiliates($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAffiliates || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliates) {
				// return empty collection
				$this->initAffiliates();
			} else {
				$collAffiliates = AffiliateQuery::create(null, $criteria)
					->filterByProduct($this)
					->find($con);
				if (null !== $criteria) {
					return $collAffiliates;
				}
				$this->collAffiliates = $collAffiliates;
			}
		}
		return $this->collAffiliates;
	}

	/**
	 * Gets the number of Affiliate objects related by a many-to-many relationship
	 * to the current object by way of the catalog_affiliateProduct cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Affiliate objects
	 */
	public function countAffiliates($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAffiliates || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliates) {
				return 0;
			} else {
				$query = AffiliateQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByProduct($this)
					->count($con);
			}
		} else {
			return count($this->collAffiliates);
		}
	}

	/**
	 * Associate a Affiliate object to this object
	 * through the catalog_affiliateProduct cross reference table.
	 *
	 * @param      Affiliate $affiliate The AffiliateProduct object to relate
	 * @return     void
	 */
	public function addAffiliate($affiliate)
	{
		if ($this->collAffiliates === null) {
			$this->initAffiliates();
		}
		if (!$this->collAffiliates->contains($affiliate)) { // only add it if the **same** object is not already associated
			$affiliateProduct = new AffiliateProduct();
			$affiliateProduct->setAffiliate($affiliate);
			$this->addAffiliateProduct($affiliateProduct);

			$this->collAffiliates[]= $affiliate;
		}
	}

	/**
	 * Clears out the collCategorys collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCategorys()
	 */
	public function clearCategorys()
	{
		$this->collCategorys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCategorys collection.
	 *
	 * By default this just sets the collCategorys collection to an empty collection (like clearCategorys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCategorys()
	{
		$this->collCategorys = new PropelObjectCollection();
		$this->collCategorys->setModel('Category');
	}

	/**
	 * Gets a collection of Category objects related by a many-to-many relationship
	 * to the current object by way of the catalog_productCategory cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Product is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Category[] List of Category objects
	 */
	public function getCategorys($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCategorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collCategorys) {
				// return empty collection
				$this->initCategorys();
			} else {
				$collCategorys = CategoryQuery::create(null, $criteria)
					->filterByProduct($this)
					->find($con);
				if (null !== $criteria) {
					return $collCategorys;
				}
				$this->collCategorys = $collCategorys;
			}
		}
		return $this->collCategorys;
	}

	/**
	 * Gets the number of Category objects related by a many-to-many relationship
	 * to the current object by way of the catalog_productCategory cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Category objects
	 */
	public function countCategorys($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCategorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collCategorys) {
				return 0;
			} else {
				$query = CategoryQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByProduct($this)
					->count($con);
			}
		} else {
			return count($this->collCategorys);
		}
	}

	/**
	 * Associate a Category object to this object
	 * through the catalog_productCategory cross reference table.
	 *
	 * @param      Category $category The ProductCategory object to relate
	 * @return     void
	 */
	public function addCategory($category)
	{
		if ($this->collCategorys === null) {
			$this->initCategorys();
		}
		if (!$this->collCategorys->contains($category)) { // only add it if the **same** object is not already associated
			$productCategory = new ProductCategory();
			$productCategory->setCategory($category);
			$this->addProductCategory($productCategory);

			$this->collCategorys[]= $category;
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->code = null;
		$this->name = null;
		$this->description = null;
		$this->price = null;
		$this->unitid = null;
		$this->measureunitid = null;
		$this->active = null;
		$this->ordercode = null;
		$this->salesunit = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
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
			if ($this->collAffiliateProducts) {
				foreach ((array) $this->collAffiliateProducts as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProductCategorys) {
				foreach ((array) $this->collProductCategorys as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collOrderItems) {
				foreach ((array) $this->collOrderItems as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collOrderTemplateItems) {
				foreach ((array) $this->collOrderTemplateItems as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collAffiliateProducts = null;
		$this->collProductCategorys = null;
		$this->collOrderItems = null;
		$this->collOrderTemplateItems = null;
		$this->aUnit = null;
		$this->aMeasureUnit = null;
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
