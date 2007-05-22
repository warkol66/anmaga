<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'anmaga/ActionLogLabelPeer.php';

/**
 * Base class that represents a row from the 'actionLogs_label' table.
 *
 * Etiquetas de logueo
 *
 * This class was autogenerated by Propel on:
 *
 * 05/22/07 10:46:49
 *
 * @package    anmaga.om
 */
abstract class BaseActionLogLabel extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ActionLogLabelPeer
	 */
	protected static $peer;


	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;


	/**
	 * The value for the action field.
	 * @var        string
	 */
	protected $action;


	/**
	 * The value for the label field.
	 * @var        string
	 */
	protected $label;


	/**
	 * The value for the language field.
	 * @var        string
	 */
	protected $language;


	/**
	 * The value for the forward field.
	 * @var        string
	 */
	protected $forward;

	/**
	 * @var        ActionLog
	 */
	protected $aActionLog;

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
	 * Id log
	 * @return     int
	 */
	public function getId()
	{

		return $this->id;
	}

	/**
	 * Get the [action] column value.
	 * action en que se loguea el dato
	 * @return     string
	 */
	public function getAction()
	{

		return $this->action;
	}

	/**
	 * Get the [label] column value.
	 * mensaje del log
	 * @return     string
	 */
	public function getLabel()
	{

		return $this->label;
	}

	/**
	 * Get the [language] column value.
	 * idioma de la etiqueta
	 * @return     string
	 */
	public function getLanguage()
	{

		return $this->language;
	}

	/**
	 * Get the [forward] column value.
	 * tipo de accion de la etiqueta
	 * @return     string
	 */
	public function getForward()
	{

		return $this->forward;
	}

	/**
	 * Set the value of [id] column.
	 * Id log
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
			$this->modifiedColumns[] = ActionLogLabelPeer::ID;
		}

		if ($this->aActionLog !== null && $this->aActionLog->getId() !== $v) {
			$this->aActionLog = null;
		}

	} // setId()

	/**
	 * Set the value of [action] column.
	 * action en que se loguea el dato
	 * @param      string $v new value
	 * @return     void
	 */
	public function setAction($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->action !== $v) {
			$this->action = $v;
			$this->modifiedColumns[] = ActionLogLabelPeer::ACTION;
		}

	} // setAction()

	/**
	 * Set the value of [label] column.
	 * mensaje del log
	 * @param      string $v new value
	 * @return     void
	 */
	public function setLabel($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->label !== $v) {
			$this->label = $v;
			$this->modifiedColumns[] = ActionLogLabelPeer::LABEL;
		}

	} // setLabel()

	/**
	 * Set the value of [language] column.
	 * idioma de la etiqueta
	 * @param      string $v new value
	 * @return     void
	 */
	public function setLanguage($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->language !== $v) {
			$this->language = $v;
			$this->modifiedColumns[] = ActionLogLabelPeer::LANGUAGE;
		}

	} // setLanguage()

	/**
	 * Set the value of [forward] column.
	 * tipo de accion de la etiqueta
	 * @param      string $v new value
	 * @return     void
	 */
	public function setForward($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->forward !== $v) {
			$this->forward = $v;
			$this->modifiedColumns[] = ActionLogLabelPeer::FORWARD;
		}

	} // setForward()

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

			$this->action = $rs->getString($startcol + 1);

			$this->label = $rs->getString($startcol + 2);

			$this->language = $rs->getString($startcol + 3);

			$this->forward = $rs->getString($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 5; // 5 = ActionLogLabelPeer::NUM_COLUMNS - ActionLogLabelPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating ActionLogLabel object", $e);
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
			$con = Propel::getConnection(ActionLogLabelPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ActionLogLabelPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ActionLogLabelPeer::DATABASE_NAME);
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

			if ($this->aActionLog !== null) {
				if ($this->aActionLog->isModified()) {
					$affectedRows += $this->aActionLog->save($con);
				}
				$this->setActionLog($this->aActionLog);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ActionLogLabelPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ActionLogLabelPeer::doUpdate($this, $con);
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

			if ($this->aActionLog !== null) {
				if (!$this->aActionLog->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aActionLog->getValidationFailures());
				}
			}


			if (($retval = ActionLogLabelPeer::doValidate($this, $columns)) !== true) {
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
		$criteria = new Criteria(ActionLogLabelPeer::DATABASE_NAME);

		if ($this->isColumnModified(ActionLogLabelPeer::ID)) $criteria->add(ActionLogLabelPeer::ID, $this->id);
		if ($this->isColumnModified(ActionLogLabelPeer::ACTION)) $criteria->add(ActionLogLabelPeer::ACTION, $this->action);
		if ($this->isColumnModified(ActionLogLabelPeer::LABEL)) $criteria->add(ActionLogLabelPeer::LABEL, $this->label);
		if ($this->isColumnModified(ActionLogLabelPeer::LANGUAGE)) $criteria->add(ActionLogLabelPeer::LANGUAGE, $this->language);
		if ($this->isColumnModified(ActionLogLabelPeer::FORWARD)) $criteria->add(ActionLogLabelPeer::FORWARD, $this->forward);

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
		$criteria = new Criteria(ActionLogLabelPeer::DATABASE_NAME);

		$criteria->add(ActionLogLabelPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of ActionLogLabel (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setAction($this->action);

		$copyObj->setLabel($this->label);

		$copyObj->setLanguage($this->language);

		$copyObj->setForward($this->forward);


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
	 * @return     ActionLogLabel Clone of current object.
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
	 * @return     ActionLogLabelPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ActionLogLabelPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a ActionLog object.
	 *
	 * @param      ActionLog $v
	 * @return     void
	 * @throws     PropelException
	 */
	public function setActionLog($v)
	{


		if ($v === null) {
			$this->setId(NULL);
		} else {
			$this->setId($v->getId());
		}


		$this->aActionLog = $v;
	}


	/**
	 * Get the associated ActionLog object
	 *
	 * @param      Connection Optional Connection object.
	 * @return     ActionLog The associated ActionLog object.
	 * @throws     PropelException
	 */
	public function getActionLog($con = null)
	{
		// include the related Peer class
		include_once 'anmaga/om/BaseActionLogPeer.php';

		if ($this->aActionLog === null && ($this->id !== null)) {

			$this->aActionLog = ActionLogPeer::retrieveByPK($this->id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = ActionLogPeer::retrieveByPK($this->id, $con);
			   $obj->addActionLogs($this);
			 */
		}
		return $this->aActionLog;
	}

} // BaseActionLogLabel
