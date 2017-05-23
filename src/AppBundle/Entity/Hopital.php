<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Hopital
 *
 * @ORM\Table(name="hopital")
 * @ORM\Entity
 */
class Hopital
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=512, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="text", length=65535, nullable=true)
     */
    private $localisation;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var Administrateur
     *
     * @Gedmo\Blameable(on="create")
     *
     * @ORM\Column(name="created_by", type="integer", nullable=false)
     */
    private $createdBy;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="update")
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var Administrateur
     *
     * @Gedmo\Blameable(on="change", field={"nom", "localisation", "description", "medecins"})
     *
     * @ORM\Column(name="updated_by", type="integer", nullable=false)
     */
    private $updatedBy;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Medecin", inversedBy="hopital")
     * @ORM\JoinTable(name="hopital_has_medecin",
     *   joinColumns={
     *     @ORM\JoinColumn(name="hopital_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="medecin_id", referencedColumnName="id")
     *   }
     * )
     */
    private $medecins;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->medecins = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return integer
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
     * @return Hopital
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
     * Set localisation
     *
     * @param string $localisation
     *
     * @return Hopital
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * Get localisation
     *
     * @return string
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Hopital
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Hopital
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     *
     * @return Hopital
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return integer
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Hopital
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set updatedBy
     *
     * @param integer $updatedBy
     *
     * @return Hopital
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return integer
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Add medecin
     *
     * @param Medecin $medecin
     *
     * @return Hopital
     */
    public function addMedecin(Medecin $medecin)
    {
        $this->medecins[] = $medecin;

        return $this;
    }

    /**
     * Remove medecin
     *
     * @param Medecin $medecin
     */
    public function removeMedecin(Medecin $medecin)
    {
        $this->medecins->removeElement($medecin);
    }

    /**
     * Get medecins
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedecins()
    {
        return $this->medecins;
    }
}
