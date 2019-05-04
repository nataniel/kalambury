<?php
namespace Main\View;

use E4u\Application\View\Html as E4uView;
use E4u\Form\Builder\Bootstrap4;

/**
 * Class Base
 * @package Main\View
 *
 */
class Base extends E4uView
{
    /**
     * @param \E4u\Form\Base $form
     * @param  bool $showLabels
     * @return Bootstrap4
     */
    public function createBootstrapForm($form, $showLabels = false)
    {
        return new Bootstrap4($form, $this, [
            'show_labels' => $showLabels,
            'current_locale' => $this->getLocale(),
        ]);
    }
}