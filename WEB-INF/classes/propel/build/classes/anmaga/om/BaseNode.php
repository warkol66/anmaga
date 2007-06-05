<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'anmaga/NodePeer.php';

/**
 * Base class that represents a row from the 'node' table.
 *
 * Nodo del Arbol
 *
 * This class was autogenerated by Propel on:
 *
 * 06/04/07 12:21:11
 *
 * @package anmaga.om
 */
abstract class BaseNode extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var NodePeer
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
	 * The value for the kind field.
	 * @var string
	 */
	protected $kind;


	/**
	 * The value for the objectid field.
	 * @var int
	 */
	protected $objectid;


	/**
	 * The value for the parentid field.
	 * @var int
	 */
	protected $parentid;


	/**
	 * The value for the position field.
	 * @var int
	 */
	protected $position;

	/**
	 * @var Node
	 */
	protected $aNodeRelatedByParentid;

	/**
	 * Collection to store aggregation of collNodesRelatedByParentid.
	 * @var array
	 */
	protected $collNodesRelatedByParentid;

	/**
	 * The criteria used to select the current contents of collNodesRelatedByParentid.
	 * @var Criteria
	 */
	protected $lastNodeRelatedByParentidCriteria = null;

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
	 * Id del nodo
	 * @return int
	 */
	public function getId()
	{

		return $this->id;
	}

	/**
	 * Get the [name] column value.
	 * Nombre del nodo
	 * @return string
	 */
	public function getName()
	{

		return $this->name;
	}

	/**
	 * Get the [kind] column value.
	 * Tipo de nodo
	 * @return string
	 */
	public function getKind()
	{

		return $this->kind;
	}

	/**
	 * Get the [objectid] column value.
	 * Id del objeto relacionado al nodo
	 * @return int
	 */
	public function getObjectid()
	{

		return $this->objectid;
	}

	/**
	 * Get the [parentid] column value.
	 * Id del nodo padre
	 * @return int
	 */
	public function getParentid()
	{

		return $this->parentid;
	}

	/**
	 * Get the [position] column value.
	 * Orden entre los hermanos del nodo
	 * @return int
	 */
	public function getPosition()
	{

		return $this->position;
	}

	/**
	 * Set the value of [id] column.
	 * Id del nodo
	 * @param int $v new value
	 * @return void
	 */
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NodePeer::ID;
		}

	} // setId()

	/**
	 * Set the value of [name] column.
	 * Nombre del nodo
	 * @param string $v new value
	 * @return void
	 */
	public function setName($v)
	{

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = NodePeer::NAME;
		}

	} // setName()

	/**
	 * Set the value of [kind] column.
	 * Tipo de nodo
	 * @param string $v new value
	 * @return void
	 */
	public function setKind($v)
	{

		if ($this->kind !== $v) {
			$this->kind = $v;
			$this->modifiedColumns[] = NodePeer::KIND;
		}

	} // setKind()

	/**
	 * Set the value of [objectid] column.
	 * Id del objeto relacionado al nodo
	 * @param int $v new value
	 * @return void
	 */
	public function setObjectid($v)
	{

		if ($this->objectid !== $v) {
			$this->objectid = $v;
			$this->modifiedColumns[] = NodePeer::OBJECTID;
		}

	} // setObjectid()

	/**
	 * Set the value of [parentid] column.
	 * Id del nodo padre
	 * @param int $v new value
	 * @return void
	 */
	public function setParentid($v)
	{

		if ($this->parentid !== $v) {
			$this->parentid = $v;
			$this->modifiedColumns[] = NodePeer::PARENTID;
		}

		if ($this->aNodeRelatedByParentid !== null && $this->aNodeRelatedByParentid->getId() !== $v) {
			$this->aNodeRelatedByParentid = null;
		}

	} // setParentid()

	/**
	 * Set the value of [position] column.
	 * Orden entre los hermanos del nodo
	 * @param int $v new value
	 * @return void
	 */
	public function setPosition($v)
	{

		if ($this->position !== $v) {
			$this->position = $v;
			$this->modifiedColumns[] = NodePeer::POSITION;
		}

	} // setPosition()

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

			$this->kind = $rs->getString($startcol + 2);

			$this->objectid = $rs->getInt($startcol + 3);

			$this->parentid = $rs->getInt($startcol + 4);

			$this->position = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 6; // 6 = NodePeer::NUM_COLUMNS - NodePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Node object", $e);
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
			$con = Propel::getConnection(NodePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NodePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NodePeer::DATABASE_NAME);
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

			if ($this->aNodeRelatedByParentid !== null) {
				if ($this->aNodeRelatedByParentid->isModified()) {
					$affectedRows += $this->aNodeRelatedByParentid->save($con);
				}
				$this->setNodeRelatedByParentid($this->aNodeRelatedByParentid);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = NodePeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += NodePeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collNodesRelatedByParentid !== null) {
				foreach($this->collNodesRelatedByParentid as $referrerFK) {
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

			if ($this->aNodeRelatedByParentid !== null) {
				if (!$this->aNodeRelatedByParentid->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aNodeRelatedByParentid->getValidationFailures());
				}
			}


			if (($retval = NodePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$criteria = new Criteria(NodePeer::DATABASE_NAME);

		if ($this->isColumnModified(NodePeer::ID)) $criteria->add(NodePeer::ID, $this->id);
		if ($this->isColumnModified(NodePeer::NAME)) $criteria->add(NodePeer::NAME, $this->name);
		if ($this->isColumnModified(NodePeer::KIND)) $criteria->add(NodePeer::KIND, $this->kind);
		if ($this->isColumnModified(NodePeer::OBJECTID)) $criteria->add(NodePeer::OBJECTID, $this->objectid);
		if ($this->isColumnModified(NodePeer::PARENTID)) $criteria->add(NodePeer::PARENTID, $this->parentid);
		if ($this->isColumnModified(NodePeer::POSITION)) $criteria->add(NodePeer::POSITION, $this->position);

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
		$criteria = new Criteria(NodePeer::DATABASE_NAME);

		$criteria->add(NodePeer::ID, $this->id);

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
	 * @param object $copyObj An object of Node (or compatible) type.
	 * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setName($this->name);

		$copyObj->setKind($this->kind);

		$copyObj->setObjectid($this->objectid);

		$copyObj->setParentid($this->parentid);

		$copyObj->setPosition($this->position);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getNodesRelatedByParentid() as $relObj) {
				if($this->getPrimaryKey() === $relObj->getPrimaryKey()) {
						continue;
				}

				$copyObj->addNodeRelatedByParentid($relObj->copy($deepCopy));
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
	 * @return Node Clone of current object.
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
	 * @return NodePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new NodePeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Node object.
	 *
	 * @param Node $v
	 * @return void
	 * @throws PropelException
	 */
	public function setNodeRelatedByParentid($v)
	{


		if ($v === null) {
			$this->setParentid(NULL);
		} else {
			$this->setParentid($v->getId());
		}


		$this->aNodeRelatedByParentid = $v;
	}


	/**
	 * Get the associated Node object
	 *
	 * @param Connection Optional Connection object.
	 * @return Node The associated Node object.
	 * @throws PropelException
	 */
	public function getNodeRelatedByParentid($con = null)
	{
		// include the related Peer class
		include_once 'anmaga/om/BaseNodePeer.php';

		if ($this->aNodeRelatedByParentid === null && ($this->parentid !== null)) {

			$this->aNodeRelatedByParentid = NodePeer::retrieveByPK($this->parentid, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = NodePeer::retrieveByPK($this->parentid, $con);
			   $obj->addNodesRelatedByParentid($this);
			 */
		}
		return $this->aNodeRelatedByParentid;
	}

	/**
	 * Temporary storage of collNodesRelatedByParentid to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return void
	 */
	public function initNodesRelatedByParentid()
	{
		if ($this->collNodesRelatedByParentid === null) {
			$this->collNodesRelatedByParentid = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Node has previously
	 * been saved, it will retrieve related NodesRelatedByParentid from storage.
	 * If this Node is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param Connection $con
	 * @param Criteria $criteria
	 * @throws PropelException
	 */
	public function getNodesRelatedByParentid($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseNodePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collNodesRelatedByParentid === null) {
			if ($this->isNew()) {
			   $this->collNodesRelatedByParentid = array();
			} else {

				$criteria->add(NodePeer::PARENTID, $this->getId());

				NodePeer::addSelectColumns($criteria);
				$this->collNodesRelatedByParentid = NodePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(NodePeer::PARENTID, $this->getId());

				NodePeer::addSelectColumns($criteria);
				if (!isset($this->lastNodeRelatedByParentidCriteria) || !$this->lastNodeRelatedByParentidCriteria->equals($criteria)) {
					$this->collNodesRelatedByParentid = NodePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastNodeRelatedByParentidCriteria = $criteria;
		return $this->collNodesRelatedByParentid;
	}

	/**
	 * Returns the number of related NodesRelatedByParentid.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct
	 * @param Connection $con
	 * @throws PropelException
	 */
	public function countNodesRelatedByParentid($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/om/BaseNodePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(NodePeer::PARENTID, $this->getId());

		return NodePeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a Node object to this object
	 * through the Node foreign key attribute
	 *
	 * @param Node $l Node
	 * @return void
	 * @throws PropelException
	 */
	public function addNodeRelatedByParentid(Node $l)
	{
		$this->collNodesRelatedByParentid[] = $l;
		$l->setNodeRelatedByParentid($this);
	}

} // BaseNode
