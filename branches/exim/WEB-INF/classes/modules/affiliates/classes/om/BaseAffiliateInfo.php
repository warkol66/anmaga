<?php

/**
 * Base class that represents a row from the 'affiliates_affiliateInfo' table.
 *
 * Informacion del afiliado
 *
 * @package    affiliates.classes.om
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
	 * Initializes internal state of BaseAffiliateInfo object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
	}

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
	 * @return     AffiliateInfo The current object (for fluent API support)
	 */
	public function setAffiliateid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->affiliateid !== $v) {
			$this->affiliateid = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::AFFILIATEID;
		}

		return $this;
	} // setAffiliateid()

	/**
	 * Set the value of [affiliateinternalnumber] column.
	 * Id interno
	 * @param      int $v new value
	 * @return     AffiliateInfo The current object (for fluent API support)
	 */
	public function setAffiliateinternalnumber($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->affiliateinternalnumber !== $v) {
			$this->affiliateinternalnumber = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::AFFILIATEINTERNALNUMBER;
		}

		return $this;
	} // setAffiliateinternalnumber()

	/**
	 * Set the value of [address] column.
	 * Direccion afiliado
	 * @param      string $v new value
	 * @return     AffiliateInfo The current object (for fluent API support)
	 */
	public function setAddress($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->address !== $v) {
			$this->address = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::ADDRESS;
		}

		return $this;
	} // setAddress()

	/**
	 * Set the value of [phone] column.
	 * Telefono afiliado
	 * @param      string $v new value
	 * @return     AffiliateInfo The current object (for fluent API support)
	 */
	public function setPhone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->phone !== $v) {
			$this->phone = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::PHONE;
		}

		return $this;
	} // setPhone()

	/**
	 * Set the value of [email] column.
	 * Email afiliado
	 * @param      string $v new value
	 * @return     AffiliateInfo The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [contact] column.
	 * Nombre de persona de contacto
	 * @param      string $v new value
	 * @return     AffiliateInfo The current object (for fluent API support)
	 */
	public function setContact($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->contact !== $v) {
			$this->contact = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::CONTACT;
		}

		return $this;
	} // setContact()

	/**
	 * Set the value of [contactemail] column.
	 * Email de persona de contacto
	 * @param      string $v new value
	 * @return     AffiliateInfo The current object (for fluent API support)
	 */
	public function setContactemail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->contactemail !== $v) {
			$this->contactemail = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::CONTACTEMAIL;
		}

		return $this;
	} // setContactemail()

	/**
	 * Set the value of [web] column.
	 * Direccion web del afiliado
	 * @param      string $v new value
	 * @return     AffiliateInfo The current object (for fluent API support)
	 */
	public function setWeb($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->web !== $v) {
			$this->web = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::WEB;
		}

		return $this;
	} // setWeb()

	/**
	 * Set the value of [memo] column.
	 * Informacion adicional del afiliado
	 * @param      string $v new value
	 * @return     AffiliateInfo The current object (for fluent API support)
	 */
	public function setMemo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->memo !== $v) {
			$this->memo = $v;
			$this->modifiedColumns[] = AffiliateInfoPeer::MEMO;
		}

		return $this;
	} // setMemo()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			// First, ensure that we don't have any columns that have been modified which aren't default columns.
			if (array_diff($this->modifiedColumns, array())) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->affiliateid = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->affiliateinternalnumber = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->address = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->phone = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->email = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->contact = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->contactemail = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->web = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->memo = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 9; // 9 = AffiliateInfoPeer::NUM_COLUMNS - AffiliateInfoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating AffiliateInfo object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AffiliateInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = AffiliateInfoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AffiliateInfoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			AffiliateInfoPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AffiliateInfoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			AffiliateInfoPeer::addInstanceToPool($this);
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


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


			if (($retval = AffiliateInfoPeer::doValidate($this, $columns)) !== true) {
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

		$copyObj->setAffiliateid($this->affiliateid);

		$copyObj->setAffiliateinternalnumber($this->affiliateinternalnumber);

		$copyObj->setAddress($this->address);

		$copyObj->setPhone($this->phone);

		$copyObj->setEmail($this->email);

		$copyObj->setContact($this->contact);

		$copyObj->setContactemail($this->contactemail);

		$copyObj->setWeb($this->web);

		$copyObj->setMemo($this->memo);


		$copyObj->setNew(true);

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
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

	}

} // BaseAffiliateInfo
