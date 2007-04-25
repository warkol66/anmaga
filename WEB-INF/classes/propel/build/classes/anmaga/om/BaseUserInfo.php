<?php 

require_once 'propel/om/BaseObject.php';

 
require_once 'propel/om/Persistent.php';

 

include_once 'propel/util/Criteria.php';
 

// (on-demand) include_once 'anmaga/User.php';
// (on-demand) include_once 'anmaga/UserPeer.php';

include_once 'anmaga/UserInfoPeer.php';

/**
 * Base class that represents a row from the 'users_userInfo' table.
 *
 * Information about users 
 *
 * This class was autogenerated by Propel on:
 *
 * [04/24/07 22:46:39]
 *
 * You should not use this class directly.  It should not even be
 * extended; all references should be to UserInfo class. 
 * 
 * @package anmaga 
 */
abstract class BaseUserInfo extends BaseObject implements Persistent {
	
	/** 
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var UserInfoPeer
	 */
	protected static $peer;

	/**
	 * The value for the userid field.
	 * @var int	  
	 */
	protected $userid;	

	/**
	 * The value for the name field.
	 * @var string	  
	 */
	protected $name;	

	/**
	 * The value for the surname field.
	 * @var string	  
	 */
	protected $surname;	
  
	/**
	 * Get the Userid column value.
	 * User Id 
	 * @return int	  
	 */
	public function getUserid()
	{
		return $this->userid;
	}


	/**
	 * Set the value of `userid` column.	  
	 * User Id 
	 * @param int $v new value
	 * @return void
	 * @throws PropelException 
	 */
	public function setUserid($v)
	{
		if ($this->userid !== $v) {
			$this->userid = $v;
			$this->modifiedColumns[] = UserInfoPeer::USERID;
		}
			
		if ($this->aUser !== null && $this->aUser->getId() !== $v) {
			$this->aUser = null;
		}
		
		  // update associated User		  
		  if ($this->collUsers !== null) {
			  for ($i=0,$size=count($this->collUsers); $i < $size; $i++) {
				  $this->collUsers[$i]->setId($v);
			  }
		  }
			  		
	}

  
	/**
	 * Get the Name column value.
	 * name 
	 * @return string	  
	 */
	public function getName()
	{
		return $this->name;
	}


