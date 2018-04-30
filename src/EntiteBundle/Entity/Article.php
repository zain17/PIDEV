<?php

namespace EntiteBundle\Entity;

use Beelab\TagBundle\Tag\TaggableInterface;
use Beelab\TagBundle\Tag\TagInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\VarDumper\Cloner\Data;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="EntiteBundle\Repository\ArticleRepository")
 */
class Article implements  TaggableInterface
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
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="text")
     */
    private $texte;

    /**
     * @var integer
     * @ORM\Column(name="vote", type="integer")
     */
    private $vote = 0;

    /**
     * @var string
     * @ORM\Column(name="titre", type="text")
     */
    private $titre;

    /**
     * @var int
     *
     * @ORM\Column(name="auteur", type="integer")
     */
    private $auteur;
    /**
     * @var string
     *
     * @ORM\Column(name="auteurn", type="string")
     */
    private $auteurN;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get vote
     * @return int
     */
    public function getVote()
    {
        return $this->vote;
    }

    /**
     * Set vote
     * @param int $vote
     *
     * @return Article
     */
    public function setVote($vote)
    {
        $this->vote = $vote;
        return $this;
    }

    /**
     * Set texte
     *
     * @param string $texte
     *
     * @return Article
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set auteur
     *
     * @param integer $auteur
     *
     * @return Article
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return int
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    protected $tagsTxt;

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param mixed $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * @return string
     */
    public function getAuteurN()
    {
        return $this->auteurN;
    }

    /**
     * @param string $auteurN
     */
    public function setAuteurN($auteurN)
    {
        $this->auteurN = $auteurN;
    }

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $updated;

    /**
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $created;

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }


    /**
     * Gets triggered only on insert

     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->created = new \DateTime("now");
        $this->updated = $this->created;
    }

    /**
     * Gets triggered every time on update

     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->updated = new \DateTime("now");
    }


    /**
     * @param string
     */
    public function setTagsText($tagsText)
    {
        $this->tagsTxt = $tagsText;
        $this->updated = new \DateTime();
    }

    /**
     * @return string
     */
    public function getTagsTxt()
    {
        $this->tagsTxt = implode(', ', $this->tags->toArray());

        return $this->tagsTxt;
    }

}

