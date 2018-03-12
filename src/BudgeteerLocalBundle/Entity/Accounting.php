<?php

namespace BudgeteerLocalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Accounting
 * Represents a database row with information about an accounting.
 * @package BudgeteerLocalBundle\Entity
 * @ORM\Entity()
 * @ORM\Table(name="bgt_accounting")
 */
class Accounting
{
    const TYPE_EXPENSE = "S";
    const TYPE_INCOME = "H";

    /**
     * @var integer $id
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime $accountingDate
     * @ORM\Column(type="date", name="accounting_date", nullable=false)
     */
    private $accountingDate;

    /**
     * @var float $amount
     * @ORM\Column(type="float", nullable=false)
     */
    private $amount;

    /**
     * @var string $description
     * @ORM\Column(type="string", name="description", nullable=true)
     */
    private $description;

    /**
     * @var string $accountingType
     * @ORM\Column(type="string", name="accounting_type", nullable=false)
     */
    private $accountingType;

    /**
     * @var AccountingCategory $accountingCategory
     * @ORM\ManyToOne(targetEntity="AccountingCategory")
     * @ORM\JoinColumn(name="accounting_category_id", referencedColumnName="id")
     */
    private $accountingCategory;

    /**
     * $id Getter
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * $accountingDate Getter
     * @return \DateTime
     */
    public function getAccountingDate()
    {
        return $this->accountingDate;
    }

    /**
     * $accountingDate Setter
     * @param \DateTime $date
     * @return $this
     */
    public function setAccountingDate(\DateTime $date)
    {
        $this->accountingDate = $date;
        return $this;
    }

    /**
     * $amount Getter
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * $amount Setter
     * @param float $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * $description Getter
     * @return string | null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * $description Setter
     * @param string $text
     * @return $this
     */
    public function setDescription($text)
    {
        $this->description = $text;
        return $this;
    }

    /**
     * $accountingType Getter
     * @return string
     */
    public function getAccountingType()
    {
        return $this->accountingType;
    }

    /**
     * $accountingType Setter
     * @param string $type
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setAccountingType($type)
    {
        // $type MUST be one of the valid types
        if(!in_array($type, array(self::TYPE_EXPENSE, self::TYPE_INCOME))) {
            throw new \InvalidArgumentException("No valid accounting type given");
        }
        $this->accountingType = $type;
        return $this;
    }

    /**
     * $accountingCategory Getter
     * @return AccountingCategory
     */
    public function getAccountingCategory()
    {
        return $this->accountingCategory;
    }

    /**
     * $accountingCategory Setter
     * @param AccountingCategory $category
     * @return $this
     */
    public function setAccountingCategory(AccountingCategory $category)
    {
        $this->accountingCategory = $category;
        return $this;
    }
}