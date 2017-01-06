<?php
/**
 * Created by PhpStorm.
 * User: StasFadeev
 * Date: 01/05/17
 * Time: 15:26
 */



// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
        $number = mt_rand(0, 100);

//        $response = new Response('No content here', Response::HTTP_ACCEPTED);
//        $response->headers->set('Content-Type', 'text/html');
//        return $response;

        $response = $this->render('lucky/number.html.twig', array(
            'number' => $number,
        ));
        $response->setStatusCode(Response::HTTP_FOUND);
        $response->headers->set('Content-Type', 'text/html');
        return $response;
    }
}
