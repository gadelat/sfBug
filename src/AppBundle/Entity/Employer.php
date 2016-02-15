<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="employer")
 */
class Employer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $testField;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getTestField()
    {
        return $this->testField;
    }

    /**
     * @param int $testField
     */
    public function setTestField($testField)
    {
        $this->testField = $testField;
    }
}
