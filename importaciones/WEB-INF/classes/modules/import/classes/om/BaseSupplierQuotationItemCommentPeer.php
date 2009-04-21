<?php

/**
 * Base static class for performing query and update operations on the 'import_supplierQuotationItemComment' table.
 *
 * Feedback entre supplier y usuario admin de anmaga sobre un Item
 *
 * @package    import.classes.om
 */
abstract class BaseSupplierQuotationItemCommentPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'application';

	/** the table name for this class */
	const TABLE_NAME = 'import_supplierQuotationItemComment';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'import.classes.SupplierQuotationItemComment';

	/** The total number of columns. */
	const NUM_COLUMNS = 8;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'import_supplierQuotationItemComment.ID';

	/** the column name for the SUPPLIERQUOTATIONITEMID field */
	const SUPPLIERQUOTATIONITEMID = 'import_supplierQuotationItemComment.SUPPLIERQUOTATIONITEMID';

	/** the column name for the SUPPLIERID field */
	const SUPPLIERID = 'import_supplierQuotationItemComment.SUPPLIERID';

	/** the column name for the USERID field */
	const USERID = 'import_supplierQuotationItemComment.USERID';

	/** the column name for the PRICE field */
	const PRICE = 'import_supplierQuotationItemComment.PRICE';

	/** the column name for the COMMENTS field */
	const COMMENTS = 'import_supplierQuotationItemComment.COMMENTS';

	/** the column name for the DELIVERY field */
	const DELIVERY = 'import_supplierQuotationItemComment.DELIVERY';

	/** the column name for the CREATEDAT field */
	const CREATEDAT = 'import_supplierQuotationItemComment.CREATEDAT';

	/**
	 * An identiy map to hold any loaded instances of SupplierQuotationItemComment objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array SupplierQuotationItemComment[]
	 */
	public static $instances = array();

	/**
	 * The MapBuilder instance for this peer.
	 * @var        MapBuilder
	 */
	private static $mapBuilder = null;

	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Supplierquotationitemid', 'Supplierid', 'Userid', 'Price', 'Comments', 'Delivery', 'Createdat', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'supplierquotationitemid', 'supplierid', 'userid', 'price', 'comments', 'delivery', 'createdat', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::SUPPLIERQUOTATIONITEMID, self::SUPPLIERID, self::USERID, self::PRICE, self::COMMENTS, self::DELIVERY, self::CREATEDAT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'supplierQuotationItemId', 'supplierId', 'userId', 'price', 'comments', 'delivery', 'createdAt', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Supplierquotationitemid' => 1, 'Supplierid' => 2, 'Userid' => 3, 'Price' => 4, 'Comments' => 5, 'Delivery' => 6, 'Createdat' => 7, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'supplierquotationitemid' => 1, 'supplierid' => 2, 'userid' => 3, 'price' => 4, 'comments' => 5, 'delivery' => 6, 'createdat' => 7, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::SUPPLIERQUOTATIONITEMID => 1, self::SUPPLIERID => 2, self::USERID => 3, self::PRICE => 4, self::COMMENTS => 5, self::DELIVERY => 6, self::CREATEDAT => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'supplierQuotationItemId' => 1, 'supplierId' => 2, 'userId' => 3, 'price' => 4, 'comments' => 5, 'delivery' => 6, 'createdAt' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	/**
	 * Get a (singleton) instance of the MapBuilder for this peer class.
	 * @return     MapBuilder The map builder for this peer
	 */
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new SupplierQuotationItemCommentMapBuilder();
		}
		return self::$mapBuilder;
	}
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
	 * @param      string $column The column name for current table. (i.e. SupplierQuotationItemCommentPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(SupplierQuotationItemCommentPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      criteria object containing the columns to add.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(SupplierQuotationItemCommentPeer::ID);

		$criteria->addSelectColumn(SupplierQuotationItemCommentPeer::SUPPLIERQUOTATIONITEMID);

		$criteria->addSelectColumn(SupplierQuotationItemCommentPeer::SUPPLIERID);

		$criteria->addSelectColumn(SupplierQuotationItemCommentPeer::USERID);

		$criteria->addSelectColumn(SupplierQuotationItemCommentPeer::PRICE);

		$criteria->addSelectColumn(SupplierQuotationItemCommentPeer::COMMENTS);

		$criteria->addSelectColumn(SupplierQuotationItemCommentPeer::DELIVERY);

		$criteria->addSelectColumn(SupplierQuotationItemCommentPeer::CREATEDAT);

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
		$criteria->setPrimaryTableName(SupplierQuotationItemCommentPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuotationItemCommentPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     SupplierQuotationItemComment
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = SupplierQuotationItemCommentPeer::doSelect($critcopy, $con);
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
		return SupplierQuotationItemCommentPeer::populateObjects(SupplierQuotationItemCommentPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(SupplierQuotationItemCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			SupplierQuotationItemCommentPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

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
	 * @param      SupplierQuotationItemComment $value A SupplierQuotationItemComment object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(SupplierQuotationItemComment $obj, $key = null)
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
	 * @param      mixed $value A SupplierQuotationItemComment object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof SupplierQuotationItemComment) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or SupplierQuotationItemComment object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     SupplierQuotationItemComment Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
		if ($row[$startcol + 0] === null) {
			return null;
		}
		return (string) $row[$startcol + 0];
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
		$cls = SupplierQuotationItemCommentPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = SupplierQuotationItemCommentPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = SupplierQuotationItemCommentPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				SupplierQuotationItemCommentPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}

	/**
	 * Returns the number of rows matching criteria, joining the related User table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinUser(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuotationItemCommentPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuotationItemCommentPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(SupplierQuotationItemCommentPeer::USERID,), array(UserPeer::ID,), $join_behavior);
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
	 * Returns the number of rows matching criteria, joining the related Supplier table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinSupplier(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuotationItemCommentPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuotationItemCommentPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(SupplierQuotationItemCommentPeer::SUPPLIERID,), array(SupplierPeer::ID,), $join_behavior);
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
	 * Returns the number of rows matching criteria, joining the related SupplierQuotationItem table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinSupplierQuotationItem(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuotationItemCommentPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuotationItemCommentPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(SupplierQuotationItemCommentPeer::SUPPLIERQUOTATIONITEMID,), array(SupplierQuotationItemPeer::ID,), $join_behavior);
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
	 * Selects a collection of SupplierQuotationItemComment objects pre-filled with their User objects.
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuotationItemComment objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinUser(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierQuotationItemCommentPeer::addSelectColumns($c);
		$startcol = (SupplierQuotationItemCommentPeer::NUM_COLUMNS - SupplierQuotationItemCommentPeer::NUM_LAZY_LOAD_COLUMNS);
		UserPeer::addSelectColumns($c);

		$c->addJoin(array(SupplierQuotationItemCommentPeer::USERID,), array(UserPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuotationItemCommentPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuotationItemCommentPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$omClass = SupplierQuotationItemCommentPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuotationItemCommentPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = UserPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = UserPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					UserPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (SupplierQuotationItemComment) to $obj2 (User)
				$obj2->addSupplierQuotationItemComment($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuotationItemComment objects pre-filled with their Supplier objects.
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuotationItemComment objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSupplier(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierQuotationItemCommentPeer::addSelectColumns($c);
		$startcol = (SupplierQuotationItemCommentPeer::NUM_COLUMNS - SupplierQuotationItemCommentPeer::NUM_LAZY_LOAD_COLUMNS);
		SupplierPeer::addSelectColumns($c);

		$c->addJoin(array(SupplierQuotationItemCommentPeer::SUPPLIERID,), array(SupplierPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuotationItemCommentPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuotationItemCommentPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$omClass = SupplierQuotationItemCommentPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuotationItemCommentPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = SupplierPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = SupplierPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = SupplierPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					SupplierPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (SupplierQuotationItemComment) to $obj2 (Supplier)
				$obj2->addSupplierQuotationItemComment($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuotationItemComment objects pre-filled with their SupplierQuotationItem objects.
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuotationItemComment objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSupplierQuotationItem(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierQuotationItemCommentPeer::addSelectColumns($c);
		$startcol = (SupplierQuotationItemCommentPeer::NUM_COLUMNS - SupplierQuotationItemCommentPeer::NUM_LAZY_LOAD_COLUMNS);
		SupplierQuotationItemPeer::addSelectColumns($c);

		$c->addJoin(array(SupplierQuotationItemCommentPeer::SUPPLIERQUOTATIONITEMID,), array(SupplierQuotationItemPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuotationItemCommentPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuotationItemCommentPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$omClass = SupplierQuotationItemCommentPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuotationItemCommentPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = SupplierQuotationItemPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = SupplierQuotationItemPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = SupplierQuotationItemPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					SupplierQuotationItemPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (SupplierQuotationItemComment) to $obj2 (SupplierQuotationItem)
				$obj2->addSupplierQuotationItemComment($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining all related tables
	 *
	 * @param      Criteria $c
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
		$criteria->setPrimaryTableName(SupplierQuotationItemCommentPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuotationItemCommentPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(SupplierQuotationItemCommentPeer::USERID,), array(UserPeer::ID,), $join_behavior);
		$criteria->addJoin(array(SupplierQuotationItemCommentPeer::SUPPLIERID,), array(SupplierPeer::ID,), $join_behavior);
		$criteria->addJoin(array(SupplierQuotationItemCommentPeer::SUPPLIERQUOTATIONITEMID,), array(SupplierQuotationItemPeer::ID,), $join_behavior);
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
	 * Selects a collection of SupplierQuotationItemComment objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuotationItemComment objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierQuotationItemCommentPeer::addSelectColumns($c);
		$startcol2 = (SupplierQuotationItemCommentPeer::NUM_COLUMNS - SupplierQuotationItemCommentPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (SupplierPeer::NUM_COLUMNS - SupplierPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierQuotationItemPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (SupplierQuotationItemPeer::NUM_COLUMNS - SupplierQuotationItemPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(SupplierQuotationItemCommentPeer::USERID,), array(UserPeer::ID,), $join_behavior);
		$c->addJoin(array(SupplierQuotationItemCommentPeer::SUPPLIERID,), array(SupplierPeer::ID,), $join_behavior);
		$c->addJoin(array(SupplierQuotationItemCommentPeer::SUPPLIERQUOTATIONITEMID,), array(SupplierQuotationItemPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuotationItemCommentPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuotationItemCommentPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$omClass = SupplierQuotationItemCommentPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuotationItemCommentPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined User rows

			$key2 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = UserPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = UserPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					UserPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (SupplierQuotationItemComment) to the collection in $obj2 (User)
				$obj2->addSupplierQuotationItemComment($obj1);
			} // if joined row not null

			// Add objects for joined Supplier rows

			$key3 = SupplierPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = SupplierPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = SupplierPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					SupplierPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (SupplierQuotationItemComment) to the collection in $obj3 (Supplier)
				$obj3->addSupplierQuotationItemComment($obj1);
			} // if joined row not null

			// Add objects for joined SupplierQuotationItem rows

			$key4 = SupplierQuotationItemPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = SupplierQuotationItemPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$omClass = SupplierQuotationItemPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					SupplierQuotationItemPeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (SupplierQuotationItemComment) to the collection in $obj4 (SupplierQuotationItem)
				$obj4->addSupplierQuotationItemComment($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related User table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptUser(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuotationItemCommentPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuotationItemCommentPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(SupplierQuotationItemCommentPeer::SUPPLIERID,), array(SupplierPeer::ID,), $join_behavior);
				$criteria->addJoin(array(SupplierQuotationItemCommentPeer::SUPPLIERQUOTATIONITEMID,), array(SupplierQuotationItemPeer::ID,), $join_behavior);
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
	 * Returns the number of rows matching criteria, joining the related Supplier table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptSupplier(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuotationItemCommentPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuotationItemCommentPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(SupplierQuotationItemCommentPeer::USERID,), array(UserPeer::ID,), $join_behavior);
				$criteria->addJoin(array(SupplierQuotationItemCommentPeer::SUPPLIERQUOTATIONITEMID,), array(SupplierQuotationItemPeer::ID,), $join_behavior);
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
	 * Returns the number of rows matching criteria, joining the related SupplierQuotationItem table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptSupplierQuotationItem(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuotationItemCommentPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuotationItemCommentPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(SupplierQuotationItemCommentPeer::USERID,), array(UserPeer::ID,), $join_behavior);
				$criteria->addJoin(array(SupplierQuotationItemCommentPeer::SUPPLIERID,), array(SupplierPeer::ID,), $join_behavior);
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
	 * Selects a collection of SupplierQuotationItemComment objects pre-filled with all related objects except User.
	 *
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuotationItemComment objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptUser(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierQuotationItemCommentPeer::addSelectColumns($c);
		$startcol2 = (SupplierQuotationItemCommentPeer::NUM_COLUMNS - SupplierQuotationItemCommentPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (SupplierPeer::NUM_COLUMNS - SupplierPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierQuotationItemPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (SupplierQuotationItemPeer::NUM_COLUMNS - SupplierQuotationItemPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(SupplierQuotationItemCommentPeer::SUPPLIERID,), array(SupplierPeer::ID,), $join_behavior);
				$c->addJoin(array(SupplierQuotationItemCommentPeer::SUPPLIERQUOTATIONITEMID,), array(SupplierQuotationItemPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuotationItemCommentPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuotationItemCommentPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$omClass = SupplierQuotationItemCommentPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuotationItemCommentPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Supplier rows

				$key2 = SupplierPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SupplierPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = SupplierPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SupplierPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SupplierQuotationItemComment) to the collection in $obj2 (Supplier)
				$obj2->addSupplierQuotationItemComment($obj1);

			} // if joined row is not null

				// Add objects for joined SupplierQuotationItem rows

				$key3 = SupplierQuotationItemPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = SupplierQuotationItemPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = SupplierQuotationItemPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					SupplierQuotationItemPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierQuotationItemComment) to the collection in $obj3 (SupplierQuotationItem)
				$obj3->addSupplierQuotationItemComment($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuotationItemComment objects pre-filled with all related objects except Supplier.
	 *
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuotationItemComment objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSupplier(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierQuotationItemCommentPeer::addSelectColumns($c);
		$startcol2 = (SupplierQuotationItemCommentPeer::NUM_COLUMNS - SupplierQuotationItemCommentPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierQuotationItemPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (SupplierQuotationItemPeer::NUM_COLUMNS - SupplierQuotationItemPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(SupplierQuotationItemCommentPeer::USERID,), array(UserPeer::ID,), $join_behavior);
				$c->addJoin(array(SupplierQuotationItemCommentPeer::SUPPLIERQUOTATIONITEMID,), array(SupplierQuotationItemPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuotationItemCommentPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuotationItemCommentPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$omClass = SupplierQuotationItemCommentPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuotationItemCommentPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined User rows

				$key2 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = UserPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = UserPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					UserPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SupplierQuotationItemComment) to the collection in $obj2 (User)
				$obj2->addSupplierQuotationItemComment($obj1);

			} // if joined row is not null

				// Add objects for joined SupplierQuotationItem rows

				$key3 = SupplierQuotationItemPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = SupplierQuotationItemPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = SupplierQuotationItemPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					SupplierQuotationItemPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierQuotationItemComment) to the collection in $obj3 (SupplierQuotationItem)
				$obj3->addSupplierQuotationItemComment($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuotationItemComment objects pre-filled with all related objects except SupplierQuotationItem.
	 *
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuotationItemComment objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSupplierQuotationItem(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierQuotationItemCommentPeer::addSelectColumns($c);
		$startcol2 = (SupplierQuotationItemCommentPeer::NUM_COLUMNS - SupplierQuotationItemCommentPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (SupplierPeer::NUM_COLUMNS - SupplierPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(SupplierQuotationItemCommentPeer::USERID,), array(UserPeer::ID,), $join_behavior);
				$c->addJoin(array(SupplierQuotationItemCommentPeer::SUPPLIERID,), array(SupplierPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuotationItemCommentPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuotationItemCommentPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$omClass = SupplierQuotationItemCommentPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuotationItemCommentPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined User rows

				$key2 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = UserPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = UserPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					UserPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SupplierQuotationItemComment) to the collection in $obj2 (User)
				$obj2->addSupplierQuotationItemComment($obj1);

			} // if joined row is not null

				// Add objects for joined Supplier rows

				$key3 = SupplierPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = SupplierPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = SupplierPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					SupplierPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierQuotationItemComment) to the collection in $obj3 (Supplier)
				$obj3->addSupplierQuotationItemComment($obj1);

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
	 * The class that the Peer will make instances of.
	 *
	 * This uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass()
	{
		return SupplierQuotationItemCommentPeer::CLASS_DEFAULT;
	}

	/**
	 * Method perform an INSERT on the database, given a SupplierQuotationItemComment or Criteria object.
	 *
	 * @param      mixed $values Criteria or SupplierQuotationItemComment object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemCommentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from SupplierQuotationItemComment object
		}

		if ($criteria->containsKey(SupplierQuotationItemCommentPeer::ID) && $criteria->keyContainsValue(SupplierQuotationItemCommentPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.SupplierQuotationItemCommentPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a SupplierQuotationItemComment or Criteria object.
	 *
	 * @param      mixed $values Criteria or SupplierQuotationItemComment object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemCommentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(SupplierQuotationItemCommentPeer::ID);
			$selectCriteria->add(SupplierQuotationItemCommentPeer::ID, $criteria->remove(SupplierQuotationItemCommentPeer::ID), $comparison);

		} else { // $values is SupplierQuotationItemComment object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the import_supplierQuotationItemComment table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemCommentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(SupplierQuotationItemCommentPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a SupplierQuotationItemComment or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or SupplierQuotationItemComment object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemCommentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			SupplierQuotationItemCommentPeer::clearInstancePool();

			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof SupplierQuotationItemComment) {
			// invalidate the cache for this single object
			SupplierQuotationItemCommentPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else {
			// it must be the primary key



			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(SupplierQuotationItemCommentPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
				// we can invalidate the cache for this single object
				SupplierQuotationItemCommentPeer::removeInstanceFromPool($singleval);
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

			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given SupplierQuotationItemComment object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      SupplierQuotationItemComment $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(SupplierQuotationItemComment $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(SupplierQuotationItemCommentPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(SupplierQuotationItemCommentPeer::TABLE_NAME);

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

		}

		return BasePeer::doValidate(SupplierQuotationItemCommentPeer::DATABASE_NAME, SupplierQuotationItemCommentPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     SupplierQuotationItemComment
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = SupplierQuotationItemCommentPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(SupplierQuotationItemCommentPeer::DATABASE_NAME);
		$criteria->add(SupplierQuotationItemCommentPeer::ID, $pk);

		$v = SupplierQuotationItemCommentPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(SupplierQuotationItemCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(SupplierQuotationItemCommentPeer::DATABASE_NAME);
			$criteria->add(SupplierQuotationItemCommentPeer::ID, $pks, Criteria::IN);
			$objs = SupplierQuotationItemCommentPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseSupplierQuotationItemCommentPeer

// This is the static code needed to register the MapBuilder for this table with the main Propel class.
//
// NOTE: This static code cannot call methods on the SupplierQuotationItemCommentPeer class, because it is not defined yet.
// If you need to use overridden methods, you can add this code to the bottom of the SupplierQuotationItemCommentPeer class:
//
// Propel::getDatabaseMap(SupplierQuotationItemCommentPeer::DATABASE_NAME)->addTableBuilder(SupplierQuotationItemCommentPeer::TABLE_NAME, SupplierQuotationItemCommentPeer::getMapBuilder());
//
// Doing so will effectively overwrite the registration below.

Propel::getDatabaseMap(BaseSupplierQuotationItemCommentPeer::DATABASE_NAME)->addTableBuilder(BaseSupplierQuotationItemCommentPeer::TABLE_NAME, BaseSupplierQuotationItemCommentPeer::getMapBuilder());
