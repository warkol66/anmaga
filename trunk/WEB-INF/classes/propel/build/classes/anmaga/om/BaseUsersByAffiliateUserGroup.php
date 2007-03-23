<?php 

require_once 'propel/om/BaseObject.php';

 
require_once 'propel/om/Persistent.php';

 

include_once 'propel/util/Criteria.php';
 

// (on-demand) include_once 'anmaga/UserByAffiliate.php';
// (on-demand) include_once 'anmaga/UserByAffiliatePeer.php';
 

// (on-demand) include_once 'anmaga/UsersByAffiliateGroup.php';
// (on-demand) include_once 'anmaga/UsersByAffiliateGroupPeer.php';

include_once 'anmaga/UsersByAffiliateUserGroupPeer.php';

/**
 * Base class that represents a row from the 'usersByAffiliate_userGroup' table.
 *
 * Users / Groups 
 *
 * This class was autogenerated by Propel on:
 *
 * [03/20/07 16:00:41]
 *
 * You should not use this class directly.  It should not even be
 * extended; all references should be to UsersByAffiliateUserGroup class. 
 * 
 * @package anmaga 
 */
abstract class BaseUsersByAffiliateUserGroup extends BaseObject implements Persistent {
	
	/** 
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var UsersByAffiliateUserGroupPeer
	 */
	protected static $peer;

	/**
	 * The value for the userid field.
	 * @var int	  
	 */
	protected $userid;	

	/**
	 * The value for the groupid field.
	 * @var int	  
	 */
	protected $groupid;	
  
	/**
	 * Get the Userid column value.
	 * Group ID 
	 * @return int	  
	 */
	public function getUserid()
	{
		return $this->userid;
	}


	/**
	 * Set the value of `userid` column.	  
	 * Group ID 
	 * @param int $v new value
	 * @return void
	 * @throws PropelException 
	 */
	public function setUserid($v)
	{
		if ($this->userid !== $v) {
			$this->userid = $v;
			$this->modifiedColumns[] = UsersByAffiliateUserGroupPeer::USERID;
		}
			
		if ($this->aUserByAffiliate !== null && $this->aUserByAffiliate->getId() !== $v) {
			$this->aUserByAffiliate = null;
		}
			
	}

  
	/**
	 * Get the Groupid column value.
	 * Group ID 
	 * @return int	  
	 */
	public function getGroupid()
	{
		return $this->groupid;
	}


