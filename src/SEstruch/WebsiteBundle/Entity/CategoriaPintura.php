<?php

namespace SEstruch\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SEstruch\WebsiteBundle\Entity\CategoriaPintura
 *
 * @ORM\Table(name="categorias_pintura")
 * @ORM\Entity(repositoryClass="SEstruch\WebsiteBundle\Repository\CategoriaPinturaRepository")
 */
class CategoriaPintura
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
     * @var string $title_ca
     *
     * @ORM\Column(name="title_ca", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $title_ca;

    /**
     * @var string $title_es
     *
     * @ORM\Column(name="title_es", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $title_es;

    /**
     * @var string $title_en
     *
     * @ORM\Column(name="title_en", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $title_en;

    /**
     * @ORM\OneToMany(targetEntity="Pintura", mappedBy="category")
     */
    private $pinturas;

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
     * Set title_ca
     *
     * @param string $titleCa
     * @return CategoriaPintura
     */
    public function setTitleCa($titleCa)
    {
        $this->title_ca = $titleCa;
    
        return $this;
    }

    /**
     * Get title_ca
     *
     * @return string 
     */
    public function getTitleCa()
    {
        return $this->title_ca;
    }

    /**
     * Set title_es
     *
     * @param string $titleEs
     * @return CategoriaPintura
     */
    public function setTitleEs($titleEs)
    {
        $this->title_es = $titleEs;
    
        return $this;
    }

    /**
     * Get title_es
     *
     * @return string 
     */
    public function getTitleEs()
    {
        return $this->title_es;
    }

    /**
     * Set title_en
     *
     * @param string $titleEn
     * @return CategoriaPintura
     */
    public function setTitleEn($titleEn)
    {
        $this->title_en = $titleEn;
    
        return $this;
    }

    /**
     * Get title_en
     *
     * @return string 
     */
    public function getTitleEn()
    {
        return $this->title_en;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pinturas = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add pinturas
     *
     * @param \SEstruch\WebsiteBundle\Entity\Pintura $pinturas
     * @return CategoriaPintura
     */
    public function addPintura(\SEstruch\WebsiteBundle\Entity\Pintura $pinturas)
    {
        $this->pinturas[] = $pinturas;
    
        return $this;
    }

    /**
     * Remove pinturas
     *
     * @param \SEstruch\WebsiteBundle\Entity\Pintura $pinturas
     */
    public function removePintura(\SEstruch\WebsiteBundle\Entity\Pintura $pinturas)
    {
        $this->pinturas->removeElement($pinturas);
    }

    /**
     * Get pinturas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPinturas()
    {
        return $this->pinturas;
    }

    public function __toString()
    {
        return $this->getTitleCa();
    }
}