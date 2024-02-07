<?php

if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
// 'list_type' does not apply here
    '*',
    // FlexForm configuration schema file
    'FILE:EXT:cmframe/Configuration/FlexForms/Consent.xml',
    // ctype
    'cmframe'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:cmframe/Configuration/TsConfig/page.tsconfig">'
);

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
    'content-cmframe',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    [
        'source' => 'EXT:cmframe/Resources/Public/Icons/content-cmframe.svg',
    ]
);
