<?php

namespace HDNET\CMFrame\Hooks;

use TYPO3\CMS\Backend\View\PageLayoutView;
use TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ConsentPreviewRenderer implements PageLayoutViewDrawItemHookInterface
{
    /**
     * Preprocesses the preview rendering of a content element of type "codeblock"
     *
     * @param \TYPO3\CMS\Backend\View\PageLayoutView $parentObject Calling parent object
     * @param bool $drawItem Whether to draw the item using the default functionality
     * @param string $headerContent Header content
     * @param string $itemContent Item content
     * @param array $row Record row of tt_content
     */
    public function preProcess(
       PageLayoutView &$parentObject,
       &$drawItem,
       &$headerContent,
       &$itemContent,
       array &$row
    ) {
        if ($row['CType'] === 'cmframe') {
            if ($row['bodytext']) {
                $bodytext = "<strong>Consent iFrame</strong><br/>";
                $bodytext .= GeneralUtility::fixed_lgd_cs($row['bodytext'], 1000);
                $itemContent .= $parentObject->linkEditContent(nl2br($bodytext), $row) . '<br />';
            }
            $drawItem = false;
        }
    }
}
