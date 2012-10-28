<?php

namespace SEstruch\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SEstruch\WebsiteBundle\Entity\Pintura
 *
 * @ORM\Table(name="pinturas")
 * @ORM\Entity(repositoryClass="SEstruch\WebsiteBundle\Repository\PinturaRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Pintura
{
    use EntityFilesTrait;

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string $foto1
     *
     * @ORM\Column(name="foto1", type="string", length=255)
     */
    private $foto1;

    /**
     * @var string $foto2
     *
     * @ORM\Column(name="foto2", type="string", length=255, nullable=true)
     */
    private $foto2;

    /**
     * @var string $file2
     *
     * @Assert\Image()
     */
    private $file2;

    /**
     * @var string $foto3
     *
     * @ORM\Column(name="foto3", type="string", length=255, nullable=true)
     */
    private $foto3;

    /**
     * @var string $file3
     *
     * @Assert\Image()
     */
    private $file3;

    /**
     * @var string $foto4
     *
     * @ORM\Column(name="foto4", type="string", length=255, nullable=true)
     */
    private $foto4;

    /**
     * @var string $file4
     *
     * @Assert\Image()
     */
    private $file4;

    /**
     * @var string $foto5
     *
     * @ORM\Column(name="foto5", type="string", length=255, nullable=true)
     */
    private $foto5;

    /**
     * @var string $file5
     *
     * @Assert\Image()
     */
    private $file5;

    /**
     * @var string $foto6
     *
     * @ORM\Column(name="foto6", type="string", length=255, nullable=true)
     */
    private $foto6;

    /**
     * @var string $file6
     *
     * @Assert\Image()
     */
    private $file6;

    /**
     * @param string $file2
     */
    public function setFile2($file2)
    {
        $this->file2 = $file2;
    }

    /**
     * @return string
     */
    public function getFile2()
    {
        return $this->file2;
    }

    /**
     * @param string $file3
     */
    public function setFile3($file3)
    {
        $this->file3 = $file3;
    }

    /**
     * @return string
     */
    public function getFile3()
    {
        return $this->file3;
    }

    /**
     * @param string $file4
     */
    public function setFile4($file4)
    {
        $this->file4 = $file4;
    }

    /**
     * @return string
     */
    public function getFile4()
    {
        return $this->file4;
    }

    /**
     * @param string $file5
     */
    public function setFile5($file5)
    {
        $this->file5 = $file5;
    }

    /**
     * @return string
     */
    public function getFile5()
    {
        return $this->file5;
    }

    /**
     * @param string $file6
     */
    public function setFile6($file6)
    {
        $this->file6 = $file6;
    }

    /**
     * @return string
     */
    public function getFile6()
    {
        return $this->file6;
    }

    /**
     * @var string $mini_alignment
     *
     * @ORM\Column(name="mini_alignment", type="string", length=2)
     * @Assert\NotBlank()
     */
    private $mini_alignment;

    /**
     * @ORM\ManyToOne(targetEntity="CategoriaPintura", inversedBy="teatros")
     * @Assert\NotNull()
     */
    private $category;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Pintura
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set foto1
     *
     * @param string $foto1
     * @return Pintura
     */
    public function setFoto1($foto1)
    {
        $this->foto1 = $foto1;
    
        return $this;
    }

    /**
     * Get foto1
     *
     * @return string 
     */
    public function getFoto1()
    {
        return $this->foto1;
    }

    /**
     * Set foto2
     *
     * @param string $foto2
     * @return Pintura
     */
    public function setFoto2($foto2)
    {
        $this->foto2 = $foto2;
    
        return $this;
    }

    /**
     * Get foto2
     *
     * @return string 
     */
    public function getFoto2()
    {
        return $this->foto2;
    }

    /**
     * Set foto3
     *
     * @param string $foto3
     * @return Pintura
     */
    public function setFoto3($foto3)
    {
        $this->foto3 = $foto3;
    
        return $this;
    }

    /**
     * Get foto3
     *
     * @return string 
     */
    public function getFoto3()
    {
        return $this->foto3;
    }

    /**
     * Set foto4
     *
     * @param string $foto4
     * @return Pintura
     */
    public function setFoto4($foto4)
    {
        $this->foto4 = $foto4;
    
        return $this;
    }

    /**
     * Get foto4
     *
     * @return string 
     */
    public function getFoto4()
    {
        return $this->foto4;
    }

    /**
     * Set foto5
     *
     * @param string $foto5
     * @return Pintura
     */
    public function setFoto5($foto5)
    {
        $this->foto5 = $foto5;
    
        return $this;
    }

    /**
     * Get foto5
     *
     * @return string 
     */
    public function getFoto5()
    {
        return $this->foto5;
    }

    /**
     * Set foto6
     *
     * @param string $foto6
     * @return Pintura
     */
    public function setFoto6($foto6)
    {
        $this->foto6 = $foto6;
    
        return $this;
    }

    /**
     * Get foto6
     *
     * @return string 
     */
    public function getFoto6()
    {
        return $this->foto6;
    }

    /**
     * Set mini_alignment
     *
     * @param string $miniAlignment
     * @return Pintura
     */
    public function setMiniAlignment($miniAlignment)
    {
        $this->mini_alignment = $miniAlignment;
    
        return $this;
    }

    /**
     * Get mini_alignment
     *
     * @return string 
     */
    public function getMiniAlignment()
    {
        return $this->mini_alignment;
    }

    /**
     * Set category
     *
     * @param \SEstruch\WebsiteBundle\Entity\CategoriaPintura $category
     * @return Pintura
     */
    public function setCategory(\SEstruch\WebsiteBundle\Entity\CategoriaPintura $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \SEstruch\WebsiteBundle\Entity\CategoriaPintura
     */
    public function getCategory()
    {
        return $this->category;
    }

    private function getUploadDir()
    {
        return $this->getUploadPath() . 'pintura/';
    }

    private function getEntityFiles()
    {
        return array(
            array(
                'field_property' => 'file1',
                'path_property' => 'foto1',
                'thumbnails' => array(),
            ),
            array(
                'field_property' => 'file2',
                'path_property' => 'foto2',
                'thumbnails' => array(),
            ),
            array(
                'field_property' => 'file3',
                'path_property' => 'foto3',
                'thumbnails' => array(),
            ),
            array(
                'field_property' => 'file4',
                'path_property' => 'foto4',
                'thumbnails' => array(),
            ),
            array(
                'field_property' => 'file5',
                'path_property' => 'foto5',
                'thumbnails' => array(),
            ),
            array(
                'field_property' => 'file6',
                'path_property' => 'foto6',
                'thumbnails' => array(),
            ),
        );
    }
}