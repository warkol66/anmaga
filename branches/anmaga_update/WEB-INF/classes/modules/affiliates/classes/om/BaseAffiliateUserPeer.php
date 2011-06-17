<?php


/**
 * Base static class for performing query and update operations on the 'affiliates_user' table.
 *
 * Usuarios de afiliado
 *
 * @package    propel.generator.affiliates.classes.om
 */
abstract class BaseAffiliateUserPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'application';

	/** the table name for this class */
	const TABLE_NAME = 'affiliates_user';

	/** the related Propel class for this table */
	const OM_CLASS = 'AffiliateUser';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'affiliates.classes.AffiliateUser';

	/** the related TableMap class for this table */
	const TM_CLASS = 'AffiliateUserTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 17;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 17;

	/** the column name for the ID field */
	const ID = 'affiliates_user.ID';

	/** the column name for the AFFILIATEID field */
	const AFFILIATEID = 'affiliates_user.AFFILIATEID';

	/** the column name for the USERNAME field */
	const USERNAME = 'affiliates_user.USERNAME';

	/** the column name for the PASSWORD field */
	const PASSWORD = 'affiliates_user.PASSWORD';

	/** the column name for the PASSWORDUPDATED field */
	const PASSWORDUPDATED = 'affiliates_user.PASSWORDUPDATED';

	/** the column name for the LEVELID field */
	const LEVELID = 'affiliates_user.LEVELID';

	/** the column name for the LASTLOGIN field */
	const LASTLOGIN = 'affiliates_user.LASTLOGIN';

	/** the column name for the TIMEZONE field */
	const TIMEZONE = 'affiliates_user.TIMEZONE';

	/** the column name for the NAME field */
	const NAME = 'affiliates_user.NAME';

	/** the column name for the SURNAME field */
	const SURNAME = 'affiliates_user.SURNAME';

	/** the column name for the MAILADDRESS field */
	const MAILADDRESS = 'affiliates_user.MAILADDRESS';

	/** the column name for the MAILADDRESSALT field */
	const MAILADDRESSALT = 'affiliates_user.MAILADDRESSALT';

	/** the column name for the RECOVERYHASH field */
	const RECOVERYHASH = 'affiliates_user.RECOVERYHASH';

	/** the column name for the RECOVERYHASHCREATEDON field */
	const RECOVERYHASHCREATEDON = 'affiliates_user.RECOVERYHASHCREATEDON';

	/** the column name for the DELETED_AT field */
	const DELETED_AT = 'affiliates_user.DELETED_AT';

	/** the column name for the CREATED_AT field */
	const CREATED_AT = 'affiliates_user.CREATED_AT';

	/** the column name for the UPDATED_AT field */
	const UPDATED_AT = 'affiliates_user.UPDATED_AT';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';
	
	/**
	 * An identiy map to hold any loaded instances of AffiliateUser objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array AffiliateUser[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Affiliateid', 'Username', 'Password', 'Passwordupdated', 'Levelid', 'Lastlogin', 'Timezone', 'Name', 'Surname', 'Mailaddress', 'Mailaddressalt', 'Recoveryhash', 'Recoveryhashcreatedon', 'DeletedAt', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'affiliateid', 'username', 'password', 'passwordupdated', 'levelid', 'lastlogin', 'timezone', 'name', 'surname', 'mailaddress', 'mailaddressalt', 'recoveryhash', 'recoveryhashcreatedon', 'deletedAt', 'createdAt', 'updatedAt', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::AFFILIATEID, self::USERNAME, self::PASSWORD, self::PASSWORDUPDATED, self::LEVELID, self::LASTLOGIN, self::TIMEZONE, self::NAME, self::SURNAME, self::MAILADDRESS, self::MAILADDRESSALT, self::RECOVERYHASH, self::RECOVERYHASHCREATEDON, self::DELETED_AT, self::CREATED_AT, self::UPDATED_AT, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'AFFILIATEID', 'USERNAME', 'PASSWORD', 'PASSWORDUPDATED', 'LEVELID', 'LASTLOGIN', 'TIMEZONE', 'NAME', 'SURNAME', 'MAILADDRESS', 'MAILADDRESSALT', 'RECOVERYHASH', 'RECOVERYHASHCREATEDON', 'DELETED_AT', 'CREATED_AT', 'UPDATED_AT', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'affiliateId', 'username', 'password', 'passwordUpdated', 'levelId', 'lastLogin', 'timezone', 'name', 'surname', 'mailAddress', 'mailAddressAlt', 'recoveryHash', 'recoveryHashCreatedOn', 'deleted_at', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Affiliateid' => 1, 'Username' => 2, 'Password' => 3, 'Passwordupdated' => 4, 'Levelid' => 5, 'Lastlogin' => 6, 'Timezone' => 7, 'Name' => 8, 'Surname' => 9, 'Mailaddress' => 10, 'Mailaddressalt' => 11, 'Recoveryhash' => 12, 'Recoveryhashcreatedon' => 13, 'DeletedAt' => 14, 'CreatedAt' => 15, 'UpdatedAt' => 16, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'affiliateid' => 1, 'username' => 2, 'password' => 3, 'passwordupdated' => 4, 'levelid' => 5, 'lastlogin' => 6, 'timezone' => 7, 'name' => 8, 'surname' => 9, 'mailaddress' => 10, 'mailaddressalt' => 11, 'recoveryhash' => 12, 'recoveryhashcreatedon' => 13, 'deletedAt' => 14, 'createdAt' => 15, 'updatedAt' => 16, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::AFFILIATEID => 1, self::USERNAME => 2, self::PASSWORD => 3, self::PASSWORDUPDATED => 4, self::LEVELID => 5, self::LASTLOGIN => 6, self::TIMEZONE => 7, self::NAME => 8, self::SURNAME => 9, self::MAILADDRESS => 10, self::MAILADDRESSALT => 11, self::RECOVERYHASH => 12, self::RECOVERYHASHCREATEDON => 13, self::DELETED_AT => 14, self::CREATED_AT => 15, self::UPDATED_AT => 16, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'AFFILIATEID' => 1, 'USERNAME' => 2, 'PASSWORD' => 3, 'PASSWORDUPDATED' => 4, 'LEVELID' => 5, 'LASTLOGIN' => 6, 'TIMEZONE' => 7, 'NAME' => 8, 'SURNAME' => 9, 'MAILADDRESS' => 10, 'MAILADDRESSALT' => 11, 'RECOVERYHASH' => 12, 'RECOVERYHASHCREATEDON' => 13, 'DELETED_AT' => 14, 'CREATED_AT' => 15, 'UPDATED_AT' => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'affiliateId' => 1, 'username' => 2, 'password' => 3, 'passwordUpdated' => 4, 'levelId' => 5, 'lastLogin' => 6, 'timezone' => 7, 'name' => 8, 'surname' => 9, 'mailAddress' => 10, 'mailAddressAlt' => 11, 'recoveryHash' => 12, 'recoveryHashCreatedOn' => 13, 'deleted_at' => 14, 'created_at' => 15, 'updated_at' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. AffiliateUserPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(AffiliateUserPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      Criteria $criteria object containing the columns to add.
	 * @param      string   $alias    optional table alias
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null)
	{
		if (null === $alias) {
			$criteria->addSelectColumn(AffiliateUserPeer::ID);
			$criteria->addSelectColumn(AffiliateUserPeer::AFFILIATEID);
			$criteria->addSelectColumn(AffiliateUserPeer::USERNAME);
			$criteria->addSelectColumn(AffiliateUserPeer::PASSWORD);
			$criteria->addSelectColumn(AffiliateUserPeer::PASSWORDUPDATED);
			$criteria->addSelectColumn(AffiliateUserPeer::LEVELID);
			$criteria->addSelectColumn(AffiliateUserPeer::LASTLOGIN);
			$criteria->addSelectColumn(AffiliateUserPeer::TIMEZONE);
			$criteria->addSelectColumn(AffiliateUserPeer::NAME);
			$criteria->addSelectColumn(AffiliateUserPeer::SURNAME);
			$criteria->addSelectColumn(AffiliateUserPeer::MAILADDRESS);
			$criteria->addSelectColumn(AffiliateUserPeer::MAILADDRESSALT);
			$criteria->addSelectColumn(AffiliateUserPeer::RECOVERYHASH);
			$criteria->addSelectColumn(AffiliateUserPeer::RECOVERYHASHCREATEDON);
			$criteria->addSelectColumn(AffiliateUserPeer::DELETED_AT);
			$criteria->addSelectColumn(AffiliateUserPeer::CREATED_AT);
			$criteria->addSelectColumn(AffiliateUserPeer::UPDATED_AT);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.AFFILIATEID');
			$criteria->addSelectColumn($alias . '.USERNAME');
			$criteria->addSelectColumn($alias . '.PASSWORD');
			$criteria->addSelectColumn($alias . '.PASSWORDUPDATED');
			$criteria->addSelectColumn($alias . '.LEVELID');
			$criteria->addSelectColumn($alias . '.LASTLOGIN');
			$criteria->addSelectColumn($alias . '.TIMEZONE');
			$criteria->addSelectColumn($alias . '.NAME');
			$criteria->addSelectColumn($alias . '.SURNAME');
			$criteria->addSelectColumn($alias . '.MAILADDRESS');
			$criteria->addSelectColumn($alias . '.MAILADDRESSALT');
			$criteria->addSelectColumn($alias . '.RECOVERYHASH');
			$criteria->addSelectColumn($alias . '.RECOVERYHASHCREATEDON');
			$criteria->addSelectColumn($alias . '.DELETED_AT');
			$criteria->addSelectColumn($alias . '.CREATED_AT');
			$criteria->addSelectColumn($alias . '.UPDATED_AT');
		}
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(AffiliateUserPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AffiliateUserPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(AffiliateUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// soft_delete behavior
		if (AffiliateUserQuery::isSoftDeleteEnabled()) {
			$criteria->add(AffiliateUserPeer::DELETED_AT, null, Criteria::ISNULL);
		} else {
			AffiliateUserPeer::enableSoftDelete();
		}
		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     AffiliateUser
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = AffiliateUserPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Method to do selects.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return AffiliateUserPeer::populateObjects(AffiliateUserPeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(AffiliateUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			AffiliateUserPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);
		// soft_delete behavior
		if (AffiliateUserQuery::isSoftDeleteEnabled()) {
			$criteria->add(AffiliateUserPeer::DELETED_AT, null, Criteria::ISNULL);
		} else {
			AffiliateUserPeer::enableSoftDelete();
		}

		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      AffiliateUser $value A AffiliateUser object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool($obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A AffiliateUser object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof AffiliateUser) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or AffiliateUser object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     AffiliateUser Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to affiliates_user
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol] === null) {
			return null;
		}
		return (string) $row[$startcol];
	}

	/**
	 * Retrieves the primary key from the DB resultset row 
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, an array of the primary key columns will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow($row, $startcol = 0)
	{
		return (int) $row[$startcol];
	}
	
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = AffiliateUserPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = AffiliateUserPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = AffiliateUserPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				AffiliateUserPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}
	/**
	 * Populates an object of the default type or an object that inherit from the default.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     array (AffiliateUser object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = AffiliateUserPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = AffiliateUserPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + AffiliateUserPeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = AffiliateUserPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			AffiliateUserPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}

	/**
	 * Returns the number of rows matching criteria, joining the related AffiliateLevel table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAffiliateLevel(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(AffiliateUserPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AffiliateUserPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AffiliateUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(AffiliateUserPeer::LEVELID, AffiliateLevelPeer::ID, $join_behavior);

		// soft_delete behavior
		if (AffiliateUserQuery::isSoftDeleteEnabled()) {
			$criteria->add(AffiliateUserPeer::DELETED_AT, null, Criteria::ISNULL);
		} else {
			AffiliateUserPeer::enableSoftDelete();
		}
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related AffiliateRelatedByAffiliateid table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAffiliateRelatedByAffiliateid(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(AffiliateUserPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AffiliateUserPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AffiliateUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(AffiliateUserPeer::AFFILIATEID, AffiliatePeer::ID, $join_behavior);

		// soft_delete behavior
		if (AffiliateUserQuery::isSoftDeleteEnabled()) {
			$criteria->add(AffiliateUserPeer::DELETED_AT, null, Criteria::ISNULL);
		} else {
			AffiliateUserPeer::enableSoftDelete();
		}
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Selects a collection of AffiliateUser objects pre-filled with their AffiliateLevel objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of AffiliateUser objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAffiliateLevel(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		AffiliateUserPeer::addSelectColumns($criteria);
		$startcol = AffiliateUserPeer::NUM_HYDRATE_COLUMNS;
		AffiliateLevelPeer::addSelectColumns($criteria);

		$criteria->addJoin(AffiliateUserPeer::LEVELID, AffiliateLevelPeer::ID, $join_behavior);

		// soft_delete behavior
		if (AffiliateUserQuery::isSoftDeleteEnabled()) {
			$criteria->add(AffiliateUserPeer::DELETED_AT, null, Criteria::ISNULL);
		} else {
			AffiliateUserPeer::enableSoftDelete();
		}
		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AffiliateUserPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AffiliateUserPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = AffiliateUserPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				AffiliateUserPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = AffiliateLevelPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = AffiliateLevelPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = AffiliateLevelPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					AffiliateLevelPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (AffiliateUser) to $obj2 (AffiliateLevel)
				$obj2->addAffiliateUser($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of AffiliateUser objects pre-filled with their Affiliate objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of AffiliateUser objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAffiliateRelatedByAffiliateid(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		AffiliateUserPeer::addSelectColumns($criteria);
		$startcol = AffiliateUserPeer::NUM_HYDRATE_COLUMNS;
		AffiliatePeer::addSelectColumns($criteria);

		$criteria->addJoin(AffiliateUserPeer::AFFILIATEID, AffiliatePeer::ID, $join_behavior);

		// soft_delete behavior
		if (AffiliateUserQuery::isSoftDeleteEnabled()) {
			$criteria->add(AffiliateUserPeer::DELETED_AT, null, Criteria::ISNULL);
		} else {
			AffiliateUserPeer::enableSoftDelete();
		}
		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AffiliateUserPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AffiliateUserPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = AffiliateUserPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				AffiliateUserPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = AffiliatePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = AffiliatePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = AffiliatePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					AffiliatePeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (AffiliateUser) to $obj2 (Affiliate)
				$obj2->addAffiliateUserRelatedByAffiliateid($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining all related tables
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(AffiliateUserPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AffiliateUserPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AffiliateUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(AffiliateUserPeer::LEVELID, AffiliateLevelPeer::ID, $join_behavior);

		$criteria->addJoin(AffiliateUserPeer::AFFILIATEID, AffiliatePeer::ID, $join_behavior);

		// soft_delete behavior
		if (AffiliateUserQuery::isSoftDeleteEnabled()) {
			$criteria->add(AffiliateUserPeer::DELETED_AT, null, Criteria::ISNULL);
		} else {
			AffiliateUserPeer::enableSoftDelete();
		}
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}

	/**
	 * Selects a collection of AffiliateUser objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of AffiliateUser objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		AffiliateUserPeer::addSelectColumns($criteria);
		$startcol2 = AffiliateUserPeer::NUM_HYDRATE_COLUMNS;

		AffiliateLevelPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + AffiliateLevelPeer::NUM_HYDRATE_COLUMNS;

		AffiliatePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + AffiliatePeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(AffiliateUserPeer::LEVELID, AffiliateLevelPeer::ID, $join_behavior);

		$criteria->addJoin(AffiliateUserPeer::AFFILIATEID, AffiliatePeer::ID, $join_behavior);

		// soft_delete behavior
		if (AffiliateUserQuery::isSoftDeleteEnabled()) {
			$criteria->add(AffiliateUserPeer::DELETED_AT, null, Criteria::ISNULL);
		} else {
			AffiliateUserPeer::enableSoftDelete();
		}
		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AffiliateUserPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AffiliateUserPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = AffiliateUserPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				AffiliateUserPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined AffiliateLevel rows

			$key2 = AffiliateLevelPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = AffiliateLevelPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = AffiliateLevelPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					AffiliateLevelPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (AffiliateUser) to the collection in $obj2 (AffiliateLevel)
				$obj2->addAffiliateUser($obj1);
			} // if joined row not null

			// Add objects for joined Affiliate rows

			$key3 = AffiliatePeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = AffiliatePeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = AffiliatePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					AffiliatePeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (AffiliateUser) to the collection in $obj3 (Affiliate)
				$obj3->addAffiliateUserRelatedByAffiliateid($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related AffiliateLevel table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptAffiliateLevel(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(AffiliateUserPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AffiliateUserPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AffiliateUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(AffiliateUserPeer::AFFILIATEID, AffiliatePeer::ID, $join_behavior);

		// soft_delete behavior
		if (AffiliateUserQuery::isSoftDeleteEnabled()) {
			$criteria->add(AffiliateUserPeer::DELETED_AT, null, Criteria::ISNULL);
		} else {
			AffiliateUserPeer::enableSoftDelete();
		}
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related AffiliateRelatedByAffiliateid table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptAffiliateRelatedByAffiliateid(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(AffiliateUserPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			AffiliateUserPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(AffiliateUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(AffiliateUserPeer::LEVELID, AffiliateLevelPeer::ID, $join_behavior);

		// soft_delete behavior
		if (AffiliateUserQuery::isSoftDeleteEnabled()) {
			$criteria->add(AffiliateUserPeer::DELETED_AT, null, Criteria::ISNULL);
		} else {
			AffiliateUserPeer::enableSoftDelete();
		}
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Selects a collection of AffiliateUser objects pre-filled with all related objects except AffiliateLevel.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of AffiliateUser objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptAffiliateLevel(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		AffiliateUserPeer::addSelectColumns($criteria);
		$startcol2 = AffiliateUserPeer::NUM_HYDRATE_COLUMNS;

		AffiliatePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + AffiliatePeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(AffiliateUserPeer::AFFILIATEID, AffiliatePeer::ID, $join_behavior);

		// soft_delete behavior
		if (AffiliateUserQuery::isSoftDeleteEnabled()) {
			$criteria->add(AffiliateUserPeer::DELETED_AT, null, Criteria::ISNULL);
		} else {
			AffiliateUserPeer::enableSoftDelete();
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AffiliateUserPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AffiliateUserPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = AffiliateUserPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				AffiliateUserPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Affiliate rows

				$key2 = AffiliatePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = AffiliatePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = AffiliatePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					AffiliatePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (AffiliateUser) to the collection in $obj2 (Affiliate)
				$obj2->addAffiliateUserRelatedByAffiliateid($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of AffiliateUser objects pre-filled with all related objects except AffiliateRelatedByAffiliateid.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of AffiliateUser objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptAffiliateRelatedByAffiliateid(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		AffiliateUserPeer::addSelectColumns($criteria);
		$startcol2 = AffiliateUserPeer::NUM_HYDRATE_COLUMNS;

		AffiliateLevelPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + AffiliateLevelPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(AffiliateUserPeer::LEVELID, AffiliateLevelPeer::ID, $join_behavior);

		// soft_delete behavior
		if (AffiliateUserQuery::isSoftDeleteEnabled()) {
			$criteria->add(AffiliateUserPeer::DELETED_AT, null, Criteria::ISNULL);
		} else {
			AffiliateUserPeer::enableSoftDelete();
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = AffiliateUserPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = AffiliateUserPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = AffiliateUserPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				AffiliateUserPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined AffiliateLevel rows

				$key2 = AffiliateLevelPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = AffiliateLevelPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = AffiliateLevelPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					AffiliateLevelPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (AffiliateUser) to the collection in $obj2 (AffiliateLevel)
				$obj2->addAffiliateUser($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}

	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(BaseAffiliateUserPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseAffiliateUserPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new AffiliateUserTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param      boolean $withPrefix Whether or not to return the path with the class name
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true)
	{
		return $withPrefix ? AffiliateUserPeer::CLASS_DEFAULT : AffiliateUserPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a AffiliateUser or Criteria object.
	 *
	 * @param      mixed $values Criteria or AffiliateUser object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(AffiliateUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from AffiliateUser object
		}

		if ($criteria->containsKey(AffiliateUserPeer::ID) && $criteria->keyContainsValue(AffiliateUserPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.AffiliateUserPeer::ID.')');
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a AffiliateUser or Criteria object.
	 *
	 * @param      mixed $values Criteria or AffiliateUser object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(AffiliateUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(AffiliateUserPeer::ID);
			$value = $criteria->remove(AffiliateUserPeer::ID);
			if ($value) {
				$selectCriteria->add(AffiliateUserPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(AffiliateUserPeer::TABLE_NAME);
			}

		} else { // $values is AffiliateUser object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the affiliates_user table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doForceDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(AffiliateUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(AffiliateUserPeer::TABLE_NAME, $con, AffiliateUserPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			AffiliateUserPeer::clearInstancePool();
			AffiliateUserPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a AffiliateUser or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or AffiliateUser object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doForceDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(AffiliateUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			AffiliateUserPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof AffiliateUser) { // it's a model object
			// invalidate the cache for this single object
			AffiliateUserPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AffiliateUserPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				AffiliateUserPeer::removeInstanceFromPool($singleval);
			}
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			AffiliateUserPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given AffiliateUser object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      AffiliateUser $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AffiliateUserPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AffiliateUserPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		if ($obj->isNew() || $obj->isColumnModified(AffiliateUserPeer::AFFILIATEID))
			$columns[AffiliateUserPeer::AFFILIATEID] = $obj->getAffiliateid();

		if ($obj->isNew() || $obj->isColumnModified(AffiliateUserPeer::USERNAME))
			$columns[AffiliateUserPeer::USERNAME] = $obj->getUsername();

		}

		return BasePeer::doValidate(AffiliateUserPeer::DATABASE_NAME, AffiliateUserPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     AffiliateUser
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = AffiliateUserPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(AffiliateUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(AffiliateUserPeer::DATABASE_NAME);
		$criteria->add(AffiliateUserPeer::ID, $pk);

		$v = AffiliateUserPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(AffiliateUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(AffiliateUserPeer::DATABASE_NAME);
			$criteria->add(AffiliateUserPeer::ID, $pks, Criteria::IN);
			$objs = AffiliateUserPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

	// soft_delete behavior
	
	/**
	 * Enable the soft_delete behavior for this model
	 */
	public static function enableSoftDelete()
	{
		AffiliateUserQuery::enableSoftDelete();
		// some soft_deleted objects may be in the instance pool
		AffiliateUserPeer::clearInstancePool();
	}
	
	/**
	 * Disable the soft_delete behavior for this model
	 */
	public static function disableSoftDelete()
	{
		AffiliateUserQuery::disableSoftDelete();
	}
	
	/**
	 * Check the soft_delete behavior for this model
	 * @return boolean true if the soft_delete behavior is enabled
	 */
	public static function isSoftDeleteEnabled()
	{
		return AffiliateUserQuery::isSoftDeleteEnabled();
	}
	
	/**
	 * Soft delete records, given a AffiliateUser or Criteria object OR a primary key value.
	 *
	 * @param			 mixed $values Criteria or AffiliateUser object or primary key or array of primary keys
	 *							which is used to create the DELETE statement
	 * @param			 PropelPDO $con the connection to use
	 * @return		 int	The number of affected rows (if supported by underlying database driver).
	 * @throws		 PropelException Any exceptions caught during processing will be
	 *							rethrown wrapped into a PropelException.
	 */
	public static function doSoftDelete($values, PropelPDO $con = null)
	{
		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof AffiliateUser) {
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else {
			// it must be the primary key
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AffiliateUserPeer::ID, (array) $values, Criteria::IN);
		}
		$criteria->add(AffiliateUserPeer::DELETED_AT, time());
		return AffiliateUserPeer::doUpdate($criteria, $con);
	}
	
	/**
	 * Delete or soft delete records, depending on AffiliateUserPeer::$softDelete
	 *
	 * @param			 mixed $values Criteria or AffiliateUser object or primary key or array of primary keys
	 *							which is used to create the DELETE statement
	 * @param			 PropelPDO $con the connection to use
	 * @return		 int	The number of affected rows (if supported by underlying database driver).
	 * @throws		 PropelException Any exceptions caught during processing will be
	 *							rethrown wrapped into a PropelException.
	 */
	public static function doDelete($values, PropelPDO $con = null)
	{
		if (AffiliateUserPeer::isSoftDeleteEnabled()) {
			return AffiliateUserPeer::doSoftDelete($values, $con);
		} else {
			return AffiliateUserPeer::doForceDelete($values, $con);
		} 
	}
	/**
	 * Method to soft delete all rows from the affiliates_user table.
	 *
	 * @param			 PropelPDO $con the connection to use
	 * @return		 int The number of affected rows (if supported by underlying database driver).
	 * @throws		 PropelException Any exceptions caught during processing will be
	 *							rethrown wrapped into a PropelException.
	 */
	public static function doSoftDeleteAll(PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(AffiliateUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$selectCriteria = new Criteria();
		$selectCriteria->add(AffiliateUserPeer::DELETED_AT, null, Criteria::ISNULL);
		$selectCriteria->setDbName(AffiliateUserPeer::DATABASE_NAME);
		$modifyCriteria = new Criteria();
		$modifyCriteria->add(AffiliateUserPeer::DELETED_AT, time());
		return BasePeer::doUpdate($selectCriteria, $modifyCriteria, $con);
	}
	
	/**
	 * Delete or soft delete all records, depending on AffiliateUserPeer::$softDelete
	 *
	 * @param			 PropelPDO $con the connection to use
	 * @return		 int	The number of affected rows (if supported by underlying database driver).
	 * @throws		 PropelException Any exceptions caught during processing will be
	 *							rethrown wrapped into a PropelException.
	 */
	public static function doDeleteAll(PropelPDO $con = null)
	{
		if (AffiliateUserPeer::isSoftDeleteEnabled()) {
			return AffiliateUserPeer::doSoftDeleteAll($con);
		} else {
			return AffiliateUserPeer::doForceDeleteAll($con);
		} 
	}

} // BaseAffiliateUserPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseAffiliateUserPeer::buildTableMap();

