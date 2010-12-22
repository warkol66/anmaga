<?php


/**
 * Base class that represents a query for the 'unit' table.
 *
 * Unidades
 *
 * @method     UnitQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     UnitQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     UnitQuery orderByUnitquantity($order = Criteria::ASC) Order by the unitQuantity column
 *
 * @method     UnitQuery groupById() Group by the id column
 * @method     UnitQuery groupByName() Group by the name column
 * @method     UnitQuery groupByUnitquantity() Group by the unitQuantity column
 *
 * @method     UnitQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UnitQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UnitQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     UnitQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method     UnitQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method     UnitQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method     Unit findOne(PropelPDO $con = null) Return the first Unit matching the query
 * @method     Unit findOneOrCreate(PropelPDO $con = null) Return the first Unit matching the query, or a new Unit object populated from the query conditions when no match is found
 *
 * @method     Unit findOneById(int $id) Return the first Unit filtered by the id column
 * @method     Unit findOneByName(string $name) Return the first Unit filtered by the name column
 * @method     Unit findOneByUnitquantity(int $unitQuantity) Return the first Unit filtered by the unitQuantity column
 *
 * @method     array findById(int $id) Return Unit objects filtered by the id column
 * @method     array findByName(string $name) Return Unit objects filtered by the name column
 * @method     array findByUnitquantity(int $unitQuantity) Return Unit objects filtered by the unitQuantity column
 *
 * @package    propel.generator.catalog.classes.om
 */
abstract class BaseUnitQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseUnitQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'anmaga', $modelName = 'Unit', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UnitQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UnitQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UnitQuery) {
			return $criteria;
		}
		$query = new UnitQuery();
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
	 * @return    Unit|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = UnitPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    UnitQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(UnitPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UnitQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(UnitPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UnitQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UnitPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UnitQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UnitPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the unitQuantity column
	 * 
	 * @param     int|array $unitquantity The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UnitQuery The current query, for fluid interface
	 */
	public function filterByUnitquantity($unitquantity = null, $comparison = null)
	{
		if (is_array($unitquantity)) {
			$useMinMax = false;
			if (isset($unitquantity['min'])) {
				$this->addUsingAlias(UnitPeer::UNITQUANTITY, $unitquantity['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($unitquantity['max'])) {
				$this->addUsingAlias(UnitPeer::UNITQUANTITY, $unitquantity['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UnitPeer::UNITQUANTITY, $unitquantity, $comparison);
	}

	/**
	 * Filter the query by a related Product object
	 *
	 * @param     Product $product  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UnitQuery The current query, for fluid interface
	 */
	public function filterByProduct($product, $comparison = null)
	{
		return $this
			->addUsingAlias(UnitPeer::ID, $product->getUnitid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Product relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UnitQuery The current query, for fluid interface
	 */
	public function joinProduct($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useProductQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinProduct($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Product', 'ProductQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Unit $unit Object to remove from the list of results
	 *
	 * @return    UnitQuery The current query, for fluid interface
	 */
	public function prune($unit = null)
	{
		if ($unit) {
			$this->addUsingAlias(UnitPeer::ID, $unit->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseUnitQuery
