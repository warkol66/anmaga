<?php


/**
 * Base class that represents a query for the 'import_supplierQuoteItemComment' table.
 *
 * Feedback entre supplier y usuario admin de anmaga sobre un Item
 *
 * @method     SupplierQuoteItemCommentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SupplierQuoteItemCommentQuery orderBySupplierquoteitemid($order = Criteria::ASC) Order by the supplierQuoteItemId column
 * @method     SupplierQuoteItemCommentQuery orderBySupplierid($order = Criteria::ASC) Order by the supplierId column
 * @method     SupplierQuoteItemCommentQuery orderByUserid($order = Criteria::ASC) Order by the userId column
 * @method     SupplierQuoteItemCommentQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     SupplierQuoteItemCommentQuery orderByComments($order = Criteria::ASC) Order by the comments column
 * @method     SupplierQuoteItemCommentQuery orderByDelivery($order = Criteria::ASC) Order by the delivery column
 * @method     SupplierQuoteItemCommentQuery orderByCreatedat($order = Criteria::ASC) Order by the createdAt column
 *
 * @method     SupplierQuoteItemCommentQuery groupById() Group by the id column
 * @method     SupplierQuoteItemCommentQuery groupBySupplierquoteitemid() Group by the supplierQuoteItemId column
 * @method     SupplierQuoteItemCommentQuery groupBySupplierid() Group by the supplierId column
 * @method     SupplierQuoteItemCommentQuery groupByUserid() Group by the userId column
 * @method     SupplierQuoteItemCommentQuery groupByPrice() Group by the price column
 * @method     SupplierQuoteItemCommentQuery groupByComments() Group by the comments column
 * @method     SupplierQuoteItemCommentQuery groupByDelivery() Group by the delivery column
 * @method     SupplierQuoteItemCommentQuery groupByCreatedat() Group by the createdAt column
 *
 * @method     SupplierQuoteItemCommentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SupplierQuoteItemCommentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SupplierQuoteItemCommentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SupplierQuoteItemCommentQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     SupplierQuoteItemCommentQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     SupplierQuoteItemCommentQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     SupplierQuoteItemCommentQuery leftJoinSupplier($relationAlias = null) Adds a LEFT JOIN clause to the query using the Supplier relation
 * @method     SupplierQuoteItemCommentQuery rightJoinSupplier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Supplier relation
 * @method     SupplierQuoteItemCommentQuery innerJoinSupplier($relationAlias = null) Adds a INNER JOIN clause to the query using the Supplier relation
 *
 * @method     SupplierQuoteItemCommentQuery leftJoinSupplierQuoteItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierQuoteItem relation
 * @method     SupplierQuoteItemCommentQuery rightJoinSupplierQuoteItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierQuoteItem relation
 * @method     SupplierQuoteItemCommentQuery innerJoinSupplierQuoteItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierQuoteItem relation
 *
 * @method     SupplierQuoteItemComment findOne(PropelPDO $con = null) Return the first SupplierQuoteItemComment matching the query
 * @method     SupplierQuoteItemComment findOneOrCreate(PropelPDO $con = null) Return the first SupplierQuoteItemComment matching the query, or a new SupplierQuoteItemComment object populated from the query conditions when no match is found
 *
 * @method     SupplierQuoteItemComment findOneById(int $id) Return the first SupplierQuoteItemComment filtered by the id column
 * @method     SupplierQuoteItemComment findOneBySupplierquoteitemid(int $supplierQuoteItemId) Return the first SupplierQuoteItemComment filtered by the supplierQuoteItemId column
 * @method     SupplierQuoteItemComment findOneBySupplierid(int $supplierId) Return the first SupplierQuoteItemComment filtered by the supplierId column
 * @method     SupplierQuoteItemComment findOneByUserid(int $userId) Return the first SupplierQuoteItemComment filtered by the userId column
 * @method     SupplierQuoteItemComment findOneByPrice(double $price) Return the first SupplierQuoteItemComment filtered by the price column
 * @method     SupplierQuoteItemComment findOneByComments(string $comments) Return the first SupplierQuoteItemComment filtered by the comments column
 * @method     SupplierQuoteItemComment findOneByDelivery(int $delivery) Return the first SupplierQuoteItemComment filtered by the delivery column
 * @method     SupplierQuoteItemComment findOneByCreatedat(string $createdAt) Return the first SupplierQuoteItemComment filtered by the createdAt column
 *
 * @method     array findById(int $id) Return SupplierQuoteItemComment objects filtered by the id column
 * @method     array findBySupplierquoteitemid(int $supplierQuoteItemId) Return SupplierQuoteItemComment objects filtered by the supplierQuoteItemId column
 * @method     array findBySupplierid(int $supplierId) Return SupplierQuoteItemComment objects filtered by the supplierId column
 * @method     array findByUserid(int $userId) Return SupplierQuoteItemComment objects filtered by the userId column
 * @method     array findByPrice(double $price) Return SupplierQuoteItemComment objects filtered by the price column
 * @method     array findByComments(string $comments) Return SupplierQuoteItemComment objects filtered by the comments column
 * @method     array findByDelivery(int $delivery) Return SupplierQuoteItemComment objects filtered by the delivery column
 * @method     array findByCreatedat(string $createdAt) Return SupplierQuoteItemComment objects filtered by the createdAt column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseSupplierQuoteItemCommentQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSupplierQuoteItemCommentQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'SupplierQuoteItemComment', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SupplierQuoteItemCommentQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SupplierQuoteItemCommentQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SupplierQuoteItemCommentQuery) {
			return $criteria;
		}
		$query = new SupplierQuoteItemCommentQuery();
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
	 * @return    SupplierQuoteItemComment|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SupplierQuoteItemCommentPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SupplierQuoteItemCommentQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SupplierQuoteItemCommentPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SupplierQuoteItemCommentQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SupplierQuoteItemCommentPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemCommentQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SupplierQuoteItemCommentPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the supplierQuoteItemId column
	 * 
	 * @param     int|array $supplierquoteitemid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemCommentQuery The current query, for fluid interface
	 */
	public function filterBySupplierquoteitemid($supplierquoteitemid = null, $comparison = null)
	{
		if (is_array($supplierquoteitemid)) {
			$useMinMax = false;
			if (isset($supplierquoteitemid['min'])) {
				$this->addUsingAlias(SupplierQuoteItemCommentPeer::SUPPLIERQUOTEITEMID, $supplierquoteitemid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($supplierquoteitemid['max'])) {
				$this->addUsingAlias(SupplierQuoteItemCommentPeer::SUPPLIERQUOTEITEMID, $supplierquoteitemid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemCommentPeer::SUPPLIERQUOTEITEMID, $supplierquoteitemid, $comparison);
	}

	/**
	 * Filter the query on the supplierId column
	 * 
	 * @param     int|array $supplierid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemCommentQuery The current query, for fluid interface
	 */
	public function filterBySupplierid($supplierid = null, $comparison = null)
	{
		if (is_array($supplierid)) {
			$useMinMax = false;
			if (isset($supplierid['min'])) {
				$this->addUsingAlias(SupplierQuoteItemCommentPeer::SUPPLIERID, $supplierid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($supplierid['max'])) {
				$this->addUsingAlias(SupplierQuoteItemCommentPeer::SUPPLIERID, $supplierid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemCommentPeer::SUPPLIERID, $supplierid, $comparison);
	}

	/**
	 * Filter the query on the userId column
	 * 
	 * @param     int|array $userid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemCommentQuery The current query, for fluid interface
	 */
	public function filterByUserid($userid = null, $comparison = null)
	{
		if (is_array($userid)) {
			$useMinMax = false;
			if (isset($userid['min'])) {
				$this->addUsingAlias(SupplierQuoteItemCommentPeer::USERID, $userid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userid['max'])) {
				$this->addUsingAlias(SupplierQuoteItemCommentPeer::USERID, $userid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemCommentPeer::USERID, $userid, $comparison);
	}

	/**
	 * Filter the query on the price column
	 * 
	 * @param     double|array $price The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemCommentQuery The current query, for fluid interface
	 */
	public function filterByPrice($price = null, $comparison = null)
	{
		if (is_array($price)) {
			$useMinMax = false;
			if (isset($price['min'])) {
				$this->addUsingAlias(SupplierQuoteItemCommentPeer::PRICE, $price['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($price['max'])) {
				$this->addUsingAlias(SupplierQuoteItemCommentPeer::PRICE, $price['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemCommentPeer::PRICE, $price, $comparison);
	}

	/**
	 * Filter the query on the comments column
	 * 
	 * @param     string $comments The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemCommentQuery The current query, for fluid interface
	 */
	public function filterByComments($comments = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($comments)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $comments)) {
				$comments = str_replace('*', '%', $comments);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemCommentPeer::COMMENTS, $comments, $comparison);
	}

	/**
	 * Filter the query on the delivery column
	 * 
	 * @param     int|array $delivery The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemCommentQuery The current query, for fluid interface
	 */
	public function filterByDelivery($delivery = null, $comparison = null)
	{
		if (is_array($delivery)) {
			$useMinMax = false;
			if (isset($delivery['min'])) {
				$this->addUsingAlias(SupplierQuoteItemCommentPeer::DELIVERY, $delivery['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($delivery['max'])) {
				$this->addUsingAlias(SupplierQuoteItemCommentPeer::DELIVERY, $delivery['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemCommentPeer::DELIVERY, $delivery, $comparison);
	}

	/**
	 * Filter the query on the createdAt column
	 * 
	 * @param     string|array $createdat The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemCommentQuery The current query, for fluid interface
	 */
	public function filterByCreatedat($createdat = null, $comparison = null)
	{
		if (is_array($createdat)) {
			$useMinMax = false;
			if (isset($createdat['min'])) {
				$this->addUsingAlias(SupplierQuoteItemCommentPeer::CREATEDAT, $createdat['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdat['max'])) {
				$this->addUsingAlias(SupplierQuoteItemCommentPeer::CREATEDAT, $createdat['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemCommentPeer::CREATEDAT, $createdat, $comparison);
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemCommentQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierQuoteItemCommentPeer::USERID, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the User relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteItemCommentQuery The current query, for fluid interface
	 */
	public function joinUser($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('User');
		
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
			$this->addJoinObject($join, 'User');
		}
		
		return $this;
	}

	/**
	 * Use the User relation User object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery A secondary query class using the current class as primary query
	 */
	public function useUserQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'User', 'UserQuery');
	}

	/**
	 * Filter the query by a related Supplier object
	 *
	 * @param     Supplier $supplier  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemCommentQuery The current query, for fluid interface
	 */
	public function filterBySupplier($supplier, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierQuoteItemCommentPeer::SUPPLIERID, $supplier->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Supplier relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteItemCommentQuery The current query, for fluid interface
	 */
	public function joinSupplier($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useSupplierQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	 * @return    SupplierQuoteItemCommentQuery The current query, for fluid interface
	 */
	public function filterBySupplierQuoteItem($supplierQuoteItem, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierQuoteItemCommentPeer::SUPPLIERQUOTEITEMID, $supplierQuoteItem->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierQuoteItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteItemCommentQuery The current query, for fluid interface
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
	 * @param     SupplierQuoteItemComment $supplierQuoteItemComment Object to remove from the list of results
	 *
	 * @return    SupplierQuoteItemCommentQuery The current query, for fluid interface
	 */
	public function prune($supplierQuoteItemComment = null)
	{
		if ($supplierQuoteItemComment) {
			$this->addUsingAlias(SupplierQuoteItemCommentPeer::ID, $supplierQuoteItemComment->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSupplierQuoteItemCommentQuery
