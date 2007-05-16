<?php 

require_once 'propel/om/BaseObject.php';

 
require_once 'propel/om/Persistent.php';

 

include_once 'propel/util/Criteria.php';
 

// (on-demand) include_once 'anmaga/User.php';
// (on-demand) include_once 'anmaga/UserPeer.php';
 

// (on-demand) include_once 'anmaga/SecurityAction.php';
// (on-demand) include_once 'anmaga/SecurityActionPeer.php';

include_once 'anmaga/ActionLogPeer.php';

/**
 * Base class that represents a row from the 'log_actionLog' table.
 *
 * logs del sistema 
 *
 * This class was autogenerated by Propel on:
 *
 * [05/14/07 17:23:25]
 *
 * You should not use this class directly.  It should not even be
 * extended; all references should be to ActionLog class. 
 * 
 * @package anmaga 
 */
abstract class BaseActionLog extends BaseObject implements Persistent {
	
	/** 
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var ActionLogPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var int	  
	 */
	protected $id;	

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
	 * The value for the datetime field.
	 * @var int	  
	 */
	protected $datetime;	

	/**
	 * The value for the action field.
	 * @var string	  
	 */
	protected $action;	

	/**
	 * The value for the message field.
	 * @var string	  
	 */
	protected $message;	
  
	/**
	 * Get the Id column value.
	 * Id log 
	 * @return int	  
	 */
	public function getId()
	{
		return $this->id;
	}


