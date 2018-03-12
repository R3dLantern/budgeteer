<?php

namespace BudgeteerLocalBundle\Form;

use BudgeteerLocalBundle\Entity\Accounting;
use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class AccountingType
 * Form class for an Accounting entity
 * @package BudgeteerLocalBundle\Form
 */
class AccountingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                "accountingDate",
                DateType::class,
                array(
                    "label" => "Datum",
                    "widget" => "single_text"
                )
            )
            ->add(
                "amount",
                MoneyType::class,
                array(
                    "label" => "Betrag",
                    "invalid_message" => "Kein gültiger Betrag!"
                )
            )
            ->add(
                "description",
                TextType::class,
                array(
                    "label" => "Beschreibung",
                    "required" => false
                )
            )
            ->add(
                "accountingType",
                ChoiceType::class,
                array(
                    "choices" => array(
                        "Ausgabe" => Accounting::TYPE_EXPENSE,
                        "Einkunft" => Accounting::TYPE_INCOME
                    )
                )
            )
            ->add(
                "accountingCategory",
                AccountingCategoryType::class
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                "data_class" => Accounting::class
            )
        );
    }
}