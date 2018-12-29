<?php

namespace SEstruch\WebsiteBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SEstruch\WebsiteBundle\Entity\CategoriaPintura;

class PaintingController extends Controller
{
    /**
     * @Route("/painting/", name="default_painting")
     * @Route("/painting/{slug}-{id}/", requirements={"id"="\d+"}, name="painting")
     * @Template()
     */
    public function categoriaAction($id = 6, $slug = null)
    {
        $em = $this->getDoctrine()->getManager();
        $cats = $em->getRepository('SEstruchWebsiteBundle:CategoriaPintura')->findAll();

        $cat = $em->getRepository('SEstruchWebsiteBundle:CategoriaPintura')->find($id);
        if (!$cat instanceof CategoriaPintura) {
            throw $this->createNotFoundException('This category does not exist');
        }

        $obras = $cat->getPinturas()->getValues();
        shuffle($obras);

        return array(
            'cats' => $cats,
            'obras' => $obras,
        );
    }
}