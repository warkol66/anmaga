<?php


/**
 * Base class that represents a query for the 'modules_module' table.
 *
 *  Registro de modulos
 *
 * @method     ModuleQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ModuleQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     ModuleQuery orderByAlwaysactive($order = Criteria::ASC) Order by the alwaysActive column
 * @method     ModuleQuery orderByHascategories($order = Criteria::ASC) Order by the hasCategories column
 *
 * @method     ModuleQuery groupByName() Group by the name column
 * @method     ModuleQuery groupByActive() Group by the active column
 * @method     ModuleQuery groupByAlwaysactive() Group by the alwaysActive column
 * @method     ModuleQuery groupByHascategories() Group by the hasCategories column
 *
 * @method     ModuleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ModuleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ModuleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ModuleQuery leftJoinModuleDependency($relationAlias = null) Adds a LEFT JOIN clause to the query using the ModuleDependency relation
 * @method     ModuleQuery rightJoinModuleDependency($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ModuleDependency relation
 * @method     ModuleQuery innerJoinModuleDependency($relationAlias = null) Adds a INNER JOIN clause to the query using the ModuleDependency relation
 *
 * @method     ModuleQuery leftJoinModuleLabel($relationAlias = null) Adds a LEFT JOIN clause to the query using the ModuleLabel relation
 * @method     ModuleQuery rightJoinModuleLabel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ModuleLabel relation
 * @method     ModuleQuery innerJoinModuleLabel($relationAlias = null) Adds a INNER JOIN clause to the query using the ModuleLabel relation
 *
 * @method     ModuleQuery leftJoinMultilangText($relationAlias = null) Adds a LEFT JOIN clause to the query using the MultilangText relation
 * @method     ModuleQuery rightJoinMultilangText($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MultilangText relation
 * @method     ModuleQuery innerJoinMultilangText($relationAlias = null) Adds a INNER JOIN clause to the query using the MultilangText relation
 *
 * @method     Module findOne(PropelPDO $con = null) Return the first Module matching the query
 * @method     Module findOneOrCreate(PropelPDO $con = null) Return the first Module matching the query, or a new Module object populated from the query conditions when no match is found
 *
 * @method     Module findOneByName(string $name) Return the first Module filtered by the name column
 * @method     Module findOneByActive(boolean $active) Return the first Module filtered by the active column
 * @method     Module findOneByAlwaysactive(boolean $alwaysActive) Return the first Module filtered by the alwaysActive column
 * @method     Module findOneByHascategories(boolean $hasCategories) Return the first Module filtered by the hasCategories column
 *
 * @method     array findByName(string $name) Return Module objects filtered by the name column
 * @method     array findByActive(boolean $active) Return Module objects filtered by the active column
 * @method     array findByAlwaysactive(boolean $alwaysActive) Return Module objects filtered by the alwaysActive column
 * @method     array findByHascategories(boolean $hasCategories) Return Module objects filtered by the hasCategories column
 *
 * @package    propel.generator.modules.classes.om
 */
abstract class BaseModuleQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseModuleQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'Module', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ModuleQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ModuleQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ModuleQuery) {
			return $criteria;
		}
		$query = new ModuleQuery();
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
	 * @return    Module|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ModulePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ModuleQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ModulePeer::NAME, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ModuleQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ModulePeer::NAME, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ModulePeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the active column
	 * 
	 * @param     boolean|string $active The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_string($active)) {
			$active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ModulePeer::ACTIVE, $active, $comparison);
	}

	/**
	 * Filter the query on the alwaysActive column
	 * 
	 * @param     boolean|string $alwaysactive The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleQuery The current query, for fluid interface
	 */
	public function filterByAlwaysactive($alwaysactive = null, $comparison = null)
	{
		if (is_string($alwaysactive)) {
			$alwaysActive = in_array(strtolower($alwaysactive), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ModulePeer::ALWAYSACTIVE, $alwaysactive, $comparison);
	}

	/**
	 * Filter the query on the hasCategories column
	 * 
	 * @param     boolean|string $hascategories The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleQuery The current query, for fluid interface
	 */
	public function filterByHascategories($hascategories = null, $comparison = null)
	{
		if (is_string($hascategories)) {
			$hasCategories = in_array(strtolower($hascategories), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ModulePeer::HASCATEGORIES, $hascategories, $comparison);
	}

	/**
	 * Filter the query by a related ModuleDependency object
	 *
	 * @param     ModuleDependency $moduleDependency  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleQuery The current query, for fluid interface
	 */
	public function filterByModuleDependency($moduleDependency, $comparison = null)
	{
		return $this
			->addUsingAlias(ModulePeer::NAME, $moduleDependency->getModulename(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ModuleDependency relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleQuery The current query, for fluid interface
	 */
	public function joinModuleDependency($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ModuleDependency');
		
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
			$this->addJoinObject($join, 'ModuleDependency');
		}
		
		return $this;
	}

	/**
	 * Use the ModuleDependency relation ModuleDependency object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleDependencyQuery A secondary query class using the current class as primary query
	 */
	public function useModuleDependencyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinModuleDependency($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ModuleDependency', 'ModuleDependencyQuery');
	}

	/**
	 * Filter the query by a related ModuleLabel object
	 *
	 * @param     ModuleLabel $moduleLabel  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleQuery The current query, for fluid interface
	 */
	public function filterByModuleLabel($moduleLabel, $comparison = null)
	{
		return $this
			->addUsingAlias(ModulePeer::NAME, $moduleLabel->getName(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ModuleLabel relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleQuery The current query, for fluid interface
	 */
	public function joinModuleLabel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ModuleLabel');
		
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
			$this->addJoinObject($join, 'ModuleLabel');
		}
		
		return $this;
	}

	/**
	 * Use the ModuleLabel relation ModuleLabel object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleLabelQuery A secondary query class using the current class as primary query
	 */
	public function useModuleLabelQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinModuleLabel($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ModuleLabel', 'ModuleLabelQuery');
	}

	/**
	 * Filter the query by a related MultilangText object
	 *
	 * @param     MultilangText $multilangText  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleQuery The current query, for fluid interface
	 */
	public function filterByMultilangText($multilangText, $comparison = null)
	{
		return $this
			->addUsingAlias(ModulePeer::NAME, $multilangText->getModulename(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the MultilangText relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleQuery The current query, for fluid interface
	 */
	public function joinMultilangText($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('MultilangText');
		
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
			$this->addJoinObject($join, 'MultilangText');
		}
		
		return $this;
	}

	/**
	 * Use the MultilangText relation MultilangText object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MultilangTextQuery A secondary query class using the current class as primary query
	 */
	public function useMultilangTextQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinMultilangText($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'MultilangText', 'MultilangTextQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Module $module Object to remove from the list of results
	 *
	 * @return    ModuleQuery The current query, for fluid interface
	 */
	public function prune($module = null)
	{
		if ($module) {
			$this->addUsingAlias(ModulePeer::NAME, $module->getName(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseModuleQuery