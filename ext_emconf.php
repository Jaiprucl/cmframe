<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Iframe Consent for Consentmanager',
    'description' => 'Content type for displaying embed code with consentmanager',
    'category' => 'fe',
    'author' => 'Christopher Olhöft',
    'author_email' => 'christopher.olhoeft@hdnet.de',
    'author_company' => 'HDNET GmbH',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'version' => '1.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-12.99.99',
        ],
    ],
    'autoload' => [
        'psr-4' => ['HDNET\\CMFrame\\' => 'Classes']
    ],
];
