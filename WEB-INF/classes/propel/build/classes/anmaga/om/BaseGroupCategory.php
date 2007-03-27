<?php 

require_once 'propel/om/BaseObject.php';

 
require_once 'propel/om/Persistent.php';

 

include_once 'propel/util/Criteria.php';
 

// (on-demand) include_once 'anmaga/Group.php';
// (on-demand) include_once 'anmaga/GroupPeer.php';
 

// (on-demand) include_once 'anmaga/Category.php';
// (on-demand) include_once 'anmaga/CategoryPeer.php';

include_once 'anmaga/GroupCategoryPeer.php';

/**
 * Base class that represents a row from the 'users_groupCategory' table.
 *
 * Groups / Categories 
 *
 * This class was autogenerated by Propel on:
 *
 * [03/26/07 21:38:37]
 *
 * You should not use this class directly.  It should not even be
 * extended; all references should be to GroupCategory class. 
 * 
 * @package anmaga 
 */
abstract class BaseGroupCategory extends BaseObject implements Persistent {
	
	/** 
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var GroupCategoryPeer
	 */
	protected static $peer;

	/**
	 * The value for the groupid field.
	 * @var int	  
	 */
	protected $groupid;	

	/**
	 * The value for the categoryid field.
	 * @var int	  
	 */
	protected $categoryid;	
  
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
			$this->modifiedColumns[] = GroupCategoryPeer::GROUPID;
		}
			
		if ($this->aGroup !== null && $this->aGroup->getId() !== $v) {
			$this->aGroup = null;
		}
			
	}

  
	/**
	 * Get the Categoryid column value.
	 * Category ID 
	 * @return int	  
	 */
	public function getCategoryid()
	{
		return $this->categoryid;
	}


	/**
	 * Set the value of `categoryid` column.	  
	 * Category ID 
	 * @param int $v new value
	 * @return void
	 * @throws PropelException 
	 */
	public function setCategoryid($v)
	{
		if ($this->categoryid !== $v) {
			$this->categoryid = $v;
			$this->modifiedColumns[] = GroupCategoryPeer::CATEGORYID;
		}
			
		if ($this->aCategory !== null && $this->aCategory->getId() !== $v) {
			$this->aCategory = null;
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
			$this->groupid = $rs->getInt($startcol + 0);					
			$this->categoryid = $rs->getInt($startcol + 1);					
			 
			$this->resetModified();
			$this->setNew(false);
		
		} catch (Exception $e) {
			throw new PropelException("Error populating GroupCategory object", $e);
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
		$criteria = new Criteria(GroupCategoryPeer::DATABASE_NAME);
		$criteria->add(GroupCategoryPeer::GROUPID, $this->groupid);
		$criteria->add(GroupCategoryPeer::CATEGORYID, $this->categoryid);
		return $criteria;			
	}
	
	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{		
		$criteria = new Criteria(GroupCategoryPeer::DATABASE_NAME);
		if ($this->isColumnModified(GroupCategoryPeer::GROUPID)) $criteria->add(GroupCategoryPeer::GROUPID, $this->groupid);
		if ($this->isColumnModified(GroupCategoryPeer::CATEGORYID)) $criteria->add(GroupCategoryPeer::CATEGORYID, $this->categoryid);
		return $criteria;			
	}
	
	

	/**
	 * @var Group	  
	 */
	protected $aGroup;

	/**
	 * Declares an association between this object and a Group object
	 *
	 * @param Group $v
	 * @return void
	 * @throws PropelException
	 */
	public function setGroup($v)
	{
			
		if ($v === null) {
			$this->setGroupid(NULL);
		} else {
			$this->setGroupid($v->getId());
		}
   
		$this->aGroup = $v;
	}


	/**
	 * Get the associated Group object
	 *
	 * @param Connection Optional Connection object.
	 * @return Group The associated Group object.
	 * @throws PropelException
	 */
	public function getGroup($con = null)
	{
		// include the Peer class
		include_once 'anmaga/GroupPeer.php';

		if ($this->aGroup === null && ($this->groupid !== null)) {
	
			$this->aGroup = GroupPeer::retrieveByPK($this->groupid, $con);
	
			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = GroupPeer::retrieveByPK($this->groupid, $con);
			   $obj->addGroupCategorys($this);
			 */
		}
		return $this->aGroup;
	}

	/**
	 * Provides convenient way to set a relationship based on a
	 * key.  e.g.
	 * <code>$bar->setFooKey($foo->getPrimaryKey())</code>
	 *
 
	 * @return void
	 * @throws PropelException
	 */
	public function setGroupKey($key)
	{

		$this->setGroupid( (int) $key);			
		
	}

	/**
	 * @var Category	  
	 */
	protected $aCategory;

	/**
	 * Declares an association between this object and a Category object
	 *
	 * @param Category $v
	 * @return void
	 * @throws PropelException
	 */
	public function setCategory($v)
	{
			
		if ($v === null) {
			$this->setCategoryid(NULL);
		} else {
			$this->setCategoryid($v->getId());
		}
   
		$this->aCategory = $v;
	}


	/**
	 * Get the associated Category object
	 *
	 * @param Connection Optional Connection object.
	 * @return Category The associated Category object.
	 * @throws PropelException
	 */
	public function getCategory($con = null)
	{
		// include the Peer class
		include_once 'anmaga/CategoryPeer.php';

		if ($this->aCategory === null && ($this->categoryid !== null)) {
	
			$this->aCategory = CategoryPeer::retrieveByPK($this->categoryid, $con);
	
			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = CategoryPeer::retrieveByPK($this->categoryid, $con);
			   $obj->addGroupCategorys($this);
			 */
		}
		return $this->aCategory;
	}

	/**
	 * Provides convenient way to set a relationship based on a
	 * key.  e.g.
	 * <code>$bar->setFooKey($foo->getPrimaryKey())</code>
	 *
 
	 * @return void
	 * @throws PropelException
	 */
	public function setCategoryKey($key)
	{

		$this->setCategoryid( (int) $key);			
		
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
			$con = Propel::getConnection(GroupCategoryPeer::DATABASE_NAME);

		try {
			$con->begin();
			GroupCategoryPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GroupCategoryPeer::DATABASE_NAME);

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
 
			if ($this->aGroup !== null) {
				if ($this->aGroup->isModified()) $this->aGroup->save($con);
				$this->setGroup($this->aGroup);
			}
 
			if ($this->aCategory !== null) {
				if ($this->aCategory->isModified()) $this->aCategory->save($con);
				$this->setCategory($this->aCategory);
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = GroupCategoryPeer::doInsert($this, $con);
					$this->setNew(false);
				} else {
					GroupCategoryPeer::doUpdate($this, $con);
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
		return GroupCategoryPeer::doValidate($this, $columns);
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
			if ($this->aGroup !== null) {
				if (($retval = $this->aGroup->validate()) !== true) {
					$failureMap = array_merge($failureMap, $retval);
				}
			}
			if ($this->aCategory !== null) {
				if (($retval = $this->aCategory->validate()) !== true) {
					$failureMap = array_merge($failureMap, $retval);
				}
			}

			if (($retval = GroupCategoryPeer::doValidate($this)) !== true) {
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

		$this->setGroupid($keys[0]);

		$this->setCategoryid($keys[1]);

	}


	/**
	 * Returns an id that differentiates this object from others
	 * of its class.
	 * @return array 
	 */
	public function getPrimaryKey()
	{
		$this->pks[0] = $this->getGroupid();
		$this->pks[1] = $this->getCategoryid();
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
	 * @return GroupCategory Clone of current object.
	 * @throws PropelException
	 */
	public function copy($deepCopy = false) 
	{
		$copyObj = new GroupCategory();
		
		$copyObj->setNew(true);
		
		$copyObj->setGroupid(NULL); // this is a pkey column, so set to default value
		$copyObj->setCategoryid(NULL); // this is a pkey column, so set to default value

		return $copyObj;
	}
		

	/**
	 * returns a peer instance associated with this om.  Since Peer classes	
	 * are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 * @return GroupCategoryPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new GroupCategoryPeer();
		}
		return self::$peer;
	}

}