	/**
	 * Set the value of `name` column.	  
	 * name 
	 * @param string $v new value
	 * @return void
	 *  
	 */
	public function setName($v)
	{
		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = UserInfoPeer::NAME;
		}
				
	}

  
	/**
	 * Get the Surname column value.
	 * surname 
	 * @return string	  
	 */
	public function getSurname()
	{
		return $this->surname;
	}


	/**
	 * Set the value of `surname` column.	  
	 * surname 
	 * @param string $v new value
	 * @return void
	 *  
	 */
	public function setSurname($v)
	{
		if ($this->surname !== $v) {
			$this->surname = $v;
			$this->modifiedColumns[] = UserInfoPeer::SURNAME;
		}
				
	}


	
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
	 * @return void
	 * @throws PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {
			$this->userid = $rs->getInt($startcol + 0);					
			$this->name = $rs->getString($startcol + 1);					
			$this->surname = $rs->getString($startcol + 2);					
			 
			$this->resetModified();
			$this->setNew(false);
		
		} catch (Exception $e) {
			throw new PropelException("Error populating UserInfo object", $e);
		}		
	
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
		$criteria = new Criteria(UserInfoPeer::DATABASE_NAME);
		$criteria->add(UserInfoPeer::USERID, $this->userid);
		return $criteria;			
	}
	
	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{		
		$criteria = new Criteria(UserInfoPeer::DATABASE_NAME);
		if ($this->isColumnModified(UserInfoPeer::USERID)) $criteria->add(UserInfoPeer::USERID, $this->userid);
		if ($this->isColumnModified(UserInfoPeer::NAME)) $criteria->add(UserInfoPeer::NAME, $this->name);
		if ($this->isColumnModified(UserInfoPeer::SURNAME)) $criteria->add(UserInfoPeer::SURNAME, $this->surname);
		return $criteria;			
	}
	
	

	/**
	 * @var User	  
	 */
	protected $aUser;

	/**
	 * Declares an association between this object and a User object
	 *
	 * @param User $v
	 * @return void
	 * @throws PropelException
	 */
	public function setUser($v)
	{
			
		if ($v === null) {
			$this->setUserid(NULL);
		} else {
			$this->setUserid($v->getId());
		}
   
		$this->aUser = $v;
	}


	/**
	 * Get the associated User object
	 *
	 * @param Connection Optional Connection object.
	 * @return User The associated User object.
	 * @throws PropelException
	 */
	public function getUser($con = null)
	{
		// include the Peer class
		include_once 'anmaga/UserPeer.php';

		if ($this->aUser === null && ($this->userid !== null)) {
	
			$this->aUser = UserPeer::retrieveByPK($this->userid, $con);
	
			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = UserPeer::retrieveByPK($this->userid, $con);
			   $obj->addUserInfos($this);
			 */
		}
		return $this->aUser;
	}

	/**
	 * Provides convenient way to set a relationship based on a
	 * key.  e.g.
	 * <code>$bar->setFooKey($foo->getPrimaryKey())</code>
	 *
 
	 * @return void
	 * @throws PropelException
	 */
	public function setUserKey($key)
	{

		$this->setUserid( (int) $key);			
		
	}

	/**
	 * Collection to store aggregation of collUsers	  
	 * @var array
	 */
	protected $collUsers; 

	/**
	 * Temporary storage of collUsers to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initUsers()
	{
		if ($this->collUsers === null) {
			$this->collUsers = array();
		}
	}

	/**
	 * Method called to associate a User object to this object
	 * through the User foreign key attribute
	 *
	 * @param User $l $className
	 * @return void
	 * @throws PropelException
	 */
	public function addUser(User $l)
	{
		$this->collUsers[] = $l;
		$l->setUserInfo($this);
	}

	/**
	 * The criteria used to select the current contents of collUsers.
	 * @var Criteria
	 */
	private $lastUsersCriteria = null;

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this UserInfo has previously
	 * been saved, it will retrieve related Users from storage.
	 * If this UserInfo is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getUsers($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/UserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
				
		if ($this->collUsers === null) {
			if ($this->isNew()) {
			   $this->collUsers = array();
			} else {
	
				$criteria->add(UserPeer::ID, $this->getUserid() );

				$this->collUsers = UserPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.

				$criteria->add(UserPeer::ID, $this->getUserid());

				if (!isset($this->lastUsersCriteria) || !$this->lastUsersCriteria->equals($criteria)) {
					$this->collUsers = UserPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUsersCriteria = $criteria;

		return $this->collUsers;
	}
	

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this UserInfo is new, it will return
	 * an empty collection; or if this UserInfo has previously
	 * been saved, it will retrieve related Users from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in UserInfo.
	 */
	public function getUsersJoinUserInfo($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/UserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		
		if ($this->collUsers === null) {
			if ($this->isNew()) {
			   $this->collUsers = array();
			} else {
	   
				$criteria->add(UserPeer::ID, $this->getUserid());
				$this->collUsers = UserPeer::doSelectJoinUserInfo($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.
	  
			$criteria->add(UserPeer::ID, $this->getUserid());
			if (!isset($this->lastUsersCriteria) || !$this->lastUsersCriteria->equals($criteria)) {
				$this->collUsers = UserPeer::doSelectJoinUserInfo($criteria, $con);
			}
		}
		$this->lastUsersCriteria = $criteria;

		return $this->collUsers;
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this UserInfo is new, it will return
	 * an empty collection; or if this UserInfo has previously
	 * been saved, it will retrieve related Users from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in UserInfo.
	 */
	public function getUsersJoinLevel($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/UserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		
		if ($this->collUsers === null) {
			if ($this->isNew()) {
			   $this->collUsers = array();
			} else {
	   
				$criteria->add(UserPeer::ID, $this->getUserid());
				$this->collUsers = UserPeer::doSelectJoinLevel($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.
	  
			$criteria->add(UserPeer::ID, $this->getUserid());
			if (!isset($this->lastUsersCriteria) || !$this->lastUsersCriteria->equals($criteria)) {
				$this->collUsers = UserPeer::doSelectJoinLevel($criteria, $con);
			}
		}
		$this->lastUsersCriteria = $criteria;

		return $this->collUsers;
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
		
		if ($con === null)
			$con = Propel::getConnection(UserInfoPeer::DATABASE_NAME);

		try {
			$con->begin();
			UserInfoPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}
	

	/**
	 * flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var boolean
	 */
	private $alreadyInSave = false;

	/**
	 * Stores the object in the database.  If the object is new,
	 * it inserts it; otherwise an update is performed.  This method
	 * wraps the doSave() worker method in a transaction.
	 *
	 * @param Connection $con
	 * @return void
	 * @throws PropelException
	 */
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}
		
		if ($con === null)
			$con = Propel::getConnection(UserInfoPeer::DATABASE_NAME);

		try {
			$con->begin();
			$this->doSave($con);			
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}
  
	/**
	 * Stores the object in the database.  If the object is new,
	 * it inserts it; otherwise an update is performed.
	 *
	 * @param Connection $con
	 * @return void
	 * @throws PropelException
	 */
		protected function doSave($con)	{ 
		
	 
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.
 
			if ($this->aUser !== null) {
				if ($this->aUser->isModified()) $this->aUser->save($con);
				$this->setUser($this->aUser);
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UserInfoPeer::doInsert($this, $con);
					$this->setNew(false);
				} else {
					UserInfoPeer::doUpdate($this, $con);
				}			
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}
			if ($this->collUsers !== null) {
				for ($i=0,$size=count($this->collUsers); $i < $size; $i++) {
					$this->collUsers[$i]->save($con);
				}
			  }

			$this->alreadyInSave = false;
		}
	}

	/**
	 * Validates the objects modified field values.
	 * This includes all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param mixed $columns Column name or an array of column names.
	 *
	 * @return mixed <code>true</code> if all columns pass validation
	 *			  or an array of <code>ValidationFailed</code> objects for columns that fail.
	 */
	public function validate($columns = null)
	{
	  if ($columns)
	  {
		return UserInfoPeer::doValidate($this, $columns);
	  }

		return $this->doValidate();
	}

	/**
	 * flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var boolean
	 */
	protected $alreadyInValidation = false;
  
	/**
	 * This function performs the validation work for complex object models.
	 * 
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate()
	{
		if (! $this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;
	  
			$failureMap = array();	  
	  
			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.
			if ($this->aUser !== null) {
				if (($retval = $this->aUser->validate()) !== true) {
					$failureMap = array_merge($failureMap, $retval);
				}
			}

			if (($retval = UserInfoPeer::doValidate($this)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}
	  
			if ($this->collUsers !== null) {
				for ($i=0,$size=count($this->collUsers); $i < $size; $i++) {
					if (($retval = $this->collUsers[$i]->validate()) !== true) {
						$failureMap = array_merge($failureMap, $retval);
					}
				}
			}
	  
			$this->alreadyInValidation = false;
		}
	
		return (!empty($failureMap) ? $failureMap : true);
	}
  

	/**
	 * Set the PrimaryKey.
	 *
	 * @param mixed userid Primary key.
	 * @return void
	 * @throws PropelException	 */
	public function setPrimaryKey($key) 
	{		
		$this->setUserid($key);
	}
	

	/**
	 * Returns an id that differentiates this object from others
	 * of its class.
	 * @return int 
	 */
	public function getPrimaryKey()
	{

		return $this->getUserid();

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
	 *  
	 * @return UserInfo Clone of current object.
	 * @throws PropelException
	 */
	public function copy($deepCopy = false) 
	{
		$copyObj = new UserInfo();
		$copyObj->setName($this->name);
		$copyObj->setSurname($this->surname);

		if ($deepCopy) {		
			// important: setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getUsers() as $relObj) {
				$copyObj->addUser($relObj->copy());
			}
		} // if ($deepCopy)
		
		$copyObj->setNew(true);
		
		$copyObj->setUserid(NULL); // this is a pkey column, so set to default value

		return $copyObj;
	}
		

	/**
	 * returns a peer instance associated with this om.  Since Peer classes	
	 * are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 * @return UserInfoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new UserInfoPeer();
		}
		return self::$peer;
	}

}
