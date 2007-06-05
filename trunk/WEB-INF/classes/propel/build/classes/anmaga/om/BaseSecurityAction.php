<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'anmaga/SecurityActionPeer.php';

/**
 * Base class that represents a row from the 'security_action' table.
 *
 * Actions del sistema
 *
 * This class was autogenerated by Propel on:
 *
 * 06/04/07 12:21:07
 *
 * @package anmaga.om
 */
abstract class BaseSecurityAction extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var SecurityActionPeer
	 */
	protected static $peer;


	/**
	 * The value for the action field.
	 * @var string
	 */
	protected $action;


	/**
	 * The value for the module field.
	 * @var string
	 */
	protected $module;


	/**
	 * The value for the section field.
	 * @var string
	 */
	protected $section;


	/**
	 * The value for the access field.
	 * @var int
	 */
	protected $access;


	/**
	 * The value for the accessusersbyaffiliate field.
	 * @var int
	 */
	protected $accessusersbyaffiliate;


	/**
	 * The value for the active field.
	 * @var int
	 */
	protected $active;


	/**
	 * The value for the pair field.
	 * @var string
	 */
	protected $pair;

	/**
	 * @var SecurityActionLabel
	 */
	protected $aSecurityActionLabel;

	/**
	 * Collection to store aggregation of collActionLogs.
	 * @var array
	 */
	protected $collActionLogs;

	/**
	 * The criteria used to select the current contents of collActionLogs.
	 * @var Criteria
	 */
	protected $lastActionLogCriteria = null;

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
	 * Get the [action] column value.
	 * Action pagina
	 * @return string
	 */
	public function getAction()
	{

		return $this->action;
	}

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
	 * Get the [section] column value.
	 * Seccion
	 * @return string
	 */
	public function getSection()
	{

		return $this->section;
	}

	/**
	 * Get the [access] column value.
	 * El acceso a ese action
	 * @return int
	 */
	public function getAccess()
	{

		return $this->access;
	}

	/**
	 * Get the [accessusersbyaffiliate] column value.
	 * El acceso a ese action para los usuarios por afiliados
	 * @return int
	 */
	public function getAccessusersbyaffiliate()
	{

		return $this->accessusersbyaffiliate;
	}

	/**
	 * Get the [active] column value.
	 * Si el action esta activo o no
	 * @return int
	 */
	public function getActive()
	{

		return $this->active;
	}

	/**
	 * Get the [pair] column value.
	 * Par del Action
	 * @return string
	 */
	public function getPair()
	{

		return $this->pair;
	}

	/**
	 * Set the value of [action] column.
	 * Action pagina
	 * @param string $v new value
	 * @return void
	 */
	public function setAction($v)
	{

		if ($this->action !== $v) {
			$this->action = $v;
			$this->modifiedColumns[] = SecurityActionPeer::ACTION;
		}

		if ($this->aSecurityActionLabel !== null && $this->aSecurityActionLabel->getAction() !== $v) {
			$this->aSecurityActionLabel = null;
		}

	} // setAction()

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
			$this->modifiedColumns[] = SecurityActionPeer::MODULE;
		}

	} // setModule()

	/**
	 * Set the value of [section] column.
	 * Seccion
	 * @param string $v new value
	 * @return void
	 */
	public function setSection($v)
	{

		if ($this->section !== $v) {
			$this->section = $v;
			$this->modifiedColumns[] = SecurityActionPeer::SECTION;
		}

	} // setSection()

	/**
	 * Set the value of [access] column.
	 * El acceso a ese action
	 * @param int $v new value
	 * @return void
	 */
	public function setAccess($v)
	{

		if ($this->access !== $v) {
			$this->access = $v;
			$this->modifiedColumns[] = SecurityActionPeer::ACCESS;
		}

	} // setAccess()

	/**
	 * Set the value of [accessusersbyaffiliate] column.
	 * El acceso a ese action para los usuarios por afiliados
	 * @param int $v new value
	 * @return void
	 */
	public function setAccessusersbyaffiliate($v)
	{

		if ($this->accessusersbyaffiliate !== $v) {
			$this->accessusersbyaffiliate = $v;
			$this->modifiedColumns[] = SecurityActionPeer::ACCESSUSERSBYAFFILIATE;
		}

	} // setAccessusersbyaffiliate()

	/**
	 * Set the value of [active] column.
	 * Si el action esta activo o no
	 * @param int $v new value
	 * @return void
	 */
	public function setActive($v)
	{

		if ($this->active !== $v) {
			$this->active = $v;
			$this->modifiedColumns[] = SecurityActionPeer::ACTIVE;
		}

	} // setActive()

	/**
	 * Set the value of [pair] column.
	 * Par del Action
	 * @param string $v new value
	 * @return void
	 */
	public function setPair($v)
	{

		if ($this->pair !== $v) {
			$this->pair = $v;
			$this->modifiedColumns[] = SecurityActionPeer::PAIR;
		}

	} // setPair()

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

			$this->action = $rs->getString($startcol + 0);

			$this->module = $rs->getString($startcol + 1);

			$this->section = $rs->getString($startcol + 2);

			$this->access = $rs->getInt($startcol + 3);

			$this->accessusersbyaffiliate = $rs->getInt($startcol + 4);

			$this->active = $rs->getInt($startcol + 5);

			$this->pair = $rs->getString($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 7; // 7 = SecurityActionPeer::NUM_COLUMNS - SecurityActionPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating SecurityAction object", $e);
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
			$con = Propel::getConnection(SecurityActionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SecurityActionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(SecurityActionPeer::DATABASE_NAME);
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

			if ($this->aSecurityActionLabel !== null) {
				if ($this->aSecurityActionLabel->isModified()) {
					$affectedRows += $this->aSecurityActionLabel->save($con);
				}
				$this->setSecurityActionLabel($this->aSecurityActionLabel);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SecurityActionPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setNew(false);
				} else {
					$affectedRows += SecurityActionPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collActionLogs !== null) {
				foreach($this->collActionLogs as $referrerFK) {
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

			if ($this->aSecurityActionLabel !== null) {
				if (!$this->aSecurityActionLabel->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSecurityActionLabel->getValidationFailures());
				}
			}


			if (($retval = SecurityActionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collActionLogs !== null) {
					foreach($this->collActionLogs as $referrerFK) {
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
		$criteria = new Criteria(SecurityActionPeer::DATABASE_NAME);

		if ($this->isColumnModified(SecurityActionPeer::ACTION)) $criteria->add(SecurityActionPeer::ACTION, $this->action);
		if ($this->isColumnModified(SecurityActionPeer::MODULE)) $criteria->add(SecurityActionPeer::MODULE, $this->module);
		if ($this->isColumnModified(SecurityActionPeer::SECTION)) $criteria->add(SecurityActionPeer::SECTION, $this->section);
		if ($this->isColumnModified(SecurityActionPeer::ACCESS)) $criteria->add(SecurityActionPeer::ACCESS, $this->access);
		if ($this->isColumnModified(SecurityActionPeer::ACCESSUSERSBYAFFILIATE)) $criteria->add(SecurityActionPeer::ACCESSUSERSBYAFFILIATE, $this->accessusersbyaffiliate);
		if ($this->isColumnModified(SecurityActionPeer::ACTIVE)) $criteria->add(SecurityActionPeer::ACTIVE, $this->active);
		if ($this->isColumnModified(SecurityActionPeer::PAIR)) $criteria->add(SecurityActionPeer::PAIR, $this->pair);

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
		$criteria = new Criteria(SecurityActionPeer::DATABASE_NAME);

		$criteria->add(SecurityActionPeer::ACTION, $this->action);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return string
	 */
	public function getPrimaryKey()
	{
		return $this->getAction();
	}

	/**
	 * Generic method to set the primary key (action column).
	 *
	 * @param string $key Primary key.
	 * @return void
	 */
	public function setPrimaryKey($key)
	{
		$this->setAction($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param object $copyObj An object of SecurityAction (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setModule($this->module);

		$copyObj->setSection($this->section);

		$copyObj->setAccess($this->access);

		$copyObj->setAccessusersbyaffiliate($this->accessusersbyaffiliate);

		$copyObj->setActive($this->active);

		$copyObj->setPair($this->pair);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getActionLogs() as $relObj) {
				$copyObj->addActionLog($relObj->copy($deepCopy));
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);

		$copyObj->setAction(NULL); // this is a pkey column, so set to default value

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
	 * @return SecurityAction Clone of current object.
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
	 * @return SecurityActionPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SecurityActionPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a SecurityActionLabel object.
	 *
	 * @param SecurityActionLabel $v
	 * @return void
	 * @throws PropelException
	 */
	public function setSecurityActionLabel($v)
	{


		if ($v === null) {
			$this->setAction(NULL);
		} else {
			$this->setAction($v->getAction());
		}


		$this->aSecurityActionLabel = $v;
	}


	/**
	 * Get the associated SecurityActionLabel object
	 *
	 * @param Connection Optional Connection object.
	 * @return SecurityActionLabel The associated SecurityActionLabel object.
	 * @throws PropelException
	 */
	public function getSecurityActionLabel($con = null)
	{
		// include the related Peer class
		include_once 'anmaga/om/BaseSecurityActionLabelPeer.php';

		if ($this->aSecurityActionLabel === null && (($this->action !== "" && $this->action !== null))) {

			$this->aSecurityActionLabel = SecurityActionLabelPeer::retrieveByPK($this->action, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = SecurityActionLabelPeer::retrieveByPK($this->action, $con);
			   $obj->addSecurityActionLabels($this);
			 */
		}
		return $this->aSecurityActionLabel;
	}

	/**
	 * Temporary storage of collActionLogs to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initActionLogs()
	{
		if ($this->collActionLogs === null) {
			$this->collActionLogs = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SecurityAction has previously
	 * been saved, it will retrieve related ActionLogs from storage.
	 * If this SecurityAction is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getActionLogs($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseActionLogPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActionLogs === null) {
			if ($this->isNew()) {
			   $this->collActionLogs = array();
			} else {

				$criteria->add(ActionLogPeer::ACTION, $this->getAction());

				ActionLogPeer::addSelectColumns($criteria);
				$this->collActionLogs = ActionLogPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ActionLogPeer::ACTION, $this->getAction());

				ActionLogPeer::addSelectColumns($criteria);
				if (!isset($this->lastActionLogCriteria) || !$this->lastActionLogCriteria->equals($criteria)) {
					$this->collActionLogs = ActionLogPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastActionLogCriteria = $criteria;
		return $this->collActionLogs;
	}

	/**
	 * Returns the number of related ActionLogs.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countActionLogs($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseActionLogPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ActionLogPeer::ACTION, $this->getAction());

		return ActionLogPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a ActionLog object to this object
	 * through the ActionLog foreign key attribute
	 *
	 * @param ActionLog $l ActionLog
	 * @return void
	 * @throws PropelException
	 */
	public function addActionLog(ActionLog $l)
	{
		$this->collActionLogs[] = $l;
		$l->setSecurityAction($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SecurityAction is new, it will return
	 * an empty collection; or if this SecurityAction has previously
	 * been saved, it will retrieve related ActionLogs from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SecurityAction.
	 */
	public function getActionLogsJoinUser($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseActionLogPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActionLogs === null) {
			if ($this->isNew()) {
				$this->collActionLogs = array();
			} else {

				$criteria->add(ActionLogPeer::ACTION, $this->getAction());

				$this->collActionLogs = ActionLogPeer::doSelectJoinUser($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ActionLogPeer::ACTION, $this->getAction());

			if (!isset($this->lastActionLogCriteria) || !$this->lastActionLogCriteria->equals($criteria)) {
				$this->collActionLogs = ActionLogPeer::doSelectJoinUser($criteria, $con);
			}
		}
		$this->lastActionLogCriteria = $criteria;

		return $this->collActionLogs;
	}

} // BaseSecurityAction
