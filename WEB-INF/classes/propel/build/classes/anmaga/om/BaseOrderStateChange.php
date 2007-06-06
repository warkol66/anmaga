<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'anmaga/OrderStateChangePeer.php';

/**
 * Base class that represents a row from the 'orders_stateChanges' table.
 *
 * Cambios de Estado de Pedidos de Productos
 *
 * This class was autogenerated by Propel on:
 *
 * 06/06/07 16:37:58
 *
 * @package    anmaga.om
 */
abstract class BaseOrderStateChange extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        OrderStateChangePeer
	 */
	protected static $peer;


	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;


	/**
	 * The value for the created field.
	 * @var        int
	 */
	protected $created;


	/**
	 * The value for the orderid field.
	 * @var        int
	 */
	protected $orderid;


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
	 * The value for the state field.
	 * @var        int
	 */
	protected $state;


	/**
	 * The value for the comment field.
	 * @var        string
	 */
	protected $comment;

	/**
	 * @var        Order
	 */
	protected $aOrder;

	/**
	 * @var        UserByAffiliate
	 */
	protected $aUserByAffiliate;

	/**
	 * @var        Affiliate
	 */
	protected $aAffiliate;

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
	 * Id del cambio de estado del pedido
	 * @return     int
	 */
	public function getId()
	{

		return $this->id;
	}

	/**
	 * Get the [optionally formatted] [created] column value.
	 * Fecha en que se cambio el estado
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
	 * Get the [orderid] column value.
	 * Id del pedido
	 * @return     int
	 */
	public function getOrderid()
	{

		return $this->orderid;
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
	 * Get the [state] column value.
	 * Nuevo estado
	 * @return     int
	 */
	public function getState()
	{

		return $this->state;
	}

	/**
	 * Get the [comment] column value.
	 * Comentarios
	 * @return     string
	 */
	public function getComment()
	{

		return $this->comment;
	}

	/**
	 * Set the value of [id] column.
	 * Id del cambio de estado del pedido
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
			$this->modifiedColumns[] = OrderStateChangePeer::ID;
		}

	} // setId()

	/**
	 * Set the value of [created] column.
	 * Fecha en que se cambio el estado
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
			$this->modifiedColumns[] = OrderStateChangePeer::CREATED;
		}

	} // setCreated()

	/**
	 * Set the value of [orderid] column.
	 * Id del pedido
	 * @param      int $v new value
	 * @return     void
	 */
	public function setOrderid($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->orderid !== $v) {
			$this->orderid = $v;
			$this->modifiedColumns[] = OrderStateChangePeer::ORDERID;
		}

		if ($this->aOrder !== null && $this->aOrder->getId() !== $v) {
			$this->aOrder = null;
		}

	} // setOrderid()

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
			$this->modifiedColumns[] = OrderStateChangePeer::USERID;
		}

		if ($this->aUserByAffiliate !== null && $this->aUserByAffiliate->getId() !== $v) {
			$this->aUserByAffiliate = null;
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
			$this->modifiedColumns[] = OrderStateChangePeer::AFFILIATEID;
		}

		if ($this->aAffiliate !== null && $this->aAffiliate->getId() !== $v) {
			$this->aAffiliate = null;
		}

	} // setAffiliateid()

	/**
	 * Set the value of [state] column.
	 * Nuevo estado
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
			$this->modifiedColumns[] = OrderStateChangePeer::STATE;
		}

	} // setState()

	/**
	 * Set the value of [comment] column.
	 * Comentarios
	 * @param      string $v new value
	 * @return     void
	 */
	public function setComment($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->comment !== $v) {
			$this->comment = $v;
			$this->modifiedColumns[] = OrderStateChangePeer::COMMENT;
		}

	} // setComment()

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

			$this->created = $rs->getTimestamp($startcol + 1, null);

			$this->orderid = $rs->getInt($startcol + 2);

			$this->userid = $rs->getInt($startcol + 3);

			$this->affiliateid = $rs->getInt($startcol + 4);

			$this->state = $rs->getInt($startcol + 5);

			$this->comment = $rs->getString($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 7; // 7 = OrderStateChangePeer::NUM_COLUMNS - OrderStateChangePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating OrderStateChange object", $e);
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
			$con = Propel::getConnection(OrderStateChangePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OrderStateChangePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OrderStateChangePeer::DATABASE_NAME);
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

			if ($this->aOrder !== null) {
				if ($this->aOrder->isModified()) {
					$affectedRows += $this->aOrder->save($con);
				}
				$this->setOrder($this->aOrder);
			}

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


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = OrderStateChangePeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += OrderStateChangePeer::doUpdate($this, $con);
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

			if ($this->aOrder !== null) {
				if (!$this->aOrder->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOrder->getValidationFailures());
				}
			}

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


			if (($retval = OrderStateChangePeer::doValidate($this, $columns)) !== true) {
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
		$criteria = new Criteria(OrderStateChangePeer::DATABASE_NAME);

		if ($this->isColumnModified(OrderStateChangePeer::ID)) $criteria->add(OrderStateChangePeer::ID, $this->id);
		if ($this->isColumnModified(OrderStateChangePeer::CREATED)) $criteria->add(OrderStateChangePeer::CREATED, $this->created);
		if ($this->isColumnModified(OrderStateChangePeer::ORDERID)) $criteria->add(OrderStateChangePeer::ORDERID, $this->orderid);
		if ($this->isColumnModified(OrderStateChangePeer::USERID)) $criteria->add(OrderStateChangePeer::USERID, $this->userid);
		if ($this->isColumnModified(OrderStateChangePeer::AFFILIATEID)) $criteria->add(OrderStateChangePeer::AFFILIATEID, $this->affiliateid);
		if ($this->isColumnModified(OrderStateChangePeer::STATE)) $criteria->add(OrderStateChangePeer::STATE, $this->state);
		if ($this->isColumnModified(OrderStateChangePeer::COMMENT)) $criteria->add(OrderStateChangePeer::COMMENT, $this->comment);

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
		$criteria = new Criteria(OrderStateChangePeer::DATABASE_NAME);

		$criteria->add(OrderStateChangePeer::ID, $this->id);

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
	 * @param      object $copyObj An object of OrderStateChange (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCreated($this->created);

		$copyObj->setOrderid($this->orderid);

		$copyObj->setUserid($this->userid);

		$copyObj->setAffiliateid($this->affiliateid);

		$copyObj->setState($this->state);

		$copyObj->setComment($this->comment);


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
	 * @return     OrderStateChange Clone of current object.
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
	 * @return     OrderStateChangePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new OrderStateChangePeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Order object.
	 *
	 * @param      Order $v
	 * @return     void
	 * @throws     PropelException
	 */
	public function setOrder($v)
	{


		if ($v === null) {
			$this->setOrderid(NULL);
		} else {
			$this->setOrderid($v->getId());
		}


		$this->aOrder = $v;
	}


	/**
	 * Get the associated Order object
	 *
	 * @param      Connection Optional Connection object.
	 * @return     Order The associated Order object.
	 * @throws     PropelException
	 */
	public function getOrder($con = null)
	{
		// include the related Peer class
		include_once 'anmaga/om/BaseOrderPeer.php';

		if ($this->aOrder === null && ($this->orderid !== null)) {

			$this->aOrder = OrderPeer::retrieveByPK($this->orderid, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = OrderPeer::retrieveByPK($this->orderid, $con);
			   $obj->addOrders($this);
			 */
		}
		return $this->aOrder;
	}

	/**
	 * Declares an association between this object and a UserByAffiliate object.
	 *
	 * @param      UserByAffiliate $v
	 * @return     void
	 * @throws     PropelException
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
	 * @param      Connection Optional Connection object.
	 * @return     UserByAffiliate The associated UserByAffiliate object.
	 * @throws     PropelException
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

} // BaseOrderStateChange
