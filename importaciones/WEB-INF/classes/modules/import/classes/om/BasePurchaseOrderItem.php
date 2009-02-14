<?php

/**
 * Base class that represents a row from the 'import_purchaseOrderItem' table.
 *
 * Elemento de Orden de Pedido a Cliente
 *
 * @package    import.classes.om
 */
abstract class BasePurchaseOrderItem extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        PurchaseOrderItemPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the productid field.
	 * @var        int
	 */
	protected $productid;

	/**
	 * The value for the supplierpurchaseorderid field.
	 * @var        int
	 */
	protected $supplierpurchaseorderid;

	/**
	 * The value for the price field.
	 * @var        double
	 */
	protected $price;

	/**
	 * The value for the quantity field.
	 * @var        int
	 */
	protected $quantity;

	/**
	 * @var        Product
	 */
	protected $aProduct;

	/**
	 * @var        SupplierPurchaseOrder
	 */
	protected $aSupplierPurchaseOrder;

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
	 * Initializes internal state of BasePurchaseOrderItem object.
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
	 * Id elemento de Orden de Pedido a Cliente
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [productid] column value.
	 * Id producto
	 * @return     int
	 */
	public function getProductid()
	{
		return $this->productid;
	}

	/**
	 * Get the [supplierpurchaseorderid] column value.
	 * Id producto
	 * @return     int
	 */
	public function getSupplierpurchaseorderid()
	{
		return $this->supplierpurchaseorderid;
	}

	/**
	 * Get the [price] column value.
	 * Id producto
	 * @return     double
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * Get the [quantity] column value.
	 * Id producto
	 * @return     int
	 */
	public function getQuantity()
	{
		return $this->quantity;
	}

	/**
	 * Set the value of [id] column.
	 * Id elemento de Orden de Pedido a Cliente
	 * @param      int $v new value
	 * @return     PurchaseOrderItem The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PurchaseOrderItemPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [productid] column.
	 * Id producto
	 * @param      int $v new value
	 * @return     PurchaseOrderItem The current object (for fluent API support)
	 */
	public function setProductid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->productid !== $v) {
			$this->productid = $v;
			$this->modifiedColumns[] = PurchaseOrderItemPeer::PRODUCTID;
		}

		if ($this->aProduct !== null && $this->aProduct->getId() !== $v) {
			$this->aProduct = null;
		}

		return $this;
	} // setProductid()

	/**
	 * Set the value of [supplierpurchaseorderid] column.
	 * Id producto
	 * @param      int $v new value
	 * @return     PurchaseOrderItem The current object (for fluent API support)
	 */
	public function setSupplierpurchaseorderid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->supplierpurchaseorderid !== $v) {
			$this->supplierpurchaseorderid = $v;
			$this->modifiedColumns[] = PurchaseOrderItemPeer::SUPPLIERPURCHASEORDERID;
		}

		if ($this->aSupplierPurchaseOrder !== null && $this->aSupplierPurchaseOrder->getId() !== $v) {
			$this->aSupplierPurchaseOrder = null;
		}

		return $this;
	} // setSupplierpurchaseorderid()

	/**
	 * Set the value of [price] column.
	 * Id producto
	 * @param      double $v new value
	 * @return     PurchaseOrderItem The current object (for fluent API support)
	 */
	public function setPrice($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->price !== $v) {
			$this->price = $v;
			$this->modifiedColumns[] = PurchaseOrderItemPeer::PRICE;
		}

		return $this;
	} // setPrice()

	/**
	 * Set the value of [quantity] column.
	 * Id producto
	 * @param      int $v new value
	 * @return     PurchaseOrderItem The current object (for fluent API support)
	 */
	public function setQuantity($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->quantity !== $v) {
			$this->quantity = $v;
			$this->modifiedColumns[] = PurchaseOrderItemPeer::QUANTITY;
		}

		return $this;
	} // setQuantity()

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
			$this->productid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->supplierpurchaseorderid = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->price = ($row[$startcol + 3] !== null) ? (double) $row[$startcol + 3] : null;
			$this->quantity = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 5; // 5 = PurchaseOrderItemPeer::NUM_COLUMNS - PurchaseOrderItemPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating PurchaseOrderItem object", $e);
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

		if ($this->aProduct !== null && $this->productid !== $this->aProduct->getId()) {
			$this->aProduct = null;
		}
		if ($this->aSupplierPurchaseOrder !== null && $this->supplierpurchaseorderid !== $this->aSupplierPurchaseOrder->getId()) {
			$this->aSupplierPurchaseOrder = null;
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
			$con = Propel::getConnection(PurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = PurchaseOrderItemPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aProduct = null;
			$this->aSupplierPurchaseOrder = null;
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
			$con = Propel::getConnection(PurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			PurchaseOrderItemPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			PurchaseOrderItemPeer::addInstanceToPool($this);
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

			if ($this->aProduct !== null) {
				if ($this->aProduct->isModified() || $this->aProduct->isNew()) {
					$affectedRows += $this->aProduct->save($con);
				}
				$this->setProduct($this->aProduct);
			}

			if ($this->aSupplierPurchaseOrder !== null) {
				if ($this->aSupplierPurchaseOrder->isModified() || $this->aSupplierPurchaseOrder->isNew()) {
					$affectedRows += $this->aSupplierPurchaseOrder->save($con);
				}
				$this->setSupplierPurchaseOrder($this->aSupplierPurchaseOrder);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = PurchaseOrderItemPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PurchaseOrderItemPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += PurchaseOrderItemPeer::doUpdate($this, $con);
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

			if ($this->aProduct !== null) {
				if (!$this->aProduct->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProduct->getValidationFailures());
				}
			}

			if ($this->aSupplierPurchaseOrder !== null) {
				if (!$this->aSupplierPurchaseOrder->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSupplierPurchaseOrder->getValidationFailures());
				}
			}


			if (($retval = PurchaseOrderItemPeer::doValidate($this, $columns)) !== true) {
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
		$criteria = new Criteria(PurchaseOrderItemPeer::DATABASE_NAME);

		if ($this->isColumnModified(PurchaseOrderItemPeer::ID)) $criteria->add(PurchaseOrderItemPeer::ID, $this->id);
		if ($this->isColumnModified(PurchaseOrderItemPeer::PRODUCTID)) $criteria->add(PurchaseOrderItemPeer::PRODUCTID, $this->productid);
		if ($this->isColumnModified(PurchaseOrderItemPeer::SUPPLIERPURCHASEORDERID)) $criteria->add(PurchaseOrderItemPeer::SUPPLIERPURCHASEORDERID, $this->supplierpurchaseorderid);
		if ($this->isColumnModified(PurchaseOrderItemPeer::PRICE)) $criteria->add(PurchaseOrderItemPeer::PRICE, $this->price);
		if ($this->isColumnModified(PurchaseOrderItemPeer::QUANTITY)) $criteria->add(PurchaseOrderItemPeer::QUANTITY, $this->quantity);

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
		$criteria = new Criteria(PurchaseOrderItemPeer::DATABASE_NAME);

		$criteria->add(PurchaseOrderItemPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of PurchaseOrderItem (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setProductid($this->productid);

		$copyObj->setSupplierpurchaseorderid($this->supplierpurchaseorderid);

		$copyObj->setPrice($this->price);

		$copyObj->setQuantity($this->quantity);


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
	 * @return     PurchaseOrderItem Clone of current object.
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
	 * @return     PurchaseOrderItemPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PurchaseOrderItemPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Product object.
	 *
	 * @param      Product $v
	 * @return     PurchaseOrderItem The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setProduct(Product $v = null)
	{
		if ($v === null) {
			$this->setProductid(NULL);
		} else {
			$this->setProductid($v->getId());
		}

		$this->aProduct = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Product object, it will not be re-added.
		if ($v !== null) {
			$v->addPurchaseOrderItem($this);
		}

		return $this;
	}


	/**
	 * Get the associated Product object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Product The associated Product object.
	 * @throws     PropelException
	 */
	public function getProduct(PropelPDO $con = null)
	{
		if ($this->aProduct === null && ($this->productid !== null)) {
			$this->aProduct = ProductPeer::retrieveByPK($this->productid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aProduct->addPurchaseOrderItems($this);
			 */
		}
		return $this->aProduct;
	}

	/**
	 * Declares an association between this object and a SupplierPurchaseOrder object.
	 *
	 * @param      SupplierPurchaseOrder $v
	 * @return     PurchaseOrderItem The current object (for fluent API support)
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
			$v->addPurchaseOrderItem($this);
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
			$this->aSupplierPurchaseOrder = SupplierPurchaseOrderPeer::retrieveByPK($this->supplierpurchaseorderid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aSupplierPurchaseOrder->addPurchaseOrderItems($this);
			 */
		}
		return $this->aSupplierPurchaseOrder;
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

			$this->aProduct = null;
			$this->aSupplierPurchaseOrder = null;
	}

} // BasePurchaseOrderItem
