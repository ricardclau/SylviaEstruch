<?php

namespace SEstruch\WebsiteBundle\Entity;

class EntityHelper
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
}