<?php
/**
 * The routes are matched from LAST to FIRST !!
 */
return [
    /**
     * Home page route
     */
    'home' => [
        'type' => Zend\Mvc\Router\Http\Literal::class,
        'options' => [
            'route'    => '/',
            'defaults' => [
                'module'     => null,
                'controller' => 'index',
                'action'     => 'index',
            ],
        ],
    ],

    /**
     * Default route
     * @example /pages/show/1
     */
    'default' => [
        'type'    => E4u\Application\Router\Route::class,
        'options' => [
            'route'    => '/:controller[/:action[/:id]]',
            'constraints' => [
                'controller' => '\w[\w\-]*',
                'action'     => '\w[\w\-]*',
                'id'          => '\d+',
            ],
            'defaults' => [
                'module'     => null,
                'controller' => 'index',
                'action'     => 'index',
            ],
        ],
    ],

    /**
     * Random entry
     */
    'random' => [
        'type' => E4u\Application\Router\Literal::class,
        'options' => [
            'route'    => '/random',
            'defaults' => [
                'module'     => null,
                'controller' => 'entries',
                'action'     => 'random',
            ],
        ],
    ],

    /**
     * Reset doctrine cache
     */
    'reset' => [
        'type' => E4u\Application\Router\Literal::class,
        'options' => [
            'route'    => '/reset',
            'defaults' => [
                'module'     => null,
                'controller' => 'index',
                'action'     => 'reset',
            ],
        ],
    ],
];