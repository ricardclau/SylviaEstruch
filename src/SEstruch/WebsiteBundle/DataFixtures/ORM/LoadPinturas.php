<?php

namespace SEstruch\WebsiteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Doctrine\Common\DataFixtures\AbstractFixture;

use SEstruch\WebsiteBundle\Entity\CategoriaPintura;

class LoadPinturas extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $cp = new CategoriaPintura();
        $cp->setTitleCa('Realista');
        $cp->setTitleEs('Realista');
        $cp->setTitleEn('Realistic');
        $manager->persist($cp);

        $cp = new CategoriaPintura();
        $cp->setTitleCa('Transició');
        $cp->setTitleEs('Transición');
        $cp->setTitleEn('Transition');
        $manager->persist($cp);

        $cp = new CategoriaPintura();
        $cp->setTitleCa('Impressionista');
        $cp->setTitleEs('Impresionista');
        $cp->setTitleEn('Impressionist');
        $manager->persist($cp);

        $cp = new CategoriaPintura();
        $cp->setTitleCa('Post-impressionista');
        $cp->setTitleEs('Post-impresionista');
        $cp->setTitleEn('Post-impressionist');
        $manager->persist($cp);

        $cp = new CategoriaPintura();
        $cp->setTitleCa('Creació');
        $cp->setTitleEs('Creación');
        $cp->setTitleEn('Creation');

        $cp->setTitleCa('Últimes creacions');
        $cp->setTitleEs('Últimas creaciones');
        $cp->setTitleEn('Latest creations');

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}