<?php

/**
 * Base class that represents a row from the 'affiliates_affiliate' table.
 *
 * Afiliados
 *
 * @package    affiliates.classes.om
 */
abstract class BaseAffiliate extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AffiliatePeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the ownerid field.
	 * @var        int
	 */
	protected $ownerid;

	/**
	 * @var        array AffiliateUser[] Collection to store aggregation of AffiliateUser objects.
	 */
	protected $collAffiliateUsers;

	/**
	 * @var        Criteria The criteria used to select the current contents of collAffiliateUsers.
	 */
	private $lastAffiliateUserCriteria = null;

	/**
	 * @var        array AffiliateBranch[] Collection to store aggregation of AffiliateBranch objects.
	 */
	protected $collAffiliateBranchs;

	/**
	 * @var        Criteria The criteria used to select the current contents of collAffiliateBranchs.
	 */
	private $lastAffiliateBranchCriteria = null;

	/**
	 * @var        array ClientQuote[] Collection to store aggregation of ClientQuote objects.
	 */
	protected $collClientQuotes;

	/**
	 * @var        Criteria The criteria used to select the current contents of collClientQuotes.
	 */
	private $lastClientQuoteCriteria = null;

	/**
	 * @var        array ClientPurchaseOrder[] Collection to store aggregation of ClientPurchaseOrder objects.
	 */
	protected $collClientPurchaseOrders;

	/**
	 * @var        Criteria The criteria used to select the current contents of collClientPurchaseOrders.
	 */
	private $lastClientPurchaseOrderCriteria = null;

	/**
	 * @var        array SupplierPurchaseOrder[] Collection to store aggregation of SupplierPurchaseOrder objects.
	 */
	protected $collSupplierPurchaseOrders;

	/**
	 * @var        Criteria The criteria used to select the current contents of collSupplierPurchaseOrders.
	 */
	private $lastSupplierPurchaseOrderCriteria = null;

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
	 * Initializes internal state of BaseAffiliate object.
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
	 * Get the [id] column value.
	 * Id afiliado
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [name] column value.
	 * nombre afiliado
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [ownerid] column value.
	 * Id del usuario administrador del afiliado
	 * @return     int
	 */
	public function getOwnerid()
	{
		return $this->ownerid;
	}

	/**
	 * Set the value of [id] column.
	 * Id afiliado
	 * @param      int $v new value
	 * @return     Affiliate The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AffiliatePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [name] column.
	 * nombre afiliado
	 * @param      string $v new value
	 * @return     Affiliate The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = AffiliatePeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [ownerid] column.
	 * Id del usuario administrador del afiliado
	 * @param      int $v new value
	 * @return     Affiliate The current object (for fluent API support)
	 */
	public function setOwnerid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->ownerid !== $v) {
			$this->ownerid = $v;
			$this->modifiedColumns[] = AffiliatePeer::OWNERID;
		}

		return $this;
	} // setOwnerid()

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

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->ownerid = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 3; // 3 = AffiliatePeer::NUM_COLUMNS - AffiliatePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Affiliate object", $e);
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
			$con = Propel::getConnection(AffiliatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = AffiliatePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collAffiliateUsers = null;
			$this->lastAffiliateUserCriteria = null;

			$this->collAffiliateBranchs = null;
			$this->lastAffiliateBranchCriteria = null;

			$this->collClientQuotes = null;
			$this->lastClientQuoteCriteria = null;

			$this->collClientPurchaseOrders = null;
			$this->lastClientPurchaseOrderCriteria = null;

			$this->collSupplierPurchaseOrders = null;
			$this->lastSupplierPurchaseOrderCriteria = null;

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
			$con = Propel::getConnection(AffiliatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			AffiliatePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AffiliatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			AffiliatePeer::addInstanceToPool($this);
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

			if ($this->isNew() ) {
				$this->modifiedColumns[] = AffiliatePeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AffiliatePeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += AffiliatePeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collAffiliateUsers !== null) {
				foreach ($this->collAffiliateUsers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAffiliateBranchs !== null) {
				foreach ($this->collAffiliateBranchs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collClientQuotes !== null) {
				foreach ($this->collClientQuotes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collClientPurchaseOrders !== null) {
				foreach ($this->collClientPurchaseOrders as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSupplierPurchaseOrders !== null) {
				foreach ($this->collSupplierPurchaseOrders as $referrerFK) {
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


			if (($retval = AffiliatePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAffiliateUsers !== null) {
					foreach ($this->collAffiliateUsers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAffiliateBranchs !== null) {
					foreach ($this->collAffiliateBranchs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClientQuotes !== null) {
					foreach ($this->collClientQuotes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClientPurchaseOrders !== null) {
					foreach ($this->collClientPurchaseOrders as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSupplierPurchaseOrders !== null) {
					foreach ($this->collSupplierPurchaseOrders as $referrerFK) {
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
		$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);

		if ($this->isColumnModified(AffiliatePeer::ID)) $criteria->add(AffiliatePeer::ID, $this->id);
		if ($this->isColumnModified(AffiliatePeer::NAME)) $criteria->add(AffiliatePeer::NAME, $this->name);
		if ($this->isColumnModified(AffiliatePeer::OWNERID)) $criteria->add(AffiliatePeer::OWNERID, $this->ownerid);

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
		$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);

		$criteria->add(AffiliatePeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Affiliate (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setName($this->name);

		$copyObj->setOwnerid($this->ownerid);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getAffiliateUsers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAffiliateUser($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAffiliateBranchs() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAffiliateBranch($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClientQuotes() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClientQuote($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClientPurchaseOrders() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClientPurchaseOrder($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSupplierPurchaseOrders() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSupplierPurchaseOrder($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);

		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value

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
	 * @return     Affiliate Clone of current object.
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
	 * @return     AffiliatePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AffiliatePeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collAffiliateUsers collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAffiliateUsers()
	 */
	public function clearAffiliateUsers()
	{
		$this->collAffiliateUsers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAffiliateUsers collection (array).
	 *
	 * By default this just sets the collAffiliateUsers collection to an empty array (like clearcollAffiliateUsers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAffiliateUsers()
	{
		$this->collAffiliateUsers = array();
	}

	/**
	 * Gets an array of AffiliateUser objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Affiliate has previously been saved, it will retrieve
	 * related AffiliateUsers from storage. If this Affiliate is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array AffiliateUser[]
	 * @throws     PropelException
	 */
	public function getAffiliateUsers($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAffiliateUsers === null) {
			if ($this->isNew()) {
			   $this->collAffiliateUsers = array();
			} else {

				$criteria->add(AffiliateUserPeer::AFFILIATEID, $this->id);

				AffiliateUserPeer::addSelectColumns($criteria);
				$this->collAffiliateUsers = AffiliateUserPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(AffiliateUserPeer::AFFILIATEID, $this->id);

				AffiliateUserPeer::addSelectColumns($criteria);
				if (!isset($this->lastAffiliateUserCriteria) || !$this->lastAffiliateUserCriteria->equals($criteria)) {
					$this->collAffiliateUsers = AffiliateUserPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAffiliateUserCriteria = $criteria;
		return $this->collAffiliateUsers;
	}

	/**
	 * Returns the number of related AffiliateUser objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AffiliateUser objects.
	 * @throws     PropelException
	 */
	public function countAffiliateUsers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collAffiliateUsers === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(AffiliateUserPeer::AFFILIATEID, $this->id);

				$count = AffiliateUserPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(AffiliateUserPeer::AFFILIATEID, $this->id);

				if (!isset($this->lastAffiliateUserCriteria) || !$this->lastAffiliateUserCriteria->equals($criteria)) {
					$count = AffiliateUserPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collAffiliateUsers);
				}
			} else {
				$count = count($this->collAffiliateUsers);
			}
		}
		$this->lastAffiliateUserCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a AffiliateUser object to this object
	 * through the AffiliateUser foreign key attribute.
	 *
	 * @param      AffiliateUser $l AffiliateUser
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAffiliateUser(AffiliateUser $l)
	{
		if ($this->collAffiliateUsers === null) {
			$this->initAffiliateUsers();
		}
		if (!in_array($l, $this->collAffiliateUsers, true)) { // only add it if the **same** object is not already associated
			array_push($this->collAffiliateUsers, $l);
			$l->setAffiliate($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related AffiliateUsers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 */
	public function getAffiliateUsersJoinAffiliateLevel($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAffiliateUsers === null) {
			if ($this->isNew()) {
				$this->collAffiliateUsers = array();
			} else {

				$criteria->add(AffiliateUserPeer::AFFILIATEID, $this->id);

				$this->collAffiliateUsers = AffiliateUserPeer::doSelectJoinAffiliateLevel($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AffiliateUserPeer::AFFILIATEID, $this->id);

			if (!isset($this->lastAffiliateUserCriteria) || !$this->lastAffiliateUserCriteria->equals($criteria)) {
				$this->collAffiliateUsers = AffiliateUserPeer::doSelectJoinAffiliateLevel($criteria, $con, $join_behavior);
			}
		}
		$this->lastAffiliateUserCriteria = $criteria;

		return $this->collAffiliateUsers;
	}

	/**
	 * Clears out the collAffiliateBranchs collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAffiliateBranchs()
	 */
	public function clearAffiliateBranchs()
	{
		$this->collAffiliateBranchs = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAffiliateBranchs collection (array).
	 *
	 * By default this just sets the collAffiliateBranchs collection to an empty array (like clearcollAffiliateBranchs());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAffiliateBranchs()
	{
		$this->collAffiliateBranchs = array();
	}

	/**
	 * Gets an array of AffiliateBranch objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Affiliate has previously been saved, it will retrieve
	 * related AffiliateBranchs from storage. If this Affiliate is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array AffiliateBranch[]
	 * @throws     PropelException
	 */
	public function getAffiliateBranchs($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAffiliateBranchs === null) {
			if ($this->isNew()) {
			   $this->collAffiliateBranchs = array();
			} else {

				$criteria->add(AffiliateBranchPeer::AFFILIATEID, $this->id);

				AffiliateBranchPeer::addSelectColumns($criteria);
				$this->collAffiliateBranchs = AffiliateBranchPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(AffiliateBranchPeer::AFFILIATEID, $this->id);

				AffiliateBranchPeer::addSelectColumns($criteria);
				if (!isset($this->lastAffiliateBranchCriteria) || !$this->lastAffiliateBranchCriteria->equals($criteria)) {
					$this->collAffiliateBranchs = AffiliateBranchPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAffiliateBranchCriteria = $criteria;
		return $this->collAffiliateBranchs;
	}

	/**
	 * Returns the number of related AffiliateBranch objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AffiliateBranch objects.
	 * @throws     PropelException
	 */
	public function countAffiliateBranchs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collAffiliateBranchs === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(AffiliateBranchPeer::AFFILIATEID, $this->id);

				$count = AffiliateBranchPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(AffiliateBranchPeer::AFFILIATEID, $this->id);

				if (!isset($this->lastAffiliateBranchCriteria) || !$this->lastAffiliateBranchCriteria->equals($criteria)) {
					$count = AffiliateBranchPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collAffiliateBranchs);
				}
			} else {
				$count = count($this->collAffiliateBranchs);
			}
		}
		$this->lastAffiliateBranchCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a AffiliateBranch object to this object
	 * through the AffiliateBranch foreign key attribute.
	 *
	 * @param      AffiliateBranch $l AffiliateBranch
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAffiliateBranch(AffiliateBranch $l)
	{
		if ($this->collAffiliateBranchs === null) {
			$this->initAffiliateBranchs();
		}
		if (!in_array($l, $this->collAffiliateBranchs, true)) { // only add it if the **same** object is not already associated
			array_push($this->collAffiliateBranchs, $l);
			$l->setAffiliate($this);
		}
	}

	/**
	 * Clears out the collClientQuotes collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClientQuotes()
	 */
	public function clearClientQuotes()
	{
		$this->collClientQuotes = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClientQuotes collection (array).
	 *
	 * By default this just sets the collClientQuotes collection to an empty array (like clearcollClientQuotes());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClientQuotes()
	{
		$this->collClientQuotes = array();
	}

	/**
	 * Gets an array of ClientQuote objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Affiliate has previously been saved, it will retrieve
	 * related ClientQuotes from storage. If this Affiliate is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ClientQuote[]
	 * @throws     PropelException
	 */
	public function getClientQuotes($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientQuotes === null) {
			if ($this->isNew()) {
			   $this->collClientQuotes = array();
			} else {

				$criteria->add(ClientQuotePeer::AFFILIATEID, $this->id);

				ClientQuotePeer::addSelectColumns($criteria);
				$this->collClientQuotes = ClientQuotePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ClientQuotePeer::AFFILIATEID, $this->id);

				ClientQuotePeer::addSelectColumns($criteria);
				if (!isset($this->lastClientQuoteCriteria) || !$this->lastClientQuoteCriteria->equals($criteria)) {
					$this->collClientQuotes = ClientQuotePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastClientQuoteCriteria = $criteria;
		return $this->collClientQuotes;
	}

	/**
	 * Returns the number of related ClientQuote objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ClientQuote objects.
	 * @throws     PropelException
	 */
	public function countClientQuotes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collClientQuotes === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ClientQuotePeer::AFFILIATEID, $this->id);

				$count = ClientQuotePeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ClientQuotePeer::AFFILIATEID, $this->id);

				if (!isset($this->lastClientQuoteCriteria) || !$this->lastClientQuoteCriteria->equals($criteria)) {
					$count = ClientQuotePeer::doCount($criteria, $con);
				} else {
					$count = count($this->collClientQuotes);
				}
			} else {
				$count = count($this->collClientQuotes);
			}
		}
		$this->lastClientQuoteCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a ClientQuote object to this object
	 * through the ClientQuote foreign key attribute.
	 *
	 * @param      ClientQuote $l ClientQuote
	 * @return     void
	 * @throws     PropelException
	 */
	public function addClientQuote(ClientQuote $l)
	{
		if ($this->collClientQuotes === null) {
			$this->initClientQuotes();
		}
		if (!in_array($l, $this->collClientQuotes, true)) { // only add it if the **same** object is not already associated
			array_push($this->collClientQuotes, $l);
			$l->setAffiliate($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related ClientQuotes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 */
	public function getClientQuotesJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientQuotes === null) {
			if ($this->isNew()) {
				$this->collClientQuotes = array();
			} else {

				$criteria->add(ClientQuotePeer::AFFILIATEID, $this->id);

				$this->collClientQuotes = ClientQuotePeer::doSelectJoinUser($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientQuotePeer::AFFILIATEID, $this->id);

			if (!isset($this->lastClientQuoteCriteria) || !$this->lastClientQuoteCriteria->equals($criteria)) {
				$this->collClientQuotes = ClientQuotePeer::doSelectJoinUser($criteria, $con, $join_behavior);
			}
		}
		$this->lastClientQuoteCriteria = $criteria;

		return $this->collClientQuotes;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related ClientQuotes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 */
	public function getClientQuotesJoinAffiliateUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientQuotes === null) {
			if ($this->isNew()) {
				$this->collClientQuotes = array();
			} else {

				$criteria->add(ClientQuotePeer::AFFILIATEID, $this->id);

				$this->collClientQuotes = ClientQuotePeer::doSelectJoinAffiliateUser($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientQuotePeer::AFFILIATEID, $this->id);

			if (!isset($this->lastClientQuoteCriteria) || !$this->lastClientQuoteCriteria->equals($criteria)) {
				$this->collClientQuotes = ClientQuotePeer::doSelectJoinAffiliateUser($criteria, $con, $join_behavior);
			}
		}
		$this->lastClientQuoteCriteria = $criteria;

		return $this->collClientQuotes;
	}

	/**
	 * Clears out the collClientPurchaseOrders collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClientPurchaseOrders()
	 */
	public function clearClientPurchaseOrders()
	{
		$this->collClientPurchaseOrders = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClientPurchaseOrders collection (array).
	 *
	 * By default this just sets the collClientPurchaseOrders collection to an empty array (like clearcollClientPurchaseOrders());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClientPurchaseOrders()
	{
		$this->collClientPurchaseOrders = array();
	}

	/**
	 * Gets an array of ClientPurchaseOrder objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Affiliate has previously been saved, it will retrieve
	 * related ClientPurchaseOrders from storage. If this Affiliate is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ClientPurchaseOrder[]
	 * @throws     PropelException
	 */
	public function getClientPurchaseOrders($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientPurchaseOrders === null) {
			if ($this->isNew()) {
			   $this->collClientPurchaseOrders = array();
			} else {

				$criteria->add(ClientPurchaseOrderPeer::AFFILIATEID, $this->id);

				ClientPurchaseOrderPeer::addSelectColumns($criteria);
				$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ClientPurchaseOrderPeer::AFFILIATEID, $this->id);

				ClientPurchaseOrderPeer::addSelectColumns($criteria);
				if (!isset($this->lastClientPurchaseOrderCriteria) || !$this->lastClientPurchaseOrderCriteria->equals($criteria)) {
					$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastClientPurchaseOrderCriteria = $criteria;
		return $this->collClientPurchaseOrders;
	}

	/**
	 * Returns the number of related ClientPurchaseOrder objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ClientPurchaseOrder objects.
	 * @throws     PropelException
	 */
	public function countClientPurchaseOrders(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collClientPurchaseOrders === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ClientPurchaseOrderPeer::AFFILIATEID, $this->id);

				$count = ClientPurchaseOrderPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ClientPurchaseOrderPeer::AFFILIATEID, $this->id);

				if (!isset($this->lastClientPurchaseOrderCriteria) || !$this->lastClientPurchaseOrderCriteria->equals($criteria)) {
					$count = ClientPurchaseOrderPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collClientPurchaseOrders);
				}
			} else {
				$count = count($this->collClientPurchaseOrders);
			}
		}
		$this->lastClientPurchaseOrderCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a ClientPurchaseOrder object to this object
	 * through the ClientPurchaseOrder foreign key attribute.
	 *
	 * @param      ClientPurchaseOrder $l ClientPurchaseOrder
	 * @return     void
	 * @throws     PropelException
	 */
	public function addClientPurchaseOrder(ClientPurchaseOrder $l)
	{
		if ($this->collClientPurchaseOrders === null) {
			$this->initClientPurchaseOrders();
		}
		if (!in_array($l, $this->collClientPurchaseOrders, true)) { // only add it if the **same** object is not already associated
			array_push($this->collClientPurchaseOrders, $l);
			$l->setAffiliate($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related ClientPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 */
	public function getClientPurchaseOrdersJoinClientQuote($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collClientPurchaseOrders = array();
			} else {

				$criteria->add(ClientPurchaseOrderPeer::AFFILIATEID, $this->id);

				$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelectJoinClientQuote($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientPurchaseOrderPeer::AFFILIATEID, $this->id);

			if (!isset($this->lastClientPurchaseOrderCriteria) || !$this->lastClientPurchaseOrderCriteria->equals($criteria)) {
				$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelectJoinClientQuote($criteria, $con, $join_behavior);
			}
		}
		$this->lastClientPurchaseOrderCriteria = $criteria;

		return $this->collClientPurchaseOrders;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related ClientPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 */
	public function getClientPurchaseOrdersJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collClientPurchaseOrders = array();
			} else {

				$criteria->add(ClientPurchaseOrderPeer::AFFILIATEID, $this->id);

				$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelectJoinUser($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientPurchaseOrderPeer::AFFILIATEID, $this->id);

			if (!isset($this->lastClientPurchaseOrderCriteria) || !$this->lastClientPurchaseOrderCriteria->equals($criteria)) {
				$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelectJoinUser($criteria, $con, $join_behavior);
			}
		}
		$this->lastClientPurchaseOrderCriteria = $criteria;

		return $this->collClientPurchaseOrders;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related ClientPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 */
	public function getClientPurchaseOrdersJoinAffiliateUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collClientPurchaseOrders = array();
			} else {

				$criteria->add(ClientPurchaseOrderPeer::AFFILIATEID, $this->id);

				$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelectJoinAffiliateUser($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientPurchaseOrderPeer::AFFILIATEID, $this->id);

			if (!isset($this->lastClientPurchaseOrderCriteria) || !$this->lastClientPurchaseOrderCriteria->equals($criteria)) {
				$this->collClientPurchaseOrders = ClientPurchaseOrderPeer::doSelectJoinAffiliateUser($criteria, $con, $join_behavior);
			}
		}
		$this->lastClientPurchaseOrderCriteria = $criteria;

		return $this->collClientPurchaseOrders;
	}

	/**
	 * Clears out the collSupplierPurchaseOrders collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSupplierPurchaseOrders()
	 */
	public function clearSupplierPurchaseOrders()
	{
		$this->collSupplierPurchaseOrders = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSupplierPurchaseOrders collection (array).
	 *
	 * By default this just sets the collSupplierPurchaseOrders collection to an empty array (like clearcollSupplierPurchaseOrders());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSupplierPurchaseOrders()
	{
		$this->collSupplierPurchaseOrders = array();
	}

	/**
	 * Gets an array of SupplierPurchaseOrder objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Affiliate has previously been saved, it will retrieve
	 * related SupplierPurchaseOrders from storage. If this Affiliate is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array SupplierPurchaseOrder[]
	 * @throws     PropelException
	 */
	public function getSupplierPurchaseOrders($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
			   $this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::AFFILIATEID, $this->id);

				SupplierPurchaseOrderPeer::addSelectColumns($criteria);
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(SupplierPurchaseOrderPeer::AFFILIATEID, $this->id);

				SupplierPurchaseOrderPeer::addSelectColumns($criteria);
				if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
					$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;
		return $this->collSupplierPurchaseOrders;
	}

	/**
	 * Returns the number of related SupplierPurchaseOrder objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SupplierPurchaseOrder objects.
	 * @throws     PropelException
	 */
	public function countSupplierPurchaseOrders(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::AFFILIATEID, $this->id);

				$count = SupplierPurchaseOrderPeer::doCount($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(SupplierPurchaseOrderPeer::AFFILIATEID, $this->id);

				if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
					$count = SupplierPurchaseOrderPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collSupplierPurchaseOrders);
				}
			} else {
				$count = count($this->collSupplierPurchaseOrders);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;
		return $count;
	}

	/**
	 * Method called to associate a SupplierPurchaseOrder object to this object
	 * through the SupplierPurchaseOrder foreign key attribute.
	 *
	 * @param      SupplierPurchaseOrder $l SupplierPurchaseOrder
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSupplierPurchaseOrder(SupplierPurchaseOrder $l)
	{
		if ($this->collSupplierPurchaseOrders === null) {
			$this->initSupplierPurchaseOrders();
		}
		if (!in_array($l, $this->collSupplierPurchaseOrders, true)) { // only add it if the **same** object is not already associated
			array_push($this->collSupplierPurchaseOrders, $l);
			$l->setAffiliate($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 */
	public function getSupplierPurchaseOrdersJoinSupplierQuote($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::AFFILIATEID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinSupplierQuote($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::AFFILIATEID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinSupplierQuote($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;

		return $this->collSupplierPurchaseOrders;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 */
	public function getSupplierPurchaseOrdersJoinClientQuote($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::AFFILIATEID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinClientQuote($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::AFFILIATEID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinClientQuote($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;

		return $this->collSupplierPurchaseOrders;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 */
	public function getSupplierPurchaseOrdersJoinSupplier($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::AFFILIATEID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinSupplier($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::AFFILIATEID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinSupplier($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;

		return $this->collSupplierPurchaseOrders;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 */
	public function getSupplierPurchaseOrdersJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::AFFILIATEID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinUser($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::AFFILIATEID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinUser($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;

		return $this->collSupplierPurchaseOrders;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Affiliate is new, it will return
	 * an empty collection; or if this Affiliate has previously
	 * been saved, it will retrieve related SupplierPurchaseOrders from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Affiliate.
	 */
	public function getSupplierPurchaseOrdersJoinAffiliateUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AffiliatePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSupplierPurchaseOrders === null) {
			if ($this->isNew()) {
				$this->collSupplierPurchaseOrders = array();
			} else {

				$criteria->add(SupplierPurchaseOrderPeer::AFFILIATEID, $this->id);

				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinAffiliateUser($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(SupplierPurchaseOrderPeer::AFFILIATEID, $this->id);

			if (!isset($this->lastSupplierPurchaseOrderCriteria) || !$this->lastSupplierPurchaseOrderCriteria->equals($criteria)) {
				$this->collSupplierPurchaseOrders = SupplierPurchaseOrderPeer::doSelectJoinAffiliateUser($criteria, $con, $join_behavior);
			}
		}
		$this->lastSupplierPurchaseOrderCriteria = $criteria;

		return $this->collSupplierPurchaseOrders;
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
			if ($this->collAffiliateUsers) {
				foreach ((array) $this->collAffiliateUsers as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAffiliateBranchs) {
				foreach ((array) $this->collAffiliateBranchs as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClientQuotes) {
				foreach ((array) $this->collClientQuotes as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClientPurchaseOrders) {
				foreach ((array) $this->collClientPurchaseOrders as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSupplierPurchaseOrders) {
				foreach ((array) $this->collSupplierPurchaseOrders as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collAffiliateUsers = null;
		$this->collAffiliateBranchs = null;
		$this->collClientQuotes = null;
		$this->collClientPurchaseOrders = null;
		$this->collSupplierPurchaseOrders = null;
	}

} // BaseAffiliate
