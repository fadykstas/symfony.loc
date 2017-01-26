<?php
/**
 * Created by PhpStorm.
 * User: StasFadeev
 * Date: 01/16/17
 * Time: 18:14
 */

// src/AppBundle/Form/TaskType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class TaskType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder ->add('task', TextType::class, array(
            'attr' => array('minlength' => 2, 'maxlength' => 50,),
//                'required' => false,
        ))
            ->add('category', CategoryType::class)
            ->add('dueDate', DateType::class, array(
                'widget' => 'single_text',
                'label'  => 'Due Date Label',
            ))
            ->add('dueTimes', TimeType::class, array(
                'widget' => 'single_text',
            ))
            ->add('hoursSpent', IntegerType::class, array(
//                'attr' => array('min' =>2, 'max' =>5,),
//                'required' => false,
            ))
            ->add('save', SubmitType::class, array('label' => 'Create Post'))
//            ->setAttributes(array(
//                'novalidate'=>'novalidate',
//                ))
        ;
    }


}
