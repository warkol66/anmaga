<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'anmaga/ModuleDependencyPeer.php';

/**
 * Base class that represents a row from the 'modules_dependency' table.
 *
 * Dependencia de modulos 
 *
 * This class was autogenerated by Propel on:
 *
 * 06/01/07 14:39:20
 *
 * @package anmaga.om
 */
abstract class BaseModuleDependency extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var ModuleDependencyPeer
	 */
	protected static $peer;


	/**
	 * The value for the module field.
	 * @var string
	 */
	protected $module;


	/**
	 * The value for the dependence field.
	 * @var string
	 */
	protected $dependence;

	/**
	 * Collection to store aggregation of collModules.
	 * @var array
	 */
	protected $collModules;

	/**
	 * The criteria used to select the current contents of collModules.
	 * @var Criteria
	 */
	protected $lastModuleCriteria = null;

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
	 * Get the [module] column value.
	 * Modulo
	 * @return string
	 */
	public function getModule()
	{

		return $this->module;
	}

	/**
	 * Get the [dependence] column value.
	 * Dependiente
	 * @return string
	 */
	public function getDependence()
	{

		return $this->dependence;
	}

	/**
	 * Set the value of [module] column.
	 * Modulo
	 * @param string $v new value
	 * @return void
	 */
	public function setModule($v)
	{

		if ($this->module !== $v) {
			$this->module = $v;
			$this->modifiedColumns[] = ModuleDependencyPeer::MODULE;
		}

	} // setModule()

	/**
	 * Set the value of [dependence] column.
	 * Dependiente
	 * @param string $v new value
	 * @return void
	 */
	public function setDependence($v)
	{

		if ($this->dependence !== $v) {
			$this->dependence = $v;
			$this->modifiedColumns[] = ModuleDependencyPeer::DEPENDENCE;
		}

	} // setDependence()

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

			$this->module = $rs->getString($startcol + 0);

			$this->dependence = $rs->getString($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 2; // 2 = ModuleDependencyPeer::NUM_COLUMNS - ModuleDependencyPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating ModuleDependency object", $e);
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
			$con = Propel::getConnection(ModuleDependencyPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ModuleDependencyPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ModuleDependencyPeer::DATABASE_NAME);
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
					$pk = ModuleDependencyPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setNew(false);
				} else {
					$affectedRows += ModuleDependencyPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collModules !== null) {
				foreach($this->collModules as $referrerFK) {
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


			if (($retval = ModuleDependencyPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collModules !== null) {
					foreach($this->collModules as $referrerFK) {
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
		$criteria = new Criteria(ModuleDependencyPeer::DATABASE_NAME);

		if ($this->isColumnModified(ModuleDependencyPeer::MODULE)) $criteria->add(ModuleDependencyPeer::MODULE, $this->module);
		if ($this->isColumnModified(ModuleDependencyPeer::DEPENDENCE)) $criteria->add(ModuleDependencyPeer::DEPENDENCE, $this->dependence);

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
		$criteria = new Criteria(ModuleDependencyPeer::DATABASE_NAME);

		$criteria->add(ModuleDependencyPeer::MODULE, $this->module);
		$criteria->add(ModuleDependencyPeer::DEPENDENCE, $this->dependence);

		return $criteria;
	}

	/**
	 * Returns the composite primary key for this object.
	 * The array elements will be in same order as specified in XML.
	 * @return array
	 */
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getModule();

		$pks[1] = $this->getDependence();

		return $pks;
	}

	/**
	 * Set the [composite] primary key.
	 *
	 * @param array $keys The elements of the composite key (order must match the order in XML file).
	 * @return void
	 */
	public function setPrimaryKey($keys)
	{

		$this->setModule($keys[0]);

		$this->setDependence($keys[1]);

	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param object $copyObj An object of ModuleDependency (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getModules() as $relObj) {
				$copyObj->addModule($relObj->copy($deepCopy));
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);

		$copyObj->setModule(NULL); // this is a pkey column, so set to default value

		$copyObj->setDependence(NULL); // this is a pkey column, so set to default value

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
	 * @return ModuleDependency Clone of current object.
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
	 * @return ModuleDependencyPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ModuleDependencyPeer();
		}
		return self::$peer;
	}

	/**
	 * Temporary storage of collModules to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initModules()
	{
		if ($this->collModules === null) {
			$this->collModules = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ModuleDependency has previously
	 * been saved, it will retrieve related Modules from storage.
	 * If this ModuleDependency is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getModules($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseModulePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collModules === null) {
			if ($this->isNew()) {
			   $this->collModules = array();
			} else {

				$criteria->add(ModulePeer::NAME, $this->getModule());

				ModulePeer::addSelectColumns($criteria);
				$this->collModules = ModulePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ModulePeer::NAME, $this->getModule());

				ModulePeer::addSelectColumns($criteria);
				if (!isset($this->lastModuleCriteria) || !$this->lastModuleCriteria->equals($criteria)) {
					$this->collModules = ModulePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastModuleCriteria = $criteria;
		return $this->collModules;
	}

	/**
	 * Returns the number of related Modules.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countModules($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseModulePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ModulePeer::NAME, $this->getModule());

		return ModulePeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Module object to this object
	 * through the Module foreign key attribute
	 *
	 * @param Module $l Module
	 * @return void
	 * @throws PropelException
	 */
	public function addModule(Module $l)
	{
		$this->collModules[] = $l;
		$l->setModuleDependency($this);
	}

} // BaseModuleDependency
