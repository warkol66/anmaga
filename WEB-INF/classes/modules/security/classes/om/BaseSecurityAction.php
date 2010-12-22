<?php


/**
 * Base class that represents a row from the 'security_action' table.
 *
 * Actions del sistema
 *
 * @package    propel.generator.security.classes.om
 */
abstract class BaseSecurityAction extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'SecurityActionPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SecurityActionPeer
	 */
	protected static $peer;

	/**
	 * The value for the action field.
	 * @var        string
	 */
	protected $action;

	/**
	 * The value for the module field.
	 * @var        string
	 */
	protected $module;

	/**
	 * The value for the section field.
	 * @var        string
	 */
	protected $section;

	/**
	 * The value for the access field.
	 * @var        int
	 */
	protected $access;

	/**
	 * The value for the accessaffiliateuser field.
	 * @var        int
	 */
	protected $accessaffiliateuser;

	/**
	 * The value for the active field.
	 * @var        int
	 */
	protected $active;

	/**
	 * The value for the pair field.
	 * @var        string
	 */
	protected $pair;

	/**
	 * @var        SecurityActionLabel
	 */
	protected $aSecurityActionLabel;

	/**
	 * @var        array ActionLog[] Collection to store aggregation of ActionLog objects.
	 */
	protected $collActionLogs;

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
	 * Get the [action] column value.
	 * Action pagina
	 * @return     string
	 */
	public function getAction()
	{
		return $this->action;
	}

	/**
	 * Get the [module] column value.
	 * Modulo
	 * @return     string
	 */
	public function getModule()
	{
		return $this->module;
	}

	/**
	 * Get the [section] column value.
	 * Seccion
	 * @return     string
	 */
	public function getSection()
	{
		return $this->section;
	}

	/**
	 * Get the [access] column value.
	 * El acceso a ese action
	 * @return     int
	 */
	public function getAccess()
	{
		return $this->access;
	}

	/**
	 * Get the [accessaffiliateuser] column value.
	 * El acceso a ese action para los usuarios por afiliados
	 * @return     int
	 */
	public function getAccessaffiliateuser()
	{
		return $this->accessaffiliateuser;
	}

	/**
	 * Get the [active] column value.
	 * Si el action esta activo o no
	 * @return     int
	 */
	public function getActive()
	{
		return $this->active;
	}

	/**
	 * Get the [pair] column value.
	 * Par del Action
	 * @return     string
	 */
	public function getPair()
	{
		return $this->pair;
	}

	/**
	 * Set the value of [action] column.
	 * Action pagina
	 * @param      string $v new value
	 * @return     SecurityAction The current object (for fluent API support)
	 */
	public function setAction($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->action !== $v) {
			$this->action = $v;
			$this->modifiedColumns[] = SecurityActionPeer::ACTION;
		}

		if ($this->aSecurityActionLabel !== null && $this->aSecurityActionLabel->getAction() !== $v) {
			$this->aSecurityActionLabel = null;
		}

		return $this;
	} // setAction()

	/**
	 * Set the value of [module] column.
	 * Modulo
	 * @param      string $v new value
	 * @return     SecurityAction The current object (for fluent API support)
	 */
	public function setModule($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->module !== $v) {
			$this->module = $v;
			$this->modifiedColumns[] = SecurityActionPeer::MODULE;
		}

		return $this;
	} // setModule()

	/**
	 * Set the value of [section] column.
	 * Seccion
	 * @param      string $v new value
	 * @return     SecurityAction The current object (for fluent API support)
	 */
	public function setSection($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->section !== $v) {
			$this->section = $v;
			$this->modifiedColumns[] = SecurityActionPeer::SECTION;
		}

		return $this;
	} // setSection()

	/**
	 * Set the value of [access] column.
	 * El acceso a ese action
	 * @param      int $v new value
	 * @return     SecurityAction The current object (for fluent API support)
	 */
	public function setAccess($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->access !== $v) {
			$this->access = $v;
			$this->modifiedColumns[] = SecurityActionPeer::ACCESS;
		}

		return $this;
	} // setAccess()

	/**
	 * Set the value of [accessaffiliateuser] column.
	 * El acceso a ese action para los usuarios por afiliados
	 * @param      int $v new value
	 * @return     SecurityAction The current object (for fluent API support)
	 */
	public function setAccessaffiliateuser($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->accessaffiliateuser !== $v) {
			$this->accessaffiliateuser = $v;
			$this->modifiedColumns[] = SecurityActionPeer::ACCESSAFFILIATEUSER;
		}

		return $this;
	} // setAccessaffiliateuser()

	/**
	 * Set the value of [active] column.
	 * Si el action esta activo o no
	 * @param      int $v new value
	 * @return     SecurityAction The current object (for fluent API support)
	 */
	public function setActive($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->active !== $v) {
			$this->active = $v;
			$this->modifiedColumns[] = SecurityActionPeer::ACTIVE;
		}

		return $this;
	} // setActive()

	/**
	 * Set the value of [pair] column.
	 * Par del Action
	 * @param      string $v new value
	 * @return     SecurityAction The current object (for fluent API support)
	 */
	public function setPair($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->pair !== $v) {
			$this->pair = $v;
			$this->modifiedColumns[] = SecurityActionPeer::PAIR;
		}

		return $this;
	} // setPair()

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

			$this->action = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->module = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->section = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->access = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->accessaffiliateuser = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->active = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->pair = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 7; // 7 = SecurityActionPeer::NUM_COLUMNS - SecurityActionPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating SecurityAction object", $e);
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

		if ($this->aSecurityActionLabel !== null && $this->action !== $this->aSecurityActionLabel->getAction()) {
			$this->aSecurityActionLabel = null;
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
			$con = Propel::getConnection(SecurityActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SecurityActionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aSecurityActionLabel = null;
			$this->collActionLogs = null;

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
			$con = Propel::getConnection(SecurityActionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				SecurityActionQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
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
			$con = Propel::getConnection(SecurityActionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				SecurityActionPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
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

			if ($this->aSecurityActionLabel !== null) {
				if ($this->aSecurityActionLabel->isModified() || $this->aSecurityActionLabel->isNew()) {
					$affectedRows += $this->aSecurityActionLabel->save($con);
				}
				$this->setSecurityActionLabel($this->aSecurityActionLabel);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setNew(false);
				} else {
					$affectedRows += SecurityActionPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collActionLogs !== null) {
				foreach ($this->collActionLogs as $referrerFK) {
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

			if ($this->aSecurityActionLabel !== null) {
				if (!$this->aSecurityActionLabel->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSecurityActionLabel->getValidationFailures());
				}
			}


			if (($retval = SecurityActionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collActionLogs !== null) {
					foreach ($this->collActionLogs as $referrerFK) {
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
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SecurityActionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAction();
				break;
			case 1:
				return $this->getModule();
				break;
			case 2:
				return $this->getSection();
				break;
			case 3:
				return $this->getAccess();
				break;
			case 4:
				return $this->getAccessaffiliateuser();
				break;
			case 5:
				return $this->getActive();
				break;
			case 6:
				return $this->getPair();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $includeForeignObjects = false)
	{
		$keys = SecurityActionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAction(),
			$keys[1] => $this->getModule(),
			$keys[2] => $this->getSection(),
			$keys[3] => $this->getAccess(),
			$keys[4] => $this->getAccessaffiliateuser(),
			$keys[5] => $this->getActive(),
			$keys[6] => $this->getPair(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aSecurityActionLabel) {
				$result['SecurityActionLabel'] = $this->aSecurityActionLabel->toArray($keyType, $includeLazyLoadColumns, true);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SecurityActionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAction($value);
				break;
			case 1:
				$this->setModule($value);
				break;
			case 2:
				$this->setSection($value);
				break;
			case 3:
				$this->setAccess($value);
				break;
			case 4:
				$this->setAccessaffiliateuser($value);
				break;
			case 5:
				$this->setActive($value);
				break;
			case 6:
				$this->setPair($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SecurityActionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAction($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setModule($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSection($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAccess($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAccessaffiliateuser($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setActive($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPair($arr[$keys[6]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SecurityActionPeer::DATABASE_NAME);

		if ($this->isColumnModified(SecurityActionPeer::ACTION)) $criteria->add(SecurityActionPeer::ACTION, $this->action);
		if ($this->isColumnModified(SecurityActionPeer::MODULE)) $criteria->add(SecurityActionPeer::MODULE, $this->module);
		if ($this->isColumnModified(SecurityActionPeer::SECTION)) $criteria->add(SecurityActionPeer::SECTION, $this->section);
		if ($this->isColumnModified(SecurityActionPeer::ACCESS)) $criteria->add(SecurityActionPeer::ACCESS, $this->access);
		if ($this->isColumnModified(SecurityActionPeer::ACCESSAFFILIATEUSER)) $criteria->add(SecurityActionPeer::ACCESSAFFILIATEUSER, $this->accessaffiliateuser);
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
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SecurityActionPeer::DATABASE_NAME);
		$criteria->add(SecurityActionPeer::ACTION, $this->action);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     string
	 */
	public function getPrimaryKey()
	{
		return $this->getAction();
	}

	/**
	 * Generic method to set the primary key (action column).
	 *
	 * @param      string $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setAction($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getAction();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of SecurityAction (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setAction($this->action);
		$copyObj->setModule($this->module);
		$copyObj->setSection($this->section);
		$copyObj->setAccess($this->access);
		$copyObj->setAccessaffiliateuser($this->accessaffiliateuser);
		$copyObj->setActive($this->active);
		$copyObj->setPair($this->pair);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getActionLogs() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addActionLog($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


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
	 * @return     SecurityAction Clone of current object.
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
	 * @return     SecurityActionPeer
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
	 * @param      SecurityActionLabel $v
	 * @return     SecurityAction The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSecurityActionLabel(SecurityActionLabel $v = null)
	{
		if ($v === null) {
			$this->setAction(NULL);
		} else {
			$this->setAction($v->getAction());
		}

		$this->aSecurityActionLabel = $v;

		// Add binding for other direction of this 1:1 relationship.
		if ($v !== null) {
			$v->setSecurityAction($this);
		}

		return $this;
	}


	/**
	 * Get the associated SecurityActionLabel object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     SecurityActionLabel The associated SecurityActionLabel object.
	 * @throws     PropelException
	 */
	public function getSecurityActionLabel(PropelPDO $con = null)
	{
		if ($this->aSecurityActionLabel === null && (($this->action !== "" && $this->action !== null))) {
			$this->aSecurityActionLabel = SecurityActionLabelQuery::create()
				->filterBySecurityAction($this) // here
				->findOne($con);
			// Because this foreign key represents a one-to-one relationship, we will create a bi-directional association.
			$this->aSecurityActionLabel->setSecurityAction($this);
		}
		return $this->aSecurityActionLabel;
	}

	/**
	 * Clears out the collActionLogs collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addActionLogs()
	 */
	public function clearActionLogs()
	{
		$this->collActionLogs = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collActionLogs collection.
	 *
	 * By default this just sets the collActionLogs collection to an empty array (like clearcollActionLogs());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initActionLogs()
	{
		$this->collActionLogs = new PropelObjectCollection();
		$this->collActionLogs->setModel('ActionLog');
	}

	/**
	 * Gets an array of ActionLog objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SecurityAction is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ActionLog[] List of ActionLog objects
	 * @throws     PropelException
	 */
	public function getActionLogs($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collActionLogs || null !== $criteria) {
			if ($this->isNew() && null === $this->collActionLogs) {
				// return empty collection
				$this->initActionLogs();
			} else {
				$collActionLogs = ActionLogQuery::create(null, $criteria)
					->filterBySecurityAction($this)
					->find($con);
				if (null !== $criteria) {
					return $collActionLogs;
				}
				$this->collActionLogs = $collActionLogs;
			}
		}
		return $this->collActionLogs;
	}

	/**
	 * Returns the number of related ActionLog objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ActionLog objects.
	 * @throws     PropelException
	 */
	public function countActionLogs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collActionLogs || null !== $criteria) {
			if ($this->isNew() && null === $this->collActionLogs) {
				return 0;
			} else {
				$query = ActionLogQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBySecurityAction($this)
					->count($con);
			}
		} else {
			return count($this->collActionLogs);
		}
	}

	/**
	 * Method called to associate a ActionLog object to this object
	 * through the ActionLog foreign key attribute.
	 *
	 * @param      ActionLog $l ActionLog
	 * @return     void
	 * @throws     PropelException
	 */
	public function addActionLog(ActionLog $l)
	{
		if ($this->collActionLogs === null) {
			$this->initActionLogs();
		}
		if (!$this->collActionLogs->contains($l)) { // only add it if the **same** object is not already associated
			$this->collActionLogs[]= $l;
			$l->setSecurityAction($this);
		}
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
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ActionLog[] List of ActionLog objects
	 */
	public function getActionLogsJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ActionLogQuery::create(null, $criteria);
		$query->joinWith('User', $join_behavior);

		return $this->getActionLogs($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->action = null;
		$this->module = null;
		$this->section = null;
		$this->access = null;
		$this->accessaffiliateuser = null;
		$this->active = null;
		$this->pair = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
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
			if ($this->collActionLogs) {
				foreach ((array) $this->collActionLogs as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collActionLogs = null;
		$this->aSecurityActionLabel = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		if (preg_match('/get(\w+)/', $name, $matches)) {
			$virtualColumn = $matches[1];
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
			// no lcfirst in php<5.3...
			$virtualColumn[0] = strtolower($virtualColumn[0]);
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
		}
		return parent::__call($name, $params);
	}

} // BaseSecurityAction
