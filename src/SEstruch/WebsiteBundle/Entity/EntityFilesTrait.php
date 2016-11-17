<?php

namespace SEstruch\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait EntityFilesTrait
{
    /**
     * @var string $file1
     *
     * @Assert\Image()
     */
    private $file1;

    /**
     * @var array
     */
    private $filesToRemove = [];

    public static function getPhotoAlignments()
    {
        return [
            'C'  => 'Centro',
            'U'  => 'Arriba',
            'D'  => 'Abajo',
            'L'  => 'Izquierda',
            'R'  => 'Derecha',
            'UL' => 'Arriba-Izquierda',
            'UR' => 'Arriba-Derecha',
            'DL' => 'Abajo-Izquierda',
            'DR' => 'Abajo-Derecha',
        ];
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function prepareFiles()
    {
        foreach ($this->getEntityFiles() as $file) {
            $fileContent = $this->{$file['field_property']};
            if (empty($fileContent)) {
                continue;
            }

            $this->{$file['path_property']} = sha1_file($fileContent) . '.' . $fileContent->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function handleFiles()
    {
        foreach ($this->getEntityFiles() as $file) {
            $fileContent = $this->{$file['field_property']};
            if (empty($fileContent)) {
                continue;
            }

            $fileContent = $fileContent->move($this->getUploadDir(), $this->{$file['path_property']});
        }
    }

    /**
     * @ORM\PreRemove()
     */
    public function getFilesToBeRemoved()
    {
        foreach ($this->getEntityFiles() as $file) {
            $fileContent = $this->{$file['field_property']};
            if (empty($fileContent)) {
                continue;
            }

        }
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUploadedFiles()
    {
        foreach ($this->getEntityFiles() as $file) {
            $fileContent = $this->{$file['field_property']};
            if (empty($fileContent)) {
                continue;
            }

        }
    }

    public function setFile1($file1)
    {
        $this->file1 = $file1;

        return $this;
    }

    public function getFile1()
    {
        return $this->file1;
    }

    /**
     * @Assert\IsTrue(message="Foto1 needs to be uploaded")
     */
    public function isPhoto1Uploaded()
    {
        return !empty($this->file1);
    }

    private function getUploadPath()
    {
        return __DIR__ . '/../../../../web/uploads/';
    }

    /**
     * This method should be implemented in any Entity using this trait
     * and should return an array with 3 properties for every file:
     *   'field_property' => 'Form field name'
     *   'path_property' => 'ORM Column field',
     *   'thumbnails' => 'Any information regarding thumbnails that should be generated
     *
     * @return array
     */
    abstract function getEntityFiles();

    /**
     * This method should return full path where files are to be saved
     * It would help if getUploadPath was used :)
     * @return string
     */
    abstract function getUploadDir();
}