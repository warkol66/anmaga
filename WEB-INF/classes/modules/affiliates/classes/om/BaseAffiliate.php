<?php


/**
 * Base class that represents a row from the 'affiliates_affiliate' table.
 *
 * Afiliados
 *
 * @package    propel.generator.affiliates.classes.om
 */
abstract class BaseAffiliate extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'AffiliatePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AffiliatePeer
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
	 * The value for the ownerid field.
	 * @var        int
	 */
	protected $ownerid;

	/**
	 * The value for the internalnumber field.
	 * @var        string
	 */
	protected $internalnumber;

	/**
	 * The value for the address field.
	 * @var        string
	 */
	protected $address;

	/**
	 * The value for the phone field.
	 * @var        string
	 */
	protected $phone;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the contact field.
	 * @var        string
	 */
	protected $contact;

	/**
	 * The value for the contactemail field.
	 * @var        string
	 */
	protected $contactemail;

	/**
	 * The value for the web field.
	 * @var        string
	 */
	protected $web;

	/**
	 * The value for the memo field.
	 * @var        string
	 */
	protected $memo;

	/**
	 * The value for the deleted_at field.
	 * @var        string
	 */
	protected $deleted_at;

	/**
	 * The value for the created_at field.
	 * @var        string
	 */
	protected $created_at;

	/**
	 * The value for the updated_at field.
	 * @var        string
	 */
	protected $updated_at;

	/**
	 * @var        AffiliateUser
	 */
	protected $aAffiliateUserRelatedByOwnerid;

	/**
	 * @var        array AffiliateUser[] Collection to store aggregation of AffiliateUser objects.
	 */
	protected $collAffiliateUsersRelatedByAffiliateid;

	/**
	 * @var        array AffiliateBranch[] Collection to store aggregation of AffiliateBranch objects.
	 */
	protected $collAffiliateBranchs;

	/**
	 * @var        array AffiliateProduct[] Collection to store aggregation of AffiliateProduct objects.
	 */
	protected $collAffiliateProducts;

	/**
	 * @var        array AffiliateProductCode[] Collection to store aggregation of AffiliateProductCode objects.
	 */
	protected $collAffiliateProductCodes;

	/**
	 * @var        array Order[] Collection to store aggregation of Order objects.
	 */
	protected $collOrders;

	/**
	 * @var        array OrderStateChange[] Collection to store aggregation of OrderStateChange objects.
	 */
	protected $collOrderStateChanges;

	/**
	 * @var        array OrderTemplate[] Collection to store aggregation of OrderTemplate objects.
	 */
	protected $collOrderTemplates;

	/**
	 * @var        array Product[] Collection to store aggregation of Product objects.
	 */
	protected $collProducts;

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
	 * Id afiliado
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [name] column value.
	 * nombre afiliado
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [ownerid] column value.
	 * Id del usuario administrador del afiliado
	 * @return     int
	 */
	public function getOwnerid()
	{
		return $this->ownerid;
	}

	/**
	 * Get the [internalnumber] column value.
	 * Id interno
	 * @return     string
	 */
	public function getInternalnumber()
	{
		return $this->internalnumber;
	}

	/**
	 * Get the [address] column value.
	 * Direccion afiliado
	 * @return     string
	 */
	public function getAddress()
	{
		return $this->address;
	}

	/**
	 * Get the [phone] column value.
	 * Telefono afiliado
	 * @return     string
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * Get the [email] column value.
	 * Email afiliado
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Get the [contact] column value.
	 * Nombre de persona de contacto
	 * @return     string
	 */
	public function getContact()
	{
		return $this->contact;
	}

	/**
	 * Get the [contactemail] column value.
	 * Email de persona de contacto
	 * @return     string
	 */
	public function getContactemail()
	{
		return $this->contactemail;
	}

	/**
	 * Get the [web] column value.
	 * Direccion web del afiliado
	 * @return     string
	 */
	public function getWeb()
	{
		return $this->web;
	}

	/**
	 * Get the [memo] column value.
	 * Informacion adicional del afiliado
	 * @return     string
	 */
	public function getMemo()
	{
		return $this->memo;
	}

	/**
	 * Get the [optionally formatted] temporal [deleted_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDeletedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->deleted_at === null) {
			return null;
		}


		if ($this->deleted_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->deleted_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->deleted_at, true), $x);
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
	 * Get the [optionally formatted] temporal [created_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->created_at === null) {
			return null;
		}


		if ($this->created_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->created_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
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
	 * Get the [optionally formatted] temporal [updated_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->updated_at === null) {
			return null;
		}


		if ($this->updated_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->updated_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
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
	 * Id afiliado
	 * @param      int $v new value
	 * @return     Affiliate The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AffiliatePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [name] column.
	 * nombre afiliado
	 * @param      string $v new value
	 * @return     Affiliate The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = AffiliatePeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [ownerid] column.
	 * Id del usuario administrador del afiliado
	 * @param      int $v new value
	 * @return     Affiliate The current object (for fluent API support)
	 */
	public function setOwnerid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->ownerid !== $v) {
			$this->ownerid = $v;
			$this->modifiedColumns[] = AffiliatePeer::OWNERID;
		}

		if ($this->aAffiliateUserRelatedByOwnerid !== null && $this->aAffiliateUserRelatedByOwnerid->getId() !== $v) {
			$this->aAffiliateUserRelatedByOwnerid = null;
		}

		return $this;
	} // setOwnerid()

	/**
	 * Set the value of [internalnumber] column.
	 * Id interno
	 * @param      string $v new value
	 * @return     Affiliate The current object (for fluent API support)
	 */
	public function setInternalnumber($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->internalnumber !== $v) {
			$this->internalnumber = $v;
			$this->modifiedColumns[] = AffiliatePeer::INTERNALNUMBER;
		}

		return $this;
	} // setInternalnumber()

	/**
	 * Set the value of [address] column.
	 * Direccion afiliado
	 * @param      string $v new value
	 * @return     Affiliate The current object (for fluent API support)
	 */
	public function setAddress($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->address !== $v) {
			$this->address = $v;
			$this->modifiedColumns[] = AffiliatePeer::ADDRESS;
		}

		return $this;
	} // setAddress()

	/**
	 * Set the value of [phone] column.
	 * Telefono afiliado
	 * @param      string $v new value
	 * @return     Affiliate The current object (for fluent API support)
	 */
	public function setPhone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->phone !== $v) {
			$this->phone = $v;
			$this->modifiedColumns[] = AffiliatePeer::PHONE;
		}

		return $this;
	} // setPhone()

	/**
	 * Set the value of [email] column.
	 * Email afiliado
	 * @param      string $v new value
	 * @return     Affiliate The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = AffiliatePeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [contact] column.
	 * Nombre de persona de contacto
	 * @param      string $v new value
	 * @return     Affiliate The current object (for fluent API support)
	 */
	public function setContact($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->contact !== $v) {
			$this->contact = $v;
			$this->modifiedColumns[] = AffiliatePeer::CONTACT;
		}

		return $this;
	} // setContact()

	/**
	 * Set the value of [contactemail] column.
	 * Email de persona de contacto
	 * @param      string $v new value
	 * @return     Affiliate The current object (for fluent API support)
	 */
	public function setContactemail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->contactemail !== $v) {
			$this->contactemail = $v;
			$this->modifiedColumns[] = AffiliatePeer::CONTACTEMAIL;
		}

		return $this;
	} // setContactemail()

	/**
	 * Set the value of [web] column.
	 * Direccion web del afiliado
	 * @param      string $v new value
	 * @return     Affiliate The current object (for fluent API support)
	 */
	public function setWeb($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->web !== $v) {
			$this->web = $v;
			$this->modifiedColumns[] = AffiliatePeer::WEB;
		}

		return $this;
	} // setWeb()

	/**
	 * Set the value of [memo] column.
	 * Informacion adicional del afiliado
	 * @param      string $v new value
	 * @return     Affiliate The current object (for fluent API support)
	 */
	public function setMemo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->memo !== $v) {
			$this->memo = $v;
			$this->modifiedColumns[] = AffiliatePeer::MEMO;
		}

		return $this;
	} // setMemo()

	/**
	 * Sets the value of [deleted_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Affiliate The current object (for fluent API support)
	 */
	public function setDeletedAt($v)
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

		if ( $this->deleted_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->deleted_at !== null && $tmpDt = new DateTime($this->deleted_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->deleted_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = AffiliatePeer::DELETED_AT;
			}
		} // if either are not null

		return $this;
	} // setDeletedAt()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Affiliate The current object (for fluent API support)
	 */
	public function setCreatedAt($v)
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

		if ( $this->created_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->created_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = AffiliatePeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Affiliate The current object (for fluent API support)
	 */
	public function setUpdatedAt($v)
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

		if ( $this->updated_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->updated_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = AffiliatePeer::UPDATED_AT;
			}
		} // if either are not null

		return $this;
	} // setUpdatedAt()

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
			$this->ownerid = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->internalnumber = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->address = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->phone = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->email = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->contact = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->contactemail = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->web = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->memo = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->deleted_at = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->created_at = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->updated_at = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 14; // 14 = AffiliatePeer::NUM_COLUMNS - AffiliatePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Affiliate object", $e);
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

		if ($this->aAffiliateUserRelatedByOwnerid !== null && $this->ownerid !== $this->aAffiliateUserRelatedByOwnerid->getId()) {
			$this->aAffiliateUserRelatedByOwnerid = null;
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
			$con = Propel::getConnection(AffiliatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = AffiliatePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aAffiliateUserRelatedByOwnerid = null;
			$this->collAffiliateUsersRelatedByAffiliateid = null;

			$this->collAffiliateBranchs = null;

			$this->collAffiliateProducts = null;

			$this->collAffiliateProductCodes = null;

			$this->collOrders = null;

			$this->collOrderStateChanges = null;

			$this->collOrderTemplates = null;

			$this->collProducts = null;
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
			$con = Propel::getConnection(AffiliatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// soft_delete behavior
			if (!empty($ret) && AffiliateQuery::isSoftDeleteEnabled()) {
				$this->setDeletedAt(time());
				$this->save($con);
				$con->commit();
				AffiliatePeer::removeInstanceFromPool($this);
				return;
			}
			if ($ret) {
				AffiliateQuery::create()
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
			$con = Propel::getConnection(AffiliatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// timestampable behavior
				if (!$this->isColumnModified(AffiliatePeer::CREATED_AT)) {
					$this->setCreatedAt(time());
				}
				if (!$this->isColumnModified(AffiliatePeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
			} else {
				$ret = $ret && $this->preUpdate($con);
				// timestampable behavior
				if ($this->isModified() && !$this->isColumnModified(AffiliatePeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				AffiliatePeer::addInstanceToPool($this);
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

			if ($this->aAffiliateUserRelatedByOwnerid !== null) {
				if ($this->aAffiliateUserRelatedByOwnerid->isModified() || $this->aAffiliateUserRelatedByOwnerid->isNew()) {
					$affectedRows += $this->aAffiliateUserRelatedByOwnerid->save($con);
				}
				$this->setAffiliateUserRelatedByOwnerid($this->aAffiliateUserRelatedByOwnerid);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = AffiliatePeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(AffiliatePeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.AffiliatePeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += AffiliatePeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collAffiliateUsersRelatedByAffiliateid !== null) {
				foreach ($this->collAffiliateUsersRelatedByAffiliateid as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAffiliateBranchs !== null) {
				foreach ($this->collAffiliateBranchs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAffiliateProducts !== null) {
				foreach ($this->collAffiliateProducts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAffiliateProductCodes !== null) {
				foreach ($this->collAffiliateProductCodes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collOrders !== null) {
				foreach ($this->collOrders as $referrerFK) {
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

			if ($this->collOrderTemplates !== null) {
				foreach ($this->collOrderTemplates as $referrerFK) {
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

			if ($this->aAffiliateUserRelatedByOwnerid !== null) {
				if (!$this->aAffiliateUserRelatedByOwnerid->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAffiliateUserRelatedByOwnerid->getValidationFailures());
				}
			}


			if (($retval = AffiliatePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAffiliateUsersRelatedByAffiliateid !== null) {
					foreach ($this->collAffiliateUsersRelatedByAffiliateid as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAffiliateBranchs !== null) {
					foreach ($this->collAffiliateBranchs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAffiliateProducts !== null) {
					foreach ($this->collAffiliateProducts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAffiliateProductCodes !== null) {
					foreach ($this->collAffiliateProductCodes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collOrders !== null) {
					foreach ($this->collOrders as $referrerFK) {
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

				if ($this->collOrderTemplates !== null) {
					foreach ($this->collOrderTemplates as $referrerFK) {
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
		$pos = AffiliatePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getOwnerid();
				break;
			case 3:
				return $this->getInternalnumber();
				break;
			case 4:
				return $this->getAddress();
				break;
			case 5:
				return $this->getPhone();
				break;
			case 6:
				return $this->getEmail();
				break;
			case 7:
				return $this->getContact();
				break;
			case 8:
				return $this->getContactemail();
				break;
			case 9:
				return $this->getWeb();
				break;
			case 10:
				return $this->getMemo();
				break;
			case 11:
				return $this->getDeletedAt();
				break;
			case 12:
				return $this->getCreatedAt();
				break;
			case 13:
				return $this->getUpdatedAt();
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
		$keys = AffiliatePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getOwnerid(),
			$keys[3] => $this->getInternalnumber(),
			$keys[4] => $this->getAddress(),
			$keys[5] => $this->getPhone(),
			$keys[6] => $this->getEmail(),
			$keys[7] => $this->getContact(),
			$keys[8] => $this->getContactemail(),
			$keys[9] => $this->getWeb(),
			$keys[10] => $this->getMemo(),
			$keys[11] => $this->getDeletedAt(),
			$keys[12] => $this->getCreatedAt(),
			$keys[13] => $this->getUpdatedAt(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aAffiliateUserRelatedByOwnerid) {
				$result['AffiliateUserRelatedByOwnerid'] = $this->aAffiliateUserRelatedByOwnerid->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = AffiliatePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setOwnerid($value);
				break;
			case 3:
				$this->setInternalnumber($value);
				break;
			case 4:
				$this->setAddress($value);
				break;
			case 5:
				$this->setPhone($value);
				break;
			case 6:
				$this->setEmail($value);
				break;
			case 7:
				$this->setContact($value);
				break;
			case 8:
				$this->setContactemail($value);
				break;
			case 9:
				$this->setWeb($value);
				break;
			case 10:
				$this->setMemo($value);
				break;
			case 11:
				$this->setDeletedAt($value);
				break;
			case 12:
				$this->setCreatedAt($value);
				break;
			case 13:
				$this->setUpdatedAt($value);
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
		$keys = AffiliatePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setOwnerid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setInternalnumber($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAddress($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPhone($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEmail($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setContact($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setContactemail($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setWeb($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMemo($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDeletedAt($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCreatedAt($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setUpdatedAt($arr[$keys[13]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);

		if ($this->isColumnModified(AffiliatePeer::ID)) $criteria->add(AffiliatePeer::ID, $this->id);
		if ($this->isColumnModified(AffiliatePeer::NAME)) $criteria->add(AffiliatePeer::NAME, $this->name);
		if ($this->isColumnModified(AffiliatePeer::OWNERID)) $criteria->add(AffiliatePeer::OWNERID, $this->ownerid);
		if ($this->isColumnModified(AffiliatePeer::INTERNALNUMBER)) $criteria->add(AffiliatePeer::INTERNALNUMBER, $this->internalnumber);
		if ($this->isColumnModified(AffiliatePeer::ADDRESS)) $criteria->add(AffiliatePeer::ADDRESS, $this->address);
		if ($this->isColumnModified(AffiliatePeer::PHONE)) $criteria->add(AffiliatePeer::PHONE, $this->phone);
		if ($this->isColumnModified(AffiliatePeer::EMAIL)) $criteria->add(AffiliatePeer::EMAIL, $this->email);
		if ($this->isColumnModified(AffiliatePeer::CONTACT)) $criteria->add(AffiliatePeer::CONTACT, $this->contact);
		if ($this->isColumnModified(AffiliatePeer::CONTACTEMAIL)) $criteria->add(AffiliatePeer::CONTACTEMAIL, $this->contactemail);
		if ($this->isColumnModified(AffiliatePeer::WEB)) $criteria->add(AffiliatePeer::WEB, $this->web);
		if ($this->isColumnModified(AffiliatePeer::MEMO)) $criteria->add(AffiliatePeer::MEMO, $this->memo);
		if ($this->isColumnModified(AffiliatePeer::DELETED_AT)) $criteria->add(AffiliatePeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(AffiliatePeer::CREATED_AT)) $criteria->add(AffiliatePeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(AffiliatePeer::UPDATED_AT)) $criteria->add(AffiliatePeer::UPDATED_AT, $this->updated_at);

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
		$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		$criteria->add(AffiliatePeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Affiliate (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setName($this->name);
		$copyObj->setOwnerid($this->ownerid);
		$copyObj->setInternalnumber($this->internalnumber);
		$copyObj->setAddress($this->address);
		$copyObj->setPhone($this->phone);
		$copyObj->setEmail($this->email);
		$copyObj->setContact($this->contact);
		$copyObj->setContactemail($this->contactemail);
		$copyObj->setWeb($this->web);
		$copyObj->setMemo($this->memo);
		$copyObj->setDeletedAt($this->deleted_at);
		$copyObj->setCreatedAt($this->created_at);
		$copyObj->setUpdatedAt($this->updated_at);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getAffiliateUsersRelatedByAffiliateid() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAffiliateUserRelatedByAffiliateid($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAffiliateBranchs() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAffiliateBranch($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAffiliateProducts() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAffiliateProduct($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAffiliateProductCodes() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAffiliateProductCode($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getOrders() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addOrder($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getOrderStateChanges() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addOrderStateChange($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getOrderTemplates() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addOrderTemplate($relObj->copy($deepCopy));
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
	 * @return     Affiliate Clone of current object.
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
	 * @return     AffiliatePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AffiliatePeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a AffiliateUser object.
	 *
	 * @param      AffiliateUser $v
	 * @return     Affiliate The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setAffiliateUserRelatedByOwnerid(AffiliateUser $v = null)
	{
		if ($v === null) {
			$this->setOwnerid(NULL);
		} else {
			$this->setOwnerid($v->getId());
		}

		$this->aAffiliateUserRelatedByOwnerid = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the AffiliateUser object, it will not be re-added.
		if ($v !== null) {
			$v->addAffiliateRelatedByOwnerid($this);
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
	public function getAffiliateUserRelatedByOwnerid(PropelPDO $con = null)
	{
		if ($this->aAffiliateUserRelatedByOwnerid === null && ($this->ownerid !== null)) {
			$this->aAffiliateUserRelatedByOwnerid = AffiliateUserQuery::create()->findPk($this->ownerid, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aAffiliateUserRelatedByOwnerid->addAffiliatesRelatedByOwnerid($this);
			 */
		}
		return $this->aAffiliateUserRelatedByOwnerid;
	}

	/**
	 * Clears out the collAffiliateUsersRelatedByAffiliateid collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAffiliateUsersRelatedByAffiliateid()
	 */
	public function clearAffiliateUsersRelatedByAffiliateid()
	{
		$this->collAffiliateUsersRelatedByAffiliateid = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAffiliateUsersRelatedByAffiliateid collection.
	 *
	 * By default this just sets the collAffiliateUsersRelatedByAffiliateid collection to an empty array (like clearcollAffiliateUsersRelatedByAffiliateid());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAffiliateUsersRelatedByAffiliateid()
	{
		$this->collAffiliateUsersRelatedByAffiliateid = new PropelObjectCollection();
		$this->collAffiliateUsersRelatedByAffiliateid->setModel('AffiliateUser');
	}

	/**
	 * Gets an array of AffiliateUser objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Affiliate is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AffiliateUser[] List of AffiliateUser objects
	 * @throws     PropelException
	 */
	public function getAffiliateUsersRelatedByAffiliateid($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateUsersRelatedByAffiliateid || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateUsersRelatedByAffiliateid) {
				// return empty collection
				$this->initAffiliateUsersRelatedByAffiliateid();
			} else {
				$collAffiliateUsersRelatedByAffiliateid = AffiliateUserQuery::create(null, $criteria)
					->filterByAffiliateRelatedByAffiliateid($this)
					->find($con);
				if (null !== $criteria) {
					return $collAffiliateUsersRelatedByAffiliateid;
				}
				$this->collAffiliateUsersRelatedByAffiliateid = $collAffiliateUsersRelatedByAffiliateid;
			}
		}
		return $this->collAffiliateUsersRelatedByAffiliateid;
	}

	/**
	 * Returns the number of related AffiliateUser objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AffiliateUser objects.
	 * @throws     PropelException
	 */
	public function countAffiliateUsersRelatedByAffiliateid(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateUsersRelatedByAffiliateid || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateUsersRelatedByAffiliateid) {
				return 0;
			} else {
				$query = AffiliateUserQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliateRelatedByAffiliateid($this)
					->count($con);
			}
		} else {
			return count($this->collAffiliateUsersRelatedByAffiliateid);
		}
	}

	/**
	 * Method called to associate a AffiliateUser object to this object
	 * through the AffiliateUser foreign key attribute.
	 *
	 * @param      AffiliateUser $l AffiliateUser
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAffiliateUserRelatedByAffiliateid(AffiliateUser $l)
	{
		if ($this->collAffiliateUsersRelatedByAffiliateid === null) {
			$this->initAffiliateUsersRelatedByAffiliateid();
		}
		if (!$this->collAffiliateUsersRelatedByAffiliateid->contains($l)) { // only add it if the **same** object is not already associated
			$this->collAffiliateUsersRelatedByAffiliateid[]= $l;
			$l->setAffiliateRelatedByAffiliateid($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related AffiliateUsersRelatedByAffiliateid from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array AffiliateUser[] List of AffiliateUser objects
	 */
	public function getAffiliateUsersRelatedByAffiliateidJoinAffiliateLevel($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AffiliateUserQuery::create(null, $criteria);
		$query->joinWith('AffiliateLevel', $join_behavior);

		return $this->getAffiliateUsersRelatedByAffiliateid($query, $con);
	}

	/**
	 * Clears out the collAffiliateBranchs collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAffiliateBranchs()
	 */
	public function clearAffiliateBranchs()
	{
		$this->collAffiliateBranchs = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAffiliateBranchs collection.
	 *
	 * By default this just sets the collAffiliateBranchs collection to an empty array (like clearcollAffiliateBranchs());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAffiliateBranchs()
	{
		$this->collAffiliateBranchs = new PropelObjectCollection();
		$this->collAffiliateBranchs->setModel('AffiliateBranch');
	}

	/**
	 * Gets an array of AffiliateBranch objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Affiliate is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AffiliateBranch[] List of AffiliateBranch objects
	 * @throws     PropelException
	 */
	public function getAffiliateBranchs($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateBranchs || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateBranchs) {
				// return empty collection
				$this->initAffiliateBranchs();
			} else {
				$collAffiliateBranchs = AffiliateBranchQuery::create(null, $criteria)
					->filterByAffiliate($this)
					->find($con);
				if (null !== $criteria) {
					return $collAffiliateBranchs;
				}
				$this->collAffiliateBranchs = $collAffiliateBranchs;
			}
		}
		return $this->collAffiliateBranchs;
	}

	/**
	 * Returns the number of related AffiliateBranch objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AffiliateBranch objects.
	 * @throws     PropelException
	 */
	public function countAffiliateBranchs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateBranchs || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateBranchs) {
				return 0;
			} else {
				$query = AffiliateBranchQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliate($this)
					->count($con);
			}
		} else {
			return count($this->collAffiliateBranchs);
		}
	}

	/**
	 * Method called to associate a AffiliateBranch object to this object
	 * through the AffiliateBranch foreign key attribute.
	 *
	 * @param      AffiliateBranch $l AffiliateBranch
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAffiliateBranch(AffiliateBranch $l)
	{
		if ($this->collAffiliateBranchs === null) {
			$this->initAffiliateBranchs();
		}
		if (!$this->collAffiliateBranchs->contains($l)) { // only add it if the **same** object is not already associated
			$this->collAffiliateBranchs[]= $l;
			$l->setAffiliate($this);
		}
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
	 * If this Affiliate is new, it will return
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
					->filterByAffiliate($this)
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
					->filterByAffiliate($this)
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
			$l->setAffiliate($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related AffiliateProducts from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array AffiliateProduct[] List of AffiliateProduct objects
	 */
	public function getAffiliateProductsJoinProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AffiliateProductQuery::create(null, $criteria);
		$query->joinWith('Product', $join_behavior);

		return $this->getAffiliateProducts($query, $con);
	}

	/**
	 * Clears out the collAffiliateProductCodes collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAffiliateProductCodes()
	 */
	public function clearAffiliateProductCodes()
	{
		$this->collAffiliateProductCodes = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAffiliateProductCodes collection.
	 *
	 * By default this just sets the collAffiliateProductCodes collection to an empty array (like clearcollAffiliateProductCodes());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAffiliateProductCodes()
	{
		$this->collAffiliateProductCodes = new PropelObjectCollection();
		$this->collAffiliateProductCodes->setModel('AffiliateProductCode');
	}

	/**
	 * Gets an array of AffiliateProductCode objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Affiliate is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AffiliateProductCode[] List of AffiliateProductCode objects
	 * @throws     PropelException
	 */
	public function getAffiliateProductCodes($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateProductCodes || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateProductCodes) {
				// return empty collection
				$this->initAffiliateProductCodes();
			} else {
				$collAffiliateProductCodes = AffiliateProductCodeQuery::create(null, $criteria)
					->filterByAffiliate($this)
					->find($con);
				if (null !== $criteria) {
					return $collAffiliateProductCodes;
				}
				$this->collAffiliateProductCodes = $collAffiliateProductCodes;
			}
		}
		return $this->collAffiliateProductCodes;
	}

	/**
	 * Returns the number of related AffiliateProductCode objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AffiliateProductCode objects.
	 * @throws     PropelException
	 */
	public function countAffiliateProductCodes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateProductCodes || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateProductCodes) {
				return 0;
			} else {
				$query = AffiliateProductCodeQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliate($this)
					->count($con);
			}
		} else {
			return count($this->collAffiliateProductCodes);
		}
	}

	/**
	 * Method called to associate a AffiliateProductCode object to this object
	 * through the AffiliateProductCode foreign key attribute.
	 *
	 * @param      AffiliateProductCode $l AffiliateProductCode
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAffiliateProductCode(AffiliateProductCode $l)
	{
		if ($this->collAffiliateProductCodes === null) {
			$this->initAffiliateProductCodes();
		}
		if (!$this->collAffiliateProductCodes->contains($l)) { // only add it if the **same** object is not already associated
			$this->collAffiliateProductCodes[]= $l;
			$l->setAffiliate($this);
		}
	}

	/**
	 * Clears out the collOrders collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addOrders()
	 */
	public function clearOrders()
	{
		$this->collOrders = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collOrders collection.
	 *
	 * By default this just sets the collOrders collection to an empty array (like clearcollOrders());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initOrders()
	{
		$this->collOrders = new PropelObjectCollection();
		$this->collOrders->setModel('Order');
	}

	/**
	 * Gets an array of Order objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Affiliate is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Order[] List of Order objects
	 * @throws     PropelException
	 */
	public function getOrders($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collOrders || null !== $criteria) {
			if ($this->isNew() && null === $this->collOrders) {
				// return empty collection
				$this->initOrders();
			} else {
				$collOrders = OrderQuery::create(null, $criteria)
					->filterByAffiliate($this)
					->find($con);
				if (null !== $criteria) {
					return $collOrders;
				}
				$this->collOrders = $collOrders;
			}
		}
		return $this->collOrders;
	}

	/**
	 * Returns the number of related Order objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Order objects.
	 * @throws     PropelException
	 */
	public function countOrders(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collOrders || null !== $criteria) {
			if ($this->isNew() && null === $this->collOrders) {
				return 0;
			} else {
				$query = OrderQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliate($this)
					->count($con);
			}
		} else {
			return count($this->collOrders);
		}
	}

	/**
	 * Method called to associate a Order object to this object
	 * through the Order foreign key attribute.
	 *
	 * @param      Order $l Order
	 * @return     void
	 * @throws     PropelException
	 */
	public function addOrder(Order $l)
	{
		if ($this->collOrders === null) {
			$this->initOrders();
		}
		if (!$this->collOrders->contains($l)) { // only add it if the **same** object is not already associated
			$this->collOrders[]= $l;
			$l->setAffiliate($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related Orders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Order[] List of Order objects
	 */
	public function getOrdersJoinAffiliateUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = OrderQuery::create(null, $criteria);
		$query->joinWith('AffiliateUser', $join_behavior);

		return $this->getOrders($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related Orders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Order[] List of Order objects
	 */
	public function getOrdersJoinAffiliateBranch($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = OrderQuery::create(null, $criteria);
		$query->joinWith('AffiliateBranch', $join_behavior);

		return $this->getOrders($query, $con);
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
	 * @return     void
	 */
	public function initOrderStateChanges()
	{
		$this->collOrderStateChanges = new PropelObjectCollection();
		$this->collOrderStateChanges->setModel('OrderStateChange');
	}

	/**
	 * Gets an array of OrderStateChange objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Affiliate is new, it will return
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
					->filterByAffiliate($this)
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
					->filterByAffiliate($this)
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
			$l->setAffiliate($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related OrderStateChanges from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array OrderStateChange[] List of OrderStateChange objects
	 */
	public function getOrderStateChangesJoinOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = OrderStateChangeQuery::create(null, $criteria);
		$query->joinWith('Order', $join_behavior);

		return $this->getOrderStateChanges($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related OrderStateChanges from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
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
	 * Clears out the collOrderTemplates collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addOrderTemplates()
	 */
	public function clearOrderTemplates()
	{
		$this->collOrderTemplates = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collOrderTemplates collection.
	 *
	 * By default this just sets the collOrderTemplates collection to an empty array (like clearcollOrderTemplates());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initOrderTemplates()
	{
		$this->collOrderTemplates = new PropelObjectCollection();
		$this->collOrderTemplates->setModel('OrderTemplate');
	}

	/**
	 * Gets an array of OrderTemplate objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Affiliate is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array OrderTemplate[] List of OrderTemplate objects
	 * @throws     PropelException
	 */
	public function getOrderTemplates($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collOrderTemplates || null !== $criteria) {
			if ($this->isNew() && null === $this->collOrderTemplates) {
				// return empty collection
				$this->initOrderTemplates();
			} else {
				$collOrderTemplates = OrderTemplateQuery::create(null, $criteria)
					->filterByAffiliate($this)
					->find($con);
				if (null !== $criteria) {
					return $collOrderTemplates;
				}
				$this->collOrderTemplates = $collOrderTemplates;
			}
		}
		return $this->collOrderTemplates;
	}

	/**
	 * Returns the number of related OrderTemplate objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related OrderTemplate objects.
	 * @throws     PropelException
	 */
	public function countOrderTemplates(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collOrderTemplates || null !== $criteria) {
			if ($this->isNew() && null === $this->collOrderTemplates) {
				return 0;
			} else {
				$query = OrderTemplateQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliate($this)
					->count($con);
			}
		} else {
			return count($this->collOrderTemplates);
		}
	}

	/**
	 * Method called to associate a OrderTemplate object to this object
	 * through the OrderTemplate foreign key attribute.
	 *
	 * @param      OrderTemplate $l OrderTemplate
	 * @return     void
	 * @throws     PropelException
	 */
	public function addOrderTemplate(OrderTemplate $l)
	{
		if ($this->collOrderTemplates === null) {
			$this->initOrderTemplates();
		}
		if (!$this->collOrderTemplates->contains($l)) { // only add it if the **same** object is not already associated
			$this->collOrderTemplates[]= $l;
			$l->setAffiliate($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related OrderTemplates from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array OrderTemplate[] List of OrderTemplate objects
	 */
	public function getOrderTemplatesJoinAffiliateUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = OrderTemplateQuery::create(null, $criteria);
		$query->joinWith('AffiliateUser', $join_behavior);

		return $this->getOrderTemplates($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related OrderTemplates from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array OrderTemplate[] List of OrderTemplate objects
	 */
	public function getOrderTemplatesJoinAffiliateBranch($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = OrderTemplateQuery::create(null, $criteria);
		$query->joinWith('AffiliateBranch', $join_behavior);

		return $this->getOrderTemplates($query, $con);
	}

	/**
	 * Clears out the collProducts collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProducts()
	 */
	public function clearProducts()
	{
		$this->collProducts = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProducts collection.
	 *
	 * By default this just sets the collProducts collection to an empty collection (like clearProducts());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProducts()
	{
		$this->collProducts = new PropelObjectCollection();
		$this->collProducts->setModel('Product');
	}

	/**
	 * Gets a collection of Product objects related by a many-to-many relationship
	 * to the current object by way of the catalog_affiliateProduct cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Affiliate is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Product[] List of Product objects
	 */
	public function getProducts($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collProducts || null !== $criteria) {
			if ($this->isNew() && null === $this->collProducts) {
				// return empty collection
				$this->initProducts();
			} else {
				$collProducts = ProductQuery::create(null, $criteria)
					->filterByAffiliate($this)
					->find($con);
				if (null !== $criteria) {
					return $collProducts;
				}
				$this->collProducts = $collProducts;
			}
		}
		return $this->collProducts;
	}

	/**
	 * Gets the number of Product objects related by a many-to-many relationship
	 * to the current object by way of the catalog_affiliateProduct cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Product objects
	 */
	public function countProducts($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collProducts || null !== $criteria) {
			if ($this->isNew() && null === $this->collProducts) {
				return 0;
			} else {
				$query = ProductQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliate($this)
					->count($con);
			}
		} else {
			return count($this->collProducts);
		}
	}

	/**
	 * Associate a Product object to this object
	 * through the catalog_affiliateProduct cross reference table.
	 *
	 * @param      Product $product The AffiliateProduct object to relate
	 * @return     void
	 */
	public function addProduct($product)
	{
		if ($this->collProducts === null) {
			$this->initProducts();
		}
		if (!$this->collProducts->contains($product)) { // only add it if the **same** object is not already associated
			$affiliateProduct = new AffiliateProduct();
			$affiliateProduct->setProduct($product);
			$this->addAffiliateProduct($affiliateProduct);

			$this->collProducts[]= $product;
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->name = null;
		$this->ownerid = null;
		$this->internalnumber = null;
		$this->address = null;
		$this->phone = null;
		$this->email = null;
		$this->contact = null;
		$this->contactemail = null;
		$this->web = null;
		$this->memo = null;
		$this->deleted_at = null;
		$this->created_at = null;
		$this->updated_at = null;
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
			if ($this->collAffiliateUsersRelatedByAffiliateid) {
				foreach ((array) $this->collAffiliateUsersRelatedByAffiliateid as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAffiliateBranchs) {
				foreach ((array) $this->collAffiliateBranchs as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAffiliateProducts) {
				foreach ((array) $this->collAffiliateProducts as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAffiliateProductCodes) {
				foreach ((array) $this->collAffiliateProductCodes as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collOrders) {
				foreach ((array) $this->collOrders as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collOrderStateChanges) {
				foreach ((array) $this->collOrderStateChanges as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collOrderTemplates) {
				foreach ((array) $this->collOrderTemplates as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collAffiliateUsersRelatedByAffiliateid = null;
		$this->collAffiliateBranchs = null;
		$this->collAffiliateProducts = null;
		$this->collAffiliateProductCodes = null;
		$this->collOrders = null;
		$this->collOrderStateChanges = null;
		$this->collOrderTemplates = null;
		$this->aAffiliateUserRelatedByOwnerid = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string The value of the 'name' column
	 */
	public function __toString()
	{
		return (string) $this->getName();
	}

	// soft_delete behavior
	
	/**
	 * Bypass the soft_delete behavior and force a hard delete of the current object
	 */
	public function forceDelete(PropelPDO $con = null)
	{
		AffiliatePeer::disableSoftDelete();
		$this->delete($con);
	}
	
	/**
	 * Undelete a row that was soft_deleted
	 *
	 * @return		 int The number of rows affected by this update and any referring fk objects' save() operations.
	 */
	public function unDelete(PropelPDO $con = null)
	{
		$this->setDeletedAt(null);
		return $this->save($con);
	}

	// timestampable behavior
	
	/**
	 * Mark the current object so that the update date doesn't get updated during next save
	 *
	 * @return     Affiliate The current object (for fluent API support)
	 */
	public function keepUpdateDateUnchanged()
	{
		$this->modifiedColumns[] = AffiliatePeer::UPDATED_AT;
		return $this;
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

} // BaseAffiliate
