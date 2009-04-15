<?php

/**
 * Base class that represents a row from the 'users_user' table.
 *
 * Users
 *
 * @package    users.classes.om
 */
abstract class BaseUser extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        UserPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

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
	 * The value for the timezone field.
	 * @var        string
	 */
	protected $timezone;

	/**
	 * @var        Level
	 */
	protected $aLevel;

	/**
	 * @var        array ActionLog[] Collection to store aggregation of ActionLog objects.
	 */
	protected $collActionLogs;

	/**
	 * @var        Criteria The criteria used to select the current contents of collActionLogs.
	 */
	private $lastActionLogCriteria = null;

	/**
	 * @var        array ClientQuotation[] Collection to store aggregation of ClientQuotation objects.
	 */
	protected $collClientQuotations;

	/**
	 * @var        Criteria The criteria used to select the current contents of collClientQuotations.
	 */
	private $lastClientQuotationCriteria = null;

	/**
	 * @var        array SupplierQuotationItemComment[] Collection to store aggregation of SupplierQuotationItemComment objects.
	 */
	protected $collSupplierQuotationItemComments;

	/**
	 * @var        Criteria The criteria used to select the current contents of collSupplierQuotationItemComments.
	 */
	private $lastSupplierQuotationItemCommentCriteria = null;

	/**
	 * @var        array ClientPurchaseOrder[] Collection to store aggregation of ClientPurchaseOrder objects.
	 */
	protected $collClientPurchaseOrders;

	/**
	 * @var        Criteria The criteria used to select the current contents of collClientPurchaseOrders.
	 */
	private $lastClientPurchaseOrderCriteria = null;

	/**
	 * @var        array SupplierPurchaseOrder[] Collection to store aggregation of SupplierPurchaseOrder objects.
	 */
	protected $collSupplierPurchaseOrders;

	/**
	 * @var        Criteria The criteria used to select the current contents of collSupplierPurchaseOrders.
	 */
	private $lastSupplierPurchaseOrderCriteria = null;

	/**
	 * @var        UserInfo one-to-one related UserInfo object
	 */
	protected $singleUserInfo;

	/**
	 * @var        array UserGroup[] Collection to store aggregation of UserGroup objects.
	 */
	protected $collUserGroups;

	/**
	 * @var        Criteria The criteria used to select the current contents of collUserGroups.
	 */
	private $lastUserGroupCriteria = null;

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
	 * Initializes internal state of BaseUser object.
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
	 * Get the [timezone] column value.
	 * Timezone GMT del usuario
	 * @return     string
	 */
	public function getTimezone()
	{
		return $this->timezone;
	}

	/**
	 * Set the value of [id] column.
	 * User Id
	 * @param      int $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UserPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [username] column.
	 * username
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setUsername($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = UserPeer::USERNAME;
		}

		return $this;
	} // setUsername()

	/**
	 * Set the value of [password] column.
	 * password
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setPassword($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = UserPeer::PASSWORD;
		}

		return $this;
	} // setPassword()

	/**
	 * Set the value of [active] column.
	 * Is user active?
	 * @param      boolean $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setActive($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->active !== $v) {
			$this->active = $v;
			$this->modifiedColumns[] = UserPeer::ACTIVE;
		}

		return $this;
	} // setActive()

	/**
	 * Sets the value of [created] column to a normalized version of the date/time value specified.
	 * Creation date for
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     User The current object (for fluent API support)
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
				$this->modifiedColumns[] = UserPeer::CREATED;
			}
		} // if either are not null

		return $this;
	} // setCreated()

	/**
	 * Sets the value of [updated] column to a normalized version of the date/time value specified.
	 * Last update date
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     User The current object (for fluent API support)
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
				$this->modifiedColumns[] = UserPeer::UPDATED;
			}
		} // if either are not null

		return $this;
	} // setUpdated()

	/**
	 * Set the value of [levelid] column.
	 * User Level
	 * @param      int $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setLevelid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->levelid !== $v) {
			$this->levelid = $v;
			$this->modifiedColumns[] = UserPeer::LEVELID;
		}

		if ($this->aLevel !== null && $this->aLevel->getId() !== $v) {
			$this->aLevel = null;
		}

		return $this;
	} // setLevelid()

	/**
	 * Sets the value of [lastlogin] column to a normalized version of the date/time value specified.
	 * Fecha del ultimo login del usuario
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     User The current object (for fluent API support)
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
				$this->modifiedColumns[] = UserPeer::LASTLOGIN;
			}
		} // if either are not null

		return $this;
	} // setLastlogin()

	/**
	 * Set the value of [timezone] column.
	 * Timezone GMT del usuario
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setTimezone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->timezone !== $v) {
			$this->timezone = $v;
			$this->modifiedColumns[] = UserPeer::TIMEZONE;
		}

		return $this;
	} // setTimezone()

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
			$this->username = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->password = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->active = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
			$this->created = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->updated = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->levelid = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->lastlogin = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->timezone = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 9; // 9 = UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating User object", $e);
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

		if ($this->aLevel !== null && $this->levelid !== $this->aLevel->getId()) {
			$this->aLevel = null;
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
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = UserPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aLevel = null;
			$this->collActionLogs = null;
			$this->lastActionLogCriteria = null;

			$this->collClientQuotations = null;
			$this->lastClientQuotationCriteria = null;

			$this->collSupplierQuotationItemComments = null;
			$this->lastSupplierQuotationItemCommentCriteria = null;

			$this->collClientPurchaseOrders = null;
			$this->lastClientPurchaseOrderCriteria = null;

			$this->collSupplierPurchaseOrders = null;
			$this->lastSupplierPurchaseOrderCriteria = null;

			$this->singleUserInfo = null;

			$this->collUserGroups = null;
			$this->lastUserGroupCriteria = null;

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
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			UserPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			UserPeer::addInstanceToPool($this);
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

			if ($this->aLevel !== null) {
				if ($this->aLevel->isModified() || $this->aLevel->isNew()) {
					$affectedRows += $this->aLevel->save($con);
				}
				$this->setLevel($this->aLevel);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = UserPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UserPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += UserPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collActionLogs !== null) {
				foreach ($this->collActionLogs as $referrerFK) {
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

			if ($this->collSupplierQuotationItemComments !== null) {
				foreach ($this->collSupplierQuotationItemComments as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collClientPurchaseOrders !== null) {
				foreach ($this->collClientPurchaseOrders as $referrerFK) {
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

			if ($this->singleUserInfo !== null) {
				if (!$this->singleUserInfo->isDeleted()) {
						$affectedRows += $this->singleUserInfo->save($con);
				}
			}

			if ($this->collUserGroups !== null) {
				foreach ($this->collUserGroups as $referrerFK) {
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

			if ($this->aLevel !== null) {
				if (!$this->aLevel->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLevel->getValidationFailures());
				}
			}


			if (($retval = UserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collActionLogs !== null) {
					foreach ($this->collActionLogs as $referrerFK) {
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

				if ($this->collSupplierQuotationItemComments !== null) {
					foreach ($this->collSupplierQuotationItemComments as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClientPurchaseOrders !== null) {
					foreach ($this->collClientPurchaseOrders as $referrerFK) {
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

				if ($this->singleUserInfo !== null) {
					if (!$this->singleUserInfo->validate($columns)) {
						$failureMap = array_merge($failureMap, $this->singleUserInfo->getValidationFailures());
					}
				}

				if ($this->collUserGroups !== null) {
					foreach ($this->collUserGroups as $referrerFK) {
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
		$criteria = new Criteria(UserPeer::DATABASE_NAME);

		if ($this->isColumnModified(UserPeer::ID)) $criteria->add(UserPeer::ID, $this->id);
		if ($this->isColumnModified(UserPeer::USERNAME)) $criteria->add(UserPeer::USERNAME, $this->username);
		if ($this->isColumnModified(UserPeer::PASSWORD)) $criteria->add(UserPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(UserPeer::ACTIVE)) $criteria->add(UserPeer::ACTIVE, $this->active);
		if ($this->isColumnModified(UserPeer::CREATED)) $criteria->add(UserPeer::CREATED, $this->created);
		if ($this->isColumnModified(UserPeer::UPDATED)) $criteria->add(UserPeer::UPDATED, $this->updated);
		if ($this->isColumnModified(UserPeer::LEVELID)) $criteria->add(UserPeer::LEVELID, $this->levelid);
		if ($this->isColumnModified(UserPeer::LASTLOGIN)) $criteria->add(UserPeer::LASTLOGIN, $this->lastlogin);
		if ($this->isColumnModified(UserPeer::TIMEZONE)) $criteria->add(UserPeer::TIMEZONE, $this->timezone);

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
		$criteria = new Criteria(UserPeer::DATABASE_NAME);

		$criteria->add(UserPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of User (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setUsername($this->username);

		$copyObj->setPassword($this->password);

		$copyObj->setActive($this->active);

		$copyObj->setCreated($this->created);

		$copyObj->setUpdated($this->updated);

		$copyObj->setLevelid($this->levelid);

		$copyObj->setLastlogin($this->lastlogin);

		$copyObj->setTimezone($this->timezone);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getActionLogs() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addActionLog($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClientQuotations() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClientQuotation($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierQuotationItemComments() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierQuotationItemComment($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClientPurchaseOrders() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClientPurchaseOrder($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierPurchaseOrders() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierPurchaseOrder($relObj->copy($deepCopy));
				}
			}

			$relObj = $this->getUserInfo();
			if ($relObj) {
				$copyObj->setUserInfo($relObj->copy($deepCopy));
			}

			foreach ($this->getUserGroups() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUserGroup($relObj->copy($deepCopy));
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
	 * @return     User Clone of current object.
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
	 * @return     UserPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new UserPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Level object.
	 *
	 * @param      Level $v
	 * @return     User The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setLevel(Level $v = null)
	{
		if ($v === null) {
			$this->setLevelid(NULL);
		} else {
			$this->setLevelid($v->getId());
		}

		$this->aLevel = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Level object, it will not be re-added.
		if ($v !== null) {
			$v->addUser($this);
		}

		return $this;
	}


	/**
	 * Get the associated Level object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Level The associated Level object.
	 * @throws     PropelException
	 */
	public function getLevel(PropelPDO $con = null)
	{
		if ($this->aLevel === null && ($this->levelid !== null)) {
			$this->aLevel = LevelPeer::retrieveByPK($this->levelid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aLevel->addUsers($this);
			 */
		}
		return $this->aLevel;
	}

	/**
	 * Clears out the collActionLogs collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addActionLogs()
	 */
	public function clearActionLogs()
	{
		$this->collActionLogs = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collActionLogs collection (array).
	 *
	 * By default this just sets the collActionLogs collection to an empty array (like clearcollActionLogs());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initActionLogs()
	{
		$this->collActionLogs = array();
	}

	/**
	 * Gets an array of ActionLog objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this User has previously been saved, it will retrieve
	 * related ActionLogs from storage. If this User is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ActionLog[]
	 * @throws     PropelException
	 */
	public function getActionLogs($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActionLogs === null) {
			if ($this->isNew()) {
			   $this->collActionLogs = array();
			} else {

				$criteria->add(ActionLogPeer::USERID, $this->id);

				ActionLogPeer::addSelectColumns($criteria);
				$this->collActionLogs = ActionLogPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ActionLogPeer::USERID, $this->id);

				ActionLogPeer::addSelectColumns($criteria);
				if (!isset($this->lastActionLogCriteria) || !$this->lastActionLogCriteria->equals($criteria)) {
					$this->collActionLogs = ActionLogPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastActionLogCriteria = $criteria;
		return $this->collActionLogs;
	}

	/**
	 * Returns the number of related ActionLog objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ActionLog objects.
	 * @throws     PropelException
	 */
	public function countActionLogs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collActionLogs === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ActionLogPeer::USERID, $this->id);

				$count = ActionLogPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ActionLogPeer::USERID, $this->id);

				if (!isset($this->lastActionLogCriteria) || !$this->lastActionLogCriteria->equals($criteria)) {
					$count = ActionLogPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collActionLogs);
				}
			} else {
				$count = count($this->collActionLogs);
			}
		}
		$this->lastActionLogCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a ActionLog object to this object
	 * through the ActionLog foreign key attribute.
	 *
	 * @param      ActionLog $l ActionLog
	 * @return     void
	 * @throws     PropelException
	 */
	public function addActionLog(ActionLog $l)
	{
		if ($this->collActionLogs === null) {
			$this->initActionLogs();
		}
		if (!in_array($l, $this->collActionLogs, true)) { // only add it if the **same** object is not already associated
			array_push($this->collActionLogs, $l);
			$l->setUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related ActionLogs from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 */
	public function getActionLogsJoinSecurityAction($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActionLogs === null) {
			if ($this->isNew()) {
				$this->collActionLogs = array();
			} else {

				$criteria->add(ActionLogPeer::USERID, $this->id);

				$this->collActionLogs = ActionLogPeer::doSelectJoinSecurityAction($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ActionLogPeer::USERID, $this->id);

			if (!isset($this->lastActionLogCriteria) || !$this->lastActionLogCriteria->equals($criteria)) {
				$this->collActionLogs = ActionLogPeer::doSelectJoinSecurityAction($criteria, $con, $join_behavior);
			}
		}
		$this->lastActionLogCriteria = $criteria;

		return $this->collActionLogs;
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
	 * Otherwise if this User has previously been saved, it will retrieve
	 * related ClientQuotations from storage. If this User is new, it will return
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
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
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
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
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
			$l->setUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related ClientQuotations from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 */
	public function getClientQuotationsJoinAffiliate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
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

				$this->collClientQuotations = ClientQuotationPeer::doSelectJoinAffiliate($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientQuotationPeer::USERID, $this->id);

			if (!isset($this->lastClientQuotationCriteria) || !$this->lastClientQuotationCriteria->equals($criteria)) {
				$this->collClientQuotations = ClientQuotationPeer::doSelectJoinAffiliate($criteria, $con, $join_behavior);
			}
		}
		$this->lastClientQuotationCriteria = $criteria;

		return $this->collClientQuotations;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related ClientQuotations from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 */
	public function getClientQuotationsJoinAffiliateUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
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

				$this->collClientQuotations = ClientQuotationPeer::doSelectJoinAffiliateUser($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientQuotationPeer::USERID, $this->id);

			if (!isset($this->lastClientQuotationCriteria) || !$this->lastClientQuotationCriteria->equals($criteria)) {
				$this->collClientQuotations = ClientQuotationPeer::doSelectJoinAffiliateUser($criteria, $con, $join_behavior);
			}
		}
		$this->lastClientQuotationCriteria = $criteria;

		return $this->collClientQuotations;
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
	 * Otherwise if this User has previously been saved, it will retrieve
	 * related SupplierQuotationItemComments from storage. If this User is new, it will return
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
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotationItemComments === null) {
			if ($this->isNew()) {
			   $this->collSupplierQuotationItemComments = array();
			} else {

				$criteria->add(SupplierQuotationItemCommentPeer::USERID, $this->id);

				SupplierQuotationItemCommentPeer::addSelectColumns($criteria);
				$this->collSupplierQuotationItemComments = SupplierQuotationItemCommentPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(SupplierQuotationItemCommentPeer::USERID, $this->id);

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
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
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

				$criteria->add(SupplierQuotationItemCommentPeer::USERID, $this->id);

				$count = SupplierQuotationItemCommentPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(SupplierQuotationItemCommentPeer::USERID, $this->id);

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
			$l->setUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related SupplierQuotationItemComments from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 */
	public function getSupplierQuotationItemCommentsJoinSupplier($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotationItemComments === null) {
			if ($this->isNew()) {
				$this->collSupplierQuotationItemComments = array();
			} else {

				$criteria->add(SupplierQuotationItemCommentPeer::USERID, $this->id);

				$this->collSupplierQuotationItemComments = SupplierQuotationItemCommentPeer::doSelectJoinSupplier($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuotationItemCommentPeer::USERID, $this->id);

			if (!isset($this->lastSupplierQuotationItemCommentCriteria) || !$this->lastSupplierQuotationItemCommentCriteria->equals($criteria)) {
				$this->collSupplierQuotationItemComments = SupplierQuotationItemCommentPeer::doSelectJoinSupplier($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuotationItemCommentCriteria = $criteria;

		return $this->collSupplierQuotationItemComments;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related SupplierQuotationItemComments from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 */
	public function getSupplierQuotationItemCommentsJoinSupplierQuotationItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierQuotationItemComments === null) {
			if ($this->isNew()) {
				$this->collSupplierQuotationItemComments = array();
			} else {

				$criteria->add(SupplierQuotationItemCommentPeer::USERID, $this->id);

				$this->collSupplierQuotationItemComments = SupplierQuotationItemCommentPeer::doSelectJoinSupplierQuotationItem($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierQuotationItemCommentPeer::USERID, $this->id);

			if (!isset($this->lastSupplierQuotationItemCommentCriteria) || !$this->lastSupplierQuotationItemCommentCriteria->equals($criteria)) {
				$this->collSupplierQuotationItemComments = SupplierQuotationItemCommentPeer::doSelectJoinSupplierQuotationItem($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierQuotationItemCommentCriteria = $criteria;

		return $this->collSupplierQuotationItemComments;
	}

	/**
	 * Clears out the collClientPurchaseOrders collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClientPurchaseOrders()
	 */
	public function clearClientPurchaseOrders()
	{
		$this->collClientPurchaseOrders = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClientPurchaseOrders collection (array).
	 *
	 * By default this just sets the collClientPurchaseOrders collection to an empty array (like clearcollClientPurchaseOrders());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClientPurchaseOrders()
	{
		$this->collClientPurchaseOrders = array();
	}

	/**
	 * Gets an array of ClientPurchaseOrder objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this User has previously been saved, it will retrieve
	 * related ClientPurchaseOrders from storage. If this User is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ClientPurchaseOrder[]
	 * @throws     PropelException
	 */
	public function getClientPurchaseOrders($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientPurchaseOrders === null) {
			if ($this->isNew()) {
			   $this->collClientPurchaseOrders = array();
			} else {

				$criteria->add(ClientPurchaseOrderPeer::USERID, $this->id);

				ClientPurchaseOrderPeer::addSelectColumns($criteria);
				$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ClientPurchaseOrderPeer::USERID, $this->id);

				ClientPurchaseOrderPeer::addSelectColumns($criteria);
				if (!isset($this->lastClientPurchaseOrderCriteria) || !$this->lastClientPurchaseOrderCriteria->equals($criteria)) {
					$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastClientPurchaseOrderCriteria = $criteria;
		return $this->collClientPurchaseOrders;
	}

	/**
	 * Returns the number of related ClientPurchaseOrder objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ClientPurchaseOrder objects.
	 * @throws     PropelException
	 */
	public function countClientPurchaseOrders(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collClientPurchaseOrders === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ClientPurchaseOrderPeer::USERID, $this->id);

				$count = ClientPurchaseOrderPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ClientPurchaseOrderPeer::USERID, $this->id);

				if (!isset($this->lastClientPurchaseOrderCriteria) || !$this->lastClientPurchaseOrderCriteria->equals($criteria)) {
					$count = ClientPurchaseOrderPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collClientPurchaseOrders);
				}
			} else {
				$count = count($this->collClientPurchaseOrders);
			}
		}
		$this->lastClientPurchaseOrderCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a ClientPurchaseOrder object to this object
	 * through the ClientPurchaseOrder foreign key attribute.
	 *
	 * @param      ClientPurchaseOrder $l ClientPurchaseOrder
	 * @return     void
	 * @throws     PropelException
	 */
	public function addClientPurchaseOrder(ClientPurchaseOrder $l)
	{
		if ($this->collClientPurchaseOrders === null) {
			$this->initClientPurchaseOrders();
		}
		if (!in_array($l, $this->collClientPurchaseOrders, true)) { // only add it if the **same** object is not already associated
			array_push($this->collClientPurchaseOrders, $l);
			$l->setUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related ClientPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 */
	public function getClientPurchaseOrdersJoinClientQuotation($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collClientPurchaseOrders = array();
			} else {

				$criteria->add(ClientPurchaseOrderPeer::USERID, $this->id);

				$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelectJoinClientQuotation($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientPurchaseOrderPeer::USERID, $this->id);

			if (!isset($this->lastClientPurchaseOrderCriteria) || !$this->lastClientPurchaseOrderCriteria->equals($criteria)) {
				$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelectJoinClientQuotation($criteria, $con, $join_behavior);
			}
		}
		$this->lastClientPurchaseOrderCriteria = $criteria;

		return $this->collClientPurchaseOrders;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related ClientPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 */
	public function getClientPurchaseOrdersJoinAffiliate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collClientPurchaseOrders = array();
			} else {

				$criteria->add(ClientPurchaseOrderPeer::USERID, $this->id);

				$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelectJoinAffiliate($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientPurchaseOrderPeer::USERID, $this->id);

			if (!isset($this->lastClientPurchaseOrderCriteria) || !$this->lastClientPurchaseOrderCriteria->equals($criteria)) {
				$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelectJoinAffiliate($criteria, $con, $join_behavior);
			}
		}
		$this->lastClientPurchaseOrderCriteria = $criteria;

		return $this->collClientPurchaseOrders;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related ClientPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 */
	public function getClientPurchaseOrdersJoinAffiliateUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collClientPurchaseOrders = array();
			} else {

				$criteria->add(ClientPurchaseOrderPeer::USERID, $this->id);

				$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelectJoinAffiliateUser($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientPurchaseOrderPeer::USERID, $this->id);

			if (!isset($this->lastClientPurchaseOrderCriteria) || !$this->lastClientPurchaseOrderCriteria->equals($criteria)) {
				$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelectJoinAffiliateUser($criteria, $con, $join_behavior);
			}
		}
		$this->lastClientPurchaseOrderCriteria = $criteria;

		return $this->collClientPurchaseOrders;
	}

	/**
	 * Clears out the collSupplierPurchaseOrders collection (array).
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
	 * Initializes the collSupplierPurchaseOrders collection (array).
	 *
	 * By default this just sets the collSupplierPurchaseOrders collection to an empty array (like clearcollSupplierPurchaseOrders());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierPurchaseOrders()
	{
		$this->collSupplierPurchaseOrders = array();
	}

	/**
	 * Gets an array of SupplierPurchaseOrder objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this User has previously been saved, it will retrieve
	 * related SupplierPurchaseOrders from storage. If this User is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array SupplierPurchaseOrder[]
	 * @throws     PropelException
	 */
	public function getSupplierPurchaseOrders($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
			   $this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::USERID, $this->id);

				SupplierPurchaseOrderPeer::addSelectColumns($criteria);
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(SupplierPurchaseOrderPeer::USERID, $this->id);

				SupplierPurchaseOrderPeer::addSelectColumns($criteria);
				if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
					$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;
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
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::USERID, $this->id);

				$count = SupplierPurchaseOrderPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(SupplierPurchaseOrderPeer::USERID, $this->id);

				if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
					$count = SupplierPurchaseOrderPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collSupplierPurchaseOrders);
				}
			} else {
				$count = count($this->collSupplierPurchaseOrders);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;
		return $count;
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
		if (!in_array($l, $this->collSupplierPurchaseOrders, true)) { // only add it if the **same** object is not already associated
			array_push($this->collSupplierPurchaseOrders, $l);
			$l->setUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 */
	public function getSupplierPurchaseOrdersJoinSupplierQuotation($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::USERID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinSupplierQuotation($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::USERID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinSupplierQuotation($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;

		return $this->collSupplierPurchaseOrders;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 */
	public function getSupplierPurchaseOrdersJoinClientQuotation($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::USERID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinClientQuotation($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::USERID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinClientQuotation($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;

		return $this->collSupplierPurchaseOrders;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 */
	public function getSupplierPurchaseOrdersJoinSupplier($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::USERID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinSupplier($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::USERID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinSupplier($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;

		return $this->collSupplierPurchaseOrders;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 */
	public function getSupplierPurchaseOrdersJoinAffiliate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::USERID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinAffiliate($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::USERID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinAffiliate($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;

		return $this->collSupplierPurchaseOrders;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 */
	public function getSupplierPurchaseOrdersJoinAffiliateUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::USERID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinAffiliateUser($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::USERID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinAffiliateUser($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;

		return $this->collSupplierPurchaseOrders;
	}

	/**
	 * Gets a single UserInfo object, which is related to this object by a one-to-one relationship.
	 *
	 * @param      PropelPDO $con
	 * @return     UserInfo
	 * @throws     PropelException
	 */
	public function getUserInfo(PropelPDO $con = null)
	{

		if ($this->singleUserInfo === null && !$this->isNew()) {
			$this->singleUserInfo = UserInfoPeer::retrieveByPK($this->id, $con);
		}

		return $this->singleUserInfo;
	}

	/**
	 * Sets a single UserInfo object as related to this object by a one-to-one relationship.
	 *
	 * @param      UserInfo $l UserInfo
	 * @return     User The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUserInfo(UserInfo $v)
	{
		$this->singleUserInfo = $v;

		// Make sure that that the passed-in UserInfo isn't already associated with this object
		if ($v->getUser() === null) {
			$v->setUser($this);
		}

		return $this;
	}

	/**
	 * Clears out the collUserGroups collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUserGroups()
	 */
	public function clearUserGroups()
	{
		$this->collUserGroups = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUserGroups collection (array).
	 *
	 * By default this just sets the collUserGroups collection to an empty array (like clearcollUserGroups());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initUserGroups()
	{
		$this->collUserGroups = array();
	}

	/**
	 * Gets an array of UserGroup objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this User has previously been saved, it will retrieve
	 * related UserGroups from storage. If this User is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array UserGroup[]
	 * @throws     PropelException
	 */
	public function getUserGroups($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUserGroups === null) {
			if ($this->isNew()) {
			   $this->collUserGroups = array();
			} else {

				$criteria->add(UserGroupPeer::USERID, $this->id);

				UserGroupPeer::addSelectColumns($criteria);
				$this->collUserGroups = UserGroupPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(UserGroupPeer::USERID, $this->id);

				UserGroupPeer::addSelectColumns($criteria);
				if (!isset($this->lastUserGroupCriteria) || !$this->lastUserGroupCriteria->equals($criteria)) {
					$this->collUserGroups = UserGroupPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUserGroupCriteria = $criteria;
		return $this->collUserGroups;
	}

	/**
	 * Returns the number of related UserGroup objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related UserGroup objects.
	 * @throws     PropelException
	 */
	public function countUserGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collUserGroups === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(UserGroupPeer::USERID, $this->id);

				$count = UserGroupPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(UserGroupPeer::USERID, $this->id);

				if (!isset($this->lastUserGroupCriteria) || !$this->lastUserGroupCriteria->equals($criteria)) {
					$count = UserGroupPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collUserGroups);
				}
			} else {
				$count = count($this->collUserGroups);
			}
		}
		$this->lastUserGroupCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a UserGroup object to this object
	 * through the UserGroup foreign key attribute.
	 *
	 * @param      UserGroup $l UserGroup
	 * @return     void
	 * @throws     PropelException
	 */
	public function addUserGroup(UserGroup $l)
	{
		if ($this->collUserGroups === null) {
			$this->initUserGroups();
		}
		if (!in_array($l, $this->collUserGroups, true)) { // only add it if the **same** object is not already associated
			array_push($this->collUserGroups, $l);
			$l->setUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related UserGroups from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 */
	public function getUserGroupsJoinGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUserGroups === null) {
			if ($this->isNew()) {
				$this->collUserGroups = array();
			} else {

				$criteria->add(UserGroupPeer::USERID, $this->id);

				$this->collUserGroups = UserGroupPeer::doSelectJoinGroup($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(UserGroupPeer::USERID, $this->id);

			if (!isset($this->lastUserGroupCriteria) || !$this->lastUserGroupCriteria->equals($criteria)) {
				$this->collUserGroups = UserGroupPeer::doSelectJoinGroup($criteria, $con, $join_behavior);
			}
		}
		$this->lastUserGroupCriteria = $criteria;

		return $this->collUserGroups;
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
			if ($this->collActionLogs) {
				foreach ((array) $this->collActionLogs as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClientQuotations) {
				foreach ((array) $this->collClientQuotations as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierQuotationItemComments) {
				foreach ((array) $this->collSupplierQuotationItemComments as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClientPurchaseOrders) {
				foreach ((array) $this->collClientPurchaseOrders as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierPurchaseOrders) {
				foreach ((array) $this->collSupplierPurchaseOrders as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->singleUserInfo) {
				$this->singleUserInfo->clearAllReferences($deep);
			}
			if ($this->collUserGroups) {
				foreach ((array) $this->collUserGroups as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collActionLogs = null;
		$this->collClientQuotations = null;
		$this->collSupplierQuotationItemComments = null;
		$this->collClientPurchaseOrders = null;
		$this->collSupplierPurchaseOrders = null;
		$this->singleUserInfo = null;
		$this->collUserGroups = null;
			$this->aLevel = null;
	}

} // BaseUser
