<?php 

require_once 'propel/om/BaseObject.php';

 
require_once 'propel/om/Persistent.php';

 

include_once 'propel/util/Criteria.php';
 

// (on-demand) include_once 'anmaga/UserByAffiliate.php';
// (on-demand) include_once 'anmaga/UserByAffiliatePeer.php';

include_once 'anmaga/UsersByAffiliateUserInfoPeer.php';

/**
 * Base class that represents a row from the 'usersByAffiliate_userInfo' table.
 *
 * Information about users by affiliates 
 *
 * This class was autogenerated by Propel on:
 *
 * [03/16/07 16:42:35]
 *
 * You should not use this class directly.  It should not even be
 * extended; all references should be to UsersByAffiliateUserInfo class. 
 * 
 * @package anmaga 
 */
abstract class BaseUsersByAffiliateUserInfo extends BaseObject implements Persistent {
	
	/** 
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var UsersByAffiliateUserInfoPeer
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
			$this->modifiedColumns[] = UsersByAffiliateUserInfoPeer::USERID;
		}
			
		if ($this->aUserByAffiliate !== null && $this->aUserByAffiliate->getId() !== $v) {
			$this->aUserByAffiliate = null;
		}
		
		  // update associated UserByAffiliate		  
		  if ($this->collUserByAffiliates !== null) {
			  for ($i=0,$size=count($this->collUserByAffiliates); $i < $size; $i++) {
				  $this->collUserByAffiliates[$i]->setId($v);
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
			$this->modifiedColumns[] = UsersByAffiliateUserInfoPeer::NAME;
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
			$this->modifiedColumns[] = UsersByAffiliateUserInfoPeer::SURNAME;
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
			throw new PropelException("Error populating UsersByAffiliateUserInfo object", $e);
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
		$criteria = new Criteria(UsersByAffiliateUserInfoPeer::DATABASE_NAME);
		$criteria->add(UsersByAffiliateUserInfoPeer::USERID, $this->userid);
		return $criteria;			
	}
	
	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{		
		$criteria = new Criteria(UsersByAffiliateUserInfoPeer::DATABASE_NAME);
		if ($this->isColumnModified(UsersByAffiliateUserInfoPeer::USERID)) $criteria->add(UsersByAffiliateUserInfoPeer::USERID, $this->userid);
		if ($this->isColumnModified(UsersByAffiliateUserInfoPeer::NAME)) $criteria->add(UsersByAffiliateUserInfoPeer::NAME, $this->name);
		if ($this->isColumnModified(UsersByAffiliateUserInfoPeer::SURNAME)) $criteria->add(UsersByAffiliateUserInfoPeer::SURNAME, $this->surname);
		return $criteria;			
	}
	
	

	/**
	 * @var UserByAffiliate	  
	 */
	protected $aUserByAffiliate;

	/**
	 * Declares an association between this object and a UserByAffiliate object
	 *
	 * @param UserByAffiliate $v
	 * @return void
	 * @throws PropelException
	 */
	public function setUserByAffiliate($v)
	{
			
		if ($v === null) {
			$this->setUserid(NULL);
		} else {
			$this->setUserid($v->getId());
		}
   
		$this->aUserByAffiliate = $v;
	}


	/**
	 * Get the associated UserByAffiliate object
	 *
	 * @param Connection Optional Connection object.
	 * @return UserByAffiliate The associated UserByAffiliate object.
	 * @throws PropelException
	 */
	public function getUserByAffiliate($con = null)
	{
		// include the Peer class
		include_once 'anmaga/UserByAffiliatePeer.php';

		if ($this->aUserByAffiliate === null && ($this->userid !== null)) {
	
			$this->aUserByAffiliate = UserByAffiliatePeer::retrieveByPK($this->userid, $con);
	
			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = UserByAffiliatePeer::retrieveByPK($this->userid, $con);
			   $obj->addUsersByAffiliateUserInfos($this);
			 */
		}
		return $this->aUserByAffiliate;
	}

