<?php


/**
 * Base class that represents a query for the 'import_bankAccount' table.
 *
 * Cuentas bancarias
 *
 * @method     BankAccountQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     BankAccountQuery orderByAccountnumber($order = Criteria::ASC) Order by the accountNumber column
 * @method     BankAccountQuery orderByBank($order = Criteria::ASC) Order by the bank column
 * @method     BankAccountQuery orderByActive($order = Criteria::ASC) Order by the active column
 *
 * @method     BankAccountQuery groupById() Group by the id column
 * @method     BankAccountQuery groupByAccountnumber() Group by the accountNumber column
 * @method     BankAccountQuery groupByBank() Group by the bank column
 * @method     BankAccountQuery groupByActive() Group by the active column
 *
 * @method     BankAccountQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     BankAccountQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     BankAccountQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     BankAccountQuery leftJoinSupplierPurchaseOrderBankTransfer($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierPurchaseOrderBankTransfer relation
 * @method     BankAccountQuery rightJoinSupplierPurchaseOrderBankTransfer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierPurchaseOrderBankTransfer relation
 * @method     BankAccountQuery innerJoinSupplierPurchaseOrderBankTransfer($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierPurchaseOrderBankTransfer relation
 *
 * @method     BankAccount findOne(PropelPDO $con = null) Return the first BankAccount matching the query
 * @method     BankAccount findOneOrCreate(PropelPDO $con = null) Return the first BankAccount matching the query, or a new BankAccount object populated from the query conditions when no match is found
 *
 * @method     BankAccount findOneById(int $id) Return the first BankAccount filtered by the id column
 * @method     BankAccount findOneByAccountnumber(string $accountNumber) Return the first BankAccount filtered by the accountNumber column
 * @method     BankAccount findOneByBank(string $bank) Return the first BankAccount filtered by the bank column
 * @method     BankAccount findOneByActive(boolean $active) Return the first BankAccount filtered by the active column
 *
 * @method     array findById(int $id) Return BankAccount objects filtered by the id column
 * @method     array findByAccountnumber(string $accountNumber) Return BankAccount objects filtered by the accountNumber column
 * @method     array findByBank(string $bank) Return BankAccount objects filtered by the bank column
 * @method     array findByActive(boolean $active) Return BankAccount objects filtered by the active column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseBankAccountQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseBankAccountQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'BankAccount', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new BankAccountQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    BankAccountQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof BankAccountQuery) {
			return $criteria;
		}
		$query = new BankAccountQuery();
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
	 * @return    BankAccount|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = BankAccountPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    BankAccountQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(BankAccountPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    BankAccountQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(BankAccountPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BankAccountQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(BankAccountPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the accountNumber column
	 * 
	 * @param     string $accountnumber The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BankAccountQuery The current query, for fluid interface
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
		return $this->addUsingAlias(BankAccountPeer::ACCOUNTNUMBER, $accountnumber, $comparison);
	}

	/**
	 * Filter the query on the bank column
	 * 
	 * @param     string $bank The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BankAccountQuery The current query, for fluid interface
	 */
	public function filterByBank($bank = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($bank)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $bank)) {
				$bank = str_replace('*', '%', $bank);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(BankAccountPeer::BANK, $bank, $comparison);
	}

	/**
	 * Filter the query on the active column
	 * 
	 * @param     boolean|string $active The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BankAccountQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_string($active)) {
			$active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(BankAccountPeer::ACTIVE, $active, $comparison);
	}

	/**
	 * Filter the query by a related SupplierPurchaseOrderBankTransfer object
	 *
	 * @param     SupplierPurchaseOrderBankTransfer $supplierPurchaseOrderBankTransfer  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BankAccountQuery The current query, for fluid interface
	 */
	public function filterBySupplierPurchaseOrderBankTransfer($supplierPurchaseOrderBankTransfer, $comparison = null)
	{
		return $this
			->addUsingAlias(BankAccountPeer::ID, $supplierPurchaseOrderBankTransfer->getBankaccountid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierPurchaseOrderBankTransfer relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BankAccountQuery The current query, for fluid interface
	 */
	public function joinSupplierPurchaseOrderBankTransfer($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SupplierPurchaseOrderBankTransfer');
		
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
			$this->addJoinObject($join, 'SupplierPurchaseOrderBankTransfer');
		}
		
		return $this;
	}

	/**
	 * Use the SupplierPurchaseOrderBankTransfer relation SupplierPurchaseOrderBankTransfer object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderBankTransferQuery A secondary query class using the current class as primary query
	 */
	public function useSupplierPurchaseOrderBankTransferQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSupplierPurchaseOrderBankTransfer($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SupplierPurchaseOrderBankTransfer', 'SupplierPurchaseOrderBankTransferQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     BankAccount $bankAccount Object to remove from the list of results
	 *
	 * @return    BankAccountQuery The current query, for fluid interface
	 */
	public function prune($bankAccount = null)
	{
		if ($bankAccount) {
			$this->addUsingAlias(BankAccountPeer::ID, $bankAccount->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseBankAccountQuery
