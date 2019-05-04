<?php
namespace Main\Controller;

use Main\Form\EditSettings;
use Main\Model\Settings;
use E4u\Application\View;

class SettingsController extends AbstractController
{
    public function indexAction()
    {
        $settings = new Settings(!empty($_SESSION['settings'])
            ? $_SESSION['settings']
            : Settings::defaultOptions());

        $editSettings = new EditSettings($this->getRequest(), [ 'settings' => $settings ]);
        if ($editSettings->isValid()) {
            $settings->save();
            return $this->redirectTo('/', 'Zmiany zostały zapisane.', View::FLASH_SUCCESS);
        }

        return [
            'title' => 'Ustawienia',
            'form' => $editSettings,
        ];
    }
}