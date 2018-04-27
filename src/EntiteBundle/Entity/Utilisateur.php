<?php

namespace EntiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="EntiteBundle\Repository\UtilisateurRepository")
 */
class Utilisateur extends User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
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
     * @ORM\OneToOne(targetEntity="EntiteBundle\Entity\Etablissement", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $etablissement;
    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $prenom;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numero;



    /**
     * @ORM\OneToMany(targetEntity="EntiteBundle\Entity\Experience", mappedBy="utilisateur")
     */
    private $experiences;
    /**
     * @ORM\OneToMany(targetEntity="EntiteBundle\Entity\Evenements", mappedBy="utilisateur")
     */
    private $evenements;

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
     * @return mixed
     */
    public function getEtablissement()
    {
        return $this->etablissement;
    }

    /**
     * @param mixed $etablissement
     */
    public function setEtablissement($etablissement)
    {
        $this->etablissement = $etablissement;
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

    /**
     * Set prenom.
     *
     * @param string|null $prenom
     *
     * @return Utilisateur
     */
    public function setPrenom($prenom = null)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom.
     *
     * @return string|null
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set numero.
     *
     * @param int|null $numero
     *
     * @return Utilisateur
     */
    public function setNumero($numero = null)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero.
     *
     * @return int|null
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Add experience.
     *
     * @param \EntiteBundle\Entity\Experience $experience
     *
     * @return Utilisateur
     */
    public function addExperience(\EntiteBundle\Entity\Experience $experience)
    {
        $this->experiences[] = $experience;

        return $this;
    }

    /**
     * Remove experience.
     *
     * @param \EntiteBundle\Entity\Experience $experience
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeExperience(\EntiteBundle\Entity\Experience $experience)
    {
        return $this->experiences->removeElement($experience);
    }

    /**
     * Get experiences.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExperiences()
    {
        return $this->experiences;
    }







    /**
     * Add evenement.
     *
     * @param \EntiteBundle\Entity\Utilisateur $evenement
     *
     * @return Utilisateur
     */
    public function addEvenement(\EntiteBundle\Entity\Utilisateur $evenement)
    {
        $this->evenements[] = $evenement;

        return $this;
    }

    /**
     * Remove evenement.
     *
     * @param \EntiteBundle\Entity\Utilisateur $evenement
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeEvenement(\EntiteBundle\Entity\Utilisateur $evenement)
    {
        return $this->evenements->removeElement($evenement);
    }

    /**
     * Get evenements.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvenements()
    {
        return $this->evenements;
    }
}
