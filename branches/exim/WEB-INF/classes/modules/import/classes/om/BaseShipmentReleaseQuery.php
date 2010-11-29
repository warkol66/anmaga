<?php


/**
 * Base class that represents a query for the 'import_shipmentRelease' table.
 *
 * Datos de nacionalizacion
 *
 * @method     ShipmentReleaseQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ShipmentReleaseQuery orderByShipmentid($order = Criteria::ASC) Order by the shipmentId column
 * @method     ShipmentReleaseQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ShipmentReleaseQuery orderByTimestampstatus($order = Criteria::ASC) Order by the timestampStatus column
 *
 * @method     ShipmentReleaseQuery groupById() Group by the id column
 * @method     ShipmentReleaseQuery groupByShipmentid() Group by the shipmentId column
 * @method     ShipmentReleaseQuery groupByStatus() Group by the status column
 * @method     ShipmentReleaseQuery groupByTimestampstatus() Group by the timestampStatus column
 *
 * @method     ShipmentReleaseQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ShipmentReleaseQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ShipmentReleaseQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ShipmentReleaseQuery leftJoinShipment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Shipment relation
 * @method     ShipmentReleaseQuery rightJoinShipment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Shipment relation
 * @method     ShipmentReleaseQuery innerJoinShipment($relationAlias = null) Adds a INNER JOIN clause to the query using the Shipment relation
 *
 * @method     ShipmentRelease findOne(PropelPDO $con = null) Return the first ShipmentRelease matching the query
 * @method     ShipmentRelease findOneOrCreate(PropelPDO $con = null) Return the first ShipmentRelease matching the query, or a new ShipmentRelease object populated from the query conditions when no match is found
 *
 * @method     ShipmentRelease findOneById(int $id) Return the first ShipmentRelease filtered by the id column
 * @method     ShipmentRelease findOneByShipmentid(int $shipmentId) Return the first ShipmentRelease filtered by the shipmentId column
 * @method     ShipmentRelease findOneByStatus(int $status) Return the first ShipmentRelease filtered by the status column
 * @method     ShipmentRelease findOneByTimestampstatus(string $timestampStatus) Return the first ShipmentRelease filtered by the timestampStatus column
 *
 * @method     array findById(int $id) Return ShipmentRelease objects filtered by the id column
 * @method     array findByShipmentid(int $shipmentId) Return ShipmentRelease objects filtered by the shipmentId column
 * @method     array findByStatus(int $status) Return ShipmentRelease objects filtered by the status column
 * @method     array findByTimestampstatus(string $timestampStatus) Return ShipmentRelease objects filtered by the timestampStatus column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseShipmentReleaseQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseShipmentReleaseQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'ShipmentRelease', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ShipmentReleaseQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ShipmentReleaseQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ShipmentReleaseQuery) {
			return $criteria;
		}
		$query = new ShipmentReleaseQuery();
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
	 * @return    ShipmentRelease|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ShipmentReleasePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ShipmentReleasePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ShipmentReleasePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ShipmentReleasePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the shipmentId column
	 * 
	 * @param     int|array $shipmentid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterByShipmentid($shipmentid = null, $comparison = null)
	{
		if (is_array($shipmentid)) {
			$useMinMax = false;
			if (isset($shipmentid['min'])) {
				$this->addUsingAlias(ShipmentReleasePeer::SHIPMENTID, $shipmentid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($shipmentid['max'])) {
				$this->addUsingAlias(ShipmentReleasePeer::SHIPMENTID, $shipmentid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentReleasePeer::SHIPMENTID, $shipmentid, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(ShipmentReleasePeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(ShipmentReleasePeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentReleasePeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the timestampStatus column
	 * 
	 * @param     string|array $timestampstatus The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterByTimestampstatus($timestampstatus = null, $comparison = null)
	{
		if (is_array($timestampstatus)) {
			$useMinMax = false;
			if (isset($timestampstatus['min'])) {
				$this->addUsingAlias(ShipmentReleasePeer::TIMESTAMPSTATUS, $timestampstatus['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($timestampstatus['max'])) {
				$this->addUsingAlias(ShipmentReleasePeer::TIMESTAMPSTATUS, $timestampstatus['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentReleasePeer::TIMESTAMPSTATUS, $timestampstatus, $comparison);
	}

	/**
	 * Filter the query by a related Shipment object
	 *
	 * @param     Shipment $shipment  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterByShipment($shipment, $comparison = null)
	{
		return $this
			->addUsingAlias(ShipmentReleasePeer::SHIPMENTID, $shipment->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Shipment relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function joinShipment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useShipmentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinShipment($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Shipment', 'ShipmentQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ShipmentRelease $shipmentRelease Object to remove from the list of results
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function prune($shipmentRelease = null)
	{
		if ($shipmentRelease) {
			$this->addUsingAlias(ShipmentReleasePeer::ID, $shipmentRelease->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseShipmentReleaseQuery
