<?php

namespace SEstruch\WebsiteBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PaintingController extends Controller
{
    /**
     * @Route("/painting", name="painting")
     * @Template()
     */
    public function categoriaAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $cats = $em->getRepository('SEstruchWebsiteBundle:CategoriaPintura')->findAll();

        return array(
            'cats' => $cats,
        );
    }
}