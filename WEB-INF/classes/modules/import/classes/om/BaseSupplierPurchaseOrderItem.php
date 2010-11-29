<?php


/**
 * Base class that represents a row from the 'import_supplierPurchaseOrderItem' table.
 *
 * Elemento de Orden de Pedido a Proveedor
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseSupplierPurchaseOrderItem extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
  const PEER = 'SupplierPurchaseOrderItemPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SupplierPurchaseOrderItemPeer
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
	 * The value for the quantity field.
	 * @var        int
	 */
	protected $quantity;

	/**
	 * The value for the portid field.
	 * @var        int
	 */
	protected $portid;

	/**
	 * The value for the incotermid field.
	 * @var        int
	 */
	protected $incotermid;

	/**
	 * The value for the price field.
	 * @var        double
	 */
	protected $price;

	/**
	 * The value for the delivery field.
	 * @var        int
	 */
	protected $delivery;

	/**
	 * The value for the package field.
	 * @var        int
	 */
	protected $package;

	/**
	 * The value for the unitlength field.
	 * @var        double
	 */
	protected $unitlength;

	/**
	 * The value for the unitwidth field.
	 * @var        double
	 */
	protected $unitwidth;

	/**
	 * The value for the unitheight field.
	 * @var        double
	 */
	protected $unitheight;

	/**
	 * The value for the unitgrossweigth field.
	 * @var        double
	 */
	protected $unitgrossweigth;

	/**
	 * The value for the unitspercarton field.
	 * @var        int
	 */
	protected $unitspercarton;

	/**
	 * The value for the cartons field.
	 * @var        int
	 */
	protected $cartons;

	/**
	 * The value for the cartonlength field.
	 * @var        double
	 */
	protected $cartonlength;

	/**
	 * The value for the cartonwidth field.
	 * @var        double
	 */
	protected $cartonwidth;

	/**
	 * The value for the cartonheight field.
	 * @var        double
	 */
	protected $cartonheight;

	/**
	 * The value for the cartongrossweigth field.
	 * @var        double
	 */
	protected $cartongrossweigth;

	/**
	 * @var        Product
	 */
	protected $aProduct;

	/**
	 * @var        SupplierPurchaseOrder
	 */
	protected $aSupplierPurchaseOrder;

	/**
	 * @var        Incoterm
	 */
	protected $aIncoterm;

	/**
	 * @var        Port
	 */
	protected $aPort;

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
	 * Get the [quantity] column value.
	 * Id producto
	 * @return     int
	 */
	public function getQuantity()
	{
		return $this->quantity;
	}

	/**
	 * Get the [portid] column value.
	 * id de puerto
	 * @return     int
	 */
	public function getPortid()
	{
		return $this->portid;
	}

	/**
	 * Get the [incotermid] column value.
	 * id de incoterm
	 * @return     int
	 */
	public function getIncotermid()
	{
		return $this->incotermid;
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
	 * Get the [delivery] column value.
	 * Tiempo en dias para la entrega del producto.
	 * @return     int
	 */
	public function getDelivery()
	{
		return $this->delivery;
	}

	/**
	 * Get the [package] column value.
	 * A seleccionar entre Unidades o Bultos
	 * @return     int
	 */
	public function getPackage()
	{
		return $this->package;
	}

	/**
	 * Get the [unitlength] column value.
	 * Largo del empaque de la unidad 
	 * @return     double
	 */
	public function getUnitlength()
	{
		return $this->unitlength;
	}

	/**
	 * Get the [unitwidth] column value.
	 * Ancho del empaque de la unidad 
	 * @return     double
	 */
	public function getUnitwidth()
	{
		return $this->unitwidth;
	}

	/**
	 * Get the [unitheight] column value.
	 * Alto del empaque de la unidad 
	 * @return     double
	 */
	public function getUnitheight()
	{
		return $this->unitheight;
	}

	/**
	 * Get the [unitgrossweigth] column value.
	 * Peso del empaque de la unidad 
	 * @return     double
	 */
	public function getUnitgrossweigth()
	{
		return $this->unitgrossweigth;
	}

	/**
	 * Get the [unitspercarton] column value.
	 * Unidades por bulto
	 * @return     int
	 */
	public function getUnitspercarton()
	{
		return $this->unitspercarton;
	}

	/**
	 * Get the [cartons] column value.
	 * Cantidad de bultos
	 * @return     int
	 */
	public function getCartons()
	{
		return $this->cartons;
	}

	/**
	 * Get the [cartonlength] column value.
	 * Largo del bulto
	 * @return     double
	 */
	public function getCartonlength()
	{
		return $this->cartonlength;
	}

	/**
	 * Get the [cartonwidth] column value.
	 * Ancho del bulto
	 * @return     double
	 */
	public function getCartonwidth()
	{
		return $this->cartonwidth;
	}

	/**
	 * Get the [cartonheight] column value.
	 * Alto del bulto
	 * @return     double
	 */
	public function getCartonheight()
	{
		return $this->cartonheight;
	}

	/**
	 * Get the [cartongrossweigth] column value.
	 * Peso del bulto
	 * @return     double
	 */
	public function getCartongrossweigth()
	{
		return $this->cartongrossweigth;
	}

	/**
	 * Set the value of [id] column.
	 * Id elemento de Orden de Pedido a Cliente
	 * @param      int $v new value
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderItemPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [productid] column.
	 * Id producto
	 * @param      int $v new value
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
	 */
	public function setProductid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->productid !== $v) {
			$this->productid = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderItemPeer::PRODUCTID;
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
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
	 */
	public function setSupplierpurchaseorderid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->supplierpurchaseorderid !== $v) {
			$this->supplierpurchaseorderid = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderItemPeer::SUPPLIERPURCHASEORDERID;
		}

		if ($this->aSupplierPurchaseOrder !== null && $this->aSupplierPurchaseOrder->getId() !== $v) {
			$this->aSupplierPurchaseOrder = null;
		}

		return $this;
	} // setSupplierpurchaseorderid()

	/**
	 * Set the value of [quantity] column.
	 * Id producto
	 * @param      int $v new value
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
	 */
	public function setQuantity($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->quantity !== $v) {
			$this->quantity = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderItemPeer::QUANTITY;
		}

		return $this;
	} // setQuantity()

	/**
	 * Set the value of [portid] column.
	 * id de puerto
	 * @param      int $v new value
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
	 */
	public function setPortid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->portid !== $v) {
			$this->portid = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderItemPeer::PORTID;
		}

		if ($this->aPort !== null && $this->aPort->getId() !== $v) {
			$this->aPort = null;
		}

		return $this;
	} // setPortid()

	/**
	 * Set the value of [incotermid] column.
	 * id de incoterm
	 * @param      int $v new value
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
	 */
	public function setIncotermid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->incotermid !== $v) {
			$this->incotermid = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderItemPeer::INCOTERMID;
		}

		if ($this->aIncoterm !== null && $this->aIncoterm->getId() !== $v) {
			$this->aIncoterm = null;
		}

		return $this;
	} // setIncotermid()

	/**
	 * Set the value of [price] column.
	 * precio de producto
	 * @param      double $v new value
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
	 */
	public function setPrice($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->price !== $v) {
			$this->price = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderItemPeer::PRICE;
		}

		return $this;
	} // setPrice()

	/**
	 * Set the value of [delivery] column.
	 * Tiempo en dias para la entrega del producto.
	 * @param      int $v new value
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
	 */
	public function setDelivery($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->delivery !== $v) {
			$this->delivery = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderItemPeer::DELIVERY;
		}

		return $this;
	} // setDelivery()

	/**
	 * Set the value of [package] column.
	 * A seleccionar entre Unidades o Bultos
	 * @param      int $v new value
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
	 */
	public function setPackage($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->package !== $v) {
			$this->package = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderItemPeer::PACKAGE;
		}

		return $this;
	} // setPackage()

	/**
	 * Set the value of [unitlength] column.
	 * Largo del empaque de la unidad 
	 * @param      double $v new value
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
	 */
	public function setUnitlength($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->unitlength !== $v) {
			$this->unitlength = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderItemPeer::UNITLENGTH;
		}

		return $this;
	} // setUnitlength()

	/**
	 * Set the value of [unitwidth] column.
	 * Ancho del empaque de la unidad 
	 * @param      double $v new value
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
	 */
	public function setUnitwidth($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->unitwidth !== $v) {
			$this->unitwidth = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderItemPeer::UNITWIDTH;
		}

		return $this;
	} // setUnitwidth()

	/**
	 * Set the value of [unitheight] column.
	 * Alto del empaque de la unidad 
	 * @param      double $v new value
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
	 */
	public function setUnitheight($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->unitheight !== $v) {
			$this->unitheight = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderItemPeer::UNITHEIGHT;
		}

		return $this;
	} // setUnitheight()

	/**
	 * Set the value of [unitgrossweigth] column.
	 * Peso del empaque de la unidad 
	 * @param      double $v new value
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
	 */
	public function setUnitgrossweigth($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->unitgrossweigth !== $v) {
			$this->unitgrossweigth = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderItemPeer::UNITGROSSWEIGTH;
		}

		return $this;
	} // setUnitgrossweigth()

	/**
	 * Set the value of [unitspercarton] column.
	 * Unidades por bulto
	 * @param      int $v new value
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
	 */
	public function setUnitspercarton($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->unitspercarton !== $v) {
			$this->unitspercarton = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderItemPeer::UNITSPERCARTON;
		}

		return $this;
	} // setUnitspercarton()

	/**
	 * Set the value of [cartons] column.
	 * Cantidad de bultos
	 * @param      int $v new value
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
	 */
	public function setCartons($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cartons !== $v) {
			$this->cartons = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderItemPeer::CARTONS;
		}

		return $this;
	} // setCartons()

	/**
	 * Set the value of [cartonlength] column.
	 * Largo del bulto
	 * @param      double $v new value
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
	 */
	public function setCartonlength($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->cartonlength !== $v) {
			$this->cartonlength = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderItemPeer::CARTONLENGTH;
		}

		return $this;
	} // setCartonlength()

	/**
	 * Set the value of [cartonwidth] column.
	 * Ancho del bulto
	 * @param      double $v new value
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
	 */
	public function setCartonwidth($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->cartonwidth !== $v) {
			$this->cartonwidth = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderItemPeer::CARTONWIDTH;
		}

		return $this;
	} // setCartonwidth()

	/**
	 * Set the value of [cartonheight] column.
	 * Alto del bulto
	 * @param      double $v new value
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
	 */
	public function setCartonheight($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->cartonheight !== $v) {
			$this->cartonheight = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderItemPeer::CARTONHEIGHT;
		}

		return $this;
	} // setCartonheight()

	/**
	 * Set the value of [cartongrossweigth] column.
	 * Peso del bulto
	 * @param      double $v new value
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
	 */
	public function setCartongrossweigth($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->cartongrossweigth !== $v) {
			$this->cartongrossweigth = $v;
			$this->modifiedColumns[] = SupplierPurchaseOrderItemPeer::CARTONGROSSWEIGTH;
		}

		return $this;
	} // setCartongrossweigth()

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
			$this->productid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->supplierpurchaseorderid = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->quantity = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->portid = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->incotermid = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->price = ($row[$startcol + 6] !== null) ? (double) $row[$startcol + 6] : null;
			$this->delivery = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->package = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->unitlength = ($row[$startcol + 9] !== null) ? (double) $row[$startcol + 9] : null;
			$this->unitwidth = ($row[$startcol + 10] !== null) ? (double) $row[$startcol + 10] : null;
			$this->unitheight = ($row[$startcol + 11] !== null) ? (double) $row[$startcol + 11] : null;
			$this->unitgrossweigth = ($row[$startcol + 12] !== null) ? (double) $row[$startcol + 12] : null;
			$this->unitspercarton = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
			$this->cartons = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
			$this->cartonlength = ($row[$startcol + 15] !== null) ? (double) $row[$startcol + 15] : null;
			$this->cartonwidth = ($row[$startcol + 16] !== null) ? (double) $row[$startcol + 16] : null;
			$this->cartonheight = ($row[$startcol + 17] !== null) ? (double) $row[$startcol + 17] : null;
			$this->cartongrossweigth = ($row[$startcol + 18] !== null) ? (double) $row[$startcol + 18] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 19; // 19 = SupplierPurchaseOrderItemPeer::NUM_COLUMNS - SupplierPurchaseOrderItemPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating SupplierPurchaseOrderItem object", $e);
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
		if ($this->aPort !== null && $this->portid !== $this->aPort->getId()) {
			$this->aPort = null;
		}
		if ($this->aIncoterm !== null && $this->incotermid !== $this->aIncoterm->getId()) {
			$this->aIncoterm = null;
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
			$con = Propel::getConnection(SupplierPurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SupplierPurchaseOrderItemPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aProduct = null;
			$this->aSupplierPurchaseOrder = null;
			$this->aIncoterm = null;
			$this->aPort = null;
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
			$con = Propel::getConnection(SupplierPurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				SupplierPurchaseOrderItemQuery::create()
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
			$con = Propel::getConnection(SupplierPurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				SupplierPurchaseOrderItemPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = SupplierPurchaseOrderItemPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(SupplierPurchaseOrderItemPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.SupplierPurchaseOrderItemPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += SupplierPurchaseOrderItemPeer::doUpdate($this, $con);
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


			if (($retval = SupplierPurchaseOrderItemPeer::doValidate($this, $columns)) !== true) {
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
		$pos = SupplierPurchaseOrderItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getProductid();
				break;
			case 2:
				return $this->getSupplierpurchaseorderid();
				break;
			case 3:
				return $this->getQuantity();
				break;
			case 4:
				return $this->getPortid();
				break;
			case 5:
				return $this->getIncotermid();
				break;
			case 6:
				return $this->getPrice();
				break;
			case 7:
				return $this->getDelivery();
				break;
			case 8:
				return $this->getPackage();
				break;
			case 9:
				return $this->getUnitlength();
				break;
			case 10:
				return $this->getUnitwidth();
				break;
			case 11:
				return $this->getUnitheight();
				break;
			case 12:
				return $this->getUnitgrossweigth();
				break;
			case 13:
				return $this->getUnitspercarton();
				break;
			case 14:
				return $this->getCartons();
				break;
			case 15:
				return $this->getCartonlength();
				break;
			case 16:
				return $this->getCartonwidth();
				break;
			case 17:
				return $this->getCartonheight();
				break;
			case 18:
				return $this->getCartongrossweigth();
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
		$keys = SupplierPurchaseOrderItemPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getProductid(),
			$keys[2] => $this->getSupplierpurchaseorderid(),
			$keys[3] => $this->getQuantity(),
			$keys[4] => $this->getPortid(),
			$keys[5] => $this->getIncotermid(),
			$keys[6] => $this->getPrice(),
			$keys[7] => $this->getDelivery(),
			$keys[8] => $this->getPackage(),
			$keys[9] => $this->getUnitlength(),
			$keys[10] => $this->getUnitwidth(),
			$keys[11] => $this->getUnitheight(),
			$keys[12] => $this->getUnitgrossweigth(),
			$keys[13] => $this->getUnitspercarton(),
			$keys[14] => $this->getCartons(),
			$keys[15] => $this->getCartonlength(),
			$keys[16] => $this->getCartonwidth(),
			$keys[17] => $this->getCartonheight(),
			$keys[18] => $this->getCartongrossweigth(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aProduct) {
				$result['Product'] = $this->aProduct->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aSupplierPurchaseOrder) {
				$result['SupplierPurchaseOrder'] = $this->aSupplierPurchaseOrder->toArray($keyType, $includeLazyLoadColumns, true);
			}
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
		$pos = SupplierPurchaseOrderItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setProductid($value);
				break;
			case 2:
				$this->setSupplierpurchaseorderid($value);
				break;
			case 3:
				$this->setQuantity($value);
				break;
			case 4:
				$this->setPortid($value);
				break;
			case 5:
				$this->setIncotermid($value);
				break;
			case 6:
				$this->setPrice($value);
				break;
			case 7:
				$this->setDelivery($value);
				break;
			case 8:
				$this->setPackage($value);
				break;
			case 9:
				$this->setUnitlength($value);
				break;
			case 10:
				$this->setUnitwidth($value);
				break;
			case 11:
				$this->setUnitheight($value);
				break;
			case 12:
				$this->setUnitgrossweigth($value);
				break;
			case 13:
				$this->setUnitspercarton($value);
				break;
			case 14:
				$this->setCartons($value);
				break;
			case 15:
				$this->setCartonlength($value);
				break;
			case 16:
				$this->setCartonwidth($value);
				break;
			case 17:
				$this->setCartonheight($value);
				break;
			case 18:
				$this->setCartongrossweigth($value);
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
		$keys = SupplierPurchaseOrderItemPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setProductid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSupplierpurchaseorderid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setQuantity($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPortid($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIncotermid($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPrice($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDelivery($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPackage($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUnitlength($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUnitwidth($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUnitheight($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUnitgrossweigth($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setUnitspercarton($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCartons($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCartonlength($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCartonwidth($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCartonheight($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCartongrossweigth($arr[$keys[18]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SupplierPurchaseOrderItemPeer::DATABASE_NAME);

		if ($this->isColumnModified(SupplierPurchaseOrderItemPeer::ID)) $criteria->add(SupplierPurchaseOrderItemPeer::ID, $this->id);
		if ($this->isColumnModified(SupplierPurchaseOrderItemPeer::PRODUCTID)) $criteria->add(SupplierPurchaseOrderItemPeer::PRODUCTID, $this->productid);
		if ($this->isColumnModified(SupplierPurchaseOrderItemPeer::SUPPLIERPURCHASEORDERID)) $criteria->add(SupplierPurchaseOrderItemPeer::SUPPLIERPURCHASEORDERID, $this->supplierpurchaseorderid);
		if ($this->isColumnModified(SupplierPurchaseOrderItemPeer::QUANTITY)) $criteria->add(SupplierPurchaseOrderItemPeer::QUANTITY, $this->quantity);
		if ($this->isColumnModified(SupplierPurchaseOrderItemPeer::PORTID)) $criteria->add(SupplierPurchaseOrderItemPeer::PORTID, $this->portid);
		if ($this->isColumnModified(SupplierPurchaseOrderItemPeer::INCOTERMID)) $criteria->add(SupplierPurchaseOrderItemPeer::INCOTERMID, $this->incotermid);
		if ($this->isColumnModified(SupplierPurchaseOrderItemPeer::PRICE)) $criteria->add(SupplierPurchaseOrderItemPeer::PRICE, $this->price);
		if ($this->isColumnModified(SupplierPurchaseOrderItemPeer::DELIVERY)) $criteria->add(SupplierPurchaseOrderItemPeer::DELIVERY, $this->delivery);
		if ($this->isColumnModified(SupplierPurchaseOrderItemPeer::PACKAGE)) $criteria->add(SupplierPurchaseOrderItemPeer::PACKAGE, $this->package);
		if ($this->isColumnModified(SupplierPurchaseOrderItemPeer::UNITLENGTH)) $criteria->add(SupplierPurchaseOrderItemPeer::UNITLENGTH, $this->unitlength);
		if ($this->isColumnModified(SupplierPurchaseOrderItemPeer::UNITWIDTH)) $criteria->add(SupplierPurchaseOrderItemPeer::UNITWIDTH, $this->unitwidth);
		if ($this->isColumnModified(SupplierPurchaseOrderItemPeer::UNITHEIGHT)) $criteria->add(SupplierPurchaseOrderItemPeer::UNITHEIGHT, $this->unitheight);
		if ($this->isColumnModified(SupplierPurchaseOrderItemPeer::UNITGROSSWEIGTH)) $criteria->add(SupplierPurchaseOrderItemPeer::UNITGROSSWEIGTH, $this->unitgrossweigth);
		if ($this->isColumnModified(SupplierPurchaseOrderItemPeer::UNITSPERCARTON)) $criteria->add(SupplierPurchaseOrderItemPeer::UNITSPERCARTON, $this->unitspercarton);
		if ($this->isColumnModified(SupplierPurchaseOrderItemPeer::CARTONS)) $criteria->add(SupplierPurchaseOrderItemPeer::CARTONS, $this->cartons);
		if ($this->isColumnModified(SupplierPurchaseOrderItemPeer::CARTONLENGTH)) $criteria->add(SupplierPurchaseOrderItemPeer::CARTONLENGTH, $this->cartonlength);
		if ($this->isColumnModified(SupplierPurchaseOrderItemPeer::CARTONWIDTH)) $criteria->add(SupplierPurchaseOrderItemPeer::CARTONWIDTH, $this->cartonwidth);
		if ($this->isColumnModified(SupplierPurchaseOrderItemPeer::CARTONHEIGHT)) $criteria->add(SupplierPurchaseOrderItemPeer::CARTONHEIGHT, $this->cartonheight);
		if ($this->isColumnModified(SupplierPurchaseOrderItemPeer::CARTONGROSSWEIGTH)) $criteria->add(SupplierPurchaseOrderItemPeer::CARTONGROSSWEIGTH, $this->cartongrossweigth);

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
		$criteria = new Criteria(SupplierPurchaseOrderItemPeer::DATABASE_NAME);
		$criteria->add(SupplierPurchaseOrderItemPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of SupplierPurchaseOrderItem (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setProductid($this->productid);
		$copyObj->setSupplierpurchaseorderid($this->supplierpurchaseorderid);
		$copyObj->setQuantity($this->quantity);
		$copyObj->setPortid($this->portid);
		$copyObj->setIncotermid($this->incotermid);
		$copyObj->setPrice($this->price);
		$copyObj->setDelivery($this->delivery);
		$copyObj->setPackage($this->package);
		$copyObj->setUnitlength($this->unitlength);
		$copyObj->setUnitwidth($this->unitwidth);
		$copyObj->setUnitheight($this->unitheight);
		$copyObj->setUnitgrossweigth($this->unitgrossweigth);
		$copyObj->setUnitspercarton($this->unitspercarton);
		$copyObj->setCartons($this->cartons);
		$copyObj->setCartonlength($this->cartonlength);
		$copyObj->setCartonwidth($this->cartonwidth);
		$copyObj->setCartonheight($this->cartonheight);
		$copyObj->setCartongrossweigth($this->cartongrossweigth);

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
	 * @return     SupplierPurchaseOrderItem Clone of current object.
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
	 * @return     SupplierPurchaseOrderItemPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SupplierPurchaseOrderItemPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Product object.
	 *
	 * @param      Product $v
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
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
			$v->addSupplierPurchaseOrderItem($this);
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
			$this->aProduct = ProductQuery::create()->findPk($this->productid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aProduct->addSupplierPurchaseOrderItems($this);
			 */
		}
		return $this->aProduct;
	}

	/**
	 * Declares an association between this object and a SupplierPurchaseOrder object.
	 *
	 * @param      SupplierPurchaseOrder $v
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
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
			$v->addSupplierPurchaseOrderItem($this);
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
			   $this->aSupplierPurchaseOrder->addSupplierPurchaseOrderItems($this);
			 */
		}
		return $this->aSupplierPurchaseOrder;
	}

	/**
	 * Declares an association between this object and a Incoterm object.
	 *
	 * @param      Incoterm $v
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setIncoterm(Incoterm $v = null)
	{
		if ($v === null) {
			$this->setIncotermid(NULL);
		} else {
			$this->setIncotermid($v->getId());
		}

		$this->aIncoterm = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Incoterm object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplierPurchaseOrderItem($this);
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
		if ($this->aIncoterm === null && ($this->incotermid !== null)) {
			$this->aIncoterm = IncotermQuery::create()->findPk($this->incotermid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aIncoterm->addSupplierPurchaseOrderItems($this);
			 */
		}
		return $this->aIncoterm;
	}

	/**
	 * Declares an association between this object and a Port object.
	 *
	 * @param      Port $v
	 * @return     SupplierPurchaseOrderItem The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPort(Port $v = null)
	{
		if ($v === null) {
			$this->setPortid(NULL);
		} else {
			$this->setPortid($v->getId());
		}

		$this->aPort = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Port object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplierPurchaseOrderItem($this);
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
		if ($this->aPort === null && ($this->portid !== null)) {
			$this->aPort = PortQuery::create()->findPk($this->portid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aPort->addSupplierPurchaseOrderItems($this);
			 */
		}
		return $this->aPort;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->productid = null;
		$this->supplierpurchaseorderid = null;
		$this->quantity = null;
		$this->portid = null;
		$this->incotermid = null;
		$this->price = null;
		$this->delivery = null;
		$this->package = null;
		$this->unitlength = null;
		$this->unitwidth = null;
		$this->unitheight = null;
		$this->unitgrossweigth = null;
		$this->unitspercarton = null;
		$this->cartons = null;
		$this->cartonlength = null;
		$this->cartonwidth = null;
		$this->cartonheight = null;
		$this->cartongrossweigth = null;
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

		$this->aProduct = null;
		$this->aSupplierPurchaseOrder = null;
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

} // BaseSupplierPurchaseOrderItem
