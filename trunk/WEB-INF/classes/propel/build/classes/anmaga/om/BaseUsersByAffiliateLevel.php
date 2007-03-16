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
 * [03/16/07 16:42:35]
 *
 * You should not use this class directly.  It should not even be
 * extended; all references should be to UsersByAffiliateLevel class. 
 * 
 * @package anmaga 
 */
abstract class BaseUsersByAffiliateLevel extends BaseObject implements Persistent {
	
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
	 * Get the Id column value.
	 * Level ID 
	 * @return int	  
	 */
	public function getId()
	{
		return $this->id;
	}


	/**
	 * Set the value of `id` column.	  
	 * Level ID 
	 * @param int $v new value
	 * @return void
	 * @throws PropelException 
	 */
	public function setId($v)
	{
		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UsersByAffiliateLevelPeer::ID;
		}
			
		  // update associated UserByAffiliate		  
		  if ($this->collUserByAffiliates !== null) {
			  for ($i=0,$size=count($this->collUserByAffiliates); $i < $size; $i++) {
				  $this->collUserByAffiliates[$i]->setLevelid($v);
			  }
		  }
			  		
	}

  
	/**
	 * Get the Name column value.
	 * Level Name 
	 * @return string	  
	 */
	public function getName()
	{
		return $this->name;
	}


	/**
	 * Set the value of `name` column.	  
	 * Level Name 
	 * @param string $v new value
	 * @return void
	 *  
	 */
	public function setName($v)
	{
		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = UsersByAffiliateLevelPeer::NAME;
		}
				
	}

  
	/**
	 * Get the Bitlevel column value.
	 * Bit del nivel 
	 * @return int	  
	 */
	public function getBitlevel()
	{
		return $this->bitlevel;
	}


	/**
	 * Set the value of `bitlevel` column.	  
	 * Bit del nivel 
	 * @param int $v new value
	 * @return void
	 *  
	 */
	public function setBitlevel($v)
	{
		if ($this->bitlevel !== $v) {
			$this->bitlevel = $v;
			$this->modifiedColumns[] = UsersByAffiliateLevelPeer::BITLEVEL;
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
			$this->id = $rs->getInt($startcol + 0);					
			$this->name = $rs->getString($startcol + 1);					
			$this->bitlevel = $rs->getInt($startcol + 2);					
			 
			$this->resetModified();
			$this->setNew(false);
		
		} catch (Exception $e) {
			throw new PropelException("Error populating UsersByAffiliateLevel object", $e);
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
		$criteria = new Criteria(UsersByAffiliateLevelPeer::DATABASE_NAME);
		$criteria->add(UsersByAffiliateLevelPeer::ID, $this->id);
		return $criteria;			
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
		$l->setUsersByAffiliateLevel($this);
	}

	/**
	 * The criteria used to select the current contents of collUserByAffiliates.
	 * @var Criteria
	 */
	private $lastUserByAffiliatesCriteria = null;

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
		include_once 'anmaga/UserByAffiliatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
				
		if ($this->collUserByAffiliates === null) {
			if ($this->isNew()) {
			   $this->collUserByAffiliates = array();
			} else {
	
				$criteria->add(UserByAffiliatePeer::LEVELID, $this->getId() );

				$this->collUserByAffiliates = UserByAffiliatePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.

				$criteria->add(UserByAffiliatePeer::LEVELID, $this->getId());

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
		include_once 'anmaga/UserByAffiliatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
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
	 * Otherwise if this UsersByAffiliateLevel is new, it will return
	 * an empty collection; or if this UsersByAffiliateLevel has previously
	 * been saved, it will retrieve related UserByAffiliates from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in UsersByAffiliateLevel.
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
	   
				$criteria->add(UserByAffiliatePeer::LEVELID, $this->getId());
				$this->collUserByAffiliates = UserByAffiliatePeer::doSelectJoinUsersByAffiliateLevel($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.
	  
			$criteria->add(UserByAffiliatePeer::LEVELID, $this->getId());
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
		include_once 'anmaga/UserByAffiliatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
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
			$con = Propel::getConnection(UsersByAffiliateLevelPeer::DATABASE_NAME);

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
			$con = Propel::getConnection(UsersByAffiliateLevelPeer::DATABASE_NAME);

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

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UsersByAffiliateLevelPeer::doInsert($this, $con);
					$this->setId( $pk );  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					UsersByAffiliateLevelPeer::doUpdate($this, $con);
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
		return UsersByAffiliateLevelPeer::doValidate($this, $columns);
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

			if (($retval = UsersByAffiliateLevelPeer::doValidate($this)) !== true) {
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
	 * @param mixed id Primary key.
	 * @return void
	 * @throws PropelException	 */
	public function setPrimaryKey($key) 
	{		
		$this->setId($key);
	}
	

	/**
	 * Returns an id that differentiates this object from others
	 * of its class.
	 * @return int 
	 */
	public function getPrimaryKey()
	{

		return $this->getId();

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
	 * @return UsersByAffiliateLevel Clone of current object.
	 * @throws PropelException
	 */
	public function copy($deepCopy = false) 
	{
		$copyObj = new UsersByAffiliateLevel();
		$copyObj->setName($this->name);
		$copyObj->setBitlevel($this->bitlevel);

		if ($deepCopy) {		
			// important: setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getUserByAffiliates() as $relObj) {
				$copyObj->addUserByAffiliate($relObj->copy());
			}
		} // if ($deepCopy)
		
		$copyObj->setNew(true);
		
		$copyObj->setId(NULL); // this is a pkey column, so set to default value

		return $copyObj;
	}
		

	/**
	 * returns a peer instance associated with this om.  Since Peer classes	
	 * are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 * @return UsersByAffiliateLevelPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new UsersByAffiliateLevelPeer();
		}
		return self::$peer;
	}

}
