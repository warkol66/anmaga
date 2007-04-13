<?php 

require_once 'propel/om/BaseObject.php';

 
require_once 'propel/om/Persistent.php';

 

include_once 'propel/util/Criteria.php';
 

// (on-demand) include_once 'anmaga/Affiliate.php';
// (on-demand) include_once 'anmaga/AffiliatePeer.php';

include_once 'anmaga/AffiliateInfoPeer.php';

/**
 * Base class that represents a row from the 'affiliateInfo' table.
 *
 * Informacion del afiliado 
 *
 * This class was autogenerated by Propel on:
 *
 * [04/09/07 18:45:45]
 *
 * You should not use this class directly.  It should not even be
 * extended; all references should be to AffiliateInfo class. 
 * 
 * @package anmaga 
 */
abstract class BaseAffiliateInfo extends BaseObject implements Persistent {
	
	/** 
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var AffiliateInfoPeer
	 */
	protected static $peer;

	/**
	 * The value for the affiliateid field.
	 * @var int	  
	 */
	protected $affiliateid;	

	/**
	 * The value for the affiliateinternalnumber field.
	 * @var int	  
	 */
	protected $affiliateinternalnumber;	

	/**
	 * The value for the address field.
	 * @var string	  
	 */
	protected $address;	

	/**
	 * The value for the phone field.
	 * @var string	  
	 */
	protected $phone;	

	/**
	 * The value for the email field.
	 * @var string	  
	 */
	protected $email;	

	/**
	 * The value for the contact field.
	 * @var string	  
	 */
	protected $contact;	
  
	/**
	 * Get the Affiliateid column value.
	 * Id afiliado 
	 * @return int	  
	 */
	public function getAffiliateid()
	{
		return $this->affiliateid;
	}


	/**
	 * Set the value of `affiliateid` column.	  
	 * Id afiliado 
	 * @param int $v new value
	 * @return void
	 * @throws PropelException 
	 */
	public function setAffiliateid($v)
	{
		if ($this->affiliateid !== $v) {
			$this->affiliateid = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::AFFILIATEID;
		}
			
		if ($this->aAffiliate !== null && $this->aAffiliate->getId() !== $v) {
			$this->aAffiliate = null;
		}
		
		  // update associated Affiliate		  
		  if ($this->collAffiliates !== null) {
			  for ($i=0,$size=count($this->collAffiliates); $i < $size; $i++) {
				  $this->collAffiliates[$i]->setId($v);
			  }
		  }
			  		
	}

  
	/**
	 * Get the Affiliateinternalnumber column value.
	 * Id interno 
	 * @return int	  
	 */
	public function getAffiliateinternalnumber()
	{
		return $this->affiliateinternalnumber;
	}


	/**
	 * Set the value of `affiliateinternalnumber` column.	  
	 * Id interno 
	 * @param int $v new value
	 * @return void
	 *  
	 */
	public function setAffiliateinternalnumber($v)
	{
		if ($this->affiliateinternalnumber !== $v) {
			$this->affiliateinternalnumber = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::AFFILIATEINTERNALNUMBER;
		}
				
	}

  
	/**
	 * Get the Address column value.
	 * Direccion afiliado 
	 * @return string	  
	 */
	public function getAddress()
	{
		return $this->address;
	}


	/**
	 * Set the value of `address` column.	  
	 * Direccion afiliado 
	 * @param string $v new value
	 * @return void
	 *  
	 */
	public function setAddress($v)
	{
		if ($this->address !== $v) {
			$this->address = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::ADDRESS;
		}
				
	}

  
	/**
	 * Get the Phone column value.
	 * Telefono afiliado 
	 * @return string	  
	 */
	public function getPhone()
	{
		return $this->phone;
	}


	/**
	 * Set the value of `phone` column.	  
	 * Telefono afiliado 
	 * @param string $v new value
	 * @return void
	 *  
	 */
	public function setPhone($v)
	{
		if ($this->phone !== $v) {
			$this->phone = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::PHONE;
		}
				
	}

  
	/**
	 * Get the Email column value.
	 * Email afiliado 
	 * @return string	  
	 */
	public function getEmail()
	{
		return $this->email;
	}


	/**
	 * Set the value of `email` column.	  
	 * Email afiliado 
	 * @param string $v new value
	 * @return void
	 *  
	 */
	public function setEmail($v)
	{
		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::EMAIL;
		}
				
	}

  
	/**
	 * Get the Contact column value.
	 * Nombre de persona de contacto 
	 * @return string	  
	 */
	public function getContact()
	{
		return $this->contact;
	}


	/**
	 * Set the value of `contact` column.	  
	 * Nombre de persona de contacto 
	 * @param string $v new value
	 * @return void
	 *  
	 */
	public function setContact($v)
	{
		if ($this->contact !== $v) {
			$this->contact = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::CONTACT;
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
			$this->affiliateid = $rs->getInt($startcol + 0);					
			$this->affiliateinternalnumber = $rs->getInt($startcol + 1);					
			$this->address = $rs->getString($startcol + 2);					
			$this->phone = $rs->getString($startcol + 3);					
			$this->email = $rs->getString($startcol + 4);					
			$this->contact = $rs->getString($startcol + 5);					
			 
			$this->resetModified();
			$this->setNew(false);
		
		} catch (Exception $e) {
			throw new PropelException("Error populating AffiliateInfo object", $e);
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
		$criteria = new Criteria(AffiliateInfoPeer::DATABASE_NAME);
		$criteria->add(AffiliateInfoPeer::AFFILIATEID, $this->affiliateid);
		return $criteria;			
	}
	
	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{		
		$criteria = new Criteria(AffiliateInfoPeer::DATABASE_NAME);
		if ($this->isColumnModified(AffiliateInfoPeer::AFFILIATEID)) $criteria->add(AffiliateInfoPeer::AFFILIATEID, $this->affiliateid);
		if ($this->isColumnModified(AffiliateInfoPeer::AFFILIATEINTERNALNUMBER)) $criteria->add(AffiliateInfoPeer::AFFILIATEINTERNALNUMBER, $this->affiliateinternalnumber);
		if ($this->isColumnModified(AffiliateInfoPeer::ADDRESS)) $criteria->add(AffiliateInfoPeer::ADDRESS, $this->address);
		if ($this->isColumnModified(AffiliateInfoPeer::PHONE)) $criteria->add(AffiliateInfoPeer::PHONE, $this->phone);
		if ($this->isColumnModified(AffiliateInfoPeer::EMAIL)) $criteria->add(AffiliateInfoPeer::EMAIL, $this->email);
		if ($this->isColumnModified(AffiliateInfoPeer::CONTACT)) $criteria->add(AffiliateInfoPeer::CONTACT, $this->contact);
		return $criteria;			
	}
	
	

	/**
	 * @var Affiliate	  
	 */
	protected $aAffiliate;

	/**
	 * Declares an association between this object and a Affiliate object
	 *
	 * @param Affiliate $v
	 * @return void
	 * @throws PropelException
	 */
	public function setAffiliate($v)
	{
			
		if ($v === null) {
			$this->setAffiliateid(NULL);
		} else {
			$this->setAffiliateid($v->getId());
		}
   
		$this->aAffiliate = $v;
	}


	/**
	 * Get the associated Affiliate object
	 *
	 * @param Connection Optional Connection object.
	 * @return Affiliate The associated Affiliate object.
	 * @throws PropelException
	 */
	public function getAffiliate($con = null)
	{
		// include the Peer class
		include_once 'anmaga/AffiliatePeer.php';

		if ($this->aAffiliate === null && ($this->affiliateid !== null)) {
	
			$this->aAffiliate = AffiliatePeer::retrieveByPK($this->affiliateid, $con);
	
			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = AffiliatePeer::retrieveByPK($this->affiliateid, $con);
			   $obj->addAffiliateInfos($this);
			 */
		}
		return $this->aAffiliate;
	}

	/**
	 * Provides convenient way to set a relationship based on a
	 * key.  e.g.
	 * <code>$bar->setFooKey($foo->getPrimaryKey())</code>
	 *
 
	 * @return void
	 * @throws PropelException
	 */
	public function setAffiliateKey($key)
	{

		$this->setAffiliateid( (int) $key);			
		
	}

	/**
	 * Collection to store aggregation of collAffiliates	  
	 * @var array
	 */
	protected $collAffiliates; 

	/**
	 * Temporary storage of collAffiliates to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initAffiliates()
	{
		if ($this->collAffiliates === null) {
			$this->collAffiliates = array();
		}
	}

	/**
	 * Method called to associate a Affiliate object to this object
	 * through the Affiliate foreign key attribute
	 *
	 * @param Affiliate $l $className
	 * @return void
	 * @throws PropelException
	 */
	public function addAffiliate(Affiliate $l)
	{
		$this->collAffiliates[] = $l;
		$l->setAffiliateInfo($this);
	}

	/**
	 * The criteria used to select the current contents of collAffiliates.
	 * @var Criteria
	 */
	private $lastAffiliatesCriteria = null;

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AffiliateInfo has previously
	 * been saved, it will retrieve related Affiliates from storage.
	 * If this AffiliateInfo is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getAffiliates($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/AffiliatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
				
		if ($this->collAffiliates === null) {
			if ($this->isNew()) {
			   $this->collAffiliates = array();
			} else {
	
				$criteria->add(AffiliatePeer::ID, $this->getAffiliateid() );

				$this->collAffiliates = AffiliatePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.

				$criteria->add(AffiliatePeer::ID, $this->getAffiliateid());

				if (!isset($this->lastAffiliatesCriteria) || !$this->lastAffiliatesCriteria->equals($criteria)) {
					$this->collAffiliates = AffiliatePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAffiliatesCriteria = $criteria;

		return $this->collAffiliates;
	}
	

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AffiliateInfo is new, it will return
	 * an empty collection; or if this AffiliateInfo has previously
	 * been saved, it will retrieve related Affiliates from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AffiliateInfo.
	 */
	public function getAffiliatesJoinAffiliateInfo($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/AffiliatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		
		if ($this->collAffiliates === null) {
			if ($this->isNew()) {
			   $this->collAffiliates = array();
			} else {
	   
				$criteria->add(AffiliatePeer::ID, $this->getAffiliateid());
				$this->collAffiliates = AffiliatePeer::doSelectJoinAffiliateInfo($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.
	  
			$criteria->add(AffiliatePeer::ID, $this->getAffiliateid());
			if (!isset($this->lastAffiliatesCriteria) || !$this->lastAffiliatesCriteria->equals($criteria)) {
				$this->collAffiliates = AffiliatePeer::doSelectJoinAffiliateInfo($criteria, $con);
			}
		}
		$this->lastAffiliatesCriteria = $criteria;

		return $this->collAffiliates;
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
			$con = Propel::getConnection(AffiliateInfoPeer::DATABASE_NAME);

		try {
			$con->begin();
			AffiliateInfoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AffiliateInfoPeer::DATABASE_NAME);

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
 
			if ($this->aAffiliate !== null) {
				if ($this->aAffiliate->isModified()) $this->aAffiliate->save($con);
				$this->setAffiliate($this->aAffiliate);
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AffiliateInfoPeer::doInsert($this, $con);
					$this->setNew(false);
				} else {
					AffiliateInfoPeer::doUpdate($this, $con);
				}			
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}
			if ($this->collAffiliates !== null) {
				for ($i=0,$size=count($this->collAffiliates); $i < $size; $i++) {
					$this->collAffiliates[$i]->save($con);
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
		return AffiliateInfoPeer::doValidate($this, $columns);
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
			if ($this->aAffiliate !== null) {
				if (($retval = $this->aAffiliate->validate()) !== true) {
					$failureMap = array_merge($failureMap, $retval);
				}
			}

			if (($retval = AffiliateInfoPeer::doValidate($this)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}
	  
			if ($this->collAffiliates !== null) {
				for ($i=0,$size=count($this->collAffiliates); $i < $size; $i++) {
					if (($retval = $this->collAffiliates[$i]->validate()) !== true) {
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
	 * @param mixed affiliateid Primary key.
	 * @return void
	 * @throws PropelException	 */
	public function setPrimaryKey($key) 
	{		
		$this->setAffiliateid($key);
	}
	

	/**
	 * Returns an id that differentiates this object from others
	 * of its class.
	 * @return int 
	 */
	public function getPrimaryKey()
	{

		return $this->getAffiliateid();

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
	 * @return AffiliateInfo Clone of current object.
	 * @throws PropelException
	 */
	public function copy($deepCopy = false) 
	{
		$copyObj = new AffiliateInfo();
		$copyObj->setAffiliateinternalnumber($this->affiliateinternalnumber);
		$copyObj->setAddress($this->address);
		$copyObj->setPhone($this->phone);
		$copyObj->setEmail($this->email);
		$copyObj->setContact($this->contact);

		if ($deepCopy) {		
			// important: setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getAffiliates() as $relObj) {
				$copyObj->addAffiliate($relObj->copy());
			}
		} // if ($deepCopy)
		
		$copyObj->setNew(true);
		
		$copyObj->setAffiliateid(NULL); // this is a pkey column, so set to default value

		return $copyObj;
	}
		

	/**
	 * returns a peer instance associated with this om.  Since Peer classes	
	 * are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 * @return AffiliateInfoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AffiliateInfoPeer();
		}
		return self::$peer;
	}

}
