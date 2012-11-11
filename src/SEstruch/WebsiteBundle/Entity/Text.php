<?php

namespace SEstruch\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SEstruch\WebsiteBundle\Entity\Text
 *
 * @ORM\Table(name="texts", uniqueConstraints={@ORM\UniqueConstraint(columns={"name"})})
 * @ORM\Entity(repositoryClass="SEstruch\WebsiteBundle\Repository\TextRepository")
 */
class Text
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string $text_ca
     *
     * @ORM\Column(name="text_ca", type="text")
     */
    private $text_ca;

    /**
     * @var string $text_es
     *
     * @ORM\Column(name="text_es", type="text")
     */
    private $text_es;

    /**
     * @var string $text_en
     *
     * @ORM\Column(name="text_en", type="text")
     */
    private $text_en;


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
     * Set name
     *
     * @param string $name
     * @return Text
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set text_ca
     *
     * @param string $textCa
     * @return Text
     */
    public function setTextCa($textCa)
    {
        $this->text_ca = $textCa;
    
        return $this;
    }

    /**
     * Get text_ca
     *
     * @return string 
     */
    public function getTextCa()
    {
        return $this->text_ca;
    }

    /**
     * Set text_es
     *
     * @param string $textEs
     * @return Text
     */
    public function setTextEs($textEs)
    {
        $this->text_es = $textEs;
    
        return $this;
    }

    /**
     * Get text_es
     *
     * @return string 
     */
    public function getTextEs()
    {
        return $this->text_es;
    }

    /**
     * Set text_en
     *
     * @param string $textEn
     * @return Text
     */
    public function setTextEn($textEn)
    {
        $this->text_en = $textEn;
    
        return $this;
    }

    /**
     * Get text_en
     *
     * @return string 
     */
    public function getTextEn()
    {
        return $this->text_en;
    }
}
