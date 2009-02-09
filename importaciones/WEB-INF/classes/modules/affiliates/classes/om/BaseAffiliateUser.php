<?php

/**
 * Base class that represents a row from the 'affiliates_user' table.
 *
 * Usuarios de afiliado
 *
 * @package    affiliates.classes.om
 */
abstract class BaseAffiliateUser extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AffiliateUserPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the affiliateid field.
	 * @var        int
	 */
	protected $affiliateid;

	/**
	 * The value for the username field.
	 * @var        string
	 */
	protected $username;

	/**
	 * The value for the password field.
	 * @var        string
	 */
	protected $password;

	/**
	 * The value for the active field.
	 * @var        boolean
	 */
	protected $active;

	/**
	 * The value for the created field.
	 * @var        string
	 */
	protected $created;

	/**
	 * The value for the updated field.
	 * @var        string
	 */
	protected $updated;

	/**
	 * The value for the timezone field.
	 * @var        string
	 */
	protected $timezone;

	/**
	 * The value for the levelid field.
	 * @var        int
	 */
	protected $levelid;

	/**
	 * The value for the lastlogin field.
	 * @var        string
	 */
	protected $lastlogin;

	/**
	 * @var        AffiliateLevel
	 */
	protected $aAffiliateLevel;

	/**
	 * @var        Affiliate
	 */
	protected $aAffiliate;

	/**
	 * @var        AffiliateUserInfo one-to-one related AffiliateUserInfo object
	 */
	protected $singleAffiliateUserInfo;

	/**
	 * @var        array AffiliateUserGroup[] Collection to store aggregation of AffiliateUserGroup objects.
	 */
	protected $collAffiliateUserGroups;

	/**
	 * @var        Criteria The criteria used to select the current contents of collAffiliateUserGroups.
	 */
	private $lastAffiliateUserGroupCriteria = null;

	/**
	 * @var        array ClientQuotation[] Collection to store aggregation of ClientQuotation objects.
	 */
	protected $collClientQuotations;

	/**
	 * @var        Criteria The criteria used to select the current contents of collClientQuotations.
	 */
	private $lastClientQuotationCriteria = null;

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
	 * Initializes internal state of BaseAffiliateUser object.
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
	 * User Id
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [affiliateid] column value.
	 * Id afiliado
	 * @return     int
	 */
	public function getAffiliateid()
	{
		return $this->affiliateid;
	}

	/**
	 * Get the [username] column value.
	 * username
	 * @return     string
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * Get the [password] column value.
	 * password
	 * @return     string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Get the [active] column value.
	 * Is user active?
	 * @return     boolean
	 */
	public function getActive()
	{
		return $this->active;
	}

	/**
	 * Get the [optionally formatted] temporal [created] column value.
	 * Creation date for
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCreated($format = 'Y-m-d H:i:s')
	{
		if ($this->created === null) {
			return null;
		}


		if ($this->created === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->created);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created, true), $x);
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
	 * Get the [optionally formatted] temporal [updated] column value.
	 * Last update date
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getUpdated($format = 'Y-m-d H:i:s')
	{
		if ($this->updated === null) {
			return null;
		}


		if ($this->updated === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->updated);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated, true), $x);
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
	 * Get the [timezone] column value.
	 * Timezone GMT del usuario afiliado
	 * @return     string
	 */
	public function getTimezone()
	{
		return $this->timezone;
	}

	/**
	 * Get the [levelid] column value.
	 * User Level
	 * @return     int
	 */
	public function getLevelid()
	{
		return $this->levelid;
	}

	/**
	 * Get the [optionally formatted] temporal [lastlogin] column value.
	 * Fecha del ultimo login del usuario
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getLastlogin($format = 'Y-m-d H:i:s')
	{
		if ($this->lastlogin === null) {
			return null;
		}


		if ($this->lastlogin === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->lastlogin);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->lastlogin, true), $x);
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
	 * User Id
	 * @param      int $v new value
	 * @return     AffiliateUser The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AffiliateUserPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [affiliateid] column.
	 * Id afiliado
	 * @param      int $v new value
	 * @return     AffiliateUser The current object (for fluent API support)
	 */
	public function setAffiliateid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->affiliateid !== $v) {
			$this->affiliateid = $v;
			$this->modifiedColumns[] = AffiliateUserPeer::AFFILIATEID;
		}

		if ($this->aAffiliate !== null && $this->aAffiliate->getId() !== $v) {
			$this->aAffiliate = null;
		}

		return $this;
	} // setAffiliateid()

	/**
	 * Set the value of [username] column.
	 * username
	 * @param      string $v new value
	 * @return     AffiliateUser The current object (for fluent API support)
	 */
	public function setUsername($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = AffiliateUserPeer::USERNAME;
		}

		return $this;
	} // setUsername()

	/**
	 * Set the value of [password] column.
	 * password
	 * @param      string $v new value
	 * @return     AffiliateUser The current object (for fluent API support)
	 */
	public function setPassword($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = AffiliateUserPeer::PASSWORD;
		}

		return $this;
	} // setPassword()

	/**
	 * Set the value of [active] column.
	 * Is user active?
	 * @param      boolean $v new value
	 * @return     AffiliateUser The current object (for fluent API support)
	 */
	public function setActive($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->active !== $v) {
			$this->active = $v;
			$this->modifiedColumns[] = AffiliateUserPeer::ACTIVE;
		}

		return $this;
	} // setActive()

	/**
	 * Sets the value of [created] column to a normalized version of the date/time value specified.
	 * Creation date for
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     AffiliateUser The current object (for fluent API support)
	 */
	public function setCreated($v)
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

		if ( $this->created !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->created !== null && $tmpDt = new DateTime($this->created)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->created = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = AffiliateUserPeer::CREATED;
			}
		} // if either are not null

		return $this;
	} // setCreated()

	/**
	 * Sets the value of [updated] column to a normalized version of the date/time value specified.
	 * Last update date
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     AffiliateUser The current object (for fluent API support)
	 */
	public function setUpdated($v)
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

		if ( $this->updated !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->updated !== null && $tmpDt = new DateTime($this->updated)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->updated = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = AffiliateUserPeer::UPDATED;
			}
		} // if either are not null

		return $this;
	} // setUpdated()

	/**
	 * Set the value of [timezone] column.
	 * Timezone GMT del usuario afiliado
	 * @param      string $v new value
	 * @return     AffiliateUser The current object (for fluent API support)
	 */
	public function setTimezone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->timezone !== $v) {
			$this->timezone = $v;
			$this->modifiedColumns[] = AffiliateUserPeer::TIMEZONE;
		}

		return $this;
	} // setTimezone()

	/**
	 * Set the value of [levelid] column.
	 * User Level
	 * @param      int $v new value
	 * @return     AffiliateUser The current object (for fluent API support)
	 */
	public function setLevelid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->levelid !== $v) {
			$this->levelid = $v;
			$this->modifiedColumns[] = AffiliateUserPeer::LEVELID;
		}

		if ($this->aAffiliateLevel !== null && $this->aAffiliateLevel->getId() !== $v) {
			$this->aAffiliateLevel = null;
		}

		return $this;
	} // setLevelid()

	/**
	 * Sets the value of [lastlogin] column to a normalized version of the date/time value specified.
	 * Fecha del ultimo login del usuario
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     AffiliateUser The current object (for fluent API support)
	 */
	public function setLastlogin($v)
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

		if ( $this->lastlogin !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->lastlogin !== null && $tmpDt = new DateTime($this->lastlogin)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->lastlogin = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = AffiliateUserPeer::LASTLOGIN;
			}
		} // if either are not null

		return $this;
	} // setLastlogin()

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
			$this->affiliateid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->username = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->password = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->active = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
			$this->created = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->updated = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->timezone = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->levelid = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->lastlogin = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 10; // 10 = AffiliateUserPeer::NUM_COLUMNS - AffiliateUserPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating AffiliateUser object", $e);
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

		if ($this->aAffiliate !== null && $this->affiliateid !== $this->aAffiliate->getId()) {
			$this->aAffiliate = null;
		}
		if ($this->aAffiliateLevel !== null && $this->levelid !== $this->aAffiliateLevel->getId()) {
			$this->aAffiliateLevel = null;
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
			$con = Propel::getConnection(AffiliateUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = AffiliateUserPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aAffiliateLevel = null;
			$this->aAffiliate = null;
			$this->singleAffiliateUserInfo = null;

			$this->collAffiliateUserGroups = null;
			$this->lastAffiliateUserGroupCriteria = null;

			$this->collClientQuotations = null;
			$this->lastClientQuotationCriteria = null;

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
			$con = Propel::getConnection(AffiliateUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			AffiliateUserPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AffiliateUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			AffiliateUserPeer::addInstanceToPool($this);
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

			if ($this->aAffiliateLevel !== null) {
				if ($this->aAffiliateLevel->isModified() || $this->aAffiliateLevel->isNew()) {
					$affectedRows += $this->aAffiliateLevel->save($con);
				}
				$this->setAffiliateLevel($this->aAffiliateLevel);
			}

			if ($this->aAffiliate !== null) {
				if ($this->aAffiliate->isModified() || $this->aAffiliate->isNew()) {
					$affectedRows += $this->aAffiliate->save($con);
				}
				$this->setAffiliate($this->aAffiliate);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = AffiliateUserPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AffiliateUserPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += AffiliateUserPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->singleAffiliateUserInfo !== null) {
				if (!$this->singleAffiliateUserInfo->isDeleted()) {
						$affectedRows += $this->singleAffiliateUserInfo->save($con);
				}
			}

			if ($this->collAffiliateUserGroups !== null) {
				foreach ($this->collAffiliateUserGroups as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collClientQuotations !== null) {
				foreach ($this->collClientQuotations as $referrerFK) {
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

			if ($this->aAffiliateLevel !== null) {
				if (!$this->aAffiliateLevel->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAffiliateLevel->getValidationFailures());
				}
			}

			if ($this->aAffiliate !== null) {
				if (!$this->aAffiliate->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAffiliate->getValidationFailures());
				}
			}


			if (($retval = AffiliateUserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->singleAffiliateUserInfo !== null) {
					if (!$this->singleAffiliateUserInfo->validate($columns)) {
						$failureMap = array_merge($failureMap, $this->singleAffiliateUserInfo->getValidationFailures());
					}
				}

				if ($this->collAffiliateUserGroups !== null) {
					foreach ($this->collAffiliateUserGroups as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClientQuotations !== null) {
					foreach ($this->collClientQuotations as $referrerFK) {
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
		$criteria = new Criteria(AffiliateUserPeer::DATABASE_NAME);

		if ($this->isColumnModified(AffiliateUserPeer::ID)) $criteria->add(AffiliateUserPeer::ID, $this->id);
		if ($this->isColumnModified(AffiliateUserPeer::AFFILIATEID)) $criteria->add(AffiliateUserPeer::AFFILIATEID, $this->affiliateid);
		if ($this->isColumnModified(AffiliateUserPeer::USERNAME)) $criteria->add(AffiliateUserPeer::USERNAME, $this->username);
		if ($this->isColumnModified(AffiliateUserPeer::PASSWORD)) $criteria->add(AffiliateUserPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(AffiliateUserPeer::ACTIVE)) $criteria->add(AffiliateUserPeer::ACTIVE, $this->active);
		if ($this->isColumnModified(AffiliateUserPeer::CREATED)) $criteria->add(AffiliateUserPeer::CREATED, $this->created);
		if ($this->isColumnModified(AffiliateUserPeer::UPDATED)) $criteria->add(AffiliateUserPeer::UPDATED, $this->updated);
		if ($this->isColumnModified(AffiliateUserPeer::TIMEZONE)) $criteria->add(AffiliateUserPeer::TIMEZONE, $this->timezone);
		if ($this->isColumnModified(AffiliateUserPeer::LEVELID)) $criteria->add(AffiliateUserPeer::LEVELID, $this->levelid);
		if ($this->isColumnModified(AffiliateUserPeer::LASTLOGIN)) $criteria->add(AffiliateUserPeer::LASTLOGIN, $this->lastlogin);

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
		$criteria = new Criteria(AffiliateUserPeer::DATABASE_NAME);

		$criteria->add(AffiliateUserPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of AffiliateUser (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setAffiliateid($this->affiliateid);

		$copyObj->setUsername($this->username);

		$copyObj->setPassword($this->password);

		$copyObj->setActive($this->active);

		$copyObj->setCreated($this->created);

		$copyObj->setUpdated($this->updated);

		$copyObj->setTimezone($this->timezone);

		$copyObj->setLevelid($this->levelid);

		$copyObj->setLastlogin($this->lastlogin);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			$relObj = $this->getAffiliateUserInfo();
			if ($relObj) {
				$copyObj->setAffiliateUserInfo($relObj->copy($deepCopy));
			}

			foreach ($this->getAffiliateUserGroups() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAffiliateUserGroup($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClientQuotations() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClientQuotation($relObj->copy($deepCopy));
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
	 * @return     AffiliateUser Clone of current object.
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
	 * @return     AffiliateUserPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AffiliateUserPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a AffiliateLevel object.
	 *
	 * @param      AffiliateLevel $v
	 * @return     AffiliateUser The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setAffiliateLevel(AffiliateLevel $v = null)
	{
		if ($v === null) {
			$this->setLevelid(NULL);
		} else {
			$this->setLevelid($v->getId());
		}

		$this->aAffiliateLevel = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the AffiliateLevel object, it will not be re-added.
		if ($v !== null) {
			$v->addAffiliateUser($this);
		}

		return $this;
	}


	/**
	 * Get the associated AffiliateLevel object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     AffiliateLevel The associated AffiliateLevel object.
	 * @throws     PropelException
	 */
	public function getAffiliateLevel(PropelPDO $con = null)
	{
		if ($this->aAffiliateLevel === null && ($this->levelid !== null)) {
			$this->aAffiliateLevel = AffiliateLevelPeer::retrieveByPK($this->levelid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aAffiliateLevel->addAffiliateUsers($this);
			 */
		}
		return $this->aAffiliateLevel;
	}

	/**
	 * Declares an association between this object and a Affiliate object.
	 *
	 * @param      Affiliate $v
	 * @return     AffiliateUser The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setAffiliate(Affiliate $v = null)
	{
		if ($v === null) {
			$this->setAffiliateid(NULL);
		} else {
			$this->setAffiliateid($v->getId());
		}

		$this->aAffiliate = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Affiliate object, it will not be re-added.
		if ($v !== null) {
			$v->addAffiliateUser($this);
		}

		return $this;
	}


	/**
	 * Get the associated Affiliate object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Affiliate The associated Affiliate object.
	 * @throws     PropelException
	 */
	public function getAffiliate(PropelPDO $con = null)
	{
		if ($this->aAffiliate === null && ($this->affiliateid !== null)) {
			$this->aAffiliate = AffiliatePeer::retrieveByPK($this->affiliateid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aAffiliate->addAffiliateUsers($this);
			 */
		}
		return $this->aAffiliate;
	}

	/**
	 * Gets a single AffiliateUserInfo object, which is related to this object by a one-to-one relationship.
	 *
	 * @param      PropelPDO $con
	 * @return     AffiliateUserInfo
	 * @throws     PropelException
	 */
	public function getAffiliateUserInfo(PropelPDO $con = null)
	{

		if ($this->singleAffiliateUserInfo === null && !$this->isNew()) {
			$this->singleAffiliateUserInfo = AffiliateUserInfoPeer::retrieveByPK($this->id, $con);
		}

		return $this->singleAffiliateUserInfo;
	}

	/**
	 * Sets a single AffiliateUserInfo object as related to this object by a one-to-one relationship.
	 *
	 * @param      AffiliateUserInfo $l AffiliateUserInfo
	 * @return     AffiliateUser The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setAffiliateUserInfo(AffiliateUserInfo $v)
	{
		$this->singleAffiliateUserInfo = $v;

		// Make sure that that the passed-in AffiliateUserInfo isn't already associated with this object
		if ($v->getAffiliateUser() === null) {
			$v->setAffiliateUser($this);
		}

		return $this;
	}

	/**
	 * Clears out the collAffiliateUserGroups collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAffiliateUserGroups()
	 */
	public function clearAffiliateUserGroups()
	{
		$this->collAffiliateUserGroups = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAffiliateUserGroups collection (array).
	 *
	 * By default this just sets the collAffiliateUserGroups collection to an empty array (like clearcollAffiliateUserGroups());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAffiliateUserGroups()
	{
		$this->collAffiliateUserGroups = array();
	}

	/**
	 * Gets an array of AffiliateUserGroup objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this AffiliateUser has previously been saved, it will retrieve
	 * related AffiliateUserGroups from storage. If this AffiliateUser is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array AffiliateUserGroup[]
	 * @throws     PropelException
	 */
	public function getAffiliateUserGroups($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliateUserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAffiliateUserGroups === null) {
			if ($this->isNew()) {
			   $this->collAffiliateUserGroups = array();
			} else {

				$criteria->add(AffiliateUserGroupPeer::USERID, $this->id);

				AffiliateUserGroupPeer::addSelectColumns($criteria);
				$this->collAffiliateUserGroups = AffiliateUserGroupPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(AffiliateUserGroupPeer::USERID, $this->id);

				AffiliateUserGroupPeer::addSelectColumns($criteria);
				if (!isset($this->lastAffiliateUserGroupCriteria) || !$this->lastAffiliateUserGroupCriteria->equals($criteria)) {
					$this->collAffiliateUserGroups = AffiliateUserGroupPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAffiliateUserGroupCriteria = $criteria;
		return $this->collAffiliateUserGroups;
	}

	/**
	 * Returns the number of related AffiliateUserGroup objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AffiliateUserGroup objects.
	 * @throws     PropelException
	 */
	public function countAffiliateUserGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliateUserPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collAffiliateUserGroups === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(AffiliateUserGroupPeer::USERID, $this->id);

				$count = AffiliateUserGroupPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(AffiliateUserGroupPeer::USERID, $this->id);

				if (!isset($this->lastAffiliateUserGroupCriteria) || !$this->lastAffiliateUserGroupCriteria->equals($criteria)) {
					$count = AffiliateUserGroupPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collAffiliateUserGroups);
				}
			} else {
				$count = count($this->collAffiliateUserGroups);
			}
		}
		$this->lastAffiliateUserGroupCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a AffiliateUserGroup object to this object
	 * through the AffiliateUserGroup foreign key attribute.
	 *
	 * @param      AffiliateUserGroup $l AffiliateUserGroup
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAffiliateUserGroup(AffiliateUserGroup $l)
	{
		if ($this->collAffiliateUserGroups === null) {
			$this->initAffiliateUserGroups();
		}
		if (!in_array($l, $this->collAffiliateUserGroups, true)) { // only add it if the **same** object is not already associated
			array_push($this->collAffiliateUserGroups, $l);
			$l->setAffiliateUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AffiliateUser is new, it will return
	 * an empty collection; or if this AffiliateUser has previously
	 * been saved, it will retrieve related AffiliateUserGroups from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AffiliateUser.
	 */
	public function getAffiliateUserGroupsJoinAffiliateGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliateUserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAffiliateUserGroups === null) {
			if ($this->isNew()) {
				$this->collAffiliateUserGroups = array();
			} else {

				$criteria->add(AffiliateUserGroupPeer::USERID, $this->id);

				$this->collAffiliateUserGroups = AffiliateUserGroupPeer::doSelectJoinAffiliateGroup($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AffiliateUserGroupPeer::USERID, $this->id);

			if (!isset($this->lastAffiliateUserGroupCriteria) || !$this->lastAffiliateUserGroupCriteria->equals($criteria)) {
				$this->collAffiliateUserGroups = AffiliateUserGroupPeer::doSelectJoinAffiliateGroup($criteria, $con, $join_behavior);
			}
		}
		$this->lastAffiliateUserGroupCriteria = $criteria;

		return $this->collAffiliateUserGroups;
	}

	/**
	 * Clears out the collClientQuotations collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClientQuotations()
	 */
	public function clearClientQuotations()
	{
		$this->collClientQuotations = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClientQuotations collection (array).
	 *
	 * By default this just sets the collClientQuotations collection to an empty array (like clearcollClientQuotations());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClientQuotations()
	{
		$this->collClientQuotations = array();
	}

	/**
	 * Gets an array of ClientQuotation objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this AffiliateUser has previously been saved, it will retrieve
	 * related ClientQuotations from storage. If this AffiliateUser is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ClientQuotation[]
	 * @throws     PropelException
	 */
	public function getClientQuotations($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliateUserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientQuotations === null) {
			if ($this->isNew()) {
			   $this->collClientQuotations = array();
			} else {

				$criteria->add(ClientQuotationPeer::USERID, $this->id);

				ClientQuotationPeer::addSelectColumns($criteria);
				$this->collClientQuotations = ClientQuotationPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ClientQuotationPeer::USERID, $this->id);

				ClientQuotationPeer::addSelectColumns($criteria);
				if (!isset($this->lastClientQuotationCriteria) || !$this->lastClientQuotationCriteria->equals($criteria)) {
					$this->collClientQuotations = ClientQuotationPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastClientQuotationCriteria = $criteria;
		return $this->collClientQuotations;
	}

	/**
	 * Returns the number of related ClientQuotation objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ClientQuotation objects.
	 * @throws     PropelException
	 */
	public function countClientQuotations(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliateUserPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collClientQuotations === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ClientQuotationPeer::USERID, $this->id);

				$count = ClientQuotationPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ClientQuotationPeer::USERID, $this->id);

				if (!isset($this->lastClientQuotationCriteria) || !$this->lastClientQuotationCriteria->equals($criteria)) {
					$count = ClientQuotationPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collClientQuotations);
				}
			} else {
				$count = count($this->collClientQuotations);
			}
		}
		$this->lastClientQuotationCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a ClientQuotation object to this object
	 * through the ClientQuotation foreign key attribute.
	 *
	 * @param      ClientQuotation $l ClientQuotation
	 * @return     void
	 * @throws     PropelException
	 */
	public function addClientQuotation(ClientQuotation $l)
	{
		if ($this->collClientQuotations === null) {
			$this->initClientQuotations();
		}
		if (!in_array($l, $this->collClientQuotations, true)) { // only add it if the **same** object is not already associated
			array_push($this->collClientQuotations, $l);
			$l->setAffiliateUser($this);
		}
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
			if ($this->singleAffiliateUserInfo) {
				$this->singleAffiliateUserInfo->clearAllReferences($deep);
			}
			if ($this->collAffiliateUserGroups) {
				foreach ((array) $this->collAffiliateUserGroups as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClientQuotations) {
				foreach ((array) $this->collClientQuotations as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->singleAffiliateUserInfo = null;
		$this->collAffiliateUserGroups = null;
		$this->collClientQuotations = null;
			$this->aAffiliateLevel = null;
			$this->aAffiliate = null;
	}

} // BaseAffiliateUser
