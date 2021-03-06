<?php

namespace SEstruch\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * SEstruch\WebsiteBundle\Entity\CategoriaTeatro
 *
 * @ORM\Table(name="categorias_teatro")
 * @ORM\Entity(repositoryClass="SEstruch\WebsiteBundle\Repository\CategoriaTeatroRepository")
 */
class CategoriaTeatro
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
     * @ORM\OneToMany(targetEntity="Teatro", mappedBy="category")
     */
    private $teatros;

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
     * @return CategoriaTeatro
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
     * @return CategoriaTeatro
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
     * @return CategoriaTeatro
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
        $this->teatros = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add teatros
     *
     * @param \SEstruch\WebsiteBundle\Entity\Teatro $teatros
     * @return CategoriaTeatro
     */
    public function addTeatro(\SEstruch\WebsiteBundle\Entity\Teatro $teatros)
    {
        $this->teatros[] = $teatros;
    
        return $this;
    }

    /**
     * Remove teatros
     *
     * @param \SEstruch\WebsiteBundle\Entity\Teatro $teatros
     */
    public function removeTeatro(\SEstruch\WebsiteBundle\Entity\Teatro $teatros)
    {
        $this->teatros->removeElement($teatros);
    }

    /**
     * Get teatros
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeatros()
    {
        return $this->teatros;
    }

    public function __toString()
    {
        return $this->getTitleCa();
    }
}