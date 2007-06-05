<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'anmaga/UsersByAffiliateLevelPeer.php';

/**
 * Base class that represents a row from the 'usersByAffiliate_level' table.
 *
 * Levels
 *
 * This class was autogenerated by Propel on:
 *
 * 06/04/07 12:21:09
 *
 * @package anmaga.om
 */
abstract class BaseUsersByAffiliateLevel extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var UsersByAffiliateLevelPeer
	 */
	protected static $peer;


	/**
	 * The value for the id field.
	 * @var int
	 */
	protected $id;


	/**
	 * The value for the name field.
	 * @var string
	 */
	protected $name;


	/**
	 * The value for the bitlevel field.
	 * @var int
	 */
	protected $bitlevel;

	/**
	 * Collection to store aggregation of collUserByAffiliates.
	 * @var array
	 */
	protected $collUserByAffiliates;

	/**
	 * The criteria used to select the current contents of collUserByAffiliates.
	 * @var Criteria
	 */
	protected $lastUserByAffiliateCriteria = null;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Get the [id] column value.
	 * Level ID
	 * @return int
	 */
	public function getId()
	{

		return $this->id;
	}

	/**
	 * Get the [name] column value.
	 * Level Name
	 * @return string
	 */
	public function getName()
	{

		return $this->name;
	}

	/**
	 * Get the [bitlevel] column value.
	 * Bit del nivel
	 * @return int
	 */
	public function getBitlevel()
	{

		return $this->bitlevel;
	}

	/**
	 * Set the value of [id] column.
	 * Level ID
	 * @param int $v new value
	 * @return void
	 */
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UsersByAffiliateLevelPeer::ID;
		}

	} // setId()

	/**
	 * Set the value of [name] column.
	 * Level Name
	 * @param string $v new value
	 * @return void
	 */
	public function setName($v)
	{

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = UsersByAffiliateLevelPeer::NAME;
		}

	} // setName()

	/**
	 * Set the value of [bitlevel] column.
	 * Bit del nivel
	 * @param int $v new value
	 * @return void
	 */
	public function setBitlevel($v)
	{

		if ($this->bitlevel !== $v) {
			$this->bitlevel = $v;
			$this->modifiedColumns[] = UsersByAffiliateLevelPeer::BITLEVEL;
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
	 * @param ResultSet $rs The ResultSet class with cursor advanced to desired record pos.
	 * @param int $startcol 1-based offset column which indicates which restultset column to start with.
	 * @return int next starting column
	 * @throws PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->bitlevel = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 3; // 3 = UsersByAffiliateLevelPeer::NUM_COLUMNS - UsersByAffiliateLevelPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating UsersByAffiliateLevel object", $e);
		}
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param Connection $con
	 * @return void
	 * @throws PropelException
	 * @see BaseObject::setDeleted()
	 * @see BaseObject::isDeleted()
	 */
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UsersByAffiliateLevelPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			UsersByAffiliateLevelPeer::doDelete($this, $con);
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
	 * @param Connection $con
	 * @return int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws PropelException
	 * @see doSave()
	 */
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UsersByAffiliateLevelPeer::DATABASE_NAME);
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
	 * @param Connection $con
	 * @return int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws PropelException
	 * @see save()
	 */
	protected function doSave($con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UsersByAffiliateLevelPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += UsersByAffiliateLevelPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collUserByAffiliates !== null) {
				foreach($this->collUserByAffiliates as $referrerFK) {
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
	 * @var array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return array ValidationFailed[]
	 * @see validate()
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
	 * @param mixed $columns Column name or an array of column names.
	 * @return boolean Whether all columns pass validation.
	 * @see doValidate()
	 * @see getValidationFailures()
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
	 * @param array $columns Array of column names to validate.
	 * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = UsersByAffiliateLevelPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collUserByAffiliates !== null) {
					foreach($this->collUserByAffiliates as $referrerFK) {
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
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(UsersByAffiliateLevelPeer::DATABASE_NAME);

		if ($this->isColumnModified(UsersByAffiliateLevelPeer::ID)) $criteria->add(UsersByAffiliateLevelPeer::ID, $this->id);
		if ($this->isColumnModified(UsersByAffiliateLevelPeer::NAME)) $criteria->add(UsersByAffiliateLevelPeer::NAME, $this->name);
		if ($this->isColumnModified(UsersByAffiliateLevelPeer::BITLEVEL)) $criteria->add(UsersByAffiliateLevelPeer::BITLEVEL, $this->bitlevel);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UsersByAffiliateLevelPeer::DATABASE_NAME);

		$criteria->add(UsersByAffiliateLevelPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param int $key Primary key.
	 * @return void
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
	 * @param object $copyObj An object of UsersByAffiliateLevel (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setName($this->name);

		$copyObj->setBitlevel($this->bitlevel);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getUserByAffiliates() as $relObj) {
				$copyObj->addUserByAffiliate($relObj->copy($deepCopy));
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
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return UsersByAffiliateLevel Clone of current object.
	 * @throws PropelException
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
	 * @return UsersByAffiliateLevelPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new UsersByAffiliateLevelPeer();
		}
		return self::$peer;
	}

	/**
	 * Temporary storage of collUserByAffiliates to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initUserByAffiliates()
	{
		if ($this->collUserByAffiliates === null) {
			$this->collUserByAffiliates = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this UsersByAffiliateLevel has previously
	 * been saved, it will retrieve related UserByAffiliates from storage.
	 * If this UsersByAffiliateLevel is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getUserByAffiliates($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseUserByAffiliatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUserByAffiliates === null) {
			if ($this->isNew()) {
			   $this->collUserByAffiliates = array();
			} else {

				$criteria->add(UserByAffiliatePeer::LEVELID, $this->getId());

				UserByAffiliatePeer::addSelectColumns($criteria);
				$this->collUserByAffiliates = UserByAffiliatePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(UserByAffiliatePeer::LEVELID, $this->getId());

				UserByAffiliatePeer::addSelectColumns($criteria);
				if (!isset($this->lastUserByAffiliateCriteria) || !$this->lastUserByAffiliateCriteria->equals($criteria)) {
					$this->collUserByAffiliates = UserByAffiliatePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUserByAffiliateCriteria = $criteria;
		return $this->collUserByAffiliates;
	}

	/**
	 * Returns the number of related UserByAffiliates.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countUserByAffiliates($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseUserByAffiliatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(UserByAffiliatePeer::LEVELID, $this->getId());

		return UserByAffiliatePeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a UserByAffiliate object to this object
	 * through the UserByAffiliate foreign key attribute
	 *
	 * @param UserByAffiliate $l UserByAffiliate
	 * @return void
	 * @throws PropelException
	 */
	public function addUserByAffiliate(UserByAffiliate $l)
	{
		$this->collUserByAffiliates[] = $l;
		$l->setUsersByAffiliateLevel($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this UsersByAffiliateLevel is new, it will return
	 * an empty collection; or if this UsersByAffiliateLevel has previously
	 * been saved, it will retrieve related UserByAffiliates from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in UsersByAffiliateLevel.
	 */
	public function getUserByAffiliatesJoinUsersByAffiliateUserInfo($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseUserByAffiliatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUserByAffiliates === null) {
			if ($this->isNew()) {
				$this->collUserByAffiliates = array();
			} else {

				$criteria->add(UserByAffiliatePeer::LEVELID, $this->getId());

				$this->collUserByAffiliates = UserByAffiliatePeer::doSelectJoinUsersByAffiliateUserInfo($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(UserByAffiliatePeer::LEVELID, $this->getId());

			if (!isset($this->lastUserByAffiliateCriteria) || !$this->lastUserByAffiliateCriteria->equals($criteria)) {
				$this->collUserByAffiliates = UserByAffiliatePeer::doSelectJoinUsersByAffiliateUserInfo($criteria, $con);
			}
		}
		$this->lastUserByAffiliateCriteria = $criteria;

		return $this->collUserByAffiliates;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this UsersByAffiliateLevel is new, it will return
	 * an empty collection; or if this UsersByAffiliateLevel has previously
	 * been saved, it will retrieve related UserByAffiliates from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in UsersByAffiliateLevel.
	 */
	public function getUserByAffiliatesJoinAffiliate($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseUserByAffiliatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUserByAffiliates === null) {
			if ($this->isNew()) {
				$this->collUserByAffiliates = array();
			} else {

				$criteria->add(UserByAffiliatePeer::LEVELID, $this->getId());

				$this->collUserByAffiliates = UserByAffiliatePeer::doSelectJoinAffiliate($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(UserByAffiliatePeer::LEVELID, $this->getId());

			if (!isset($this->lastUserByAffiliateCriteria) || !$this->lastUserByAffiliateCriteria->equals($criteria)) {
				$this->collUserByAffiliates = UserByAffiliatePeer::doSelectJoinAffiliate($criteria, $con);
			}
		}
		$this->lastUserByAffiliateCriteria = $criteria;

		return $this->collUserByAffiliates;
	}

} // BaseUsersByAffiliateLevel
