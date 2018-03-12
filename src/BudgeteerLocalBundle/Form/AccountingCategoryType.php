<?php
/**
 * Created by PhpStorm.
 * User: Léon
 * Date: 12.03.2018
 * Time: 21:11
 */

namespace BudgeteerLocalBundle\Form;


use BudgeteerLocalBundle\Entity\AccountingCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class AccountingCategoryType
 * Form class for an AccountingCategory entity.
 * @package BudgeteerLocalBundle\Form
 */
class AccountingCategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("name", TextType::class, array("label" => "Kategorie"));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                "data_class" => AccountingCategory::class
            )
        );
    }

    public function getParent()
    {
        return AccountingType::class;
    }
}