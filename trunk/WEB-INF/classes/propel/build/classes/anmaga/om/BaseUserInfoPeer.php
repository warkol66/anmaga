<?php
require_once 'propel/util/BasePeer.php';

// The object class -- needed for instanceof checks in this class.
// actual class may be a subclass -- as returned by UserInfoPeer::getOMClass()
include_once 'anmaga/UserInfo.php';
	
include_once 'anmaga/User.php';
include_once 'anmaga/UserPeer.php';

/**
 * Base static class for performing query and update operations on the 'users_userInfo' table.
 *
 * Information about users 
 *
 * This class was autogenerated by Propel on:
 *
 * [04/24/07 22:46:39]
 *
 * @package anmaga 
 */
abstract class BaseUserInfoPeer
{

	/** the default database name for this class */
	const DATABASE_NAME = "anmaga";

	/** the table name for this class */
	const TABLE_NAME = "users_userInfo";

 
	/** the column name for the USERID field */
	const USERID = "users_userInfo.USERID";
 
	/** the column name for the NAME field */
	const NAME = "users_userInfo.NAME";
 
	/** the column name for the SURNAME field */
	const SURNAME = "users_userInfo.SURNAME";

	

	/** number of columns for this peer */
	public static $numColumns = 3;
	
	/** number of lazy load columns for this peer */
	public static $numLazyLoadColumns = 0;
	
	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = "anmaga.UserInfo";

	/** The PHP to DB Name Mapping */
	private static $phpNameMap = null;

	/**
	 * @return MapBuilder the map builder for this peer
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getMapBuilder()		
	{
		include_once 'anmaga/map/UserInfoMapBuilder.php';
		return BasePeer::getMapBuilder(UserInfoMapBuilder::CLASS_NAME);
	}

	/**
	 * Gets a map (hash) of PHP names to DB column names.
	 *
	 * @return array The PHP to DB name map for this peer
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @todo Consider having template build the array rather than doing it at runtime.
	 */
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = UserInfoPeer::getTableMap();
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
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param string $alias The alias for the current table.
	 * @param string $column The column name for current table. (i.e. UserInfoPeer::COLUMN_NAME).
	 * @return string
	 */
	public static function alias($alias, $column)
	{
		return $alias . substr($column, strlen(self::TABLE_NAME));
	}
	
