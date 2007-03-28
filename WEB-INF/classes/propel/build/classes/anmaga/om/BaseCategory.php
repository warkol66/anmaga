<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'anmaga/CategoryPeer.php';

/**
 * Base class that represents a row from the 'category' table.
 *
 * Categorias
 *
 * This class was autogenerated by Propel on:
 *
 * 03/28/07 13:59:17
 *
 * @package anmaga.om
 */
abstract class BaseCategory extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var CategoryPeer
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
	 * The value for the active field.
	 * @var boolean
	 */
	protected $active;

	/**
	 * Collection to store aggregation of collGroupCategorys.
	 * @var array
	 */
	protected $collGroupCategorys;

	/**
	 * The criteria used to select the current contents of collGroupCategorys.
	 * @var Criteria
	 */
	protected $lastGroupCategoryCriteria = null;

	/**
	 * Collection to store aggregation of collUsersByAffiliateGroupCategorys.
	 * @var array
	 */
	protected $collUsersByAffiliateGroupCategorys;

	/**
	 * The criteria used to select the current contents of collUsersByAffiliateGroupCategorys.
	 * @var Criteria
	 */
	protected $lastUsersByAffiliateGroupCategoryCriteria = null;

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
	 * 
	 * @return int
	 */
	public function getId()
	{

		return $this->id;
	}

	/**
	 * Get the [name] column value.
	 * Category name
	 * @return string
	 */
	public function getName()
	{

		return $this->name;
	}

	/**
	 * Get the [active] column value.
	 * Is category active?
	 * @return boolean
	 */
	public function getActive()
	{

		return $this->active;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param int $v new value
	 * @return void
	 */
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CategoryPeer::ID;
		}

	} // setId()

	/**
	 * Set the value of [name] column.
	 * Category name
	 * @param string $v new value
	 * @return void
	 */
	public function setName($v)
	{

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = CategoryPeer::NAME;
		}

	} // setName()

	/**
	 * Set the value of [active] column.
	 * Is category active?
	 * @param boolean $v new value
	 * @return void
	 */
	public function setActive($v)
	{

		if ($this->active !== $v) {
			$this->active = $v;
			$this->modifiedColumns[] = CategoryPeer::ACTIVE;
		}

	} // setActive()

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

			$this->active = $rs->getBoolean($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 3; // 3 = CategoryPeer::NUM_COLUMNS - CategoryPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Category object", $e);
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
			$con = Propel::getConnection(CategoryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CategoryPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CategoryPeer::DATABASE_NAME);
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


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CategoryPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += CategoryPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collGroupCategorys !== null) {
				foreach($this->collGroupCategorys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUsersByAffiliateGroupCategorys !== null) {
				foreach($this->collUsersByAffiliateGroupCategorys as $referrerFK) {
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


			if (($retval = CategoryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collGroupCategorys !== null) {
					foreach($this->collGroupCategorys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUsersByAffiliateGroupCategorys !== null) {
					foreach($this->collUsersByAffiliateGroupCategorys as $referrerFK) {
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
		$criteria = new Criteria(CategoryPeer::DATABASE_NAME);

		if ($this->isColumnModified(CategoryPeer::ID)) $criteria->add(CategoryPeer::ID, $this->id);
		if ($this->isColumnModified(CategoryPeer::NAME)) $criteria->add(CategoryPeer::NAME, $this->name);
		if ($this->isColumnModified(CategoryPeer::ACTIVE)) $criteria->add(CategoryPeer::ACTIVE, $this->active);

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
		$criteria = new Criteria(CategoryPeer::DATABASE_NAME);

		$criteria->add(CategoryPeer::ID, $this->id);

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
	 * @param object $copyObj An object of Category (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setName($this->name);

		$copyObj->setActive($this->active);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getGroupCategorys() as $relObj) {
				$copyObj->addGroupCategory($relObj->copy($deepCopy));
			}

			foreach($this->getUsersByAffiliateGroupCategorys() as $relObj) {
				$copyObj->addUsersByAffiliateGroupCategory($relObj->copy($deepCopy));
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
	 * @return Category Clone of current object.
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
	 * @return CategoryPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CategoryPeer();
		}
		return self::$peer;
	}

	/**
	 * Temporary storage of collGroupCategorys to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initGroupCategorys()
	{
		if ($this->collGroupCategorys === null) {
			$this->collGroupCategorys = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Category has previously
	 * been saved, it will retrieve related GroupCategorys from storage.
	 * If this Category is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getGroupCategorys($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseGroupCategoryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGroupCategorys === null) {
			if ($this->isNew()) {
			   $this->collGroupCategorys = array();
			} else {

				$criteria->add(GroupCategoryPeer::CATEGORYID, $this->getId());

				GroupCategoryPeer::addSelectColumns($criteria);
				$this->collGroupCategorys = GroupCategoryPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(GroupCategoryPeer::CATEGORYID, $this->getId());

				GroupCategoryPeer::addSelectColumns($criteria);
				if (!isset($this->lastGroupCategoryCriteria) || !$this->lastGroupCategoryCriteria->equals($criteria)) {
					$this->collGroupCategorys = GroupCategoryPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastGroupCategoryCriteria = $criteria;
		return $this->collGroupCategorys;
	}

	/**
	 * Returns the number of related GroupCategorys.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countGroupCategorys($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseGroupCategoryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(GroupCategoryPeer::CATEGORYID, $this->getId());

		return GroupCategoryPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a GroupCategory object to this object
	 * through the GroupCategory foreign key attribute
	 *
	 * @param GroupCategory $l GroupCategory
	 * @return void
	 * @throws PropelException
	 */
	public function addGroupCategory(GroupCategory $l)
	{
		$this->collGroupCategorys[] = $l;
		$l->setCategory($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Category is new, it will return
	 * an empty collection; or if this Category has previously
	 * been saved, it will retrieve related GroupCategorys from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Category.
	 */
	public function getGroupCategorysJoinGroup($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseGroupCategoryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGroupCategorys === null) {
			if ($this->isNew()) {
				$this->collGroupCategorys = array();
			} else {

				$criteria->add(GroupCategoryPeer::CATEGORYID, $this->getId());

				$this->collGroupCategorys = GroupCategoryPeer::doSelectJoinGroup($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(GroupCategoryPeer::CATEGORYID, $this->getId());

			if (!isset($this->lastGroupCategoryCriteria) || !$this->lastGroupCategoryCriteria->equals($criteria)) {
				$this->collGroupCategorys = GroupCategoryPeer::doSelectJoinGroup($criteria, $con);
			}
		}
		$this->lastGroupCategoryCriteria = $criteria;

		return $this->collGroupCategorys;
	}

	/**
	 * Temporary storage of collUsersByAffiliateGroupCategorys to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initUsersByAffiliateGroupCategorys()
	{
		if ($this->collUsersByAffiliateGroupCategorys === null) {
			$this->collUsersByAffiliateGroupCategorys = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Category has previously
	 * been saved, it will retrieve related UsersByAffiliateGroupCategorys from storage.
	 * If this Category is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getUsersByAffiliateGroupCategorys($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseUsersByAffiliateGroupCategoryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsersByAffiliateGroupCategorys === null) {
			if ($this->isNew()) {
			   $this->collUsersByAffiliateGroupCategorys = array();
			} else {

				$criteria->add(UsersByAffiliateGroupCategoryPeer::CATEGORYID, $this->getId());

				UsersByAffiliateGroupCategoryPeer::addSelectColumns($criteria);
				$this->collUsersByAffiliateGroupCategorys = UsersByAffiliateGroupCategoryPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(UsersByAffiliateGroupCategoryPeer::CATEGORYID, $this->getId());

				UsersByAffiliateGroupCategoryPeer::addSelectColumns($criteria);
				if (!isset($this->lastUsersByAffiliateGroupCategoryCriteria) || !$this->lastUsersByAffiliateGroupCategoryCriteria->equals($criteria)) {
					$this->collUsersByAffiliateGroupCategorys = UsersByAffiliateGroupCategoryPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUsersByAffiliateGroupCategoryCriteria = $criteria;
		return $this->collUsersByAffiliateGroupCategorys;
	}

	/**
	 * Returns the number of related UsersByAffiliateGroupCategorys.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countUsersByAffiliateGroupCategorys($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseUsersByAffiliateGroupCategoryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(UsersByAffiliateGroupCategoryPeer::CATEGORYID, $this->getId());

		return UsersByAffiliateGroupCategoryPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a UsersByAffiliateGroupCategory object to this object
	 * through the UsersByAffiliateGroupCategory foreign key attribute
	 *
	 * @param UsersByAffiliateGroupCategory $l UsersByAffiliateGroupCategory
	 * @return void
	 * @throws PropelException
	 */
	public function addUsersByAffiliateGroupCategory(UsersByAffiliateGroupCategory $l)
	{
		$this->collUsersByAffiliateGroupCategorys[] = $l;
		$l->setCategory($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Category is new, it will return
	 * an empty collection; or if this Category has previously
	 * been saved, it will retrieve related UsersByAffiliateGroupCategorys from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Category.
	 */
	public function getUsersByAffiliateGroupCategorysJoinUsersByAffiliateGroup($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseUsersByAffiliateGroupCategoryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsersByAffiliateGroupCategorys === null) {
			if ($this->isNew()) {
				$this->collUsersByAffiliateGroupCategorys = array();
			} else {

				$criteria->add(UsersByAffiliateGroupCategoryPeer::CATEGORYID, $this->getId());

				$this->collUsersByAffiliateGroupCategorys = UsersByAffiliateGroupCategoryPeer::doSelectJoinUsersByAffiliateGroup($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(UsersByAffiliateGroupCategoryPeer::CATEGORYID, $this->getId());

			if (!isset($this->lastUsersByAffiliateGroupCategoryCriteria) || !$this->lastUsersByAffiliateGroupCategoryCriteria->equals($criteria)) {
				$this->collUsersByAffiliateGroupCategorys = UsersByAffiliateGroupCategoryPeer::doSelectJoinUsersByAffiliateGroup($criteria, $con);
			}
		}
		$this->lastUsersByAffiliateGroupCategoryCriteria = $criteria;

		return $this->collUsersByAffiliateGroupCategorys;
	}

} // BaseCategory
