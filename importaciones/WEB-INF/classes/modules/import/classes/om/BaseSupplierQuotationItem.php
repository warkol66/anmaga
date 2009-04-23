<?php

/**
 * Base class that represents a row from the 'import_supplierQuotationItem' table.
 *
 * Elemento de Cotizacion de Proveedor
 *
 * @package    import.classes.om
 */
abstract class BaseSupplierQuotationItem extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SupplierQuotationItemPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the supplierquotationid field.
	 * @var        int
	 */
	protected $supplierquotationid;

	/**
	 * The value for the productid field.
	 * @var        int
	 */
	protected $productid;

	/**
	 * The value for the replacedproductid field.
	 * @var        int
	 */
	protected $replacedproductid;

	/**
	 * The value for the clientquotationitemid field.
	 * @var        int
	 */
	protected $clientquotationitemid;

	/**
	 * The value for the status field.
	 * @var        int
	 */
	protected $status;

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
	 * The value for the suppliercomments field.
	 * @var        string
	 */
	protected $suppliercomments;

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
	 * @var        SupplierQuotation
	 */
	protected $aSupplierQuotation;

	/**
	 * @var        ClientQuotationItem
	 */
	protected $aClientQuotationItem;

	/**
	 * @var        Product
	 */
	protected $aProductRelatedByProductid;

	/**
	 * @var        Product
	 */
	protected $aProductRelatedByReplacedproductid;

	/**
	 * @var        Incoterm
	 */
	protected $aIncoterm;

	/**
	 * @var        Port
	 */
	protected $aPort;

	/**
	 * @var        array SupplierQuotationItemComment[] Collection to store aggregation of SupplierQuotationItemComment objects.
	 */
	protected $collSupplierQuotationItemComments;

	/**
	 * @var        Criteria The criteria used to select the current contents of collSupplierQuotationItemComments.
	 */
	private $lastSupplierQuotationItemCommentCriteria = null;

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
	 * Initializes internal state of BaseSupplierQuotationItem object.
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
	 * Id elemento de cotizacion de proveedor
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [supplierquotationid] column value.
	 * Id de cotizacion de proveedor
	 * @return     int
	 */
	public function getSupplierquotationid()
	{
		return $this->supplierquotationid;
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
	 * Get the [replacedproductid] column value.
	 * Id producto que fue reemplazado por el actual
	 * @return     int
	 */
	public function getReplacedproductid()
	{
		return $this->replacedproductid;
	}

	/**
	 * Get the [clientquotationitemid] column value.
	 * Id de cotizacion de proveedor
	 * @return     int
	 */
	public function getClientquotationitemid()
	{
		return $this->clientquotationitemid;
	}

	/**
	 * Get the [status] column value.
	 * Status de Item de Cotizacion
	 * @return     int
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Get the [quantity] column value.
	 * cantidad producto
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
	 * Get the [suppliercomments] column value.
	 * Comentarios del proveedor 
	 * @return     string
	 */
	public function getSuppliercomments()
	{
		return $this->suppliercomments;
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
	 * Id elemento de cotizacion de proveedor
	 * @param      int $v new value
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [supplierquotationid] column.
	 * Id de cotizacion de proveedor
	 * @param      int $v new value
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setSupplierquotationid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->supplierquotationid !== $v) {
			$this->supplierquotationid = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::SUPPLIERQUOTATIONID;
		}

		if ($this->aSupplierQuotation !== null && $this->aSupplierQuotation->getId() !== $v) {
			$this->aSupplierQuotation = null;
		}

		return $this;
	} // setSupplierquotationid()

	/**
	 * Set the value of [productid] column.
	 * Id producto
	 * @param      int $v new value
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setProductid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->productid !== $v) {
			$this->productid = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::PRODUCTID;
		}

		if ($this->aProductRelatedByProductid !== null && $this->aProductRelatedByProductid->getId() !== $v) {
			$this->aProductRelatedByProductid = null;
		}

		return $this;
	} // setProductid()

	/**
	 * Set the value of [replacedproductid] column.
	 * Id producto que fue reemplazado por el actual
	 * @param      int $v new value
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setReplacedproductid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->replacedproductid !== $v) {
			$this->replacedproductid = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::REPLACEDPRODUCTID;
		}

		if ($this->aProductRelatedByReplacedproductid !== null && $this->aProductRelatedByReplacedproductid->getId() !== $v) {
			$this->aProductRelatedByReplacedproductid = null;
		}

		return $this;
	} // setReplacedproductid()

	/**
	 * Set the value of [clientquotationitemid] column.
	 * Id de cotizacion de proveedor
	 * @param      int $v new value
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setClientquotationitemid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->clientquotationitemid !== $v) {
			$this->clientquotationitemid = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::CLIENTQUOTATIONITEMID;
		}

		if ($this->aClientQuotationItem !== null && $this->aClientQuotationItem->getId() !== $v) {
			$this->aClientQuotationItem = null;
		}

		return $this;
	} // setClientquotationitemid()

	/**
	 * Set the value of [status] column.
	 * Status de Item de Cotizacion
	 * @param      int $v new value
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Set the value of [quantity] column.
	 * cantidad producto
	 * @param      int $v new value
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setQuantity($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->quantity !== $v) {
			$this->quantity = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::QUANTITY;
		}

		return $this;
	} // setQuantity()

	/**
	 * Set the value of [portid] column.
	 * id de puerto
	 * @param      int $v new value
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setPortid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->portid !== $v) {
			$this->portid = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::PORTID;
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
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setIncotermid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->incotermid !== $v) {
			$this->incotermid = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::INCOTERMID;
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
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setPrice($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->price !== $v) {
			$this->price = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::PRICE;
		}

		return $this;
	} // setPrice()

	/**
	 * Set the value of [suppliercomments] column.
	 * Comentarios del proveedor 
	 * @param      string $v new value
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setSuppliercomments($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->suppliercomments !== $v) {
			$this->suppliercomments = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::SUPPLIERCOMMENTS;
		}

		return $this;
	} // setSuppliercomments()

	/**
	 * Set the value of [delivery] column.
	 * Tiempo en dias para la entrega del producto.
	 * @param      int $v new value
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setDelivery($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->delivery !== $v) {
			$this->delivery = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::DELIVERY;
		}

		return $this;
	} // setDelivery()

	/**
	 * Set the value of [package] column.
	 * A seleccionar entre Unidades o Bultos
	 * @param      int $v new value
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setPackage($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->package !== $v) {
			$this->package = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::PACKAGE;
		}

		return $this;
	} // setPackage()

	/**
	 * Set the value of [unitlength] column.
	 * Largo del empaque de la unidad 
	 * @param      double $v new value
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setUnitlength($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->unitlength !== $v) {
			$this->unitlength = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::UNITLENGTH;
		}

		return $this;
	} // setUnitlength()

	/**
	 * Set the value of [unitwidth] column.
	 * Ancho del empaque de la unidad 
	 * @param      double $v new value
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setUnitwidth($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->unitwidth !== $v) {
			$this->unitwidth = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::UNITWIDTH;
		}

		return $this;
	} // setUnitwidth()

	/**
	 * Set the value of [unitheight] column.
	 * Alto del empaque de la unidad 
	 * @param      double $v new value
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setUnitheight($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->unitheight !== $v) {
			$this->unitheight = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::UNITHEIGHT;
		}

		return $this;
	} // setUnitheight()

	/**
	 * Set the value of [unitgrossweigth] column.
	 * Peso del empaque de la unidad 
	 * @param      double $v new value
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setUnitgrossweigth($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->unitgrossweigth !== $v) {
			$this->unitgrossweigth = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::UNITGROSSWEIGTH;
		}

		return $this;
	} // setUnitgrossweigth()

	/**
	 * Set the value of [unitspercarton] column.
	 * Unidades por bulto
	 * @param      int $v new value
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setUnitspercarton($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->unitspercarton !== $v) {
			$this->unitspercarton = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::UNITSPERCARTON;
		}

		return $this;
	} // setUnitspercarton()

	/**
	 * Set the value of [cartons] column.
	 * Cantidad de bultos
	 * @param      int $v new value
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setCartons($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cartons !== $v) {
			$this->cartons = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::CARTONS;
		}

		return $this;
	} // setCartons()

	/**
	 * Set the value of [cartonlength] column.
	 * Largo del bulto
	 * @param      double $v new value
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setCartonlength($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->cartonlength !== $v) {
			$this->cartonlength = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::CARTONLENGTH;
		}

		return $this;
	} // setCartonlength()

	/**
	 * Set the value of [cartonwidth] column.
	 * Ancho del bulto
	 * @param      double $v new value
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setCartonwidth($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->cartonwidth !== $v) {
			$this->cartonwidth = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::CARTONWIDTH;
		}

		return $this;
	} // setCartonwidth()

	/**
	 * Set the value of [cartonheight] column.
	 * Alto del bulto
	 * @param      double $v new value
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setCartonheight($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->cartonheight !== $v) {
			$this->cartonheight = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::CARTONHEIGHT;
		}

		return $this;
	} // setCartonheight()

	/**
	 * Set the value of [cartongrossweigth] column.
	 * Peso del bulto
	 * @param      double $v new value
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 */
	public function setCartongrossweigth($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->cartongrossweigth !== $v) {
			$this->cartongrossweigth = $v;
			$this->modifiedColumns[] = SupplierQuotationItemPeer::CARTONGROSSWEIGTH;
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
			$this->supplierquotationid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->productid = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->replacedproductid = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->clientquotationitemid = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->status = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->quantity = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->portid = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->incotermid = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->price = ($row[$startcol + 9] !== null) ? (double) $row[$startcol + 9] : null;
			$this->suppliercomments = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->delivery = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->package = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->unitlength = ($row[$startcol + 13] !== null) ? (double) $row[$startcol + 13] : null;
			$this->unitwidth = ($row[$startcol + 14] !== null) ? (double) $row[$startcol + 14] : null;
			$this->unitheight = ($row[$startcol + 15] !== null) ? (double) $row[$startcol + 15] : null;
			$this->unitgrossweigth = ($row[$startcol + 16] !== null) ? (double) $row[$startcol + 16] : null;
			$this->unitspercarton = ($row[$startcol + 17] !== null) ? (int) $row[$startcol + 17] : null;
			$this->cartons = ($row[$startcol + 18] !== null) ? (int) $row[$startcol + 18] : null;
			$this->cartonlength = ($row[$startcol + 19] !== null) ? (double) $row[$startcol + 19] : null;
			$this->cartonwidth = ($row[$startcol + 20] !== null) ? (double) $row[$startcol + 20] : null;
			$this->cartonheight = ($row[$startcol + 21] !== null) ? (double) $row[$startcol + 21] : null;
			$this->cartongrossweigth = ($row[$startcol + 22] !== null) ? (double) $row[$startcol + 22] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 23; // 23 = SupplierQuotationItemPeer::NUM_COLUMNS - SupplierQuotationItemPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating SupplierQuotationItem object", $e);
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

		if ($this->aSupplierQuotation !== null && $this->supplierquotationid !== $this->aSupplierQuotation->getId()) {
			$this->aSupplierQuotation = null;
		}
		if ($this->aProductRelatedByProductid !== null && $this->productid !== $this->aProductRelatedByProductid->getId()) {
			$this->aProductRelatedByProductid = null;
		}
		if ($this->aProductRelatedByReplacedproductid !== null && $this->replacedproductid !== $this->aProductRelatedByReplacedproductid->getId()) {
			$this->aProductRelatedByReplacedproductid = null;
		}
		if ($this->aClientQuotationItem !== null && $this->clientquotationitemid !== $this->aClientQuotationItem->getId()) {
			$this->aClientQuotationItem = null;
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
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SupplierQuotationItemPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aSupplierQuotation = null;
			$this->aClientQuotationItem = null;
			$this->aProductRelatedByProductid = null;
			$this->aProductRelatedByReplacedproductid = null;
			$this->aIncoterm = null;
			$this->aPort = null;
			$this->collSupplierQuotationItemComments = null;
			$this->lastSupplierQuotationItemCommentCriteria = null;

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
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			SupplierQuotationItemPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			SupplierQuotationItemPeer::addInstanceToPool($this);
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

			if ($this->aSupplierQuotation !== null) {
				if ($this->aSupplierQuotation->isModified() || $this->aSupplierQuotation->isNew()) {
					$affectedRows += $this->aSupplierQuotation->save($con);
				}
				$this->setSupplierQuotation($this->aSupplierQuotation);
			}

			if ($this->aClientQuotationItem !== null) {
				if ($this->aClientQuotationItem->isModified() || $this->aClientQuotationItem->isNew()) {
					$affectedRows += $this->aClientQuotationItem->save($con);
				}
				$this->setClientQuotationItem($this->aClientQuotationItem);
			}

			if ($this->aProductRelatedByProductid !== null) {
				if ($this->aProductRelatedByProductid->isModified() || $this->aProductRelatedByProductid->isNew()) {
					$affectedRows += $this->aProductRelatedByProductid->save($con);
				}
				$this->setProductRelatedByProductid($this->aProductRelatedByProductid);
			}

			if ($this->aProductRelatedByReplacedproductid !== null) {
				if ($this->aProductRelatedByReplacedproductid->isModified() || $this->aProductRelatedByReplacedproductid->isNew()) {
					$affectedRows += $this->aProductRelatedByReplacedproductid->save($con);
				}
				$this->setProductRelatedByReplacedproductid($this->aProductRelatedByReplacedproductid);
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
				$this->modifiedColumns[] = SupplierQuotationItemPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SupplierQuotationItemPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += SupplierQuotationItemPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collSupplierQuotationItemComments !== null) {
				foreach ($this->collSupplierQuotationItemComments as $referrerFK) {
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

			if ($this->aSupplierQuotation !== null) {
				if (!$this->aSupplierQuotation->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSupplierQuotation->getValidationFailures());
				}
			}

			if ($this->aClientQuotationItem !== null) {
				if (!$this->aClientQuotationItem->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aClientQuotationItem->getValidationFailures());
				}
			}

			if ($this->aProductRelatedByProductid !== null) {
				if (!$this->aProductRelatedByProductid->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProductRelatedByProductid->getValidationFailures());
				}
			}

			if ($this->aProductRelatedByReplacedproductid !== null) {
				if (!$this->aProductRelatedByReplacedproductid->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProductRelatedByReplacedproductid->getValidationFailures());
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


			if (($retval = SupplierQuotationItemPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collSupplierQuotationItemComments !== null) {
					foreach ($this->collSupplierQuotationItemComments as $referrerFK) {
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
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SupplierQuotationItemPeer::DATABASE_NAME);

		if ($this->isColumnModified(SupplierQuotationItemPeer::ID)) $criteria->add(SupplierQuotationItemPeer::ID, $this->id);
		if ($this->isColumnModified(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID)) $criteria->add(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID, $this->supplierquotationid);
		if ($this->isColumnModified(SupplierQuotationItemPeer::PRODUCTID)) $criteria->add(SupplierQuotationItemPeer::PRODUCTID, $this->productid);
		if ($this->isColumnModified(SupplierQuotationItemPeer::REPLACEDPRODUCTID)) $criteria->add(SupplierQuotationItemPeer::REPLACEDPRODUCTID, $this->replacedproductid);
		if ($this->isColumnModified(SupplierQuotationItemPeer::CLIENTQUOTATIONITEMID)) $criteria->add(SupplierQuotationItemPeer::CLIENTQUOTATIONITEMID, $this->clientquotationitemid);
		if ($this->isColumnModified(SupplierQuotationItemPeer::STATUS)) $criteria->add(SupplierQuotationItemPeer::STATUS, $this->status);
		if ($this->isColumnModified(SupplierQuotationItemPeer::QUANTITY)) $criteria->add(SupplierQuotationItemPeer::QUANTITY, $this->quantity);
		if ($this->isColumnModified(SupplierQuotationItemPeer::PORTID)) $criteria->add(SupplierQuotationItemPeer::PORTID, $this->portid);
		if ($this->isColumnModified(SupplierQuotationItemPeer::INCOTERMID)) $criteria->add(SupplierQuotationItemPeer::INCOTERMID, $this->incotermid);
		if ($this->isColumnModified(SupplierQuotationItemPeer::PRICE)) $criteria->add(SupplierQuotationItemPeer::PRICE, $this->price);
		if ($this->isColumnModified(SupplierQuotationItemPeer::SUPPLIERCOMMENTS)) $criteria->add(SupplierQuotationItemPeer::SUPPLIERCOMMENTS, $this->suppliercomments);
		if ($this->isColumnModified(SupplierQuotationItemPeer::DELIVERY)) $criteria->add(SupplierQuotationItemPeer::DELIVERY, $this->delivery);
		if ($this->isColumnModified(SupplierQuotationItemPeer::PACKAGE)) $criteria->add(SupplierQuotationItemPeer::PACKAGE, $this->package);
		if ($this->isColumnModified(SupplierQuotationItemPeer::UNITLENGTH)) $criteria->add(SupplierQuotationItemPeer::UNITLENGTH, $this->unitlength);
		if ($this->isColumnModified(SupplierQuotationItemPeer::UNITWIDTH)) $criteria->add(SupplierQuotationItemPeer::UNITWIDTH, $this->unitwidth);
		if ($this->isColumnModified(SupplierQuotationItemPeer::UNITHEIGHT)) $criteria->add(SupplierQuotationItemPeer::UNITHEIGHT, $this->unitheight);
		if ($this->isColumnModified(SupplierQuotationItemPeer::UNITGROSSWEIGTH)) $criteria->add(SupplierQuotationItemPeer::UNITGROSSWEIGTH, $this->unitgrossweigth);
		if ($this->isColumnModified(SupplierQuotationItemPeer::UNITSPERCARTON)) $criteria->add(SupplierQuotationItemPeer::UNITSPERCARTON, $this->unitspercarton);
		if ($this->isColumnModified(SupplierQuotationItemPeer::CARTONS)) $criteria->add(SupplierQuotationItemPeer::CARTONS, $this->cartons);
		if ($this->isColumnModified(SupplierQuotationItemPeer::CARTONLENGTH)) $criteria->add(SupplierQuotationItemPeer::CARTONLENGTH, $this->cartonlength);
		if ($this->isColumnModified(SupplierQuotationItemPeer::CARTONWIDTH)) $criteria->add(SupplierQuotationItemPeer::CARTONWIDTH, $this->cartonwidth);
		if ($this->isColumnModified(SupplierQuotationItemPeer::CARTONHEIGHT)) $criteria->add(SupplierQuotationItemPeer::CARTONHEIGHT, $this->cartonheight);
		if ($this->isColumnModified(SupplierQuotationItemPeer::CARTONGROSSWEIGTH)) $criteria->add(SupplierQuotationItemPeer::CARTONGROSSWEIGTH, $this->cartongrossweigth);

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
		$criteria = new Criteria(SupplierQuotationItemPeer::DATABASE_NAME);

		$criteria->add(SupplierQuotationItemPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of SupplierQuotationItem (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setSupplierquotationid($this->supplierquotationid);

		$copyObj->setProductid($this->productid);

		$copyObj->setReplacedproductid($this->replacedproductid);

		$copyObj->setClientquotationitemid($this->clientquotationitemid);

		$copyObj->setStatus($this->status);

		$copyObj->setQuantity($this->quantity);

		$copyObj->setPortid($this->portid);

		$copyObj->setIncotermid($this->incotermid);

		$copyObj->setPrice($this->price);

		$copyObj->setSuppliercomments($this->suppliercomments);

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


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getSupplierQuotationItemComments() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierQuotationItemComment($relObj->copy($deepCopy));
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
	 * @return     SupplierQuotationItem Clone of current object.
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
	 * @return     SupplierQuotationItemPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SupplierQuotationItemPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a SupplierQuotation object.
	 *
	 * @param      SupplierQuotation $v
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSupplierQuotation(SupplierQuotation $v = null)
	{
		if ($v === null) {
			$this->setSupplierquotationid(NULL);
		} else {
			$this->setSupplierquotationid($v->getId());
		}

		$this->aSupplierQuotation = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SupplierQuotation object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplierQuotationItem($this);
		}

		return $this;
	}


	/**
	 * Get the associated SupplierQuotation object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     SupplierQuotation The associated SupplierQuotation object.
	 * @throws     PropelException
	 */
	public function getSupplierQuotation(PropelPDO $con = null)
	{
		if ($this->aSupplierQuotation === null && ($this->supplierquotationid !== null)) {
			$this->aSupplierQuotation = SupplierQuotationPeer::retrieveByPK($this->supplierquotationid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aSupplierQuotation->addSupplierQuotationItems($this);
			 */
		}
		return $this->aSupplierQuotation;
	}

	/**
	 * Declares an association between this object and a ClientQuotationItem object.
	 *
	 * @param      ClientQuotationItem $v
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setClientQuotationItem(ClientQuotationItem $v = null)
	{
		if ($v === null) {
			$this->setClientquotationitemid(NULL);
		} else {
			$this->setClientquotationitemid($v->getId());
		}

		$this->aClientQuotationItem = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ClientQuotationItem object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplierQuotationItem($this);
		}

		return $this;
	}


	/**
	 * Get the associated ClientQuotationItem object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ClientQuotationItem The associated ClientQuotationItem object.
	 * @throws     PropelException
	 */
	public function getClientQuotationItem(PropelPDO $con = null)
	{
		if ($this->aClientQuotationItem === null && ($this->clientquotationitemid !== null)) {
			$this->aClientQuotationItem = ClientQuotationItemPeer::retrieveByPK($this->clientquotationitemid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aClientQuotationItem->addSupplierQuotationItems($this);
			 */
		}
		return $this->aClientQuotationItem;
	}

	/**
	 * Declares an association between this object and a Product object.
	 *
	 * @param      Product $v
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setProductRelatedByProductid(Product $v = null)
	{
		if ($v === null) {
			$this->setProductid(NULL);
		} else {
			$this->setProductid($v->getId());
		}

		$this->aProductRelatedByProductid = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Product object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplierQuotationItemRelatedByProductid($this);
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
	public function getProductRelatedByProductid(PropelPDO $con = null)
	{
		if ($this->aProductRelatedByProductid === null && ($this->productid !== null)) {
			$this->aProductRelatedByProductid = ProductPeer::retrieveByPK($this->productid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aProductRelatedByProductid->addSupplierQuotationItemsRelatedByProductid($this);
			 */
		}
		return $this->aProductRelatedByProductid;
	}

	/**
	 * Declares an association between this object and a Product object.
	 *
	 * @param      Product $v
	 * @return     SupplierQuotationItem The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setProductRelatedByReplacedproductid(Product $v = null)
	{
		if ($v === null) {
			$this->setReplacedproductid(NULL);
		} else {
			$this->setReplacedproductid($v->getId());
		}

		$this->aProductRelatedByReplacedproductid = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Product object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplierQuotationItemRelatedByReplacedproductid($this);
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
	public function getProductRelatedByReplacedproductid(PropelPDO $con = null)
	{
		if ($this->aProductRelatedByReplacedproductid === null && ($this->replacedproductid !== null)) {
			$this->aProductRelatedByReplacedproductid = ProductPeer::retrieveByPK($this->replacedproductid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aProductRelatedByReplacedproductid->addSupplierQuotationItemsRelatedByReplacedproductid($this);
			 */
		}
		return $this->aProductRelatedByReplacedproductid;
	}

	/**
	 * Declares an association between this object and a Incoterm object.
	 *
	 * @param      Incoterm $v
	 * @return     SupplierQuotationItem The current object (for fluent API support)
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
			$v->addSupplierQuotationItem($this);
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
			$this->aIncoterm = IncotermPeer::retrieveByPK($this->incotermid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aIncoterm->addSupplierQuotationItems($this);
			 */
		}
		return $this->aIncoterm;
	}

	/**
	 * Declares an association between this object and a Port object.
	 *
	 * @param      Port $v
	 * @return     SupplierQuotationItem The current object (for fluent API support)
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
			$v->addSupplierQuotationItem($this);
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
			$this->aPort = PortPeer::retrieveByPK($this->portid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aPort->addSupplierQuotationItems($this);
			 */
		}
		return $this->aPort;
	}

	/**
	 * Clears out the collSupplierQuotationItemComments collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSupplierQuotationItemComments()
	 */
	public function clearSupplierQuotationItemComments()
	{
		$this->collSupplierQuotationItemComments = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSupplierQuotationItemComments collection (array).
	 *
	 * By default this just sets the collSupplierQuotationItemComments collection to an empty array (like clearcollSupplierQuotationItemComments());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierQuotationItemComments()
	{
		$this->collSupplierQuotationItemComments = array();
	}

	/**
	 * Gets an array of SupplierQuotationItemComment objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this SupplierQuotationItem has previously been saved, it will retrieve
	 * related SupplierQuotationItemComments from storage. If this SupplierQuotationItem is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array SupplierQuotationItemComment[]
	 * @throws     PropelException
	 */
	public function getSupplierQuotationItemComments($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierQuotationItemPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotationItemComments === null) {
			if ($this->isNew()) {
			   $this->collSupplierQuotationItemComments = array();
			} else {

				$criteria->add(SupplierQuotationItemCommentPeer::SUPPLIERQUOTATIONITEMID, $this->id);

				SupplierQuotationItemCommentPeer::addSelectColumns($criteria);
				$this->collSupplierQuotationItemComments = SupplierQuotationItemCommentPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(SupplierQuotationItemCommentPeer::SUPPLIERQUOTATIONITEMID, $this->id);

				SupplierQuotationItemCommentPeer::addSelectColumns($criteria);
				if (!isset($this->lastSupplierQuotationItemCommentCriteria) || !$this->lastSupplierQuotationItemCommentCriteria->equals($criteria)) {
					$this->collSupplierQuotationItemComments = SupplierQuotationItemCommentPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSupplierQuotationItemCommentCriteria = $criteria;
		return $this->collSupplierQuotationItemComments;
	}

	/**
	 * Returns the number of related SupplierQuotationItemComment objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SupplierQuotationItemComment objects.
	 * @throws     PropelException
	 */
	public function countSupplierQuotationItemComments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierQuotationItemPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collSupplierQuotationItemComments === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(SupplierQuotationItemCommentPeer::SUPPLIERQUOTATIONITEMID, $this->id);

				$count = SupplierQuotationItemCommentPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(SupplierQuotationItemCommentPeer::SUPPLIERQUOTATIONITEMID, $this->id);

				if (!isset($this->lastSupplierQuotationItemCommentCriteria) || !$this->lastSupplierQuotationItemCommentCriteria->equals($criteria)) {
					$count = SupplierQuotationItemCommentPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collSupplierQuotationItemComments);
				}
			} else {
				$count = count($this->collSupplierQuotationItemComments);
			}
		}
		$this->lastSupplierQuotationItemCommentCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a SupplierQuotationItemComment object to this object
	 * through the SupplierQuotationItemComment foreign key attribute.
	 *
	 * @param      SupplierQuotationItemComment $l SupplierQuotationItemComment
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSupplierQuotationItemComment(SupplierQuotationItemComment $l)
	{
		if ($this->collSupplierQuotationItemComments === null) {
			$this->initSupplierQuotationItemComments();
		}
		if (!in_array($l, $this->collSupplierQuotationItemComments, true)) { // only add it if the **same** object is not already associated
			array_push($this->collSupplierQuotationItemComments, $l);
			$l->setSupplierQuotationItem($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierQuotationItem is new, it will return
	 * an empty collection; or if this SupplierQuotationItem has previously
	 * been saved, it will retrieve related SupplierQuotationItemComments from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuotationItem.
	 */
	public function getSupplierQuotationItemCommentsJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierQuotationItemPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotationItemComments === null) {
			if ($this->isNew()) {
				$this->collSupplierQuotationItemComments = array();
			} else {

				$criteria->add(SupplierQuotationItemCommentPeer::SUPPLIERQUOTATIONITEMID, $this->id);

				$this->collSupplierQuotationItemComments = SupplierQuotationItemCommentPeer::doSelectJoinUser($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuotationItemCommentPeer::SUPPLIERQUOTATIONITEMID, $this->id);

			if (!isset($this->lastSupplierQuotationItemCommentCriteria) || !$this->lastSupplierQuotationItemCommentCriteria->equals($criteria)) {
				$this->collSupplierQuotationItemComments = SupplierQuotationItemCommentPeer::doSelectJoinUser($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuotationItemCommentCriteria = $criteria;

		return $this->collSupplierQuotationItemComments;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierQuotationItem is new, it will return
	 * an empty collection; or if this SupplierQuotationItem has previously
	 * been saved, it will retrieve related SupplierQuotationItemComments from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuotationItem.
	 */
	public function getSupplierQuotationItemCommentsJoinSupplier($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SupplierQuotationItemPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotationItemComments === null) {
			if ($this->isNew()) {
				$this->collSupplierQuotationItemComments = array();
			} else {

				$criteria->add(SupplierQuotationItemCommentPeer::SUPPLIERQUOTATIONITEMID, $this->id);

				$this->collSupplierQuotationItemComments = SupplierQuotationItemCommentPeer::doSelectJoinSupplier($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuotationItemCommentPeer::SUPPLIERQUOTATIONITEMID, $this->id);

			if (!isset($this->lastSupplierQuotationItemCommentCriteria) || !$this->lastSupplierQuotationItemCommentCriteria->equals($criteria)) {
				$this->collSupplierQuotationItemComments = SupplierQuotationItemCommentPeer::doSelectJoinSupplier($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuotationItemCommentCriteria = $criteria;

		return $this->collSupplierQuotationItemComments;
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
			if ($this->collSupplierQuotationItemComments) {
				foreach ((array) $this->collSupplierQuotationItemComments as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collSupplierQuotationItemComments = null;
			$this->aSupplierQuotation = null;
			$this->aClientQuotationItem = null;
			$this->aProductRelatedByProductid = null;
			$this->aProductRelatedByReplacedproductid = null;
			$this->aIncoterm = null;
			$this->aPort = null;
	}

} // BaseSupplierQuotationItem
