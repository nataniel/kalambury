<?php
namespace Main\Controller;

use E4u\Application\View;
use E4u\Response\Redirect;
use Main\Form\CreateEntry;
use Main\Model\Entry;

class GroupsController extends AbstractController
{
    public function indexAction()
    {
        return $this->redirectTo('/');
    }

    public function showAction()
    {
        $group = $this->getGroupFromParam();

        $new = new Entry();
        $createEntry = new CreateEntry($this->getRequest(), [ 'entry' => $new, ]);
        if ($createEntry->isValid()) {

            foreach ($group->getEntries() as $entry) {
                if ($entry->getName() == $new->getName()) {
                    return $this->redirectTo($group, 'Taki wpis już istnieje.', View::FLASH_ERROR);
                }
            }

            $group->addToEntries($new);
            $new->save();
            return $this->redirectTo($group, 'Wpis został dodany.', View::FLASH_SUCCESS);
        }

        return [
            'title' => $group->getName(),
            'form' => $createEntry,
            'group' => $group,
            'settings' => $this->getCurrentSettings(),
        ];
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