<?php
/**
 * Created by PhpStorm.
 * User: isow
 * Date: 23/05/17
 * Time: 11:06
 */

namespace Tests\AppBundle\Entity;


use AppBundle\Entity\Hopital;
use AppBundle\Entity\Medecin;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Tests\AppBundle\BaseUnitTestCase;

class HopitalTest extends WebTestCase
{
    public function testId()
    {
        $hopital = new Hopital();

        $this->assertNull($hopital->getId());

        $hopital = new \stdClass();
        $hopital->id = 1;
        $hopital = BaseUnitTestCase::cast('\AppBundle\Entity\Hopital', $hopital);
        /* @var Hopital $hopital */
        $this->assertSame(1, $hopital->getId());
    }

    public function testNom()
    {
        $hopital = new Hopital();

        $this->assertNull($hopital->getNom());

        $hopital->setNom('Nom hopital');

        $this->assertSame('Nom hopital', $hopital->getNom());
    }

    public function testLocalisation()
    {
        $hopital = new Hopital();

        $this->assertNull($hopital->getLocalisation());

        $hopital->setLocalisation('Localisation hopital');

        $this->assertSame('Localisation hopital', $hopital->getLocalisation());

        $localisation = str_repeat('Localisation hopital ', 200);
        $hopital->setLocalisation($localisation);

        $this->assertSame($localisation, $hopital->getLocalisation());
    }

    public function testDescription()
    {
        $hopital = new Hopital();

        $this->assertNull($hopital->getDescription());

        $hopital->setDescription('Description hopital');

        $this->assertSame('Description hopital', $hopital->getDescription());

        $description = str_repeat('Description hopital ', 200);
        $hopital->setDescription($description);

        $this->assertSame($description, $hopital->getDescription());
    }

    public function testCreatedAt()
    {
        $hopital = new Hopital();

        $this->assertNull($hopital->getCreatedAt());

        $dateTime = new \DateTime('now');

        $hopital->setCreatedAt($dateTime);

        /* @var Hopital $hopital */
        $this->assertSame($dateTime, $hopital->getCreatedAt());
    }

    public function testCreatedBy()
    {
        $hopital = new Hopital();

        $this->assertNull($hopital->getCreatedBy());

        $hopital->setCreatedBy(1);

        /* @var Hopital $hopital */
        $this->assertSame(1, $hopital->getCreatedBy());
    }

    public function testUpdatedAt()
    {
        $hopital = new Hopital();

        $this->assertNull($hopital->getUpdatedAt());

        $dateTime = new \DateTime('now');

        $hopital->setUpdatedAt($dateTime);

        /* @var Hopital $hopital */
        $this->assertSame($dateTime, $hopital->getUpdatedAt());
    }

    public function testUpdatedBy()
    {
        $hopital = new Hopital();

        $this->assertNull($hopital->getUpdatedBy());

        $hopital->setUpdatedBy(1);

        /* @var Hopital $hopital */
        $this->assertSame(1, $hopital->getUpdatedBy());
    }

    public function testMedecins()
    {
        $hopital = new Hopital();

        $this->assertTrue($hopital->getMedecins()->isEmpty());

        $medecin = new Medecin();
        $hopital->addMedecin($medecin);

        $this->assertFalse($hopital->getMedecins()->isEmpty());
        $this->assertSame(1, $hopital->getMedecins()->count());
        $this->assertTrue(in_array($medecin, $hopital->getMedecins()->toArray(), true));

        $medecin2 = new Medecin();
        $hopital->addMedecin($medecin2);

        $this->assertFalse($hopital->getMedecins()->isEmpty());
        $this->assertSame(2, $hopital->getMedecins()->count());
        $this->assertTrue(in_array($medecin, $hopital->getMedecins()->toArray(), true));
        $this->assertTrue(in_array($medecin2, $hopital->getMedecins()->toArray(), true));

        $hopital->removeMedecin($medecin);

        $this->assertFalse($hopital->getMedecins()->isEmpty());
        $this->assertSame(1, $hopital->getMedecins()->count());
        $this->assertTrue(in_array($medecin2, $hopital->getMedecins()->toArray(), true));
    }

}