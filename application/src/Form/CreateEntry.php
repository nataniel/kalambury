<?php
namespace Main\Form;

use E4u\Form;
use Main\Model\Entry;

class CreateEntry extends Form\Base
{
    public function init()
    {
        $this->addFields([

            new Form\Element\TextField('name', [
                'label' => 'Hasło do odgadnięcia',
                'required' => 'Podaj hasło do odgadnięcia.',
                'model' => $this->getModel('entry'),
            ]),

            new Form\Element\TextField('description', [
                'label' => 'Opis hasła',
                'model' => $this->getModel('entry'),
            ]),

            new Form\Element\Select('difficulty', [
                'label' => 'Poziom trudności',
                'required' => 'Określ poziom trudności hasła.',
                'model' => $this->getModel('entry'),
                'options' => $this->difficultyOptions(),
            ]),

            new Form\Element\Submit('submit', 'Utwórz wpis'),

        ]);
    }

    /**
     * @return string[]
     */
    private function difficultyOptions()
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
}