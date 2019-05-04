<?php
namespace Main\Controller;

use E4u\Response\Redirect;
use Main\Form\EditSettings;
use E4u\Application\View;
use Main\Model\Entry;

class SettingsController extends AbstractController
{
    public function indexAction()
    {
        $settings = $this->getCurrentSettings();
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

    public function addGroupAction()
    {
        $settings = $this->getCurrentSettings();
        $group = $this->getGroupFromParam();
        $settings->addToGroups($group->id())
            ->save();

        return $this->redirectBackOrTo('/', 'Zmiany zostały zapisane.', View::FLASH_SUCCESS);
    }

    public function removeGroupAction()
    {
        $settings = $this->getCurrentSettings();
        $group = $this->getGroupFromParam();
        $settings->delFromGroups($group->id())
            ->save();

        return $this->redirectBackOrTo('/', 'Zmiany zostały zapisane.', View::FLASH_SUCCESS);
    }

    /**
     * @return Entry\Group|Redirect
     */
    private function getGroupFromParam()
    {
        $id = (int)$this->getParam('id');
        if (empty($id)) {
            return $this->redirectTo('/');
        }

        $group = Entry\Group::find($id);
        if (null === $group) {
            return $this->redirectTo('/');
        }

        return $group;
    }
}