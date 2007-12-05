<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'anmaga/AffiliateUserInfoPeer.php';

/**
 * Base class that represents a row from the 'affiliates_userInfo' table.
 *
 * Information about users by affiliates
 *
 * This class was autogenerated by Propel on:
 *
 * 12/05/07 16:36:01
 *
 * @package    anmaga.om
 */
abstract class BaseAffiliateUserInfo extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AffiliateUserInfoPeer
	 */
	protected static $peer;


	/**
	 * The value for the userid field.
	 * @var        int
	 */
	protected $userid;


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
	 * @var        AffiliateUser
	 */
	protected $aAffiliateUser;

	/**
	 * Collection to store aggregation of collAffiliateUsers.
	 * @var        array
	 */
	protected $collAffiliateUsers;

	/**
	 * The criteria used to select the current contents of collAffiliateUsers.
	 * @var        Criteria
	 */
	protected $lastAffiliateUserCriteria = null;

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
	 * Get the [userid] column value.
	 * User Id
	 * @return     int
	 */
	public function getUserid()
	{

		return $this->userid;
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
	 * Set the value of [userid] column.
	 * User Id
	 * @param      int $v new value
	 * @return     void
	 */
	public function setUserid($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->userid !== $v) {
			$this->userid = $v;
			$this->modifiedColumns[] = AffiliateUserInfoPeer::USERID;
		}

		if ($this->aAffiliateUser !== null && $this->aAffiliateUser->getId() !== $v) {
			$this->aAffiliateUser = null;
		}

	} // setUserid()

	/**
	 * Set the value of [name] column.
	 * name
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
			$this->modifiedColumns[] = AffiliateUserInfoPeer::NAME;
		}

	} // setName()

	/**
	 * Set the value of [surname] column.
	 * surname
	 * @param      string $v new value
	 * @return     void
	 */
	public function setSurname($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->surname !== $v) {
			$this->surname = $v;
			$this->modifiedColumns[] = AffiliateUserInfoPeer::SURNAME;
		}

	} // setSurname()

	/**
	 * Set the value of [mailaddress] column.
	 * Email
	 * @param      string $v new value
	 * @return     void
	 */
	public function setMailaddress($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mailaddress !== $v) {
			$this->mailaddress = $v;
			$this->modifiedColumns[] = AffiliateUserInfoPeer::MAILADDRESS;
		}

	} // setMailaddress()

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

			$this->userid = $rs->getInt($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->surname = $rs->getString($startcol + 2);

			$this->mailaddress = $rs->getString($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 4; // 4 = AffiliateUserInfoPeer::NUM_COLUMNS - AffiliateUserInfoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating AffiliateUserInfo object", $e);
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
			$con = Propel::getConnection(AffiliateUserInfoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AffiliateUserInfoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AffiliateUserInfoPeer::DATABASE_NAME);
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

			if ($this->aAffiliateUser !== null) {
				if ($this->aAffiliateUser->isModified()) {
					$affectedRows += $this->aAffiliateUser->save($con);
				}
				$this->setAffiliateUser($this->aAffiliateUser);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AffiliateUserInfoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setNew(false);
				} else {
					$affectedRows += AffiliateUserInfoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collAffiliateUsers !== null) {
				foreach($this->collAffiliateUsers as $referrerFK) {
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

			if ($this->aAffiliateUser !== null) {
				if (!$this->aAffiliateUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAffiliateUser->getValidationFailures());
				}
			}


			if (($retval = AffiliateUserInfoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAffiliateUsers !== null) {
					foreach($this->collAffiliateUsers as $referrerFK) {
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
		$criteria = new Criteria(AffiliateUserInfoPeer::DATABASE_NAME);

		if ($this->isColumnModified(AffiliateUserInfoPeer::USERID)) $criteria->add(AffiliateUserInfoPeer::USERID, $this->userid);
		if ($this->isColumnModified(AffiliateUserInfoPeer::NAME)) $criteria->add(AffiliateUserInfoPeer::NAME, $this->name);
		if ($this->isColumnModified(AffiliateUserInfoPeer::SURNAME)) $criteria->add(AffiliateUserInfoPeer::SURNAME, $this->surname);
		if ($this->isColumnModified(AffiliateUserInfoPeer::MAILADDRESS)) $criteria->add(AffiliateUserInfoPeer::MAILADDRESS, $this->mailaddress);

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
		$criteria = new Criteria(AffiliateUserInfoPeer::DATABASE_NAME);

		$criteria->add(AffiliateUserInfoPeer::USERID, $this->userid);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getUserid();
	}

	/**
	 * Generic method to set the primary key (userid column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setUserid($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of AffiliateUserInfo (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setName($this->name);

		$copyObj->setSurname($this->surname);

		$copyObj->setMailaddress($this->mailaddress);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getAffiliateUsers() as $relObj) {
				$copyObj->addAffiliateUser($relObj->copy($deepCopy));
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);

		$copyObj->setUserid(NULL); // this is a pkey column, so set to default value

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
	 * @return     AffiliateUserInfo Clone of current object.
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
	 * @return     AffiliateUserInfoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AffiliateUserInfoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a AffiliateUser object.
	 *
	 * @param      AffiliateUser $v
	 * @return     void
	 * @throws     PropelException
	 */
	public function setAffiliateUser($v)
	{


		if ($v === null) {
			$this->setUserid(NULL);
		} else {
			$this->setUserid($v->getId());
		}


		$this->aAffiliateUser = $v;
	}


	/**
	 * Get the associated AffiliateUser object
	 *
	 * @param      Connection Optional Connection object.
	 * @return     AffiliateUser The associated AffiliateUser object.
	 * @throws     PropelException
	 */
	public function getAffiliateUser($con = null)
	{
		// include the related Peer class
		include_once 'anmaga/om/BaseAffiliateUserPeer.php';

		if ($this->aAffiliateUser === null && ($this->userid !== null)) {

			$this->aAffiliateUser = AffiliateUserPeer::retrieveByPK($this->userid, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = AffiliateUserPeer::retrieveByPK($this->userid, $con);
			   $obj->addAffiliateUsers($this);
			 */
		}
		return $this->aAffiliateUser;
	}

	/**
	 * Temporary storage of collAffiliateUsers to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return     void
	 */
	public function initAffiliateUsers()
	{
		if ($this->collAffiliateUsers === null) {
			$this->collAffiliateUsers = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AffiliateUserInfo has previously
	 * been saved, it will retrieve related AffiliateUsers from storage.
	 * If this AffiliateUserInfo is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param      Connection $con
	 * @param      Criteria $criteria
	 * @throws     PropelException
	 */
	public function getAffiliateUsers($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseAffiliateUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAffiliateUsers === null) {
			if ($this->isNew()) {
			   $this->collAffiliateUsers = array();
			} else {

				$criteria->add(AffiliateUserPeer::ID, $this->getUserid());

				AffiliateUserPeer::addSelectColumns($criteria);
				$this->collAffiliateUsers = AffiliateUserPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(AffiliateUserPeer::ID, $this->getUserid());

				AffiliateUserPeer::addSelectColumns($criteria);
				if (!isset($this->lastAffiliateUserCriteria) || !$this->lastAffiliateUserCriteria->equals($criteria)) {
					$this->collAffiliateUsers = AffiliateUserPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAffiliateUserCriteria = $criteria;
		return $this->collAffiliateUsers;
	}

	/**
	 * Returns the number of related AffiliateUsers.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      Connection $con
	 * @throws     PropelException
	 */
	public function countAffiliateUsers($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseAffiliateUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AffiliateUserPeer::ID, $this->getUserid());

		return AffiliateUserPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a AffiliateUser object to this object
	 * through the AffiliateUser foreign key attribute
	 *
	 * @param      AffiliateUser $l AffiliateUser
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAffiliateUser(AffiliateUser $l)
	{
		$this->collAffiliateUsers[] = $l;
		$l->setAffiliateUserInfo($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AffiliateUserInfo is new, it will return
	 * an empty collection; or if this AffiliateUserInfo has previously
	 * been saved, it will retrieve related AffiliateUsers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AffiliateUserInfo.
	 */
	public function getAffiliateUsersJoinAffiliateLevel($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseAffiliateUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAffiliateUsers === null) {
			if ($this->isNew()) {
				$this->collAffiliateUsers = array();
			} else {

				$criteria->add(AffiliateUserPeer::ID, $this->getUserid());

				$this->collAffiliateUsers = AffiliateUserPeer::doSelectJoinAffiliateLevel($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AffiliateUserPeer::ID, $this->getUserid());

			if (!isset($this->lastAffiliateUserCriteria) || !$this->lastAffiliateUserCriteria->equals($criteria)) {
				$this->collAffiliateUsers = AffiliateUserPeer::doSelectJoinAffiliateLevel($criteria, $con);
			}
		}
		$this->lastAffiliateUserCriteria = $criteria;

		return $this->collAffiliateUsers;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AffiliateUserInfo is new, it will return
	 * an empty collection; or if this AffiliateUserInfo has previously
	 * been saved, it will retrieve related AffiliateUsers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AffiliateUserInfo.
	 */
	public function getAffiliateUsersJoinAffiliate($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseAffiliateUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAffiliateUsers === null) {
			if ($this->isNew()) {
				$this->collAffiliateUsers = array();
			} else {

				$criteria->add(AffiliateUserPeer::ID, $this->getUserid());

				$this->collAffiliateUsers = AffiliateUserPeer::doSelectJoinAffiliate($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AffiliateUserPeer::ID, $this->getUserid());

			if (!isset($this->lastAffiliateUserCriteria) || !$this->lastAffiliateUserCriteria->equals($criteria)) {
				$this->collAffiliateUsers = AffiliateUserPeer::doSelectJoinAffiliate($criteria, $con);
			}
		}
		$this->lastAffiliateUserCriteria = $criteria;

		return $this->collAffiliateUsers;
	}

} // BaseAffiliateUserInfo
