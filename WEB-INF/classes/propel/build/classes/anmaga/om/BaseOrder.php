<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'anmaga/OrderPeer.php';

/**
 * Base class that represents a row from the 'orders_order' table.
 *
 * Pedido de Productos
 *
 * This class was autogenerated by Propel on:
 *
 * 09/03/07 20:26:19
 *
 * @package    anmaga.om
 */
abstract class BaseOrder extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        OrderPeer
	 */
	protected static $peer;


	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;


	/**
	 * The value for the number field.
	 * @var        int
	 */
	protected $number;


	/**
	 * The value for the created field.
	 * @var        int
	 */
	protected $created;


	/**
	 * The value for the userid field.
	 * @var        int
	 */
	protected $userid;


	/**
	 * The value for the affiliateid field.
	 * @var        int
	 */
	protected $affiliateid;


	/**
	 * The value for the branchid field.
	 * @var        int
	 */
	protected $branchid;


	/**
	 * The value for the total field.
	 * @var        double
	 */
	protected $total;


	/**
	 * The value for the state field.
	 * @var        int
	 */
	protected $state;

	/**
	 * @var        AffiliateUser
	 */
	protected $aAffiliateUser;

	/**
	 * @var        Affiliate
	 */
	protected $aAffiliate;

	/**
	 * @var        Branch
	 */
	protected $aBranch;

	/**
	 * Collection to store aggregation of collOrderItems.
	 * @var        array
	 */
	protected $collOrderItems;

	/**
	 * The criteria used to select the current contents of collOrderItems.
	 * @var        Criteria
	 */
	protected $lastOrderItemCriteria = null;

	/**
	 * Collection to store aggregation of collOrderStateChanges.
	 * @var        array
	 */
	protected $collOrderStateChanges;

	/**
	 * The criteria used to select the current contents of collOrderStateChanges.
	 * @var        Criteria
	 */
	protected $lastOrderStateChangeCriteria = null;

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
	 * Id del pedido
	 * @return     int
	 */
	public function getId()
	{

		return $this->id;
	}

	/**
	 * Get the [number] column value.
	 * Numero interno del pedido
	 * @return     int
	 */
	public function getNumber()
	{

		return $this->number;
	}

	/**
	 * Get the [optionally formatted] [created] column value.
	 * Fecha en que se creo el pedido
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
	 * Get the [userid] column value.
	 * Id del usuario
	 * @return     int
	 */
	public function getUserid()
	{

		return $this->userid;
	}

	/**
	 * Get the [affiliateid] column value.
	 * Id del afiliado
	 * @return     int
	 */
	public function getAffiliateid()
	{

		return $this->affiliateid;
	}

	/**
	 * Get the [branchid] column value.
	 * Id de la sucursal
	 * @return     int
	 */
	public function getBranchid()
	{

		return $this->branchid;
	}

	/**
	 * Get the [total] column value.
	 * Precio total del pedido
	 * @return     double
	 */
	public function getTotal()
	{

		return $this->total;
	}

	/**
	 * Get the [state] column value.
	 * Estado del pedido
	 * @return     int
	 */
	public function getState()
	{

		return $this->state;
	}

	/**
	 * Set the value of [id] column.
	 * Id del pedido
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
			$this->modifiedColumns[] = OrderPeer::ID;
		}

	} // setId()

	/**
	 * Set the value of [number] column.
	 * Numero interno del pedido
	 * @param      int $v new value
	 * @return     void
	 */
	public function setNumber($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->number !== $v) {
			$this->number = $v;
			$this->modifiedColumns[] = OrderPeer::NUMBER;
		}

	} // setNumber()

	/**
	 * Set the value of [created] column.
	 * Fecha en que se creo el pedido
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
			$this->modifiedColumns[] = OrderPeer::CREATED;
		}

	} // setCreated()

	/**
	 * Set the value of [userid] column.
	 * Id del usuario
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
			$this->modifiedColumns[] = OrderPeer::USERID;
		}

		if ($this->aAffiliateUser !== null && $this->aAffiliateUser->getId() !== $v) {
			$this->aAffiliateUser = null;
		}

	} // setUserid()

	/**
	 * Set the value of [affiliateid] column.
	 * Id del afiliado
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
			$this->modifiedColumns[] = OrderPeer::AFFILIATEID;
		}

		if ($this->aAffiliate !== null && $this->aAffiliate->getId() !== $v) {
			$this->aAffiliate = null;
		}

	} // setAffiliateid()

	/**
	 * Set the value of [branchid] column.
	 * Id de la sucursal
	 * @param      int $v new value
	 * @return     void
	 */
	public function setBranchid($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->branchid !== $v) {
			$this->branchid = $v;
			$this->modifiedColumns[] = OrderPeer::BRANCHID;
		}

		if ($this->aBranch !== null && $this->aBranch->getId() !== $v) {
			$this->aBranch = null;
		}

	} // setBranchid()

	/**
	 * Set the value of [total] column.
	 * Precio total del pedido
	 * @param      double $v new value
	 * @return     void
	 */
	public function setTotal($v)
	{

		if ($this->total !== $v) {
			$this->total = $v;
			$this->modifiedColumns[] = OrderPeer::TOTAL;
		}

	} // setTotal()

	/**
	 * Set the value of [state] column.
	 * Estado del pedido
	 * @param      int $v new value
	 * @return     void
	 */
	public function setState($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->state !== $v) {
			$this->state = $v;
			$this->modifiedColumns[] = OrderPeer::STATE;
		}

	} // setState()

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

			$this->number = $rs->getInt($startcol + 1);

			$this->created = $rs->getTimestamp($startcol + 2, null);

			$this->userid = $rs->getInt($startcol + 3);

			$this->affiliateid = $rs->getInt($startcol + 4);

			$this->branchid = $rs->getInt($startcol + 5);

			$this->total = $rs->getFloat($startcol + 6);

			$this->state = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 8; // 8 = OrderPeer::NUM_COLUMNS - OrderPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Order object", $e);
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
			$con = Propel::getConnection(OrderPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OrderPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OrderPeer::DATABASE_NAME);
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

			if ($this->aAffiliate !== null) {
				if ($this->aAffiliate->isModified()) {
					$affectedRows += $this->aAffiliate->save($con);
				}
				$this->setAffiliate($this->aAffiliate);
			}

			if ($this->aBranch !== null) {
				if ($this->aBranch->isModified()) {
					$affectedRows += $this->aBranch->save($con);
				}
				$this->setBranch($this->aBranch);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = OrderPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += OrderPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collOrderItems !== null) {
				foreach($this->collOrderItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collOrderStateChanges !== null) {
				foreach($this->collOrderStateChanges as $referrerFK) {
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

			if ($this->aAffiliate !== null) {
				if (!$this->aAffiliate->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAffiliate->getValidationFailures());
				}
			}

			if ($this->aBranch !== null) {
				if (!$this->aBranch->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aBranch->getValidationFailures());
				}
			}


			if (($retval = OrderPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collOrderItems !== null) {
					foreach($this->collOrderItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collOrderStateChanges !== null) {
					foreach($this->collOrderStateChanges as $referrerFK) {
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
		$criteria = new Criteria(OrderPeer::DATABASE_NAME);

		if ($this->isColumnModified(OrderPeer::ID)) $criteria->add(OrderPeer::ID, $this->id);
		if ($this->isColumnModified(OrderPeer::NUMBER)) $criteria->add(OrderPeer::NUMBER, $this->number);
		if ($this->isColumnModified(OrderPeer::CREATED)) $criteria->add(OrderPeer::CREATED, $this->created);
		if ($this->isColumnModified(OrderPeer::USERID)) $criteria->add(OrderPeer::USERID, $this->userid);
		if ($this->isColumnModified(OrderPeer::AFFILIATEID)) $criteria->add(OrderPeer::AFFILIATEID, $this->affiliateid);
		if ($this->isColumnModified(OrderPeer::BRANCHID)) $criteria->add(OrderPeer::BRANCHID, $this->branchid);
		if ($this->isColumnModified(OrderPeer::TOTAL)) $criteria->add(OrderPeer::TOTAL, $this->total);
		if ($this->isColumnModified(OrderPeer::STATE)) $criteria->add(OrderPeer::STATE, $this->state);

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
		$criteria = new Criteria(OrderPeer::DATABASE_NAME);

		$criteria->add(OrderPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Order (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNumber($this->number);

		$copyObj->setCreated($this->created);

		$copyObj->setUserid($this->userid);

		$copyObj->setAffiliateid($this->affiliateid);

		$copyObj->setBranchid($this->branchid);

		$copyObj->setTotal($this->total);

		$copyObj->setState($this->state);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getOrderItems() as $relObj) {
				$copyObj->addOrderItem($relObj->copy($deepCopy));
			}

			foreach($this->getOrderStateChanges() as $relObj) {
				$copyObj->addOrderStateChange($relObj->copy($deepCopy));
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
	 * @return     Order Clone of current object.
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
	 * @return     OrderPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new OrderPeer();
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
	 * Declares an association between this object and a Branch object.
	 *
	 * @param      Branch $v
	 * @return     void
	 * @throws     PropelException
	 */
	public function setBranch($v)
	{


		if ($v === null) {
			$this->setBranchid(NULL);
		} else {
			$this->setBranchid($v->getId());
		}


		$this->aBranch = $v;
	}


	/**
	 * Get the associated Branch object
	 *
	 * @param      Connection Optional Connection object.
	 * @return     Branch The associated Branch object.
	 * @throws     PropelException
	 */
	public function getBranch($con = null)
	{
		// include the related Peer class
		include_once 'anmaga/om/BaseBranchPeer.php';

		if ($this->aBranch === null && ($this->branchid !== null)) {

			$this->aBranch = BranchPeer::retrieveByPK($this->branchid, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = BranchPeer::retrieveByPK($this->branchid, $con);
			   $obj->addBranchs($this);
			 */
		}
		return $this->aBranch;
	}

	/**
	 * Temporary storage of collOrderItems to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return     void
	 */
	public function initOrderItems()
	{
		if ($this->collOrderItems === null) {
			$this->collOrderItems = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Order has previously
	 * been saved, it will retrieve related OrderItems from storage.
	 * If this Order is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param      Connection $con
	 * @param      Criteria $criteria
	 * @throws     PropelException
	 */
	public function getOrderItems($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseOrderItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOrderItems === null) {
			if ($this->isNew()) {
			   $this->collOrderItems = array();
			} else {

				$criteria->add(OrderItemPeer::ORDERID, $this->getId());

				OrderItemPeer::addSelectColumns($criteria);
				$this->collOrderItems = OrderItemPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(OrderItemPeer::ORDERID, $this->getId());

				OrderItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastOrderItemCriteria) || !$this->lastOrderItemCriteria->equals($criteria)) {
					$this->collOrderItems = OrderItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastOrderItemCriteria = $criteria;
		return $this->collOrderItems;
	}

	/**
	 * Returns the number of related OrderItems.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      Connection $con
	 * @throws     PropelException
	 */
	public function countOrderItems($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseOrderItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(OrderItemPeer::ORDERID, $this->getId());

		return OrderItemPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a OrderItem object to this object
	 * through the OrderItem foreign key attribute
	 *
	 * @param      OrderItem $l OrderItem
	 * @return     void
	 * @throws     PropelException
	 */
	public function addOrderItem(OrderItem $l)
	{
		$this->collOrderItems[] = $l;
		$l->setOrder($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Order is new, it will return
	 * an empty collection; or if this Order has previously
	 * been saved, it will retrieve related OrderItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Order.
	 */
	public function getOrderItemsJoinProduct($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseOrderItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOrderItems === null) {
			if ($this->isNew()) {
				$this->collOrderItems = array();
			} else {

				$criteria->add(OrderItemPeer::ORDERID, $this->getId());

				$this->collOrderItems = OrderItemPeer::doSelectJoinProduct($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(OrderItemPeer::ORDERID, $this->getId());

			if (!isset($this->lastOrderItemCriteria) || !$this->lastOrderItemCriteria->equals($criteria)) {
				$this->collOrderItems = OrderItemPeer::doSelectJoinProduct($criteria, $con);
			}
		}
		$this->lastOrderItemCriteria = $criteria;

		return $this->collOrderItems;
	}

	/**
	 * Temporary storage of collOrderStateChanges to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return     void
	 */
	public function initOrderStateChanges()
	{
		if ($this->collOrderStateChanges === null) {
			$this->collOrderStateChanges = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Order has previously
	 * been saved, it will retrieve related OrderStateChanges from storage.
	 * If this Order is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param      Connection $con
	 * @param      Criteria $criteria
	 * @throws     PropelException
	 */
	public function getOrderStateChanges($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseOrderStateChangePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOrderStateChanges === null) {
			if ($this->isNew()) {
			   $this->collOrderStateChanges = array();
			} else {

				$criteria->add(OrderStateChangePeer::ORDERID, $this->getId());

				OrderStateChangePeer::addSelectColumns($criteria);
				$this->collOrderStateChanges = OrderStateChangePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(OrderStateChangePeer::ORDERID, $this->getId());

				OrderStateChangePeer::addSelectColumns($criteria);
				if (!isset($this->lastOrderStateChangeCriteria) || !$this->lastOrderStateChangeCriteria->equals($criteria)) {
					$this->collOrderStateChanges = OrderStateChangePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastOrderStateChangeCriteria = $criteria;
		return $this->collOrderStateChanges;
	}

	/**
	 * Returns the number of related OrderStateChanges.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      Connection $con
	 * @throws     PropelException
	 */
	public function countOrderStateChanges($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseOrderStateChangePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(OrderStateChangePeer::ORDERID, $this->getId());

		return OrderStateChangePeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a OrderStateChange object to this object
	 * through the OrderStateChange foreign key attribute
	 *
	 * @param      OrderStateChange $l OrderStateChange
	 * @return     void
	 * @throws     PropelException
	 */
	public function addOrderStateChange(OrderStateChange $l)
	{
		$this->collOrderStateChanges[] = $l;
		$l->setOrder($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Order is new, it will return
	 * an empty collection; or if this Order has previously
	 * been saved, it will retrieve related OrderStateChanges from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Order.
	 */
	public function getOrderStateChangesJoinAffiliateUser($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseOrderStateChangePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOrderStateChanges === null) {
			if ($this->isNew()) {
				$this->collOrderStateChanges = array();
			} else {

				$criteria->add(OrderStateChangePeer::ORDERID, $this->getId());

				$this->collOrderStateChanges = OrderStateChangePeer::doSelectJoinAffiliateUser($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(OrderStateChangePeer::ORDERID, $this->getId());

			if (!isset($this->lastOrderStateChangeCriteria) || !$this->lastOrderStateChangeCriteria->equals($criteria)) {
				$this->collOrderStateChanges = OrderStateChangePeer::doSelectJoinAffiliateUser($criteria, $con);
			}
		}
		$this->lastOrderStateChangeCriteria = $criteria;

		return $this->collOrderStateChanges;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Order is new, it will return
	 * an empty collection; or if this Order has previously
	 * been saved, it will retrieve related OrderStateChanges from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Order.
	 */
	public function getOrderStateChangesJoinAffiliate($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseOrderStateChangePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOrderStateChanges === null) {
			if ($this->isNew()) {
				$this->collOrderStateChanges = array();
			} else {

				$criteria->add(OrderStateChangePeer::ORDERID, $this->getId());

				$this->collOrderStateChanges = OrderStateChangePeer::doSelectJoinAffiliate($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(OrderStateChangePeer::ORDERID, $this->getId());

			if (!isset($this->lastOrderStateChangeCriteria) || !$this->lastOrderStateChangeCriteria->equals($criteria)) {
				$this->collOrderStateChanges = OrderStateChangePeer::doSelectJoinAffiliate($criteria, $con);
			}
		}
		$this->lastOrderStateChangeCriteria = $criteria;

		return $this->collOrderStateChanges;
	}

} // BaseOrder
