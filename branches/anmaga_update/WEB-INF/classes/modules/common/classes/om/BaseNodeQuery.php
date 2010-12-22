<?php


/**
 * Base class that represents a query for the 'node' table.
 *
 * Nodo del Arbol
 *
 * @method     NodeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     NodeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     NodeQuery orderByKind($order = Criteria::ASC) Order by the kind column
 * @method     NodeQuery orderByObjectid($order = Criteria::ASC) Order by the objectId column
 * @method     NodeQuery orderByParentid($order = Criteria::ASC) Order by the parentId column
 * @method     NodeQuery orderByPosition($order = Criteria::ASC) Order by the position column
 *
 * @method     NodeQuery groupById() Group by the id column
 * @method     NodeQuery groupByName() Group by the name column
 * @method     NodeQuery groupByKind() Group by the kind column
 * @method     NodeQuery groupByObjectid() Group by the objectId column
 * @method     NodeQuery groupByParentid() Group by the parentId column
 * @method     NodeQuery groupByPosition() Group by the position column
 *
 * @method     NodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     NodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     NodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     NodeQuery leftJoinNodeRelatedByParentid($relationAlias = null) Adds a LEFT JOIN clause to the query using the NodeRelatedByParentid relation
 * @method     NodeQuery rightJoinNodeRelatedByParentid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NodeRelatedByParentid relation
 * @method     NodeQuery innerJoinNodeRelatedByParentid($relationAlias = null) Adds a INNER JOIN clause to the query using the NodeRelatedByParentid relation
 *
 * @method     NodeQuery leftJoinNodeRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the NodeRelatedById relation
 * @method     NodeQuery rightJoinNodeRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NodeRelatedById relation
 * @method     NodeQuery innerJoinNodeRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the NodeRelatedById relation
 *
 * @method     Node findOne(PropelPDO $con = null) Return the first Node matching the query
 * @method     Node findOneOrCreate(PropelPDO $con = null) Return the first Node matching the query, or a new Node object populated from the query conditions when no match is found
 *
 * @method     Node findOneById(int $id) Return the first Node filtered by the id column
 * @method     Node findOneByName(string $name) Return the first Node filtered by the name column
 * @method     Node findOneByKind(string $kind) Return the first Node filtered by the kind column
 * @method     Node findOneByObjectid(int $objectId) Return the first Node filtered by the objectId column
 * @method     Node findOneByParentid(int $parentId) Return the first Node filtered by the parentId column
 * @method     Node findOneByPosition(int $position) Return the first Node filtered by the position column
 *
 * @method     array findById(int $id) Return Node objects filtered by the id column
 * @method     array findByName(string $name) Return Node objects filtered by the name column
 * @method     array findByKind(string $kind) Return Node objects filtered by the kind column
 * @method     array findByObjectid(int $objectId) Return Node objects filtered by the objectId column
 * @method     array findByParentid(int $parentId) Return Node objects filtered by the parentId column
 * @method     array findByPosition(int $position) Return Node objects filtered by the position column
 *
 * @package    propel.generator.common.classes.om
 */
abstract class BaseNodeQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseNodeQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'anmaga', $modelName = 'Node', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new NodeQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    NodeQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof NodeQuery) {
			return $criteria;
		}
		$query = new NodeQuery();
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
	 * @return    Node|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = NodePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    NodeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(NodePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    NodeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(NodePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NodeQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(NodePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NodeQuery The current query, for fluid interface
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
		return $this->addUsingAlias(NodePeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the kind column
	 * 
	 * @param     string $kind The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NodeQuery The current query, for fluid interface
	 */
	public function filterByKind($kind = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($kind)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $kind)) {
				$kind = str_replace('*', '%', $kind);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(NodePeer::KIND, $kind, $comparison);
	}

	/**
	 * Filter the query on the objectId column
	 * 
	 * @param     int|array $objectid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NodeQuery The current query, for fluid interface
	 */
	public function filterByObjectid($objectid = null, $comparison = null)
	{
		if (is_array($objectid)) {
			$useMinMax = false;
			if (isset($objectid['min'])) {
				$this->addUsingAlias(NodePeer::OBJECTID, $objectid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($objectid['max'])) {
				$this->addUsingAlias(NodePeer::OBJECTID, $objectid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NodePeer::OBJECTID, $objectid, $comparison);
	}

	/**
	 * Filter the query on the parentId column
	 * 
	 * @param     int|array $parentid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NodeQuery The current query, for fluid interface
	 */
	public function filterByParentid($parentid = null, $comparison = null)
	{
		if (is_array($parentid)) {
			$useMinMax = false;
			if (isset($parentid['min'])) {
				$this->addUsingAlias(NodePeer::PARENTID, $parentid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($parentid['max'])) {
				$this->addUsingAlias(NodePeer::PARENTID, $parentid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NodePeer::PARENTID, $parentid, $comparison);
	}

	/**
	 * Filter the query on the position column
	 * 
	 * @param     int|array $position The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NodeQuery The current query, for fluid interface
	 */
	public function filterByPosition($position = null, $comparison = null)
	{
		if (is_array($position)) {
			$useMinMax = false;
			if (isset($position['min'])) {
				$this->addUsingAlias(NodePeer::POSITION, $position['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($position['max'])) {
				$this->addUsingAlias(NodePeer::POSITION, $position['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NodePeer::POSITION, $position, $comparison);
	}

	/**
	 * Filter the query by a related Node object
	 *
	 * @param     Node $node  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NodeQuery The current query, for fluid interface
	 */
	public function filterByNodeRelatedByParentid($node, $comparison = null)
	{
		return $this
			->addUsingAlias(NodePeer::PARENTID, $node->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the NodeRelatedByParentid relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NodeQuery The current query, for fluid interface
	 */
	public function joinNodeRelatedByParentid($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('NodeRelatedByParentid');
		
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
			$this->addJoinObject($join, 'NodeRelatedByParentid');
		}
		
		return $this;
	}

	/**
	 * Use the NodeRelatedByParentid relation Node object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NodeQuery A secondary query class using the current class as primary query
	 */
	public function useNodeRelatedByParentidQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinNodeRelatedByParentid($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'NodeRelatedByParentid', 'NodeQuery');
	}

	/**
	 * Filter the query by a related Node object
	 *
	 * @param     Node $node  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NodeQuery The current query, for fluid interface
	 */
	public function filterByNodeRelatedById($node, $comparison = null)
	{
		return $this
			->addUsingAlias(NodePeer::ID, $node->getParentid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the NodeRelatedById relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NodeQuery The current query, for fluid interface
	 */
	public function joinNodeRelatedById($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('NodeRelatedById');
		
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
			$this->addJoinObject($join, 'NodeRelatedById');
		}
		
		return $this;
	}

	/**
	 * Use the NodeRelatedById relation Node object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NodeQuery A secondary query class using the current class as primary query
	 */
	public function useNodeRelatedByIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinNodeRelatedById($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'NodeRelatedById', 'NodeQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Node $node Object to remove from the list of results
	 *
	 * @return    NodeQuery The current query, for fluid interface
	 */
	public function prune($node = null)
	{
		if ($node) {
			$this->addUsingAlias(NodePeer::ID, $node->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseNodeQuery
