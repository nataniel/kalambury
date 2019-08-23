<?php
namespace Main\Controller;

use E4u\Application\View;
use E4u\Response\Redirect;
use Main\Model\Entry;
use Main\Form;

class EntriesController extends AbstractController
{
    public function indexAction()
    {
        return $this->redirectTo('/random');
    }

    public function randomAction()
    {
        $settings = $this->getCurrentSettings();
        $random = Entry::getRepository()->findRandomEntry($settings);

        return [
            'title' => 'Losowy wpis',
            'entry' => $random,
        ];
    }

    public function editAction()
    {
        $entry = $this->getEntryFromParam();

        $editEntry = new Form\EditEntry($this->getRequest(), [ 'entry' => $entry, ]);
        if ($editEntry->isValid()) {
            $entry->save();
            return $this->redirectTo('/entries/show/' . $entry->id(),
                'Zmiany zostały zapisane.', View::FLASH_SUCCESS);
        }

        return [
            'title' => 'Edycja wpisu',
            'form' => $editEntry,
        ];
    }

    public function showAction()
    {
        $entry = $this->getEntryFromParam();

        return [
            'title' => 'Zobacz wpis',
            'entry' => $entry,
        ];
    }

    /**
     * @return Entry|Redirect
     */
    private function getEntryFromParam()
    {
        $id = (int)$this->getParam('id');
        if (empty($id)) {
            return $this->redirectTo('/');
        }

        $entry = Entry::find($id);
        if (null === $entry) {
            return $this->redirectTo('/');
        }

        return $entry;
    }
}