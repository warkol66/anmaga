<?php


/**
 * Base static class for performing query and update operations on the 'import_shipment' table.
 *
 * Datos de envio
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseShipmentPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'application';

	/** the table name for this class */
	const TABLE_NAME = 'import_shipment';

	/** the related Propel class for this table */
	const OM_CLASS = 'Shipment';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'import.classes.Shipment';

	/** the related TableMap class for this table */
	const TM_CLASS = 'ShipmentTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 17;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'import_shipment.ID';

	/** the column name for the CREATEDAT field */
	const CREATEDAT = 'import_shipment.CREATEDAT';

	/** the column name for the SUPPLIERPURCHASEORDERID field */
	const SUPPLIERPURCHASEORDERID = 'import_shipment.SUPPLIERPURCHASEORDERID';

	/** the column name for the CONTAINERSREALCOUNT field */
	const CONTAINERSREALCOUNT = 'import_shipment.CONTAINERSREALCOUNT';

	/** the column name for the CONTAINERSNUMBERS field */
	const CONTAINERSNUMBERS = 'import_shipment.CONTAINERSNUMBERS';

	/** the column name for the PICKUPDATE field */
	const PICKUPDATE = 'import_shipment.PICKUPDATE';

	/** the column name for the SHIPMENTDATE field */
	const SHIPMENTDATE = 'import_shipment.SHIPMENTDATE';

	/** the column name for the BLNUMBER field */
	const BLNUMBER = 'import_shipment.BLNUMBER';

	/** the column name for the VESSELNAME field */
	const VESSELNAME = 'import_shipment.VESSELNAME';

	/** the column name for the ESTIMATEDDEPARTUREDATE field */
	const ESTIMATEDDEPARTUREDATE = 'import_shipment.ESTIMATEDDEPARTUREDATE';

	/** the column name for the DEPARTUREDATE field */
	const DEPARTUREDATE = 'import_shipment.DEPARTUREDATE';

	/** the column name for the ARRIVALPORTID field */
	const ARRIVALPORTID = 'import_shipment.ARRIVALPORTID';

	/** the column name for the ARRIVALTOPANAMADATE field */
	const ARRIVALTOPANAMADATE = 'import_shipment.ARRIVALTOPANAMADATE';

	/** the column name for the TRANSSHIPMENTDATE field */
	const TRANSSHIPMENTDATE = 'import_shipment.TRANSSHIPMENTDATE';

	/** the column name for the TELEXRELEASE field */
	const TELEXRELEASE = 'import_shipment.TELEXRELEASE';

	/** the column name for the ESTIMATEDARRIVALDATE field */
	const ESTIMATEDARRIVALDATE = 'import_shipment.ESTIMATEDARRIVALDATE';

	/** the column name for the ARRIVALDATE field */
	const ARRIVALDATE = 'import_shipment.ARRIVALDATE';

	/**
	 * An identiy map to hold any loaded instances of Shipment objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Shipment[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Createdat', 'Supplierpurchaseorderid', 'Containersrealcount', 'Containersnumbers', 'Pickupdate', 'Shipmentdate', 'Blnumber', 'Vesselname', 'Estimateddeparturedate', 'Departuredate', 'Arrivalportid', 'Arrivaltopanamadate', 'Transshipmentdate', 'Telexrelease', 'Estimatedarrivaldate', 'Arrivaldate', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'createdat', 'supplierpurchaseorderid', 'containersrealcount', 'containersnumbers', 'pickupdate', 'shipmentdate', 'blnumber', 'vesselname', 'estimateddeparturedate', 'departuredate', 'arrivalportid', 'arrivaltopanamadate', 'transshipmentdate', 'telexrelease', 'estimatedarrivaldate', 'arrivaldate', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::CREATEDAT, self::SUPPLIERPURCHASEORDERID, self::CONTAINERSREALCOUNT, self::CONTAINERSNUMBERS, self::PICKUPDATE, self::SHIPMENTDATE, self::BLNUMBER, self::VESSELNAME, self::ESTIMATEDDEPARTUREDATE, self::DEPARTUREDATE, self::ARRIVALPORTID, self::ARRIVALTOPANAMADATE, self::TRANSSHIPMENTDATE, self::TELEXRELEASE, self::ESTIMATEDARRIVALDATE, self::ARRIVALDATE, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CREATEDAT', 'SUPPLIERPURCHASEORDERID', 'CONTAINERSREALCOUNT', 'CONTAINERSNUMBERS', 'PICKUPDATE', 'SHIPMENTDATE', 'BLNUMBER', 'VESSELNAME', 'ESTIMATEDDEPARTUREDATE', 'DEPARTUREDATE', 'ARRIVALPORTID', 'ARRIVALTOPANAMADATE', 'TRANSSHIPMENTDATE', 'TELEXRELEASE', 'ESTIMATEDARRIVALDATE', 'ARRIVALDATE', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'createdAt', 'supplierPurchaseOrderId', 'containersRealCount', 'containersNumbers', 'pickupDate', 'shipmentDate', 'blNumber', 'vesselName', 'estimatedDepartureDate', 'departureDate', 'arrivalPortId', 'arrivalToPanamaDate', 'transshipmentDate', 'telexRelease', 'estimatedArrivalDate', 'arrivalDate', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Createdat' => 1, 'Supplierpurchaseorderid' => 2, 'Containersrealcount' => 3, 'Containersnumbers' => 4, 'Pickupdate' => 5, 'Shipmentdate' => 6, 'Blnumber' => 7, 'Vesselname' => 8, 'Estimateddeparturedate' => 9, 'Departuredate' => 10, 'Arrivalportid' => 11, 'Arrivaltopanamadate' => 12, 'Transshipmentdate' => 13, 'Telexrelease' => 14, 'Estimatedarrivaldate' => 15, 'Arrivaldate' => 16, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'createdat' => 1, 'supplierpurchaseorderid' => 2, 'containersrealcount' => 3, 'containersnumbers' => 4, 'pickupdate' => 5, 'shipmentdate' => 6, 'blnumber' => 7, 'vesselname' => 8, 'estimateddeparturedate' => 9, 'departuredate' => 10, 'arrivalportid' => 11, 'arrivaltopanamadate' => 12, 'transshipmentdate' => 13, 'telexrelease' => 14, 'estimatedarrivaldate' => 15, 'arrivaldate' => 16, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::CREATEDAT => 1, self::SUPPLIERPURCHASEORDERID => 2, self::CONTAINERSREALCOUNT => 3, self::CONTAINERSNUMBERS => 4, self::PICKUPDATE => 5, self::SHIPMENTDATE => 6, self::BLNUMBER => 7, self::VESSELNAME => 8, self::ESTIMATEDDEPARTUREDATE => 9, self::DEPARTUREDATE => 10, self::ARRIVALPORTID => 11, self::ARRIVALTOPANAMADATE => 12, self::TRANSSHIPMENTDATE => 13, self::TELEXRELEASE => 14, self::ESTIMATEDARRIVALDATE => 15, self::ARRIVALDATE => 16, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CREATEDAT' => 1, 'SUPPLIERPURCHASEORDERID' => 2, 'CONTAINERSREALCOUNT' => 3, 'CONTAINERSNUMBERS' => 4, 'PICKUPDATE' => 5, 'SHIPMENTDATE' => 6, 'BLNUMBER' => 7, 'VESSELNAME' => 8, 'ESTIMATEDDEPARTUREDATE' => 9, 'DEPARTUREDATE' => 10, 'ARRIVALPORTID' => 11, 'ARRIVALTOPANAMADATE' => 12, 'TRANSSHIPMENTDATE' => 13, 'TELEXRELEASE' => 14, 'ESTIMATEDARRIVALDATE' => 15, 'ARRIVALDATE' => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'createdAt' => 1, 'supplierPurchaseOrderId' => 2, 'containersRealCount' => 3, 'containersNumbers' => 4, 'pickupDate' => 5, 'shipmentDate' => 6, 'blNumber' => 7, 'vesselName' => 8, 'estimatedDepartureDate' => 9, 'departureDate' => 10, 'arrivalPortId' => 11, 'arrivalToPanamaDate' => 12, 'transshipmentDate' => 13, 'telexRelease' => 14, 'estimatedArrivalDate' => 15, 'arrivalDate' => 16, ),
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
	 * @param      string $column The column name for current table. (i.e. ShipmentPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(ShipmentPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(ShipmentPeer::ID);
			$criteria->addSelectColumn(ShipmentPeer::CREATEDAT);
			$criteria->addSelectColumn(ShipmentPeer::SUPPLIERPURCHASEORDERID);
			$criteria->addSelectColumn(ShipmentPeer::CONTAINERSREALCOUNT);
			$criteria->addSelectColumn(ShipmentPeer::CONTAINERSNUMBERS);
			$criteria->addSelectColumn(ShipmentPeer::PICKUPDATE);
			$criteria->addSelectColumn(ShipmentPeer::SHIPMENTDATE);
			$criteria->addSelectColumn(ShipmentPeer::BLNUMBER);
			$criteria->addSelectColumn(ShipmentPeer::VESSELNAME);
			$criteria->addSelectColumn(ShipmentPeer::ESTIMATEDDEPARTUREDATE);
			$criteria->addSelectColumn(ShipmentPeer::DEPARTUREDATE);
			$criteria->addSelectColumn(ShipmentPeer::ARRIVALPORTID);
			$criteria->addSelectColumn(ShipmentPeer::ARRIVALTOPANAMADATE);
			$criteria->addSelectColumn(ShipmentPeer::TRANSSHIPMENTDATE);
			$criteria->addSelectColumn(ShipmentPeer::TELEXRELEASE);
			$criteria->addSelectColumn(ShipmentPeer::ESTIMATEDARRIVALDATE);
			$criteria->addSelectColumn(ShipmentPeer::ARRIVALDATE);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.CREATEDAT');
			$criteria->addSelectColumn($alias . '.SUPPLIERPURCHASEORDERID');
			$criteria->addSelectColumn($alias . '.CONTAINERSREALCOUNT');
			$criteria->addSelectColumn($alias . '.CONTAINERSNUMBERS');
			$criteria->addSelectColumn($alias . '.PICKUPDATE');
			$criteria->addSelectColumn($alias . '.SHIPMENTDATE');
			$criteria->addSelectColumn($alias . '.BLNUMBER');
			$criteria->addSelectColumn($alias . '.VESSELNAME');
			$criteria->addSelectColumn($alias . '.ESTIMATEDDEPARTUREDATE');
			$criteria->addSelectColumn($alias . '.DEPARTUREDATE');
			$criteria->addSelectColumn($alias . '.ARRIVALPORTID');
			$criteria->addSelectColumn($alias . '.ARRIVALTOPANAMADATE');
			$criteria->addSelectColumn($alias . '.TRANSSHIPMENTDATE');
			$criteria->addSelectColumn($alias . '.TELEXRELEASE');
			$criteria->addSelectColumn($alias . '.ESTIMATEDARRIVALDATE');
			$criteria->addSelectColumn($alias . '.ARRIVALDATE');
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
		$criteria->setPrimaryTableName(ShipmentPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ShipmentPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(ShipmentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     Shipment
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ShipmentPeer::doSelect($critcopy, $con);
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
		return ShipmentPeer::populateObjects(ShipmentPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(ShipmentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			ShipmentPeer::addSelectColumns($criteria);
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
	 * @param      Shipment $value A Shipment object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(Shipment $obj, $key = null)
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
	 * @param      mixed $value A Shipment object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Shipment) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Shipment object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     Shipment Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to import_shipment
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
		$cls = ShipmentPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = ShipmentPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = ShipmentPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				ShipmentPeer::addInstanceToPool($obj, $key);
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
	 * @return     array (Shipment object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = ShipmentPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = ShipmentPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + ShipmentPeer::NUM_COLUMNS;
		} else {
			$cls = ShipmentPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			ShipmentPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
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
		$criteria->setPrimaryTableName(ShipmentPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ShipmentPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ShipmentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ShipmentPeer::SUPPLIERPURCHASEORDERID, SupplierPurchaseOrderPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(ShipmentPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ShipmentPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ShipmentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ShipmentPeer::ARRIVALPORTID, PortPeer::ID, $join_behavior);

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
	 * Selects a collection of Shipment objects pre-filled with their SupplierPurchaseOrder objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Shipment objects.
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

		ShipmentPeer::addSelectColumns($criteria);
		$startcol = (ShipmentPeer::NUM_COLUMNS - ShipmentPeer::NUM_LAZY_LOAD_COLUMNS);
		SupplierPurchaseOrderPeer::addSelectColumns($criteria);

		$criteria->addJoin(ShipmentPeer::SUPPLIERPURCHASEORDERID, SupplierPurchaseOrderPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ShipmentPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ShipmentPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ShipmentPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ShipmentPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Shipment) to $obj2 (SupplierPurchaseOrder)
				$obj2->addShipment($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Shipment objects pre-filled with their Port objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Shipment objects.
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

		ShipmentPeer::addSelectColumns($criteria);
		$startcol = (ShipmentPeer::NUM_COLUMNS - ShipmentPeer::NUM_LAZY_LOAD_COLUMNS);
		PortPeer::addSelectColumns($criteria);

		$criteria->addJoin(ShipmentPeer::ARRIVALPORTID, PortPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ShipmentPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ShipmentPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ShipmentPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ShipmentPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Shipment) to $obj2 (Port)
				$obj2->addShipment($obj1);

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
		$criteria->setPrimaryTableName(ShipmentPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ShipmentPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ShipmentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ShipmentPeer::SUPPLIERPURCHASEORDERID, SupplierPurchaseOrderPeer::ID, $join_behavior);

		$criteria->addJoin(ShipmentPeer::ARRIVALPORTID, PortPeer::ID, $join_behavior);

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
	 * Selects a collection of Shipment objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Shipment objects.
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

		ShipmentPeer::addSelectColumns($criteria);
		$startcol2 = (ShipmentPeer::NUM_COLUMNS - ShipmentPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS);

		PortPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (PortPeer::NUM_COLUMNS - PortPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ShipmentPeer::SUPPLIERPURCHASEORDERID, SupplierPurchaseOrderPeer::ID, $join_behavior);

		$criteria->addJoin(ShipmentPeer::ARRIVALPORTID, PortPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ShipmentPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ShipmentPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ShipmentPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ShipmentPeer::addInstanceToPool($obj1, $key1);
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
				} // if obj2 loaded

				// Add the $obj1 (Shipment) to the collection in $obj2 (SupplierPurchaseOrder)
				$obj2->addShipment($obj1);
			} // if joined row not null

			// Add objects for joined Port rows

			$key3 = PortPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = PortPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = PortPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					PortPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (Shipment) to the collection in $obj3 (Port)
				$obj3->addShipment($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
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
		$criteria->setPrimaryTableName(ShipmentPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ShipmentPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ShipmentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ShipmentPeer::ARRIVALPORTID, PortPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(ShipmentPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ShipmentPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ShipmentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ShipmentPeer::SUPPLIERPURCHASEORDERID, SupplierPurchaseOrderPeer::ID, $join_behavior);

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
	 * Selects a collection of Shipment objects pre-filled with all related objects except SupplierPurchaseOrder.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Shipment objects.
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

		ShipmentPeer::addSelectColumns($criteria);
		$startcol2 = (ShipmentPeer::NUM_COLUMNS - ShipmentPeer::NUM_LAZY_LOAD_COLUMNS);

		PortPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (PortPeer::NUM_COLUMNS - PortPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ShipmentPeer::ARRIVALPORTID, PortPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ShipmentPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ShipmentPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ShipmentPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ShipmentPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Port rows

				$key2 = PortPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = PortPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = PortPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					PortPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Shipment) to the collection in $obj2 (Port)
				$obj2->addShipment($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Shipment objects pre-filled with all related objects except Port.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Shipment objects.
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

		ShipmentPeer::addSelectColumns($criteria);
		$startcol2 = (ShipmentPeer::NUM_COLUMNS - ShipmentPeer::NUM_LAZY_LOAD_COLUMNS);

		SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ShipmentPeer::SUPPLIERPURCHASEORDERID, SupplierPurchaseOrderPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ShipmentPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ShipmentPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ShipmentPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ShipmentPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Shipment) to the collection in $obj2 (SupplierPurchaseOrder)
				$obj2->addShipment($obj1);

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
	  $dbMap = Propel::getDatabaseMap(BaseShipmentPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseShipmentPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new ShipmentTableMap());
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
		return $withPrefix ? ShipmentPeer::CLASS_DEFAULT : ShipmentPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a Shipment or Criteria object.
	 *
	 * @param      mixed $values Criteria or Shipment object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ShipmentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Shipment object
		}

		if ($criteria->containsKey(ShipmentPeer::ID) && $criteria->keyContainsValue(ShipmentPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.ShipmentPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a Shipment or Criteria object.
	 *
	 * @param      mixed $values Criteria or Shipment object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ShipmentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(ShipmentPeer::ID);
			$value = $criteria->remove(ShipmentPeer::ID);
			if ($value) {
				$selectCriteria->add(ShipmentPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(ShipmentPeer::TABLE_NAME);
			}

		} else { // $values is Shipment object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the import_shipment table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ShipmentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(ShipmentPeer::TABLE_NAME, $con, ShipmentPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			ShipmentPeer::clearInstancePool();
			ShipmentPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a Shipment or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Shipment object or primary key or array of primary keys
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
			$con = Propel::getConnection(ShipmentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			ShipmentPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Shipment) { // it's a model object
			// invalidate the cache for this single object
			ShipmentPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ShipmentPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				ShipmentPeer::removeInstanceFromPool($singleval);
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
			ShipmentPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given Shipment object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Shipment $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(Shipment $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ShipmentPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ShipmentPeer::TABLE_NAME);

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

		return BasePeer::doValidate(ShipmentPeer::DATABASE_NAME, ShipmentPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Shipment
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = ShipmentPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(ShipmentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(ShipmentPeer::DATABASE_NAME);
		$criteria->add(ShipmentPeer::ID, $pk);

		$v = ShipmentPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(ShipmentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(ShipmentPeer::DATABASE_NAME);
			$criteria->add(ShipmentPeer::ID, $pks, Criteria::IN);
			$objs = ShipmentPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseShipmentPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseShipmentPeer::buildTableMap();

