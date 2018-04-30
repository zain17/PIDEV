<?php

namespace EntiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity
 */
class Article
{
    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Tag")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $tags;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="EntiteBundle\Entity\CommentaireB", mappedBy="article")
     */
    protected $commentaires;

    /**
     * @return ArrayCollection
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * @param ArrayCollection $commentaires
     */
    public function setCommentaires($commentaires)
    {
        $this->commentaires = $commentaires;
    }

    // note: if you generated code with SensioGeneratorBundle, you need
    // to replace "Tag" with "TagInterface" where appropriate

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->created = new \DateTime('now');
        $this->updated = new \DateTime('now');
        $this->commentaires = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function addTag(TagInterface $tag)
    {
        $this->tags[] = $tag;
    }

    /**
     * {@inheritdoc}
     */
    public function removeTag(TagInterface $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * {@inheritdoc}
     */
    public function hasTag(TagInterface $tag)
    {
        return $this->tags->contains($tag);
    }

    /**
     * {@inheritdoc}
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * {@inheritdoc}
     */
    public function getTagNames()
    {
        return empty($this->tagsText) ? [] : array_map('trim', explode(',', $this->tagsText));
    }
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
     * @ORM\Column(name="texte", type="text", nullable=false)
     */
    private $texte;

    /**
     * @var int
     *
     * @ORM\Column(name="vote", type="integer", nullable=false)
     */
    private $vote;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="text", nullable=false)
     */
    private $titre;

    /**
     * @var int
     *
     * @ORM\Column(name="auteur", type="integer", nullable=false)
     */
    private $auteur;

    /**
     * @var string
     *
     * @ORM\Column(name="auteurn", type="string", length=255, nullable=false)
     */
    private $auteurn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=false)
     */
    private $updated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="article")
     * @ORM\JoinTable(name="article_tag",
     *   joinColumns={
     *     @ORM\JoinColumn(name="article_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     *   }
     * )
     */
    private $tag;



}
