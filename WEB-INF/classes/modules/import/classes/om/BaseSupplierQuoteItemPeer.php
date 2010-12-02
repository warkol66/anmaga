<?php


/**
 * Base static class for performing query and update operations on the 'import_supplierQuoteItem' table.
 *
 * Elemento de Cotizacion de Proveedor
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseSupplierQuoteItemPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'application';

	/** the table name for this class */
	const TABLE_NAME = 'import_supplierQuoteItem';

	/** the related Propel class for this table */
	const OM_CLASS = 'SupplierQuoteItem';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'import.classes.SupplierQuoteItem';

	/** the related TableMap class for this table */
	const TM_CLASS = 'SupplierQuoteItemTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 23;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'import_supplierQuoteItem.ID';

	/** the column name for the SUPPLIERQUOTEID field */
	const SUPPLIERQUOTEID = 'import_supplierQuoteItem.SUPPLIERQUOTEID';

	/** the column name for the PRODUCTID field */
	const PRODUCTID = 'import_supplierQuoteItem.PRODUCTID';

	/** the column name for the REPLACEDPRODUCTID field */
	const REPLACEDPRODUCTID = 'import_supplierQuoteItem.REPLACEDPRODUCTID';

	/** the column name for the CLIENTQUOTEITEMID field */
	const CLIENTQUOTEITEMID = 'import_supplierQuoteItem.CLIENTQUOTEITEMID';

	/** the column name for the STATUS field */
	const STATUS = 'import_supplierQuoteItem.STATUS';

	/** the column name for the QUANTITY field */
	const QUANTITY = 'import_supplierQuoteItem.QUANTITY';

	/** the column name for the PORTID field */
	const PORTID = 'import_supplierQuoteItem.PORTID';

	/** the column name for the INCOTERMID field */
	const INCOTERMID = 'import_supplierQuoteItem.INCOTERMID';

	/** the column name for the PRICE field */
	const PRICE = 'import_supplierQuoteItem.PRICE';

	/** the column name for the SUPPLIERCOMMENTS field */
	const SUPPLIERCOMMENTS = 'import_supplierQuoteItem.SUPPLIERCOMMENTS';

	/** the column name for the DELIVERY field */
	const DELIVERY = 'import_supplierQuoteItem.DELIVERY';

	/** the column name for the PACKAGE field */
	const PACKAGE = 'import_supplierQuoteItem.PACKAGE';

	/** the column name for the UNITLENGTH field */
	const UNITLENGTH = 'import_supplierQuoteItem.UNITLENGTH';

	/** the column name for the UNITWIDTH field */
	const UNITWIDTH = 'import_supplierQuoteItem.UNITWIDTH';

	/** the column name for the UNITHEIGHT field */
	const UNITHEIGHT = 'import_supplierQuoteItem.UNITHEIGHT';

	/** the column name for the UNITGROSSWEIGTH field */
	const UNITGROSSWEIGTH = 'import_supplierQuoteItem.UNITGROSSWEIGTH';

	/** the column name for the UNITSPERCARTON field */
	const UNITSPERCARTON = 'import_supplierQuoteItem.UNITSPERCARTON';

	/** the column name for the CARTONS field */
	const CARTONS = 'import_supplierQuoteItem.CARTONS';

	/** the column name for the CARTONLENGTH field */
	const CARTONLENGTH = 'import_supplierQuoteItem.CARTONLENGTH';

	/** the column name for the CARTONWIDTH field */
	const CARTONWIDTH = 'import_supplierQuoteItem.CARTONWIDTH';

	/** the column name for the CARTONHEIGHT field */
	const CARTONHEIGHT = 'import_supplierQuoteItem.CARTONHEIGHT';

	/** the column name for the CARTONGROSSWEIGTH field */
	const CARTONGROSSWEIGTH = 'import_supplierQuoteItem.CARTONGROSSWEIGTH';

	/**
	 * An identiy map to hold any loaded instances of SupplierQuoteItem objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array SupplierQuoteItem[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Supplierquoteid', 'Productid', 'Replacedproductid', 'Clientquoteitemid', 'Status', 'Quantity', 'Portid', 'Incotermid', 'Price', 'Suppliercomments', 'Delivery', 'Package', 'Unitlength', 'Unitwidth', 'Unitheight', 'Unitgrossweigth', 'Unitspercarton', 'Cartons', 'Cartonlength', 'Cartonwidth', 'Cartonheight', 'Cartongrossweigth', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'supplierquoteid', 'productid', 'replacedproductid', 'clientquoteitemid', 'status', 'quantity', 'portid', 'incotermid', 'price', 'suppliercomments', 'delivery', 'package', 'unitlength', 'unitwidth', 'unitheight', 'unitgrossweigth', 'unitspercarton', 'cartons', 'cartonlength', 'cartonwidth', 'cartonheight', 'cartongrossweigth', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::SUPPLIERQUOTEID, self::PRODUCTID, self::REPLACEDPRODUCTID, self::CLIENTQUOTEITEMID, self::STATUS, self::QUANTITY, self::PORTID, self::INCOTERMID, self::PRICE, self::SUPPLIERCOMMENTS, self::DELIVERY, self::PACKAGE, self::UNITLENGTH, self::UNITWIDTH, self::UNITHEIGHT, self::UNITGROSSWEIGTH, self::UNITSPERCARTON, self::CARTONS, self::CARTONLENGTH, self::CARTONWIDTH, self::CARTONHEIGHT, self::CARTONGROSSWEIGTH, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'SUPPLIERQUOTEID', 'PRODUCTID', 'REPLACEDPRODUCTID', 'CLIENTQUOTEITEMID', 'STATUS', 'QUANTITY', 'PORTID', 'INCOTERMID', 'PRICE', 'SUPPLIERCOMMENTS', 'DELIVERY', 'PACKAGE', 'UNITLENGTH', 'UNITWIDTH', 'UNITHEIGHT', 'UNITGROSSWEIGTH', 'UNITSPERCARTON', 'CARTONS', 'CARTONLENGTH', 'CARTONWIDTH', 'CARTONHEIGHT', 'CARTONGROSSWEIGTH', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'supplierQuoteId', 'productId', 'replacedProductId', 'clientQuoteItemId', 'status', 'quantity', 'portId', 'incotermId', 'price', 'supplierComments', 'delivery', 'package', 'unitLength', 'unitWidth', 'unitHeight', 'unitGrossWeigth', 'unitsPerCarton', 'cartons', 'cartonLength', 'cartonWidth', 'cartonHeight', 'cartonGrossWeigth', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Supplierquoteid' => 1, 'Productid' => 2, 'Replacedproductid' => 3, 'Clientquoteitemid' => 4, 'Status' => 5, 'Quantity' => 6, 'Portid' => 7, 'Incotermid' => 8, 'Price' => 9, 'Suppliercomments' => 10, 'Delivery' => 11, 'Package' => 12, 'Unitlength' => 13, 'Unitwidth' => 14, 'Unitheight' => 15, 'Unitgrossweigth' => 16, 'Unitspercarton' => 17, 'Cartons' => 18, 'Cartonlength' => 19, 'Cartonwidth' => 20, 'Cartonheight' => 21, 'Cartongrossweigth' => 22, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'supplierquoteid' => 1, 'productid' => 2, 'replacedproductid' => 3, 'clientquoteitemid' => 4, 'status' => 5, 'quantity' => 6, 'portid' => 7, 'incotermid' => 8, 'price' => 9, 'suppliercomments' => 10, 'delivery' => 11, 'package' => 12, 'unitlength' => 13, 'unitwidth' => 14, 'unitheight' => 15, 'unitgrossweigth' => 16, 'unitspercarton' => 17, 'cartons' => 18, 'cartonlength' => 19, 'cartonwidth' => 20, 'cartonheight' => 21, 'cartongrossweigth' => 22, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::SUPPLIERQUOTEID => 1, self::PRODUCTID => 2, self::REPLACEDPRODUCTID => 3, self::CLIENTQUOTEITEMID => 4, self::STATUS => 5, self::QUANTITY => 6, self::PORTID => 7, self::INCOTERMID => 8, self::PRICE => 9, self::SUPPLIERCOMMENTS => 10, self::DELIVERY => 11, self::PACKAGE => 12, self::UNITLENGTH => 13, self::UNITWIDTH => 14, self::UNITHEIGHT => 15, self::UNITGROSSWEIGTH => 16, self::UNITSPERCARTON => 17, self::CARTONS => 18, self::CARTONLENGTH => 19, self::CARTONWIDTH => 20, self::CARTONHEIGHT => 21, self::CARTONGROSSWEIGTH => 22, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'SUPPLIERQUOTEID' => 1, 'PRODUCTID' => 2, 'REPLACEDPRODUCTID' => 3, 'CLIENTQUOTEITEMID' => 4, 'STATUS' => 5, 'QUANTITY' => 6, 'PORTID' => 7, 'INCOTERMID' => 8, 'PRICE' => 9, 'SUPPLIERCOMMENTS' => 10, 'DELIVERY' => 11, 'PACKAGE' => 12, 'UNITLENGTH' => 13, 'UNITWIDTH' => 14, 'UNITHEIGHT' => 15, 'UNITGROSSWEIGTH' => 16, 'UNITSPERCARTON' => 17, 'CARTONS' => 18, 'CARTONLENGTH' => 19, 'CARTONWIDTH' => 20, 'CARTONHEIGHT' => 21, 'CARTONGROSSWEIGTH' => 22, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'supplierQuoteId' => 1, 'productId' => 2, 'replacedProductId' => 3, 'clientQuoteItemId' => 4, 'status' => 5, 'quantity' => 6, 'portId' => 7, 'incotermId' => 8, 'price' => 9, 'supplierComments' => 10, 'delivery' => 11, 'package' => 12, 'unitLength' => 13, 'unitWidth' => 14, 'unitHeight' => 15, 'unitGrossWeigth' => 16, 'unitsPerCarton' => 17, 'cartons' => 18, 'cartonLength' => 19, 'cartonWidth' => 20, 'cartonHeight' => 21, 'cartonGrossWeigth' => 22, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
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
	 * @param      string $column The column name for current table. (i.e. SupplierQuoteItemPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(SupplierQuoteItemPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(SupplierQuoteItemPeer::ID);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::SUPPLIERQUOTEID);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::PRODUCTID);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::REPLACEDPRODUCTID);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::CLIENTQUOTEITEMID);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::STATUS);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::QUANTITY);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::PORTID);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::INCOTERMID);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::PRICE);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::SUPPLIERCOMMENTS);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::DELIVERY);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::PACKAGE);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::UNITLENGTH);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::UNITWIDTH);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::UNITHEIGHT);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::UNITGROSSWEIGTH);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::UNITSPERCARTON);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::CARTONS);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::CARTONLENGTH);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::CARTONWIDTH);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::CARTONHEIGHT);
			$criteria->addSelectColumn(SupplierQuoteItemPeer::CARTONGROSSWEIGTH);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.SUPPLIERQUOTEID');
			$criteria->addSelectColumn($alias . '.PRODUCTID');
			$criteria->addSelectColumn($alias . '.REPLACEDPRODUCTID');
			$criteria->addSelectColumn($alias . '.CLIENTQUOTEITEMID');
			$criteria->addSelectColumn($alias . '.STATUS');
			$criteria->addSelectColumn($alias . '.QUANTITY');
			$criteria->addSelectColumn($alias . '.PORTID');
			$criteria->addSelectColumn($alias . '.INCOTERMID');
			$criteria->addSelectColumn($alias . '.PRICE');
			$criteria->addSelectColumn($alias . '.SUPPLIERCOMMENTS');
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
		$criteria->setPrimaryTableName(SupplierQuoteItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuoteItemPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     SupplierQuoteItem
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = SupplierQuoteItemPeer::doSelect($critcopy, $con);
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
		return SupplierQuoteItemPeer::populateObjects(SupplierQuoteItemPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			SupplierQuoteItemPeer::addSelectColumns($criteria);
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
	 * @param      SupplierQuoteItem $value A SupplierQuoteItem object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(SupplierQuoteItem $obj, $key = null)
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
	 * @param      mixed $value A SupplierQuoteItem object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof SupplierQuoteItem) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or SupplierQuoteItem object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     SupplierQuoteItem Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to import_supplierQuoteItem
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
		$cls = SupplierQuoteItemPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = SupplierQuoteItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = SupplierQuoteItemPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				SupplierQuoteItemPeer::addInstanceToPool($obj, $key);
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
	 * @return     array (SupplierQuoteItem object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = SupplierQuoteItemPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = SupplierQuoteItemPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + SupplierQuoteItemPeer::NUM_COLUMNS;
		} else {
			$cls = SupplierQuoteItemPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			SupplierQuoteItemPeer::addInstanceToPool($obj, $key);
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
		$criteria->setPrimaryTableName(SupplierQuoteItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuoteItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SupplierQuoteItemPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related ClientQuoteItem table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinClientQuoteItem(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuoteItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuoteItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SupplierQuoteItemPeer::CLIENTQUOTEITEMID, ClientQuoteItemPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related ProductRelatedByProductid table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinProductRelatedByProductid(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuoteItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuoteItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SupplierQuoteItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related ProductRelatedByReplacedproductid table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinProductRelatedByReplacedproductid(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuoteItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuoteItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SupplierQuoteItemPeer::REPLACEDPRODUCTID, ProductPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(SupplierQuoteItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuoteItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SupplierQuoteItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(SupplierQuoteItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuoteItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SupplierQuoteItemPeer::PORTID, PortPeer::ID, $join_behavior);

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
	 * Selects a collection of SupplierQuoteItem objects pre-filled with their SupplierQuote objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuoteItem objects.
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

		SupplierQuoteItemPeer::addSelectColumns($criteria);
		$startcol = (SupplierQuoteItemPeer::NUM_COLUMNS - SupplierQuoteItemPeer::NUM_LAZY_LOAD_COLUMNS);
		SupplierQuotePeer::addSelectColumns($criteria);

		$criteria->addJoin(SupplierQuoteItemPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuoteItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuoteItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = SupplierQuoteItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuoteItemPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (SupplierQuoteItem) to $obj2 (SupplierQuote)
				$obj2->addSupplierQuoteItem($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuoteItem objects pre-filled with their ClientQuoteItem objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuoteItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinClientQuoteItem(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierQuoteItemPeer::addSelectColumns($criteria);
		$startcol = (SupplierQuoteItemPeer::NUM_COLUMNS - SupplierQuoteItemPeer::NUM_LAZY_LOAD_COLUMNS);
		ClientQuoteItemPeer::addSelectColumns($criteria);

		$criteria->addJoin(SupplierQuoteItemPeer::CLIENTQUOTEITEMID, ClientQuoteItemPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuoteItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuoteItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = SupplierQuoteItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuoteItemPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ClientQuoteItemPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ClientQuoteItemPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ClientQuoteItemPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ClientQuoteItemPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (SupplierQuoteItem) to $obj2 (ClientQuoteItem)
				$obj2->addSupplierQuoteItem($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuoteItem objects pre-filled with their Product objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuoteItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinProductRelatedByProductid(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierQuoteItemPeer::addSelectColumns($criteria);
		$startcol = (SupplierQuoteItemPeer::NUM_COLUMNS - SupplierQuoteItemPeer::NUM_LAZY_LOAD_COLUMNS);
		ProductPeer::addSelectColumns($criteria);

		$criteria->addJoin(SupplierQuoteItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuoteItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuoteItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = SupplierQuoteItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuoteItemPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (SupplierQuoteItem) to $obj2 (Product)
				$obj2->addSupplierQuoteItemRelatedByProductid($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuoteItem objects pre-filled with their Product objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuoteItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinProductRelatedByReplacedproductid(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierQuoteItemPeer::addSelectColumns($criteria);
		$startcol = (SupplierQuoteItemPeer::NUM_COLUMNS - SupplierQuoteItemPeer::NUM_LAZY_LOAD_COLUMNS);
		ProductPeer::addSelectColumns($criteria);

		$criteria->addJoin(SupplierQuoteItemPeer::REPLACEDPRODUCTID, ProductPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuoteItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuoteItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = SupplierQuoteItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuoteItemPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (SupplierQuoteItem) to $obj2 (Product)
				$obj2->addSupplierQuoteItemRelatedByReplacedproductid($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuoteItem objects pre-filled with their Incoterm objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuoteItem objects.
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

		SupplierQuoteItemPeer::addSelectColumns($criteria);
		$startcol = (SupplierQuoteItemPeer::NUM_COLUMNS - SupplierQuoteItemPeer::NUM_LAZY_LOAD_COLUMNS);
		IncotermPeer::addSelectColumns($criteria);

		$criteria->addJoin(SupplierQuoteItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuoteItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuoteItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = SupplierQuoteItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuoteItemPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (SupplierQuoteItem) to $obj2 (Incoterm)
				$obj2->addSupplierQuoteItem($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuoteItem objects pre-filled with their Port objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuoteItem objects.
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

		SupplierQuoteItemPeer::addSelectColumns($criteria);
		$startcol = (SupplierQuoteItemPeer::NUM_COLUMNS - SupplierQuoteItemPeer::NUM_LAZY_LOAD_COLUMNS);
		PortPeer::addSelectColumns($criteria);

		$criteria->addJoin(SupplierQuoteItemPeer::PORTID, PortPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuoteItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuoteItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = SupplierQuoteItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuoteItemPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (SupplierQuoteItem) to $obj2 (Port)
				$obj2->addSupplierQuoteItem($obj1);

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
		$criteria->setPrimaryTableName(SupplierQuoteItemPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuoteItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SupplierQuoteItemPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::CLIENTQUOTEITEMID, ClientQuoteItemPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::REPLACEDPRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PORTID, PortPeer::ID, $join_behavior);

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
	 * Selects a collection of SupplierQuoteItem objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuoteItem objects.
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

		SupplierQuoteItemPeer::addSelectColumns($criteria);
		$startcol2 = (SupplierQuoteItemPeer::NUM_COLUMNS - SupplierQuoteItemPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierQuotePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SupplierQuotePeer::NUM_COLUMNS - SupplierQuotePeer::NUM_LAZY_LOAD_COLUMNS);

		ClientQuoteItemPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ClientQuoteItemPeer::NUM_COLUMNS - ClientQuoteItemPeer::NUM_LAZY_LOAD_COLUMNS);

		ProductPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS);

		ProductPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS);

		IncotermPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (IncotermPeer::NUM_COLUMNS - IncotermPeer::NUM_LAZY_LOAD_COLUMNS);

		PortPeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + (PortPeer::NUM_COLUMNS - PortPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SupplierQuoteItemPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::CLIENTQUOTEITEMID, ClientQuoteItemPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::REPLACEDPRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PORTID, PortPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuoteItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuoteItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SupplierQuoteItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuoteItemPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj2 (SupplierQuote)
				$obj2->addSupplierQuoteItem($obj1);
			} // if joined row not null

			// Add objects for joined ClientQuoteItem rows

			$key3 = ClientQuoteItemPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = ClientQuoteItemPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = ClientQuoteItemPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ClientQuoteItemPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj3 (ClientQuoteItem)
				$obj3->addSupplierQuoteItem($obj1);
			} // if joined row not null

			// Add objects for joined Product rows

			$key4 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = ProductPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = ProductPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ProductPeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj4 (Product)
				$obj4->addSupplierQuoteItemRelatedByProductid($obj1);
			} // if joined row not null

			// Add objects for joined Product rows

			$key5 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = ProductPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$cls = ProductPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					ProductPeer::addInstanceToPool($obj5, $key5);
				} // if obj5 loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj5 (Product)
				$obj5->addSupplierQuoteItemRelatedByReplacedproductid($obj1);
			} // if joined row not null

			// Add objects for joined Incoterm rows

			$key6 = IncotermPeer::getPrimaryKeyHashFromRow($row, $startcol6);
			if ($key6 !== null) {
				$obj6 = IncotermPeer::getInstanceFromPool($key6);
				if (!$obj6) {

					$cls = IncotermPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					IncotermPeer::addInstanceToPool($obj6, $key6);
				} // if obj6 loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj6 (Incoterm)
				$obj6->addSupplierQuoteItem($obj1);
			} // if joined row not null

			// Add objects for joined Port rows

			$key7 = PortPeer::getPrimaryKeyHashFromRow($row, $startcol7);
			if ($key7 !== null) {
				$obj7 = PortPeer::getInstanceFromPool($key7);
				if (!$obj7) {

					$cls = PortPeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					PortPeer::addInstanceToPool($obj7, $key7);
				} // if obj7 loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj7 (Port)
				$obj7->addSupplierQuoteItem($obj1);
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
		$criteria->setPrimaryTableName(SupplierQuoteItemPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuoteItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SupplierQuoteItemPeer::CLIENTQUOTEITEMID, ClientQuoteItemPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::REPLACEDPRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PORTID, PortPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related ClientQuoteItem table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptClientQuoteItem(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuoteItemPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuoteItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SupplierQuoteItemPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::REPLACEDPRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PORTID, PortPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related ProductRelatedByProductid table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptProductRelatedByProductid(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuoteItemPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuoteItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SupplierQuoteItemPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::CLIENTQUOTEITEMID, ClientQuoteItemPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PORTID, PortPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related ProductRelatedByReplacedproductid table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptProductRelatedByReplacedproductid(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SupplierQuoteItemPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuoteItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SupplierQuoteItemPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::CLIENTQUOTEITEMID, ClientQuoteItemPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PORTID, PortPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(SupplierQuoteItemPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuoteItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SupplierQuoteItemPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::CLIENTQUOTEITEMID, ClientQuoteItemPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::REPLACEDPRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PORTID, PortPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(SupplierQuoteItemPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SupplierQuoteItemPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SupplierQuoteItemPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::CLIENTQUOTEITEMID, ClientQuoteItemPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::REPLACEDPRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

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
	 * Selects a collection of SupplierQuoteItem objects pre-filled with all related objects except SupplierQuote.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuoteItem objects.
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

		SupplierQuoteItemPeer::addSelectColumns($criteria);
		$startcol2 = (SupplierQuoteItemPeer::NUM_COLUMNS - SupplierQuoteItemPeer::NUM_LAZY_LOAD_COLUMNS);

		ClientQuoteItemPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ClientQuoteItemPeer::NUM_COLUMNS - ClientQuoteItemPeer::NUM_LAZY_LOAD_COLUMNS);

		ProductPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS);

		ProductPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS);

		IncotermPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (IncotermPeer::NUM_COLUMNS - IncotermPeer::NUM_LAZY_LOAD_COLUMNS);

		PortPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (PortPeer::NUM_COLUMNS - PortPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SupplierQuoteItemPeer::CLIENTQUOTEITEMID, ClientQuoteItemPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::REPLACEDPRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PORTID, PortPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuoteItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuoteItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SupplierQuoteItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuoteItemPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined ClientQuoteItem rows

				$key2 = ClientQuoteItemPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ClientQuoteItemPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ClientQuoteItemPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ClientQuoteItemPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj2 (ClientQuoteItem)
				$obj2->addSupplierQuoteItem($obj1);

			} // if joined row is not null

				// Add objects for joined Product rows

				$key3 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ProductPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ProductPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ProductPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj3 (Product)
				$obj3->addSupplierQuoteItemRelatedByProductid($obj1);

			} // if joined row is not null

				// Add objects for joined Product rows

				$key4 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ProductPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ProductPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ProductPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj4 (Product)
				$obj4->addSupplierQuoteItemRelatedByReplacedproductid($obj1);

			} // if joined row is not null

				// Add objects for joined Incoterm rows

				$key5 = IncotermPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = IncotermPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = IncotermPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					IncotermPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj5 (Incoterm)
				$obj5->addSupplierQuoteItem($obj1);

			} // if joined row is not null

				// Add objects for joined Port rows

				$key6 = PortPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = PortPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = PortPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					PortPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj6 (Port)
				$obj6->addSupplierQuoteItem($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuoteItem objects pre-filled with all related objects except ClientQuoteItem.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuoteItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptClientQuoteItem(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierQuoteItemPeer::addSelectColumns($criteria);
		$startcol2 = (SupplierQuoteItemPeer::NUM_COLUMNS - SupplierQuoteItemPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierQuotePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SupplierQuotePeer::NUM_COLUMNS - SupplierQuotePeer::NUM_LAZY_LOAD_COLUMNS);

		ProductPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS);

		ProductPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS);

		IncotermPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (IncotermPeer::NUM_COLUMNS - IncotermPeer::NUM_LAZY_LOAD_COLUMNS);

		PortPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (PortPeer::NUM_COLUMNS - PortPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SupplierQuoteItemPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::REPLACEDPRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PORTID, PortPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuoteItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuoteItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SupplierQuoteItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuoteItemPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj2 (SupplierQuote)
				$obj2->addSupplierQuoteItem($obj1);

			} // if joined row is not null

				// Add objects for joined Product rows

				$key3 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ProductPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ProductPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ProductPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj3 (Product)
				$obj3->addSupplierQuoteItemRelatedByProductid($obj1);

			} // if joined row is not null

				// Add objects for joined Product rows

				$key4 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ProductPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ProductPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ProductPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj4 (Product)
				$obj4->addSupplierQuoteItemRelatedByReplacedproductid($obj1);

			} // if joined row is not null

				// Add objects for joined Incoterm rows

				$key5 = IncotermPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = IncotermPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = IncotermPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					IncotermPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj5 (Incoterm)
				$obj5->addSupplierQuoteItem($obj1);

			} // if joined row is not null

				// Add objects for joined Port rows

				$key6 = PortPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = PortPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = PortPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					PortPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj6 (Port)
				$obj6->addSupplierQuoteItem($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuoteItem objects pre-filled with all related objects except ProductRelatedByProductid.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuoteItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptProductRelatedByProductid(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierQuoteItemPeer::addSelectColumns($criteria);
		$startcol2 = (SupplierQuoteItemPeer::NUM_COLUMNS - SupplierQuoteItemPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierQuotePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SupplierQuotePeer::NUM_COLUMNS - SupplierQuotePeer::NUM_LAZY_LOAD_COLUMNS);

		ClientQuoteItemPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ClientQuoteItemPeer::NUM_COLUMNS - ClientQuoteItemPeer::NUM_LAZY_LOAD_COLUMNS);

		IncotermPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (IncotermPeer::NUM_COLUMNS - IncotermPeer::NUM_LAZY_LOAD_COLUMNS);

		PortPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (PortPeer::NUM_COLUMNS - PortPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SupplierQuoteItemPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::CLIENTQUOTEITEMID, ClientQuoteItemPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PORTID, PortPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuoteItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuoteItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SupplierQuoteItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuoteItemPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj2 (SupplierQuote)
				$obj2->addSupplierQuoteItem($obj1);

			} // if joined row is not null

				// Add objects for joined ClientQuoteItem rows

				$key3 = ClientQuoteItemPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ClientQuoteItemPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ClientQuoteItemPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ClientQuoteItemPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj3 (ClientQuoteItem)
				$obj3->addSupplierQuoteItem($obj1);

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

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj4 (Incoterm)
				$obj4->addSupplierQuoteItem($obj1);

			} // if joined row is not null

				// Add objects for joined Port rows

				$key5 = PortPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = PortPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = PortPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					PortPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj5 (Port)
				$obj5->addSupplierQuoteItem($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuoteItem objects pre-filled with all related objects except ProductRelatedByReplacedproductid.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuoteItem objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptProductRelatedByReplacedproductid(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SupplierQuoteItemPeer::addSelectColumns($criteria);
		$startcol2 = (SupplierQuoteItemPeer::NUM_COLUMNS - SupplierQuoteItemPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierQuotePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SupplierQuotePeer::NUM_COLUMNS - SupplierQuotePeer::NUM_LAZY_LOAD_COLUMNS);

		ClientQuoteItemPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ClientQuoteItemPeer::NUM_COLUMNS - ClientQuoteItemPeer::NUM_LAZY_LOAD_COLUMNS);

		IncotermPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (IncotermPeer::NUM_COLUMNS - IncotermPeer::NUM_LAZY_LOAD_COLUMNS);

		PortPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (PortPeer::NUM_COLUMNS - PortPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SupplierQuoteItemPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::CLIENTQUOTEITEMID, ClientQuoteItemPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PORTID, PortPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuoteItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuoteItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SupplierQuoteItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuoteItemPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj2 (SupplierQuote)
				$obj2->addSupplierQuoteItem($obj1);

			} // if joined row is not null

				// Add objects for joined ClientQuoteItem rows

				$key3 = ClientQuoteItemPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ClientQuoteItemPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ClientQuoteItemPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ClientQuoteItemPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj3 (ClientQuoteItem)
				$obj3->addSupplierQuoteItem($obj1);

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

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj4 (Incoterm)
				$obj4->addSupplierQuoteItem($obj1);

			} // if joined row is not null

				// Add objects for joined Port rows

				$key5 = PortPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = PortPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = PortPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					PortPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj5 (Port)
				$obj5->addSupplierQuoteItem($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuoteItem objects pre-filled with all related objects except Incoterm.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuoteItem objects.
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

		SupplierQuoteItemPeer::addSelectColumns($criteria);
		$startcol2 = (SupplierQuoteItemPeer::NUM_COLUMNS - SupplierQuoteItemPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierQuotePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SupplierQuotePeer::NUM_COLUMNS - SupplierQuotePeer::NUM_LAZY_LOAD_COLUMNS);

		ClientQuoteItemPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ClientQuoteItemPeer::NUM_COLUMNS - ClientQuoteItemPeer::NUM_LAZY_LOAD_COLUMNS);

		ProductPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS);

		ProductPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS);

		PortPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (PortPeer::NUM_COLUMNS - PortPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SupplierQuoteItemPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::CLIENTQUOTEITEMID, ClientQuoteItemPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::REPLACEDPRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PORTID, PortPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuoteItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuoteItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SupplierQuoteItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuoteItemPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj2 (SupplierQuote)
				$obj2->addSupplierQuoteItem($obj1);

			} // if joined row is not null

				// Add objects for joined ClientQuoteItem rows

				$key3 = ClientQuoteItemPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ClientQuoteItemPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ClientQuoteItemPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ClientQuoteItemPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj3 (ClientQuoteItem)
				$obj3->addSupplierQuoteItem($obj1);

			} // if joined row is not null

				// Add objects for joined Product rows

				$key4 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ProductPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ProductPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ProductPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj4 (Product)
				$obj4->addSupplierQuoteItemRelatedByProductid($obj1);

			} // if joined row is not null

				// Add objects for joined Product rows

				$key5 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = ProductPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = ProductPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					ProductPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj5 (Product)
				$obj5->addSupplierQuoteItemRelatedByReplacedproductid($obj1);

			} // if joined row is not null

				// Add objects for joined Port rows

				$key6 = PortPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = PortPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = PortPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					PortPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj6 (Port)
				$obj6->addSupplierQuoteItem($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of SupplierQuoteItem objects pre-filled with all related objects except Port.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of SupplierQuoteItem objects.
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

		SupplierQuoteItemPeer::addSelectColumns($criteria);
		$startcol2 = (SupplierQuoteItemPeer::NUM_COLUMNS - SupplierQuoteItemPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierQuotePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SupplierQuotePeer::NUM_COLUMNS - SupplierQuotePeer::NUM_LAZY_LOAD_COLUMNS);

		ClientQuoteItemPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ClientQuoteItemPeer::NUM_COLUMNS - ClientQuoteItemPeer::NUM_LAZY_LOAD_COLUMNS);

		ProductPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS);

		ProductPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (ProductPeer::NUM_COLUMNS - ProductPeer::NUM_LAZY_LOAD_COLUMNS);

		IncotermPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (IncotermPeer::NUM_COLUMNS - IncotermPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SupplierQuoteItemPeer::SUPPLIERQUOTEID, SupplierQuotePeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::CLIENTQUOTEITEMID, ClientQuoteItemPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::PRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::REPLACEDPRODUCTID, ProductPeer::ID, $join_behavior);

		$criteria->addJoin(SupplierQuoteItemPeer::INCOTERMID, IncotermPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SupplierQuoteItemPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SupplierQuoteItemPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SupplierQuoteItemPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SupplierQuoteItemPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj2 (SupplierQuote)
				$obj2->addSupplierQuoteItem($obj1);

			} // if joined row is not null

				// Add objects for joined ClientQuoteItem rows

				$key3 = ClientQuoteItemPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ClientQuoteItemPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ClientQuoteItemPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ClientQuoteItemPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj3 (ClientQuoteItem)
				$obj3->addSupplierQuoteItem($obj1);

			} // if joined row is not null

				// Add objects for joined Product rows

				$key4 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ProductPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ProductPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ProductPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj4 (Product)
				$obj4->addSupplierQuoteItemRelatedByProductid($obj1);

			} // if joined row is not null

				// Add objects for joined Product rows

				$key5 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = ProductPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = ProductPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					ProductPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj5 (Product)
				$obj5->addSupplierQuoteItemRelatedByReplacedproductid($obj1);

			} // if joined row is not null

				// Add objects for joined Incoterm rows

				$key6 = IncotermPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = IncotermPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = IncotermPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					IncotermPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (SupplierQuoteItem) to the collection in $obj6 (Incoterm)
				$obj6->addSupplierQuoteItem($obj1);

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
	  $dbMap = Propel::getDatabaseMap(BaseSupplierQuoteItemPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseSupplierQuoteItemPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new SupplierQuoteItemTableMap());
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
		return $withPrefix ? SupplierQuoteItemPeer::CLASS_DEFAULT : SupplierQuoteItemPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a SupplierQuoteItem or Criteria object.
	 *
	 * @param      mixed $values Criteria or SupplierQuoteItem object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from SupplierQuoteItem object
		}

		if ($criteria->containsKey(SupplierQuoteItemPeer::ID) && $criteria->keyContainsValue(SupplierQuoteItemPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.SupplierQuoteItemPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a SupplierQuoteItem or Criteria object.
	 *
	 * @param      mixed $values Criteria or SupplierQuoteItem object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(SupplierQuoteItemPeer::ID);
			$value = $criteria->remove(SupplierQuoteItemPeer::ID);
			if ($value) {
				$selectCriteria->add(SupplierQuoteItemPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(SupplierQuoteItemPeer::TABLE_NAME);
			}

		} else { // $values is SupplierQuoteItem object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the import_supplierQuoteItem table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(SupplierQuoteItemPeer::TABLE_NAME, $con, SupplierQuoteItemPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			SupplierQuoteItemPeer::clearInstancePool();
			SupplierQuoteItemPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a SupplierQuoteItem or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or SupplierQuoteItem object or primary key or array of primary keys
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
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			SupplierQuoteItemPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof SupplierQuoteItem) { // it's a model object
			// invalidate the cache for this single object
			SupplierQuoteItemPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(SupplierQuoteItemPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				SupplierQuoteItemPeer::removeInstanceFromPool($singleval);
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
			SupplierQuoteItemPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given SupplierQuoteItem object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      SupplierQuoteItem $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(SupplierQuoteItem $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(SupplierQuoteItemPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(SupplierQuoteItemPeer::TABLE_NAME);

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

		return BasePeer::doValidate(SupplierQuoteItemPeer::DATABASE_NAME, SupplierQuoteItemPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     SupplierQuoteItem
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = SupplierQuoteItemPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(SupplierQuoteItemPeer::DATABASE_NAME);
		$criteria->add(SupplierQuoteItemPeer::ID, $pk);

		$v = SupplierQuoteItemPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(SupplierQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(SupplierQuoteItemPeer::DATABASE_NAME);
			$criteria->add(SupplierQuoteItemPeer::ID, $pks, Criteria::IN);
			$objs = SupplierQuoteItemPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseSupplierQuoteItemPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseSupplierQuoteItemPeer::buildTableMap();

