<?php


/**
 * Base class that represents a query for the 'common_internalMail' table.
 *
 * Mensajes internos
 *
 * @method     InternalMailQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     InternalMailQuery orderBySubject($order = Criteria::ASC) Order by the subject column
 * @method     InternalMailQuery orderByBody($order = Criteria::ASC) Order by the body column
 * @method     InternalMailQuery orderByRecipientid($order = Criteria::ASC) Order by the recipientId column
 * @method     InternalMailQuery orderByRecipienttype($order = Criteria::ASC) Order by the recipientType column
 * @method     InternalMailQuery orderByReadon($order = Criteria::ASC) Order by the readOn column
 * @method     InternalMailQuery orderByFromid($order = Criteria::ASC) Order by the fromId column
 * @method     InternalMailQuery orderByFromtype($order = Criteria::ASC) Order by the fromType column
 * @method     InternalMailQuery orderByTo($order = Criteria::ASC) Order by the to column
 * @method     InternalMailQuery orderByReplyid($order = Criteria::ASC) Order by the replyId column
 * @method     InternalMailQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     InternalMailQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     InternalMailQuery orderByDeletedAt($order = Criteria::ASC) Order by the deleted_at column
 *
 * @method     InternalMailQuery groupById() Group by the id column
 * @method     InternalMailQuery groupBySubject() Group by the subject column
 * @method     InternalMailQuery groupByBody() Group by the body column
 * @method     InternalMailQuery groupByRecipientid() Group by the recipientId column
 * @method     InternalMailQuery groupByRecipienttype() Group by the recipientType column
 * @method     InternalMailQuery groupByReadon() Group by the readOn column
 * @method     InternalMailQuery groupByFromid() Group by the fromId column
 * @method     InternalMailQuery groupByFromtype() Group by the fromType column
 * @method     InternalMailQuery groupByTo() Group by the to column
 * @method     InternalMailQuery groupByReplyid() Group by the replyId column
 * @method     InternalMailQuery groupByCreatedAt() Group by the created_at column
 * @method     InternalMailQuery groupByUpdatedAt() Group by the updated_at column
 * @method     InternalMailQuery groupByDeletedAt() Group by the deleted_at column
 *
 * @method     InternalMailQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     InternalMailQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     InternalMailQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     InternalMailQuery leftJoinInternalMailRelatedByReplyid($relationAlias = null) Adds a LEFT JOIN clause to the query using the InternalMailRelatedByReplyid relation
 * @method     InternalMailQuery rightJoinInternalMailRelatedByReplyid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InternalMailRelatedByReplyid relation
 * @method     InternalMailQuery innerJoinInternalMailRelatedByReplyid($relationAlias = null) Adds a INNER JOIN clause to the query using the InternalMailRelatedByReplyid relation
 *
 * @method     InternalMailQuery leftJoinInternalMailRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the InternalMailRelatedById relation
 * @method     InternalMailQuery rightJoinInternalMailRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InternalMailRelatedById relation
 * @method     InternalMailQuery innerJoinInternalMailRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the InternalMailRelatedById relation
 *
 * @method     InternalMail findOne(PropelPDO $con = null) Return the first InternalMail matching the query
 * @method     InternalMail findOneOrCreate(PropelPDO $con = null) Return the first InternalMail matching the query, or a new InternalMail object populated from the query conditions when no match is found
 *
 * @method     InternalMail findOneById(int $id) Return the first InternalMail filtered by the id column
 * @method     InternalMail findOneBySubject(string $subject) Return the first InternalMail filtered by the subject column
 * @method     InternalMail findOneByBody(string $body) Return the first InternalMail filtered by the body column
 * @method     InternalMail findOneByRecipientid(int $recipientId) Return the first InternalMail filtered by the recipientId column
 * @method     InternalMail findOneByRecipienttype(string $recipientType) Return the first InternalMail filtered by the recipientType column
 * @method     InternalMail findOneByReadon(string $readOn) Return the first InternalMail filtered by the readOn column
 * @method     InternalMail findOneByFromid(int $fromId) Return the first InternalMail filtered by the fromId column
 * @method     InternalMail findOneByFromtype(string $fromType) Return the first InternalMail filtered by the fromType column
 * @method     InternalMail findOneByTo(resource $to) Return the first InternalMail filtered by the to column
 * @method     InternalMail findOneByReplyid(int $replyId) Return the first InternalMail filtered by the replyId column
 * @method     InternalMail findOneByCreatedAt(string $created_at) Return the first InternalMail filtered by the created_at column
 * @method     InternalMail findOneByUpdatedAt(string $updated_at) Return the first InternalMail filtered by the updated_at column
 * @method     InternalMail findOneByDeletedAt(string $deleted_at) Return the first InternalMail filtered by the deleted_at column
 *
 * @method     array findById(int $id) Return InternalMail objects filtered by the id column
 * @method     array findBySubject(string $subject) Return InternalMail objects filtered by the subject column
 * @method     array findByBody(string $body) Return InternalMail objects filtered by the body column
 * @method     array findByRecipientid(int $recipientId) Return InternalMail objects filtered by the recipientId column
 * @method     array findByRecipienttype(string $recipientType) Return InternalMail objects filtered by the recipientType column
 * @method     array findByReadon(string $readOn) Return InternalMail objects filtered by the readOn column
 * @method     array findByFromid(int $fromId) Return InternalMail objects filtered by the fromId column
 * @method     array findByFromtype(string $fromType) Return InternalMail objects filtered by the fromType column
 * @method     array findByTo(resource $to) Return InternalMail objects filtered by the to column
 * @method     array findByReplyid(int $replyId) Return InternalMail objects filtered by the replyId column
 * @method     array findByCreatedAt(string $created_at) Return InternalMail objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return InternalMail objects filtered by the updated_at column
 * @method     array findByDeletedAt(string $deleted_at) Return InternalMail objects filtered by the deleted_at column
 *
 * @package    propel.generator.common.classes.om
 */
