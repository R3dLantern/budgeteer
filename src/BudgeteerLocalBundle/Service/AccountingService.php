<?php

namespace BudgeteerLocalBundle\Service;
use BudgeteerLocalBundle\Entity\Accounting;

/**
 * Class AccountingService
 * Service class for general management of Accounting entities
 * @package BudgeteerLocalBundle\Service
 */
class AccountingService
{
    /**
     * @var AccountingDbService $dbService
     */
    private $dbService;

    /**
     * AccountingService constructor.
     * @param AccountingDbService $dbService
     */
    public function __construct(AccountingDbService $dbService)
    {
        $this->dbService = $dbService;
    }

    /**
     * Will create a new Accounting entry.
     * Checks for an already existing Accounting category before persisting.
     * @param Accounting $newAccounting
     * @return Accounting
     */
    public function createNewAccounting(Accounting $newAccounting)
    {
        // Retrieve a possibly already existing accounting category
        $existingCategory = $this
            ->dbService
            ->getExistingAccountingCategory(
                $newAccounting->getAccountingCategory()->getName()
            );

        if ($existingCategory == null) {
            $newCategory = $newAccounting->getAccountingCategory();
            $newAccounting->setAccountingCategory($this->dbService->insertNewAccountingCategory($newCategory));
        } else {
            $newAccounting->setAccountingCategory($existingCategory);
        }

        return $this->dbService->insertNewAccounting($newAccounting);
    }
}