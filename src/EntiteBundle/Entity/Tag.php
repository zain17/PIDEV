<?php

namespace EntiteBundle\Entity;

use Beelab\TagBundle\Tag\TagInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag", uniqueConstraints={@ORM\UniqueConstraint(name="uniqueTag", columns={"name"})})
 * @ORM\Entity
 */
class Tag implements TagInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Article", mappedBy="tag")
     */
    private $article;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tag", mappedBy="tagTarget")
     */
    private $tagSource;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->article = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tagSource = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function setName($name)
    {
        // TODO: Implement setName() method.
    }

    public function getName()
    {
        // TODO: Implement getName() method.
    }
}
