<?php

require_once 'propel/util/BasePeer.php';
// The object class -- needed for instanceof checks in this class.
// actual class may be a subclass -- as returned by SupplierPurchaseOrderPeer::getOMClass()
include_once 'anmaga/SupplierPurchaseOrder.php';

/**
 * Base static class for performing query and update operations on the 'import_supplierPurchaseOrder' table.
 *
 * Orden de Pedido a Proveedor
 *
 * This class was autogenerated by Propel on:
 *
 * Wed Feb  4 14:12:35 2009
 *
 * @package    anmaga.om
 */
abstract class BaseSupplierPurchaseOrderPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'anmaga';

	/** the table name for this class */
	const TABLE_NAME = 'import_supplierPurchaseOrder';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'anmaga.SupplierPurchaseOrder';

	/** The total number of columns. */
	const NUM_COLUMNS = 6;

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

	/** the column name for the SUPPLIERQUOTATIONID field */
	const SUPPLIERQUOTATIONID = 'import_supplierPurchaseOrder.SUPPLIERQUOTATIONID';

	/** The PHP to DB Name Mapping */
	private static $phpNameMap = null;


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Createdat', 'Supplierid', 'Status', 'Timestampstatus', 'Supplierquotationid', ),
		BasePeer::TYPE_COLNAME => array (SupplierPurchaseOrderPeer::ID, SupplierPurchaseOrderPeer::CREATEDAT, SupplierPurchaseOrderPeer::SUPPLIERID, SupplierPurchaseOrderPeer::STATUS, SupplierPurchaseOrderPeer::TIMESTAMPSTATUS, SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'createdAt', 'supplierId', 'status', 'timestampStatus', 'supplierQuotationId', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Createdat' => 1, 'Supplierid' => 2, 'Status' => 3, 'Timestampstatus' => 4, 'Supplierquotationid' => 5, ),
		BasePeer::TYPE_COLNAME => array (SupplierPurchaseOrderPeer::ID => 0, SupplierPurchaseOrderPeer::CREATEDAT => 1, SupplierPurchaseOrderPeer::SUPPLIERID => 2, SupplierPurchaseOrderPeer::STATUS => 3, SupplierPurchaseOrderPeer::TIMESTAMPSTATUS => 4, SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'createdAt' => 1, 'supplierId' => 2, 'status' => 3, 'timestampStatus' => 4, 'supplierQuotationId' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	/**
	 * @return     MapBuilder the map builder for this peer
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getMapBuilder()
	{
		include_once 'anmaga/map/SupplierPurchaseOrderMapBuilder.php';
		return BasePeer::getMapBuilder('anmaga.map.SupplierPurchaseOrderMapBuilder');
	}
	/**
	 * Gets a map (hash) of PHP names to DB column names.
	 *
	 * @return     array The PHP to DB name map for this peer
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @deprecated Use the getFieldNames() and translateFieldName() methods instead of this.
	 */
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = SupplierPurchaseOrderPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants TYPE_PHPNAME,
	 *                         TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
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
	 * Returns an array of of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants TYPE_PHPNAME,
	 *                      TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
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
	 * @param      criteria object containing the columns to add.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(SupplierPurchaseOrderPeer::ID);

		$criteria->addSelectColumn(SupplierPurchaseOrderPeer::CREATEDAT);

		$criteria->addSelectColumn(SupplierPurchaseOrderPeer::SUPPLIERID);

		$criteria->addSelectColumn(SupplierPurchaseOrderPeer::STATUS);

		$criteria->addSelectColumn(SupplierPurchaseOrderPeer::TIMESTAMPSTATUS);

		$criteria->addSelectColumn(SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID);

	}

	const COUNT = 'COUNT(import_supplierPurchaseOrder.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT import_supplierPurchaseOrder.ID)';

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param      Connection $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = SupplierPurchaseOrderPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}
	/**
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      Connection $con
	 * @return     SupplierPurchaseOrder
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, $con = null)
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
	 * @param      Connection $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return SupplierPurchaseOrderPeer::populateObjects(SupplierPurchaseOrderPeer::doSelectRS($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect()
	 * method to get a ResultSet.
	 *
	 * Use this method directly if you want to just get the resultset
	 * (instead of an array of objects).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      Connection $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     ResultSet The resultset object with numerically-indexed fields.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			SupplierPurchaseOrderPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		// BasePeer returns a Creole ResultSet, set to return
		// rows indexed numerically.
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = SupplierPurchaseOrderPeer::getOMClass();
		$cls = Propel::import($cls);
		// populate the object(s)
		while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	/**
	 * Returns the number of rows matching criteria, joining the related SupplierQuotation table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param      Connection $con
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinSupplierQuotation(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID, SupplierQuotationPeer::ID);

		$rs = SupplierPurchaseOrderPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Supplier table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param      Connection $con
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinSupplier(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERID, SupplierPeer::ID);

		$rs = SupplierPurchaseOrderPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Selects a collection of SupplierPurchaseOrder objects pre-filled with their SupplierQuotation objects.
	 *
	 * @return     array Array of SupplierPurchaseOrder objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSupplierQuotation(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderPeer::addSelectColumns($c);
		$startcol = (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		SupplierQuotationPeer::addSelectColumns($c);

		$c->addJoin(SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID, SupplierQuotationPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SupplierPurchaseOrderPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SupplierQuotationPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getSupplierQuotation(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addSupplierPurchaseOrder($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initSupplierPurchaseOrders();
				$obj2->addSupplierPurchaseOrder($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of SupplierPurchaseOrder objects pre-filled with their Supplier objects.
	 *
	 * @return     array Array of SupplierPurchaseOrder objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSupplier(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderPeer::addSelectColumns($c);
		$startcol = (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		SupplierPeer::addSelectColumns($c);

		$c->addJoin(SupplierPurchaseOrderPeer::SUPPLIERID, SupplierPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SupplierPurchaseOrderPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SupplierPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getSupplier(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					// e.g. $author->addBookRelatedByBookId()
					$temp_obj2->addSupplierPurchaseOrder($obj1); //CHECKME
					break;
				}
			}
			if ($newObject) {
				$obj2->initSupplierPurchaseOrders();
				$obj2->addSupplierPurchaseOrder($obj1); //CHECKME
			}
			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining all related tables
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param      Connection $con
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID, SupplierQuotationPeer::ID);

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERID, SupplierPeer::ID);

		$rs = SupplierPurchaseOrderPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Selects a collection of SupplierPurchaseOrder objects pre-filled with all related objects.
	 *
	 * @return     array Array of SupplierPurchaseOrder objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderPeer::addSelectColumns($c);
		$startcol2 = (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		SupplierQuotationPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + SupplierQuotationPeer::NUM_COLUMNS;

		SupplierPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + SupplierPeer::NUM_COLUMNS;

		$c->addJoin(SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID, SupplierQuotationPeer::ID);

		$c->addJoin(SupplierPurchaseOrderPeer::SUPPLIERID, SupplierPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SupplierPurchaseOrderPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


				// Add objects for joined SupplierQuotation rows
	
			$omClass = SupplierQuotationPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getSupplierQuotation(); // CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addSupplierPurchaseOrder($obj1); // CHECKME
					break;
				}
			}

			if ($newObject) {
				$obj2->initSupplierPurchaseOrders();
				$obj2->addSupplierPurchaseOrder($obj1);
			}


				// Add objects for joined Supplier rows
	
			$omClass = SupplierPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getSupplier(); // CHECKME
				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addSupplierPurchaseOrder($obj1); // CHECKME
					break;
				}
			}

			if ($newObject) {
				$obj3->initSupplierPurchaseOrders();
				$obj3->addSupplierPurchaseOrder($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related SupplierQuotation table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param      Connection $con
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptSupplierQuotation(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERID, SupplierPeer::ID);

		$rs = SupplierPurchaseOrderPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Supplier table
	 *
	 * @param      Criteria $c
	 * @param      boolean $distinct Whether to select only distinct columns (You can also set DISTINCT modifier in Criteria).
	 * @param      Connection $con
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptSupplier(Criteria $criteria, $distinct = false, $con = null)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SupplierPurchaseOrderPeer::COUNT);
		}

		// just in case we're grouping: add those columns to the select statement
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID, SupplierQuotationPeer::ID);

		$rs = SupplierPurchaseOrderPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			// no rows returned; we infer that means 0 matches.
			return 0;
		}
	}


	/**
	 * Selects a collection of SupplierPurchaseOrder objects pre-filled with all related objects except SupplierQuotation.
	 *
	 * @return     array Array of SupplierPurchaseOrder objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSupplierQuotation(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderPeer::addSelectColumns($c);
		$startcol2 = (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		SupplierPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + SupplierPeer::NUM_COLUMNS;

		$c->addJoin(SupplierPurchaseOrderPeer::SUPPLIERID, SupplierPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SupplierPurchaseOrderPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SupplierPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getSupplier(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addSupplierPurchaseOrder($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initSupplierPurchaseOrders();
				$obj2->addSupplierPurchaseOrder($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	/**
	 * Selects a collection of SupplierPurchaseOrder objects pre-filled with all related objects except Supplier.
	 *
	 * @return     array Array of SupplierPurchaseOrder objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSupplier(Criteria $c, $con = null)
	{
		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		// $c->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SupplierPurchaseOrderPeer::addSelectColumns($c);
		$startcol2 = (SupplierPurchaseOrderPeer::NUM_COLUMNS - SupplierPurchaseOrderPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		SupplierQuotationPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + SupplierQuotationPeer::NUM_COLUMNS;

		$c->addJoin(SupplierPurchaseOrderPeer::SUPPLIERQUOTATIONID, SupplierQuotationPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SupplierPurchaseOrderPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SupplierQuotationPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getSupplierQuotation(); //CHECKME
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addSupplierPurchaseOrder($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initSupplierPurchaseOrders();
				$obj2->addSupplierPurchaseOrder($obj1);
			}

			$results[] = $obj1;
		}
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
		return SupplierPurchaseOrderPeer::CLASS_DEFAULT;
	}

	/**
	 * Method perform an INSERT on the database, given a SupplierPurchaseOrder or Criteria object.
	 *
	 * @param      mixed $values Criteria or SupplierPurchaseOrder object containing data that is used to create the INSERT statement.
	 * @param      Connection $con the connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from SupplierPurchaseOrder object
		}

		$criteria->remove(SupplierPurchaseOrderPeer::ID); // remove pkey col since this table uses auto-increment


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a SupplierPurchaseOrder or Criteria object.
	 *
	 * @param      mixed $values Criteria or SupplierPurchaseOrder object containing data that is used to create the UPDATE statement.
	 * @param      Connection $con The connection to use (specify Connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(SupplierPurchaseOrderPeer::ID);
			$selectCriteria->add(SupplierPurchaseOrderPeer::ID, $criteria->remove(SupplierPurchaseOrderPeer::ID), $comparison);

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
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->begin();
			$affectedRows += BasePeer::doDeleteAll(SupplierPurchaseOrderPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a SupplierPurchaseOrder or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or SupplierPurchaseOrder object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      Connection $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(SupplierPurchaseOrderPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} elseif ($values instanceof SupplierPurchaseOrder) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			// it must be the primary key
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(SupplierPurchaseOrderPeer::ID, (array) $values, Criteria::IN);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
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

			foreach($cols as $colName) {
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
	 * @param      mixed $pk the primary key.
	 * @param      Connection $con the connection to use
	 * @return     SupplierPurchaseOrder
	 */
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
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
	 * @param      Connection $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(SupplierPurchaseOrderPeer::ID, $pks, Criteria::IN);
			$objs = SupplierPurchaseOrderPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseSupplierPurchaseOrderPeer

// static code to register the map builder for this Peer with the main Propel class
if (Propel::isInit()) {
	// the MapBuilder classes register themselves with Propel during initialization
	// so we need to load them here.
	try {
		BaseSupplierPurchaseOrderPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	// even if Propel is not yet initialized, the map builder class can be registered
	// now and then it will be loaded when Propel initializes.
	require_once 'anmaga/map/SupplierPurchaseOrderMapBuilder.php';
	Propel::registerMapBuilder('anmaga.map.SupplierPurchaseOrderMapBuilder');
}
