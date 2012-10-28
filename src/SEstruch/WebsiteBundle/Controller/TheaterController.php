<?php

namespace SEstruch\WebsiteBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TheaterController extends Controller
{
    /**
     * @Route("/theater", name="default_theater")
     * @Route("/theater/{id}/{slug}", requirements={"id"="\d+"}, name="theater")
     * @Template()
     */
    public function categoriaAction($id = 2, $slug = '')
    {
        $em = $this->getDoctrine()->getManager();
        $cats = $em->getRepository('SEstruchWebsiteBundle:CategoriaTeatro')->findAll();

        return array(
            'cats' => $cats,
        );
    }
}