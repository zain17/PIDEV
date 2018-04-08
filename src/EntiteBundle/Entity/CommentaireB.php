<?php

namespace EntiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommentaireB
 *
 * @ORM\Table(name="commentaire_b", indexes={@ORM\Index(name="IDX_D45F3C3E7294869C", columns={"article_id"})})
 * @ORM\Entity
 */
class CommentaireB
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
     * @ORM\Column(name="text", type="text", nullable=false)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="auteurn", type="string", length=255, nullable=false)
     */
    private $auteurn;

    /**
     * @var int
     *
     * @ORM\Column(name="auteur", type="integer", nullable=false)
     */
    private $auteur;

    /**
     * @var \Article
     *
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="article_id", referencedColumnName="id")
     * })
     */
    private $article;


}
