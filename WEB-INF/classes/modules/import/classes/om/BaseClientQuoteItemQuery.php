<?php


/**
 * Base class that represents a query for the 'import_clientQuoteItem' table.
 *
 * Elemento de Cotizacion Cliente
 *
 * @method     ClientQuoteItemQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ClientQuoteItemQuery orderByClientquoteid($order = Criteria::ASC) Order by the clientQuoteId column
 * @method     ClientQuoteItemQuery orderByProductid($order = Criteria::ASC) Order by the productId column
 * @method     ClientQuoteItemQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ClientQuoteItemQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 *
 * @method     ClientQuoteItemQuery groupById() Group by the id column
 * @method     ClientQuoteItemQuery groupByClientquoteid() Group by the clientQuoteId column
 * @method     ClientQuoteItemQuery groupByProductid() Group by the productId column
 * @method     ClientQuoteItemQuery groupByPrice() Group by the price column
 * @method     ClientQuoteItemQuery groupByQuantity() Group by the quantity column
 *
 * @method     ClientQuoteItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClientQuoteItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClientQuoteItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClientQuoteItemQuery leftJoinClientQuote($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientQuote relation
 * @method     ClientQuoteItemQuery rightJoinClientQuote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientQuote relation
 * @method     ClientQuoteItemQuery innerJoinClientQuote($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientQuote relation
 *
 * @method     ClientQuoteItemQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method     ClientQuoteItemQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method     ClientQuoteItemQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method     ClientQuoteItemQuery leftJoinSupplierQuoteItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierQuoteItem relation
 * @method     ClientQuoteItemQuery rightJoinSupplierQuoteItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierQuoteItem relation
 * @method     ClientQuoteItemQuery innerJoinSupplierQuoteItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierQuoteItem relation
 *
 * @method     ClientQuoteItem findOne(PropelPDO $con = null) Return the first ClientQuoteItem matching the query
 * @method     ClientQuoteItem findOneOrCreate(PropelPDO $con = null) Return the first ClientQuoteItem matching the query, or a new ClientQuoteItem object populated from the query conditions when no match is found
 *
 * @method     ClientQuoteItem findOneById(int $id) Return the first ClientQuoteItem filtered by the id column
 * @method     ClientQuoteItem findOneByClientquoteid(int $clientQuoteId) Return the first ClientQuoteItem filtered by the clientQuoteId column
 * @method     ClientQuoteItem findOneByProductid(int $productId) Return the first ClientQuoteItem filtered by the productId column
 * @method     ClientQuoteItem findOneByPrice(double $price) Return the first ClientQuoteItem filtered by the price column
 * @method     ClientQuoteItem findOneByQuantity(int $quantity) Return the first ClientQuoteItem filtered by the quantity column
 *
 * @method     array findById(int $id) Return ClientQuoteItem objects filtered by the id column
 * @method     array findByClientquoteid(int $clientQuoteId) Return ClientQuoteItem objects filtered by the clientQuoteId column
 * @method     array findByProductid(int $productId) Return ClientQuoteItem objects filtered by the productId column
 * @method     array findByPrice(double $price) Return ClientQuoteItem objects filtered by the price column
 * @method     array findByQuantity(int $quantity) Return ClientQuoteItem objects filtered by the quantity column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseClientQuoteItemQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseClientQuoteItemQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'ClientQuoteItem', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClientQuoteItemQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClientQuoteItemQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClientQuoteItemQuery) {
			return $criteria;
		}
		$query = new ClientQuoteItemQuery();
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
	 * @return    ClientQuoteItem|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ClientQuoteItemPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ClientQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ClientQuoteItemPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClientQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ClientQuoteItemPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuoteItemQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClientQuoteItemPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the clientQuoteId column
	 * 
	 * @param     int|array $clientquoteid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByClientquoteid($clientquoteid = null, $comparison = null)
	{
		if (is_array($clientquoteid)) {
			$useMinMax = false;
			if (isset($clientquoteid['min'])) {
				$this->addUsingAlias(ClientQuoteItemPeer::CLIENTQUOTEID, $clientquoteid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clientquoteid['max'])) {
				$this->addUsingAlias(ClientQuoteItemPeer::CLIENTQUOTEID, $clientquoteid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientQuoteItemPeer::CLIENTQUOTEID, $clientquoteid, $comparison);
	}

	/**
	 * Filter the query on the productId column
	 * 
	 * @param     int|array $productid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByProductid($productid = null, $comparison = null)
	{
		if (is_array($productid)) {
			$useMinMax = false;
			if (isset($productid['min'])) {
				$this->addUsingAlias(ClientQuoteItemPeer::PRODUCTID, $productid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($productid['max'])) {
				$this->addUsingAlias(ClientQuoteItemPeer::PRODUCTID, $productid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientQuoteItemPeer::PRODUCTID, $productid, $comparison);
	}

	/**
	 * Filter the query on the price column
	 * 
	 * @param     double|array $price The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByPrice($price = null, $comparison = null)
	{
		if (is_array($price)) {
			$useMinMax = false;
			if (isset($price['min'])) {
				$this->addUsingAlias(ClientQuoteItemPeer::PRICE, $price['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($price['max'])) {
				$this->addUsingAlias(ClientQuoteItemPeer::PRICE, $price['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientQuoteItemPeer::PRICE, $price, $comparison);
	}

	/**
	 * Filter the query on the quantity column
	 * 
	 * @param     int|array $quantity The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByQuantity($quantity = null, $comparison = null)
	{
		if (is_array($quantity)) {
			$useMinMax = false;
			if (isset($quantity['min'])) {
				$this->addUsingAlias(ClientQuoteItemPeer::QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($quantity['max'])) {
				$this->addUsingAlias(ClientQuoteItemPeer::QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientQuoteItemPeer::QUANTITY, $quantity, $comparison);
	}

	/**
	 * Filter the query by a related ClientQuote object
	 *
	 * @param     ClientQuote $clientQuote  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByClientQuote($clientQuote, $comparison = null)
	{
		return $this
			->addUsingAlias(ClientQuoteItemPeer::CLIENTQUOTEID, $clientQuote->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ClientQuote relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientQuoteItemQuery The current query, for fluid interface
	 */
	public function joinClientQuote($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ClientQuote');
		
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
			$this->addJoinObject($join, 'ClientQuote');
		}
		
		return $this;
	}

	/**
	 * Use the ClientQuote relation ClientQuote object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientQuoteQuery A secondary query class using the current class as primary query
	 */
	public function useClientQuoteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinClientQuote($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ClientQuote', 'ClientQuoteQuery');
	}

	/**
	 * Filter the query by a related Product object
	 *
	 * @param     Product $product  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByProduct($product, $comparison = null)
	{
		return $this
			->addUsingAlias(ClientQuoteItemPeer::PRODUCTID, $product->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Product relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientQuoteItemQuery The current query, for fluid interface
	 */
	public function joinProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Product');
		
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
			$this->addJoinObject($join, 'Product');
		}
		
		return $this;
	}

	/**
	 * Use the Product relation Product object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductQuery A secondary query class using the current class as primary query
	 */
	public function useProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinProduct($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Product', 'ProductQuery');
	}

	/**
	 * Filter the query by a related SupplierQuoteItem object
	 *
	 * @param     SupplierQuoteItem $supplierQuoteItem  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuoteItemQuery The current query, for fluid interface
	 */
	public function filterBySupplierQuoteItem($supplierQuoteItem, $comparison = null)
	{
		return $this
			->addUsingAlias(ClientQuoteItemPeer::ID, $supplierQuoteItem->getClientquoteitemid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierQuoteItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientQuoteItemQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     ClientQuoteItem $clientQuoteItem Object to remove from the list of results
	 *
	 * @return    ClientQuoteItemQuery The current query, for fluid interface
	 */
	public function prune($clientQuoteItem = null)
	{
		if ($clientQuoteItem) {
			$this->addUsingAlias(ClientQuoteItemPeer::ID, $clientQuoteItem->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseClientQuoteItemQuery
