<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'anmaga/UserPeer.php';

/**
 * Base class that represents a row from the 'users_user' table.
 *
 * Users
 *
 * This class was autogenerated by Propel on:
 *
 * 09/03/07 20:26:16
 *
 * @package    anmaga.om
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
	 * @var        int
	 */
	protected $created;


	/**
	 * The value for the updated field.
	 * @var        int
	 */
	protected $updated;


	/**
	 * The value for the levelid field.
	 * @var        int
	 */
	protected $levelid;


	/**
	 * The value for the lastlogin field.
	 * @var        int
	 */
	protected $lastlogin;

	/**
	 * @var        UserInfo
	 */
	protected $aUserInfo;

	/**
	 * @var        Level
	 */
	protected $aLevel;

	/**
	 * Collection to store aggregation of collUserInfos.
	 * @var        array
	 */
	protected $collUserInfos;

	/**
	 * The criteria used to select the current contents of collUserInfos.
	 * @var        Criteria
	 */
	protected $lastUserInfoCriteria = null;

	/**
	 * Collection to store aggregation of collUserGroups.
	 * @var        array
	 */
	protected $collUserGroups;

	/**
	 * The criteria used to select the current contents of collUserGroups.
	 * @var        Criteria
	 */
	protected $lastUserGroupCriteria = null;

	/**
	 * Collection to store aggregation of collActionLogs.
	 * @var        array
	 */
	protected $collActionLogs;

	/**
	 * The criteria used to select the current contents of collActionLogs.
	 * @var        Criteria
	 */
	protected $lastActionLogCriteria = null;

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
	 * Get the [optionally formatted] [created] column value.
	 * Creation date for
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the integer unix timestamp will be returned.
	 * @return     mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
	 * @throws     PropelException - if unable to convert the date/time to timestamp.
	 */
	public function getCreated($format = 'Y-m-d H:i:s')
	{

		if ($this->created === null || $this->created === '') {
			return null;
		} elseif (!is_int($this->created)) {
			// a non-timestamp value was set externally, so we convert it
			$ts = strtotime($this->created);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse value of [created] as date/time value: " . var_export($this->created, true));
			}
		} else {
			$ts = $this->created;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	/**
	 * Get the [optionally formatted] [updated] column value.
	 * Last update date
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the integer unix timestamp will be returned.
	 * @return     mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
	 * @throws     PropelException - if unable to convert the date/time to timestamp.
	 */
	public function getUpdated($format = 'Y-m-d H:i:s')
	{

		if ($this->updated === null || $this->updated === '') {
			return null;
		} elseif (!is_int($this->updated)) {
			// a non-timestamp value was set externally, so we convert it
			$ts = strtotime($this->updated);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse value of [updated] as date/time value: " . var_export($this->updated, true));
			}
		} else {
			$ts = $this->updated;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
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
	 * Get the [optionally formatted] [lastlogin] column value.
	 * Fecha del ultimo login del usuario
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the integer unix timestamp will be returned.
	 * @return     mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
	 * @throws     PropelException - if unable to convert the date/time to timestamp.
	 */
	public function getLastlogin($format = 'Y-m-d H:i:s')
	{

		if ($this->lastlogin === null || $this->lastlogin === '') {
			return null;
		} elseif (!is_int($this->lastlogin)) {
			// a non-timestamp value was set externally, so we convert it
			$ts = strtotime($this->lastlogin);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse value of [lastlogin] as date/time value: " . var_export($this->lastlogin, true));
			}
		} else {
			$ts = $this->lastlogin;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	/**
	 * Set the value of [id] column.
	 * User Id
	 * @param      int $v new value
	 * @return     void
	 */
	public function setId($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UserPeer::ID;
		}

		if ($this->aUserInfo !== null && $this->aUserInfo->getUserid() !== $v) {
			$this->aUserInfo = null;
		}

	} // setId()

	/**
	 * Set the value of [username] column.
	 * username
	 * @param      string $v new value
	 * @return     void
	 */
	public function setUsername($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = UserPeer::USERNAME;
		}

	} // setUsername()

	/**
	 * Set the value of [password] column.
	 * password
	 * @param      string $v new value
	 * @return     void
	 */
	public function setPassword($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = UserPeer::PASSWORD;
		}

	} // setPassword()

	/**
	 * Set the value of [active] column.
	 * Is user active?
	 * @param      boolean $v new value
	 * @return     void
	 */
	public function setActive($v)
	{

		if ($this->active !== $v) {
			$this->active = $v;
			$this->modifiedColumns[] = UserPeer::ACTIVE;
		}

	} // setActive()

	/**
	 * Set the value of [created] column.
	 * Creation date for
	 * @param      int $v new value
	 * @return     void
	 */
	public function setCreated($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse date/time value for [created] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created !== $ts) {
			$this->created = $ts;
			$this->modifiedColumns[] = UserPeer::CREATED;
		}

	} // setCreated()

	/**
	 * Set the value of [updated] column.
	 * Last update date
	 * @param      int $v new value
	 * @return     void
	 */
	public function setUpdated($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse date/time value for [updated] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated !== $ts) {
			$this->updated = $ts;
			$this->modifiedColumns[] = UserPeer::UPDATED;
		}

	} // setUpdated()

	/**
	 * Set the value of [levelid] column.
	 * User Level
	 * @param      int $v new value
	 * @return     void
	 */
	public function setLevelid($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->levelid !== $v) {
			$this->levelid = $v;
			$this->modifiedColumns[] = UserPeer::LEVELID;
		}

		if ($this->aLevel !== null && $this->aLevel->getId() !== $v) {
			$this->aLevel = null;
		}

	} // setLevelid()

	/**
	 * Set the value of [lastlogin] column.
	 * Fecha del ultimo login del usuario
	 * @param      int $v new value
	 * @return     void
	 */
	public function setLastlogin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse date/time value for [lastlogin] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->lastlogin !== $ts) {
			$this->lastlogin = $ts;
			$this->modifiedColumns[] = UserPeer::LASTLOGIN;
		}

	} // setLastlogin()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (1-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      ResultSet $rs The ResultSet class with cursor advanced to desired record pos.
	 * @param      int $startcol 1-based offset column which indicates which restultset column to start with.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->username = $rs->getString($startcol + 1);

			$this->password = $rs->getString($startcol + 2);

			$this->active = $rs->getBoolean($startcol + 3);

			$this->created = $rs->getTimestamp($startcol + 4, null);

			$this->updated = $rs->getTimestamp($startcol + 5, null);

			$this->levelid = $rs->getInt($startcol + 6);

			$this->lastlogin = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 8; // 8 = UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating User object", $e);
		}
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      Connection $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			UserPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	/**
	 * Stores the object in the database.  If the object is new,
	 * it inserts it; otherwise an update is performed.  This method
	 * wraps the doSave() worker method in a transaction.
	 *
	 * @param      Connection $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	/**
	 * Stores the object in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      Connection $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave($con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aUserInfo !== null) {
				if ($this->aUserInfo->isModified()) {
					$affectedRows += $this->aUserInfo->save($con);
				}
				$this->setUserInfo($this->aUserInfo);
			}

			if ($this->aLevel !== null) {
				if ($this->aLevel->isModified()) {
					$affectedRows += $this->aLevel->save($con);
				}
				$this->setLevel($this->aLevel);
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

			if ($this->collUserInfos !== null) {
				foreach($this->collUserInfos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUserGroups !== null) {
				foreach($this->collUserGroups as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collActionLogs !== null) {
				foreach($this->collActionLogs as $referrerFK) {
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

			if ($this->aUserInfo !== null) {
				if (!$this->aUserInfo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUserInfo->getValidationFailures());
				}
			}

			if ($this->aLevel !== null) {
				if (!$this->aLevel->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLevel->getValidationFailures());
				}
			}


			if (($retval = UserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collUserInfos !== null) {
					foreach($this->collUserInfos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUserGroups !== null) {
					foreach($this->collUserGroups as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collActionLogs !== null) {
					foreach($this->collActionLogs as $referrerFK) {
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


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getUserInfos() as $relObj) {
				$copyObj->addUserInfo($relObj->copy($deepCopy));
			}

			foreach($this->getUserGroups() as $relObj) {
				$copyObj->addUserGroup($relObj->copy($deepCopy));
			}

			foreach($this->getActionLogs() as $relObj) {
				$copyObj->addActionLog($relObj->copy($deepCopy));
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);

		$copyObj->setId(NULL); // this is a pkey column, so set to default value

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
	 * Declares an association between this object and a UserInfo object.
	 *
	 * @param      UserInfo $v
	 * @return     void
	 * @throws     PropelException
	 */
	public function setUserInfo($v)
	{


		if ($v === null) {
			$this->setId(NULL);
		} else {
			$this->setId($v->getUserid());
		}


		$this->aUserInfo = $v;
	}


	/**
	 * Get the associated UserInfo object
	 *
	 * @param      Connection Optional Connection object.
	 * @return     UserInfo The associated UserInfo object.
	 * @throws     PropelException
	 */
	public function getUserInfo($con = null)
	{
		// include the related Peer class
		include_once 'anmaga/om/BaseUserInfoPeer.php';

		if ($this->aUserInfo === null && ($this->id !== null)) {

			$this->aUserInfo = UserInfoPeer::retrieveByPK($this->id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = UserInfoPeer::retrieveByPK($this->id, $con);
			   $obj->addUserInfos($this);
			 */
		}
		return $this->aUserInfo;
	}

	/**
	 * Declares an association between this object and a Level object.
	 *
	 * @param      Level $v
	 * @return     void
	 * @throws     PropelException
	 */
	public function setLevel($v)
	{


		if ($v === null) {
			$this->setLevelid(NULL);
		} else {
			$this->setLevelid($v->getId());
		}


		$this->aLevel = $v;
	}


	/**
	 * Get the associated Level object
	 *
	 * @param      Connection Optional Connection object.
	 * @return     Level The associated Level object.
	 * @throws     PropelException
	 */
	public function getLevel($con = null)
	{
		// include the related Peer class
		include_once 'anmaga/om/BaseLevelPeer.php';

		if ($this->aLevel === null && ($this->levelid !== null)) {

			$this->aLevel = LevelPeer::retrieveByPK($this->levelid, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = LevelPeer::retrieveByPK($this->levelid, $con);
			   $obj->addLevels($this);
			 */
		}
		return $this->aLevel;
	}

	/**
	 * Temporary storage of collUserInfos to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return     void
	 */
	public function initUserInfos()
	{
		if ($this->collUserInfos === null) {
			$this->collUserInfos = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User has previously
	 * been saved, it will retrieve related UserInfos from storage.
	 * If this User is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param      Connection $con
	 * @param      Criteria $criteria
	 * @throws     PropelException
	 */
	public function getUserInfos($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseUserInfoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUserInfos === null) {
			if ($this->isNew()) {
			   $this->collUserInfos = array();
			} else {

				$criteria->add(UserInfoPeer::USERID, $this->getId());

				UserInfoPeer::addSelectColumns($criteria);
				$this->collUserInfos = UserInfoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(UserInfoPeer::USERID, $this->getId());

				UserInfoPeer::addSelectColumns($criteria);
				if (!isset($this->lastUserInfoCriteria) || !$this->lastUserInfoCriteria->equals($criteria)) {
					$this->collUserInfos = UserInfoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUserInfoCriteria = $criteria;
		return $this->collUserInfos;
	}

	/**
	 * Returns the number of related UserInfos.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      Connection $con
	 * @throws     PropelException
	 */
	public function countUserInfos($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseUserInfoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(UserInfoPeer::USERID, $this->getId());

		return UserInfoPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a UserInfo object to this object
	 * through the UserInfo foreign key attribute
	 *
	 * @param      UserInfo $l UserInfo
	 * @return     void
	 * @throws     PropelException
	 */
	public function addUserInfo(UserInfo $l)
	{
		$this->collUserInfos[] = $l;
		$l->setUser($this);
	}

	/**
	 * Temporary storage of collUserGroups to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return     void
	 */
	public function initUserGroups()
	{
		if ($this->collUserGroups === null) {
			$this->collUserGroups = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User has previously
	 * been saved, it will retrieve related UserGroups from storage.
	 * If this User is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param      Connection $con
	 * @param      Criteria $criteria
	 * @throws     PropelException
	 */
	public function getUserGroups($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseUserGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUserGroups === null) {
			if ($this->isNew()) {
			   $this->collUserGroups = array();
			} else {

				$criteria->add(UserGroupPeer::USERID, $this->getId());

				UserGroupPeer::addSelectColumns($criteria);
				$this->collUserGroups = UserGroupPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(UserGroupPeer::USERID, $this->getId());

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
	 * Returns the number of related UserGroups.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      Connection $con
	 * @throws     PropelException
	 */
	public function countUserGroups($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseUserGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(UserGroupPeer::USERID, $this->getId());

		return UserGroupPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a UserGroup object to this object
	 * through the UserGroup foreign key attribute
	 *
	 * @param      UserGroup $l UserGroup
	 * @return     void
	 * @throws     PropelException
	 */
	public function addUserGroup(UserGroup $l)
	{
		$this->collUserGroups[] = $l;
		$l->setUser($this);
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
	public function getUserGroupsJoinGroup($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseUserGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUserGroups === null) {
			if ($this->isNew()) {
				$this->collUserGroups = array();
			} else {

				$criteria->add(UserGroupPeer::USERID, $this->getId());

				$this->collUserGroups = UserGroupPeer::doSelectJoinGroup($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(UserGroupPeer::USERID, $this->getId());

			if (!isset($this->lastUserGroupCriteria) || !$this->lastUserGroupCriteria->equals($criteria)) {
				$this->collUserGroups = UserGroupPeer::doSelectJoinGroup($criteria, $con);
			}
		}
		$this->lastUserGroupCriteria = $criteria;

		return $this->collUserGroups;
	}

	/**
	 * Temporary storage of collActionLogs to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return     void
	 */
	public function initActionLogs()
	{
		if ($this->collActionLogs === null) {
			$this->collActionLogs = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User has previously
	 * been saved, it will retrieve related ActionLogs from storage.
	 * If this User is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param      Connection $con
	 * @param      Criteria $criteria
	 * @throws     PropelException
	 */
	public function getActionLogs($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseActionLogPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActionLogs === null) {
			if ($this->isNew()) {
			   $this->collActionLogs = array();
			} else {

				$criteria->add(ActionLogPeer::USERID, $this->getId());

				ActionLogPeer::addSelectColumns($criteria);
				$this->collActionLogs = ActionLogPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ActionLogPeer::USERID, $this->getId());

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
	 * Returns the number of related ActionLogs.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      Connection $con
	 * @throws     PropelException
	 */
	public function countActionLogs($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseActionLogPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ActionLogPeer::USERID, $this->getId());

		return ActionLogPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a ActionLog object to this object
	 * through the ActionLog foreign key attribute
	 *
	 * @param      ActionLog $l ActionLog
	 * @return     void
	 * @throws     PropelException
	 */
	public function addActionLog(ActionLog $l)
	{
		$this->collActionLogs[] = $l;
		$l->setUser($this);
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
	public function getActionLogsJoinSecurityAction($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseActionLogPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActionLogs === null) {
			if ($this->isNew()) {
				$this->collActionLogs = array();
			} else {

				$criteria->add(ActionLogPeer::USERID, $this->getId());

				$this->collActionLogs = ActionLogPeer::doSelectJoinSecurityAction($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ActionLogPeer::USERID, $this->getId());

			if (!isset($this->lastActionLogCriteria) || !$this->lastActionLogCriteria->equals($criteria)) {
				$this->collActionLogs = ActionLogPeer::doSelectJoinSecurityAction($criteria, $con);
			}
		}
		$this->lastActionLogCriteria = $criteria;

		return $this->collActionLogs;
	}

} // BaseUser
