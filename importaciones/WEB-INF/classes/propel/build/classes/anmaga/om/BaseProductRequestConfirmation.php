<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'anmaga/ProductRequestConfirmationPeer.php';

/**
 * Base class that represents a row from the 'productRequestConfirmation' table.
 *
 * Confirmacion por parte del cliente a cada pedido de producto
 *
 * This class was autogenerated by Propel on:
 *
 * 12/05/07 13:19:20
 *
 * @package    anmaga.om
 */
abstract class BaseProductRequestConfirmation extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ProductRequestConfirmationPeer
	 */
	protected static $peer;


	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;


	/**
	 * The value for the productrequestid field.
	 * @var        int
	 */
	protected $productrequestid;


	/**
	 * The value for the createdat field.
	 * @var        int
	 */
	protected $createdat;


	/**
	 * The value for the userid field.
	 * @var        int
	 */
	protected $userid;


	/**
	 * The value for the attach field.
	 * @var        string
	 */
	protected $attach;

	/**
	 * @var        ProductRequest
	 */
	protected $aProductRequest;

	/**
	 * @var        AffiliateUser
	 */
	protected $aAffiliateUser;

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
	 * ProductRequestConfirmation Id
	 * @return     int
	 */
	public function getId()
	{

		return $this->id;
	}

	/**
	 * Get the [productrequestid] column value.
	 * Product Request
	 * @return     int
	 */
	public function getProductrequestid()
	{

		return $this->productrequestid;
	}

	/**
	 * Get the [optionally formatted] [createdat] column value.
	 * Creation date for
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the integer unix timestamp will be returned.
	 * @return     mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
	 * @throws     PropelException - if unable to convert the date/time to timestamp.
	 */
	public function getCreatedat($format = 'Y-m-d H:i:s')
	{

		if ($this->createdat === null || $this->createdat === '') {
			return null;
		} elseif (!is_int($this->createdat)) {
			// a non-timestamp value was set externally, so we convert it
			$ts = strtotime($this->createdat);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse value of [createdat] as date/time value: " . var_export($this->createdat, true));
			}
		} else {
			$ts = $this->createdat;
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
	 * User
	 * @return     int
	 */
	public function getUserid()
	{

		return $this->userid;
	}

	/**
	 * Get the [attach] column value.
	 * Nombre del archivo adjunto
	 * @return     string
	 */
	public function getAttach()
	{

		return $this->attach;
	}

	/**
	 * Set the value of [id] column.
	 * ProductRequestConfirmation Id
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
			$this->modifiedColumns[] = ProductRequestConfirmationPeer::ID;
		}

	} // setId()

	/**
	 * Set the value of [productrequestid] column.
	 * Product Request
	 * @param      int $v new value
	 * @return     void
	 */
	public function setProductrequestid($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->productrequestid !== $v) {
			$this->productrequestid = $v;
			$this->modifiedColumns[] = ProductRequestConfirmationPeer::PRODUCTREQUESTID;
		}

		if ($this->aProductRequest !== null && $this->aProductRequest->getId() !== $v) {
			$this->aProductRequest = null;
		}

	} // setProductrequestid()

	/**
	 * Set the value of [createdat] column.
	 * Creation date for
	 * @param      int $v new value
	 * @return     void
	 */
	public function setCreatedat($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse date/time value for [createdat] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->createdat !== $ts) {
			$this->createdat = $ts;
			$this->modifiedColumns[] = ProductRequestConfirmationPeer::CREATEDAT;
		}

	} // setCreatedat()

	/**
	 * Set the value of [userid] column.
	 * User
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
			$this->modifiedColumns[] = ProductRequestConfirmationPeer::USERID;
		}

		if ($this->aAffiliateUser !== null && $this->aAffiliateUser->getId() !== $v) {
			$this->aAffiliateUser = null;
		}

	} // setUserid()

	/**
	 * Set the value of [attach] column.
	 * Nombre del archivo adjunto
	 * @param      string $v new value
	 * @return     void
	 */
	public function setAttach($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->attach !== $v) {
			$this->attach = $v;
			$this->modifiedColumns[] = ProductRequestConfirmationPeer::ATTACH;
		}

	} // setAttach()

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

			$this->productrequestid = $rs->getInt($startcol + 1);

			$this->createdat = $rs->getTimestamp($startcol + 2, null);

			$this->userid = $rs->getInt($startcol + 3);

			$this->attach = $rs->getString($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 5; // 5 = ProductRequestConfirmationPeer::NUM_COLUMNS - ProductRequestConfirmationPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating ProductRequestConfirmation object", $e);
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
			$con = Propel::getConnection(ProductRequestConfirmationPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ProductRequestConfirmationPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ProductRequestConfirmationPeer::DATABASE_NAME);
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

			if ($this->aProductRequest !== null) {
				if ($this->aProductRequest->isModified()) {
					$affectedRows += $this->aProductRequest->save($con);
				}
				$this->setProductRequest($this->aProductRequest);
			}

			if ($this->aAffiliateUser !== null) {
				if ($this->aAffiliateUser->isModified()) {
					$affectedRows += $this->aAffiliateUser->save($con);
				}
				$this->setAffiliateUser($this->aAffiliateUser);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ProductRequestConfirmationPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ProductRequestConfirmationPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
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

			if ($this->aProductRequest !== null) {
				if (!$this->aProductRequest->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProductRequest->getValidationFailures());
				}
			}

			if ($this->aAffiliateUser !== null) {
				if (!$this->aAffiliateUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAffiliateUser->getValidationFailures());
				}
			}


			if (($retval = ProductRequestConfirmationPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$criteria = new Criteria(ProductRequestConfirmationPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProductRequestConfirmationPeer::ID)) $criteria->add(ProductRequestConfirmationPeer::ID, $this->id);
		if ($this->isColumnModified(ProductRequestConfirmationPeer::PRODUCTREQUESTID)) $criteria->add(ProductRequestConfirmationPeer::PRODUCTREQUESTID, $this->productrequestid);
		if ($this->isColumnModified(ProductRequestConfirmationPeer::CREATEDAT)) $criteria->add(ProductRequestConfirmationPeer::CREATEDAT, $this->createdat);
		if ($this->isColumnModified(ProductRequestConfirmationPeer::USERID)) $criteria->add(ProductRequestConfirmationPeer::USERID, $this->userid);
		if ($this->isColumnModified(ProductRequestConfirmationPeer::ATTACH)) $criteria->add(ProductRequestConfirmationPeer::ATTACH, $this->attach);

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
		$criteria = new Criteria(ProductRequestConfirmationPeer::DATABASE_NAME);

		$criteria->add(ProductRequestConfirmationPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of ProductRequestConfirmation (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setProductrequestid($this->productrequestid);

		$copyObj->setCreatedat($this->createdat);

		$copyObj->setUserid($this->userid);

		$copyObj->setAttach($this->attach);


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
	 * @return     ProductRequestConfirmation Clone of current object.
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
	 * @return     ProductRequestConfirmationPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ProductRequestConfirmationPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a ProductRequest object.
	 *
	 * @param      ProductRequest $v
	 * @return     void
	 * @throws     PropelException
	 */
	public function setProductRequest($v)
	{


		if ($v === null) {
			$this->setProductrequestid(NULL);
		} else {
			$this->setProductrequestid($v->getId());
		}


		$this->aProductRequest = $v;
	}


	/**
	 * Get the associated ProductRequest object
	 *
	 * @param      Connection Optional Connection object.
	 * @return     ProductRequest The associated ProductRequest object.
	 * @throws     PropelException
	 */
	public function getProductRequest($con = null)
	{
		// include the related Peer class
		include_once 'anmaga/om/BaseProductRequestPeer.php';

		if ($this->aProductRequest === null && ($this->productrequestid !== null)) {

			$this->aProductRequest = ProductRequestPeer::retrieveByPK($this->productrequestid, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = ProductRequestPeer::retrieveByPK($this->productrequestid, $con);
			   $obj->addProductRequests($this);
			 */
		}
		return $this->aProductRequest;
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

} // BaseProductRequestConfirmation
