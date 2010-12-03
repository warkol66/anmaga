<?php


/**
 * Base class that represents a row from the 'import_shipment' table.
 *
 * Datos de envio
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseShipment extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ShipmentPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ShipmentPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the createdat field.
	 * @var        string
	 */
	protected $createdat;

	/**
	 * The value for the supplierpurchaseorderid field.
	 * @var        int
	 */
	protected $supplierpurchaseorderid;

	/**
	 * The value for the containersrealcount field.
	 * @var        int
	 */
	protected $containersrealcount;

	/**
	 * The value for the containersnumbers field.
	 * @var        string
	 */
	protected $containersnumbers;

	/**
	 * The value for the pickupdate field.
	 * @var        string
	 */
	protected $pickupdate;

	/**
	 * The value for the shipmentdate field.
	 * @var        string
	 */
	protected $shipmentdate;

	/**
	 * The value for the blnumber field.
	 * @var        int
	 */
	protected $blnumber;

	/**
	 * The value for the vesselname field.
	 * @var        string
	 */
	protected $vesselname;

	/**
	 * The value for the estimateddeparturedate field.
	 * @var        string
	 */
	protected $estimateddeparturedate;

	/**
	 * The value for the departuredate field.
	 * @var        string
	 */
	protected $departuredate;

	/**
	 * The value for the arrivalportid field.
	 * @var        int
	 */
	protected $arrivalportid;

	/**
	 * The value for the arrivaltopanamadate field.
	 * @var        string
	 */
	protected $arrivaltopanamadate;

	/**
	 * The value for the transshipmentdate field.
	 * @var        string
	 */
	protected $transshipmentdate;

	/**
	 * The value for the telexrelease field.
	 * @var        int
	 */
	protected $telexrelease;

	/**
	 * The value for the estimatedarrivaldate field.
	 * @var        string
	 */
	protected $estimatedarrivaldate;

	/**
	 * The value for the arrivaldate field.
	 * @var        string
	 */
	protected $arrivaldate;

	/**
	 * @var        SupplierPurchaseOrder
	 */
	protected $aSupplierPurchaseOrder;

	/**
	 * @var        Port
	 */
	protected $aPort;

	/**
	 * @var        array ShipmentRelease[] Collection to store aggregation of ShipmentRelease objects.
	 */
	protected $collShipmentReleases;

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
	 * Id del envio
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
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
	 * Get the [supplierpurchaseorderid] column value.
	 * Supplier Purchase Order
	 * @return     int
	 */
	public function getSupplierpurchaseorderid()
	{
		return $this->supplierpurchaseorderid;
	}

	/**
	 * Get the [containersrealcount] column value.
	 * Cantidad real de containers
	 * @return     int
	 */
	public function getContainersrealcount()
	{
		return $this->containersrealcount;
	}

	/**
	 * Get the [containersnumbers] column value.
	 * Numeros de los contenedores
	 * @return     string
	 */
	public function getContainersnumbers()
	{
		return $this->containersnumbers;
	}

	/**
	 * Get the [optionally formatted] temporal [pickupdate] column value.
	 * Fecha de retiro de la mercancia
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getPickupdate($format = '%Y/%m/%d')
	{
		if ($this->pickupdate === null) {
			return null;
		}


		if ($this->pickupdate === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->pickupdate);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->pickupdate, true), $x);
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
	 * Get the [optionally formatted] temporal [shipmentdate] column value.
	 * Fecha de embarque
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getShipmentdate($format = '%Y/%m/%d')
	{
		if ($this->shipmentdate === null) {
			return null;
		}


		if ($this->shipmentdate === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->shipmentdate);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->shipmentdate, true), $x);
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
	 * Get the [blnumber] column value.
	 * BL Hawb
	 * @return     int
	 */
	public function getBlnumber()
	{
		return $this->blnumber;
	}

	/**
	 * Get the [vesselname] column value.
	 * Nombre del buque
	 * @return     string
	 */
	public function getVesselname()
	{
		return $this->vesselname;
	}

	/**
	 * Get the [optionally formatted] temporal [estimateddeparturedate] column value.
	 * Fecha estimada de partida del buque
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getEstimateddeparturedate($format = '%Y/%m/%d')
	{
		if ($this->estimateddeparturedate === null) {
			return null;
		}


		if ($this->estimateddeparturedate === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->estimateddeparturedate);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->estimateddeparturedate, true), $x);
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
	 * Get the [optionally formatted] temporal [departuredate] column value.
	 * Fecha de partida del buque
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDeparturedate($format = '%Y/%m/%d')
	{
		if ($this->departuredate === null) {
			return null;
		}


		if ($this->departuredate === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->departuredate);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->departuredate, true), $x);
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
	 * Get the [arrivalportid] column value.
	 * Puerto de llegada
	 * @return     int
	 */
	public function getArrivalportid()
	{
		return $this->arrivalportid;
	}

	/**
	 * Get the [optionally formatted] temporal [arrivaltopanamadate] column value.
	 * Fecha de llegada a Panama
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getArrivaltopanamadate($format = '%Y/%m/%d')
	{
		if ($this->arrivaltopanamadate === null) {
			return null;
		}


		if ($this->arrivaltopanamadate === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->arrivaltopanamadate);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->arrivaltopanamadate, true), $x);
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
	 * Get the [optionally formatted] temporal [transshipmentdate] column value.
	 * Fecha de transbordo
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getTransshipmentdate($format = '%Y/%m/%d')
	{
		if ($this->transshipmentdate === null) {
			return null;
		}


		if ($this->transshipmentdate === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->transshipmentdate);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->transshipmentdate, true), $x);
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
	 * Get the [telexrelease] column value.
	 * Telex release
	 * @return     int
	 */
	public function getTelexrelease()
	{
		return $this->telexrelease;
	}

	/**
	 * Get the [optionally formatted] temporal [estimatedarrivaldate] column value.
	 * Fecha estimada de llegada del buque a puerto
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getEstimatedarrivaldate($format = '%Y/%m/%d')
	{
		if ($this->estimatedarrivaldate === null) {
			return null;
		}


		if ($this->estimatedarrivaldate === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->estimatedarrivaldate);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->estimatedarrivaldate, true), $x);
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
	 * Get the [optionally formatted] temporal [arrivaldate] column value.
	 * Fecha de llegada a puerto
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getArrivaldate($format = '%Y/%m/%d')
	{
		if ($this->arrivaldate === null) {
			return null;
		}


		if ($this->arrivaldate === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->arrivaldate);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->arrivaldate, true), $x);
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
	 * Id del envio
	 * @param      int $v new value
	 * @return     Shipment The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ShipmentPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Sets the value of [createdat] column to a normalized version of the date/time value specified.
	 * Creation date for
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Shipment The current object (for fluent API support)
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
				$this->modifiedColumns[] = ShipmentPeer::CREATEDAT;
			}
		} // if either are not null

		return $this;
	} // setCreatedat()

	/**
	 * Set the value of [supplierpurchaseorderid] column.
	 * Supplier Purchase Order
	 * @param      int $v new value
	 * @return     Shipment The current object (for fluent API support)
	 */
	public function setSupplierpurchaseorderid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->supplierpurchaseorderid !== $v) {
			$this->supplierpurchaseorderid = $v;
			$this->modifiedColumns[] = ShipmentPeer::SUPPLIERPURCHASEORDERID;
		}

		if ($this->aSupplierPurchaseOrder !== null && $this->aSupplierPurchaseOrder->getId() !== $v) {
			$this->aSupplierPurchaseOrder = null;
		}

		return $this;
	} // setSupplierpurchaseorderid()

	/**
	 * Set the value of [containersrealcount] column.
	 * Cantidad real de containers
	 * @param      int $v new value
	 * @return     Shipment The current object (for fluent API support)
	 */
	public function setContainersrealcount($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->containersrealcount !== $v) {
			$this->containersrealcount = $v;
			$this->modifiedColumns[] = ShipmentPeer::CONTAINERSREALCOUNT;
		}

		return $this;
	} // setContainersrealcount()

	/**
	 * Set the value of [containersnumbers] column.
	 * Numeros de los contenedores
	 * @param      string $v new value
	 * @return     Shipment The current object (for fluent API support)
	 */
	public function setContainersnumbers($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->containersnumbers !== $v) {
			$this->containersnumbers = $v;
			$this->modifiedColumns[] = ShipmentPeer::CONTAINERSNUMBERS;
		}

		return $this;
	} // setContainersnumbers()

	/**
	 * Sets the value of [pickupdate] column to a normalized version of the date/time value specified.
	 * Fecha de retiro de la mercancia
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Shipment The current object (for fluent API support)
	 */
	public function setPickupdate($v)
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

		if ( $this->pickupdate !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->pickupdate !== null && $tmpDt = new DateTime($this->pickupdate)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->pickupdate = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = ShipmentPeer::PICKUPDATE;
			}
		} // if either are not null

		return $this;
	} // setPickupdate()

	/**
	 * Sets the value of [shipmentdate] column to a normalized version of the date/time value specified.
	 * Fecha de embarque
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Shipment The current object (for fluent API support)
	 */
	public function setShipmentdate($v)
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

		if ( $this->shipmentdate !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->shipmentdate !== null && $tmpDt = new DateTime($this->shipmentdate)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->shipmentdate = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = ShipmentPeer::SHIPMENTDATE;
			}
		} // if either are not null

		return $this;
	} // setShipmentdate()

	/**
	 * Set the value of [blnumber] column.
	 * BL Hawb
	 * @param      int $v new value
	 * @return     Shipment The current object (for fluent API support)
	 */
	public function setBlnumber($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->blnumber !== $v) {
			$this->blnumber = $v;
			$this->modifiedColumns[] = ShipmentPeer::BLNUMBER;
		}

		return $this;
	} // setBlnumber()

	/**
	 * Set the value of [vesselname] column.
	 * Nombre del buque
	 * @param      string $v new value
	 * @return     Shipment The current object (for fluent API support)
	 */
	public function setVesselname($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->vesselname !== $v) {
			$this->vesselname = $v;
			$this->modifiedColumns[] = ShipmentPeer::VESSELNAME;
		}

		return $this;
	} // setVesselname()

	/**
	 * Sets the value of [estimateddeparturedate] column to a normalized version of the date/time value specified.
	 * Fecha estimada de partida del buque
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Shipment The current object (for fluent API support)
	 */
	public function setEstimateddeparturedate($v)
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

		if ( $this->estimateddeparturedate !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->estimateddeparturedate !== null && $tmpDt = new DateTime($this->estimateddeparturedate)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->estimateddeparturedate = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = ShipmentPeer::ESTIMATEDDEPARTUREDATE;
			}
		} // if either are not null

		return $this;
	} // setEstimateddeparturedate()

	/**
	 * Sets the value of [departuredate] column to a normalized version of the date/time value specified.
	 * Fecha de partida del buque
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Shipment The current object (for fluent API support)
	 */
	public function setDeparturedate($v)
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

		if ( $this->departuredate !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->departuredate !== null && $tmpDt = new DateTime($this->departuredate)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->departuredate = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = ShipmentPeer::DEPARTUREDATE;
			}
		} // if either are not null

		return $this;
	} // setDeparturedate()

	/**
	 * Set the value of [arrivalportid] column.
	 * Puerto de llegada
	 * @param      int $v new value
	 * @return     Shipment The current object (for fluent API support)
	 */
	public function setArrivalportid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->arrivalportid !== $v) {
			$this->arrivalportid = $v;
			$this->modifiedColumns[] = ShipmentPeer::ARRIVALPORTID;
		}

		if ($this->aPort !== null && $this->aPort->getId() !== $v) {
			$this->aPort = null;
		}

		return $this;
	} // setArrivalportid()

	/**
	 * Sets the value of [arrivaltopanamadate] column to a normalized version of the date/time value specified.
	 * Fecha de llegada a Panama
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Shipment The current object (for fluent API support)
	 */
	public function setArrivaltopanamadate($v)
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

		if ( $this->arrivaltopanamadate !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->arrivaltopanamadate !== null && $tmpDt = new DateTime($this->arrivaltopanamadate)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->arrivaltopanamadate = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = ShipmentPeer::ARRIVALTOPANAMADATE;
			}
		} // if either are not null

		return $this;
	} // setArrivaltopanamadate()

	/**
	 * Sets the value of [transshipmentdate] column to a normalized version of the date/time value specified.
	 * Fecha de transbordo
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Shipment The current object (for fluent API support)
	 */
	public function setTransshipmentdate($v)
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

		if ( $this->transshipmentdate !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->transshipmentdate !== null && $tmpDt = new DateTime($this->transshipmentdate)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->transshipmentdate = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = ShipmentPeer::TRANSSHIPMENTDATE;
			}
		} // if either are not null

		return $this;
	} // setTransshipmentdate()

	/**
	 * Set the value of [telexrelease] column.
	 * Telex release
	 * @param      int $v new value
	 * @return     Shipment The current object (for fluent API support)
	 */
	public function setTelexrelease($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->telexrelease !== $v) {
			$this->telexrelease = $v;
			$this->modifiedColumns[] = ShipmentPeer::TELEXRELEASE;
		}

		return $this;
	} // setTelexrelease()

	/**
	 * Sets the value of [estimatedarrivaldate] column to a normalized version of the date/time value specified.
	 * Fecha estimada de llegada del buque a puerto
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Shipment The current object (for fluent API support)
	 */
	public function setEstimatedarrivaldate($v)
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

		if ( $this->estimatedarrivaldate !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->estimatedarrivaldate !== null && $tmpDt = new DateTime($this->estimatedarrivaldate)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->estimatedarrivaldate = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = ShipmentPeer::ESTIMATEDARRIVALDATE;
			}
		} // if either are not null

		return $this;
	} // setEstimatedarrivaldate()

	/**
	 * Sets the value of [arrivaldate] column to a normalized version of the date/time value specified.
	 * Fecha de llegada a puerto
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Shipment The current object (for fluent API support)
	 */
	public function setArrivaldate($v)
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

		if ( $this->arrivaldate !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->arrivaldate !== null && $tmpDt = new DateTime($this->arrivaldate)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->arrivaldate = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = ShipmentPeer::ARRIVALDATE;
			}
		} // if either are not null

		return $this;
	} // setArrivaldate()

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
			$this->createdat = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->supplierpurchaseorderid = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->containersrealcount = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->containersnumbers = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->pickupdate = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->shipmentdate = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->blnumber = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->vesselname = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->estimateddeparturedate = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->departuredate = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->arrivalportid = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->arrivaltopanamadate = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->transshipmentdate = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->telexrelease = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
			$this->estimatedarrivaldate = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->arrivaldate = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 17; // 17 = ShipmentPeer::NUM_COLUMNS - ShipmentPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Shipment object", $e);
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
		if ($this->aPort !== null && $this->arrivalportid !== $this->aPort->getId()) {
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
			$con = Propel::getConnection(ShipmentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ShipmentPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aSupplierPurchaseOrder = null;
			$this->aPort = null;
			$this->collShipmentReleases = null;

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
			$con = Propel::getConnection(ShipmentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ShipmentQuery::create()
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
			$con = Propel::getConnection(ShipmentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ShipmentPeer::addInstanceToPool($this);
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

			if ($this->aPort !== null) {
				if ($this->aPort->isModified() || $this->aPort->isNew()) {
					$affectedRows += $this->aPort->save($con);
				}
				$this->setPort($this->aPort);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ShipmentPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(ShipmentPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.ShipmentPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += ShipmentPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collShipmentReleases !== null) {
				foreach ($this->collShipmentReleases as $referrerFK) {
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

			if ($this->aSupplierPurchaseOrder !== null) {
				if (!$this->aSupplierPurchaseOrder->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSupplierPurchaseOrder->getValidationFailures());
				}
			}

			if ($this->aPort !== null) {
				if (!$this->aPort->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPort->getValidationFailures());
				}
			}


			if (($retval = ShipmentPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collShipmentReleases !== null) {
					foreach ($this->collShipmentReleases as $referrerFK) {
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
		$pos = ShipmentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCreatedat();
				break;
			case 2:
				return $this->getSupplierpurchaseorderid();
				break;
			case 3:
				return $this->getContainersrealcount();
				break;
			case 4:
				return $this->getContainersnumbers();
				break;
			case 5:
				return $this->getPickupdate();
				break;
			case 6:
				return $this->getShipmentdate();
				break;
			case 7:
				return $this->getBlnumber();
				break;
			case 8:
				return $this->getVesselname();
				break;
			case 9:
				return $this->getEstimateddeparturedate();
				break;
			case 10:
				return $this->getDeparturedate();
				break;
			case 11:
				return $this->getArrivalportid();
				break;
			case 12:
				return $this->getArrivaltopanamadate();
				break;
			case 13:
				return $this->getTransshipmentdate();
				break;
			case 14:
				return $this->getTelexrelease();
				break;
			case 15:
				return $this->getEstimatedarrivaldate();
				break;
			case 16:
				return $this->getArrivaldate();
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
		$keys = ShipmentPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCreatedat(),
			$keys[2] => $this->getSupplierpurchaseorderid(),
			$keys[3] => $this->getContainersrealcount(),
			$keys[4] => $this->getContainersnumbers(),
			$keys[5] => $this->getPickupdate(),
			$keys[6] => $this->getShipmentdate(),
			$keys[7] => $this->getBlnumber(),
			$keys[8] => $this->getVesselname(),
			$keys[9] => $this->getEstimateddeparturedate(),
			$keys[10] => $this->getDeparturedate(),
			$keys[11] => $this->getArrivalportid(),
			$keys[12] => $this->getArrivaltopanamadate(),
			$keys[13] => $this->getTransshipmentdate(),
			$keys[14] => $this->getTelexrelease(),
			$keys[15] => $this->getEstimatedarrivaldate(),
			$keys[16] => $this->getArrivaldate(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aSupplierPurchaseOrder) {
				$result['SupplierPurchaseOrder'] = $this->aSupplierPurchaseOrder->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = ShipmentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCreatedat($value);
				break;
			case 2:
				$this->setSupplierpurchaseorderid($value);
				break;
			case 3:
				$this->setContainersrealcount($value);
				break;
			case 4:
				$this->setContainersnumbers($value);
				break;
			case 5:
				$this->setPickupdate($value);
				break;
			case 6:
				$this->setShipmentdate($value);
				break;
			case 7:
				$this->setBlnumber($value);
				break;
			case 8:
				$this->setVesselname($value);
				break;
			case 9:
				$this->setEstimateddeparturedate($value);
				break;
			case 10:
				$this->setDeparturedate($value);
				break;
			case 11:
				$this->setArrivalportid($value);
				break;
			case 12:
				$this->setArrivaltopanamadate($value);
				break;
			case 13:
				$this->setTransshipmentdate($value);
				break;
			case 14:
				$this->setTelexrelease($value);
				break;
			case 15:
				$this->setEstimatedarrivaldate($value);
				break;
			case 16:
				$this->setArrivaldate($value);
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
		$keys = ShipmentPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCreatedat($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSupplierpurchaseorderid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setContainersrealcount($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setContainersnumbers($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPickupdate($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setShipmentdate($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setBlnumber($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setVesselname($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEstimateddeparturedate($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDeparturedate($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setArrivalportid($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setArrivaltopanamadate($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTransshipmentdate($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setTelexrelease($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setEstimatedarrivaldate($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setArrivaldate($arr[$keys[16]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ShipmentPeer::DATABASE_NAME);

		if ($this->isColumnModified(ShipmentPeer::ID)) $criteria->add(ShipmentPeer::ID, $this->id);
		if ($this->isColumnModified(ShipmentPeer::CREATEDAT)) $criteria->add(ShipmentPeer::CREATEDAT, $this->createdat);
		if ($this->isColumnModified(ShipmentPeer::SUPPLIERPURCHASEORDERID)) $criteria->add(ShipmentPeer::SUPPLIERPURCHASEORDERID, $this->supplierpurchaseorderid);
		if ($this->isColumnModified(ShipmentPeer::CONTAINERSREALCOUNT)) $criteria->add(ShipmentPeer::CONTAINERSREALCOUNT, $this->containersrealcount);
		if ($this->isColumnModified(ShipmentPeer::CONTAINERSNUMBERS)) $criteria->add(ShipmentPeer::CONTAINERSNUMBERS, $this->containersnumbers);
		if ($this->isColumnModified(ShipmentPeer::PICKUPDATE)) $criteria->add(ShipmentPeer::PICKUPDATE, $this->pickupdate);
		if ($this->isColumnModified(ShipmentPeer::SHIPMENTDATE)) $criteria->add(ShipmentPeer::SHIPMENTDATE, $this->shipmentdate);
		if ($this->isColumnModified(ShipmentPeer::BLNUMBER)) $criteria->add(ShipmentPeer::BLNUMBER, $this->blnumber);
		if ($this->isColumnModified(ShipmentPeer::VESSELNAME)) $criteria->add(ShipmentPeer::VESSELNAME, $this->vesselname);
		if ($this->isColumnModified(ShipmentPeer::ESTIMATEDDEPARTUREDATE)) $criteria->add(ShipmentPeer::ESTIMATEDDEPARTUREDATE, $this->estimateddeparturedate);
		if ($this->isColumnModified(ShipmentPeer::DEPARTUREDATE)) $criteria->add(ShipmentPeer::DEPARTUREDATE, $this->departuredate);
		if ($this->isColumnModified(ShipmentPeer::ARRIVALPORTID)) $criteria->add(ShipmentPeer::ARRIVALPORTID, $this->arrivalportid);
		if ($this->isColumnModified(ShipmentPeer::ARRIVALTOPANAMADATE)) $criteria->add(ShipmentPeer::ARRIVALTOPANAMADATE, $this->arrivaltopanamadate);
		if ($this->isColumnModified(ShipmentPeer::TRANSSHIPMENTDATE)) $criteria->add(ShipmentPeer::TRANSSHIPMENTDATE, $this->transshipmentdate);
		if ($this->isColumnModified(ShipmentPeer::TELEXRELEASE)) $criteria->add(ShipmentPeer::TELEXRELEASE, $this->telexrelease);
		if ($this->isColumnModified(ShipmentPeer::ESTIMATEDARRIVALDATE)) $criteria->add(ShipmentPeer::ESTIMATEDARRIVALDATE, $this->estimatedarrivaldate);
		if ($this->isColumnModified(ShipmentPeer::ARRIVALDATE)) $criteria->add(ShipmentPeer::ARRIVALDATE, $this->arrivaldate);

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
		$criteria = new Criteria(ShipmentPeer::DATABASE_NAME);
		$criteria->add(ShipmentPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Shipment (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setCreatedat($this->createdat);
		$copyObj->setSupplierpurchaseorderid($this->supplierpurchaseorderid);
		$copyObj->setContainersrealcount($this->containersrealcount);
		$copyObj->setContainersnumbers($this->containersnumbers);
		$copyObj->setPickupdate($this->pickupdate);
		$copyObj->setShipmentdate($this->shipmentdate);
		$copyObj->setBlnumber($this->blnumber);
		$copyObj->setVesselname($this->vesselname);
		$copyObj->setEstimateddeparturedate($this->estimateddeparturedate);
		$copyObj->setDeparturedate($this->departuredate);
		$copyObj->setArrivalportid($this->arrivalportid);
		$copyObj->setArrivaltopanamadate($this->arrivaltopanamadate);
		$copyObj->setTransshipmentdate($this->transshipmentdate);
		$copyObj->setTelexrelease($this->telexrelease);
		$copyObj->setEstimatedarrivaldate($this->estimatedarrivaldate);
		$copyObj->setArrivaldate($this->arrivaldate);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getShipmentReleases() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addShipmentRelease($relObj->copy($deepCopy));
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
	 * @return     Shipment Clone of current object.
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
	 * @return     ShipmentPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ShipmentPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a SupplierPurchaseOrder object.
	 *
	 * @param      SupplierPurchaseOrder $v
	 * @return     Shipment The current object (for fluent API support)
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
			$v->addShipment($this);
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
				 $this->aSupplierPurchaseOrder->addShipments($this);
			 */
		}
		return $this->aSupplierPurchaseOrder;
	}

	/**
	 * Declares an association between this object and a Port object.
	 *
	 * @param      Port $v
	 * @return     Shipment The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPort(Port $v = null)
	{
		if ($v === null) {
			$this->setArrivalportid(NULL);
		} else {
			$this->setArrivalportid($v->getId());
		}

		$this->aPort = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Port object, it will not be re-added.
		if ($v !== null) {
			$v->addShipment($this);
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
		if ($this->aPort === null && ($this->arrivalportid !== null)) {
			$this->aPort = PortQuery::create()->findPk($this->arrivalportid, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aPort->addShipments($this);
			 */
		}
		return $this->aPort;
	}

	/**
	 * Clears out the collShipmentReleases collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addShipmentReleases()
	 */
	public function clearShipmentReleases()
	{
		$this->collShipmentReleases = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collShipmentReleases collection.
	 *
	 * By default this just sets the collShipmentReleases collection to an empty array (like clearcollShipmentReleases());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initShipmentReleases()
	{
		$this->collShipmentReleases = new PropelObjectCollection();
		$this->collShipmentReleases->setModel('ShipmentRelease');
	}

	/**
	 * Gets an array of ShipmentRelease objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Shipment is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ShipmentRelease[] List of ShipmentRelease objects
	 * @throws     PropelException
	 */
	public function getShipmentReleases($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collShipmentReleases || null !== $criteria) {
			if ($this->isNew() && null === $this->collShipmentReleases) {
				// return empty collection
				$this->initShipmentReleases();
			} else {
				$collShipmentReleases = ShipmentReleaseQuery::create(null, $criteria)
					->filterByShipment($this)
					->find($con);
				if (null !== $criteria) {
					return $collShipmentReleases;
				}
				$this->collShipmentReleases = $collShipmentReleases;
			}
		}
		return $this->collShipmentReleases;
	}

	/**
	 * Returns the number of related ShipmentRelease objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ShipmentRelease objects.
	 * @throws     PropelException
	 */
	public function countShipmentReleases(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collShipmentReleases || null !== $criteria) {
			if ($this->isNew() && null === $this->collShipmentReleases) {
				return 0;
			} else {
				$query = ShipmentReleaseQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByShipment($this)
					->count($con);
			}
		} else {
			return count($this->collShipmentReleases);
		}
	}

	/**
	 * Method called to associate a ShipmentRelease object to this object
	 * through the ShipmentRelease foreign key attribute.
	 *
	 * @param      ShipmentRelease $l ShipmentRelease
	 * @return     void
	 * @throws     PropelException
	 */
	public function addShipmentRelease(ShipmentRelease $l)
	{
		if ($this->collShipmentReleases === null) {
			$this->initShipmentReleases();
		}
		if (!$this->collShipmentReleases->contains($l)) { // only add it if the **same** object is not already associated
			$this->collShipmentReleases[]= $l;
			$l->setShipment($this);
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->createdat = null;
		$this->supplierpurchaseorderid = null;
		$this->containersrealcount = null;
		$this->containersnumbers = null;
		$this->pickupdate = null;
		$this->shipmentdate = null;
		$this->blnumber = null;
		$this->vesselname = null;
		$this->estimateddeparturedate = null;
		$this->departuredate = null;
		$this->arrivalportid = null;
		$this->arrivaltopanamadate = null;
		$this->transshipmentdate = null;
		$this->telexrelease = null;
		$this->estimatedarrivaldate = null;
		$this->arrivaldate = null;
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
			if ($this->collShipmentReleases) {
				foreach ((array) $this->collShipmentReleases as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collShipmentReleases = null;
		$this->aSupplierPurchaseOrder = null;
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

} // BaseShipment
