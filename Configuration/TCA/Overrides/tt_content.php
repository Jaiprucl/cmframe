<?php

defined('TYPO3') or die();

call_user_func(static function () {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        ['LLL:EXT:cmframe/Resources/Private/Language/locallang_db.xlf:tt_content.CType', 'cmframe', 'content-cmframe'],
        'html',
        'after'
    );

    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['cmframe'] = 'content-cmframe';

    $GLOBALS['TCA']['tt_content']['types']['cmframe'] = [
        'showitem' => '
            --div--;General,
                --palette--;General;general,
                bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel,
                pi_flexform,
            --div--;Options,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                    --palette--;;frames,
                    --palette--;;appearanceLinks,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;language,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;hidden,
                    --palette--;;access,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                    categories,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                    rowDescription,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
                ',
        'columnsOverrides' => [
            'bodytext' => [
                'config' => [
                    'type' => 'text',
                    'cols' => 50,
                    'rows' => 3,
                ],
            ],
        ]
    ];

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    // 'list_type' does not apply here
        '*',
        // FlexForm configuration schema file
        'FILE:EXT:cmframe/Configuration/FlexForms/Consent.xml',
        // ctype
        'cmframe'
    );
});
