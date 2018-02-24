<?php

namespace EntiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="EntiteBundle\Repository\UtilisateurRepository")
 */
class Utilisateur
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
     * @ORM\Column(type="string", nullable=true)
     */
    private $photoProfil;
    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private $langitude;
    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private $latitude;
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
     * Set photoProfil
     *
     * @param string $photoProfil
     *
     * @return Utilisateur
     */
    public function setPhotoProfil($photoProfil)
    {
        $this->photoProfil = $photoProfil;

        return $this;
    }

    /**
     * Get photoProfil
     *
     * @return string
     */
    public function getPhotoProfil()
    {
        return $this->photoProfil;
    }

    /**
     * Set langitude
     *
     * @param float $langitude
     *
     * @return Utilisateur
     */
    public function setLangitude($langitude)
    {
        $this->langitude = $langitude;

        return $this;
    }

    /**
     * Get langitude
     *
     * @return float
     */
    public function getLangitude()
    {
        return $this->langitude;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Utilisateur
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }
}
