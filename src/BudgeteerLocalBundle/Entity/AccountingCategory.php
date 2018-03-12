<?php

namespace BudgeteerLocalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class AccountingCategory
 * Representes a database row with information about an Accounting category
 * @package BudgeteerLocalBundle\Entity
 * @ORM\Table(name="bgt_accounting_category")
 */
class AccountingCategory
{
    /**
     * @var integer
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", name="name", nullable=false)
     */
    private $name;

    /**
     * $id Getter
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * $name Getter
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * $name Setter
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}