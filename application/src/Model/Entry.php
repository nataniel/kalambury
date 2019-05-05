<?php
namespace Main\Model;

use Doctrine\ORM\EntityRepository;
use E4u\Model\Entity;

/**
 * @Entity(repositoryClass="Main\Model\Entry\Repository")
 * @Table(name="entries")
 */
class Entry extends Entity
{
    const
        DIFFICULTY_LOW = 1,
        DIFFICULTY_MEDIUM = 2,
        DIFFICULTY_HIGH = 3;

    /** @Column(type="string") */
    protected $name;

    /** @Column(type="text") */
    protected $description;

    /** @Column(type="integer") */
    protected $difficulty = Entry::DIFFICULTY_MEDIUM;

    /**
     * @var Entry\Group
     * @ManyToOne(targetEntity="Main\Model\Entry\Group", inversedBy="entries")
     */
    protected $group;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return Entry\Group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @return int
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * @return string
     */
    public function showDifficulty()
    {
        return 'difficulty.' . $this->difficulty;
    }

    /**
     * @return Entry\Repository|EntityRepository
     */
    public static function getRepository()
    {
        return parent::getRepository();
    }
}