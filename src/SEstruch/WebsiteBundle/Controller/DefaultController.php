<?php

namespace SEstruch\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\HttpFoundation\Response;

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
     * @Route("/frasesjs", name="frasesjs", defaults={"_format"="js"})
     * @Template()
     * @Method("GET")
     * @Cache(smaxage="600", maxage="600")
     */
    public function frasesJsAction()
    {
        return array();
    }

    /**
     * @Route("/contact", name="contact_send", defaults={"_format"="json"})
     * @Method("POST")
     */
    public function contactSendAction(Request $request)
    {
        $contactData = array(
            'nombre' => $request->get('nombre'),
            'email'  => $request->get('email'),
            'mensaje'  => $request->get('mensaje'),
        );

        $errors = $this->validateContactData($contactData);

        if (0 === count($errors)) {
            $message = \Swift_Message::newInstance()
                ->setSubject('Missatge rebut des de la web www.sylviaestruch.com')
                ->setFrom(array($contactData['email'] => $contactData['nombre']))
                ->setTo($this->container->getParameter('contact.email'))
                ->setBody($contactData['mensaje'])
            ;

            $this->get('mailer')->send($message);

            return new Response(json_encode(array('msg' => $this->get('translator')->trans('contacto.mailok')), 200));
        } else {
            $jsonerr = array();
            foreach ($errors as $error) {
                $jsonerr[$error->getPropertyPath()][] = $this->get('translator')->trans($error->getMessage(), array(), 'validators');
            }
            
            return new Response(json_encode(array('msg' => 'ERROR', 'errors' => $jsonerr), 400));
        }
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

    private function validateContactData(array $contactData)
    {
        $collectionConstraint = new Constraints\Collection(array(
            'nombre' => array(
                new Constraints\NotNull(),
                new Constraints\NotBlank(),
            ),
            'email'  => array(
                new Constraints\NotNull(),
                new Constraints\NotBlank(),
                new Constraints\Email()
            ),
            'mensaje' => array(
                new Constraints\NotNull(),
                new Constraints\NotBlank()
            ),
        ));

        return $this->get('validator')->validateValue($contactData, $collectionConstraint);
    }
}
