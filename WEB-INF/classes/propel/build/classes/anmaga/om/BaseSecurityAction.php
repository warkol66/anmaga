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
 * [03/15/07 19:59:12]
 *
 * You should not use this class directly.  It should not even be
 * extended; all references should be to SecurityAction class. 
 * 
 * @package anmaga 
 */
abstract class BaseSecurityAction extends BaseObject implements Persistent {
	
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
	 * The value for the active field.
	 * @var int	  
	 */
	protected $active;	
  
	/**
	 * Get the Action column value.
	 * Action pagina 
	 * @return string	  
	 */
	public function getAction()
	{
		return $this->action;
	}


	/**
	 * Set the value of `action` column.	  
	 * Action pagina 
	 * @param string $v new value
	 * @return void
	 *  
	 */
	public function setAction($v)
	{
		if ($this->action !== $v) {
			$this->action = $v;
			$this->modifiedColumns[] = SecurityActionPeer::ACTION;
		}
				
	}

  
	/**
	 * Get the Module column value.
	 * Modulo 
	 * @return string	  
	 */
	public function getModule()
	{
		return $this->module;
	}


	/**
	 * Set the value of `module` column.	  
	 * Modulo 
	 * @param string $v new value
	 * @return void
	 *  
	 */
	public function setModule($v)
	{
		if ($this->module !== $v) {
			$this->module = $v;
			$this->modifiedColumns[] = SecurityActionPeer::MODULE;
		}
				
	}

  
	/**
	 * Get the Section column value.
	 * Seccion 
	 * @return string	  
	 */
	public function getSection()
	{
		return $this->section;
	}


	/**
	 * Set the value of `section` column.	  
	 * Seccion 
	 * @param string $v new value
	 * @return void
	 *  
	 */
	public function setSection($v)
	{
		if ($this->section !== $v) {
			$this->section = $v;
			$this->modifiedColumns[] = SecurityActionPeer::SECTION;
		}
				
	}

  
	/**
	 * Get the Access column value.
	 * El acceso a ese action 
	 * @return int	  
	 */
	public function getAccess()
	{
		return $this->access;
	}


	/**
	 * Set the value of `access` column.	  
	 * El acceso a ese action 
	 * @param int $v new value
	 * @return void
	 *  
	 */
	public function setAccess($v)
	{
		if ($this->access !== $v) {
			$this->access = $v;
			$this->modifiedColumns[] = SecurityActionPeer::ACCESS;
		}
				
	}

  
	/**
	 * Get the Active column value.
	 * Si el action esta activo o no 
	 * @return int	  
	 */
	public function getActive()
	{
		return $this->active;
	}


	/**
	 * Set the value of `active` column.	  
	 * Si el action esta activo o no 
	 * @param int $v new value
	 * @return void
	 *  
	 */
	public function setActive($v)
	{
		if ($this->active !== $v) {
			$this->active = $v;
			$this->modifiedColumns[] = SecurityActionPeer::ACTIVE;
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
			$this->action = $rs->getString($startcol + 0);					
			$this->module = $rs->getString($startcol + 1);					
			$this->section = $rs->getString($startcol + 2);					
			$this->access = $rs->getInt($startcol + 3);					
			$this->active = $rs->getInt($startcol + 4);					
			 
			$this->resetModified();
			$this->setNew(false);
		
		} catch (Exception $e) {
			throw new PropelException("Error populating SecurityAction object", $e);
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
		$criteria = new Criteria(SecurityActionPeer::DATABASE_NAME);
		$criteria->add(SecurityActionPeer::ACTION, $this->action);
		return $criteria;			
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
		if ($this->isColumnModified(SecurityActionPeer::ACTIVE)) $criteria->add(SecurityActionPeer::ACTIVE, $this->active);
		return $criteria;			
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
			$con = Propel::getConnection(SecurityActionPeer::DATABASE_NAME);

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
			$con = Propel::getConnection(SecurityActionPeer::DATABASE_NAME);

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

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SecurityActionPeer::doInsert($this, $con);
					$this->setNew(false);
				} else {
					SecurityActionPeer::doUpdate($this, $con);
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
		return SecurityActionPeer::doValidate($this, $columns);
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

			if (($retval = SecurityActionPeer::doValidate($this)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}
	  
	  
			$this->alreadyInValidation = false;
		}
	
		return (!empty($failureMap) ? $failureMap : true);
	}
  

	/**
	 * Set the PrimaryKey.
	 *
	 * @param mixed action Primary key.
	 * @return void
	 * @throws PropelException	 */
	public function setPrimaryKey($key) 
	{		
		$this->setAction($key);
	}
	

	/**
	 * Returns an id that differentiates this object from others
	 * of its class.
	 * @return string 
	 */
	public function getPrimaryKey()
	{

		return $this->getAction();

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
	 * @return SecurityAction Clone of current object.
	 * @throws PropelException
	 */
	public function copy($deepCopy = false) 
	{
		$copyObj = new SecurityAction();
		$copyObj->setModule($this->module);
		$copyObj->setSection($this->section);
		$copyObj->setAccess($this->access);
		$copyObj->setActive($this->active);
		
		$copyObj->setNew(true);
		
		$copyObj->setAction(NULL); // this is a pkey column, so set to default value

		return $copyObj;
	}
		

	/**
	 * returns a peer instance associated with this om.  Since Peer classes	
	 * are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 * @return SecurityActionPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SecurityActionPeer();
		}
		return self::$peer;
	}

}
