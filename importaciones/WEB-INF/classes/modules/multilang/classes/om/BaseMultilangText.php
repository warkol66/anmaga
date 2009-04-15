<?php

/**
 * Base class that represents a row from the 'multilang_text' table.
 *
 * 
 *
 * @package    multilang.classes.om
 */
abstract class BaseMultilangText extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        MultilangTextPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the modulename field.
	 * @var        string
	 */
	protected $modulename;

	/**
	 * The value for the languageid field.
	 * @var        int
	 */
	protected $languageid;

	/**
	 * The value for the text field.
	 * @var        string
	 */
	protected $text;

	/**
	 * @var        MultilangLanguage
	 */
	protected $aMultilangLanguage;

	/**
	 * @var        Module
	 */
	protected $aModule;

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
	 * Initializes internal state of BaseMultilangText object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [modulename] column value.
	 * 
	 * @return     string
	 */
	public function getModulename()
	{
		return $this->modulename;
	}

	/**
	 * Get the [languageid] column value.
	 * 
	 * @return     int
	 */
	public function getLanguageid()
	{
		return $this->languageid;
	}

	/**
	 * Get the [text] column value.
	 * 
	 * @return     string
	 */
	public function getText()
	{
		return $this->text;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     MultilangText The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = MultilangTextPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [modulename] column.
	 * 
	 * @param      string $v new value
	 * @return     MultilangText The current object (for fluent API support)
	 */
	public function setModulename($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->modulename !== $v) {
			$this->modulename = $v;
			$this->modifiedColumns[] = MultilangTextPeer::MODULENAME;
		}

		if ($this->aModule !== null && $this->aModule->getName() !== $v) {
			$this->aModule = null;
		}

		return $this;
	} // setModulename()

	/**
	 * Set the value of [languageid] column.
	 * 
	 * @param      int $v new value
	 * @return     MultilangText The current object (for fluent API support)
	 */
	public function setLanguageid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->languageid !== $v) {
			$this->languageid = $v;
			$this->modifiedColumns[] = MultilangTextPeer::LANGUAGEID;
		}

		if ($this->aMultilangLanguage !== null && $this->aMultilangLanguage->getId() !== $v) {
			$this->aMultilangLanguage = null;
		}

		return $this;
	} // setLanguageid()

	/**
	 * Set the value of [text] column.
	 * 
	 * @param      string $v new value
	 * @return     MultilangText The current object (for fluent API support)
	 */
	public function setText($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->text !== $v) {
			$this->text = $v;
			$this->modifiedColumns[] = MultilangTextPeer::TEXT;
		}

		return $this;
	} // setText()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			// First, ensure that we don't have any columns that have been modified which aren't default columns.
			if (array_diff($this->modifiedColumns, array())) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->modulename = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->languageid = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->text = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 4; // 4 = MultilangTextPeer::NUM_COLUMNS - MultilangTextPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating MultilangText object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aModule !== null && $this->modulename !== $this->aModule->getName()) {
			$this->aModule = null;
		}
		if ($this->aMultilangLanguage !== null && $this->languageid !== $this->aMultilangLanguage->getId()) {
			$this->aMultilangLanguage = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MultilangTextPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = MultilangTextPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aMultilangLanguage = null;
			$this->aModule = null;
		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MultilangTextPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			MultilangTextPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MultilangTextPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			MultilangTextPeer::addInstanceToPool($this);
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aMultilangLanguage !== null) {
				if ($this->aMultilangLanguage->isModified() || $this->aMultilangLanguage->isNew()) {
					$affectedRows += $this->aMultilangLanguage->save($con);
				}
				$this->setMultilangLanguage($this->aMultilangLanguage);
			}

			if ($this->aModule !== null) {
				if ($this->aModule->isModified() || $this->aModule->isNew()) {
					$affectedRows += $this->aModule->save($con);
				}
				$this->setModule($this->aModule);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = MultilangTextPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setNew(false);
				} else {
					$affectedRows += MultilangTextPeer::doUpdate($this, $con);
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

			if ($this->aMultilangLanguage !== null) {
				if (!$this->aMultilangLanguage->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aMultilangLanguage->getValidationFailures());
				}
			}

			if ($this->aModule !== null) {
				if (!$this->aModule->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aModule->getValidationFailures());
				}
			}


			if (($retval = MultilangTextPeer::doValidate($this, $columns)) !== true) {
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
		$criteria = new Criteria(MultilangTextPeer::DATABASE_NAME);

		if ($this->isColumnModified(MultilangTextPeer::ID)) $criteria->add(MultilangTextPeer::ID, $this->id);
		if ($this->isColumnModified(MultilangTextPeer::MODULENAME)) $criteria->add(MultilangTextPeer::MODULENAME, $this->modulename);
		if ($this->isColumnModified(MultilangTextPeer::LANGUAGEID)) $criteria->add(MultilangTextPeer::LANGUAGEID, $this->languageid);
		if ($this->isColumnModified(MultilangTextPeer::TEXT)) $criteria->add(MultilangTextPeer::TEXT, $this->text);

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
		$criteria = new Criteria(MultilangTextPeer::DATABASE_NAME);

		$criteria->add(MultilangTextPeer::ID, $this->id);
		$criteria->add(MultilangTextPeer::MODULENAME, $this->modulename);
		$criteria->add(MultilangTextPeer::LANGUAGEID, $this->languageid);

		return $criteria;
	}

	/**
	 * Returns the composite primary key for this object.
	 * The array elements will be in same order as specified in XML.
	 * @return     array
	 */
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getId();

		$pks[1] = $this->getModulename();

		$pks[2] = $this->getLanguageid();

		return $pks;
	}

	/**
	 * Set the [composite] primary key.
	 *
	 * @param      array $keys The elements of the composite key (order must match the order in XML file).
	 * @return     void
	 */
	public function setPrimaryKey($keys)
	{

		$this->setId($keys[0]);

		$this->setModulename($keys[1]);

		$this->setLanguageid($keys[2]);

	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of MultilangText (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setId($this->id);

		$copyObj->setModulename($this->modulename);

		$copyObj->setLanguageid($this->languageid);

		$copyObj->setText($this->text);


		$copyObj->setNew(true);

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
	 * @return     MultilangText Clone of current object.
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
	 * @return     MultilangTextPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new MultilangTextPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a MultilangLanguage object.
	 *
	 * @param      MultilangLanguage $v
	 * @return     MultilangText The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setMultilangLanguage(MultilangLanguage $v = null)
	{
		if ($v === null) {
			$this->setLanguageid(NULL);
		} else {
			$this->setLanguageid($v->getId());
		}

		$this->aMultilangLanguage = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the MultilangLanguage object, it will not be re-added.
		if ($v !== null) {
			$v->addMultilangText($this);
		}

		return $this;
	}


	/**
	 * Get the associated MultilangLanguage object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     MultilangLanguage The associated MultilangLanguage object.
	 * @throws     PropelException
	 */
	public function getMultilangLanguage(PropelPDO $con = null)
	{
		if ($this->aMultilangLanguage === null && ($this->languageid !== null)) {
			$this->aMultilangLanguage = MultilangLanguagePeer::retrieveByPK($this->languageid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aMultilangLanguage->addMultilangTexts($this);
			 */
		}
		return $this->aMultilangLanguage;
	}

	/**
	 * Declares an association between this object and a Module object.
	 *
	 * @param      Module $v
	 * @return     MultilangText The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setModule(Module $v = null)
	{
		if ($v === null) {
			$this->setModulename(NULL);
		} else {
			$this->setModulename($v->getName());
		}

		$this->aModule = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Module object, it will not be re-added.
		if ($v !== null) {
			$v->addMultilangText($this);
		}

		return $this;
	}


	/**
	 * Get the associated Module object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Module The associated Module object.
	 * @throws     PropelException
	 */
	public function getModule(PropelPDO $con = null)
	{
		if ($this->aModule === null && (($this->modulename !== "" && $this->modulename !== null))) {
			$this->aModule = ModulePeer::retrieveByPK($this->modulename, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aModule->addMultilangTexts($this);
			 */
		}
		return $this->aModule;
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

			$this->aMultilangLanguage = null;
			$this->aModule = null;
	}

} // BaseMultilangText
