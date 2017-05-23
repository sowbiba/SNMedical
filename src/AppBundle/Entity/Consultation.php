<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consultation
 *
 * @ORM\Table(name="consultation", indexes={@ORM\Index(name="consultation_patient_id", columns={"patient_id"}), @ORM\Index(name="consultation_medecin_id", columns={"medecin_id"})})
 * @ORM\Entity
 */
class Consultation
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
     * @ORM\Column(name="rapport", type="text", length=65535, nullable=true)
     */
    private $rapport;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status = '0';

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
     *   @ORM\JoinColumn(name="medecin_id", referencedColumnName="id")
     * })
     */
    private $medecin;

    /**
     * @var Patient
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Patient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="patient_id", referencedColumnName="id")
     * })
     */
    private $patient;



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
     * Set rapport
     *
     * @param string $rapport
     *
     * @return Consultation
     */
    public function setRapport($rapport)
    {
        $this->rapport = $rapport;

        return $this;
    }

    /**
     * Get rapport
     *
     * @return string
     */
    public function getRapport()
    {
        return $this->rapport;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Consultation
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Consultation
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
     * @return Consultation
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
     * @return Consultation
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
     * @return Consultation
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
     * Set medecin
     *
     * @param Medecin $medecin
     *
     * @return Consultation
     */
    public function setMedecin(Medecin $medecin = null)
    {
        $this->medecin = $medecin;

        return $this;
    }

    /**
     * Get medecin
     *
     * @return Medecin
     */
    public function getMedecin()
    {
        return $this->medecin;
    }

    /**
     * Set patient
     *
     * @param Patient $patient
     *
     * @return Consultation
     */
    public function setPatient(Patient $patient = null)
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * Get patient
     *
     * @return Patient
     */
    public function getPatient()
    {
        return $this->patient;
    }
}
