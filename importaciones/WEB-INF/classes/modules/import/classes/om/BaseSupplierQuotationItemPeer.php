<?php

/**
 * Base static class for performing query and update operations on the 'import_supplierQuotationItem' table.
 *
 * Elemento de Cotizacion de Proveedor
 *
 * @package    import.classes.om
 */
abstract class BaseSupplierQuotationItemPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'application';

	/** the table name for this class */
	const TABLE_NAME = 'import_supplierQuotationItem';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'import.classes.SupplierQuotationItem';

	/** The total number of columns. */
	const NUM_COLUMNS = 21;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'import_supplierQuotationItem.ID';

	/** the column name for the SUPPLIERQUOTATIONID field */
	const SUPPLIERQUOTATIONID = 'import_supplierQuotationItem.SUPPLIERQUOTATIONID';

	/** the column name for the PRODUCTID field */
	const PRODUCTID = 'import_supplierQuotationItem.PRODUCTID';

	/** the column name for the CLIENTQUOTATIONITEMID field */
	const CLIENTQUOTATIONITEMID = 'import_supplierQuotationItem.CLIENTQUOTATIONITEMID';

	/** the column name for the QUANTITY field */
	const QUANTITY = 'import_supplierQuotationItem.QUANTITY';

	/** the column name for the PORTID field */
	const PORTID = 'import_supplierQuotationItem.PORTID';

	/** the column name for the INCOTERMID field */
	const INCOTERMID = 'import_supplierQuotationItem.INCOTERMID';

	/** the column name for the PRICE field */
	const PRICE = 'import_supplierQuotationItem.PRICE';

	/** the column name for the SUPPLIERCOMMENTS field */
	const SUPPLIERCOMMENTS = 'import_supplierQuotationItem.SUPPLIERCOMMENTS';

	/** the column name for the DELIVERY field */
	const DELIVERY = 'import_supplierQuotationItem.DELIVERY';

	/** the column name for the PACKAGE field */
	const PACKAGE = 'import_supplierQuotationItem.PACKAGE';

	/** the column name for the UNITLENGTH field */
	const UNITLENGTH = 'import_supplierQuotationItem.UNITLENGTH';

	/** the column name for the UNITWIDTH field */
	const UNITWIDTH = 'import_supplierQuotationItem.UNITWIDTH';

	/** the column name for the UNITHEIGHT field */
	const UNITHEIGHT = 'import_supplierQuotationItem.UNITHEIGHT';

	/** the column name for the UNITGROSSWEIGTH field */
	const UNITGROSSWEIGTH = 'import_supplierQuotationItem.UNITGROSSWEIGTH';

	/** the column name for the UNITSPERCARTON field */
	const UNITSPERCARTON = 'import_supplierQuotationItem.UNITSPERCARTON';

	/** the column name for the CARTONS field */
	const CARTONS = 'import_supplierQuotationItem.CARTONS';

	/** the column name for the CARTONLENGTH field */
	const CARTONLENGTH = 'import_supplierQuotationItem.CARTONLENGTH';

	/** the column name for the CARTONWIDTH field */
	const CARTONWIDTH = 'import_supplierQuotationItem.CARTONWIDTH';

	/** the column name for the CARTONHEIGHT field */
	const CARTONHEIGHT = 'import_supplierQuotationItem.CARTONHEIGHT';

	/** the column name for the CARTONGROSSWEIGTH field */
	const CARTONGROSSWEIGTH = 'import_supplierQuotationItem.CARTONGROSSWEIGTH';

	/**
	 * An identiy map to hold any loaded instances of SupplierQuotationItem objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array SupplierQuotationItem[]
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
		BasePeer::TYPE_PHPNAME => array ('Id', 'Supplierquotationid', 'Productid', 'Clientquotationitemid', 'Quantity', 'Portid', 'Incotermid', 'Price', 'Suppliercomments', 'Delivery', 'Package', 'Unitlength', 'Unitwidth', 'Unitheight', 'Unitgrossweigth', 'Unitspercarton', 'Cartons', 'Cartonlength', 'Cartonwidth', 'Cartonheight', 'Cartongrossweigth', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'supplierquotationid', 'productid', 'clientquotationitemid', 'quantity', 'portid', 'incotermid', 'price', 'suppliercomments', 'delivery', 'package', 'unitlength', 'unitwidth', 'unitheight', 'unitgrossweigth', 'unitspercarton', 'cartons', 'cartonlength', 'cartonwidth', 'cartonheight', 'cartongrossweigth', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::SUPPLIERQUOTATIONID, self::PRODUCTID, self::CLIENTQUOTATIONITEMID, self::QUANTITY, self::PORTID, self::INCOTERMID, self::PRICE, self::SUPPLIERCOMMENTS, self::DELIVERY, self::PACKAGE, self::UNITLENGTH, self::UNITWIDTH, self::UNITHEIGHT, self::UNITGROSSWEIGTH, self::UNITSPERCARTON, self::CARTONS, self::CARTONLENGTH, self::CARTONWIDTH, self::CARTONHEIGHT, self::CARTONGROSSWEIGTH, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'supplierQuotationId', 'productId', 'clientQuotationItemId', 'quantity', 'portId', 'incotermId', 'price', 'supplierComments', 'delivery', 'package', 'unitLength', 'unitWidth', 'unitHeight', 'unitGrossWeigth', 'unitsPerCarton', 'cartons', 'cartonLength', 'cartonWidth', 'cartonHeight', 'cartonGrossWeigth', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Supplierquotationid' => 1, 'Productid' => 2, 'Clientquotationitemid' => 3, 'Quantity' => 4, 'Portid' => 5, 'Incotermid' => 6, 'Price' => 7, 'Suppliercomments' => 8, 'Delivery' => 9, 'Package' => 10, 'Unitlength' => 11, 'Unitwidth' => 12, 'Unitheight' => 13, 'Unitgrossweigth' => 14, 'Unitspercarton' => 15, 'Cartons' => 16, 'Cartonlength' => 17, 'Cartonwidth' => 18, 'Cartonheight' => 19, 'Cartongrossweigth' => 20, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'supplierquotationid' => 1, 'productid' => 2, 'clientquotationitemid' => 3, 'quantity' => 4, 'portid' => 5, 'incotermid' => 6, 'price' => 7, 'suppliercomments' => 8, 'delivery' => 9, 'package' => 10, 'unitlength' => 11, 'unitwidth' => 12, 'unitheight' => 13, 'unitgrossweigth' => 14, 'unitspercarton' => 15, 'cartons' => 16, 'cartonlength' => 17, 'cartonwidth' => 18, 'cartonheight' => 19, 'cartongrossweigth' => 20, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::SUPPLIERQUOTATIONID => 1, self::PRODUCTID => 2, self::CLIENTQUOTATIONITEMID => 3, self::QUANTITY => 4, self::PORTID => 5, self::INCOTERMID => 6, self::PRICE => 7, self::SUPPLIERCOMMENTS => 8, self::DELIVERY => 9, self::PACKAGE => 10, self::UNITLENGTH => 11, self::UNITWIDTH => 12, self::UNITHEIGHT => 13, self::UNITGROSSWEIGTH => 14, self::UNITSPERCARTON => 15, self::CARTONS => 16, self::CARTONLENGTH => 17, self::CARTONWIDTH => 18, self::CARTONHEIGHT => 19, self::CARTONGROSSWEIGTH => 20, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'supplierQuotationId' => 1, 'productId' => 2, 'clientQuotationItemId' => 3, 'quantity' => 4, 'portId' => 5, 'incotermId' => 6, 'price' => 7, 'supplierComments' => 8, 'delivery' => 9, 'package' => 10, 'unitLength' => 11, 'unitWidth' => 12, 'unitHeight' => 13, 'unitGrossWeigth' => 14, 'unitsPerCarton' => 15, 'cartons' => 16, 'cartonLength' => 17, 'cartonWidth' => 18, 'cartonHeight' => 19, 'cartonGrossWeigth' => 20, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	/**
	 * Get a (singleton) instance of the MapBuilder for this peer class.
	 * @return     MapBuilder The map builder for this peer
	 */
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new SupplierQuotationItemMapBuilder();
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
	 * @param      string $column The column name for current table. (i.e. SupplierQuotationItemPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(SupplierQuotationItemPeer::TABLE_NAME.'.', $alias.'.', $column);
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

		$criteria->addSelectColumn(SupplierQuotationItemPeer::ID);

		$criteria->addSelectColumn(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID);

		$criteria->addSelectColumn(SupplierQuotationItemPeer::PRODUCTID);

		$criteria->addSelectColumn(SupplierQuotationItemPeer::CLIENTQUOTATIONITEMID);

		$criteria->addSelectColumn(SupplierQuotationItemPeer::QUANTITY);

		$criteria->addSelectColumn(SupplierQuotationItemPeer::PORTID);

		$criteria->addSelectColumn(SupplierQuotationItemPeer::INCOTERMID);

		$criteria->addSelectColumn(SupplierQuotationItemPeer::PRICE);

		$criteria->addSelectColumn(SupplierQuotationItemPeer::SUPPLIERCOMMENTS);

		$criteria->addSelectColumn(SupplierQuotationItemPeer::DELIVERY);

		$criteria->addSelectColumn(SupplierQuotationItemPeer::PACKAGE);

		$criteria->addSelectColumn(SupplierQuotationItemPeer::UNITLENGTH);

		$criteria->addSelectColumn(SupplierQuotationItemPeer::UNITWIDTH);

		$criteria->addSelectColumn(SupplierQuotationItemPeer::UNITHEIGHT);

		$criteria->addSelectColumn(SupplierQuotationItemPeer::UNITGROSSWEIGTH);

		$criteria->addSelectColumn(SupplierQuotationItemPeer::UNITSPERCARTON);

		$criteria->addSelectColumn(SupplierQuotationItemPeer::CARTONS);

		$criteria->addSelectColumn(SupplierQuotationItemPeer::CARTONLENGTH);

		$criteria->addSelectColumn(SupplierQuotationItemPeer::CARTONWIDTH);

		$criteria->addSelectColumn(SupplierQuotationItemPeer::CARTONHEIGHT);

		$criteria->addSelectColumn(SupplierQuotationItemPeer::CARTONGROSSWEIGTH);

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
		$criteria->setPrimaryTableName(SupplierQuotationItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuotationItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     SupplierQuotationItem
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = SupplierQuotationItemPeer::doSelect($critcopy, $con);
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
		return SupplierQuotationItemPeer::populateObjects(SupplierQuotationItemPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			SupplierQuotationItemPeer::addSelectColumns($criteria);
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
	 * @param      SupplierQuotationItem $value A SupplierQuotationItem object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(SupplierQuotationItem $obj, $key = null)
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
	 * @param      mixed $value A SupplierQuotationItem object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof SupplierQuotationItem) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or SupplierQuotationItem object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     SupplierQuotationItem Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
		$cls = SupplierQuotationItemPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = SupplierQuotationItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = SupplierQuotationItemPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				SupplierQuotationItemPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}

	/**
	 * Returns the number of rows matching criteria, joining the related SupplierQuotation table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinSupplierQuotation(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuotationItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuotationItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID,), array(SupplierQuotationPeer::ID,), $join_behavior);
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
	 * Returns the number of rows matching criteria, joining the related ClientQuotationItem table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinClientQuotationItem(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuotationItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuotationItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(SupplierQuotationItemPeer::CLIENTQUOTATIONITEMID,), array(ClientQuotationItemPeer::ID,), $join_behavior);
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
	 * Returns the number of rows matching criteria, joining the related Product table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinProduct(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuotationItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuotationItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(SupplierQuotationItemPeer::PRODUCTID,), array(ProductPeer::ID,), $join_behavior);
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
	 * Returns the number of rows matching criteria, joining the related Incoterm table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinIncoterm(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuotationItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuotationItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(SupplierQuotationItemPeer::INCOTERMID,), array(IncotermPeer::ID,), $join_behavior);
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
	 * Returns the number of rows matching criteria, joining the related Port table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinPort(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuotationItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuotationItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(SupplierQuotationItemPeer::PORTID,), array(PortPeer::ID,), $join_behavior);
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
	 * Selects a collection of SupplierQuotationItem objects pre-filled with their SupplierQuotation objects.
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuotationItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSupplierQuotation(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierQuotationItemPeer::addSelectColumns($c);
		$startcol = (SupplierQuotationItemPeer::NUM_COLUMNS - SupplierQuotationItemPeer::NUM_LAZY_LOAD_COLUMNS);
		SupplierQuotationPeer::addSelectColumns($c);

		$c->addJoin(array(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID,), array(SupplierQuotationPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuotationItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuotationItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$omClass = SupplierQuotationItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuotationItemPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = SupplierQuotationPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = SupplierQuotationPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = SupplierQuotationPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					SupplierQuotationPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (SupplierQuotationItem) to $obj2 (SupplierQuotation)
				$obj2->addSupplierQuotationItem($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuotationItem objects pre-filled with their ClientQuotationItem objects.
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuotationItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinClientQuotationItem(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierQuotationItemPeer::addSelectColumns($c);
		$startcol = (SupplierQuotationItemPeer::NUM_COLUMNS - SupplierQuotationItemPeer::NUM_LAZY_LOAD_COLUMNS);
		ClientQuotationItemPeer::addSelectColumns($c);

		$c->addJoin(array(SupplierQuotationItemPeer::CLIENTQUOTATIONITEMID,), array(ClientQuotationItemPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuotationItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuotationItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$omClass = SupplierQuotationItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuotationItemPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ClientQuotationItemPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ClientQuotationItemPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = ClientQuotationItemPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ClientQuotationItemPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (SupplierQuotationItem) to $obj2 (ClientQuotationItem)
				$obj2->addSupplierQuotationItem($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuotationItem objects pre-filled with their Product objects.
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuotationItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinProduct(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierQuotationItemPeer::addSelectColumns($c);
		$startcol = (SupplierQuotationItemPeer::NUM_COLUMNS - SupplierQuotationItemPeer::NUM_LAZY_LOAD_COLUMNS);
		ProductPeer::addSelectColumns($c);

		$c->addJoin(array(SupplierQuotationItemPeer::PRODUCTID,), array(ProductPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuotationItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuotationItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$omClass = SupplierQuotationItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuotationItemPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ProductPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = ProductPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ProductPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (SupplierQuotationItem) to $obj2 (Product)
				$obj2->addSupplierQuotationItem($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuotationItem objects pre-filled with their Incoterm objects.
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuotationItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinIncoterm(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierQuotationItemPeer::addSelectColumns($c);
		$startcol = (SupplierQuotationItemPeer::NUM_COLUMNS - SupplierQuotationItemPeer::NUM_LAZY_LOAD_COLUMNS);
		IncotermPeer::addSelectColumns($c);

		$c->addJoin(array(SupplierQuotationItemPeer::INCOTERMID,), array(IncotermPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuotationItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuotationItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$omClass = SupplierQuotationItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuotationItemPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = IncotermPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = IncotermPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = IncotermPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					IncotermPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (SupplierQuotationItem) to $obj2 (Incoterm)
				$obj2->addSupplierQuotationItem($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuotationItem objects pre-filled with their Port objects.
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuotationItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinPort(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierQuotationItemPeer::addSelectColumns($c);
		$startcol = (SupplierQuotationItemPeer::NUM_COLUMNS - SupplierQuotationItemPeer::NUM_LAZY_LOAD_COLUMNS);
		PortPeer::addSelectColumns($c);

		$c->addJoin(array(SupplierQuotationItemPeer::PORTID,), array(PortPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuotationItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuotationItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$omClass = SupplierQuotationItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuotationItemPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = PortPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = PortPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = PortPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					PortPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (SupplierQuotationItem) to $obj2 (Port)
				$obj2->addSupplierQuotationItem($obj1);

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
		$criteria->setPrimaryTableName(SupplierQuotationItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuotationItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID,), array(SupplierQuotationPeer::ID,), $join_behavior);
		$criteria->addJoin(array(SupplierQuotationItemPeer::CLIENTQUOTATIONITEMID,), array(ClientQuotationItemPeer::ID,), $join_behavior);
		$criteria->addJoin(array(SupplierQuotationItemPeer::PRODUCTID,), array(ProductPeer::ID,), $join_behavior);
		$criteria->addJoin(array(SupplierQuotationItemPeer::INCOTERMID,), array(IncotermPeer::ID,), $join_behavior);
		$criteria->addJoin(array(SupplierQuotationItemPeer::PORTID,), array(PortPeer::ID,), $join_behavior);
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
	 * Selects a collection of SupplierQuotationItem objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuotationItem objects.
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

		SupplierQuotationItemPeer::addSelectColumns($c);
		$startcol2 = (SupplierQuotationItemPeer::NUM_COLUMNS - SupplierQuotationItemPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierQuotationPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (SupplierQuotationPeer::NUM_COLUMNS - SupplierQuotationPeer::NUM_LAZY_LOAD_COLUMNS);

		ClientQuotationItemPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ClientQuotationItemPeer::NUM_COLUMNS - ClientQuotationItemPeer::NUM_LAZY_LOAD_COLUMNS);

		ProductPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS);

		IncotermPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (IncotermPeer::NUM_COLUMNS - IncotermPeer::NUM_LAZY_LOAD_COLUMNS);

		PortPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (PortPeer::NUM_COLUMNS - PortPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID,), array(SupplierQuotationPeer::ID,), $join_behavior);
		$c->addJoin(array(SupplierQuotationItemPeer::CLIENTQUOTATIONITEMID,), array(ClientQuotationItemPeer::ID,), $join_behavior);
		$c->addJoin(array(SupplierQuotationItemPeer::PRODUCTID,), array(ProductPeer::ID,), $join_behavior);
		$c->addJoin(array(SupplierQuotationItemPeer::INCOTERMID,), array(IncotermPeer::ID,), $join_behavior);
		$c->addJoin(array(SupplierQuotationItemPeer::PORTID,), array(PortPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuotationItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuotationItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$omClass = SupplierQuotationItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuotationItemPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined SupplierQuotation rows

			$key2 = SupplierQuotationPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = SupplierQuotationPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = SupplierQuotationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SupplierQuotationPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj2 (SupplierQuotation)
				$obj2->addSupplierQuotationItem($obj1);
			} // if joined row not null

			// Add objects for joined ClientQuotationItem rows

			$key3 = ClientQuotationItemPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = ClientQuotationItemPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = ClientQuotationItemPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ClientQuotationItemPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj3 (ClientQuotationItem)
				$obj3->addSupplierQuotationItem($obj1);
			} // if joined row not null

			// Add objects for joined Product rows

			$key4 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = ProductPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$omClass = ProductPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ProductPeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj4 (Product)
				$obj4->addSupplierQuotationItem($obj1);
			} // if joined row not null

			// Add objects for joined Incoterm rows

			$key5 = IncotermPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = IncotermPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$omClass = IncotermPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					IncotermPeer::addInstanceToPool($obj5, $key5);
				} // if obj5 loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj5 (Incoterm)
				$obj5->addSupplierQuotationItem($obj1);
			} // if joined row not null

			// Add objects for joined Port rows

			$key6 = PortPeer::getPrimaryKeyHashFromRow($row, $startcol6);
			if ($key6 !== null) {
				$obj6 = PortPeer::getInstanceFromPool($key6);
				if (!$obj6) {

					$omClass = PortPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					PortPeer::addInstanceToPool($obj6, $key6);
				} // if obj6 loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj6 (Port)
				$obj6->addSupplierQuotationItem($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related SupplierQuotation table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptSupplierQuotation(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuotationItemPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuotationItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(SupplierQuotationItemPeer::CLIENTQUOTATIONITEMID,), array(ClientQuotationItemPeer::ID,), $join_behavior);
				$criteria->addJoin(array(SupplierQuotationItemPeer::PRODUCTID,), array(ProductPeer::ID,), $join_behavior);
				$criteria->addJoin(array(SupplierQuotationItemPeer::INCOTERMID,), array(IncotermPeer::ID,), $join_behavior);
				$criteria->addJoin(array(SupplierQuotationItemPeer::PORTID,), array(PortPeer::ID,), $join_behavior);
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
	 * Returns the number of rows matching criteria, joining the related ClientQuotationItem table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptClientQuotationItem(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuotationItemPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuotationItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID,), array(SupplierQuotationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(SupplierQuotationItemPeer::PRODUCTID,), array(ProductPeer::ID,), $join_behavior);
				$criteria->addJoin(array(SupplierQuotationItemPeer::INCOTERMID,), array(IncotermPeer::ID,), $join_behavior);
				$criteria->addJoin(array(SupplierQuotationItemPeer::PORTID,), array(PortPeer::ID,), $join_behavior);
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
	 * Returns the number of rows matching criteria, joining the related Product table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptProduct(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuotationItemPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuotationItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID,), array(SupplierQuotationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(SupplierQuotationItemPeer::CLIENTQUOTATIONITEMID,), array(ClientQuotationItemPeer::ID,), $join_behavior);
				$criteria->addJoin(array(SupplierQuotationItemPeer::INCOTERMID,), array(IncotermPeer::ID,), $join_behavior);
				$criteria->addJoin(array(SupplierQuotationItemPeer::PORTID,), array(PortPeer::ID,), $join_behavior);
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
	 * Returns the number of rows matching criteria, joining the related Incoterm table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptIncoterm(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuotationItemPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuotationItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID,), array(SupplierQuotationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(SupplierQuotationItemPeer::CLIENTQUOTATIONITEMID,), array(ClientQuotationItemPeer::ID,), $join_behavior);
				$criteria->addJoin(array(SupplierQuotationItemPeer::PRODUCTID,), array(ProductPeer::ID,), $join_behavior);
				$criteria->addJoin(array(SupplierQuotationItemPeer::PORTID,), array(PortPeer::ID,), $join_behavior);
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
	 * Returns the number of rows matching criteria, joining the related Port table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptPort(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuotationItemPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuotationItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID,), array(SupplierQuotationPeer::ID,), $join_behavior);
				$criteria->addJoin(array(SupplierQuotationItemPeer::CLIENTQUOTATIONITEMID,), array(ClientQuotationItemPeer::ID,), $join_behavior);
				$criteria->addJoin(array(SupplierQuotationItemPeer::PRODUCTID,), array(ProductPeer::ID,), $join_behavior);
				$criteria->addJoin(array(SupplierQuotationItemPeer::INCOTERMID,), array(IncotermPeer::ID,), $join_behavior);
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
	 * Selects a collection of SupplierQuotationItem objects pre-filled with all related objects except SupplierQuotation.
	 *
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuotationItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSupplierQuotation(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierQuotationItemPeer::addSelectColumns($c);
		$startcol2 = (SupplierQuotationItemPeer::NUM_COLUMNS - SupplierQuotationItemPeer::NUM_LAZY_LOAD_COLUMNS);

		ClientQuotationItemPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ClientQuotationItemPeer::NUM_COLUMNS - ClientQuotationItemPeer::NUM_LAZY_LOAD_COLUMNS);

		ProductPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS);

		IncotermPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (IncotermPeer::NUM_COLUMNS - IncotermPeer::NUM_LAZY_LOAD_COLUMNS);

		PortPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (PortPeer::NUM_COLUMNS - PortPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(SupplierQuotationItemPeer::CLIENTQUOTATIONITEMID,), array(ClientQuotationItemPeer::ID,), $join_behavior);
				$c->addJoin(array(SupplierQuotationItemPeer::PRODUCTID,), array(ProductPeer::ID,), $join_behavior);
				$c->addJoin(array(SupplierQuotationItemPeer::INCOTERMID,), array(IncotermPeer::ID,), $join_behavior);
				$c->addJoin(array(SupplierQuotationItemPeer::PORTID,), array(PortPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuotationItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuotationItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$omClass = SupplierQuotationItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuotationItemPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined ClientQuotationItem rows

				$key2 = ClientQuotationItemPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ClientQuotationItemPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = ClientQuotationItemPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ClientQuotationItemPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj2 (ClientQuotationItem)
				$obj2->addSupplierQuotationItem($obj1);

			} // if joined row is not null

				// Add objects for joined Product rows

				$key3 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ProductPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = ProductPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ProductPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj3 (Product)
				$obj3->addSupplierQuotationItem($obj1);

			} // if joined row is not null

				// Add objects for joined Incoterm rows

				$key4 = IncotermPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = IncotermPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = IncotermPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					IncotermPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj4 (Incoterm)
				$obj4->addSupplierQuotationItem($obj1);

			} // if joined row is not null

				// Add objects for joined Port rows

				$key5 = PortPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = PortPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = PortPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					PortPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj5 (Port)
				$obj5->addSupplierQuotationItem($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuotationItem objects pre-filled with all related objects except ClientQuotationItem.
	 *
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuotationItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptClientQuotationItem(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierQuotationItemPeer::addSelectColumns($c);
		$startcol2 = (SupplierQuotationItemPeer::NUM_COLUMNS - SupplierQuotationItemPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierQuotationPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (SupplierQuotationPeer::NUM_COLUMNS - SupplierQuotationPeer::NUM_LAZY_LOAD_COLUMNS);

		ProductPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS);

		IncotermPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (IncotermPeer::NUM_COLUMNS - IncotermPeer::NUM_LAZY_LOAD_COLUMNS);

		PortPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (PortPeer::NUM_COLUMNS - PortPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID,), array(SupplierQuotationPeer::ID,), $join_behavior);
				$c->addJoin(array(SupplierQuotationItemPeer::PRODUCTID,), array(ProductPeer::ID,), $join_behavior);
				$c->addJoin(array(SupplierQuotationItemPeer::INCOTERMID,), array(IncotermPeer::ID,), $join_behavior);
				$c->addJoin(array(SupplierQuotationItemPeer::PORTID,), array(PortPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuotationItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuotationItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$omClass = SupplierQuotationItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuotationItemPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined SupplierQuotation rows

				$key2 = SupplierQuotationPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SupplierQuotationPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = SupplierQuotationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SupplierQuotationPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj2 (SupplierQuotation)
				$obj2->addSupplierQuotationItem($obj1);

			} // if joined row is not null

				// Add objects for joined Product rows

				$key3 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ProductPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = ProductPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ProductPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj3 (Product)
				$obj3->addSupplierQuotationItem($obj1);

			} // if joined row is not null

				// Add objects for joined Incoterm rows

				$key4 = IncotermPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = IncotermPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = IncotermPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					IncotermPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj4 (Incoterm)
				$obj4->addSupplierQuotationItem($obj1);

			} // if joined row is not null

				// Add objects for joined Port rows

				$key5 = PortPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = PortPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = PortPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					PortPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj5 (Port)
				$obj5->addSupplierQuotationItem($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuotationItem objects pre-filled with all related objects except Product.
	 *
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuotationItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptProduct(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierQuotationItemPeer::addSelectColumns($c);
		$startcol2 = (SupplierQuotationItemPeer::NUM_COLUMNS - SupplierQuotationItemPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierQuotationPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (SupplierQuotationPeer::NUM_COLUMNS - SupplierQuotationPeer::NUM_LAZY_LOAD_COLUMNS);

		ClientQuotationItemPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ClientQuotationItemPeer::NUM_COLUMNS - ClientQuotationItemPeer::NUM_LAZY_LOAD_COLUMNS);

		IncotermPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (IncotermPeer::NUM_COLUMNS - IncotermPeer::NUM_LAZY_LOAD_COLUMNS);

		PortPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (PortPeer::NUM_COLUMNS - PortPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID,), array(SupplierQuotationPeer::ID,), $join_behavior);
				$c->addJoin(array(SupplierQuotationItemPeer::CLIENTQUOTATIONITEMID,), array(ClientQuotationItemPeer::ID,), $join_behavior);
				$c->addJoin(array(SupplierQuotationItemPeer::INCOTERMID,), array(IncotermPeer::ID,), $join_behavior);
				$c->addJoin(array(SupplierQuotationItemPeer::PORTID,), array(PortPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuotationItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuotationItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$omClass = SupplierQuotationItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuotationItemPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined SupplierQuotation rows

				$key2 = SupplierQuotationPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SupplierQuotationPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = SupplierQuotationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SupplierQuotationPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj2 (SupplierQuotation)
				$obj2->addSupplierQuotationItem($obj1);

			} // if joined row is not null

				// Add objects for joined ClientQuotationItem rows

				$key3 = ClientQuotationItemPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ClientQuotationItemPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = ClientQuotationItemPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ClientQuotationItemPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj3 (ClientQuotationItem)
				$obj3->addSupplierQuotationItem($obj1);

			} // if joined row is not null

				// Add objects for joined Incoterm rows

				$key4 = IncotermPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = IncotermPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = IncotermPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					IncotermPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj4 (Incoterm)
				$obj4->addSupplierQuotationItem($obj1);

			} // if joined row is not null

				// Add objects for joined Port rows

				$key5 = PortPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = PortPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = PortPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					PortPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj5 (Port)
				$obj5->addSupplierQuotationItem($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuotationItem objects pre-filled with all related objects except Incoterm.
	 *
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuotationItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptIncoterm(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierQuotationItemPeer::addSelectColumns($c);
		$startcol2 = (SupplierQuotationItemPeer::NUM_COLUMNS - SupplierQuotationItemPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierQuotationPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (SupplierQuotationPeer::NUM_COLUMNS - SupplierQuotationPeer::NUM_LAZY_LOAD_COLUMNS);

		ClientQuotationItemPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ClientQuotationItemPeer::NUM_COLUMNS - ClientQuotationItemPeer::NUM_LAZY_LOAD_COLUMNS);

		ProductPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS);

		PortPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (PortPeer::NUM_COLUMNS - PortPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID,), array(SupplierQuotationPeer::ID,), $join_behavior);
				$c->addJoin(array(SupplierQuotationItemPeer::CLIENTQUOTATIONITEMID,), array(ClientQuotationItemPeer::ID,), $join_behavior);
				$c->addJoin(array(SupplierQuotationItemPeer::PRODUCTID,), array(ProductPeer::ID,), $join_behavior);
				$c->addJoin(array(SupplierQuotationItemPeer::PORTID,), array(PortPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuotationItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuotationItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$omClass = SupplierQuotationItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuotationItemPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined SupplierQuotation rows

				$key2 = SupplierQuotationPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SupplierQuotationPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = SupplierQuotationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SupplierQuotationPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj2 (SupplierQuotation)
				$obj2->addSupplierQuotationItem($obj1);

			} // if joined row is not null

				// Add objects for joined ClientQuotationItem rows

				$key3 = ClientQuotationItemPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ClientQuotationItemPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = ClientQuotationItemPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ClientQuotationItemPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj3 (ClientQuotationItem)
				$obj3->addSupplierQuotationItem($obj1);

			} // if joined row is not null

				// Add objects for joined Product rows

				$key4 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ProductPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = ProductPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ProductPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj4 (Product)
				$obj4->addSupplierQuotationItem($obj1);

			} // if joined row is not null

				// Add objects for joined Port rows

				$key5 = PortPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = PortPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = PortPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					PortPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj5 (Port)
				$obj5->addSupplierQuotationItem($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuotationItem objects pre-filled with all related objects except Port.
	 *
	 * @param      Criteria  $c
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuotationItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptPort(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierQuotationItemPeer::addSelectColumns($c);
		$startcol2 = (SupplierQuotationItemPeer::NUM_COLUMNS - SupplierQuotationItemPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierQuotationPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (SupplierQuotationPeer::NUM_COLUMNS - SupplierQuotationPeer::NUM_LAZY_LOAD_COLUMNS);

		ClientQuotationItemPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ClientQuotationItemPeer::NUM_COLUMNS - ClientQuotationItemPeer::NUM_LAZY_LOAD_COLUMNS);

		ProductPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS);

		IncotermPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (IncotermPeer::NUM_COLUMNS - IncotermPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(SupplierQuotationItemPeer::SUPPLIERQUOTATIONID,), array(SupplierQuotationPeer::ID,), $join_behavior);
				$c->addJoin(array(SupplierQuotationItemPeer::CLIENTQUOTATIONITEMID,), array(ClientQuotationItemPeer::ID,), $join_behavior);
				$c->addJoin(array(SupplierQuotationItemPeer::PRODUCTID,), array(ProductPeer::ID,), $join_behavior);
				$c->addJoin(array(SupplierQuotationItemPeer::INCOTERMID,), array(IncotermPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuotationItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuotationItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$omClass = SupplierQuotationItemPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuotationItemPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined SupplierQuotation rows

				$key2 = SupplierQuotationPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SupplierQuotationPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = SupplierQuotationPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SupplierQuotationPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj2 (SupplierQuotation)
				$obj2->addSupplierQuotationItem($obj1);

			} // if joined row is not null

				// Add objects for joined ClientQuotationItem rows

				$key3 = ClientQuotationItemPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ClientQuotationItemPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = ClientQuotationItemPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ClientQuotationItemPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj3 (ClientQuotationItem)
				$obj3->addSupplierQuotationItem($obj1);

			} // if joined row is not null

				// Add objects for joined Product rows

				$key4 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ProductPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = ProductPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ProductPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj4 (Product)
				$obj4->addSupplierQuotationItem($obj1);

			} // if joined row is not null

				// Add objects for joined Incoterm rows

				$key5 = IncotermPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = IncotermPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = IncotermPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					IncotermPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (SupplierQuotationItem) to the collection in $obj5 (Incoterm)
				$obj5->addSupplierQuotationItem($obj1);

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
		return SupplierQuotationItemPeer::CLASS_DEFAULT;
	}

	/**
	 * Method perform an INSERT on the database, given a SupplierQuotationItem or Criteria object.
	 *
	 * @param      mixed $values Criteria or SupplierQuotationItem object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from SupplierQuotationItem object
		}

		if ($criteria->containsKey(SupplierQuotationItemPeer::ID) && $criteria->keyContainsValue(SupplierQuotationItemPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.SupplierQuotationItemPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a SupplierQuotationItem or Criteria object.
	 *
	 * @param      mixed $values Criteria or SupplierQuotationItem object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(SupplierQuotationItemPeer::ID);
			$selectCriteria->add(SupplierQuotationItemPeer::ID, $criteria->remove(SupplierQuotationItemPeer::ID), $comparison);

		} else { // $values is SupplierQuotationItem object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the import_supplierQuotationItem table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(SupplierQuotationItemPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a SupplierQuotationItem or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or SupplierQuotationItem object or primary key or array of primary keys
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
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			SupplierQuotationItemPeer::clearInstancePool();

			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof SupplierQuotationItem) {
			// invalidate the cache for this single object
			SupplierQuotationItemPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else {
			// it must be the primary key



			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(SupplierQuotationItemPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
				// we can invalidate the cache for this single object
				SupplierQuotationItemPeer::removeInstanceFromPool($singleval);
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
	 * Validates all modified columns of given SupplierQuotationItem object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      SupplierQuotationItem $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(SupplierQuotationItem $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(SupplierQuotationItemPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(SupplierQuotationItemPeer::TABLE_NAME);

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

		return BasePeer::doValidate(SupplierQuotationItemPeer::DATABASE_NAME, SupplierQuotationItemPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     SupplierQuotationItem
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = SupplierQuotationItemPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(SupplierQuotationItemPeer::DATABASE_NAME);
		$criteria->add(SupplierQuotationItemPeer::ID, $pk);

		$v = SupplierQuotationItemPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(SupplierQuotationItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(SupplierQuotationItemPeer::DATABASE_NAME);
			$criteria->add(SupplierQuotationItemPeer::ID, $pks, Criteria::IN);
			$objs = SupplierQuotationItemPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseSupplierQuotationItemPeer

// This is the static code needed to register the MapBuilder for this table with the main Propel class.
//
// NOTE: This static code cannot call methods on the SupplierQuotationItemPeer class, because it is not defined yet.
// If you need to use overridden methods, you can add this code to the bottom of the SupplierQuotationItemPeer class:
//
// Propel::getDatabaseMap(SupplierQuotationItemPeer::DATABASE_NAME)->addTableBuilder(SupplierQuotationItemPeer::TABLE_NAME, SupplierQuotationItemPeer::getMapBuilder());
//
// Doing so will effectively overwrite the registration below.

Propel::getDatabaseMap(BaseSupplierQuotationItemPeer::DATABASE_NAME)->addTableBuilder(BaseSupplierQuotationItemPeer::TABLE_NAME, BaseSupplierQuotationItemPeer::getMapBuilder());

