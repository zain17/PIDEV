<?php

namespace EntiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Catalogue
 *
 * @ORM\Table(name="catalogue")
 * @ORM\Entity(repositoryClass="EntiteBundle\Repository\CatalogueRepository")
 */
class Catalogue
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
     * @ORM\Column(type="string", nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $description;
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $enService;

    /**
     * @ORM\OneToMany(targetEntity="EntiteBundle\Entity\Produit", mappedBy="catalogue")
     */
    private $produits;
    /**
     * @ORM\ManyToOne(targetEntity="EntiteBundle\Entity\Etablissement", inversedBy="catalogues")
     * @ORM\JoinColumn(name="etablissement_id", referencedColumnName="id", nullable=false)
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produits = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Catalogue
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
     * Set description
     *
     * @param string $description
     *
     * @return Catalogue
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set enService
     *
     * @param boolean $enService
     *
     * @return Catalogue
     */
    public function setEnService($enService)
    {
        $this->enService = $enService;

        return $this;
    }

    /**
     * Get enService
     *
     * @return boolean
     */
    public function getEnService()
    {
        return $this->enService;
    }

    /**
     * Add produit
     *
     * @param \EntiteBundle\Entity\Produit $produit
     *
     * @return Catalogue
     */
    public function addProduit(\EntiteBundle\Entity\Produit $produit)
    {
        $this->produits[] = $produit;

        return $this;
    }

    /**
     * Remove produit
     *
     * @param \EntiteBundle\Entity\Produit $produit
     */
    public function removeProduit(\EntiteBundle\Entity\Produit $produit)
    {
        $this->produits->removeElement($produit);
    }

    /**
     * Get produits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduits()
    {
        return $this->produits;
    }

    /**
     * Set etablissement
     *
     * @param \EntiteBundle\Entity\Etablissement $etablissement
     *
     * @return Catalogue
     */
    public function setEtablissement(\EntiteBundle\Entity\Etablissement $etablissement)
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    /**
     * Get etablissement
     *
     * @return \EntiteBundle\Entity\Etablissement
     */
    public function getEtablissement()
    {
        return $this->etablissement;
    }
}