	/**
	 * Provides convenient way to set a relationship based on a
	 * key.  e.g.
	 * <code>$bar->setFooKey($foo->getPrimaryKey())</code>
	 *
 
	 * @return void
	 * @throws PropelException
	 */
	public function setUserByAffiliateKey($key)
	{

		$this->setUserid( (int) $key);			
		
	}

	/**
	 * Collection to store aggregation of collUserByAffiliates	  
	 * @var array
	 */
	protected $collUserByAffiliates; 

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
	 * Method called to associate a UserByAffiliate object to this object
	 * through the UserByAffiliate foreign key attribute
	 *
	 * @param UserByAffiliate $l $className
	 * @return void
	 * @throws PropelException
	 */
	public function addUserByAffiliate(UserByAffiliate $l)
	{
		$this->collUserByAffiliates[] = $l;
		$l->setUsersByAffiliateUserInfo($this);
	}

	/**
	 * The criteria used to select the current contents of collUserByAffiliates.
	 * @var Criteria
	 */
	private $lastUserByAffiliatesCriteria = null;

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this UsersByAffiliateUserInfo has previously
	 * been saved, it will retrieve related UserByAffiliates from storage.
	 * If this UsersByAffiliateUserInfo is new, it will return
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
		include_once 'anmaga/UserByAffiliatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
				
