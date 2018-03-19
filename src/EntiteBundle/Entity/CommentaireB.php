<?php

namespace EntiteBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * CommentaireB
 *
 * @ORM\Table(name="commentaire_b")
 * @ORM\Entity(repositoryClass="EntiteBundle\Repository\CommentaireBRepository")
 */
class CommentaireB
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @return int
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param int $auteur
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    }


    /**
     * @var Article
     * @ORM\ManyToOne(targetEntity="EntiteBundle\Entity\Article", inversedBy="commentaires")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $article;

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
     * @var string
     *
     * @ORM\Column(name="auteurn", type="string")
     */
    private $auteurN;


    /**
     * @var int
     *
     * @ORM\Column(name="auteur", type="integer")
     */
    private $auteur;

    /**
     * @return Article
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @param Article $article
     */
    public function setArticle($article)
    {
        $this->article = $article;
    }




    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text.
     *
     * @param string $text
     *
     * @return CommentaireB
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text.
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

}
