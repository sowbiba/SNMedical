<?php
/**
 * Created by PhpStorm.
 * User: isow
 * Date: 23/05/17
 * Time: 11:06
 */

namespace Tests\AppBundle\Entity;


use AppBundle\Entity\Administrateur;
use AppBundle\Entity\Hopital;
use AppBundle\Entity\Medecin;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Tests\AppBundle\BaseUnitTestCase;

class MedecinTest extends WebTestCase
{
    public function testId()
    {
        $administrateur = new Administrateur();

        $this->assertNull($administrateur->getId());

        $administrateur = new \stdClass();
        $administrateur->id = 1;
        $administrateur = BaseUnitTestCase::cast('\AppBundle\Entity\Administrateur', $administrateur);
        /* @var Administrateur $administrateur */
        $this->assertSame(1, $administrateur->getId());
    }

    public function testNom()
    {
        $administrateur = new Administrateur();

        $this->assertNull($administrateur->getNom());

        $administrateur->setNom('Nom administrateur');

        $this->assertSame('Nom administrateur', $administrateur->getNom());
    }

    public function testPrenom()
    {
        $administrateur = new Administrateur();

        $this->assertNull($administrateur->getPrenom());

        $administrateur->setPrenom('Prenom administrateur');

        $this->assertSame('Prenom administrateur', $administrateur->getPrenom());
    }

    public function testDateDeNaissance()
    {
        $administrateur = new Administrateur();

        $this->assertNull($administrateur->getDateDeNaissance());

        $dateTime = new \DateTime('now');

        $administrateur->setDateDeNaissance($dateTime);

        /* @var Administrateur $administrateur */
        $this->assertSame($dateTime, $administrateur->getDateDeNaissance());
    }

    public function testInfosComplementaires()
    {
        $administrateur = new Administrateur();

        $this->assertNull($administrateur->getInfosComplementaires());

        $administrateur->setInfosComplementaires('InfosComplementaires administrateur');

        $this->assertSame('InfosComplementaires administrateur', $administrateur->getInfosComplementaires());

        $localisation = str_repeat('InfosComplementaires administrateur ', 200);
        $administrateur->setInfosComplementaires($localisation);

        $this->assertSame($localisation, $administrateur->getInfosComplementaires());
    }

    public function testCreatedAt()
    {
        $administrateur = new Administrateur();

        $this->assertNull($administrateur->getCreatedAt());

        $dateTime = new \DateTime('now');

        $administrateur->setCreatedAt($dateTime);

        /* @var Administrateur $administrateur */
        $this->assertSame($dateTime, $administrateur->getCreatedAt());
    }

    public function testCreatedBy()
    {
        $administrateur = new Administrateur();

        $this->assertNull($administrateur->getCreatedBy());

        $administrateur->setCreatedBy(1);

        /* @var Administrateur $administrateur */
        $this->assertSame(1, $administrateur->getCreatedBy());
    }

    public function testUpdatedAt()
    {
        $administrateur = new Administrateur();

        $this->assertNull($administrateur->getUpdatedAt());

        $dateTime = new \DateTime('now');

        $administrateur->setUpdatedAt($dateTime);

        /* @var Administrateur $administrateur */
        $this->assertSame($dateTime, $administrateur->getUpdatedAt());
    }

    public function testUpdatedBy()
    {
        $administrateur = new Administrateur();

        $this->assertNull($administrateur->getUpdatedBy());

        $administrateur->setUpdatedBy(1);

        /* @var Administrateur $administrateur */
        $this->assertSame(1, $administrateur->getUpdatedBy());
    }

    public function testHopital()
    {
        $administrateur = new Administrateur();

        $this->assertNull($administrateur->getHopital());

        $hopital = new Hopital();
        $administrateur->setHopital($hopital);

        $this->assertNotNull($administrateur->getHopital());
        $this->assertSame($hopital, $administrateur->getHopital());

        $administrateur->setHopital(null);

        $this->assertNull($administrateur->getHopital());
    }

}