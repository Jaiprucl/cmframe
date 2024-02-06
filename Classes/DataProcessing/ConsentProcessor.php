<?php

namespace HDNET\CMFrame\DataProcessing;

use DOMDocument;
use TYPO3\CMS\Core\Service\FlexFormService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentDataProcessor;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

class ConsentProcessor implements DataProcessorInterface
{
    protected ContentDataProcessor $contentDataProcessor;

    public function __construct(ContentDataProcessor $contentDataProcessor)
    {
        $this->contentDataProcessor = $contentDataProcessor;
    }

    public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData)
    {
        $html = GeneralUtility::makeInstance(DOMDocument::class);
        $flex = GeneralUtility::makeInstance(FlexFormService::class);
        $html->loadHTML(mb_convert_encoding($processedData['data']['bodytext'], 'HTML-ENTITIES', 'UTF-8', ), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $elements = $html->getElementsByTagName('*');
        $flexform = $flex->convertFlexFormContentToArray($processedData['data']['pi_flexform']);

        foreach($elements as $child)
        {
            $child->setAttribute('class', 'cmplazyload');
            $child->setAttribute('data-cmp-src', $child->getAttribute('src'));
            $child->setAttribute('async', 'async');
            $child->setAttribute('data-cmp-vendor', $flexform['settings']['vendor']);

            if($flexform['settings']['width'] && $flexform['settings']['height']) {
                $child->setAttribute('width', $flexform['settings']['width']);
                $child->setAttribute('height', $flexform['settings']['height']);
                $child->setAttribute('data-cmp-preview', $flexform['settings']['width'] . 'x' . $flexform['settings']['height']);
            } else {
                if($child->getAttribute('width') && $child->getAttribute('height')) {
                    $child->setAttribute('data-cmp-preview', $child->getAttribute('width') . 'x' . $child->getAttribute('height'));
                } else {
                    $child->setAttribute('data-cmp-preview','400x300');
                }
            }
            $child->setAttribute('src', 'about:blank');
        }
        $processedData['data']['cmframe_code_prepared'] = $html->saveHTML();

        return $processedData;
    }
}