abstract class BaseInternalMailQuery extends ModelCriteria
{

	// soft_delete behavior
	protected static $softDelete = true;
	protected $localSoftDelete = true;

	/**
	 * Initializes internal state of BaseInternalMailQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'anmaga', $modelName = 'InternalMail', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new InternalMailQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    InternalMailQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof InternalMailQuery) {
			return $criteria;
		}
		$query = new InternalMailQuery();
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
	 * @return    InternalMail|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = InternalMailPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    InternalMailQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(InternalMailPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    InternalMailQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(InternalMailPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InternalMailQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(InternalMailPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the subject column
	 * 
	 * @param     string $subject The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InternalMailQuery The current query, for fluid interface
	 */
	public function filterBySubject($subject = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($subject)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $subject)) {
				$subject = str_replace('*', '%', $subject);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(InternalMailPeer::SUBJECT, $subject, $comparison);
	}

	/**
	 * Filter the query on the body column
	 * 
	 * @param     string $body The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InternalMailQuery The current query, for fluid interface
	 */
	public function filterByBody($body = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($body)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $body)) {
				$body = str_replace('*', '%', $body);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(InternalMailPeer::BODY, $body, $comparison);
	}

	/**
	 * Filter the query on the recipientId column
	 * 
	 * @param     int|array $recipientid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InternalMailQuery The current query, for fluid interface
	 */
	public function filterByRecipientid($recipientid = null, $comparison = null)
	{
		if (is_array($recipientid)) {
			$useMinMax = false;
			if (isset($recipientid['min'])) {
				$this->addUsingAlias(InternalMailPeer::RECIPIENTID, $recipientid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($recipientid['max'])) {
				$this->addUsingAlias(InternalMailPeer::RECIPIENTID, $recipientid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(InternalMailPeer::RECIPIENTID, $recipientid, $comparison);
	}

	/**
	 * Filter the query on the recipientType column
	 * 
	 * @param     string $recipienttype The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InternalMailQuery The current query, for fluid interface
	 */
	public function filterByRecipienttype($recipienttype = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($recipienttype)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $recipienttype)) {
				$recipienttype = str_replace('*', '%', $recipienttype);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(InternalMailPeer::RECIPIENTTYPE, $recipienttype, $comparison);
	}

	/**
	 * Filter the query on the readOn column
	 * 
	 * @param     string|array $readon The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InternalMailQuery The current query, for fluid interface
	 */
	public function filterByReadon($readon = null, $comparison = null)
	{
		if (is_array($readon)) {
			$useMinMax = false;
			if (isset($readon['min'])) {
				$this->addUsingAlias(InternalMailPeer::READON, $readon['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($readon['max'])) {
				$this->addUsingAlias(InternalMailPeer::READON, $readon['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(InternalMailPeer::READON, $readon, $comparison);
	}

	/**
	 * Filter the query on the fromId column
	 * 
	 * @param     int|array $fromid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InternalMailQuery The current query, for fluid interface
	 */
	public function filterByFromid($fromid = null, $comparison = null)
	{
		if (is_array($fromid)) {
			$useMinMax = false;
			if (isset($fromid['min'])) {
				$this->addUsingAlias(InternalMailPeer::FROMID, $fromid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fromid['max'])) {
				$this->addUsingAlias(InternalMailPeer::FROMID, $fromid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(InternalMailPeer::FROMID, $fromid, $comparison);
	}

	/**
	 * Filter the query on the fromType column
	 * 
	 * @param     string $fromtype The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InternalMailQuery The current query, for fluid interface
	 */
	public function filterByFromtype($fromtype = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($fromtype)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $fromtype)) {
				$fromtype = str_replace('*', '%', $fromtype);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(InternalMailPeer::FROMTYPE, $fromtype, $comparison);
	}

	/**
	 * Filter the query on the to column
	 * 
	 * @param     mixed $to The value to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InternalMailQuery The current query, for fluid interface
	 */
	public function filterByTo($to = null, $comparison = null)
	{
		return $this->addUsingAlias(InternalMailPeer::TO, $to, $comparison);
	}

	/**
	 * Filter the query on the replyId column
	 * 
	 * @param     int|array $replyid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InternalMailQuery The current query, for fluid interface
	 */
	public function filterByReplyid($replyid = null, $comparison = null)
	{
		if (is_array($replyid)) {
			$useMinMax = false;
			if (isset($replyid['min'])) {
				$this->addUsingAlias(InternalMailPeer::REPLYID, $replyid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($replyid['max'])) {
				$this->addUsingAlias(InternalMailPeer::REPLYID, $replyid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(InternalMailPeer::REPLYID, $replyid, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InternalMailQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(InternalMailPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(InternalMailPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(InternalMailPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InternalMailQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(InternalMailPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(InternalMailPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(InternalMailPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query on the deleted_at column
	 * 
	 * @param     string|array $deletedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InternalMailQuery The current query, for fluid interface
	 */
	public function filterByDeletedAt($deletedAt = null, $comparison = null)
	{
		if (is_array($deletedAt)) {
			$useMinMax = false;
			if (isset($deletedAt['min'])) {
				$this->addUsingAlias(InternalMailPeer::DELETED_AT, $deletedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($deletedAt['max'])) {
				$this->addUsingAlias(InternalMailPeer::DELETED_AT, $deletedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(InternalMailPeer::DELETED_AT, $deletedAt, $comparison);
	}

	/**
	 * Filter the query by a related InternalMail object
	 *
	 * @param     InternalMail $internalMail  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InternalMailQuery The current query, for fluid interface
	 */
	public function filterByInternalMailRelatedByReplyid($internalMail, $comparison = null)
	{
		return $this
			->addUsingAlias(InternalMailPeer::REPLYID, $internalMail->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the InternalMailRelatedByReplyid relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    InternalMailQuery The current query, for fluid interface
	 */
	public function joinInternalMailRelatedByReplyid($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('InternalMailRelatedByReplyid');
		
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
			$this->addJoinObject($join, 'InternalMailRelatedByReplyid');
		}
		
		return $this;
	}

	/**
	 * Use the InternalMailRelatedByReplyid relation InternalMail object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    InternalMailQuery A secondary query class using the current class as primary query
	 */
	public function useInternalMailRelatedByReplyidQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinInternalMailRelatedByReplyid($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'InternalMailRelatedByReplyid', 'InternalMailQuery');
	}

	/**
	 * Filter the query by a related InternalMail object
	 *
	 * @param     InternalMail $internalMail  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InternalMailQuery The current query, for fluid interface
	 */
	public function filterByInternalMailRelatedById($internalMail, $comparison = null)
	{
		return $this
			->addUsingAlias(InternalMailPeer::ID, $internalMail->getReplyid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the InternalMailRelatedById relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    InternalMailQuery The current query, for fluid interface
	 */
	public function joinInternalMailRelatedById($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('InternalMailRelatedById');
		
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
			$this->addJoinObject($join, 'InternalMailRelatedById');
		}
		
		return $this;
	}

	/**
	 * Use the InternalMailRelatedById relation InternalMail object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    InternalMailQuery A secondary query class using the current class as primary query
	 */
	public function useInternalMailRelatedByIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinInternalMailRelatedById($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'InternalMailRelatedById', 'InternalMailQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     InternalMail $internalMail Object to remove from the list of results
	 *
	 * @return    InternalMailQuery The current query, for fluid interface
	 */
	public function prune($internalMail = null)
	{
		if ($internalMail) {
			$this->addUsingAlias(InternalMailPeer::ID, $internalMail->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	/**
	 * Code to execute before every SELECT statement
	 * 
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreSelect(PropelPDO $con)
	{
		// soft_delete behavior
		if (InternalMailQuery::isSoftDeleteEnabled() && $this->localSoftDelete) {
			$this->addUsingAlias(InternalMailPeer::DELETED_AT, null, Criteria::ISNULL);
		} else {
			InternalMailPeer::enableSoftDelete();
		}
		
		return $this->preSelect($con);
	}

	/**
	 * Code to execute before every DELETE statement
	 * 
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreDelete(PropelPDO $con)
	{
		// soft_delete behavior
		if (InternalMailQuery::isSoftDeleteEnabled() && $this->localSoftDelete) {
			return $this->softDelete($con);
		} else {
			return $this->hasWhereClause() ? $this->forceDelete($con) : $this->forceDeleteAll($con);
		}
		
		return $this->preDelete($con);
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     InternalMailQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(InternalMailPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     InternalMailQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(InternalMailPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     InternalMailQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(InternalMailPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     InternalMailQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(InternalMailPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     InternalMailQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(InternalMailPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     InternalMailQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(InternalMailPeer::CREATED_AT);
	}

	// soft_delete behavior
	
	/**
	 * Temporarily disable the filter on deleted rows
	 * Valid only for the current query
	 * 
	 * @see InternalMailQuery::disableSoftDelete() to disable the filter for more than one query
	 *
	 * @return InternalMailQuery The current query, for fuid interface
	 */
	public function includeDeleted()
	{
		$this->localSoftDelete = false;
		return $this;
	}
	
	/**
	 * Soft delete the selected rows
	 *
	 * @param			PropelPDO $con an optional connection object
	 *
	 * @return		int Number of updated rows
	 */
	public function softDelete(PropelPDO $con = null)
	{
		return $this->update(array('DeletedAt' => time()), $con);
	}
	
	/**
	 * Bypass the soft_delete behavior and force a hard delete of the selected rows
	 *
	 * @param			PropelPDO $con an optional connection object
	 *
	 * @return		int Number of deleted rows
	 */
	public function forceDelete(PropelPDO $con = null)
	{
		return InternalMailPeer::doForceDelete($this, $con);
	}
	
	/**
	 * Bypass the soft_delete behavior and force a hard delete of all the rows
	 *
	 * @param			PropelPDO $con an optional connection object
	 *
	 * @return		int Number of deleted rows
	 */
	public function forceDeleteAll(PropelPDO $con = null)
	{
		return InternalMailPeer::doForceDeleteAll($con);}
	
	/**
	 * Undelete selected rows
	 *
	 * @param			PropelPDO $con an optional connection object
	 *
	 * @return		int The number of rows affected by this update and any referring fk objects' save() operations.
	 */
	public function unDelete(PropelPDO $con = null)
	{
		return $this->update(array('DeletedAt' => null), $con);
	}
		
	/**
	 * Enable the soft_delete behavior for this model
	 */
	public static function enableSoftDelete()
	{
		self::$softDelete = true;
	}
	
	/**
	 * Disable the soft_delete behavior for this model
	 */
	public static function disableSoftDelete()
	{
		self::$softDelete = false;
	}
	
	/**
	 * Check the soft_delete behavior for this model
	 *
	 * @return boolean true if the soft_delete behavior is enabled
	 */
	public static function isSoftDeleteEnabled()
	{
		return self::$softDelete;
	}

} // BaseInternalMailQuery
