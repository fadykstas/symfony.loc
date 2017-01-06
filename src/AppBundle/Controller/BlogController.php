<?php
/**
 * Created by PhpStorm.
 * User: StasFadeev
 * Date: 01/05/17
 * Time: 16:17
 */

// src/AppBundle/Controller/BlogController.php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
    /**
     * @Route("/blog/{page}", name="blog_list", requirements={"page": "\d+"})
     */
    public function listAction($page = 1, Request $request)
    {
        // ...
        $session = $request->getSession();
//        $get = $request->query->all();
//        $post = $request->request->all();
//        echo 'sessionId: ' . $session->getId() . '</br>';
//        die;
//        echo 'GET: '; print_r($get); echo '</br>';
//        echo 'POST: '; print_r($post); echo '</br>';
        if ($page == 100) {
            throw $this->createNotFoundException('The product does not exist');
        } else if ($page == 200) {
            throw new \Exception('Something went wrong!');
        }

        $page = array(
            "prev" => $page - 1,
            "next" => $page + 1,
            );

        $url = array();
        foreach($page as $key => $val){
              $url[$key] = $this->generateUrl(
                      'blog_list',
                      array(
                          'page' => $val,
                          'type' => 'mixed',
                          'subtype' => 'wtf',
                      )
              );
        }

//        echo '<pre>';c
//        var_dump($page);
//        var_dump($url);
//        die();

        return $this->render('blog/next_page.html.twig', array(
            'url_prev' => $url['prev'],
            'page_prev' => $page['prev'],
            'url_next' => $url['next'],
            'page_next' => $page['next'],
            'session_id' => $session->getId(),
        ));
    }

    /**
     * Matches /blog/*
     *
     * @Route("/blog/{slug}", name="blog_show")
     */
    public function showAction($slug)
    {
        // $slug will equal the dynamic part of the URL
        // e.g. at /blog/yay-routing, then $slug='yay-routing'

        // ...

        $url = $this->generateUrl(
            'blog_show',
            array('slug' => 'slug-value')
        );
        // or, in Twig
        // {{ path('blog_show', {'slug': 'slug-value'}) }}

        return $this->render('blog/show_blog.html.twig', array(
            'url' => $url,
        ));
    }
}