<?php
namespace Main\Controller;

use E4u\Application\View;

class IndexController extends AbstractController
{
    public function indexAction()
    {
        return [
            'title' => 'Kalambury',
        ];
    }

    public function resetAction()
    {
    }
}