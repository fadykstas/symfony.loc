<?php
/**
 * Created by PhpStorm.
 * User: StasFadeev
 * Date: 01/16/17
 * Time: 23:25
 */

// src/AppBundle/Form/CategoryType.php

namespace AppBundle\Form;

use AppBundle\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder->add('name');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Category::class,
        ));
    }


}