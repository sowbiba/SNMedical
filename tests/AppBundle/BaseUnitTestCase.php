<?php

namespace Tests\AppBundle;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\Validation;

abstract class BaseUnitTestCase extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    public function getConstraintsValidator()
    {
        return Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
    }

    public function repositorySetUp()
    {
        self::bootKernel();
        $this->getEntityManager();
    }

    public function repositoryTearDown()
    {
        parent::tearDown();
        $this->em->close();
    }

    public function getEntityManager()
    {
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager()
        ;
    }

    /**
     * Call protected/private method of a class.
     *
     * @param object &$object    Instantiated object that we will run method on
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method
     *
     * @return mixed Method return
     */
    public function invokeMethod(&$object, $methodName, array $parameters = [])
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    public static function cast($destination, $sourceObject)
    {
        if (is_string($destination)) {
            $destination = new $destination();
        }

        $sourceReflection = new \ReflectionObject($sourceObject);
        $destinationReflection = new \ReflectionObject($destination);
        $sourceProperties = $sourceReflection->getProperties();

        foreach ($sourceProperties as $sourceProperty) {
            $sourceProperty->setAccessible(true);
            $name = $sourceProperty->getName();
            $value = $sourceProperty->getValue($sourceObject);

            if ($destinationReflection->hasProperty($name)) {
                $propDest = $destinationReflection->getProperty($name);
                $propDest->setAccessible(true);
                $propDest->setValue($destination, $value);
            } else {
                $destination->$name = $value;
            }
        }

        return $destination;
    }
}