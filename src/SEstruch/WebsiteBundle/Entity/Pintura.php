<?php

namespace SEstruch\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * SEstruch\WebsiteBundle\Entity\Pintura
 *
 * @ORM\Table(name="pinturas")
 * @ORM\Entity(repositoryClass="SEstruch\WebsiteBundle\Repository\PinturaRepository")
 */
class Pintura
{
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
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @var string $foto1
     *
     * @ORM\Column(name="foto1", type="string", length=255)
     * @Assert\Image()
     */
    private $foto1;

    /**
     * @var string $foto2
     *
     * @ORM\Column(name="foto2", type="string", length=255)
     * @Assert\Image()
     */
    private $foto2;

    /**
     * @var string $foto3
     *
     * @ORM\Column(name="foto3", type="string", length=255)
     * @Assert\Image()
     */
    private $foto3;

    /**
     * @var string $foto4
     *
     * @ORM\Column(name="foto4", type="string", length=255)
     * @Assert\Image()
     */
    private $foto4;

    /**
     * @var string $foto5
     *
     * @ORM\Column(name="foto5", type="string", length=255)
     * @Assert\Image()
     */
    private $foto5;

    /**
     * @var string $foto6
     *
     * @ORM\Column(name="foto6", type="string", length=255)
     * @Assert\Image()
     */
    private $foto6;

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
}