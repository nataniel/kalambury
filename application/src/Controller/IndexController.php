<?php
namespace Main\Controller;

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