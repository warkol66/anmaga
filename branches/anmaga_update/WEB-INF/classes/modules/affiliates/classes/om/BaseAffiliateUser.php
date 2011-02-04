<?php


/**
 * Base class that represents a row from the 'affiliates_user' table.
 *
 * Usuarios de afiliado
 *
 * @package    propel.generator.affiliates.classes.om
 */
abstract class BaseAffiliateUser extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'AffiliateUserPeer';

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
	 * The value for the passwordupdated field.
	 * @var        string
	 */
	protected $passwordupdated;

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
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the surname field.
	 * @var        string
	 */
	protected $surname;

	/**
	 * The value for the mailaddress field.
	 * @var        string
	 */
	protected $mailaddress;

	/**
	 * The value for the mailaddressalt field.
	 * @var        string
	 */
	protected $mailaddressalt;

	/**
	 * The value for the recoveryhash field.
	 * @var        string
	 */
	protected $recoveryhash;

	/**
	 * The value for the recoveryhashcreatedon field.
	 * @var        string
	 */
	protected $recoveryhashcreatedon;

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
	 * @var        AffiliateLevel
	 */
	protected $aAffiliateLevel;

	/**
	 * @var        Affiliate
	 */
	protected $aAffiliateRelatedByAffiliateid;

	/**
	 * @var        array Affiliate[] Collection to store aggregation of Affiliate objects.
	 */
	protected $collAffiliatesRelatedByOwnerid;

	/**
	 * @var        array AffiliateUserGroup[] Collection to store aggregation of AffiliateUserGroup objects.
	 */
	protected $collAffiliateUserGroups;

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
	 * @var        array AffiliateGroup[] Collection to store aggregation of AffiliateGroup objects.
	 */
	protected $collAffiliateGroups;

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
	 * Get the [optionally formatted] temporal [passwordupdated] column value.
	 * Fecha de actualizacion de la clave
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getPasswordupdated($format = '%Y/%m/%d')
	{
		if ($this->passwordupdated === null) {
			return null;
		}


		if ($this->passwordupdated === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->passwordupdated);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->passwordupdated, true), $x);
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
	 * Get the [name] column value.
	 * name
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [surname] column value.
	 * surname
	 * @return     string
	 */
	public function getSurname()
	{
		return $this->surname;
	}

	/**
	 * Get the [mailaddress] column value.
	 * Email
	 * @return     string
	 */
	public function getMailaddress()
	{
		return $this->mailaddress;
	}

	/**
	 * Get the [mailaddressalt] column value.
	 * Direccion electronica alternativa
	 * @return     string
	 */
	public function getMailaddressalt()
	{
		return $this->mailaddressalt;
	}

	/**
	 * Get the [recoveryhash] column value.
	 * Hash enviado para la recuperacion de clave
	 * @return     string
	 */
	public function getRecoveryhash()
	{
		return $this->recoveryhash;
	}

	/**
	 * Get the [optionally formatted] temporal [recoveryhashcreatedon] column value.
	 * Momento de la solicitud para la recuperacion de clave
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getRecoveryhashcreatedon($format = 'Y-m-d H:i:s')
	{
		if ($this->recoveryhashcreatedon === null) {
			return null;
		}


		if ($this->recoveryhashcreatedon === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->recoveryhashcreatedon);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->recoveryhashcreatedon, true), $x);
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

		if ($this->aAffiliateRelatedByAffiliateid !== null && $this->aAffiliateRelatedByAffiliateid->getId() !== $v) {
			$this->aAffiliateRelatedByAffiliateid = null;
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
	 * Sets the value of [passwordupdated] column to a normalized version of the date/time value specified.
	 * Fecha de actualizacion de la clave
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     AffiliateUser The current object (for fluent API support)
	 */
	public function setPasswordupdated($v)
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

		if ( $this->passwordupdated !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->passwordupdated !== null && $tmpDt = new DateTime($this->passwordupdated)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->passwordupdated = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = AffiliateUserPeer::PASSWORDUPDATED;
			}
		} // if either are not null

		return $this;
	} // setPasswordupdated()

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
	 * Set the value of [timezone] column.
	 * Timezone GMT del usuario
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
	 * Set the value of [name] column.
	 * name
	 * @param      string $v new value
	 * @return     AffiliateUser The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = AffiliateUserPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [surname] column.
	 * surname
	 * @param      string $v new value
	 * @return     AffiliateUser The current object (for fluent API support)
	 */
	public function setSurname($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->surname !== $v) {
			$this->surname = $v;
			$this->modifiedColumns[] = AffiliateUserPeer::SURNAME;
		}

		return $this;
	} // setSurname()

	/**
	 * Set the value of [mailaddress] column.
	 * Email
	 * @param      string $v new value
	 * @return     AffiliateUser The current object (for fluent API support)
	 */
	public function setMailaddress($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->mailaddress !== $v) {
			$this->mailaddress = $v;
			$this->modifiedColumns[] = AffiliateUserPeer::MAILADDRESS;
		}

		return $this;
	} // setMailaddress()

	/**
	 * Set the value of [mailaddressalt] column.
	 * Direccion electronica alternativa
	 * @param      string $v new value
	 * @return     AffiliateUser The current object (for fluent API support)
	 */
	public function setMailaddressalt($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->mailaddressalt !== $v) {
			$this->mailaddressalt = $v;
			$this->modifiedColumns[] = AffiliateUserPeer::MAILADDRESSALT;
		}

		return $this;
	} // setMailaddressalt()

	/**
	 * Set the value of [recoveryhash] column.
	 * Hash enviado para la recuperacion de clave
	 * @param      string $v new value
	 * @return     AffiliateUser The current object (for fluent API support)
	 */
	public function setRecoveryhash($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->recoveryhash !== $v) {
			$this->recoveryhash = $v;
			$this->modifiedColumns[] = AffiliateUserPeer::RECOVERYHASH;
		}

		return $this;
	} // setRecoveryhash()

	/**
	 * Sets the value of [recoveryhashcreatedon] column to a normalized version of the date/time value specified.
	 * Momento de la solicitud para la recuperacion de clave
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     AffiliateUser The current object (for fluent API support)
	 */
	public function setRecoveryhashcreatedon($v)
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

		if ( $this->recoveryhashcreatedon !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->recoveryhashcreatedon !== null && $tmpDt = new DateTime($this->recoveryhashcreatedon)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->recoveryhashcreatedon = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = AffiliateUserPeer::RECOVERYHASHCREATEDON;
			}
		} // if either are not null

		return $this;
	} // setRecoveryhashcreatedon()

	/**
	 * Sets the value of [deleted_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     AffiliateUser The current object (for fluent API support)
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
				$this->modifiedColumns[] = AffiliateUserPeer::DELETED_AT;
			}
		} // if either are not null

		return $this;
	} // setDeletedAt()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     AffiliateUser The current object (for fluent API support)
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
				$this->modifiedColumns[] = AffiliateUserPeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     AffiliateUser The current object (for fluent API support)
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
				$this->modifiedColumns[] = AffiliateUserPeer::UPDATED_AT;
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
			$this->affiliateid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->username = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->password = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->passwordupdated = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->levelid = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->lastlogin = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->timezone = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->name = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->surname = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->mailaddress = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->mailaddressalt = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->recoveryhash = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->recoveryhashcreatedon = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->deleted_at = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->created_at = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->updated_at = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 17; // 17 = AffiliateUserPeer::NUM_COLUMNS - AffiliateUserPeer::NUM_LAZY_LOAD_COLUMNS).

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

		if ($this->aAffiliateRelatedByAffiliateid !== null && $this->affiliateid !== $this->aAffiliateRelatedByAffiliateid->getId()) {
			$this->aAffiliateRelatedByAffiliateid = null;
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
			$this->aAffiliateRelatedByAffiliateid = null;
			$this->collAffiliatesRelatedByOwnerid = null;

			$this->collAffiliateUserGroups = null;

			$this->collOrders = null;

			$this->collOrderStateChanges = null;

			$this->collOrderTemplates = null;

			$this->collAffiliateGroups = null;
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
			$ret = $this->preDelete($con);
			// soft_delete behavior
			if (!empty($ret) && AffiliateUserQuery::isSoftDeleteEnabled()) {
				$this->setDeletedAt(time());
				$this->save($con);
				$con->commit();
				AffiliateUserPeer::removeInstanceFromPool($this);
				return;
			}
			if ($ret) {
				AffiliateUserQuery::create()
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
			$con = Propel::getConnection(AffiliateUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// timestampable behavior
				if (!$this->isColumnModified(AffiliateUserPeer::CREATED_AT)) {
					$this->setCreatedAt(time());
				}
				if (!$this->isColumnModified(AffiliateUserPeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
			} else {
				$ret = $ret && $this->preUpdate($con);
				// timestampable behavior
				if ($this->isModified() && !$this->isColumnModified(AffiliateUserPeer::UPDATED_AT)) {
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
				AffiliateUserPeer::addInstanceToPool($this);
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

			if ($this->aAffiliateLevel !== null) {
				if ($this->aAffiliateLevel->isModified() || $this->aAffiliateLevel->isNew()) {
					$affectedRows += $this->aAffiliateLevel->save($con);
				}
				$this->setAffiliateLevel($this->aAffiliateLevel);
			}

			if ($this->aAffiliateRelatedByAffiliateid !== null) {
				if ($this->aAffiliateRelatedByAffiliateid->isModified() || $this->aAffiliateRelatedByAffiliateid->isNew()) {
					$affectedRows += $this->aAffiliateRelatedByAffiliateid->save($con);
				}
				$this->setAffiliateRelatedByAffiliateid($this->aAffiliateRelatedByAffiliateid);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = AffiliateUserPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(AffiliateUserPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.AffiliateUserPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += AffiliateUserPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collAffiliatesRelatedByOwnerid !== null) {
				foreach ($this->collAffiliatesRelatedByOwnerid as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAffiliateUserGroups !== null) {
				foreach ($this->collAffiliateUserGroups as $referrerFK) {
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

			if ($this->aAffiliateLevel !== null) {
				if (!$this->aAffiliateLevel->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAffiliateLevel->getValidationFailures());
				}
			}

			if ($this->aAffiliateRelatedByAffiliateid !== null) {
				if (!$this->aAffiliateRelatedByAffiliateid->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAffiliateRelatedByAffiliateid->getValidationFailures());
				}
			}


			if (($retval = AffiliateUserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAffiliatesRelatedByOwnerid !== null) {
					foreach ($this->collAffiliatesRelatedByOwnerid as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAffiliateUserGroups !== null) {
					foreach ($this->collAffiliateUserGroups as $referrerFK) {
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
		$pos = AffiliateUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getAffiliateid();
				break;
			case 2:
				return $this->getUsername();
				break;
			case 3:
				return $this->getPassword();
				break;
			case 4:
				return $this->getPasswordupdated();
				break;
			case 5:
				return $this->getLevelid();
				break;
			case 6:
				return $this->getLastlogin();
				break;
			case 7:
				return $this->getTimezone();
				break;
			case 8:
				return $this->getName();
				break;
			case 9:
				return $this->getSurname();
				break;
			case 10:
				return $this->getMailaddress();
				break;
			case 11:
				return $this->getMailaddressalt();
				break;
			case 12:
				return $this->getRecoveryhash();
				break;
			case 13:
				return $this->getRecoveryhashcreatedon();
				break;
			case 14:
				return $this->getDeletedAt();
				break;
			case 15:
				return $this->getCreatedAt();
				break;
			case 16:
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
		$keys = AffiliateUserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getAffiliateid(),
			$keys[2] => $this->getUsername(),
			$keys[3] => $this->getPassword(),
			$keys[4] => $this->getPasswordupdated(),
			$keys[5] => $this->getLevelid(),
			$keys[6] => $this->getLastlogin(),
			$keys[7] => $this->getTimezone(),
			$keys[8] => $this->getName(),
			$keys[9] => $this->getSurname(),
			$keys[10] => $this->getMailaddress(),
			$keys[11] => $this->getMailaddressalt(),
			$keys[12] => $this->getRecoveryhash(),
			$keys[13] => $this->getRecoveryhashcreatedon(),
			$keys[14] => $this->getDeletedAt(),
			$keys[15] => $this->getCreatedAt(),
			$keys[16] => $this->getUpdatedAt(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aAffiliateLevel) {
				$result['AffiliateLevel'] = $this->aAffiliateLevel->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aAffiliateRelatedByAffiliateid) {
				$result['AffiliateRelatedByAffiliateid'] = $this->aAffiliateRelatedByAffiliateid->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = AffiliateUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setAffiliateid($value);
				break;
			case 2:
				$this->setUsername($value);
				break;
			case 3:
				$this->setPassword($value);
				break;
			case 4:
				$this->setPasswordupdated($value);
				break;
			case 5:
				$this->setLevelid($value);
				break;
			case 6:
				$this->setLastlogin($value);
				break;
			case 7:
				$this->setTimezone($value);
				break;
			case 8:
				$this->setName($value);
				break;
			case 9:
				$this->setSurname($value);
				break;
			case 10:
				$this->setMailaddress($value);
				break;
			case 11:
				$this->setMailaddressalt($value);
				break;
			case 12:
				$this->setRecoveryhash($value);
				break;
			case 13:
				$this->setRecoveryhashcreatedon($value);
				break;
			case 14:
				$this->setDeletedAt($value);
				break;
			case 15:
				$this->setCreatedAt($value);
				break;
			case 16:
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
		$keys = AffiliateUserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAffiliateid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUsername($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPassword($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPasswordupdated($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setLevelid($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLastlogin($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTimezone($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setName($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSurname($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMailaddress($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMailaddressalt($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setRecoveryhash($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setRecoveryhashcreatedon($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDeletedAt($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCreatedAt($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setUpdatedAt($arr[$keys[16]]);
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
		if ($this->isColumnModified(AffiliateUserPeer::PASSWORDUPDATED)) $criteria->add(AffiliateUserPeer::PASSWORDUPDATED, $this->passwordupdated);
		if ($this->isColumnModified(AffiliateUserPeer::LEVELID)) $criteria->add(AffiliateUserPeer::LEVELID, $this->levelid);
		if ($this->isColumnModified(AffiliateUserPeer::LASTLOGIN)) $criteria->add(AffiliateUserPeer::LASTLOGIN, $this->lastlogin);
		if ($this->isColumnModified(AffiliateUserPeer::TIMEZONE)) $criteria->add(AffiliateUserPeer::TIMEZONE, $this->timezone);
		if ($this->isColumnModified(AffiliateUserPeer::NAME)) $criteria->add(AffiliateUserPeer::NAME, $this->name);
		if ($this->isColumnModified(AffiliateUserPeer::SURNAME)) $criteria->add(AffiliateUserPeer::SURNAME, $this->surname);
		if ($this->isColumnModified(AffiliateUserPeer::MAILADDRESS)) $criteria->add(AffiliateUserPeer::MAILADDRESS, $this->mailaddress);
		if ($this->isColumnModified(AffiliateUserPeer::MAILADDRESSALT)) $criteria->add(AffiliateUserPeer::MAILADDRESSALT, $this->mailaddressalt);
		if ($this->isColumnModified(AffiliateUserPeer::RECOVERYHASH)) $criteria->add(AffiliateUserPeer::RECOVERYHASH, $this->recoveryhash);
		if ($this->isColumnModified(AffiliateUserPeer::RECOVERYHASHCREATEDON)) $criteria->add(AffiliateUserPeer::RECOVERYHASHCREATEDON, $this->recoveryhashcreatedon);
		if ($this->isColumnModified(AffiliateUserPeer::DELETED_AT)) $criteria->add(AffiliateUserPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(AffiliateUserPeer::CREATED_AT)) $criteria->add(AffiliateUserPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(AffiliateUserPeer::UPDATED_AT)) $criteria->add(AffiliateUserPeer::UPDATED_AT, $this->updated_at);

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
	 * @param      object $copyObj An object of AffiliateUser (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setAffiliateid($this->affiliateid);
		$copyObj->setUsername($this->username);
		$copyObj->setPassword($this->password);
		$copyObj->setPasswordupdated($this->passwordupdated);
		$copyObj->setLevelid($this->levelid);
		$copyObj->setLastlogin($this->lastlogin);
		$copyObj->setTimezone($this->timezone);
		$copyObj->setName($this->name);
		$copyObj->setSurname($this->surname);
		$copyObj->setMailaddress($this->mailaddress);
		$copyObj->setMailaddressalt($this->mailaddressalt);
		$copyObj->setRecoveryhash($this->recoveryhash);
		$copyObj->setRecoveryhashcreatedon($this->recoveryhashcreatedon);
		$copyObj->setDeletedAt($this->deleted_at);
		$copyObj->setCreatedAt($this->created_at);
		$copyObj->setUpdatedAt($this->updated_at);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getAffiliatesRelatedByOwnerid() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAffiliateRelatedByOwnerid($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAffiliateUserGroups() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAffiliateUserGroup($relObj->copy($deepCopy));
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
			$this->aAffiliateLevel = AffiliateLevelQuery::create()->findPk($this->levelid, $con);
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
	public function setAffiliateRelatedByAffiliateid(Affiliate $v = null)
	{
		if ($v === null) {
			$this->setAffiliateid(NULL);
		} else {
			$this->setAffiliateid($v->getId());
		}

		$this->aAffiliateRelatedByAffiliateid = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Affiliate object, it will not be re-added.
		if ($v !== null) {
			$v->addAffiliateUserRelatedByAffiliateid($this);
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
	public function getAffiliateRelatedByAffiliateid(PropelPDO $con = null)
	{
		if ($this->aAffiliateRelatedByAffiliateid === null && ($this->affiliateid !== null)) {
			$this->aAffiliateRelatedByAffiliateid = AffiliateQuery::create()->findPk($this->affiliateid, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aAffiliateRelatedByAffiliateid->addAffiliateUsersRelatedByAffiliateid($this);
			 */
		}
		return $this->aAffiliateRelatedByAffiliateid;
	}

	/**
	 * Clears out the collAffiliatesRelatedByOwnerid collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAffiliatesRelatedByOwnerid()
	 */
	public function clearAffiliatesRelatedByOwnerid()
	{
		$this->collAffiliatesRelatedByOwnerid = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAffiliatesRelatedByOwnerid collection.
	 *
	 * By default this just sets the collAffiliatesRelatedByOwnerid collection to an empty array (like clearcollAffiliatesRelatedByOwnerid());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAffiliatesRelatedByOwnerid()
	{
		$this->collAffiliatesRelatedByOwnerid = new PropelObjectCollection();
		$this->collAffiliatesRelatedByOwnerid->setModel('Affiliate');
	}

	/**
	 * Gets an array of Affiliate objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this AffiliateUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Affiliate[] List of Affiliate objects
	 * @throws     PropelException
	 */
	public function getAffiliatesRelatedByOwnerid($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAffiliatesRelatedByOwnerid || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliatesRelatedByOwnerid) {
				// return empty collection
				$this->initAffiliatesRelatedByOwnerid();
			} else {
				$collAffiliatesRelatedByOwnerid = AffiliateQuery::create(null, $criteria)
					->filterByAffiliateUserRelatedByOwnerid($this)
					->find($con);
				if (null !== $criteria) {
					return $collAffiliatesRelatedByOwnerid;
				}
				$this->collAffiliatesRelatedByOwnerid = $collAffiliatesRelatedByOwnerid;
			}
		}
		return $this->collAffiliatesRelatedByOwnerid;
	}

	/**
	 * Returns the number of related Affiliate objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Affiliate objects.
	 * @throws     PropelException
	 */
	public function countAffiliatesRelatedByOwnerid(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAffiliatesRelatedByOwnerid || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliatesRelatedByOwnerid) {
				return 0;
			} else {
				$query = AffiliateQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliateUserRelatedByOwnerid($this)
					->count($con);
			}
		} else {
			return count($this->collAffiliatesRelatedByOwnerid);
		}
	}

	/**
	 * Method called to associate a Affiliate object to this object
	 * through the Affiliate foreign key attribute.
	 *
	 * @param      Affiliate $l Affiliate
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAffiliateRelatedByOwnerid(Affiliate $l)
	{
		if ($this->collAffiliatesRelatedByOwnerid === null) {
			$this->initAffiliatesRelatedByOwnerid();
		}
		if (!$this->collAffiliatesRelatedByOwnerid->contains($l)) { // only add it if the **same** object is not already associated
			$this->collAffiliatesRelatedByOwnerid[]= $l;
			$l->setAffiliateUserRelatedByOwnerid($this);
		}
	}

	/**
	 * Clears out the collAffiliateUserGroups collection
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
	 * Initializes the collAffiliateUserGroups collection.
	 *
	 * By default this just sets the collAffiliateUserGroups collection to an empty array (like clearcollAffiliateUserGroups());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAffiliateUserGroups()
	{
		$this->collAffiliateUserGroups = new PropelObjectCollection();
		$this->collAffiliateUserGroups->setModel('AffiliateUserGroup');
	}

	/**
	 * Gets an array of AffiliateUserGroup objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this AffiliateUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AffiliateUserGroup[] List of AffiliateUserGroup objects
	 * @throws     PropelException
	 */
	public function getAffiliateUserGroups($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateUserGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateUserGroups) {
				// return empty collection
				$this->initAffiliateUserGroups();
			} else {
				$collAffiliateUserGroups = AffiliateUserGroupQuery::create(null, $criteria)
					->filterByAffiliateUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collAffiliateUserGroups;
				}
				$this->collAffiliateUserGroups = $collAffiliateUserGroups;
			}
		}
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
		if(null === $this->collAffiliateUserGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateUserGroups) {
				return 0;
			} else {
				$query = AffiliateUserGroupQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliateUser($this)
					->count($con);
			}
		} else {
			return count($this->collAffiliateUserGroups);
		}
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
		if (!$this->collAffiliateUserGroups->contains($l)) { // only add it if the **same** object is not already associated
			$this->collAffiliateUserGroups[]= $l;
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
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array AffiliateUserGroup[] List of AffiliateUserGroup objects
	 */
	public function getAffiliateUserGroupsJoinAffiliateGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AffiliateUserGroupQuery::create(null, $criteria);
		$query->joinWith('AffiliateGroup', $join_behavior);

		return $this->getAffiliateUserGroups($query, $con);
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
	 * If this AffiliateUser is new, it will return
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
					->filterByAffiliateUser($this)
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
					->filterByAffiliateUser($this)
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
			$l->setAffiliateUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AffiliateUser is new, it will return
	 * an empty collection; or if this AffiliateUser has previously
	 * been saved, it will retrieve related Orders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AffiliateUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Order[] List of Order objects
	 */
	public function getOrdersJoinAffiliate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = OrderQuery::create(null, $criteria);
		$query->joinWith('Affiliate', $join_behavior);

		return $this->getOrders($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AffiliateUser is new, it will return
	 * an empty collection; or if this AffiliateUser has previously
	 * been saved, it will retrieve related Orders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AffiliateUser.
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
	 * If this AffiliateUser is new, it will return
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
					->filterByAffiliateUser($this)
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
					->filterByAffiliateUser($this)
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
			$l->setAffiliateUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AffiliateUser is new, it will return
	 * an empty collection; or if this AffiliateUser has previously
	 * been saved, it will retrieve related OrderStateChanges from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AffiliateUser.
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
	 * Otherwise if this AffiliateUser is new, it will return
	 * an empty collection; or if this AffiliateUser has previously
	 * been saved, it will retrieve related OrderStateChanges from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AffiliateUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array OrderStateChange[] List of OrderStateChange objects
	 */
	public function getOrderStateChangesJoinAffiliate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = OrderStateChangeQuery::create(null, $criteria);
		$query->joinWith('Affiliate', $join_behavior);

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
	 * If this AffiliateUser is new, it will return
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
					->filterByAffiliateUser($this)
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
					->filterByAffiliateUser($this)
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
			$l->setAffiliateUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AffiliateUser is new, it will return
	 * an empty collection; or if this AffiliateUser has previously
	 * been saved, it will retrieve related OrderTemplates from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AffiliateUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array OrderTemplate[] List of OrderTemplate objects
	 */
	public function getOrderTemplatesJoinAffiliate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = OrderTemplateQuery::create(null, $criteria);
		$query->joinWith('Affiliate', $join_behavior);

		return $this->getOrderTemplates($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AffiliateUser is new, it will return
	 * an empty collection; or if this AffiliateUser has previously
	 * been saved, it will retrieve related OrderTemplates from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AffiliateUser.
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
	 * Clears out the collAffiliateGroups collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAffiliateGroups()
	 */
	public function clearAffiliateGroups()
	{
		$this->collAffiliateGroups = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAffiliateGroups collection.
	 *
	 * By default this just sets the collAffiliateGroups collection to an empty collection (like clearAffiliateGroups());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAffiliateGroups()
	{
		$this->collAffiliateGroups = new PropelObjectCollection();
		$this->collAffiliateGroups->setModel('AffiliateGroup');
	}

	/**
	 * Gets a collection of AffiliateGroup objects related by a many-to-many relationship
	 * to the current object by way of the affiliates_userGroup cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this AffiliateUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array AffiliateGroup[] List of AffiliateGroup objects
	 */
	public function getAffiliateGroups($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateGroups) {
				// return empty collection
				$this->initAffiliateGroups();
			} else {
				$collAffiliateGroups = AffiliateGroupQuery::create(null, $criteria)
					->filterByAffiliateUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collAffiliateGroups;
				}
				$this->collAffiliateGroups = $collAffiliateGroups;
			}
		}
		return $this->collAffiliateGroups;
	}

	/**
	 * Gets the number of AffiliateGroup objects related by a many-to-many relationship
	 * to the current object by way of the affiliates_userGroup cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related AffiliateGroup objects
	 */
	public function countAffiliateGroups($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAffiliateGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collAffiliateGroups) {
				return 0;
			} else {
				$query = AffiliateGroupQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAffiliateUser($this)
					->count($con);
			}
		} else {
			return count($this->collAffiliateGroups);
		}
	}

	/**
	 * Associate a AffiliateGroup object to this object
	 * through the affiliates_userGroup cross reference table.
	 *
	 * @param      AffiliateGroup $affiliateGroup The AffiliateUserGroup object to relate
	 * @return     void
	 */
	public function addAffiliateGroup($affiliateGroup)
	{
		if ($this->collAffiliateGroups === null) {
			$this->initAffiliateGroups();
		}
		if (!$this->collAffiliateGroups->contains($affiliateGroup)) { // only add it if the **same** object is not already associated
			$affiliateUserGroup = new AffiliateUserGroup();
			$affiliateUserGroup->setAffiliateGroup($affiliateGroup);
			$this->addAffiliateUserGroup($affiliateUserGroup);

			$this->collAffiliateGroups[]= $affiliateGroup;
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->affiliateid = null;
		$this->username = null;
		$this->password = null;
		$this->passwordupdated = null;
		$this->levelid = null;
		$this->lastlogin = null;
		$this->timezone = null;
		$this->name = null;
		$this->surname = null;
		$this->mailaddress = null;
		$this->mailaddressalt = null;
		$this->recoveryhash = null;
		$this->recoveryhashcreatedon = null;
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
			if ($this->collAffiliatesRelatedByOwnerid) {
				foreach ((array) $this->collAffiliatesRelatedByOwnerid as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAffiliateUserGroups) {
				foreach ((array) $this->collAffiliateUserGroups as $o) {
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

		$this->collAffiliatesRelatedByOwnerid = null;
		$this->collAffiliateUserGroups = null;
		$this->collOrders = null;
		$this->collOrderStateChanges = null;
		$this->collOrderTemplates = null;
		$this->aAffiliateLevel = null;
		$this->aAffiliateRelatedByAffiliateid = null;
	}

	// soft_delete behavior
	
	/**
	 * Bypass the soft_delete behavior and force a hard delete of the current object
	 */
	public function forceDelete(PropelPDO $con = null)
	{
		AffiliateUserPeer::disableSoftDelete();
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
	 * @return     AffiliateUser The current object (for fluent API support)
	 */
	public function keepUpdateDateUnchanged()
	{
		$this->modifiedColumns[] = AffiliateUserPeer::UPDATED_AT;
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

} // BaseAffiliateUser
