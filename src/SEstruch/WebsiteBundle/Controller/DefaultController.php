<?php

namespace SEstruch\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function homeAction()
    {
        return array();
    }

    /**
     * @Route("/contact", name="contact")
     * @Template()
     * @Method("GET")
     */
    public function contactAction()
    {
        return array();
    }

    /**
     * @Route("/biography", name="biography")
     * @Template()
     * @Method("GET")
     */
    public function biographyAction()
    {
        return array();
    }
}
