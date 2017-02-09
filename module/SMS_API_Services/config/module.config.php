<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace SMS_API_Services;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'sms_api_services' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/sms_api_services[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'sendSmsJson' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/sms/send.json[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0,9]+'
                    ],
                    'defaults' => [
                        'controller' => Controller\JsonController::class,
                        'action' => 'sendSmsJson',
                    ]
                ]
            ],
            'getCountriesJson' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/countries.json',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0,9]+'
                    ],
                    'defaults' => [
                        'controller' => Controller\JsonController::class,
                        'action' => 'getCountriesJson',
                    ]
                ]
            ],
            'sentJson' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/sms/sent.json[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0,9]+'
                    ],
                    'defaults' => [
                        'controller' => Controller\JsonController::class,
                        'action' => 'sentJson',
                    ]
                ]
            ],
            'statisticsJson' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/statistics.json[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0,9]+'
                    ],
                    'defaults' => [
                        'controller' => Controller\JsonController::class,
                        'action' => 'statisticsJson',
                    ]
                ]
            ],
            'sendSmsXml' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/sms/send.xml[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0,9]+'
                    ],
                    'defaults' => [
                        'controller' => Controller\XmlController::class,
                        'action' => 'sendSmsXml',
                    ]
                ]
            ],
            'getCountriesXml' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/countries.xml',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0,9]+'
                    ],
                    'defaults' => [
                        'controller' => Controller\XmlController::class,
                        'action' => 'getcountriesXml',
                    ]
                ]
            ],
            'sentXml' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/sms/sent.xml[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0,9]+'
                    ],
                    'defaults' => [
                        'controller' => Controller\XmlController::class,
                        'action' => 'sentXml',
                    ]
                ]
            ],
            'statisticsXml' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/statistics.xml[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0,9]+'
                    ],
                    'defaults' => [
                        'controller' => Controller\XmlController::class,
                        'action' => 'statisticsXml',
                    ]
                ]
            ]

        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\JsonController::class=> Controller\Factories\JsonControllerFactory::class,
            Controller\XmlController::class=> Controller\Factories\ViewControllerFactory::class
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'sms_api_services/index/index' => __DIR__ . '/../view/sms_api_services/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',

        ],'strategies'=>array(
            'ViewJsonStrategy'
        ),
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
