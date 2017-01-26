<?php
/**
 * Created by PhpStorm.
 * User: StasFadeev
 * Date: 01/15/17
 * Time: 16:31
 */

// src/AppBundle/Controller/TaskController.php
namespace AppBundle\Controller;


use AppBundle\Entity\Task;
//important for routing ://
use AppBundle\Form\TaskType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\HttpFoundation\Request;

/*
 * to create form without creating form class use - createFormBuilder
 * to create form with creating form class use - createForm (to create this form many times)
 */
class TaskController extends Controller
{
    /**
     * @Route("/task/new", name="task_new")
     */
    public function newAction(Request $request){
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow +1day'));
        $task->setDueTimes(new \DateTime());



        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class, array(
                'attr' => array('minlength' => 2, 'maxlength' => 50,),
//                'required' => false,
            ))
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
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $task = $form->getData();
            // ...........

            return $this->redirectToRoute('task_success');
        }

        return $this->render('task/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/task/success", name="task_success")
     */
    public function successAction(Request $request){
        $action = null;
        if ( $request->query->has('new') ){
            $action = $request->query->get('new');
        }
        return $this->render('task/success.html.twig', array('action' => $action));
    }

    /**
     * @Route("/task/new2", name="task_new2")
     */
    public function new2Action(Request $request){
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow +1day'));
        $task->setDueTimes(new \DateTime());

//        $form = $this->createForm(new ClientType(), $clientEntity, array(
//            'action' => $this->generateUrl('client_create'),
//            'method' => 'POST',
//            'attr'=>array('novalidate'=>'novalidate') //add novalidate attribute to form
//        ));

        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $task = $form->getData();
            // ...........

            return $this->redirectToRoute('task_success', array('new' => 2,) );
        }

        return $this->render('task/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}