	/**
	 * Set the value of `id` column.	  
	 * Id log 
	 * @param int $v new value
	 * @return void
	 *  
	 */
	public function setId($v)
	{
		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ActionLogPeer::ID;
		}
				
	}

  
	/**
	 * Get the Userid column value.
	 * Id del usuario 
	 * @return int	  
	 */
	public function getUserid()
	{
		return $this->userid;
	}


	/**
	 * Set the value of `userid` column.	  
	 * Id del usuario 
	 * @param int $v new value
	 * @return void
	 * @throws PropelException 
	 */
	public function setUserid($v)
	{
		if ($this->userid !== $v) {
			$this->userid = $v;
			$this->modifiedColumns[] = ActionLogPeer::USERID;
		}
			
		if ($this->aUser !== null && $this->aUser->getId() !== $v) {
			$this->aUser = null;
		}
			
	}

  
	/**
	 * Get the Affiliateid column value.
	 * Id del afiliado 
	 * @return int	  
	 */
	public function getAffiliateid()
	{
		return $this->affiliateid;
	}


	/**
	 * Set the value of `affiliateid` column.	  
	 * Id del afiliado 
	 * @param int $v new value
	 * @return void
	 *  
	 */
	public function setAffiliateid($v)
	{
		if ($this->affiliateid !== $v) {
			$this->affiliateid = $v;
			$this->modifiedColumns[] = ActionLogPeer::AFFILIATEID;
		}
				
	}


	/**
	 * Get the [optionally formatted] `datetime` column value.
	 * Fecha en que se logueo el dato 
	 * @param string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the integer unix timestamp will be returned.
	 * @return mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
	 * @throws PropelException - if unable to convert the date/time to timestamp.
	 */
	public function getDatetime($format = 'Y-m-d H:i:s')
	{
		if ($this->datetime === null || $this->datetime === '') {
			return null;
		} elseif (!is_int($this->datetime)) {
			// a non-timestamp value was set externally, so we convert it
			$ts = strtotime($this->datetime);
			if ($ts === -1) {
				throw new PropelException("Unable to parse value of datetime as date/time value: " . var_export($this->datetime, true));
			}
		} else {
			$ts = $this->datetime;
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
	 * Set the value of `datetime` column.	  
	 * Fecha en que se logueo el dato 
	 * @param int $v new value
	 * @return void
	 * @throws PropelException - If passed [not-null] date/time is in an invalid format. 
	 */
	public function setDatetime($v)
	{
		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1) {
				throw new PropelException("Unable to parse date/time value for datetime from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->datetime !== $ts) {
			$this->datetime = $ts;
			$this->modifiedColumns[] = ActionLogPeer::DATETIME;
		}
		
	}

  
	/**
	 * Get the Action column value.
	 * action en que se logueo el dato 
	 * @return string	  
	 */
	public function getAction()
	{
		return $this->action;
	}


	/**
	 * Set the value of `action` column.	  
	 * action en que se logueo el dato 
	 * @param string $v new value
	 * @return void
	 * @throws PropelException 
	 */
	public function setAction($v)
	{
		if ($this->action !== $v) {
			$this->action = $v;
			$this->modifiedColumns[] = ActionLogPeer::ACTION;
		}
			
		if ($this->aSecurityAction !== null && $this->aSecurityAction->getAction() !== $v) {
			$this->aSecurityAction = null;
		}
			
	}

  
	/**
	 * Get the Message column value.
	 * mensaje del log 
	 * @return string	  
	 */
	public function getMessage()
	{
		return $this->message;
	}


	/**
	 * Set the value of `message` column.	  
	 * mensaje del log 
	 * @param string $v new value
	 * @return void
	 *  
	 */
	public function setMessage($v)
	{
		if ($this->message !== $v) {
			$this->message = $v;
			$this->modifiedColumns[] = ActionLogPeer::MESSAGE;
		}
				
	}


	
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
	 * @return void
	 * @throws PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {
			$this->id = $rs->getInt($startcol + 0);					
			$this->userid = $rs->getInt($startcol + 1);					
			$this->affiliateid = $rs->getInt($startcol + 2);					
			$this->datetime = $rs->getTimestamp($startcol + 3, null);
			$this->action = $rs->getString($startcol + 4);					
			$this->message = $rs->getString($startcol + 5);					
			 
			$this->resetModified();
			$this->setNew(false);
		
		} catch (Exception $e) {
			throw new PropelException("Error populating ActionLog object", $e);
		}		
	
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
		$criteria = new Criteria(ActionLogPeer::DATABASE_NAME);
		$criteria->add(ActionLogPeer::ID, $this->id);
		return $criteria;			
	}
	
	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{		
		$criteria = new Criteria(ActionLogPeer::DATABASE_NAME);
		if ($this->isColumnModified(ActionLogPeer::ID)) $criteria->add(ActionLogPeer::ID, $this->id);
		if ($this->isColumnModified(ActionLogPeer::USERID)) $criteria->add(ActionLogPeer::USERID, $this->userid);
		if ($this->isColumnModified(ActionLogPeer::AFFILIATEID)) $criteria->add(ActionLogPeer::AFFILIATEID, $this->affiliateid);
		if ($this->isColumnModified(ActionLogPeer::DATETIME)) $criteria->add(ActionLogPeer::DATETIME, $this->datetime);
		if ($this->isColumnModified(ActionLogPeer::ACTION)) $criteria->add(ActionLogPeer::ACTION, $this->action);
		if ($this->isColumnModified(ActionLogPeer::MESSAGE)) $criteria->add(ActionLogPeer::MESSAGE, $this->message);
		return $criteria;			
	}
	
	

	/**
	 * @var User	  
	 */
	protected $aUser;

	/**
	 * Declares an association between this object and a User object
	 *
	 * @param User $v
	 * @return void
	 * @throws PropelException
	 */
	public function setUser($v)
	{
			
		if ($v === null) {
			$this->setUserid(NULL);
		} else {
			$this->setUserid($v->getId());
		}
   
		$this->aUser = $v;
	}


	/**
	 * Get the associated User object
	 *
	 * @param Connection Optional Connection object.
	 * @return User The associated User object.
	 * @throws PropelException
	 */
	public function getUser($con = null)
	{
		// include the Peer class
		include_once 'anmaga/UserPeer.php';

		if ($this->aUser === null && ($this->userid !== null)) {
	
			$this->aUser = UserPeer::retrieveByPK($this->userid, $con);
	
			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = UserPeer::retrieveByPK($this->userid, $con);
			   $obj->addActionLogs($this);
			 */
		}
		return $this->aUser;
	}

	/**
	 * Provides convenient way to set a relationship based on a
	 * key.  e.g.
	 * <code>$bar->setFooKey($foo->getPrimaryKey())</code>
	 *
 
	 * @return void
	 * @throws PropelException
	 */
	public function setUserKey($key)
	{

		$this->setUserid( (int) $key);			
		
	}

	/**
	 * @var SecurityAction	  
	 */
	protected $aSecurityAction;

	/**
	 * Declares an association between this object and a SecurityAction object
	 *
	 * @param SecurityAction $v
	 * @return void
	 * @throws PropelException
	 */
	public function setSecurityAction($v)
	{
			
		if ($v === null) {
			$this->setAction(NULL);
		} else {
			$this->setAction($v->getAction());
		}
   
		$this->aSecurityAction = $v;
	}


	/**
	 * Get the associated SecurityAction object
	 *
	 * @param Connection Optional Connection object.
	 * @return SecurityAction The associated SecurityAction object.
	 * @throws PropelException
	 */
	public function getSecurityAction($con = null)
	{
		// include the Peer class
		include_once 'anmaga/SecurityActionPeer.php';

		if ($this->aSecurityAction === null && (($this->action !== "" && $this->action !== null))) {
	
			$this->aSecurityAction = SecurityActionPeer::retrieveByPK($this->action, $con);
	
			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = SecurityActionPeer::retrieveByPK($this->action, $con);
			   $obj->addActionLogs($this);
			 */
		}
		return $this->aSecurityAction;
	}

	/**
	 * Provides convenient way to set a relationship based on a
	 * key.  e.g.
	 * <code>$bar->setFooKey($foo->getPrimaryKey())</code>
	 *
 
	 * @return void
	 * @throws PropelException
	 */
	public function setSecurityActionKey($key)
	{

		$this->setAction( (string) $key);			
		
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
		
		if ($con === null)
			$con = Propel::getConnection(ActionLogPeer::DATABASE_NAME);

		try {
			$con->begin();
			ActionLogPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}
	

	/**
	 * flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var boolean
	 */
	private $alreadyInSave = false;

	/**
	 * Stores the object in the database.  If the object is new,
	 * it inserts it; otherwise an update is performed.  This method
	 * wraps the doSave() worker method in a transaction.
	 *
	 * @param Connection $con
	 * @return void
	 * @throws PropelException
	 */
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}
		
		if ($con === null)
			$con = Propel::getConnection(ActionLogPeer::DATABASE_NAME);

		try {
			$con->begin();
			$this->doSave($con);			
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}
  
	/**
	 * Stores the object in the database.  If the object is new,
	 * it inserts it; otherwise an update is performed.
	 *
	 * @param Connection $con
	 * @return void
	 * @throws PropelException
	 */
		protected function doSave($con)	{ 
		
	 
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.
 
			if ($this->aUser !== null) {
				if ($this->aUser->isModified()) $this->aUser->save($con);
				$this->setUser($this->aUser);
			}
 
			if ($this->aSecurityAction !== null) {
				if ($this->aSecurityAction->isModified()) $this->aSecurityAction->save($con);
				$this->setSecurityAction($this->aSecurityAction);
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ActionLogPeer::doInsert($this, $con);
					$this->setId( $pk );  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					ActionLogPeer::doUpdate($this, $con);
				}			
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			$this->alreadyInSave = false;
		}
	}

	/**
	 * Validates the objects modified field values.
	 * This includes all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param mixed $columns Column name or an array of column names.
	 *
	 * @return mixed <code>true</code> if all columns pass validation
	 *			  or an array of <code>ValidationFailed</code> objects for columns that fail.
	 */
	public function validate($columns = null)
	{
	  if ($columns)
	  {
		return ActionLogPeer::doValidate($this, $columns);
	  }

		return $this->doValidate();
	}

	/**
	 * flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var boolean
	 */
	protected $alreadyInValidation = false;
  
	/**
	 * This function performs the validation work for complex object models.
	 * 
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate()
	{
		if (! $this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;
	  
			$failureMap = array();	  
	  
			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.
			if ($this->aUser !== null) {
				if (($retval = $this->aUser->validate()) !== true) {
					$failureMap = array_merge($failureMap, $retval);
				}
			}
			if ($this->aSecurityAction !== null) {
				if (($retval = $this->aSecurityAction->validate()) !== true) {
					$failureMap = array_merge($failureMap, $retval);
				}
			}

			if (($retval = ActionLogPeer::doValidate($this)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}
	  
	  
			$this->alreadyInValidation = false;
		}
	
		return (!empty($failureMap) ? $failureMap : true);
	}
  

	/**
	 * Set the PrimaryKey.
	 *
	 * @param mixed id Primary key.
	 * @return void
	 * @throws PropelException	 */
	public function setPrimaryKey($key) 
	{		
		$this->setId($key);
	}
	

	/**
	 * Returns an id that differentiates this object from others
	 * of its class.
	 * @return int 
	 */
	public function getPrimaryKey()
	{

		return $this->getId();

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
	 *  
	 * @return ActionLog Clone of current object.
	 * @throws PropelException
	 */
	public function copy($deepCopy = false) 
	{
		$copyObj = new ActionLog();
		$copyObj->setUserid($this->userid);
		$copyObj->setAffiliateid($this->affiliateid);
		$copyObj->setDatetime($this->datetime);
		$copyObj->setAction($this->action);
		$copyObj->setMessage($this->message);
		
		$copyObj->setNew(true);
		
		$copyObj->setId(NULL); // this is a pkey column, so set to default value

		return $copyObj;
	}
		

	/**
	 * returns a peer instance associated with this om.  Since Peer classes	
	 * are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 * @return ActionLogPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ActionLogPeer();
		}
		return self::$peer;
	}

}
