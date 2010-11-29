<?php


/**
 * Base class that represents a query for the 'import_supplierPurchaseOrderBankTransfer' table.
 *
 * Transferencias bancarias realizadas a esa orden de pedido a proveedor
 *
 * @method     SupplierPurchaseOrderBankTransferQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SupplierPurchaseOrderBankTransferQuery orderBySupplierpurchaseorderid($order = Criteria::ASC) Order by the supplierPurchaseOrderId column
 * @method     SupplierPurchaseOrderBankTransferQuery orderByBanktransfernumber($order = Criteria::ASC) Order by the bankTransferNumber column
 * @method     SupplierPurchaseOrderBankTransferQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     SupplierPurchaseOrderBankTransferQuery orderByAccountnumber($order = Criteria::ASC) Order by the accountNumber column
 * @method     SupplierPurchaseOrderBankTransferQuery orderByBankaccountid($order = Criteria::ASC) Order by the bankAccountId column
 * @method     SupplierPurchaseOrderBankTransferQuery orderByCreatedat($order = Criteria::ASC) Order by the createdAt column
 *
 * @method     SupplierPurchaseOrderBankTransferQuery groupById() Group by the id column
 * @method     SupplierPurchaseOrderBankTransferQuery groupBySupplierpurchaseorderid() Group by the supplierPurchaseOrderId column
 * @method     SupplierPurchaseOrderBankTransferQuery groupByBanktransfernumber() Group by the bankTransferNumber column
 * @method     SupplierPurchaseOrderBankTransferQuery groupByAmount() Group by the amount column
 * @method     SupplierPurchaseOrderBankTransferQuery groupByAccountnumber() Group by the accountNumber column
 * @method     SupplierPurchaseOrderBankTransferQuery groupByBankaccountid() Group by the bankAccountId column
 * @method     SupplierPurchaseOrderBankTransferQuery groupByCreatedat() Group by the createdAt column
 *
 * @method     SupplierPurchaseOrderBankTransferQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SupplierPurchaseOrderBankTransferQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SupplierPurchaseOrderBankTransferQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SupplierPurchaseOrderBankTransferQuery leftJoinSupplierPurchaseOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierPurchaseOrder relation
 * @method     SupplierPurchaseOrderBankTransferQuery rightJoinSupplierPurchaseOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierPurchaseOrder relation
 * @method     SupplierPurchaseOrderBankTransferQuery innerJoinSupplierPurchaseOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierPurchaseOrder relation
 *
 * @method     SupplierPurchaseOrderBankTransferQuery leftJoinBankAccount($relationAlias = null) Adds a LEFT JOIN clause to the query using the BankAccount relation
 * @method     SupplierPurchaseOrderBankTransferQuery rightJoinBankAccount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BankAccount relation
 * @method     SupplierPurchaseOrderBankTransferQuery innerJoinBankAccount($relationAlias = null) Adds a INNER JOIN clause to the query using the BankAccount relation
 *
 * @method     SupplierPurchaseOrderBankTransfer findOne(PropelPDO $con = null) Return the first SupplierPurchaseOrderBankTransfer matching the query
 * @method     SupplierPurchaseOrderBankTransfer findOneOrCreate(PropelPDO $con = null) Return the first SupplierPurchaseOrderBankTransfer matching the query, or a new SupplierPurchaseOrderBankTransfer object populated from the query conditions when no match is found
 *
 * @method     SupplierPurchaseOrderBankTransfer findOneById(int $id) Return the first SupplierPurchaseOrderBankTransfer filtered by the id column
 * @method     SupplierPurchaseOrderBankTransfer findOneBySupplierpurchaseorderid(int $supplierPurchaseOrderId) Return the first SupplierPurchaseOrderBankTransfer filtered by the supplierPurchaseOrderId column
 * @method     SupplierPurchaseOrderBankTransfer findOneByBanktransfernumber(string $bankTransferNumber) Return the first SupplierPurchaseOrderBankTransfer filtered by the bankTransferNumber column
 * @method     SupplierPurchaseOrderBankTransfer findOneByAmount(double $amount) Return the first SupplierPurchaseOrderBankTransfer filtered by the amount column
 * @method     SupplierPurchaseOrderBankTransfer findOneByAccountnumber(string $accountNumber) Return the first SupplierPurchaseOrderBankTransfer filtered by the accountNumber column
 * @method     SupplierPurchaseOrderBankTransfer findOneByBankaccountid(int $bankAccountId) Return the first SupplierPurchaseOrderBankTransfer filtered by the bankAccountId column
 * @method     SupplierPurchaseOrderBankTransfer findOneByCreatedat(string $createdAt) Return the first SupplierPurchaseOrderBankTransfer filtered by the createdAt column
 *
 * @method     array findById(int $id) Return SupplierPurchaseOrderBankTransfer objects filtered by the id column
 * @method     array findBySupplierpurchaseorderid(int $supplierPurchaseOrderId) Return SupplierPurchaseOrderBankTransfer objects filtered by the supplierPurchaseOrderId column
 * @method     array findByBanktransfernumber(string $bankTransferNumber) Return SupplierPurchaseOrderBankTransfer objects filtered by the bankTransferNumber column
 * @method     array findByAmount(double $amount) Return SupplierPurchaseOrderBankTransfer objects filtered by the amount column
 * @method     array findByAccountnumber(string $accountNumber) Return SupplierPurchaseOrderBankTransfer objects filtered by the accountNumber column
 * @method     array findByBankaccountid(int $bankAccountId) Return SupplierPurchaseOrderBankTransfer objects filtered by the bankAccountId column
 * @method     array findByCreatedat(string $createdAt) Return SupplierPurchaseOrderBankTransfer objects filtered by the createdAt column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseSupplierPurchaseOrderBankTransferQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSupplierPurchaseOrderBankTransferQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'SupplierPurchaseOrderBankTransfer', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SupplierPurchaseOrderBankTransferQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SupplierPurchaseOrderBankTransferQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SupplierPurchaseOrderBankTransferQuery) {
			return $criteria;
		}
		$query = new SupplierPurchaseOrderBankTransferQuery();
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
	 * @return    SupplierPurchaseOrderBankTransfer|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SupplierPurchaseOrderBankTransferPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SupplierPurchaseOrderBankTransferQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SupplierPurchaseOrderBankTransferPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SupplierPurchaseOrderBankTransferQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SupplierPurchaseOrderBankTransferPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderBankTransferQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SupplierPurchaseOrderBankTransferPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the supplierPurchaseOrderId column
	 * 
	 * @param     int|array $supplierpurchaseorderid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderBankTransferQuery The current query, for fluid interface
	 */
	public function filterBySupplierpurchaseorderid($supplierpurchaseorderid = null, $comparison = null)
	{
		if (is_array($supplierpurchaseorderid)) {
			$useMinMax = false;
			if (isset($supplierpurchaseorderid['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderBankTransferPeer::SUPPLIERPURCHASEORDERID, $supplierpurchaseorderid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($supplierpurchaseorderid['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderBankTransferPeer::SUPPLIERPURCHASEORDERID, $supplierpurchaseorderid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderBankTransferPeer::SUPPLIERPURCHASEORDERID, $supplierpurchaseorderid, $comparison);
	}

	/**
	 * Filter the query on the bankTransferNumber column
	 * 
	 * @param     string $banktransfernumber The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderBankTransferQuery The current query, for fluid interface
	 */
	public function filterByBanktransfernumber($banktransfernumber = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($banktransfernumber)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $banktransfernumber)) {
				$banktransfernumber = str_replace('*', '%', $banktransfernumber);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderBankTransferPeer::BANKTRANSFERNUMBER, $banktransfernumber, $comparison);
	}

	/**
	 * Filter the query on the amount column
	 * 
	 * @param     double|array $amount The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderBankTransferQuery The current query, for fluid interface
	 */
	public function filterByAmount($amount = null, $comparison = null)
	{
		if (is_array($amount)) {
			$useMinMax = false;
			if (isset($amount['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderBankTransferPeer::AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($amount['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderBankTransferPeer::AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderBankTransferPeer::AMOUNT, $amount, $comparison);
	}

	/**
	 * Filter the query on the accountNumber column
	 * 
	 * @param     string $accountnumber The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderBankTransferQuery The current query, for fluid interface
	 */
	public function filterByAccountnumber($accountnumber = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($accountnumber)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $accountnumber)) {
				$accountnumber = str_replace('*', '%', $accountnumber);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderBankTransferPeer::ACCOUNTNUMBER, $accountnumber, $comparison);
	}

	/**
	 * Filter the query on the bankAccountId column
	 * 
	 * @param     int|array $bankaccountid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderBankTransferQuery The current query, for fluid interface
	 */
	public function filterByBankaccountid($bankaccountid = null, $comparison = null)
	{
		if (is_array($bankaccountid)) {
			$useMinMax = false;
			if (isset($bankaccountid['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderBankTransferPeer::BANKACCOUNTID, $bankaccountid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($bankaccountid['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderBankTransferPeer::BANKACCOUNTID, $bankaccountid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderBankTransferPeer::BANKACCOUNTID, $bankaccountid, $comparison);
	}

	/**
	 * Filter the query on the createdAt column
	 * 
	 * @param     string|array $createdat The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderBankTransferQuery The current query, for fluid interface
	 */
	public function filterByCreatedat($createdat = null, $comparison = null)
	{
		if (is_array($createdat)) {
			$useMinMax = false;
			if (isset($createdat['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderBankTransferPeer::CREATEDAT, $createdat['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdat['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderBankTransferPeer::CREATEDAT, $createdat['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderBankTransferPeer::CREATEDAT, $createdat, $comparison);
	}

	/**
	 * Filter the query by a related SupplierPurchaseOrder object
	 *
	 * @param     SupplierPurchaseOrder $supplierPurchaseOrder  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderBankTransferQuery The current query, for fluid interface
	 */
	public function filterBySupplierPurchaseOrder($supplierPurchaseOrder, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPurchaseOrderBankTransferPeer::SUPPLIERPURCHASEORDERID, $supplierPurchaseOrder->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierPurchaseOrder relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderBankTransferQuery The current query, for fluid interface
	 */
	public function joinSupplierPurchaseOrder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SupplierPurchaseOrder');
		
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
			$this->addJoinObject($join, 'SupplierPurchaseOrder');
		}
		
		return $this;
	}

	/**
	 * Use the SupplierPurchaseOrder relation SupplierPurchaseOrder object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderQuery A secondary query class using the current class as primary query
	 */
	public function useSupplierPurchaseOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSupplierPurchaseOrder($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SupplierPurchaseOrder', 'SupplierPurchaseOrderQuery');
	}

	/**
	 * Filter the query by a related BankAccount object
	 *
	 * @param     BankAccount $bankAccount  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderBankTransferQuery The current query, for fluid interface
	 */
	public function filterByBankAccount($bankAccount, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPurchaseOrderBankTransferPeer::BANKACCOUNTID, $bankAccount->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the BankAccount relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderBankTransferQuery The current query, for fluid interface
	 */
	public function joinBankAccount($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('BankAccount');
		
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
			$this->addJoinObject($join, 'BankAccount');
		}
		
		return $this;
	}

	/**
	 * Use the BankAccount relation BankAccount object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BankAccountQuery A secondary query class using the current class as primary query
	 */
	public function useBankAccountQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinBankAccount($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'BankAccount', 'BankAccountQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SupplierPurchaseOrderBankTransfer $supplierPurchaseOrderBankTransfer Object to remove from the list of results
	 *
	 * @return    SupplierPurchaseOrderBankTransferQuery The current query, for fluid interface
	 */
	public function prune($supplierPurchaseOrderBankTransfer = null)
	{
		if ($supplierPurchaseOrderBankTransfer) {
			$this->addUsingAlias(SupplierPurchaseOrderBankTransferPeer::ID, $supplierPurchaseOrderBankTransfer->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSupplierPurchaseOrderBankTransferQuery
