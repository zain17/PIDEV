<?php

namespace EntiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Catalogue
 *
 * @ORM\Table(name="catalogue", indexes={@ORM\Index(name="IDX_59A699F5FF631228", columns={"etablissement_id"})})
 * @ORM\Entity
 */
class Catalogue
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
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="en_service", type="boolean", nullable=true)
     */
    private $enService;

    /**
     * @var \Etablissement
     *
     * @ORM\ManyToOne(targetEntity="Etablissement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etablissement_id", referencedColumnName="id")
     * })
     */
    private $etablissement;


}
