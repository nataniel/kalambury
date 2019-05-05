<?php
namespace Main\Model\Entry;

use E4u\Model\Repository as E4uRepository;
use Main\Model\Entry;
use Main\Model\Settings;

class Repository extends E4uRepository
{
    /**
     * @param  Settings $settings
     * @return Entry|null
     */
    public function findRandomEntry(Settings $settings)
    {
        $result = $this->findBy([ 'group' => $settings->getGroups(), 'difficulty' => $settings->getDifficulties() ]);
        $random = rand(0,count($result) - 1);

        return isset($result[ $random ])
            ? $result[ $random ]
            : null;
    }
}