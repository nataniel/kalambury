<?php
namespace Main\Model;

use E4u\Model\Base;

class Settings extends Base
{
    private $groups = [];
    private $difficulties = [];

    /**
     * @return int[]
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param  int[] $groups
     * @return Settings
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
        return $this;
    }

    /**
     * @return int[]
     */
    public function getDifficulties()
    {
        return $this->difficulties;
    }

    /**
     * @param  int[] $difficulties
     * @return Settings
     */
    public function setDifficulties($difficulties)
    {
        $this->difficulties = $difficulties;
        return $this;
    }

    /**
     * @return $this
     */
    public function save()
    {
        $_SESSION['settings'] = [
            'difficulties' => $this->difficulties,
            'groups' => $this->groups,
        ];

        return $this;
    }

    public static function defaultOptions()
    {
        return [
            'difficulties' => self::defaultDifficulties(),
            'groups' => self::defaultGroups(),
        ];
    }

    /**
     * @return int[]
     */
    public static function defaultDifficulties()
    {
        return [ Entry::DIFFICULTY_LOW, Entry::DIFFICULTY_MEDIUM, Entry::DIFFICULTY_HIGH, ];
    }

    /**
     * @return int[]
     */
    private static function defaultGroups()
    {
        $options = [];
        foreach (Entry\Group::findAll() as $group) {
            $options[] = $group->id();
        }

        return $options;
    }
}