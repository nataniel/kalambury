<?php
namespace Main\Controller;

use Main\Model\Entry;

class RandomController extends AbstractController
{
    public function indexAction()
    {
        $settings = $this->getCurrentSettings();
        $random = Entry::getRepository()->findRandomEntry($settings);

        return [
            'title' => 'Losowy wpis',
            'entry' => $random,
        ];
    }

}