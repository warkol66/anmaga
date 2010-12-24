<?php


/**
 * Base class that represents a query for the 'modules_entityField' table.
 *
 * Campos de las entidades de modulos
 *
 * @method     ModuleEntityFieldQuery orderByUniquename($order = Criteria::ASC) Order by the uniqueName column
 * @method     ModuleEntityFieldQuery orderByEntityname($order = Criteria::ASC) Order by the entityName column
 * @method     ModuleEntityFieldQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ModuleEntityFieldQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ModuleEntityFieldQuery orderByIsrequired($order = Criteria::ASC) Order by the isRequired column
 * @method     ModuleEntityFieldQuery orderByIsprimarykey($order = Criteria::ASC) Order by the isPrimaryKey column
 * @method     ModuleEntityFieldQuery orderByIsautoincrement($order = Criteria::ASC) Order by the isAutoIncrement column
 * @method     ModuleEntityFieldQuery orderByOrder($order = Criteria::ASC) Order by the order column
 * @method     ModuleEntityFieldQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ModuleEntityFieldQuery orderByUnique($order = Criteria::ASC) Order by the unique column
 * @method     ModuleEntityFieldQuery orderBySize($order = Criteria::ASC) Order by the size column
 * @method     ModuleEntityFieldQuery orderByAggregateexpression($order = Criteria::ASC) Order by the aggregateExpression column
 * @method     ModuleEntityFieldQuery orderByLabel($order = Criteria::ASC) Order by the label column
 * @method     ModuleEntityFieldQuery orderByFormfieldtype($order = Criteria::ASC) Order by the formFieldType column
 * @method     ModuleEntityFieldQuery orderByFormfieldsize($order = Criteria::ASC) Order by the formFieldSize column
 * @method     ModuleEntityFieldQuery orderByFormfieldlines($order = Criteria::ASC) Order by the formFieldLines column
 * @method     ModuleEntityFieldQuery orderByFormfieldusecalendar($order = Criteria::ASC) Order by the formFieldUseCalendar column
 * @method     ModuleEntityFieldQuery orderByForeignkeytable($order = Criteria::ASC) Order by the foreignKeyTable column
 * @method     ModuleEntityFieldQuery orderByForeignkeyremote($order = Criteria::ASC) Order by the foreignKeyRemote column
 *
 * @method     ModuleEntityFieldQuery groupByUniquename() Group by the uniqueName column
 * @method     ModuleEntityFieldQuery groupByEntityname() Group by the entityName column
 * @method     ModuleEntityFieldQuery groupByName() Group by the name column
 * @method     ModuleEntityFieldQuery groupByDescription() Group by the description column
 * @method     ModuleEntityFieldQuery groupByIsrequired() Group by the isRequired column
 * @method     ModuleEntityFieldQuery groupByIsprimarykey() Group by the isPrimaryKey column
 * @method     ModuleEntityFieldQuery groupByIsautoincrement() Group by the isAutoIncrement column
 * @method     ModuleEntityFieldQuery groupByOrder() Group by the order column
 * @method     ModuleEntityFieldQuery groupByType() Group by the type column
 * @method     ModuleEntityFieldQuery groupByUnique() Group by the unique column
 * @method     ModuleEntityFieldQuery groupBySize() Group by the size column
 * @method     ModuleEntityFieldQuery groupByAggregateexpression() Group by the aggregateExpression column
 * @method     ModuleEntityFieldQuery groupByLabel() Group by the label column
 * @method     ModuleEntityFieldQuery groupByFormfieldtype() Group by the formFieldType column
 * @method     ModuleEntityFieldQuery groupByFormfieldsize() Group by the formFieldSize column
 * @method     ModuleEntityFieldQuery groupByFormfieldlines() Group by the formFieldLines column
 * @method     ModuleEntityFieldQuery groupByFormfieldusecalendar() Group by the formFieldUseCalendar column
 * @method     ModuleEntityFieldQuery groupByForeignkeytable() Group by the foreignKeyTable column
 * @method     ModuleEntityFieldQuery groupByForeignkeyremote() Group by the foreignKeyRemote column
 *
 * @method     ModuleEntityFieldQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ModuleEntityFieldQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ModuleEntityFieldQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ModuleEntityFieldQuery leftJoinModuleEntityRelatedByEntityname($relationAlias = null) Adds a LEFT JOIN clause to the query using the ModuleEntityRelatedByEntityname relation
 * @method     ModuleEntityFieldQuery rightJoinModuleEntityRelatedByEntityname($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ModuleEntityRelatedByEntityname relation
 * @method     ModuleEntityFieldQuery innerJoinModuleEntityRelatedByEntityname($relationAlias = null) Adds a INNER JOIN clause to the query using the ModuleEntityRelatedByEntityname relation
 *
 * @method     ModuleEntityFieldQuery leftJoinModuleEntityRelatedByForeignkeytable($relationAlias = null) Adds a LEFT JOIN clause to the query using the ModuleEntityRelatedByForeignkeytable relation
 * @method     ModuleEntityFieldQuery rightJoinModuleEntityRelatedByForeignkeytable($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ModuleEntityRelatedByForeignkeytable relation
 * @method     ModuleEntityFieldQuery innerJoinModuleEntityRelatedByForeignkeytable($relationAlias = null) Adds a INNER JOIN clause to the query using the ModuleEntityRelatedByForeignkeytable relation
 *
 * @method     ModuleEntityFieldQuery leftJoinModuleEntityFieldRelatedByForeignkeyremote($relationAlias = null) Adds a LEFT JOIN clause to the query using the ModuleEntityFieldRelatedByForeignkeyremote relation
 * @method     ModuleEntityFieldQuery rightJoinModuleEntityFieldRelatedByForeignkeyremote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ModuleEntityFieldRelatedByForeignkeyremote relation
 * @method     ModuleEntityFieldQuery innerJoinModuleEntityFieldRelatedByForeignkeyremote($relationAlias = null) Adds a INNER JOIN clause to the query using the ModuleEntityFieldRelatedByForeignkeyremote relation
 *
 * @method     ModuleEntityFieldQuery leftJoinAlertSubscriptionRelatedByEntitynamefielduniquename($relationAlias = null) Adds a LEFT JOIN clause to the query using the AlertSubscriptionRelatedByEntitynamefielduniquename relation
 * @method     ModuleEntityFieldQuery rightJoinAlertSubscriptionRelatedByEntitynamefielduniquename($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AlertSubscriptionRelatedByEntitynamefielduniquename relation
 * @method     ModuleEntityFieldQuery innerJoinAlertSubscriptionRelatedByEntitynamefielduniquename($relationAlias = null) Adds a INNER JOIN clause to the query using the AlertSubscriptionRelatedByEntitynamefielduniquename relation
 *
 * @method     ModuleEntityFieldQuery leftJoinAlertSubscriptionRelatedByEntitydatefielduniquename($relationAlias = null) Adds a LEFT JOIN clause to the query using the AlertSubscriptionRelatedByEntitydatefielduniquename relation
 * @method     ModuleEntityFieldQuery rightJoinAlertSubscriptionRelatedByEntitydatefielduniquename($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AlertSubscriptionRelatedByEntitydatefielduniquename relation
 * @method     ModuleEntityFieldQuery innerJoinAlertSubscriptionRelatedByEntitydatefielduniquename($relationAlias = null) Adds a INNER JOIN clause to the query using the AlertSubscriptionRelatedByEntitydatefielduniquename relation
 *
 * @method     ModuleEntityFieldQuery leftJoinAlertSubscriptionRelatedByEntitybooleanfielduniquename($relationAlias = null) Adds a LEFT JOIN clause to the query using the AlertSubscriptionRelatedByEntitybooleanfielduniquename relation
 * @method     ModuleEntityFieldQuery rightJoinAlertSubscriptionRelatedByEntitybooleanfielduniquename($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AlertSubscriptionRelatedByEntitybooleanfielduniquename relation
 * @method     ModuleEntityFieldQuery innerJoinAlertSubscriptionRelatedByEntitybooleanfielduniquename($relationAlias = null) Adds a INNER JOIN clause to the query using the AlertSubscriptionRelatedByEntitybooleanfielduniquename relation
 *
 * @method     ModuleEntityFieldQuery leftJoinScheduleSubscriptionRelatedByEntitynamefielduniquename($relationAlias = null) Adds a LEFT JOIN clause to the query using the ScheduleSubscriptionRelatedByEntitynamefielduniquename relation
 * @method     ModuleEntityFieldQuery rightJoinScheduleSubscriptionRelatedByEntitynamefielduniquename($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ScheduleSubscriptionRelatedByEntitynamefielduniquename relation
 * @method     ModuleEntityFieldQuery innerJoinScheduleSubscriptionRelatedByEntitynamefielduniquename($relationAlias = null) Adds a INNER JOIN clause to the query using the ScheduleSubscriptionRelatedByEntitynamefielduniquename relation
 *
 * @method     ModuleEntityFieldQuery leftJoinScheduleSubscriptionRelatedByEntitydatefielduniquename($relationAlias = null) Adds a LEFT JOIN clause to the query using the ScheduleSubscriptionRelatedByEntitydatefielduniquename relation
 * @method     ModuleEntityFieldQuery rightJoinScheduleSubscriptionRelatedByEntitydatefielduniquename($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ScheduleSubscriptionRelatedByEntitydatefielduniquename relation
 * @method     ModuleEntityFieldQuery innerJoinScheduleSubscriptionRelatedByEntitydatefielduniquename($relationAlias = null) Adds a INNER JOIN clause to the query using the ScheduleSubscriptionRelatedByEntitydatefielduniquename relation
 *
 * @method     ModuleEntityFieldQuery leftJoinScheduleSubscriptionRelatedByEntitybooleanfielduniquename($relationAlias = null) Adds a LEFT JOIN clause to the query using the ScheduleSubscriptionRelatedByEntitybooleanfielduniquename relation
 * @method     ModuleEntityFieldQuery rightJoinScheduleSubscriptionRelatedByEntitybooleanfielduniquename($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ScheduleSubscriptionRelatedByEntitybooleanfielduniquename relation
 * @method     ModuleEntityFieldQuery innerJoinScheduleSubscriptionRelatedByEntitybooleanfielduniquename($relationAlias = null) Adds a INNER JOIN clause to the query using the ScheduleSubscriptionRelatedByEntitybooleanfielduniquename relation
 *
 * @method     ModuleEntityFieldQuery leftJoinModuleEntityRelatedByScopefielduniquename($relationAlias = null) Adds a LEFT JOIN clause to the query using the ModuleEntityRelatedByScopefielduniquename relation
 * @method     ModuleEntityFieldQuery rightJoinModuleEntityRelatedByScopefielduniquename($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ModuleEntityRelatedByScopefielduniquename relation
 * @method     ModuleEntityFieldQuery innerJoinModuleEntityRelatedByScopefielduniquename($relationAlias = null) Adds a INNER JOIN clause to the query using the ModuleEntityRelatedByScopefielduniquename relation
 *
 * @method     ModuleEntityFieldQuery leftJoinModuleEntityFieldRelatedByUniquename($relationAlias = null) Adds a LEFT JOIN clause to the query using the ModuleEntityFieldRelatedByUniquename relation
 * @method     ModuleEntityFieldQuery rightJoinModuleEntityFieldRelatedByUniquename($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ModuleEntityFieldRelatedByUniquename relation
 * @method     ModuleEntityFieldQuery innerJoinModuleEntityFieldRelatedByUniquename($relationAlias = null) Adds a INNER JOIN clause to the query using the ModuleEntityFieldRelatedByUniquename relation
 *
 * @method     ModuleEntityFieldQuery leftJoinModuleEntityFieldValidation($relationAlias = null) Adds a LEFT JOIN clause to the query using the ModuleEntityFieldValidation relation
 * @method     ModuleEntityFieldQuery rightJoinModuleEntityFieldValidation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ModuleEntityFieldValidation relation
 * @method     ModuleEntityFieldQuery innerJoinModuleEntityFieldValidation($relationAlias = null) Adds a INNER JOIN clause to the query using the ModuleEntityFieldValidation relation
 *
 * @method     ModuleEntityField findOne(PropelPDO $con = null) Return the first ModuleEntityField matching the query
 * @method     ModuleEntityField findOneOrCreate(PropelPDO $con = null) Return the first ModuleEntityField matching the query, or a new ModuleEntityField object populated from the query conditions when no match is found
 *
 * @method     ModuleEntityField findOneByUniquename(string $uniqueName) Return the first ModuleEntityField filtered by the uniqueName column
 * @method     ModuleEntityField findOneByEntityname(string $entityName) Return the first ModuleEntityField filtered by the entityName column
 * @method     ModuleEntityField findOneByName(string $name) Return the first ModuleEntityField filtered by the name column
 * @method     ModuleEntityField findOneByDescription(string $description) Return the first ModuleEntityField filtered by the description column
 * @method     ModuleEntityField findOneByIsrequired(boolean $isRequired) Return the first ModuleEntityField filtered by the isRequired column
 * @method     ModuleEntityField findOneByIsprimarykey(boolean $isPrimaryKey) Return the first ModuleEntityField filtered by the isPrimaryKey column
 * @method     ModuleEntityField findOneByIsautoincrement(boolean $isAutoIncrement) Return the first ModuleEntityField filtered by the isAutoIncrement column
 * @method     ModuleEntityField findOneByOrder(int $order) Return the first ModuleEntityField filtered by the order column
 * @method     ModuleEntityField findOneByType(int $type) Return the first ModuleEntityField filtered by the type column
 * @method     ModuleEntityField findOneByUnique(boolean $unique) Return the first ModuleEntityField filtered by the unique column
 * @method     ModuleEntityField findOneBySize(int $size) Return the first ModuleEntityField filtered by the size column
 * @method     ModuleEntityField findOneByAggregateexpression(string $aggregateExpression) Return the first ModuleEntityField filtered by the aggregateExpression column
 * @method     ModuleEntityField findOneByLabel(string $label) Return the first ModuleEntityField filtered by the label column
 * @method     ModuleEntityField findOneByFormfieldtype(int $formFieldType) Return the first ModuleEntityField filtered by the formFieldType column
 * @method     ModuleEntityField findOneByFormfieldsize(int $formFieldSize) Return the first ModuleEntityField filtered by the formFieldSize column
 * @method     ModuleEntityField findOneByFormfieldlines(int $formFieldLines) Return the first ModuleEntityField filtered by the formFieldLines column
 * @method     ModuleEntityField findOneByFormfieldusecalendar(string $formFieldUseCalendar) Return the first ModuleEntityField filtered by the formFieldUseCalendar column
 * @method     ModuleEntityField findOneByForeignkeytable(string $foreignKeyTable) Return the first ModuleEntityField filtered by the foreignKeyTable column
 * @method     ModuleEntityField findOneByForeignkeyremote(string $foreignKeyRemote) Return the first ModuleEntityField filtered by the foreignKeyRemote column
 *
 * @method     array findByUniquename(string $uniqueName) Return ModuleEntityField objects filtered by the uniqueName column
 * @method     array findByEntityname(string $entityName) Return ModuleEntityField objects filtered by the entityName column
 * @method     array findByName(string $name) Return ModuleEntityField objects filtered by the name column
 * @method     array findByDescription(string $description) Return ModuleEntityField objects filtered by the description column
 * @method     array findByIsrequired(boolean $isRequired) Return ModuleEntityField objects filtered by the isRequired column
 * @method     array findByIsprimarykey(boolean $isPrimaryKey) Return ModuleEntityField objects filtered by the isPrimaryKey column
 * @method     array findByIsautoincrement(boolean $isAutoIncrement) Return ModuleEntityField objects filtered by the isAutoIncrement column
 * @method     array findByOrder(int $order) Return ModuleEntityField objects filtered by the order column
 * @method     array findByType(int $type) Return ModuleEntityField objects filtered by the type column
 * @method     array findByUnique(boolean $unique) Return ModuleEntityField objects filtered by the unique column
 * @method     array findBySize(int $size) Return ModuleEntityField objects filtered by the size column
 * @method     array findByAggregateexpression(string $aggregateExpression) Return ModuleEntityField objects filtered by the aggregateExpression column
 * @method     array findByLabel(string $label) Return ModuleEntityField objects filtered by the label column
 * @method     array findByFormfieldtype(int $formFieldType) Return ModuleEntityField objects filtered by the formFieldType column
 * @method     array findByFormfieldsize(int $formFieldSize) Return ModuleEntityField objects filtered by the formFieldSize column
 * @method     array findByFormfieldlines(int $formFieldLines) Return ModuleEntityField objects filtered by the formFieldLines column
 * @method     array findByFormfieldusecalendar(string $formFieldUseCalendar) Return ModuleEntityField objects filtered by the formFieldUseCalendar column
 * @method     array findByForeignkeytable(string $foreignKeyTable) Return ModuleEntityField objects filtered by the foreignKeyTable column
 * @method     array findByForeignkeyremote(string $foreignKeyRemote) Return ModuleEntityField objects filtered by the foreignKeyRemote column
 *
 * @package    propel.generator.modules.classes.om
 */
abstract class BaseModuleEntityFieldQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseModuleEntityFieldQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'anmaga', $modelName = 'ModuleEntityField', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ModuleEntityFieldQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ModuleEntityFieldQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ModuleEntityFieldQuery) {
			return $criteria;
		}
		$query = new ModuleEntityFieldQuery();
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
	 * @return    ModuleEntityField|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ModuleEntityFieldPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ModuleEntityFieldPeer::UNIQUENAME, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ModuleEntityFieldPeer::UNIQUENAME, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the uniqueName column
	 * 
	 * @param     string $uniquename The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByUniquename($uniquename = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($uniquename)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $uniquename)) {
				$uniquename = str_replace('*', '%', $uniquename);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ModuleEntityFieldPeer::UNIQUENAME, $uniquename, $comparison);
	}

	/**
	 * Filter the query on the entityName column
	 * 
	 * @param     string $entityname The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ModuleEntityFieldPeer::ENTITYNAME, $entityname, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ModuleEntityFieldPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ModuleEntityFieldPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the isRequired column
	 * 
	 * @param     boolean|string $isrequired The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByIsrequired($isrequired = null, $comparison = null)
	{
		if (is_string($isrequired)) {
			$isRequired = in_array(strtolower($isrequired), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ModuleEntityFieldPeer::ISREQUIRED, $isrequired, $comparison);
	}

	/**
	 * Filter the query on the isPrimaryKey column
	 * 
	 * @param     boolean|string $isprimarykey The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByIsprimarykey($isprimarykey = null, $comparison = null)
	{
		if (is_string($isprimarykey)) {
			$isPrimaryKey = in_array(strtolower($isprimarykey), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ModuleEntityFieldPeer::ISPRIMARYKEY, $isprimarykey, $comparison);
	}

	/**
	 * Filter the query on the isAutoIncrement column
	 * 
	 * @param     boolean|string $isautoincrement The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByIsautoincrement($isautoincrement = null, $comparison = null)
	{
		if (is_string($isautoincrement)) {
			$isAutoIncrement = in_array(strtolower($isautoincrement), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ModuleEntityFieldPeer::ISAUTOINCREMENT, $isautoincrement, $comparison);
	}

	/**
	 * Filter the query on the order column
	 * 
	 * @param     int|array $order The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByOrder($order = null, $comparison = null)
	{
		if (is_array($order)) {
			$useMinMax = false;
			if (isset($order['min'])) {
				$this->addUsingAlias(ModuleEntityFieldPeer::ORDER, $order['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($order['max'])) {
				$this->addUsingAlias(ModuleEntityFieldPeer::ORDER, $order['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ModuleEntityFieldPeer::ORDER, $order, $comparison);
	}

	/**
	 * Filter the query on the type column
	 * 
	 * @param     int|array $type The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByType($type = null, $comparison = null)
	{
		if (is_array($type)) {
			$useMinMax = false;
			if (isset($type['min'])) {
				$this->addUsingAlias(ModuleEntityFieldPeer::TYPE, $type['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($type['max'])) {
				$this->addUsingAlias(ModuleEntityFieldPeer::TYPE, $type['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ModuleEntityFieldPeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query on the unique column
	 * 
	 * @param     boolean|string $unique The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByUnique($unique = null, $comparison = null)
	{
		if (is_string($unique)) {
			$unique = in_array(strtolower($unique), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ModuleEntityFieldPeer::UNIQUE, $unique, $comparison);
	}

	/**
	 * Filter the query on the size column
	 * 
	 * @param     int|array $size The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterBySize($size = null, $comparison = null)
	{
		if (is_array($size)) {
			$useMinMax = false;
			if (isset($size['min'])) {
				$this->addUsingAlias(ModuleEntityFieldPeer::SIZE, $size['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($size['max'])) {
				$this->addUsingAlias(ModuleEntityFieldPeer::SIZE, $size['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ModuleEntityFieldPeer::SIZE, $size, $comparison);
	}

	/**
	 * Filter the query on the aggregateExpression column
	 * 
	 * @param     string $aggregateexpression The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByAggregateexpression($aggregateexpression = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($aggregateexpression)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $aggregateexpression)) {
				$aggregateexpression = str_replace('*', '%', $aggregateexpression);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ModuleEntityFieldPeer::AGGREGATEEXPRESSION, $aggregateexpression, $comparison);
	}

	/**
	 * Filter the query on the label column
	 * 
	 * @param     string $label The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByLabel($label = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($label)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $label)) {
				$label = str_replace('*', '%', $label);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ModuleEntityFieldPeer::LABEL, $label, $comparison);
	}

	/**
	 * Filter the query on the formFieldType column
	 * 
	 * @param     int|array $formfieldtype The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByFormfieldtype($formfieldtype = null, $comparison = null)
	{
		if (is_array($formfieldtype)) {
			$useMinMax = false;
			if (isset($formfieldtype['min'])) {
				$this->addUsingAlias(ModuleEntityFieldPeer::FORMFIELDTYPE, $formfieldtype['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($formfieldtype['max'])) {
				$this->addUsingAlias(ModuleEntityFieldPeer::FORMFIELDTYPE, $formfieldtype['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ModuleEntityFieldPeer::FORMFIELDTYPE, $formfieldtype, $comparison);
	}

	/**
	 * Filter the query on the formFieldSize column
	 * 
	 * @param     int|array $formfieldsize The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByFormfieldsize($formfieldsize = null, $comparison = null)
	{
		if (is_array($formfieldsize)) {
			$useMinMax = false;
			if (isset($formfieldsize['min'])) {
				$this->addUsingAlias(ModuleEntityFieldPeer::FORMFIELDSIZE, $formfieldsize['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($formfieldsize['max'])) {
				$this->addUsingAlias(ModuleEntityFieldPeer::FORMFIELDSIZE, $formfieldsize['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ModuleEntityFieldPeer::FORMFIELDSIZE, $formfieldsize, $comparison);
	}

	/**
	 * Filter the query on the formFieldLines column
	 * 
	 * @param     int|array $formfieldlines The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByFormfieldlines($formfieldlines = null, $comparison = null)
	{
		if (is_array($formfieldlines)) {
			$useMinMax = false;
			if (isset($formfieldlines['min'])) {
				$this->addUsingAlias(ModuleEntityFieldPeer::FORMFIELDLINES, $formfieldlines['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($formfieldlines['max'])) {
				$this->addUsingAlias(ModuleEntityFieldPeer::FORMFIELDLINES, $formfieldlines['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ModuleEntityFieldPeer::FORMFIELDLINES, $formfieldlines, $comparison);
	}

	/**
	 * Filter the query on the formFieldUseCalendar column
	 * 
	 * @param     string $formfieldusecalendar The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByFormfieldusecalendar($formfieldusecalendar = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($formfieldusecalendar)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $formfieldusecalendar)) {
				$formfieldusecalendar = str_replace('*', '%', $formfieldusecalendar);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ModuleEntityFieldPeer::FORMFIELDUSECALENDAR, $formfieldusecalendar, $comparison);
	}

	/**
	 * Filter the query on the foreignKeyTable column
	 * 
	 * @param     string $foreignkeytable The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByForeignkeytable($foreignkeytable = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($foreignkeytable)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $foreignkeytable)) {
				$foreignkeytable = str_replace('*', '%', $foreignkeytable);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ModuleEntityFieldPeer::FOREIGNKEYTABLE, $foreignkeytable, $comparison);
	}

	/**
	 * Filter the query on the foreignKeyRemote column
	 * 
	 * @param     string $foreignkeyremote The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByForeignkeyremote($foreignkeyremote = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($foreignkeyremote)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $foreignkeyremote)) {
				$foreignkeyremote = str_replace('*', '%', $foreignkeyremote);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ModuleEntityFieldPeer::FOREIGNKEYREMOTE, $foreignkeyremote, $comparison);
	}

	/**
	 * Filter the query by a related ModuleEntity object
	 *
	 * @param     ModuleEntity $moduleEntity  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByModuleEntityRelatedByEntityname($moduleEntity, $comparison = null)
	{
		return $this
			->addUsingAlias(ModuleEntityFieldPeer::ENTITYNAME, $moduleEntity->getName(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ModuleEntityRelatedByEntityname relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function joinModuleEntityRelatedByEntityname($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ModuleEntityRelatedByEntityname');
		
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
			$this->addJoinObject($join, 'ModuleEntityRelatedByEntityname');
		}
		
		return $this;
	}

	/**
	 * Use the ModuleEntityRelatedByEntityname relation ModuleEntity object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityQuery A secondary query class using the current class as primary query
	 */
	public function useModuleEntityRelatedByEntitynameQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinModuleEntityRelatedByEntityname($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ModuleEntityRelatedByEntityname', 'ModuleEntityQuery');
	}

	/**
	 * Filter the query by a related ModuleEntity object
	 *
	 * @param     ModuleEntity $moduleEntity  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByModuleEntityRelatedByForeignkeytable($moduleEntity, $comparison = null)
	{
		return $this
			->addUsingAlias(ModuleEntityFieldPeer::FOREIGNKEYTABLE, $moduleEntity->getName(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ModuleEntityRelatedByForeignkeytable relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function joinModuleEntityRelatedByForeignkeytable($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ModuleEntityRelatedByForeignkeytable');
		
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
			$this->addJoinObject($join, 'ModuleEntityRelatedByForeignkeytable');
		}
		
		return $this;
	}

	/**
	 * Use the ModuleEntityRelatedByForeignkeytable relation ModuleEntity object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityQuery A secondary query class using the current class as primary query
	 */
	public function useModuleEntityRelatedByForeignkeytableQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinModuleEntityRelatedByForeignkeytable($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ModuleEntityRelatedByForeignkeytable', 'ModuleEntityQuery');
	}

	/**
	 * Filter the query by a related ModuleEntityField object
	 *
	 * @param     ModuleEntityField $moduleEntityField  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByModuleEntityFieldRelatedByForeignkeyremote($moduleEntityField, $comparison = null)
	{
		return $this
			->addUsingAlias(ModuleEntityFieldPeer::FOREIGNKEYREMOTE, $moduleEntityField->getUniquename(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ModuleEntityFieldRelatedByForeignkeyremote relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function joinModuleEntityFieldRelatedByForeignkeyremote($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ModuleEntityFieldRelatedByForeignkeyremote');
		
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
			$this->addJoinObject($join, 'ModuleEntityFieldRelatedByForeignkeyremote');
		}
		
		return $this;
	}

	/**
	 * Use the ModuleEntityFieldRelatedByForeignkeyremote relation ModuleEntityField object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityFieldQuery A secondary query class using the current class as primary query
	 */
	public function useModuleEntityFieldRelatedByForeignkeyremoteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinModuleEntityFieldRelatedByForeignkeyremote($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ModuleEntityFieldRelatedByForeignkeyremote', 'ModuleEntityFieldQuery');
	}

	/**
	 * Filter the query by a related AlertSubscription object
	 *
	 * @param     AlertSubscription $alertSubscription  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByAlertSubscriptionRelatedByEntitynamefielduniquename($alertSubscription, $comparison = null)
	{
		return $this
			->addUsingAlias(ModuleEntityFieldPeer::UNIQUENAME, $alertSubscription->getEntitynamefielduniquename(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AlertSubscriptionRelatedByEntitynamefielduniquename relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function joinAlertSubscriptionRelatedByEntitynamefielduniquename($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AlertSubscriptionRelatedByEntitynamefielduniquename');
		
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
			$this->addJoinObject($join, 'AlertSubscriptionRelatedByEntitynamefielduniquename');
		}
		
		return $this;
	}

	/**
	 * Use the AlertSubscriptionRelatedByEntitynamefielduniquename relation AlertSubscription object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlertSubscriptionQuery A secondary query class using the current class as primary query
	 */
	public function useAlertSubscriptionRelatedByEntitynamefielduniquenameQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAlertSubscriptionRelatedByEntitynamefielduniquename($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AlertSubscriptionRelatedByEntitynamefielduniquename', 'AlertSubscriptionQuery');
	}

	/**
	 * Filter the query by a related AlertSubscription object
	 *
	 * @param     AlertSubscription $alertSubscription  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByAlertSubscriptionRelatedByEntitydatefielduniquename($alertSubscription, $comparison = null)
	{
		return $this
			->addUsingAlias(ModuleEntityFieldPeer::UNIQUENAME, $alertSubscription->getEntitydatefielduniquename(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AlertSubscriptionRelatedByEntitydatefielduniquename relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function joinAlertSubscriptionRelatedByEntitydatefielduniquename($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AlertSubscriptionRelatedByEntitydatefielduniquename');
		
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
			$this->addJoinObject($join, 'AlertSubscriptionRelatedByEntitydatefielduniquename');
		}
		
		return $this;
	}

	/**
	 * Use the AlertSubscriptionRelatedByEntitydatefielduniquename relation AlertSubscription object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlertSubscriptionQuery A secondary query class using the current class as primary query
	 */
	public function useAlertSubscriptionRelatedByEntitydatefielduniquenameQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAlertSubscriptionRelatedByEntitydatefielduniquename($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AlertSubscriptionRelatedByEntitydatefielduniquename', 'AlertSubscriptionQuery');
	}

	/**
	 * Filter the query by a related AlertSubscription object
	 *
	 * @param     AlertSubscription $alertSubscription  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByAlertSubscriptionRelatedByEntitybooleanfielduniquename($alertSubscription, $comparison = null)
	{
		return $this
			->addUsingAlias(ModuleEntityFieldPeer::UNIQUENAME, $alertSubscription->getEntitybooleanfielduniquename(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AlertSubscriptionRelatedByEntitybooleanfielduniquename relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function joinAlertSubscriptionRelatedByEntitybooleanfielduniquename($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AlertSubscriptionRelatedByEntitybooleanfielduniquename');
		
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
			$this->addJoinObject($join, 'AlertSubscriptionRelatedByEntitybooleanfielduniquename');
		}
		
		return $this;
	}

	/**
	 * Use the AlertSubscriptionRelatedByEntitybooleanfielduniquename relation AlertSubscription object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlertSubscriptionQuery A secondary query class using the current class as primary query
	 */
	public function useAlertSubscriptionRelatedByEntitybooleanfielduniquenameQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAlertSubscriptionRelatedByEntitybooleanfielduniquename($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AlertSubscriptionRelatedByEntitybooleanfielduniquename', 'AlertSubscriptionQuery');
	}

	/**
	 * Filter the query by a related ScheduleSubscription object
	 *
	 * @param     ScheduleSubscription $scheduleSubscription  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByScheduleSubscriptionRelatedByEntitynamefielduniquename($scheduleSubscription, $comparison = null)
	{
		return $this
			->addUsingAlias(ModuleEntityFieldPeer::UNIQUENAME, $scheduleSubscription->getEntitynamefielduniquename(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ScheduleSubscriptionRelatedByEntitynamefielduniquename relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function joinScheduleSubscriptionRelatedByEntitynamefielduniquename($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ScheduleSubscriptionRelatedByEntitynamefielduniquename');
		
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
			$this->addJoinObject($join, 'ScheduleSubscriptionRelatedByEntitynamefielduniquename');
		}
		
		return $this;
	}

	/**
	 * Use the ScheduleSubscriptionRelatedByEntitynamefielduniquename relation ScheduleSubscription object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ScheduleSubscriptionQuery A secondary query class using the current class as primary query
	 */
	public function useScheduleSubscriptionRelatedByEntitynamefielduniquenameQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinScheduleSubscriptionRelatedByEntitynamefielduniquename($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ScheduleSubscriptionRelatedByEntitynamefielduniquename', 'ScheduleSubscriptionQuery');
	}

	/**
	 * Filter the query by a related ScheduleSubscription object
	 *
	 * @param     ScheduleSubscription $scheduleSubscription  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByScheduleSubscriptionRelatedByEntitydatefielduniquename($scheduleSubscription, $comparison = null)
	{
		return $this
			->addUsingAlias(ModuleEntityFieldPeer::UNIQUENAME, $scheduleSubscription->getEntitydatefielduniquename(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ScheduleSubscriptionRelatedByEntitydatefielduniquename relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function joinScheduleSubscriptionRelatedByEntitydatefielduniquename($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ScheduleSubscriptionRelatedByEntitydatefielduniquename');
		
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
			$this->addJoinObject($join, 'ScheduleSubscriptionRelatedByEntitydatefielduniquename');
		}
		
		return $this;
	}

	/**
	 * Use the ScheduleSubscriptionRelatedByEntitydatefielduniquename relation ScheduleSubscription object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ScheduleSubscriptionQuery A secondary query class using the current class as primary query
	 */
	public function useScheduleSubscriptionRelatedByEntitydatefielduniquenameQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinScheduleSubscriptionRelatedByEntitydatefielduniquename($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ScheduleSubscriptionRelatedByEntitydatefielduniquename', 'ScheduleSubscriptionQuery');
	}

	/**
	 * Filter the query by a related ScheduleSubscription object
	 *
	 * @param     ScheduleSubscription $scheduleSubscription  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByScheduleSubscriptionRelatedByEntitybooleanfielduniquename($scheduleSubscription, $comparison = null)
	{
		return $this
			->addUsingAlias(ModuleEntityFieldPeer::UNIQUENAME, $scheduleSubscription->getEntitybooleanfielduniquename(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ScheduleSubscriptionRelatedByEntitybooleanfielduniquename relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function joinScheduleSubscriptionRelatedByEntitybooleanfielduniquename($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ScheduleSubscriptionRelatedByEntitybooleanfielduniquename');
		
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
			$this->addJoinObject($join, 'ScheduleSubscriptionRelatedByEntitybooleanfielduniquename');
		}
		
		return $this;
	}

	/**
	 * Use the ScheduleSubscriptionRelatedByEntitybooleanfielduniquename relation ScheduleSubscription object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ScheduleSubscriptionQuery A secondary query class using the current class as primary query
	 */
	public function useScheduleSubscriptionRelatedByEntitybooleanfielduniquenameQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinScheduleSubscriptionRelatedByEntitybooleanfielduniquename($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ScheduleSubscriptionRelatedByEntitybooleanfielduniquename', 'ScheduleSubscriptionQuery');
	}

	/**
	 * Filter the query by a related ModuleEntity object
	 *
	 * @param     ModuleEntity $moduleEntity  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByModuleEntityRelatedByScopefielduniquename($moduleEntity, $comparison = null)
	{
		return $this
			->addUsingAlias(ModuleEntityFieldPeer::UNIQUENAME, $moduleEntity->getScopefielduniquename(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ModuleEntityRelatedByScopefielduniquename relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function joinModuleEntityRelatedByScopefielduniquename($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ModuleEntityRelatedByScopefielduniquename');
		
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
			$this->addJoinObject($join, 'ModuleEntityRelatedByScopefielduniquename');
		}
		
		return $this;
	}

	/**
	 * Use the ModuleEntityRelatedByScopefielduniquename relation ModuleEntity object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityQuery A secondary query class using the current class as primary query
	 */
	public function useModuleEntityRelatedByScopefielduniquenameQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinModuleEntityRelatedByScopefielduniquename($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ModuleEntityRelatedByScopefielduniquename', 'ModuleEntityQuery');
	}

	/**
	 * Filter the query by a related ModuleEntityField object
	 *
	 * @param     ModuleEntityField $moduleEntityField  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByModuleEntityFieldRelatedByUniquename($moduleEntityField, $comparison = null)
	{
		return $this
			->addUsingAlias(ModuleEntityFieldPeer::UNIQUENAME, $moduleEntityField->getForeignkeyremote(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ModuleEntityFieldRelatedByUniquename relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function joinModuleEntityFieldRelatedByUniquename($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ModuleEntityFieldRelatedByUniquename');
		
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
			$this->addJoinObject($join, 'ModuleEntityFieldRelatedByUniquename');
		}
		
		return $this;
	}

	/**
	 * Use the ModuleEntityFieldRelatedByUniquename relation ModuleEntityField object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityFieldQuery A secondary query class using the current class as primary query
	 */
	public function useModuleEntityFieldRelatedByUniquenameQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinModuleEntityFieldRelatedByUniquename($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ModuleEntityFieldRelatedByUniquename', 'ModuleEntityFieldQuery');
	}

	/**
	 * Filter the query by a related ModuleEntityFieldValidation object
	 *
	 * @param     ModuleEntityFieldValidation $moduleEntityFieldValidation  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function filterByModuleEntityFieldValidation($moduleEntityFieldValidation, $comparison = null)
	{
		return $this
			->addUsingAlias(ModuleEntityFieldPeer::UNIQUENAME, $moduleEntityFieldValidation->getEntityfielduniquename(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ModuleEntityFieldValidation relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function joinModuleEntityFieldValidation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ModuleEntityFieldValidation');
		
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
			$this->addJoinObject($join, 'ModuleEntityFieldValidation');
		}
		
		return $this;
	}

	/**
	 * Use the ModuleEntityFieldValidation relation ModuleEntityFieldValidation object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityFieldValidationQuery A secondary query class using the current class as primary query
	 */
	public function useModuleEntityFieldValidationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinModuleEntityFieldValidation($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ModuleEntityFieldValidation', 'ModuleEntityFieldValidationQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ModuleEntityField $moduleEntityField Object to remove from the list of results
	 *
	 * @return    ModuleEntityFieldQuery The current query, for fluid interface
	 */
	public function prune($moduleEntityField = null)
	{
		if ($moduleEntityField) {
			$this->addUsingAlias(ModuleEntityFieldPeer::UNIQUENAME, $moduleEntityField->getUniquename(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseModuleEntityFieldQuery
