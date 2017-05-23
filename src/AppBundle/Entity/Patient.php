<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patient
 *
 * @ORM\Table(name="patient", indexes={@ORM\Index(name="patient_has_medecin_traitant_id", columns={"medecin_traitant_id"})})
 * @ORM\Entity
 */
class Patient
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
     * @ORM\Column(name="prenom", type="string", length=512, nullable=false)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_de_naissance", type="datetime", nullable=true)
     */
    private $dateDeNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="infos_complementaires", type="text", length=65535, nullable=true)
     */
    private $infosComplementaires;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", nullable=false)
     */
    private $createdBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="updated_by", type="integer", nullable=false)
     */
    private $updatedBy;

    /**
     * @var Medecin
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Medecin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="medecin_traitant_id", referencedColumnName="id")
     * })
     */
    private $medecinTraitant;



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
     * @return Patient
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Patient
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateDeNaissance
     *
     * @param \DateTime $dateDeNaissance
     *
     * @return Patient
     */
    public function setDateDeNaissance($dateDeNaissance)
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }

    /**
     * Get dateDeNaissance
     *
     * @return \DateTime
     */
    public function getDateDeNaissance()
    {
        return $this->dateDeNaissance;
    }

    /**
     * Set infosComplementaires
     *
     * @param string $infosComplementaires
     *
     * @return Patient
     */
    public function setInfosComplementaires($infosComplementaires)
    {
        $this->infosComplementaires = $infosComplementaires;

        return $this;
    }

    /**
     * Get infosComplementaires
     *
     * @return string
     */
    public function getInfosComplementaires()
    {
        return $this->infosComplementaires;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Patient
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
     * @return Patient
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
     * @return Patient
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
     * @return Patient
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
     * Set medecinTraitant
     *
     * @param Medecin $medecinTraitant
     *
     * @return Patient
     */
    public function setMedecinTraitant(Medecin $medecinTraitant = null)
    {
        $this->medecinTraitant = $medecinTraitant;

        return $this;
    }

    /**
     * Get medecinTraitant
     *
     * @return Medecin
     */
    public function getMedecinTraitant()
    {
        return $this->medecinTraitant;
    }
}
