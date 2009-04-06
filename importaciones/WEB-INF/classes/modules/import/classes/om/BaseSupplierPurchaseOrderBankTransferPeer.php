<?php

/**
 * Base static class for performing query and update operations on the 'import_supplierPurchaseOrderBankTransfer' table.
 *
 * Transferencias bancarias realizadas a esa orden de pedido a proveedor
 *
 * @package    import.classes.om
 */
abstract class BaseSupplierPurchaseOrderBankTransferPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'application';

	/** the table name for this class */
	const TABLE_NAME = 'import_supplierPurchaseOrderBankTransfer';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'import.classes.SupplierPurchaseOrderBankTransfer';

	/** The total number of columns. */
	const NUM_COLUMNS = 7;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'import_supplierPurchaseOrderBankTransfer.ID';

	/** the column name for the SUPPLIERPURCHASEORDERID field */
	const SUPPLIERPURCHASEORDERID = 'import_supplierPurchaseOrderBankTransfer.SUPPLIERPURCHASEORDERID';

	/** the column name for the BANKTRANSFERNUMBER field */
	const BANKTRANSFERNUMBER = 'import_supplierPurchaseOrderBankTransfer.BANKTRANSFERNUMBER';

	/** the column name for the AMOUNT field */
	const AMOUNT = 'import_supplierPurchaseOrderBankTransfer.AMOUNT';

	/** the column name for the ACCOUNTNUMBER field */
	const ACCOUNTNUMBER = 'import_supplierPurchaseOrderBankTransfer.ACCOUNTNUMBER';

	/** the column name for the BANKACCOUNTID field */
	const BANKACCOUNTID = 'import_supplierPurchaseOrderBankTransfer.BANKACCOUNTID';

	/** the column name for the CREATEDAT field */
	const CREATEDAT = 'import_supplierPurchaseOrderBankTransfer.CREATEDAT';

	/**
	 * An identiy map to hold any loaded instances of SupplierPurchaseOrderBankTransfer objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array SupplierPurchaseOrderBankTransfer[]
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
		BasePeer::TYPE_PHPNAME => array ('Id', 'Supplierpurchaseorderid', 'Banktransfernumber', 'Amount', 'Accountnumber', 'Bankaccountid', 'Createdat', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'supplierpurchaseorderid', 'banktransfernumber', 'amount', 'accountnumber', 'bankaccountid', 'createdat', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::SUPPLIERPURCHASEORDERID, self::BANKTRANSFERNUMBER, self::AMOUNT, self::ACCOUNTNUMBER, self::BANKACCOUNTID, self::CREATEDAT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'supplierPurchaseOrderId', 'bankTransferNumber', 'amount', 'accountNumber', 'bankAccountId', 'createdAt', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Supplierpurchaseorderid' => 1, 'Banktransfernumber' => 2, 'Amount' => 3, 'Accountnumber' => 4, 'Bankaccountid' => 5, 'Createdat' => 6, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'supplierpurchaseorderid' => 1, 'banktransfernumber' => 2, 'amount' => 3, 'accountnumber' => 4, 'bankaccountid' => 5, 'createdat' => 6, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::SUPPLIERPURCHASEORDERID => 1, self::BANKTRANSFERNUMBER => 2, self::AMOUNT => 3, self::ACCOUNTNUMBER => 4, self::BANKACCOUNTID => 5, self::CREATEDAT => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'supplierPurchaseOrderId' => 1, 'bankTransferNumber' => 2, 'amount' => 3, 'accountNumber' => 4, 'bankAccountId' => 5, 'createdAt' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	/**
	 * Get a (singleton) instance of the MapBuilder for this peer class.
	 * @return     MapBuilder The map builder for this peer
	 */
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new SupplierPurchaseOrderBankTransferMapBuilder();
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
	 * @param      string $column The column name for current table. (i.e. SupplierPurchaseOrderBankTransferPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(SupplierPurchaseOrderBankTransferPeer::TABLE_NAME.'.', $alias.'.', $column);
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

		$criteria->addSelectColumn(SupplierPurchaseOrderBankTransferPeer::ID);

		$criteria->addSelectColumn(SupplierPurchaseOrderBankTransferPeer::SUPPLIERPURCHASEORDERID);

		$criteria->addSelectColumn(SupplierPurchaseOrderBankTransferPeer::BANKTRANSFERNUMBER);

		$criteria->addSelectColumn(SupplierPurchaseOrderBankTransferPeer::AMOUNT);

		$criteria->addSelectColumn(SupplierPurchaseOrderBankTransferPeer::ACCOUNTNUMBER);

		$criteria->addSelectColumn(SupplierPurchaseOrderBankTransferPeer::BANKACCOUNTID);

		$criteria->addSelectColumn(SupplierPurchaseOrderBankTransferPeer::CREATEDAT);

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
		$criteria->setPrimaryTableName(SupplierPurchaseOrderBankTransferPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderBankTransferPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     SupplierPurchaseOrderBankTransfer
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = SupplierPurchaseOrderBankTransferPeer::doSelect($critcopy, $con);
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
		return SupplierPurchaseOrderBankTransferPeer::populateObjects(SupplierPurchaseOrderBankTransferPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			SupplierPurchaseOrderBankTransferPeer::addSelectColumns($criteria);
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
	 * @param      SupplierPurchaseOrderBankTransfer $value A SupplierPurchaseOrderBankTransfer object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(SupplierPurchaseOrderBankTransfer $obj, $key = null)
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
	 * @param      mixed $value A SupplierPurchaseOrderBankTransfer object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof SupplierPurchaseOrderBankTransfer) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or SupplierPurchaseOrderBankTransfer object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     SupplierPurchaseOrderBankTransfer Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
		$cls = SupplierPurchaseOrderBankTransferPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = SupplierPurchaseOrderBankTransferPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = SupplierPurchaseOrderBankTransferPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				SupplierPurchaseOrderBankTransferPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}

	/**
	 * Returns the number of rows matching criteria, joining the related SupplierPurchaseOrder table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinSupplierPurchaseOrder(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierPurchaseOrderBankTransferPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderBankTransferPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(SupplierPurchaseOrderBankTransferPeer::SUPPLIERPURCHASEORDERID,), array(SupplierPurchaseOrderPeer::ID,), $join_behavior);
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
	 * Returns the number of rows matching criteria, joining the related BankAccount table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinBankAccount(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierPurchaseOrderBankTransferPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderBankTransferPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(SupplierPurchaseOrderBankTransferPeer::BANKACCOUNTID,), array(BankAccountPeer::ID,), $join_behavior);
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
	 * Selects a collection of SupplierPurchaseOrderBankTransfer objects pre-filled with their SupplierPurchaseOrder objects.
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrderBankTransfer objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSupplierPurchaseOrder(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderBankTransferPeer::addSelectColumns($c);
		$startcol = (SupplierPurchaseOrderBankTransferPeer::NUM_COLUMNS - SupplierPurchaseOrderBankTransferPeer::NUM_LAZY_LOAD_COLUMNS);
		SupplierPurchaseOrderPeer::addSelectColumns($c);

		$c->addJoin(array(SupplierPurchaseOrderBankTransferPeer::SUPPLIERPURCHASEORDERID,), array(SupplierPurchaseOrderPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderBankTransferPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderBankTransferPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$omClass = SupplierPurchaseOrderBankTransferPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderBankTransferPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = SupplierPurchaseOrderPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = SupplierPurchaseOrderPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					SupplierPurchaseOrderPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrderBankTransfer) to $obj2 (SupplierPurchaseOrder)
				$obj2->addSupplierPurchaseOrderBankTransfer($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierPurchaseOrderBankTransfer objects pre-filled with their BankAccount objects.
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrderBankTransfer objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinBankAccount(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderBankTransferPeer::addSelectColumns($c);
		$startcol = (SupplierPurchaseOrderBankTransferPeer::NUM_COLUMNS - SupplierPurchaseOrderBankTransferPeer::NUM_LAZY_LOAD_COLUMNS);
		BankAccountPeer::addSelectColumns($c);

		$c->addJoin(array(SupplierPurchaseOrderBankTransferPeer::BANKACCOUNTID,), array(BankAccountPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderBankTransferPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderBankTransferPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$omClass = SupplierPurchaseOrderBankTransferPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderBankTransferPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = BankAccountPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = BankAccountPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = BankAccountPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					BankAccountPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrderBankTransfer) to $obj2 (BankAccount)
				$obj2->addSupplierPurchaseOrderBankTransfer($obj1);

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
		$criteria->setPrimaryTableName(SupplierPurchaseOrderBankTransferPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderBankTransferPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(SupplierPurchaseOrderBankTransferPeer::SUPPLIERPURCHASEORDERID,), array(SupplierPurchaseOrderPeer::ID,), $join_behavior);
		$criteria->addJoin(array(SupplierPurchaseOrderBankTransferPeer::BANKACCOUNTID,), array(BankAccountPeer::ID,), $join_behavior);
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
	 * Selects a collection of SupplierPurchaseOrderBankTransfer objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrderBankTransfer objects.
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

		SupplierPurchaseOrderBankTransferPeer::addSelectColumns($c);
		$startcol2 = (SupplierPurchaseOrderBankTransferPeer::NUM_COLUMNS - SupplierPurchaseOrderBankTransferPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierPurchaseOrderPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS);

		BankAccountPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (BankAccountPeer::NUM_COLUMNS - BankAccountPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(SupplierPurchaseOrderBankTransferPeer::SUPPLIERPURCHASEORDERID,), array(SupplierPurchaseOrderPeer::ID,), $join_behavior);
		$c->addJoin(array(SupplierPurchaseOrderBankTransferPeer::BANKACCOUNTID,), array(BankAccountPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderBankTransferPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderBankTransferPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$omClass = SupplierPurchaseOrderBankTransferPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderBankTransferPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined SupplierPurchaseOrder rows

			$key2 = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = SupplierPurchaseOrderPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = SupplierPurchaseOrderPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SupplierPurchaseOrderPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (SupplierPurchaseOrderBankTransfer) to the collection in $obj2 (SupplierPurchaseOrder)
				$obj2->addSupplierPurchaseOrderBankTransfer($obj1);
			} // if joined row not null

			// Add objects for joined BankAccount rows

			$key3 = BankAccountPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = BankAccountPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = BankAccountPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					BankAccountPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (SupplierPurchaseOrderBankTransfer) to the collection in $obj3 (BankAccount)
				$obj3->addSupplierPurchaseOrderBankTransfer($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related SupplierPurchaseOrder table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptSupplierPurchaseOrder(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierPurchaseOrderBankTransferPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderBankTransferPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(SupplierPurchaseOrderBankTransferPeer::BANKACCOUNTID,), array(BankAccountPeer::ID,), $join_behavior);
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
	 * Returns the number of rows matching criteria, joining the related BankAccount table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptBankAccount(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierPurchaseOrderBankTransferPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderBankTransferPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(SupplierPurchaseOrderBankTransferPeer::SUPPLIERPURCHASEORDERID,), array(SupplierPurchaseOrderPeer::ID,), $join_behavior);
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
	 * Selects a collection of SupplierPurchaseOrderBankTransfer objects pre-filled with all related objects except SupplierPurchaseOrder.
	 *
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrderBankTransfer objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSupplierPurchaseOrder(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderBankTransferPeer::addSelectColumns($c);
		$startcol2 = (SupplierPurchaseOrderBankTransferPeer::NUM_COLUMNS - SupplierPurchaseOrderBankTransferPeer::NUM_LAZY_LOAD_COLUMNS);

		BankAccountPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (BankAccountPeer::NUM_COLUMNS - BankAccountPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(SupplierPurchaseOrderBankTransferPeer::BANKACCOUNTID,), array(BankAccountPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderBankTransferPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderBankTransferPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$omClass = SupplierPurchaseOrderBankTransferPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderBankTransferPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined BankAccount rows

				$key2 = BankAccountPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = BankAccountPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = BankAccountPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					BankAccountPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrderBankTransfer) to the collection in $obj2 (BankAccount)
				$obj2->addSupplierPurchaseOrderBankTransfer($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierPurchaseOrderBankTransfer objects pre-filled with all related objects except BankAccount.
	 *
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrderBankTransfer objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptBankAccount(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderBankTransferPeer::addSelectColumns($c);
		$startcol2 = (SupplierPurchaseOrderBankTransferPeer::NUM_COLUMNS - SupplierPurchaseOrderBankTransferPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierPurchaseOrderPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(SupplierPurchaseOrderBankTransferPeer::SUPPLIERPURCHASEORDERID,), array(SupplierPurchaseOrderPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderBankTransferPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderBankTransferPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$omClass = SupplierPurchaseOrderBankTransferPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderBankTransferPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined SupplierPurchaseOrder rows

				$key2 = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SupplierPurchaseOrderPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = SupplierPurchaseOrderPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SupplierPurchaseOrderPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrderBankTransfer) to the collection in $obj2 (SupplierPurchaseOrder)
				$obj2->addSupplierPurchaseOrderBankTransfer($obj1);

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
		return SupplierPurchaseOrderBankTransferPeer::CLASS_DEFAULT;
	}

	/**
	 * Method perform an INSERT on the database, given a SupplierPurchaseOrderBankTransfer or Criteria object.
	 *
	 * @param      mixed $values Criteria or SupplierPurchaseOrderBankTransfer object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from SupplierPurchaseOrderBankTransfer object
		}

		if ($criteria->containsKey(SupplierPurchaseOrderBankTransferPeer::ID) && $criteria->keyContainsValue(SupplierPurchaseOrderBankTransferPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.SupplierPurchaseOrderBankTransferPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a SupplierPurchaseOrderBankTransfer or Criteria object.
	 *
	 * @param      mixed $values Criteria or SupplierPurchaseOrderBankTransfer object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(SupplierPurchaseOrderBankTransferPeer::ID);
			$selectCriteria->add(SupplierPurchaseOrderBankTransferPeer::ID, $criteria->remove(SupplierPurchaseOrderBankTransferPeer::ID), $comparison);

		} else { // $values is SupplierPurchaseOrderBankTransfer object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the import_supplierPurchaseOrderBankTransfer table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(SupplierPurchaseOrderBankTransferPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a SupplierPurchaseOrderBankTransfer or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or SupplierPurchaseOrderBankTransfer object or primary key or array of primary keys
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
			$con = Propel::getConnection(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			SupplierPurchaseOrderBankTransferPeer::clearInstancePool();

			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof SupplierPurchaseOrderBankTransfer) {
			// invalidate the cache for this single object
			SupplierPurchaseOrderBankTransferPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else {
			// it must be the primary key



			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(SupplierPurchaseOrderBankTransferPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
				// we can invalidate the cache for this single object
				SupplierPurchaseOrderBankTransferPeer::removeInstanceFromPool($singleval);
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
	 * Validates all modified columns of given SupplierPurchaseOrderBankTransfer object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      SupplierPurchaseOrderBankTransfer $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(SupplierPurchaseOrderBankTransfer $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(SupplierPurchaseOrderBankTransferPeer::TABLE_NAME);

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

		return BasePeer::doValidate(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME, SupplierPurchaseOrderBankTransferPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     SupplierPurchaseOrderBankTransfer
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = SupplierPurchaseOrderBankTransferPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME);
		$criteria->add(SupplierPurchaseOrderBankTransferPeer::ID, $pk);

		$v = SupplierPurchaseOrderBankTransferPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME);
			$criteria->add(SupplierPurchaseOrderBankTransferPeer::ID, $pks, Criteria::IN);
			$objs = SupplierPurchaseOrderBankTransferPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseSupplierPurchaseOrderBankTransferPeer

// This is the static code needed to register the MapBuilder for this table with the main Propel class.
//
// NOTE: This static code cannot call methods on the SupplierPurchaseOrderBankTransferPeer class, because it is not defined yet.
// If you need to use overridden methods, you can add this code to the bottom of the SupplierPurchaseOrderBankTransferPeer class:
//
// Propel::getDatabaseMap(SupplierPurchaseOrderBankTransferPeer::DATABASE_NAME)->addTableBuilder(SupplierPurchaseOrderBankTransferPeer::TABLE_NAME, SupplierPurchaseOrderBankTransferPeer::getMapBuilder());
//
// Doing so will effectively overwrite the registration below.

Propel::getDatabaseMap(BaseSupplierPurchaseOrderBankTransferPeer::DATABASE_NAME)->addTableBuilder(BaseSupplierPurchaseOrderBankTransferPeer::TABLE_NAME, BaseSupplierPurchaseOrderBankTransferPeer::getMapBuilder());

