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
     * @param  int $id
     * @return bool
     */
    public function hasGroup($id)
    {
        foreach ($this->groups as $group) {
            if ($group == $id) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param  int $id
     * @return $this
     */
    public function addToGroups($id)
    {
        if (!$this->hasGroup($id)) {
            $this->groups[] = $id;
        }

        return $this;
    }

    /**
     * @param  int $id
     * @return $this
     */
    public function delFromGroups($id)
    {
        foreach ($this->groups as $key => $group) {
            if ($group == $id) {
                unset($this->groups[ $key ]);
            }
        }

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
        return [ Entry::DIFFICULTY_LOW, Entry::DIFFICULTY_MEDIUM, ];
    }

    /**
     * @return int[]
     */
    private static function defaultGroups()
    {
        $options = [];
        foreach (Entry\Group::findBy([ 'public' => true, ]) as $group) {
            $options[] = $group->id();
        }

        return $options;
    }
}