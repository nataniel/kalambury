<?php
namespace Main\Form;

use E4u\Form;
use Main\Model\Entry;

class EditSettings extends Form\Base
{
    public function init()
    {
        $this->addFields([

            new Form\Element\CheckBoxGroup('groups', [
                'label' => 'Grupa haseł',
                'required' => 'Wybierz grupy tematyczne haseł.',
                'options' => $this->groupsOptions(),
                'model' => $this->getModel('settings'),
            ]),

            new Form\Element\CheckBoxGroup('difficulties', [
                'label' => 'Poziom trudności',
                'required' => 'Wybierz poziomy trudności haseł.',
                'options' => $this->difficultiesOptions(),
                'model' => $this->getModel('settings'),
            ]),

            new Form\Element\Submit('submit', 'Zapisz zmiany'),

        ]);
    }

    /**
     * @return string[]
     */
    private function difficultiesOptions()
    {
        $options = [];
        foreach ([
             Entry::DIFFICULTY_LOW,
             Entry::DIFFICULTY_MEDIUM,
             Entry::DIFFICULTY_HIGH,
         ] as $value) {
            $options[ $value ] = 'difficulty.' . $value;
        }

        return $options;
    }

    /**
     * @return string[]
     */
    private function groupsOptions()
    {
        $options = [];
        foreach (Entry\Group::findAll() as $group) {
            $options[ $group->id() ] = $group->getName();
        }

        return $options;
    }
}