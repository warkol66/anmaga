<?php


/**
 * Base class that represents a row from the 'import_supplierQuoteItem' table.
 *
 * Elemento de Cotizacion de Proveedor
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseSupplierQuoteItem extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
  const PEER = 'SupplierQuoteItemPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SupplierQuoteItemPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the supplierquoteid field.
	 * @var        int
	 */
	protected $supplierquoteid;

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
	 * The value for the clientquoteitemid field.
	 * @var        int
	 */
	protected $clientquoteitemid;

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
	 * @var        SupplierQuote
	 */
	protected $aSupplierQuote;

	/**
	 * @var        ClientQuoteItem
	 */
	protected $aClientQuoteItem;

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
	 * @var        array SupplierQuoteItemComment[] Collection to store aggregation of SupplierQuoteItemComment objects.
	 */
	protected $collSupplierQuoteItemComments;

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
	 * Id elemento de cotizacion de proveedor
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [supplierquoteid] column value.
	 * Id de cotizacion de proveedor
	 * @return     int
	 */
	public function getSupplierquoteid()
	{
		return $this->supplierquoteid;
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
	 * Get the [clientquoteitemid] column value.
	 * Id de cotizacion de proveedor
	 * @return     int
	 */
	public function getClientquoteitemid()
	{
		return $this->clientquoteitemid;
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
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [supplierquoteid] column.
	 * Id de cotizacion de proveedor
	 * @param      int $v new value
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setSupplierquoteid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->supplierquoteid !== $v) {
			$this->supplierquoteid = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::SUPPLIERQUOTEID;
		}

		if ($this->aSupplierQuote !== null && $this->aSupplierQuote->getId() !== $v) {
			$this->aSupplierQuote = null;
		}

		return $this;
	} // setSupplierquoteid()

	/**
	 * Set the value of [productid] column.
	 * Id producto
	 * @param      int $v new value
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setProductid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->productid !== $v) {
			$this->productid = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::PRODUCTID;
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
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setReplacedproductid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->replacedproductid !== $v) {
			$this->replacedproductid = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::REPLACEDPRODUCTID;
		}

		if ($this->aProductRelatedByReplacedproductid !== null && $this->aProductRelatedByReplacedproductid->getId() !== $v) {
			$this->aProductRelatedByReplacedproductid = null;
		}

		return $this;
	} // setReplacedproductid()

	/**
	 * Set the value of [clientquoteitemid] column.
	 * Id de cotizacion de proveedor
	 * @param      int $v new value
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setClientquoteitemid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->clientquoteitemid !== $v) {
			$this->clientquoteitemid = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::CLIENTQUOTEITEMID;
		}

		if ($this->aClientQuoteItem !== null && $this->aClientQuoteItem->getId() !== $v) {
			$this->aClientQuoteItem = null;
		}

		return $this;
	} // setClientquoteitemid()

	/**
	 * Set the value of [status] column.
	 * Status de Item de Cotizacion
	 * @param      int $v new value
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Set the value of [quantity] column.
	 * cantidad producto
	 * @param      int $v new value
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setQuantity($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->quantity !== $v) {
			$this->quantity = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::QUANTITY;
		}

		return $this;
	} // setQuantity()

	/**
	 * Set the value of [portid] column.
	 * id de puerto
	 * @param      int $v new value
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setPortid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->portid !== $v) {
			$this->portid = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::PORTID;
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
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setIncotermid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->incotermid !== $v) {
			$this->incotermid = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::INCOTERMID;
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
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setPrice($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->price !== $v) {
			$this->price = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::PRICE;
		}

		return $this;
	} // setPrice()

	/**
	 * Set the value of [suppliercomments] column.
	 * Comentarios del proveedor 
	 * @param      string $v new value
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setSuppliercomments($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->suppliercomments !== $v) {
			$this->suppliercomments = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::SUPPLIERCOMMENTS;
		}

		return $this;
	} // setSuppliercomments()

	/**
	 * Set the value of [delivery] column.
	 * Tiempo en dias para la entrega del producto.
	 * @param      int $v new value
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setDelivery($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->delivery !== $v) {
			$this->delivery = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::DELIVERY;
		}

		return $this;
	} // setDelivery()

	/**
	 * Set the value of [package] column.
	 * A seleccionar entre Unidades o Bultos
	 * @param      int $v new value
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setPackage($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->package !== $v) {
			$this->package = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::PACKAGE;
		}

		return $this;
	} // setPackage()

	/**
	 * Set the value of [unitlength] column.
	 * Largo del empaque de la unidad 
	 * @param      double $v new value
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setUnitlength($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->unitlength !== $v) {
			$this->unitlength = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::UNITLENGTH;
		}

		return $this;
	} // setUnitlength()

	/**
	 * Set the value of [unitwidth] column.
	 * Ancho del empaque de la unidad 
	 * @param      double $v new value
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setUnitwidth($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->unitwidth !== $v) {
			$this->unitwidth = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::UNITWIDTH;
		}

		return $this;
	} // setUnitwidth()

	/**
	 * Set the value of [unitheight] column.
	 * Alto del empaque de la unidad 
	 * @param      double $v new value
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setUnitheight($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->unitheight !== $v) {
			$this->unitheight = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::UNITHEIGHT;
		}

		return $this;
	} // setUnitheight()

	/**
	 * Set the value of [unitgrossweigth] column.
	 * Peso del empaque de la unidad 
	 * @param      double $v new value
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setUnitgrossweigth($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->unitgrossweigth !== $v) {
			$this->unitgrossweigth = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::UNITGROSSWEIGTH;
		}

		return $this;
	} // setUnitgrossweigth()

	/**
	 * Set the value of [unitspercarton] column.
	 * Unidades por bulto
	 * @param      int $v new value
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setUnitspercarton($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->unitspercarton !== $v) {
			$this->unitspercarton = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::UNITSPERCARTON;
		}

		return $this;
	} // setUnitspercarton()

	/**
	 * Set the value of [cartons] column.
	 * Cantidad de bultos
	 * @param      int $v new value
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setCartons($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cartons !== $v) {
			$this->cartons = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::CARTONS;
		}

		return $this;
	} // setCartons()

	/**
	 * Set the value of [cartonlength] column.
	 * Largo del bulto
	 * @param      double $v new value
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setCartonlength($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->cartonlength !== $v) {
			$this->cartonlength = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::CARTONLENGTH;
		}

		return $this;
	} // setCartonlength()

	/**
	 * Set the value of [cartonwidth] column.
	 * Ancho del bulto
	 * @param      double $v new value
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setCartonwidth($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->cartonwidth !== $v) {
			$this->cartonwidth = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::CARTONWIDTH;
		}

		return $this;
	} // setCartonwidth()

	/**
	 * Set the value of [cartonheight] column.
	 * Alto del bulto
	 * @param      double $v new value
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setCartonheight($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->cartonheight !== $v) {
			$this->cartonheight = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::CARTONHEIGHT;
		}

		return $this;
	} // setCartonheight()

	/**
	 * Set the value of [cartongrossweigth] column.
	 * Peso del bulto
	 * @param      double $v new value
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 */
	public function setCartongrossweigth($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->cartongrossweigth !== $v) {
			$this->cartongrossweigth = $v;
			$this->modifiedColumns[] = SupplierQuoteItemPeer::CARTONGROSSWEIGTH;
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
			$this->supplierquoteid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->productid = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->replacedproductid = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->clientquoteitemid = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
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

			return $startcol + 23; // 23 = SupplierQuoteItemPeer::NUM_COLUMNS - SupplierQuoteItemPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating SupplierQuoteItem object", $e);
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

		if ($this->aSupplierQuote !== null && $this->supplierquoteid !== $this->aSupplierQuote->getId()) {
			$this->aSupplierQuote = null;
		}
		if ($this->aProductRelatedByProductid !== null && $this->productid !== $this->aProductRelatedByProductid->getId()) {
			$this->aProductRelatedByProductid = null;
		}
		if ($this->aProductRelatedByReplacedproductid !== null && $this->replacedproductid !== $this->aProductRelatedByReplacedproductid->getId()) {
			$this->aProductRelatedByReplacedproductid = null;
		}
		if ($this->aClientQuoteItem !== null && $this->clientquoteitemid !== $this->aClientQuoteItem->getId()) {
			$this->aClientQuoteItem = null;
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
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SupplierQuoteItemPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aSupplierQuote = null;
			$this->aClientQuoteItem = null;
			$this->aProductRelatedByProductid = null;
			$this->aProductRelatedByReplacedproductid = null;
			$this->aIncoterm = null;
			$this->aPort = null;
			$this->collSupplierQuoteItemComments = null;

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
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				SupplierQuoteItemQuery::create()
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
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				SupplierQuoteItemPeer::addInstanceToPool($this);
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

			if ($this->aSupplierQuote !== null) {
				if ($this->aSupplierQuote->isModified() || $this->aSupplierQuote->isNew()) {
					$affectedRows += $this->aSupplierQuote->save($con);
				}
				$this->setSupplierQuote($this->aSupplierQuote);
			}

			if ($this->aClientQuoteItem !== null) {
				if ($this->aClientQuoteItem->isModified() || $this->aClientQuoteItem->isNew()) {
					$affectedRows += $this->aClientQuoteItem->save($con);
				}
				$this->setClientQuoteItem($this->aClientQuoteItem);
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
				$this->modifiedColumns[] = SupplierQuoteItemPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(SupplierQuoteItemPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.SupplierQuoteItemPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += SupplierQuoteItemPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collSupplierQuoteItemComments !== null) {
				foreach ($this->collSupplierQuoteItemComments as $referrerFK) {
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

			if ($this->aSupplierQuote !== null) {
				if (!$this->aSupplierQuote->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSupplierQuote->getValidationFailures());
				}
			}

			if ($this->aClientQuoteItem !== null) {
				if (!$this->aClientQuoteItem->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aClientQuoteItem->getValidationFailures());
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


			if (($retval = SupplierQuoteItemPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collSupplierQuoteItemComments !== null) {
					foreach ($this->collSupplierQuoteItemComments as $referrerFK) {
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
		$pos = SupplierQuoteItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getSupplierquoteid();
				break;
			case 2:
				return $this->getProductid();
				break;
			case 3:
				return $this->getReplacedproductid();
				break;
			case 4:
				return $this->getClientquoteitemid();
				break;
			case 5:
				return $this->getStatus();
				break;
			case 6:
				return $this->getQuantity();
				break;
			case 7:
				return $this->getPortid();
				break;
			case 8:
				return $this->getIncotermid();
				break;
			case 9:
				return $this->getPrice();
				break;
			case 10:
				return $this->getSuppliercomments();
				break;
			case 11:
				return $this->getDelivery();
				break;
			case 12:
				return $this->getPackage();
				break;
			case 13:
				return $this->getUnitlength();
				break;
			case 14:
				return $this->getUnitwidth();
				break;
			case 15:
				return $this->getUnitheight();
				break;
			case 16:
				return $this->getUnitgrossweigth();
				break;
			case 17:
				return $this->getUnitspercarton();
				break;
			case 18:
				return $this->getCartons();
				break;
			case 19:
				return $this->getCartonlength();
				break;
			case 20:
				return $this->getCartonwidth();
				break;
			case 21:
				return $this->getCartonheight();
				break;
			case 22:
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
		$keys = SupplierQuoteItemPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getSupplierquoteid(),
			$keys[2] => $this->getProductid(),
			$keys[3] => $this->getReplacedproductid(),
			$keys[4] => $this->getClientquoteitemid(),
			$keys[5] => $this->getStatus(),
			$keys[6] => $this->getQuantity(),
			$keys[7] => $this->getPortid(),
			$keys[8] => $this->getIncotermid(),
			$keys[9] => $this->getPrice(),
			$keys[10] => $this->getSuppliercomments(),
			$keys[11] => $this->getDelivery(),
			$keys[12] => $this->getPackage(),
			$keys[13] => $this->getUnitlength(),
			$keys[14] => $this->getUnitwidth(),
			$keys[15] => $this->getUnitheight(),
			$keys[16] => $this->getUnitgrossweigth(),
			$keys[17] => $this->getUnitspercarton(),
			$keys[18] => $this->getCartons(),
			$keys[19] => $this->getCartonlength(),
			$keys[20] => $this->getCartonwidth(),
			$keys[21] => $this->getCartonheight(),
			$keys[22] => $this->getCartongrossweigth(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aSupplierQuote) {
				$result['SupplierQuote'] = $this->aSupplierQuote->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aClientQuoteItem) {
				$result['ClientQuoteItem'] = $this->aClientQuoteItem->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aProductRelatedByProductid) {
				$result['ProductRelatedByProductid'] = $this->aProductRelatedByProductid->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aProductRelatedByReplacedproductid) {
				$result['ProductRelatedByReplacedproductid'] = $this->aProductRelatedByReplacedproductid->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = SupplierQuoteItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setSupplierquoteid($value);
				break;
			case 2:
				$this->setProductid($value);
				break;
			case 3:
				$this->setReplacedproductid($value);
				break;
			case 4:
				$this->setClientquoteitemid($value);
				break;
			case 5:
				$this->setStatus($value);
				break;
			case 6:
				$this->setQuantity($value);
				break;
			case 7:
				$this->setPortid($value);
				break;
			case 8:
				$this->setIncotermid($value);
				break;
			case 9:
				$this->setPrice($value);
				break;
			case 10:
				$this->setSuppliercomments($value);
				break;
			case 11:
				$this->setDelivery($value);
				break;
			case 12:
				$this->setPackage($value);
				break;
			case 13:
				$this->setUnitlength($value);
				break;
			case 14:
				$this->setUnitwidth($value);
				break;
			case 15:
				$this->setUnitheight($value);
				break;
			case 16:
				$this->setUnitgrossweigth($value);
				break;
			case 17:
				$this->setUnitspercarton($value);
				break;
			case 18:
				$this->setCartons($value);
				break;
			case 19:
				$this->setCartonlength($value);
				break;
			case 20:
				$this->setCartonwidth($value);
				break;
			case 21:
				$this->setCartonheight($value);
				break;
			case 22:
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
		$keys = SupplierQuoteItemPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSupplierquoteid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setProductid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setReplacedproductid($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setClientquoteitemid($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStatus($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setQuantity($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPortid($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIncotermid($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPrice($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setSuppliercomments($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDelivery($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setPackage($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setUnitlength($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUnitwidth($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setUnitheight($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setUnitgrossweigth($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setUnitspercarton($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCartons($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCartonlength($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCartonwidth($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCartonheight($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCartongrossweigth($arr[$keys[22]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SupplierQuoteItemPeer::DATABASE_NAME);

		if ($this->isColumnModified(SupplierQuoteItemPeer::ID)) $criteria->add(SupplierQuoteItemPeer::ID, $this->id);
		if ($this->isColumnModified(SupplierQuoteItemPeer::SUPPLIERQUOTEID)) $criteria->add(SupplierQuoteItemPeer::SUPPLIERQUOTEID, $this->supplierquoteid);
		if ($this->isColumnModified(SupplierQuoteItemPeer::PRODUCTID)) $criteria->add(SupplierQuoteItemPeer::PRODUCTID, $this->productid);
		if ($this->isColumnModified(SupplierQuoteItemPeer::REPLACEDPRODUCTID)) $criteria->add(SupplierQuoteItemPeer::REPLACEDPRODUCTID, $this->replacedproductid);
		if ($this->isColumnModified(SupplierQuoteItemPeer::CLIENTQUOTEITEMID)) $criteria->add(SupplierQuoteItemPeer::CLIENTQUOTEITEMID, $this->clientquoteitemid);
		if ($this->isColumnModified(SupplierQuoteItemPeer::STATUS)) $criteria->add(SupplierQuoteItemPeer::STATUS, $this->status);
		if ($this->isColumnModified(SupplierQuoteItemPeer::QUANTITY)) $criteria->add(SupplierQuoteItemPeer::QUANTITY, $this->quantity);
		if ($this->isColumnModified(SupplierQuoteItemPeer::PORTID)) $criteria->add(SupplierQuoteItemPeer::PORTID, $this->portid);
		if ($this->isColumnModified(SupplierQuoteItemPeer::INCOTERMID)) $criteria->add(SupplierQuoteItemPeer::INCOTERMID, $this->incotermid);
		if ($this->isColumnModified(SupplierQuoteItemPeer::PRICE)) $criteria->add(SupplierQuoteItemPeer::PRICE, $this->price);
		if ($this->isColumnModified(SupplierQuoteItemPeer::SUPPLIERCOMMENTS)) $criteria->add(SupplierQuoteItemPeer::SUPPLIERCOMMENTS, $this->suppliercomments);
		if ($this->isColumnModified(SupplierQuoteItemPeer::DELIVERY)) $criteria->add(SupplierQuoteItemPeer::DELIVERY, $this->delivery);
		if ($this->isColumnModified(SupplierQuoteItemPeer::PACKAGE)) $criteria->add(SupplierQuoteItemPeer::PACKAGE, $this->package);
		if ($this->isColumnModified(SupplierQuoteItemPeer::UNITLENGTH)) $criteria->add(SupplierQuoteItemPeer::UNITLENGTH, $this->unitlength);
		if ($this->isColumnModified(SupplierQuoteItemPeer::UNITWIDTH)) $criteria->add(SupplierQuoteItemPeer::UNITWIDTH, $this->unitwidth);
		if ($this->isColumnModified(SupplierQuoteItemPeer::UNITHEIGHT)) $criteria->add(SupplierQuoteItemPeer::UNITHEIGHT, $this->unitheight);
		if ($this->isColumnModified(SupplierQuoteItemPeer::UNITGROSSWEIGTH)) $criteria->add(SupplierQuoteItemPeer::UNITGROSSWEIGTH, $this->unitgrossweigth);
		if ($this->isColumnModified(SupplierQuoteItemPeer::UNITSPERCARTON)) $criteria->add(SupplierQuoteItemPeer::UNITSPERCARTON, $this->unitspercarton);
		if ($this->isColumnModified(SupplierQuoteItemPeer::CARTONS)) $criteria->add(SupplierQuoteItemPeer::CARTONS, $this->cartons);
		if ($this->isColumnModified(SupplierQuoteItemPeer::CARTONLENGTH)) $criteria->add(SupplierQuoteItemPeer::CARTONLENGTH, $this->cartonlength);
		if ($this->isColumnModified(SupplierQuoteItemPeer::CARTONWIDTH)) $criteria->add(SupplierQuoteItemPeer::CARTONWIDTH, $this->cartonwidth);
		if ($this->isColumnModified(SupplierQuoteItemPeer::CARTONHEIGHT)) $criteria->add(SupplierQuoteItemPeer::CARTONHEIGHT, $this->cartonheight);
		if ($this->isColumnModified(SupplierQuoteItemPeer::CARTONGROSSWEIGTH)) $criteria->add(SupplierQuoteItemPeer::CARTONGROSSWEIGTH, $this->cartongrossweigth);

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
		$criteria = new Criteria(SupplierQuoteItemPeer::DATABASE_NAME);
		$criteria->add(SupplierQuoteItemPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of SupplierQuoteItem (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setSupplierquoteid($this->supplierquoteid);
		$copyObj->setProductid($this->productid);
		$copyObj->setReplacedproductid($this->replacedproductid);
		$copyObj->setClientquoteitemid($this->clientquoteitemid);
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

			foreach ($this->getSupplierQuoteItemComments() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierQuoteItemComment($relObj->copy($deepCopy));
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
	 * @return     SupplierQuoteItem Clone of current object.
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
	 * @return     SupplierQuoteItemPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SupplierQuoteItemPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a SupplierQuote object.
	 *
	 * @param      SupplierQuote $v
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSupplierQuote(SupplierQuote $v = null)
	{
		if ($v === null) {
			$this->setSupplierquoteid(NULL);
		} else {
			$this->setSupplierquoteid($v->getId());
		}

		$this->aSupplierQuote = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SupplierQuote object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplierQuoteItem($this);
		}

		return $this;
	}


	/**
	 * Get the associated SupplierQuote object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     SupplierQuote The associated SupplierQuote object.
	 * @throws     PropelException
	 */
	public function getSupplierQuote(PropelPDO $con = null)
	{
		if ($this->aSupplierQuote === null && ($this->supplierquoteid !== null)) {
			$this->aSupplierQuote = SupplierQuoteQuery::create()->findPk($this->supplierquoteid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aSupplierQuote->addSupplierQuoteItems($this);
			 */
		}
		return $this->aSupplierQuote;
	}

	/**
	 * Declares an association between this object and a ClientQuoteItem object.
	 *
	 * @param      ClientQuoteItem $v
	 * @return     SupplierQuoteItem The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setClientQuoteItem(ClientQuoteItem $v = null)
	{
		if ($v === null) {
			$this->setClientquoteitemid(NULL);
		} else {
			$this->setClientquoteitemid($v->getId());
		}

		$this->aClientQuoteItem = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ClientQuoteItem object, it will not be re-added.
		if ($v !== null) {
			$v->addSupplierQuoteItem($this);
		}

		return $this;
	}


	/**
	 * Get the associated ClientQuoteItem object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ClientQuoteItem The associated ClientQuoteItem object.
	 * @throws     PropelException
	 */
	public function getClientQuoteItem(PropelPDO $con = null)
	{
		if ($this->aClientQuoteItem === null && ($this->clientquoteitemid !== null)) {
			$this->aClientQuoteItem = ClientQuoteItemQuery::create()->findPk($this->clientquoteitemid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aClientQuoteItem->addSupplierQuoteItems($this);
			 */
		}
		return $this->aClientQuoteItem;
	}

	/**
	 * Declares an association between this object and a Product object.
	 *
	 * @param      Product $v
	 * @return     SupplierQuoteItem The current object (for fluent API support)
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
			$v->addSupplierQuoteItemRelatedByProductid($this);
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
			$this->aProductRelatedByProductid = ProductQuery::create()->findPk($this->productid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aProductRelatedByProductid->addSupplierQuoteItemsRelatedByProductid($this);
			 */
		}
		return $this->aProductRelatedByProductid;
	}

	/**
	 * Declares an association between this object and a Product object.
	 *
	 * @param      Product $v
	 * @return     SupplierQuoteItem The current object (for fluent API support)
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
			$v->addSupplierQuoteItemRelatedByReplacedproductid($this);
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
			$this->aProductRelatedByReplacedproductid = ProductQuery::create()->findPk($this->replacedproductid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aProductRelatedByReplacedproductid->addSupplierQuoteItemsRelatedByReplacedproductid($this);
			 */
		}
		return $this->aProductRelatedByReplacedproductid;
	}

	/**
	 * Declares an association between this object and a Incoterm object.
	 *
	 * @param      Incoterm $v
	 * @return     SupplierQuoteItem The current object (for fluent API support)
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
			$v->addSupplierQuoteItem($this);
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
			   $this->aIncoterm->addSupplierQuoteItems($this);
			 */
		}
		return $this->aIncoterm;
	}

	/**
	 * Declares an association between this object and a Port object.
	 *
	 * @param      Port $v
	 * @return     SupplierQuoteItem The current object (for fluent API support)
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
			$v->addSupplierQuoteItem($this);
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
			   $this->aPort->addSupplierQuoteItems($this);
			 */
		}
		return $this->aPort;
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
	 * If this SupplierQuoteItem is new, it will return
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
					->filterBySupplierQuoteItem($this)
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
					->filterBySupplierQuoteItem($this)
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
			$l->setSupplierQuoteItem($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SupplierQuoteItem is new, it will return
	 * an empty collection; or if this SupplierQuoteItem has previously
	 * been saved, it will retrieve related SupplierQuoteItemComments from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuoteItem.
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
	 * Otherwise if this SupplierQuoteItem is new, it will return
	 * an empty collection; or if this SupplierQuoteItem has previously
	 * been saved, it will retrieve related SupplierQuoteItemComments from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SupplierQuoteItem.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SupplierQuoteItemComment[] List of SupplierQuoteItemComment objects
	 */
	public function getSupplierQuoteItemCommentsJoinSupplier($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SupplierQuoteItemCommentQuery::create(null, $criteria);
		$query->joinWith('Supplier', $join_behavior);

		return $this->getSupplierQuoteItemComments($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->supplierquoteid = null;
		$this->productid = null;
		$this->replacedproductid = null;
		$this->clientquoteitemid = null;
		$this->status = null;
		$this->quantity = null;
		$this->portid = null;
		$this->incotermid = null;
		$this->price = null;
		$this->suppliercomments = null;
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
			if ($this->collSupplierQuoteItemComments) {
				foreach ((array) $this->collSupplierQuoteItemComments as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collSupplierQuoteItemComments = null;
		$this->aSupplierQuote = null;
		$this->aClientQuoteItem = null;
		$this->aProductRelatedByProductid = null;
		$this->aProductRelatedByReplacedproductid = null;
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

} // BaseSupplierQuoteItem
