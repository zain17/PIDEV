<?php

namespace EntiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Experience
 *
 * @ORM\Table(name="experience")
 * @ORM\Entity(repositoryClass="EntiteBundle\Repository\ExperienceRepository")
 */
class Experience
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
     * @ORM\ManyToOne(targetEntity="EntiteBundle\Entity\Utilisateur", inversedBy="experiences")
     * @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id",nullable=false)
     */
    private $utilisateur;
    /**
     * @ORM\ManyToOne(targetEntity="EntiteBundle\Entity\Etablissement", inversedBy="experiences")
     * @ORM\JoinColumn(name="etablissement_id", referencedColumnName="id",nullable=false)
     */
    private $etablissement;

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

