<?php
namespace Main\Controller;

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

        $entry = new Entry();
        $createEntry = new CreateEntry($this->getRequest(), [ 'entry' => $entry, ]);
        if ($createEntry->isValid()) {
            $group->addToEntries($entry);
            $entry->save();
            return $this->redirectTo($group);
        }

        return [
            'title' => $group->getName(),
            'form' => $createEntry,
            'group' => $group,
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