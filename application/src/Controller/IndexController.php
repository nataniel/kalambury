<?php
namespace Main\Controller;

use E4u\Application\View;
use Main\Form\CreateOrder;
use Rebel\Nav\Client;
use Rebel\Nav\PayUBuffer\Record as PayUBuffer;

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