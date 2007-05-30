<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'anmaga/OrderTemplatePeer.php';

/**
 * Base class that represents a row from the 'orders_orderTemplate' table.
 *
 * Plantillas de Pedido de Productos
 *
 * This class was autogenerated by Propel on:
 *
 * 05/30/07 11:17:09
 *
 * @package anmaga.om
 */
abstract class BaseOrderTemplate extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var OrderTemplatePeer
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
	 * The value for the created field.
	 * @var int
	 */
	protected $created;


	/**
	 * The value for the userid field.
	 * @var int
	 */
	protected $userid;


	/**
	 * The value for the affiliateid field.
	 * @var int
	 */
	protected $affiliateid;


	/**
	 * The value for the branchid field.
	 * @var int
	 */
	protected $branchid;


	/**
	 * The value for the total field.
	 * @var double
	 */
	protected $total;

	/**
	 * @var UserByAffiliate
	 */
	protected $aUserByAffiliate;

	/**
	 * @var Affiliate
	 */
	protected $aAffiliate;

	/**
	 * @var Branch
	 */
	protected $aBranch;

	/**
	 * Collection to store aggregation of collOrderTemplateItems.
	 * @var array
	 */
	protected $collOrderTemplateItems;

	/**
	 * The criteria used to select the current contents of collOrderTemplateItems.
	 * @var Criteria
	 */
	protected $lastOrderTemplateItemCriteria = null;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Get the [id] column value.
	 * Id del pedido
	 * @return int
	 */
	public function getId()
	{

		return $this->id;
	}

	/**
	 * Get the [name] column value.
	 * Nombre de la plantilla
	 * @return string
	 */
	public function getName()
	{

		return $this->name;
	}

	/**
	 * Get the [optionally formatted] [created] column value.
	 * Fecha en que se creo el pedido
	 * @param string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the integer unix timestamp will be returned.
	 * @return mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
	 * @throws PropelException - if unable to convert the date/time to timestamp.
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
	 * @return int
	 */
	public function getUserid()
	{

		return $this->userid;
	}

	/**
	 * Get the [affiliateid] column value.
	 * Id del afiliado
	 * @return int
	 */
	public function getAffiliateid()
	{

		return $this->affiliateid;
	}

	/**
	 * Get the [branchid] column value.
	 * Id de la sucursal
	 * @return int
	 */
	public function getBranchid()
	{

		return $this->branchid;
	}

	/**
	 * Get the [total] column value.
	 * Precio total del pedido
	 * @return double
	 */
	public function getTotal()
	{

		return $this->total;
	}

	/**
	 * Set the value of [id] column.
	 * Id del pedido
	 * @param int $v new value
	 * @return void
	 */
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OrderTemplatePeer::ID;
		}

	} // setId()

	/**
	 * Set the value of [name] column.
	 * Nombre de la plantilla
	 * @param string $v new value
	 * @return void
	 */
	public function setName($v)
	{

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = OrderTemplatePeer::NAME;
		}

	} // setName()

	/**
	 * Set the value of [created] column.
	 * Fecha en que se creo el pedido
	 * @param int $v new value
	 * @return void
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
			$this->modifiedColumns[] = OrderTemplatePeer::CREATED;
		}

	} // setCreated()

	/**
	 * Set the value of [userid] column.
	 * Id del usuario
	 * @param int $v new value
	 * @return void
	 */
	public function setUserid($v)
	{

		if ($this->userid !== $v) {
			$this->userid = $v;
			$this->modifiedColumns[] = OrderTemplatePeer::USERID;
		}

		if ($this->aUserByAffiliate !== null && $this->aUserByAffiliate->getId() !== $v) {
			$this->aUserByAffiliate = null;
		}

	} // setUserid()

	/**
	 * Set the value of [affiliateid] column.
	 * Id del afiliado
	 * @param int $v new value
	 * @return void
	 */
	public function setAffiliateid($v)
	{

		if ($this->affiliateid !== $v) {
			$this->affiliateid = $v;
			$this->modifiedColumns[] = OrderTemplatePeer::AFFILIATEID;
		}

		if ($this->aAffiliate !== null && $this->aAffiliate->getId() !== $v) {
			$this->aAffiliate = null;
		}

	} // setAffiliateid()

	/**
	 * Set the value of [branchid] column.
	 * Id de la sucursal
	 * @param int $v new value
	 * @return void
	 */
	public function setBranchid($v)
	{

		if ($this->branchid !== $v) {
			$this->branchid = $v;
			$this->modifiedColumns[] = OrderTemplatePeer::BRANCHID;
		}

		if ($this->aBranch !== null && $this->aBranch->getId() !== $v) {
			$this->aBranch = null;
		}

	} // setBranchid()

	/**
	 * Set the value of [total] column.
	 * Precio total del pedido
	 * @param double $v new value
	 * @return void
	 */
	public function setTotal($v)
	{

		if ($this->total !== $v) {
			$this->total = $v;
			$this->modifiedColumns[] = OrderTemplatePeer::TOTAL;
		}

	} // setTotal()

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
	 * @return int next starting column
	 * @throws PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->created = $rs->getTimestamp($startcol + 2, null);

			$this->userid = $rs->getInt($startcol + 3);

			$this->affiliateid = $rs->getInt($startcol + 4);

			$this->branchid = $rs->getInt($startcol + 5);

			$this->total = $rs->getFloat($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 7; // 7 = OrderTemplatePeer::NUM_COLUMNS - OrderTemplatePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating OrderTemplate object", $e);
		}
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

		if ($con === null) {
			$con = Propel::getConnection(OrderTemplatePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OrderTemplatePeer::doDelete($this, $con);
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
	 * @param Connection $con
	 * @return int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws PropelException
	 * @see doSave()
	 */
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OrderTemplatePeer::DATABASE_NAME);
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
	 * @param Connection $con
	 * @return int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws PropelException
	 * @see save()
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

			if ($this->aUserByAffiliate !== null) {
				if ($this->aUserByAffiliate->isModified()) {
					$affectedRows += $this->aUserByAffiliate->save($con);
				}
				$this->setUserByAffiliate($this->aUserByAffiliate);
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
					$pk = OrderTemplatePeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += OrderTemplatePeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collOrderTemplateItems !== null) {
				foreach($this->collOrderTemplateItems as $referrerFK) {
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
	 * @var array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return array ValidationFailed[]
	 * @see validate()
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
	 * @param mixed $columns Column name or an array of column names.
	 * @return boolean Whether all columns pass validation.
	 * @see doValidate()
	 * @see getValidationFailures()
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
	 * @param array $columns Array of column names to validate.
	 * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
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

			if ($this->aUserByAffiliate !== null) {
				if (!$this->aUserByAffiliate->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUserByAffiliate->getValidationFailures());
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


			if (($retval = OrderTemplatePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collOrderTemplateItems !== null) {
					foreach($this->collOrderTemplateItems as $referrerFK) {
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
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(OrderTemplatePeer::DATABASE_NAME);

		if ($this->isColumnModified(OrderTemplatePeer::ID)) $criteria->add(OrderTemplatePeer::ID, $this->id);
		if ($this->isColumnModified(OrderTemplatePeer::NAME)) $criteria->add(OrderTemplatePeer::NAME, $this->name);
		if ($this->isColumnModified(OrderTemplatePeer::CREATED)) $criteria->add(OrderTemplatePeer::CREATED, $this->created);
		if ($this->isColumnModified(OrderTemplatePeer::USERID)) $criteria->add(OrderTemplatePeer::USERID, $this->userid);
		if ($this->isColumnModified(OrderTemplatePeer::AFFILIATEID)) $criteria->add(OrderTemplatePeer::AFFILIATEID, $this->affiliateid);
		if ($this->isColumnModified(OrderTemplatePeer::BRANCHID)) $criteria->add(OrderTemplatePeer::BRANCHID, $this->branchid);
		if ($this->isColumnModified(OrderTemplatePeer::TOTAL)) $criteria->add(OrderTemplatePeer::TOTAL, $this->total);

		return $criteria;
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
		$criteria = new Criteria(OrderTemplatePeer::DATABASE_NAME);

		$criteria->add(OrderTemplatePeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param int $key Primary key.
	 * @return void
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
	 * @param object $copyObj An object of OrderTemplate (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setName($this->name);

		$copyObj->setCreated($this->created);

		$copyObj->setUserid($this->userid);

		$copyObj->setAffiliateid($this->affiliateid);

		$copyObj->setBranchid($this->branchid);

		$copyObj->setTotal($this->total);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getOrderTemplateItems() as $relObj) {
				$copyObj->addOrderTemplateItem($relObj->copy($deepCopy));
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
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return OrderTemplate Clone of current object.
	 * @throws PropelException
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
	 * @return OrderTemplatePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new OrderTemplatePeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a UserByAffiliate object.
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
		// include the related Peer class
		include_once 'anmaga/om/BaseUserByAffiliatePeer.php';

		if ($this->aUserByAffiliate === null && ($this->userid !== null)) {

			$this->aUserByAffiliate = UserByAffiliatePeer::retrieveByPK($this->userid, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = UserByAffiliatePeer::retrieveByPK($this->userid, $con);
			   $obj->addUserByAffiliates($this);
			 */
		}
		return $this->aUserByAffiliate;
	}

	/**
	 * Declares an association between this object and a Affiliate object.
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
	 * @param Branch $v
	 * @return void
	 * @throws PropelException
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
	 * @param Connection Optional Connection object.
	 * @return Branch The associated Branch object.
	 * @throws PropelException
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
	 * Temporary storage of collOrderTemplateItems to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initOrderTemplateItems()
	{
		if ($this->collOrderTemplateItems === null) {
			$this->collOrderTemplateItems = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this OrderTemplate has previously
	 * been saved, it will retrieve related OrderTemplateItems from storage.
	 * If this OrderTemplate is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getOrderTemplateItems($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseOrderTemplateItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOrderTemplateItems === null) {
			if ($this->isNew()) {
			   $this->collOrderTemplateItems = array();
			} else {

				$criteria->add(OrderTemplateItemPeer::ORDERTEMPLATEID, $this->getId());

				OrderTemplateItemPeer::addSelectColumns($criteria);
				$this->collOrderTemplateItems = OrderTemplateItemPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(OrderTemplateItemPeer::ORDERTEMPLATEID, $this->getId());

				OrderTemplateItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastOrderTemplateItemCriteria) || !$this->lastOrderTemplateItemCriteria->equals($criteria)) {
					$this->collOrderTemplateItems = OrderTemplateItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastOrderTemplateItemCriteria = $criteria;
		return $this->collOrderTemplateItems;
	}

	/**
	 * Returns the number of related OrderTemplateItems.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countOrderTemplateItems($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseOrderTemplateItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(OrderTemplateItemPeer::ORDERTEMPLATEID, $this->getId());

		return OrderTemplateItemPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a OrderTemplateItem object to this object
	 * through the OrderTemplateItem foreign key attribute
	 *
	 * @param OrderTemplateItem $l OrderTemplateItem
	 * @return void
	 * @throws PropelException
	 */
	public function addOrderTemplateItem(OrderTemplateItem $l)
	{
		$this->collOrderTemplateItems[] = $l;
		$l->setOrderTemplate($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this OrderTemplate is new, it will return
	 * an empty collection; or if this OrderTemplate has previously
	 * been saved, it will retrieve related OrderTemplateItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in OrderTemplate.
	 */
	public function getOrderTemplateItemsJoinProduct($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseOrderTemplateItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOrderTemplateItems === null) {
			if ($this->isNew()) {
				$this->collOrderTemplateItems = array();
			} else {

				$criteria->add(OrderTemplateItemPeer::ORDERTEMPLATEID, $this->getId());

				$this->collOrderTemplateItems = OrderTemplateItemPeer::doSelectJoinProduct($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(OrderTemplateItemPeer::ORDERTEMPLATEID, $this->getId());

			if (!isset($this->lastOrderTemplateItemCriteria) || !$this->lastOrderTemplateItemCriteria->equals($criteria)) {
				$this->collOrderTemplateItems = OrderTemplateItemPeer::doSelectJoinProduct($criteria, $con);
			}
		}
		$this->lastOrderTemplateItemCriteria = $criteria;

		return $this->collOrderTemplateItems;
	}

} // BaseOrderTemplate
