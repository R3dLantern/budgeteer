<?php

namespace BudgeteerLocalBundle\Service;

use BudgeteerLocalBundle\Entity\Accounting;
use BudgeteerLocalBundle\Entity\AccountingCategory;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class AccountingDbService
 * Manages Database operations for Accounting and AccountingCategory entities
 * @package BudgeteerLocalBundle\Service
 */
class AccountingDbService
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * AccountingDbService constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Inserts a new Accounting into the database.
     * @param Accounting $newAccounting
     * @return Accounting;
     */
    public function insertNewAccounting(Accounting $newAccounting)
    {
        $this->em->persist($newAccounting);
        $this->em->flush();
        return $newAccounting;
    }

    /**
     * Inserts a new AccountingCategory into the database.
     * @param AccountingCategory $newCategory
     * @return AccountingCategory;
     */
    public function insertNewAccountingCategory(AccountingCategory $newCategory)
    {
        $this->em->persist($newCategory);
        $this->em->flush();
        return $newCategory;
    }

    /**
     * Searches for a specific AccountingCategory that could already exist
     * @param string $name
     * @return AccountingCategory | null
     */
    public function getExistingAccountingCategory($name)
    {
        return $this
            ->em
            ->getRepository("BudgeteerLocalBundle:AccountingCategory")
            ->findOneBy(
                array(
                    "name" => $name
                )
            );
    }
}