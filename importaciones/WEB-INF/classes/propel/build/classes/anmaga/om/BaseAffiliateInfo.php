<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'anmaga/AffiliateInfoPeer.php';

/**
 * Base class that represents a row from the 'affiliates_affiliateInfo' table.
 *
 * Informacion del afiliado
 *
 * This class was autogenerated by Propel on:
 *
 * 12/05/07 13:19:18
 *
 * @package    anmaga.om
 */
abstract class BaseAffiliateInfo extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AffiliateInfoPeer
	 */
	protected static $peer;


	/**
	 * The value for the affiliateid field.
	 * @var        int
	 */
	protected $affiliateid;


	/**
	 * The value for the affiliateinternalnumber field.
	 * @var        int
	 */
	protected $affiliateinternalnumber;


	/**
	 * The value for the address field.
	 * @var        string
	 */
	protected $address;


	/**
	 * The value for the phone field.
	 * @var        string
	 */
	protected $phone;


	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;


	/**
	 * The value for the contact field.
	 * @var        string
	 */
	protected $contact;


	/**
	 * The value for the contactemail field.
	 * @var        string
	 */
	protected $contactemail;


	/**
	 * The value for the web field.
	 * @var        string
	 */
	protected $web;


	/**
	 * The value for the memo field.
	 * @var        string
	 */
	protected $memo;

	/**
	 * @var        Affiliate
	 */
	protected $aAffiliate;

	/**
	 * Collection to store aggregation of collAffiliates.
	 * @var        array
	 */
	protected $collAffiliates;

	/**
	 * The criteria used to select the current contents of collAffiliates.
	 * @var        Criteria
	 */
	protected $lastAffiliateCriteria = null;

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
	 * Get the [affiliateid] column value.
	 * Id afiliado
	 * @return     int
	 */
	public function getAffiliateid()
	{

		return $this->affiliateid;
	}

	/**
	 * Get the [affiliateinternalnumber] column value.
	 * Id interno
	 * @return     int
	 */
	public function getAffiliateinternalnumber()
	{

		return $this->affiliateinternalnumber;
	}

	/**
	 * Get the [address] column value.
	 * Direccion afiliado
	 * @return     string
	 */
	public function getAddress()
	{

		return $this->address;
	}

	/**
	 * Get the [phone] column value.
	 * Telefono afiliado
	 * @return     string
	 */
	public function getPhone()
	{

		return $this->phone;
	}

	/**
	 * Get the [email] column value.
	 * Email afiliado
	 * @return     string
	 */
	public function getEmail()
	{

		return $this->email;
	}

	/**
	 * Get the [contact] column value.
	 * Nombre de persona de contacto
	 * @return     string
	 */
	public function getContact()
	{

		return $this->contact;
	}

	/**
	 * Get the [contactemail] column value.
	 * Email de persona de contacto
	 * @return     string
	 */
	public function getContactemail()
	{

		return $this->contactemail;
	}

	/**
	 * Get the [web] column value.
	 * Direccion web del afiliado
	 * @return     string
	 */
	public function getWeb()
	{

		return $this->web;
	}

	/**
	 * Get the [memo] column value.
	 * Informacion adicional del afiliado
	 * @return     string
	 */
	public function getMemo()
	{

		return $this->memo;
	}

	/**
	 * Set the value of [affiliateid] column.
	 * Id afiliado
	 * @param      int $v new value
	 * @return     void
	 */
	public function setAffiliateid($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->affiliateid !== $v) {
			$this->affiliateid = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::AFFILIATEID;
		}

		if ($this->aAffiliate !== null && $this->aAffiliate->getId() !== $v) {
			$this->aAffiliate = null;
		}

	} // setAffiliateid()

	/**
	 * Set the value of [affiliateinternalnumber] column.
	 * Id interno
	 * @param      int $v new value
	 * @return     void
	 */
	public function setAffiliateinternalnumber($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->affiliateinternalnumber !== $v) {
			$this->affiliateinternalnumber = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::AFFILIATEINTERNALNUMBER;
		}

	} // setAffiliateinternalnumber()

	/**
	 * Set the value of [address] column.
	 * Direccion afiliado
	 * @param      string $v new value
	 * @return     void
	 */
	public function setAddress($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->address !== $v) {
			$this->address = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::ADDRESS;
		}

	} // setAddress()

	/**
	 * Set the value of [phone] column.
	 * Telefono afiliado
	 * @param      string $v new value
	 * @return     void
	 */
	public function setPhone($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->phone !== $v) {
			$this->phone = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::PHONE;
		}

	} // setPhone()

	/**
	 * Set the value of [email] column.
	 * Email afiliado
	 * @param      string $v new value
	 * @return     void
	 */
	public function setEmail($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::EMAIL;
		}

	} // setEmail()

	/**
	 * Set the value of [contact] column.
	 * Nombre de persona de contacto
	 * @param      string $v new value
	 * @return     void
	 */
	public function setContact($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->contact !== $v) {
			$this->contact = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::CONTACT;
		}

	} // setContact()

	/**
	 * Set the value of [contactemail] column.
	 * Email de persona de contacto
	 * @param      string $v new value
	 * @return     void
	 */
	public function setContactemail($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->contactemail !== $v) {
			$this->contactemail = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::CONTACTEMAIL;
		}

	} // setContactemail()

	/**
	 * Set the value of [web] column.
	 * Direccion web del afiliado
	 * @param      string $v new value
	 * @return     void
	 */
	public function setWeb($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->web !== $v) {
			$this->web = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::WEB;
		}

	} // setWeb()

	/**
	 * Set the value of [memo] column.
	 * Informacion adicional del afiliado
	 * @param      string $v new value
	 * @return     void
	 */
	public function setMemo($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->memo !== $v) {
			$this->memo = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::MEMO;
		}

	} // setMemo()

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

			$this->affiliateid = $rs->getInt($startcol + 0);

			$this->affiliateinternalnumber = $rs->getInt($startcol + 1);

			$this->address = $rs->getString($startcol + 2);

			$this->phone = $rs->getString($startcol + 3);

			$this->email = $rs->getString($startcol + 4);

			$this->contact = $rs->getString($startcol + 5);

			$this->contactemail = $rs->getString($startcol + 6);

			$this->web = $rs->getString($startcol + 7);

			$this->memo = $rs->getString($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 9; // 9 = AffiliateInfoPeer::NUM_COLUMNS - AffiliateInfoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating AffiliateInfo object", $e);
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
			$con = Propel::getConnection(AffiliateInfoPeer::DATABASE_NAME);
		}

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
			$con = Propel::getConnection(AffiliateInfoPeer::DATABASE_NAME);
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

			if ($this->aAffiliate !== null) {
				if ($this->aAffiliate->isModified()) {
					$affectedRows += $this->aAffiliate->save($con);
				}
				$this->setAffiliate($this->aAffiliate);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AffiliateInfoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setNew(false);
				} else {
					$affectedRows += AffiliateInfoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collAffiliates !== null) {
				foreach($this->collAffiliates as $referrerFK) {
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

			if ($this->aAffiliate !== null) {
				if (!$this->aAffiliate->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAffiliate->getValidationFailures());
				}
			}


			if (($retval = AffiliateInfoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAffiliates !== null) {
					foreach($this->collAffiliates as $referrerFK) {
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
		$criteria = new Criteria(AffiliateInfoPeer::DATABASE_NAME);

		if ($this->isColumnModified(AffiliateInfoPeer::AFFILIATEID)) $criteria->add(AffiliateInfoPeer::AFFILIATEID, $this->affiliateid);
		if ($this->isColumnModified(AffiliateInfoPeer::AFFILIATEINTERNALNUMBER)) $criteria->add(AffiliateInfoPeer::AFFILIATEINTERNALNUMBER, $this->affiliateinternalnumber);
		if ($this->isColumnModified(AffiliateInfoPeer::ADDRESS)) $criteria->add(AffiliateInfoPeer::ADDRESS, $this->address);
		if ($this->isColumnModified(AffiliateInfoPeer::PHONE)) $criteria->add(AffiliateInfoPeer::PHONE, $this->phone);
		if ($this->isColumnModified(AffiliateInfoPeer::EMAIL)) $criteria->add(AffiliateInfoPeer::EMAIL, $this->email);
		if ($this->isColumnModified(AffiliateInfoPeer::CONTACT)) $criteria->add(AffiliateInfoPeer::CONTACT, $this->contact);
		if ($this->isColumnModified(AffiliateInfoPeer::CONTACTEMAIL)) $criteria->add(AffiliateInfoPeer::CONTACTEMAIL, $this->contactemail);
		if ($this->isColumnModified(AffiliateInfoPeer::WEB)) $criteria->add(AffiliateInfoPeer::WEB, $this->web);
		if ($this->isColumnModified(AffiliateInfoPeer::MEMO)) $criteria->add(AffiliateInfoPeer::MEMO, $this->memo);

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
		$criteria = new Criteria(AffiliateInfoPeer::DATABASE_NAME);

		$criteria->add(AffiliateInfoPeer::AFFILIATEID, $this->affiliateid);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getAffiliateid();
	}

	/**
	 * Generic method to set the primary key (affiliateid column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setAffiliateid($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of AffiliateInfo (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setAffiliateinternalnumber($this->affiliateinternalnumber);

		$copyObj->setAddress($this->address);

		$copyObj->setPhone($this->phone);

		$copyObj->setEmail($this->email);

		$copyObj->setContact($this->contact);

		$copyObj->setContactemail($this->contactemail);

		$copyObj->setWeb($this->web);

		$copyObj->setMemo($this->memo);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getAffiliates() as $relObj) {
				$copyObj->addAffiliate($relObj->copy($deepCopy));
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);

		$copyObj->setAffiliateid(NULL); // this is a pkey column, so set to default value

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
	 * @return     AffiliateInfo Clone of current object.
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
	 * @return     AffiliateInfoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AffiliateInfoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Affiliate object.
	 *
	 * @param      Affiliate $v
	 * @return     void
	 * @throws     PropelException
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
	 * @param      Connection Optional Connection object.
	 * @return     Affiliate The associated Affiliate object.
	 * @throws     PropelException
	 */
	public function getAffiliate($con = null)
	{
		// include the related Peer class
		include_once 'anmaga/om/BaseAffiliatePeer.php';

		if ($this->aAffiliate === null && ($this->affiliateid !== null)) {

			$this->aAffiliate = AffiliatePeer::retrieveByPK($this->affiliateid, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = AffiliatePeer::retrieveByPK($this->affiliateid, $con);
			   $obj->addAffiliates($this);
			 */
		}
		return $this->aAffiliate;
	}

	/**
	 * Temporary storage of collAffiliates to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return     void
	 */
	public function initAffiliates()
	{
		if ($this->collAffiliates === null) {
			$this->collAffiliates = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AffiliateInfo has previously
	 * been saved, it will retrieve related Affiliates from storage.
	 * If this AffiliateInfo is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param      Connection $con
	 * @param      Criteria $criteria
	 * @throws     PropelException
	 */
	public function getAffiliates($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseAffiliatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAffiliates === null) {
			if ($this->isNew()) {
			   $this->collAffiliates = array();
			} else {

				$criteria->add(AffiliatePeer::ID, $this->getAffiliateid());

				AffiliatePeer::addSelectColumns($criteria);
				$this->collAffiliates = AffiliatePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(AffiliatePeer::ID, $this->getAffiliateid());

				AffiliatePeer::addSelectColumns($criteria);
				if (!isset($this->lastAffiliateCriteria) || !$this->lastAffiliateCriteria->equals($criteria)) {
					$this->collAffiliates = AffiliatePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAffiliateCriteria = $criteria;
		return $this->collAffiliates;
	}

	/**
	 * Returns the number of related Affiliates.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      Connection $con
	 * @throws     PropelException
	 */
	public function countAffiliates($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseAffiliatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AffiliatePeer::ID, $this->getAffiliateid());

		return AffiliatePeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Affiliate object to this object
	 * through the Affiliate foreign key attribute
	 *
	 * @param      Affiliate $l Affiliate
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAffiliate(Affiliate $l)
	{
		$this->collAffiliates[] = $l;
		$l->setAffiliateInfo($this);
	}

} // BaseAffiliateInfo
