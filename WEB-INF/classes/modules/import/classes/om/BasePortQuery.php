<?php


/**
 * Base class that represents a query for the 'import_port' table.
 *
 * Puerto
 *
 * @method     PortQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PortQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     PortQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     PortQuery orderByActive($order = Criteria::ASC) Order by the active column
 *
 * @method     PortQuery groupById() Group by the id column
 * @method     PortQuery groupByCode() Group by the code column
 * @method     PortQuery groupByName() Group by the name column
 * @method     PortQuery groupByActive() Group by the active column
 *
 * @method     PortQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PortQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PortQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PortQuery leftJoinSupplier($relationAlias = null) Adds a LEFT JOIN clause to the query using the Supplier relation
 * @method     PortQuery rightJoinSupplier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Supplier relation
 * @method     PortQuery innerJoinSupplier($relationAlias = null) Adds a INNER JOIN clause to the query using the Supplier relation
 *
 * @method     PortQuery leftJoinSupplierQuoteItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierQuoteItem relation
 * @method     PortQuery rightJoinSupplierQuoteItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierQuoteItem relation
 * @method     PortQuery innerJoinSupplierQuoteItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierQuoteItem relation
 *
 * @method     PortQuery leftJoinSupplierPurchaseOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierPurchaseOrderItem relation
 * @method     PortQuery rightJoinSupplierPurchaseOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierPurchaseOrderItem relation
 * @method     PortQuery innerJoinSupplierPurchaseOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierPurchaseOrderItem relation
 *
 * @method     PortQuery leftJoinShipment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Shipment relation
 * @method     PortQuery rightJoinShipment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Shipment relation
 * @method     PortQuery innerJoinShipment($relationAlias = null) Adds a INNER JOIN clause to the query using the Shipment relation
 *
 * @method     Port findOne(PropelPDO $con = null) Return the first Port matching the query
 * @method     Port findOneOrCreate(PropelPDO $con = null) Return the first Port matching the query, or a new Port object populated from the query conditions when no match is found
 *
 * @method     Port findOneById(int $id) Return the first Port filtered by the id column
 * @method     Port findOneByCode(string $code) Return the first Port filtered by the code column
 * @method     Port findOneByName(string $name) Return the first Port filtered by the name column
 * @method     Port findOneByActive(boolean $active) Return the first Port filtered by the active column
 *
 * @method     array findById(int $id) Return Port objects filtered by the id column
 * @method     array findByCode(string $code) Return Port objects filtered by the code column
 * @method     array findByName(string $name) Return Port objects filtered by the name column
 * @method     array findByActive(boolean $active) Return Port objects filtered by the active column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BasePortQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePortQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'Port', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PortQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PortQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PortQuery) {
			return $criteria;
		}
		$query = new PortQuery();
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
	 * @return    Port|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PortPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PortQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PortPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PortQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PortPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PortQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PortPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the code column
	 * 
	 * @param     string $code The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PortQuery The current query, for fluid interface
	 */
	public function filterByCode($code = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($code)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $code)) {
				$code = str_replace('*', '%', $code);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PortPeer::CODE, $code, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PortQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PortPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the active column
	 * 
	 * @param     boolean|string $active The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PortQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_string($active)) {
			$active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(PortPeer::ACTIVE, $active, $comparison);
	}

	/**
	 * Filter the query by a related Supplier object
	 *
	 * @param     Supplier $supplier  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PortQuery The current query, for fluid interface
	 */
	public function filterBySupplier($supplier, $comparison = null)
	{
		return $this
			->addUsingAlias(PortPeer::ID, $supplier->getDefaultportid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Supplier relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PortQuery The current query, for fluid interface
	 */
	public function joinSupplier($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Supplier');
		
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
			$this->addJoinObject($join, 'Supplier');
		}
		
		return $this;
	}

	/**
	 * Use the Supplier relation Supplier object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuery A secondary query class using the current class as primary query
	 */
	public function useSupplierQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSupplier($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Supplier', 'SupplierQuery');
	}

	/**
	 * Filter the query by a related SupplierQuoteItem object
	 *
	 * @param     SupplierQuoteItem $supplierQuoteItem  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PortQuery The current query, for fluid interface
	 */
	public function filterBySupplierQuoteItem($supplierQuoteItem, $comparison = null)
	{
		return $this
			->addUsingAlias(PortPeer::ID, $supplierQuoteItem->getPortid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierQuoteItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PortQuery The current query, for fluid interface
	 */
	public function joinSupplierQuoteItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SupplierQuoteItem');
		
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
			$this->addJoinObject($join, 'SupplierQuoteItem');
		}
		
		return $this;
	}

	/**
	 * Use the SupplierQuoteItem relation SupplierQuoteItem object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteItemQuery A secondary query class using the current class as primary query
	 */
	public function useSupplierQuoteItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSupplierQuoteItem($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SupplierQuoteItem', 'SupplierQuoteItemQuery');
	}

	/**
	 * Filter the query by a related SupplierPurchaseOrderItem object
	 *
	 * @param     SupplierPurchaseOrderItem $supplierPurchaseOrderItem  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PortQuery The current query, for fluid interface
	 */
	public function filterBySupplierPurchaseOrderItem($supplierPurchaseOrderItem, $comparison = null)
	{
		return $this
			->addUsingAlias(PortPeer::ID, $supplierPurchaseOrderItem->getPortid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierPurchaseOrderItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PortQuery The current query, for fluid interface
	 */
	public function joinSupplierPurchaseOrderItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SupplierPurchaseOrderItem');
		
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
			$this->addJoinObject($join, 'SupplierPurchaseOrderItem');
		}
		
		return $this;
	}

	/**
	 * Use the SupplierPurchaseOrderItem relation SupplierPurchaseOrderItem object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderItemQuery A secondary query class using the current class as primary query
	 */
	public function useSupplierPurchaseOrderItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSupplierPurchaseOrderItem($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SupplierPurchaseOrderItem', 'SupplierPurchaseOrderItemQuery');
	}

	/**
	 * Filter the query by a related Shipment object
	 *
	 * @param     Shipment $shipment  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PortQuery The current query, for fluid interface
	 */
	public function filterByShipment($shipment, $comparison = null)
	{
		return $this
			->addUsingAlias(PortPeer::ID, $shipment->getArrivalportid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Shipment relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PortQuery The current query, for fluid interface
	 */
	public function joinShipment($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useShipmentQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinShipment($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Shipment', 'ShipmentQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Port $port Object to remove from the list of results
	 *
	 * @return    PortQuery The current query, for fluid interface
	 */
	public function prune($port = null)
	{
		if ($port) {
			$this->addUsingAlias(PortPeer::ID, $port->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasePortQuery
