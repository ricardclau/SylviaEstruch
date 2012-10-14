<?php

namespace SEstruch\WebsiteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Doctrine\Common\DataFixtures\AbstractFixture;

use SEstruch\WebsiteBundle\Entity\CategoriaTeatro;

class LoadTeatros extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $cp = (new CategoriaTeatro())
            ->setTitleCa('Obres de teatre')
            ->setTitleEs('Obras de teatro')
            ->setTitleEn('Theater plays');

        $manager->persist($cp);

        $cp = (new CategoriaTeatro())
            ->setTitleCa('Performances')
            ->setTitleEs('Performances')
            ->setTitleEn('Performances');

        $manager->persist($cp);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}