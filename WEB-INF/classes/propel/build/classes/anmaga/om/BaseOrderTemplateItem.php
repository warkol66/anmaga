<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'anmaga/OrderTemplateItemPeer.php';

/**
 * Base class that represents a row from the 'orders_orderTemplateItem' table.
 *
 * Item de la Plantilla de Pedido de Productos
 *
 * This class was autogenerated by Propel on:
 *
 * 09/03/07 20:26:20
 *
 * @package    anmaga.om
 */
abstract class BaseOrderTemplateItem extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        OrderTemplateItemPeer
	 */
	protected static $peer;


	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;


	/**
	 * The value for the ordertemplateid field.
	 * @var        int
	 */
	protected $ordertemplateid;


	/**
	 * The value for the productid field.
	 * @var        int
	 */
	protected $productid;


	/**
	 * The value for the price field.
	 * @var        double
	 */
	protected $price;


	/**
	 * The value for the quantity field.
	 * @var        int
	 */
	protected $quantity;

	/**
	 * @var        OrderTemplate
	 */
	protected $aOrderTemplate;

	/**
	 * @var        Product
	 */
	protected $aProduct;

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
	 * Id del item del pedido
	 * @return     int
	 */
	public function getId()
	{

		return $this->id;
	}

	/**
	 * Get the [ordertemplateid] column value.
	 * Id del pedido
	 * @return     int
	 */
	public function getOrdertemplateid()
	{

		return $this->ordertemplateid;
	}

	/**
	 * Get the [productid] column value.
	 * Id del usuario
	 * @return     int
	 */
	public function getProductid()
	{

		return $this->productid;
	}

	/**
	 * Get the [price] column value.
	 * Precio del producto
	 * @return     double
	 */
	public function getPrice()
	{

		return $this->price;
	}

	/**
	 * Get the [quantity] column value.
	 * Cantidad del producto en el pedido
	 * @return     int
	 */
	public function getQuantity()
	{

		return $this->quantity;
	}

	/**
	 * Set the value of [id] column.
	 * Id del item del pedido
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
			$this->modifiedColumns[] = OrderTemplateItemPeer::ID;
		}

	} // setId()

	/**
	 * Set the value of [ordertemplateid] column.
	 * Id del pedido
	 * @param      int $v new value
	 * @return     void
	 */
	public function setOrdertemplateid($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->ordertemplateid !== $v) {
			$this->ordertemplateid = $v;
			$this->modifiedColumns[] = OrderTemplateItemPeer::ORDERTEMPLATEID;
		}

		if ($this->aOrderTemplate !== null && $this->aOrderTemplate->getId() !== $v) {
			$this->aOrderTemplate = null;
		}

	} // setOrdertemplateid()

	/**
	 * Set the value of [productid] column.
	 * Id del usuario
	 * @param      int $v new value
	 * @return     void
	 */
	public function setProductid($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->productid !== $v) {
			$this->productid = $v;
			$this->modifiedColumns[] = OrderTemplateItemPeer::PRODUCTID;
		}

		if ($this->aProduct !== null && $this->aProduct->getId() !== $v) {
			$this->aProduct = null;
		}

	} // setProductid()

	/**
	 * Set the value of [price] column.
	 * Precio del producto
	 * @param      double $v new value
	 * @return     void
	 */
	public function setPrice($v)
	{

		if ($this->price !== $v) {
			$this->price = $v;
			$this->modifiedColumns[] = OrderTemplateItemPeer::PRICE;
		}

	} // setPrice()

	/**
	 * Set the value of [quantity] column.
	 * Cantidad del producto en el pedido
	 * @param      int $v new value
	 * @return     void
	 */
	public function setQuantity($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->quantity !== $v) {
			$this->quantity = $v;
			$this->modifiedColumns[] = OrderTemplateItemPeer::QUANTITY;
		}

	} // setQuantity()

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

			$this->ordertemplateid = $rs->getInt($startcol + 1);

			$this->productid = $rs->getInt($startcol + 2);

			$this->price = $rs->getFloat($startcol + 3);

			$this->quantity = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 5; // 5 = OrderTemplateItemPeer::NUM_COLUMNS - OrderTemplateItemPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating OrderTemplateItem object", $e);
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
			$con = Propel::getConnection(OrderTemplateItemPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OrderTemplateItemPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OrderTemplateItemPeer::DATABASE_NAME);
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

			if ($this->aOrderTemplate !== null) {
				if ($this->aOrderTemplate->isModified()) {
					$affectedRows += $this->aOrderTemplate->save($con);
				}
				$this->setOrderTemplate($this->aOrderTemplate);
			}

			if ($this->aProduct !== null) {
				if ($this->aProduct->isModified()) {
					$affectedRows += $this->aProduct->save($con);
				}
				$this->setProduct($this->aProduct);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = OrderTemplateItemPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += OrderTemplateItemPeer::doUpdate($this, $con);
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

			if ($this->aOrderTemplate !== null) {
				if (!$this->aOrderTemplate->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOrderTemplate->getValidationFailures());
				}
			}

			if ($this->aProduct !== null) {
				if (!$this->aProduct->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProduct->getValidationFailures());
				}
			}


			if (($retval = OrderTemplateItemPeer::doValidate($this, $columns)) !== true) {
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
		$criteria = new Criteria(OrderTemplateItemPeer::DATABASE_NAME);

		if ($this->isColumnModified(OrderTemplateItemPeer::ID)) $criteria->add(OrderTemplateItemPeer::ID, $this->id);
		if ($this->isColumnModified(OrderTemplateItemPeer::ORDERTEMPLATEID)) $criteria->add(OrderTemplateItemPeer::ORDERTEMPLATEID, $this->ordertemplateid);
		if ($this->isColumnModified(OrderTemplateItemPeer::PRODUCTID)) $criteria->add(OrderTemplateItemPeer::PRODUCTID, $this->productid);
		if ($this->isColumnModified(OrderTemplateItemPeer::PRICE)) $criteria->add(OrderTemplateItemPeer::PRICE, $this->price);
		if ($this->isColumnModified(OrderTemplateItemPeer::QUANTITY)) $criteria->add(OrderTemplateItemPeer::QUANTITY, $this->quantity);

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
		$criteria = new Criteria(OrderTemplateItemPeer::DATABASE_NAME);

		$criteria->add(OrderTemplateItemPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of OrderTemplateItem (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setOrdertemplateid($this->ordertemplateid);

		$copyObj->setProductid($this->productid);

		$copyObj->setPrice($this->price);

		$copyObj->setQuantity($this->quantity);


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
	 * @return     OrderTemplateItem Clone of current object.
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
	 * @return     OrderTemplateItemPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new OrderTemplateItemPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a OrderTemplate object.
	 *
	 * @param      OrderTemplate $v
	 * @return     void
	 * @throws     PropelException
	 */
	public function setOrderTemplate($v)
	{


		if ($v === null) {
			$this->setOrdertemplateid(NULL);
		} else {
			$this->setOrdertemplateid($v->getId());
		}


		$this->aOrderTemplate = $v;
	}


	/**
	 * Get the associated OrderTemplate object
	 *
	 * @param      Connection Optional Connection object.
	 * @return     OrderTemplate The associated OrderTemplate object.
	 * @throws     PropelException
	 */
	public function getOrderTemplate($con = null)
	{
		// include the related Peer class
		include_once 'anmaga/om/BaseOrderTemplatePeer.php';

		if ($this->aOrderTemplate === null && ($this->ordertemplateid !== null)) {

			$this->aOrderTemplate = OrderTemplatePeer::retrieveByPK($this->ordertemplateid, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = OrderTemplatePeer::retrieveByPK($this->ordertemplateid, $con);
			   $obj->addOrderTemplates($this);
			 */
		}
		return $this->aOrderTemplate;
	}

	/**
	 * Declares an association between this object and a Product object.
	 *
	 * @param      Product $v
	 * @return     void
	 * @throws     PropelException
	 */
	public function setProduct($v)
	{


		if ($v === null) {
			$this->setProductid(NULL);
		} else {
			$this->setProductid($v->getId());
		}


		$this->aProduct = $v;
	}


	/**
	 * Get the associated Product object
	 *
	 * @param      Connection Optional Connection object.
	 * @return     Product The associated Product object.
	 * @throws     PropelException
	 */
	public function getProduct($con = null)
	{
		// include the related Peer class
		include_once 'anmaga/om/BaseProductPeer.php';

		if ($this->aProduct === null && ($this->productid !== null)) {

			$this->aProduct = ProductPeer::retrieveByPK($this->productid, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = ProductPeer::retrieveByPK($this->productid, $con);
			   $obj->addProducts($this);
			 */
		}
		return $this->aProduct;
	}

} // BaseOrderTemplateItem
