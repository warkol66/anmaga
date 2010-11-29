<?php


/**
 * Base class that represents a query for the 'import_incoterm' table.
 *
 * Incoterm
 *
 * @method     IncotermQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     IncotermQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     IncotermQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     IncotermQuery orderByActive($order = Criteria::ASC) Order by the active column
 *
 * @method     IncotermQuery groupById() Group by the id column
 * @method     IncotermQuery groupByName() Group by the name column
 * @method     IncotermQuery groupByDescription() Group by the description column
 * @method     IncotermQuery groupByActive() Group by the active column
 *
 * @method     IncotermQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     IncotermQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     IncotermQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     IncotermQuery leftJoinSupplier($relationAlias = null) Adds a LEFT JOIN clause to the query using the Supplier relation
 * @method     IncotermQuery rightJoinSupplier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Supplier relation
 * @method     IncotermQuery innerJoinSupplier($relationAlias = null) Adds a INNER JOIN clause to the query using the Supplier relation
 *
 * @method     IncotermQuery leftJoinSupplierQuoteItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierQuoteItem relation
 * @method     IncotermQuery rightJoinSupplierQuoteItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierQuoteItem relation
 * @method     IncotermQuery innerJoinSupplierQuoteItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierQuoteItem relation
 *
 * @method     IncotermQuery leftJoinSupplierPurchaseOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierPurchaseOrderItem relation
 * @method     IncotermQuery rightJoinSupplierPurchaseOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierPurchaseOrderItem relation
 * @method     IncotermQuery innerJoinSupplierPurchaseOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierPurchaseOrderItem relation
 *
 * @method     Incoterm findOne(PropelPDO $con = null) Return the first Incoterm matching the query
 * @method     Incoterm findOneOrCreate(PropelPDO $con = null) Return the first Incoterm matching the query, or a new Incoterm object populated from the query conditions when no match is found
 *
 * @method     Incoterm findOneById(int $id) Return the first Incoterm filtered by the id column
 * @method     Incoterm findOneByName(string $name) Return the first Incoterm filtered by the name column
 * @method     Incoterm findOneByDescription(string $description) Return the first Incoterm filtered by the description column
 * @method     Incoterm findOneByActive(boolean $active) Return the first Incoterm filtered by the active column
 *
 * @method     array findById(int $id) Return Incoterm objects filtered by the id column
 * @method     array findByName(string $name) Return Incoterm objects filtered by the name column
 * @method     array findByDescription(string $description) Return Incoterm objects filtered by the description column
 * @method     array findByActive(boolean $active) Return Incoterm objects filtered by the active column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseIncotermQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseIncotermQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'Incoterm', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new IncotermQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    IncotermQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof IncotermQuery) {
			return $criteria;
		}
		$query = new IncotermQuery();
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
	 * @return    Incoterm|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = IncotermPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    IncotermQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(IncotermPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    IncotermQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(IncotermPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IncotermQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(IncotermPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IncotermQuery The current query, for fluid interface
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
		return $this->addUsingAlias(IncotermPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IncotermQuery The current query, for fluid interface
	 */
	public function filterByDescription($description = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($description)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $description)) {
				$description = str_replace('*', '%', $description);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IncotermPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the active column
	 * 
	 * @param     boolean|string $active The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IncotermQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_string($active)) {
			$active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(IncotermPeer::ACTIVE, $active, $comparison);
	}

	/**
	 * Filter the query by a related Supplier object
	 *
	 * @param     Supplier $supplier  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IncotermQuery The current query, for fluid interface
	 */
	public function filterBySupplier($supplier, $comparison = null)
	{
		return $this
			->addUsingAlias(IncotermPeer::ID, $supplier->getDefaultincotermid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Supplier relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IncotermQuery The current query, for fluid interface
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
	 * @return    IncotermQuery The current query, for fluid interface
	 */
	public function filterBySupplierQuoteItem($supplierQuoteItem, $comparison = null)
	{
		return $this
			->addUsingAlias(IncotermPeer::ID, $supplierQuoteItem->getIncotermid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierQuoteItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IncotermQuery The current query, for fluid interface
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
	 * @return    IncotermQuery The current query, for fluid interface
	 */
	public function filterBySupplierPurchaseOrderItem($supplierPurchaseOrderItem, $comparison = null)
	{
		return $this
			->addUsingAlias(IncotermPeer::ID, $supplierPurchaseOrderItem->getIncotermid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierPurchaseOrderItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IncotermQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     Incoterm $incoterm Object to remove from the list of results
	 *
	 * @return    IncotermQuery The current query, for fluid interface
	 */
	public function prune($incoterm = null)
	{
		if ($incoterm) {
			$this->addUsingAlias(IncotermPeer::ID, $incoterm->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseIncotermQuery
