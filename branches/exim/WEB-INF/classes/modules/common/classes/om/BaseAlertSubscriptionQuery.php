<?php


/**
 * Base class that represents a query for the 'common_alertSubscription' table.
 *
 * Suscripciones de alerta
 *
 * @method     AlertSubscriptionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AlertSubscriptionQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     AlertSubscriptionQuery orderByEntityname($order = Criteria::ASC) Order by the entityName column
 * @method     AlertSubscriptionQuery orderByEntityfielduniquename($order = Criteria::ASC) Order by the entityFieldUniqueName column
 * @method     AlertSubscriptionQuery orderByAnticipationdays($order = Criteria::ASC) Order by the anticipationDays column
 * @method     AlertSubscriptionQuery orderByEntitynamefielduniquename($order = Criteria::ASC) Order by the entityNameFieldUniqueName column
 * @method     AlertSubscriptionQuery orderByExtrarecipients($order = Criteria::ASC) Order by the extraRecipients column
 *
 * @method     AlertSubscriptionQuery groupById() Group by the id column
 * @method     AlertSubscriptionQuery groupByName() Group by the name column
 * @method     AlertSubscriptionQuery groupByEntityname() Group by the entityName column
 * @method     AlertSubscriptionQuery groupByEntityfielduniquename() Group by the entityFieldUniqueName column
 * @method     AlertSubscriptionQuery groupByAnticipationdays() Group by the anticipationDays column
 * @method     AlertSubscriptionQuery groupByEntitynamefielduniquename() Group by the entityNameFieldUniqueName column
 * @method     AlertSubscriptionQuery groupByExtrarecipients() Group by the extraRecipients column
 *
 * @method     AlertSubscriptionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AlertSubscriptionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AlertSubscriptionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AlertSubscriptionQuery leftJoinModuleEntity($relationAlias = null) Adds a LEFT JOIN clause to the query using the ModuleEntity relation
 * @method     AlertSubscriptionQuery rightJoinModuleEntity($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ModuleEntity relation
 * @method     AlertSubscriptionQuery innerJoinModuleEntity($relationAlias = null) Adds a INNER JOIN clause to the query using the ModuleEntity relation
 *
 * @method     AlertSubscriptionQuery leftJoinModuleEntityFieldRelatedByEntityfielduniquename($relationAlias = null) Adds a LEFT JOIN clause to the query using the ModuleEntityFieldRelatedByEntityfielduniquename relation
 * @method     AlertSubscriptionQuery rightJoinModuleEntityFieldRelatedByEntityfielduniquename($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ModuleEntityFieldRelatedByEntityfielduniquename relation
 * @method     AlertSubscriptionQuery innerJoinModuleEntityFieldRelatedByEntityfielduniquename($relationAlias = null) Adds a INNER JOIN clause to the query using the ModuleEntityFieldRelatedByEntityfielduniquename relation
 *
 * @method     AlertSubscriptionQuery leftJoinModuleEntityFieldRelatedByEntitynamefielduniquename($relationAlias = null) Adds a LEFT JOIN clause to the query using the ModuleEntityFieldRelatedByEntitynamefielduniquename relation
 * @method     AlertSubscriptionQuery rightJoinModuleEntityFieldRelatedByEntitynamefielduniquename($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ModuleEntityFieldRelatedByEntitynamefielduniquename relation
 * @method     AlertSubscriptionQuery innerJoinModuleEntityFieldRelatedByEntitynamefielduniquename($relationAlias = null) Adds a INNER JOIN clause to the query using the ModuleEntityFieldRelatedByEntitynamefielduniquename relation
 *
 * @method     AlertSubscriptionQuery leftJoinAlertSubscriptionUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the AlertSubscriptionUser relation
 * @method     AlertSubscriptionQuery rightJoinAlertSubscriptionUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AlertSubscriptionUser relation
 * @method     AlertSubscriptionQuery innerJoinAlertSubscriptionUser($relationAlias = null) Adds a INNER JOIN clause to the query using the AlertSubscriptionUser relation
 *
 * @method     AlertSubscription findOne(PropelPDO $con = null) Return the first AlertSubscription matching the query
 * @method     AlertSubscription findOneOrCreate(PropelPDO $con = null) Return the first AlertSubscription matching the query, or a new AlertSubscription object populated from the query conditions when no match is found
 *
 * @method     AlertSubscription findOneById(int $id) Return the first AlertSubscription filtered by the id column
 * @method     AlertSubscription findOneByName(string $name) Return the first AlertSubscription filtered by the name column
 * @method     AlertSubscription findOneByEntityname(string $entityName) Return the first AlertSubscription filtered by the entityName column
 * @method     AlertSubscription findOneByEntityfielduniquename(string $entityFieldUniqueName) Return the first AlertSubscription filtered by the entityFieldUniqueName column
 * @method     AlertSubscription findOneByAnticipationdays(int $anticipationDays) Return the first AlertSubscription filtered by the anticipationDays column
 * @method     AlertSubscription findOneByEntitynamefielduniquename(string $entityNameFieldUniqueName) Return the first AlertSubscription filtered by the entityNameFieldUniqueName column
 * @method     AlertSubscription findOneByExtrarecipients(string $extraRecipients) Return the first AlertSubscription filtered by the extraRecipients column
 *
 * @method     array findById(int $id) Return AlertSubscription objects filtered by the id column
 * @method     array findByName(string $name) Return AlertSubscription objects filtered by the name column
 * @method     array findByEntityname(string $entityName) Return AlertSubscription objects filtered by the entityName column
 * @method     array findByEntityfielduniquename(string $entityFieldUniqueName) Return AlertSubscription objects filtered by the entityFieldUniqueName column
 * @method     array findByAnticipationdays(int $anticipationDays) Return AlertSubscription objects filtered by the anticipationDays column
 * @method     array findByEntitynamefielduniquename(string $entityNameFieldUniqueName) Return AlertSubscription objects filtered by the entityNameFieldUniqueName column
 * @method     array findByExtrarecipients(string $extraRecipients) Return AlertSubscription objects filtered by the extraRecipients column
 *
 * @package    propel.generator.common.classes.om
 */
abstract class BaseAlertSubscriptionQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAlertSubscriptionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'AlertSubscription', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AlertSubscriptionQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AlertSubscriptionQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AlertSubscriptionQuery) {
			return $criteria;
		}
		$query = new AlertSubscriptionQuery();
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
	 * @return    AlertSubscription|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AlertSubscriptionPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AlertSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AlertSubscriptionPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AlertSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AlertSubscriptionPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlertSubscriptionQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AlertSubscriptionPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlertSubscriptionQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AlertSubscriptionPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the entityName column
	 * 
	 * @param     string $entityname The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlertSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByEntityname($entityname = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($entityname)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $entityname)) {
				$entityname = str_replace('*', '%', $entityname);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AlertSubscriptionPeer::ENTITYNAME, $entityname, $comparison);
	}

	/**
	 * Filter the query on the entityFieldUniqueName column
	 * 
	 * @param     string $entityfielduniquename The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlertSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByEntityfielduniquename($entityfielduniquename = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($entityfielduniquename)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $entityfielduniquename)) {
				$entityfielduniquename = str_replace('*', '%', $entityfielduniquename);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AlertSubscriptionPeer::ENTITYFIELDUNIQUENAME, $entityfielduniquename, $comparison);
	}

	/**
	 * Filter the query on the anticipationDays column
	 * 
	 * @param     int|array $anticipationdays The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlertSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByAnticipationdays($anticipationdays = null, $comparison = null)
	{
		if (is_array($anticipationdays)) {
			$useMinMax = false;
			if (isset($anticipationdays['min'])) {
				$this->addUsingAlias(AlertSubscriptionPeer::ANTICIPATIONDAYS, $anticipationdays['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($anticipationdays['max'])) {
				$this->addUsingAlias(AlertSubscriptionPeer::ANTICIPATIONDAYS, $anticipationdays['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AlertSubscriptionPeer::ANTICIPATIONDAYS, $anticipationdays, $comparison);
	}

	/**
	 * Filter the query on the entityNameFieldUniqueName column
	 * 
	 * @param     string $entitynamefielduniquename The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlertSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByEntitynamefielduniquename($entitynamefielduniquename = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($entitynamefielduniquename)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $entitynamefielduniquename)) {
				$entitynamefielduniquename = str_replace('*', '%', $entitynamefielduniquename);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AlertSubscriptionPeer::ENTITYNAMEFIELDUNIQUENAME, $entitynamefielduniquename, $comparison);
	}

	/**
	 * Filter the query on the extraRecipients column
	 * 
	 * @param     string $extrarecipients The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlertSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByExtrarecipients($extrarecipients = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($extrarecipients)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $extrarecipients)) {
				$extrarecipients = str_replace('*', '%', $extrarecipients);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AlertSubscriptionPeer::EXTRARECIPIENTS, $extrarecipients, $comparison);
	}

	/**
	 * Filter the query by a related ModuleEntity object
	 *
	 * @param     ModuleEntity $moduleEntity  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlertSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByModuleEntity($moduleEntity, $comparison = null)
	{
		return $this
			->addUsingAlias(AlertSubscriptionPeer::ENTITYNAME, $moduleEntity->getName(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ModuleEntity relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlertSubscriptionQuery The current query, for fluid interface
	 */
	public function joinModuleEntity($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ModuleEntity');
		
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
			$this->addJoinObject($join, 'ModuleEntity');
		}
		
		return $this;
	}

	/**
	 * Use the ModuleEntity relation ModuleEntity object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityQuery A secondary query class using the current class as primary query
	 */
	public function useModuleEntityQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinModuleEntity($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ModuleEntity', 'ModuleEntityQuery');
	}

	/**
	 * Filter the query by a related ModuleEntityField object
	 *
	 * @param     ModuleEntityField $moduleEntityField  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlertSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByModuleEntityFieldRelatedByEntityfielduniquename($moduleEntityField, $comparison = null)
	{
		return $this
			->addUsingAlias(AlertSubscriptionPeer::ENTITYFIELDUNIQUENAME, $moduleEntityField->getUniquename(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ModuleEntityFieldRelatedByEntityfielduniquename relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlertSubscriptionQuery The current query, for fluid interface
	 */
	public function joinModuleEntityFieldRelatedByEntityfielduniquename($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ModuleEntityFieldRelatedByEntityfielduniquename');
		
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
			$this->addJoinObject($join, 'ModuleEntityFieldRelatedByEntityfielduniquename');
		}
		
		return $this;
	}

	/**
	 * Use the ModuleEntityFieldRelatedByEntityfielduniquename relation ModuleEntityField object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityFieldQuery A secondary query class using the current class as primary query
	 */
	public function useModuleEntityFieldRelatedByEntityfielduniquenameQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinModuleEntityFieldRelatedByEntityfielduniquename($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ModuleEntityFieldRelatedByEntityfielduniquename', 'ModuleEntityFieldQuery');
	}

	/**
	 * Filter the query by a related ModuleEntityField object
	 *
	 * @param     ModuleEntityField $moduleEntityField  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlertSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByModuleEntityFieldRelatedByEntitynamefielduniquename($moduleEntityField, $comparison = null)
	{
		return $this
			->addUsingAlias(AlertSubscriptionPeer::ENTITYNAMEFIELDUNIQUENAME, $moduleEntityField->getUniquename(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ModuleEntityFieldRelatedByEntitynamefielduniquename relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlertSubscriptionQuery The current query, for fluid interface
	 */
	public function joinModuleEntityFieldRelatedByEntitynamefielduniquename($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ModuleEntityFieldRelatedByEntitynamefielduniquename');
		
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
			$this->addJoinObject($join, 'ModuleEntityFieldRelatedByEntitynamefielduniquename');
		}
		
		return $this;
	}

	/**
	 * Use the ModuleEntityFieldRelatedByEntitynamefielduniquename relation ModuleEntityField object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityFieldQuery A secondary query class using the current class as primary query
	 */
	public function useModuleEntityFieldRelatedByEntitynamefielduniquenameQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinModuleEntityFieldRelatedByEntitynamefielduniquename($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ModuleEntityFieldRelatedByEntitynamefielduniquename', 'ModuleEntityFieldQuery');
	}

	/**
	 * Filter the query by a related AlertSubscriptionUser object
	 *
	 * @param     AlertSubscriptionUser $alertSubscriptionUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlertSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByAlertSubscriptionUser($alertSubscriptionUser, $comparison = null)
	{
		return $this
			->addUsingAlias(AlertSubscriptionPeer::ID, $alertSubscriptionUser->getAlertsubscriptionid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AlertSubscriptionUser relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlertSubscriptionQuery The current query, for fluid interface
	 */
	public function joinAlertSubscriptionUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AlertSubscriptionUser');
		
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
			$this->addJoinObject($join, 'AlertSubscriptionUser');
		}
		
		return $this;
	}

	/**
	 * Use the AlertSubscriptionUser relation AlertSubscriptionUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlertSubscriptionUserQuery A secondary query class using the current class as primary query
	 */
	public function useAlertSubscriptionUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAlertSubscriptionUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AlertSubscriptionUser', 'AlertSubscriptionUserQuery');
	}

	/**
	 * Filter the query by a related User object
	 * using the common_alertSubscriptionUser table as cross reference
	 *
	 * @param     User $user the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlertSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = Criteria::EQUAL)
	{
		return $this
			->useAlertSubscriptionUserQuery()
				->filterByUser($user, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     AlertSubscription $alertSubscription Object to remove from the list of results
	 *
	 * @return    AlertSubscriptionQuery The current query, for fluid interface
	 */
	public function prune($alertSubscription = null)
	{
		if ($alertSubscription) {
			$this->addUsingAlias(AlertSubscriptionPeer::ID, $alertSubscription->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseAlertSubscriptionQuery
