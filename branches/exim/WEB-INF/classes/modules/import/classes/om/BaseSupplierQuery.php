<?php


/**
 * Base class that represents a query for the 'import_supplier' table.
 *
 * Proveedores
 *
 * @method     SupplierQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SupplierQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     SupplierQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     SupplierQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     SupplierQuery orderByDefaultincotermid($order = Criteria::ASC) Order by the defaultIncotermId column
 * @method     SupplierQuery orderByDefaultportid($order = Criteria::ASC) Order by the defaultPortId column
 *
 * @method     SupplierQuery groupById() Group by the id column
 * @method     SupplierQuery groupByName() Group by the name column
 * @method     SupplierQuery groupByEmail() Group by the email column
 * @method     SupplierQuery groupByActive() Group by the active column
 * @method     SupplierQuery groupByDefaultincotermid() Group by the defaultIncotermId column
 * @method     SupplierQuery groupByDefaultportid() Group by the defaultPortId column
 *
 * @method     SupplierQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SupplierQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SupplierQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SupplierQuery leftJoinIncoterm($relationAlias = null) Adds a LEFT JOIN clause to the query using the Incoterm relation
 * @method     SupplierQuery rightJoinIncoterm($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Incoterm relation
 * @method     SupplierQuery innerJoinIncoterm($relationAlias = null) Adds a INNER JOIN clause to the query using the Incoterm relation
 *
 * @method     SupplierQuery leftJoinPort($relationAlias = null) Adds a LEFT JOIN clause to the query using the Port relation
 * @method     SupplierQuery rightJoinPort($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Port relation
 * @method     SupplierQuery innerJoinPort($relationAlias = null) Adds a INNER JOIN clause to the query using the Port relation
 *
 * @method     SupplierQuery leftJoinProductSupplier($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductSupplier relation
 * @method     SupplierQuery rightJoinProductSupplier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductSupplier relation
 * @method     SupplierQuery innerJoinProductSupplier($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductSupplier relation
 *
 * @method     SupplierQuery leftJoinSupplierQuote($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierQuote relation
 * @method     SupplierQuery rightJoinSupplierQuote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierQuote relation
 * @method     SupplierQuery innerJoinSupplierQuote($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierQuote relation
 *
 * @method     SupplierQuery leftJoinSupplierQuoteItemComment($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierQuoteItemComment relation
 * @method     SupplierQuery rightJoinSupplierQuoteItemComment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierQuoteItemComment relation
 * @method     SupplierQuery innerJoinSupplierQuoteItemComment($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierQuoteItemComment relation
 *
 * @method     SupplierQuery leftJoinSupplierPurchaseOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierPurchaseOrder relation
 * @method     SupplierQuery rightJoinSupplierPurchaseOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierPurchaseOrder relation
 * @method     SupplierQuery innerJoinSupplierPurchaseOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierPurchaseOrder relation
 *
 * @method     SupplierQuery leftJoinShipment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Shipment relation
 * @method     SupplierQuery rightJoinShipment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Shipment relation
 * @method     SupplierQuery innerJoinShipment($relationAlias = null) Adds a INNER JOIN clause to the query using the Shipment relation
 *
 * @method     Supplier findOne(PropelPDO $con = null) Return the first Supplier matching the query
 * @method     Supplier findOneOrCreate(PropelPDO $con = null) Return the first Supplier matching the query, or a new Supplier object populated from the query conditions when no match is found
 *
 * @method     Supplier findOneById(int $id) Return the first Supplier filtered by the id column
 * @method     Supplier findOneByName(string $name) Return the first Supplier filtered by the name column
 * @method     Supplier findOneByEmail(string $email) Return the first Supplier filtered by the email column
 * @method     Supplier findOneByActive(boolean $active) Return the first Supplier filtered by the active column
 * @method     Supplier findOneByDefaultincotermid(int $defaultIncotermId) Return the first Supplier filtered by the defaultIncotermId column
 * @method     Supplier findOneByDefaultportid(int $defaultPortId) Return the first Supplier filtered by the defaultPortId column
 *
 * @method     array findById(int $id) Return Supplier objects filtered by the id column
 * @method     array findByName(string $name) Return Supplier objects filtered by the name column
 * @method     array findByEmail(string $email) Return Supplier objects filtered by the email column
 * @method     array findByActive(boolean $active) Return Supplier objects filtered by the active column
 * @method     array findByDefaultincotermid(int $defaultIncotermId) Return Supplier objects filtered by the defaultIncotermId column
 * @method     array findByDefaultportid(int $defaultPortId) Return Supplier objects filtered by the defaultPortId column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseSupplierQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSupplierQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'Supplier', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SupplierQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SupplierQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SupplierQuery) {
			return $criteria;
		}
		$query = new SupplierQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Supplier|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SupplierPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SupplierPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SupplierPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SupplierPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SupplierPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the email column
	 * 
	 * @param     string $email The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function filterByEmail($email = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($email)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $email)) {
				$email = str_replace('*', '%', $email);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SupplierPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the active column
	 * 
	 * @param     boolean|string $active The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_string($active)) {
			$active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(SupplierPeer::ACTIVE, $active, $comparison);
	}

	/**
	 * Filter the query on the defaultIncotermId column
	 * 
	 * @param     int|array $defaultincotermid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function filterByDefaultincotermid($defaultincotermid = null, $comparison = null)
	{
		if (is_array($defaultincotermid)) {
			$useMinMax = false;
			if (isset($defaultincotermid['min'])) {
				$this->addUsingAlias(SupplierPeer::DEFAULTINCOTERMID, $defaultincotermid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($defaultincotermid['max'])) {
				$this->addUsingAlias(SupplierPeer::DEFAULTINCOTERMID, $defaultincotermid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPeer::DEFAULTINCOTERMID, $defaultincotermid, $comparison);
	}

	/**
	 * Filter the query on the defaultPortId column
	 * 
	 * @param     int|array $defaultportid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function filterByDefaultportid($defaultportid = null, $comparison = null)
	{
		if (is_array($defaultportid)) {
			$useMinMax = false;
			if (isset($defaultportid['min'])) {
				$this->addUsingAlias(SupplierPeer::DEFAULTPORTID, $defaultportid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($defaultportid['max'])) {
				$this->addUsingAlias(SupplierPeer::DEFAULTPORTID, $defaultportid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPeer::DEFAULTPORTID, $defaultportid, $comparison);
	}

	/**
	 * Filter the query by a related Incoterm object
	 *
	 * @param     Incoterm $incoterm  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function filterByIncoterm($incoterm, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPeer::DEFAULTINCOTERMID, $incoterm->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Incoterm relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function joinIncoterm($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Incoterm');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Incoterm');
		}
		
		return $this;
	}

	/**
	 * Use the Incoterm relation Incoterm object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IncotermQuery A secondary query class using the current class as primary query
	 */
	public function useIncotermQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinIncoterm($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Incoterm', 'IncotermQuery');
	}

	/**
	 * Filter the query by a related Port object
	 *
	 * @param     Port $port  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function filterByPort($port, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPeer::DEFAULTPORTID, $port->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Port relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function joinPort($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Port');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Port');
		}
		
		return $this;
	}

	/**
	 * Use the Port relation Port object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PortQuery A secondary query class using the current class as primary query
	 */
	public function usePortQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPort($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Port', 'PortQuery');
	}

	/**
	 * Filter the query by a related ProductSupplier object
	 *
	 * @param     ProductSupplier $productSupplier  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function filterByProductSupplier($productSupplier, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPeer::ID, $productSupplier->getSupplierid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ProductSupplier relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function joinProductSupplier($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ProductSupplier');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'ProductSupplier');
		}
		
		return $this;
	}

	/**
	 * Use the ProductSupplier relation ProductSupplier object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductSupplierQuery A secondary query class using the current class as primary query
	 */
	public function useProductSupplierQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinProductSupplier($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ProductSupplier', 'ProductSupplierQuery');
	}

	/**
	 * Filter the query by a related SupplierQuote object
	 *
	 * @param     SupplierQuote $supplierQuote  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function filterBySupplierQuote($supplierQuote, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPeer::ID, $supplierQuote->getSupplierid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierQuote relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function joinSupplierQuote($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SupplierQuote');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'SupplierQuote');
		}
		
		return $this;
	}

	/**
	 * Use the SupplierQuote relation SupplierQuote object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteQuery A secondary query class using the current class as primary query
	 */
	public function useSupplierQuoteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSupplierQuote($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SupplierQuote', 'SupplierQuoteQuery');
	}

	/**
	 * Filter the query by a related SupplierQuoteItemComment object
	 *
	 * @param     SupplierQuoteItemComment $supplierQuoteItemComment  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function filterBySupplierQuoteItemComment($supplierQuoteItemComment, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPeer::ID, $supplierQuoteItemComment->getSupplierid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierQuoteItemComment relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function joinSupplierQuoteItemComment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SupplierQuoteItemComment');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'SupplierQuoteItemComment');
		}
		
		return $this;
	}

	/**
	 * Use the SupplierQuoteItemComment relation SupplierQuoteItemComment object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteItemCommentQuery A secondary query class using the current class as primary query
	 */
	public function useSupplierQuoteItemCommentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSupplierQuoteItemComment($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SupplierQuoteItemComment', 'SupplierQuoteItemCommentQuery');
	}

	/**
	 * Filter the query by a related SupplierPurchaseOrder object
	 *
	 * @param     SupplierPurchaseOrder $supplierPurchaseOrder  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function filterBySupplierPurchaseOrder($supplierPurchaseOrder, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPeer::ID, $supplierPurchaseOrder->getSupplierid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierPurchaseOrder relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function joinSupplierPurchaseOrder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SupplierPurchaseOrder');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'SupplierPurchaseOrder');
		}
		
		return $this;
	}

	/**
	 * Use the SupplierPurchaseOrder relation SupplierPurchaseOrder object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderQuery A secondary query class using the current class as primary query
	 */
	public function useSupplierPurchaseOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSupplierPurchaseOrder($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SupplierPurchaseOrder', 'SupplierPurchaseOrderQuery');
	}

	/**
	 * Filter the query by a related Shipment object
	 *
	 * @param     Shipment $shipment  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function filterByShipment($shipment, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPeer::ID, $shipment->getSupplierid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Shipment relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function joinShipment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Shipment');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Shipment');
		}
		
		return $this;
	}

	/**
	 * Use the Shipment relation Shipment object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ShipmentQuery A secondary query class using the current class as primary query
	 */
	public function useShipmentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinShipment($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Shipment', 'ShipmentQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Supplier $supplier Object to remove from the list of results
	 *
	 * @return    SupplierQuery The current query, for fluid interface
	 */
	public function prune($supplier = null)
	{
		if ($supplier) {
			$this->addUsingAlias(SupplierPeer::ID, $supplier->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSupplierQuery
