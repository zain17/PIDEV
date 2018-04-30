<?php

namespace EntiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etablissement
 *
 * @ORM\Table(name="etablissement")
 * @ORM\Entity(repositoryClass="EntiteBundle\Repository\EtablissementRepository")
 */
class Etablissement
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
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $nom;
    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $gouvernorat;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $ville;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private $note;

    /**
     * @var datetime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $horraire;
    /**
     * @var datetime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $horraireF;
    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $type;
    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private $longitude;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private $latitude;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $estActive;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $photo;
    /**
     * @ORM\OneToMany(targetEntity="EntiteBundle\Entity\Catalogue", mappedBy="etablissement")
     */
    private $catalogues;
    /**
     * @ORM\OneToMany(targetEntity="EntiteBundle\Entity\Experience", mappedBy="etablissement")
     */
    private $experiences;
    /**
     * @ORM\OneToMany(targetEntity="EntiteBundle\Entity\Revue", mappedBy="etablissement")
     */
    private $revues;


    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getExperiences()
    {
        return $this->experiences;
    }

    /**
     * @param mixed $experiences
     */
    public function setExperiences($experiences)
    {
        $this->experiences = $experiences;
    }

    /**
     * @return mixed
     */
    public function getRevues()
    {
        return $this->revues;
    }

    /**
     * @param mixed $revues
     */
    public function setRevues($revues)
    {
        $this->revues = $revues;
    }


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Etablissement
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Etablissement
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set gouvernorat
     *
     * @param string $gouvernorat
     *
     * @return Etablissement
     */
    public function setGouvernorat($gouvernorat)
    {
        $this->gouvernorat = $gouvernorat;

        return $this;
    }

    /**
     * Get gouvernorat
     *
     * @return string
     */
    public function getGouvernorat()
    {
        return $this->gouvernorat;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Etablissement
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set note
     *
     * @param float $note
     *
     * @return Etablissement
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return float
     */
    public function getNote()
    {
        return $this->note;
    }
    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Etablissement
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Etablissement
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
     * Set estActive
     *
     * @param boolean $estActive
     *
     * @return Etablissement
     */
    public function setEstActive($estActive)
    {
        $this->estActive = $estActive;

        return $this;
    }

    /**
     * Get estActive
     *
     * @return boolean
     */
    public function getEstActive()
    {
        return $this->estActive;
    }
    /**
     * Constructor
     */
    public function __construct()
    {

    }




    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @param mixed $catalogues
     */
    public function setCatalogues($catalogues)
    {
        $this->catalogues = $catalogues;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Etablissement
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add catalogue
     *
     * @param \EntiteBundle\Entity\Catalogue $catalogue
     *
     * @return Etablissement
     */
    public function addCatalogue(\EntiteBundle\Entity\Catalogue $catalogue)
    {
        $this->catalogues[] = $catalogue;

        return $this;
    }

    /**
     * Remove catalogue
     *
     * @param \EntiteBundle\Entity\Catalogue $catalogue
     */
    public function removeCatalogue(\EntiteBundle\Entity\Catalogue $catalogue)
    {
        $this->catalogues->removeElement($catalogue);
    }

    /**
     * Get catalogues
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCatalogues()
    {
        return $this->catalogues;
    }

    /**
     * Add experience
     *
     * @param \EntiteBundle\Entity\Experience $experience
     *
     * @return Etablissement
     */
    public function addExperience(\EntiteBundle\Entity\Experience $experience)
    {
        $this->experiences[] = $experience;

        return $this;
    }

    /**
     * Remove experience
     *
     * @param \EntiteBundle\Entity\Experience $experience
     */
    public function removeExperience(\EntiteBundle\Entity\Experience $experience)
    {
        $this->experiences->removeElement($experience);
    }

    /**
     * Add revue
     *
     * @param \EntiteBundle\Entity\Revue $revue
     *
     * @return Etablissement
     */
    public function addRevue(\EntiteBundle\Entity\Revue $revue)
    {
        $this->revues[] = $revue;

        return $this;
    }

    /**
     * Remove revue
     *
     * @param \EntiteBundle\Entity\Revue $revue
     */
    public function removeRevue(\EntiteBundle\Entity\Revue $revue)
    {
        $this->revues->removeElement($revue);
    }

    public function __toString()
    {
        return "";
    }


    /**
     * Set horraire.
     *
     * @param \DateTime|null $horraire
     *
     * @return Etablissement
     */
    public function setHorraire($horraire = null)
    {
        $this->horraire = $horraire;

        return $this;
    }

    /**
     * Get horraire.
     *
     * @return \DateTime|null
     */
    public function getHorraire()
    {
        return $this->horraire;
    }

    /**
     * Set photo.
     *
     * @param string|null $photo
     *
     * @return Etablissement
     */
    public function setPhoto($photo = null)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo.
     *
     * @return string|null
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set horraireF.
     *
     * @param \DateTime|null $horraireF
     *
     * @return Etablissement
     */
    public function setHorraireF($horraireF = null)
    {
        $this->horraireF = $horraireF;

        return $this;
    }

    /**
     * Get horraireF.
     *
     * @return \DateTime|null
     */
    public function getHorraireF()
    {
        return $this->horraireF;
    }
}
