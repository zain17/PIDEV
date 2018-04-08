<?php

namespace EntiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommentaireE
 *
 * @ORM\Table(name="commentaireE")
 * @ORM\Entity
 */
class CommentaireE
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=255, nullable=false)
     */
    private $contenu;

    /**
     * @ORM\ManyToOne(targetEntity="EntiteBundle\Entity\Evenements", inversedBy="evenements")
     * @ORM\JoinColumn(name="commentaire", referencedColumnName="id", nullable=true)
     */
    private $eve;



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
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return CommentaireE
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set contenu.
     *
     * @param string $contenu
     *
     * @return CommentaireE
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu.
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set eve.
     *
     * @param \EntiteBundle\Entity\Evenements|null $eve
     *
     * @return CommentaireE
     */
    public function setEve(\EntiteBundle\Entity\Evenements $eve = null)
    {
        $this->eve = $eve;

        return $this;
    }

    /**
     * Get eve.
     *
     * @return \EntiteBundle\Entity\Evenements|null
     */
    public function getEve()
    {
        return $this->eve;
    }
}
