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
        $cp = (new CategoriaPintura())
            ->setTitleCa('Realista')
            ->setTitleEs('Realista')
            ->setTitleEn('Realistic');

        $manager->persist($cp);

        $cp = (new CategoriaPintura())
            ->setTitleCa('Transició')
            ->setTitleEs('Transición')
            ->setTitleEn('Transition');

        $manager->persist($cp);

        $cp = (new CategoriaPintura())
            ->setTitleCa('Impressionista')
            ->setTitleEs('Impresionista')
            ->setTitleEn('Impressionist');

        $manager->persist($cp);

        $cp = (new CategoriaPintura())
            ->setTitleCa('Post-impressionista')
            ->setTitleEs('Post-impresionista')
            ->setTitleEn('Post-impressionist');

        $manager->persist($cp);

        $cp = (new CategoriaPintura())
            ->setTitleCa('Creació')
            ->setTitleEs('Creación')
            ->setTitleEn('Creation');

        $manager->persist($cp);

        $cp = (new CategoriaPintura())
            ->setTitleCa('Últimes creacions')
            ->setTitleEs('Últimas creaciones')
            ->setTitleEn('Latest creations');

        $manager->persist($cp);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}