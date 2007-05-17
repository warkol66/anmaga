<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'anmaga/UsersByAffiliateGroupPeer.php';

/**
 * Base class that represents a row from the 'usersByAffiliate_group' table.
 *
 * Groups
 *
 * This class was autogenerated by Propel on:
 *
 * 05/17/07 14:19:30
 *
 * @package    anmaga.om
 */
abstract class BaseUsersByAffiliateGroup extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        UsersByAffiliateGroupPeer
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
	 * The value for the bitlevel field.
	 * @var        int
	 */
	protected $bitlevel;

	/**
	 * Collection to store aggregation of collUsersByAffiliateUserGroups.
	 * @var        array
	 */
	protected $collUsersByAffiliateUserGroups;

	/**
	 * The criteria used to select the current contents of collUsersByAffiliateUserGroups.
	 * @var        Criteria
	 */
	protected $lastUsersByAffiliateUserGroupCriteria = null;

	/**
	 * Collection to store aggregation of collUsersByAffiliateGroupCategorys.
	 * @var        array
	 */
	protected $collUsersByAffiliateGroupCategorys;

	/**
	 * The criteria used to select the current contents of collUsersByAffiliateGroupCategorys.
	 * @var        Criteria
	 */
	protected $lastUsersByAffiliateGroupCategoryCriteria = null;

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
	 * Group ID
	 * @return     int
	 */
	public function getId()
	{

		return $this->id;
	}

	/**
	 * Get the [name] column value.
	 * Group Name
	 * @return     string
	 */
	public function getName()
	{

		return $this->name;
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
	 * Get the [bitlevel] column value.
	 * Nivel
	 * @return     int
	 */
	public function getBitlevel()
	{

		return $this->bitlevel;
	}

	/**
	 * Set the value of [id] column.
	 * Group ID
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
			$this->modifiedColumns[] = UsersByAffiliateGroupPeer::ID;
		}

	} // setId()

	/**
	 * Set the value of [name] column.
	 * Group Name
	 * @param      string $v new value
	 * @return     void
	 */
	public function setName($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = UsersByAffiliateGroupPeer::NAME;
		}

	} // setName()

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
			$this->modifiedColumns[] = UsersByAffiliateGroupPeer::CREATED;
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
			$this->modifiedColumns[] = UsersByAffiliateGroupPeer::UPDATED;
		}

	} // setUpdated()

	/**
	 * Set the value of [bitlevel] column.
	 * Nivel
	 * @param      int $v new value
	 * @return     void
	 */
	public function setBitlevel($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->bitlevel !== $v) {
			$this->bitlevel = $v;
			$this->modifiedColumns[] = UsersByAffiliateGroupPeer::BITLEVEL;
		}

	} // setBitlevel()

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

			$this->name = $rs->getString($startcol + 1);

			$this->created = $rs->getTimestamp($startcol + 2, null);

			$this->updated = $rs->getTimestamp($startcol + 3, null);

			$this->bitlevel = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 5; // 5 = UsersByAffiliateGroupPeer::NUM_COLUMNS - UsersByAffiliateGroupPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating UsersByAffiliateGroup object", $e);
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
			$con = Propel::getConnection(UsersByAffiliateGroupPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			UsersByAffiliateGroupPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(UsersByAffiliateGroupPeer::DATABASE_NAME);
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


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UsersByAffiliateGroupPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += UsersByAffiliateGroupPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collUsersByAffiliateUserGroups !== null) {
				foreach($this->collUsersByAffiliateUserGroups as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUsersByAffiliateGroupCategorys !== null) {
				foreach($this->collUsersByAffiliateGroupCategorys as $referrerFK) {
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


			if (($retval = UsersByAffiliateGroupPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collUsersByAffiliateUserGroups !== null) {
					foreach($this->collUsersByAffiliateUserGroups as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUsersByAffiliateGroupCategorys !== null) {
					foreach($this->collUsersByAffiliateGroupCategorys as $referrerFK) {
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
		$criteria = new Criteria(UsersByAffiliateGroupPeer::DATABASE_NAME);

		if ($this->isColumnModified(UsersByAffiliateGroupPeer::ID)) $criteria->add(UsersByAffiliateGroupPeer::ID, $this->id);
		if ($this->isColumnModified(UsersByAffiliateGroupPeer::NAME)) $criteria->add(UsersByAffiliateGroupPeer::NAME, $this->name);
		if ($this->isColumnModified(UsersByAffiliateGroupPeer::CREATED)) $criteria->add(UsersByAffiliateGroupPeer::CREATED, $this->created);
		if ($this->isColumnModified(UsersByAffiliateGroupPeer::UPDATED)) $criteria->add(UsersByAffiliateGroupPeer::UPDATED, $this->updated);
		if ($this->isColumnModified(UsersByAffiliateGroupPeer::BITLEVEL)) $criteria->add(UsersByAffiliateGroupPeer::BITLEVEL, $this->bitlevel);

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
		$criteria = new Criteria(UsersByAffiliateGroupPeer::DATABASE_NAME);

		$criteria->add(UsersByAffiliateGroupPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of UsersByAffiliateGroup (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setName($this->name);

		$copyObj->setCreated($this->created);

		$copyObj->setUpdated($this->updated);

		$copyObj->setBitlevel($this->bitlevel);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getUsersByAffiliateUserGroups() as $relObj) {
				$copyObj->addUsersByAffiliateUserGroup($relObj->copy($deepCopy));
			}

			foreach($this->getUsersByAffiliateGroupCategorys() as $relObj) {
				$copyObj->addUsersByAffiliateGroupCategory($relObj->copy($deepCopy));
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
	 * @return     UsersByAffiliateGroup Clone of current object.
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
	 * @return     UsersByAffiliateGroupPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new UsersByAffiliateGroupPeer();
		}
		return self::$peer;
	}

	/**
	 * Temporary storage of collUsersByAffiliateUserGroups to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return     void
	 */
	public function initUsersByAffiliateUserGroups()
	{
		if ($this->collUsersByAffiliateUserGroups === null) {
			$this->collUsersByAffiliateUserGroups = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this UsersByAffiliateGroup has previously
	 * been saved, it will retrieve related UsersByAffiliateUserGroups from storage.
	 * If this UsersByAffiliateGroup is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param      Connection $con
	 * @param      Criteria $criteria
	 * @throws     PropelException
	 */
	public function getUsersByAffiliateUserGroups($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseUsersByAffiliateUserGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsersByAffiliateUserGroups === null) {
			if ($this->isNew()) {
			   $this->collUsersByAffiliateUserGroups = array();
			} else {

				$criteria->add(UsersByAffiliateUserGroupPeer::GROUPID, $this->getId());

				UsersByAffiliateUserGroupPeer::addSelectColumns($criteria);
				$this->collUsersByAffiliateUserGroups = UsersByAffiliateUserGroupPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(UsersByAffiliateUserGroupPeer::GROUPID, $this->getId());

				UsersByAffiliateUserGroupPeer::addSelectColumns($criteria);
				if (!isset($this->lastUsersByAffiliateUserGroupCriteria) || !$this->lastUsersByAffiliateUserGroupCriteria->equals($criteria)) {
					$this->collUsersByAffiliateUserGroups = UsersByAffiliateUserGroupPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUsersByAffiliateUserGroupCriteria = $criteria;
		return $this->collUsersByAffiliateUserGroups;
	}

	/**
	 * Returns the number of related UsersByAffiliateUserGroups.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      Connection $con
	 * @throws     PropelException
	 */
	public function countUsersByAffiliateUserGroups($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseUsersByAffiliateUserGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(UsersByAffiliateUserGroupPeer::GROUPID, $this->getId());

		return UsersByAffiliateUserGroupPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a UsersByAffiliateUserGroup object to this object
	 * through the UsersByAffiliateUserGroup foreign key attribute
	 *
	 * @param      UsersByAffiliateUserGroup $l UsersByAffiliateUserGroup
	 * @return     void
	 * @throws     PropelException
	 */
	public function addUsersByAffiliateUserGroup(UsersByAffiliateUserGroup $l)
	{
		$this->collUsersByAffiliateUserGroups[] = $l;
		$l->setUsersByAffiliateGroup($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this UsersByAffiliateGroup is new, it will return
	 * an empty collection; or if this UsersByAffiliateGroup has previously
	 * been saved, it will retrieve related UsersByAffiliateUserGroups from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in UsersByAffiliateGroup.
	 */
	public function getUsersByAffiliateUserGroupsJoinUserByAffiliate($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseUsersByAffiliateUserGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsersByAffiliateUserGroups === null) {
			if ($this->isNew()) {
				$this->collUsersByAffiliateUserGroups = array();
			} else {

				$criteria->add(UsersByAffiliateUserGroupPeer::GROUPID, $this->getId());

				$this->collUsersByAffiliateUserGroups = UsersByAffiliateUserGroupPeer::doSelectJoinUserByAffiliate($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(UsersByAffiliateUserGroupPeer::GROUPID, $this->getId());

			if (!isset($this->lastUsersByAffiliateUserGroupCriteria) || !$this->lastUsersByAffiliateUserGroupCriteria->equals($criteria)) {
				$this->collUsersByAffiliateUserGroups = UsersByAffiliateUserGroupPeer::doSelectJoinUserByAffiliate($criteria, $con);
			}
		}
		$this->lastUsersByAffiliateUserGroupCriteria = $criteria;

		return $this->collUsersByAffiliateUserGroups;
	}

	/**
	 * Temporary storage of collUsersByAffiliateGroupCategorys to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return     void
	 */
	public function initUsersByAffiliateGroupCategorys()
	{
		if ($this->collUsersByAffiliateGroupCategorys === null) {
			$this->collUsersByAffiliateGroupCategorys = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this UsersByAffiliateGroup has previously
	 * been saved, it will retrieve related UsersByAffiliateGroupCategorys from storage.
	 * If this UsersByAffiliateGroup is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param      Connection $con
	 * @param      Criteria $criteria
	 * @throws     PropelException
	 */
	public function getUsersByAffiliateGroupCategorys($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseUsersByAffiliateGroupCategoryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsersByAffiliateGroupCategorys === null) {
			if ($this->isNew()) {
			   $this->collUsersByAffiliateGroupCategorys = array();
			} else {

				$criteria->add(UsersByAffiliateGroupCategoryPeer::GROUPID, $this->getId());

				UsersByAffiliateGroupCategoryPeer::addSelectColumns($criteria);
				$this->collUsersByAffiliateGroupCategorys = UsersByAffiliateGroupCategoryPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(UsersByAffiliateGroupCategoryPeer::GROUPID, $this->getId());

				UsersByAffiliateGroupCategoryPeer::addSelectColumns($criteria);
				if (!isset($this->lastUsersByAffiliateGroupCategoryCriteria) || !$this->lastUsersByAffiliateGroupCategoryCriteria->equals($criteria)) {
					$this->collUsersByAffiliateGroupCategorys = UsersByAffiliateGroupCategoryPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUsersByAffiliateGroupCategoryCriteria = $criteria;
		return $this->collUsersByAffiliateGroupCategorys;
	}

	/**
	 * Returns the number of related UsersByAffiliateGroupCategorys.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      Connection $con
	 * @throws     PropelException
	 */
	public function countUsersByAffiliateGroupCategorys($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseUsersByAffiliateGroupCategoryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(UsersByAffiliateGroupCategoryPeer::GROUPID, $this->getId());

		return UsersByAffiliateGroupCategoryPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a UsersByAffiliateGroupCategory object to this object
	 * through the UsersByAffiliateGroupCategory foreign key attribute
	 *
	 * @param      UsersByAffiliateGroupCategory $l UsersByAffiliateGroupCategory
	 * @return     void
	 * @throws     PropelException
	 */
	public function addUsersByAffiliateGroupCategory(UsersByAffiliateGroupCategory $l)
	{
		$this->collUsersByAffiliateGroupCategorys[] = $l;
		$l->setUsersByAffiliateGroup($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this UsersByAffiliateGroup is new, it will return
	 * an empty collection; or if this UsersByAffiliateGroup has previously
	 * been saved, it will retrieve related UsersByAffiliateGroupCategorys from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in UsersByAffiliateGroup.
	 */
	public function getUsersByAffiliateGroupCategorysJoinCategory($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseUsersByAffiliateGroupCategoryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsersByAffiliateGroupCategorys === null) {
			if ($this->isNew()) {
				$this->collUsersByAffiliateGroupCategorys = array();
			} else {

				$criteria->add(UsersByAffiliateGroupCategoryPeer::GROUPID, $this->getId());

				$this->collUsersByAffiliateGroupCategorys = UsersByAffiliateGroupCategoryPeer::doSelectJoinCategory($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(UsersByAffiliateGroupCategoryPeer::GROUPID, $this->getId());

			if (!isset($this->lastUsersByAffiliateGroupCategoryCriteria) || !$this->lastUsersByAffiliateGroupCategoryCriteria->equals($criteria)) {
				$this->collUsersByAffiliateGroupCategorys = UsersByAffiliateGroupCategoryPeer::doSelectJoinCategory($criteria, $con);
			}
		}
		$this->lastUsersByAffiliateGroupCategoryCriteria = $criteria;

		return $this->collUsersByAffiliateGroupCategorys;
	}

} // BaseUsersByAffiliateGroup
