<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ordonnance
 *
 * @ORM\Table(name="ordonnance")
 * @ORM\Entity
 */
class Ordonnance
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
     * @ORM\Column(name="infos_complementaires", type="text", length=65535, nullable=true)
     */
    private $infosComplementaires;

    /**
     * @var integer
     *
     * @ORM\Column(name="consultation_id", type="integer", nullable=false)
     */
    private $consultationId;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Medicament", inversedBy="ordonnance")
     * @ORM\JoinTable(name="ordonnance_has_medicament",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ordonnance_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="medicament_id", referencedColumnName="id")
     *   }
     * )
     */
    private $medicament;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->medicament = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set infosComplementaires
     *
     * @param string $infosComplementaires
     *
     * @return Ordonnance
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
     * Set consultationId
     *
     * @param integer $consultationId
     *
     * @return Ordonnance
     */
    public function setConsultationId($consultationId)
    {
        $this->consultationId = $consultationId;

        return $this;
    }

    /**
     * Get consultationId
     *
     * @return integer
     */
    public function getConsultationId()
    {
        return $this->consultationId;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Ordonnance
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
     * @return Ordonnance
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
     * @return Ordonnance
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
     * @return Ordonnance
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
     * Add medicament
     *
     * @param Medicament $medicament
     *
     * @return Ordonnance
     */
    public function addMedicament(Medicament $medicament)
    {
        $this->medicament[] = $medicament;

        return $this;
    }

    /**
     * Remove medicament
     *
     * @param Medicament $medicament
     */
    public function removeMedicament(Medicament $medicament)
    {
        $this->medicament->removeElement($medicament);
    }

    /**
     * Get medicament
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedicament()
    {
        return $this->medicament;
    }
}
