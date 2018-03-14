<?php

namespace EntiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Revue
 *
 * @ORM\Table(name="revue")
 * @ORM\Entity(repositoryClass="EntiteBundle\Repository\RevueRepository")
 */
class Revue
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
     * @ORM\ManyToOne(targetEntity="EntiteBundle\Entity\Utilisateur", inversedBy="revues")
     * @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id",nullable=false)
     */
    private $utilisateur;
    /**
     * @ORM\ManyToOne(targetEntity="EntiteBundle\Entity\Etablissement", inversedBy="revues")
     * @ORM\JoinColumn(name="etablissement_id", referencedColumnName="id",nullable=false)
     */
    private $etablissement;
    /**
     * @ORM\OneToMany(targetEntity="EntiteBundle\Entity\Commentaire", mappedBy="revue")
     */
    private $comments;
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

