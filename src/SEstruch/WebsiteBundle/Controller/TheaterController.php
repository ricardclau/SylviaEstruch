<?php

namespace SEstruch\WebsiteBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SEstruch\WebsiteBundle\Entity\CategoriaTeatro;

class TheaterController extends Controller
{
    /**
     * @Route("/theater/", name="default_theater")
     * @Route("/theater/{slug}-{id}/", requirements={"id"="\d+"}, name="theater")
     * @Template()
     */
    public function categoriaAction($id = 2, $slug = '')
    {
        $em = $this->getDoctrine()->getManager();
        $cats = $em->getRepository('SEstruchWebsiteBundle:CategoriaTeatro')->findAll();
        $cat = $em->getRepository('SEstruchWebsiteBundle:CategoriaTeatro')->find($id);
        if (!$cat instanceof CategoriaTeatro) {
            throw $this->createNotFoundException('This category does not exist');
        }

        $obras = $cat->getTeatros()->getValues();
        shuffle($obras);

        return array(
            'cats' => $cats,
            'obras' => $obras,
        );
    }
}