	/**
	 * Set the value of `groupid` column.	  
	 * Group ID 
	 * @param int $v new value
	 * @return void
	 * @throws PropelException 
	 */
	public function setGroupid($v)
	{
		if ($this->groupid !== $v) {
			$this->groupid = $v;
			$this->modifiedColumns[] = UsersByAffiliateUserGroupPeer::GROUPID;
		}
			
		if ($this->aUsersByAffiliateGroup !== null && $this->aUsersByAffiliateGroup->getId() !== $v) {
			$this->aUsersByAffiliateGroup = null;
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
			$this->groupid = $rs->getInt($startcol + 1);					
			 
			$this->resetModified();
			$this->setNew(false);
		
		} catch (Exception $e) {
			throw new PropelException("Error populating UsersByAffiliateUserGroup object", $e);
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
		$criteria = new Criteria(UsersByAffiliateUserGroupPeer::DATABASE_NAME);
		$criteria->add(UsersByAffiliateUserGroupPeer::USERID, $this->userid);
		$criteria->add(UsersByAffiliateUserGroupPeer::GROUPID, $this->groupid);
		return $criteria;			
	}
	
	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{		
		$criteria = new Criteria(UsersByAffiliateUserGroupPeer::DATABASE_NAME);
		if ($this->isColumnModified(UsersByAffiliateUserGroupPeer::USERID)) $criteria->add(UsersByAffiliateUserGroupPeer::USERID, $this->userid);
		if ($this->isColumnModified(UsersByAffiliateUserGroupPeer::GROUPID)) $criteria->add(UsersByAffiliateUserGroupPeer::GROUPID, $this->groupid);
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
			   $obj->addUsersByAffiliateUserGroups($this);
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
	 * @var UsersByAffiliateGroup	  
	 */
	protected $aUsersByAffiliateGroup;

	/**
	 * Declares an association between this object and a UsersByAffiliateGroup object
	 *
	 * @param UsersByAffiliateGroup $v
	 * @return void
	 * @throws PropelException
	 */
	public function setUsersByAffiliateGroup($v)
	{
			
		if ($v === null) {
			$this->setGroupid(NULL);
		} else {
			$this->setGroupid($v->getId());
		}
   
		$this->aUsersByAffiliateGroup = $v;
	}


	/**
	 * Get the associated UsersByAffiliateGroup object
	 *
	 * @param Connection Optional Connection object.
	 * @return UsersByAffiliateGroup The associated UsersByAffiliateGroup object.
	 * @throws PropelException
	 */
	public function getUsersByAffiliateGroup($con = null)
	{
		// include the Peer class
		include_once 'anmaga/UsersByAffiliateGroupPeer.php';

		if ($this->aUsersByAffiliateGroup === null && ($this->groupid !== null)) {
	
			$this->aUsersByAffiliateGroup = UsersByAffiliateGroupPeer::retrieveByPK($this->groupid, $con);
	
			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = UsersByAffiliateGroupPeer::retrieveByPK($this->groupid, $con);
			   $obj->addUsersByAffiliateUserGroups($this);
			 */
		}
		return $this->aUsersByAffiliateGroup;
	}

	/**
	 * Provides convenient way to set a relationship based on a
	 * key.  e.g.
	 * <code>$bar->setFooKey($foo->getPrimaryKey())</code>
	 *
 
	 * @return void
	 * @throws PropelException
	 */
	public function setUsersByAffiliateGroupKey($key)
	{

		$this->setGroupid( (int) $key);			
		
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
			$con = Propel::getConnection(UsersByAffiliateUserGroupPeer::DATABASE_NAME);

		try {
			$con->begin();
			UsersByAffiliateUserGroupPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(UsersByAffiliateUserGroupPeer::DATABASE_NAME);

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
 
			if ($this->aUsersByAffiliateGroup !== null) {
				if ($this->aUsersByAffiliateGroup->isModified()) $this->aUsersByAffiliateGroup->save($con);
				$this->setUsersByAffiliateGroup($this->aUsersByAffiliateGroup);
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UsersByAffiliateUserGroupPeer::doInsert($this, $con);
					$this->setNew(false);
				} else {
					UsersByAffiliateUserGroupPeer::doUpdate($this, $con);
				}			
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
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
		return UsersByAffiliateUserGroupPeer::doValidate($this, $columns);
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
			if ($this->aUsersByAffiliateGroup !== null) {
				if (($retval = $this->aUsersByAffiliateGroup->validate()) !== true) {
					$failureMap = array_merge($failureMap, $retval);
				}
			}

			if (($retval = UsersByAffiliateUserGroupPeer::doValidate($this)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}
	  
	  
			$this->alreadyInValidation = false;
		}
	
		return (!empty($failureMap) ? $failureMap : true);
	}
  


	private $pks = array();
	
	/**
	 * Set the PrimaryKey.
	 *
	 * @param array $keys The elements of the composite key (order must match the order in XML file).
	 * @return void
	 * @throws PropelException
	 */
	public function setPrimaryKey($keys)
	{						

		$this->setUserid($keys[0]);

		$this->setGroupid($keys[1]);

	}


	/**
	 * Returns an id that differentiates this object from others
	 * of its class.
	 * @return array 
	 */
	public function getPrimaryKey()
	{
		$this->pks[0] = $this->getUserid();
		$this->pks[1] = $this->getGroupid();
		return $this->pks;

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
	 * @return UsersByAffiliateUserGroup Clone of current object.
	 * @throws PropelException
	 */
	public function copy($deepCopy = false) 
	{
		$copyObj = new UsersByAffiliateUserGroup();
		
		$copyObj->setNew(true);
		
		$copyObj->setUserid(NULL); // this is a pkey column, so set to default value
		$copyObj->setGroupid(NULL); // this is a pkey column, so set to default value

		return $copyObj;
	}
		

	/**
	 * returns a peer instance associated with this om.  Since Peer classes	
	 * are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 * @return UsersByAffiliateUserGroupPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new UsersByAffiliateUserGroupPeer();
		}
		return self::$peer;
	}

}
