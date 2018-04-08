<?php

namespace EntiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire", indexes={@ORM\Index(name="IDX_67F068BC2B68B0B6", columns={"revue_id"})})
 * @ORM\Entity
 */
class Commentaire
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
     * @var \Revue
     *
     * @ORM\ManyToOne(targetEntity="Revue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="revue_id", referencedColumnName="id")
     * })
     */
    private $revue;


}
