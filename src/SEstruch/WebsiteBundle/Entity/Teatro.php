<?php

namespace SEstruch\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SEstruch\WebsiteBundle\Entity\Teatro
 *
 * @ORM\Table(name="teatros")
 * @ORM\Entity(repositoryClass="SEstruch\WebsiteBundle\Repository\TeatroRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Teatro
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
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @var string $foto1
     *
     * @ORM\Column(name="foto1", type="string", length=255)
     */
    private $foto1;

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
     * @var string $mini_alignment
     *
     * @ORM\Column(name="mini_alignment", type="string", length=2)
     * @Assert\NotBlank()
     */
    private $mini_alignment;

    /**
     * @ORM\ManyToOne(targetEntity="CategoriaTeatro", inversedBy="teatros")
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
     * @return Teatro
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
     * @return Teatro
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
     * @return Teatro
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
     * @return Teatro
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
     * Set mini_alignment
     *
     * @param string $miniAlignment
     * @return Teatro
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
     * @param \SEstruch\WebsiteBundle\Entity\CategoriaTeatro $category
     * @return Teatro
     */
    public function setCategory(\SEstruch\WebsiteBundle\Entity\CategoriaTeatro $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \SEstruch\WebsiteBundle\Entity\CategoriaTeatro
     */
    public function getCategory()
    {
        return $this->category;
    }

    private function getUploadDir()
    {
        return $this->getUploadPath() . 'teatro/';
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
        );
    }
}