		if ($this->collUserByAffiliates === null) {
			if ($this->isNew()) {
			   $this->collUserByAffiliates = array();
			} else {
	
				$criteria->add(UserByAffiliatePeer::ID, $this->getUserid() );

				$this->collUserByAffiliates = UserByAffiliatePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.

				$criteria->add(UserByAffiliatePeer::ID, $this->getUserid());

				if (!isset($this->lastUserByAffiliatesCriteria) || !$this->lastUserByAffiliatesCriteria->equals($criteria)) {
					$this->collUserByAffiliates = UserByAffiliatePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUserByAffiliatesCriteria = $criteria;

		return $this->collUserByAffiliates;
	}
	

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this UsersByAffiliateUserInfo is new, it will return
	 * an empty collection; or if this UsersByAffiliateUserInfo has previously
	 * been saved, it will retrieve related UserByAffiliates from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in UsersByAffiliateUserInfo.
	 */
	public function getUserByAffiliatesJoinUsersByAffiliateUserInfo($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/UserByAffiliatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		
		if ($this->collUserByAffiliates === null) {
			if ($this->isNew()) {
			   $this->collUserByAffiliates = array();
			} else {
	   
				$criteria->add(UserByAffiliatePeer::ID, $this->getUserid());
				$this->collUserByAffiliates = UserByAffiliatePeer::doSelectJoinUsersByAffiliateUserInfo($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.
	  
			$criteria->add(UserByAffiliatePeer::ID, $this->getUserid());
			if (!isset($this->lastUserByAffiliatesCriteria) || !$this->lastUserByAffiliatesCriteria->equals($criteria)) {
				$this->collUserByAffiliates = UserByAffiliatePeer::doSelectJoinUsersByAffiliateUserInfo($criteria, $con);
			}
		}
		$this->lastUserByAffiliatesCriteria = $criteria;

		return $this->collUserByAffiliates;
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this UsersByAffiliateUserInfo is new, it will return
	 * an empty collection; or if this UsersByAffiliateUserInfo has previously
	 * been saved, it will retrieve related UserByAffiliates from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in UsersByAffiliateUserInfo.
	 */
	public function getUserByAffiliatesJoinUsersByAffiliateLevel($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/UserByAffiliatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		
		if ($this->collUserByAffiliates === null) {
			if ($this->isNew()) {
			   $this->collUserByAffiliates = array();
			} else {
	   
				$criteria->add(UserByAffiliatePeer::ID, $this->getUserid());
				$this->collUserByAffiliates = UserByAffiliatePeer::doSelectJoinUsersByAffiliateLevel($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.
	  
			$criteria->add(UserByAffiliatePeer::ID, $this->getUserid());
			if (!isset($this->lastUserByAffiliatesCriteria) || !$this->lastUserByAffiliatesCriteria->equals($criteria)) {
				$this->collUserByAffiliates = UserByAffiliatePeer::doSelectJoinUsersByAffiliateLevel($criteria, $con);
			}
		}
		$this->lastUserByAffiliatesCriteria = $criteria;

		return $this->collUserByAffiliates;
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this UsersByAffiliateUserInfo is new, it will return
	 * an empty collection; or if this UsersByAffiliateUserInfo has previously
	 * been saved, it will retrieve related UserByAffiliates from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in UsersByAffiliateUserInfo.
	 */
	public function getUserByAffiliatesJoinAffiliate($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/UserByAffiliatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		
		if ($this->collUserByAffiliates === null) {
			if ($this->isNew()) {
			   $this->collUserByAffiliates = array();
			} else {
	   
				$criteria->add(UserByAffiliatePeer::ID, $this->getUserid());
				$this->collUserByAffiliates = UserByAffiliatePeer::doSelectJoinAffiliate($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.
	  
			$criteria->add(UserByAffiliatePeer::ID, $this->getUserid());
			if (!isset($this->lastUserByAffiliatesCriteria) || !$this->lastUserByAffiliatesCriteria->equals($criteria)) {
				$this->collUserByAffiliates = UserByAffiliatePeer::doSelectJoinAffiliate($criteria, $con);
			}
		}
		$this->lastUserByAffiliatesCriteria = $criteria;

		return $this->collUserByAffiliates;
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
			$con = Propel::getConnection(UsersByAffiliateUserInfoPeer::DATABASE_NAME);

		try {
			$con->begin();
			UsersByAffiliateUserInfoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(UsersByAffiliateUserInfoPeer::DATABASE_NAME);

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
 
			if ($this->aUserByAffiliate !== null) {
				if ($this->aUserByAffiliate->isModified()) $this->aUserByAffiliate->save($con);
				$this->setUserByAffiliate($this->aUserByAffiliate);
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UsersByAffiliateUserInfoPeer::doInsert($this, $con);
					$this->setNew(false);
				} else {
					UsersByAffiliateUserInfoPeer::doUpdate($this, $con);
				}			
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}
			if ($this->collUserByAffiliates !== null) {
				for ($i=0,$size=count($this->collUserByAffiliates); $i < $size; $i++) {
					$this->collUserByAffiliates[$i]->save($con);
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
		return UsersByAffiliateUserInfoPeer::doValidate($this, $columns);
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
			if ($this->aUserByAffiliate !== null) {
				if (($retval = $this->aUserByAffiliate->validate()) !== true) {
					$failureMap = array_merge($failureMap, $retval);
				}
			}

			if (($retval = UsersByAffiliateUserInfoPeer::doValidate($this)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}
	  
			if ($this->collUserByAffiliates !== null) {
				for ($i=0,$size=count($this->collUserByAffiliates); $i < $size; $i++) {
					if (($retval = $this->collUserByAffiliates[$i]->validate()) !== true) {
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
	 * @return UsersByAffiliateUserInfo Clone of current object.
	 * @throws PropelException
	 */
	public function copy($deepCopy = false) 
	{
		$copyObj = new UsersByAffiliateUserInfo();
		$copyObj->setName($this->name);
		$copyObj->setSurname($this->surname);

		if ($deepCopy) {		
			// important: setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getUserByAffiliates() as $relObj) {
				$copyObj->addUserByAffiliate($relObj->copy());
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
	 * @return UsersByAffiliateUserInfoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new UsersByAffiliateUserInfoPeer();
		}
		return self::$peer;
	}

}
