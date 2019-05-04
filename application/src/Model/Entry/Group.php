<?php
namespace Main\Model\Entry;

use E4u\Model\Entity;
use Main\Model\Entry;

/**
 * @Entity
 * @Table(name="entries_groups")
 */
class Group extends Entity
{
    const
        RATING_MIN = 1,
        RATING_MAX = 5;

    /** @Column(type="string") */
    protected $name;

    /** @Column(type="string") */
    protected $owner;

    /** @Column(type="decimal", precision=8, scale=2, nullable=true) */
    protected $rating;

    /** @Column(type="boolean") */
    protected $public = false;

    /**
     * @var Entry[]
     * @OneToMany(targetEntity="Main\Model\Entry", mappedBy="group", cascade={"all"}, orphanRemoval=true)
     */
    protected $entries;

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
     * @return Entry[]
     */
    public function getEntries()
    {
        return $this->entries;
    }

    /**
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @return float
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @return bool
     */
    public function isPublic()
    {
        return (bool)$this->public;
    }

    /**
     * @param  array|Entry $value
     * @param  bool $keepConsistency
     * @return $this
     */
    public function addToEntries($value, $keepConsistency = true)
    {
        $this->_addTo('entries', $value, $keepConsistency);
        return $this;
    }

    /**
     * @return string
     */
    public function toUrl()
    {
        return '/groups/show/' . $this->id();
    }
}