<?php


/**
 * Base static class for performing query and update operations on the 'import_supplierPurchaseOrder' table.
 *
 * Orden de Pedido a Proveedor
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseSupplierPurchaseOrderPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'application';

	/** the table name for this class */
	const TABLE_NAME = 'import_supplierPurchaseOrder';

	/** the related Propel class for this table */
	const OM_CLASS = 'SupplierPurchaseOrder';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'import.classes.SupplierPurchaseOrder';

	/** the related TableMap class for this table */
	const TM_CLASS = 'SupplierPurchaseOrderTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 11;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'import_supplierPurchaseOrder.ID';

	/** the column name for the CREATEDAT field */
	const CREATEDAT = 'import_supplierPurchaseOrder.CREATEDAT';

	/** the column name for the SUPPLIERID field */
	const SUPPLIERID = 'import_supplierPurchaseOrder.SUPPLIERID';

	/** the column name for the STATUS field */
	const STATUS = 'import_supplierPurchaseOrder.STATUS';

	/** the column name for the TIMESTAMPSTATUS field */
	const TIMESTAMPSTATUS = 'import_supplierPurchaseOrder.TIMESTAMPSTATUS';

	/** the column name for the SUPPLIERQUOTEID field */
	const SUPPLIERQUOTEID = 'import_supplierPurchaseOrder.SUPPLIERQUOTEID';

	/** the column name for the ESTIMATEDDELIVERYDATE field */
	const ESTIMATEDDELIVERYDATE = 'import_supplierPurchaseOrder.ESTIMATEDDELIVERYDATE';

	/** the column name for the CLIENTQUOTEID field */
	const CLIENTQUOTEID = 'import_supplierPurchaseOrder.CLIENTQUOTEID';

	/** the column name for the AFFILIATEID field */
	const AFFILIATEID = 'import_supplierPurchaseOrder.AFFILIATEID';

	/** the column name for the AFFILIATEUSERID field */
	const AFFILIATEUSERID = 'import_supplierPurchaseOrder.AFFILIATEUSERID';

	/** the column name for the USERID field */
	const USERID = 'import_supplierPurchaseOrder.USERID';

	/**
	 * An identiy map to hold any loaded instances of SupplierPurchaseOrder objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array SupplierPurchaseOrder[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Createdat', 'Supplierid', 'Status', 'Timestampstatus', 'Supplierquoteid', 'Estimateddeliverydate', 'Clientquoteid', 'Affiliateid', 'Affiliateuserid', 'Userid', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'createdat', 'supplierid', 'status', 'timestampstatus', 'supplierquoteid', 'estimateddeliverydate', 'clientquoteid', 'affiliateid', 'affiliateuserid', 'userid', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::CREATEDAT, self::SUPPLIERID, self::STATUS, self::TIMESTAMPSTATUS, self::SUPPLIERQUOTEID, self::ESTIMATEDDELIVERYDATE, self::CLIENTQUOTEID, self::AFFILIATEID, self::AFFILIATEUSERID, self::USERID, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CREATEDAT', 'SUPPLIERID', 'STATUS', 'TIMESTAMPSTATUS', 'SUPPLIERQUOTEID', 'ESTIMATEDDELIVERYDATE', 'CLIENTQUOTEID', 'AFFILIATEID', 'AFFILIATEUSERID', 'USERID', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'createdAt', 'supplierId', 'status', 'timestampStatus', 'supplierQuoteId', 'estimatedDeliveryDate', 'clientQuoteId', 'affiliateId', 'affiliateUserId', 'userId', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Createdat' => 1, 'Supplierid' => 2, 'Status' => 3, 'Timestampstatus' => 4, 'Supplierquoteid' => 5, 'Estimateddeliverydate' => 6, 'Clientquoteid' => 7, 'Affiliateid' => 8, 'Affiliateuserid' => 9, 'Userid' => 10, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'createdat' => 1, 'supplierid' => 2, 'status' => 3, 'timestampstatus' => 4, 'supplierquoteid' => 5, 'estimateddeliverydate' => 6, 'clientquoteid' => 7, 'affiliateid' => 8, 'affiliateuserid' => 9, 'userid' => 10, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::CREATEDAT => 1, self::SUPPLIERID => 2, self::STATUS => 3, self::TIMESTAMPSTATUS => 4, self::SUPPLIERQUOTEID => 5, self::ESTIMATEDDELIVERYDATE => 6, self::CLIENTQUOTEID => 7, self::AFFILIATEID => 8, self::AFFILIATEUSERID => 9, self::USERID => 10, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CREATEDAT' => 1, 'SUPPLIERID' => 2, 'STATUS' => 3, 'TIMESTAMPSTATUS' => 4, 'SUPPLIERQUOTEID' => 5, 'ESTIMATEDDELIVERYDATE' => 6, 'CLIENTQUOTEID' => 7, 'AFFILIATEID' => 8, 'AFFILIATEUSERID' => 9, 'USERID' => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'createdAt' => 1, 'supplierId' => 2, 'status' => 3, 'timestampStatus' => 4, 'supplierQuoteId' => 5, 'estimatedDeliveryDate' => 6, 'clientQuoteId' => 7, 'affiliateId' => 8, 'affiliateUserId' => 9, 'userId' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
	 * @param      string $column The column name for current table. (i.e. SupplierPurchaseOrderPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(SupplierPurchaseOrderPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::ID);
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::CREATEDAT);
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::SUPPLIERID);
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::STATUS);
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::TIMESTAMPSTATUS);
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::SUPPLIERQUOTEID);
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::ESTIMATEDDELIVERYDATE);
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::CLIENTQUOTEID);
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::AFFILIATEID);
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::AFFILIATEUSERID);
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::USERID);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.CREATEDAT');
			$criteria->addSelectColumn($alias . '.SUPPLIERID');
			$criteria->addSelectColumn($alias . '.STATUS');
			$criteria->addSelectColumn($alias . '.TIMESTAMPSTATUS');
			$criteria->addSelectColumn($alias . '.SUPPLIERQUOTEID');
			$criteria->addSelectColumn($alias . '.ESTIMATEDDELIVERYDATE');
			$criteria->addSelectColumn($alias . '.CLIENTQUOTEID');
			$criteria->addSelectColumn($alias . '.AFFILIATEID');
			$criteria->addSelectColumn($alias . '.AFFILIATEUSERID');
			$criteria->addSelectColumn($alias . '.USERID');
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
		$criteria->setPrimaryTableName(SupplierPurchaseOrderPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     SupplierPurchaseOrder
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = SupplierPurchaseOrderPeer::doSelect($critcopy, $con);
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
		return SupplierPurchaseOrderPeer::populateObjects(SupplierPurchaseOrderPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			SupplierPurchaseOrderPeer::addSelectColumns($criteria);
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
	 * @param      SupplierPurchaseOrder $value A SupplierPurchaseOrder object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(SupplierPurchaseOrder $obj, $key = null)
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
	 * @param      mixed $value A SupplierPurchaseOrder object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof SupplierPurchaseOrder) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or SupplierPurchaseOrder object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     SupplierPurchaseOrder Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to import_supplierPurchaseOrder
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
		$cls = SupplierPurchaseOrderPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = SupplierPurchaseOrderPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				SupplierPurchaseOrderPeer::addInstanceToPool($obj, $key);
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
	 * @return     array (SupplierPurchaseOrder object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = SupplierPurchaseOrderPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + SupplierPurchaseOrderPeer::NUM_COLUMNS;
		} else {
			$cls = SupplierPurchaseOrderPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			SupplierPurchaseOrderPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}

	/**
	 * Returns the number of rows matching criteria, joining the related SupplierQuote table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinSupplierQuote(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierPurchaseOrderPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related ClientQuote table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinClientQuote(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierPurchaseOrderPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SupplierPurchaseOrderPeer::CLIENTQUOTEID, ClientQuotePeer::ID, $join_behavior);

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
	 * @param      Criteria $criteria
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
		$criteria->setPrimaryTableName(SupplierPurchaseOrderPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERID, SupplierPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related User table
	 *
	 * @param      Criteria $criteria
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
		$criteria->setPrimaryTableName(SupplierPurchaseOrderPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SupplierPurchaseOrderPeer::USERID, UserPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Affiliate table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAffiliate(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierPurchaseOrderPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEID, AffiliatePeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related AffiliateUser table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAffiliateUser(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierPurchaseOrderPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEUSERID, AffiliateUserPeer::ID, $join_behavior);

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
	 * Selects a collection of SupplierPurchaseOrder objects pre-filled with their SupplierQuote objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrder objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSupplierQuote(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		$startcol = (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS);
		SupplierQuotePeer::addSelectColumns($criteria);

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = SupplierPurchaseOrderPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = SupplierQuotePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = SupplierQuotePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = SupplierQuotePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					SupplierQuotePeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to $obj2 (SupplierQuote)
				$obj2->addSupplierPurchaseOrder($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierPurchaseOrder objects pre-filled with their ClientQuote objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrder objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinClientQuote(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		$startcol = (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS);
		ClientQuotePeer::addSelectColumns($criteria);

		$criteria->addJoin(SupplierPurchaseOrderPeer::CLIENTQUOTEID, ClientQuotePeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = SupplierPurchaseOrderPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ClientQuotePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ClientQuotePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ClientQuotePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ClientQuotePeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to $obj2 (ClientQuote)
				$obj2->addSupplierPurchaseOrder($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierPurchaseOrder objects pre-filled with their Supplier objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrder objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSupplier(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		$startcol = (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS);
		SupplierPeer::addSelectColumns($criteria);

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERID, SupplierPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = SupplierPurchaseOrderPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = SupplierPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = SupplierPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = SupplierPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					SupplierPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to $obj2 (Supplier)
				$obj2->addSupplierPurchaseOrder($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierPurchaseOrder objects pre-filled with their User objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrder objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinUser(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		$startcol = (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS);
		UserPeer::addSelectColumns($criteria);

		$criteria->addJoin(SupplierPurchaseOrderPeer::USERID, UserPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = SupplierPurchaseOrderPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = UserPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = UserPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					UserPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to $obj2 (User)
				$obj2->addSupplierPurchaseOrder($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierPurchaseOrder objects pre-filled with their Affiliate objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrder objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAffiliate(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		$startcol = (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS);
		AffiliatePeer::addSelectColumns($criteria);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEID, AffiliatePeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = SupplierPurchaseOrderPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (SupplierPurchaseOrder) to $obj2 (Affiliate)
				$obj2->addSupplierPurchaseOrder($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierPurchaseOrder objects pre-filled with their AffiliateUser objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrder objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAffiliateUser(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		$startcol = (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS);
		AffiliateUserPeer::addSelectColumns($criteria);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEUSERID, AffiliateUserPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = SupplierPurchaseOrderPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = AffiliateUserPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = AffiliateUserPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = AffiliateUserPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					AffiliateUserPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to $obj2 (AffiliateUser)
				$obj2->addSupplierPurchaseOrder($obj1);

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
		$criteria->setPrimaryTableName(SupplierPurchaseOrderPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::CLIENTQUOTEID, ClientQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERID, SupplierPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::USERID, UserPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEID, AffiliatePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEUSERID, AffiliateUserPeer::ID, $join_behavior);

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
	 * Selects a collection of SupplierPurchaseOrder objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrder objects.
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

		SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		$startcol2 = (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierQuotePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SupplierQuotePeer::NUM_COLUMNS - SupplierQuotePeer::NUM_LAZY_LOAD_COLUMNS);

		ClientQuotePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ClientQuotePeer::NUM_COLUMNS - ClientQuotePeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (SupplierPeer::NUM_COLUMNS - SupplierPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		AffiliatePeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (AffiliatePeer::NUM_COLUMNS - AffiliatePeer::NUM_LAZY_LOAD_COLUMNS);

		AffiliateUserPeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + (AffiliateUserPeer::NUM_COLUMNS - AffiliateUserPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::CLIENTQUOTEID, ClientQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERID, SupplierPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::USERID, UserPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEID, AffiliatePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEUSERID, AffiliateUserPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SupplierPurchaseOrderPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined SupplierQuote rows

			$key2 = SupplierQuotePeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = SupplierQuotePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = SupplierQuotePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SupplierQuotePeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj2 (SupplierQuote)
				$obj2->addSupplierPurchaseOrder($obj1);
			} // if joined row not null

			// Add objects for joined ClientQuote rows

			$key3 = ClientQuotePeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = ClientQuotePeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = ClientQuotePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ClientQuotePeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj3 (ClientQuote)
				$obj3->addSupplierPurchaseOrder($obj1);
			} // if joined row not null

			// Add objects for joined Supplier rows

			$key4 = SupplierPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = SupplierPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = SupplierPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					SupplierPeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj4 (Supplier)
				$obj4->addSupplierPurchaseOrder($obj1);
			} // if joined row not null

			// Add objects for joined User rows

			$key5 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = UserPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$cls = UserPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					UserPeer::addInstanceToPool($obj5, $key5);
				} // if obj5 loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj5 (User)
				$obj5->addSupplierPurchaseOrder($obj1);
			} // if joined row not null

			// Add objects for joined Affiliate rows

			$key6 = AffiliatePeer::getPrimaryKeyHashFromRow($row, $startcol6);
			if ($key6 !== null) {
				$obj6 = AffiliatePeer::getInstanceFromPool($key6);
				if (!$obj6) {

					$cls = AffiliatePeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					AffiliatePeer::addInstanceToPool($obj6, $key6);
				} // if obj6 loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj6 (Affiliate)
				$obj6->addSupplierPurchaseOrder($obj1);
			} // if joined row not null

			// Add objects for joined AffiliateUser rows

			$key7 = AffiliateUserPeer::getPrimaryKeyHashFromRow($row, $startcol7);
			if ($key7 !== null) {
				$obj7 = AffiliateUserPeer::getInstanceFromPool($key7);
				if (!$obj7) {

					$cls = AffiliateUserPeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					AffiliateUserPeer::addInstanceToPool($obj7, $key7);
				} // if obj7 loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj7 (AffiliateUser)
				$obj7->addSupplierPurchaseOrder($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related SupplierQuote table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptSupplierQuote(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierPurchaseOrderPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SupplierPurchaseOrderPeer::CLIENTQUOTEID, ClientQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERID, SupplierPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::USERID, UserPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEID, AffiliatePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEUSERID, AffiliateUserPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related ClientQuote table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptClientQuote(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierPurchaseOrderPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERID, SupplierPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::USERID, UserPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEID, AffiliatePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEUSERID, AffiliateUserPeer::ID, $join_behavior);

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
	 * @param      Criteria $criteria
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
		$criteria->setPrimaryTableName(SupplierPurchaseOrderPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::CLIENTQUOTEID, ClientQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::USERID, UserPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEID, AffiliatePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEUSERID, AffiliateUserPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related User table
	 *
	 * @param      Criteria $criteria
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
		$criteria->setPrimaryTableName(SupplierPurchaseOrderPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::CLIENTQUOTEID, ClientQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERID, SupplierPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEID, AffiliatePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEUSERID, AffiliateUserPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Affiliate table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptAffiliate(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierPurchaseOrderPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::CLIENTQUOTEID, ClientQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERID, SupplierPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::USERID, UserPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEUSERID, AffiliateUserPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related AffiliateUser table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptAffiliateUser(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierPurchaseOrderPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::CLIENTQUOTEID, ClientQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERID, SupplierPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::USERID, UserPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEID, AffiliatePeer::ID, $join_behavior);

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
	 * Selects a collection of SupplierPurchaseOrder objects pre-filled with all related objects except SupplierQuote.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrder objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSupplierQuote(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		$startcol2 = (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS);

		ClientQuotePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ClientQuotePeer::NUM_COLUMNS - ClientQuotePeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (SupplierPeer::NUM_COLUMNS - SupplierPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		AffiliatePeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (AffiliatePeer::NUM_COLUMNS - AffiliatePeer::NUM_LAZY_LOAD_COLUMNS);

		AffiliateUserPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (AffiliateUserPeer::NUM_COLUMNS - AffiliateUserPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SupplierPurchaseOrderPeer::CLIENTQUOTEID, ClientQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERID, SupplierPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::USERID, UserPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEID, AffiliatePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEUSERID, AffiliateUserPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SupplierPurchaseOrderPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined ClientQuote rows

				$key2 = ClientQuotePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ClientQuotePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ClientQuotePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ClientQuotePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj2 (ClientQuote)
				$obj2->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined Supplier rows

				$key3 = SupplierPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = SupplierPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = SupplierPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					SupplierPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj3 (Supplier)
				$obj3->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined User rows

				$key4 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = UserPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = UserPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					UserPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj4 (User)
				$obj4->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined Affiliate rows

				$key5 = AffiliatePeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = AffiliatePeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = AffiliatePeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					AffiliatePeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj5 (Affiliate)
				$obj5->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined AffiliateUser rows

				$key6 = AffiliateUserPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = AffiliateUserPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = AffiliateUserPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					AffiliateUserPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj6 (AffiliateUser)
				$obj6->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierPurchaseOrder objects pre-filled with all related objects except ClientQuote.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrder objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptClientQuote(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		$startcol2 = (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierQuotePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SupplierQuotePeer::NUM_COLUMNS - SupplierQuotePeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (SupplierPeer::NUM_COLUMNS - SupplierPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		AffiliatePeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (AffiliatePeer::NUM_COLUMNS - AffiliatePeer::NUM_LAZY_LOAD_COLUMNS);

		AffiliateUserPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (AffiliateUserPeer::NUM_COLUMNS - AffiliateUserPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERID, SupplierPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::USERID, UserPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEID, AffiliatePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEUSERID, AffiliateUserPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SupplierPurchaseOrderPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined SupplierQuote rows

				$key2 = SupplierQuotePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SupplierQuotePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = SupplierQuotePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SupplierQuotePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj2 (SupplierQuote)
				$obj2->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined Supplier rows

				$key3 = SupplierPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = SupplierPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = SupplierPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					SupplierPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj3 (Supplier)
				$obj3->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined User rows

				$key4 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = UserPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = UserPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					UserPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj4 (User)
				$obj4->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined Affiliate rows

				$key5 = AffiliatePeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = AffiliatePeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = AffiliatePeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					AffiliatePeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj5 (Affiliate)
				$obj5->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined AffiliateUser rows

				$key6 = AffiliateUserPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = AffiliateUserPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = AffiliateUserPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					AffiliateUserPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj6 (AffiliateUser)
				$obj6->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierPurchaseOrder objects pre-filled with all related objects except Supplier.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrder objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSupplier(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		$startcol2 = (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierQuotePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SupplierQuotePeer::NUM_COLUMNS - SupplierQuotePeer::NUM_LAZY_LOAD_COLUMNS);

		ClientQuotePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ClientQuotePeer::NUM_COLUMNS - ClientQuotePeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		AffiliatePeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (AffiliatePeer::NUM_COLUMNS - AffiliatePeer::NUM_LAZY_LOAD_COLUMNS);

		AffiliateUserPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (AffiliateUserPeer::NUM_COLUMNS - AffiliateUserPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::CLIENTQUOTEID, ClientQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::USERID, UserPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEID, AffiliatePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEUSERID, AffiliateUserPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SupplierPurchaseOrderPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined SupplierQuote rows

				$key2 = SupplierQuotePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SupplierQuotePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = SupplierQuotePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SupplierQuotePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj2 (SupplierQuote)
				$obj2->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined ClientQuote rows

				$key3 = ClientQuotePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ClientQuotePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ClientQuotePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ClientQuotePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj3 (ClientQuote)
				$obj3->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined User rows

				$key4 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = UserPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = UserPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					UserPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj4 (User)
				$obj4->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined Affiliate rows

				$key5 = AffiliatePeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = AffiliatePeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = AffiliatePeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					AffiliatePeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj5 (Affiliate)
				$obj5->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined AffiliateUser rows

				$key6 = AffiliateUserPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = AffiliateUserPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = AffiliateUserPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					AffiliateUserPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj6 (AffiliateUser)
				$obj6->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierPurchaseOrder objects pre-filled with all related objects except User.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrder objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptUser(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		$startcol2 = (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierQuotePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SupplierQuotePeer::NUM_COLUMNS - SupplierQuotePeer::NUM_LAZY_LOAD_COLUMNS);

		ClientQuotePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ClientQuotePeer::NUM_COLUMNS - ClientQuotePeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (SupplierPeer::NUM_COLUMNS - SupplierPeer::NUM_LAZY_LOAD_COLUMNS);

		AffiliatePeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (AffiliatePeer::NUM_COLUMNS - AffiliatePeer::NUM_LAZY_LOAD_COLUMNS);

		AffiliateUserPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (AffiliateUserPeer::NUM_COLUMNS - AffiliateUserPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::CLIENTQUOTEID, ClientQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERID, SupplierPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEID, AffiliatePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEUSERID, AffiliateUserPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SupplierPurchaseOrderPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined SupplierQuote rows

				$key2 = SupplierQuotePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SupplierQuotePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = SupplierQuotePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SupplierQuotePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj2 (SupplierQuote)
				$obj2->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined ClientQuote rows

				$key3 = ClientQuotePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ClientQuotePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ClientQuotePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ClientQuotePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj3 (ClientQuote)
				$obj3->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined Supplier rows

				$key4 = SupplierPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = SupplierPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = SupplierPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					SupplierPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj4 (Supplier)
				$obj4->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined Affiliate rows

				$key5 = AffiliatePeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = AffiliatePeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = AffiliatePeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					AffiliatePeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj5 (Affiliate)
				$obj5->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined AffiliateUser rows

				$key6 = AffiliateUserPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = AffiliateUserPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = AffiliateUserPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					AffiliateUserPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj6 (AffiliateUser)
				$obj6->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierPurchaseOrder objects pre-filled with all related objects except Affiliate.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrder objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptAffiliate(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		$startcol2 = (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierQuotePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SupplierQuotePeer::NUM_COLUMNS - SupplierQuotePeer::NUM_LAZY_LOAD_COLUMNS);

		ClientQuotePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ClientQuotePeer::NUM_COLUMNS - ClientQuotePeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (SupplierPeer::NUM_COLUMNS - SupplierPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		AffiliateUserPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (AffiliateUserPeer::NUM_COLUMNS - AffiliateUserPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::CLIENTQUOTEID, ClientQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERID, SupplierPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::USERID, UserPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEUSERID, AffiliateUserPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SupplierPurchaseOrderPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined SupplierQuote rows

				$key2 = SupplierQuotePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SupplierQuotePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = SupplierQuotePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SupplierQuotePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj2 (SupplierQuote)
				$obj2->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined ClientQuote rows

				$key3 = ClientQuotePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ClientQuotePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ClientQuotePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ClientQuotePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj3 (ClientQuote)
				$obj3->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined Supplier rows

				$key4 = SupplierPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = SupplierPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = SupplierPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					SupplierPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj4 (Supplier)
				$obj4->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined User rows

				$key5 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = UserPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = UserPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					UserPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj5 (User)
				$obj5->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined AffiliateUser rows

				$key6 = AffiliateUserPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = AffiliateUserPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = AffiliateUserPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					AffiliateUserPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj6 (AffiliateUser)
				$obj6->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierPurchaseOrder objects pre-filled with all related objects except AffiliateUser.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrder objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptAffiliateUser(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		$startcol2 = (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierQuotePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SupplierQuotePeer::NUM_COLUMNS - SupplierQuotePeer::NUM_LAZY_LOAD_COLUMNS);

		ClientQuotePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ClientQuotePeer::NUM_COLUMNS - ClientQuotePeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (SupplierPeer::NUM_COLUMNS - SupplierPeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		AffiliatePeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (AffiliatePeer::NUM_COLUMNS - AffiliatePeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::CLIENTQUOTEID, ClientQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERID, SupplierPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::USERID, UserPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderPeer::AFFILIATEID, AffiliatePeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SupplierPurchaseOrderPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined SupplierQuote rows

				$key2 = SupplierQuotePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SupplierQuotePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = SupplierQuotePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SupplierQuotePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj2 (SupplierQuote)
				$obj2->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined ClientQuote rows

				$key3 = ClientQuotePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ClientQuotePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ClientQuotePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ClientQuotePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj3 (ClientQuote)
				$obj3->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined Supplier rows

				$key4 = SupplierPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = SupplierPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = SupplierPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					SupplierPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj4 (Supplier)
				$obj4->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined User rows

				$key5 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = UserPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = UserPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					UserPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj5 (User)
				$obj5->addSupplierPurchaseOrder($obj1);

			} // if joined row is not null

				// Add objects for joined Affiliate rows

				$key6 = AffiliatePeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = AffiliatePeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = AffiliatePeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					AffiliatePeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (SupplierPurchaseOrder) to the collection in $obj6 (Affiliate)
				$obj6->addSupplierPurchaseOrder($obj1);

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
	  $dbMap = Propel::getDatabaseMap(BaseSupplierPurchaseOrderPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseSupplierPurchaseOrderPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new SupplierPurchaseOrderTableMap());
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
		return $withPrefix ? SupplierPurchaseOrderPeer::CLASS_DEFAULT : SupplierPurchaseOrderPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a SupplierPurchaseOrder or Criteria object.
	 *
	 * @param      mixed $values Criteria or SupplierPurchaseOrder object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from SupplierPurchaseOrder object
		}

		if ($criteria->containsKey(SupplierPurchaseOrderPeer::ID) && $criteria->keyContainsValue(SupplierPurchaseOrderPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.SupplierPurchaseOrderPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a SupplierPurchaseOrder or Criteria object.
	 *
	 * @param      mixed $values Criteria or SupplierPurchaseOrder object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(SupplierPurchaseOrderPeer::ID);
			$value = $criteria->remove(SupplierPurchaseOrderPeer::ID);
			if ($value) {
				$selectCriteria->add(SupplierPurchaseOrderPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(SupplierPurchaseOrderPeer::TABLE_NAME);
			}

		} else { // $values is SupplierPurchaseOrder object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the import_supplierPurchaseOrder table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(SupplierPurchaseOrderPeer::TABLE_NAME, $con, SupplierPurchaseOrderPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			SupplierPurchaseOrderPeer::clearInstancePool();
			SupplierPurchaseOrderPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a SupplierPurchaseOrder or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or SupplierPurchaseOrder object or primary key or array of primary keys
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
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			SupplierPurchaseOrderPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof SupplierPurchaseOrder) { // it's a model object
			// invalidate the cache for this single object
			SupplierPurchaseOrderPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(SupplierPurchaseOrderPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				SupplierPurchaseOrderPeer::removeInstanceFromPool($singleval);
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
			SupplierPurchaseOrderPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given SupplierPurchaseOrder object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      SupplierPurchaseOrder $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(SupplierPurchaseOrder $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(SupplierPurchaseOrderPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(SupplierPurchaseOrderPeer::TABLE_NAME);

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

		return BasePeer::doValidate(SupplierPurchaseOrderPeer::DATABASE_NAME, SupplierPurchaseOrderPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     SupplierPurchaseOrder
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = SupplierPurchaseOrderPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(SupplierPurchaseOrderPeer::DATABASE_NAME);
		$criteria->add(SupplierPurchaseOrderPeer::ID, $pk);

		$v = SupplierPurchaseOrderPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(SupplierPurchaseOrderPeer::DATABASE_NAME);
			$criteria->add(SupplierPurchaseOrderPeer::ID, $pks, Criteria::IN);
			$objs = SupplierPurchaseOrderPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseSupplierPurchaseOrderPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseSupplierPurchaseOrderPeer::buildTableMap();

