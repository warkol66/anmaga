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
 * [04/09/07 18:45:45]
 *
 * You should not use this class directly.  It should not even be
 * extended; all references should be to ModuleDependency class. 
 * 
 * @package anmaga 
 */
abstract class BaseModuleDependency extends BaseObject implements Persistent {
	
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
	 * @throws PropelException 
	 */
	public function setModule($v)
	{
		if ($this->module !== $v) {
			$this->module = $v;
			$this->modifiedColumns[] = ModuleDependencyPeer::MODULE;
		}
			
		  // update associated Module		  
		  if ($this->collModules !== null) {
			  for ($i=0,$size=count($this->collModules); $i < $size; $i++) {
				  $this->collModules[$i]->setName($v);
			  }
		  }
			  		
	}

  
	/**
	 * Get the Dependence column value.
	 * Dependiente 
	 * @return string	  
	 */
	public function getDependence()
	{
		return $this->dependence;
	}


	/**
	 * Set the value of `dependence` column.	  
	 * Dependiente 
	 * @param string $v new value
	 * @return void
	 *  
	 */
	public function setDependence($v)
	{
		if ($this->dependence !== $v) {
			$this->dependence = $v;
			$this->modifiedColumns[] = ModuleDependencyPeer::DEPENDENCE;
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
			$this->module = $rs->getString($startcol + 0);					
			$this->dependence = $rs->getString($startcol + 1);					
			 
			$this->resetModified();
			$this->setNew(false);
		
		} catch (Exception $e) {
			throw new PropelException("Error populating ModuleDependency object", $e);
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
		$criteria = new Criteria(ModuleDependencyPeer::DATABASE_NAME);
		$criteria->add(ModuleDependencyPeer::MODULE, $this->module);
		$criteria->add(ModuleDependencyPeer::DEPENDENCE, $this->dependence);
		return $criteria;			
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
	 * Collection to store aggregation of collModules	  
	 * @var array
	 */
	protected $collModules; 

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
	 * Method called to associate a Module object to this object
	 * through the Module foreign key attribute
	 *
	 * @param Module $l $className
	 * @return void
	 * @throws PropelException
	 */
	public function addModule(Module $l)
	{
		$this->collModules[] = $l;
		$l->setModuleDependency($this);
	}

	/**
	 * The criteria used to select the current contents of collModules.
	 * @var Criteria
	 */
	private $lastModulesCriteria = null;

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
		include_once 'anmaga/ModulePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
				
		if ($this->collModules === null) {
			if ($this->isNew()) {
			   $this->collModules = array();
			} else {
	
				$criteria->add(ModulePeer::NAME, $this->getModule() );

				$this->collModules = ModulePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.

				$criteria->add(ModulePeer::NAME, $this->getModule());

				if (!isset($this->lastModulesCriteria) || !$this->lastModulesCriteria->equals($criteria)) {
					$this->collModules = ModulePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastModulesCriteria = $criteria;

		return $this->collModules;
	}
	

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ModuleDependency is new, it will return
	 * an empty collection; or if this ModuleDependency has previously
	 * been saved, it will retrieve related Modules from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ModuleDependency.
	 */
	public function getModulesJoinModuleDependency($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'anmaga/ModulePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		
		if ($this->collModules === null) {
			if ($this->isNew()) {
			   $this->collModules = array();
			} else {
	   
				$criteria->add(ModulePeer::NAME, $this->getModule());
				$this->collModules = ModulePeer::doSelectJoinModuleDependency($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.
	  
			$criteria->add(ModulePeer::NAME, $this->getModule());
			if (!isset($this->lastModulesCriteria) || !$this->lastModulesCriteria->equals($criteria)) {
				$this->collModules = ModulePeer::doSelectJoinModuleDependency($criteria, $con);
			}
		}
		$this->lastModulesCriteria = $criteria;

		return $this->collModules;
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
			$con = Propel::getConnection(ModuleDependencyPeer::DATABASE_NAME);

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
			$con = Propel::getConnection(ModuleDependencyPeer::DATABASE_NAME);

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
					$pk = ModuleDependencyPeer::doInsert($this, $con);
					$this->setNew(false);
				} else {
					ModuleDependencyPeer::doUpdate($this, $con);
				}			
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}
			if ($this->collModules !== null) {
				for ($i=0,$size=count($this->collModules); $i < $size; $i++) {
					$this->collModules[$i]->save($con);
				}
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
		return ModuleDependencyPeer::doValidate($this, $columns);
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

			if (($retval = ModuleDependencyPeer::doValidate($this)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}
	  
			if ($this->collModules !== null) {
				for ($i=0,$size=count($this->collModules); $i < $size; $i++) {
					if (($retval = $this->collModules[$i]->validate()) !== true) {
						$failureMap = array_merge($failureMap, $retval);
					}
				}
			}
	  
			$this->alreadyInValidation = false;
		}
	
		return (!empty($failureMap) ? $failureMap : true);
	}
  


	private $pks = array();
	
	/**
	 * Set the PrimaryKey.
	 *
	 * @param array $keys The elements of the composite key (order must match the order in XML file).
	 * @return void
	 * @throws PropelException
	 */
	public function setPrimaryKey($keys)
	{						

		$this->setModule($keys[0]);

		$this->setDependence($keys[1]);

	}


	/**
	 * Returns an id that differentiates this object from others
	 * of its class.
	 * @return array 
	 */
	public function getPrimaryKey()
	{
		$this->pks[0] = $this->getModule();
		$this->pks[1] = $this->getDependence();
		return $this->pks;

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
	 * @return ModuleDependency Clone of current object.
	 * @throws PropelException
	 */
	public function copy($deepCopy = false) 
	{
		$copyObj = new ModuleDependency();

		if ($deepCopy) {		
			// important: setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getModules() as $relObj) {
				$copyObj->addModule($relObj->copy());
			}
		} // if ($deepCopy)
		
		$copyObj->setNew(true);
		
		$copyObj->setModule(NULL); // this is a pkey column, so set to default value
		$copyObj->setDependence(NULL); // this is a pkey column, so set to default value

		return $copyObj;
	}
		

	/**
	 * returns a peer instance associated with this om.  Since Peer classes	
	 * are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 * @return ModuleDependencyPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ModuleDependencyPeer();
		}
		return self::$peer;
	}

}