	/**
	 * Add all the columns needed to create a new object.
	 * 
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param criteria object containing the columns to add.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria)
	{
		$criteria->addSelectColumn(self::USERID);
		$criteria->addSelectColumn(self::NAME);
		$criteria->addSelectColumn(self::SURNAME);
	}
	
	const COUNT = "COUNT(users_userInfo.USERID)";
	const COUNT_DISTINCT = "COUNT(DISTINCT users_userInfo.USERID)";
  
	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param Criteria $criteria
	 * @param boolean $distinct Whether to select only distinct columns.
	 * @param Connection $con
	 * @return int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{   
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;
		
		// clear out anything that might confuse the ORDER BY clause
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(UserInfoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(UserInfoPeer::COUNT);	
		}
		
		$rs = UserInfoPeer::doSelectRS($criteria, $con);		
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
	 * @param Criteria $criteria object used to create the SELECT statement.
	 * @param Connection $con
	 * @return UserInfo	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = UserInfoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}

	/**
	 * Method to do selects.
	 *
	 * @param Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param Connection $con
	 * @return array Array of selected Objects
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return UserInfoPeer::populateObjects(UserInfoPeer::doSelectRS($criteria, $con));
	}
	
	/**
	 * Prepares the Criteria object and uses the parent doSelect()
	 * method to get a ResultSet.
	 * 
	 * Use this method directly if you want to just get the resultset
	 * (instead of an array of objects).
	 *
	 * @param Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param Connection $con the connection to use
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return ResultSet The resultset object with numerically-indexed fields.
	 * @see BasePeer::doSelect()
	 */
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}				

		if (!$criteria->getSelectColumns()) {
			UserInfoPeer::addSelectColumns($criteria);
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
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
		
		// set the class once to avoid overhead in the loop
		$cls = UserInfoPeer::getOMClass();
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
	 * The class that the Peer will make instances of.
	 * If the BO is abstract then you must implement this method
	 * in the BO.
	 *
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getOMClass()
	{ 
		return self::CLASS_DEFAULT;
		 
	}
 

	/**
	 * Method perform an INSERT on the database, given a UserInfo or Criteria object.
	 *
	 * @param mixed $values Criteria or UserInfo object containing data that is used to create the INSERT statement.
	 * @param Connection $con the connection to use
	 * @return mixed The new primary key.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, $con = null)
	{		
		if ($con === null)
			$con = Propel::getConnection(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = $values;
		} else {
			$criteria = $values->buildCriteria();
		}
		
 
		
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
	 * Method perform an UPDATE on the database, given a UserInfo or Criteria object.
	 *
	 * @param mixed $values Criteria or UserInfo object containing data that is used to create the UPDATE statement.
	 * @param Connection $con The connection to use (specify Connection object to exert more control over transactions).
	 * @return int The number of affected rows (if supported by underlying database driver).
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, $con = null)
	{			
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		
		$selectCriteria = new Criteria(self::DATABASE_NAME);
				
		if ($values instanceof Criteria) {
			$criteria = $values;
			$selectCriteria->put(self::USERID, $criteria->remove(self::USERID));
 
		} else { // $values is UserInfo object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)			
		}	
		
		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);
		
		return BasePeer::doUpdate($selectCriteria, $criteria, $con);		
	}   
	
	/**
	 * Method to DELETE all rows from the users_userInfo table.
	 *
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null) 
	{
		if ($con === null) $con = Propel::getConnection(self::DATABASE_NAME);
		$affectedRows = 0; // initialize var to track total num of affected rows		
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->begin();
			 
			$affectedRows += BasePeer::doDeleteAll(self::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}
	
	/**
	 * Method perform a DELETE on the database, given a UserInfo or Criteria object OR a primary key value.
	 *
	 * @param mixed $values Criteria or UserInfo object or primary key which is used to create the DELETE statement 
	 * @param Connection $con the connection to use
	 * @return int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, $con = null)
	 {		
		if ($con === null)
			$con = Propel::getConnection(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = $values;
		} elseif ($values instanceof UserInfo) {
			$criteria = $values->buildPkeyCriteria();
		} else {
			// it must be the primary key
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(self::USERID, $values);
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
	 * Validates all modified columns of given UserInfo object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param UserInfo $obj The object to validate.
	 * @param mixed $cols Column name or array of column names.
	 *
	 * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(UserInfo $obj, $cols = null)
	{
		$columns = array();

		if ($cols)
		{
		  $dbMap = Propel::getDatabaseMap(self::DATABASE_NAME);
		  $tableMap = $dbMap->getTable(self::TABLE_NAME);

		  if (! is_array($cols)) {
			$cols = array($cols);
		  }

		  foreach($cols as $colName)
		  {
			if ($tableMap->containsColumn($colName))
			{
			  $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
			  $columns[$colName] = $obj->$get();
			}
		  }
		}
		else
		{
		}

		return BasePeer::doValidate(self::DATABASE_NAME, self::TABLE_NAME, $columns);
	}
	  


	/**
	 * Retrieve a single object by pkey or NULL if not found.
	 *
	 * @param mixed $pk the primary key.
	 * @param Connection $con the connection to use
         * @return UserInfo
	 */
	public static function retrieveByPK($pk, $con = null)
	{		
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		
		$criteria = new Criteria(self::DATABASE_NAME);
		$criteria->add(self::USERID, $pk);
						
		$v = UserInfoPeer::doSelect($criteria, $con);
        return count($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param array $pks List of primary keys
	 * @param Connection $con the connection to use
	 * @throws PropelException Any exceptions caught during processing will be
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
			$criteria->add(self::USERID, $pks, Criteria::IN);
  
			$objs = UserInfoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

 

	/**
	 * Selects a collection of UserInfo objects pre-filled with their
	 * User objects.
	 *
	 * @return array Array of UserInfo objects.
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinUser(Criteria $c, $con = null)
	{

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		UserInfoPeer::addSelectColumns($c);
		$startcol = (self::$numColumns - self::$numLazyLoadColumns) + 1;
		UserPeer::addSelectColumns($c);

			$c->addJoin(UserInfoPeer::USERID, UserPeer::ID);
	 
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {
			$omClass = UserInfoPeer::getOMClass();
			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = UserPeer::getOMClass();
			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getUser();
				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addUserInfo($obj1);
					break;
				}
			}
			if ($newObject) {
				$obj2->initUserInfos();
				$obj2->addUserInfo($obj1);
			}
			$results[] = $obj1;
		}
		return $results;
	}
	/**
	 * Returns the TableMap related to this peer.  This method is not
	 * needed for general use but a specific application could have a need.
	 * @return TableMap
	 * @throws PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	protected static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}
	
}

// static code to register the map builder for this Peer with the main Propel class
if (Propel::isInit()) {
	// the MapBuilder classes register themselves with Propel during initialization
	// so we need to load them here.
	try {		
		BaseUserInfoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log("Could not initialize Peer: " . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	// even if Propel is not yet initialized, the map builder class can be registered
	// now and then it will be loaded when Propel initializes.
	require_once 'anmaga/map/UserInfoMapBuilder.php';
	Propel::registerMapBuilder(UserInfoMapBuilder::CLASS_NAME);
}
