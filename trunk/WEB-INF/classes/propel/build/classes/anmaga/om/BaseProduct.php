<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'anmaga/ProductPeer.php';

/**
 * Base class that represents a row from the 'product' table.
 *
 * Producto
 *
 * This class was autogenerated by Propel on:
 *
 * 06/04/07 12:21:11
 *
 * @package anmaga.om
 */
abstract class BaseProduct extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var ProductPeer
	 */
	protected static $peer;


	/**
	 * The value for the id field.
	 * @var int
	 */
	protected $id;


	/**
	 * The value for the code field.
	 * @var string
	 */
	protected $code;


	/**
	 * The value for the description field.
	 * @var string
	 */
	protected $description;


	/**
	 * The value for the price field.
	 * @var double
	 */
	protected $price;


	/**
	 * The value for the unitid field.
	 * @var int
	 */
	protected $unitid;


	/**
	 * The value for the measureunitid field.
	 * @var int
	 */
	protected $measureunitid;

	/**
	 * @var Unit
	 */
	protected $aUnit;

	/**
	 * @var MeasureUnit
	 */
	protected $aMeasureUnit;

	/**
	 * Collection to store aggregation of collOrderItems.
	 * @var array
	 */
	protected $collOrderItems;

	/**
	 * The criteria used to select the current contents of collOrderItems.
	 * @var Criteria
	 */
	protected $lastOrderItemCriteria = null;

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
	 * Id del producto
	 * @return int
	 */
	public function getId()
	{

		return $this->id;
	}

	/**
	 * Get the [code] column value.
	 * Codigo del producto
	 * @return string
	 */
	public function getCode()
	{

		return $this->code;
	}

	/**
	 * Get the [description] column value.
	 * Descripcion
	 * @return string
	 */
	public function getDescription()
	{

		return $this->description;
	}

	/**
	 * Get the [price] column value.
	 * Precio del producto
	 * @return double
	 */
	public function getPrice()
	{

		return $this->price;
	}

	/**
	 * Get the [unitid] column value.
	 * Unidades
	 * @return int
	 */
	public function getUnitid()
	{

		return $this->unitid;
	}

	/**
	 * Get the [measureunitid] column value.
	 * Unidad de Medida
	 * @return int
	 */
	public function getMeasureunitid()
	{

		return $this->measureunitid;
	}

	/**
	 * Set the value of [id] column.
	 * Id del producto
	 * @param int $v new value
	 * @return void
	 */
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ProductPeer::ID;
		}

	} // setId()

	/**
	 * Set the value of [code] column.
	 * Codigo del producto
	 * @param string $v new value
	 * @return void
	 */
	public function setCode($v)
	{

		if ($this->code !== $v) {
			$this->code = $v;
			$this->modifiedColumns[] = ProductPeer::CODE;
		}

	} // setCode()

	/**
	 * Set the value of [description] column.
	 * Descripcion
	 * @param string $v new value
	 * @return void
	 */
	public function setDescription($v)
	{

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = ProductPeer::DESCRIPTION;
		}

	} // setDescription()

	/**
	 * Set the value of [price] column.
	 * Precio del producto
	 * @param double $v new value
	 * @return void
	 */
	public function setPrice($v)
	{

		if ($this->price !== $v) {
			$this->price = $v;
			$this->modifiedColumns[] = ProductPeer::PRICE;
		}

	} // setPrice()

	/**
	 * Set the value of [unitid] column.
	 * Unidades
	 * @param int $v new value
	 * @return void
	 */
	public function setUnitid($v)
	{

		if ($this->unitid !== $v) {
			$this->unitid = $v;
			$this->modifiedColumns[] = ProductPeer::UNITID;
		}

		if ($this->aUnit !== null && $this->aUnit->getId() !== $v) {
			$this->aUnit = null;
		}

	} // setUnitid()

	/**
	 * Set the value of [measureunitid] column.
	 * Unidad de Medida
	 * @param int $v new value
	 * @return void
	 */
	public function setMeasureunitid($v)
	{

		if ($this->measureunitid !== $v) {
			$this->measureunitid = $v;
			$this->modifiedColumns[] = ProductPeer::MEASUREUNITID;
		}

		if ($this->aMeasureUnit !== null && $this->aMeasureUnit->getId() !== $v) {
			$this->aMeasureUnit = null;
		}

	} // setMeasureunitid()

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

			$this->code = $rs->getString($startcol + 1);

			$this->description = $rs->getString($startcol + 2);

			$this->price = $rs->getFloat($startcol + 3);

			$this->unitid = $rs->getInt($startcol + 4);

			$this->measureunitid = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 6; // 6 = ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Product object", $e);
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
			$con = Propel::getConnection(ProductPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ProductPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ProductPeer::DATABASE_NAME);
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

			if ($this->aUnit !== null) {
				if ($this->aUnit->isModified()) {
					$affectedRows += $this->aUnit->save($con);
				}
				$this->setUnit($this->aUnit);
			}

			if ($this->aMeasureUnit !== null) {
				if ($this->aMeasureUnit->isModified()) {
					$affectedRows += $this->aMeasureUnit->save($con);
				}
				$this->setMeasureUnit($this->aMeasureUnit);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ProductPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ProductPeer::doUpdate($this, $con);
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

			if ($this->aUnit !== null) {
				if (!$this->aUnit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUnit->getValidationFailures());
				}
			}

			if ($this->aMeasureUnit !== null) {
				if (!$this->aMeasureUnit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aMeasureUnit->getValidationFailures());
				}
			}


			if (($retval = ProductPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collOrderItems !== null) {
					foreach($this->collOrderItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
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
		$criteria = new Criteria(ProductPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProductPeer::ID)) $criteria->add(ProductPeer::ID, $this->id);
		if ($this->isColumnModified(ProductPeer::CODE)) $criteria->add(ProductPeer::CODE, $this->code);
		if ($this->isColumnModified(ProductPeer::DESCRIPTION)) $criteria->add(ProductPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(ProductPeer::PRICE)) $criteria->add(ProductPeer::PRICE, $this->price);
		if ($this->isColumnModified(ProductPeer::UNITID)) $criteria->add(ProductPeer::UNITID, $this->unitid);
		if ($this->isColumnModified(ProductPeer::MEASUREUNITID)) $criteria->add(ProductPeer::MEASUREUNITID, $this->measureunitid);

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
		$criteria = new Criteria(ProductPeer::DATABASE_NAME);

		$criteria->add(ProductPeer::ID, $this->id);

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
	 * @param object $copyObj An object of Product (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCode($this->code);

		$copyObj->setDescription($this->description);

		$copyObj->setPrice($this->price);

		$copyObj->setUnitid($this->unitid);

		$copyObj->setMeasureunitid($this->measureunitid);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getOrderItems() as $relObj) {
				$copyObj->addOrderItem($relObj->copy($deepCopy));
			}

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
	 * @return Product Clone of current object.
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
	 * @return ProductPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ProductPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Unit object.
	 *
	 * @param Unit $v
	 * @return void
	 * @throws PropelException
	 */
	public function setUnit($v)
	{


		if ($v === null) {
			$this->setUnitid(NULL);
		} else {
			$this->setUnitid($v->getId());
		}


		$this->aUnit = $v;
	}


	/**
	 * Get the associated Unit object
	 *
	 * @param Connection Optional Connection object.
	 * @return Unit The associated Unit object.
	 * @throws PropelException
	 */
	public function getUnit($con = null)
	{
		// include the related Peer class
		include_once 'anmaga/om/BaseUnitPeer.php';

		if ($this->aUnit === null && ($this->unitid !== null)) {

			$this->aUnit = UnitPeer::retrieveByPK($this->unitid, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = UnitPeer::retrieveByPK($this->unitid, $con);
			   $obj->addUnits($this);
			 */
		}
		return $this->aUnit;
	}

	/**
	 * Declares an association between this object and a MeasureUnit object.
	 *
	 * @param MeasureUnit $v
	 * @return void
	 * @throws PropelException
	 */
	public function setMeasureUnit($v)
	{


		if ($v === null) {
			$this->setMeasureunitid(NULL);
		} else {
			$this->setMeasureunitid($v->getId());
		}


		$this->aMeasureUnit = $v;
	}


	/**
	 * Get the associated MeasureUnit object
	 *
	 * @param Connection Optional Connection object.
	 * @return MeasureUnit The associated MeasureUnit object.
	 * @throws PropelException
	 */
	public function getMeasureUnit($con = null)
	{
		// include the related Peer class
		include_once 'anmaga/om/BaseMeasureUnitPeer.php';

		if ($this->aMeasureUnit === null && ($this->measureunitid !== null)) {

			$this->aMeasureUnit = MeasureUnitPeer::retrieveByPK($this->measureunitid, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = MeasureUnitPeer::retrieveByPK($this->measureunitid, $con);
			   $obj->addMeasureUnits($this);
			 */
		}
		return $this->aMeasureUnit;
	}

	/**
	 * Temporary storage of collOrderItems to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
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
	 * Otherwise if this Product has previously
	 * been saved, it will retrieve related OrderItems from storage.
	 * If this Product is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
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

				$criteria->add(OrderItemPeer::PRODUCTID, $this->getId());

				OrderItemPeer::addSelectColumns($criteria);
				$this->collOrderItems = OrderItemPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(OrderItemPeer::PRODUCTID, $this->getId());

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
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
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

		$criteria->add(OrderItemPeer::PRODUCTID, $this->getId());

		return OrderItemPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a OrderItem object to this object
	 * through the OrderItem foreign key attribute
	 *
	 * @param OrderItem $l OrderItem
	 * @return void
	 * @throws PropelException
	 */
	public function addOrderItem(OrderItem $l)
	{
		$this->collOrderItems[] = $l;
		$l->setProduct($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related OrderItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getOrderItemsJoinOrder($criteria = null, $con = null)
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

				$criteria->add(OrderItemPeer::PRODUCTID, $this->getId());

				$this->collOrderItems = OrderItemPeer::doSelectJoinOrder($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(OrderItemPeer::PRODUCTID, $this->getId());

			if (!isset($this->lastOrderItemCriteria) || !$this->lastOrderItemCriteria->equals($criteria)) {
				$this->collOrderItems = OrderItemPeer::doSelectJoinOrder($criteria, $con);
			}
		}
		$this->lastOrderItemCriteria = $criteria;

		return $this->collOrderItems;
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
	 * Otherwise if this Product has previously
	 * been saved, it will retrieve related OrderTemplateItems from storage.
	 * If this Product is new, it will return
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

				$criteria->add(OrderTemplateItemPeer::PRODUCTID, $this->getId());

				OrderTemplateItemPeer::addSelectColumns($criteria);
				$this->collOrderTemplateItems = OrderTemplateItemPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(OrderTemplateItemPeer::PRODUCTID, $this->getId());

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

		$criteria->add(OrderTemplateItemPeer::PRODUCTID, $this->getId());

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
		$l->setProduct($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Product is new, it will return
	 * an empty collection; or if this Product has previously
	 * been saved, it will retrieve related OrderTemplateItems from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Product.
	 */
	public function getOrderTemplateItemsJoinOrderTemplate($criteria = null, $con = null)
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

				$criteria->add(OrderTemplateItemPeer::PRODUCTID, $this->getId());

				$this->collOrderTemplateItems = OrderTemplateItemPeer::doSelectJoinOrderTemplate($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(OrderTemplateItemPeer::PRODUCTID, $this->getId());

			if (!isset($this->lastOrderTemplateItemCriteria) || !$this->lastOrderTemplateItemCriteria->equals($criteria)) {
				$this->collOrderTemplateItems = OrderTemplateItemPeer::doSelectJoinOrderTemplate($criteria, $con);
			}
		}
		$this->lastOrderTemplateItemCriteria = $criteria;

		return $this->collOrderTemplateItems;
	}

} // BaseProduct
