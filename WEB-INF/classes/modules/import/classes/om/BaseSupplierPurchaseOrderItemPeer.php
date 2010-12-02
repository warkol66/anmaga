<?php


/**
 * Base static class for performing query and update operations on the 'import_supplierPurchaseOrderItem' table.
 *
 * Elemento de Orden de Pedido a Proveedor
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseSupplierPurchaseOrderItemPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'application';

	/** the table name for this class */
	const TABLE_NAME = 'import_supplierPurchaseOrderItem';

	/** the related Propel class for this table */
	const OM_CLASS = 'SupplierPurchaseOrderItem';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'import.classes.SupplierPurchaseOrderItem';

	/** the related TableMap class for this table */
	const TM_CLASS = 'SupplierPurchaseOrderItemTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 19;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'import_supplierPurchaseOrderItem.ID';

	/** the column name for the PRODUCTID field */
	const PRODUCTID = 'import_supplierPurchaseOrderItem.PRODUCTID';

	/** the column name for the SUPPLIERPURCHASEORDERID field */
	const SUPPLIERPURCHASEORDERID = 'import_supplierPurchaseOrderItem.SUPPLIERPURCHASEORDERID';

	/** the column name for the QUANTITY field */
	const QUANTITY = 'import_supplierPurchaseOrderItem.QUANTITY';

	/** the column name for the PORTID field */
	const PORTID = 'import_supplierPurchaseOrderItem.PORTID';

	/** the column name for the INCOTERMID field */
	const INCOTERMID = 'import_supplierPurchaseOrderItem.INCOTERMID';

	/** the column name for the PRICE field */
	const PRICE = 'import_supplierPurchaseOrderItem.PRICE';

	/** the column name for the DELIVERY field */
	const DELIVERY = 'import_supplierPurchaseOrderItem.DELIVERY';

	/** the column name for the PACKAGE field */
	const PACKAGE = 'import_supplierPurchaseOrderItem.PACKAGE';

	/** the column name for the UNITLENGTH field */
	const UNITLENGTH = 'import_supplierPurchaseOrderItem.UNITLENGTH';

	/** the column name for the UNITWIDTH field */
	const UNITWIDTH = 'import_supplierPurchaseOrderItem.UNITWIDTH';

	/** the column name for the UNITHEIGHT field */
	const UNITHEIGHT = 'import_supplierPurchaseOrderItem.UNITHEIGHT';

	/** the column name for the UNITGROSSWEIGTH field */
	const UNITGROSSWEIGTH = 'import_supplierPurchaseOrderItem.UNITGROSSWEIGTH';

	/** the column name for the UNITSPERCARTON field */
	const UNITSPERCARTON = 'import_supplierPurchaseOrderItem.UNITSPERCARTON';

	/** the column name for the CARTONS field */
	const CARTONS = 'import_supplierPurchaseOrderItem.CARTONS';

	/** the column name for the CARTONLENGTH field */
	const CARTONLENGTH = 'import_supplierPurchaseOrderItem.CARTONLENGTH';

	/** the column name for the CARTONWIDTH field */
	const CARTONWIDTH = 'import_supplierPurchaseOrderItem.CARTONWIDTH';

	/** the column name for the CARTONHEIGHT field */
	const CARTONHEIGHT = 'import_supplierPurchaseOrderItem.CARTONHEIGHT';

	/** the column name for the CARTONGROSSWEIGTH field */
	const CARTONGROSSWEIGTH = 'import_supplierPurchaseOrderItem.CARTONGROSSWEIGTH';

	/**
	 * An identiy map to hold any loaded instances of SupplierPurchaseOrderItem objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array SupplierPurchaseOrderItem[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Productid', 'Supplierpurchaseorderid', 'Quantity', 'Portid', 'Incotermid', 'Price', 'Delivery', 'Package', 'Unitlength', 'Unitwidth', 'Unitheight', 'Unitgrossweigth', 'Unitspercarton', 'Cartons', 'Cartonlength', 'Cartonwidth', 'Cartonheight', 'Cartongrossweigth', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'productid', 'supplierpurchaseorderid', 'quantity', 'portid', 'incotermid', 'price', 'delivery', 'package', 'unitlength', 'unitwidth', 'unitheight', 'unitgrossweigth', 'unitspercarton', 'cartons', 'cartonlength', 'cartonwidth', 'cartonheight', 'cartongrossweigth', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::PRODUCTID, self::SUPPLIERPURCHASEORDERID, self::QUANTITY, self::PORTID, self::INCOTERMID, self::PRICE, self::DELIVERY, self::PACKAGE, self::UNITLENGTH, self::UNITWIDTH, self::UNITHEIGHT, self::UNITGROSSWEIGTH, self::UNITSPERCARTON, self::CARTONS, self::CARTONLENGTH, self::CARTONWIDTH, self::CARTONHEIGHT, self::CARTONGROSSWEIGTH, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'PRODUCTID', 'SUPPLIERPURCHASEORDERID', 'QUANTITY', 'PORTID', 'INCOTERMID', 'PRICE', 'DELIVERY', 'PACKAGE', 'UNITLENGTH', 'UNITWIDTH', 'UNITHEIGHT', 'UNITGROSSWEIGTH', 'UNITSPERCARTON', 'CARTONS', 'CARTONLENGTH', 'CARTONWIDTH', 'CARTONHEIGHT', 'CARTONGROSSWEIGTH', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'productId', 'supplierPurchaseOrderId', 'quantity', 'portId', 'incotermId', 'price', 'delivery', 'package', 'unitLength', 'unitWidth', 'unitHeight', 'unitGrossWeigth', 'unitsPerCarton', 'cartons', 'cartonLength', 'cartonWidth', 'cartonHeight', 'cartonGrossWeigth', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Productid' => 1, 'Supplierpurchaseorderid' => 2, 'Quantity' => 3, 'Portid' => 4, 'Incotermid' => 5, 'Price' => 6, 'Delivery' => 7, 'Package' => 8, 'Unitlength' => 9, 'Unitwidth' => 10, 'Unitheight' => 11, 'Unitgrossweigth' => 12, 'Unitspercarton' => 13, 'Cartons' => 14, 'Cartonlength' => 15, 'Cartonwidth' => 16, 'Cartonheight' => 17, 'Cartongrossweigth' => 18, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'productid' => 1, 'supplierpurchaseorderid' => 2, 'quantity' => 3, 'portid' => 4, 'incotermid' => 5, 'price' => 6, 'delivery' => 7, 'package' => 8, 'unitlength' => 9, 'unitwidth' => 10, 'unitheight' => 11, 'unitgrossweigth' => 12, 'unitspercarton' => 13, 'cartons' => 14, 'cartonlength' => 15, 'cartonwidth' => 16, 'cartonheight' => 17, 'cartongrossweigth' => 18, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::PRODUCTID => 1, self::SUPPLIERPURCHASEORDERID => 2, self::QUANTITY => 3, self::PORTID => 4, self::INCOTERMID => 5, self::PRICE => 6, self::DELIVERY => 7, self::PACKAGE => 8, self::UNITLENGTH => 9, self::UNITWIDTH => 10, self::UNITHEIGHT => 11, self::UNITGROSSWEIGTH => 12, self::UNITSPERCARTON => 13, self::CARTONS => 14, self::CARTONLENGTH => 15, self::CARTONWIDTH => 16, self::CARTONHEIGHT => 17, self::CARTONGROSSWEIGTH => 18, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'PRODUCTID' => 1, 'SUPPLIERPURCHASEORDERID' => 2, 'QUANTITY' => 3, 'PORTID' => 4, 'INCOTERMID' => 5, 'PRICE' => 6, 'DELIVERY' => 7, 'PACKAGE' => 8, 'UNITLENGTH' => 9, 'UNITWIDTH' => 10, 'UNITHEIGHT' => 11, 'UNITGROSSWEIGTH' => 12, 'UNITSPERCARTON' => 13, 'CARTONS' => 14, 'CARTONLENGTH' => 15, 'CARTONWIDTH' => 16, 'CARTONHEIGHT' => 17, 'CARTONGROSSWEIGTH' => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'productId' => 1, 'supplierPurchaseOrderId' => 2, 'quantity' => 3, 'portId' => 4, 'incotermId' => 5, 'price' => 6, 'delivery' => 7, 'package' => 8, 'unitLength' => 9, 'unitWidth' => 10, 'unitHeight' => 11, 'unitGrossWeigth' => 12, 'unitsPerCarton' => 13, 'cartons' => 14, 'cartonLength' => 15, 'cartonWidth' => 16, 'cartonHeight' => 17, 'cartonGrossWeigth' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
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
	 * @param      string $column The column name for current table. (i.e. SupplierPurchaseOrderItemPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(SupplierPurchaseOrderItemPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(SupplierPurchaseOrderItemPeer::ID);
			$criteria->addSelectColumn(SupplierPurchaseOrderItemPeer::PRODUCTID);
			$criteria->addSelectColumn(SupplierPurchaseOrderItemPeer::SUPPLIERPURCHASEORDERID);
			$criteria->addSelectColumn(SupplierPurchaseOrderItemPeer::QUANTITY);
			$criteria->addSelectColumn(SupplierPurchaseOrderItemPeer::PORTID);
			$criteria->addSelectColumn(SupplierPurchaseOrderItemPeer::INCOTERMID);
			$criteria->addSelectColumn(SupplierPurchaseOrderItemPeer::PRICE);
			$criteria->addSelectColumn(SupplierPurchaseOrderItemPeer::DELIVERY);
			$criteria->addSelectColumn(SupplierPurchaseOrderItemPeer::PACKAGE);
			$criteria->addSelectColumn(SupplierPurchaseOrderItemPeer::UNITLENGTH);
			$criteria->addSelectColumn(SupplierPurchaseOrderItemPeer::UNITWIDTH);
			$criteria->addSelectColumn(SupplierPurchaseOrderItemPeer::UNITHEIGHT);
			$criteria->addSelectColumn(SupplierPurchaseOrderItemPeer::UNITGROSSWEIGTH);
			$criteria->addSelectColumn(SupplierPurchaseOrderItemPeer::UNITSPERCARTON);
			$criteria->addSelectColumn(SupplierPurchaseOrderItemPeer::CARTONS);
			$criteria->addSelectColumn(SupplierPurchaseOrderItemPeer::CARTONLENGTH);
			$criteria->addSelectColumn(SupplierPurchaseOrderItemPeer::CARTONWIDTH);
			$criteria->addSelectColumn(SupplierPurchaseOrderItemPeer::CARTONHEIGHT);
			$criteria->addSelectColumn(SupplierPurchaseOrderItemPeer::CARTONGROSSWEIGTH);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.PRODUCTID');
			$criteria->addSelectColumn($alias . '.SUPPLIERPURCHASEORDERID');
			$criteria->addSelectColumn($alias . '.QUANTITY');
			$criteria->addSelectColumn($alias . '.PORTID');
			$criteria->addSelectColumn($alias . '.INCOTERMID');
			$criteria->addSelectColumn($alias . '.PRICE');
			$criteria->addSelectColumn($alias . '.DELIVERY');
			$criteria->addSelectColumn($alias . '.PACKAGE');
			$criteria->addSelectColumn($alias . '.UNITLENGTH');
			$criteria->addSelectColumn($alias . '.UNITWIDTH');
			$criteria->addSelectColumn($alias . '.UNITHEIGHT');
			$criteria->addSelectColumn($alias . '.UNITGROSSWEIGTH');
			$criteria->addSelectColumn($alias . '.UNITSPERCARTON');
			$criteria->addSelectColumn($alias . '.CARTONS');
			$criteria->addSelectColumn($alias . '.CARTONLENGTH');
			$criteria->addSelectColumn($alias . '.CARTONWIDTH');
			$criteria->addSelectColumn($alias . '.CARTONHEIGHT');
			$criteria->addSelectColumn($alias . '.CARTONGROSSWEIGTH');
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
		$criteria->setPrimaryTableName(SupplierPurchaseOrderItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     SupplierPurchaseOrderItem
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = SupplierPurchaseOrderItemPeer::doSelect($critcopy, $con);
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
		return SupplierPurchaseOrderItemPeer::populateObjects(SupplierPurchaseOrderItemPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(SupplierPurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
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
	 * @param      SupplierPurchaseOrderItem $value A SupplierPurchaseOrderItem object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(SupplierPurchaseOrderItem $obj, $key = null)
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
	 * @param      mixed $value A SupplierPurchaseOrderItem object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof SupplierPurchaseOrderItem) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or SupplierPurchaseOrderItem object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     SupplierPurchaseOrderItem Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to import_supplierPurchaseOrderItem
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
		$cls = SupplierPurchaseOrderItemPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = SupplierPurchaseOrderItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = SupplierPurchaseOrderItemPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				SupplierPurchaseOrderItemPeer::addInstanceToPool($obj, $key);
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
	 * @return     array (SupplierPurchaseOrderItem object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = SupplierPurchaseOrderItemPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = SupplierPurchaseOrderItemPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + SupplierPurchaseOrderItemPeer::NUM_COLUMNS;
		} else {
			$cls = SupplierPurchaseOrderItemPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			SupplierPurchaseOrderItemPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}

	/**
	 * Returns the number of rows matching criteria, joining the related Product table
	 *
	 * @param      Criteria $criteria
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
		$criteria->setPrimaryTableName(SupplierPurchaseOrderItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related SupplierPurchaseOrder table
	 *
	 * @param      Criteria $criteria
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
		$criteria->setPrimaryTableName(SupplierPurchaseOrderItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::SUPPLIERPURCHASEORDERID, SupplierPurchaseOrderPeer::ID, $join_behavior);

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
	 * @param      Criteria $criteria
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
		$criteria->setPrimaryTableName(SupplierPurchaseOrderItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

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
	 * @param      Criteria $criteria
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
		$criteria->setPrimaryTableName(SupplierPurchaseOrderItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::PORTID, PortPeer::ID, $join_behavior);

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
	 * Selects a collection of SupplierPurchaseOrderItem objects pre-filled with their Product objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrderItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinProduct(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
		$startcol = (SupplierPurchaseOrderItemPeer::NUM_COLUMNS - SupplierPurchaseOrderItemPeer::NUM_LAZY_LOAD_COLUMNS);
		ProductPeer::addSelectColumns($criteria);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = SupplierPurchaseOrderItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderItemPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ProductPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ProductPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ProductPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrderItem) to $obj2 (Product)
				$obj2->addSupplierPurchaseOrderItem($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierPurchaseOrderItem objects pre-filled with their SupplierPurchaseOrder objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrderItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSupplierPurchaseOrder(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
		$startcol = (SupplierPurchaseOrderItemPeer::NUM_COLUMNS - SupplierPurchaseOrderItemPeer::NUM_LAZY_LOAD_COLUMNS);
		SupplierPurchaseOrderPeer::addSelectColumns($criteria);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::SUPPLIERPURCHASEORDERID, SupplierPurchaseOrderPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = SupplierPurchaseOrderItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderItemPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = SupplierPurchaseOrderPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = SupplierPurchaseOrderPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					SupplierPurchaseOrderPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrderItem) to $obj2 (SupplierPurchaseOrder)
				$obj2->addSupplierPurchaseOrderItem($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierPurchaseOrderItem objects pre-filled with their Incoterm objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrderItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinIncoterm(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
		$startcol = (SupplierPurchaseOrderItemPeer::NUM_COLUMNS - SupplierPurchaseOrderItemPeer::NUM_LAZY_LOAD_COLUMNS);
		IncotermPeer::addSelectColumns($criteria);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = SupplierPurchaseOrderItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderItemPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = IncotermPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = IncotermPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = IncotermPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					IncotermPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrderItem) to $obj2 (Incoterm)
				$obj2->addSupplierPurchaseOrderItem($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierPurchaseOrderItem objects pre-filled with their Port objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrderItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinPort(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
		$startcol = (SupplierPurchaseOrderItemPeer::NUM_COLUMNS - SupplierPurchaseOrderItemPeer::NUM_LAZY_LOAD_COLUMNS);
		PortPeer::addSelectColumns($criteria);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::PORTID, PortPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = SupplierPurchaseOrderItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderItemPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = PortPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = PortPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = PortPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					PortPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrderItem) to $obj2 (Port)
				$obj2->addSupplierPurchaseOrderItem($obj1);

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
		$criteria->setPrimaryTableName(SupplierPurchaseOrderItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::SUPPLIERPURCHASEORDERID, SupplierPurchaseOrderPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::PORTID, PortPeer::ID, $join_behavior);

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
	 * Selects a collection of SupplierPurchaseOrderItem objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrderItem objects.
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

		SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
		$startcol2 = (SupplierPurchaseOrderItemPeer::NUM_COLUMNS - SupplierPurchaseOrderItemPeer::NUM_LAZY_LOAD_COLUMNS);

		ProductPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS);

		IncotermPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (IncotermPeer::NUM_COLUMNS - IncotermPeer::NUM_LAZY_LOAD_COLUMNS);

		PortPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (PortPeer::NUM_COLUMNS - PortPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::SUPPLIERPURCHASEORDERID, SupplierPurchaseOrderPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::PORTID, PortPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SupplierPurchaseOrderItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderItemPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined Product rows

			$key2 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = ProductPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ProductPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ProductPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (SupplierPurchaseOrderItem) to the collection in $obj2 (Product)
				$obj2->addSupplierPurchaseOrderItem($obj1);
			} // if joined row not null

			// Add objects for joined SupplierPurchaseOrder rows

			$key3 = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = SupplierPurchaseOrderPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = SupplierPurchaseOrderPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					SupplierPurchaseOrderPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (SupplierPurchaseOrderItem) to the collection in $obj3 (SupplierPurchaseOrder)
				$obj3->addSupplierPurchaseOrderItem($obj1);
			} // if joined row not null

			// Add objects for joined Incoterm rows

			$key4 = IncotermPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = IncotermPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = IncotermPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					IncotermPeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (SupplierPurchaseOrderItem) to the collection in $obj4 (Incoterm)
				$obj4->addSupplierPurchaseOrderItem($obj1);
			} // if joined row not null

			// Add objects for joined Port rows

			$key5 = PortPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = PortPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$cls = PortPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					PortPeer::addInstanceToPool($obj5, $key5);
				} // if obj5 loaded

				// Add the $obj1 (SupplierPurchaseOrderItem) to the collection in $obj5 (Port)
				$obj5->addSupplierPurchaseOrderItem($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Product table
	 *
	 * @param      Criteria $criteria
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
		$criteria->setPrimaryTableName(SupplierPurchaseOrderItemPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SupplierPurchaseOrderItemPeer::SUPPLIERPURCHASEORDERID, SupplierPurchaseOrderPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::PORTID, PortPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related SupplierPurchaseOrder table
	 *
	 * @param      Criteria $criteria
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
		$criteria->setPrimaryTableName(SupplierPurchaseOrderItemPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SupplierPurchaseOrderItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::PORTID, PortPeer::ID, $join_behavior);

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
	 * @param      Criteria $criteria
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
		$criteria->setPrimaryTableName(SupplierPurchaseOrderItemPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SupplierPurchaseOrderItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::SUPPLIERPURCHASEORDERID, SupplierPurchaseOrderPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::PORTID, PortPeer::ID, $join_behavior);

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
	 * @param      Criteria $criteria
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
		$criteria->setPrimaryTableName(SupplierPurchaseOrderItemPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SupplierPurchaseOrderItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::SUPPLIERPURCHASEORDERID, SupplierPurchaseOrderPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

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
	 * Selects a collection of SupplierPurchaseOrderItem objects pre-filled with all related objects except Product.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrderItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptProduct(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
		$startcol2 = (SupplierPurchaseOrderItemPeer::NUM_COLUMNS - SupplierPurchaseOrderItemPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS);

		IncotermPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (IncotermPeer::NUM_COLUMNS - IncotermPeer::NUM_LAZY_LOAD_COLUMNS);

		PortPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (PortPeer::NUM_COLUMNS - PortPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::SUPPLIERPURCHASEORDERID, SupplierPurchaseOrderPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::PORTID, PortPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SupplierPurchaseOrderItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderItemPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined SupplierPurchaseOrder rows

				$key2 = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SupplierPurchaseOrderPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = SupplierPurchaseOrderPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SupplierPurchaseOrderPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrderItem) to the collection in $obj2 (SupplierPurchaseOrder)
				$obj2->addSupplierPurchaseOrderItem($obj1);

			} // if joined row is not null

				// Add objects for joined Incoterm rows

				$key3 = IncotermPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = IncotermPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = IncotermPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					IncotermPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierPurchaseOrderItem) to the collection in $obj3 (Incoterm)
				$obj3->addSupplierPurchaseOrderItem($obj1);

			} // if joined row is not null

				// Add objects for joined Port rows

				$key4 = PortPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = PortPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = PortPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					PortPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (SupplierPurchaseOrderItem) to the collection in $obj4 (Port)
				$obj4->addSupplierPurchaseOrderItem($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierPurchaseOrderItem objects pre-filled with all related objects except SupplierPurchaseOrder.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrderItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSupplierPurchaseOrder(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
		$startcol2 = (SupplierPurchaseOrderItemPeer::NUM_COLUMNS - SupplierPurchaseOrderItemPeer::NUM_LAZY_LOAD_COLUMNS);

		ProductPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS);

		IncotermPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (IncotermPeer::NUM_COLUMNS - IncotermPeer::NUM_LAZY_LOAD_COLUMNS);

		PortPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (PortPeer::NUM_COLUMNS - PortPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::PORTID, PortPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SupplierPurchaseOrderItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderItemPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Product rows

				$key2 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ProductPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ProductPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ProductPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrderItem) to the collection in $obj2 (Product)
				$obj2->addSupplierPurchaseOrderItem($obj1);

			} // if joined row is not null

				// Add objects for joined Incoterm rows

				$key3 = IncotermPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = IncotermPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = IncotermPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					IncotermPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierPurchaseOrderItem) to the collection in $obj3 (Incoterm)
				$obj3->addSupplierPurchaseOrderItem($obj1);

			} // if joined row is not null

				// Add objects for joined Port rows

				$key4 = PortPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = PortPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = PortPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					PortPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (SupplierPurchaseOrderItem) to the collection in $obj4 (Port)
				$obj4->addSupplierPurchaseOrderItem($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierPurchaseOrderItem objects pre-filled with all related objects except Incoterm.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrderItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptIncoterm(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
		$startcol2 = (SupplierPurchaseOrderItemPeer::NUM_COLUMNS - SupplierPurchaseOrderItemPeer::NUM_LAZY_LOAD_COLUMNS);

		ProductPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS);

		PortPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (PortPeer::NUM_COLUMNS - PortPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::SUPPLIERPURCHASEORDERID, SupplierPurchaseOrderPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::PORTID, PortPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SupplierPurchaseOrderItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderItemPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Product rows

				$key2 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ProductPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ProductPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ProductPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrderItem) to the collection in $obj2 (Product)
				$obj2->addSupplierPurchaseOrderItem($obj1);

			} // if joined row is not null

				// Add objects for joined SupplierPurchaseOrder rows

				$key3 = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = SupplierPurchaseOrderPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = SupplierPurchaseOrderPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					SupplierPurchaseOrderPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierPurchaseOrderItem) to the collection in $obj3 (SupplierPurchaseOrder)
				$obj3->addSupplierPurchaseOrderItem($obj1);

			} // if joined row is not null

				// Add objects for joined Port rows

				$key4 = PortPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = PortPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = PortPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					PortPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (SupplierPurchaseOrderItem) to the collection in $obj4 (Port)
				$obj4->addSupplierPurchaseOrderItem($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierPurchaseOrderItem objects pre-filled with all related objects except Port.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierPurchaseOrderItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptPort(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderItemPeer::addSelectColumns($criteria);
		$startcol2 = (SupplierPurchaseOrderItemPeer::NUM_COLUMNS - SupplierPurchaseOrderItemPeer::NUM_LAZY_LOAD_COLUMNS);

		ProductPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS);

		IncotermPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (IncotermPeer::NUM_COLUMNS - IncotermPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::SUPPLIERPURCHASEORDERID, SupplierPurchaseOrderPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierPurchaseOrderItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierPurchaseOrderItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierPurchaseOrderItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SupplierPurchaseOrderItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierPurchaseOrderItemPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Product rows

				$key2 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ProductPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ProductPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ProductPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SupplierPurchaseOrderItem) to the collection in $obj2 (Product)
				$obj2->addSupplierPurchaseOrderItem($obj1);

			} // if joined row is not null

				// Add objects for joined SupplierPurchaseOrder rows

				$key3 = SupplierPurchaseOrderPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = SupplierPurchaseOrderPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = SupplierPurchaseOrderPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					SupplierPurchaseOrderPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierPurchaseOrderItem) to the collection in $obj3 (SupplierPurchaseOrder)
				$obj3->addSupplierPurchaseOrderItem($obj1);

			} // if joined row is not null

				// Add objects for joined Incoterm rows

				$key4 = IncotermPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = IncotermPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = IncotermPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					IncotermPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (SupplierPurchaseOrderItem) to the collection in $obj4 (Incoterm)
				$obj4->addSupplierPurchaseOrderItem($obj1);

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
	  $dbMap = Propel::getDatabaseMap(BaseSupplierPurchaseOrderItemPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseSupplierPurchaseOrderItemPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new SupplierPurchaseOrderItemTableMap());
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
		return $withPrefix ? SupplierPurchaseOrderItemPeer::CLASS_DEFAULT : SupplierPurchaseOrderItemPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a SupplierPurchaseOrderItem or Criteria object.
	 *
	 * @param      mixed $values Criteria or SupplierPurchaseOrderItem object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from SupplierPurchaseOrderItem object
		}

		if ($criteria->containsKey(SupplierPurchaseOrderItemPeer::ID) && $criteria->keyContainsValue(SupplierPurchaseOrderItemPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.SupplierPurchaseOrderItemPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a SupplierPurchaseOrderItem or Criteria object.
	 *
	 * @param      mixed $values Criteria or SupplierPurchaseOrderItem object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(SupplierPurchaseOrderItemPeer::ID);
			$value = $criteria->remove(SupplierPurchaseOrderItemPeer::ID);
			if ($value) {
				$selectCriteria->add(SupplierPurchaseOrderItemPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(SupplierPurchaseOrderItemPeer::TABLE_NAME);
			}

		} else { // $values is SupplierPurchaseOrderItem object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the import_supplierPurchaseOrderItem table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(SupplierPurchaseOrderItemPeer::TABLE_NAME, $con, SupplierPurchaseOrderItemPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			SupplierPurchaseOrderItemPeer::clearInstancePool();
			SupplierPurchaseOrderItemPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a SupplierPurchaseOrderItem or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or SupplierPurchaseOrderItem object or primary key or array of primary keys
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
			$con = Propel::getConnection(SupplierPurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			SupplierPurchaseOrderItemPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof SupplierPurchaseOrderItem) { // it's a model object
			// invalidate the cache for this single object
			SupplierPurchaseOrderItemPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(SupplierPurchaseOrderItemPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				SupplierPurchaseOrderItemPeer::removeInstanceFromPool($singleval);
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
			SupplierPurchaseOrderItemPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given SupplierPurchaseOrderItem object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      SupplierPurchaseOrderItem $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(SupplierPurchaseOrderItem $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(SupplierPurchaseOrderItemPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(SupplierPurchaseOrderItemPeer::TABLE_NAME);

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

		return BasePeer::doValidate(SupplierPurchaseOrderItemPeer::DATABASE_NAME, SupplierPurchaseOrderItemPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     SupplierPurchaseOrderItem
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = SupplierPurchaseOrderItemPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(SupplierPurchaseOrderItemPeer::DATABASE_NAME);
		$criteria->add(SupplierPurchaseOrderItemPeer::ID, $pk);

		$v = SupplierPurchaseOrderItemPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(SupplierPurchaseOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(SupplierPurchaseOrderItemPeer::DATABASE_NAME);
			$criteria->add(SupplierPurchaseOrderItemPeer::ID, $pks, Criteria::IN);
			$objs = SupplierPurchaseOrderItemPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseSupplierPurchaseOrderItemPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseSupplierPurchaseOrderItemPeer::buildTableMap();

