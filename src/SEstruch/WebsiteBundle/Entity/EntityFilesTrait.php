<?php

namespace SEstruch\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Event\LifecycleEventArgs;

trait EntityFilesTrait
{
    public static function getPhotoAlignments()
    {
        return array(
            'C'  => 'Centro',
            'U'  => 'Arriba',
            'D'  => 'Abajo',
            'L'  => 'Izquierda',
            'R'  => 'Derecha',
            'UL' => 'Arriba-Izquierda',
            'UR' => 'Arriba-Derecha',
            'DL' => 'Abajo-Izquierda',
            'DR' => 'Abajo-Derecha',
        );
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function prepareFiles()
    {

    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function handleFiles()
    {

    }

    /**
     * @ORM\PreRemove()
     */
    public function getFilesToBeRemoved()
    {

    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUploadedFiles()
    {

    }
}