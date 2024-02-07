<?php

defined('TYPO3') or die();

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['cmframe'] =
    \HDNET\CMFrame\Hooks\ConsentPreviewRenderer::class;

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript(
    'cmframe',
    'setup',
    "@import 'EXT:cmframe/Configuration/TypoScript/setup.typoscript'"
);
